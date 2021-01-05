-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 02:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strand-dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uid` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(16) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_role` varchar(20) NOT NULL,
  `admin_status` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uid`, `admin_email`, `admin_pass`, `admin_name`, `admin_role`, `admin_status`, `date_created`) VALUES
(1, 10000, 'admin@gmail.com', 'admin', 'ADMIN', 'Super Admin', 'Active', '2021-01-03 05:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_info` text NOT NULL,
  `cat_items` int(11) NOT NULL,
  `cat_timer` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_info`, `cat_items`, `cat_timer`) VALUES
(1, 'Reading Comprehension', '', 50, '00:00:00'),
(2, 'Manipulative Skills', '', 50, '00:00:00'),
(3, 'Mathematical Ability', '', 50, '00:00:00'),
(4, 'Clerical Ability', '', 50, '00:00:00'),
(5, 'Scientific Ability', '', 50, '00:00:00'),
(6, 'Verbal Ability', '', 50, '00:00:00'),
(7, 'Non-Verbal Ability', '', 50, '00:00:00'),
(8, 'Entrepreneurial Ability', '', 50, '00:00:00'),
(9, 'Logical Reasoning', '', 50, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE `loginlogs` (
  `id` int(11) NOT NULL,
  `IpAddress` varbinary(16) NOT NULL,
  `TryTime` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school-admin`
--

CREATE TABLE `school-admin` (
  `sa_id` int(11) NOT NULL,
  `sa_uid` int(11) NOT NULL,
  `sa_fullname` varchar(100) NOT NULL,
  `sa_status` varchar(20) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sa_school` varchar(100) NOT NULL,
  `sa_position` varchar(20) NOT NULL,
  `sa_contact` varchar(11) NOT NULL,
  `sa_email` varchar(50) NOT NULL,
  `sa_user` varchar(100) NOT NULL,
  `sa_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `user_id` int(11) NOT NULL,
  `user_uid` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `allias` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `school` varchar(100) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `s_year` varchar(50) NOT NULL,
  `desired_strand1` varchar(50) NOT NULL,
  `desired_strand2` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `school-admin`
--
ALTER TABLE `school-admin`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `school-admin`
--
ALTER TABLE `school-admin`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
