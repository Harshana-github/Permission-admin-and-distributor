-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 08:20 AM
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
(9, 13, 18, 7, '2022-07-15', 'TEP1', 'Diliver monday', '09:38:28', 1000),
(9, 13, 18, 7, '2022-07-15', 'TEP2', 'Diliver monday', '20:47:04', 1000);

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
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `role` varchar(11) NOT NULL,
  `zone_add` int(11) NOT NULL,
  `zone_view` int(11) NOT NULL,
  `region_add` int(11) NOT NULL,
  `region_view` int(11) NOT NULL,
  `territory_add` int(11) NOT NULL,
  `territory_view` int(11) NOT NULL,
  `product_add` int(11) NOT NULL,
  `product_view` int(11) NOT NULL,
  `user_add` int(11) NOT NULL,
  `user_view` int(11) NOT NULL,
  `po_add` int(11) NOT NULL,
  `po_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `role`, `zone_add`, `zone_view`, `region_add`, `region_view`, `territory_add`, `territory_view`, `product_add`, `product_view`, `user_add`, `user_view`, `po_add`, `po_view`) VALUES
(3, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 'Distributor', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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
(5, 'FWC 002', 'ABC 200 G', '300', 100, 168, 'SKU1'),
(6, 'FWC 003', 'ABC 500 G', '06', 60, 500, 'SKU2');

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
(13, 'Monaragala', 9, 'REGION1'),
(14, 'Badulla', 9, 'REGION2'),
(15, 'Gampaha', 10, 'REGION3');

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
(18, 'Wellawaya', 9, 13, 'TERRITORY1'),
(19, 'Buththala', 9, 13, 'TERRITORY2'),
(20, 'Miriswaththa', 10, 15, 'TERRITORY3');

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
  `password` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `nic`, `address`, `mobile`, `email`, `gender`, `territory`, `username`, `password`, `rank`) VALUES
(7, 'Lakmal', '111111111111', 'NO - 51 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal@gmail.com', 'Male', 18, 'lakmal', 'harshana@123', 'distributor'),
(14, 'Harshana', '55555555555555', 'NO - 50 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal503@gmail.com', 'Male', 19, 'admin', '123', 'admin'),
(16, 'Deshan', '111111111111', 'NO - 50 , HANDAPANAGALA , WEHERAYAYA', 711434499, 'harshanalakmal77@gmail.com', 'Male', 20, 'deshan', '123', 'distributor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `rank` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `territory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `date`, `rank`, `password`, `territory`) VALUES
(4, 8378703330872028253, 'Harshana', 'harshanalakmal503@gmail.com', '2022-07-11 08:46:56', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0),
(6, 37283002559231, 'Shanith', 'harshanalakmal4355@gmail.com', '2022-07-11 09:12:31', 'distributor', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0);

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
(9, 'Uva', 'U1', 'ZONE1'),
(10, 'Westen', 'W1', 'ZONE2');

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
  ADD KEY `distributor` (`distributor`),
  ADD KEY `territory_code` (`territory_code`);

--
-- Indexes for table `admi`
--
ALTER TABLE `admi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `territory` (`territory`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`),
  ADD KEY `rank` (`rank`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sku_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `territory`
--
ALTER TABLE `territory`
  MODIFY `territory_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_code` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addpurchaseorder`
--
ALTER TABLE `addpurchaseorder`
  ADD CONSTRAINT `addpurchaseorder_ibfk_1` FOREIGN KEY (`zone_code`) REFERENCES `zone` (`zone_code`),
  ADD CONSTRAINT `addpurchaseorder_ibfk_2` FOREIGN KEY (`region_code`) REFERENCES `region` (`region_code`),
  ADD CONSTRAINT `addpurchaseorder_ibfk_3` FOREIGN KEY (`territory_code`) REFERENCES `territory` (`territory_code`),
  ADD CONSTRAINT `addpurchaseorder_ibfk_4` FOREIGN KEY (`distributor`) REFERENCES `user` (`id`);

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`zone_code`) REFERENCES `zone` (`zone_code`);

--
-- Constraints for table `territory`
--
ALTER TABLE `territory`
  ADD CONSTRAINT `territory_ibfk_1` FOREIGN KEY (`zone_code`) REFERENCES `zone` (`zone_code`),
  ADD CONSTRAINT `territory_ibfk_2` FOREIGN KEY (`region_code`) REFERENCES `region` (`region_code`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`territory`) REFERENCES `territory` (`territory_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
