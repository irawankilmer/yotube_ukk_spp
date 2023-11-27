<?php include '../app/views/templates/header.php'; ?>
<form action="<?= urlTo('/petugas/store'); ?>" method="post">
<div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Profil</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="nama_petugas">Nama Lengkap</label>
                <input type="text" id="nama_petugas" name="nama_petugas" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="no_hp_petugas">Nomor HP</label>
                <input type="text" id="no_hp_petugas" name="no_hp_petugas" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="alamat_petugas">Alamat</label>
                <textarea id="alamat_petugas" name="alamat_petugas" class="form-control" rows="4"></textarea>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Account</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="level">level</label>
                <select id="level" name="level" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="1">Admin</option>
                  <option value="2">Petugas</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="<?= urlTo('/petugas'); ?>" class="btn btn-danger">Batal</a>
          <input type="submit" value="Tambah Data" class="btn btn-primary float-right">
        </div>
      </div>
</form>
<?php include '../app/views/templates/footer.php'; ?>