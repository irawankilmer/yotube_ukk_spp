<?php include '../app/views/templates/header.php'; $no = 1; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="<?= urlTo('/petugas/create'); ?>" class="btn btn-primary float-right">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Level Petugas</th>
                    <th>Photo</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data as $petugas): ?>
                  	<tr>
                  		<td><?= $no; ?></td>
                  		<td><?= $petugas['nama_petugas']; ?></td>
                  		<td><?= $petugas['level']; ?></td>
                  		<td>
                  			<img height="50" src="<?= urlTo('/public/img/'.$petugas['gambar']); ?>" class="img-circle elevation-2">
                  		</td>
                  		<td>
                  			<a href="<?= urlTo('/petugas/'.$petugas['id_user'].'/detail') ?>" class="btn btn-info">Detail</a>
                  			<a href="<?= urlTo('/petugas/'.$petugas['id_user'].'/edit') ?>" class="btn btn-warning">Edit</a>
                  			<a href="<?= urlTo('/petugas/'.$petugas['id_user'].'/delete') ?>" class="btn btn-danger">Hapus</a>
                  		</td>
                  	</tr>
                  	<?php $no++; ?>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Level Petugas</th>
                    <th>Photo</th>
                    <th>Tindakan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
<?php include '../app/views/templates/footer.php'; ?>