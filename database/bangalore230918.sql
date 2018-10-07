-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 11:56 AM
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
(1, 'Electronics', '2018-09-20', '2018-09-20', 1);

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
(1, '1', 'flower', '0', '1', '2', '2018-09-17', '2018-09-11', 1),
(5, '1', 'test', '1', '2', '0', '2018-09-17', '0000-00-00', 1),
(6, '1', 'frtgrfgh', '0', '1', '3', '2018-09-17', '0000-00-00', 1),
(7, '1', 'erterger', '0', '2', '0', '2018-09-17', '0000-00-00', 1);

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
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `role`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Menaka', 'duraisamy', 'menaka@gmail.com', '123321', '12345', 2, '2018-09-17', NULL, 1),
(2, 'abc', 'PACKERS', 'marcservices123@gmail.com', '7619258020', '12', 0, '2018-09-17', NULL, 1),
(3, 'hgjyj', 'yjyujyu', 'marcservices123@gmail.com', '7619258020', '111', 0, '2018-09-17', NULL, 1),
(4, 'ALPHA', 'PACKERS', 'marcservices123@gmail.com', '7619258020', '123', 0, '2018-09-18', NULL, 1),
(5, 'gtrhty', 'hyh', 'abc@gmail.com', '1233', '123', 0, '2018-09-17', NULL, 1),
(6, 'me', 'd', 'mee@gmail.com', '123123', '123', 1, '2018-09-17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `registered_address` varchar(255) NOT NULL,
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

INSERT INTO `vendor` (`id`, `user_id`, `cat_id`, `business_name`, `business_address`, `registered_address`, `telephone`, `website`, `business_status`, `business_type`, `license_number`, `license_image`, `iso_certified`, `iso_valid`, `quality_policy`, `environ_policy`, `establish_date`, `business_years`, `aadhar_number`, `aadhar_image`, `pan_number`, `pan_image`, `gst_number`, `gst_image`, `created_at`, `modified_at`, `status`) VALUES
(1, 1, 1, 'gjnhgjghj', 'bgkjbgk', 'bgkjb', 'jbkjb', 'jbkjbjkb', 'Pvt Ltd', 'Manufacturer', 'kl;jkjkj', 0x312f, 'no', '2018-09-28', 'yes', 'no', '2018-09-28', '4036', 'dfghdfhfgh', '', 'fghghfg', '', 'fghfghfg', 0x312f, '2018-09-22', NULL, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
