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
        public function getProdukById($id) {
            $query = $this->db->get_where('tbl_barang', ['id_barang' => $id]);
            return $query->row();// Mengembalikan array
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

        public function get_berita_terbaru() {
            return $this->db->order_by('tanggal_berita', 'DESC') // Urutkan berdasarkan tanggal terbaru
                            ->limit(4) // Ambil 4 berita terbaru
                            ->get('tbl_berita')
                            ->result(); // Jika ingin object, gunakan result()
                            // ->result_array(); // Jika ingin array
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

        public function insert_galeri($judulgaleri, $gambargaleri, $tglgaleri){
                $data = array(
                    'judul_galeri'  => $judulgaleri,
                    'gambar_galeri'    => $gambargaleri,
                    'tanggal_galeri'    => $tglgaleri
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
            $this->db->order_by('tanggal_berita', 'DESC');
            $query = $this->db->get('tbl_berita');
            return $query->result_array();
        }

        public function count_produk() {
            return $this->db->count_all('tbl_barang');
        }
        
        public function get_produk_pagination($limit, $start) {
            $this->db->select('*');
            $this->db->from('tbl_barang');
            $this->db->limit($limit, $start);
            $this->db->order_by('id_barang', 'DESC');
            $query = $this->db->get();
        
            // Untuk debugging jika terjadi error
            if ($query->num_rows() == 0) {
                log_message('error', 'No products found for pagination: ' . $this->db->last_query());
            }
        
            return $query->result_array();
        }


        public function count_galeri() {
            return $this->db->count_all('tbl_galeri');
        }
    
        public function get_galeri_pagination($limit, $start) {
            $this->db->select('*');
            $this->db->from('tbl_galeri');
            $this->db->limit($limit, $start);
            $this->db->order_by('id_galeri', 'DESC');
            $query = $this->db->get();
    
            // Debugging jika data tidak diambil dengan benar
            if ($query->num_rows() == 0) {
                log_message('error', 'No gallery data found: ' . $this->db->last_query());
            }
    
            return $query->result_array();
        }
        

       //Profil
            public function get_profil(){
                $query = $this->db->get('tbl_profil');
                return $query->result_array(); // HARUS `result_array()`, BUKAN `result()`
            }
    
            public function update_profil($id_profil, $data) {
                $this->db->where('id_profil', $id_profil);
                return $this->db->update('tbl_profil', $data);
            }
    
    
            public function get_idprofil($id_profil){
                return $this->db->get_where('tbl_profil', ['id_profil' => $id_profil])->row();
            }
    
                public function insert_profil($judulprofil, $subjudul, $deskripsiprofil, $gambarprofil){
    
                    $data = array(
                        'judul_profil'  => $judulprofil,
                        'subjudul_profil'    => $subjudul,
                        'deskripsi_profil' => $deskripsiprofil,
                        'gambar_profil'=> $gambarprofil
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
                    $insert = $this->db->insert('tbl_profil', $data);
                
                    if (!$insert) {
                        echo "Error: " . $this->db->error()['message'];
                        exit();
                    }
                
                    return $this->db->insert_id();
    
                }
    
                public function delete_profil($id_profil){
                    $this->db->where('id_profil', $id_profil);
                    $this->db->delete('tbl_profil');  // Ganti 'produk' dengan nama tabel produk yang sesuai
                }

                //organisasi
                public function get_organisasi(){
                    $query = $this->db->get('tbl_organisasi');
                    return $query->result_array(); // HARUS `result_array()`, BUKAN `result()`
                }
        

                public function update_organisasi($id_organisasi, $data) {
                    $this->db->where('id_organisasi', $id_organisasi);
                    return $this->db->update('tbl_organisasi', $data);
                }
                
        
        
                public function get_idorganisasi($id_organisasi){
                    return $this->db->get_where('tbl_organisasi', ['id_organisasi' => $id_organisasi])->row();
                }
                
                
                    public function insert_organisasi($judulorganisasi, $subjudulorganisasi, $deskripsiorganisasi, $gambarorganisasi) {
                        $data = array(
                            'judul_organisasi'     => $judulorganisasi,
                            'subjudul_organisasi'  => $subjudulorganisasi,
                            'deskripsi_organisasi' => $deskripsiorganisasi, // Sesuaikan dengan database
                            'gambar_organisasi'    => $gambarorganisasi
                        );
                        

                        // Debug sebelum insert
                        echo "<pre>";
                        print_r($data);
                        echo "</pre>";

                        // Coba insert ke database
                        if ($this->db->insert('tbl_organisasi', $data)) {
                            return $this->db->insert_id();
                        } else {
                            echo "Error: " . $this->db->error()['message'];
                            exit();
                        }
                    }

        
                    public function delete_organisasi($id_organisasi){
                        $this->db->where('id_organisasi', $id_organisasi);
                        $this->db->delete('tbl_organisasi');  // Ganti 'produk' dengan nama tabel produk yang sesuai
                    }

                     //sertifikat
                public function get_sertifikat(){
                    $query = $this->db->get('tbl_sertifikat');
                    return $query->result_array(); // HARUS `result_array()`, BUKAN `result()`
                }
        

                public function update_sertifikat($id_sertifikat, $data) {
                    $this->db->where('id_sertifikat', $id_sertifikat);
                    return $this->db->update('tbl_sertifikat', $data);
                }
                
        
        
                public function get_idsertifikat($id_sertifikat){
                    return $this->db->get_where('tbl_sertifikat', ['id_sertifikat' => $id_sertifikat])->row();
                }
                
                
                    public function insert_sertifikat($deskripsisertifikat, $gambarsertifikat) {
                        $data = array(
                            'deskripsi_sertifikat' => $deskripsisertifikat, // Sesuaikan dengan database
                            'gambar_sertifikat'    => $gambarsertifikat
                        );
                        

                        // Debug sebelum insert
                        echo "<pre>";
                        print_r($data);
                        echo "</pre>";

                        // Coba insert ke database
                        if ($this->db->insert('tbl_sertifikat', $data)) {
                            return $this->db->insert_id();
                        } else {
                            echo "Error: " . $this->db->error()['message'];
                            exit();
                        }
                    }

        
                    public function delete_sertifikat($id_sertifikat){
                        $this->db->where('id_sertifikat', $id_sertifikat);
                        $this->db->delete('tbl_sertifikat');  // Ganti 'produk' dengan nama tabel produk yang sesuai
                    }


             
            
    
                    // public function update_organisasi($id_organisasi, $data) {
                    //     $this->db->where('id_organisasi', $id_organisasi);
                    //     return $this->db->update('tbl_organisasi', $data);
                    // }
                    
            
            
                    // public function get_idorganisasi($id_organisasi){
                    //     return $this->db->get_where('tbl_organisasi', ['id_organisasi' => $id_organisasi])->row();
                    // }
                    
                    
                    //     public function insert_organisasi($judulorganisasi, $subjudulorganisasi, $deskripsiorganisasi, $gambarorganisasi) {
                    //         $data = array(
                    //             'judul_organisasi'     => $judulorganisasi,
                    //             'subjudul_organisasi'  => $subjudulorganisasi,
                    //             'deskripsi_organisasi' => $deskripsiorganisasi, // Sesuaikan dengan database
                    //             'gambar_organisasi'    => $gambarorganisasi
                    //         );
                            
    
                    //         // Debug sebelum insert
                    //         echo "<pre>";
                    //         print_r($data);
                    //         echo "</pre>";
    
                    //         // Coba insert ke database
                    //         if ($this->db->insert('tbl_organisasi', $data)) {
                    //             return $this->db->insert_id();
                    //         } else {
                    //             echo "Error: " . $this->db->error()['message'];
                    //             exit();
                    //         }
                    //     }
    
            
                    //     public function delete_organisasi($id_organisasi){
                    //         $this->db->where('id_organisasi', $id_organisasi);
                    //         $this->db->delete('tbl_organisasi');  // Ganti 'produk' dengan nama tabel produk yang sesuai
                    //     }
    
                         //logo

                         public function get_logo(){
                                $query = $this->db->get('tbl_logo');
                                return $query->result_array(); // HARUS `result_array()`, BUKAN `result()`
                        
                         }
                        public function update_logo($id_logo, $data) {
                            $this->db->where('id_logo', $id_logo);
                            return $this->db->update('tbl_logo', $data);
                        }
                        
                        public function get_idlogo($id_logo) {
                            return $this->db->get_where('tbl_logo', ['id_logo' => $id_logo])->row();
                        }
                        
                        public function insert_logo($gambarlogo) {
                            $data = ['gambar_logo' => $gambarlogo];
                        
                            // Debug sebelum insert
                            echo "<pre>";
                            print_r($data);
                            echo "</pre>";
                        
                            // Coba insert ke database
                            if ($this->db->insert('tbl_logo', $data)) {
                                return $this->db->insert_id();
                            } else {
                                echo "Error: " . $this->db->error()['message']; // Debug error database
                                exit();
                            }
                        }
                        
                        public function delete_logo($id_logo){
                            $this->db->where('id_logo', $id_logo);
                            $this->db->delete('tbl_logo');  // Ganti 'produk' dengan nama tabel produk yang sesuai
                        }
        
    }

?>