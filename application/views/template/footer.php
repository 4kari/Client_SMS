<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>
        <font color="blue">Copyright &copy; Portal Sistem Manajemen Skripsi (SMS) Universitas Trunojoyo Madura <?= date('Y'); ?></font>
      </span>
    </div>
  </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->


<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweet/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jsscript.js"></script>

<script type="text/javascript" src="<?= base_url('assets/'); ?>js/bootstrap-validate.js"></script>

<script type="text/javascript" src="<?= base_url('assets/'); ?>timeline/index.js"></script>
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/admin.js"></script>
<!-- untuk memilih file agar langsung berubah textnya -->
<script src="<?= base_url('assets/'); ?>js/global.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<script>
  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const levelId = $(this).data('level');

    $.ajax({
      url: "<?= base_url('administrator/rubahakses'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        levelId: levelId
      },
      success: function() {
        document.location.href = "<?= base_url('administrator/levelAkses/'); ?>" + levelId;
      }
    });
  });
</script>

<script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>

<script>
  $('#ktp').on('change', function() {
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
  })
</script>

<script type="text/javascript" src="<?= base_url('assets/'); ?>js/validasi.js"></script>

<script src="<?= base_url('assets/'); ?>js/pop/js3.js"></script>
<script src="<?= base_url('assets/'); ?>js/pop/minjs3.js"></script>
</body>

</html>