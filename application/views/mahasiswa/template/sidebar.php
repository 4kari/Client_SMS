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
        <div class="sidebar-brand-text mx-3"><?= $judul;?> <sup></sup></div>
      </a>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($judul=='Ajukan Topik'){echo 'active';}?>">
        <a class="nav-link" href="<?= base_url('Mahasiswa/topik'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Ajukan Topik</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class='nav-item <?php if($judul=="Data Skripsi"){echo "active";}?>'>
      <a class="nav-link" href="<?= base_url('Mahasiswa/skripsi'); ?>">
          <i class="fas fa-fw fa-eye"></i>
          <span>Lihat Skripsi</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Diskusi
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($judul=='Bimbingan Skripsi'){echo 'active';}?>">
      <a class="nav-link" href="<?= base_url('Mahasiswa/bimbingan'); ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Bimbingan</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($judul=='Sempro'){echo 'active';}?>">
      <a class="nav-link" href="<?= base_url('Mahasiswa/sempro'); ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Seminar Proposal</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($judul=='Sidang'){echo 'active';}?>">
      <a class="nav-link" href="<?= base_url('Mahasiswa/sidang'); ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Sidang Skripsi</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Pendaftaran
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($judul=='Mendaftar Sempro'){echo 'active';}?>">
        <a class="nav-link" href="<?= base_url('Mahasiswa/daftar_sempro'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Seminar Proposal</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($judul=='Mendaftar Sidang'){echo 'active';}?>">
        <a class="nav-link" href="<?= base_url('Mahasiswa/daftar sidang'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>Sidang Skripsi</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
