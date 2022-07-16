-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 09:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testlinux`
--

-- --------------------------------------------------------

--
-- Table structure for table `addpurchaseorder`
--

CREATE TABLE `addpurchaseorder` (
  `zone_code` int(11) NOT NULL,
  `region_code` int(11) NOT NULL,
  `territory_code` int(11) NOT NULL,
  `distributor` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `po_no` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addpurchaseorder`
--

INSERT INTO `addpurchaseorder` (`zone_code`, `region_code`, `territory_code`, `distributor`, `created_at`, `po_no`, `remark`, `time`, `total_price`) VALUES
(3, 8, 4, 10, '2022-06-01', 'TEP1', '', '00:00:00', 0),
(3, 8, 4, 10, '2022-06-18', 'TEP2', '', '00:00:00', 0),
(4, 5, 4, 12, '2022-07-01', 'TEP3', '', '00:00:00', 0),
(4, 5, 4, 12, '2022-07-01', 'TEP4', '', '16:54:31', 0),
(4, 5, 5, 12, '2022-07-04', 'TEP5', '', '16:14:19', 200),
(4, 5, 5, 12, '2022-07-04', 'TEP6', '', '16:14:54', 0),
(4, 5, 5, 12, '2022-07-04', 'TEP7', 'mark', '22:33:14', 1900),
(4, 5, 14, 12, '2022-07-05', 'TEP8', 'mark', '22:13:53', 300),
(1, 6, 15, 13, '2022-07-08', 'TEP9', 'mark', '20:52:00', 1340);

-- --------------------------------------------------------

--
-- Table structure for table `admi`
--

CREATE TABLE `admi` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admi`
--

INSERT INTO `admi` (`id`, `username`, `email`, `verified`, `token`, `password`) VALUES
(0, 'admin', 'harshanalakmal503@gmail.com', 0, 'be9e133fb352122ea59f9079cc5920fa2178dea68418d87a0e986d02bfc6b923fe4ae985f6d751d28184a801e6de05896fe0', '$2y$10$7yOajdqIjKQsFCy/O2kpgOsvSL/HIEZUtdKoEkdtJQ34ONc0wkQuC');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sku_id` int(255) NOT NULL,
  `sku_code` varchar(255) NOT NULL,
  `sku_name` varchar(200) NOT NULL,
  `mrp` varchar(255) NOT NULL,
  `d_price` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sku_id`, `sku_code`, `sku_name`, `mrp`, `d_price`, `weight`, `code`) VALUES
(1, 'FWC 001', 'ABC 200 G', '300', 100, 2467, 'SKU1'),
(2, 'FWC 002', 'BCD 50 G', '06', 60, 339, 'SKU2'),
(3, 'FWC 001', 'CDC  50 G', '300', 70, 188, 'SKU3');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_code` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `zone_code` int(11) NOT NULL,
  `rcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_code`, `region_name`, `zone_code`, `rcode`) VALUES
(1, 'Monaragala', 1, 'REGION1'),
(2, 'Badulla', 1, 'REGION2'),
(3, 'Colombo', 2, 'REGION3'),
(4, 'Gampaha', 2, 'REGION4'),
(5, 'Mathara', 3, 'REGION5'),
(6, 'Galla', 3, 'REGION6'),
(7, 'REGION 07', 7, 'REGION7'),
(8, 'REGION 08', 1, 'REGION8');

-- --------------------------------------------------------

--
-- Table structure for table `territory`
--

