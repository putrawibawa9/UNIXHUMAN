-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 08:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tgl_input` date NOT NULL DEFAULT current_timestamp(),
  `tgl_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'putra', 'putrawibawa9', '123', 1, '0000-00-00', '0000-00-00'),
(2, 'win', 'win', '123', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `gambar_barang` varchar(150) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `ukuran_barang` varchar(20) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `harga_barang` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tgl_input` date NOT NULL DEFAULT current_timestamp(),
  `tgl_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar_barang`, `jenis_barang`, `ukuran_barang`, `stok_barang`, `harga_barang`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'Kostum nahida', 'baju.png', 'Kostum', 'M,L', 992, 200000, 1, '2024-01-14', '2024-01-14'),
(2, 'Wig nahida', 'wig.png', 'Wig', 'M,XL', 896, 50000, 1, '2024-01-14', '2024-01-14'),
(3, 'aksesoris nahida', 'aksesoris.png', 'Sepatu', 'XL', 896, 150000, 1, '2024-01-14', '2024-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `email_pelanggan` varchar(80) NOT NULL,
  `password` varchar(30) NOT NULL,
  `alamat_pelanggan` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tgl_input` date NOT NULL DEFAULT current_timestamp(),
  `tgl_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telepon`, `email_pelanggan`, `password`, `alamat_pelanggan`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'putra', '08956233758', 'putrawibawa7@gmail.com', '123', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(2, 'win', '08956233758', 'Win@gmail.com', '123', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(3, 'dewd', '08956233758', 'dedeadi@gmail.com', '123', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(4, 'arjana', '08956233758343', 'arkana@gmail.com', '12345678', 'Denpasar', 0, '0000-00-00', '0000-00-00'),
(5, 'julianti', '0895623318043', 'julianti@gmail.com', '123', 'Guwang', 23, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ukuran_barang` varchar(5) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` double NOT NULL,
  `total_harga` double NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_sewa` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tgl_input` date NOT NULL DEFAULT current_timestamp(),
  `tgl_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_barang`, `ukuran_barang`, `jumlah_barang`, `harga_barang`, `total_harga`, `tanggal_sewa`, `tanggal_kembali`, `status_sewa`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 1, 1, 'L', 2, 200000, 400000, '2024-03-23', '2024-03-31', 0, 1, '2024-03-23', '2024-03-23'),
(2, 1, 2, 'XL', 2, 50000, 100000, '2024-03-23', '2024-03-29', 0, 1, '2024-03-23', '2024-03-23'),
(3, 1, 3, 'XL', 3, 150000, 450000, '2024-03-23', '2024-03-31', 0, 1, '2024-03-23', '2024-03-23'),
(4, 1, 1, 'L', 4, 200000, 800000, '2024-03-23', '2024-03-29', 0, 1, '2024-03-23', '2024-03-23'),
(5, 1, 1, 'L', 1, 200000, 200000, '2024-03-23', '2024-03-28', 0, 1, '2024-03-23', '2024-03-23'),
(6, 1, 2, 'Pilih', 1, 50000, 50000, '2024-03-23', '2024-03-30', 0, 1, '2024-03-23', '2024-03-23'),
(7, 1, 2, 'Pilih', 1, 50000, 50000, '2024-03-23', '2024-03-28', 0, 1, '2024-03-23', '2024-03-23'),
(8, 1, 3, 'Pilih', 1, 150000, 150000, '2024-03-23', '2024-03-30', 0, 1, '2024-03-23', '2024-03-23'),
(9, 0, 1, 'L', 1, 200000, 200000, '2024-03-23', '2024-03-31', 0, 1, '2024-03-23', '2024-03-23');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
