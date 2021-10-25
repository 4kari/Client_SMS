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
                        <?php if (empty($posting)){ ?>
                          <div class="alert alert-danger" role="alert">
                            <a>Data not found!</a>
                          </div>
                        <?php }else{ ?>
                          <div class="authors">
                            <?php if ($skripsi['judul']){
                              echo " <a class='title h3'>Judul Skripsi : ".$skripsi['judul']."</a>";
                            }else{
                              echo " <a class='title h3'>Judul Skripsi : Belum ada</a>";
                            }?>
                          </div>

                        <div class="head">
                            <div class="authors">Author</div>
                            <div class="content">Topic: random topic (Read 1325 Times)</div>
                        </div>

                        <div class="body">
                            <div class="authors">
                                <div class="username"><a href="">Username</a></div>
                                <div>Role</div>
                                <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                                <div>Posts: <u>45</u></div>
                                <div>Points: <u>4586</u></div>
                            </div>
                            <div class="content">
                                Just a random content of a random topic.
                                <br>To see how it looks like.
                                <br><br>
                                Nothing more and nothing less.
                                <br>
                                <hr>
                                Regards username
                                <br>
                                <div class="comment">
                                    <button onclick="showComment()">Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Comment Area-->
                    <div class="comment-area hide" id="comment-area">
                        <textarea name="comment" id="" placeholder="comment here ... "></textarea>
                        <input type="submit" value="submit">
                    </div>

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
                        <textarea name="reply" id="" placeholder="reply here ... "></textarea>
                        <input type="submit" value="submit">
                    </div>


                    <!--Another Comment With replies-->
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
                        <textarea name="reply" id="" placeholder="reply here ... "></textarea>
                        <input type="submit" value="submit">
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
