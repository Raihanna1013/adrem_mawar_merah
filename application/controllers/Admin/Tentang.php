<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Tentang extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('session'); 
    }

    public function index(){
        $this->load->view('admin/maintentangkami_v.php');
    }

    public function profil_usaha(){
        $data['profil'] = $this->Admin_model->get_profil();
        $this->load->view('admin/mainprofil_v', $data);
    }

    public function tambah_profil(){
        $this->load->view('admin/tambahprofil_v');
    }

    public function tambah_profilaction(){
        $this->form_validation->set_rules('juduL_profil', 'Judul Profil' );
        $this->form_validation->set_rules('subjudul_profil', 'Deskripsi Profil', 'required');
        $this->form_validation->set_rules('deskripsi_profil', 'Deskripsi', 'required');
        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembali ke form
            $this->load->view('admin/tambahprofil_v');
        } else {

            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_profil')) {
                // Jika gagal upload, kembali ke form dengan error
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/tambahprofil_v', $data);
            }else {
                // Ambil data yang diinputkan
                $judulprofil = $this->input->post('judul_profil');
                $subjudul = $this->input->post('subjudul_profil', TRUE);
                $deskripsiprofil = $this->input->post('deskripsi_profil', TRUE);
                $gambarprofil = $this->upload->data('file_name'); // Ambil nama file yang diupload
                // Simpan ke database
                $insert_id = $this->Admin_model->insert_profil(
                    $judulprofil, $subjudul, $deskripsiprofil, 
                    $gambarprofil
                );
    
                if ($insert_id) {
                    $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan produk. Silakan coba lagi.');
                }
    
                // Redirect ke halaman daftar produk
                redirect('admin/tentang/profil_usaha');
            }
        }
    }

    public function editprofil($id_profil){
        $data['profil'] = $this->Admin_model->get_idprofil($id_profil);
        
        // Validasi jika profil tidak ditemukan
        if (!$data['profil']) {
            show_error("Profil dengan ID $id_profil tidak ditemukan.", 404);
            return;
        }
    
        $this->load->view('admin/editprofil_v', $data); // Pastikan $data dikirim ke view
    }
    
    public function updateprofil($id_profil = NULL) {
        if ($id_profil === NULL) {
            show_404(); // Jika tidak ada ID produk, tampilkan error 404
        }
    
        // Validasi form
        $this->form_validation->set_rules('juduL_profil', 'Judul Profil' );
        $this->form_validation->set_rules('subjudul_profil', 'Deskripsi Profil', 'required');
        $this->form_validation->set_rules('deskripsi_profil', 'Deskripsi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Ambil data produk lama
            $data['profil'] = $this->Admin_model->get_idprofil($id_profil);
    
            // Jika produk tidak ditemukan, tampilkan error
            if (!$data['profil']) {
                show_404();
            }
    
            // Jika validasi gagal, kembali ke form edit dengan data lama
            $this->load->view('admin/editprofil_v', $data);
        } else {
            // Ambil data yang diinputkan
            $judulprofil = $this->input->post('judul_profil');
                $subjudul = $this->input->post('subjudul_profil', TRUE);
                $deskripsiprofil = $this->input->post('deskripsi_profil', TRUE);
    
            // Ambil data produk lama untuk mendapatkan gambar lama
            $profil = $this->Admin_model->get_product_by_id($id_barang);
            $gambarprofil = $profil->gambar_profil; // Default pakai gambar lama
    
            // Konfigurasi upload gambar
            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
    
            // Coba upload gambar baru
            if ($this->upload->do_upload('gambar_profil')) {
                $gambarprofil = $this->upload->data('file_name'); // Jika berhasil, pakai gambar baru
            }
    
            // Data yang akan diupdate
            $data = array(
                'judul_profil'  => $judulprofil,
                    'subjudul_profil'    => $subjudul,
                    'deskripsi_profil' => $deskripsiprofil,
                    'gambar_profil'=> $gambarprofil
            );
    
            // Update ke database
            $update = $this->Admin_model->update_profil($id_profil, $data);
    
            if ($update) {
                $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui produk. Silakan coba lagi.');
            }
    
            // Redirect ke halaman daftar produk
            redirect('admin/tentang/profil_usaha');
        }
    }

    public function hapus_profil($id_profil){
        $this->Admin_model->delete_profil($id_profil);
        redirect('admin/tentang/profil_usaha');
    }
    
    public function organisasi(){
        $data['organisasi'] = $this->Admin_model->get_organisasi();
        $this->load->view('admin/mainorganisasi_v', $data);
    }

    public function tambah_organisasi(){
        $this->load->view('admin/tambahorganisasi_v');
    }
    public function tambah_organisasiaction() {
        $this->form_validation->set_rules('judul_organisasi', 'Judul Organisasi', 'required');
        $this->form_validation->set_rules('subjudul_organisasi', 'Sub Judul Organisasi', 'required');
        $this->form_validation->set_rules('deskripsi_organisasi', 'Deskripsi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembali ke form tambah organisasi
            $this->load->view('admin/tambahorganisasi_v');
        } else {
            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_organisasi')) {
                // Jika gagal upload, kembali ke form dengan error
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/tambahorganisasi_v', $data);
            } else {
                // Ambil data yang diinputkan
                $judulorganisasi = $this->input->post('judul_organisasi');
                $subjudulorganisasi = $this->input->post('subjudul_organisasi', TRUE);
                $deskripsiorganisasi = $this->input->post('deskripsi_organisasi', TRUE);
                $gambarorganisasi = $this->upload->data('file_name'); // Ambil nama file yang diupload
                
                // Simpan ke database
                $insert_id = $this->Admin_model->insert_organisasi(
                    $judulorganisasi, 
                    $subjudulorganisasi, 
                    $deskripsiorganisasi, 
                    $gambarorganisasi
                );
    
                if ($insert_id) {
                    $this->session->set_flashdata('success', 'Organisasi berhasil ditambahkan!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan organisasi. Silakan coba lagi.');
                }
    
                // Redirect ke halaman daftar organisasi
                redirect('admin/tentang/organisasi');
            }
        }
    }
    

    public function editorganisasi($id_organisasi){
        $data['organisasi'] = $this->Admin_model->get_idorganisasi($id_organisasi);
        
        // Validasi jika organisasi tidak ditemukan
        if (!$data['organisasi']) {
            show_error("Organisasi dengan ID $id_organisasi tidak ditemukan.", 404);
            return;
        }
    
        $this->load->view('admin/editorganisasi_v', $data); // Pastikan $data dikirim ke view
    }
    
    
    public function updateorganisasi($id_organisasi = NULL) {
        if ($id_organisasi === NULL) {
            show_404(); // Jika tidak ada ID produk, tampilkan error 404
        }
    
        // Validasi form
        $this->form_validation->set_rules('judul_organisasi', 'Nama Organisasi' );
        $this->form_validation->set_rules('subjudul_organisasi', 'sub Judul Organisasi', 'required');
        $this->form_validation->set_rules('deskripsi_organisasi', 'Deskripsi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Ambil data produk lama
            $data['organisasi'] = $this->Admin_model->get_idorganisasi($id_organisasi);
    
            // Jika produk tidak ditemukan, tampilkan error
            if (!$data['organisasi']) {
                show_404();
            }
    
            // Jika validasi gagal, kembali ke form edit dengan data lama
            $this->load->view('admin/editorganisasi_v', $data);
        } else {
            // Ambil data yang diinputkan
            $judulorganisasi = $this->input->post('judul_organisasi');
                $subjudulorganisasi = $this->input->post('subjudul_organisasi', TRUE);
                $deskripsiorganisasi = $this->input->post('deskripsi_organisasi', TRUE);
    
            // Ambil data produk lama untuk mendapatkan gambar lama
            $organisasi = $this->Admin_model->get_product_by_id($id_barang);
            $gambarorganisasi = $organisasi->gambar_organisasi; // Default pakai gambar lama
    
            // Konfigurasi upload gambar
            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
    
            // Coba upload gambar baru
            if ($this->upload->do_upload('gambar_organisasi')) {
                $gambarorganisasi = $this->upload->data('file_name'); // Jika berhasil, pakai gambar baru
            }
    
            // Data yang akan diupdate
            $data = array(
                'judul_organisasi'     => $judulorganisasi,
                'subjudul_organisasi'  => $subjudulorganisasi,
                'deskripsi_organisasi' => $deskripsiorganisasi, // Sesuaikan dengan database
                'gambar_organisasi'    => $gambarorganisasi
            );
            // Update ke database
            $update = $this->Admin_model->update_organisasi($id_organisasi, $data);
    
            if ($update) {
                $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui produk. Silakan coba lagi.');
            }
    
            // Redirect ke halaman daftar produk
            redirect('admin/tentang/profil_usaha');
        }
    }
    
    public function hapus_organisasi($id_organisasi){
        $this->Admin_model->delete_organisasi($id_organisasi);
        redirect('admin/tentang/organisasi');
    }

