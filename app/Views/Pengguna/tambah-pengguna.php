<?= $this->extend('layout/template');?>
<?= $this->section('konten');?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-0">From Tambah Pengguna</h6>

      
      <form class="row g-3"  action="<?=site_url('simpan-pengguna');?>" method="POST">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Username</label>
          <input type="hidden" class="form-control" id="InputId" name="id_user">
          <input type="text" class="form-control <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputUsn" name="username" placeholder="Masukan Username" autofocus autocomplete="off">
          <?php if (session()->has('errors') && session('errors.username')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.username'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Nama Pengguna</label>
          <input type="text" class="form-control <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputNama" name="nama_user" placeholder="Masukan Nama Pengguna" autocomplete="off">
          <?php if (session()->has('errors') && session('errors.nama_user')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.nama_user'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Password</label>
          <input type="password" class="form-control <?= session()->has('errors') ? 'is-invalid' : null; ?>" id="inputPw" name="password" placeholder="Masukan Password" autocomplete="off">
          <?php if (session()->has('errors') && session('errors.password')) : ?>
                            <div class="invalid-feedback">
                                <p>
                                    <?= session('errors.password'); ?>
                                </p>
                            </div>
                        <?php endif; ?>
        </div>
        <div class="col-12">
        <label for="inputNanme4" class="form-label">Level</label>
        <select id="level" class="form-control" name="level">
                                <option selected>Admin</option>
                                <option>kasir</option>
                            </select>
        </div>
        <div class="text-left">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>

<?= $this->endSection();?>