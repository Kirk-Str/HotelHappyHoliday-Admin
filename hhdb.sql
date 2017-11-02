-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 08:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requestTimestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `request_type` enum('room','special_request') NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `approval_status` int(11) DEFAULT NULL,
  `approval_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `room_id`, `user_id`, `requestTimestamp`, `check_in`, `check_out`, `adults`, `children`, `request_type`, `rate`, `approval_status`, `approval_timestamp`) VALUES
(1, 1, 16, '2017-09-25 16:13:29.745903', '2017-09-04', '2017-09-06', 1, 0, 'room', '0', 0, '0000-00-00 00:00:00'),
(2, 2, 15, '2017-10-03 08:47:19.747470', '2017-09-03', '2017-09-08', 2, 0, 'room', '0', 0, '0000-00-00 00:00:00'),
(3, 1, 16, '2017-10-02 07:47:57.020311', '2017-10-07', '2017-11-05', 7, 0, 'room', '0', 0, '0000-00-00 00:00:00'),
(4, 1, 16, '2017-10-02 14:57:55.026158', '2017-10-12', '2017-11-06', 1, 0, 'room', '120', NULL, '0000-00-00 00:00:00'),
(5, 2, 16, '2017-10-02 15:01:57.114924', '2017-10-14', '2017-11-13', 4, 0, 'room', '260', NULL, '0000-00-00 00:00:00'),
(6, 1, 0, '2017-10-05 16:35:46.496488', '2017-10-12', '2017-10-13', 1, 0, 'room', '120', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `thumbnail` blob NOT NULL,
  `caption` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `total_room` int(11) NOT NULL,
  `occupancy` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `view` varchar(500) DEFAULT NULL,
  `rate` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `thumbnail`, `caption`, `description`, `total_room`, `occupancy`, `size`, `view`, `rate`) VALUES
(1, 'Standard Suite.', '', 'For those who love minimalistic style!', 'Holiday\'s Restaurant & Spa Resort promises you the most suitable environment for you to spend your special day just like a dream.', 20, 2, '20sqft', NULL, '120'),
(2, 'Delux Suite.', '', 'Luxury in Everything!', 'The luxury and ultra comfort ï¿½. Delux Suite provides luxury in everything such as Delux bedrooms, Special TV, movies connections, Free buffet meel for breakfast. and more!', 20, 4, '30sqft', NULL, '260'),
(3, 'Ultra Premium Suite.', '', 'Experience the Royality in everything!', 'The Ultra Premium Suite promises complete royality treatment with Holidayï¿½\'s service. Gourmet foods, Special event invitations, Unlimited Bar facility etc.', 10, 6, '50sqft', NULL, '600'),
(4, 'Garbage Room', '', '435', '345', 345, 435, '345', NULL, '345');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE `room_reservation` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `adults` int(11) NOT NULL DEFAULT '1',
  `children` int(11) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `deposit_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `balance_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `check_out_datetime` datetime NOT NULL,
  `card_type` enum('visa','american','master') NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `holders_name` varchar(200) NOT NULL,
  `card_expiry_month` int(11) NOT NULL,
  `card_expiry_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_reservation`
--

INSERT INTO `room_reservation` (`request_id`, `check_in`, `check_out`, `adults`, `children`, `total_amount`, `deposit_amount`, `balance_amount`, `check_out_datetime`, `card_type`, `card_no`, `holders_name`, `card_expiry_month`, `card_expiry_year`) VALUES
(2, '2017-10-04', '2017-10-06', 1, 0, '450', '0', '0', '0000-00-00 00:00:00', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` char(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address_line_one` varchar(100) NOT NULL,
  `address_line_two` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `contact_no` varchar(16) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email_id`, `password`, `salt`, `firstname`, `lastname`, `address_line_one`, `address_line_two`, `city`, `country`, `contact_no`, `role`) VALUES
(15, 'boss@testing.com', '0c70f5fbc9db429c1d13ee2225669b9e799c260563888c0a6657b563bdac8754', 'D²Âž\"Ž]÷·þyéFm·ôº›ãÜ`Vöü©{Ú,ú', '789', '789', '789', '789', '789', '789', '789', 1),
(16, 'test@live.com', '2449dce0b468aea43f3171deedea265de9b6ee83dfe7f108ffd2210de459be77', 'nuõç¥Ø‡¸ïÀ41j$…ßýˆ Cãü™Ý¦bS', 'test', 'bossee', '546', '45646', '456', '456', '456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD PRIMARY KEY (`request_id`),
  ADD UNIQUE KEY `request_id` (`request_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
