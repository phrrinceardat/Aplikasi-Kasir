<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Stok extends BaseController
{
    public function laporanStok()
    {
        $data = [
            'akses' => session()->get('level'),
            'listProduk' => $this->produk->getAllProduk(),
            'listProduk' => $this->produk->getProdukOrderByStokAscInStock(),
        ];
        return view('Laporan/laporan-stok', $data);
    }
}
