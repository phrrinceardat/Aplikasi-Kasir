<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-0">Jenis Satuan</h6>
                <p>Silahkan tambahkan jenis produk baru pada halaman ini</p>
                <form action="<?= site_url('perbarui-satuan'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Satuan</label>
                        <input type="hidden" class="form-control" id="inputJenis" name="id_satuan" value="<?= $detailSatuan[0]['id_satuan']; ?>">
                        <input type="text" class="form-control <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputJenis" name="nama_satuan" required new="satuan_produk" value="<?= $detailSatuan[0]['nama_satuan']; ?>">
                        <?php if (session()->has('errors') && session('errors')['nama_satuan']) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors')['nama_satuan']; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        <?= $this->endSection(); ?>