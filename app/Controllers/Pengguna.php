<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function pengguna()
    {
        $data = [
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'listPengguna' => $this->pengguna->findAll()
        ];
        return view('Pengguna/list-pengguna', $data);
    }

    public function tambahPengguna()
    {
        $data = [
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
        ];
        return view('Pengguna/tambah-pengguna', $data);
    }

    public function simpanPengguna() 
    {
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required|is_unique[tbl_user.username]',
            'nama_user' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'username' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'username sudah ada silahkan gunakan yang lain',
            ],
            'nama_user' => [
                'required' => 'Tidak boleh kosong!',
            ],
            'password' => [
                'required' => 'Tidak boleh kosong!',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'password' => md5($this->request->getVar('password')),
            'level' => $this->request->getVar('level'),
        ];
        $this->pengguna->save($data);
        session()->setFlashdata('tambah1', 'Data berhasil ditambahkan');
        return redirect()->to('/data-pengguna');
    }

    public function editPengguna($idUser)
    {
        $syarat = [
            'username' => $idUser
        ];

        $data = [
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'detailUser' => $this->pengguna->where($syarat)->findAll()
        ];
        return view('Pengguna/edit-pengguna', $data);
    }

    public function simpanEditPengguna($idUser)
    {

        $data = [
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'username' => $this->request->getVar('username'),
            'nama_user' => $this->request->getVar('nama_user'),
            'level' => $this->request->getVar('level')
        ];
        var_dump($data);
        $this->pengguna->update($idUser, $data);
        session()->setFlashdata('tambah1', 'Data berhasil diupdate');
        return redirect()->to('/data-pengguna');
    }

    public function hapusPengguna($idUser)
    {
        $syarat = [
            'username' => $idUser
        ];
        $this->pengguna->where($syarat)->delete();
        session()->setFlashdata('tambah1','Data berhasil dihapus');
        return redirect()->to('/data-pengguna');
    }
}
