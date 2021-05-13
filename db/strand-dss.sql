-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 05:58 AM
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
(1, 10000, 'admin@gmail.com', 'adminadmin', 'ADMIN', 'Super Admin', 'Active', '2021-03-27 06:48:31', '2021-03-27 06:48:31'),
(2, 10001, 'gilandk@gmail.com', '123456', 'Izaya', 'Admin', 'Active', '2021-02-28 15:42:11', NULL),
(5, 0, 'asterisk@gmail.com', '123456', 'dasdasdasdasd', 'Super Admin', 'Active', '2021-03-06 07:42:22', NULL);

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
(2, 2, 'Clerical Ability', '', 100, '2021-05-09 16:15:05', '2021-05-09 16:15:05'),
(3, 3, 'Mathematical Ability', '', 60, '2021-05-08 03:47:45', '2021-05-08 03:47:45'),
(4, 4, 'Manipulative Skills', '', 100, '2021-05-09 16:15:04', '2021-05-09 16:15:04'),
(5, 5, 'Verbal Ability', '', 70, '2021-05-11 10:48:09', '2021-05-11 10:48:09'),
(6, 6, 'Scientific Ability', '<p>DIRECTION</p>\r\n', 100, '2021-05-09 16:15:15', '2021-05-09 16:15:15'),
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

--
-- Dumping data for table `examinee_student`
--

