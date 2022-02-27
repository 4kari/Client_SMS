        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk melihat beban dosen</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?>
                <span class="float-right text-white mr-4">
                  <!-- <a data-toggle="modal" data-target="#TambahDosen" class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i>tambah</a> -->
                  <!-- <a data-toggle="modal" data-target="#ImportDosen" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i>import</a> -->
                </span>
              </h6>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Beban</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIP</th>
                      <th>NAMA</th>
                      <th>Beban</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($dosen as $dosen) : ?>
                      <tr>
                        <td><?= $dosen['nip']; ?></td>
                        <td><?= $dosen['nama']; ?></td>
                        <td><?= $dosen['beban']; ?>
                        </td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- modal tambah -->
<div class="modal fade" id="TambahDosen" tabindex="-1" role="dialog" aria-labelledby="dosenBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="dosenBaruLabel">Tambah Dosen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('Admin/tambahdosen'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="nip" id="nip" placeholder="NIP Dosen" required>
						<div class="invalid-feedback">
							Masukan NIP Dosen
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control validate" name="nama" id="nama" placeholder="Nama Dosen" required>
						<div class="invalid-feedback">
							Masukan Nama Dosen
						</div>
					</div>
					<div class="form-group">
            <select name="prodi" id="prodi" class="form-control">
              <?php foreach ($prodi as $p) {
                  echo "<option value='$p[kode_prodi]'>$p[prodi]</option>";
                }
              ?>
            </select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>


			</form>

		</div>
	</div>
</div>


<!-- modal import -->
<div class="modal fade" id="ImportDosen" tabindex="-1" role="dialog" aria-labelledby="DosenLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="DosenLabel">Tambah Dosen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('Admin/importDosen'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="file" class="form-control" name="file" id="file" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambahkan</button>
				</div>
			</form>
		</div>
	</div>
</div>