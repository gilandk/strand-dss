-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: May 25, 2021 at 09:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25
=======
-- Generation Time: May 31, 2021 at 07:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28
>>>>>>> develop

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
<<<<<<< HEAD
(1, 1, 'Reading Comprehension', '', 100, '2021-05-25 07:06:34', '2021-05-09 16:15:05'),
(2, 2, 'Clerical Ability', '', 100, '2021-05-09 16:15:05', '2021-05-09 16:15:05'),
(3, 3, 'Mathematical Ability', '', 60, '2021-05-08 03:47:45', '2021-05-08 03:47:45'),
(4, 4, 'Manipulative Skills', '', 100, '2021-05-09 16:15:04', '2021-05-09 16:15:04'),
(5, 5, 'Verbal Ability', '', 70, '2021-05-11 10:48:09', '2021-05-11 10:48:09'),
(6, 6, 'Scientific Ability', '', 100, '2021-05-24 07:13:16', '2021-05-24 07:13:16'),
(7, 7, 'Logical Reasoning', '', 50, '2021-05-11 10:48:13', '2021-05-11 10:48:13'),
=======
(1, 1, 'Reading Comprehension', '', 60, '2021-05-28 06:23:59', '2021-05-28 06:23:59'),
(2, 2, 'Clerical Ability', '', 40, '2021-05-28 06:24:06', '2021-05-28 06:24:06'),
(3, 3, 'Mathematical Ability', '', 100, '2021-05-28 06:24:14', '2021-05-28 06:24:14'),
(4, 4, 'Manipulative Skills', '', 30, '2021-05-28 06:24:19', '2021-05-28 06:24:19'),
(5, 5, 'Verbal Ability', '', 100, '2021-05-28 06:24:27', '2021-05-28 06:24:27'),
(6, 6, 'Scientific Ability', '', 100, '2021-05-24 07:13:16', '2021-05-24 07:13:16'),
(7, 7, 'Logical Reasoning', '', 30, '2021-05-28 06:24:37', '2021-05-28 06:24:37'),
>>>>>>> develop
(8, 8, 'Non-Verbal Ability', '', 50, '2021-05-11 10:48:15', '2021-05-11 10:48:15'),
(9, 9, 'Entrepreneurial Ability', '', 60, '2021-05-28 06:24:47', '2021-05-28 06:24:47');

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

<<<<<<< HEAD
=======
--
-- Dumping data for table `examinee_student`
--

INSERT INTO `examinee_student` (`id`, `exam_id`, `student_id`, `exam_status`, `date_taken`) VALUES
(1, 1, 1, 0, '2021-05-28 07:27:52'),
(2, 1, 2, 0, '2021-05-29 03:18:54'),
(3, 1, 3, 0, '2021-05-29 03:21:04'),
(4, 1, 4, 0, '2021-05-29 03:25:35'),
(5, 1, 5, 0, '2021-05-29 03:37:50');

>>>>>>> develop
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
<<<<<<< HEAD
  `exam_status` varchar(10) NOT NULL DEFAULT 'Inactive',
=======
  `exam_status` varchar(10) NOT NULL DEFAULT 'Active',
>>>>>>> develop
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

