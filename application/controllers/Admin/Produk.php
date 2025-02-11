<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
   {

        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->load->library('upload'); 
        }
        public function index() {
            $data['products'] = $this->Admin_model->get_produk();
            $this->load->view('admin/mainproduk_v', $data);
        }
        
        public function tambah_produk(){
            $this->load->view('admin/tambahproduk_v');
        }
        public function tambah_proses() {
            // Validasi input
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required|numeric');
            $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required|numeric');
            $this->form_validation->set_rules('deskripsi_barang', 'Deskripsi Barang', 'required');
            $this->form_validation->set_rules('link_produk', 'Link Produk', 'required');
        
            if ($this->form_validation->run() === FALSE) {
                // Jika validasi gagal, kembali ke form
                $this->load->view('admin/tambahproduk_v');
            } else {
                // Konfigurasi upload gambar
                $config['upload_path']   = 'asset/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10048; // Maksimal 10MB
        
                $this->upload->initialize($config);
        
                // Coba upload gambar
                if (!$this->upload->do_upload('foto_barang')) {
                    // Jika gagal upload, kembali ke form dengan error
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('admin/tambahproduk_v', $data);
                } else {
                    // Ambil data yang diinputkan
                    $namabarang = $this->input->post('nama_barang', TRUE);
                    $hargabarang = $this->input->post('harga_barang', TRUE);
                    $jumlahbarang = $this->input->post('jumlah_barang', TRUE);
                    $deskripsibarang = $this->input->post('deskripsi_barang', TRUE);
                    $fotobarang = $this->upload->data('file_name'); // Ambil nama file yang diupload
                    $linkproduk = $this->input->post('link_produk', TRUE);
        
                    // Simpan ke database
                    $insert_id = $this->Admin_model->insert_produk(
                        $namabarang, $hargabarang, $jumlahbarang, 
                        $fotobarang, $deskripsibarang, $linkproduk
                    );
        
                    if ($insert_id) {
                        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal menambahkan produk. Silakan coba lagi.');
                    }
        
                    // Redirect ke halaman daftar produk
                    redirect('admin/produk');
                }
            }
        }
        
        

        public function editproduk($id_barang) {
            // Ambil data produk dari model
            $data['produk'] = $this->Admin_model->get_product_by_id($id_barang);
        
            // Validasi jika produk tidak ditemukan
            if (!$data['produk']) {
                show_error("Produk dengan ID $id_barang tidak ditemukan.", 404);
                return;
            }
        
            // Kirim data ke view
            $this->load->view('admin/editproduk_v', $data);
        }
        
        
        public function updatedata($id_barang = NULL) {
            if ($id_barang === NULL) {
                show_404(); // Jika tidak ada ID produk, tampilkan error 404
            }
        
            // Validasi form
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required|numeric');
            $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required|numeric');
            $this->form_validation->set_rules('deskripsi_barang', 'Deskripsi Barang', 'required');
            $this->form_validation->set_rules('link_produk', 'Link Produk', 'required');
        
            if ($this->form_validation->run() === FALSE) {
                // Ambil data produk lama
                $data['produk'] = $this->Admin_model->get_product_by_id($id_barang);
        
                // Jika produk tidak ditemukan, tampilkan error
                if (!$data['produk']) {
                    show_404();
                }
        
                // Jika validasi gagal, kembali ke form edit dengan data lama
                $this->load->view('admin/editproduk_v', $data);
            } else {
                // Ambil data yang diinputkan
                $namabarang = $this->input->post('nama_barang', TRUE);
                $hargabarang = $this->input->post('harga_barang', TRUE);
                $jumlahbarang = $this->input->post('jumlah_barang', TRUE);
                $deskripsibarang = $this->input->post('deskripsi_barang', TRUE);
                $linkproduk = $this->input->post('link_produk', TRUE);
        
                // Ambil data produk lama untuk mendapatkan gambar lama
                $produk = $this->Admin_model->get_product_by_id($id_barang);
                $fotobarang = $produk->foto_barang; // Default pakai gambar lama
        
                // Konfigurasi upload gambar
                $config['upload_path']   = 'asset/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10048; // Maksimal 10MB
        
                $this->upload->initialize($config);
        
                // Coba upload gambar baru
                if ($this->upload->do_upload('foto_barang')) {
                    $fotobarang = $this->upload->data('file_name'); // Jika berhasil, pakai gambar baru
                }
        
                // Data yang akan diupdate
                $data = array(
                    'nama_barang' => $namabarang,
                    'harga_barang' => $hargabarang,
                    'jumlah_barang' => $jumlahbarang,
                    'foto_barang' => $fotobarang,
                    'deskripsi_barang' => $deskripsibarang,
                    'link_produk' => $linkproduk
                );
        
                // Update ke database
                $update = $this->Admin_model->update_produk($id_barang, $data);
        
                if ($update) {
                    $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui produk. Silakan coba lagi.');
                }
        
                // Redirect ke halaman daftar produk
                redirect('admin/produk');
            }
        }
        

        public function hapus_produk($id_barang){
            $this->Admin_model->hapus_barang($id_barang);
            redirect('admin/produk');
        }

    }


?>