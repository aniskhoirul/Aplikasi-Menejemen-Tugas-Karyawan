  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Tugas</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                          <li class="breadcrumb-item active">Tugas</li>
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
                                  <button type='button' class='btn btn-success waves-effect waves-light' data-toggle='modal' data-target='#md_tbh'>Tambah</button>
                              </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="table" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th width="15%">Karyawan</th>
                                          <th width="15%">Jenis Tugas</th>
                                          <th>Tugas</th>
                                          <th width="25%">Aksi</th>
                                      </tr>
                                  </thead>
                                  <?php $no = 1;
                                    foreach ($data_tugas as $value) : ?>
                                      <tr>
                                          <td><?= $no++ ?></td>
                                          <td><?= $value->nama_karyawan ?></td>
                                          <td><?= $value->nama_jn_job ?></td>
                                          <td><?= $value->list_job ?></td>
                                          <td>
                                              <a href="<?= base_url() ?>admin/tugas/show/<?= $value->id_job ?>" class='btn btn-info waves-effect waves-light'>Detail</a>

                                              <button type='button' class='btn btn-warning waves-effect waves-light' data-id='<?= $value->id_job ?>' onclick='filter(this)' data-target='#md_edit' data-toggle='modal'>Edit</button>

                                              <button class='btn btn-danger waves-effect waves-light' data-id='<?= $value->id_job ?>' title='Hapus' onclick='hapus(this)'>Hapus</button>
                                          </td>
                                      </tr>

                                  <?php endforeach ?>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

      <div class="modal fade" id="md_edit">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Tugas</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form>
                            <div class="form-group">
                                <label>Karyawan</label>
                                <input type="hidden" name="ide" id="ide">
                                <select name="eno_id" id="eno_id" class="form-control">
                                    <option disabled selected>-- Pilih Karyawan --</option>
                                    <?php foreach ($karyawan as $value) : ?>
                                        <option value="<?= $value->no_id ?>"><?= $value->nama_karyawan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis Tugas</label>
                                <select name="eid_jn_job" id="eid_jn_job" class="form-control">
                                    <option disabled selected>-- Pilih Jenis Tugas --</option>
                                    <?php foreach ($jenis_tugas as $value) : ?>
                                        <option value="<?= $value->id_jn_job ?>"><?= $value->nama_jn_job ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Tugas</label>
                                <textarea name="elist_job" id="elist_job" class="form-control" cols="30" rows="10" required placeholder="Masukkan Nama Tugas"></textarea>
                            </div>
                  </div>
                  <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary waves-effect waves-light">Reset</button>
                      <button type="button" class="btn btn-primary waves-effect waves-light" onclick="update()">Update</button>
                  </div>
                  </form> <!-- TUTUP FORM -->
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="md_tbh">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Tambah Tugas</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                              <label>Karyawan</label>
                              <select name="no_id" id="no_id" class="form-control">
                                  <option disabled selected>-- Pilih Karyawan --</option>
                                  <?php foreach ($karyawan as $value) : ?>
                                      <option value="<?= $value->no_id ?>"><?= $value->nama_karyawan ?></option>
                                  <?php endforeach ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Jenis Tugas</label>
                              <select name="id_jn_job" id="id_jn_job" class="form-control">
                                  <option disabled selected>-- Pilih Jenis Tugas --</option>
                                  <?php foreach ($jenis_tugas as $value) : ?>
                                      <option value="<?= $value->id_jn_job ?>"><?= $value->nama_jn_job ?></option>
                                  <?php endforeach ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Nama Tugas</label>
                              <textarea name="list_job" id="list_job" class="form-control" cols="30" rows="10" required placeholder="Masukkan Nama Tugas"></textarea>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary waves-effect waves-light">Reset</button>
                      <button type="button" class="btn btn-primary waves-effect waves-light" onclick="tambah()">Save</button>
                  </div>
                  </form> <!-- TUTUP FORM -->
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
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
      var tabel = $("#table").DataTable();

      function hapus(el) {
          var id = $(el).data("id");
          console.log(id);
          swal("Memproses Data.....", {
              button: false,
              closeOnClickOutside: false,
              closeOnEsc: false
          });
          swal({
              title: 'Hapus Data',
              text: "Anda Yakin Ingin Menghapus Data Ini ?",
              icon: 'warning',
              buttons: {
                  confirm: {
                      text: 'Yakin',
                      className: 'btn btn-success'
                  },
                  cancel: {
                      visible: true,
                      text: 'Tidak',
                      className: 'btn btn-danger'
                  }
              }

          }).then((Hapuss) => {
              if (Hapuss) {
                  $.ajax({
                      url: "<?php echo base_url(); ?>admin/tugas/destroy",
                      method: "POST",
                      data: {
                          id: id
                      },
                      cache: "false",
                      success: function(response) {
                          swal.close();
                          swal({
                              title: 'Hapus Berhasil',
                              text: response.message,
                              icon: 'success'
                          }).then(function() {
                              location.reload();
                          });
                      },
                      error: function(response) {
                          swal.close();
                          swal({
                              title: 'Hapus Gagal',
                              text: response.responseJSON.message,
                              icon: 'error'
                          });
                      }
                  })
              } else {
                  swal.close();
              }
          });
      }

      function tambah() {
          var no_id = $("#no_id").val();
          var id_jn_job = $("#id_jn_job").val();
          var list_job = $("#list_job").val();
          if (no_id == "" || id_jn_job == "" || list_job == "") {
              swal({
                  title: 'Tambah Gagal',
                  text: 'Nama Belum Anda Isi !',
                  icon: 'error'
              });
              return;
          }
          swal("Memproses Data.....", {
              button: false,
              closeOnClickOutside: false,
              closeOnEsc: false
          });
          $.ajax({
              url: "<?php echo base_url(); ?>admin/tugas/store",
              method: "POST",
              data: {
                  no_id: no_id,
                  id_jn_job: id_jn_job,
                  list_job: list_job,
              },
              cache: "false",
              success: function(x) {
                  swal.close();
                  var y = atob(x);
                  if (y == 1) {
                      swal({
                          title: 'Tambah Berhasil',
                          text: 'Data Berhasil di Tambahkan',
                          icon: 'success'
                      }).then((Refreshh) => {
                          $('#md_tbh').modal('hide')
                          refresh();
                          //   tabel.ajax.reload(null, false);
                          location.reload(true);
                      });
                  } else {
                      swal({
                          title: 'Tambah Gagal',
                          text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !',
                          icon: 'error'
                      });
                  }
              },
              error: function() {
                  swal.close();
                  swal({
                      title: 'Tambah Gagal',
                      text: 'Jaringan Anda Bermasalah !',
                      icon: 'error'
                  });
              }
          })
      }

      function filter(el) {
          var id = $(el).data("id");
          swal("Memproses Data.....", {
              button: false,
              closeOnClickOutside: false,
              closeOnEsc: false
          });
          $.ajax({
              url: "<?php echo base_url(); ?>admin/tugas/filter",
              method: "POST",
              data: {
                  id: id
              },
              cache: "false",
              success: function(x) {
                  swal.close();
                  var y = atob(x);
                  var xx = y.split("|");
                  if (xx[0] == 1) {
                      $("#ide").val(xx[1]);
                      $("#eno_id").val(xx[2]);
                      $("#eid_jn_job").val(xx[3]);
                      $("#elist_job").val(xx[4]);
                  } else {
                      swal({
                          title: 'Update Gagal',
                          text: 'Data Tidak di Temukan',
                          icon: 'error'
                      });
                      refresh();
                  }
              },
              error: function() {
                  swal.close();
                  swal({
                      title: 'Filter Gagal',
                      text: 'Jaringan Anda Bermasalah !',
                      icon: 'error'
                  });
              }
          })
      }



      function update() {
          var id = $("#ide").val();
          var eno_id = $("#eno_id").val();
          var eid_jn_job = $("#eid_jn_job").val();
          var elist_job = $("#elist_job").val();

          if (id == "" || eno_id == "" || eid_jn_job == "" || elist_job == "") {
              swal({
                  title: 'Update Gagal',
                  text: 'Ada Isian yang Belum Anda Isi !',
                  icon: 'error'
              });
              return;
          }

          swal("Memproses Data.....", {
              button: false,
              closeOnClickOutside: false,
              closeOnEsc: false
          });
          $.ajax({
              url: "<?php echo base_url(); ?>admin/tugas/update",
              method: "POST",
              data: {
                  id: id,
                  eno_id: eno_id,
                  eid_jn_job: eid_jn_job,
                  elist_job: elist_job
              },
              cache: "false",
              success: function(x) {
                  swal.close();
                  var y = atob(x);
                  if (y == 1) {
                      swal({
                          title: 'Update Berhasil',
                          text: 'Data Berhasil di Update',
                          icon: 'success'
                      }).then((Refreshh) => {
                          location.reload()
                      });
                  } else {
                      swal({
                          title: 'Update Gagal',
                          text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !',
                          icon: 'error'
                      });
                  }

              },
              error: function() {
                  swal.close();
                  swal({
                      title: 'Update Gagal',
                      text: 'Jaringan Anda Bermasalah !',
                      icon: 'error'
                  });
              }
          })
      }

      function refresh() {
          $("#ide").val("");
          $("#idfke").val("");
          $("#namae").val("");
          $('#md_edit').modal('hide');
      }
  </script>

  </body>

  </html>