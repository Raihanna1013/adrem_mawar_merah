<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Produk extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->library('pagination');
        }
        
        public function index() {
            // Konfigurasi Pagination
            $config['base_url'] = base_url('produk');
            $config['total_rows'] = $this->Admin_model->count_produk();
            $config['per_page'] = 8;
            $config['use_page_numbers'] = TRUE; // Menggunakan nomor halaman, bukan offset
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'page';
        
            // Styling Pagination agar tetap muncul
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close'] = '</span></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');
        
            $this->pagination->initialize($config);
        
            // Hitung halaman dengan benar (gunakan nomor halaman, bukan offset)
            $page = ($this->input->get('page')) ? ($this->input->get('page') - 1) * $config['per_page'] : 0;
        
            // Ambil data produk
            $data['produk'] = $this->Admin_model->get_produk_pagination($config['per_page'], $page);
            $data['pagination'] = $this->pagination->create_links();
        
            if ($this->input->is_ajax_request()) {
                echo json_encode($data);
                return;
            }
        
            $this->load->view('user/produkv_', $data);
        }
        
           
        
}
        

?>