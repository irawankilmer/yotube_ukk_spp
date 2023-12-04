<?php include '../app/views/templates/header.php'; $no = 1; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="<?= urlTo('/siswa/create'); ?>" class="btn btn-primary float-right">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Photo</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $s): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $s['nisn']; ?></td>
                        <td><?= $s['nama_siswa']; ?></td>
                        <td><?= $s['nama_kelas']; ?></td>
                        <td>
                          <img height="50" src="<?= urlTo('/public/img/'.$s['gambar']); ?>" class="img-circle elevation-2" alt="User Image">
                        </td>
                        <td>
                          <a href="<?= urlTo('/siswa/'.$s['id_siswa'].'/detail'); ?>" class="btn btn-info">Detail</a>
                          <a href="<?= urlTo('/siswa/'.$s['id_siswa'].'/edit'); ?>" class="btn btn-warning">Edit</a>
                          <a href="<?= urlTo('/siswa/'.$s['id_users'].'/delete'); ?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
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