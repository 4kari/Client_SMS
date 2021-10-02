<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $judul;?></div>
      </a>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Topik
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($judul=='Kelola Topik'){echo 'active';}?>">
        <a class="nav-link" href="<?= base_url($aktor); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Kelola Topik</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Penjadwalan
      </div>

      <!-- Nav Item - Tables -->
      <li class='nav-item <?php if($judul=="Pendaftar"){echo "active";}?>'>
      <a class="nav-link" href="<?= base_url($aktor.'/pendaftar'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Kelola Pendaftar</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($judul=='Jadwal Seminar Proposal'){echo 'active';}?>">
      <a class="nav-link" href="<?= base_url($aktor.'/jadwal_sempro'); ?>">
          <i class="fas fa-fw fa-eye"></i>
          <span>Kelola jadwal Seminar</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($judul=='Jadwal Sidang Skripsi'){echo 'active';}?>">
      <a class="nav-link" href="<?= base_url($aktor.'/jadwal_skripsi'); ?>">
          <i class="fas fa-fw fa-eye"></i>
          <span>Kelola Jadwal Sidang</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Skripsi
      </div>

      <!-- Nav Item - Tables -->
      <li class='nav-item <?php if($judul=="Skripsi"){echo "active";}?>'>
      <a class="nav-link" href="<?= base_url($aktor.'/skripsi'); ?>">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Kelola Skripsi</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
