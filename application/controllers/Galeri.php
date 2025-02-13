<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Galeri extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->library('pagination');
            $this->load->library('session'); 
        }
        
        public function index(){
            $this->load->view('user/galeri_v');
        }

       
    }

?>