<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('administrator')?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="far fa-handshake"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Portal SMS UTM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <?php if ($judul == "user") {
          echo "<li class='nav-item active'>";
        }else{
          echo "<li class='nav-item'>";
        }?>
        <a class="nav-link pb-0" href="<?=base_url('administrator');?>">
            <i class="icon"></i>
            <span>"user</span>

        <hr class="sidebar-divider mt-3">

        <!-- Profil Saya -->
      <li class="nav-item">
        <a class="nav-link out" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
<!-- End of Sidebar -->