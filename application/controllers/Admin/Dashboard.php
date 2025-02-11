<?php
Class Dashboard extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
            // $this->load->helper('url');
            // $this->load->library('upload'); 
    }
    public function index()
    {
        $this->load->view('admin/dashboard_v');
    }

    public function produk(){
        $data['products'] = $this->Admin_model->get_produk();
        $this->load->view('admin/mainproduk_v', $data);
    }
}

?>