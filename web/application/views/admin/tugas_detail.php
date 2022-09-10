  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Detail Tugas</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                          <li class="breadcrumb-item active">Detail Tugas</li>
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
                  <div class="col-12">
                      <?php if (isset($detail)) : ?>
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      <?= $detail->waktu_akhir ?>
                                  </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                  <p>Data Job : <?= $detail->data_job ?></p>
                                  <p>Waktu Mulai : <?= $detail->waktu_mulai ?></p>
                                  <p>Waktu Akhir : <?= $detail->waktu_akhir ?></p>
                              </div>
                              <!-- /.card-body -->
                          </div>
                      <?php else : ?>
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      Form isi detail tugas
                                  </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                  <form id="simpan_detail">
                                      <div class="form-group">
                                          <input type="hidden" name="id_job" id="id_job" class="form-control" value="<?= $this->uri->segment(4) ?>">
                                          <label>Waktu Mulai</label>
                                          <input type="date" name="waktu_mulai" id="waktu_mulai" class="form-control" placeholder="Masukkan Waktu Mulai">
                                      </div>
                                      <div class="form-group">
                                          <label>Waktu Akhir</label>
                                          <input type="date" name="waktu_akhir" id="waktu_akhir" class="form-control" placeholder="Masukkan Waktu Akhir">
                                      </div>
                                      <div class="form-group">
                                          <label>Data</label>
                                          <input type="file" name="file" id="file" class="form-control" placeholder="Masukkan Waktu Akhir" accept=".pdf">
                                      </div>
                                      <div class="form-group">
                                          <button type="reset" class="btn btn-secondary waves-effect waves-light">Reset</button>
                                          <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                      </div>
                                  </form>
                              </div>
                              <!-- /.card-body -->
                          </div>
                      <?php endif ?>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

  </div>
  <!-- /.modal -->


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.5
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


  <script>
      $('#simpan_detail').submit(function(e) {
          e.preventDefault();
          var formData = new FormData(this)
          $.ajax({
              type: 'POST',
              url: "<?php echo base_url(); ?>admin/tugas/store_detail",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              success: function(response) {
                  swal({
                      title: 'Hapus Berhasil',
                      text: response.message,
                      icon: 'success'
                  }).then(function() {
                      location.reload();
                  });
              },
              error: function(response) {
                  swal({
                      title: 'Hapus Gagal',
                      text: response.responseJSON.message,
                      icon: 'error'
                  });
              }
          })
      })
  </script>

  </body>

  </html>