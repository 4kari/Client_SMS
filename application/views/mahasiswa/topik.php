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
              <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                  <form action="<?= base_url('Mahasiswa/ajukan_topik');?>" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN" >
                      <!-- topik input-->
                      <div class="form-floating mb-3">
                      <label for="topik">topik</label>
                      <select name="topik" id="topik" class="form-control">
                          <?php foreach ($topik as $t) {
                              echo "<option value='$t[id]'>$t[topik]</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <!-- Dosbing 1 input-->
                      <div class="form-floating mb-3">
                      <label for="dosbing1">Dosen Pembimbing 1</label>
                      <select name="dosbing1" id="dosbing1" class="form-control">
                          <?php foreach ($dosen as $d) {
                              echo "<option value='$d[nip]'>$d[nama]</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <!-- Dosbing 2 input-->
                      <div class="form-floating mb-3">
                      <label for="dosbing2">Dosen Pembimbing 2</label>
                      <select name="dosbing2" id="dosbing2" class="form-control">
                          <?php foreach ($dosen as $d) {
                              echo "<option value='$d[nip]'>$d[nama]</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <!-- Submit Button-->
                      <button class="btn btn-primary btn-xl" type="submit">Ajukan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
