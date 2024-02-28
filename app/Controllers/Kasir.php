<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kasir extends BaseController
{
    public function kasir()
    {
        $data = [
            'akses' => session()->get('level')
        ];
        return view('Kasir/dashboard-kasir', $data); 
    }
}
