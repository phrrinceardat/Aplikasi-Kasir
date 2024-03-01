<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function produk()
    {
        
        $data =[
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'listProduk' => $this->produk->getAllProduk(),
        ];
        return view('produk/list-produk', $data);
    }

    public function tambahProduk()
    {
        $data =[
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'listSatuan' => $this->satuan_produk->findAll(),
            'listKategori' => $this->kategori_produk->findAll()
        ];
        return view('produk/tambah-produk', $data);
    }

    public function simpanProduk()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'kode_produk' => 'required|is_unique[tbl_produk.kode_produk]',
            'nama_produk' => 'required|is_unique[tbl_produk.nama_produk]',
            'harga_beli' => 'required',
            'harga_jual' => 'required|checkHargaValid[harga_beli]',
            'stok' => 'required'
        ];

        $messages = [
            'kode_produk' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'nama kode produk sudah ada silahkan gunakan yang lain'
            ],
            'nama_produk' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'nama produk sudah ada silahkan gunakan yang lain',
                
            ],
            'harga_beli' => [
                'required' => 'Tidak boleh kosong!',
                
            ],
            'harga_jual' => [
                'required' => 'Tidak boleh kosong!',
                
                'checkHargaValid' => 'Harga jual harus lebih tinggi dari harga beli.', // Pesan jika harga jual kurang dari harga beli
                
            ],
            'stok' => [
                'required' => 'Tidak boleh kosong!'
            
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_produk'=> $this->request->getVar('kode_produk'),
            'nama_produk'=> $this->request->getVar('nama_produk'),
            'harga_beli'=> str_replace('.', '', $this->request->getVar('harga_beli')),
            'harga_jual'=> str_replace('.', '', $this->request->getVar('harga_jual')),
            'id_satuan'=> $this->request->getVar('jenis_satuan'),
            'id_kategori'=> $this->request->getVar('jenis_kategori'),
            'stok'=> str_replace('.', '', $this->request->getVar('stok')),
        ];

        $this->produk->save($data);
        session()->setFlashdata('tambah1', 'Data berhasil diupdate');
        return redirect()->to('/data-produk');
    }

    public function editProduk($idProduk)
    {
        $syarat = [
            'id_produk' =>$idProduk
        ];

        $data =[
            'chartData' => $this->detail->getMonthlyIncome(),
            'akses' => session()->get('level'),
            'listKategori' => $this->kategori_produk->findAll(),
            'listSatuan' => $this->satuan_produk->findAll(),
            'detailProduk' => $this->produk->where($syarat)->findAll(),
        ];

        return view('Produk/edit-produk', $data);
    }

    public function simpanEditProduk()
    {
        $idproduk = $this->request->getVar('id_produk');

        $validation = \Config\Services::validation();

        $rules = [
            'kode_produk' => 'required|is_unique[tbl_produk.kode_produk,id_produk,' . $idproduk . ']',
            'nama_produk' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required|checkHargaValid[harga_beli]',
        ];

        $message = [
            'kode_produk' => [
                'required' => 'Tidak boleh kosong',
                'is_unique' => 'Kode produk sudah ada silahkan gunakan yang lain',
            ],
            'nama_produk' => [
                'required' => 'Tidak boleh kosong',
            ],
            'harga_beli' => [
                'required' => 'Tidak boleh kosong',
            ],
            'stok' => [
                'required' => 'Tidak boleh kosong',
            ],
            'harga_jual' => [
                'required' => 'Tidak boleh kosong',
                'checkHargaValid' => 'Harga jual harus lebih tinggi dari harga beli.'
            
            ],
        ];

        $validation->setRules($rules, $message);


        $datavalid = [
            'id_produk' => $idproduk,
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'stok' => $this->request->getPost('stok')
            ];

        if (!$validation->run($datavalid)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        {


        $data = [
            // 'akses' => session()->get('level'),
            'id_produk' => $this->request->getVar('id_produk'),
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'id_satuan' => $this->request->getVar('jenis_satuan'),
            'id_kategori' => $this->request->getVar('jenis_kategori'),
            'stok' => $this->request->getVar('stok')
        ];
        $this->produk->update($this->request->getVar('id_produk'),$data);
        session()->setFlashdata('tambah1', 'Data berhasil diupdate');
        return redirect()->to('data-produk');
    }
}

    public function hapusProduk($idProduk)
    {
        $syarat =[
            'id_produk' =>$idProduk
        ];
        $this->produk->where($syarat)->delete();
        session()->setFlashdata('tambah1', 'Data berhasil dihapus');
        return redirect()->to('/data-produk');
    }
}
