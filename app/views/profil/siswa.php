<?php include '../app/views/templates/header.php'; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= urlTo('/public/img/'.$data['profil']['gambar']); ?>">
                </div>

                <h3 class="profile-username text-center"><?= $data['profil']['nama_siswa']; ?></h3>

                <p class="text-muted text-center"><?= $data['profil']['nama_kelas']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Spp Aktif</b> <label class="badge badge-info float-right"><?= $data['profil']['tahun']."(Rp. ".$data['profil']['nominal'].")"; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Nisn</b> <label class="badge badge-info float-right"><?= $data['profil']['nisn']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Nis</b> <label class="badge badge-info float-right"><?= $data['profil']['nis']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Nama Lengkap</b> <label class="badge badge-info float-right"><?= $data['profil']['nama_siswa']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Alamat</b> <label class="badge badge-info float-right"><?= $data['profil']['alamat_siswa']; ?></label>
                  </li>

                  <li class="list-group-item">
                    <b>Nomor HP</b> <label class="badge badge-info float-right"><?= $data['profil']['no_telepon_siswa']; ?></label>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#spp" data-toggle="tab">My SPP</a></li>
                  <li class="nav-item"><a class="nav-link" href="#profil" data-toggle="tab">Foto Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ganti Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                	<div class="active tab-pane" id="spp">
                		<table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SPP</th>
                    <th>Bulan</th>
                    <th>Status</th>
                    <th>Petugas</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php foreach ($data['pembayaran'] as $spp): ?>
                   	<tr>
                   		<td><?= $spp['tahun']; ?></td>
                   		<td><?= $spp['bulan_dibayar']; ?></td>
                   		<td>
                   			<?php if ($spp['jumlah_bayar'] === null): ?>
                   				<label class="badge btn-danger">Belum dibayar!</label>
                   			<?php elseif($spp['jumlah_bayar'] >= 0 && $spp['jumlah_bayar'] < $spp['nominal']): ?>
                   				<label class="badge btn-warning">Belum lunas (Sisa [Rp. <?= $spp['nominal'] - $spp['jumlah_bayar']; ?>])</label>
                   			<?php elseif($spp['jumlah_bayar'] === $spp['nominal']): ?>
                   				<label class="badge btn-info">Lunas!</label>
                   			<?php endif ?>
                   		</td>
                   		<td><?= $spp['nama_petugas']; ?></td>
                   	</tr>
                   <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SPP</th>
                    <th>Bulan</th>
                    <th>Status</th>
                    <th>Petugas</th>
                  </tr>
                  </tfoot>
                </table>
                	</div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="profil">
                    <form action="<?= urlTo('/profil/foto'); ?>" method="post" enctype="multipart/form-data">
                    	<div class="form-group">
                    		<div class="custom-file">
		                        <input type="file" name="gambar" class="custom-file-input" id="gambar" required>
		                        <label class="custom-file-label" for="gambar">Pilih gambar</label>
		                    </div>
                    	</div>

                    	<div class="form-group">
                    		<button class="btn btn-primary">Ganti Foto Profil</button>
                    	</div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?= urlTo('/profil/password'); ?>" method="post">
                      <div class="form-group row">
                        <label for="password-lama" class="col-sm-2 col-form-label">Password lama</label>
                        <div class="col-sm-10">
                          <input type="password" name="password-lama" class="form-control" id="password-lama" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password-baru" class="col-sm-2 col-form-label">Password baru</label>
                        <div class="col-sm-10">
                          <input type="password" name="password-baru" class="form-control" id="password-baru" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="konfirmasi-password-baru" class="col-sm-2 col-form-label">Konfirmasi Password baru</label>
                        <div class="col-sm-10">
                          <input type="password" name="konfirmasi-password-baru" class="form-control" id="konfirmasi-password-baru" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Ganti Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
<?php include '../app/views/templates/footer.php'; ?>