CREATE TABLE `territory` (
  `territory_code` int(11) NOT NULL,
  `territory_name` varchar(255) NOT NULL,
  `zone_code` int(11) NOT NULL,
  `region_code` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `territory`
--

INSERT INTO `territory` (`territory_code`, `territory_name`, `zone_code`, `region_code`, `code`) VALUES
(1, 'Wellawaya', 1, 1, 'TERRITORY1'),
(2, 'Buththala', 1, 1, 'TERRITORY2'),
(3, 'Kaduwela', 2, 3, 'TERRITORY3'),
(4, 'Baththaramulla', 2, 3, 'TERRITORY4'),
(5, 'Udugampola', 2, 4, 'TERRITORY5'),
(6, 'Miriswaththa', 2, 4, 'TERRITORY6'),
(7, 'Madiha', 3, 5, 'TERRITORY7'),
(8, 'Dikwella', 3, 5, 'TERRITORY8'),
(14, 'TERRITORY 09', 1, 6, 'TERRITORY9'),
(15, 'TERRITORY 10', 1, 6, 'TERRITORY10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `territory` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `nic`, `address`, `mobile`, `email`, `gender`, `territory`, `username`, `password`) VALUES
(5, 'Harshana', '111111111111', 'NO - 50 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'Male', 2, 'harshana', 'harshana@123'),
(6, 'Lakmal', '22222222222222', 'NO - 51 , HANDAPANAGALA , WEHERAYA', 711434499, 'harshanalakmal503@gmail.com', 'Male', 2, 'lakmal', 'harshana@123'),
(7, 'Lakmal', '111111111111', 'NO - 51 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'Male', 7, 'lakmal', 'harshana@123'),
(8, 'Deshan', '12321423423', 'NO - 52 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'FeMale', 4, 'deshan', 'harshana@123'),
(9, 'Champika', '22222222222222', 'NO - 53 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'Male', 8, 'champika', 'harshana@123'),
(10, 'Samanthi', '22222222222222', 'NO - 53 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'FeMale', 9, 'samanthi', 'harshana@123'),
(11, 'Shanith', '22222222222222', 'NO - 54 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'Male', 10, 'shanith', 'harshana@123'),
(12, 'Kanishka', '111111111111', 'NO - 57 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'Male', 13, 'kanishka', 'harshana@123'),
(13, 'Umesh', '12321423423', 'NO - 90 , HANDAPANAGALA , WEHERAYAY', 711434444, 'harshanalakmal503@gmail.com', 'Male', 15, 'Umesh', 'harshana@123');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_code` int(255) NOT NULL,
  `zone_long_description` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `zcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_code`, `zone_long_description`, `short_description`, `zcode`) VALUES
(1, 'Uva', 'Z01', 'ZONE1'),
(2, 'Western', 'Z02', 'ZONE2'),
(3, 'South', 'Z03', 'ZONE3'),
(4, 'ZONE 04', 'Z04', 'ZONE4'),
(5, 'ZONE 05', 'Z05', 'ZONE5'),
(6, 'ZONE 06', 'Z06', 'ZONE6'),
(7, 'ZONE 07', 'Z07', 'ZONE7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addpurchaseorder`
--
ALTER TABLE `addpurchaseorder`
  ADD PRIMARY KEY (`po_no`),
  ADD KEY `zone_code` (`zone_code`),
  ADD KEY `region_code` (`region_code`),
  ADD KEY `distributor` (`distributor`);

--
-- Indexes for table `admi`
--
ALTER TABLE `admi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sku_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_code`),
  ADD KEY `zone_code` (`zone_code`);

--
-- Indexes for table `territory`
--
ALTER TABLE `territory`
  ADD PRIMARY KEY (`territory_code`),
  ADD KEY `region_code` (`region_code`),
  ADD KEY `territory_ibfk_2` (`zone_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sku_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `territory`
--
ALTER TABLE `territory`
  MODIFY `territory_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_code` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addpurchaseorder`
--
ALTER TABLE `addpurchaseorder`
  ADD CONSTRAINT `addpurchaseorder_ibfk_1` FOREIGN KEY (`zone_code`) REFERENCES `zone` (`zone_code`),
  ADD CONSTRAINT `addpurchaseorder_ibfk_2` FOREIGN KEY (`region_code`) REFERENCES `region` (`region_code`),
  ADD CONSTRAINT `addpurchaseorder_ibfk_3` FOREIGN KEY (`distributor`) REFERENCES `user` (`id`);

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`zone_code`) REFERENCES `zone` (`zone_code`);

--
-- Constraints for table `territory`
--
ALTER TABLE `territory`
  ADD CONSTRAINT `territory_ibfk_1` FOREIGN KEY (`region_code`) REFERENCES `region` (`region_code`),
  ADD CONSTRAINT `territory_ibfk_2` FOREIGN KEY (`zone_code`) REFERENCES `zone` (`zone_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
