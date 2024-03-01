<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-0">Master Data Produk </h6>
        <p>Berikut adalah data produk, silahkan tambahkan data produk baru pada halaman ini</p>
        <!-- notifikasi tambah -->
        <?php if (session()->getFlashdata('tambah1')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tambah1'); ?>
            <?php endif; ?>
            </div>
            <!-- end notifikasi -->
            <table id="myTable">
                <p><a href="<?= site_url('tambah-produk'); ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle-fill"></i> Tambah</a></p>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>

                        <th scope="col">Satuan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = null;
                    foreach ($listProduk as $baris) :
                        $no++
                    ?>

                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $baris['kode_produk']; ?></td>
                            <td><?= $baris['nama_produk']; ?></td>
                            <td><?= $baris['harga_beli']; ?></td>
                            <td><?= $baris['harga_jual']; ?></td>

                            <td><?= $baris['nama_satuan']; ?></td>
                            <td><?= $baris['nama_kategori']; ?></td>
                            <td><?= $baris['stok']; ?></td>
                            <td>

                            <a href="<?= site_url('/edit-produk/' . $baris['id_produk']); ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                        <form action="<?= site_url('/hapus-produk/' . $baris['id_produk']); ?>" method="post" class="d-inline-block">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" id="hapusKategori" data-id="<?= $baris['id_produk']; ?>"><i class="far fa-trash-alt"></i></button>

                            <?php
                        endforeach;

                            ?>
                        </tr>
                </tbody>
            </table>
    </div>
</div>

<?= $this->endSection(); ?>