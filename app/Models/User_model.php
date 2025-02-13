<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    public function getProduk($id = false)
    {
        if($id === false) {
            return $this->db->table('produk')
                           ->get()
                           ->getResultArray();
        }
        
        return $this->db->table('produk')
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();
    }
} 