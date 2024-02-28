<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>

<p>Selamat Datang <?= session()->get('nama_user');?></p>

<?= $this->endSection();?>