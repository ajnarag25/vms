-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:44 AM
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
(6, 'ymann', 'ymann', 'ymann@gmail.com', '09837874839', '$2y$10$FlA6G/icSP3aeB.cUYKN/e0jwYru/dVpkG6tqhQnnORGOMYK23PUW', 'Verified', 8201, 'volunteer'),
(7, 'Ed', 'edy', 'edy@gmail.com', '09837847576', '$2y$10$IqlA/LiyIW2hPvbBJWPzDewGBj9qOP1q00rQWVBHB6uNLBiTY9UZC', 'Verified', 7698, 'volunteer');

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
  `sponsors` varchar(50) NOT NULL,
  `sponsors_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_id`, `title`, `startdate`, `enddate`, `allday`, `description`, `guests`, `guests_id`, `volunteer`, `volunteer_id`, `sponsors`, `sponsors_id`) VALUES
(10, 0, 'this event', '2024-04-02T16:00:00.000Z', '2024-04-03T16:00:00.000Z', '1', '', '', '', '', '', 'Jhonny Mayaman, Jun Medoow', '2, 3'),
(11, 0, 'sample', '2024-04-03T16:00:00.000Z', '2024-04-04T16:00:00.000Z', '1', '', '', '', '', '', 'Jhonny Mayaman', '2'),
(12, 0, 'samp', '2024-04-08T16:00:00.000Z', '2024-04-09T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(13, 0, 'this event', '2024-04-09T16:00:00.000Z', '2024-04-10T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(14, 13, 'start', '2024-04-09T23:00:00.000Z', '2024-04-09T23:30:00.000Z', '', '', '', '', '', '', 'Jhonny Mayaman', '2'),
(15, 0, 'for', '2024-04-04T16:00:00.000Z', '2024-04-05T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(16, 15, 'start', '2024-04-04T23:00:00.000Z', '2024-04-04T23:30:00.000Z', '', '', '', '', '', '', '', ''),
(17, 0, 'test', '2024-04-10T16:00:00.000Z', '2024-04-11T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(18, 17, 'opening', '2024-04-10T20:24:00.000Z', '2024-04-10T20:24:00.000Z', '', 'chore', '', '', '', '', '', ''),
(19, 0, 'Emman', '2024-04-05T16:00:00.000Z', '2024-04-06T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(20, 0, 'evev', '2024-04-11T16:00:00.000Z', '2024-04-12T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(21, 0, 'sample', '2024-04-17T16:00:00.000Z', '2024-04-18T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(22, 21, 'opening', '2024-04-17T18:50:00.000Z', '2024-04-17T18:59:00.000Z', '', 'sample description', '', '', '', '', 'Jhonny Mayaman, Jun Medoow', '2, 3'),
(23, 21, 'another', '2024-04-17T19:06:00.000Z', '2024-04-17T19:20:00.000Z', '', 'try', '', '', '', '', '', ''),
(24, 0, 'event', '2024-04-18T16:00:00.000Z', '2024-04-19T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(25, 24, 'adda', '2024-04-18T23:00:00.000Z', '2024-04-18T23:30:00.000Z', '', 'add', '', '', '', '', '', ''),
(26, 24, 'addaaad', '2024-04-18T23:00:00.000Z', '2024-04-18T23:30:00.000Z', '', 'adadadd', '', '', '', '', '', ''),
(27, 0, 'sadfasdf', '2024-04-12T16:00:00.000Z', '2024-04-13T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(28, 0, 'saqmple', '2024-04-19T16:00:00.000Z', '2024-04-20T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(29, 28, 'opening', '2024-04-20T00:10:00.000Z', '2024-04-20T12:15:00.000Z', '', 'yjhgg', '', '', '', '', '', ''),
(30, 28, 'lkjkj', '2024-04-20T00:12:00.000Z', '2024-04-20T12:10:00.000Z', '', 'bnmnm', '', '', '', '', '', ''),
(31, 28, 'hjgjh', '2024-04-20T00:12:00.000Z', '2024-04-20T01:10:00.000Z', '', 'bhkjhkj', '', '', '', '', 'Jhonny Mayaman, Jun Medoow', '2, 3'),
(32, 0, 'dgfd', '2024-05-07T16:00:00.000Z', '2024-05-08T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(33, 0, 'hgjg', '2024-04-15T16:00:00.000Z', '2024-04-16T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(34, 33, 'gfhgf', '2024-04-16T12:48:00.000Z', '2024-04-16T12:49:00.000Z', '', 'gfhgf', '', '', '', '', '', ''),
(35, 0, 'sdfs', '2024-03-31T16:00:00.000Z', '2024-04-01T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(36, 0, 'dfggdfg', '2024-04-07T16:00:00.000Z', '2024-04-08T16:00:00.000Z', 'true', '<p>fdsfdfsfsdf</p>', '', '', '', '', '', ''),
(37, 0, 'jkhhjh', '2024-04-01T16:00:00.000Z', '2024-04-02T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(38, 0, 'asda', '2024-04-29T16:00:00.000Z', '2024-04-30T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(39, 0, 'asdas', '2024-05-01T16:00:00.000Z', '2024-05-03T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(40, 10, 'opening', '2024-04-02T17:55:00.000Z', '2024-04-02T17:59:00.000Z', '', 'sdafasdf', '', '', '', '', '', ''),
(41, 10, 'dfsdf', '2024-04-02T18:19:00.000Z', '2024-04-02T19:18:00.000Z', '', 'dsfsdf', '', '', '', '', '', ''),
(42, 11, 'assdasasd', '2024-04-03T19:07:00.000Z', '2024-04-03T19:09:00.000Z', '', 'sadasdasd', '', '', '', '', '', ''),
(44, 0, 'wwww', '2024-05-21T16:00:00.000Z', '2024-05-24T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(45, 0, 'event', '2024-05-03T16:00:00.000Z', '2024-05-04T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(46, 0, 'new event', '2024-05-29T16:00:00.000Z', '2024-05-30T16:00:00.000Z', '1', '', '', '', '', '', '', ''),
(47, 0, 'Sample Event Title', '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', '1', '', '', '', '', '', '', '');

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
(2, 'Category 1', 1, 'Tag 1', '2024-05-04'),
(5, 'Talk', 0, ' ', '2024-05-06'),
(6, 'Talk', 5, 'Lecture', '2024-05-06'),
(7, 'Category 1', 1, 'Tag 2', '2024-05-07');

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
  `ticket_instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `start`, `end`, `ticket_title`, `ticket_desc`, `ticket_type`, `ticket_event`, `ticket_admin`, `ticket_deadline`, `ticket_priority`, `ticket_volunteers_id`, `ticket_status`, `ticket_comments`, `ticket_instructions`) VALUES
(1, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Sample Ticket', 'Sample ticket description', 'Part Ticket', 'Event for 7', 'Aj Narag ', '2024-05-08', 'High', '4', 'To-Do', '', 'Sample instruction 1, Sample instruction 2'),
(2, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Ticket priority low', 'sample ticket priority low for event', 'Event Ticket', 'Event for 7', 'Aj Narag ', '2024-05-09', 'Low', ' ', 'Your-ticket', '', ''),
(3, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Mark Zuckenburger', 'Ticket to para kay mark zuckenburger', 'Sponsor Ticket', 'Event for 7', 'Aj Narag ', '2024-05-23', 'Urgent', '4', 'Your-ticket', '', 'Dapat naka fb ka pag inassist mo, Please refrain violence'),
(4, 1, '2024-05-06T16:00:00.000Z', '2024-05-07T16:00:00.000Z', 'Mid Priority Level ticket', 'Mid Ticket Description', 'Event Ticket', 'Event for 7', 'Aj Narag ', '2024-05-17', 'Mid', ' ', 'Your-ticket', '', ''),
(5, 46, '2024-05-29T16:00:00.000Z', '2024-05-30T16:00:00.000Z', 'asdfjhdfjaf', 'sdklfjalkdflkdsjuk', 'Event Ticket', 'new event', ' VMS Superadmin', '2024-05-16', 'High', '4, 6, 7', 'Your-ticket', '', 'sample instruction, 2nd instruction'),
(6, 11, '2024-04-03T16:00:00.000Z', '2024-04-04T16:00:00.000Z', 'sadasdasd', 'asdasdads', 'Event Ticket', 'sample', ' VMS Superadmin', '2024-05-16', 'Low', '4, 6', 'Your-ticket', '', ''),
(7, 47, '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', 'Process Files', 'This is a ticket for file processing', 'Event Ticket', 'Sample Event Title', ' VMS Superadmin', '2024-05-10', 'Low', '4, 6, 7', 'Your-ticket', '', ''),
(8, 47, '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', 'Urgent ticket', 'kelangan Urgent', 'Event Ticket', 'Sample Event Title', ' VMS Superadmin', '2024-05-09', 'Urgent', '4, 6, 7', 'Your-ticket', '', ''),
(9, 47, '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', 'show ticket', 'show', 'Event Ticket', 'Sample Event Title', ' VMS Superadmin', '2024-05-10', 'Urgent', '4, 6, 7', 'Your-ticket', '', ''),
(10, 47, '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', 'show lang', 'show', 'Event Ticket', 'Sample Event Title', ' VMS Superadmin', '2024-05-10', 'Low', '6', 'Your-ticket', '', ''),
(11, 47, '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', 'show show', 'show', 'Event Ticket', 'Sample Event Title', ' VMS Superadmin', '2024-05-10', 'Urgent', '6', 'Your-ticket', '', ''),
(12, 47, '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', 'show show 1', 'show show', 'Event Ticket', 'Sample Event Title', ' VMS Superadmin', '2024-05-10', 'Urgent', '6', 'Your-ticket', '', ''),
(13, 47, '2024-06-07T16:00:00.000Z', '2024-06-08T16:00:00.000Z', 'urgent sho', 'show', 'Event Ticket', 'Sample Event Title', ' VMS Superadmin', '2024-05-10', 'Urgent', '6', 'Your-ticket', '', '');

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
(12, 5, '2024-04-23 19:54:27', '2024-04-23 20:02:30', 'teo'),
(38, 4, '2024-05-01 20:32:11', '2024-05-01 20:32:47', 'Ymann'),
(39, 4, '2024-05-01 20:33:12', '2024-05-01 20:40:59', 'Ymann'),
(40, 4, '2024-05-01 20:46:23', '2024-05-01 20:48:54', 'Ymann'),
(41, 4, '2024-05-01 20:49:24', '2024-05-01 21:29:06', 'Ymann'),
(42, 4, '2024-05-01 21:32:46', '2024-05-02 02:58:28', 'Ymann'),
(43, 4, '2024-05-02 16:11:05', '2024-05-03 00:33:48', 'Ymann'),
(44, 4, '2024-05-03 00:42:27', '2024-05-03 08:01:17', 'Ymann'),
(45, 4, '2024-05-03 08:08:56', '2024-05-03 13:19:08', 'Ymann'),
(46, 4, '2024-05-03 13:19:57', '2024-05-03 14:19:29', 'Ymann'),
(47, 4, '2024-05-03 14:48:31', '2024-05-03 22:10:31', 'Ymann'),
(48, 4, '2024-05-03 22:16:18', '2024-05-03 23:05:40', 'Ymann'),
(49, 4, '2024-05-03 23:29:46', '2024-05-03 23:36:00', 'Ymann'),
(50, 4, '2024-05-03 23:36:19', '2024-05-04 15:25:09', 'Ymann'),
(51, 4, '2024-05-04 11:03:03', '2024-05-04 15:25:09', 'Ymann'),
(52, 4, '2024-05-06 20:14:37', '2024-05-06 20:32:27', 'Ymann'),
(53, 4, '2024-05-06 21:45:13', '2024-05-07 02:10:36', 'Ymann'),
(54, 4, '2024-05-07 02:10:51', '2024-05-07 02:11:50', 'Ymann'),
(55, 4, '2024-05-07 02:12:09', '2024-05-07 02:50:34', 'Ymann'),
(56, 6, '2024-05-07 03:25:04', '2024-05-07 03:25:20', 'ymann'),
(57, 6, '2024-05-07 03:54:42', '2024-05-07 03:57:24', 'ymann'),
(58, 6, '2024-05-07 03:57:32', '2024-05-07 03:57:35', 'ymann'),
(59, 6, '2024-05-07 03:57:56', '2024-05-07 03:58:11', 'ymann'),
(60, 6, '2024-05-07 04:00:01', '2024-05-07 05:39:59', 'ymann'),
(61, 6, '2024-05-07 14:20:42', '2024-05-07 14:21:07', 'ymann'),
(62, 6, '2024-05-07 14:48:12', '2024-05-07 16:31:24', 'ymann'),
(63, 6, '2024-05-07 17:02:32', '2024-05-07 17:32:48', 'ymann'),
(64, 6, '2024-05-07 17:33:00', '2024-05-07 17:49:54', 'ymann'),
(65, 6, '2024-05-07 17:50:02', '2024-05-07 18:20:32', 'ymann'),
(66, 6, '2024-05-07 18:20:38', '2024-05-07 19:41:09', 'ymann'),
(67, 6, '2024-05-07 19:41:18', '2024-05-07 19:41:31', 'ymann'),
(68, 7, '2024-05-07 20:04:23', '2024-05-07 20:04:29', 'edy'),
(69, 6, '2024-05-07 20:51:50', '2024-05-08 00:40:37', 'ymann'),
(70, 6, '2024-05-08 01:06:33', '2024-05-08 01:06:53', 'ymann'),
(71, 6, '2024-05-08 01:07:30', '2024-05-08 14:01:11', 'ymann'),
(72, 6, '2024-05-08 01:12:45', '2024-05-08 14:01:11', 'ymann'),
(73, 6, '2024-05-08 12:42:34', '2024-05-08 14:01:11', 'ymann'),
(74, 6, '2024-05-08 13:44:44', '2024-05-08 14:01:11', 'ymann'),
(75, 6, '2024-05-08 14:01:55', '2024-05-09 03:05:11', 'ymann'),
(76, 6, '2024-05-09 03:05:18', '2024-05-09 03:21:21', 'ymann'),
(77, 6, '2024-05-09 03:28:27', '2024-05-09 03:28:33', 'ymann'),
(78, 6, '2024-05-09 03:29:21', '0000-00-00 00:00:00', 'ymann'),
(79, 6, '2024-05-09 12:34:56', '0000-00-00 00:00:00', 'ymann');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `guest_sponsors`
--
ALTER TABLE `guest_sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_agenda`
--
ALTER TABLE `personal_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `skill_tag`
--
ALTER TABLE `skill_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `timelogs`
--
ALTER TABLE `timelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteer_logtime`
--
ALTER TABLE `volunteer_logtime`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `volunteer_skills`
--
ALTER TABLE `volunteer_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
