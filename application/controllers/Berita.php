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
        $config['base_url'] = base_url('berita/index');
        $config['total_rows'] = $this->Admin_model->count_berita();
        $config['per_page'] = 7;
        $config['uri_segment'] = 3;
        
        // Memaksa pagination muncul
        $config['num_links'] = 2; // Jumlah link di kiri dan kanan
        $config['use_page_numbers'] = TRUE;
        $config['display_pages'] = TRUE;
        $config['first_link'] = TRUE;
        $config['last_link'] = TRUE;
        
        // Styling Pagination
        $config['full_tag_open'] = '<div class="news-page-pagination"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        
        $config['attributes'] = array('class' => 'page-link');
        
        // Initialize Pagination
        $this->pagination->initialize($config);
        
        // Get current page
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $offset = ($page - 1) * $config['per_page'];
        
        // Get data dengan limit pagination
        $data['berita'] = $this->Admin_model->get_berita_pagination($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        
        // Tambahkan total data untuk memaksa pagination muncul
        $data['total_rows'] = $config['total_rows'];
        
        $this->load->view('user/berita_v', $data);
    }
}