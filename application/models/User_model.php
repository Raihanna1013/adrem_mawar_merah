<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_products() {
        return $this->db->get('tbl_barang')->result();
    }
    
    public function get_products_with_pagination($limit, $offset) {
        return $this->db->get('tbl_barang', $limit, $offset)->result();
    }
    
    public function count_all_products() {
        return $this->db->count_all('tbl_barang');
    }
}





?>