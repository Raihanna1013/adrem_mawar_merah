<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Detail_berita extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('Admin_model'); // Pastikan model ada
            $this->load->helper('url'); // Load helper URL jika belum
        }

        public function index($id_berita){
            $data['berita'] = $this->Admin_model->get_idberita($id_berita);

            if (!$data['berita']) {
                show_error("Berita dengan ID $id_berita tidak ditemukan.", 404);
                return;
            }

            $this->load->view('user/detailberita_v',$data);
        }


    }



?>