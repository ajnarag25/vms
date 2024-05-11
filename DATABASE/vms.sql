-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 05:56 PM
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
(4, 'Mark Zelon Narag', 'mark25', 'markzelon25@gmail.com', '09555497136', '$2y$10$R6W5deo83iCUgnqHlmOeZefX9H1rb4iRgkFlRy0o7tdAFXdkYSrDG', 'Verified', 5466, 'volunteer'),
(5, 'Juan Delacruz', 'juan25', 'juandelacruz@gmail.com', '08978785814', '$2y$10$/RKg2yBY3/rEi4y5Edp9pO.n94GRwOEIlmvMLatzneRvfYngN.j5i', 'Verified', 5913, 'volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `links` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `subject`, `links`, `details`, `time`) VALUES
(1, 'TEST1', 'TEST1', 'TEST1', 'TEST1', '2024-05-07 04:23:34'),
(2, 'TEST2', 'TEST2', 'TEST2', 'TEST2', '2024-05-07 04:23:34'),
(3, 'TEST3', 'TEST3', 'TEST3', 'TEST3', '2024-05-07 04:24:02'),
(4, 'TEST4', 'TEST4', 'TEST4', 'TEST4', '2024-05-07 04:24:02');

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
  `volunteer_tag` text NOT NULL,
  `volunteer_tag_id` text NOT NULL,
  `sponsors` varchar(50) NOT NULL,
  `sponsors_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_id`, `title`, `startdate`, `enddate`, `allday`, `description`, `guests`, `guests_id`, `volunteer`, `volunteer_id`, `volunteer_tag`, `volunteer_tag_id`, `sponsors`, `sponsors_id`) VALUES
