<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SatuanProduk extends BaseController
{
    public function satuan()
    {
        
        $data = [
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'listSatuan' => $this->satuan_produk->findAll(),
            
            ];
        return view('satuan/list-satuan', $data);
    }

    public function tambahSatuan()
    {
        $data = [
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
        ];
        return view('satuan/tambah-satuan', $data);
    }
    
    public function simpanSatuan()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama_satuan' => 'required|is_unique[tbl_satuan.nama_satuan]'
        ];

        $messages = [
            'nama_satuan' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'nama satuan sudah ada silahkan gunakan yang lain'
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_satuan'=> $this->request->getVar('nama_satuan')
        ];
        $this->satuan_produk->save($data);
        session()->setFlashdata('tambah1', 'Data berhasil diupdate');
        return redirect()->to('/satuan-produk'); 
    }

    public function editSatuan($idsatuan)
    {

        $syarat = [ 
            'id_satuan' => $idsatuan
        ];

        $data = [
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'detailSatuan' => $this->satuan_produk->where($syarat)->findAll(),
        ];
        return view('satuan/edit-satuan', $data);
    }

    public function simpanEditSatuan()
    {
        $idsatuan = $this->request->getVar('id_satuan');

        $validation = \Config\Services::validation();

        $rules = [
            'nama_satuan' => 'required|is_unique[tbl_satuan.nama_satuan,id_satuan,' . $idsatuan . ']'
        ];

        $message = [
            'nama_satuan' => [
                'required' => 'Tidak boleh kosong',
                'is_unique' => 'Nama satuan sudah ada'
            ],
        ];

        $validation->setRules($rules, $message);


        $datavalid = [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'id_satuan' => $idsatuan,
        ];
        if (!$validation->run($datavalid)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        {


        $data = [
            'id_kategori' => $this->request->getVar('id_satuan'),
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];
        $this->satuan_produk->update($idsatuan, $data);
        session()->setFlashdata('tambah1', 'Data berhasil diupdate');
        return redirect()->to('satuan-produk');
        }
    }

    public function hapusSatuan($idSatuan)
    {
        $syarat = [
            'id_satuan' =>  $idSatuan
        ];
        $this->satuan_produk->where($syarat)->delete();
        session()->setFlashdata('tambah1', 'Data berhasil dihapus');
        return redirect()->to('/satuan-produk');
        }

        
    
}
