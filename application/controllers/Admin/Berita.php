<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    Class Berita extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->load->library('upload');
            $this->load->library('session'); 
        }

        public function index() {
            $data['berita'] = $this->Admin_model->get_berita();
            $this->load->view('admin/mainberita_v', $data);
        }

        public function berita_baru(){
            $this->load->view('admin/tambahberita_v');
        }

        public function tambah_berita() {
            // Validasi form
            $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
            $this->form_validation->set_rules('tanggal_berita', 'Tanggal Berita', 'required');
        
            if ($this->form_validation->run() === FALSE) {
                // Jika validasi gagal, kembali ke form
                $this->load->view('admin/tambahberita_v');
            } else {
                // Konfigurasi upload gambar
                $config['upload_path']   = 'asset/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10048; // Maksimal 10MB
        
                $this->upload->initialize($config);
        
                // Coba upload gambar
                if (!$this->upload->do_upload('gambar_berita')) {
                    // Jika gagal upload, kembali ke form dengan error
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('admin/tambahberita_v', $data);
                } else {
                    // Ambil data yang diinputkan
                    $judulberita = $this->input->post('judul_berita', TRUE);
                    $isiberita   = $this->input->post('isi_berita', TRUE);
                    $gambarberita = $this->upload->data('file_name');
        
                    // Konversi format tanggal ke YYYY-MM-DD HH:MM:SS
                    $tglberita = date("Y-m-d H:i:s", strtotime($this->input->post('tanggal_berita', TRUE)));
        
                    // Simpan ke database
                    $insert_id = $this->Admin_model->insert_berita($judulberita, $gambarberita, $isiberita, $tglberita);
        
                    if ($insert_id) {
                        $this->session->set_flashdata('success', 'Berita berhasil ditambahkan!');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal menambahkan berita. Silakan coba lagi.');
                    }
        
                    // Redirect ke halaman daftar berita
                    redirect('admin/berita');
                }
            }
        }


        public function editberita($id_berita) {
            // Ambil data produk dari model
            $data['berita'] = $this->Admin_model->get_idberita($id_berita);
        
            // Validasi jika produk tidak ditemukan
            if (!$data['berita']) {
                show_error("Berita dengan ID $id_berita tidak ditemukan.", 404);
                return;
            }
        
            // Kirim data ke view
            $this->load->view('admin/editberita_v', $data);
        }
        
        public function update_berita($id_berita = NULL) {
            if ($id_berita === NULL) {
                show_404(); // Jika tidak ada ID berita, tampilkan error 404
            }
        
            // Validasi form
            $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
            $this->form_validation->set_rules('tanggal_berita', 'Tanggal Berita', 'required');
        
            if ($this->form_validation->run() === FALSE) {
                // Ambil data berita lama
                $data['berita'] = $this->Admin_model->get_idberita($id_berita);
        
                // Jika berita tidak ditemukan, tampilkan error
                if (!$data['berita']) {
                    show_404();
                }
        
                // Jika validasi gagal, kembali ke form edit dengan data lama
                $this->load->view('admin/editberita_v', $data);
            } else {
                // Ambil data yang diinputkan
                $judulberita = $this->input->post('judul_berita', TRUE);
                $isiberita   = $this->input->post('isi_berita', TRUE);
                $tglberita   = date("Y-m-d H:i:s", strtotime($this->input->post('tanggal_berita', TRUE)));
        
                // Ambil data berita lama untuk mendapatkan gambar lama
                $berita = $this->Admin_model->get_idberita($id_berita);
                $gambarberita = $berita->gambar_berita; // Default pakai gambar lama
        
                // Konfigurasi upload gambar
                $config['upload_path']   = 'asset/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10048; // Maksimal 10MB
        
                $this->upload->initialize($config);
        
                // Coba upload gambar baru
                if ($this->upload->do_upload('gambar_berita')) {
                    $gambarberita = $this->upload->data('file_name'); // Jika berhasil, pakai gambar baru
                }
        
                // Data yang akan diupdate
                $data = array(
                    'judul_berita'  => $judulberita,
                    'isi_berita'    => $isiberita,
                    'gambar_berita' => $gambarberita, // Pastikan ini hanya STRING, bukan objek
                    'tanggal_berita'=> $tglberita
                );
        
                // Update ke database
                $update = $this->Admin_model->update_berita($id_berita, $data);
        
                if ($update) {
                    $this->session->set_flashdata('success', 'Berita berhasil diperbarui!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui berita. Silakan coba lagi.');
                }
        
                // Redirect ke halaman daftar berita
                redirect('admin/berita');
            }
        }

        public function hapus_berita($id_berita){
            $this->Admin_model->hapus_berita($id_berita);
            redirect('admin/berita');
        }

    
        
    }



?>