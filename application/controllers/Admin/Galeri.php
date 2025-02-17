<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 Class Galeri extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('session'); 
    }

    public function index(){
        $data['galeri'] = $this->Admin_model->get_galeri();
        $this->load->view('admin/maingaleri_v', $data);
    }

    public function galeri_baru(){
        $this->load->view('admin/tambahgaleri_v');
    }
    
    public function tambah_galeri(){
        $this->form_validation->set_rules('judul_galeri', 'Judul Gambar', 'required');
        $this->form_validation->set_rules('tanggal_galeri', 'Tanggal Foto diambil', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembali ke form
            $this->load->view('admin/tambahgaleri_v');
        } else {
            // Konfigurasi upload gambar
            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
    
            // Coba upload gambar
            if (!$this->upload->do_upload('gambar_galeri')) {
                // Jika gagal upload, kembali ke form dengan error
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/tambahgaleri_v', $data);
            } else {
                // Ambil data yang diinputkan
                $judulgaleri = $this->input->post('judul_galeri', TRUE);
                $gambargaleri = $this->upload->data('file_name');
                $tglgaleri = $this->input->post('tanggal_galeri', TRUE);
                // Konversi format tanggal ke YYYY-MM-DD HH:MM:SS
                // $tglberita = date("Y-m-d H:i:s", strtotime($this->input->post('tanggal_berita', TRUE)));
    
                // Simpan ke database
                $insert_id = $this->Admin_model->insert_galeri($judulgaleri, $gambargaleri, $tglgaleri);
    
                if ($insert_id) {
                    $this->session->set_flashdata('success', 'Berita berhasil ditambahkan!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan berita. Silakan coba lagi.');
                }
    
                // Redirect ke halaman daftar berita
                redirect('admin/galeri');
            }
        }  
    }

    public function edit_galeri($id_galeri){
        $data['galeri'] = $this->Admin_model->get_idgaleri($id_galeri);
    
        // Validasi jika produk tidak ditemukan
        if (!$data['galeri']) {
            show_error("Galeri dengan ID $id_galeri tidak ditemukan.", 404);
            return;
        }
    
        // Kirim data ke view
        $this->load->view('admin/editgaleri_v', $data);
    }

    public function update_galeri($id_galeri = NULL) {
        if ($id_galeri === NULL) {
            show_404(); // Jika tidak ada ID galeri, tampilkan error 404
        }
    
        // Validasi form
        $this->form_validation->set_rules('judul_galeri', 'Judul Galeri', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Ambil data galeri lama
            $data['galeri'] = $this->Admin_model->get_idgaleri($id_galeri);
    
            // Jika data tidak ditemukan, tampilkan error
            if (!$data['galeri']) {
                show_404();
            }
    
            // Jika validasi gagal, kembali ke form edit dengan data lama
            $this->load->view('admin/editgaleri_v', $data);
        } else {
            // Ambil data yang diinputkan
            $judulgaleri = $this->input->post('judul_galeri', TRUE);
    
            // Ambil data galeri lama
            $galeri = $this->Admin_model->get_galeri($id_galeri);
    
            // Jika tidak ditemukan, tampilkan error
            if (!$galeri) {
                show_404();
            }
    
            $gambargaleri = $galeri->gambar_galeri; // Default pakai gambar lama
    
            // Konfigurasi upload gambar
            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
    
            // Coba upload gambar baru
            if ($this->upload->do_upload('gambar_galeri')) {
                $gambargaleri = $this->upload->data('file_name'); // Jika berhasil, pakai gambar baru
            }
    
            // Data yang akan diupdate
            $data = array(
                'judul_galeri'  => $judulgaleri,
                'gambar_galeri' => $gambargaleri
            );
    
            // Update ke database
            $update = $this->Admin_model->update_galeri($id_galeri, $data);
    
            if ($update) {
                $this->session->set_flashdata('success', 'Galeri berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui galeri. Silakan coba lagi.');
            }
    
            // Redirect ke halaman daftar galeri
            redirect('admin/galeri');
        }
    }

    public function hapus_galeri($id_galeri){
        $this->Admin_model->delete_galeri($id_galeri);
        redirect('admin/galeri');
    }
    
    

 }
?>