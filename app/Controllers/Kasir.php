<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kasir extends BaseController
{
    public function kasir()
    {
        $data = [
            'akses' => session()->get('level'),
            'total_stok' => $this->produk->getJumlahStok(),
            'stok'  => $this->produk->getJumlahStokKosong(),
        ];
        return view('Kasir/halaman-kasir', $data); 
    }
}
