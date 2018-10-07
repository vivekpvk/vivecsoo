-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 12:40 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangalore_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `created_at`, `modified_at`, `status`) VALUES
(1, 'Electronics', '2018-09-20', '2018-09-20', 1),
(2, 'Cloths', NULL, NULL, 1),
(3, 'testgjghkgh', '2018-09-27', NULL, 0),
(4, 'sdgfedgdf', '2018-09-27', NULL, 0),
(5, 'sfdsg', '2018-09-27', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` double NOT NULL,
  `created_at` date DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan_name`, `plan_price`, `created_at`, `modified_at`, `status`) VALUES
(1, 'Listing', 2500, '2018-09-20', '2018-09-20', 1),
(2, 'Banner for 10 sec', 15000, '2018-09-20', '2018-09-20', 1),
(3, 'Banner for 20 sec', 25000, '2018-09-20', NULL, 1),
(4, 'Banner for 30 sec', 35000, '2018-09-20', NULL, 1),
(5, 'Logo', 15000, '2018-09-20', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(11) NOT NULL,
  `prod_name` text NOT NULL,
  `vendor_1` varchar(255) NOT NULL DEFAULT '0',
  `vendor_2` varchar(255) NOT NULL DEFAULT '0',
  `vendor_3` varchar(255) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `prod_name`, `vendor_1`, `vendor_2`, `vendor_3`, `created_at`, `modified_at`, `status`) VALUES
