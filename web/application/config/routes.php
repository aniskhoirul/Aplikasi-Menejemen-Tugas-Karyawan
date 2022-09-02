<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Auth/LoginController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// =================LOGIN=========================
$route['login'] = 'Auth/LoginController/index';
$route['auth/login'] = 'Auth/LoginController/auth';
$route['logout'] = 'Auth/LoginController/logout';


// ======================DOSEN======================

$route['dosen/dashboard'] = 'dosen/DashboardController';

//Fakultas//
$route['dosen/fakultas'] = 'dosen/FakultasController';
$route['dosen/fakultas/json'] = 'dosen/FakultasController/json';
$route['dosen/fakultas/store'] = 'dosen/FakultasController/store';
$route['dosen/fakultas/filter'] = 'dosen/FakultasController/filter';
$route['dosen/fakultas/update'] = 'dosen/FakultasController/update';
$route['dosen/fakultas/destroy'] = 'dosen/FakultasController/destroy';

// Prodi
$route['dosen/prodi'] = 'dosen/ProdiController';
$route['dosen/prodi/json'] = 'dosen/ProdiController/json';
$route['dosen/prodi/store'] = 'dosen/ProdiController/store';
$route['dosen/prodi/filter'] = 'dosen/ProdiController/filter';
$route['dosen/prodi/update'] = 'dosen/ProdiController/update';
$route['dosen/prodi/destroy'] = 'dosen/ProdiController/destroy';

//KARYAWAN//
$route['dosen/karyawan'] = 'dosen/KaryawanController';
$route['dosen/karyawan/json'] = 'dosen/KaryawanController/json';
$route['dosen/karyawan/store'] = 'dosen/KaryawanController/store';
$route['dosen/karyawan/filter'] = 'dosen/KaryawanController/filter';
$route['dosen/karyawan/update'] = 'dosen/KaryawanController/update';
$route['dosen/karyawan/destroy'] = 'dosen/KaryawanController/destroy';

//DOSEN//
$route['dosen/data-dosen'] = 'dosen/DataDosenController';
$route['dosen/data-dosen/json'] = 'dosen/DataDosenController/json';
$route['dosen/data-dosen/store'] = 'dosen/DataDosenController/store';
$route['dosen/data-dosen/filter'] = 'dosen/DataDosenController/filter';
$route['dosen/data-dosen/update'] = 'dosen/DataDosenController/update';
$route['dosen/data-dosen/destroy'] = 'dosen/DataDosenController/destroy';

//MAHASISWA//
$route['dosen/data-mahasiswa'] = 'dosen/DataMahasiswaController';
$route['dosen/data-mahasiswa/json'] = 'dosen/DataMahasiswaController/json';
$route['dosen/data-mahasiswa/store'] = 'dosen/DataMahasiswaController/store';
$route['dosen/data-mahasiswa/filter'] = 'dosen/DataMahasiswaController/filter';
$route['dosen/data-mahasiswa/update'] = 'dosen/DataMahasiswaController/update';
$route['dosen/data-mahasiswa/destroy'] = 'dosen/DataMahasiswaController/destroy';

//ABSENSI//
$route['dosen/absensi'] = 'dosen/AbsensiController';
$route['dosen/absensi/json'] = 'dosen/AbsensiController/json';
$route['dosen/absensi/store'] = 'dosen/AbsensiController/store';
$route['dosen/absensi/filter'] = 'dosen/AbsensiController/filter';
$route['dosen/absensi/update'] = 'dosen/AbsensiController/update';
$route['dosen/absensi/destroy'] = 'dosen/AbsensiController/destroy';

// GAJI//
$route['dosen/gaji'] = 'dosen/GajiController';
$route['dosen/gaji/json'] = 'dosen/GajiController/json';
$route['dosen/gaji/store'] = 'dosen/GajiController/store';
$route['dosen/gaji/filter'] = 'dosen/GajiController/filter';
$route['dosen/gaji/update'] = 'dosen/GajiController/update';
$route['dosen/gaji/destroy'] = 'dosen/GajiController/destroy';

