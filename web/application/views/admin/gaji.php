  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Penggajian Karyawan</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                          <li class="breadcrumb-item active">Penggajian Karyawan</li>
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
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">
                                  Input Penggajian per Karyawan
                              </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <form id="myForm" action="" class="form-horizontal" method="get">
                                  <div class="form-group row">
                                      <label for="bulan" class="col-sm-2 col-form-label">Pilih Bulan Gajian</label>
                                      <div class="col-sm-10">
                                          <input id="inp-search" name="bulan" placeholder="Pencarian bulan tahun" class="form-control" style="padding: 5px; box-sizing: border-box;" type="text" autocomplete="off" value="<?= $bulan ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="id_karyawan" class="col-sm-2 col-form-label">Pilih Karyawan</label>
                                      <div class="col-sm-10">
                                          <select id="id_karyawan" name="id_karyawan" class="form-control select2">
                                              <?php foreach ($dtkaryawan as $key) {
                                                    $selected = $key->no_id == @$id_karyawan ? 'selected' : ''; ?>
                                                  <option value="<?= $key->no_id ?>" <?= $selected ?>><?= $key->nama_karyawan ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div style="text-align:right">
                                      <button id="save" type="submit" class="btn btn-success">Cari </button>
                                  </div>
                              </form>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <div class="card">
                          <div class="card-body">
                              <form id="form-simpan" method="post">
                                  <table id="tbl_gaji" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>Jenis Gaji</th>
                                              <th width="50%">Keterangan Gaji</th>
                                              <th>Nominal Gaji</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach ($jenis_gaji as $jenis) : ?>
                                              <?php
                                                $total[] = $jenis->nominal_gaji
                                              ?>
                                              <tr>
                                                  <td><?= $jenis->nama_jn_gaji ?></td>
                                                  <td>
                                                      <input type="hidden" name="is_edit" value="<?= $jenis->id_dt_gaji == "" ? 'tambah' : 'edit' ?>">
                                                      <input type="hidden" name="tanggal" value="<?= $bulan . '-01' ?>">
                                                      <input type="hidden" name="id_karyawan" value="<?= $id_karyawan ?>">
                                                      <input type="hidden" name="id_jn[]" value="<?= $jenis->id_jn_gaji ?>">
                                                      <input type="hidden" name="id_dt_gaji[]" value="<?= $jenis->id_dt_gaji ?>">
                                                      <textarea name="nama_gaji[]" id="" rows="1" class="form-control" placeholder="Masukkan Keterangan Gaji (Optional)"><?= $jenis->nama_gaji ?></textarea>
                                                  </td>
                                                  <td>
                                                      <div class="input-group mb-2">
                                                          <div class="input-group-prepend">
                                                              <div class="input-group-text">Rp.</div>
                                                          </div>
                                                          <input type="number" class="form-control" name="nominal_gaji[]" id="inlineFormInputGroup" placeholder="Nominal (Contoh : 600000)" aria-describedby="nominal" value="<?= $jenis->nominal_gaji ?>" required>
                                                      </div>
                                                  </td>
                                              </tr>
                                          <?php endforeach ?>
                                          <tr style="background-color: #41baf196">
                                              <td colspan="2"><b>Total</b></td>
                                              <td><b>Rp. <?= number_format(array_sum($total)) ?></b></td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <div style="text-align:right">
                                      <button id="save" type="submit" class="btn btn-success">Kirim Gaji</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
  </div>
  </div>


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


  <script>
      $('#inp-search').datepicker({
          autoclose: true,
          format: "yyyy-mm",
          viewMode: "months",
          minViewMode: "months",

      });

      $(function() {
          $('.select2').select2()
      });

      const thisform = $('#form-simpan');

      thisform.on('submit', async function(event) {
          event.preventDefault();
          var self = $(this)
          let data_post = new FormData(self[0]);
          simpan(self, data_post);
          return false;

      });

      function simpan(self, data_post) {
          $.ajax({
              type: "POST",
              url: "<?= base_url('admin/gaji/store') ?>",
              data: data_post,
              dataType: "json",
              processData: false,
              contentType: false,
              cache: false,
              success: function(response) {
                  if (response.status) {
                      swal({
                          title: 'Informasi',
                          text: response.msg,
                          icon: 'success'
                      }).then((Refreshh) => {
                          location.reload();
                      });
                  } else {
                      swal({
                          title: 'Ops Maaf',
                          text: response.msg,
                          icon: 'error'
                      });
                  }
              },
              error: function(xhr, status, error) {
                  console.log(xhr, status, error)
              }
          });
      }
  </script>

  </body>

  </html>