(1, '1', 'flower', '1', '3', '2', '2018-09-17', '2018-09-11', 1),
(5, '1', 'test', '3', '2', '4', '2018-09-17', '0000-00-00', 1),
(6, '1', 'frtgrfgh', '', '1', '3', '2018-09-17', '0000-00-00', 1),
(7, '1', 'erterger', '', '', '', '2018-09-17', '0000-00-00', 1),
(8, '2', 'firstkeys', '4', '6', '', '2018-09-24', '2018-09-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `menu_id` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `menu_id`, `status`) VALUES
(1, 'SUPER ADMIN', '1,2,3,4,5,6,7,8', 1),
(2, 'VENDOR', '1,2,3,4,5,6,7', 1),
(3, 'SUB ADMIN', '1,2,3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `mobile_otp` varchar(20) NOT NULL,
  `mobile_otp_expire` time DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `role`, `mobile_otp`, `mobile_otp_expire`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Menaka', 'duraisamy', 'menaka@gmail.com', '12332111', '827ccb0eea8a706c4c34a16891f84e7b', 2, '', NULL, '2018-09-17', NULL, 1),
(6, 'me', 'd', 'mee@gmail.com', '123123', '123', 1, '', NULL, '2018-09-17', NULL, 1),
(12, 'menakaaaaaa', 'dddddddddddddd', 'menakaclassic@gmail.com', '9731383016', '6fb6ab54a56af98ccde11f0851a27b61', 0, '3458', NULL, '2018-09-27', NULL, 0),
(13, 'dfgdfg', 'sdfs', 'dfdfg@dsgf.gfh', '7619258020', '12', 0, '6148', NULL, '2018-09-27', NULL, 0),
(15, 'test', 'test', 'test@gmail.com', '1234567890', 'e541171465cf010f54031e59b0db0d87', 2, '', NULL, '2018-09-29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `vendor_code` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `registered_address` varchar(255) NOT NULL,
  `logo_image` blob NOT NULL,
  `pro_image` blob NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `website` longtext NOT NULL,
  `business_status` varchar(20) NOT NULL,
  `business_type` varchar(20) NOT NULL,
  `license_number` varchar(255) DEFAULT NULL,
  `license_image` blob NOT NULL,
  `iso_certified` varchar(20) NOT NULL,
  `iso_valid` date NOT NULL,
  `quality_policy` varchar(20) NOT NULL,
  `environ_policy` varchar(20) NOT NULL,
  `establish_date` date NOT NULL,
  `business_years` varchar(20) NOT NULL,
  `aadhar_number` varchar(20) NOT NULL,
  `aadhar_image` blob NOT NULL,
  `pan_number` varchar(20) NOT NULL,
  `pan_image` blob NOT NULL,
  `gst_number` varchar(20) NOT NULL,
  `gst_image` blob NOT NULL,
  `created_at` date DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `user_id`, `cat_id`, `vendor_code`, `business_name`, `business_address`, `registered_address`, `logo_image`, `pro_image`, `telephone`, `website`, `business_status`, `business_type`, `license_number`, `license_image`, `iso_certified`, `iso_valid`, `quality_policy`, `environ_policy`, `establish_date`, `business_years`, `aadhar_number`, `aadhar_image`, `pan_number`, `pan_image`, `gst_number`, `gst_image`, `created_at`, `modified_at`, `status`) VALUES
(17, 6, 1, 'BSP0006', 'fhgfghgfh', 'jihi', 'j', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'ij', 'h', 'Individual', 'Manufacturer', 'dfhgfhfg', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'no', '2018-09-28', 'no', 'no', '2018-09-29', '0', 'ghfghfg', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, 'gfhgfh', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'fhfgh', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-25', NULL, 0),
(19, 1, 2, 'BSP0001', 'menaka', 'rtyrtytry', 'tryrty', '', '', 'rtyrtytry', 'tyrtyrty', 'Individual', 'Wholeseller', 'tryrtyrt', 0x31633266613034633762386434393661316137306562333437653330666232372e6a7067, 'no', '2018-06-28', 'no', 'no', '2018-09-29', '0', 'trytrytr', 0x31656130313163313637643931346237396236643861333865653864323435392e6a7067, 'trytrytr', 0x64363034373534346232323865663562383466346164363361636130653263382e6a7067, 'trytryt', 0x64373430643336656139356161343465333130653861323334663737653239642e6a7067, '2018-09-28', NULL, 0),
(20, 1, 2, 'BLR/09/BSP1001', 'ghjghj', 'ghjghj', 'ghjghjgh', '', '', 'hhhhhhhhhh', 'ghjghjghj', 'Pvt Ltd', 'Retailer', 'ghjghjgh', 0x31633266613034633762386434393661316137306562333437653330666232372e6a7067, 'yes', '2018-09-28', 'no', 'yes', '2018-09-29', '0', 'hgjghj', 0x31656130313163313637643931346237396236643861333865653864323435392e6a7067, 'hgjhgj', 0x64363034373534346232323865663562383466346164363361636130653263382e6a7067, 'ghjghj', 0x64373430643336656139356161343465333130653861323334663737653239642e6a7067, '2018-09-28', NULL, 0),
(21, 1, 2, 'BLR/09/BSP1001', 'ghjghj', 'ghjghj', 'ghjghjgh', '', '', 'hhhhhhhhhh', 'ghjghjghj', 'Pvt Ltd', 'Retailer', 'ghjghjgh', 0x31633266613034633762386434393661316137306562333437653330666232372e6a7067, 'yes', '2018-09-28', 'no', 'yes', '2018-09-29', '0', 'hgjghj', 0x31656130313163313637643931346237396236643861333865653864323435392e6a7067, 'hgjhgj', 0x64363034373534346232323865663562383466346164363361636130653263382e6a7067, 'ghjghj', 0x64373430643336656139356161343465333130653861323334663737653239642e6a7067, '2018-09-28', NULL, 0),
(22, 1, 2, 'BLR/09/BSP1006', 'yuiyuiy', 'uiyuiyu', 'iyuiyuiyu', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'iyiyuiyui', 'yiyuiyuiyu', 'Prop', 'Service', 'yuiyui', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'no', '2018-07-29', 'yes', 'yes', '2018-09-29', '0', 'tyutyu', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, 'ytuytuyt', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'yuiyuiyui6789', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-28', NULL, 0),
(23, 6, 2, 'BLR/09/BSP1006', 'htrfghjfggf', 'jghjgh', 'jghjghjgh', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'gjghjkgh', 'jkhjkhkjh', 'Pvt Ltd', 'Manufacturer', '1234', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'yes', '2018-09-29', 'yes', 'no', '2018-07-29', '0', '678678', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, '5687678', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'hjhjk', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-28', NULL, 0),
(24, 6, 2, 'BLR/09/BSP1006', 'htrfghjfggf', 'jghjgh', 'jghjghjgh', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'gjghjkgh', 'jkhjkhkjh', 'Pvt Ltd', 'Manufacturer', '1234', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'yes', '2018-09-29', 'yes', 'no', '2018-07-29', '0', '678678', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, '5687678', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'hjhjk', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-28', NULL, 0),
(25, 6, 2, 'BLR/09/BSP1006', 'fgvhngj', 'hgjghj', 'ghjghj', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'gjghjgh', 'jghj', 'Ltd', 'Wholeseller', 'gjghj', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'yes', '2018-09-29', 'no', 'no', '2018-09-29', '0', 'hgjhgjghj', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, 'ghjghj', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'hgjghjgh', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-28', NULL, 0),
(26, 6, 1, 'BLR/09/BSP1006', 'fgvhngj', 'hgjghj', 'ghjghj', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'gjghjgh', 'jghj', 'Ltd', 'Wholeseller', 'gjghj', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'yes', '2018-09-29', 'no', 'no', '2018-09-29', '0', 'hgjhgjghj', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, 'ghjghj', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'hgjghjgh', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-28', NULL, 0),
(27, 6, 1, 'BLR/09/BSP1006', 'fgvhngj', 'hgjghj', 'ghjghj', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'gjghjgh', 'jghj', 'Ltd', 'Wholeseller', 'gjghj', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'yes', '2018-09-29', 'no', 'no', '2018-09-29', '0', 'hgjhgjghj', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, 'ghjghj', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'hgjghjgh', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-28', NULL, 0),
(28, 6, 1, 'BLR/09/BSP1006', 'fgvhngj', 'hgjghj', 'ghjghj', 0x31336637383830643861653332373763333337343330356631666631333536302e6a7067, 0x64343764656133346138353365653563613333343939343761323265376361332e6a7067, 'gjghjgh', 'jghj', 'Ltd', 'Wholeseller', 'gjghj', 0x37663137333062313538396438346334306138633533383233343732633663662e6a7067, 'yes', '2018-09-29', 'no', 'no', '2018-09-29', '0', 'hgjhgjghj', 0x34393834343939613065306437356163346565336633666538313964626438392e6a7067, 'ghjghj', 0x36343863613933373238643538386363383730376562343765363734626533632e6a7067, 'hgjghjgh', 0x35656333636161316338653865316234613537386564633666343934376365302e6a7067, '2018-09-28', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
