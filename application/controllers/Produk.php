<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Produk extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->library('pagination');
        }
        

        public function index(){
            // Konfigurasi pagination
            $config['base_url'] = base_url('produk/index');
            $config['total_rows'] = $this->user_model->count_all_products();
            $config['per_page'] = 12; // Jumlah produk per halaman
            
            // Styling pagination
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['next_link'] = '&raquo;';
            $config['prev_link'] = '&laquo;';
            
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            
            $data['products'] = $this->user_model->get_products_with_pagination($config['per_page'], $page);
            $data['pagination'] = $this->pagination->create_links();
      
            $this->load->view('user/produkv_', $data);
        }


        public function detail_produk(){
            $this->load->view('user/detailproduk_v');
        }
    }

?>