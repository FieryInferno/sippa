<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15"></div>
        <div class="sidebar-brand-text mx-3 mt-3">
          <?php
            switch ($this->session->role_id) {
              case '3':
                echo 'Pedagang Pasar Pemda Kab.Subang';
                break;
              case '2':
                echo 'Petugas Pasar Pemda Kab.Subang';
                break;
              
              default:
                # code...
                break;
            }
          ?><sup></sup></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>
      <?php
        switch ($this->session->role_id) {
          case '3':?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>pedagang/profile">
              <i class="fas fa-user"></i>
              <span>Profile Pedagang</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>Pedagang/Chat">
              <i class="fas fa-comment"></i>
              <span>Chat</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>Pedagang/Pengajuan">
              <i class="fas fa-exchange-alt"></i>
              <span>Pengajuan Perpindahan</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>Pedagang/Retribusi/generate">
              <i class="fas fa-qrcode"></i>
              <span>Bayar Retribusi</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>pedagang/tunggakan">
              <i class="fas fa-fw fa-database"></i>
              <span>Data Tunggakan</span></a>
            </li>
            <?php break;
            break;
          case '2': ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>Petugas/Pasar">
              <i class="fas fa-fw fa-database"></i>
              <span>Data Pasar</span></a>
            </li>
            <?php $jumlah = $this->db->get_where('pedagang', ['alasan !=' => NULL])->num_rows(); ?> 
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Petugas/Pedagang') ?>">
              <i class="fas fa-fw fa-database"></i>
              <span>Data Pedagang <?= $jumlah > 0 ? '<span class="badge badge-primary">' . $jumlah . '</span>' : '' ; ?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>petugas/data_tunggakan">
              <i class="fas fa-fw fa-database"></i>
              <span>Data Tunggakan</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>Petugas/Retribusi">
              <i class="fas fa-qrcode"></i>
              <span>Scan QR-Code</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>petugas/data_retribusi">
              <i class="fas fa-fw fa-database"></i>
              <span>Data Retribusi</span></a>
            </li>
            <?php break;
          
          default:
            # code...
            break;
        }
      ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'login/logout'?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


          
        </ul>
        <!-- End of Sidebar -->

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

                 <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

      
                </nav>
                <!-- End of Topbar -->
