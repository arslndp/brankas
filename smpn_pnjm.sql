-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2017 at 04:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smpn_pnjm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tmp_lhr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_kel` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` int(11) NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `alamat`, `tgl_lhr`, `tmp_lhr`, `j_kel`, `status`, `no_telp`, `ket`) VALUES
(1, 'ag', 'pup', '2017-02-07', 'bekasi', 'pria', 'baik', 1214131, 'samd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `id_angsuran` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `besar_angsuran` int(11) NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_angsuran`
--

CREATE TABLE `tb_detail_angsuran` (
  `id_angsuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `besar_angsuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_ang` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_pinjaman`
--

CREATE TABLE `tb_kategori_pinjaman` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori_pinjaman`
--

INSERT INTO `tb_kategori_pinjaman` (`id_kategori`, `nama_kategori`) VALUES
(1, 'PAKET 1'),
(2, 'PAKET 2'),
(3, 'PAKET 3'),
(4, 'PAKET 4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_user` enum('ANGOTA','PETUGAS') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `id_akun`, `username`, `password`, `type_user`) VALUES
(1, 1, 'arsalan', '7b24afc8bc80e548d66c4e7ff72171c5', 'PETUGAS'),
(2, 1, 'ag', '7b24afc8bc80e548d66c4e7ff72171c5', 'ANGOTA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas_koperasi`
--

CREATE TABLE `tb_petugas_koperasi` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lhr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_petugas_koperasi`
--

INSERT INTO `tb_petugas_koperasi` (`id_petugas`, `nama`, `alamat`, `no_telp`, `tmp_lhr`, `tgl_lhr`, `ket`) VALUES
(1, 'arsalan', 'bekasi aje lahh', '09889182', 'bekasi', '2017-02-15', 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `besar_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengajuan_pinjam` date NOT NULL,
  `tgl_acc_peminjam` date NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pelunasan` date NOT NULL,
  `id_angsuran` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_acc` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjaman`, `nama_pinjaman`, `id_anggota`, `besar_pinjaman`, `tgl_pengajuan_pinjam`, `tgl_acc_peminjam`, `tgl_pinjam`, `tgl_pelunasan`, `id_angsuran`, `ket_acc`) VALUES
('PNJ1', 'PAKET 3', 1, '5.000.000', '2017-02-15', '2017-02-15', '2017-02-15', '0000-00-00', 'ANG1', 'ACC'),
('PNJ2', 'PAKET 4', 1, '10.000.000', '2017-02-15', '2017-02-15', '2017-02-15', '0000-00-00', 'ANG2', 'ACC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan`
--

CREATE TABLE `tb_simpanan` (
  `id_simpanan` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_simpanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `besar_simpanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_smpn` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_simpanan`
--

INSERT INTO `tb_simpanan` (`id_simpanan`, `nm_simpanan`, `id_anggota`, `tgl_simpanan`, `besar_simpanan`, `ket_smpn`) VALUES
('SM1', 'Simpanan Wajib', 1, '2017-02-14', '20.000', 'APPROVE'),
('SM2', 'Simpanan Wajib', 1, '2017-02-14', '12.000.000', 'APPROVE'),
('SM3', 'Simpanan Pokok', 1, '2017-02-14', '20.000', 'TIDAK APPROVE'),
('SM4', 'Simpanan Pokok', 1, '2017-02-15', '90.000.000', 'APPROVE'),
('SM5', 'Simpanan Pokok', 1, '2017-02-16', '90.000.000', 'APPROVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori_pinjaman`
--
ALTER TABLE `tb_kategori_pinjaman`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_petugas_koperasi`
--
ALTER TABLE `tb_petugas_koperasi`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_angsuran` (`id_angsuran`);

--
-- Indexes for table `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `id_anggota` (`id_anggota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
