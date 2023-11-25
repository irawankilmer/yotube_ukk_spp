<?php include '../app/views/templates/header.php'; ?>
<div class="col-md-6">
          <div class="card card-primary">
            <div class="card-body">
            	<form action="<?= urlTo('/spp/'.$data['id_spp'].'/update'); ?>" method="post">
              <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" id="tahun" name="tahun" class="form-control" value="<?= $data['tahun']; ?>" required>
              </div>

              <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" id="nominal" name="nominal" class="form-control" value="<?= $data['nominal']; ?>" required>
              </div>

              <div class="form-group">
                <a href="<?= urlTo('/spp'); ?>" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary float-right">Edit Data</button>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
<?php include '../app/views/templates/footer.php'; ?>