-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 12:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `no_id` int(11) NOT NULL,
  `jml_wajib` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_job`
--

CREATE TABLE `tb_detail_job` (
  `id_detail` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `waktu_mulai` date NOT NULL,
  `waktu_akhir` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `data_job` text NOT NULL,
  `upload` varchar(225) DEFAULT NULL,
  `notif` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_job`
--

INSERT INTO `tb_detail_job` (`id_detail`, `id_job`, `waktu_mulai`, `waktu_akhir`, `status`, `data_job`, `upload`, `notif`, `created_at`) VALUES
(8, 9, '2022-08-29', '2022-08-31', 'true', 'soal.pdf', 'report.pdf', 'true', '2022-08-29 07:40:24'),
(9, 10, '2022-09-09', '2022-09-10', 'true', 'soal.pdf', 'mpdf.pdf', 'true', '2022-08-29 07:40:24'),
(10, 11, '2022-08-29', '2022-08-31', 'true', 'soal-revisi.pdf', '', 'true', '2022-08-31 06:11:37'),
(11, 12, '2021-08-04', '2021-08-14', 'true', 'fcoba.pdf', 'PL_APM.pdf', '', '2022-09-04 05:52:52'),
(12, 13, '2022-08-11', '2022-08-31', 'true', 'informasi.pdf', '', '', '0000-00-00 00:00:00'),
(13, 14, '2022-08-27', '2022-09-10', 'false', 'penelitian.pdf\r\n\r\n', NULL, 'false', '0000-00-00 00:00:00'),
(14, 15, '2022-08-28', '2022-09-17', 'false', 'data.pdf', NULL, '', '2022-09-04 05:49:57'),
(15, 16, '2022-08-31', '2022-09-21', 'false', 'koordinasi dan kerjasama.pdf', NULL, '', '2022-09-04 05:49:38'),
(16, 17, '2022-01-07', '2022-02-07', 'false', 'penyusunan-laporan.pdf', NULL, '', '0000-00-00 00:00:00'),
(17, 18, '2022-01-18', '2022-01-11', 'false', 'Pusat.Komputer.pdf', NULL, '', '0000-00-00 00:00:00'),
(18, 19, '2022-02-23', '2022-06-15', 'false', 'Melaksanakan penyimpanan dan penyajian data serta memberikan infonnasi yang\r\ndibutuhkan.', NULL, '', '2022-09-07 05:11:13'),
(19, 19, '2022-05-10', '2022-05-25', 'false', ' penyimpanan dan penyajian.pdf', NULL, '', '0000-00-00 00:00:00'),
(20, 20, '2022-01-01', '2022-02-08', 'false', 'program kerja.pdf', NULL, '', '0000-00-00 00:00:00'),
(21, 21, '2022-01-18', '2022-01-18', 'false', 'tugas-tugasSub.pdf\r\n', NULL, '', '0000-00-00 00:00:00'),
(22, 22, '2022-02-09', '2022-03-02', 'false', 'tugas-tugasSub.pdf', NULL, '', '0000-00-00 00:00:00'),
(23, 23, '2022-02-15', '2022-02-11', 'false', 'administrasi-pelaksanaan-anggaran.pdf\r\n', NULL, '', '0000-00-00 00:00:00'),
(24, 24, '2022-03-01', '2022-03-31', 'false', 'administrasi-penyusunan-anggaran.pdf', NULL, '', '0000-00-00 00:00:00'),
(25, 25, '2022-07-06', '2022-08-01', 'false', 'pengawasan keuangan.pdf\r\n', NULL, '', '0000-00-00 00:00:00'),
(26, 26, '2022-01-19', '2022-02-09', 'false', 'administrasi.pdf', NULL, '', '0000-00-00 00:00:00'),
(27, 27, '2022-01-27', '2022-05-11', 'false', 'petunjuk.pdf', NULL, '', '0000-00-00 00:00:00'),
(28, 28, '2022-07-06', '2022-09-07', 'false', 'penilaian prestasi.pdf', NULL, '', '0000-00-00 00:00:00'),
(29, 29, '2022-09-08', '2022-09-12', 'false', 'laporan kegiatan.pdf\r\n', NULL, '', '0000-00-00 00:00:00'),
(30, 30, '2022-02-01', '2022-02-28', 'false', 'program kerja.pdf\r\n', NULL, '', '0000-00-00 00:00:00'),
(31, 31, '2022-03-08', '2022-03-31', 'false', 'data keuangan.pdf\r\n', NULL, '', '0000-00-00 00:00:00'),
(32, 32, '2022-01-04', '2022-01-18', 'false', 'rencana keuangan.pdf', NULL, '', '0000-00-00 00:00:00'),
(33, 33, '2022-01-20', '2022-01-31', 'false', 'program kerja.pdf', NULL, '', '2022-09-07 09:32:24'),
(34, 34, '2022-01-18', '2022-02-22', 'false', 'buku kegiatan.pdf', NULL, '', '0000-00-00 00:00:00'),
(35, 35, '2022-02-08', '2022-02-28', 'false', '(DP3).pdf\r\n', NULL, '', '0000-00-00 00:00:00'),
(36, 36, '2022-02-16', '2022-03-31', 'false', 'presensi.pdf', NULL, '', '0000-00-00 00:00:00'),
(37, 38, '2022-04-04', '2022-04-11', 'false', 'komputerisasi.pdf', NULL, '', '0000-00-00 00:00:00'),
(38, 39, '2022-04-19', '2022-05-17', 'false', 'data / informasi.pdf', NULL, '', '0000-00-00 00:00:00'),
(39, 40, '2022-05-10', '2022-05-11', 'false', 'data / informasi.pdf', NULL, '', '0000-00-00 00:00:00'),
(40, 41, '2022-01-25', '2022-01-31', 'false', 'infonnasi.pdf', NULL, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `no_id` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_dosen` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `pasword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dt_absensi`
--

CREATE TABLE `tb_dt_absensi` (
  `id_dt_absen` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `nilai_absensi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dt_gaji`
--

CREATE TABLE `tb_dt_gaji` (
  `id_dt_gaji` int(11) NOT NULL,
  `id_jn_gaji` int(11) NOT NULL,
  `nama_gaji` varchar(25) NOT NULL,
  `nominal_gaji` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dt_surat`
--

CREATE TABLE `tb_dt_surat` (
  `id_dt_surat` int(11) NOT NULL,
  `id_jn_surat` int(11) NOT NULL,
  `id_thn_masuk` int(11) NOT NULL,
  `upload_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Pengelola '),
(2, 'Feeder'),
(3, 'Staf admin'),
(4, 'Staf maint'),
(5, 'Staf admin'),
(6, 'Bendahara '),
(7, 'Staf Kerum'),
(8, 'Koperasi U'),
(9, 'Staf Kerja'),
(10, 'Staf Kemah'),
(11, 'Staf kepeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jn_gaji`
--

CREATE TABLE `tb_jn_gaji` (
  `id_jn_gaji` int(11) NOT NULL,
  `nama_jn_gaji` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jn_job`
--

CREATE TABLE `tb_jn_job` (
  `id_jn_job` int(11) NOT NULL,
  `nama_jn_job` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jn_job`
--

INSERT INTO `tb_jn_job` (`id_jn_job`, `nama_jn_job`) VALUES
(1, 'pokok'),
(2, 'tambahan'),
(3, 'revisi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jn_surat`
--

CREATE TABLE `tb_jn_surat` (
  `id_jn_surat` int(11) NOT NULL,
  `nama_surat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_job`
--

CREATE TABLE `tb_job` (
  `id_job` int(11) NOT NULL,
  `no_id` int(11) NOT NULL,
  `id_jn_job` int(11) NOT NULL,
  `list_job` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_job`
--

INSERT INTO `tb_job` (`id_job`, `no_id`, `id_jn_job`, `list_job`) VALUES
(9, 2, 1, 'data pendidikan dan pengajaran'),
(10, 2, 2, 'n komputerisasi program pendidikan dan pengajaran,\r\n'),
(11, 2, 3, ' peningkatan dan pengembangan\r\npengetahuan sumber Jaya dibidang komputer.\r\n'),
(12, 2, 1, 'tugas pokok tambahan'),
(13, 2, 1, 'pengolahan data dan informasi tugas-tugas seluruh Unit Kerja dan Bagian-bagian'),
(14, 2, 1, 'penelitian dan pengabdian masyarakat.\r\n'),
(15, 2, 1, 'Menyusun konsep rencana kegiatan danprogram kerja Pusat Komputer'),
(16, 2, 1, 'koordinasi dan kerjasama antar Pusat Komputer'),
(17, 2, 1, 'Melaksanakan penilaian prestasi kegiatan dan proses penyelenggaraan kegiatan\r\nserta penyusunan laporan.'),
(18, 2, 1, 'engusahakan dan melaksanakan administrasi ketatausahaan dan kerumah tanggaan Pusat Komputer.'),
(19, 2, 1, 'Melaksanakan penyimpanan dan penyajian data serta memberikan infonnasi yang\r\ndibutuhkan.'),
(20, 6, 1, 'Menyusun rencana kegiatan dan program kerja'),
(21, 6, 1, 'Menyusun konsep rencana di bidang keuangan'),
(22, 6, 1, 'Mengkoordinasikan tugas-tugasSub Bagian di bawahnya.\r\n'),
(23, 6, 1, 'administrasi penyusunan anggaran.'),
(24, 6, 1, 'administrasi pelaksanaan anggaran.\r\n'),
(25, 6, 1, 'pengelolaan dan pengawasan keuangan.\r\n'),
(26, 6, 1, 'mengolah administrasi dan menyajikan data keuangan.'),
(27, 6, 1, 'Memberikan bimbingan / petunjuk pelaksanaan tugas.\r\n'),
(28, 6, 1, 'penilaian prestasi'),
(29, 6, 1, 'proses penyelenggaraan\r\nkegiatan serta penyusunan laporan kegiatan.\r\n'),
(30, 6, 1, 'rencana kegiatan dan program kerja.\r\n'),
(31, 6, 1, 'mengolah administrasi dan menyajikan data keuangan.\r\n'),
(32, 6, 2, 'konsep rencana di bidang keuangan.'),
(33, 6, 2, 'rencana kegiatan dan program kerja.'),
(34, 6, 2, 'Mengisi buku kegiatan harian'),
(35, 6, 2, 'Mengisi buku kegiatan harian'),
(36, 6, 2, 'Daftar Penilaian Prestasi Pegawai (DP3)\r\n'),
(37, 6, 2, 'administrasi presensi pegawai'),
(38, 2, 2, 'Melayani kegiatan komputerisasi'),
(39, 2, 2, 'menyajikan data / informasi yang diperlukan.'),
(40, 2, 3, 'menyusun menyajikan data / informasi yang diperlukan.'),
(41, 6, 3, 'infonnasi yang\r\ndibutuhkan.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `no_id` int(11) NOT NULL,
  `nama_karyawan` varchar(10) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `pasword` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`no_id`, `nama_karyawan`, `id_jabatan`, `tgl_lahir`, `tempat_lahir`, `pasword`, `email`) VALUES
(1, 'Ima Tri Wa', 1, '2022-07-13', 'Jombang', '81dc9bdb52d04dc20036dbd8313ed055', 'ima@gmail.com'),
(2, 'Novia Angg', 2, '2022-07-03', 'Jombang', '81dc9bdb52d04dc20036dbd8313ed055', 'novia@gmail.com'),
(3, 'Badriyatul', 2, '2022-07-16', 'Jombang', '1234', 'Badriyatul@gmail'),
(4, 'Nuning Eva', 1, '2022-07-10', 'Jombang', '81dc9bdb52d04dc20036dbd8313ed055', 'Nuning@gmail.com'),
(5, 'Hanum Fari', 1, '2022-07-26', 'Jombang', '1234', 'HanumFaridah@gmail.com'),
(6, 'Herni Idaw', 3, '2022-07-19', 'Jombang', '81dc9bdb52d04dc20036dbd8313ed055', 'herni@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_thn_masuk` int(4) NOT NULL,
  `pasword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_thn_masuk`
--

CREATE TABLE `tb_thn_masuk` (
  `id_thn_masuk` int(11) NOT NULL,
  `nama_tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tb_detail_job`
--
ALTER TABLE `tb_detail_job`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `tb_dt_absensi`
--
ALTER TABLE `tb_dt_absensi`
  ADD PRIMARY KEY (`id_dt_absen`);

--
-- Indexes for table `tb_dt_gaji`
--
ALTER TABLE `tb_dt_gaji`
  ADD PRIMARY KEY (`id_dt_gaji`);

--
-- Indexes for table `tb_dt_surat`
--
ALTER TABLE `tb_dt_surat`
  ADD PRIMARY KEY (`id_dt_surat`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_jn_gaji`
--
ALTER TABLE `tb_jn_gaji`
  ADD PRIMARY KEY (`id_jn_gaji`);

--
-- Indexes for table `tb_jn_job`
--
ALTER TABLE `tb_jn_job`
  ADD PRIMARY KEY (`id_jn_job`);

--
-- Indexes for table `tb_jn_surat`
--
ALTER TABLE `tb_jn_surat`
  ADD PRIMARY KEY (`id_jn_surat`);

--
-- Indexes for table `tb_job`
--
ALTER TABLE `tb_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_thn_masuk`
--
ALTER TABLE `tb_thn_masuk`
  ADD PRIMARY KEY (`id_thn_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_job`
--
ALTER TABLE `tb_detail_job`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_dt_absensi`
--
ALTER TABLE `tb_dt_absensi`
  MODIFY `id_dt_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_jn_job`
--
ALTER TABLE `tb_jn_job`
  MODIFY `id_jn_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_job`
--
ALTER TABLE `tb_job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
