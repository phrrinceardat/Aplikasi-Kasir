<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-0">Master Kategori</h6>
        <p>Berikut adalah data jenis kategori, silahkan tambahkan jenis kategori baru pada halaman ini</p>
        <!-- notifikasi tambah -->
        <?php if (session()->getFlashdata('tambah1')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tambah1'); ?>
            <?php endif; ?>
            <!-- end notifikasi -->

            <!-- notifikasi edit -->
            <?php if (session()->getFlashdata('edit1')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('edit1'); ?>
                <?php endif; ?>
                <!-- end notifikasi -->

                <!-- notifikasi hapus -->
                <?php if (session()->getFlashdata('hapus1')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('hapus1'); ?>
                    <?php endif; ?>
                    <!-- end notifikasi -->
                    <table id="myTable">
                        <p><a href="<?= site_url('tambah-kategori'); ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle-fill"></i> Tambah</a></p>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($listKategori)) {
                                $no = null;
                                foreach ($listKategori as $baris) {
                                    $no++
                            ?>

                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $baris['nama_kategori']; ?></td>
                                        <td>
                                        <a href="<?= site_url('/edit-kategori/' . $baris['id_kategori']); ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                        <form action="<?= site_url('/hapus-kategori/' . $baris['id_kategori']); ?>" method="post" class="d-inline-block">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" id="hapusKategori" data-id="<?= $baris['id_kategori']; ?>"><i class="far fa-trash-alt"></i></button>


                                    <?php
                                }
                            }
                                    ?>
                                    <?php if (session()->has('errors') && session('errors')['nama_kategori']) : ?>
                                        <div class="invalid-feedback">
                                            <p>
                                                <?= session('errors')['nama_kategori']; ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                        </td>
                                    </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

                <?= $this->endSection(); ?>