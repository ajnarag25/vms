-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 02:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `otp` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `contact`, `password`, `status`, `otp`, `type`) VALUES
(1, 'admin', 'lambatprivate@gmail.com', '09619483256', '$2y$10$s1rAEKmhI0w6q7uH4raz.OvjialSDDCt1abS40Ht7GRg/GtDyuNXK', 'Verified', 3497, 'superadmin'),
(2, 'ajnarag25', 'ajnarag25@gmail.com', '09089637505', '$2y$10$NjylAJir5Dv.SAITj157..KpnEIMbt1WVLz.01xXX3VWI77IWfmM2', 'Verified', 1363, 'admin'),
(3, 'mark25', 'markzelon25@gmail.com', '09555497136', '$2y$10$cL185sIBRABFggvyEKwSy.1VpPRtstrC3GkoPzkzGQ1P1qAi.d3xK', 'Verified', 302, 'volunteer'),
(4, 'Ymann', 'yowymanne@gmail.com', '09225365412', '$2y$10$V9LdEpWBm3S2Icuxq3aVn.TzqSZ6iVNBttukItmgUdxo5TUeOfufq', 'Verified', 7558, 'volunteer'),
(5, 'teo', 'yeshuateodosio@gmail.com', '03256523210', '$2y$10$FfTEU5MjpdRGNX1MCEIdCOxaYxKZAG3pzNr5l8roI5IcPAc.9dUki', 'Verified', 7912, 'volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `startdate` text NOT NULL,
  `enddate` text NOT NULL,
  `allday` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `guests` varchar(50) NOT NULL,
  `guests_id` varchar(255) NOT NULL,
  `volunteer` varchar(50) NOT NULL,
  `volunteer_id` varchar(255) NOT NULL,
  `sponsors` varchar(50) NOT NULL,
  `sponsors_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_id`, `title`, `startdate`, `enddate`, `allday`, `description`, `guests`, `guests_id`, `volunteer`, `volunteer_id`, `sponsors`, `sponsors_id`) VALUES
(10, 0, 'this event', '2024-04-02T16:00:00.000Z', '2024-04-03T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(11, 0, 'sample', '2024-04-03T16:00:00.000Z', '2024-04-04T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(12, 0, 'samp', '2024-04-08T16:00:00.000Z', '2024-04-09T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(13, 0, 'this event', '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(14, 13, 'start', '2024-04-09T23:00:00.000Z', '2024-04-09T23:30:00.000Z', '', '', '', '', '', '', 'Jhonny Mayaman', '2'),
(15, 0, 'for', '2024-04-04T16:00:00.000Z', '2024-04-05T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(16, 15, 'start', '2024-04-04T23:00:00.000Z', '2024-04-04T23:30:00.000Z', '', '', '', '', '', '', '', ''),
(17, 0, 'test', '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(18, 17, 'opening', '2024-04-10T20:24:00.000Z', '2024-04-10T20:24:00.000Z', '', 'chore', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `guest_sponsors`
--

CREATE TABLE `guest_sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_sponsors`
--

INSERT INTO `guest_sponsors` (`id`, `name`, `type`, `position`, `company`, `date_added`, `status`) VALUES
(1, 'Renx Verano', 'guest', 'FB ceo', 'Facebook', '2024-04-22', 'New'),
(2, 'Jhonny Mayaman', 'sponsors', 'CEO', 'Google', '2024-04-22', 'New'),
(3, 'Jun Medoow', 'sponsors', 'Ceo', 'Google', '2024-04-22', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL,
  `ticket_title` text NOT NULL,
  `ticket_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_logtime`
--

CREATE TABLE `volunteer_logtime` (
  `log_ID` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer_logtime`
--

INSERT INTO `volunteer_logtime` (`log_ID`, `volunteer_id`, `login_time`, `logout_time`, `username`) VALUES
(1, 4, '2024-04-23 17:43:23', '2024-04-23 19:49:40', 'Ymann'),
(2, 4, '2024-04-23 18:20:43', '2024-04-23 19:49:40', 'Ymann'),
(3, 4, '2024-04-23 18:22:37', '2024-04-23 19:49:40', 'Ymann'),
(4, 4, '2024-04-23 18:25:07', '2024-04-23 19:49:40', 'Ymann'),
(5, 4, '2024-04-23 18:42:04', '2024-04-23 19:49:40', 'Ymann'),
(6, 4, '2024-04-23 18:51:02', '2024-04-23 19:49:40', 'Ymann'),
(7, 4, '2024-04-23 18:57:11', '2024-04-23 19:49:40', 'Ymann'),
(8, 4, '2024-04-23 19:15:29', '2024-04-23 19:49:40', 'Ymann'),
(9, 4, '2024-04-23 19:29:41', '2024-04-23 19:49:40', 'Ymann'),
(10, 4, '2024-04-23 19:33:03', '2024-04-23 19:49:40', 'Ymann'),
(11, 4, '2024-04-23 19:48:23', '2024-04-23 19:49:40', 'Ymann'),
(12, 5, '2024-04-23 19:54:27', '2024-04-23 20:02:30', 'teo'),
(13, 4, '2024-04-23 19:54:41', '2024-04-23 20:01:15', 'Ymann'),
(14, 4, '2024-04-23 20:03:53', '2024-04-23 20:03:56', 'Ymann');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_sponsors`
--
ALTER TABLE `guest_sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer_logtime`
--
ALTER TABLE `volunteer_logtime`
  ADD PRIMARY KEY (`log_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `guest_sponsors`
--
ALTER TABLE `guest_sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteer_logtime`
--
ALTER TABLE `volunteer_logtime`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
