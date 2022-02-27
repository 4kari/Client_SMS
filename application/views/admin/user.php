        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk memudahkan pengelolaan data user</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>username</th>
                      <th>level</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Username</th>
                      <th>level</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($data as $users) : ?>
                      <tr>
                        <td><?= $users['username']; ?></td>
                        <td><?= $users['levelket']; ?></td>
                        <td><a href="<?= base_url(); ?>admin/hapusUser/<?= $users['username']; ?>" data-nama="<?=$users['username'];?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i> hapus</a>
                            <a href="" data-toggle="modal" data-target="#ubahUser<?=$users['username'];?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>ubah</a>
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
<?php foreach ($data as $users) : ?>
<!-- modal ubah user -->
<div class="modal fade" id="ubahUser<?=$users['username'];?>" tabindex="-1" role="dialog" aria-labelledby="ubahUserLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ubahUserLabel">Ubah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('Admin/UpdateUser'); ?>" method="POST" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
						<div class="invalid-feedback">
              <?=$users['username'];?>
						</div>
					</div>
					<div class="form-group">
            <select name="level" id="level" class="form-control">
              <?php foreach ($level as $l) {
                  if ($l['level']==$users['level']){
                    echo "<option value='$l[id]' selected>$l[level]</option>";
                  }else{
                    echo "<option value='$l[id]'>$l[level]</option>";
                  }
                }
              ?>
            </select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>


			</form>

		</div>
	</div>
</div>
<?php endforeach;?>