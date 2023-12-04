<?php include '../app/views/templates/header.php'; ?>
<form action="<?= urlTo('/siswa/store'); ?>" method="post">
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
                <label for="nisn">Nisn</label>
                <input type="text" id="nisn" name="nisn" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="nis">Nis</label>
                <input type="text" id="nis" name="nis" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="nama_siswa">Nama Lengkap</label>
                <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="alamat_siswa">Alamat</label>
                <textarea id="alamat_siswa" name="alamat_siswa" class="form-control" rows="4"></textarea>
              </div>

              <div class="form-group">
                <label for="no_telepon_siswa">Nomor HP</label>
                <input type="text" id="no_telepon_siswa" name="no_telepon_siswa" class="form-control" required>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Info</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="id_spp">SPP</label>
                <select id="id_spp" name="id_spp" class="form-control custom-select">
                  <?php foreach ($data['spp'] as $spp): ?>
                  	<option value="<?= $spp['id_spp']; ?>"><?= $spp['tahun']; ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select id="id_kelas" name="id_kelas" class="form-control custom-select">
                  <?php foreach ($data['kelas'] as $kelas): ?>
                  	<option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['nama_kelas']; ?></option>
                  <?php endforeach ?>
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
          <a href="<?= urlTo('/siswa'); ?>" class="btn btn-danger">Batal</a>
          <input type="submit" value="Tambah Data" class="btn btn-primary float-right">
        </div>
      </div>
</form>
<?php include '../app/views/templates/footer.php'; ?>