<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('halaman-login');
    }

    public function prosesLogin()
    {
        $validasiForm = [
            'username' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($validasiForm)) {
            $pengguna = $this->pengguna->getPengguna(
                $this->request->getPost('username'),
                $this->request->getPost('password')
            );

            if (count($pengguna) == 1) {

                $dataSession = [
                    'username' => $pengguna[0]['username'],
                    'nama_user' => $pengguna[0]['nama_user'],
                    'password' => $pengguna[0]['password'],
                    'level' => $pengguna[0]['level'],
                    'sudahkahLogin' => true
                ];

                session()->set($dataSession);
            }
            if (session()->get('level') === 'Admin') {
                return redirect()->to('/halaman-admin');
            } else if (session()->get('level') === 'Kasir') {
                return redirect()->to('/halaman-kasir'); 
            } else {
                return redirect()->to('/')->with('pesan' , '<p>USERNAME ATAU PASSWORD SALAHHHHH</p>');
            }
        }
    }
    
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
