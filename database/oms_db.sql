-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 06:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

CREATE DATABASE oms_db;
USE oms_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(30) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `street`, `city`, `state`, `zip_code`, `country`, `contact`, `date_created`) VALUES
(1, 'vzTL0PqMogyOWhF', 'Branch 1 St., Quiapo', 'Manila', 'Metro Manila', '1001', 'Philippines', '+2 123 455 623', '2020-11-26 11:21:41'),
(3, 'KyIab3mYBgAX71t', 'SAmple', 'Cebu', 'Cebu', '6000', 'Philippines', '+1234567489', '2020-11-26 16:45:05'),
(4, 'dIbUK5mEh96f0Zc', 'Sample', 'Sample', 'Sample', '123456', 'Philippines', '123456', '2020-11-27 13:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `recipient_email` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Deliver, 2=Pickup',
  `from_branch_id` varchar(30) NULL,
  `to_branch_id` varchar(30) NULL,
  `item_name` varchar(100) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `purchase_date` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `recipient_email`, `type`, `from_branch_id`, `to_branch_id`, `item_name`, `order_number`, `quantity`, `purchase_date`, `price`, `status`, `date_created`) VALUES
(1, '201406231415', 'John Smith', '132 54 Avenue', '604-000-0000', 'Claire Blake', '123A Street', '604-123-4567', 'Sample', 1, '1', '0', 'White T-Shirt', '201406231415', '2', '2021-04-10 16:15:46', 2500, 7, '2021-04-11 16:15:46'),
(2, '117967400213', 'John Smith', '132 54 Avenue', '604-000-0000', 'Claire Blake', '123A Street', '604-123-4567', 'Sample', 2, '1', '3', 'Grey Socks', '117967400213', '1', '2021-04-02 16:15:46', 2500, 1, '2021-04-03 16:15:46'),
(3, '983186540795', 'John Smith', '132 54 Avenue', '604-000-0000', 'Claire Blake', '123A Street', '604-123-4567', 'Sample', 2, '1', '3', 'White Shoes (S: 7.5)', 'White Shoes (S: 7.5)', '3', '2021-04-05 16:15:46', 1500, 2, '2021-04-06 16:15:46'),
(4, '514912669061', 'Claire Blake', '123A Street', '604-123-4567', 'John Smith', '132 54 Avenue', '604-000-0000', 'jsmith@sample.com', 2, '4', '1', 'Red Sweater', '983186540795', '6', '2020-11-27 13:52:14', 1900, 0, '2020-11-27 13:52:14'),
(5, '897856905844', 'Claire Blake', '123A Street', '604-123-4567', 'John Smith', '132 54 Avenue', '604-000-0000', 'jsmith@sample.com', 2, '4', '1', 'Longcoat', '897856905844', '1', '2020-11-27 13:52:14', 1450, 0, '2020-11-27 13:52:14'),
(6, '505604168988', 'John Smith', '132 54 Avenue', '604-123-4567', 'Cliare Blake', '123A Street', '604-000-0000', 'Sample', 1, '1', '0', 'Black T-Shirt', '505604168988', '2', '2020-11-27 14:06:42', 2500, 1, '2020-11-27 14:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_tracks`
--

CREATE TABLE `parcel_tracks` (
  `id` int(30) NOT NULL,
  `parcel_id` int(30) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel_tracks`
--

INSERT INTO `parcel_tracks` (`id`, `parcel_id`, `status`, `date_created`) VALUES
(1, 2, 1, '2021-04-15 16:15:46'),
(2, 3, 1, '2021-04-19 16:15:46'),
(3, 1, 1, '2021-04-08 16:15:46'),
(4, 1, 2, '2021-04-15 16:15:46'),
(5, 1, 3, '2021-04-17 16:15:46'),
(6, 1, 4, '2021-04-20 16:15:46'),
(7, 1, 5, '2021-04-18 16:15:46'),
(8, 1, 7, '2021-04-15 16:15:46'),
(9, 3, 2, '2021-04-20 16:15:46'),
(10, 6, 1, '2021-04-11 16:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Elysium Solutions', 'info@sample.comm', '+6948 8542 623', '2102  Caldwell Road, Rochester, New York, 14608', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `branch_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `branch_id`, `date_created`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, 0, '2020-11-26 10:57:04'),
(2, 'John', 'Smith', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', 2, 1, '2020-11-26 11:52:04'),
(3, 'George', 'Wilson', 'gwilson@sample.com', 'd40242fb23c45206fadee4e2418f274f', 3, 4, '2020-11-27 13:32:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Table structure for table `files`
--
--
-- Table structure for table `students`
--

CREATE TABLE `reports` (
  `rep_id` int(11) NOT NULL,
  `rep_name` varchar(100) NOT NULL,
  `rep_author` varchar(100) NOT NULL,
  `rep_type` varchar(30) NOT NULL,
  `rep_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `reports` (`rep_id`, `rep_name`, `rep_author`, `rep_type`, `rep_date`) VALUES
(20, 'Isabellas Report', 'Isabella A.', '1', '2017-08-27'),
(19, 'Sophias Report', 'Sophia B.', '2', '2017-08-27');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `reports`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

