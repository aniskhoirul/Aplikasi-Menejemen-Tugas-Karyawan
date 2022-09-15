-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2022 pada 11.16
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pegawai_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `jml_wajib` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `id_jabatan`, `jml_wajib`) VALUES
(1, 1, 24),
(5, 2, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `name`, `username`, `email`, `password`, `id_jabatan`, `id_role`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1),
(2, 'Admin Keuangan', 'adminkeuangan', 'adminkeuangan@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_job`
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
-- Dumping data untuk tabel `tb_detail_job`
--

INSERT INTO `tb_detail_job` (`id_detail`, `id_job`, `waktu_mulai`, `waktu_akhir`, `status`, `data_job`, `upload`, `notif`, `created_at`) VALUES
(46, 53, '1974-02-15', '2014-03-04', 'false', 'SURAT_EDARAN_PELAKSANAAN_YUDISIUM_DAN_TEHNIS_PENGUMPULAN_TUGAS_AKHIR_TAHUN_AKADEMIK_2021_2022.pdf', NULL, 'false', '2022-09-13 04:06:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_kualitas`
--

CREATE TABLE `tb_detail_kualitas` (
  `id` int(11) NOT NULL,
  `id_kualitas_kerja` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_kualitas`
--

INSERT INTO `tb_detail_kualitas` (`id`, `id_kualitas_kerja`, `nama`) VALUES
(1, 1, 'Kreativitas'),
(2, 2, 'Kehadiran'),
(3, 3, 'Pelanggaran'),
(4, 4, 'Penampilan'),
(5, 4, 'Kesopanan'),
(6, 4, 'Kejujuran'),
(7, 5, 'Kerjasama'),
(8, 5, 'Komunikasi'),
(9, 6, 'Jumlah job yang diberikan'),
(10, 6, 'Hasil yang dilakukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `no_id` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_dosen` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`no_id`, `nidn`, `id_jabatan`, `nama_dosen`, `tgl_lahir`, `tempat_lahir`, `password`) VALUES
(1, 12345678, 1, 'Nama Dosen', '2022-08-30', 'Jombang', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 36, 8, 'Ut doloribus illum', '2016-03-12', 'Voluptas beatae nece', 'f3ed11bbdb94fd9ebdefbaf646ab94d3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dt_absensi`
--

CREATE TABLE `tb_dt_absensi` (
  `id_dt_absen` int(11) NOT NULL,
  `id_no_id` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `nilai_absensi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dt_absensi`
--

INSERT INTO `tb_dt_absensi` (`id_dt_absen`, `id_no_id`, `id_absen`, `waktu`, `nilai_absensi`) VALUES
(1, 1, 1, '6', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dt_gaji`
--

CREATE TABLE `tb_dt_gaji` (
  `id_dt_gaji` int(11) NOT NULL,
  `id_jn` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_gaji` text DEFAULT NULL,
  `nominal_gaji` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dt_gaji`
--

INSERT INTO `tb_dt_gaji` (`id_dt_gaji`, `id_jn`, `id_karyawan`, `nama_gaji`, `nominal_gaji`, `tanggal`) VALUES
(16, 1, 1, 'Doloribus architecto', '600000', '2022-09-01'),
(17, 2, 1, 'Soluta dolor atque a', '0', '2022-09-01'),
(18, 3, 1, 'Suscipit sunt sit l', '100000', '2022-09-01'),
(19, 5, 1, 'Aperiam est sit simi', '10000', '2022-09-01'),
(20, 1, 2, 'Sint eu ut voluptatu', '600000', '2022-09-01'),
(21, 2, 2, 'Rerum optio dolorib', '20000', '2022-09-01'),
(22, 3, 2, 'Quam voluptatem min', '100000', '2022-09-01'),
(23, 5, 2, 'Molestias ea volupta', '30000', '2022-09-01'),
(28, 1, 3, 'Possimus quo fugiat', '700000', '2022-09-01'),
(29, 2, 3, 'Odio cupidatat excep', '0', '2022-09-01'),
(30, 3, 3, 'Dolor vel quidem vol', '50000', '2022-09-01'),
(31, 5, 3, 'Pariatur Molestiae ', '0', '2022-09-01'),
(32, 1, 4, 'Aut officiis autem q', '750000', '2022-09-01'),
(33, 2, 4, 'Mollit proident por', '0', '2022-09-01'),
(34, 3, 4, 'Delectus est vitae', '0', '2022-09-01'),
(35, 5, 4, 'Sint quia mollitia e', '0', '2022-09-01'),
(36, 1, 5, 'Et et et quia omnis ', '700000', '2022-09-01'),
(37, 2, 5, 'Sint quam eum labori', '0', '2022-09-01'),
(38, 3, 5, 'Qui ipsum voluptas ', '100000', '2022-09-01'),
(39, 5, 5, 'Explicabo Voluptate', '0', '2022-09-01'),
(40, 1, 6, 'Consectetur libero p', '1500000', '2022-09-01'),
(41, 2, 6, 'Incidunt pariatur ', '500000', '2022-09-01'),
(42, 3, 6, 'Ullamco nulla volupt', '400000', '2022-09-01'),
(43, 5, 6, 'Maiores aut aut arch', '0', '2022-09-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dt_surat`
--

CREATE TABLE `tb_dt_surat` (
  `id_dt_surat` int(11) NOT NULL,
  `id_jn_surat` int(11) NOT NULL,
  `id_thn_masuk` int(11) NOT NULL,
  `upload_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Teknologi Informasi'),
(4, 'Fakultas Ilmu Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
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
-- Struktur dari tabel `tb_jn_gaji`
--

CREATE TABLE `tb_jn_gaji` (
  `id_jn_gaji` int(11) NOT NULL,
  `nama_jn_gaji` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jn_gaji`
--

INSERT INTO `tb_jn_gaji` (`id_jn_gaji`, `nama_jn_gaji`) VALUES
(1, 'Gaji Pokok'),
(2, 'Gaji Bonus'),
(3, 'Gaji Tunjangan'),
(5, 'Gaji Lembur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jn_job`
--

CREATE TABLE `tb_jn_job` (
  `id_jn_job` int(11) NOT NULL,
  `nama_jn_job` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jn_job`
--

INSERT INTO `tb_jn_job` (`id_jn_job`, `nama_jn_job`) VALUES
(1, 'pokok'),
(2, 'tambahan'),
(3, 'revisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jn_surat`
--

CREATE TABLE `tb_jn_surat` (
  `id_jn_surat` int(11) NOT NULL,
  `nama_surat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jn_surat`
--

INSERT INTO `tb_jn_surat` (`id_jn_surat`, `nama_surat`) VALUES
(1, 'Jenis surat 1'),
(2, 'Jenis surat 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_job`
--

CREATE TABLE `tb_job` (
  `id_job` int(11) NOT NULL,
  `no_id` int(11) NOT NULL,
  `id_jn_job` int(11) NOT NULL,
  `list_job` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_job`
--

INSERT INTO `tb_job` (`id_job`, `no_id`, `id_jn_job`, `list_job`) VALUES
(53, 2, 1, 'Tugas Pokok September');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
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
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`no_id`, `nama_karyawan`, `id_jabatan`, `tgl_lahir`, `tempat_lahir`, `pasword`, `email`) VALUES
(1, 'Ima Tri Wa', 1, '2022-07-13', 'Jombang', '5f4dcc3b5aa765d61d8327deb882cf99', 'ima@gmail.com'),
(2, 'Novia Angg', 2, '2022-07-03', 'Jombang', '5f4dcc3b5aa765d61d8327deb882cf99', 'novia@gmail.com'),
(3, 'Badriyatul', 2, '2022-07-16', 'Jombang', '5f4dcc3b5aa765d61d8327deb882cf99', 'Badriyatul@gmail'),
(4, 'Nuning Eva', 1, '2022-07-10', 'Jombang', '5f4dcc3b5aa765d61d8327deb882cf99', 'Nuning@gmail.com'),
(5, 'Hanum Fari', 1, '2022-07-26', 'Jombang', '5f4dcc3b5aa765d61d8327deb882cf99', 'HanumFaridah@gmail.com'),
(6, 'Herni Idaw', 3, '2022-07-19', 'Jombang', '5f4dcc3b5aa765d61d8327deb882cf99', 'herni@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kinerja_pegawai`
--

CREATE TABLE `tb_kinerja_pegawai` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_kualitas_kerja` int(11) DEFAULT NULL,
  `id_detil_kualitas` int(11) DEFAULT NULL,
  `point_kinerja` double DEFAULT 0,
  `grade` varchar(2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hasil` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kinerja_pegawai`
--

INSERT INTO `tb_kinerja_pegawai` (`id`, `id_karyawan`, `id_kualitas_kerja`, `id_detil_kualitas`, `point_kinerja`, `grade`, `tanggal`, `hasil`) VALUES
(81, 1, 1, 1, 16, 'B', '2022-09-01', 88.3),
(82, 1, 2, 2, 12.3, 'B', '2022-09-01', 88.3),
(83, 1, 3, 3, 5, 'B', '2022-09-01', 88.3),
(84, 1, 4, 6, 10, 'B', '2022-09-01', 88.3),
(85, 1, 4, 5, 6, 'B', '2022-09-01', 88.3),
(86, 1, 4, 4, 1, 'B', '2022-09-01', 88.3),
(87, 1, 5, 7, 10, 'B', '2022-09-01', 88.3),
(88, 1, 5, 8, 3, 'B', '2022-09-01', 88.3),
(89, 1, 6, 9, 10, 'B', '2022-09-01', 88.3),
(90, 1, 6, 10, 15, 'B', '2022-09-01', 88.3),
(101, 2, 1, 1, 18, 'B', '2022-09-01', 83),
(102, 2, 2, 2, 0, 'B', '2022-09-01', 83),
(103, 2, 3, 3, 5, 'B', '2022-09-01', 83),
(104, 2, 4, 6, 5, 'B', '2022-09-01', 83),
(105, 2, 4, 5, 5, 'B', '2022-09-01', 83),
(106, 2, 4, 4, 10, 'B', '2022-09-01', 83),
(107, 2, 5, 7, 10, 'B', '2022-09-01', 83),
(108, 2, 5, 8, 5, 'B', '2022-09-01', 83),
(109, 2, 6, 9, 20, 'B', '2022-09-01', 83),
(110, 2, 6, 10, 5, 'B', '2022-09-01', 83),
(111, 3, 1, 1, 20, 'A', '2022-09-01', 96.45),
(112, 3, 2, 2, 12.45, 'A', '2022-09-01', 96.45),
(113, 3, 3, 3, 4, 'A', '2022-09-01', 96.45),
(114, 3, 4, 6, 10, 'A', '2022-09-01', 96.45),
(115, 3, 4, 5, 5, 'A', '2022-09-01', 96.45),
(116, 3, 4, 4, 5, 'A', '2022-09-01', 96.45),
(117, 3, 5, 7, 10, 'A', '2022-09-01', 96.45),
(118, 3, 5, 8, 5, 'A', '2022-09-01', 96.45),
(119, 3, 6, 9, 20, 'A', '2022-09-01', 96.45),
(120, 3, 6, 10, 5, 'A', '2022-09-01', 96.45),
(121, 4, 1, 1, 18, 'E', '2022-09-01', 23),
(122, 4, 2, 2, 0, 'E', '2022-09-01', 23),
(123, 4, 3, 3, 5, 'E', '2022-09-01', 23),
(124, 4, 4, 6, 0, 'E', '2022-09-01', 23),
(125, 4, 4, 5, 0, 'E', '2022-09-01', 23),
(126, 4, 4, 4, 0, 'E', '2022-09-01', 23),
(127, 4, 5, 7, 0, 'E', '2022-09-01', 23),
(128, 4, 5, 8, 0, 'E', '2022-09-01', 23),
(129, 4, 6, 9, 0, 'E', '2022-09-01', 23),
(130, 4, 6, 10, 0, 'E', '2022-09-01', 23),
(131, 5, 1, 1, 18, 'E', '2022-09-01', 18),
(132, 5, 2, 2, 0, 'E', '2022-09-01', 18),
(133, 5, 3, 3, 0, 'E', '2022-09-01', 18),
(134, 5, 4, 6, 0, 'E', '2022-09-01', 18),
(135, 5, 4, 5, 0, 'E', '2022-09-01', 18),
(136, 5, 4, 4, 0, 'E', '2022-09-01', 18),
(137, 5, 5, 7, 0, 'E', '2022-09-01', 18),
(138, 5, 5, 8, 0, 'E', '2022-09-01', 18),
(139, 5, 6, 9, 0, 'E', '2022-09-01', 18),
(140, 5, 6, 10, 0, 'E', '2022-09-01', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kualitas_kerja`
--

CREATE TABLE `tb_kualitas_kerja` (
  `id` int(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `point` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kualitas_kerja`
--

INSERT INTO `tb_kualitas_kerja` (`id`, `nama`, `point`) VALUES
(1, 'prestasi kerja', 20),
(2, 'kedisiplinan', 15),
(3, 'peringatan', 5),
(4, 'kepribadian', 20),
(5, 'keahlian', 15),
(6, 'job', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
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
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'TI'),
(2, 1, 'SI'),
(4, 4, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_thn_masuk`
--

CREATE TABLE `tb_thn_masuk` (
  `id_thn_masuk` int(11) NOT NULL,
  `nama_tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_thn_masuk`
--

INSERT INTO `tb_thn_masuk` (`id_thn_masuk`, `nama_tahun`) VALUES
(1, '2022');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_job`
--
ALTER TABLE `tb_detail_job`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_detail_kualitas`
--
ALTER TABLE `tb_detail_kualitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`no_id`);

--
-- Indeks untuk tabel `tb_dt_absensi`
--
ALTER TABLE `tb_dt_absensi`
  ADD PRIMARY KEY (`id_dt_absen`);

--
-- Indeks untuk tabel `tb_dt_gaji`
--
ALTER TABLE `tb_dt_gaji`
  ADD PRIMARY KEY (`id_dt_gaji`);

--
-- Indeks untuk tabel `tb_dt_surat`
--
ALTER TABLE `tb_dt_surat`
  ADD PRIMARY KEY (`id_dt_surat`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_jn_gaji`
--
ALTER TABLE `tb_jn_gaji`
  ADD PRIMARY KEY (`id_jn_gaji`);

--
-- Indeks untuk tabel `tb_jn_job`
--
ALTER TABLE `tb_jn_job`
  ADD PRIMARY KEY (`id_jn_job`);

--
-- Indeks untuk tabel `tb_jn_surat`
--
ALTER TABLE `tb_jn_surat`
  ADD PRIMARY KEY (`id_jn_surat`);

--
-- Indeks untuk tabel `tb_job`
--
ALTER TABLE `tb_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`no_id`);

--
-- Indeks untuk tabel `tb_kinerja_pegawai`
--
ALTER TABLE `tb_kinerja_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kualitas_kerja`
--
ALTER TABLE `tb_kualitas_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_thn_masuk`
--
ALTER TABLE `tb_thn_masuk`
  ADD PRIMARY KEY (`id_thn_masuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_job`
--
ALTER TABLE `tb_detail_job`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_kualitas`
--
ALTER TABLE `tb_detail_kualitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_dt_absensi`
--
ALTER TABLE `tb_dt_absensi`
  MODIFY `id_dt_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_dt_gaji`
--
ALTER TABLE `tb_dt_gaji`
  MODIFY `id_dt_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_dt_surat`
--
ALTER TABLE `tb_dt_surat`
  MODIFY `id_dt_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_jn_gaji`
--
ALTER TABLE `tb_jn_gaji`
  MODIFY `id_jn_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_jn_job`
--
ALTER TABLE `tb_jn_job`
  MODIFY `id_jn_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jn_surat`
--
ALTER TABLE `tb_jn_surat`
  MODIFY `id_jn_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_job`
--
ALTER TABLE `tb_job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kinerja_pegawai`
--
ALTER TABLE `tb_kinerja_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT untuk tabel `tb_kualitas_kerja`
--
ALTER TABLE `tb_kualitas_kerja`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_thn_masuk`
--
ALTER TABLE `tb_thn_masuk`
  MODIFY `id_thn_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