INSERT INTO `examinee_student` (`id`, `exam_id`, `student_id`, `exam_status`, `date_taken`) VALUES
(10, 1, 7, 0, '2021-05-07 09:22:44');

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
(1, 'Dry-run', '<p>test</p>\r\n', '10-02-2021 01:00', '10-02-2021 01:00', 'Active', 1, '2021-02-16 09:33:27', '2021-04-13 05:38:37'),
(2, 'Mock-test', '<p>testing</p>\r\n', '01-01-2021 01:00', '03-05-2021 01:00', 'Inactive', 2, '2021-02-16 09:33:27', NULL),
(3, 'Re-exam', '<p>Test</p>\r\n', '', '', 'Inactive', 0, '2021-02-16 09:33:27', NULL);

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

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`ans_id`, `exam_id`, `category_id`, `examinee_id`, `score`, `status`, `percentile`, `aptitude`, `value`, `date`) VALUES
(5, 1, 1, 7, 89, '1', 89, 'Superior', 8, '2021-05-05 10:58:05'),
(7, 1, 3, 7, 4, '1', 6.66667, 'Very Low', 0, '2021-05-05 11:18:19'),
(9, 1, 4, 7, 14, '1', 14, 'Very Low', 0, '2021-05-09 15:50:53'),
(10, 1, 2, 7, 9, '1', 9, 'Very Low', 0, '2021-05-09 15:54:15');

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
(1, 3, 1, 1, 20, 'active', '2021-02-16 09:34:33', '2021-03-14 07:59:05'),
(2, 3, 2, 0, 30, 'active', '2021-02-16 09:34:33', NULL),
(3, 3, 3, 1, 0, 'active', '2021-02-16 09:34:33', NULL),
(4, 3, 4, 1, 30, 'active', '2021-02-16 09:34:33', NULL),
(6, 1, 1, 0, 0, 'active', '2021-02-16 09:34:33', NULL),
(7, 1, 2, 0, 0, 'active', '2021-02-16 09:34:33', NULL),
(8, 1, 3, 0, 0, 'active', '2021-02-16 09:34:33', NULL),
(9, 3, 5, 0, 0, 'active', '2021-03-14 03:04:11', NULL),
(11, 0, 0, 0, 0, 'active', '2021-03-21 16:20:05', NULL),
(12, 3, 23, 0, 0, 'active', '2021-03-21 16:24:44', NULL),
(13, 3, 6, 0, 0, 'active', '2021-03-21 16:33:47', NULL),
(16, 1, 4, 0, 0, 'active', '2021-05-08 03:30:47', NULL),
(17, 1, 5, 0, 0, 'active', '2021-05-08 03:30:49', NULL),
(18, 1, 6, 0, 0, 'active', '2021-05-08 03:30:51', NULL),
(19, 1, 7, 0, 0, 'active', '2021-05-08 03:30:52', NULL),
(20, 1, 8, 0, 0, 'active', '2021-05-08 03:30:54', NULL),
(21, 1, 9, 0, 0, 'active', '2021-05-08 03:30:56', NULL);

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

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_cat`, `q_scat`, `q_item`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answerQ`, `q_logs`, `date_created`, `date_updated`) VALUES
(1, 1, 8, 1, '<p><img alt=\"\" src=\"../upload/615769020.jpg\" style=\"border-style:solid; border-width:5px; height:152px; margin:10px 40px; width:897px\" /></p>\r\n\r\n<p>Which sentence shows cause and effect relationships?</p>\r\n', '<p>A. There would be less hungry and unhappy people</p>\r\n', '<p>B. If people would be more selfless, this world would be a much better place.</p>\r\n', '<p>C. This world would be less chaotic.</p>\r\n', '<p>D. If people would only offer a helping hand to those who are needy rather than depriving them of help.</p>\r\n', 2, '', '2021-04-13 03:51:35', '2021-05-05 11:15:09'),
(2, 1, 8, 2, '<p>&nbsp;What is the main idea of the selection?</p>\r\n', '<p>A. People on this world are selfless.</p>\r\n', '<p>B. If only people could share what they have.</p>\r\n', '<p>C. This world is unfair for there is no compassion.</p>\r\n', '<p>D. People in this words are focused on their own account.</p>\r\n', 2, '', '2021-04-13 04:20:25', '2021-05-04 06:05:16'),
(3, 1, 8, 5, '<p>&nbsp;What is the emotion of the speaker in this selection?</p>\r\n', '<p>A. The speaker is hurt by other`s selfishness.</p>\r\n', '<p>B. The speaker is angry of people`s attitude toward others.</p>\r\n', '<p>C. The spkear is guilty of all his misdeeds to othe people.</p>\r\n', '<p>D. The speaker is sad about the society`s condition because of selfishness.</p>\r\n', 2, '', '2021-04-13 04:23:22', '2021-05-05 10:53:46'),
(4, 1, 8, 4, '<p>&nbsp;What is the cause of all problems in this world?</p>\r\n', '<p>A. We are all Victims of selfish word.</p>\r\n', '<p>B. We are more concerned about our own family.</p>\r\n', '<p>C. There is no compassion in the walks of life.</p>\r\n', '<p>D. There is more technology that changed us.</p>\r\n', 2, '', '2021-04-13 04:27:18', '2021-05-05 10:53:49'),
(5, 1, 8, 3, '<p>What is the speaker trying to say in repeating this line?&quot; If people could only be...&quot;</p>\r\n', '<p>A. It means that people nowadays are self-centered.</p>\r\n', '<p>B. It means that proverty forced us to be selfish.</p>\r\n', '<p>C. It means people nowadays forgot the value of peace.</p>\r\n', '<p>D. Modernization changed our way of living.</p>\r\n', 2, '', '2021-04-13 04:31:03', '2021-05-05 10:53:51'),
(6, 1, 9, 6, '<p><img alt=\"\" src=\"../upload/200527812.jpg\" style=\"border-style:solid; border-width:4px; height:100px; margin:3px; width:280px\" /></p>\r\n\r\n<p>6. It may be inreferred from the selection that one&#39;s____ food intake should total 1200 calories.</p>\r\n', '<p>A. dietary</p>\r\n', '<p>B.daily</p>\r\n', '<p>C.weekly</p>\r\n', '<p>D. mealtime</p>\r\n', 2, '', '2021-04-20 00:43:39', '2021-05-04 06:05:24'),
(7, 1, 9, 7, '<p>7. The &quot;Pack of Diets&quot; is an innovation method of</p>\r\n', '<p>A. relieving boredom</p>\r\n', '<p>B. checking obesity.</p>\r\n', '<p>C. enriching the menu.</p>\r\n', '<p>D.regulating one&#39;s diet.</p>\r\n', 2, '', '2021-04-20 00:46:45', '2021-05-05 10:53:55'),
(8, 1, 9, 8, '<p>8. The selection wouyld most attract the interest of</p>\r\n', '<p>A. chefs.</p>\r\n', '<p>B. physicians.</p>\r\n', '<p>C.dieters.</p>\r\n', '<p>D. nutritionist.</p>\r\n', 2, '', '2021-04-20 00:48:01', '2021-05-04 06:05:29'),
(9, 1, 10, 9, '<p><img alt=\"\" src=\"../upload/501078090.jpg\" style=\"border-style:solid; border-width:3px; height:97px; margin:3px; width:350px\" /></p>\r\n\r\n<p>9. When one realizes his&quot;nothingness&quot; before the eyes of his Creato,he becomes</p>\r\n', '<p>A. humble</p>\r\n', '<p>B.insecure</p>\r\n', '<p>C.insensible</p>\r\n', '<p>D.humiliated</p>\r\n', 2, '', '2021-04-20 01:04:33', '2021-05-04 06:05:31'),
(10, 1, 10, 10, '<p>10. What title could be fitting for this selection?</p>\r\n', '<p>A. The Savior</p>\r\n', '<p>B. A Famous Doctor</p>\r\n', '<p>C. A Great Discovery</p>\r\n', '<p>D Painless Surgery</p>\r\n', 2, '', '2021-04-20 01:05:35', '2021-05-04 06:05:34'),
(11, 1, 10, 11, '<p>11. Chloroform is an element used</p>\r\n', '<p>A. in bleaching</p>\r\n', '<p>B. as insecticide.</p>\r\n', '<p>C. as a strong oxidizing agent</p>\r\n', '<p>D. as general anesthetic substance.</p>\r\n', 2, '', '2021-04-20 01:07:14', '2021-05-05 10:54:16'),
(12, 2, 16, 1, '<p><img alt=\"\" src=\"../upload/1719952103.jpg\" style=\"height:288px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:21:23', '2021-05-05 11:25:27'),
(13, 2, 16, 2, '<p><img alt=\"\" src=\"../upload/1052391413.jpg\" style=\"height:290px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:23:01', '2021-05-05 11:25:29'),
(14, 2, 16, 3, '<p><img alt=\"\" src=\"../upload/1171902598.jpg\" style=\"height:310px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C&nbsp;</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:25:22', '2021-05-05 11:25:30'),
(15, 2, 16, 4, '<p><img alt=\"\" src=\"../upload/1928407103.jpg\" style=\"height:287px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:26:27', '2021-05-05 11:25:32'),
(16, 2, 16, 5, '<p><img alt=\"\" src=\"../upload/553299966.jpg\" style=\"height:288px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:26:27', '2021-05-05 11:25:33'),
(17, 2, 16, 6, '<p><img alt=\"\" src=\"../upload/1681162508.jpg\" style=\"height:376px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:27:34', '2021-05-05 11:25:35'),
(18, 2, 16, 7, '<p><img alt=\"\" src=\"../upload/524738236.jpg\" style=\"height:288px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:33:56', '2021-05-05 11:25:36'),
(19, 2, 16, 8, '<p><img alt=\"\" src=\"../upload/412670134.jpg\" style=\"height:287px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:34:52', '2021-05-05 11:25:38'),
(20, 2, 16, 9, '<p><img alt=\"\" src=\"../upload/1767167167.jpg\" style=\"height:287px; width:900px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 01:36:04', '2021-05-05 11:25:41'),
(21, 3, 19, 1, '<p>What is&nbsp;<strong><em>n&nbsp;</em></strong>in 5&sup2;(225+9) - 20 + 5 = n?</p>\r\n', '<p>A. 390</p>\r\n', '<p>B. 541</p>\r\n', '<p>C.405</p>\r\n', '<p>D.610</p>\r\n', 1, '', '2021-04-20 01:56:27', '2021-05-05 11:16:08'),
(22, 3, 19, 2, '<p>Evaluate 5 [76 + 61 ]&nbsp;+ [ 23 - 5 ]</p>\r\n', '<p>A. 302</p>\r\n', '<p>B. 667</p>\r\n', '<p>C.787</p>\r\n', '<p>D.921</p>\r\n', 1, '', '2021-04-20 01:56:27', '2021-05-05 11:16:11'),
(23, 3, 19, 3, '<p>Which&nbsp;of the following is equal to 1/8% in decimal?</p>\r\n', '<p>A. 0.00125</p>\r\n', '<p>B.0.125</p>\r\n', '<p>C. 1.25</p>\r\n', '<p>D. 12.5</p>\r\n', 1, '', '2021-04-20 02:00:57', '2021-05-05 11:16:13'),
(24, 3, 19, 4, '<p>Which of the following is the same as 627%</p>\r\n', '<p>A. 0.627</p>\r\n', '<p>B. 6.27</p>\r\n', '<p>C. 62.7</p>\r\n', '<p>D.627.0</p>\r\n', 1, '', '2021-04-20 02:03:18', '2021-05-05 11:16:15'),
(25, 3, 19, 5, '<p>What percent of P400.00 is P64.00?</p>\r\n', '<p>A.16%</p>\r\n', '<p>B.1.6%</p>\r\n', '<p>C. 1.06%</p>\r\n', '<p>D. 0.16%</p>\r\n', 1, '', '2021-04-20 02:04:20', '2021-05-05 11:16:17'),
(26, 3, 21, 6, '<p>51.Mike obtain 80%,90%,90% in his first three exam in algebra. What should be his next score to enable him to get an average of 87%?</p>\r\n', '<p>A. 86%</p>\r\n', '<p>B. 88%</p>\r\n', '<p>C. 90%</p>\r\n', '<p>D: 95%</p>\r\n', 1, '', '2021-04-20 02:11:53', '2021-05-05 11:16:20'),
(27, 3, 21, 8, '<p>52. Rean needs 2 pieces of wood for his project. The lengths if the wood are 1 3/4m and 5/8m .What is the total length of wood?</p>\r\n', '<p>A.1 2/3 m</p>\r\n', '<p>B. 1 1/4 m</p>\r\n', '<p>C. 2 1/2 m</p>\r\n', '<p>D. 2 3/8 m</p>\r\n', 1, '', '2021-04-20 02:13:53', '2021-05-05 11:16:31'),
(64, 3, 21, 7, '<p>53. Trisha are 1/8 of the cake while Mae ate 1/6. What part of the cake was eaten by the two girls?</p>\r\n', '<p>A. 1/7</p>\r\n', '<p>B. 7/24</p>\r\n', '<p>C. 1/48</p>\r\n', '<p>D. 1/14</p>\r\n', 1, '', '2021-04-20 02:15:07', '2021-05-05 11:16:24'),
(65, 4, 22, 1, '<p>ax&nbsp; &nbsp; by&nbsp; &nbsp; ex&nbsp; &nbsp; dw</p>\r\n', '<p>A. za</p>\r\n', '<p>B. yb</p>\r\n', '<p>C. wd</p>\r\n', '<p>D. cx</p>\r\n', 1, '', '2021-04-20 02:21:50', '2021-05-09 15:49:39'),
(66, 4, 22, 2, '<p>10&nbsp; 21 12 28</p>\r\n', '<p>A. 12</p>\r\n', '<p>B. 10</p>\r\n', '<p>C. 28</p>\r\n', '<p>D. 21</p>\r\n', 1, '', '2021-04-20 02:23:39', '2021-05-09 15:49:41'),
(67, 4, 22, 3, '<p>45&nbsp; &nbsp; &nbsp;36&nbsp; &nbsp; &nbsp;a10&nbsp; &nbsp; &nbsp;b9</p>\r\n', '<p>A. 54</p>\r\n', '<p>B. b9</p>\r\n', '<p>C.a10</p>\r\n', '<p>D 63</p>\r\n', 1, '', '2021-04-20 02:24:15', '2021-05-09 15:49:42'),
(68, 4, 22, 4, '<p>68&nbsp; &nbsp; Ac&nbsp; &nbsp; QM&nbsp; &nbsp; Lk</p>\r\n', '<p>A. Ca</p>\r\n', '<p>B. Ac</p>\r\n', '<p>C.MO</p>\r\n', '<p>D.kL</p>\r\n', 1, '', '2021-04-20 02:24:51', '2021-05-09 15:49:44'),
(69, 4, 22, 5, '<p>33&nbsp; &nbsp; &nbsp;46&nbsp; &nbsp; 62&nbsp; &nbsp; 58</p>\r\n', '<p>A. 64</p>\r\n', '<p>B. 33</p>\r\n', '<p>C. 46</p>\r\n', '<p>D. 85</p>\r\n', 1, '', '2021-04-20 02:25:15', '2021-05-09 15:49:45'),
(70, 4, 22, 6, '<p>33&nbsp; &nbsp; &nbsp;46&nbsp; &nbsp; 62&nbsp; &nbsp; 58</p>\r\n', '<p>A. 64</p>\r\n', '<p>B. 33</p>\r\n', '<p>C. 46</p>\r\n', '<p>D. 85</p>\r\n', 1, '', '2021-04-20 02:25:15', '2021-05-09 15:49:47'),
(71, 4, 24, 7, '<p>17. A 390216&nbsp; &nbsp; &nbsp; 309216</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;B. 902163&nbsp; &nbsp; &nbsp;902163</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;C. 216390&nbsp; &nbsp; &nbsp;216392</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;D. 921063&nbsp; &nbsp; &nbsp;360129</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:29:30', '2021-05-09 15:49:49'),
(72, 4, 24, 8, '<p>18.&nbsp; A. 0955707&nbsp; &nbsp; &nbsp;0559707</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; B. 1209471&nbsp; &nbsp; &nbsp;1247109</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; C. 8817412&nbsp; &nbsp; &nbsp;8412817</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; D. 1099604&nbsp; &nbsp; &nbsp;1099604</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:36:24', '2021-05-09 15:49:51'),
(73, 4, 24, 10, '<p>18.&nbsp; A. victory gained&nbsp; &nbsp; victory shared</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; B. dividing wall&nbsp; &nbsp; &nbsp;shared wall</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; C. shared word&nbsp;&nbsp; &nbsp; &nbsp;shared value</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; D. loving God&nbsp; &nbsp; &nbsp;loving God</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:36:24', '2021-05-09 15:50:14'),
(74, 4, 25, 9, '<p>Options:</p>\r\n\r\n<p>A. If the first letter of the word is a consonant and the final letter is a vowel.</p>\r\n\r\n<p>B. If the scord letter is&nbsp;<strong>L&nbsp;</strong>the third letter is&nbsp;<strong>g&nbsp;</strong>, and final letter is&nbsp;<strong>t.</strong></p>\r\n\r\n<p>C. If the initial and the final letters are vowels.</p>\r\n\r\n<p>D. If the word odes <strong>NOT&nbsp;</strong>&nbsp;fall under any A,B or C</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Now do these:</strong></p>\r\n\r\n<p>25. abandonment</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:43:33', '2021-05-09 15:49:53'),
(75, 4, 25, 11, '<p>26. illogically</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:44:01', '2021-05-09 15:49:54'),
(76, 4, 25, 12, '<p>27. illuminate</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:44:29', '2021-05-09 15:50:17'),
(77, 4, 25, 13, '<p>28. abstract</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:45:14', '2021-05-09 15:50:18'),
(78, 4, 25, 14, '<p>29. accrue</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-04-20 02:45:40', '2021-05-09 15:50:20'),
(791, 1, 11, 12, '<p>Test</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 2, '', '2021-05-04 04:58:38', '2021-05-04 06:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE `school_admin` (
  `sa_id` int(11) NOT NULL,
  `sa_uid` int(20) NOT NULL,
  `sa_email` varchar(50) NOT NULL,
  `sa_pass` varchar(100) NOT NULL,
  `sa_fullname` varchar(100) NOT NULL,
  `sa_contact` varchar(11) NOT NULL,
  `sa_position` varchar(20) NOT NULL,
  `sa_status` varchar(20) NOT NULL DEFAULT 'active',
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_admin`
--

INSERT INTO `school_admin` (`sa_id`, `sa_uid`, `sa_email`, `sa_pass`, `sa_fullname`, `sa_contact`, `sa_position`, `sa_status`, `date_joined`) VALUES
(1, 2147483647, 'asdasd@gmail.com', '123123', 'Aaron Paul Roque', '12312312312', 'asdasd', 'active', '2021-03-27 05:30:00'),
(4, 666666555, 'test@gmail.com', '123123', 'Testing Testing', '21312312312', 'Coordinator', 'active', '2021-03-27 06:24:28');

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
(1, 'Dr. Yanga\'s Colleges, Inc.', 'Bocaue, Bulacan', 'Information and Communication Technology (ICT), Science Technology Engineering and Mathematics (STEM), Home Economics', 'dyci@edu.ph', '0991234567', '', '2021-03-21 14:37:10');

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
(7, 265465132, 'asterisk@gmail.com', '1234567', 'Aron', 'Ramirez', 'Roque', '', '1995-11-19', 25, '01231231231', 'Dr. Yanga', 10, 'A', '2022 - 2023', 'Information and Communication Technology (ICT)', 'Accountancy, Business and Management (ABM)', 'active', '2021-05-11 04:35:56'),
(9, 2147483647, 'vievie@gmail.com', 'qweqweqwe', 'gervie', 'C', 'Felizardo', '', '0000-00-00', 0, '', '', 4, 'BSIT', '', 'Accountancy, Business and Management (ABM)', 'Accountancy, Business and Management (ABM)', 'active', '2021-04-13 04:12:36');

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
(8, '1', 'A', 'For Items 1-5', '<p>Paragraph Comprehension</p>\r\n', '2021-03-14 04:00:20', '2021-04-13 05:34:08'),
(9, '1', 'B', 'For items 6-8', '', '2021-04-13 04:34:31', '2021-04-13 05:34:10'),
(10, '1', 'C', 'For items 9-11', '', '2021-04-13 04:35:07', '2021-04-13 05:34:13'),
(11, '1', 'D', 'For items 12-14', '', '2021-04-13 04:35:21', '2021-04-13 05:34:16'),
(12, '1', 'E', 'For items 15-18', '', '2021-04-13 04:35:37', '2021-04-13 05:34:21'),
(13, '1', 'F', 'For items 19-22', '', '2021-04-13 04:35:56', '2021-04-13 05:34:24'),
(14, '1', 'G', 'For items 23-26', '', '2021-04-13 04:36:24', '2021-04-13 05:34:31'),
(15, '1', 'H', 'For items 27-29', '', '2021-04-13 04:36:39', '2021-04-13 05:34:34'),
(16, '2', 'A', 'SIMILARITIES AND DIFFERENCES', '<p>DIRECTIONS: Each items consists of drawigs with letters A,B,C,D. All drawing are essentiolly alike <s>except one</s>&nbsp;which is different from the others in some small details. Find this drawing and shade the circle with the corresponding letter on the appropriate items number in you Answer Sheet.</p>\r\n', '2021-04-20 01:15:25', '2021-04-20 01:39:27'),
(17, '2', 'B', 'MISSING FIGURE TEST', '<p>DIRECTION:</p>\r\n', '2021-04-20 01:39:11', '2021-04-20 01:39:43'),
(18, '2', 'C', 'MECHANICAL REASONING', '<p>DIRECTION:</p>\r\n', '2021-04-20 01:40:21', NULL),
(19, '3', 'A', 'NUMERICAL ABILITY', '<p>DIRECTION:</p>\r\n', '2021-04-20 01:52:21', NULL),
(20, '3', 'B', 'QUANTITATIVE RELATIONSHIPS', '<p>DIRECTION:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>NOTE:</p>\r\n', '2021-04-20 02:05:14', NULL),
(21, '3', 'C', 'PROBLEM SOLVING', '<p>DIRECTION:</p>\r\n', '2021-04-20 02:07:14', NULL),
(22, '4', 'A', 'INSPECTION ( Items 1-8)', '<p>DIRECTION:</p>\r\n', '2021-04-20 02:19:03', NULL),
(23, '4', 'B', 'CODING (Items 9-16)', '<p>DIRECTION:</p>\r\n', '2021-04-20 02:19:42', NULL),
(24, '4', 'C', 'SPEED AND ACCURACY (Items 17-24)', '<p>DIRECTION:</p>\r\n', '2021-04-20 02:20:14', NULL),
(25, '4', 'D', 'CLASSIFICATION (Items 25-32)', '<p>DIRECTION:</p>\r\n', '2021-04-20 02:20:43', NULL);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `examinee_student`
--
ALTER TABLE `examinee_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=793;

--
-- AUTO_INCREMENT for table `school_admin`
--
ALTER TABLE `school_admin`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
