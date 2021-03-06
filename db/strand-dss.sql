-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 04:06 PM
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
(1, 10000, 'admin@gmail.com', 'admin', 'ADMIN', 'Super Admin', 'Active', '2021-01-03 05:47:04', NULL);

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
(1, 1, 'Reading Comprehension', '', 100, '2021-02-14 06:32:02', NULL),
(2, 4, 'Manipulative Skills', '', 0, '2021-02-07 12:33:59', NULL),
(3, 3, 'Mathematical Ability', '', 0, '2021-02-07 12:33:52', NULL),
(4, 2, 'Clerical Ability', '', 0, '2021-02-07 12:34:02', NULL),
(5, 6, 'Scientific Ability', '', 0, '2021-02-07 12:34:10', NULL),
(6, 5, 'Verbal Ability', '', 0, '2021-02-07 12:34:20', NULL),
(7, 8, 'Non-Verbal Ability', '', 0, '2021-02-07 12:34:45', NULL),
(8, 9, 'Entrepreneurial Ability', '', 0, '2021-02-07 12:34:41', NULL),
(9, 7, 'Logical Reasoning', '', 0, '2021-02-07 12:34:23', NULL),
(23, 0, 'General Information', '<p>tsrasdasdasasdasdaczxczxczxczx</p>\r\n', 10, '2021-02-14 07:41:29', NULL);

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
  `exam_handler` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_type`, `exam_guide`, `exam_date_s`, `exam_date_e`, `exam_status`, `exam_handler`, `date_created`, `date_updated`) VALUES
(1, 'Dry-run', '<p>test</p>\r\n', '02-10-2021 01:00', '02-19-2021 01:00', 'Active', 1, '2021-02-16 09:33:27', NULL),
(2, 'Mock-test', '<p>testing</p>\r\n', '01-01-2021 01:00', '03-05-2021 01:00', 'Inactive', 2, '2021-02-16 09:33:27', NULL),
(3, 'Re-exam', '<p>Test</p>\r\n', '', '', 'Inactive', 0, '2021-02-16 09:33:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `ans_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `facilitator_id` int(11) NOT NULL,
  `examinee_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
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

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`ec_id`, `examID`, `catID`, `cHour`, `cMin`, `cat_status`, `date_created`, `date_updated`) VALUES
(1, 3, 1, 1, 30, 'active', '2021-02-16 09:34:33', NULL),
(2, 3, 2, 0, 30, 'active', '2021-02-16 09:34:33', NULL),
(3, 3, 3, 1, 0, 'active', '2021-02-16 09:34:33', NULL),
(4, 3, 4, 1, 30, 'active', '2021-02-16 09:34:33', NULL),
(5, 3, 9, 0, 30, 'active', '2021-02-16 09:34:33', NULL),
(6, 1, 1, 0, 0, 'active', '2021-02-16 09:34:33', NULL),
(7, 1, 2, 0, 0, 'active', '2021-02-16 09:34:33', NULL),
(8, 1, 3, 0, 0, 'active', '2021-02-16 09:34:33', NULL);

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
  `question` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `answerQ` int(5) NOT NULL,
  `groupQ` varchar(5) NOT NULL,
  `groupIndex` varchar(5) NOT NULL,
  `q_logs` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_cat`, `q_scat`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answerQ`, `groupQ`, `groupIndex`, `q_logs`, `date_created`, `date_updated`) VALUES
(1, 1, 1, '<p>Testing question #1</p>\r\n', '<p>answer test 1</p>\r\n', '<p>answer test 2</p>\r\n', '<p>answer test 3</p>\r\n', '<p>answer test 4</p>\r\n', 3, 'yes', 'D', '', '2021-02-16 09:29:13', '2021-02-16 14:22:39'),
(32, 1, 1, '<p><img alt=\"\" src=\"../upload/1266628538.jpg\" style=\"border-style:solid; border-width:1px; height:150px; margin:3px 2px; width:200px\" /></p>\r\n\r\n<p>testing</p>\r\n', '<p>Momo</p>\r\n', '<p>Sana</p>\r\n', '<p>Dayhun</p>\r\n', '<p>Mina</p>\r\n', 1, 'no', '', '', '2021-02-16 09:29:13', '2021-02-28 14:08:01'),
(33, 1, 1, '<p>testingasdzxczbcvbcvbcvbcvbcvbcvbcvakzxmlkcjzxlkcnzlxmcnkjhfhaf jbakdba</p>\r\n', '', '', '', '<p>test4</p>\r\n', 3, 'no', '', '', '2021-02-16 10:20:26', '2021-02-16 14:12:55'),
(34, 1, 1, '<p>testingasdzxczbcvbcvbcvbcvbcvbcvbcvakzxmlkcjzxlkcnzlxmcnkjhfhaf jbakdba</p>\r\n', '', '', '', '<p>test4</p>\r\n', 3, 'no', '', '', '2021-02-16 10:20:55', '2021-02-16 14:12:55'),
(35, 1, 2, '<p>logical ideas</p>\r\n', '<p>a</p>\r\n', '<p>b</p>\r\n', '<p>c</p>\r\n', '<p>d</p>\r\n', 2, 'yes', 'A', '', '2021-02-28 14:10:24', '2021-02-28 14:10:48'),
(36, 1, 2, '<p>question</p>\r\n', '<p>asd</p>\r\n', '<p>asd</p>\r\n', '<p>asd</p>\r\n', '<p>asd</p>\r\n', 2, 'no', '', '', '2021-02-28 14:11:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE `school_admin` (
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
(1, 'Dr. Yanga\'s Colleges Inc', 'Bocaue, Bulacan', 'HUMS, STEM, GAS', 'dyci@edu.ph', '0991234567', '', NULL);

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
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `main_cat`, `sc_index`, `sub_title`, `sub_instruction`, `date_created`, `date_updated`) VALUES
(1, '1', 'A', 'Paragraph Comprehension', '<p>test</p>\r\n', '2021-02-16 09:40:01', NULL),
(2, '1', 'B', 'Logical Organization Ideas', '<p>testasdzxczx</p>\r\n', '2021-02-16 09:40:01', NULL);

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
-- Indexes for table `school_admin`
--
ALTER TABLE `school_admin`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`school_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `school_admin`
--
ALTER TABLE `school_admin`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
