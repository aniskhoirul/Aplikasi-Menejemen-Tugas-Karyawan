-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 08:26 AM
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
  `notif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_job`
--

INSERT INTO `tb_detail_job` (`id_detail`, `id_job`, `waktu_mulai`, `waktu_akhir`, `status`, `data_job`, `upload`, `notif`) VALUES
(1, 3, '2021-07-01', '2022-07-31', 'false', 'data-job.pdf', NULL, 'true'),
(2, 2, '2022-07-13', '2022-07-31', 'false', 'data-job.pdf', NULL, 'true'),
(3, 4, '2022-07-08', '2022-07-14', 'false', 'data-job.pdf', NULL, 'true'),
(4, 5, '2022-09-01', '2022-09-29', 'false', 'file.pdf', NULL, ''),
(5, 6, '2022-08-04', '2022-08-20', 'true', 'Nama-mahasiswa.pdf', 'web_pegawai_(1).pdf', ''),
(6, 7, '2022-09-01', '2022-09-20', 'false', 'mahasiswa.pdf', NULL, ''),
(7, 7, '2022-09-24', '2022-09-27', 'false', 'mahasiswa.pdf', NULL, '');

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
(1, 1, 1, 'List Job'),
(2, 2, 2, 'List Job tambahan'),
(3, 2, 1, 'Jadwal Ujian Lab Bahasa'),
(4, 2, 3, 'Data Mahasiswa'),
(5, 2, 2, 'list karyawan'),
(6, 2, 1, 'Daftar Mahasiswa baru'),
(7, 2, 1, 'Data Mahasiswa'),
(8, 2, 3, 'Data Mahasiswa');

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
(6, 'Herni Idaw', 3, '2022-07-19', 'Jombang', '', '');

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
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
