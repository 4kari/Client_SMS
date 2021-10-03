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
						<th>Topik</th>
						<th>Pembimbing 1</th>
						<th>Pembimbing 2</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
				  	<?php if (empty($topik)) : ?>
						<tr>
							<td colspan="12">
								<div class="alert alert-danger" role="alert">
									Data not found!
								</div>
							</td>
						</tr>
					<?php endif; ?>
					
					<?php $number=0;
					foreach ($topik as $t) : ?>
						<tr>
							<td scope="row"><?= ++$number; ?></td>
							<td><?= $t['topik']; ?></td>
              <td><?= $t['pembimbing_1']; ?></td>
              <td><?= $t['pembimbing_2']; ?></td>
							<td>
              <a href="" data-toggle="modal" data-target="#topikEdit<?= $t['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Ubah</a>
              <a href="<?= base_url($aktor) . '/validasi_topik/' . $t['id'] ?>"class="btn btn-success btn-sm"><i class="fa fa-fw fa-check"></i>Validasi</a>
              <a href="<?= base_url($aktor) . '/hapus_topik/' . $t['id'] ?>" data-nama="<?= $t['id']; ?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i>Delete</a>
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
<?php foreach ($topik as $t) : ?>

    <!-- Modal Edit -->
    <div class="modal fade" id="topikEdit<?= $t['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="LabelEditTopik" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditTopik">Ubah data pembimbing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url($aktor.'/ubah_topik/');?>" method="POST" class="needs-validation" novalidate>
                    <input type="text" name="nim" value="<?= $t['nim']; ?>" hidden required> 
                    <input type="text" name="id" value="<?= $t['id']; ?>" hidden required> 
                    <input type="text" name="status" value="<?= $t['status']; ?>" hidden required> 
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="topik">Topik</label>
                            <input type="text" class="form-control" id="topik" name="topik" value="<?= $t['topik']; ?>" required>
                            <?= form_error('topik', '<div class="alert-danger" role="alert">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="topik">dosen pembimbing 1</label>
                            <input type="text" class="form-control" id="pembimbing_1" name="pembimbing_1" value="<?= $t['pembimbing_1']; ?>" required>
                            <?= form_error('pembimbing_1', '<div class="alert-danger" role="alert">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="topik">Dosen pembimbing 2</label>
                            <input type="text" class="form-control" id="pembimbing_2" name="pembimbing_2" value="<?= $t['pembimbing_2']; ?>" required>
                            <?= form_error('pembimbing_2', '<div class="alert-danger" role="alert">', '</div>'); ?>
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