// JABATAN
$route['dosen/jabatan'] = 'dosen/JabatanController';
$route['dosen/jabatan/json'] = 'dosen/JabatanController/json';
$route['dosen/jabatan/store'] = 'dosen/JabatanController/store';
$route['dosen/jabatan/filter'] = 'dosen/JabatanController/filter';
$route['dosen/jabatan/update'] = 'dosen/JabatanController/update';
$route['dosen/jabatan/destroy'] = 'dosen/JabatanController/destroy';

//TAHUN MASUK//
$route['dosen/tahun-masuk'] = 'dosen/TahunMasukController';
$route['dosen/tahun-masuk/json'] = 'dosen/TahunMasukController/json';
$route['dosen/tahun-masuk/store'] = 'dosen/TahunMasukController/store';
$route['dosen/tahun-masuk/filter'] = 'dosen/TahunMasukController/filter';
$route['dosen/tahun-masuk/update'] = 'dosen/TahunMasukController/update';
$route['dosen/tahun-masuk/destroy'] = 'dosen/TahunMasukController/destroy';

// SURAT//
$route['dosen/surat'] = 'dosen/SuratController';
$route['dosen/surat/json'] = 'dosen/SuratController/json';
$route['dosen/surat/store'] = 'dosen/SuratController/store';
$route['dosen/surat/filter'] = 'dosen/SuratController/filter';
$route['dosen/surat/update'] = 'dosen/SuratController/update';
$route['dosen/surat/destroy'] = 'dosen/SuratController/destroy';

//JN_SURAT//
$route['dashboard'] = 'Master/index';
$route['jnsurat'] = 'Master/jnsurat';
$route['json_js'] = 'Master/json_js';
$route['h_js'] = 'Master/hapus_js';
$route['tbh_js'] = 'Master/tambah_js';
$route['f_js'] = 'Master/filter_js';
$route['ub_js'] = 'Master/ubah_js';

//JENIS GAJI//
$route['dashboard'] = 'Master/index';
$route['jenisgaji'] = 'Master/jenisgaji';
$route['json_jgaji'] = 'Master/json_jgaji';
$route['h_jgaji'] = 'Master/hapus_jgaji';
$route['tbh_jgaji'] = 'Master/tambah_jgaji';
$route['f_jgaji'] = 'Master/filter_jgaji';
$route['ub_jgaji'] = 'Master/ubah_jgaji';







// ================================KARYAWAN============
$route['karyawan/dashboard'] = 'karyawan/DashboardController';

//ANDROID//
$route['api/v1/login'] = 'api/Login';

// Profil
$route['api/v1/profil'] = 'api/ProfilController';

// tugas pokok
$route['api/v1/tugas-pokok'] = 'api/TugasPokokController';
$route['api/v1/tugas-pokok/store'] = 'api/TugasPokokController/store';
$route['api/v1/download-tugas-pokok'] = 'api/TugasPokokController/download';

// detail semua tugas
$route['api/v1/tugas-detail'] = 'api/TugasPokokController/show';

// tugas tambahan
$route['api/v1/tugas-tambahan'] = 'api/TugasTambahanController';
$route['api/v1/tugas-tambahan/store'] = 'api/TugasTambahanController/store';
$route['api/v1/download-tugas-tambahan'] = 'api/TugasTambahanController/download';

// tugas revisi
$route['api/v1/tugas-revisi'] = 'api/RevisiController';
$route['api/v1/tugas-revisi/store'] = 'api/RevisiController/store';
$route['api/v1/download-tugas-revisi'] = 'api/RevisiController/download';

// History
$route['api/v1/history'] = 'api/HistoryController';
$route['api/v1/history/show'] = 'api/HistoryController/show';