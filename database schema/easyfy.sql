-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 02:46 PM
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
-- Database: `easyfy`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `litres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_building`
--

CREATE TABLE `customer_building` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_flat_no` int(11) NOT NULL,
  `c_wing` varchar(3) NOT NULL,
  `c_building_name` varchar(255) NOT NULL,
  `c_area` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_state` varchar(255) NOT NULL,
  `c_pincode` int(11) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_bungalow`
--

CREATE TABLE `customer_bungalow` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_bungalow_no` int(11) NOT NULL,
  `c_bungalow_name` varchar(255) NOT NULL,
  `c_area` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_state` varchar(255) NOT NULL,
  `c_pincode` int(11) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_chawl`
--

CREATE TABLE `customer_chawl` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_room_no` int(11) NOT NULL,
  `c_chawl_name` varchar(255) NOT NULL,
  `c_area` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_state` varchar(255) NOT NULL,
  `c_pincode` varchar(255) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

CREATE TABLE `customer_contact` (
  `id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_deliveryboy`
--

CREATE TABLE `customer_deliveryboy` (
  `c_id` int(11) NOT NULL,
  `db_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_milk_details`
--

CREATE TABLE `customer_milk_details` (
  `c_id` int(11) NOT NULL,
  `litres` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `c_id` int(11) NOT NULL,
  `subscription` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_residence`
--

CREATE TABLE `customer_residence` (
  `c_id` int(11) NOT NULL,
  `residence_type` varchar(255) NOT NULL,
  `subscription` varchar(255) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_litres` float NOT NULL,
  `c_delivery_days` varchar(255) NOT NULL,
  `c_facility` varchar(255) NOT NULL,
  `c_start_date` date NOT NULL,
  `c_register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_shop`
--

CREATE TABLE `customer_shop` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_shop_no` int(11) NOT NULL,
  `c_shop_name` varchar(255) NOT NULL,
  `c_area` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_state` varchar(255) NOT NULL,
  `c_pincode` int(11) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `db_sorting_duplicate`
--

CREATE TABLE `db_sorting_duplicate` (
  `c_id` int(11) NOT NULL,
  `db_id` int(11) NOT NULL,
  `sort_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_contact`
--

CREATE TABLE `delivery_boy_contact` (
  `id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `milk_change_request`
--

CREATE TABLE `milk_change_request` (
  `c_id` int(11) NOT NULL,
  `db_id` int(11) NOT NULL,
  `litres` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `comment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_request`
--

CREATE TABLE `payment_request` (
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `phone_no_db`
--

CREATE TABLE `phone_no_db` (
  `db_no` int(6) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` blob,
  `db_id` int(12) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `sent_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `v_no` int(5) NOT NULL,
  `v_phone` bigint(20) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_plot` varchar(255) NOT NULL,
  `v_area` varchar(255) NOT NULL,
  `v_city` varchar(255) NOT NULL,
  `v_state` varchar(255) NOT NULL,
  `v_id` int(10) NOT NULL,
  `v_milk_brand` varchar(255) NOT NULL,
  `v_milk_charge` float NOT NULL,
  `v_delivery_charge` float NOT NULL,
  `v_cut_off_time` varchar(255) NOT NULL,
  `v_subscription` varchar(255) NOT NULL,
  `v_acc_name` varchar(255) NOT NULL,
  `v_acc_no` bigint(20) NOT NULL,
  `v_bank_name` varchar(255) NOT NULL,
  `v_IFSC_code` varchar(255) NOT NULL,
  `v_image` longblob NOT NULL,
  `v_start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_contact`
--

CREATE TABLE `vendor_contact` (
  `id` int(4) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_customer`
--

CREATE TABLE `vendor_customer` (
  `v_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_customer_request`
--

CREATE TABLE `vendor_customer_request` (
  `c_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_deliveryboy`
--

CREATE TABLE `vendor_deliveryboy` (
  `v_id` int(11) NOT NULL,
  `db_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_building`
--
ALTER TABLE `customer_building`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer_bungalow`
--
ALTER TABLE `customer_bungalow`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer_chawl`
--
ALTER TABLE `customer_chawl`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_shop`
--
ALTER TABLE `customer_shop`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `delivery_boy_contact`
--
ALTER TABLE `delivery_boy_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_no_db`
--
ALTER TABLE `phone_no_db`
  ADD PRIMARY KEY (`db_no`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`v_no`);

--
-- Indexes for table `vendor_contact`
--
ALTER TABLE `vendor_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_contact`
--
ALTER TABLE `customer_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy_contact`
--
ALTER TABLE `delivery_boy_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_contact`
--
ALTER TABLE `vendor_contact`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
