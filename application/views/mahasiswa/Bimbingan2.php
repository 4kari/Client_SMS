        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$judul;?></h1>
          <p class="mb-4">halaman ini digunakan umtuk melakukan proses bimbingan skripsi</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 h-75">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bimbingan Skripsi</h6>
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
                            <?php if ($skripsi['judul']){
                              echo " <div class='content'>Judul Skripsi : ".$skripsi['judul']."</div>";
                            }else{
                              echo " <div class='content'>Judul Skripsi : Belum ada</div>";
                            }?>
                        </div>

                        <div class="body-forum">
                            <div class="authors">
                                <div class="username"><a href=""><?=$skripsi['nama'];?></a></div>
                                <div><?= $skripsi['ktopik']; ?></div>
                                <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="foto user">
                                <div>nim <u><?=$skripsi['nim'];?></u></div>
                                <div>status: <u><?=$skripsi['kstatus'];?></u></div>
                            </div>
                            <div class="content">
                                Skripsi ini sudah diverivikasi oleh koordinator skripsi
                                <br>mohon bantuan dan bimbingannya kepada <?=$skripsi['npembimbing_1'];?> dan <?=$skripsi['npembimbing_2'];?>
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
                    <div class="comment-area hide" id="comment-area">
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
                    <div class="comments-container">
                        <div class="body">
                            <div class="authors">
                                <div class="username"><a href="">AnotherUser</a></div>
                                <div>Role</div>
                                <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                                <div>Posts: <u>455</u></div>
                                <div>Points: <u>4586</u></div>
                            </div>
                            <div class="content">
                                Just a comment of the above random topic.
                                <br>To see how it looks like.
                                <br><br>
                                Nothing more and nothing less.
                                <br>
                                <br>
                                <div class="comment">
                                    <button onclick="showReply()">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Reply Area-->
                    <div class="comment-area hide" id="reply-area">
                      <form action="<?= base_url('Mahasiswa/reply/')?>">
                        <textarea name="komentar" id="" placeholder="reply here ... "></textarea>



                        <input type="submit" value="submit">
                      </form>
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
