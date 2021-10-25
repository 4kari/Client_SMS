        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk melihat detail skripsi mahasiswa</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Skripsi</h6>
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
                      <?php foreach ($skripsi as $sk) :?>
                        <tr>
                          <?php
                            if($sk['judul']==null){
                              echo "<td>belum ada</td>";
                            }else{
                              echo "<td>$sk[judul]</td>";
                            }
                            
                            echo "<td>$sk[ktopik]</td>";

                            if($sk['judul']==null){
                              echo "<td>belum ada</td>";
                            }else{
                              echo "<td> $sk[nilai] </td>";
                            }
                          ?>
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
      <?php foreach ($skripsi as $sk) : ?>
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
                                  <?php
                                    echo "<tr>";
                                      echo "<td>judul</td>";
                                      if($sk['judul']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>$sk[judul]</td>";
                                      }
                                    echo "</tr>";

                                    echo "<tr>";
                                      echo "<td>topik</td>";
                                      echo "<td>$sk[ktopik]</td>";
                                    echo "</tr>";
                                    
                                    echo "<tr>";
                                      echo "<td>nilai</td>";
                                      if($sk['nilai']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>$sk[nilai]</td>";
                                      }
                                    echo "</tr>";

                                    echo "<tr>";
                                      echo "<td>pembimbing_1</td>";
                                      if($sk['pembimbing_1']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>$sk[npembimbing_1]</td>";
                                      }
                                    echo "</tr>";
                                    
                                    echo "<tr>";
                                      echo "<td>pembimbing_2</td>";
                                      if($sk['pembimbing_2']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>$sk[npembimbing_2]</td>";
                                      }
                                    echo "</tr>";

                                    echo "<tr>";
                                      echo "<td>status</td>";
                                      if($sk['status']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>$sk[kstatus]</td>";
                                      }
                                    echo "</tr>";

                                    echo "<tr>";
                                      echo "<td>nilai</td>";
                                      if($sk['nilai']==null){
                                        echo "<td>belum ada</td>";
                                      }else{
                                        echo "<td>$sk[nilai]</td>";
                                      }
                                    echo "</tr>";
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal detail -->
    <?php endforeach; ?>
