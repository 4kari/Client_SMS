<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $judul;  ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>css/css.css" rel="stylesheet">

</head>

<body class="bg-image">
    <div id="preloder">
		<div class="loader"></div>
	</div>
    <div class="container">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-lg-5">
                    <!-- ukuran login putih -->

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        </div>
                                        <!-- Form Login -->
                                        <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group text-center">
                                                <div class="row">
                                                    <div class="col-md-10 col-sm image">
                                                        <?= $img ?>
                                                    </div>
                                                    <div class="col-md-2 mt-1 col-sm ">
                                                        <a class="refresh" href="javascript:;"><img width="40px" src="<?php base_url(); ?>assets/img/refresh.png"> </a>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="captcha" name="captcha" placeholder="Masukan Captcha">
                                                <?= form_error('captcha', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-secondary btn-user btn-block">Masuk</button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <!-- <a href="<?= base_url('Publik/index'); ?>" class="small">Masuk Sebagai Tamu</a><br> -->
                                            <!-- <a class="small" href="<?= base_url('auth/registration'); ?>">Buat Akun Baru</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="<?= base_url('assets/') ?>js/public_js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweet/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jsscript.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>


<script>
  $(function() {
    $('.refresh').click(function() {
      //alert('clicked');
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url() ?>auth/refresh_captcha',
        success: function(res) {
          if (res) {
            $('.image').html(res);
          }
        }
      })
    });
  });
</script>
</body>

</html>