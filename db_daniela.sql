-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 06:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_daniela`
--

-- --------------------------------------------------------

--
-- Table structure for table `pos_checkout_order`
--

CREATE TABLE `pos_checkout_order` (
  `checkout_id` int(12) NOT NULL,
  `customer_id` int(12) NOT NULL,
  `transcode` varchar(50) NOT NULL,
  `delivery_option` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `status` int(1) NOT NULL,
  `is_paid` int(1) NOT NULL,
  `is_delivery` int(1) NOT NULL,
  `meal_status` varchar(12) NOT NULL,
  `is_rescheduled` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_customer`
--

CREATE TABLE `pos_customer` (
  `customer_id` int(12) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(36) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `valid_id` text NOT NULL,
  `business_permit` text NOT NULL,
  `proof` text NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_customer`
--

INSERT INTO `pos_customer` (`customer_id`, `firstname`, `lastname`, `address`, `contact`, `email`, `username`, `password`, `valid_id`, `business_permit`, `proof`, `is_active`, `date_added`) VALUES
(1, 'Jeffry', 'Bordeos', 'Blk 20 Lot 23 Phase 4 PBK Brgy Pasong Kawayan II\r\nddd', '9357396286', 'jeffrybordeos@gmail.com', 'kevinjayroluna', 'kevinjayroluna', 'logo.png', 'logo.png', 'logo.png', 1, '2022-12-04 04:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `pos_items`
--

CREATE TABLE `pos_items` (
  `item_id` int(12) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` varchar(12) NOT NULL,
  `category` int(2) NOT NULL,
  `stock` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `meduim` int(11) NOT NULL,
  `large` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_best_seller` int(11) NOT NULL,
  `is_hot` int(11) NOT NULL,
  `image` text NOT NULL,
  `is_active` int(1) NOT NULL,
  `mdate` varchar(50) NOT NULL,
  `edate` varchar(50) NOT NULL,
  `is_status` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_items`
--

INSERT INTO `pos_items` (`item_id`, `item_name`, `item_price`, `category`, `stock`, `small`, `meduim`, `large`, `xl`, `xxl`, `xxxl`, `description`, `is_best_seller`, `is_hot`, `image`, `is_active`, `mdate`, `edate`, `is_status`, `date_added`) VALUES
(1, 'asd', '120', 2, 1111, 0, 0, 0, 0, 0, 0, 'asdasd', 0, 0, '1.JPG', 0, '2022-12-06', '2022-12-10', 0, '2022-12-04 05:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `pos_item_category`
--

CREATE TABLE `pos_item_category` (
  `category_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_item_category`
--

INSERT INTO `pos_item_category` (`category_id`, `name`, `photo`, `date_added`) VALUES
(1, 'Shirt', '', '2022-11-23 06:43:21'),
(2, 'Longsleeve', '', '2022-11-23 06:43:31'),
(3, 'Retro', '', '2022-11-23 06:43:37'),
(4, 'Streetwear', '', '2022-11-23 06:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `pos_order`
--

CREATE TABLE `pos_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `trans_code` varchar(100) NOT NULL,
  `item_id` int(12) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(12) NOT NULL,
  `mdate` varchar(50) NOT NULL,
  `edate` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_order`
--

INSERT INTO `pos_order` (`order_id`, `customer_id`, `trans_code`, `item_id`, `qty`, `size`, `mdate`, `edate`, `status`, `created_by`, `created_at`) VALUES
(5, 1, '1eDVG4Bl', 1, 1, 'small', '', '', 1, 0, '2022-12-01 06:17:20'),
(7, 5, 'PTtAoedW', 13, 2, 'xxl', '', '', 0, 0, '2022-12-01 07:55:59'),
(8, 5, 'PTtAoedW', 4, 1, 'small', '', '', 0, 0, '2022-12-01 08:09:58'),
(9, 1, 'Y3axYXgu', 12, 1, 'small', '', '', 1, 0, '2022-12-01 09:55:45'),
(10, 1, 'ARBXG9BC', 24, 1, 'meduim', '', '', 1, 0, '2022-12-01 11:11:49'),
(12, 3, '3HAH5oqL', 9, 3, 'small', '', '', 0, 0, '2022-12-01 13:07:36'),
(13, 3, 'ALUtFtRD', 14, 1, 'xxl', '', '', 0, 0, '2022-12-02 06:27:57'),
(14, 7, '8CEI572i', 15, 1, 'meduim', '', '', 0, 0, '2022-12-02 13:00:59'),
(17, 9, 'iTFhqZV2', 19, 1, 'small', '', '', 1, 0, '2022-12-02 14:30:49'),
(18, 1, '3DWgs5Vl', 13, 1, 'small', '', '', 0, 0, '2022-12-02 14:45:36'),
(19, 11, 'YlX7tW7B', 19, 1, 'large', '', '', 1, 0, '2022-12-02 14:59:01'),
(20, 1, '6Dkix3Ug', 14, 1, 'xxxl', '', '', 0, 0, '2022-12-02 15:24:44'),
(21, 1, '6Dkix3Ug', 19, 1, 'large', '', '', 0, 0, '2022-12-02 15:24:52'),
(22, 1, '6Dkix3Ug', 13, 1, 'xxl', '', '', 0, 0, '2022-12-02 15:25:04'),
(23, 1, '6Dkix3Ug', 20, 1, 'large', '', '', 0, 0, '2022-12-02 15:25:14'),
(24, 1, '6Dkix3Ug', 23, 1, 'xl', '', '', 0, 0, '2022-12-02 15:25:23'),
(25, 1, 'zRwpD7cz', 13, 1, 'xxl', '', '', 0, 0, '2022-12-02 23:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `pos_settings`
--

CREATE TABLE `pos_settings` (
  `id` int(12) NOT NULL,
  `title` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `facebook` text NOT NULL,
  `termscondition` text NOT NULL,
  `logo` text NOT NULL,
  `about` text NOT NULL,
  `faq` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_settings`
--

INSERT INTO `pos_settings` (`id`, `title`, `email`, `contact`, `address`, `facebook`, `termscondition`, `logo`, `about`, `faq`) VALUES
(1, 'DANIEAL RICE MILL', 'daniealricemill@gmail.com', '09276956256 / 09491761720', '268 P. Bernal Ugong, Pasig City', 'https://www.facebook.com/daniealricemill', 'TERMS AND CONDITION:', 'logo.png', 'ABOUT', 'FREQUENTLY ASK QUESTION:');

-- --------------------------------------------------------

--
-- Table structure for table `pos_users`
--

CREATE TABLE `pos_users` (
  `user_id` int(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `profile` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_users`
--

INSERT INTO `pos_users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `role`, `profile`, `date_added`) VALUES
(1, 'Liberality', 'brand', 'admin', 'admin', 1, 'Untitled.jpg', '2022-03-02 13:35:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pos_checkout_order`
--
ALTER TABLE `pos_checkout_order`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `pos_customer`
--
ALTER TABLE `pos_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `pos_items`
--
ALTER TABLE `pos_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `pos_item_category`
--
ALTER TABLE `pos_item_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `pos_order`
--
ALTER TABLE `pos_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pos_settings`
--
ALTER TABLE `pos_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_users`
--
ALTER TABLE `pos_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pos_checkout_order`
--
ALTER TABLE `pos_checkout_order`
  MODIFY `checkout_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_customer`
--
ALTER TABLE `pos_customer`
  MODIFY `customer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_items`
--
ALTER TABLE `pos_items`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_item_category`
--
ALTER TABLE `pos_item_category`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pos_order`
--
ALTER TABLE `pos_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pos_settings`
--
ALTER TABLE `pos_settings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_users`
--
ALTER TABLE `pos_users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
