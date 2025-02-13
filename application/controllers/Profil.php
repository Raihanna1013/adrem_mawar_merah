<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

    }   

    public function profil_usaha(){
        $this->load->view('user/tentangkami_v.php');
    }


}


?>