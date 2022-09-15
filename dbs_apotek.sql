-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 11:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `satuan`, `stok`, `keterangan`, `date`) VALUES
(4, 'produk-3770', 'Komik', '2000', 'Saset', '34', 'obat batuk', '2022-09-15 07:06:12'),
(5, 'produk-8553', 'Promah', '20000', 'Box', '40', 'tidak ada', '2022-09-15 07:09:15'),
(6, 'produk-5727', 'Obat Demam', '120000', 'Btl', '540', 'tidak ada', '2022-09-15 07:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga`
--

CREATE TABLE `tbl_harga` (
  `id` int(11) NOT NULL,
  `kode_harga` varchar(15) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_harga`
--

INSERT INTO `tbl_harga` (`id`, `kode_harga`, `harga`, `date`) VALUES
(2, '456', '50000', '2022-08-28 01:14:16'),
(3, '2806', '25000', '2022-08-28 06:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `kode_item` varchar(15) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(5) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `kode_item`, `nama_item`, `harga`, `stok`, `unit`, `date`) VALUES
(2, 'item-6700', 'Besi', '50000', 34, 'pcs', '2022-08-28 06:11:35'),
(3, 'item-4713', 'Pipa', '50000', 10, 'pcs', '2022-08-28 06:11:56'),
(4, 'item-1834', 'Pipa Besi', '25000', 48, 'pcs', '2022-08-28 23:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` int(11) NOT NULL,
  `kode_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `date`) VALUES
(3, 'pelanggan-8197', 'Aldi', 'stabat', '2022-09-15 07:41:07'),
(4, 'pelanggan-9065', 'Londeh', 'Tanjung Pura', '2022-09-15 07:41:42'),
(5, 'pelanggan-3269', 'Silvi Aulia', 'Bessilam', '2022-09-15 07:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(20) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `total_harga` varchar(15) NOT NULL,
  `total_harga_ppn` varchar(15) NOT NULL,
  `uang` varchar(50) NOT NULL,
  `kembalian` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `kode_user`, `invoice`, `total_harga`, `total_harga_ppn`, `uang`, `kembalian`, `date`) VALUES
(5, '', 'INVOICE/VIII/2022/898', '25000', '27750', '50000', '22250', '2022-08-28 13:23:00'),
(6, '', 'INVOICE/VIII/2022/970', '25000', '27750', '50000', '22250', '2022-08-28 23:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `qty` int(5) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  `total_sebelum_ppn` varchar(30) NOT NULL,
  `total_ppn` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id`, `kode_user`, `invoice`, `item`, `harga`, `qty`, `unit`, `total_harga`, `total_sebelum_ppn`, `total_ppn`, `date`) VALUES
(16, '', 'INVOICE/VIII/2022/898', 'Pipa Besi', '25000', 1, 'pcs', '25000', '25000', '27750', '2022-08-28 13:23:00'),
(17, '', 'INVOICE/VIII/2022/970', 'Pipa Besi', '25000', 1, 'pcs', '25000', '25000', '27750', '2022-08-28 23:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

CREATE TABLE `tbl_privilege` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `role` varchar(30) NOT NULL,
  `access` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_privilege`
--

INSERT INTO `tbl_privilege` (`id`, `user`, `role`, `access`, `date`) VALUES
(9, '', 'kasir', 'dashboard', '2022-08-28 04:56:22'),
(11, '', 'kasir', 'pembelian', '2022-08-28 04:56:22'),
(12, '', 'admin', 'dashboard', '2022-08-28 04:57:19'),
(13, '', 'admin', 'item', '2022-08-28 04:57:19'),
(14, '', 'admin', 'user', '2022-08-28 04:57:19'),
(17, '', 'admin', 'pembelian', '2022-08-28 04:57:19'),
(18, '', 'super admin', 'item', '2022-08-28 04:57:50'),
(19, '', 'super admin', 'user', '2022-08-28 04:57:50'),
(20, '', 'super admin', 'role', '2022-08-28 04:57:50'),
(21, '', 'super admin', 'privilege', '2022-08-28 04:57:50'),
(22, '', 'super admin', 'harga', '2022-08-28 04:57:50'),
(23, '', 'super admin', 'stok', '2022-08-28 04:57:50'),
(24, '', 'super admin', 'pembelian', '2022-08-28 04:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `kode_role` varchar(15) NOT NULL,
  `role` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `kode_role`, `role`, `date`) VALUES
(1, 'role-901', 'admin', '2022-08-28 01:53:43'),
(2, 'role-5115', 'super admin', '2022-08-28 01:43:50'),
(3, 'role-7623', 'kasir', '2022-08-28 01:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `kode`, `unit`, `date`) VALUES
(2, 'unit-2008', 'pcs', '2022-08-28 02:15:18'),
(3, 'unit-835', 'lbr', '2022-08-28 02:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
