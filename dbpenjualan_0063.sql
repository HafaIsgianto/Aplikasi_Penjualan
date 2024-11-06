-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan_0063`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` varchar(5) NOT NULL,
  `nm_pel` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `nm_pel`, `alamat`) VALUES
('p001', 'john doe', 'jl contoh no 123 jakarta'),
('p002', 'jane smith', 'jl contoh no 123 456 bandung '),
('p003', 'ali kurniawan', 'jl contoh no 789 surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_brg` varchar(6) NOT NULL,
  `nm_brg` varchar(20) DEFAULT NULL,
  `harga` double NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_brg`, `nm_brg`, `harga`, `stok`) VALUES
('a001', 'Contoh Barang A', 15000, 100),
('a002', 'Contoh Barang B', 25000, 50),
('a003', 'Contoh Barang C', 10000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_tran` double NOT NULL,
  `kd_brg` varchar(5) DEFAULT NULL,
  `id_pel` varchar(5) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_tran`, `kd_brg`, `id_pel`, `jumlah`, `total_harga`, `tanggal`) VALUES
(1, 'a002', 'p003', 3, 750000, '2024-11-06 01:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pel`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_tran`),
  ADD KEY `kd_brg` (`kd_brg`),
  ADD KEY `id_pel` (`id_pel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_tran` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_pel` FOREIGN KEY (`id_pel`) REFERENCES `pelanggan` (`id_pel`),
  ADD CONSTRAINT `kd_brg` FOREIGN KEY (`kd_brg`) REFERENCES `produk` (`kd_brg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
