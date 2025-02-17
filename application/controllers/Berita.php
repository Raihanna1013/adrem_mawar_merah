<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('pagination');
    }

    public function index() {
        // Konfigurasi Pagination
        $config = array();
        $config['base_url'] = base_url('berita');
        $config['total_rows'] = $this->Admin_model->count_berita();
        $config['per_page'] = 5;
        
        // Menggunakan query string untuk pagination
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        
        // Styling
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
        
        // Get current page from query string
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        // Get data
        $data['berita'] = $this->Admin_model->get_berita_pagination($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        if($this->input->is_ajax_request()) {
            // Jika request AJAX, return JSON
            echo json_encode($data);
            return;
        }
        
        // Jika bukan AJAX, tampilkan view normal
        $this->load->view('user/berita_v', $data);
    }
}