//sertifikat
    public function sertifikat(){
        $data['sertifikat'] = $this->Admin_model->get_sertifikat();
        $this->load->view('admin/mainsertifikat', $data);
    }

    public function tambah_sertifikat(){
        $this->load->view('admin/tambahsertifikat_v');
    }
    public function tambah_sertifikataction() {
        $this->form_validation->set_rules('deskripsi_sertifikat', 'Deskripsi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembali ke form tambah organisasi
            $this->load->view('admin/tambahsertifikat_v');
        } else {
            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_sertifikat')) {
                // Jika gagal upload, kembali ke form dengan error
                $data['error'] = $this->upload->display_errors();
                $this->load->view('admin/tambahsertifikat_v', $data);
            } else {
                // Ambil data yang diinputkan
                $deskripsisertifikat = $this->input->post('deskripsi_sertifikat', TRUE);
                $gambarsertifikat = $this->upload->data('file_name'); // Ambil nama file yang diupload
                
                // Simpan ke database
                $insert_id = $this->Admin_model->insert_sertifikat(
                    $deskripsisertifikat, 
                    $gambarsertifikat
                );
    
                if ($insert_id) {
                    $this->session->set_flashdata('success', 'Sertifikat berhasil ditambahkan!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan organisasi. Silakan coba lagi.');
                }
    
                // Redirect ke halaman daftar organisasi
                redirect('admin/tentang/sertifikat');
            }
        }
    }
    

    public function editsertifikat($id_sertifikat){
        $data['sertifikat'] = $this->Admin_model->get_idsertifikat($id_sertifikat);
        
        // Validasi jika organisasi tidak ditemukan
        if (!$data['sertifikat']) {
            show_error("Sertifikat dengan ID $id_sertifikat tidak ditemukan.", 404);
            return;
        }
    
        $this->load->view('admin/editsertifikat_v', $data); // Pastikan $data dikirim ke view
    }
    
    
    public function updatesertifikat($id_sertifikat = NULL) {
        if ($id_sertifikat === NULL) {
            show_404(); // Jika tidak ada ID produk, tampilkan error 404
        }
    
        // Validasi form
        $this->form_validation->set_rules('deskripsi_sertifikat', 'Deskripsi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Ambil data produk lama
            $data['sertifikat'] = $this->Admin_model->get_idsertifikat($id_sertifikat);
    
            // Jika produk tidak ditemukan, tampilkan error
            if (!$data['sertifikat']) {
                show_404();
            }
    
            // Jika validasi gagal, kembali ke form edit dengan data lama
            $this->load->view('admin/editsertifikat_v', $data);
        } else {
            // Ambil data yang diinputkan
                $deskripsisertifikat = $this->input->post('deskripsi_sertifikat', TRUE);
    
            // Ambil data produk lama untuk mendapatkan gambar lama
            $sertifikat = $this->Admin_model->get_idsertifikat($id_sertifikat);
            $gambarsertifikat = $sertifikat->gambar_sertifikat; // Default pakai gambar lama
    
            // Konfigurasi upload gambar
            $config['upload_path']   = 'asset/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 10048; // Maksimal 10MB
    
            $this->upload->initialize($config);
    
            // Coba upload gambar baru
            if ($this->upload->do_upload('gambar_sertifikat')) {
                $gambarsertifikat = $this->upload->data('file_name'); // Jika berhasil, pakai gambar baru
            }
    
            // Data yang akan diupdate
            $data = array(
                'deskripsi_sertifikat' => $deskripsisertifikat, // Sesuaikan dengan database
                'gambar_sertifikat'    => $gambarsertifikat
            );
            // Update ke database
            $update = $this->Admin_model->update_sertifikat($id_sertifikat, $data);
    
            if ($update) {
                $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui produk. Silakan coba lagi.');
            }
    
            // Redirect ke halaman daftar produk
            redirect('admin/tentang/sertifikat');
        }
    }

    public function hapus_sertifikat($id_sertifikat){
        $this->Admin_model->delete_sertifikat($id_sertifikat);
        redirect('admin/tentang/sertifikat');
    }

    //logo
    public function logo(){
        $data['logo'] = $this->Admin_model->get_logo();
        $this->load->view('admin/mainlogo', $data);
    }


    public function tambah_logo(){
        $this->load->view('admin/tambahlogo_v');
    }
    public function tambah_logoaction() {
        // Load Library Upload
        $this->load->library('upload');
    
        // Konfigurasi Upload
        $config['upload_path']   = FCPATH . 'asset/img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 10048; // Maksimal 10MB
        $this->upload->initialize($config);
    
        if (!$this->upload->do_upload('gambar_logo')) {
            // Jika gagal upload, kembali ke form dengan error
            $data['error'] = $this->upload->display_errors();
            $this->load->view('admin/tambahlogo_v', $data);
        } else {
            // Ambil nama file yang diupload
            $gambar_logo = $this->upload->data('file_name');
    
            // Debug: Pastikan gambar berhasil diupload
            echo "Gambar berhasil diupload: " . $gambar_logo . "<br>";
    
            // Simpan ke database (hanya menyimpan gambar)
            $insert_id = $this->Admin_model->insert_logo($gambar_logo);
    
            // Debug: Pastikan insert berhasil
            if ($insert_id) {
                echo "Insert database sukses!<br>";
                $this->session->set_flashdata('success', 'Logo berhasil ditambahkan!');
            } else {
                echo "Insert database gagal! Error: ";
                print_r($this->db->error()); // Debugging error database
            }
    
            // Redirect ke halaman daftar logo
            redirect('admin/tentang/logo');
        }
    }

    public function editlogo($id_logo){
        $data['logo'] = $this->Admin_model->get_idlogo($id_logo);
        
        // Validasi jika organisasi tidak ditemukan
        if (!$data['logo']) {
            show_error("Sertifikat dengan ID $id_logo tidak ditemukan.", 404);
            return;
        }
    
        $this->load->view('admin/editlogo_v', $data); // Pastikan $data dikirim ke view
    }
    
    
    public function updatelogo($id_logo = NULL) {
        if ($id_logo === NULL) {
            show_404(); // Jika tidak ada ID logo, tampilkan error 404
        }
    
        // Ambil data logo lama
        $data['logo'] = $this->Admin_model->get_idlogo($id_logo);
    
        // Jika logo tidak ditemukan, tampilkan error
        if (!$data['logo']) {
            show_404();
        }
    
        // Cek apakah form dikirim dengan metode POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
    
            // Ambil data lama
            $gambar_logo = $data['logo']->gambar_logo; // Default pakai gambar lama
    
            // Cek apakah ada gambar baru yang diupload
            if (!empty($_FILES['gambar_logo']['name'])) {
                $config['upload_path']   = FCPATH . 'asset/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10048; // Maksimal 10MB
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('gambar_logo')) {
                    $gambar_logo = $this->upload->data('file_name'); // Pakai gambar baru jika sukses upload
                } else {
                    $this->session->set_flashdata('error', 'Upload gagal: ' . $this->upload->display_errors());
                    redirect('admin/tentang/editlogo/' . $id_logo);
                    return;
                }
            }
    
            // Data yang akan diupdate
            $data_update = array('gambar_logo' => $gambar_logo);
    
            // Update database
            $update = $this->Admin_model->update_logo($id_logo, $data_update);
    
            if ($update) {
                $this->session->set_flashdata('success', 'Logo berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui logo.');
            }
    
            redirect('admin/tentang/logo');
        } else {
            // Jika bukan metode POST, tampilkan halaman edit
            $this->load->view('admin/editlogo_v', $data);
        }
    }
    

    public function hapus_logo($id_logo){
        $this->Admin_model->delete_logo($id_logo);
        redirect('admin/tentang/logo');
    }
}



?>