<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Galeri extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->library('pagination');
        }
        
        public function index() {
            // Konfigurasi Pagination
            $config = array();
            $config['base_url'] = base_url('galeri/index');
            $config['total_rows'] = $this->Admin_model->count_galeri();
            $config['per_page'] = 8; // Menampilkan 8 data per halaman
            $config['uri_segment'] = 3;
    
            // Styling Pagination (Bootstrap)
            $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close'] = '</span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tag_close'] = '</span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tag_close'] = '</span></li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tag_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tag_close'] = '</span></li>';
            $config['attributes'] = array('class' => 'page-link');
    
            $this->pagination->initialize($config);
    
            // Ambil data berdasarkan halaman
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['galeri'] = $this->Admin_model->get_galeri_pagination($config['per_page'], $page);
            // echo "<pre>";
            // print_r($galeri);
            // echo "</pre>";
            // echo "Total Rows: " . $config['total_rows'];
            // die();
                        
            
            $data['pagination'] = $this->pagination->create_links();
    
            // Debugging jika data tidak muncul
            log_message('debug', 'Total Galeri: ' . $config['total_rows']);
    
            $this->load->view('user/galeri_v', $data);
        }
       
    }

?>