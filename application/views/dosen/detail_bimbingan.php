        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan umtuk melakukan proses bimbingan skripsi</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 h-75">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bimbingan Skripsi
                <span class="float-right text-white mr-4">
                  <?php if(!$nilai){ ?><a href="" data-toggle="modal" data-target="#nilai" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Nilai</a> <?php } else{ ?>
                    <a class="m-0 font-weight-bold text-primary">Nilai : <?php echo $nilai."</a>";}?>
                </span>
              </h6>
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
                                Skripsi ini sudah diverivikasi oleh koordinator skripsi
                                <br>mohon bantuan dan bimbingannya kepada <?=$posting['data_skripsi'][0]['npembimbing_1'];?> dan <?=$posting['data_skripsi'][0]['npembimbing_2'];?>
                                <br>demi kelancaran proses skripsi dari awal sampai akhir skripsi ini dinyatakan lulus.
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
                    <div class="comment-area pb-5 hide" id="comment-area" >
                      <form action="<?= base_url($aktor)?>/komentar/" class="form-control" method="post">
                        <input name="id" type="hidden" value="<?=$posting['id']?>"></input>
                        <input name="page" type="hidden" value="<?=$aktor?>/detail_bimbingan/<?=$posting['id']?>"></input>
                        <textarea name="pesan" id="" placeholder="comment here ... "></textarea>
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
      <!-- modal penilaian -->
      <div class="modal fade displaycontent" id="nilai">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Penilaian Skripsi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>

                        <form action="<?= base_url('dosen/menilai/').$posting['id_skripsi']?>" method="POST">
                          <div class="modal-body">
                            <?php foreach($sasaran as $sas){ ?>
                              <div class="form-group">
                                <label for="<?=$sas['id']?>"><?=$sas['keterangan']?></label>
                                <div class="inputWithIcon">
                                  <input type="number" min="0" max="100" class="form-control" id="berkas" name="<?=$sas['id']?>" placeholder="Masukan Nilai" autocomplete="off" value = "">
                                </div>
                            </div>
                            <?php }?>
                          </div>
                          <div class="modal-footer">
                              <button class="btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">perbarui</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal detail -->
