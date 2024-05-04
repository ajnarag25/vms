-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 09:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `name` varchar(255) NOT NULL,
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

INSERT INTO `accounts` (`id`, `name`, `username`, `email`, `contact`, `password`, `status`, `otp`, `type`) VALUES
(1, 'VMS Superadmin', 'admin', 'lambatprivate@gmail.com', '09619483256', '$2y$10$s1rAEKmhI0w6q7uH4raz.OvjialSDDCt1abS40Ht7GRg/GtDyuNXK', 'Verified', 3497, 'superadmin'),
(2, 'Aj Narag', 'ajnarag25', 'ajnarag25@gmail.com', '09089637505', '$2y$10$NjylAJir5Dv.SAITj157..KpnEIMbt1WVLz.01xXX3VWI77IWfmM2', 'Verified', 1363, 'admin'),
(4, 'Mark Zelon Narag', 'mark25', 'markzelon25@gmail.com', '09555497136', '$2y$10$R6W5deo83iCUgnqHlmOeZefX9H1rb4iRgkFlRy0o7tdAFXdkYSrDG', 'Verified', 5466, 'volunteer');

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
(1, 0, 'Event', '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', '1', '', '', '', '', '', 'Mark Zuckenburger, Jeff Bezot', '2, 3'),
(2, 0, 'Main Event 2024', '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', '1', '<p>This is only a sample main event description</p>', '', '', '', '', '', ''),
(4, 2, 'Part 2', '2024-04-11T07:16:00.000Z', '2024-04-11T09:16:00.000Z', '', 'Pang part 2 to lods', '', '', '', '', '', ''),
(5, 1, 'Sample Part', '2024-04-10T07:21:00.000Z', '2024-04-10T08:21:00.000Z', '', 'Sample Part', '', '', '', '', '', '');

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
(1, 'Juan Dela Cruz', 'sponsors', 'CEO', 'Juans Company', '2024-04-24', 'New'),
(2, 'Mark Zuckenburger', 'sponsors', 'FB CEO', 'Facebook', '2024-04-25', 'New'),
(3, 'Jeff Bezot', 'sponsors', 'CEO AMAZON', 'AMAZON na luge', '2024-04-25', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `skill_tag`
--

CREATE TABLE `skill_tag` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `tag_name` text NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ticket_desc` text NOT NULL,
  `ticket_type` varchar(20) NOT NULL,
  `ticket_event` varchar(255) NOT NULL,
  `ticket_admin` varchar(20) NOT NULL,
  `ticket_deadline` date NOT NULL,
  `ticket_priority` varchar(20) NOT NULL,
  `ticket_volunteers_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `start`, `end`, `ticket_title`, `ticket_desc`, `ticket_type`, `ticket_event`, `ticket_admin`, `ticket_deadline`, `ticket_priority`, `ticket_volunteers_id`) VALUES
(4, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na mid', 'Sample description lang den ng ticket na mid', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-17', 'Mid', '2'),
(6, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na Urgent', 'Sample Desciption para sa ticket na urgent', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-22', 'Urgent', ' '),
(7, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na mid', 'Sample Description na ticket na mid', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-16', 'Mid', '2'),
(9, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na low naman', 'low description', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-16', 'Low', '2, 4'),
(10, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Sponsor title', 'sample sponsor na description', 'Sponsor Ticket', 'Event', ' VMS Superadmin', '2024-05-15', 'High', '2'),
(11, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Part ticket to lods', 'Sample part ticket na description', 'Part Ticket', 'Event', ' VMS Superadmin', '2024-05-18', 'Urgent', '4'),
(12, 0, '', '', 'Sample Account Ticket', 'Sample Account Ticket Description', 'Account Ticket', '', ' VMS Superadmin', '2024-05-24', 'High', '2, 4'),
(13, 0, ' ', ' ', 'Sample na account ticket', 'Sample na description sa account ticket', 'Account Ticket', ' ', ' VMS Superadmin', '2024-05-16', 'High', '2, 4'),
(14, 2, '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', 'Ticket for high', 'High Description 05/03/2024', 'Event Ticket', 'qwe', ' VMS Superadmin', '2024-05-17', 'High', '2');

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
(1, 2, '2024-05-03 09:50:46', '2024-05-03 09:50:59', 'ajnarag25'),
(2, 2, '2024-05-03 14:09:26', '0000-00-00 00:00:00', 'ajnarag25');

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
-- Indexes for table `skill_tag`
--
ALTER TABLE `skill_tag`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest_sponsors`
--
ALTER TABLE `guest_sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skill_tag`
--
ALTER TABLE `skill_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `volunteer_logtime`
--
ALTER TABLE `volunteer_logtime`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
