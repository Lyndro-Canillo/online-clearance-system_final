-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 06:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clearance_requests`
--

CREATE TABLE `clearance_requests` (
  `request_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `data_to_save` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `user_id` int(20) NOT NULL,
  `unit_id` int(20) NOT NULL,
  `units` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginuser`
--

CREATE TABLE `loginuser` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginuser`
--

INSERT INTO `loginuser` (`id`, `username`, `password`, `usertype`) VALUES
(33, 'dsfsd', '$2y$10$dREyl5EyuAZ7.D3QO8HJIebooevF0eHf9', 'ww'),
(34, '', '$2y$10$HN2G35Cpd/vBOT.QZCYObeH5JMoPE9u//', 'admin'),
(45, '', '$2y$10$WYMFIIToVXBor66MaT/jU..zXcJ0rcbLX', 'admin'),
(458, '', 'sdsa', 'sdas'),
(1234, 'lyndro', '1gg', 'admin'),
(1235, '33', '$2y$10$qYs6bmh.8RZj/4cQXHsd2uIqNmvvj0lYn', 'ww'),
(1236, '11', '$2y$10$dA0p5kfgKrh3l7sC2qsM9uPXSREvmULxo', 'dd'),
(2343, '', 'as', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(20) NOT NULL,
  `user_request_id` int(20) NOT NULL,
  `message` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `student_id` int(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `payment` int(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`student_id`, `date`, `payment`, `status`) VALUES
(0, '2023-12-04', 100, '1'),
(9202, '2023-12-10', 100, '1'),
(69, '2023-12-10', 100, ''),
(1111, '2023-12-10', 100, '1');

-- --------------------------------------------------------

--
-- Table structure for table `paymentapprove`
--

CREATE TABLE `paymentapprove` (
  `student_id` varchar(20) NOT NULL,
  `date` int(20) NOT NULL,
  `payment` int(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentapprove`
--

INSERT INTO `paymentapprove` (`student_id`, `date`, `payment`, `status`) VALUES
('', 0, 0, '1'),
('', 0, 0, '1'),
('', 0, 0, '-1'),
('', 0, 0, '-1'),
('', 0, 0, '1'),
('', 0, 0, '1'),
('', 0, 0, '-1'),
('', 0, 0, '-1'),
('', 0, 0, '1'),
('', 0, 0, '1'),
('', 0, 0, '-1'),
('', 0, 0, '-1'),
('', 0, 0, '1'),
('', 0, 0, '1'),
('', 0, 0, '1'),
('', 0, 0, '1'),
('', 0, 0, '-1'),
('', 0, 0, '-1'),
('', 0, 0, '-1'),
('', 0, 0, '1'),
('', 0, 0, '1'),
('', 0, 0, '1'),
('1111', 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `usertype` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `first_name`, `middle_name`, `last_name`, `usertype`, `password`) VALUES
(55, 'rter', 'dfg', 'dfg', 'admin', '123'),
(69, 'gerly', 'bjytyu', 'yyuh', 'student', '69'),
(78, 'yu', 'gjhg', 'gjhg', 'labrian', '78'),
(223, 'wewe', 'weqwe', 'qwe', 'student', 'weqw'),
(234, 'jhcg', 'zxz', 'as', 'casher', '234'),
(1010, 'drood', 'l', 'canillo', 'admin', 'bayot'),
(1111, 'dsa', 'asdas', 'asdas', 'student', '1111'),
(2222, 'dsdfs', 'fsddf', 'sdfs', 'student', '2222'),
(6756, 'tyu', 'tyuty', 'tyuyt', 'student', 'ugh'),
(6775, 'hjh', 'hgjgh', 'hgjgh', 'student', 'rtrt'),
(9202, 'canillo', 'ekrh', 'ewr', 'student', '9202'),
(22222, 'dfsd', 'dsfs', 'fsdf', 'student', '22222'),
(101020, 'veldin', 'talorete', 'as', 'faculty', '101020'),
(101030, 'Javer ', 'Gwapo', 'Borngo', 'faculty', 'javer123'),
(101040, 'GlitzWyn', 'Undecided', 'Sobesol', 'faculty', 'glitz143'),
(101050, 'John Doe', 'Anonymous', 'Gwapo', 'faculty', 'john123'),
(101060, 'Florentino', 'CantBeReach', 'Edolsa', 'faculty', 'Florentino123'),
(202010, 'lyndro', 'leopoldo', 'canillo', 'student', '202010');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(20) NOT NULL,
  `unit_id` int(20) NOT NULL,
  `units` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_id`, `units`) VALUES
(10, 55, 'yuu'),
(101020, 100, 'ccc100'),
(101020, 101, 'ccc101'),
(101030, 102, 'ccc102'),
(101040, 109, 'csc109'),
(101030, 112, 'csc112'),
(101060, 121, 'ccc121'),
(101060, 124, 'csc124'),
(101020, 133, 'csc133'),
(101030, 142, 'csc142'),
(101030, 143, 'ccc181'),
(101040, 144, 'csc145'),
(101050, 145, 'csc171'),
(101060, 146, 'csc113'),
(101050, 151, 'ccc151'),
(101060, 153, 'csc153'),
(101020, 155, 'csc155'),
(101030, 157, 'csc157'),
(101030, 161, 'csc161'),
(101060, 175, 'csc175'),
(101020, 181, 'csc181'),
(101040, 186, 'csc186'),
(101040, 193, 'csc193'),
(101050, 194, 'csc194'),
(101030, 198, 'csc198'),
(101020, 199, 'csc199'),
(101020, 456, 'cc100'),
(101000, 777, 'wgswfdgwgy');

-- --------------------------------------------------------

--
-- Table structure for table `units_requests`
--

CREATE TABLE `units_requests` (
  `student_id` varchar(20) NOT NULL,
  `prof_id` int(20) NOT NULL,
  `unit_id` int(20) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units_requests`
--

INSERT INTO `units_requests` (`student_id`, `prof_id`, `unit_id`, `status`) VALUES
('', 69, 101020, '0'),
('', 101020, 0, '1'),
('', 101030, 101030, '1'),
('', 101020, 101020, '0'),
('69', 101020, 101, '1'),
('1111', 101030, 112, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `request_message` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clearance_requests`
--
ALTER TABLE `clearance_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `loginuser`
--
ALTER TABLE `loginuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clearance_requests`
--
ALTER TABLE `clearance_requests`
  MODIFY `request_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `unit_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginuser`
--
ALTER TABLE `loginuser`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2344;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232313;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
