<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-0">Master Satuan </h6>
        <p>Berikut adalah data jenis satuan, silahkan tambahkan jenis satuan baru pada halaman ini</p>
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
                <p><a href="<?= site_url('tambah-satuan'); ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle-fill"></i> Tambah</a></p>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Satuan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($listSatuan)) {
                        $no = null;
                        foreach ($listSatuan as $baris) {
                            $no++
                    ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $baris['nama_satuan']; ?></td>
                                <td>

                                <a href="<?= site_url('/edit-satuan/' . $baris['id_satuan']); ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                        <form action="<?= site_url('/hapus-satuan/' . $baris['id_satuan']); ?>" method="post" class="d-inline-block">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" id="hapusKategori" data-id="<?= $baris['id_satuan']; ?>"><i class="far fa-trash-alt"></i></button>

                            <?php

                        }
                    }
                            ?>
                            <?php if (session()->has('errors') && session('errors')['nama_satuan']) : ?>
                                <div class="invalid-feedback">
                                    <p>
                                        <?= session('errors')['nama_satuan']; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            </tr>
                </tbody>
            </table>
            </div>
    </div>

    <?= $this->endSection(); ?>