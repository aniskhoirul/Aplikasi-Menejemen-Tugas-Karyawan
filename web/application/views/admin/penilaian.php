  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Penilaian Kinerja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="<?=base_url('kinerja')?>">Penilaian Kinerja</a></li>
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
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Input Penilaian Kinerja</h3>
                    </div>
                    <div class="card-body">
                      <form id="myForm" action="" class="form-horizontal" method="get">
                        <div class="form-group row">
                            <label for="bulan" class="col-sm-2 col-form-label">Bulan Penilaian</label>
                            <div class="col-sm-10">
                            <input id="inp-search" name="bulan" placeholder="Pencarian bulan tahun" class="form-control" style="padding: 5px; box-sizing: border-box;" type="text" autocomplete="off" value="<?=$bulan?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_karyawan" class="col-sm-2 col-form-label">Karyawan</label>
                            <div class="col-sm-10">
                                <select id="id_karyawan" name="id_karyawan" class="form-control select2">
                                    <?php foreach ($dtkaryawan as $key) { 
                                        $selected = $key->no_id == @$id_karyawan ? 'selected' : ''; ?>
                                        <option value="<?= $key->no_id ?>" <?=$selected?>><?= $key->nama_karyawan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div style="text-align:right">
                          <button id="save" type="submit" class="btn btn-success">Cari </button>
                        </div>
                      </form>

                      <form id="form-simpan" action="<?= base_url('admin/penilaian-pegawai/store') ?>" method="post">
                        <div class="col-md-12" style="margin-top:30px">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Kualitas Kinerja</th>
                                            <th class="text-center">Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                        $kelompok = '';
                                        foreach ($kualitas as $row) {
                                            $TotalBobot = $row->point != '' ? $row->point : 0;
                                            $isedit = $row->id_kinerja_pegawai != '' ? 'edit' : 'tambah';
                                            if($kelompok !== $row->nama_kualitas){
                                                $no = 0;
                                                echo '<tr style="background:#f7f7f7;">
                                                <td><strong>'.ucwords($row->nama_kualitas).'</strong></td>
                                                <td class="text-right"><h5 id="jml'.$row->nama_kualitas.'">'.$TotalBobot.'</h5></td>
                                                </tr>';
                                                $kelompok = $row->nama_kualitas;
                                            }
                                            echo '<tr>
                                            <td class="text-left">' . $row->nama . '</td>
                                            <td class="text-center" width="100">
                                                <input type="hidden" name="tanggal" value="'.$bulan.'-01">
                                                <input type="hidden" name="id_karyawan" value="'.$id_karyawan.'">
                                                <input type="hidden" name="id_detil_kualitas[]" value="'.$row->id.'">
                                                <input type="hidden" name="id_kualitas_kerja[]" value="'.$row->id_kualitas_kerja.'">
                                                <input type="hidden" name="id_kinerja_pegawai[]" value="'.$row->id_kinerja_pegawai.'">
                                                <input type="hidden" name="isedit" value="'.$isedit.'">';

                                                if($row->nama == 'Kehadiran'){

                                                  $point_kehadiran = ($row->point_kehadiran / 100 * $TotalBobot);
                                                  $kehadiran = $row->point_kinerja != '' ? $row->point_kinerja : $point_kehadiran;
                                                 
                                                  echo '<input type="text" min="0" onkeyup="cekdata('.$row->id_kualitas_kerja.', '.$row->id.', '.$row->point.')" class="form-control jumlah_'.$row->id_kualitas_kerja.' total" name="point_kinerja[]" value="' . $kehadiran . '" readonly>';

                                                }else{
                                                  echo '<input type="text" min="0" onkeyup="cekdata('.$row->id_kualitas_kerja.', '.$row->id.', '.$row->point.')" class="form-control jumlah_'.$row->id_kualitas_kerja.' total" name="point_kinerja[]" value="' . $row->point_kinerja . '">';
                                                }
                                                
                                                
                                            echo '</td>
                                            
                                            </tr>';
                                        }
                                       
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align:right">
                                <?php if($kualitas[0]->id_kinerja_pegawai != '') : ?>
                                <a target="_blank" class="btn btn-danger pull-right" href="<?=base_url('admin/penilaian-pegawai/cetak/?id_karyawan='.$id_karyawan.'&bulan='.$bulan)?>"><span class="fa fa-print"></span> CETAK PDF</a>
                                <?php endif; ?>

                                <input type="submit" class="btn btn-info pull-right" id="simpan" value="SIMPAN DATA" readonly/>
                                <br>
                                <br><span class="text-danger" id="msg"></span>
                            </div>
                        </div>
                      </form>
                        
                        
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
    <strong>Copyright &copy; 2022 <a href="<?=base_url()?>">SIMKAMPUS</a>.</strong>
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

    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()
    })

    function cekdata(id_kualitas, id_detil, point) {
        var regex = /^\d*[.]?\d*$/;    
        var sum = 0 ;
        $('.jumlah_'+id_kualitas).each(function(){
            if(regex.test($(this).val())) {
                var tempNumber = $(this).val() == '' ? 0 : $(this).val();
                sum = sum + parseFloat(tempNumber);
                if(sum > point){
                    $(this).val('');
                }
            } else{
                sum = sum + 0;
                $(this).val('');
            }
        });    
        if(sum > point){
            alert('Point Kinerja lebih dari '+point);
            var sum1 = 0 ;
            $('.jumlah_'+id_kualitas).each(function(){
                var tempNumber = $(this).val() == '' ? 0 : $(this).val();
                sum1 = sum1 + parseFloat(tempNumber);
            });
            // document.getElementById('jmlPerencanaan').innerHTML = sum1;
        } else{
            // document.getElementById('jmlPerencanaan').innerHTML = sum;
        }       
    }

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
        url: "<?= base_url('admin/penilaian-pegawai/store') ?>",
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