<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<p>Selamat Datang <?= session()->get('nama_user'); ?></p>
<?php if ($akses == 'Admin') : ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Laporan Penjualan Harian</p>
                        <h6>Rp.<?php echo number_format($pendapatan_harian, 0, ',', '.'); ?></h6>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Jumlah Stok Produk</p>
                    <h6> <?php echo $total_stok ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Jumlah Stok Habis</p>
                    <h6> <?php echo $stok ?></h6>
                    <span class="text-danger small pt-1 fw-bold">Stok Produk Tidak Tersedia</span>
                </div>
            </div>
        </div>
    




                <?= $this->endSection(); ?>