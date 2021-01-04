-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 09:11 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cuci_sepatuu`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE IF NOT EXISTS `bahan` (
`id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `bahan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `jenis`, `bahan`) VALUES
(1, 'm', 'J', 'K');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
`id_layanan` int(10) NOT NULL,
  `nama_layanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`) VALUES
(1, 'Coloring'),
(2, 'Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`no_order` int(10) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `biaya` varchar(20) DEFAULT NULL,
  `id_pelanggan` int(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
`no_detail` int(10) NOT NULL,
  `no_order` int(10) DEFAULT NULL,
  `id_layanan` int(10) DEFAULT NULL,
  `jumlah` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(1, 'Marisa', 'Padang', '0823747557', 'marisa@gmail.com'),
(2, 'Cecil', 'Padang', '0823747557', 'cecil@gmail.com'),
(3, 'Savira', 'Padang                          ', '082169141494', 'alkhairulyoga@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `umur`
--

CREATE TABLE IF NOT EXISTS `umur` (
`id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_layanan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
 ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`no_order`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
 ADD PRIMARY KEY (`no_detail`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `umur`
--
ALTER TABLE `umur`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
MODIFY `id_layanan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `no_order` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
MODIFY `no_detail` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `umur`
--
ALTER TABLE `umur`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
