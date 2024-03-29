  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jabatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Jabatan</li>
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
                <table id="tbl_jbt" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

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
            <h4 class="modal-title">Edit Jabatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label>Nama Jabatan</label>
                <input type="hidden" name="ide" id="ide">
                <input type="text" class="form-control" required placeholder="Masukkan Nama Departemen" name="namae" id="namae">
              </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary waves-effect waves-light">Reset</button>
            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="update()">Update</button>
          </div>
          </form> <!-- TUTUP FORM -->
        </div>
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
          <h4 class="modal-title">Tambah Jabatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label>Nama Jabatan</label>
              <input type="text" class="form-control" required placeholder="Masukkan Nama Jabatan" name="nama" id="nama">
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
    swal("Sedang Mengakses Data.....", {
      button: false,
      closeOnClickOutside: false,
      closeOnEsc: false
    });
    var tabel = $("#tbl_jbt").DataTable({
      "responsive": true,
      "autoWidth": false,
      "ajax": "<?php echo base_url(); ?>admin/jabatan/json",
      "fnDrawCallback": function(oSettings) {
        swal.close();
      }
    });

    function hapus(el) {
      var id = $(el).data("id");
      // console.log(id);
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
            url: "<?php echo base_url(); ?>admin/jabatan/destroy",
            method: "POST",
            data: {
              id: id
            },
            cache: "false",
            success: function(x) {
              swal.close();
              var y = atob(x);
              if (y == 1) {
                swal({
                  title: 'Hapus Berhasil',
                  text: 'Data Berhasil di Hapus',
                  icon: 'success'
                }).then((Refreshh) => {
                  // refresh();
                  tabel.ajax.reload(null, false);
                });
              } else {
                if (y == 90) {
                  swal({
                    title: 'Hapus Gagal',
                    text: 'Data Level Masih digunakan, Sehingga Tidak Dapat di Hapus Hanya Dapat di Ubah',
                    icon: 'error'
                  });
                  // refresh();
                } else {
                  swal({
                    title: 'Hapus Gagal',
                    text: 'Periksa Kembali Data Yang Anda Pilih !',
                    icon: 'error'
                  });
                }
              }
            },
            error: function() {
              swal.close();
              swal({
                title: 'Hapus Gagal',
                text: 'Jaringan Anda Bermasalah !',
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

      var a = $("#nama").val();
      if (a == "") {
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
        url: "<?php echo base_url(); ?>admin/jabatan/store",
        method: "POST",
        data: {
          a: a
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
              $('#md_tbh').modal('hide');
              refresh();
              tabel.ajax.reload(null, false);
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
        url: "<?php echo base_url(); ?>admin/jabatan/filter",
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
            $("#namae").val(xx[2]);
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
      var nm = $("#namae").val();

      if (id == "" || nm == "") {
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
        url: "<?php echo base_url(); ?>admin/jabatan/update",
        method: "POST",
        data: {
          id: id,
          nm: nm
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
              refresh();
              tabel.ajax.reload(null, false);
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
      $("#namae").val("");
      $('#md_edit').modal('hide');
    }
  </script>

  </body>

  </html>