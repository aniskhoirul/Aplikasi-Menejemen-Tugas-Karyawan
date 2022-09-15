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

// GAJI
$route['dosen/gaji'] = 'dosen/GajiController';
$route['dosen/gaji/json'] = 'dosen/GajiController/json';

// Absesnsi
$route['dosen/absensi'] = 'dosen/AbsensiController';
$route['dosen/absensi/json'] = 'dosen/AbsensiController/json';
$route['dosen/absensi/show'] = 'dosen/AbsensiController/show';
$route['dosen/absensi/json_detail'] = 'dosen/AbsensiController/json_detail';



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


// ===============================Admin================
$route['admin/dashboard'] = 'admin/DashboardController';

// Tugas
$route['admin/tugas'] = 'admin/TugasController';
$route['admin/tugas/store'] = 'admin/TugasController/store';
$route['admin/tugas/show/(:any)'] = 'admin/TugasController/show/$1';
$route['admin/tugas/store_detail'] = 'admin/TugasController/store_detail';
$route['admin/tugas/filter'] = 'admin/TugasController/filter';
$route['admin/tugas/update'] = 'admin/TugasController/update';
$route['admin/tugas/destroy'] = 'admin/TugasController/destroy';

//Fakultas//
$route['admin/fakultas'] = 'admin/FakultasController';
$route['admin/fakultas/json'] = 'admin/FakultasController/json';
$route['admin/fakultas/store'] = 'admin/FakultasController/store';
$route['admin/fakultas/filter'] = 'admin/FakultasController/filter';
$route['admin/fakultas/update'] = 'admin/FakultasController/update';
$route['admin/fakultas/destroy'] = 'admin/FakultasController/destroy';

// Prodi
$route['admin/prodi'] = 'admin/ProdiController';
$route['admin/prodi/json'] = 'admin/ProdiController/json';
$route['admin/prodi/store'] = 'admin/ProdiController/store';
$route['admin/prodi/filter'] = 'admin/ProdiController/filter';
$route['admin/prodi/update'] = 'admin/ProdiController/update';
$route['admin/prodi/destroy'] = 'admin/ProdiController/destroy';

//KARYAWAN//
$route['admin/karyawan'] = 'admin/KaryawanController';
$route['admin/karyawan/json'] = 'admin/KaryawanController/json';
$route['admin/karyawan/store'] = 'admin/KaryawanController/store';
$route['admin/karyawan/filter'] = 'admin/KaryawanController/filter';
$route['admin/karyawan/update'] = 'admin/KaryawanController/update';
$route['admin/karyawan/destroy'] = 'admin/KaryawanController/destroy';

//DOSEN//
$route['admin/data-dosen'] = 'admin/DataDosenController';
$route['admin/data-dosen/json'] = 'admin/DataDosenController/json';
$route['admin/data-dosen/store'] = 'admin/DataDosenController/store';
$route['admin/data-dosen/filter'] = 'admin/DataDosenController/filter';
$route['admin/data-dosen/update'] = 'admin/DataDosenController/update';
$route['admin/data-dosen/destroy'] = 'admin/DataDosenController/destroy';

//MAHASISWA//
$route['admin/data-mahasiswa'] = 'admin/DataMahasiswaController';
$route['admin/data-mahasiswa/json'] = 'admin/DataMahasiswaController/json';
$route['admin/data-mahasiswa/store'] = 'admin/DataMahasiswaController/store';
$route['admin/data-mahasiswa/filter'] = 'admin/DataMahasiswaController/filter';
$route['admin/data-mahasiswa/update'] = 'admin/DataMahasiswaController/update';
$route['admin/data-mahasiswa/destroy'] = 'admin/DataMahasiswaController/destroy';

