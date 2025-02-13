<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_kami extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

    }   


    public function index(){
        $this->load->view('user/tentangkami_v.php');
    }
}

?>