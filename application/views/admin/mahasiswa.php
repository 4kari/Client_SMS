        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk memudahkan pengelolaan data mahasiswa</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?></h6>
              <a href="" data-toggle="modal" data-target="#TambahMhs" class="btn btn-success btn-sm mr-4 float-right"><i class="fa fa-fw fa-plus"></i>tambah</a></h6>
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
                        <td><a href="<?= base_url(); ?>admin/hapus/<?= $mhs['nim']; ?>" data-nama="<?=$mhs['nim'];?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i> hapus</a>
                            <a href="<?= base_url(); ?>admin/ubah/<?= $mhs['nim']; ?>" data-toggle="modal" data-target="#userEdit<?=$mhs['username'];?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>ubah</a>
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
<div class="modal fade" id="TambahMhs" tabindex="-1" role="dialog" aria-labelledby="dosenBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="dosenBaruLabel">Tambah Dosen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('Admin/tambahmahasiswa'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="nim" id="nim" placeholder="NIM Mahasiswa" required>
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
						<input type="email" class="form-control validate" name="email" id="email" placeholder="Email Dosen">
						<div class="invalid-feedback">
							Masukan Nama Dosen
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