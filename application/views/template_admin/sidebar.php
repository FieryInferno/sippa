<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15"></div>
        <div class="sidebar-brand-text mx-3">Bidang Pasar DKUPP<sup></sup></div>
      </a>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">Menu</div>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <?php
        if ($this->session->role_id == 1) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>admin/petugas">
              <i class="fas fa-database"></i>
              <span>Data Petugas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>Admin/Pengajuan">
              <i class="fas fa-database"></i>
              <span>Data Pengajuan 
                <?php
                  $jumlahPengajuan  = $this->db->get('pengajuan')->num_rows();
                  
                  if ($jumlahPengajuan > 0) echo '<span class="badge badge-primary">' . $jumlahPengajuan . '</span>';
                ?>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Admin/Dashboard/Pedagang') ?>">
              <i class="fas fa-database"></i>
              <span>Data Pedagang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>Admin/Retribusi">
              <i class="fas fa-database"></i>
              <span>Data Retribusi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>admin/data_potensi_pasar">
              <i class="fas fa-database"></i>
              <span>Data Potensi Pasar</span>
            </a>
          </li>
        <?php }

        if ($this->session->role_id == 5) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('kepala_bidang/data_pedagang') ?>">
              <i class="fas fa-database"></i>
              <span>Data Pedagang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>kepala_bidang/data_retribusi">
              <i class="fas fa-database"></i>
              <span>Data Retribusi</span>
            </a>
          </li>
        <?php }
      ?>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'login/logout'?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout </span>
        </a>
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
