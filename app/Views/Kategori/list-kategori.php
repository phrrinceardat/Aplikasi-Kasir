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
                                    <a href=<?= site_url('/edit-kategori/' . $baris['id_kategori']); ?>><i class="bi bi-pencil-square"></i></a>
                                    <a href=<?= site_url('/hapus-kategori/' . $baris['id_kategori']); ?>><i class="bi bi bi-trash"></i></a>


                            <?php
                        }
                    }
                            ?>
                                </td>
                            </tr>
                </tbody>
            </table>
            </div>
    </div>

    <?= $this->endSection(); ?>