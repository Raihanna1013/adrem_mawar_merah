<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Detail_produk extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model'); // Pastikan model ada
            $this->load->helper('url'); // Load helper URL jika belum
        }
        
        public function index($id_barang) {
            $data['produk'] = $this->Admin_model->get_product_by_id($id_barang);
        
            // Validasi jika produk tidak ditemukan
            if (!$data['produk']) {
                show_error("Produk dengan ID $id_barang tidak ditemukan.", 404);
                return;
            }
        
            // Kirim data ke view
            $this->load->view('user/detailproduk_v', $data);
        
        }

    }
    
       

?>