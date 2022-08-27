<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['default_controller'] = 'Master';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// ======================MASTER======================

$route['dashboard'] = 'Master/index';
$route['jabatan'] = 'Master/jabatan';
$route['json_jbn'] = 'Master/json_jbn';
$route['h_jbn'] = 'Master/hapus_jbn';
$route['tbh_jbn'] = 'Master/tambah_jbn';
$route['f_jbn'] = 'Master/filter_jbn';
$route['ub_jbn'] = 'Master/ubah_jbn';


//Fakultas//
$route['dashboard'] = 'Master/index';
$route['fakultas'] = 'Master/fakultas';
$route['json_fk'] = 'Master/json_fk';
$route['h_fk'] = 'Master/hapus_fk';
$route['tbh_fk'] = 'Master/tambah_fk';
$route['f_fk'] = 'Master/filter_fk';
$route['ub_fk'] = 'Master/ubah_fk';

//Prodi//
$route['dashboard'] = 'Master/index';
$route['prodi'] = 'Master/prodi';
$route['json_pr'] = 'Master/json_pr';
$route['h_pr'] = 'Master/hapus_pr';
$route['tbh_pr'] = 'Master/tambah_pr';
$route['f_pr'] = 'Master/filter_pr';
$route['ub_pr'] = 'Master/ubah_pr';

//MAHASISWA//
$route['dashboard'] = 'Master/index';
$route['mahasiswa'] = 'Master/mahasiswa';
$route['json_mh'] = 'Master/json_mh';
$route['h_mh'] = 'Master/hapus_mh';
$route['tbh_mh'] = 'Master/tambah_mh';
$route['f_mh'] = 'Master/filter_mh';
$route['ub_mh'] = 'Master/ubah_mh';

//ABSENSI//
$route['dashboard'] = 'Master/index';
$route['absensi'] = 'Master/absensi';
$route['json_abs'] = 'Master/json_abs';
$route['h_abs'] = 'Master/hapus_abs';
$route['tbh_abs'] = 'Master/tambah_abs';
$route['f_abs'] = 'Master/filter_abs';
$route['ub_abs'] = 'Master/ubah_abs';

//JN_SURAT//
$route['dashboard'] = 'Master/index';
$route['jnsurat'] = 'Master/jnsurat';
$route['json_js'] = 'Master/json_js';
$route['h_js'] = 'Master/hapus_js';
$route['tbh_js'] = 'Master/tambah_js';
$route['f_js'] = 'Master/filter_js';
$route['ub_js'] = 'Master/ubah_js';

// SURAT//
$route['dashboard'] = 'Master/index';
$route['surat'] = 'Master/surat';
$route['json_surat'] = 'Master/json_surat';
$route['h_surat'] = 'Master/hapus_surat';
$route['tbh_surat'] = 'Master/tambah_surat';
$route['f_surat'] = 'Master/filter_surat';
$route['ub_surat'] = 'Master/ubah_surat';


//DOSEN//
$route['dashboard'] = 'Master/index';
$route['dosen'] = 'Master/dosen';
$route['json_dos'] = 'Master/json_dos';
$route['h_dos'] = 'Master/hapus_dos';
$route['tbh_dos'] = 'Master/tambah_dos';
$route['f_dos'] = 'Master/filter_dos';
$route['ub_dos'] = 'Master/ubah_dos';

//JENIS GAJI//
$route['dashboard'] = 'Master/index';
$route['jenisgaji'] = 'Master/jenisgaji';
$route['json_jgaji'] = 'Master/json_jgaji';
$route['h_jgaji'] = 'Master/hapus_jgaji';
$route['tbh_jgaji'] = 'Master/tambah_jgaji';
$route['f_jgaji'] = 'Master/filter_jgaji';
$route['ub_jgaji'] = 'Master/ubah_jgaji';

// GAJI//
$route['dashboard'] = 'Master/index';
$route['gaji'] = 'Master/gaji';
$route['json_gaji'] = 'Master/json_gaji';
$route['h_gaji'] = 'Master/hapus_gaji';
$route['tbh_gaji'] = 'Master/tambah_gaji';
$route['f_gaji'] = 'Master/filter_gaji';
$route['ub_gaji'] = 'Master/ubah_gaji';

//KARYAWAN//
$route['dashboard'] = 'Master/index';
$route['karyawan'] = 'Master/karyawan';
$route['json_kr'] = 'Master/json_kr';
$route['h_kr'] = 'Master/hapus_kr';
$route['tbh_kr'] = 'Master/tambah_kr';
$route['f_kr'] = 'Master/filter_kr';
$route['ub_kr'] = 'Master/ubah_kr';

//TAHUN MASUK//
$route['dashboard'] = 'Master/index';
$route['tahun_masuk'] = 'Master/tahun_masuk';
$route['json_tm'] = 'Master/json_tm';
$route['h_tm'] = 'Master/hapus_tm';
$route['tbh_tm'] = 'Master/tambah_tm';
$route['f_tm'] = 'Master/filter_tm';
$route['ub_tm'] = 'Master/ubah_tm';

//ANDROID//
$route['api/v1/login'] = 'api/Login';

$route['api/v1/tugas-pokok'] = 'api/TugasPokokController';
$route['api/v1/tugas-pokok/filter'] = 'api/TugasPokokController/filter';
$route['api/v1/tugas-pokok/store'] = 'api/TugasPokokController/store';
$route['api/v1/tugas-tambahan'] = 'api/TugasTambahanController';
$route['api/v1/tugas-detail'] = 'api/TugasPokokController/show';
$route['api/v1/tugas-revisi'] = 'api/revisi';
$route['api/v1/download-tugas-pokok'] = 'api/TugasPokokController/download';