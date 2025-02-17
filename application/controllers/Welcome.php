<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model'); // Pastikan model diload di sini
    }


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index() {
		// Ambil ID dari URL (segment ke-3, setelah controller dan method)
		// $id_berita = $this->uri->segment(3); 
	
		// Jika ID tidak ada, set default (misal, ID pertama dari database)
		// if (!$id_berita) {
		// 	$id_berita = 1; // Ganti dengan ID yang valid
		// }
	
		// Ambil data dari model
		$data['berita'] = $this->Admin_model->get_berita_terbaru();
		$data['galeri'] = $this->Admin_model->get_galeri();
	
		// Tampilkan di view
		$this->load->view('user/home_v', $data);
	}
	
	public function produk(){
		$this->load->view('user/produkv_.php');
	}
}
