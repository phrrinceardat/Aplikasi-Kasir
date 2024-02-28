<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-0">Master Data Pengguna</h6>
        <p>Berikut adalah data pengguna, silahkan tambahkan pengguna baru pada halaman ini</p>
        <!-- notifikasi tambah -->
        <?php if (session()->getFlashdata('tambah1')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tambah1'); ?>
            <?php endif; ?>
            <table id="myTable">
                <p><a href="<?= site_url('tambah-pengguna'); ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle-fill"></i> Tambah</a></p>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($listPengguna)) {
                        $no = null;
                        foreach ($listPengguna as $baris) {
                            $no++
                    ?>

                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $baris['username']; ?></td>
                                <td><?= $baris['nama_user']; ?></td>
                                <td><?= $baris['level']; ?></td>
                                <td>
                                    <a href=<?= site_url('/edit-pengguna/' . $baris['username']); ?>><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= site_url('/hapus-pengguna/' . $baris['username']); ?>"><i class="bi bi bi-trash"></i></a>


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