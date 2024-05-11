-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 04:21 AM
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
(1, 0, 'Event for 7', '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', '1', '<p>Event for 7 description</p>', '', '', '', '', ' Mark Zuckenburger, Juan Dela Cruz', ' 2, 1'),
(4, 1, 'Part Event 9', '2024-05-07T05:09:00.000Z', '2024-05-07T07:33:00.000Z', '', 'Part event 9 description', '', '', '', '', '', ''),
(5, 1, 'Part Event 10', '2024-05-07T06:06:00.000Z', '2024-05-07T07:08:00.000Z', '', 'Part event 10 description', '', '', '', '', '', '');

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

--
-- Dumping data for table `skill_tag`
--

INSERT INTO `skill_tag` (`id`, `category`, `category_id`, `tag_name`, `date_added`) VALUES
(1, 'Category 1', 0, ' ', '2024-05-04'),
(2, 'Category 1', 1, 'Tag 1', '2024-05-04');

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
  `ticket_volunteers_id` text NOT NULL,
  `ticket_status` text NOT NULL,
  `ticket_comments` text NOT NULL,
  `ticket_instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `start`, `end`, `ticket_title`, `ticket_desc`, `ticket_type`, `ticket_event`, `ticket_admin`, `ticket_deadline`, `ticket_priority`, `ticket_volunteers_id`, `ticket_status`, `ticket_comments`, `ticket_instructions`) VALUES
(1, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Sample Ticket', 'Sample ticket description', 'Part Ticket', 'Event for 7', 'Aj Narag ', '2024-05-08', 'High', '4', 'To-Do', '', 'Sample instruction 1, Sample instruction 2'),
(2, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Ticket priority low', 'sample ticket priority low for event', 'Event Ticket', 'Event for 7', 'Aj Narag ', '2024-05-09', 'Low', ' ', 'Your-ticket', '', ''),
(3, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Mark Zuckenburger', 'Ticket to para kay mark zuckenburger', 'Sponsor Ticket', 'Event for 7', 'Aj Narag ', '2024-05-23', 'Urgent', '4', 'Your-ticket', '', 'Dapat naka fb ka pag inassist mo, Please refrain violence'),
(4, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Mid Priority Level ticket', 'Mid Ticket Description', 'Event Ticket', 'Event for 7', 'Aj Narag ', '2024-05-17', 'Mid', ' ', 'Your-ticket', '', '');

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
(2, 2, '2024-05-03 14:09:26', '0000-00-00 00:00:00', 'ajnarag25'),
(3, 4, '2024-05-05 18:24:38', '0000-00-00 00:00:00', 'mark25');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guest_sponsors`
--
ALTER TABLE `guest_sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skill_tag`
--
ALTER TABLE `skill_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `volunteer_logtime`
--
ALTER TABLE `volunteer_logtime`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
