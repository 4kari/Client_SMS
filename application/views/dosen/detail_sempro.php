        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan umtuk melakukan proses seminar proposal</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 h-75">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Seminar Proposal
                <span class="float-right text-white mr-4">
                  <?php if($validasi[$posisi]==null){?>
                    <a href="<?= base_url($aktor); ?>/valAcara/?id=<?= $posting['id_skripsi']; ?>&&posisi=<?= $posisi; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-check"></i>validasi</a>
                  <?php } ?>
                </span>
              </h4>
            </div>
            <div class="card-body">
              <div class="row mb-5">
                <div class="col-lg">
                  <!--Topic Section-->
                    <div class="topic-container">
                        <!--Original thread-->
                        <?php if (empty($posting)){ //cek keberadaan postingan?>
                          <div class="alert alert-danger" role="alert">
                            <a>Data not found!</a>
                          </div>
                        <?php }else{ ?>

                        <div class="head">
                            <div class="authors">Judul Skripsi</div>
                            <?php if ($posting['data_skripsi'][0]['judul']){
                              echo " <div class='content'>Judul Skripsi : ".$posting['data_skripsi'][0]['judul']."</div>";
                            }else{
                              echo " <div class='content'>Judul Skripsi : Belum ada</div>";
                            }?>
                        </div>

                        <div class="body-forum">
                            <div class="authors">
                                <div class="username"><a href=""><?=$posting['data_skripsi'][0]['nama'];?></a></div>
                                <div><?= $posting['data_skripsi'][0]['ktopik']; ?></div>
                                <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="foto user">
                                <div>nim <u><?=$posting['data_skripsi'][0]['nim'];?></u></div>
                                <div>status: <u><?=$posting['data_skripsi'][0]['kstatus'];?></u></div>
                                <div>file: <u><?=$posting['data_skripsi'][0]['berkas'];?></u></div>

                            </div>
                            <div class="content">
                                Proposal skripsi ini sudah dapat diseminarkan
                                <br>mohon bantuan pelaksanaan seminar proposal kepada 
                                <br><?=$posting['data_skripsi'][0]['npembimbing_1'];?> dan <?=$posting['data_skripsi'][0]['npembimbing_2'];?> sebagai pembimbing
                                <br><?=$posting['data_skripsi'][0]['npenguji_1'];?>, <?=$posting['data_skripsi'][0]['npenguji_2'];?> dan <?=$posting['data_skripsi'][0]['npenguji_3'];?> sebagai penguji
                                <br>demi kelancaran proses pelaksanaan skripsi ini.
                                <hr>
                                Terimakasih atas perhatiannya
                                <br>
                                <div class="comment">
                                    <button onclick="showComment()">Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Comment Area-->
                    <div class="comment-area pb-5 hide" id="comment-area">
                      <form action="<?= base_url('Mahasiswa/komentar/')?>" class="form-control">

                        <textarea name="comment" id="" placeholder="comment here ... "></textarea>
                        <input type="checkbox" id="catatan" name="catatan" value="1">
                        <!-- <label for="catatan" class="d-flex flex-row-reverse">Catatan &nbsp; </label> untuk dosen -->
                        <input type="submit" value="submit">
                      </form>
                    </div>
                    
                    <?php if ($komentar){ //cek komentar
                      foreach($komentar as $k) : ?>
                    <!--Comments Section-->
                    <div class="comments-container p-2">
                        <div class="body">
                            <div class="authors">
                                <div class="username"><a href=""><?=$k['npengirim']?></a></div>
                                <div><?= $k['pengirim']?> </div>
                                <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                            </div>
                            <div class="content">
                                <?= $k['pesan'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;
                    } //penutup komentar
                  } //penutup adanya postingan ?>

                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
