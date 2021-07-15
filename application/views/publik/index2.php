<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/admin/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/css.css" rel="stylesheet">

    <link href="<?= base_url('assets/'); ?>css/css_public/animate.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/css_public/flaticon.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/css_public/style.css" rel="stylesheet">



</head>

<body id="page-top" data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <section class="hero-wrap js-fullheight" style="background-image: url(<?= base_url('assets/img/public_pic/bg_3.jpg'); ?>); background-position: cover;" data-section="home">
                    <div class="container">
                        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                            <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">

                                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Selamat Datang</h1>
                                <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Portal Sistem Manajemen Skripsi (SMS) Universitas Trunojoyo Madura sebagai sarana untuk memantau jalannya Skripsi Mahasiswa.</p>

                                <p style="text-align: center;"><a href="<?= base_url('auth'); ?>" class="btn btn-primary py-3 px-5">Login</a></p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- <footer class="ftco-footer ftco-section mt-0">
                </footer> -->
                <!-- loader -->
                <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
                </div>
            </div>
            <!-- End of Main Content -->
            

        </div>
        <!-- End of Content Wrapper -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>
                        <font color="blue">Copyright &copy; Portal SMS Universitas Trunojoyo Madura <?= date('Y'); ?></font>
                    </span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= base_url('assets/'); ?>js/public_js/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/aos.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/jquery.animateNumber.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/public_js/scrollax.min.js"></script>

    <script src="<?= base_url('assets/'); ?>js/public_js/main.js"></script>

    <script>
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const levelId = $(this).data('level');

            $.ajax({
                url: "<?= base_url('admin/rubahakses'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    levelId: levelId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/levelAkses/'); ?>" + levelId;
                }
            });
        });
    </script>
</body>
</html>