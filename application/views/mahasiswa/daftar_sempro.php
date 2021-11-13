        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan untuk mengajukan pendaftaran seminar proposal skripsi</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengajuan seminar proposal</h6>
            </div>
            <div class="card-body">
              <?php if (!$validasi){
                if($skripsi['status']==1){?>
              <section class="hero-section spad">
                <div class="hero-text text-center">
                    <h2>Mendaftar Seminar Proposal</h2>
                </div>
                <hr>
                <div class="hero-info">
                  <h4>Data Skripsi</h4>
                  <div class="row">
                      <div class="col-lg-1">
                          <ul>
                              <li></li>
                          </ul>
                      </div>
                      <div class="col-lg-4">
                          <span>Judul Skripsi</span>
                      </div>
                      <div class="col-lg-7">
                          <?php if($skripsi['judul']){
                            echo '<span>'.$skripsi['judul'].'</span>';
                          }else{
                            echo '<span>tidak ada</span>';
                          }
                          ?>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-1">
                          <ul>
                              <li></li>
                          </ul>
                      </div>
                      <div class="col-lg-4">
                          <span>topik</span>
                      </div>
                      <div class="col-lg-7">
                        <?php if($skripsi['topik']){
                            echo '<span>'.$skripsi['ktopik'].'</span>';
                          }else{
                            echo '<span>tidak ada</span>';
                          }
                          ?>    
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-1">
                          <ul>
                              <li></li>
                          </ul>
                      </div>
                      <div class="col-lg-4">
                          <span>pembimbing 1</span>
                      </div>
                      <div class="col-lg-7">
                        <?php if($skripsi['pembimbing_1']){
                            echo '<span>'.$skripsi['npembimbing_1'].'</span>';
                          }else{
                            echo '<span>tidak ada</span>';
                          }
                          ?>    
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-1">
                          <ul>
                              <li></li>
                          </ul>
                      </div>
                      <div class="col-lg-4">
                          <span>pembimbing 2</span>
                      </div>
                      <div class="col-lg-7">
                        <?php if($skripsi['pembimbing_2']){
                            echo '<span>'.$skripsi['npembimbing_2'].'</span>';
                          }else{
                            echo '<span>tidak ada</span>';
                          }
                          ?>    
                      </div>
                  </div>
                  <form action="<?= base_url('Mahasiswa/ajukanSidang/');?>" method="POST" class="text-center">
                    <input type="hidden" name="id" value="<?= $skripsi['id']; ?>">
                    <input type="hidden" name="tipe" value="2">
                    <button class="btn btn-primary btn-xl" type="submit">Ajukan</button>
                  </form>
                </div>
              </section>
              
              <?php }else{ ?>
                <div class="alert alert-danger" role="alert">
                  <a>tidak dapat daftar seminar proposal hubungi admin</a>
                </div>
              <?php }
              }else{?>
                <div class="alert alert-danger" role="alert">
                <a>Menunggu persetujuan dosen</a>
              </div>
              <?php }?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
