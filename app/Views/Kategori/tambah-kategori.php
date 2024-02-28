<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-0">Jenis Kategori</h6>
                <p>Silahkan tambahkan kategori produk baru pada halaman ini</p>
                <form action="<?= site_url('simpan-kategori'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Kategori</label>
                        <input type="hidden" class="form-control" id="inputJenis" name="id_kategori">
                        <input type="text" class="form-control <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_kategori" placeholder="Masukan Kategori Produk">
                        <?php if (session()->has('errors') && session('errors.nama_kategori')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.nama_kategori'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        <?= $this->endSection(); ?>