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
                redirect('Admin/Galeri');
            }
        }  
    }

    public function edit_galeri($id_galeri) { 
        $data['galeri'] = $this->Admin_model->get_idgaleri($id_galeri);
    
        if (!$data['galeri']) {
            show_error("Galeri dengan ID $id_galeri tidak ditemukan.", 404);
            return;
        }
    
        $this->load->view('admin/editgaleri_v', $data);
    }

    public function update_galeri($id_galeri = NULL) { 
        if ($id_galeri === NULL) {
            show_404();
        }
    
        $this->form_validation->set_rules('judul_galeri', 'Judul Galeri', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['galeri'] = $this->Admin_model->get_idgaleri($id_galeri);
            if (!$data['galeri']) {
                show_404();
            }
            $this->load->view('admin/editgaleri_v', $data);
        } else {
            $judulgaleri = $this->input->post('judul_galeri', TRUE);
            $galeri = $this->Admin_model->get_idgaleri($id_galeri);
    
            if (!$galeri) {
                show_404();
            }
    
            $gambargaleri = $galeri->gambar_galeri; // Default pakai gambar lama
    
            if (!empty($_FILES['gambar_galeri']['name'])) { 
                $config['upload_path']   = 'asset/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10048; 
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('gambar_galeri')) {
                    $gambargaleri = $this->upload->data('file_name');
                }
            }
    
            $data = array();
            if ($judulgaleri !== $galeri->judul_galeri) {
                $data['judul_galeri'] = $judulgaleri;
            }
            if ($gambargaleri !== $galeri->gambar_galeri) {
                $data['gambar_galeri'] = $gambargaleri;
            }
    
            if (!empty($data)) {
                $update = $this->Admin_model->update_galeri($id_galeri, $data);
                if ($update) {
                    $this->session->set_flashdata('success', 'Galeri berhasil diperbarui!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui galeri. Silakan coba lagi.');
                }
            }
    
            redirect('Admin/Galeri');
        }
    }

    public function hapus_galeri($id_galeri) {
        // Pastikan ID valid
        if (!$id_galeri || !is_numeric($id_galeri)) {
            show_error("ID Galeri tidak valid!", 400);
            return;
        }
    
        // Ambil data galeri
        $galeri = $this->Admin_model->get_idgaleri($id_galeri);
        if (!$galeri) {
            show_error("Galeri dengan ID $id_galeri tidak ditemukan.", 404);
            return;
        }
    
        // Debugging: Tampilkan ID yang akan dihapus
        log_message('debug', 'Proses hapus galeri dengan ID: ' . $id_galeri);
    
        // Hapus file gambar jika ada
        $gambar_path = FCPATH . 'asset/img/' . $galeri->gambar_galeri;
        if (!empty($galeri->gambar_galeri) && file_exists($gambar_path)) {
            unlink($gambar_path);
        }
    
        // Hapus data dari database
        $delete = $this->Admin_model->delete_galeri($id_galeri);
        if ($delete) {
            $this->session->set_flashdata('success', 'Galeri berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus galeri.');
        }
    
        redirect('Admin/Galeri');
    }
    
    
    
    
    
    

 }
?>