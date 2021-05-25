-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 09:15 AM
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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uid`, `admin_email`, `admin_pass`, `admin_name`, `admin_role`, `admin_status`, `date_created`, `date_updated`) VALUES
(1, 10000, 'admin@gmail.com', 'admin', 'Admin - Aron', 'Super Admin', 'Active', '2021-05-24 07:13:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_seq` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_instruct` text NOT NULL,
  `cat_items` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_seq`, `cat_name`, `cat_instruct`, `cat_items`, `date_created`, `date_updated`) VALUES
(1, 1, 'Reading Comprehension', '', 100, '2021-05-25 07:06:34', '2021-05-09 16:15:05'),
(2, 2, 'Clerical Ability', '', 100, '2021-05-09 16:15:05', '2021-05-09 16:15:05'),
(3, 3, 'Mathematical Ability', '', 60, '2021-05-08 03:47:45', '2021-05-08 03:47:45'),
(4, 4, 'Manipulative Skills', '', 100, '2021-05-09 16:15:04', '2021-05-09 16:15:04'),
(5, 5, 'Verbal Ability', '', 70, '2021-05-11 10:48:09', '2021-05-11 10:48:09'),
(6, 6, 'Scientific Ability', '', 100, '2021-05-24 07:13:16', '2021-05-24 07:13:16'),
(7, 7, 'Logical Reasoning', '', 50, '2021-05-11 10:48:13', '2021-05-11 10:48:13'),
(8, 8, 'Non-Verbal Ability', '', 50, '2021-05-11 10:48:15', '2021-05-11 10:48:15'),
(9, 9, 'Entrepreneurial Ability', '', 80, '2021-05-11 10:48:17', '2021-05-11 10:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_student`
--

CREATE TABLE `examinee_student` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_status` int(11) NOT NULL,
  `date_taken` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `exam_guide` text NOT NULL,
  `exam_date_s` varchar(50) NOT NULL,
  `exam_date_e` varchar(50) NOT NULL,
  `exam_status` varchar(10) NOT NULL DEFAULT 'Inactive',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `ans_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `examinee_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `percentile` float NOT NULL,
  `aptitude` varchar(100) NOT NULL,
  `value` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `ec_id` int(11) NOT NULL,
  `examID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `cHour` int(11) NOT NULL,
  `cMin` int(11) NOT NULL,
  `cat_status` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `q_cat` int(11) NOT NULL,
  `q_scat` int(11) NOT NULL,
  `q_item` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `answerQ` int(5) NOT NULL,
  `q_logs` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_address` text NOT NULL,
  `strands` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `dateupdated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`school_id`, `school_name`, `school_address`, `strands`, `email`, `contact`, `logo`, `dateupdated`) VALUES
(1, 'Dr. Yanga\'s Colleges, Inc.', 'Bocaue, Bulacan', 'General Academic, Humanities and Social Science, Science Technology Engineering and Mathematics, Accountancy Business and Management', 'dyci@edu.ph', '0991234567', '', '2021-05-22 08:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `strands`
--

CREATE TABLE `strands` (
  `strand_id` int(11) NOT NULL,
  `strand_name` varchar(250) NOT NULL,
  `strand_abr` varchar(10) NOT NULL,
  `strand_description` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strands`
--

INSERT INTO `strands` (`strand_id`, `strand_name`, `strand_abr`, `strand_description`, `updated`) VALUES
(1, 'General Academic', 'GAS', '', '2021-05-19 05:44:09'),
(2, 'Humanities and Social Science', 'HUMSS', '', '2021-05-19 05:44:11'),
(3, 'Science Technology Engineering and Mathematics', 'STEM', '', '2021-05-22 08:54:32'),
(4, 'Accountancy Business and Management', 'ABM', '', '2021-05-22 08:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `strand_formula`
--

CREATE TABLE `strand_formula` (
  `sf_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `category1` int(11) NOT NULL,
  `category2` int(11) NOT NULL,
  `category3` int(11) NOT NULL,
  `category4` int(11) NOT NULL,
  `category5` int(11) NOT NULL,
  `category6` int(11) NOT NULL,
  `category7` int(11) NOT NULL,
  `category8` int(11) NOT NULL,
  `category9` int(11) NOT NULL,
  `category10` int(11) NOT NULL,
  `total_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strand_formula`
--

INSERT INTO `strand_formula` (`sf_id`, `strand_id`, `category1`, `category2`, `category3`, `category4`, `category5`, `category6`, `category7`, `category8`, `category9`, `category10`, `total_category`) VALUES
(1, 4, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 5),
(2, 1, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 7),
(3, 2, 0, 0, 3, 4, 5, 0, 7, 0, 0, 0, 4),
(4, 3, 0, 2, 3, 4, 0, 6, 7, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `allias` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `school` varchar(100) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `s_year` varchar(50) NOT NULL,
  `strand_opt1` varchar(150) NOT NULL,
  `strand_opt2` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`user_id`, `student_id`, `user_email`, `user_pass`, `firstname`, `middlename`, `lastname`, `allias`, `birthdate`, `age`, `contact`, `school`, `grade`, `section`, `s_year`, `strand_opt1`, `strand_opt2`, `status`, `date_joined`) VALUES
(1, 123123123, 'asterisk@gmail.com', '123123', 'Aaron', 'Ramirez', 'Roque', '', '1995-11-19', 25, '09956119643', 'Dr. Yanga College\'s Inc', 10, 'B', '2021 - 2022', 'General Academic', 'Humanities and Social Science', 'Active', '2021-05-25 07:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_id` int(11) NOT NULL,
  `main_cat` varchar(100) NOT NULL,
  `sc_index` varchar(5) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `sub_instruction` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
-- Indexes for table `examinee_student`
--
ALTER TABLE `examinee_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `strands`
--
ALTER TABLE `strands`
  ADD PRIMARY KEY (`strand_id`);

--
-- Indexes for table `strand_formula`
--
ALTER TABLE `strand_formula`
  ADD PRIMARY KEY (`sf_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_id`);

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
-- AUTO_INCREMENT for table `examinee_student`
--
ALTER TABLE `examinee_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `strands`
--
ALTER TABLE `strands`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `strand_formula`
--
ALTER TABLE `strand_formula`
  MODIFY `sf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
