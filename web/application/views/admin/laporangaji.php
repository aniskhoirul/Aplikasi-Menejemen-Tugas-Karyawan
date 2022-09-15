  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Laporan Penggajian</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active"><a href="#">Laporan Penggajian</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <hr>
                      <form id="myForm" action="" class="form-horizontal mb-4" method="get">
                          <div class="form-group row">
                              <label for="bulan" class="col-sm-2 col-form-label">Pilih Bulan</label>
                              <div class="col-sm-10">
                                  <input id="inp-search" name="bulan" placeholder="Pencarian bulan tahun" class="form-control" style="padding: 5px; box-sizing: border-box;" type="text" autocomplete="off" value="<?= $bulan ?>">
                              </div>
                          </div>
                          <div style="text-align:right">
                              <button id="save" type="submit" class="btn btn-success"><span class="fa fa-search"></span> Cari </button>
                              <a target="_blank" class="btn btn-danger pull-right" href="<?= base_url('admin/laporan-penggajian/cetak/?bulan=' . $bulan) ?>"><span class="fa fa-print"></span> CETAK PDF</a>
                          </div>
                      </form>
                      <hr>

                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Data Penggajian Karyawan</h3>
                          </div>
                          <div class="card-body">
                              <div class="col-md-12" style="margin-top:30px">
                                  <div class="table-responsive">
                                      <table class="table table-bordered">
                                          <thead>
                                              <tr>
                                                  <th class="text-center" width="5%">No</th>
                                                  <th class="text-center">Nama Pegawai & Jenis Gaji</th>
                                                  <th class="text-center">Nominal</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php $no = 1;
                                                foreach ($dtkaryawan as $row) : ?>
                                                  <tr style="background-color: #e1e1e1">
                                                      <td><?= $no++ ?></td>
                                                      <td colspan="2"><b><?= $row->nama_karyawan ?></b> </td>
                                                  </tr>
                                                  <?php if ($row->total_gaji != "") : ?>
                                                      <?php foreach ($row->total_gaji as $jenis_gaji) : ?>
                                                          <tr>
                                                              <td></td>
                                                              <td><?= $jenis_gaji->nama_jn_gaji ?></td>
                                                              <td>Rp. <?= number_format($jenis_gaji->nominal_gaji) ?></td>
                                                          </tr>
                                                      <?php endforeach ?>
                                                  <?php endif ?>
                                              <?php endforeach ?>
                                          </tbody>
                                      </table>
                                  </div>

                              </div>


                          </div>
                      </div>
                  </div>

              </div>



          </div>
      </section>
      <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="<?= base_url() ?>">SIMKAMPUS</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
      </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
      $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/sweetalert.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url(); ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url(); ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo base_url(); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- select2 -->
  <script src="<?= base_url() ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url(); ?>dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>

  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>


  <script type="text/javascript">
      $('#inp-search').datepicker({
          autoclose: true,
          format: "yyyy-mm",
          viewMode: "months",
          minViewMode: "months",

      });
  </script>
  </body>

  </html>