-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2025 at 04:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_human`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tgl_input` date NOT NULL,
  `tgl_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'putra', 'putrawibawa9', '123', 1, '0000-00-00', '0000-00-00'),
(2, 'admin', 'admin', 'admin', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar_barang` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_barang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran_barang` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `stok_barang` int NOT NULL,
  `harga_barang` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warna_barang` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar_barang`, `jenis_barang`, `ukuran_barang`, `stok_barang`, `harga_barang`, `status`, `tgl_input`, `tgl_update`, `warna_barang`) VALUES
(2, 'Wig nahida', '67c555cf7b081.jpeg', 'Wig', 'M,XL', 888, 50000, 1, '2025-03-03 03:35:11', '2025-03-05 16:00:00', 'Kuning'),
(3, 'aksesoris nahida', 'aksesoris.png', 'Sepatu', 'XL', 873, 150000, 1, '2025-03-03 03:35:11', '2025-03-05 16:00:00', 'Merah');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama_pelanggan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `email_pelanggan` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pelanggan` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tgl_input` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telepon`, `email_pelanggan`, `password`, `alamat_pelanggan`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'user', '08956233758', 'user@gmail.com', 'user', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(2, 'win', '08956233758', 'Win@gmail.com', '123', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(3, 'dewd', '08956233758', 'dedeadi@gmail.com', '123', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(4, 'arjana', '08956233758343', 'arkana@gmail.com', '12345678', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(5, 'julianti', '0895623318043', 'julianti@gmail.com', '123', 'Guwang', 23, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_barang` int NOT NULL,
  `ukuran_barang` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_barang` int NOT NULL,
  `harga_barang` double NOT NULL,
  `total_harga` double DEFAULT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_sewa` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_barang`, `ukuran_barang`, `jumlah_barang`, `harga_barang`, `total_harga`, `tanggal_sewa`, `tanggal_kembali`, `status_sewa`, `status`, `tgl_input`, `tgl_update`) VALUES
(2, 1, 3, 'XL', 4, 150000, 27600000, '2025-03-05', '2025-03-28', 0, 1, '2025-03-05 03:19:48', '2025-03-05 03:19:48'),
(3, 1, 3, 'XL', 7, 150000, 31500000, '2025-03-05', '2025-03-20', 0, 1, '2025-03-05 03:26:46', '2025-03-05 03:26:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email_pelanggan` (`email_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
