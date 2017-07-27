-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Mar 2017 pada 22.34
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lembur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hitung_lembur`
--

CREATE TABLE `tb_hitung_lembur` (
  `id_hitung_lembur` int(3) NOT NULL,
  `kode_hitung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(6) NOT NULL,
  `grid` int(3) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `grid`, `nama_jabatan`, `gaji`) VALUES
(1, 3, 'staff', '112811');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nik` int(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` enum('1','2','3','4','5','6','7','8') NOT NULL COMMENT '1 = fa,2 = it,3 = pdca,4 = hcs,5 = ppic,6 = qaqc,7 = warehouse, 8 = bof,',
  `jabatan_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lembur`
--

CREATE TABLE `tb_lembur` (
  `id_lembur` int(11) NOT NULL,
  `nik_karyawan` int(10) NOT NULL,
  `kode_lembur` int(3) NOT NULL,
  `jumlah_lembur` varchar(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lembur`
--

INSERT INTO `tb_lembur` (`id_lembur`, `nik_karyawan`, `kode_lembur`, `jumlah_lembur`, `tanggal`) VALUES
(1, 10021268, 1, '3,5', '2017-03-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` enum('1','2') NOT NULL COMMENT '1 = admin,2 = user',
  `status` enum('0','1') NOT NULL COMMENT '0 = tidak aktif,1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hitung_lembur`
--
ALTER TABLE `tb_hitung_lembur`
  ADD PRIMARY KEY (`id_hitung_lembur`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hitung_lembur`
--
ALTER TABLE `tb_hitung_lembur`
  MODIFY `id_hitung_lembur` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_lembur`
--
ALTER TABLE `tb_lembur`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
