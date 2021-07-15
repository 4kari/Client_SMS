<?php
$level_id = $this->session->userdata('level_id');
$queryLevel = "SELECT level
                FROM user_level
                WHERE user_level.id = $level_id
                ";
$hasL = $this->db->query($queryLevel)->result_array();
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>
        
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $profil['nama']; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . 'default.jpg' ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <?php foreach ($hasL as $hL) : ?>
              <a class="dropdown-item" href="<?= base_url($hL['level']); ?>">
              <?php endforeach; ?>
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Beranda
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item out" href="<?= base_url('Auth/logout'); ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Keluar
              </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->