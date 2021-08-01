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
                      <th>Id</th>
                      <th>Username</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($data as $users) : ?>
                      <tr>
                        <td><?= $users['username']; ?></td>
                        <td><?= $users['level']; ?></td>
                        <td>  
                            <a href="<?= base_url(); ?>admin/hapusdosen/<?= $users['username']; ?>" data-nama="<?=$users['username'];?>" class="btn btn-danger btn-sm deleteU"><i class="fa fa-fw fa-trash"></i> hapus</a>
                            <a href="<?= base_url(); ?>admin/ubahdosen/<?= $users['username']; ?>" data-toggle="modal" data-target="#userEdit<?=$users['username'];?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>ubah</a>
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
