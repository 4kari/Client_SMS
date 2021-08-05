<?php
$data=[
  [
    'id'=>'0',
    'judul'=>"Rekayasa Perangkat Lunak",
    'abstrak'=>"ble ble ble",
    'topik'=>"Rekayasa Perangkat Lunak", //cek kayak id dan topik
    'nilai'=>'0'
    ]
];

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk mengajukan topik yang akan dibahas pada skripsi</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengajuan Topik</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Topik</th>
                        <th>Nilai</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $sk) : ?>
                        <tr>
                          <td><?= $sk['judul']; ?></td>
                          <td><?= $sk['topik']; ?></td>
                          <td><?= '0' ?></td>
                          <td>
                            <a href="<?= base_url(); ?>Mahasiswa/detail_skripsi/<?= $sk['id']; ?>" data-toggle="modal" data-target="#detail<?=$sk['id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-eye"></i>lihat</a>
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

      <!-- Modal -->
      <?php foreach ($data as $sk) : ?>
            <!-- modal detail -->
            <div class="modal fade displaycontent" id="detail<?= $sk['id'] ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Skripsi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Judul</td>
                                        <td><?php echo $sk['judul']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Topik</td>
                                        <td><?php echo $sk['topik']; ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Dosen Pembimbing 1</td>
                                        <td><?php echo $sk['dosbing1']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dosen Pembimbing2</td>
                                        <td><?php echo $sk['dosbing2']; ?></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>status</td>
                                        <td><?php echo $sk['status']; //dicek nanti?></td>
                                    </tr> -->
                                    <tr>
                                        <td>Nilai</td>
                                        <?php if ($sk['nilai'] != 0) : ?>
                                            <td><?= $sk['nilai']; ?></td>
                                        <?php else : ?>
                                            <td>N/A</td>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal detail -->
    <?php endforeach; ?>
