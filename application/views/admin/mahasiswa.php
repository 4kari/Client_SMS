        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk memudahkan pengelolaan data mahasiswa</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?>
                <span class="float-right text-white mr-4">
                  <a href="" data-toggle="modal" data-target="#TambahMhs" class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i>tambah</a>
                  <a href="" data-toggle="modal" data-target="#ImportMhs" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i>import</a>
                </span>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nim</th>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($data as $mhs) : ?>
                      <tr>
                        <td><?= $mhs['nim']; ?></td>
                        <td><?= $mhs['nama']; ?></td>
                        <td><a href="<?= base_url(); ?>admin/hapusMhs/<?= $mhs['nim']; ?>" data-nama="<?=$mhs['nim'];?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i> hapus</a>
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
<div class="modal fade" id="TambahMhs" tabindex="-1" role="dialog" aria-labelledby="MahasiswaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="MahasiswaLabel">Tambah Mahasiswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('Admin/tambahmahasiswa'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="nim" id="nim" placeholder="NIM Mahasiswa" required>
						<div class="invalid-feedback">
							Masukan NIM Mahasiswa
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control validate" name="nama" id="nama" placeholder="Nama Mahasiswa" required>
						<div class="invalid-feedback">
							Masukan Nama Mahasiswa
						</div>
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
<div class="modal fade" id="ImportMhs" tabindex="-1" role="dialog" aria-labelledby="MahasiswaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="MahasiswaLabel">Tambah Mahasiswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('Admin/importMahasiswa'); ?>" method="POST" class="needs-validation" novalidate>
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