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
				  	<?php if (empty($dosen) && empty($mhs)) : ?>
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
							<td><?= $u['username']; ?></td>
							<td>dosen</td>
							<td>
                            <a href="" data-toggle="modal" data-target="#userEdit<?= $u['nip'] ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                                <a href="<?= base_url() . 'admin/deleteU/' . $u['nip'] ?>" data-nama="<?= $u['username']; ?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i>Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
                    <?php foreach ($mhs as $u) : ?>
						<tr>
							<td scope="row"><?= ++$number; ?></td>
							<td><?= $u['username']; ?></td>
							<td>Mahasiswa</td>
							<td>
                            <a href="" data-toggle="modal" data-target="#userEdit<?= $u['nim'] ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                                <a href="<?= base_url() . 'admin/deleteU/' . $u['nim'] ?>" data-nama="<?= $u['username']; ?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i>Delete</a>
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
<?php foreach ($dosen as $u) : ?>

    <!-- Modal Edit -->
    <div class="modal fade" id="userEdit<?= $u['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="pelamarEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pelamarEditLabel">Edit Data Pelamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/updateU/' . $u['nip']); ?>" method="POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $u['username']; ?>" required>
                            <?= form_error('alamat', '<div class="alert-danger" role="alert">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Masukan Password" autocomplete="off">
                            <?= form_error('curpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
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

<?php foreach ($mhs as $u) : ?>

    <!-- Modal Edit -->
    <div class="modal fade" id="userEdit<?= $u['nim'] ?>" tabindex="-1" role="dialog" aria-labelledby="pelamarEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pelamarEditLabel">Edit Data Pelamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/updateU/' . $u['nim']); ?>" method="POST" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $u['username']; ?>" required>
                            <?= form_error('alamat', '<div class="alert-danger" role="alert">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Masukan Password" autocomplete="off">
                            <?= form_error('curpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
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