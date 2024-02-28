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

                                    <a href="<?= site_url('/edit-satuan/' . $baris['id_satuan']); ?>"><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= site_url('/hapus-satuan/' . $baris['id_satuan']); ?>"><i class="bi bi-trash"></i></a>

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