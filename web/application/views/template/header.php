<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url() ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dosen</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('nama') ?></a>
          </div>
        </div>

        <!-- menu Admin -->
        <?php if ($this->session->userdata('username') != "") : ?>
          <?php if ($this->session->userdata('role') == 'admin') : ?>
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                  <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>

                <li class="nav-item has-treeview">
                  <a href="<?= base_url('admin/tugas') ?>" class="nav-link <?= $this->uri->segment(2) == 'tugas' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                      Tugas
                    </p>
                  </a>
                </li>

                <li class="nav-item <?= $this->uri->segment(2) == 'penilaian-pegawai' || $this->uri->segment(2) == 'laporan-penilaian' ? 'menu-open' : '' ?>">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                      Penilaian
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url();  ?>admin/penilaian-pegawai" class="nav-link <?= $this->uri->segment(2) == 'penilaian-pegawai' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penilaian Pegawai</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/laporan-penilaian" class="nav-link <?= $this->uri->segment(2) == 'laporan-penilaian' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Penilaian</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item <?= $this->uri->segment(2) == 'fakultas' || $this->uri->segment(2) == 'prodi' ? 'menu-open' : '' ?>">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Jurusan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url();  ?>admin/fakultas" class="nav-link <?= $this->uri->segment(2) == 'fakultas' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fakultas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/prodi" class="nav-link <?= $this->uri->segment(2) == 'prodi' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Prodi</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item <?= $this->uri->segment(2) == 'karyawan' || $this->uri->segment(2) == 'data-dosen' || $this->uri->segment(2) == 'data-mahasiswa' ? 'menu-open' : '' ?>">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Master User
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/karyawan" class="nav-link <?= $this->uri->segment(2) == 'karyawan' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Karyawan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/data-dosen" class="nav-link <?= $this->uri->segment(2) == 'data-dosen' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dosen</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/data-mahasiswa" class="nav-link <?= $this->uri->segment(2) == 'data-mahasiswa' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mahasiswa</p>
                      </a>
                    </li>
                  </ul>
                </li>


                <li class="nav-item <?= $this->uri->segment(2) == 'absensi' || $this->uri->segment(2) == 'gaji' || $this->uri->segment(2) == 'jabatan' || $this->uri->segment(2) == 'tahun-masuk' || $this->uri->segment(2) == 'surat' ? 'menu-open' : '' ?>">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                      Manajemen
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/absensi" class="nav-link <?= $this->uri->segment(2) == 'absensi' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Absensi</p>
                      </a>
                    </li>
                    <!-- <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/gaji" class="nav-link  <?= $this->uri->segment(2) == 'gaji' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Gaji</p>
                      </a>
                    </li> -->
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/jabatan" class="nav-link <?= $this->uri->segment(2) == 'jabatan' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jabatan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/tahun-masuk" class="nav-link <?= $this->uri->segment(2) == 'tahun-masuk' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tahun Masuk</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>admin/surat" class=" nav-link <?= $this->uri->segment(2) == 'surat' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Surat</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                  <a href="<?= base_url('logout') ?>" class="nav-link">
                    <i class="nav-icon fas fa-arrow-circle-left"></i>
                    <p>
                      Keluar
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
          <?php elseif ($this->session->userdata('role') == 'keuangan') : ?>
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                  <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>

                <li class="nav-item has-treeview">
                  <a href="<?= base_url('admin/gaji') ?>" class="nav-link <?= $this->uri->segment(2) == 'gaji' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-money-check-alt"></i>
                    <p>
                      Penggajian
                    </p>
                  </a>
                </li>

                <li class="nav-item has-treeview">
                  <a href="<?= base_url('logout') ?>" class="nav-link">
                    <i class="nav-icon fas fa-arrow-circle-left"></i>
                    <p>
                      Keluar
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
          <?php endif ?>

          <!-- Menu Dosen -->
        <?php elseif ($this->session->userdata('nidn') != "") : ?>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview">
                <a href="<?= base_url('dosen/dashboard') ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?= base_url('dosen/absensi') ?>" class="nav-link <?= $this->uri->segment(2) == 'absensi' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                    Absensi
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?= base_url('dosen/gaji') ?>" class="nav-link <?= $this->uri->segment(2) == 'gaji' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>
                    Gaji
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?= base_url('logout') ?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-circle-left"></i>
                  <p>
                    Keluar
                  </p>
                </a>
              </li>
            </ul>
          </nav>

          <!-- Menu Karyawan -->
        <?php elseif ($this->session->userdata('no_id') != "") : ?>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview">
                <a href="<?= base_url('karyawan/dashboard') ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?= base_url('karyawan/gaji') ?>" class="nav-link <?= $this->uri->segment(2) == 'gaji' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>
                    Gaji
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?= base_url('logout') ?>" class="nav-link">
                  <i class="nav-icon fas fa-arrow-circle-left"></i>
                  <p>
                    Keluar
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        <?php endif ?>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>