(1, 0, 'Event', '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', '1', '', '', '', '', '', '', '', 'Mark Zuckenburger, Jeff Bezot', '2, 3'),
(2, 0, 'Main Event 2024', '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', '1', '<p>This is only a sample main event description</p>', '', '', '', '', '', '', 'Juan Dela Cruz', '1'),
(4, 2, 'Part 2', '2024-04-11T07:16:00.000Z', '2024-04-11T09:16:00.000Z', '', 'Pang part 2 to lods', '', '', '', '', '', '', '', ''),
(5, 1, 'Sample Part', '2024-04-10T07:21:00.000Z', '2024-04-10T08:21:00.000Z', '', 'Sample Part', '', '', '', '', '', '', '', ''),
(7, 0, 'Event for 8', '2024-05-07T16:00:00.000Z', '2024-05-08T16:00:00.000Z', '1', '', '', '', '', '', '', '', 'Mark Zuckenburger', '2'),
(8, 7, 'Part Event for 8', '2024-05-08T04:53:00.000Z', '2024-05-08T05:53:00.000Z', '', 'samp', '', '', '', '', '', '', '', ''),
(9, 7, 'Part event na may guests or volunteers', '2024-05-08T07:53:00.000Z', '2024-05-08T08:31:00.000Z', '', 'Description for part event na may guests or volunteers', 'Guest', '4', '', '', '', '', '', ''),
(13, 7, 'Part 2', '2024-05-08T12:44:00.000Z', '2024-05-08T14:44:00.000Z', '', 'sdasd', '', '', 'Juan', '5', 'Juan Delacruz', '5', '', '');

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
(3, 'Jeff Bezot', 'sponsors', 'CEO AMAZON', 'AMAZON na luge', '2024-04-25', 'New'),
(4, 'Guest 1', 'guest', 'None', 'NA', '2024-05-08', 'New'),
(5, 'Guest 2', 'guest', 'None', 'NA', '2024-05-08', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `personal_agenda`
--

CREATE TABLE `personal_agenda` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `startdate` text NOT NULL,
  `enddate` text NOT NULL,
  `allday` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_agenda`
--

INSERT INTO `personal_agenda` (`id`, `event_id`, `title`, `startdate`, `enddate`, `allday`, `description`, `volunteer_id`, `username`) VALUES
(42, 0, 'try', '2024-05-01T16:00:00.000Z', '2024-05-02T16:00:00.000Z', '1', '', 0, ''),
(43, 0, 'sdf', '2024-04-30T16:00:00.000Z', '2024-05-01T16:00:00.000Z', '1', '', 0, ''),
(44, 0, 'sdf', '2024-05-08T16:00:00.000Z', '2024-05-11T16:00:00.000Z', '1', '', 0, ''),
(45, 0, 'dsfds', '2024-05-14T16:00:00.000Z', '2024-05-15T16:00:00.000Z', '1', '', 0, ''),
(46, 0, 'try ', '2024-05-15T16:00:00.000Z', '2024-05-16T16:00:00.000Z', '1', 'trysave', 0, ''),
(49, 0, '2 Days', '2024-05-06T16:00:00.000Z', '2024-05-08T16:00:00.000Z', '1', 'Outing', 4, 'Ymann'),
(67, 0, 'sajlkasjdf', '2024-05-01T16:00:00.000Z', '2024-05-02T16:00:00.000Z', '1', 'adsufasjdfk', 4, 'Ymann'),
(68, 0, 'asdsa', '2024-04-30T16:00:00.000Z', '2024-05-01T16:00:00.000Z', '1', 'asdasd', 4, 'Ymann'),
(69, 0, 'sdjlksdf', '2024-05-08T16:00:00.000Z', '2024-05-11T16:00:00.000Z', '1', 'LKSJDFLKJASKDFJ', 4, 'Ymann');

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
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `title`, `subject`, `message`, `link`) VALUES
(1, 'Title', 'Subject1', 'Message1', 'Link1'),
(2, 'Title2', 'Subject2', 'Message2', 'Link2'),
(3, 'Title3', 'Subject3', 'Message3', 'Link'),
(4, 'Title4', 'Title4', 'Message4', 'Link4');

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
  `ticket_instructions` text NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `start`, `end`, `ticket_title`, `ticket_desc`, `ticket_type`, `ticket_event`, `ticket_admin`, `ticket_deadline`, `ticket_priority`, `ticket_volunteers_id`, `ticket_status`, `ticket_comments`, `ticket_instructions`, `date_added`) VALUES
(4, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na mid', 'Sample description lang den ng ticket na mid', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-17', 'Mid', '2', '', '', '', '2024-05-11'),
(6, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na Urgent', 'Sample Desciption para sa ticket na urgent', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-22', 'Urgent', ' ', '', '', '', '2024-05-11'),
(7, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na mid', 'Sample Description na ticket na mid', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-16', 'Mid', '2', '', '', '', '2024-05-11'),
(9, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Ticket na low naman', 'low description', 'Event Ticket', 'Event', ' VMS Superadmin', '2024-05-16', 'Low', '2, 4', '', '', '', '2024-05-11'),
(10, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Sponsor title', 'sample sponsor na description', 'Sponsor Ticket', 'Event', ' VMS Superadmin', '2024-05-15', 'High', '2', '', '', '', '2024-05-11'),
(11, 1, '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', 'Part ticket to lods', 'Sample part ticket na description', 'Part Ticket', 'Event', ' VMS Superadmin', '2024-05-18', 'Urgent', '4', '', '', '', '2024-05-11'),
(12, 0, '', '', 'Sample Account Ticket', 'Sample Account Ticket Description', 'Account Ticket', '', ' VMS Superadmin', '2024-05-24', 'High', '2, 4', '', '', '', '2024-05-11'),
(13, 0, ' ', ' ', 'Sample na account ticket', 'Sample na description sa account ticket', 'Account Ticket', ' ', ' VMS Superadmin', '2024-05-16', 'High', '2, 4', '', '', '', '2024-05-11'),
(15, 2, '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', 'Try lang to lods 1', 'Desc 1', 'Part Ticket', 'Main Event 2024', 'Aj Narag ', '2024-05-07', 'Urgent', '4, 2', 'Your-ticket', ' ', 'ewew, asdas, azxczx', '2024-05-11'),
(16, 2, '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', 'Try lang to lods 2', 'Desc 2', 'Sponsor Ticket', 'Main Event 2024', 'Aj Narag ', '2024-05-15', 'High', ' ', 'In-Review', ' ', 'aaaaa, zzzzz', '2024-05-11'),
(17, 2, '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', 'Try lang to lods 3', 'Desc 3', 'Event Ticket', 'Main Event 2024', 'Aj Narag ', '2024-05-15', 'Mid', '4', 'Your-ticket', ' ', '', '2024-05-11'),
(18, 2, '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', 'bago', 'bago desc', 'Part Ticket', 'Main Event 2024', ' VMS Superadmin', '2024-05-25', 'Mid', ' ', 'Your-ticket', '', '', '2024-05-11'),
(21, 0, ' ', ' ', 'bago 4', 'bago 4', 'Account Ticket', ' ', ' VMS Superadmin', '2024-05-09', 'Urgent', ' ', 'Your-ticket', '', '', '2024-05-11'),
(22, 7, '2024-05-07T16:00:00.000Z', '2024-05-08T16:00:00.000Z', 'Ticket 1', 'Samp', 'Event Ticket', 'Event for 8', 'Aj Narag ', '2024-05-16', 'Mid', '4', 'To-Do', '', 'Ayusin mo lang lods', '2024-05-11'),
(23, 7, '2024-05-07T16:00:00.000Z', '2024-05-08T16:00:00.000Z', 'Yare ka lods', 'HAHAHAHA', 'Event Ticket', 'Event for 8', ' VMS Superadmin', '2024-05-16', 'Urgent', '2, 4', 'Revision', '', '', '2024-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `timelogs`
--

CREATE TABLE `timelogs` (
  `id` int(11) NOT NULL,
  `volunteer` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `ticket_name` text NOT NULL,
  `information_report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timelogs`
--

INSERT INTO `timelogs` (`id`, `volunteer`, `time`, `ticket_name`, `information_report`) VALUES
(1, 'Emman', '2024-05-08 19:43:29', 'Ticket', 'Description'),
(2, 'Teo', '2024-05-08 19:43:29', 'Ticketsss', 'Descriptionss');

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
(2, 2, '2024-05-03 14:09:26', '2024-05-11 22:17:43', 'ajnarag25'),
(3, 4, '2024-05-05 18:24:38', '2024-05-11 23:08:48', 'mark25'),
(4, 4, '2024-05-11 20:57:16', '2024-05-11 23:08:48', 'mark25'),
(5, 5, '2024-05-11 22:09:21', '2024-05-11 22:11:49', 'juan25'),
(6, 2, '2024-05-11 22:11:53', '2024-05-11 22:17:43', 'ajnarag25'),
(7, 2, '2024-05-11 23:08:53', '2024-05-11 23:09:03', 'ajnarag25'),
(8, 2, '2024-05-11 23:11:46', '2024-05-11 23:12:41', 'ajnarag25');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_skills`
--

CREATE TABLE `volunteer_skills` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tag_name` text NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
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
-- Indexes for table `personal_agenda`
--
ALTER TABLE `personal_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_tag`
--
ALTER TABLE `skill_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelogs`
--
ALTER TABLE `timelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer_logtime`
--
ALTER TABLE `volunteer_logtime`
  ADD PRIMARY KEY (`log_ID`);

--
-- Indexes for table `volunteer_skills`
--
ALTER TABLE `volunteer_skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guest_sponsors`
--
ALTER TABLE `guest_sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_agenda`
--
ALTER TABLE `personal_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `skill_tag`
--
ALTER TABLE `skill_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `timelogs`
--
ALTER TABLE `timelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteer_logtime`
--
ALTER TABLE `volunteer_logtime`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `volunteer_skills`
--
ALTER TABLE `volunteer_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
