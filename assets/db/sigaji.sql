-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Apr 2017 pada 23.40
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigaji`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_lembur`
--

CREATE TABLE `detail_lembur` (
  `id_detail_lembur` int(3) NOT NULL,
  `kode_lembur` varchar(50) NOT NULL,
  `keterangan_lembur` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_lembur`
--

INSERT INTO `detail_lembur` (`id_detail_lembur`, `kode_lembur`, `keterangan_lembur`) VALUES
(1, 'OTHB', 'over time hari biasa untuk 5 HK dan 6 HK'),
(2, 'OTHL5', 'Overtime Hari Libur untuk 5 Hari Kerja Untuk 5 HK \r\n\r\n'),
(3, 'OTHL6', 'Overtime Hari Libur untuk 6 Hari Kerja Untuk 6 HK \r\n'),
(4, 'OTHLP6', 'Overtime Hari Libur yang jatuh pada hari terpendek untuk 6 HK\r\n'),
(5, 'OTHLP5', 'Overtime Hari Libur yang jatuh pada hari terpendek untuk 5 HK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_lembur`
--

CREATE TABLE `gaji_lembur` (
  `id_gaji_lembur` int(11) NOT NULL,
  `nik_karyawan` varchar(50) NOT NULL,
  `ket_lembur_id` int(5) NOT NULL,
  `total_upah_lembur` decimal(10,0) NOT NULL,
  `tanggal_lembur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji_lembur`
--

INSERT INTO `gaji_lembur` (`id_gaji_lembur`, `nik_karyawan`, `ket_lembur_id`, `total_upah_lembur`, `tanggal_lembur`) VALUES
(1, '1111111', 5, '462428', '2017-04-23'),
(2, '1111111', 2, '101156', '2017-04-24'),
(3, '1111111', 4, '491329', '2017-05-03'),
(4, '1111111', 4, '491329', '2018-04-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(6) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'HRD'),
(2, 'Manager IT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` int(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` enum('1','2','3','4','5','6','7','8') NOT NULL COMMENT '1 = fa,2 = it,3 = pdca,4 = hcs,5 = ppic,6 = qaqc,7 = warehouse, 8 = bof,',
  `jabatan_id` int(6) NOT NULL,
  `grid` int(3) NOT NULL,
  `gaji` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_karyawan`, `departemen`, `jabatan_id`, `grid`, `gaji`) VALUES
(1111111, 'Ahmad Gunawan', '1', 2, 1, '5000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_lembur`
--

CREATE TABLE `ket_lembur` (
  `id_ket_lembur` int(5) NOT NULL,
  `jenis_lembur_id` int(3) NOT NULL,
  `jam_lembur` varchar(50) NOT NULL,
  `upah_lembur` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ket_lembur`
--

INSERT INTO `ket_lembur` (`id_ket_lembur`, `jenis_lembur_id`, `jam_lembur`, `upah_lembur`) VALUES
(1, 1, '1 jam', 1.5),
(2, 1, '2 jam', 3.5),
(3, 2, '1 jam', 2),
(4, 3, '8 jam', 17),
(5, 2, '8 jam', 16),
(6, 5, '8 jam', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(7) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` enum('1','2') NOT NULL COMMENT '1 = admin, 2 = user',
  `status` enum('0','1') NOT NULL COMMENT '0 = tidak aktif, 1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jabatan`, `status`) VALUES
(1, 'admin', 'admin', '1', '1'),
(2, 'coba', 'coba', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_lembur`
--
ALTER TABLE `detail_lembur`
  ADD PRIMARY KEY (`id_detail_lembur`);

--
-- Indexes for table `gaji_lembur`
--
ALTER TABLE `gaji_lembur`
  ADD PRIMARY KEY (`id_gaji_lembur`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `ket_lembur`
--
ALTER TABLE `ket_lembur`
  ADD PRIMARY KEY (`id_ket_lembur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_lembur`
--
ALTER TABLE `detail_lembur`
  MODIFY `id_detail_lembur` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gaji_lembur`
--
ALTER TABLE `gaji_lembur`
  MODIFY `id_gaji_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ket_lembur`
--
ALTER TABLE `ket_lembur`
  MODIFY `id_ket_lembur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
