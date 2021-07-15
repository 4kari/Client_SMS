        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
          <p class="mb-4">Halaman ini akan membantu anda mengelola data user</a>.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                  <a href="" data-toggle="modal" data-target="#userBaru" class="btn btn-info btn-sm"><i class="fa fa-fw fa-plus"></i> Tambah</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>No</th>
						<th>Username</th>
						<th>Level</th>
						<th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
				  	<?php if (empty($users)) : ?>
						<tr>
							<td colspan="12">
								<div class="alert alert-danger" role="alert">
									Data not found!
								</div>
							</td>
						</tr>
					<?php endif; ?>
					
					<?php $number=0;
					foreach ($users as $u) : ?>
						<tr>
							<td scope="row"><?= ++$number; ?></td>
							<td><?= $u['username']; ?></td>
							<td><?= $u['level']; ?></td>
							<td>
								<a href="" data-toggle="modal" data-target="#userEdit<?= $u['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a href="<?= base_url() . 'administrator/deleteU/' . $u['id'] ?>" data-nama="<?= $u['username']; ?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i>Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

<?php foreach ($users as $u) :
?>
	<!-- Modal Edit -->
	<div class="modal fade" id="userEdit<?= $u['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="pelamarEditLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="pelamarEditLabel">Edit Data Pelamar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('administrator/updateU/' . $u['id']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" value="<?= $u['username']; ?>">
							<?= form_error('alamat', '<div class="alert-danger" role="alert">', '</div>'); ?>
						</div>
						<div class="form-group">
							<label for="level">Level</label>
							<select name="level" id="level" class="form-control">
								<?php foreach ($level as $l) {
									if ($u['level_id'] == $l['id']) {
										echo "<option value='$l[id]' selected>$l[level]</option>";
									} else {
										echo "<option value='$l[id]'>$l[level]</option>";
									}
								}
								?>

							</select>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="userBaru" tabindex="-1" role="dialog" aria-labelledby="userBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userBaruLabel">Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('administrator/tambahU'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control cekkarakter req" name="nama" id="nama" placeholder="Nama" required>
						<div class="invalid-feedback">
							Masukan Nama User
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control cekkarakter1 req1" name="username" id="username" placeholder="Username Akun" required>
						<div class="invalid-feedback">
							Masukan Username
						</div>
					</div>
					<div class="form-group">
						<select name="level" id="level" class="form-control" required>
							<?php foreach ($level as $l) : ?>
								<option value="<?= $l['id']; ?>"><?= $l['level']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#Tfile">tambah dengan file?</a>
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

<!-- Modal Tambah User Dengan File-->
<div class="modal fade" id="Tfile" tabindex="-1" role="dialog" aria-labelledby="userBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userBaruLabel">Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('administrator/tambahU'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<div class="name">Upload File Data User Baru</div>
							<div class="value">
								<div class="input-group js-input-file">
									<input class="input-file" type="file" name="file" id="file">
									<label class="label--file" for="file">Choose file</label>
									<span class="input-file__info">No file chosen</span>
								</div>
								<div class="label--desc">Upload file data (.Excel). Max file size
									2 MB</div>
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