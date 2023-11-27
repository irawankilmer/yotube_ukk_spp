<?php include '../app/views/templates/header.php'; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= urlTo('/public/img/'.$data['gambar']); ?>">
                </div>

                <h3 class="profile-username text-center"><?= $data['username']; ?></h3>

                <p class="text-muted text-center"><?= $data['level']; ?></p>

                <a href="<?= urlTo('/petugas') ?>" class="btn btn-warning btn-block"><b>Kembali</b></a>

                <form action="<?= urlTo('/petugas/'.$data['id_user'].'/reset'); ?>" method="post">
                	<div class="form-group">
                		<input type="hidden" name="password" value="<?= password_hash($data['level'].'123', PASSWORD_DEFAULT); ?>">
                		<button type="submit" class="btn btn-info btn-block">Reset Password</button>
                	</div>
                </form>
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
            		<h4>Profil</h4>
            	</div>

            	<div class="card-body">
            		<div class="form-group">
            			<label>Nama Lengkap : </label>
            			<label class="badge badge-info"><?= $data['nama_petugas']; ?></label>
            		</div>

            		<div class="form-group">
            			<label>Nomor HP : </label>
            			<label class="badge badge-success"><?= $data['no_hp_petugas']; ?></label>
            		</div>

            		<div class="form-group">
            			<label>Alamat : </label>
            			<label class="badge badge-warning"><?= $data['alamat_petugas']; ?></label>
            		</div>
            	</div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
<?php include '../app/views/templates/footer.php'; ?>