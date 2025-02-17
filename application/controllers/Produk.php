<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Produk extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->library('pagination');
        }
        

        public function index() {
            $config = array();
            $config['base_url'] = base_url('produk/index');
            $config['total_rows'] = $this->Admin_model->count_produk();
            $config['per_page'] = 8; // Menampilkan 8 produk per halaman
            $config['uri_segment'] = 3;
        
            // Styling Pagination
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['next_link'] = '&raquo;';
            $config['prev_link'] = '&laquo;';
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
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');
        
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
            // Ambil data produk dengan pagination
            $data['produk'] = $this->Admin_model->get_produk_pagination($config['per_page'], $page);
        
            // Pastikan pagination tetap muncul meskipun hanya ada satu produk
            $data['pagination'] = ($config['total_rows'] > 0) ? $this->pagination->create_links() : '<ul class="pagination"><li class="page-item active"><span class="page-link">1</span></li></ul>';
        
            if ($this->input->is_ajax_request()) {
                header('Content-Type: application/json');
                echo json_encode($data);
                return;
            }
        
            $this->load->view('user/produkv_', $data);
        }
        

       
    }

?>