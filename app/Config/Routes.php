<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('login-pengguna', 'Home::prosesLogin');
$routes->get('logout', 'Home::logout'); 

//admin
$routes->get('/halaman-admin', 'Admin::halamanAdmin' ,['filter' => 'otentifikasi']);
$routes->get('/halaman-kasir', 'Kasir::kasir' ,['filter' => 'otentifikasi']);

//satuan
$routes->get('/satuan-produk', 'SatuanProduk::satuan');
$routes->get('/tambah-satuan', 'SatuanProduk::tambahSatuan');
$routes->post('/simpan-satuan', 'SatuanProduk::simpanSatuan');
$routes->get('/edit-satuan/(:num)', 'SatuanProduk::editSatuan/$1');
$routes->post('/perbarui-satuan', 'SatuanProduk::simpanEditSatuan');
$routes->post('/hapus-satuan/(:num)', 'SatuanProduk::hapusSatuan/$1');
$routes->get('/cek-satuan-digunakan/(:segment)', 'Satuan::cek_keterkaitan_data/$1');

//kategori 
$routes->get('/kategori-produk', 'KategoriProduk::kategori');
$routes->get('/tambah-kategori', 'KategoriProduk::tambahKategori');
$routes->post('/simpan-kategori', 'KategoriProduk::simpanKategori');
$routes->get('/edit-kategori/(:num)', 'KategoriProduk::editKategori/$1');
$routes->post('/perbarui-kategori', 'KategoriProduk::simpanEditKategori');
$routes->post('/hapus-kategori/(:num)', 'KategoriProduk::hapusKategori/$1');
$routes->get('/cek-kategori-digunakan/(:segment)', 'Kategori::cek_keterkaitan_data/$1');

//produk
$routes->get('/data-produk', 'Produk::produk');
$routes->get('tambah-produk', 'Produk::tambahProduk');
$routes->post('simpan-produk', 'Produk::simpanProduk');
$routes->get ('/edit-produk/(:num)', 'Produk::editProduk/$1');
$routes->post ('/perbarui-produk', 'Produk::simpanEditProduk');
$routes->get('/hapus-produk/(:num)', 'Produk::hapusProduk/$1');

//pengguna
$routes->get('/data-pengguna', 'Pengguna::pengguna');
$routes->get('/tambah-pengguna', 'Pengguna::tambahPengguna');
$routes->post('/simpan-pengguna', 'Pengguna::simpanPengguna');
$routes->get('/edit-pengguna/(:any)', 'Pengguna::editPengguna/$1');
$routes->post('/perbarui-pengguna/(:any)', 'Pengguna::simpanEditPengguna/$1');
$routes->get('/hapus-pengguna/(:any)','Pengguna::hapusPengguna/$1');


//penjualan
$routes->get('/transaksi-jual', 'TransaksiPenjualan::transaksi');
$routes->post('/simpan-transaksi', 'TransaksiPenjualan::transaksiSimpan');
$routes->get('/pembayaran', 'TransaksiPenjualan::simpanPembayaran');

// laporan stok
$routes->get('/laporan-stok', 'Stok::laporanStok');

//laporan penjualan
$routes->get('/laporan-penjualan', 'LaporanPenjualan::index');
$routes->post('/laporan-penjualan', 'LaporanPenjualan::generate_laporan_penjualan');

//untuk cetak pdf
$routes->get('/cetak-laporan-stok', 'Library::generate');
$routes->get('/cetak-laporan-stok/(:num)', 'Library::generate$1');
