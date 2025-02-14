<?php
     defined('BASEPATH') OR exit('No direct script access allowed');
    Class Admin_model extends CI_Model{
        

        // public function get_admin(){

        // }
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
    
        //tbl barang
        public function get_produk() {
            $query = $this->db->get('tbl_barang');
            return $query->result_array(); // HARUS `result_array()`, BUKAN `result()`
        }
        public function insert_produk($namabarang, $hargabarang, $jumlahbarang, $fotobarang, $deskripsibarang, $linkproduk) {
            $data = array(
                'nama_barang' => $namabarang,
                'harga_barang' => $hargabarang,
                'jumlah_barang' => $jumlahbarang,
                'foto_barang' => $fotobarang,
                'deskripsi_barang' => $deskripsibarang,
                'link_produk' => $linkproduk
            );
        
            // Debugging (gunakan log_message daripada echo)
            log_message('debug', print_r($data, TRUE));
        
            // Insert ke database
            if ($this->db->insert('tbl_barang', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
        
        
        public function get_product_by_id($id_barang) {
            return $this->db->get_where('tbl_barang', ['id_barang' => $id_barang])->row();
        }

        public function update_produk($id_barang, $data) {
            $this->db->where('id_barang', $id_barang);
            return $this->db->update('tbl_barang', $data);
        }
        public function hapus_barang($id_barang){
            $this->db->where('id_barang', $id_barang);
            return $this->db->delete('tbl_barang');
        }

        //tbl berita

        public function get_berita(){
            $query = $this->db->get('tbl_berita');
            return $query->result_array();
        }

        public function insert_berita($judulberita, $gambarberita, $isiberita, $tglberita) {
            $data = array(
                'judul_berita'  => $judulberita,
                'isi_berita'    => $isiberita,
                'gambar_berita' => $gambarberita,
                'tanggal_berita'=> $tglberita
            );
        
            // Debug sebelum insert
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        
            // Periksa koneksi database
            if (!$this->db->conn_id) {
                die("Database connection failed!");
            }
        
            // Coba insert ke database
            $insert = $this->db->insert('tbl_berita', $data);
        
            if (!$insert) {
                echo "Error: " . $this->db->error()['message'];
                exit();
            }
        
            return $this->db->insert_id();
        }

        public function get_idberita($id_berita) {
            $this->db->where('id_berita', $id_berita);
            return $this->db->get('tbl_berita')->row();
        }
        

        public function update_berita($id_berita, $data) {
            $this->db->where('id_berita', $id_berita);
            return $this->db->update('tbl_berita', $data);
        }

        public function hapus_berita($id_berita){
            $this->db->where('id_berita', $id_berita);
            return $this->db->delete('tbl_berita');
        }
        
        //galeri

        public function get_galeri(){
            $query = $this->db->get('tbl_galeri');
            return $query->result_array(); // HARUS `result_array()`, BUKAN `result()`
        }

        public function insert_galeri($judulgaleri, $gambargaleri){
                $data = array(
                    'judul_galeri'  => $judulgaleri,
                    'gambar_galeri'    => $gambargaleri
                );
            
                // Debug sebelum insert
                echo "<pre>";
                print_r($data);
                echo "</pre>";
            
                // Periksa koneksi database
                if (!$this->db->conn_id) {
                    die("Database connection failed!");
                }
            
                // Coba insert ke database
                $insert = $this->db->insert('tbl_galeri', $data);
            
                if (!$insert) {
                    echo "Error: " . $this->db->error()['message'];
                    exit();
                }
            
                return $this->db->insert_id();
        }
        
        public function get_idgaleri($id_galeri){
            $this->db->where('id_galeri', $id_galeri);
            return $this->db->get('tbl_galeri')->row();
        }

        public function update_galeri($id_galeri, $data) {
            $this->db->where('id_galeri', $id_galeri);
            return $this->db->update('tbl_galeri', $data);
        }


        public function delete_galeri($id_galeri){
            $this->db->where('id_galeri', $id_galeri);
            $this->db->delete('tbl_galeri');  // Ganti 'produk' dengan nama tabel produk yang sesuai
        }
        
        public function count_berita() {
            return $this->db->count_all('tbl_berita'); // Pastikan nama tabel sudah benar
        }
    
        // Mengambil data berita dengan limit dan offset untuk pagination
        public function get_berita_pagination($limit, $start) {
            $this->db->limit($limit, $start);
            $this->db->order_by('tanggal_berita', 'DESC'); // Urutkan berdasarkan tanggal (sesuaikan dengan field di tabel)
            $query = $this->db->get('tbl_berita'); // Pastikan nama tabel sudah benar
            return $query->result_array();
        }

    }

?>