//ABSENSI//
$route['admin/absensi'] = 'admin/AbsensiController';
$route['admin/absensi/json'] = 'admin/AbsensiController/json';
$route['admin/absensi/store'] = 'admin/AbsensiController/store';
$route['admin/absensi/filter'] = 'admin/AbsensiController/filter';
$route['admin/absensi/update'] = 'admin/AbsensiController/update';
$route['admin/absensi/destroy'] = 'admin/AbsensiController/destroy';

// GAJI//
$route['admin/gaji'] = 'admin/GajiController';
$route['admin/gaji/json'] = 'admin/GajiController/json';
$route['admin/gaji/store'] = 'admin/GajiController/store';
$route['admin/gaji/filter'] = 'admin/GajiController/filter';
$route['admin/gaji/update'] = 'admin/GajiController/update';
$route['admin/gaji/destroy'] = 'admin/GajiController/destroy';

// JENIS GAJI//
$route['admin/jenis-penggajian'] = 'admin/GajiJenisController';
$route['admin/jenis-penggajian/json'] = 'admin/GajiJenisController/json';
$route['admin/jenis-penggajian/store'] = 'admin/GajiJenisController/store';
$route['admin/jenis-penggajian/filter'] = 'admin/GajiJenisController/filter';
$route['admin/jenis-penggajian/update'] = 'admin/GajiJenisController/update';
$route['admin/jenis-penggajian/destroy'] = 'admin/GajiJenisController/destroy';

// LAPORAN PENGGAJIAN
$route['admin/laporan-penggajian'] = 'admin/GajiLaporanController';
$route['admin/laporan-penggajian/cetak'] = 'admin/GajiLaporanController/cetak';

// JABATAN
$route['admin/jabatan'] = 'admin/JabatanController';
$route['admin/jabatan/json'] = 'admin/JabatanController/json';
$route['admin/jabatan/store'] = 'admin/JabatanController/store';
$route['admin/jabatan/filter'] = 'admin/JabatanController/filter';
$route['admin/jabatan/update'] = 'admin/JabatanController/update';
$route['admin/jabatan/destroy'] = 'admin/JabatanController/destroy';

//TAHUN MASUK//
$route['admin/tahun-masuk'] = 'admin/TahunMasukController';
$route['admin/tahun-masuk/json'] = 'admin/TahunMasukController/json';
$route['admin/tahun-masuk/store'] = 'admin/TahunMasukController/store';
$route['admin/tahun-masuk/filter'] = 'admin/TahunMasukController/filter';
$route['admin/tahun-masuk/update'] = 'admin/TahunMasukController/update';
$route['admin/tahun-masuk/destroy'] = 'admin/TahunMasukController/destroy';

// SURAT//
$route['admin/surat'] = 'admin/SuratController';
$route['admin/surat/json'] = 'admin/SuratController/json';
$route['admin/surat/store'] = 'admin/SuratController/store';
$route['admin/surat/filter'] = 'admin/SuratController/filter';
$route['admin/surat/update'] = 'admin/SuratController/update';
$route['admin/surat/destroy'] = 'admin/SuratController/destroy';

// Penilaian Pegawai
$route['admin/penilaian-pegawai'] = 'admin/PenilaianPegawaiController';
$route['admin/penilaian-pegawai/store'] = 'admin/PenilaianPegawaiController/simpan';
$route['admin/penilaian-pegawai/cetak'] = 'admin/PenilaianPegawaiController/cetak';

// Laporan Penilaian
$route['admin/laporan-penilaian'] = 'admin/LaporanPenilaianController';
$route['admin/laporan-penilaian/cetak'] = 'admin/LaporanPenilaianController/cetak_laporan';
$route['admin/laporan-penilaian/chart'] = 'admin/LaporanPenilaianController/chart';

// ================================KARYAWAN================
$route['karyawan/dashboard'] = 'karyawan/DashboardController';

// GAJI
$route['karyawan/gaji'] = 'karyawan/GajiController';
$route['karyawan/gaji/json'] = 'karyawan/GajiController/json';
$route['karyawan/gaji/cetak'] = 'karyawan/GajiController/cetak';



// ================================ANDROID============
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