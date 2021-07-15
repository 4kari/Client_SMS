<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
          <p class="mb-4">Halaman ini akan membantu anda mengelola data mahasiswa</a>.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
                </div>

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th scope="col">No</th>
						<th scope="col">NIP</th>
						<th scope="col">Nama</th>
						<th scope="col">Program Studi</th>
						<th scope="col">Username</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($dosen)) : ?>
						<tr>
							<td colspan="12">
								<div class="alert alert-danger" role="alert">
									Data not found!
								</div>
							</td>
						</tr>
					<?php endif; ?>
					<?php $number=0;
					foreach ($dosen as $u) : ?>
						<tr>
							<td scope="row"><?= ++$number; ?></td>
							<td><?= $u['nip']; ?></td>
							<td><?= $u['nama']; ?></td>
							<td><?= $u['prodi']; ?></td>
							<td><?= $u['username']; ?></td>
							<td>
								<a href="" data-toggle="modal" data-target="#dosen<?= $u['nip'] ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a href="<?= base_url() . 'admin/deleteDosen/' . $u['nip'] ?>" data-nama="<?= $u['nama']; ?>" class="btn btn-danger btn-sm deleteDosen"><i class="fa fa-fw fa-trash"></i>Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>


			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php foreach ($dosen as $u) : ?>

	<!-- Modal Edit -->
	<div class="modal fade" id="dosen<?= $u['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="dosenlabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="dosenlabel">Edit Data Pelamar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin/updateDosen/' . $u['nip']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" class="form-control" id="nip" name="nip" value="<?= $u['nip']; ?>">
							<?= form_error('nip', '<div class="alert-danger" role="alert">', '</div>'); ?>
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?= $u['nama']; ?>">
							<?= form_error('nama', '<div class="alert-danger" role="alert">', '</div>'); ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php endforeach; ?>
<!-- Modal Tambah dosen -->
<div class="modal fade" id="dosenBaru" tabindex="-1" role="dialog" aria-labelledby="dosenBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="dosenBaruLabel">Tambah Dosen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('admin/daftarDosen'); ?>" method="POST" class="needs-validation" novalidate>
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