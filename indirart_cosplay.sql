-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 01:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indirart_cosplay`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'si admin', 'admin', 'admin123', 1, '2024-01-14', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar_barang`, `jenis_barang`, `ukuran_barang`, `stok_barang`, `harga_barang`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'Kostum nahida', 'baju.png', 'Kostum', 'M,L', 4, 200000, 1, '2024-01-14', '2024-01-14'),
(2, 'Wig nahida', 'wig.png', 'Wig', 'M,XL', 0, 50000, 1, '2024-01-14', '2024-01-14'),
(3, 'aksesoris nahida', 'aksesoris.png', 'Sepatu', 'XL', 6, 150000, 1, '2024-01-14', '2024-01-14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telepon`, `email_pelanggan`, `password`, `alamat_pelanggan`, `status`, `tgl_input`, `tgl_update`) VALUES
(1, 'Noya', '0895329736711', 'Noya@gmail.com', 'Noya', 'Jl. Tukad Badung', 1, '2024-01-14', '2024-01-14'),
(2, 'Shoyo', '08973497235', 'Shoyo@gmail.com', 'Shoyo', 'Jl. Renon', 2, '2024-01-14', '2024-01-14'),
(3, 'Asta', '08204589342', 'Asta@gmail.com', 'Asta', 'Jl. Sanur', 3, '2024-01-14', '2024-01-14'),
(4, 'Tanjiro', '08174839612', 'Tanjiro@gmail.com', 'Tanjiro', 'Jl. Teuku Umar', 4, '2024-01-14', '2024-01-14'),
(5, 'Yuji', '08185638024', 'Yuji@gmail.com', 'Yuji', 'Jl. Wr. Supratman', 5, '2024-01-14', '2024-01-14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_barang`, `ukuran_barang`, `jumlah_barang`, `harga_barang`, `total_harga`, `tanggal_sewa`, `tanggal_kembali`, `status_sewa`, `status`, `tgl_input`, `tgl_update`) VALUES
(11, 1, 1, 'L', 1, 200000, 200000, '2024-01-14', '2024-01-24', 0, 1, '2024-01-14', '2024-01-14'),
(11, 2, 1, 'L', 1, 200000, 200000, '2024-01-14', '2024-01-24', 0, 1, '2024-01-14', '2024-01-14'),
(11, 3, 1, 'L', 1, 200000, 200000, '2024-01-14', '2024-01-24', 0, 1, '2024-01-14', '2024-01-14'),
(11, 4, 1, 'L', 1, 200000, 200000, '2024-01-14', '2024-01-24', 0, 1, '2024-01-14', '2024-01-14'),
(11, 5, 1, 'L', 1, 200000, 200000, '2024-01-14', '2024-01-24', 0, 1, '2024-01-14', '2024-01-14');

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
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
