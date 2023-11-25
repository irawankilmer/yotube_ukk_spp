<?php include '../app/views/templates/header.php'; $no = 1; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="<?= urlTo('/kelas/create'); ?>" class="btn btn-primary float-right">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data as $kelas): ?>
                  	<tr>
                  		<td><?= $no; ?></td>
                  		<td><?= $kelas['nama_kelas']; ?></td>
                  		<td><?= $kelas['kompetensi_keahlian']; ?></td>
                  		<td>
                  			<a href="<?= urlTo('/kelas/'.$kelas['id_kelas'].'/edit') ?>" class="btn btn-warning">Edit</a>
                  			<a href="<?= urlTo('/kelas/'.$kelas['id_kelas'].'/delete') ?>" class="btn btn-danger float-right">Hapus</a>
                  		</td>
                  	</tr>
                  	<?php $no++; ?>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Kompetensi Keahlian</th>
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