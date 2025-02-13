<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Detail_produk extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->library('pagination');
        }
        

        public function index(){
            $this->load->view('user/detailproduk_v');
        }


       
    }

?>