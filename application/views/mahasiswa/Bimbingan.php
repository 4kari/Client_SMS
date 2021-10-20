<?php
$post=[
  ['id'=>'0', 'judul'=>"Rekayasa Perangkat Lunak", 'file'=>'coba.pdf', 'tipe' => 1, 'tanggal_dibuat'=>'19/10/2021'],
  ['id'=>'1', 'judul'=>"Rekayasa Perangkat Lunak", 'file'=>'coba.pdf', 'tipe' => 1, 'tanggal_dibuat'=>'19/10/2021'],
  ['id'=>'2', 'judul'=>"Rekayasa Perangkat Lunak", 'file'=>'coba.pdf', 'tipe' => 1, 'tanggal_dibuat'=>'19/10/2021']
];
?>
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
              <?php if (empty($post)){ ?>
                <div id="primary" class="content-area">
                <div class="layout social"> 
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-8 col-main">
                        <main id="main" class="main-content">
                          <div class="beehive-title-bar social">
                            <div class="title-bar-wrapper">
                              <div class="title-wrapper screen-reader-text">
                                <div class="alert alert-danger" role="alert">
                                  Data not found!
                                </div>
                              </div>
                            </div>
                          </div>
                        </main><!-- #main -->
                      </div><!-- .col-main -->
              <?php }else{ ?>
              <div id="primary" class="content-area">
                <div class="layout social"> 
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-8 col-main">
                        <main id="main" class="main-content">
                          <div class="beehive-title-bar social">
                            <div class="title-bar-wrapper">
                              <div class="title-wrapper screen-reader-text">
                                <h1 class="title h3">Bimbingan Skripsi</h1>
                              </div>
                            </div>
                          </div>
                          <article id="post-0" class="bp_activity type-bp_activity post-0 page type-page status-publish hentry beehive-post">
                            <div class="entry-content clearfix">
                              <div id="buddypress" class="buddypress-wrap beehive bp-dir-hori-nav alignwide">
                                <div class="screen-content">
                                  <div id="activity-stream" class="activity" data-bp-list="activity" style="display:block">
                                    <ul class="activity-list item-list bp-list">
                                      <li class="groups bbp_reply_create activity-item date-recorded-1628175393 animate-item slideInUp" id="activity-7124" data-bp-activity-id="7124" data-bp-timestamp="1628175393" style="visibility: visible; animation-name: slideInUp;">
                                        <div class="activity-avatar item-avatar">
                                          <a href="https://mythemestore.com/beehive-preview/members/user/">
                                            <!-- <img loading="lazy" src="https://mythemestore.com/beehive-preview/wp-content/uploads/avatars/3/61012508a58db-bpfull.jpg" class="avatar user-3-avatar avatar-200 photo" width="200" height="200" alt="Profile picture of John Doe"> -->
                                          </a>
                                        </div>
                                        <div class="activity-content">
                                          <div class="activity-header">
                                            <div class="posted-meta">
                                              <p>judul skripsi ; <?= $post[0]['judul'];?> <br>file : unduh file <a href="#">di sini</a></p>
                                            </div>
                                            <div class="date mute">
                                              Diunggah pada <?=$post[0]['tanggal_dibuat'];?>
                                            </div>
                                          </div>
                                          <hhr>
                                          <div class="activity-inner">
                                            <p>pesan 1</p>
                                          </div>
                                        </div>
                                        
                                        <div class="activity-comments">
                                          <ul>
                                            <li id="acomment-6656" class="comment-item" data-bp-activity-comment-id="6656">
                                              <div class="acomment-avatar item-avatar">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">
                                                  <!-- <img loading="lazy" src="https://mythemestore.com/beehive-preview/wp-content/uploads/avatars/3/61012508b3ce1-bpthumb.jpg" class="avatar user-3-avatar avatar-50 photo" width="50" height="50" alt="Profile picture of John Doe">		</a> -->
                                              </div>
                                              <div class="acomment-meta">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">John Doe</a> replied <a href="https://mythemestore.com/beehive-preview/activity/p/202/#acomment-6656" class="activity-time-since"><time class="time-since" datetime="2021-06-30 02:23:48" data-bp-timestamp="1625019828">1 month ago</time></a>
                                              </div>
                                              <div class="acomment-content">
                                                <div class="rtmedia-activity-container">
                                                  <div class="rtmedia-activity-text">
                                                    <span>hiola<br></span>
                                                  </div>
                                                  <ul class="rtmedia-list rtm-activity-media-list rtmedia-activity-media-length-0 rtm-activity-mixed-list rtm-activity-list-rendered"></ul>
                                                </div>
                                              </div>
                                            </li>

                                            <li id="acomment-6679" class="comment-item" data-bp-activity-comment-id="6679">
                                              <div class="acomment-avatar item-avatar">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">
                                                  <!-- <img loading="lazy" src="https://mythemestore.com/beehive-preview/wp-content/uploads/avatars/3/61012508b3ce1-bpthumb.jpg" class="avatar user-3-avatar avatar-50 photo" width="50" height="50" alt="Profile picture of John Doe">		</a> -->
                                              </div>
                                              <div class="acomment-meta">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">John Doe</a> replied <a href="https://mythemestore.com/beehive-preview/activity/p/202/#acomment-6679" class="activity-time-since"><time class="time-since" datetime="2021-07-02 15:01:13" data-bp-timestamp="1625238073">1 month ago</time></a>
                                              </div>
                                              <div class="acomment-content">
                                                <div class="rtmedia-activity-container">
                                                  <div class="rtmedia-activity-text">
                                                    <span>hello test</span>
                                                  </div>
                                                  <ul class="rtmedia-list rtm-activity-media-list rtmedia-activity-media-length-0 rtm-activity-mixed-list rtm-activity-list-rendered"></ul>
                                                </div>
                                              </div>
                                              <ul>
                                                <li id="acomment-7018" class="comment-item" data-bp-activity-comment-id="7018">
                                                  <div class="acomment-avatar item-avatar">
                                                    <a href="https://mythemestore.com/beehive-preview/members/user/">
                                                      <!-- <img loading="lazy" src="https://mythemestore.com/beehive-preview/wp-content/uploads/avatars/3/61012508b3ce1-bpthumb.jpg" class="avatar user-3-avatar avatar-50 photo" width="50" height="50" alt="Profile picture of John Doe">		</a> -->
                                                  </div>
                                                  <div class="acomment-meta">
                                                    <a href="https://mythemestore.com/beehive-preview/members/user/">John Doe</a> replied <a href="https://mythemestore.com/beehive-preview/activity/p/202/#acomment-7018" class="activity-time-since"><time class="time-since" datetime="2021-07-30 09:20:00" data-bp-timestamp="1627636800">6 days, 6 hours ago</time></a>
                                                  </div>
                                                  <div class="acomment-content">
                                                    <div class="rtmedia-activity-container">
                                                      <div class="rtmedia-activity-text">
                                                        <span>test</span>
                                                      </div>
                                                      <ul class="rtmedia-list rtm-activity-media-list rtmedia-activity-media-length-0 rtm-activity-mixed-list rtm-activity-list-rendered"></ul>
                                                    </div>
                                                  </div>
                                                </li>
                                              </ul>
                                            </li>
                                            <li id="acomment-6702" class="comment-item" data-bp-activity-comment-id="6702">
                                              <div class="acomment-avatar item-avatar">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">
                                                  <!-- <img loading="lazy" src="https://mythemestore.com/beehive-preview/wp-content/uploads/avatars/3/61012508b3ce1-bpthumb.jpg" class="avatar user-3-avatar avatar-50 photo" width="50" height="50" alt="Profile picture of John Doe">		 -->
                                                </a>
                                              </div>
                                              <div class="acomment-meta">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">John Doe</a> replied <a href="https://mythemestore.com/beehive-preview/activity/p/202/#acomment-6702" class="activity-time-since"><time class="time-since" datetime="2021-07-05 05:03:50" data-bp-timestamp="1625461430">1 month ago</time></a>
                                              </div>
                                              <div class="acomment-content">
                                                <div class="rtmedia-activity-container">
                                                  <div class="rtmedia-activity-text">
                                                    <span>Rr</span>
                                                  </div>
                                                  <ul class="rtmedia-list rtm-activity-media-list rtmedia-activity-media-length-0 rtm-activity-mixed-list rtm-activity-list-rendered"></ul>
                                                </div>
                                              </div>
                                            </li>
                                            <li id="acomment-7046" class="comment-item" data-bp-activity-comment-id="7046">
                                              <div class="acomment-avatar item-avatar">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">
                                                  <!-- <img loading="lazy" src="https://mythemestore.com/beehive-preview/wp-content/uploads/avatars/3/61012508b3ce1-bpthumb.jpg" class="avatar user-3-avatar avatar-50 photo" width="50" height="50" alt="Profile picture of John Doe">		</a> -->
                                              </div>
                                              <div class="acomment-meta">
                                                <a href="https://mythemestore.com/beehive-preview/members/user/">John Doe</a> replied <a href="https://mythemestore.com/beehive-preview/activity/p/202/#acomment-7046" class="activity-time-since"><time class="time-since" datetime="2021-08-01 05:09:36" data-bp-timestamp="1627794576">4 days, 10 hours ago</time></a>
                                              </div>
                                              <div class="acomment-content"><p>asdas</p>
                                              </div>
                                            </li>
                                          </ul>
                                        </div>
                                      </li>
                                    </ul>
                                  </div><!-- .activity -->
                                </div><!-- // .screen-content -->
                              </div><!-- #buddypress -->
                            </div><!-- .entry-contents -->
                          </article><!-- #post-0 -->
                        </main><!-- #main -->
                      </div><!-- .col-main -->
                        <?php } ?>
                      <div class="col-lg-4 col-aside">
                        <aside id="buddypress_sidebar" class="widget-area sidebar-widget-area sticky-sidebar position-fixed bg-white">
                          <div id="bp_core_members_widget-2" class="widget widget_bp_core_members_widget buddypress widget">
                            <h5 class="widget-title">Members</h5>
                              <form>
                                <div class="form-group">
                                  <input type="textarea" name="pesan" id="pesan" placeholder="masukkan pesan" class="w-100"></input>
                                </div>
                                <div class="form-group">
                                  <label for="tipe">Tipe Pesan</label><br>
                                  <input type="radio" name="tipe" id="tipe" value="1">pesan</input>
                                  <input type="radio" name="tipe" id="tipe" value="2">catatan</input>
                                </div>
                                <div class="form-group">
                                  <input type="file" name="file" id="file"></input>
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">kirim</button>
                                </div>
                              </form>
                          </div>
                        </aside>
                      </div>

                    </div><!-- .row -->
                  </div><!-- .container -->
                </div><!-- .layout -->
              </div><!-- #primary -->

            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
