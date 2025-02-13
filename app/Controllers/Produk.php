<?php namespace App\Controllers;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new \App\Models\ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Katalog Produk',
            'products' => $this->produkModel->getProduk()
        ];

        return view('pages/produkv_', $data);
    }
} 