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

                <div class="form-group">
                	<form action="<?= urlTo('/siswa/'.$data['profil']['id_users'].'/reset'); ?>" method="post">
	                	<input type="hidden" name="password" value="<?= password_hash($data['profil']['nisn'], PASSWORD_DEFAULT); ?>">
	                	<button type="submit" class="btn btn-warning btn-block"><b>Reset Password</b></button>
	                </form>
                </div>

                <a href="<?= urlTo('/siswa'); ?>" class="btn btn-danger btn-block"><b>Kembali</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
            	<div class="card-header">
                <form action="<?= urlTo('/siswa/addspp'); ?>" method="post">
                  <input type="hidden" name="id_spp" value="<?= $data['profil']['id_spp']; ?>">
                  <input type="hidden" name="id_siswa" value="<?= $data['profil']['id_siswa']; ?>">
                  <button class="btn btn-success float-right">Tambah SPP</button>
                </form>
            		<h4>Spp</h4>
            	</div>

            	<div class="card-body">
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
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
<?php include '../app/views/templates/footer.php'; ?>