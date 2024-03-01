<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function halamanAdmin()
    {
        $data = [
            'akses' => session()->get('level'),
            'pendapatan_harian' => $this->penjualan->getPendapatanHarian(),
            'total_stok' => $this->produk->getJumlahStok(),
            'stok'  => $this->produk->getJumlahStokKosong(),
            'chartData' => $this->detail->getMonthlyIncome(),
            //'penjualanBulanan' => $this->penjualan->getPenjualanBulanan(),
           // 'penjualanTahunan' => $this->penjualan->getPenjualanTahunan();

            
            
        ];
        return view('Admin/halaman-admin', $data); 
    }
}