<<<<<<< HEAD
=======
--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_type`, `exam_guide`, `exam_date_s`, `exam_date_e`, `exam_status`, `date_created`, `date_updated`) VALUES
(1, 'Reviewer', '<p><strong>DYCI </strong>- Strand Aptitude Exam for upcoming Junior High Students<br />\r\n&nbsp;</p>\r\n', '05/28/2021 01:00 AM ', ' 06/18/2021 01:00 AM', 'Active', '2021-05-28 07:17:35', '2021-05-28 07:25:40');

>>>>>>> develop
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

<<<<<<< HEAD
=======
--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`ans_id`, `exam_id`, `category_id`, `examinee_id`, `score`, `status`, `percentile`, `aptitude`, `value`, `date`) VALUES
(1, 1, 1, 1, 3, '1', 5, 'Below Average', 2, '2021-05-28 07:28:46'),
(2, 1, 2, 1, 5, '1', 12.5, 'Below Average', 2, '2021-05-28 07:29:10'),
(3, 1, 3, 1, 2, '1', 2, 'Low', 1, '2021-05-28 07:35:26'),
(4, 1, 4, 1, 2, '1', 6.66667, 'Below Average', 2, '2021-05-28 07:35:54'),
(5, 1, 5, 1, 0, '1', 0, 'Very Low', 0, '2021-05-28 07:36:05'),
(6, 1, 6, 1, 3, '1', 3, 'Below Average', 2, '2021-05-28 07:36:18'),
(7, 1, 7, 1, 1, '1', 3.33333, 'Below Average', 2, '2021-05-28 07:36:26'),
(8, 1, 8, 1, 2, '1', 4, 'Below Average', 2, '2021-05-28 07:36:34'),
(9, 1, 9, 1, 1, '1', 1.66667, 'Low', 1, '2021-05-28 07:36:39'),
(10, 1, 1, 2, 1, '1', 1.66667, 'Low', 1, '2021-05-29 03:19:05'),
(11, 1, 2, 2, 1, '1', 2.5, 'Below Average', 2, '2021-05-29 03:19:18'),
(12, 1, 3, 2, 0, '1', 0, 'Very Low', 0, '2021-05-29 03:19:29'),
(13, 1, 4, 2, 9, '1', 30, 'Low Average', 3, '2021-05-29 03:19:44'),
(14, 1, 5, 2, 2, '1', 2, 'Low', 1, '2021-05-29 03:19:50'),
(15, 1, 6, 2, 5, '1', 5, 'Below Average', 2, '2021-05-29 03:19:59'),
(16, 1, 7, 2, 5, '1', 16.6667, 'Low Average', 3, '2021-05-29 03:20:08'),
(17, 1, 8, 2, 4, '1', 8, 'Below Average', 2, '2021-05-29 03:20:15'),
(18, 1, 9, 2, 2, '1', 3.33333, 'Below Average', 2, '2021-05-29 03:20:20'),
(19, 1, 1, 3, 3, '1', 5, 'Below Average', 2, '2021-05-29 03:21:11'),
(20, 1, 2, 3, 7, '1', 17.5, 'Low Average', 3, '2021-05-29 03:21:21'),
(21, 1, 3, 3, 5, '1', 5, 'Below Average', 2, '2021-05-29 03:21:28'),
(22, 1, 4, 3, 9, '1', 30, 'Low Average', 3, '2021-05-29 03:21:41'),
(23, 1, 5, 3, 2, '1', 2, 'Low', 1, '2021-05-29 03:21:48'),
(24, 1, 6, 3, 5, '1', 5, 'Below Average', 2, '2021-05-29 03:22:27'),
(25, 1, 7, 3, 5, '1', 16.6667, 'Low Average', 3, '2021-05-29 03:22:34'),
(26, 1, 8, 3, 4, '1', 8, 'Below Average', 2, '2021-05-29 03:22:42'),
(27, 1, 9, 3, 2, '1', 3.33333, 'Below Average', 2, '2021-05-29 03:22:46'),
(28, 1, 1, 4, 3, '1', 5, 'Below Average', 2, '2021-05-29 03:25:43'),
(29, 1, 2, 4, 7, '1', 17.5, 'Low Average', 3, '2021-05-29 03:25:53'),
(30, 1, 3, 4, 5, '1', 5, 'Below Average', 2, '2021-05-29 03:26:02'),
(31, 1, 4, 4, 9, '1', 30, 'Low Average', 3, '2021-05-29 03:26:17'),
(32, 1, 5, 4, 2, '1', 2, 'Low', 1, '2021-05-29 03:26:24'),
(33, 1, 6, 4, 5, '1', 5, 'Below Average', 2, '2021-05-29 03:26:32'),
(34, 1, 7, 4, 5, '1', 16.6667, 'Low Average', 3, '2021-05-29 03:26:41'),
(35, 1, 8, 4, 4, '1', 8, 'Below Average', 2, '2021-05-29 03:26:48'),
(36, 1, 9, 4, 2, '1', 3.33333, 'Below Average', 2, '2021-05-29 03:26:52'),
(37, 1, 1, 5, 4, '1', 6.66667, 'Below Average', 2, '2021-05-29 03:37:59'),
(38, 1, 2, 5, 7, '1', 17.5, 'Low Average', 3, '2021-05-29 03:38:10'),
(39, 1, 3, 5, 5, '1', 5, 'Below Average', 2, '2021-05-29 03:38:17'),
(40, 1, 4, 5, 9, '1', 30, 'Low Average', 3, '2021-05-29 03:38:29'),
(41, 1, 5, 5, 1, '1', 1, 'Low', 1, '2021-05-29 03:38:35'),
(42, 1, 6, 5, 5, '1', 5, 'Below Average', 2, '2021-05-29 03:38:42'),
(43, 1, 7, 5, 5, '1', 16.6667, 'Low Average', 3, '2021-05-29 03:38:49'),
(44, 1, 8, 5, 4, '1', 8, 'Below Average', 2, '2021-05-29 03:38:55'),
(45, 1, 9, 5, 2, '1', 3.33333, 'Below Average', 2, '2021-05-29 03:38:59');

>>>>>>> develop
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

<<<<<<< HEAD
=======
--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`ec_id`, `examID`, `catID`, `cHour`, `cMin`, `cat_status`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 1, 40, 'active', '2021-05-28 06:45:47', '2021-05-28 06:46:29'),
(2, 1, 2, 0, 40, 'active', '2021-05-28 06:45:49', '2021-05-28 06:46:32'),
(3, 1, 3, 1, 40, 'active', '2021-05-28 06:45:51', '2021-05-28 06:46:37'),
(4, 1, 4, 0, 30, 'active', '2021-05-28 06:45:52', '2021-05-28 06:46:44'),
(5, 1, 5, 1, 40, 'active', '2021-05-28 06:45:54', '2021-05-28 06:46:49'),
(6, 1, 6, 1, 40, 'active', '2021-05-28 06:45:55', '2021-05-28 06:46:52'),
(7, 1, 7, 0, 30, 'active', '2021-05-28 06:45:57', '2021-05-28 06:47:10'),
(8, 1, 8, 0, 50, 'active', '2021-05-28 06:45:58', '2021-05-28 06:47:11'),
(9, 1, 9, 1, 0, 'active', '2021-05-28 06:46:00', '2021-05-28 06:47:13');

>>>>>>> develop
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
<<<<<<< HEAD

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
=======
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_cat`, `q_scat`, `q_item`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answerQ`, `q_logs`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 1, '<p><img alt=\"\" src=\"../upload/981294325.jpg\" style=\"border-style:solid; border-width:3px; height:184px; margin:3px 2px; width:500px\" /></p>\r\n\r\n<p>Which sentence shows cause and effect relationships?</p>\r\n', '<p>There would be less hungry and unhappy people</p>\r\n', '<p>If people would be more selfless, this world would be a much better place.</p>\r\n', '<p>This world would be less chaotic.</p>\r\n', '<p>If people would only offer a helping hand to those who are needy rather than depriving then of help.</p>\r\n', 2, '', '2021-05-28 02:48:08', NULL),
(2, 1, 1, 2, '<p>What is the main idea of the selection?</p>\r\n', '<p>People on this world are selfless.</p>\r\n', '<p>If only people could share what they have.</p>\r\n', '<p>This world is unfair for there is no compassion.</p>\r\n', '<p>People in this world are focused on their own account.</p>\r\n', 2, '', '2021-05-28 02:52:34', NULL),
(3, 1, 1, 3, '<p>What is the emotion of the speaker in this selection?</p>\r\n', '<p>The speaker is hurt by other&#39;s selfishness.</p>\r\n', '<p>The speaker is angry of people&#39;s attitude towad others.</p>\r\n', '<p>The speaker is guilty of all misdeeds to other people.</p>\r\n', '<p>The speaker is sad about the society&#39;s condition because of selfishness.</p>\r\n', 4, '', '2021-05-28 02:57:59', NULL),
(4, 1, 1, 4, '<p>What is the&nbsp; cause of all problems in this world?</p>\r\n', '<p>We are all victims of selfish world.</p>\r\n', '<p>We are more concerned about our own family.</p>\r\n', '<p>There is no compassion in all walks of life.</p>\r\n', '<p>There is more technology that changed us.</p>\r\n', 1, '', '2021-05-28 03:00:06', NULL),
(5, 1, 1, 5, '<p>What is The speaker trying to say in repeating this line? &quot; If people could only be...&quot;</p>\r\n', '<p>It means that people nowadays are self-centered.</p>\r\n', '<p>It means that poverty forced us to be selfish</p>\r\n', '<p>It means people nowadays forgot the value of peace</p>\r\n', '<p>Modernization changed out way of living.</p>\r\n', 1, '', '2021-05-28 03:28:50', NULL),
(6, 1, 1, 6, '<p>What is The speaker trying to say in repeating this line? &quot; If people could only be...&quot;</p>\r\n', '<p>It means that people nowadays are self-centered.</p>\r\n', '<p>It means that poverty forced us to be selfish</p>\r\n', '<p>It means people nowadays forgot the value of peace</p>\r\n', '<p>Modernization changed out way of living.</p>\r\n', 1, '', '2021-05-28 03:28:53', '2021-05-28 03:42:12'),
(7, 2, 2, 1, '<p>ax&nbsp; &nbsp; &nbsp;by&nbsp; &nbsp; &nbsp;cx&nbsp; &nbsp; &nbsp;dw</p>\r\n', '<p>za</p>\r\n', '<p>yb</p>\r\n', '<p>wd</p>\r\n', '<p>cx</p>\r\n', 1, '', '2021-05-28 03:44:25', NULL),
(8, 2, 2, 2, '<p>10&nbsp; &nbsp; &nbsp;21&nbsp; &nbsp; &nbsp;12&nbsp; &nbsp; 28</p>\r\n', '<p>12</p>\r\n', '<p>10</p>\r\n', '<p>28</p>\r\n', '<p>21</p>\r\n', 2, '', '2021-05-28 03:44:50', NULL),
(9, 2, 2, 3, '<p>45&nbsp; &nbsp; &nbsp;36&nbsp; &nbsp; &nbsp;a10&nbsp; &nbsp; &nbsp;b9</p>\r\n', '<p>54</p>\r\n', '<p>b9</p>\r\n', '<p>a10</p>\r\n', '<p>63</p>\r\n', 1, '', '2021-05-28 03:45:17', NULL),
(10, 2, 2, 4, '<p>68&nbsp; &nbsp; &nbsp;Ac&nbsp; &nbsp; &nbsp;QM&nbsp; &nbsp; &nbsp;Lk</p>\r\n', '<p>Ca</p>\r\n', '<p>Ac</p>\r\n', '<p>MO</p>\r\n', '<p>kL</p>\r\n', 1, '', '2021-05-28 03:45:45', NULL),
(11, 2, 2, 5, '<p>33&nbsp; &nbsp; &nbsp;46&nbsp; &nbsp; &nbsp;62&nbsp; &nbsp; &nbsp;58</p>\r\n', '<p>64</p>\r\n', '<p>33</p>\r\n', '<p>46</p>\r\n', '<p>85</p>\r\n', 1, '', '2021-05-28 03:46:06', NULL),
(12, 2, 2, 6, '<p>CAE&nbsp; &nbsp; &nbsp;BEE&nbsp; &nbsp; &nbsp;DAE&nbsp; &nbsp; &nbsp;XEA</p>\r\n', '<p>EEB</p>\r\n', '<p>BEE</p>\r\n', '<p>EBE</p>\r\n', '<p>BEEB</p>\r\n', 1, '', '2021-05-28 03:46:40', NULL),
(13, 2, 2, 7, '<p>7M&nbsp; &nbsp; &nbsp;M7&nbsp; &nbsp; &nbsp;77&nbsp; &nbsp; &nbsp;MM</p>\r\n', '<p>M7</p>\r\n', '<p>77</p>\r\n', '<p>7M</p>\r\n', '<p>MM</p>\r\n', 1, '', '2021-05-28 03:47:06', NULL),
(14, 2, 2, 8, '<p>32A&nbsp; &nbsp; &nbsp;A32&nbsp; &nbsp; &nbsp;B39&nbsp; &nbsp; &nbsp;3B9</p>\r\n', '<p>32A</p>\r\n', '<p>3A2</p>\r\n', '<p>3B9</p>\r\n', '<p>9B3</p>\r\n', 1, '', '2021-05-28 03:47:46', NULL),
(15, 3, 3, 1, '<p>What is&nbsp;<strong><em>n</em></strong>&nbsp;in 5&sup2;(255+9) - 20 + 5 = n?</p>\r\n', '<p>390</p>\r\n', '<p>541</p>\r\n', '<p>405</p>\r\n', '<p>610</p>\r\n', 2, '', '2021-05-28 03:53:34', NULL),
(16, 3, 3, 2, '<p>Evaluate 5[76 + 61] - [23-5]?</p>\r\n', '<p>302</p>\r\n', '<p>667</p>\r\n', '<p>787</p>\r\n', '<p>921</p>\r\n', 1, '', '2021-05-28 03:54:11', NULL),
(17, 3, 3, 3, '<p>Which of the following is equal to&nbsp;â…› % in decimal?</p>\r\n', '<p>0.00125</p>\r\n', '<p>.0125</p>\r\n', '<p>1.25</p>\r\n', '<p>12.5</p>\r\n', 1, '', '2021-05-28 03:55:06', NULL),
(18, 3, 3, 4, '<p>Which of the following is the same as 627%?</p>\r\n', '<p>0.627</p>\r\n', '<p>6.27</p>\r\n', '<p>62.7</p>\r\n', '<p>627.0</p>\r\n', 1, '', '2021-05-28 03:55:35', NULL),
(19, 3, 3, 5, '<p>What percent of P400.00 is P64.00?</p>\r\n', '<p>16%</p>\r\n', '<p>1.6%</p>\r\n', '<p>1.06%</p>\r\n', '<p>.16%</p>\r\n', 1, '', '2021-05-28 03:56:07', NULL),
(20, 3, 3, 6, '<p>How much is 72% of 5,790?</p>\r\n', '<p>3570.00</p>\r\n', '<p>3417.00</p>\r\n', '<p>4168.80</p>\r\n', '<p>4618.8</p>\r\n', 1, '', '2021-05-28 03:57:59', NULL),
(21, 4, 4, 1, '<p><img alt=\"\" src=\"../upload/1471624399.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:15:09', NULL),
(22, 4, 4, 2, '<p><img alt=\"\" src=\"../upload/1341308907.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:15:37', NULL),
(23, 4, 4, 3, '<p><img alt=\"\" src=\"../upload/556756931.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:15:57', NULL),
(24, 4, 4, 4, '<p><img alt=\"\" src=\"../upload/1407474936.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 3, '', '2021-05-28 04:16:17', NULL),
(25, 4, 4, 5, '<p><img alt=\"\" src=\"../upload/833637409.jpg\" style=\"height:161px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>D</p>\r\n', '<p>C</p>\r\n', 1, '', '2021-05-28 04:16:42', NULL),
(26, 4, 4, 6, '<p><img alt=\"\" src=\"../upload/937908381.jpg\" style=\"height:172px; width:500px\" /></p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', 1, '', '2021-05-28 04:17:07', NULL),
(27, 4, 4, 7, '<p><img alt=\"\" src=\"../upload/1494989893.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', '<p>A</p>\r\n', 1, '', '2021-05-28 04:18:31', NULL),
(28, 4, 4, 8, '<p><img alt=\"\" src=\"../upload/113250250.jpg\" style=\"height:209px; width:500px\" /></p>\r\n', '<p>C</p>\r\n', '<p>B</p>\r\n', '<p>D</p>\r\n', '<p>A</p>\r\n', 1, '', '2021-05-28 04:18:54', NULL),
(29, 4, 4, 9, '<p><img alt=\"\" src=\"../upload/1676986684.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>D</p>\r\n', '<p>C</p>\r\n', 1, '', '2021-05-28 04:19:13', NULL),
(30, 4, 4, 10, '<p><img alt=\"\" src=\"../upload/1185470265.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>D</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>A</p>\r\n', 1, '', '2021-05-28 04:19:30', NULL),
(31, 5, 5, 1, '<p><img alt=\"\" src=\"../upload/496384519.png\" style=\"border-style:solid; border-width:3px; height:27px; width:457px\" /></p>\r\n', '<p>Day</p>\r\n', '<p>Light</p>\r\n', '<p>Joy</p>\r\n', '<p>Hope</p>\r\n', 3, '', '2021-05-28 04:33:45', NULL),
(32, 5, 5, 2, '<p><img alt=\"\" src=\"../upload/543189084.png\" style=\"border-style:solid; border-width:3px; height:17px; margin-left:1px; margin-right:1px; width:700px\" /></p>\r\n', '<p>Standard</p>\r\n', '<p>Calmness</p>\r\n', '<p>Blanace</p>\r\n', '<p>Tolerance</p>\r\n', 4, '', '2021-05-28 04:36:35', NULL),
(33, 5, 5, 3, '<p><img alt=\"\" src=\"../upload/1603757502.png\" style=\"border-style:solid; border-width:3px; height:37px; margin-left:1px; margin-right:1px; width:400px\" /></p>\r\n', '<p>Combine</p>\r\n', '<p>Separate</p>\r\n', '<p>Elevate</p>\r\n', '<p>Reduce</p>\r\n', 1, '', '2021-05-28 04:38:11', NULL),
(34, 5, 5, 4, '<p><img alt=\"\" src=\"../upload/1950657726.png\" style=\"border-style:solid; border-width:3px; height:58px; margin-left:1px; margin-right:1px; width:500px\" /></p>\r\n', '<p>Porch:House</p>\r\n', '<p>Playground : School</p>\r\n', '<p>Yard : Church</p>\r\n', '<p>Hall: Dance</p>\r\n', 1, '', '2021-05-28 04:41:08', NULL),
(35, 6, 6, 1, '<p><img alt=\"\" src=\"../upload/576227941.png\" style=\"border-style:solid; border-width:3px; height:481px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:46:30', NULL),
(36, 6, 6, 2, '<p><img alt=\"\" src=\"../upload/1240597715.png\" style=\"border-style:solid; border-width:3px; height:275px; margin-left:1px; margin-right:1px; width:626px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:47:42', NULL),
(37, 6, 6, 3, '<p><img alt=\"\" src=\"../upload/1314589143.png\" style=\"border-style:solid; border-width:3px; height:178px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:48:07', NULL),
(38, 6, 6, 4, '<p><img alt=\"\" src=\"../upload/1291600434.png\" style=\"border-style:solid; border-width:3px; height:279px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:48:31', NULL),
(39, 6, 6, 5, '<p><img alt=\"\" src=\"../upload/742779876.png\" style=\"border-style:solid; border-width:3px; height:171px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:49:09', NULL),
(40, 7, 7, 1, '<p><img alt=\"\" src=\"../upload/2020431129.png\" style=\"border-style:solid; border-width:3px; height:144px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:51:14', NULL),
(41, 7, 7, 2, '<p><img alt=\"\" src=\"../upload/2147070723.png\" style=\"border-style:solid; border-width:3px; height:187px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:51:38', NULL),
(42, 7, 7, 3, '<p><img alt=\"\" src=\"../upload/424114279.png\" style=\"border-style:solid; border-width:3px; height:144px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:52:11', NULL),
(43, 7, 7, 4, '<p><img alt=\"\" src=\"../upload/1760724738.png\" style=\"border-style:solid; border-width:3px; height:145px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:52:28', NULL),
(44, 7, 7, 5, '<p><img alt=\"\" src=\"../upload/28038183.png\" style=\"border-style:solid; border-width:3px; height:144px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:52:49', NULL),
(45, 8, 8, 2, '<p><img alt=\"\" src=\"../upload/1509533476.png\" style=\"border-style:solid; border-width:3px; height:147px; margin-left:1px; margin-right:1px; width:373px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/969076434.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1838730678.png\" style=\"height:52px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1928615317.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1471298203.png\" style=\"height:53px; width:57px\" /></p>\r\n', 1, '', '2021-05-28 04:57:56', '2021-05-28 04:59:43'),
(46, 8, 8, 3, '<p><img alt=\"\" src=\"../upload/2025318993.png\" style=\"border-style:solid; border-width:3px; height:149px; margin-left:1px; margin-right:1px; width:370px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/927944518.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1843493977.png\" style=\"height:52px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1853676853.png\" style=\"height:52px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/218218784.png\" style=\"height:54px; width:57px\" /></p>\r\n', 1, '', '2021-05-28 04:59:25', '2021-05-28 04:59:51'),
(47, 8, 8, 4, '<p><img alt=\"\" src=\"../upload/1409687048.png\" style=\"border-style:solid; border-width:3px; height:147px; margin-left:1px; margin-right:1px; width:369px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1845480745.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1474564031.png\" style=\"height:51px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/640441453.png\" style=\"height:54px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/311141367.png\" style=\"height:54px; width:57px\" /></p>\r\n', 1, '', '2021-05-28 05:00:47', NULL),
(48, 8, 8, 1, '<p><img alt=\"\" src=\"../upload/408501122.png\" style=\"border-style:solid; border-width:3px; height:149px; margin-left:1px; margin-right:1px; width:375px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/493285113.png\" style=\"height:51px; width:56px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/365675283.png\" style=\"height:51px; width:73px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1515863601.png\" style=\"height:51px; width:68px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/955188208.png\" style=\"height:51px; width:60px\" /></p>\r\n', 1, '', '2021-05-28 05:04:35', NULL),
(49, 9, 9, 1, '<p><img alt=\"\" src=\"../upload/1103705224.png\" style=\"border-style:solid; border-width:3px; height:130px; margin-left:1px; margin-right:1px; width:590px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 05:09:18', NULL),
(50, 9, 9, 2, '<p><img alt=\"\" src=\"../upload/302705526.png\" style=\"border-style:solid; border-width:3px; height:271px; margin-left:1px; margin-right:1px; width:552px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 05:09:33', NULL);
>>>>>>> develop

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

<<<<<<< HEAD
INSERT INTO `strand_formula` (`sf_id`, `strand_id`, `category1`, `category2`, `category3`, `category4`, `category5`, `category6`, `category7`, `category8`, `category9`, `category10`, `total_category`) VALUES
(1, 4, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 5),
(2, 1, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 7),
(3, 2, 0, 0, 3, 4, 5, 0, 7, 0, 0, 0, 4),
(4, 3, 0, 2, 3, 4, 0, 6, 7, 0, 0, 0, 5);
=======
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
(1, 4, 1, 2, 3, 0, 5, 0, 7, 8, 9, 0, 7),
(2, 1, 1, 0, 3, 0, 5, 0, 7, 8, 9, 0, 6),
(3, 2, 1, 0, 0, 0, 5, 6, 7, 8, 0, 0, 5),
(4, 3, 1, 2, 3, 4, 0, 6, 7, 8, 0, 0, 7);
>>>>>>> develop

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
<<<<<<< HEAD
(1, 123123123, 'asterisk@gmail.com', '123123', 'Aaron', 'Ramirez', 'Roque', '', '1995-11-19', 25, '09956119643', 'Dr. Yanga College\'s Inc', 10, 'B', '2021 - 2022', 'General Academic', 'Humanities and Social Science', 'Active', '2021-05-25 07:13:23');
=======
(1, 123123123, 'asterisk@gmail.com', '123123', 'Aaron', 'Ramirez', 'Roque', '', '1995-11-19', 25, '09956119643', 'Dr. Yanga College\'s Inc', 10, 'B', '2021 - 2022', 'General Academic', 'Humanities and Social Science', 'Active', '2021-05-25 07:13:23'),
(2, 123123123, 'gervie@gmail.com', '123123', 'Gervie', '', 'Felizardo', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'A', '2021 - 2022', 'Humanities and Social Science', 'General Academic', 'Active', '2021-05-29 03:18:41'),
(3, 123123123, 'rean@gmail.com', '123123', 'Rean', '', 'Valencia', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'A', '2021 - 2022', 'Science Technology Engineering and Mathematics', 'Accountancy Business and Management', 'Active', '2021-05-29 03:24:42'),
(4, 123123123, 'vincent@gmail.com', '123123', 'Vincent', '', 'Escala', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'B', '2021 - 2022', 'Science Technology Engineering and Mathematics', 'Accountancy Business and Management', 'Active', '2021-05-29 03:25:27'),
(5, 123123123, 'brenn@gmail.com', '123123', 'Brenn', '', 'Dela Cruz', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'B', '2021 - 2022', 'General Academic', 'Science Technology Engineering and Mathematics', 'Active', '2021-05-29 03:37:44');
>>>>>>> develop

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
<<<<<<< HEAD
=======
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `main_cat`, `sc_index`, `sub_title`, `sub_instruction`, `date_created`, `date_updated`) VALUES
(1, '1', 'A', 'Paragraph Comprehension', '<p><strong>Direction:</strong> Read carefully each of the following selctions. Then answer the questions asked and/or complete the statements given under each by choossing are of the four possible answer in letters A,B,C,D .</p>\r\n', '2021-05-28 02:39:27', '2021-05-28 06:21:35'),
(2, '2', 'A', 'INSPECTION', '<p><strong>Direction:&nbsp;</strong></p>\r\n', '2021-05-28 03:43:37', '2021-05-28 06:21:56'),
(3, '3', 'A', 'NUMERICAL ABILITY', '<p><strong>Direction:&nbsp;&nbsp;</strong>This is a test to see how well and ow fast you can work with numbers.</p>\r\n', '2021-05-28 03:50:57', '2021-05-28 06:22:05'),
(4, '4', 'A', 'SIMILARITIES AND DIFFERENCES', '<p><strong>Direction:&nbsp;</strong>&nbsp;Each items consists of drawings with letters A,B,C and D. All Drawing are essentianly alike <strong>except one </strong>which is defferent from the others in some small details . Find this drawing and shade the circle with the corresponding letter on the appropriate items number in your Answer Sheet</p>\r\n', '2021-05-28 04:12:45', '2021-05-28 06:22:23'),
(5, '5', 'A', 'Vocabulary', '<p><strong>Direction:&nbsp;&nbsp;</strong>Which lettered option is similar in meaning to the underlined word in the phrase?</p>\r\n', '2021-05-28 04:29:00', '2021-05-28 06:22:25'),
(6, '6', 'A', 'Science', '<p><strong>Direction:</strong></p>\r\n', '2021-05-28 04:45:57', '2021-05-28 06:22:26'),
(7, '7', 'A', 'Logic', '<p>Direction:</p>\r\n', '2021-05-28 04:50:55', '2021-05-28 06:22:27'),
(8, '8', 'A', 'Non-Verbal', '<p>Direction: The symbols or figures at the left side of each items make up a set.</p>\r\n', '2021-05-28 04:56:23', '2021-05-28 06:22:28'),
(9, '9', 'A', 'Entreprenurial', '<p>Direction:&nbsp;</p>\r\n', '2021-05-28 05:06:23', '2021-05-28 06:22:29');

--
>>>>>>> develop
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
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> develop

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
<<<<<<< HEAD
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> develop

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
<<<<<<< HEAD
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
>>>>>>> develop

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
<<<<<<< HEAD
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
>>>>>>> develop

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
<<<<<<< HEAD
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
>>>>>>> develop

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
<<<<<<< HEAD
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> develop

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
<<<<<<< HEAD
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
>>>>>>> develop
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
