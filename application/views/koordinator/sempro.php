        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk melihat data sempro</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelola <?=$judul;?>
                <span class="float-right text-white mr-4">
                  <!-- <a data-toggle="modal" data-target="#TambahDosen" class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i>tambah</a> -->
                  <!-- <a data-toggle="modal" data-target="#ImportDosen" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i>import</a> -->
                </span>
              </h6>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>judul</th>
                      <th>tanggal</th>
                      <th>waktu</th>
                      <th>ruangan</th>
                      <th>periode</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>judul</th>
                      <th>tanggal</th>
                      <th>waktu</th>
                      <th>ruangan</th>
                      <th>periode</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php if($Jsempro){ foreach ($Jsempro as $s): if($s['tipe']==1){?>
                    <tr>
                      <?php if($s['data_skripsi']['judul']){
                        echo "<td>".$s['data_skripsi']['judul']."</td>";
                      }else{
                        echo "<td>belum ada</td>";
                      }
                      ?>
                      <td><?= $s['tanggal'] ?></td>
                      <td><?= $s['kwaktu'] ?></td>
                      <td><?= $s['kruangan'] ?></td>
                      <td><?= $s['kperiode'] ?></td>
                      </tr>
                    <?php } endforeach;}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->