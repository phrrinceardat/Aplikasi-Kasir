<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-0">Form Tambah Produk</h6>
                <form action="<?= site_url('simpan-produk'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Kode Produk</label>
                        <input type="hidden" class="form-control" id="InputProduk" name="id_produk">
                        <input type="text" class="form-control <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputkode" name="kode_produk"  placeholder="Masukan Kode Produk" autofocus autocomplete="off">
                        <?php if (session()->has('errors') && session('errors.kode_produk')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.kode_produk'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control  <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputProduk" name="nama_produk"  placeholder="Masukan Nama Produk" autofocus autocomplete="off">
                        <?php if (session()->has('errors') && session('errors.nama_produk')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.nama_produk'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Harga Beli</label>
                        <input type="text" class="form-control uang  <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputHb" name="harga_beli"  placeholder="Masukan Harga Beli" autofocus autocomplete="off">
                        <?php if (session()->has('errors') && session('errors.harga_beli')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.harga_beli'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Harga Jual</label>
                        <input type="text" class="form-control uang  <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputHj" name="harga_jual"  placeholder="Masukan Harga Jual" autofocus autocomplete="off">
                        <?php if (session()->has('errors') && session('errors.harga_jual')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.harga_jual'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Satuan Produk</label>
                        <select class="form-control" id="inputSatuan" name="jenis_satuan">
                            <?php

                            if (isset($listSatuan)) {
                                $no = null;
                                foreach ($listSatuan as $baris) {
                                    $no++;

                                    echo '<option value="' . $baris['id_satuan'] . '">' . $baris['nama_satuan'] . '</option>';
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputName" class="form-label">Kategori Produk</label>
                        <select class="form-control" id="inputJenis" name="jenis_kategori">
                            <?php

                            if (isset($listKategori)) {
                                $no = null;
                                foreach ($listKategori as $baris) {
                                    $no++;

                                    echo '<option value="' . $baris['id_kategori'] . '">' . $baris['nama_kategori'] . '</option>';
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Stok</label>
                        <input type="text" class="form-control barang  <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputStok" name="stok"  placeholder="Masukan Nama Stok" autofocus autocomplete="off">
                        <?php if (session()->has('errors') && session('errors.stok')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.stok'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>