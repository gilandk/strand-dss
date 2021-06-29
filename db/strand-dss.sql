-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 10:32 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
(1, 10000, 'admin@gmail.com', 'admin', 'Admin - Aron', 'Super Admin', 'Active', '2021-05-24 07:13:02', NULL),
(2, 0, 'adminprof@gmail.com', '123123', 'Admin - Prof', 'Admin', 'Active', '2021-06-12 09:53:45', NULL),
(3, 0, 'editor@gmail.com', '123123', 'Admin - Editor', 'Editor', 'Active', '2021-06-14 11:14:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE `audit_trails` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`id`, `admin_id`, `user_id`, `activity`, `date`) VALUES
(3, 1, NULL, 'Added new Exam', '2021-06-15 04:57:44'),
(4, 1, NULL, 'Updated a category Entrepreneurial Ability', '2021-06-15 05:24:31'),
(5, 1, NULL, 'Updated a category Entrepreneurial  to Entrepreneurial Ability', '2021-06-15 05:24:54'),
(6, 1, NULL, 'Logged in Admin - Aron', '2021-06-15 05:37:52'),
(7, NULL, 1, 'Logged in as User (Aaron R. Roque )', '2021-06-15 05:53:45'),
(8, 1, NULL, 'Logged in Admin - Aron', '2021-06-15 06:03:45'),
(9, 1, NULL, 'Deleted a question', '2021-06-15 06:13:53'),
(10, 1, NULL, 'Deleted a question', '2021-06-15 06:13:59'),
(11, 1, NULL, 'Logged in Admin - Aron', '2021-06-15 06:14:57'),
(12, 1, NULL, 'Updated a category Entrepreneurial Ability', '2021-06-15 06:17:07'),
(13, 1, NULL, 'Added new question', '2021-06-15 06:20:46'),
(14, 1, NULL, 'Added new question', '2021-06-15 06:21:22'),
(15, 1, NULL, 'Added new question', '2021-06-15 06:22:33'),
(16, 1, NULL, 'Added new question', '2021-06-15 06:22:57'),
(17, 1, NULL, 'Added new question', '2021-06-15 06:23:19'),
(18, 1, NULL, 'Added new question', '2021-06-15 06:23:45'),
(19, 1, NULL, 'Added new question', '2021-06-15 06:24:10'),
(20, 1, NULL, 'Added new question', '2021-06-15 06:24:34'),
(21, 1, NULL, 'Added new question', '2021-06-15 06:25:07'),
(22, 1, NULL, 'Added new question', '2021-06-15 06:25:34'),
(23, 1, NULL, 'Added new question', '2021-06-15 06:26:27'),
(24, 1, NULL, 'Added new question', '2021-06-15 06:27:02'),
(25, 1, NULL, 'Added new question', '2021-06-15 06:27:28'),
(26, 1, NULL, 'Added new sub_categoryNo. 31-32', '2021-06-15 06:28:10'),
(27, 1, NULL, 'Added new question', '2021-06-15 06:28:41'),
(28, 1, NULL, 'Updated a question', '2021-06-15 06:28:52'),
(29, 1, NULL, 'Added new question', '2021-06-15 06:29:28'),
(30, 1, NULL, 'Added new sub_categoryNo.  33-34', '2021-06-15 06:30:10'),
(31, 1, NULL, 'Updated a sub category 2 Items', '2021-06-15 06:30:58'),
(32, 1, NULL, 'Updated a sub category 2 Items', '2021-06-15 06:31:02'),
(33, 1, NULL, 'Updated a sub category 2 Items', '2021-06-15 06:31:12'),
(34, 1, NULL, 'Updated a sub category 2 Items', '2021-06-15 06:33:15'),
(35, 1, NULL, 'Added new question', '2021-06-15 06:33:43'),
(36, 1, NULL, 'Added new question', '2021-06-15 06:34:16'),
(37, 1, NULL, 'Added new question', '2021-06-15 06:34:50'),
(38, 1, NULL, 'Added new sub_category2 Items', '2021-06-15 06:35:52'),
(39, 1, NULL, 'Updated a sub category 2 Items', '2021-06-15 06:36:20'),
(40, 1, NULL, 'Added new question', '2021-06-15 06:36:41'),
(41, 1, NULL, 'Added new question', '2021-06-15 06:37:02'),
(42, 1, NULL, 'Added new question', '2021-06-15 06:37:39'),
(43, 1, NULL, 'Added new question', '2021-06-15 06:37:59'),
(44, 1, NULL, 'Added new question', '2021-06-15 06:38:22'),
(45, 1, NULL, 'Added new question', '2021-06-15 06:38:58'),
(46, 1, NULL, 'Added new question', '2021-06-15 06:38:58'),
(47, 1, NULL, 'Updated a question', '2021-06-15 06:39:32'),
(48, 1, NULL, 'Added new question', '2021-06-15 06:39:54'),
(49, 1, NULL, 'Added new question', '2021-06-15 06:40:15'),
(50, 1, NULL, 'Added new question', '2021-06-15 06:40:31'),
(51, 1, NULL, 'Added new question', '2021-06-15 06:41:02'),
(52, 1, NULL, 'Added new question', '2021-06-15 06:41:22'),
(53, 1, NULL, 'Added new question', '2021-06-15 06:41:41'),
(54, 1, NULL, 'Added new question', '2021-06-15 06:41:59'),
(55, 1, NULL, 'Updated a category Entrepreneurial Ability', '2021-06-15 06:42:41'),
(56, 1, NULL, 'Deleted a question', '2021-06-15 06:47:38'),
(57, 1, NULL, 'Deleted a question', '2021-06-15 06:47:39'),
(58, 1, NULL, 'Deleted a question', '2021-06-15 06:47:40'),
(59, 1, NULL, 'Deleted a question', '2021-06-15 06:47:43'),
(60, 1, NULL, 'Deleted a question', '2021-06-15 06:47:44'),
(61, 1, NULL, 'Deleted a question', '2021-06-15 06:47:46'),
(62, 1, NULL, 'Deleted a question', '2021-06-15 06:47:47'),
(63, 1, NULL, 'Deleted a question', '2021-06-15 06:47:48'),
(64, 1, NULL, 'Deleted a question', '2021-06-15 06:47:50'),
(65, 1, NULL, 'Deleted a question', '2021-06-15 06:47:55'),
(66, 1, NULL, 'Deleted a question', '2021-06-15 06:47:57'),
(67, 1, NULL, 'Deleted a question', '2021-06-15 06:47:58'),
(68, 1, NULL, 'Deleted a question', '2021-06-15 06:47:59'),
(69, 1, NULL, 'Deleted a question', '2021-06-15 06:48:01'),
(70, 1, NULL, 'Deleted a question', '2021-06-15 06:48:02'),
(71, 1, NULL, 'Deleted a question', '2021-06-15 06:48:05'),
(72, 1, NULL, 'Deleted a question', '2021-06-15 06:48:06'),
(73, 1, NULL, 'Deleted a question', '2021-06-15 06:48:14'),
(74, 1, NULL, 'Deleted a question', '2021-06-15 06:48:16'),
(75, 1, NULL, 'Deleted a question', '2021-06-15 06:48:17'),
(76, 1, NULL, 'Deleted a question', '2021-06-15 06:48:19'),
(77, 1, NULL, 'Deleted a question', '2021-06-15 06:48:24'),
(78, 1, NULL, 'Deleted a sub category QUANTITATIVE RELATIONSHIPS', '2021-06-15 06:49:10'),
(79, 1, NULL, 'Deleted a sub category DATA SUFFICIENCY', '2021-06-15 06:49:35'),
(80, 1, NULL, 'Deleted a question', '2021-06-15 07:44:28'),
(81, 1, NULL, 'Deleted a question', '2021-06-15 07:44:29'),
(82, 1, NULL, 'Deleted a question', '2021-06-15 07:44:32'),
(83, 1, NULL, 'Deleted a question', '2021-06-15 07:44:33'),
(84, 1, NULL, 'Deleted a question', '2021-06-15 07:44:34'),
(85, 1, NULL, 'Updated a category Logical Reasoning', '2021-06-15 07:45:42'),
(86, 1, NULL, 'Added new sub_category Items 1', '2021-06-15 07:46:55'),
(87, 1, NULL, 'Added new question', '2021-06-15 07:47:19'),
(88, 1, NULL, 'Added new sub_category 1 Items', '2021-06-15 07:47:42'),
(89, 1, NULL, 'Added new question', '2021-06-15 07:48:08'),
(90, 1, NULL, 'Added new sub_category 1 Items', '2021-06-15 07:48:22'),
(91, 1, NULL, 'Added new question', '2021-06-15 07:48:41'),
(92, 1, NULL, 'Added new sub_category 1 items', '2021-06-15 07:48:48'),
(93, 1, NULL, 'Updated a sub category 1 items', '2021-06-15 07:48:54'),
(94, 1, NULL, 'Added new question', '2021-06-15 07:49:17'),
(95, 1, NULL, 'Added new sub_category 1 Items', '2021-06-15 07:49:33'),
(96, 1, NULL, 'Added new question', '2021-06-15 07:49:54'),
(97, 1, NULL, 'Deleted a sub category Logic', '2021-06-15 07:50:41'),
(98, 1, NULL, 'Updated a sub category 1 Items', '2021-06-15 07:50:49'),
(99, 1, NULL, 'Added new sub_category 1 Items', '2021-06-15 07:51:26'),
(100, 1, NULL, 'Added new question', '2021-06-15 07:51:53'),
(101, NULL, 1, 'Logged in as User (Aaron R. Roque )', '2021-06-15 07:52:38'),
(102, 1, NULL, 'Added new sub_category Paragraph Meaning', '2021-06-15 07:54:41'),
(103, 1, NULL, 'Added new question', '2021-06-15 07:55:32'),
(104, 1, NULL, 'Added new question', '2021-06-15 07:56:10'),
(105, NULL, 1, 'Logged in as User (Aaron R. Roque )', '2021-06-15 07:56:31'),
(106, 1, NULL, 'Updated a sub category Paragraph Meaning', '2021-06-15 07:57:18'),
(107, 1, NULL, 'Added new question', '2021-06-15 07:57:53'),
(108, 1, NULL, 'Added new question', '2021-06-15 07:58:20'),
(109, 1, NULL, 'Added new question', '2021-06-15 07:58:52'),
(110, 1, NULL, 'Added new question', '2021-06-15 07:59:25'),
(111, 1, NULL, 'Added new question', '2021-06-15 07:59:52'),
(112, 1, NULL, 'Added new question', '2021-06-15 08:00:17'),
(113, 1, NULL, 'Added new question', '2021-06-15 08:00:43'),
(114, 1, NULL, 'Added new question', '2021-06-15 08:01:10'),
(115, 1, NULL, 'Added new question', '2021-06-15 08:01:35'),
(116, 1, NULL, 'Added new question', '2021-06-15 08:02:03'),
(117, 1, NULL, 'Added new question', '2021-06-15 08:02:28'),
(118, 1, NULL, 'Added new question', '2021-06-15 08:03:05'),
(119, 1, NULL, 'Added new question', '2021-06-15 08:03:29'),
(120, 1, NULL, 'Added new question', '2021-06-15 08:04:01'),
(121, 1, NULL, 'Added new question', '2021-06-15 08:04:31'),
(122, 1, NULL, 'Added new question', '2021-06-15 08:05:06'),
(123, 1, NULL, 'Added new question', '2021-06-15 08:05:36'),
(124, 1, NULL, 'Added new question', '2021-06-15 08:06:07'),
(125, 1, NULL, 'Added new question', '2021-06-15 08:06:33'),
(126, 1, NULL, 'Added new question', '2021-06-15 08:08:03'),
(127, 1, NULL, 'Added new question', '2021-06-15 08:08:27'),
(128, 1, NULL, 'Added new question', '2021-06-15 08:08:55'),
(129, 1, NULL, 'Updated a category Logical Reasoning', '2021-06-15 08:09:57'),
(130, 1, NULL, 'Updated a category Logical Reasoning', '2021-06-15 08:12:11'),
(131, 1, NULL, 'Added new question', '2021-06-15 08:13:56'),
(132, 1, NULL, 'Deleted a question', '2021-06-15 08:14:30'),
(133, 1, NULL, 'Deleted a question', '2021-06-15 08:14:31'),
(134, 1, NULL, 'Deleted a question', '2021-06-15 08:14:33'),
(135, 1, NULL, 'Deleted a question', '2021-06-15 08:14:34'),
(136, 1, NULL, 'Added new question', '2021-06-15 08:16:58'),
(137, 1, NULL, 'Added new question', '2021-06-15 08:17:20'),
(138, 1, NULL, 'Added new question', '2021-06-15 08:17:53'),
(139, 1, NULL, 'Added new question', '2021-06-15 08:18:18'),
(140, 1, NULL, 'Added new question', '2021-06-15 08:18:47'),
(141, 1, NULL, 'Added new question', '2021-06-15 08:19:09'),
(142, 1, NULL, 'Added new question', '2021-06-15 08:21:07'),
(143, 1, NULL, 'Added new question', '2021-06-15 08:21:34'),
(144, 1, NULL, 'Added new question', '2021-06-15 08:22:15'),
(145, 1, NULL, 'Updated a category Logical Reasoning', '2021-06-15 08:22:56'),
(146, 1, NULL, 'Deleted a sub category 1 Items', '2021-06-15 08:30:51'),
(147, 1, NULL, 'Deleted a sub category 1 Items', '2021-06-15 08:30:53'),
(148, 1, NULL, 'Deleted a sub category 1 Items', '2021-06-15 08:30:54'),
(149, 1, NULL, 'Deleted a sub category 1 items', '2021-06-15 08:30:55'),
(150, 1, NULL, 'Deleted a sub category 1 Items', '2021-06-15 08:30:57'),
(151, 1, NULL, 'Deleted a sub category 1 Items', '2021-06-15 08:30:58'),
(152, 1, NULL, 'Logged in Admin - Aron', '2021-06-15 08:45:32'),
(153, 1, NULL, 'Deleted a sub category INSPECTION', '2021-06-15 08:47:26'),
(154, 1, NULL, 'Added new sub_category A.	INSPECTION', '2021-06-15 08:48:41'),
(155, 1, NULL, 'Deleted a sub category A.	INSPECTION', '2021-06-15 08:49:00'),
(156, 1, NULL, 'Added new sub_category INSPECTION', '2021-06-15 08:49:57'),
(157, 1, NULL, 'Added new question', '2021-06-15 08:52:02'),
(158, 1, NULL, 'Added new question', '2021-06-15 08:52:15'),
(159, 1, NULL, 'Added new question', '2021-06-15 08:52:38'),
(160, 1, NULL, 'Updated a question', '2021-06-15 08:52:43'),
(161, 1, NULL, 'Added new question', '2021-06-15 08:52:57'),
(162, 1, NULL, 'Added new question', '2021-06-15 08:53:22'),
(163, 1, NULL, 'Added new question', '2021-06-15 08:53:48'),
(164, 1, NULL, 'Added new question', '2021-06-15 08:53:56'),
(165, 1, NULL, 'Added new question', '2021-06-15 08:54:07'),
(166, 1, NULL, 'Added new question', '2021-06-15 08:54:31'),
(167, 1, NULL, 'Added new question', '2021-06-15 08:54:37'),
(168, 1, NULL, 'Added new question', '2021-06-15 08:54:46'),
(169, 1, NULL, 'Added new question', '2021-06-15 08:55:03'),
(170, 1, NULL, 'Added new question', '2021-06-15 08:55:19'),
(171, 1, NULL, 'Added new question', '2021-06-15 08:55:35'),
(172, 1, NULL, 'Added new question', '2021-06-15 08:56:11'),
(173, 1, NULL, 'Added new question', '2021-06-15 08:56:27'),
(174, 1, NULL, 'Added new question', '2021-06-15 08:56:35'),
(175, 1, NULL, 'Added new question', '2021-06-15 08:57:06'),
(176, 1, NULL, 'Added new question', '2021-06-15 08:57:07'),
(177, 1, NULL, 'Added new question', '2021-06-15 08:57:29'),
(178, 1, NULL, 'Added new question', '2021-06-15 08:58:31'),
(179, 1, NULL, 'Added new question', '2021-06-15 08:59:06'),
(180, 1, NULL, 'Added new sub_category PROBLEM SOLVING', '2021-06-15 08:59:34'),
(181, 1, NULL, 'Added new question', '2021-06-15 08:59:54'),
(182, 1, NULL, 'Added new question', '2021-06-15 09:00:07'),
(183, 1, NULL, 'Added new sub_category CODING', '2021-06-15 09:00:38'),
(184, 1, NULL, 'Added new question', '2021-06-15 09:02:02'),
(185, 1, NULL, 'Added new sub_category SPEED AND ACCURACY ', '2021-06-15 09:03:23'),
(186, 1, NULL, 'Added new question', '2021-06-15 09:03:29'),
(187, 1, NULL, 'Added new question', '2021-06-15 09:04:06'),
(188, 1, NULL, 'Added new question', '2021-06-15 09:05:10'),
(189, 1, NULL, 'Added new question', '2021-06-15 09:05:27'),
(190, 1, NULL, 'Added new question', '2021-06-15 09:06:06'),
(191, 1, NULL, 'Added new question', '2021-06-15 09:07:20'),
(192, 1, NULL, 'Added new question', '2021-06-15 09:07:44'),
(193, 1, NULL, 'Updated a question', '2021-06-15 09:07:51'),
(194, 1, NULL, 'Added new question', '2021-06-15 09:08:03'),
(195, 1, NULL, 'Added new question', '2021-06-15 09:08:15'),
(196, 1, NULL, 'Added new question', '2021-06-15 09:08:28'),
(197, 1, NULL, 'Added new question', '2021-06-15 09:08:44'),
(198, 1, NULL, 'Added new question', '2021-06-15 09:08:51'),
(199, 1, NULL, 'Added new question', '2021-06-15 09:08:58'),
(200, 1, NULL, 'Added new question', '2021-06-15 09:09:10'),
(201, 1, NULL, 'Added new question', '2021-06-15 09:09:32'),
(202, 1, NULL, 'Added new question', '2021-06-15 09:09:44'),
(203, 1, NULL, 'Added new question', '2021-06-15 09:09:56'),
(204, 1, NULL, 'Added new question', '2021-06-15 09:10:42'),
(205, 1, NULL, 'Added new question', '2021-06-15 09:10:47'),
(206, 1, NULL, 'Added new question', '2021-06-15 09:11:07'),
(207, 1, NULL, 'Added new question', '2021-06-15 09:11:37'),
(208, 1, NULL, 'Added new question', '2021-06-15 09:12:08'),
(209, 1, NULL, 'Added new question', '2021-06-15 09:12:33'),
(210, 1, NULL, 'Added new question', '2021-06-15 09:12:42'),
(211, 1, NULL, 'Updated a category Mathematical Ability', '2021-06-15 09:12:54'),
(212, 1, NULL, 'Added new question', '2021-06-15 09:13:27'),
(213, 1, NULL, 'Added new question', '2021-06-15 09:14:15'),
(214, 1, NULL, 'Updated an exam (1)', '2021-06-15 09:15:07'),
(215, 1, NULL, 'Updated an exam (1)', '2021-06-15 09:15:12'),
(216, 1, NULL, 'Added new sub_category CLASSIFICATION ', '2021-06-15 09:16:14'),
(217, 1, NULL, 'Updated a sub category CLASSIFICATION ', '2021-06-15 09:18:31'),
(218, 1, NULL, 'Added new question', '2021-06-15 09:19:15'),
(219, 1, NULL, 'Added new question', '2021-06-15 09:19:34'),
(220, 1, NULL, 'Added new question', '2021-06-15 09:20:01'),
(221, 1, NULL, 'Added new question', '2021-06-15 09:20:26'),
(222, 1, NULL, 'Updated a sub category CLASSIFICATION ', '2021-06-15 09:20:54'),
(223, 1, NULL, 'Updated a sub category CLASSIFICATION ', '2021-06-15 09:20:57'),
(224, 1, NULL, 'Updated a sub category SPEED AND ACCURACY ', '2021-06-15 09:21:15'),
(225, 1, NULL, 'Updated a sub category INSPECTION', '2021-06-15 09:21:20'),
(226, 1, NULL, 'Added new question', '2021-06-15 09:21:20'),
(227, 1, NULL, 'Added new question', '2021-06-15 09:21:36'),
(228, 1, NULL, 'Added new question', '2021-06-15 09:22:10'),
(229, 1, NULL, 'Added new question', '2021-06-15 09:22:29'),
(230, 1, NULL, 'Added new sub_category SEQUENCING ', '2021-06-15 09:23:35'),
(231, 1, NULL, 'Added new question', '2021-06-15 09:24:28'),
(232, 1, NULL, 'Added new question', '2021-06-15 09:24:31'),
(233, 1, NULL, 'Added new question', '2021-06-15 09:24:51'),
(234, 1, NULL, 'Added new question', '2021-06-15 09:25:14'),
(235, 1, NULL, 'Added new question', '2021-06-15 09:25:32'),
(236, 1, NULL, 'Added new question', '2021-06-15 09:25:40'),
(237, 1, NULL, 'Added new question', '2021-06-15 09:25:50'),
(238, 1, NULL, 'Updated a question', '2021-06-15 09:25:55'),
(239, 1, NULL, 'Added new question', '2021-06-15 09:26:05'),
(240, 1, NULL, 'Added new question', '2021-06-15 09:26:26'),
(241, 1, NULL, 'Added new question', '2021-06-15 09:26:44'),
(242, 1, NULL, 'Added new question', '2021-06-15 09:26:48'),
(243, 1, NULL, 'Added new question', '2021-06-15 09:26:58'),
(244, 1, NULL, 'Added new question', '2021-06-15 09:27:14'),
(245, 1, NULL, 'Added new question', '2021-06-15 09:27:33'),
(246, 1, NULL, 'Added new question', '2021-06-15 09:27:52'),
(247, 1, NULL, 'Added new question', '2021-06-15 09:28:09'),
(248, 1, NULL, 'Added new question', '2021-06-15 09:28:14'),
(249, 1, NULL, 'Added new question', '2021-06-15 09:28:28'),
(250, 1, NULL, 'Added new sub_category CHADIE LOVE REAN', '2021-06-15 09:28:48'),
(251, 1, NULL, 'Added new question', '2021-06-15 09:29:31'),
(252, 1, NULL, 'Added new question', '2021-06-15 09:29:48'),
(253, 1, NULL, 'Added new question', '2021-06-15 09:29:57'),
(254, 1, NULL, 'Added new question', '2021-06-15 09:30:40'),
(255, 1, NULL, 'Added new question', '2021-06-15 09:30:54'),
(256, 1, NULL, 'Added new question', '2021-06-15 09:31:11'),
(257, 1, NULL, 'Added new question', '2021-06-15 09:31:29'),
(258, 1, NULL, 'Added new question', '2021-06-15 09:31:42'),
(259, 1, NULL, 'Added new question', '2021-06-15 09:31:51'),
(260, 1, NULL, 'Deleted a sub category CHADIE LOVE REAN', '2021-06-15 09:32:13'),
(261, 1, NULL, 'Deleted a sub category ', '2021-06-15 09:32:34'),
(262, 1, NULL, 'Added new question', '2021-06-15 09:33:16'),
(263, 1, NULL, 'Added new question', '2021-06-15 09:33:29'),
(264, 1, NULL, 'Added new question', '2021-06-15 09:33:50'),
(265, 1, NULL, 'Added new question', '2021-06-15 09:34:21'),
(266, 1, NULL, 'Updated a category Verbal Ability', '2021-06-15 09:34:54'),
(267, 1, NULL, 'Added new question', '2021-06-15 09:36:05'),
(268, 1, NULL, 'Added new question', '2021-06-15 09:36:40'),
(269, 1, NULL, 'Added new question', '2021-06-15 09:36:54'),
(270, 1, NULL, 'Added new question', '2021-06-15 09:37:05'),
(271, 1, NULL, 'Updated a question', '2021-06-15 09:37:35'),
(272, 1, NULL, 'Added new question', '2021-06-15 09:37:42'),
(273, 1, NULL, 'Added new question', '2021-06-15 09:37:50'),
(274, 1, NULL, 'Added new question', '2021-06-15 09:38:19'),
(275, 1, NULL, 'Added new question', '2021-06-15 09:38:39'),
(276, 1, NULL, 'Added new question', '2021-06-15 09:38:49'),
(277, 1, NULL, 'Added new question', '2021-06-15 09:39:18'),
(278, 1, NULL, 'Added new question', '2021-06-15 09:39:26'),
(279, 1, NULL, 'Added new question', '2021-06-15 09:39:33'),
(280, 1, NULL, 'Added new question', '2021-06-15 09:39:40'),
(281, 1, NULL, 'Added new question', '2021-06-15 09:39:46'),
(282, 1, NULL, 'Added new question', '2021-06-15 09:40:03'),
(283, 1, NULL, 'Added new question', '2021-06-15 09:40:11'),
(284, 1, NULL, 'Added new question', '2021-06-15 09:40:16'),
(285, 1, NULL, 'Added new question', '2021-06-15 09:40:23'),
(286, 1, NULL, 'Added new question', '2021-06-15 09:40:31'),
(287, 1, NULL, 'Deleted a question', '2021-06-15 09:40:45'),
(288, 1, NULL, 'Logged in Admin - Aron', '2021-06-28 07:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `fc_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_instruct` text NOT NULL,
  `cat_items` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `qs_id`, `fc_id`, `cat_name`, `cat_instruct`, `cat_items`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 'Reading Comprehension', '', 50, '2021-06-28 08:31:11', '2021-06-28 08:31:11'),
(2, 1, 2, 'Clerical Ability', '', 50, '2021-06-28 08:31:13', '2021-06-28 08:31:13'),
(3, 1, 3, 'Mathematical Ability', '', 40, '2021-06-28 08:31:14', '2021-06-28 08:31:14'),
(4, 1, 4, 'Manipulative Skills', '', 50, '2021-06-28 08:31:15', '2021-06-28 08:31:15'),
(5, 1, 5, 'Verbal Ability', '', 40, '2021-06-28 08:31:15', '2021-06-28 08:31:15'),
(6, 1, 6, 'Scientific Ability', '', 50, '2021-06-28 08:31:16', '2021-06-28 08:31:16'),
(7, 1, 7, 'Logical Reasoning', '<p><br />\r\n<strong>Direction :</strong> The questions in this test will determine how well you understand complex material and derive correct conclusions from it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The comclusions to be derived should be based only on the given facts. Thus, answering requires careful focus on what information is given.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In answering the questions, it is important that you accept every given fact as true. Keep in mind, however that you are not being tested on your knowledge of the facts, but rather&nbsp; &nbsp; &nbsp;on your ability to reason on the basis of the given facts.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Afte reading the passage,<strong> Blacken the circle letter </strong>corresponding to your answer for the item.</p>\r\n', 50, '2021-06-28 08:31:17', '2021-06-28 08:31:17'),
(8, 1, 8, 'Non-Verbal Ability', '', 50, '2021-06-28 08:31:18', '2021-06-28 08:31:18'),
(9, 1, 9, 'Entrepreneurial Ability', '<p>This is a test to assess one&#39;s capacity to engage in business undertakings. The test items are numbered consecutively from Ito 60. Do not write anything on the test booklet. Write your answers on the Answer Sheet.</p>\r\n\r\n<p>&nbsp;In some items you will be asked to read a situation first, a problem, a drawing, or an illustration. Study first before you answer the question. Select from the given choices the <strong>ONE</strong> that <strong>MOST CORRECTLY </strong>answers the question. On your Answer Sheet, blacken the circle of the letter that tells your answer for that item.</p>\r\n', 40, '2021-06-28 08:31:20', '2021-06-28 08:31:20');

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
(1, 1, 1, 0, '2021-05-28 07:27:52'),
(2, 1, 2, 0, '2021-05-29 03:18:54'),
(3, 1, 3, 0, '2021-05-29 03:21:04'),
(4, 1, 4, 0, '2021-05-29 03:25:35'),
(5, 1, 5, 0, '2021-05-29 03:37:50'),
(8, 4, 1, 0, '2021-06-15 03:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `exam_guide` text NOT NULL,
  `exam_date_s` varchar(50) NOT NULL,
  `exam_date_e` varchar(50) NOT NULL,
  `exam_status` varchar(10) NOT NULL DEFAULT 'Active',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `qs_id`, `exam_type`, `exam_guide`, `exam_date_s`, `exam_date_e`, `exam_status`, `date_created`, `date_updated`) VALUES
(1, 1, 'Reviewer', '<p><strong>DYCI </strong>- Strand Aptitude Exam for upcoming Junior High Students<br />\r\n&nbsp;</p>\r\n', '05/30/2021 12:00 AM ', ' 06/30/2021 12:00 AM', 'Active', '2021-05-28 07:17:35', '2021-06-28 08:30:51'),
(4, 1, 'NCAE', '<p>DYCI Grade 9 to 11</p>\r\n', '06/14/2021 12:00 AM ', ' 07/30/2021 11:00 PM', 'Active', '2021-06-15 03:28:39', '2021-06-28 08:30:51'),
(8, 1, 'Re-exam', '', '06/15/2021 12:00 AM ', ' 07/15/2021 11:00 PM', 'Active', '2021-06-15 04:57:44', '2021-06-28 08:30:51');

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
(45, 1, 9, 5, 2, '1', 3.33333, 'Below Average', 2, '2021-05-29 03:38:59'),
(54, 4, 1, 1, 17, '1', 85, 'Average', 4, '2021-06-15 03:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `ec_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
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

INSERT INTO `exam_category` (`ec_id`, `qs_id`, `examID`, `catID`, `cHour`, `cMin`, `cat_status`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 1, 1, 0, 'active', '2021-05-28 06:45:47', '2021-06-28 08:30:21'),
(2, 1, 1, 2, 0, 40, 'active', '2021-05-28 06:45:49', '2021-06-28 08:30:21'),
(3, 1, 1, 3, 1, 40, 'active', '2021-05-28 06:45:51', '2021-06-28 08:30:21'),
(4, 1, 1, 4, 0, 30, 'active', '2021-05-28 06:45:52', '2021-06-28 08:30:21'),
(5, 1, 1, 5, 1, 40, 'active', '2021-05-28 06:45:54', '2021-06-28 08:30:21'),
(6, 1, 1, 6, 1, 40, 'active', '2021-05-28 06:45:55', '2021-06-28 08:30:21'),
(7, 1, 1, 7, 0, 30, 'active', '2021-05-28 06:45:57', '2021-06-28 08:30:21'),
(8, 1, 1, 8, 0, 50, 'active', '2021-05-28 06:45:58', '2021-06-28 08:30:21'),
(9, 1, 1, 9, 1, 0, 'active', '2021-05-28 06:46:00', '2021-06-28 08:30:21'),
(28, 1, 4, 1, 1, 30, 'active', '2021-06-15 03:28:58', '2021-06-28 08:30:21'),
(29, 1, 4, 3, 1, 30, 'active', '2021-06-15 03:29:01', '2021-06-28 08:30:21'),
(30, 1, 4, 2, 1, 30, 'active', '2021-06-15 03:29:03', '2021-06-28 08:30:21'),
(31, 1, 4, 5, 1, 30, 'active', '2021-06-15 03:29:05', '2021-06-28 08:30:21'),
(32, 1, 4, 4, 1, 30, 'active', '2021-06-15 03:29:07', '2021-06-28 08:30:21'),
(33, 1, 4, 6, 1, 30, 'active', '2021-06-15 03:29:09', '2021-06-28 08:30:21'),
(34, 1, 4, 7, 1, 30, 'active', '2021-06-15 03:29:11', '2021-06-28 08:30:21'),
(35, 1, 4, 8, 1, 3, 'active', '2021-06-15 03:29:13', '2021-06-28 08:30:21'),
(36, 1, 4, 9, 1, 30, 'active', '2021-06-15 03:29:15', '2021-06-28 08:30:21');

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
  `qs_id` int(11) NOT NULL,
  `q_cat` int(11) NOT NULL,
  `q_scat` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `answerQ` int(5) NOT NULL,
  `q_logs` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `qs_id`, `q_cat`, `q_scat`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answerQ`, `q_logs`, `date_created`, `date_updated`) VALUES
(15, 1, 3, 3, '<p>What is&nbsp;<strong><em>n</em></strong>&nbsp;in 5&sup2;(255+9) - 20 + 5 = n?</p>\r\n', '<p>390</p>\r\n', '<p>541</p>\r\n', '<p>405</p>\r\n', '<p>610</p>\r\n', 2, '', '2021-05-28 03:53:34', '2021-06-28 08:30:06'),
(16, 1, 3, 3, '<p>Evaluate 5[76 + 61] - [23-5]?</p>\r\n', '<p>302</p>\r\n', '<p>667</p>\r\n', '<p>787</p>\r\n', '<p>921</p>\r\n', 1, '', '2021-05-28 03:54:11', '2021-06-28 08:30:06'),
(17, 1, 3, 3, '<p>Which of the following is equal to&nbsp;â…› % in decimal?</p>\r\n', '<p>0.00125</p>\r\n', '<p>.0125</p>\r\n', '<p>1.25</p>\r\n', '<p>12.5</p>\r\n', 1, '', '2021-05-28 03:55:06', '2021-06-28 08:30:06'),
(18, 1, 3, 3, '<p>Which of the following is the same as 627%?</p>\r\n', '<p>0.627</p>\r\n', '<p>6.27</p>\r\n', '<p>62.7</p>\r\n', '<p>627.0</p>\r\n', 1, '', '2021-05-28 03:55:35', '2021-06-28 08:30:06'),
(19, 1, 3, 3, '<p>What percent of P400.00 is P64.00?</p>\r\n', '<p>16%</p>\r\n', '<p>1.6%</p>\r\n', '<p>1.06%</p>\r\n', '<p>.16%</p>\r\n', 1, '', '2021-05-28 03:56:07', '2021-06-28 08:30:06'),
(20, 1, 3, 3, '<p>How much is 72% of 5,790?</p>\r\n', '<p>3570.00</p>\r\n', '<p>3417.00</p>\r\n', '<p>4168.80</p>\r\n', '<p>4618.8</p>\r\n', 1, '', '2021-05-28 03:57:59', '2021-06-28 08:30:06'),
(21, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/1471624399.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:15:09', '2021-06-28 08:30:06'),
(22, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/1341308907.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:15:37', '2021-06-28 08:30:06'),
(23, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/556756931.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:15:57', '2021-06-28 08:30:06'),
(24, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/1407474936.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 3, '', '2021-05-28 04:16:17', '2021-06-28 08:30:06'),
(25, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/833637409.jpg\" style=\"height:161px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>D</p>\r\n', '<p>C</p>\r\n', 1, '', '2021-05-28 04:16:42', '2021-06-28 08:30:06'),
(26, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/937908381.jpg\" style=\"height:172px; width:500px\" /></p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', 1, '', '2021-05-28 04:17:07', '2021-06-28 08:30:06'),
(27, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/1494989893.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', '<p>A</p>\r\n', 1, '', '2021-05-28 04:18:31', '2021-06-28 08:30:06'),
(28, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/113250250.jpg\" style=\"height:209px; width:500px\" /></p>\r\n', '<p>C</p>\r\n', '<p>B</p>\r\n', '<p>D</p>\r\n', '<p>A</p>\r\n', 1, '', '2021-05-28 04:18:54', '2021-06-28 08:30:06'),
(29, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/1676986684.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>D</p>\r\n', '<p>C</p>\r\n', 1, '', '2021-05-28 04:19:13', '2021-06-28 08:30:06'),
(30, 1, 4, 4, '<p><img alt=\"\" src=\"../upload/1185470265.jpg\" style=\"height:160px; width:500px\" /></p>\r\n', '<p>D</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>A</p>\r\n', 1, '', '2021-05-28 04:19:30', '2021-06-28 08:30:06'),
(35, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/576227941.png\" style=\"border-style:solid; border-width:3px; height:481px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:46:30', '2021-06-28 08:30:06'),
(36, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1240597715.png\" style=\"border-style:solid; border-width:3px; height:275px; margin-left:1px; margin-right:1px; width:626px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:47:42', '2021-06-28 08:30:06'),
(37, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1314589143.png\" style=\"border-style:solid; border-width:3px; height:178px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:48:07', '2021-06-28 08:30:06'),
(38, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1291600434.png\" style=\"border-style:solid; border-width:3px; height:279px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:48:31', '2021-06-28 08:30:06'),
(39, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/742779876.png\" style=\"border-style:solid; border-width:3px; height:171px; margin-left:1px; margin-right:1px; width:624px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 04:49:09', '2021-06-28 08:30:06'),
(45, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1509533476.png\" style=\"border-style:solid; border-width:3px; height:147px; margin-left:1px; margin-right:1px; width:373px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/969076434.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1838730678.png\" style=\"height:52px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1928615317.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1471298203.png\" style=\"height:53px; width:57px\" /></p>\r\n', 1, '', '2021-05-28 04:57:56', '2021-06-28 08:30:06'),
(46, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/2025318993.png\" style=\"border-style:solid; border-width:3px; height:149px; margin-left:1px; margin-right:1px; width:370px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/927944518.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1843493977.png\" style=\"height:52px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1853676853.png\" style=\"height:52px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/218218784.png\" style=\"height:54px; width:57px\" /></p>\r\n', 1, '', '2021-05-28 04:59:25', '2021-06-28 08:30:06'),
(47, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1409687048.png\" style=\"border-style:solid; border-width:3px; height:147px; margin-left:1px; margin-right:1px; width:369px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1845480745.png\" style=\"height:53px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1474564031.png\" style=\"height:51px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/640441453.png\" style=\"height:54px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/311141367.png\" style=\"height:54px; width:57px\" /></p>\r\n', 1, '', '2021-05-28 05:00:47', '2021-06-28 08:30:06'),
(48, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/408501122.png\" style=\"border-style:solid; border-width:3px; height:149px; margin-left:1px; margin-right:1px; width:375px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/493285113.png\" style=\"height:51px; width:56px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/365675283.png\" style=\"height:51px; width:73px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1515863601.png\" style=\"height:51px; width:68px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/955188208.png\" style=\"height:51px; width:60px\" /></p>\r\n', 1, '', '2021-05-28 05:04:35', '2021-06-28 08:30:06'),
(49, 1, 9, 9, '<p><img alt=\"\" src=\"../upload/1103705224.png\" style=\"border-style:solid; border-width:3px; height:130px; margin-left:1px; margin-right:1px; width:590px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 05:09:18', '2021-06-28 08:30:06'),
(50, 1, 9, 9, '<p><img alt=\"\" src=\"../upload/302705526.png\" style=\"border-style:solid; border-width:3px; height:271px; margin-left:1px; margin-right:1px; width:552px\" /></p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 1, '', '2021-05-28 05:09:33', '2021-06-28 08:30:06'),
(51, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/164352235.png\" style=\"border-style:solid; border-width:3px; height:144px; margin-left:1px; margin-right:1px; width:367px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/120469759.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/677713896.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1523123087.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1692057013.png\" style=\"height:58px; width:58px\" /></p>\r\n', 2, '', '2021-05-31 10:57:39', '2021-06-28 08:30:06'),
(52, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1107027285.png\" style=\"height:146px; width:363px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1981707974.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1277616202.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/409615966.png\" style=\"height:50px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1748522448.png\" style=\"height:51px; width:58px\" /></p>\r\n', 3, '', '2021-05-31 10:58:32', '2021-06-28 08:30:06'),
(53, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1957082101.png\" style=\"height:144px; width:361px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1457088455.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1413622999.png\" style=\"height:50px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1380842816.png\" style=\"height:50px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1181315542.png\" style=\"height:51px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 10:59:28', '2021-06-28 08:30:06'),
(54, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1617571698.png\" style=\"height:143px; width:362px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2025258271.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/677695791.png\" style=\"height:53px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/269531910.png\" style=\"height:52px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/761125284.png\" style=\"height:55px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:00:12', '2021-06-28 08:30:06'),
(55, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/397011438.png\" style=\"height:137px; width:360px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1730542683.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1458227896.png\" style=\"height:51px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1782010714.png\" style=\"height:53px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1986426337.png\" style=\"height:53px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:01:01', '2021-06-28 08:30:06'),
(56, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/124430575.png\" style=\"height:136px; width:360px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/240660311.png\" style=\"height:52px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/176885928.png\" style=\"height:51px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/390542731.png\" style=\"height:52px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/80503891.png\" style=\"height:54px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:01:50', '2021-06-28 08:30:06'),
(57, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/142668427.png\" style=\"height:135px; width:356px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/387095363.png\" style=\"height:51px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2099031728.png\" style=\"height:53px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1004565880.png\" style=\"height:54px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1065251452.png\" style=\"height:53px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:02:53', '2021-06-28 08:30:06'),
(58, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1560206398.png\" style=\"height:134px; width:353px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/453998781.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/85907475.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1111552743.png\" style=\"height:50px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/36871648.png\" style=\"height:50px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:03:41', '2021-06-28 08:30:06'),
(59, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/384448120.png\" style=\"height:131px; width:352px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1027665321.png\" style=\"height:52px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1712900557.png\" style=\"height:52px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/136926145.png\" style=\"height:53px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1036365535.png\" style=\"height:52px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:04:31', '2021-06-28 08:30:06'),
(60, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/2091407286.png\" style=\"height:132px; width:350px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1161630846.png\" style=\"height:52px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/54397074.png\" style=\"height:52px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1318436879.png\" style=\"height:54px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1296304747.png\" style=\"height:54px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:05:27', '2021-06-28 08:30:06'),
(61, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1222691056.png\" style=\"height:130px; width:349px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1369528362.png\" style=\"height:55px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1170925691.png\" style=\"height:54px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/785403111.png\" style=\"height:55px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1658076495.png\" style=\"height:56px; width:50px\" /></p>\r\n', 1, '', '2021-05-31 11:06:13', '2021-06-28 08:30:06'),
(62, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/902637566.png\" style=\"height:129px; width:348px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1397905822.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/601438071.png\" style=\"height:56px; width:54px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1663691759.png\" style=\"height:56px; width:52px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1491086704.png\" style=\"height:56px; width:54px\" /></p>\r\n', 1, '', '2021-05-31 11:14:55', '2021-06-28 08:30:06'),
(63, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/165456405.png\" style=\"height:128px; width:345px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/855644539.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/897555147.png\" style=\"height:56px; width:55px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/603033091.png\" style=\"height:56px; width:55px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1622704310.png\" style=\"height:56px; width:59px\" /></p>\r\n', 1, '', '2021-05-31 11:16:55', '2021-06-28 08:30:06'),
(64, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/537860948.png\" style=\"height:126px; width:349px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/312710112.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1698308154.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2106082545.png\" style=\"height:56px; width:54px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/957409325.png\" style=\"height:56px; width:56px\" /></p>\r\n', 1, '', '2021-05-31 11:17:42', '2021-06-28 08:30:06'),
(65, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/365536532.png\" style=\"height:122px; width:346px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1770550892.png\" style=\"height:56px; width:61px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1676803868.png\" style=\"height:56px; width:62px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/379578641.png\" style=\"height:56px; width:60px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1724514026.png\" style=\"height:56px; width:62px\" /></p>\r\n', 1, '', '2021-05-31 11:19:27', '2021-06-28 08:30:06'),
(66, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/435953513.png\" style=\"height:120px; width:344px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/898871025.png\" style=\"height:56px; width:60px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1040514002.png\" style=\"height:56px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/282466860.png\" style=\"height:56px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/816425395.png\" style=\"height:56px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:20:32', '2021-06-28 08:30:06'),
(67, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1047373624.png\" style=\"height:116px; width:344px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1480447329.png\" style=\"height:56px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1478473645.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1123200693.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1017680909.png\" style=\"height:56px; width:59px\" /></p>\r\n', 1, '', '2021-05-31 11:22:57', '2021-06-28 08:30:06'),
(68, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1757640484.png\" style=\"height:118px; width:343px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2115570698.png\" style=\"height:56px; width:56px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1540664868.png\" style=\"height:56px; width:54px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/842294575.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/21619094.png\" style=\"height:56px; width:60px\" /></p>\r\n', 1, '', '2021-05-31 11:24:02', '2021-06-28 08:30:06'),
(69, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/875972011.png\" style=\"height:118px; width:346px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/795407680.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/61141295.png\" style=\"height:56px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/880502710.png\" style=\"height:56px; width:60px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/801216815.png\" style=\"height:56px; width:58px\" /></p>\r\n', 1, '', '2021-05-31 11:24:52', '2021-06-28 08:30:06'),
(70, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/474202078.png\" style=\"height:117px; width:343px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1580663153.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/492620910.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1210310397.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/799401151.png\" style=\"height:56px; width:57px\" /></p>\r\n', 1, '', '2021-05-31 11:25:37', '2021-06-28 08:30:06'),
(71, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1557435693.png\" style=\"height:115px; width:341px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1727374580.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/844212096.png\" style=\"height:56px; width:56px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/582205960.png\" style=\"height:56px; width:57px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1598163982.png\" style=\"height:56px; width:55px\" /></p>\r\n', 1, '', '2021-05-31 11:26:21', '2021-06-28 08:30:06'),
(72, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1276127354.png\" style=\"height:114px; width:341px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/755528576.png\" style=\"height:56px; width:60px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/192811815.png\" style=\"height:56px; width:58px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1392108717.png\" style=\"height:56px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1919349111.png\" style=\"height:56px; width:59px\" /></p>\r\n', 1, '', '2021-06-03 02:20:15', '2021-06-28 08:30:06'),
(73, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/753316957.png\" style=\"height:114px; width:340px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/883376483.png\" style=\"height:56px; width:61px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/76136327.png\" style=\"height:56px; width:60px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/318584982.png\" style=\"height:56px; width:60px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/980310155.png\" style=\"height:56px; width:58px\" /></p>\r\n', 1, '', '2021-06-03 02:21:02', '2021-06-28 08:30:06'),
(74, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/694077989.png\" style=\"height:111px; width:340px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/541315777.png\" style=\"height:56px; width:61px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1040558813.png\" style=\"height:56px; width:61px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1105508642.png\" style=\"height:59px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/631607026.png\" style=\"height:56px; width:61px\" /></p>\r\n', 1, '', '2021-06-03 02:22:52', '2021-06-28 08:30:06'),
(75, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/728819533.png\" style=\"height:112px; width:337px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1821033589.png\" style=\"height:60px; width:61px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1290347834.png\" style=\"height:61px; width:59px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/326823409.png\" style=\"height:61px; width:62px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/767329894.png\" style=\"height:61px; width:62px\" /></p>\r\n', 1, '', '2021-06-03 02:24:14', '2021-06-28 08:30:06'),
(76, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/551896779.png\" style=\"height:113px; width:337px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1679226218.png\" style=\"height:57px; width:63px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1702150672.png\" style=\"height:58px; width:61px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1546114403.png\" style=\"height:56px; width:61px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/54545856.png\" style=\"height:57px; width:62px\" /></p>\r\n', 1, '', '2021-06-03 02:25:34', '2021-06-28 08:30:06'),
(77, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1914023435.png\" style=\"height:117px; width:335px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1648582693.png\" style=\"height:58px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/898974104.png\" style=\"height:58px; width:62px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/768902789.png\" style=\"height:60px; width:63px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2061795658.png\" style=\"height:60px; width:63px\" /></p>\r\n', 1, '', '2021-06-03 02:26:26', '2021-06-28 08:30:06'),
(78, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/221906469.png\" style=\"height:113px; width:335px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/538184987.png\" style=\"height:62px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/237622539.png\" style=\"height:61px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1615079732.png\" style=\"height:64px; width:62px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/557086825.png\" style=\"height:65px; width:60px\" /></p>\r\n', 1, '', '2021-06-03 02:27:15', '2021-06-28 08:30:06'),
(79, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1150765085.png\" style=\"height:111px; width:339px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1713421177.png\" style=\"height:64px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1354601266.png\" style=\"height:63px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/656366907.png\" style=\"height:66px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1974799700.png\" style=\"height:65px; width:66px\" /></p>\r\n', 1, '', '2021-06-03 02:28:01', '2021-06-28 08:30:06'),
(80, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1898639139.png\" style=\"height:113px; width:340px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1883077869.png\" style=\"height:64px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/303937194.png\" style=\"height:64px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/912182544.png\" style=\"height:67px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2112240442.png\" style=\"height:63px; width:65px\" /></p>\r\n', 1, '', '2021-06-03 02:33:23', '2021-06-28 08:30:06'),
(81, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/278085419.png\" style=\"height:113px; width:340px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1273112005.png\" style=\"height:63px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1125800634.png\" style=\"height:62px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1245439199.png\" style=\"height:62px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/691310649.png\" style=\"height:63px; width:65px\" /></p>\r\n', 1, '', '2021-06-03 02:34:05', '2021-06-28 08:30:06'),
(82, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1672679667.png\" style=\"height:115px; width:338px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1838603548.png\" style=\"height:62px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/271346976.png\" style=\"height:62px; width:68px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/458425632.png\" style=\"height:62px; width:63px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1849268525.png\" style=\"height:61px; width:65px\" /></p>\r\n', 1, '', '2021-06-03 02:34:56', '2021-06-28 08:30:06'),
(83, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1309266773.png\" style=\"height:116px; width:336px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/451722473.png\" style=\"height:62px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1993153797.png\" style=\"height:62px; width:68px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1513028680.png\" style=\"height:65px; width:72px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1415381321.png\" style=\"height:65px; width:68px\" /></p>\r\n', 1, '', '2021-06-03 02:37:31', '2021-06-28 08:30:06'),
(84, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1211321973.png\" style=\"height:117px; width:333px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/308750796.png\" style=\"height:61px; width:68px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1643846285.png\" style=\"height:61px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1068553237.png\" style=\"height:62px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1311838884.png\" style=\"height:61px; width:64px\" /></p>\r\n', 1, '', '2021-06-03 02:38:14', '2021-06-28 08:30:06'),
(85, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/2122088548.png\" style=\"height:119px; width:331px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/116803472.png\" style=\"height:58px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1042963526.png\" style=\"height:58px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2011377739.png\" style=\"height:58px; width:62px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/521227103.png\" style=\"height:57px; width:61px\" /></p>\r\n', 1, '', '2021-06-03 02:39:00', '2021-06-28 08:30:06'),
(86, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1500218615.png\" style=\"height:124px; width:331px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1525281163.png\" style=\"height:59px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/663210585.png\" style=\"height:58px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/919750749.png\" style=\"height:58px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2039425916.png\" style=\"height:60px; width:63px\" /></p>\r\n', 1, '', '2021-06-03 02:39:42', '2021-06-28 08:30:06'),
(87, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/686085719.png\" style=\"height:124px; width:330px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/22361523.png\" style=\"height:60px; width:67px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1092089002.png\" style=\"height:61px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1230192839.png\" style=\"height:60px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/901607667.png\" style=\"height:61px; width:66px\" /></p>\r\n', 1, '', '2021-06-03 02:40:24', '2021-06-28 08:30:06'),
(88, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/632555021.png\" style=\"height:120px; width:331px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/182493219.png\" style=\"height:63px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1845109669.png\" style=\"height:61px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/420077715.png\" style=\"height:62px; width:63px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/925137297.png\" style=\"height:62px; width:65px\" /></p>\r\n', 1, '', '2021-06-03 02:45:20', '2021-06-28 08:30:06'),
(89, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/300784788.png\" style=\"height:118px; width:336px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/412150582.png\" style=\"height:64px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1473226616.png\" style=\"height:64px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1617651546.png\" style=\"height:63px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/196076301.png\" style=\"height:63px; width:67px\" /></p>\r\n', 1, '', '2021-06-03 02:46:02', '2021-06-28 08:30:06'),
(90, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1734133376.png\" style=\"height:116px; width:338px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1055508656.png\" style=\"height:65px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1791015531.png\" style=\"height:65px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/92525371.png\" style=\"height:64px; width:67px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/306867381.png\" style=\"height:62px; width:65px\" /></p>\r\n', 1, '', '2021-06-03 02:46:46', '2021-06-28 08:30:06'),
(91, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/360679292.png\" style=\"height:118px; width:337px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/351794507.png\" style=\"height:66px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1889434056.png\" style=\"height:65px; width:63px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2051498532.png\" style=\"height:63px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1887999886.png\" style=\"height:64px; width:63px\" /></p>\r\n', 1, '', '2021-06-03 02:47:24', '2021-06-28 08:30:06'),
(92, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/1089950608.png\" style=\"height:120px; width:338px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/792346792.png\" style=\"height:66px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/443656743.png\" style=\"height:65px; width:69px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1248463223.png\" style=\"height:65px; width:66px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/106440884.png\" style=\"height:67px; width:67px\" /></p>\r\n', 1, '', '2021-06-03 02:49:28', '2021-06-28 08:30:06'),
(93, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/223971770.png\" style=\"height:121px; width:335px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1730085445.png\" style=\"height:66px; width:67px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/460406821.png\" style=\"height:66px; width:69px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1617489229.png\" style=\"height:69px; width:72px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1026123536.png\" style=\"height:68px; width:67px\" /></p>\r\n', 1, '', '2021-06-03 02:50:06', '2021-06-28 08:30:06'),
(94, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/876655194.png\" style=\"height:124px; width:333px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/403616674.png\" style=\"height:64px; width:70px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/355084519.png\" style=\"height:64px; width:70px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/2089051590.png\" style=\"height:66px; width:69px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1493005801.png\" style=\"height:69px; width:69px\" /></p>\r\n', 1, '', '2021-06-03 02:50:49', '2021-06-28 08:30:06'),
(95, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/2106980871.png\" style=\"height:126px; width:334px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/451015548.png\" style=\"height:61px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1560320874.png\" style=\"height:60px; width:67px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/533486887.png\" style=\"height:60px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1373613463.png\" style=\"height:60px; width:65px\" /></p>\r\n', 1, '', '2021-06-03 02:51:32', '2021-06-28 08:30:06'),
(96, 1, 8, 8, '<p><img alt=\"\" src=\"../upload/2080067457.png\" style=\"height:126px; width:338px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/958671517.png\" style=\"height:58px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1380629968.png\" style=\"height:60px; width:64px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/755223651.png\" style=\"height:60px; width:65px\" /></p>\r\n', '<p><img alt=\"\" src=\"../upload/1506367807.png\" style=\"height:62px; width:66px\" /></p>\r\n', 1, '', '2021-06-03 02:52:23', '2021-06-28 08:30:06'),
(97, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/650974048.png\" style=\"border-style:solid; border-width:3px; height:173px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:37:15', '2021-06-28 08:30:06'),
(98, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1990060620.png\" style=\"border-style:solid; border-width:3px; height:290px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:38:01', '2021-06-28 08:30:06'),
(99, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1302885123.png\" style=\"border-style:solid; border-width:3px; height:368px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:38:17', '2021-06-28 08:30:06'),
(100, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1918431201.png\" style=\"border-style:solid; border-width:3px; height:180px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:38:31', '2021-06-28 08:30:06'),
(101, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1925903144.png\" style=\"border-style:solid; border-width:3px; height:198px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:38:50', '2021-06-28 08:30:06'),
(102, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1760025747.png\" style=\"border-style:solid; border-width:3px; height:119px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:39:21', '2021-06-28 08:30:06'),
(103, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/2088346655.png\" style=\"border-style:solid; border-width:3px; height:112px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:39:39', '2021-06-28 08:30:06'),
(104, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/869530171.png\" style=\"border-style:solid; border-width:3px; height:217px; margin:1px; width:583px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:39:54', '2021-06-28 08:30:06'),
(105, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1467799976.png\" style=\"border-style:solid; border-width:3px; height:271px; margin:1px; width:590px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:40:09', '2021-06-28 08:30:06'),
(106, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1348490665.png\" style=\"border-style:solid; border-width:3px; height:190px; margin:1px; width:593px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:40:34', '2021-06-28 08:30:06'),
(107, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/296365670.png\" style=\"border-style:solid; border-width:3px; height:353px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:40:49', '2021-06-28 08:30:06'),
(108, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/764088364.png\" style=\"border-style:solid; border-width:3px; height:386px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:41:10', '2021-06-28 08:30:06'),
(109, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/760332293.png\" style=\"border-style:solid; border-width:3px; height:177px; margin:1px; width:594px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:42:17', '2021-06-28 08:30:06'),
(110, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/971732133.png\" style=\"border-style:solid; border-width:3px; height:156px; margin:1px; width:581px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:42:32', '2021-06-28 08:30:06'),
(111, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1174874033.png\" style=\"border-style:solid; border-width:3px; height:144px; margin:1px; width:588px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 07:42:51', '2021-06-28 08:30:06'),
(112, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1418652500.png\" style=\"border-style:solid; border-width:3px; height:223px; margin:1px; width:595px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:10:02', '2021-06-28 08:30:06'),
(113, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1960925680.png\" style=\"border-style:solid; border-width:3px; height:237px; margin:1px; width:588px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:10:21', '2021-06-28 08:30:06'),
(114, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1662155663.png\" style=\"height:252px; width:593px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:10:33', '2021-06-28 08:30:06'),
(115, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1020338916.png\" style=\"border-style:solid; border-width:3px; height:288px; margin:1px; width:588px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:10:53', '2021-06-28 08:30:06'),
(116, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1545341420.png\" style=\"border-style:solid; border-width:3px; height:144px; margin:1px; width:593px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:11:09', '2021-06-28 08:30:06'),
(117, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1596838561.png\" style=\"border-style:solid; border-width:3px; height:112px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:11:25', '2021-06-28 08:30:06'),
(118, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1219882664.png\" style=\"border-style:solid; border-width:3px; height:290px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:11:44', '2021-06-28 08:30:06'),
(119, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/911603990.png\" style=\"border-style:solid; border-width:3px; height:385px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:12:02', '2021-06-28 08:30:06'),
(120, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1838147480.png\" style=\"border-style:solid; border-width:3px; height:386px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:12:22', '2021-06-28 08:30:06'),
(121, 1, 6, 6, '<p><img alt=\"\" src=\"../upload/1644607029.png\" style=\"border-style:solid; border-width:3px; height:119px; margin:1px; width:624px\" /></p>\r\n', '', '', '', '', 1, '', '2021-06-10 08:14:12', '2021-06-28 08:30:06'),
(169, 1, 1, 10, '<p>Which&nbsp;sentence&nbsp;shows&nbsp;cause&nbsp;and&nbsp;effect&nbsp;relationships?</p>\r\n', '<p>There would be fewer hungry and unhappy people</p>\r\n', '<p>If&nbsp;people&nbsp;would&nbsp;only&nbsp;offer&nbsp;a&nbsp;helping&nbsp;hand&nbsp;to&nbsp;those&nbsp;who&nbsp;are&nbsp;needy&nbsp;rather&nbsp;than&nbsp;depriving&nbsp;them&nbsp;of&nbsp;help.</p>\r\n', '<p>If&nbsp;people&nbsp;would&nbsp;be&nbsp;more&nbsp;selfless,&nbsp;this&nbsp;world&nbsp;would&nbsp;be&nbsp;a&nbsp;much&nbsp;better&nbsp;place.</p>\r\n', '<p>This&nbsp;world&nbsp;would&nbsp;be&nbsp;less&nbsp;chaotic.</p>\r\n', 1, '', '2021-06-10 11:06:49', '2021-06-28 08:30:06'),
(170, 1, 1, 10, '<p>What is the main idea of the selection?</p>\r\n', '<p>People in this world are selfless.</p>\r\n', '<p>If only people could share what they have.</p>\r\n', '<p>This world is unfair for there is no compassion.</p>\r\n', '<p>People in this world are focused on their own accounts.</p>\r\n', 1, '', '2021-06-10 11:10:02', '2021-06-28 08:30:06'),
(171, 1, 1, 10, '<p>What is the emotion of the speaker in this selection?</p>\r\n', '<p>The speaker is hurt by other&#39;s selfishness</p>\r\n', '<p>The speaker is angry about people&#39;s attitudes towards others.</p>\r\n', '<p>The speaker is guilty of all his misdeeds to other people.</p>\r\n', '<p>The speaker is sad about society&#39;s condition because of selfishness.</p>\r\n', 1, '', '2021-06-10 11:13:32', '2021-06-28 08:30:06'),
(172, 1, 1, 10, '<p>What is the speaker trying to say in repeating this line? <strong><em>&quot;If people could only be ... &quot;</em></strong></p>\r\n', '<p>It means that people nowadays are self-centered</p>\r\n', '<p>It means that poverty forced us to be selfish</p>\r\n', '<p>It means people nowadays forgot the value of peace</p>\r\n', '<p>Modernization change our way of living</p>\r\n', 1, '', '2021-06-10 11:15:17', '2021-06-28 08:30:06'),
(173, 1, 1, 11, '<p>It may be inferred from the selection that one&#39;s __________ food intake should total 1200 calories</p>\r\n', '<p>dietary</p>\r\n', '<p>daily</p>\r\n', '<p>weekly</p>\r\n', '<p>mealtime</p>\r\n', 1, '', '2021-06-10 11:21:05', '2021-06-28 08:30:06'),
(174, 1, 1, 11, '<p>The<em> &quot;Pack of Diets&quot;</em> is an innovative method of</p>\r\n', '<p>relieving boredom</p>\r\n', '<p>enriching the menu.</p>\r\n', '<p>checking obesity</p>\r\n', '<p>regulating one&#39;s diet</p>\r\n', 1, '', '2021-06-10 11:27:52', '2021-06-28 08:30:06'),
(175, 1, 1, 11, '<p>The selection would most attract the interest of</p>\r\n', '<p>chefs.</p>\r\n', '<p>physicians</p>\r\n', '<p>dieters</p>\r\n', '<p>nutritionist</p>\r\n', 1, '', '2021-06-10 11:28:41', '2021-06-28 08:30:06'),
(176, 1, 1, 13, '<p>When one realize his &quot;nothingness&quot; before the eyes of his creator, he becomes ...</p>\r\n', '<p>humble</p>\r\n', '<p>insecure</p>\r\n', '<p>insensible</p>\r\n', '<p>humiliated</p>\r\n', 1, '', '2021-06-10 14:53:53', '2021-06-28 08:30:06'),
(177, 1, 1, 10, '<p>What is the cause of all problems in the world?</p>\r\n', '<p>We are all victims of a selfish world</p>\r\n', '<p>We are more concerned about our own family</p>\r\n', '<p>There is no compassion in all walks of life</p>\r\n', '<p>There is more technology that changed us</p>\r\n', 1, '', '2021-06-10 15:04:47', '2021-06-28 08:30:06'),
(178, 1, 1, 13, '<p>What title could be fitting for this selection?</p>\r\n', '<p>The Savior</p>\r\n', '<p>A Famous Doctor</p>\r\n', '<p>A Great Discovery</p>\r\n', '<p>Painless Surgery</p>\r\n', 1, '', '2021-06-10 15:06:02', '2021-06-28 08:30:06'),
(179, 1, 1, 13, '<p>Chloroform is an element used&nbsp;</p>\r\n', '<p>in bleaching</p>\r\n', '<p>as insecticide</p>\r\n', '<p>as a strong oxidizing agent</p>\r\n', '<p>as general anesthetic substance</p>\r\n', 1, '', '2021-06-10 15:07:05', '2021-06-28 08:30:06'),
(180, 1, 1, 14, '<p>What is the general idea conveyed in the selection?</p>\r\n', '<p>Distractions work against good listening</p>\r\n', '<p>Facts and feelings are important to listen to.</p>\r\n', '<p>One acquires his feelings through sensitivity</p>\r\n', '<p>Alertness and sensitivity are vital to good listening</p>\r\n', 1, '', '2021-06-11 02:01:47', '2021-06-28 08:30:06'),
(181, 1, 1, 14, '<p>According to the selection one could keep his mind from wandering by</p>\r\n', '<p>Responding to both facts and feelings</p>\r\n', '<p>lettings others know your feelings</p>\r\n', '<p>listening to other people talk</p>\r\n', '<p>being sensitive and alert</p>\r\n', 1, '', '2021-06-11 02:07:31', '2021-06-28 08:30:06'),
(182, 1, 1, 14, '<p>To what particular sense does this selection refer to?</p>\r\n', '<p>Sight</p>\r\n', '<p>Taste</p>\r\n', '<p>Touch</p>\r\n', '<p>Hearing</p>\r\n', 1, '', '2021-06-11 02:08:02', '2021-06-28 08:30:06'),
(183, 1, 1, 15, '<p>What is the selection&#39;s main idea?</p>\r\n', '<p>Cycling is mostly done during summer.</p>\r\n', '<p>Riding a bicycle is a good exercise for the body.</p>\r\n', '<p>Cycling is one of the most popular sports in our country.</p>\r\n', '<p>Riding a bicycle is a good solution to the energy crisis.</p>\r\n', 1, '', '2021-06-11 02:10:23', '2021-06-28 08:30:06'),
(184, 1, 1, 15, '<p>What is meant by the line&nbsp;<em>&quot;In heavy traffic, a cyclist should walk his bicycle on the sidewalk&quot;</em></p>\r\n', '<p>The cyclist should walk alongside his bicycle during heavy traffic</p>\r\n', '<p>The cyclist should simply walk when there is heavy traffic</p>\r\n', '<p>The cyclist should leave his bicycle on the sidewalk during heavy traffic</p>\r\n', '<p>The cyclist should carry his bicycle and walk when stuck in heavy traffic</p>\r\n', 1, '', '2021-06-11 02:12:42', '2021-06-28 08:30:06'),
(185, 1, 1, 15, '<p>What does the author recommend to help in the energy crisis?</p>\r\n', '<p>Taking a taxicab</p>\r\n', '<p>Riding a jeepney</p>\r\n', '<p>Riding a bicycle</p>\r\n', '<p>Talking a walk</p>\r\n', 1, '', '2021-06-11 02:13:40', '2021-06-28 08:30:06'),
(186, 1, 1, 16, '<p>The selections tell about the&nbsp;</p>\r\n', '<p>Producers of food</p>\r\n', '<p>Importance of the ecosystem</p>\r\n', '<p>community of living things</p>\r\n', '<p>composition of the ecosystem</p>\r\n', 3, '', '2021-06-11 02:18:20', '2021-06-28 08:30:06'),
(187, 1, 1, 16, '<p>The trees in the forest are classified as</p>\r\n', '<p>Hervibores</p>\r\n', '<p>Producers</p>\r\n', '<p>Decomposers</p>\r\n', '<p>Consumers</p>\r\n', 2, '', '2021-06-11 02:18:54', '2021-06-28 08:30:06'),
(188, 1, 1, 16, '<p>What general statement you can make from the selection?</p>\r\n', '<p>Plants and animals need each other</p>\r\n', '<p>Predators are animals that feed on other animals</p>\r\n', '<p>Living things can exist by themselves</p>\r\n', '<p>Decomposers feed on dead bodies of other organisms</p>\r\n', 4, '', '2021-06-11 02:20:12', '2021-06-28 08:30:06'),
(189, 1, 5, 5, '<p><strong><em>Corpulent</em></strong> Child</p>\r\n', '<p>lean</p>\r\n', '<p>gaunt</p>\r\n', '<p>emaciated</p>\r\n', '<p>obese</p>\r\n', 1, '', '2021-06-11 02:37:59', '2021-06-28 08:30:06'),
(190, 1, 5, 5, '<p><strong><em>Brief</em></strong>&nbsp;History</p>\r\n', '<p>limited</p>\r\n', '<p>small</p>\r\n', '<p>little</p>\r\n', '<p>short</p>\r\n', 4, '', '2021-06-11 02:38:42', '2021-06-28 08:30:06'),
(191, 1, 5, 5, '<p><em><strong>Embezzle </strong></em>attitude</p>\r\n', '<p>misappropriate</p>\r\n', '<p>balance</p>\r\n', '<p>remunerate</p>\r\n', '<p>clear</p>\r\n', 1, '', '2021-06-11 02:39:37', '2021-06-28 08:30:06'),
(192, 1, 5, 5, '<p><em><strong>Vent </strong></em>door</p>\r\n', '<p>opening</p>\r\n', '<p>stodge</p>\r\n', '<p>end</p>\r\n', '<p>past tense of &quot;go&quot;</p>\r\n', 2, '', '2021-06-11 02:40:13', '2021-06-28 08:30:06'),
(193, 1, 5, 5, '<p><em><strong>August&nbsp;</strong></em>movie</p>\r\n', '<p>common</p>\r\n', '<p>dignified</p>\r\n', '<p>petty</p>\r\n', '<p>ridiculous</p>\r\n', 4, '', '2021-06-11 02:41:13', '2021-06-28 08:30:06'),
(194, 1, 5, 5, '<p><em><strong>Canny</strong></em> model</p>\r\n', '<p>obstinate</p>\r\n', '<p>clever</p>\r\n', '<p>stout</p>\r\n', '<p>handsome</p>\r\n', 3, '', '2021-06-11 02:42:03', '2021-06-28 08:30:06'),
(195, 1, 5, 5, '<p><em><strong>Alert</strong></em> police</p>\r\n', '<p>energetic</p>\r\n', '<p>observant</p>\r\n', '<p>watchful</p>\r\n', '<p>intelligent&nbsp;</p>\r\n', 3, '', '2021-06-11 02:42:56', '2021-06-28 08:30:06'),
(196, 1, 5, 5, '<p><em><strong>Eccentric&nbsp;</strong></em>habits</p>\r\n', '<p>normal</p>\r\n', '<p>messy</p>\r\n', '<p>done</p>\r\n', '<p>strange</p>\r\n', 4, '', '2021-06-11 02:43:28', '2021-06-28 08:30:06'),
(197, 1, 5, 17, '<p>_________ : trail :: grain : grail</p>\r\n', '<p>train</p>\r\n', '<p>path</p>\r\n', '<p>wheat</p>\r\n', '<p>holy</p>\r\n', 1, '', '2021-06-11 02:44:33', '2021-06-28 08:30:06'),
(198, 1, 5, 17, '<p>particular : fussy ::&nbsp;_________ : subservient</p>\r\n', '<p>meek</p>\r\n', '<p>uptight</p>\r\n', '<p>above</p>\r\n', '<p>cranky</p>\r\n', 1, '', '2021-06-11 02:45:25', '2021-06-28 08:30:06'),
(199, 1, 5, 17, '<p>_________ : horse :: board : train</p>\r\n', '<p>stable</p>\r\n', '<p>ride</p>\r\n', '<p>mount</p>\r\n', '<p>shoe</p>\r\n', 1, '', '2021-06-11 02:45:58', '2021-06-28 08:30:06'),
(200, 1, 5, 17, '<p>tureen :&nbsp;_________ :: goblet : wine</p>\r\n', '<p>napkin</p>\r\n', '<p>soup</p>\r\n', '<p>spoon</p>\r\n', '<p>pilsner</p>\r\n', 2, '', '2021-06-11 02:46:33', '2021-06-28 08:30:06'),
(201, 1, 5, 17, '<p>fetish : fixation :: slight :&nbsp;_________</p>\r\n', '<p>flirt</p>\r\n', '<p>confuse</p>\r\n', '<p>sloth</p>\r\n', '<p>insult</p>\r\n', 3, '', '2021-06-11 02:47:20', '2021-06-28 08:30:06'),
(202, 1, 5, 17, '<p>junket :&nbsp;_________ :: junk : trash</p>\r\n', '<p>tension</p>\r\n', '<p>soiree</p>\r\n', '<p>sari</p>\r\n', '<p>eulogy</p>\r\n', 1, '', '2021-06-11 02:47:54', '2021-06-28 08:30:06'),
(203, 1, 5, 17, '<p>pill : bore :: core :&nbsp;_________</p>\r\n', '<p>placebo</p>\r\n', '<p>bar</p>\r\n', '<p>mug</p>\r\n', '<p>center</p>\r\n', 4, '', '2021-06-11 02:48:42', '2021-06-28 08:30:06'),
(204, 1, 5, 17, '<p>_________ : zenith :: fear : composure</p>\r\n', '<p>heaven</p>\r\n', '<p>apex</p>\r\n', '<p>nadir</p>\r\n', '<p>heights</p>\r\n', 2, '', '2021-06-11 02:49:27', '2021-06-28 08:30:06');
INSERT INTO `questions` (`q_id`, `qs_id`, `q_cat`, `q_scat`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answerQ`, `q_logs`, `date_created`, `date_updated`) VALUES
(205, 1, 7, 29, '<p>The human skin is a marvelous part of the body with multifarious functions. It serves as the showcase of what goes on inside the body. It acts as the protector of the internal organs and the receptors of the external stimuli. It is the largest sensory organ of the human body.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The paragraph best supports the statement that ---</p>\r\n', '<p>Human body is made up of skins</p>\r\n', '<p>exposing the skin is a vital part of the body</p>\r\n', '<p>body sensation is recieved through the skin</p>\r\n', '<p>exposing the skin to too much heat is bad</p>\r\n', 1, '', '2021-06-11 02:56:10', '2021-06-28 08:30:06'),
(206, 1, 7, 29, '<p>Communication breakdowns cause failures among students. For one thing, problems are created because things are not talked through. For another thing, students can not express themselves to be understood. When a student fails to communicate effectively, the result is failure. It is vital therefore to be able to express one&#39;s self well in oral communication.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The central idea of the statement revolves on ---</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>The need to write and speak effectively</p>\r\n', '<p>oral language and written communication</p>\r\n', '<p>significance of oral communication</p>\r\n', '<p>communication breakdown caused by failure to communicate orally in an effective</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>manner.</p>\r\n', 3, '', '2021-06-11 02:57:49', '2021-06-28 08:30:06'),
(207, 1, 7, 29, '<p>&quot;Necessity is the mother of invention is an old saying that holds water. A new machine, a system, or a device is created when there is a felt need for it. People will buy it, especially if it is reasonably priced. Hence, an original idea or a concept exists in the mind and is made concrete when there is a potential market waiting for it.</p>\r\n\r\n<p>Based on the information, we can conclude that:</p>\r\n', '<p>A product is an important commodity.</p>\r\n', '<p>People need new products for invention.</p>\r\n', '<p>A new device creates new invention.</p>\r\n', '<p>A market demand for a product creates the invention and production of the product</p>\r\n', 2, '', '2021-06-11 03:08:04', '2021-06-28 08:30:06'),
(208, 1, 7, 29, '<p>Some communication skills are involved in an intelligent communication process. These are speaking and waiting which are called encoding skills, listening and reading which are decoding skills and logical reasoning, which is the highest form of mental process. Without these skills, a person will be deficient in receiving and giving needed information.</p>\r\n\r\n<p>It can be validly concluded from the given information that</p>\r\n', '<p>In any communication process, speaker-listener relationship must be stressed.</p>\r\n', '<p>Certain communication skills are essential in order to have better communication of ideas.</p>\r\n', '<p>Without the ability to speak and write through, one cannot communicate effectively</p>\r\n', '<p>In every process of learning, communication takes place on mutual conversation of interaction in school.</p>\r\n', 1, '', '2021-06-11 03:09:44', '2021-06-28 08:30:06'),
(209, 1, 7, 29, '<p>Have you ever experienced happy and light as a hind? Perhaps such experience only comes when one is able to pater ve pent-on emotions and has begun to learn to forgive and to love. This transforming experience usually liberates a person and makes him able to love and be close to the Creator</p>\r\n\r\n<p>&nbsp;It can be validly concluded from the given statement that when a person has faith in God,</p>\r\n', '<p>need to repent and love</p>\r\n', '<p>need to know and some the Creator</p>\r\n', '<p>need to realize that God loves most those who sin, but can forgive and love thoseh who sinned against them.</p>\r\n', '<p>need to forgive and love his enemies in order to be freed of guilt feelings</p>\r\n', 1, '', '2021-06-11 03:12:05', '2021-06-28 08:30:06'),
(210, 1, 7, 29, '<p>Progress and material gain appear meaningless unless these bring about the upliftment of the quality of the everyday living conditions of the people. Many vital areas of human development which women have penetrated and have made modest but valuable contributions for are now observed. Governments supported projects are being directed towards this end because of the effort of the President, a woman.</p>\r\n\r\n<p>&nbsp;It can be validly concluded that from the given information pertains to:</p>\r\n', '<p>the popularity of woman folks.</p>\r\n', '<p>the upliftment the quality of everyday living.</p>\r\n', '<p>government-supported projects.</p>\r\n', '<p>effort of the President, a woman.</p>\r\n', 2, '', '2021-06-11 03:14:22', '2021-06-28 08:30:06'),
(211, 1, 7, 29, '<p>The role of women in society at present has great changed. Whereas before the wife was trained to stay at home to attend to the physical comfort of the family, now she is free to expose herself to variota activities such as cultural, socio-civic, as well as political preoccupations. The liberated woman today does not only feel fulfilled; she has been an important partner of man total progress of society</p>\r\n\r\n<p>It can be validly concluded from the given information, that:</p>\r\n', '<p>Today&#39;s housewives are more fulfilled and involved than their counterpart several years ago.</p>\r\n', '<p>Today&#39;s women are more restricted than before.</p>\r\n', '<p>Present-day women are more saddled to household chores.</p>\r\n', '<p>Women of yesteryears are not free then than of present.</p>\r\n', 4, '', '2021-06-11 03:15:44', '2021-06-28 08:30:06'),
(212, 1, 7, 29, '<p>Snap judgment made without enough facts is unwise. Taking little unfounded knowledge of things upon which to base one&#39;s decisions shows a person&#39;s actual lack of maturity. One needs to see first the many facets of reality before he can judge wisely.</p>\r\n\r\n<p>It can be concluded from the given information that ___________</p>\r\n', '<p>Hasty decisions are sometimes good.</p>\r\n', '<p>A person must be true in all aspects of living.</p>\r\n', '<p>Appearances are most of the time deceiving</p>\r\n', '<p>One, who is firm, predetermines his future.</p>\r\n', 2, '', '2021-06-11 03:26:19', '2021-06-28 08:30:06'),
(213, 1, 7, 29, '<p>One vital factor to success is discipline. Realizing that life has always its ups and downs, a person never allows failure to dim his vision nor success to spoil the character.</p>\r\n\r\n<p>From the information given, it can be validly concluded that</p>\r\n', '<p>Discipline is the best tool to break the barrier in poverty.</p>\r\n', '<p>Discipline is hard to come by.</p>\r\n', '<p>Discipline is important as an instrument to success.</p>\r\n', '<p>Disillusioned men lack discipline.</p>\r\n', 1, '', '2021-06-11 03:27:18', '2021-06-28 08:30:06'),
(214, 1, 7, 29, '<p>A man is not paid for having a head and hands, but for using them.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>William Penn</p>\r\n\r\n<p>It can be validly concluded from the given thought that __________</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>The worth of a person lies on what he can do, not on what he can say</p>\r\n', '<p>&quot;Actions speak louder than words.&quot;</p>\r\n', '<p>One&#39;s merit outweighs his popularity.</p>\r\n', '<p>Man lives better using his hands, not his head.</p>\r\n', 1, '', '2021-06-11 03:29:07', '2021-06-28 08:30:06'),
(215, 1, 9, 9, '<p>This refers to an individual who undertakes the creation, organization, and ownership of a business</p>\r\n', '<p>Consumer</p>\r\n', '<p>Goods and Services</p>\r\n', '<p>Entrepreneur</p>\r\n', '<p>Business owner</p>\r\n', 3, '', '2021-06-11 03:35:29', '2021-06-28 08:30:06'),
(216, 1, 9, 9, '<p>On the month of April 1, 2011,&nbsp; Manuel opened a saving account of Php. 15,000 at the rate of 6% per annum, compounded monthly. By July 1, 2012, how much is his money in the bank</p>\r\n', '<p>Php . 16,020</p>\r\n', '<p>Php . 15,226</p>\r\n', '<p>Php . 16150</p>\r\n', '<p>Php . 15,300</p>\r\n', 1, '', '2021-06-11 03:38:04', '2021-06-28 08:30:06'),
(217, 1, 9, 9, '<p>The primary cause of small business failure is</p>\r\n', '<p>Lack of Capital</p>\r\n', '<p>Management incompetence</p>\r\n', '<p>Poor Location</p>\r\n', '<p>Improper Inventory control</p>\r\n', 3, '', '2021-06-11 03:38:55', '2021-06-28 08:30:06'),
(218, 1, 9, 9, '<p>A Filipino Home Economics class made beautiful and functional paper bags out of used cardboard. Which Filipino trait is being emphasized here?</p>\r\n', '<p>Adaptability</p>\r\n', '<p>Optimism</p>\r\n', '<p>Creativity</p>\r\n', '<p>Resourcefullness</p>\r\n', 4, '', '2021-06-11 03:40:50', '2021-06-28 08:30:06'),
(219, 1, 9, 9, '<p>A pair of leather shoes costs Php 500 at Store A, but at Store B, the same pair cost Php 380. By what percent was the price reduced at Store B?</p>\r\n', '<p>35%</p>\r\n', '<p>55%</p>\r\n', '<p>25%</p>\r\n', '<p>45%</p>\r\n', 3, '', '2021-06-11 03:42:30', '2021-06-28 08:30:06'),
(220, 1, 9, 9, '<p>Marites pays Php 2,400 for renting an apartment for 1 year. How much does she pay for a seven-month rent?</p>\r\n', '<p>Php 1,400</p>\r\n', '<p>Php 2,500</p>\r\n', '<p>Php 2,000</p>\r\n', '<p>Php 1,200</p>\r\n', 1, '', '2021-06-11 04:00:11', '2021-06-28 08:30:06'),
(221, 1, 9, 9, '<p>All of the following items below except one are found in a purchase order form, Which is the item?</p>\r\n', '<p>Name and address of the vendor</p>\r\n', '<p>Name and address of the vendee</p>\r\n', '<p>Quantity of the ordered items</p>\r\n', '<p>Vehicles used for the delivery of goods</p>\r\n', 4, '', '2021-06-11 04:01:54', '2021-06-28 08:30:06'),
(222, 1, 9, 9, '<p>Wherever you are about to make a major decision, which of the following do you primarily consider first?</p>\r\n', '<p>The impact of consequences of your decision</p>\r\n', '<p>The benefits of what you are about to do</p>\r\n', '<p>The negative effects of your decision</p>\r\n', '<p>The steps and actions to undertake</p>\r\n', 1, '', '2021-06-11 04:06:33', '2021-06-28 08:30:06'),
(223, 1, 9, 9, '<p>Your best friend Jollibee has a problem. Her business store is incurring too much debt due to high building rental fees. What will you advise him to do?</p>\r\n', '<p>Better transfer to another business place.</p>\r\n', '<p>Ask for a lower rental rate from his landlord</p>\r\n', '<p>Close and never do business operation again.</p>\r\n', '<p>Stop it and shift to a more challenging business.</p>\r\n', 1, '', '2021-06-15 06:20:46', '2021-06-28 08:30:06'),
(224, 1, 9, 9, '<p>Kristine and Vivian are high school graduates who work in Merriam Bookstore. After working for a year, Kristine suggested to Vivian that they start a small business of their own. There is a largely populated public high school in a nearby town and no photocopy or xerox business operates there yet. Kristine persuaded Vivian to join the business venture. If you were Vivian, would you join Kristine?</p>\r\n', '<p>Yes, because the photocopy business would entail a bigger profit.</p>\r\n', '<p>No, because it is risky to invest a big amount in a business.</p>\r\n', '<p>Yes, because the idea of the photocopy business is exciting.</p>\r\n', '<p>No, because the salary in the bookstore is more stable.</p>\r\n', 1, '', '2021-06-15 06:21:22', '2021-06-28 08:30:06'),
(225, 1, 9, 9, '<p>Being human to workers/employees and keeping the business alive, as manager/owner of a shoe factory, which of the following will you consider least?</p>\r\n', '<p>Develop the workers on the job above all considerations.</p>\r\n', '<p>Give the workers space to develop their potentials.</p>\r\n', '<p>Always give the workers what they want.</p>\r\n', '<p>Value the workers more than my asset.</p>\r\n', 1, '', '2021-06-15 06:22:33', '2021-06-28 08:30:06'),
(226, 1, 9, 9, '<p>All of the following items below except one are found in a purchase the item?</p>\r\n', '<p>Name and address of the vendor.</p>\r\n', '<p>. Name and address of the vendee.</p>\r\n', '<p>Quantity of the ordered items.</p>\r\n', '<p>Vehicles used for the delivery of goods.</p>\r\n', 1, '', '2021-06-15 06:22:57', '2021-06-28 08:30:06'),
(227, 1, 9, 9, '<p>A Filipino Home Economics class made beautiful and cardboards. Which Filipino trait is being A. Adaptability functional paper bags out of used emphasized here?</p>\r\n', '<p>Adaptability</p>\r\n', '<p>Optimism</p>\r\n', '<p>Resourcefulness</p>\r\n', '<p>Creativity</p>\r\n', 1, '', '2021-06-15 06:23:19', '2021-06-28 08:30:06'),
(228, 1, 9, 9, '<p>Mr. Regie Palma paid a total of P12,250 in taxes for income earned in 2002. His taxed rate B. Optimism is 341/4% of his gross annual income. What is his monthly salary?</p>\r\n', '<p>P3,100</p>\r\n', '<p>P2,800</p>\r\n', '<p>4,450</p>\r\n', '<p>None of these</p>\r\n', 1, '', '2021-06-15 06:23:45', '2021-06-28 08:30:06'),
(229, 1, 9, 9, '<p>A pair of leather shoes costs P500 at Store A, but at Store B, the same pair cost 2.380. what percent was the price reduced at Store B?</p>\r\n', '<p>. 35%</p>\r\n', '<p>25%</p>\r\n', '<p>55%</p>\r\n', '<p>45%</p>\r\n', 1, '', '2021-06-15 06:24:10', '2021-06-28 08:30:06'),
(230, 1, 9, 9, '<p>Five (5) average office workers earn a total average monthly salary of Php.10.000. If the average monthly salary of two of these workers totals Php.4,000, what is the average monthly income of each of the remaining three workers?</p>\r\n', '<p>Php. 9,500</p>\r\n', '<p>Php. 6,000</p>\r\n', '<p>Php. 12,000</p>\r\n', '<p>Php. 6,800</p>\r\n', 1, '', '2021-06-15 06:24:34', '2021-06-28 08:30:06'),
(231, 1, 9, 9, '<p>Leonard is a young entrepreneur and he is running a new business. Which of the following ways can he best develop loyal customers?</p>\r\n', '<p>He should give reward points for each customer purchase</p>\r\n', '<p>He should provide a drink when they shop.</p>\r\n', '<p>She should diversify business services.</p>\r\n', '<p>He should dress neatly regularly.</p>\r\n', 1, '', '2021-06-15 06:25:07', '2021-06-28 08:30:06'),
(232, 1, 9, 9, '<p>Your uncle&#39;s eight-year-old school started to decrease its enrollment due to many new school competitors. What strategy can he use to attract more parents to enroll their kids?</p>\r\n', '<p>Hire new teachers.</p>\r\n', '<p>Install more school facilities.</p>\r\n', '<p>. Put more attractive advertisements.</p>\r\n', '<p>Reduce tuition fees a little bit than the other new schools.</p>\r\n', 1, '', '2021-06-15 06:25:34', '2021-06-28 08:30:06'),
(233, 1, 9, 9, '<p>Your family plans to establish a printing shop business. What is the first step that you can contribute towards carrying out of this business venture?</p>\r\n', '<p>Ask referrals from business friends.</p>\r\n', '<p>. Create email /facebook accounts for prospective customers.</p>\r\n', '<p>Advertise the proposed business through flyers and brochures</p>\r\n', '<p>Gather related studies and data of some people doing this business.</p>\r\n', 1, '', '2021-06-15 06:26:27', '2021-06-28 08:30:06'),
(234, 1, 9, 9, '<p>On November 25, 2012, Francis invested P50,000 for 2 years at a rate 97% per annum. By February 25, 2013, how much interest would he have earned?</p>\r\n', '<p>P6,500</p>\r\n', '<p>P5,400</p>\r\n', '<p>P5,800</p>\r\n', '<p>None of these</p>\r\n', 1, '', '2021-06-15 06:27:02', '2021-06-28 08:30:06'),
(235, 1, 9, 9, '<p>Marites pays P2, 400.00 for renting an apartment for 1 year. How much does she pay for a seven-month rent?</p>\r\n', '<p>Php. 1,400</p>\r\n', '<p>Php. 2,300</p>\r\n', '<p>Php. 1,200</p>\r\n', '<p>Php. 2,000</p>\r\n', 1, '', '2021-06-15 06:27:28', '2021-06-28 08:30:06'),
(236, 1, 9, 20, '<p>If you were Ivan, what would you do with the excess feathers?</p>\r\n', '<p>Give them to a garbage collector</p>\r\n', '<p>Donate them to a foundation</p>\r\n', '<p>Make feather dusters to sell.</p>\r\n', '<p>Exchange them for feeds.</p>\r\n', 1, '', '2021-06-15 06:28:41', '2021-06-28 08:30:06'),
(237, 1, 9, 20, '<p>Which of the following is excluded in the costing of the poultry raising project?</p>\r\n', '<p>The rent of the land</p>\r\n', '<p>The cost of housing</p>\r\n', '<p>The cost of the feeds</p>\r\n', '<p>The cost of fencing</p>\r\n', 1, '', '2021-06-15 06:29:28', '2021-06-28 08:30:06'),
(238, 1, 9, 21, '<p>Internet cafes are usually visited by customers after school and office hours for surfing and gaming. Which of the following is the best marketing strategy to attract customers and increase sales during mid-day?</p>\r\n', '<p>Offer free snacks and drinks</p>\r\n', '<p>Hire an accommodating staff</p>\r\n', '<p>Offer lower rates or promo hours</p>\r\n', '<p>Provide fast network connection</p>\r\n', 1, '', '2021-06-15 06:33:43', '2021-06-28 08:30:06'),
(239, 1, 9, 21, '<p>Which of the things can an entrepreneur do to ensure customer satisfaction in the Internet caf&eacute;?</p>\r\n', '<p>Provide a wide screen TV set</p>\r\n', '<p>Set up more computer units and equipment</p>\r\n', '<p>Install high-speed broadband connection</p>\r\n', '<p>Put up services such as printing and photocopying</p>\r\n', 1, '', '2021-06-15 06:34:16', '2021-06-28 08:30:06'),
(240, 1, 9, 9, '<p>Mr. Mendoza can buy a sewing machine for 290 cash or pays Php 50 down and Php 21.50 a month. How much can he save paying in cash in a year?</p>\r\n', '<p>Php. 20.00</p>\r\n', '<p>Php. 28.00</p>\r\n', '<p>Php. 18.00</p>\r\n', '<p>Php. 21.00</p>\r\n', 1, '', '2021-06-15 06:34:50', '2021-06-28 08:30:06'),
(241, 1, 9, 22, '<p>What strategy would you recommend to promote the newly opened burger shop for less cost?</p>\r\n', '<p>Hire a public health officer to promote in barangays the benefits of a burger diet.</p>\r\n', '<p>Hire a popular figure to promote and advertise on TV the delectable taste of the premium class burger.</p>\r\n', '<p>Hold a grand ribbon-cutting ceremony and invite guests to the opening of the burger shop.</p>\r\n', '<p>Situate kiosks in grocery stores and give free taste of cooked ham and cheese burger, and distribute flyers of other recipes. Top of Form</p>\r\n', 1, '', '2021-06-15 06:36:41', '2021-06-28 08:30:06'),
(242, 1, 9, 22, '<p>Which among the following would pose the most difficult challenge for Mr. and Mrs. Vallega in their burger shop?</p>\r\n', '<p>Other burger shop competitors</p>\r\n', '<p>Maintaining a 24-hour operation</p>\r\n', '<p>Giving competitive salaries to their workers</p>\r\n', '<p>Sustaining the supply of the burger to meet the market demand</p>\r\n', 1, '', '2021-06-15 06:37:02', '2021-06-28 08:30:06'),
(243, 1, 9, 9, '<p>Mr. Balisi has a lot valued at 10,000,000. If he is taxed 1/5 at 5.00 per 1,000.00, how much will be the total tax levied on the lot? Which solution will apply to solve the problem?</p>\r\n', '<p>(10,000-1,000) 5</p>\r\n', '<p>(1/5 (10,000,000) + 1,000) 5</p>\r\n', '<p>(10,000,000 x 1/5) 5</p>\r\n', '<p>None of the above</p>\r\n', 1, '', '2021-06-15 06:37:39', '2021-06-28 08:30:06'),
(244, 1, 9, 9, '<p>Trisha Mae&#39;s sister makes very tasteful cookies. She makes sweet chocolate cookies every weekend. Initially, she just shares some cookies with her neighbors. But when the neighbors tasted the cookies, they started ordering in boxes. Soon, its good quality spread all over the neighborhood. What can Trisha Mae and her sister do in order to meet the growing demand for cookies?</p>\r\n', '<p>Ask some friends to do the other orders.</p>\r\n', '<p>Limit orders to regular customers only.</p>\r\n', '<p>Arrange the schedule of deliveries to avoid conflict.</p>\r\n', '<p>Hire additional helpers and teach them the procedure</p>\r\n', 1, '', '2021-06-15 06:37:59', '2021-06-28 08:30:06'),
(245, 1, 9, 9, '<p>Lloyd is a college drop-out. His father is asking him to finish his studies, but Lloyd refuse because at 25, he feels he is too old to go to school again. All he wants now is to have a business of his own. If you were Lloyd&#39;s friend, what would you do?</p>\r\n', '<p>Lend Lloyd the needed capital</p>\r\n', '<p>Tell Lloyd to run his choice of business.</p>\r\n', '<p>Consult a friend who has a flair for business.</p>\r\n', '<p>Tell Lloyd to enroll in a crash course in Business Management</p>\r\n', 1, '', '2021-06-15 06:38:22', '2021-06-28 08:30:06'),
(246, 1, 9, 9, '<p>This refers to an individual who undertakes the creation, organization, and ownership of a business.</p>\r\n', '<p>Consumer</p>\r\n', '<p>Goods and services</p>\r\n', '<p>Entrepreneur</p>\r\n', '<p>Business owner</p>\r\n', 1, '', '2021-06-15 06:38:58', '2021-06-28 08:30:06'),
(247, 1, 9, 9, '<p>On the month of April 1, 2011, Manuel opened a savings account of Php. 15,000 at the rate of 6% per annum, compounded monthly. By July 1, 2012, how much is his money in the bank?</p>\r\n', '<p>Php. 16,020</p>\r\n', '<p>Php. 15, 226</p>\r\n', '<p>Php. 15, 300</p>\r\n', '<p>Php. 16,150</p>\r\n', 1, '', '2021-06-15 06:38:58', '2021-06-28 08:30:06'),
(248, 1, 9, 9, '<p>Your food business is located in a place where middle income employees are passing by. They are always on the go and have a very little time to sit down to dine in. What do you think is the best package to offer them food?</p>\r\n', '<p>Meals in plastics</p>\r\n', '<p>Meals in paper plates</p>\r\n', '<p>Expensive food in Styrofoam</p>\r\n', '<p>Budget meal in clean paper box</p>\r\n', 1, '', '2021-06-15 06:39:54', '2021-06-28 08:30:06'),
(249, 1, 9, 9, '<p>The primary cause of small business failure is</p>\r\n', '<p>Poor location</p>\r\n', '<p>Lack of capital</p>\r\n', '<p>Management incompetence</p>\r\n', '<p>Improper inventory control</p>\r\n', 1, '', '2021-06-15 06:40:15', '2021-06-28 08:30:06'),
(250, 1, 9, 9, '<p>What would you do with plastic hangers to earn money?</p>\r\n', '<p>Tie one hanger along rod to pick fruits from a tree</p>\r\n', '<p>Use them for displaying longanisa for sale</p>\r\n', '<p>Combine several hangers to make a Christmas tree or lantern out of plastics</p>\r\n', '<p>Use them for hanging and drying clothes.</p>\r\n', 1, '', '2021-06-15 06:40:31', '2021-06-28 08:30:06'),
(251, 1, 9, 9, '<p>Czarrinah, a seamstress, keeps the retaso of cloths she sews. She has kept enough to sew several bundles of rags. If you were Czarrinah, what would you do with the rags?</p>\r\n', '<p>Keep them for family use.</p>\r\n', '<p>Give them on a bargain.</p>\r\n', '<p>Sell them at a reasonable price.</p>\r\n', '<p>Dispose them as give-aways to customers.</p>\r\n', 1, '', '2021-06-15 06:41:02', '2021-06-28 08:30:06'),
(252, 1, 9, 9, '<p>If you live in a small island where shellfish abound, which of the following would be worthwhile doing?</p>\r\n', '<p>Use shells for the sungkahan</p>\r\n', '<p>Gather shellfish for food</p>\r\n', '<p>Put up a shell craft industry</p>\r\n', '<p>Collect shells for display purposes.</p>\r\n', 1, '', '2021-06-15 06:41:22', '2021-06-28 08:30:06'),
(253, 1, 9, 9, '<p>Josephine-Anne learned dressmaking in her Home Economics class in high school. Her aunt, who owns a garment shop, asked her for a of summer pants that teenagers would like, if you were Josephine-Anne, which of the following designs would you suggest?</p>\r\n', '<p>Dark-colored cotton pants with pumpkin prints</p>\r\n', '<p>Bright-colored wool pants with pockets</p>\r\n', '<p>Bright-colored cotton pants with beach prints</p>\r\n', '<p>Dark-colored cotton pants with beach prints.</p>\r\n', 1, '', '2021-06-15 06:41:41', '2021-06-28 08:30:06'),
(254, 1, 9, 9, '<p>Randy and his family lives in a coastal area. He engages in buying and selling fish in the interior part of two neighboring towns, far from the sea coast. When he returns from fish vending, he brings home fruits and vegetables to be sold along the coastal area. If you were Randy, would you do the same?</p>\r\n', '<p>No, because fruits and vegetables are perishable.</p>\r\n', '<p>Yes, because there are many fruit vendors in coastal area.</p>\r\n', '<p>No, because fruits and vegetables are too heavy to carry.</p>\r\n', '<p>Yes, because I know people in the coastal area need fruits and vegetables.</p>\r\n', 1, '', '2021-06-15 06:41:59', '2021-06-28 08:30:06'),
(255, 1, 7, 29, '<p>Mr. Balisi should encourage his class to:</p>\r\n', '<p>Rely on what he finally tells them to believe.</p>\r\n', '<p>Engage in lengthly debates and arguments</p>\r\n', '<p>Accept the facts as presented to them.</p>\r\n', '<p>Investigate all sources of information and withhold all conclusions until sufficient fact are available.</p>\r\n', 1, '', '2021-06-15 07:47:19', '2021-06-28 08:30:06'),
(256, 1, 7, 29, '<p>From the information given above, which class do you think has a more appealing setup?</p>\r\n', '<p>The Grade 7 class of Mrs. Sibal</p>\r\n', '<p>The Grade 8 class of Mrs. Lumacang</p>\r\n', '<p>The Grade 9 class of Miss. Torres</p>\r\n', '<p>None of these</p>\r\n', 1, '', '2021-06-15 07:48:08', '2021-06-28 08:30:06'),
(257, 1, 7, 29, '<p>On the passage given above, why does Mr. Palma do this?</p>\r\n', '<p>He knows the value of rewards</p>\r\n', '<p>He has nothing else to give.</p>\r\n', '<p>He has nothing better to think of.</p>\r\n', '<p>Students are easily fooled.</p>\r\n', 1, '', '2021-06-15 07:48:41', '2021-06-28 08:30:06'),
(258, 1, 7, 29, '<p>From the information given above, it can be validly concluded that:</p>\r\n', '<p>Legal age drinkers dont get drunk.</p>\r\n', '<hr />\r\n<p>Alcohol is for both the young amnd the adults.</p>\r\n', '<p>Alcohol is more appealing to teenagers.</p>\r\n', '<p>Teenagers are more likely to become an alcoholic person.</p>\r\n', 1, '', '2021-06-15 07:49:17', '2021-06-28 08:30:06'),
(259, 1, 7, 29, '<p>The best way to prevent behavior problems among slow learners would be to:</p>\r\n', '<p>Give assistance to individual pupils after school hours</p>\r\n', '<p>Avoid noticing their withdraw behavior</p>\r\n', '<p>Avoid correcting the errors they make.</p>\r\n', '<p>Give them work that they can do rather than what they cannot do.</p>\r\n', 1, '', '2021-06-15 07:49:54', '2021-06-28 08:30:06'),
(260, 1, 7, 29, '<p>The paragraph best supports the statement that &ndash;</p>\r\n', '<p>Human body is made up of skins.</p>\r\n', '<p>Exposing the skin to too much heat is bad.</p>\r\n', '<p>Human skin is a vital part of the body.</p>\r\n', '<p>Body sensation is received through the skin.</p>\r\n', 1, '', '2021-06-15 07:51:53', '2021-06-28 08:30:06'),
(261, 1, 7, 29, '<p>Communication breakdowns cause failures amond students. For one thing, problems are created because things are not talked through. For another thing, students can not express themselves to be understood. When a student fails to communicate effectively the result is failures. It is vital therefore&rsquo; to be able to express one&rsquo;s self well in oral communication.</p>\r\n\r\n<p>The central idea of the statement revolves on &ndash;</p>\r\n', '<p>The need to write and speak effectively</p>\r\n', '<p>Oral language and written communication.</p>\r\n', '<p>Significance of oral communication</p>\r\n', '<p>Communication breakdown cause by failure to communicate orally in an effetive manner.</p>\r\n', 1, '', '2021-06-15 07:55:32', '2021-06-28 08:30:06'),
(262, 1, 7, 29, '<p>Necessity is the mother of invention&rdquo; is an old saying that holds water. A new machine, a system , or a device is created when there is a felt need for it People will buy it, especially if it is reasonably prices. Hence, an original idea or a concept eists in the mind and is made conrete when there is a potential market waiting for it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Based on the information, we can conclude that:</p>\r\n', '<p>A product is an important commodity.</p>\r\n', '<p>People need new products for invention</p>\r\n', '<p>A new device creates new invention</p>\r\n', '<p>A market demand for a product creates the invention and production of the product.</p>\r\n', 1, '', '2021-06-15 07:56:10', '2021-06-28 08:30:06'),
(263, 1, 7, 29, '<p>Some communication skills are involved in an intelligent communication process. These are speaking and waiting which are called encoding skills, listening and reading which are decoding skills and logical reasoning, which is the highest form of mental process. Without these skills, aperson will be deficient in receiving and giving needed information.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded from the given information that _____</p>\r\n', '<p>In any communication process, speaker-listener relationship&rsquo; must be stressed.</p>\r\n', '<p>Certain communication skills are essential in order to have better communication of ideas.</p>\r\n', '<p>Without the ability to speak and write through, one cannot communicate effectively</p>\r\n', '<p>In every process of learning, communication takes place on mutual conversation or interaction in school.</p>\r\n', 1, '', '2021-06-15 07:57:53', '2021-06-28 08:30:06'),
(264, 1, 7, 29, '<p>Have you ever experienced happy and light as a bird? Perhaps such experience only comes when one is able to put up emotions and has begun to learn to forgive and to love. This transforming experience usualy liberates ja person and makes him able to love and be close to the Creator.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded from the given statement that when a person has faith in God,</p>\r\n', '<p>Need to repent and love</p>\r\n', '<p>Need to now and some the Creator</p>\r\n', '<p>Need to forgive and love his enemies in order to be freed of guild feelings</p>\r\n', '<p>Need to realize that God loves most those who sin, but can forgive and love those who sinned against them.</p>\r\n', 1, '', '2021-06-15 07:58:20', '2021-06-28 08:30:06'),
(265, 1, 7, 29, '<p>Progress and material gain appear meaningless unless these bring about the upliftment of the quality of the every living conditions of the people. Many vital areas of human development which women have penetrated and have made modest but valuable contributions for are now observed. Governments supported project are being directed towards this end because of the effort of the President, a woman.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded that from the given information pertains to:</p>\r\n', '<p>THE POPULARITY OF WOMAN FOLKS.</p>\r\n', '<p>The upliftment the quality of everyday living</p>\r\n', '<p>Effort of the president, a woman</p>\r\n', '<p>Government-supported project.</p>\r\n', 1, '', '2021-06-15 07:58:52', '2021-06-28 08:30:06'),
(266, 1, 7, 29, '<p>The role of women in society at present has greatly changed. Whereas before the wife was trained to stay at home to attend to the physical comfort of the family, now she is free to expose herself to various activities such as cultural, socio-civic as well as political preoccupations. The liberated woman today does not only feel fulfilled; she has been an important partner of man to total progress of society.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded from the given information, that:</p>\r\n', '<p>Today&rsquo;s women are more restricted than before.</p>\r\n', '<p>Present-day women are more saddled to household chores.</p>\r\n', '<p>Women of yesteryears are not free then than of present.</p>\r\n', '<p>Today&rsquo;s housewives are more fulfilled and involved than their counterpart several years ago.</p>\r\n', 1, '', '2021-06-15 07:59:25', '2021-06-28 08:30:06'),
(267, 1, 7, 29, '<p>Snap judgement made without enough facts is unwise. Taking little unfounded knowledge of things upon which to base one&rsquo;s decisions shows a persons actual lack of maturity. One needs to see firts the many facets of reality before he can judge wisely.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be concluded from the given information that _________________</p>\r\n', '<p>Hasty decisions are sometimes good.</p>\r\n', '<p>A person must be true in all aspects of living</p>\r\n', '<p>Appearances are most of the time deceiving.</p>\r\n', '<p>One, who is firm. Predetermins his future.</p>\r\n', 1, '', '2021-06-15 07:59:52', '2021-06-28 08:30:06'),
(268, 1, 7, 29, '<p>One vital factor to success is discipline. Realizing that life has alwys its ups and downs, a person never allows failure to dim his vision nor success to spoil the character.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, it can be validly concluded that _______</p>\r\n', '<p>Discipline is the best tool to break the barrier in poverty</p>\r\n', '<p>Discipline is hard to come by</p>\r\n', '<p>Discipline is important as an instrument to success</p>\r\n', '<p>Disillusioned men lack discipline.</p>\r\n', 1, '', '2021-06-15 08:00:17', '2021-06-28 08:30:06'),
(269, 1, 7, 29, '<p>&ldquo;A man is not paid for having a head and hands, but for using them.&rdquo;</p>\r\n\r\n<p>-William Penn</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded from the given thought that ______</p>\r\n', '<p>The worth of a person lies on what he can do, not on what he can say</p>\r\n', '<p>&ldquo;Actions speak louder than words.&rdquo;</p>\r\n', '<p>Man lives better using his hands, not his head.</p>\r\n', '<p>One&rsquo;s merit outweighs his popularity.</p>\r\n', 1, '', '2021-06-15 08:00:43', '2021-06-28 08:30:06'),
(270, 1, 7, 29, '<p>Rumor mongering is like letting a bagful of feathers on top of a tall building on a windy day.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded from the given information that______</p>\r\n', '<p>Old habits die hard.</p>\r\n', '<p>A feasible cure to gossip is not to talk.</p>\r\n', '<p>False loose talks are impossible to retrieve when aldready scattered around.</p>\r\n', '<p>Lying in a second can no longer cure thae trust that you from to the people.</p>\r\n', 1, '', '2021-06-15 08:01:10', '2021-06-28 08:30:06'),
(271, 1, 7, 29, '<p>Most well-established companies provide its employees many types of fringe benefits. The employee may be insured and the premium being paid by the employer, Yearly bonus, Car allowance, a summer or midyear trip abroad hospitalization, and sick leave with pay are also included among these benefits Yet. It is surprising that most highly paid employees of some companies can still be pirated even though the benefits offered by the letter are far below that of the former employer.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given it can be validly concluded that _____</p>\r\n', '<p>There is always no human satisfaction</p>\r\n', '<p>There is a need to keep changing one&rsquo;s job.</p>\r\n', '<p>The piracy in business is normal and rampant</p>\r\n', '<p>The employees are really a changing breed of professionals.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '', '2021-06-15 08:01:35', '2021-06-28 08:30:06'),
(272, 1, 7, 29, '<p>A forwarding company can act as a common carrier to the general public at published rates. As a common carrier, it is liable for any cargo damage unless the damage was caused by force majuere or by an act of nature In contast, a contract of agreement signed by the shipper and the shipping company should specify the responsibility of the shipping company towards the cargoes, AB Forwarders Inc. Acting as common carrier was involved in a 4-vehicle accident that damaged its cargo</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given above, it can be validly concluded that.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>AB Forwarders Inc. Has no contract, so they are not liable.</p>\r\n', '<p>AB Forwarders Inc has the agreement so they are liable</p>\r\n', '<p>AB Forwarders Inc is liable because its not an act of nature of force mejeure.</p>\r\n', '<p>AB Forwarders Inc is not liable because it is an act of nature of force majeure.</p>\r\n', 1, '', '2021-06-15 08:02:03', '2021-06-28 08:30:06'),
(273, 1, 7, 29, '<p>But alas! &ldquo; All good thoughts of people about him disappear when he started seeing things thtought colored spectacles.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded that the given thought pertains to:</p>\r\n', '<p>Seeing things through sunglasses avoids sunglare.</p>\r\n', '<p>Favoring an idea over one;s prejudices</p>\r\n', '<p>People seeing others through what they hear from others.</p>\r\n', '<p>None of the above</p>\r\n', 1, '', '2021-06-15 08:02:28', '2021-06-28 08:30:06'),
(274, 1, 7, 29, '<p>&ldquo;What cannot be cured must be endured&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It can be validly concluded from the given thought that ________</p>\r\n', '<p>Too many minds spoil the good idea.</p>\r\n', '<p>Too many minds spoil the good idea.</p>\r\n', '<p>Unavoidable unpleasant experiences should be accepted patiently and meekly.</p>\r\n', '<p>Its more important to accept one&rsquo;s individual ways.</p>\r\n', 1, '', '2021-06-15 08:03:05', '2021-06-28 08:30:06'),
(275, 1, 7, 29, '<p>Wages refer to the total earnings of a person for doing a certain kind of service in a given period of time. They are paid on an hourly basis or by the product of a piece rate: hence. The pay rate may be based on time, output or even a combination of these two.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the given paragraph, it can be validly concluded that the thought pertains to:</p>\r\n', '<p>Wages vary</p>\r\n', '<p>Types of waves</p>\r\n', '<p>Services are wave-oriented</p>\r\n', '<p>Combination of waves is better</p>\r\n', 1, '', '2021-06-15 08:03:29', '2021-06-28 08:30:06'),
(276, 1, 7, 29, '<p>Education is a life-long process which requires studying and learning from previous experiences. It is not enough to be educated as it is to be cultured.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nFrom the information given, it can be validly concluded that ______</p>\r\n', '<p>Education means more than being a cultured person.</p>\r\n', '<p>To be called a cultured a person require a continuing education</p>\r\n', '<p>A cultured person learns and profits from previous educational experiences</p>\r\n', '<p>A cultured person learns more to value things that are on past.</p>\r\n', 1, '', '2021-06-15 08:04:01', '2021-06-28 08:30:06'),
(277, 1, 7, 29, '<p>A UN report states &ldquo;We could prevent desertification which costs 5,6 billion dollars, an amount tha.t the world spends on armaments in 2 days.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, it can be validly concluded that ________</p>\r\n', '<p>Armaments help a nation develop into a world power.</p>\r\n', '<p>If the world is disarmed, we could prevent desertification.</p>\r\n', '<p>Armaments are less expensive than desertification</p>\r\n', '<p>Desertification is more expensive than armaments used in 2days</p>\r\n', 1, '', '2021-06-15 08:04:31', '2021-06-28 08:30:06'),
(278, 1, 7, 29, '<p>Faher Reuter wrote: &ldquo; In a survey in Asia, they discovered that hte happiest people in Asia are the Filipinos. The most miserable are the Japanese, The Japanese have money. We dont have money, but we have smile, the warm embrace, the song, the laughter, the joy of living.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Based on the information given, it proves that____________</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>The Filipinos are happy-go-lucky people.</p>\r\n', '<p>The Filipinos dont care about material welath.</p>\r\n', '<p>The Filipinos case about material welth</p>\r\n', '<p>The Filipinos are rich in the treasure of the spirit.</p>\r\n', 1, '', '2021-06-15 08:05:06', '2021-06-28 08:30:06'),
(279, 1, 7, 29, '<p>After the Ice Age has ended, the climate of Navada and Utah became drier and warmer. Because large game became scarce, the Indians in those areas had to eat more and more plants. The areas became desert-like and the Indians began to roam in small bands in search for food.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, what does this prove?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>A group of people will survive when they live together.</p>\r\n', '<p>A group of peoples behavior can change a fertile land into a desert</p>\r\n', '<p>A group of people is so powerful that it can control changes in the environment</p>\r\n', '<p>Any change in the environment of a group results in a change in the group culture</p>\r\n', 1, '', '2021-06-15 08:05:36', '2021-06-28 08:30:06'),
(280, 1, 7, 29, '<p>Read these observations regarding farmer beneficiaries of the agrarian reform program: Subsistence farmer could not meet the capacity to pay criteria of lending institutions. Thos who did defaulted on their payments. Corporate farms displaced tenants while high-yielding varities of crops failed to increase productivity because of higher costs. Some farmers, to the extent of selling their Ceritificates of Land Transfer.........</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>What conclusion can be drawn from this observation?</p>\r\n', '<p>The agrarian reform program cannot improve the life of farmers.</p>\r\n', '<p>The rich and the landed find it difficult to part with their land.</p>\r\n', '<p>The farmers need not be given piece of land. They sell it anyway.</p>\r\n', '<p>For the program to be ffective, land distribution must go with scheme of financial&nbsp; assistance.</p>\r\n', 1, '', '2021-06-15 08:06:07', '2021-06-28 08:30:06'),
(281, 1, 7, 29, '<p>Read this anecdote, then answer the question: &ldquo; On a shore , an American tourist saw a fish basket of crabs open that belonged to a Filipino fisherman, The tourist said: &ldquo;Hey your basket is open. Before you know it, your crabs are gone.&rdquo; The Filipino fisherman answered:&rdquo; You forgot that they are Filipino crabs. Sir&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, what filipino trait does the anecote insinuate?</p>\r\n', '<p>The tendency to be careless and carefree.</p>\r\n', '<p>The tendency to work under the sun all day.</p>\r\n', '<p>The tendency to regard a foreigner as someone who is superior</p>\r\n', '<p>The tendency to pull down someone who has gained some status or prestige.</p>\r\n', 1, '', '2021-06-15 08:06:33', '2021-06-28 08:30:06'),
(282, 1, 7, 29, '<p>&ldquo;Antartica is land of ice that reaches a thickness about two kilometers&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, it can be validly concluded that ______</p>\r\n', '<p>The oceans are full of fish</p>\r\n', '<p>Only scientist conducting research stay in Antartica.</p>\r\n', '<p>The land is full of vegetation that has adapted to the enviroment.</p>\r\n', '<p>Residents in there have already adapted to the envinroment.</p>\r\n', 1, '', '2021-06-15 08:08:03', '2021-06-28 08:30:06'),
(283, 1, 7, 29, '<p>&ldquo;Philippine society is pictured as &lsquo;island of affluence amidst a sea provert.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, it can be validly concluded that ______</p>\r\n', '<p>The vast majority of Filipinos are poor.</p>\r\n', '<p>The few rich Filipinos exclusively own some inslands in the country.</p>\r\n', '<p>The few rich are to be blamed for this massic poverty in the country</p>\r\n', '<p>It is the fault of many poor filipinos if they are sinking in the sea of poverty</p>\r\n', 1, '', '2021-06-15 08:08:27', '2021-06-28 08:30:06'),
(284, 1, 7, 29, '<p>Historian Leon Ma. Guerero wrote: &ldquo;When Corregidor fell, Filipino war prisoners ualmost died of thirs because they didn&rsquo;t get organized. In contrast the American prisoners created a delegation to thej Japanese authorities and volunteered to fetch water for their comrades.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Which goes this point out? The Filipino&rsquo;s lack of ______</p>\r\n', '<p>Brotherhood</p>\r\n', '<p>Teamwork</p>\r\n', '<p>Foresight</p>\r\n', '<p>Courage</p>\r\n', 1, '', '2021-06-15 08:08:55', '2021-06-28 08:30:06'),
(285, 1, 7, 29, '<p>Read this anecdote, then answer the question: &ldquo; On a shore , an American tourist saw a fish basket of crabs open that belonged to a Filipino fisherman, The tourist said: &ldquo;Hey your basket is open. Before you know it, your crabs are gone.&rdquo; The Filipino fisherman answered:&rdquo; You forgot that they are Filipino crabs. Sir&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, what filipino trait does the anecote insinuate?</p>\r\n', '<p>The tendency to be careless and carefree.</p>\r\n', '<p>The tendency to work under the sun all day.</p>\r\n', '<p>The tendency to regard a foreigner as someone who is superior</p>\r\n', '<p>The tendency to pull down someone who has gained some status or prestige.</p>\r\n', 1, '', '2021-06-15 08:13:56', '2021-06-28 08:30:06'),
(286, 1, 7, 29, '<p>Read these observations regarding farmer beneficiaries of the agrarian reform program: Subsistence farmer could not meet the capacity to pay criteria of lending institutions. Thos who did defaulted on their payments. Corporate farms displaced tenants while high-yielding varities of crops failed to increase productivity because of higher costs. Some farmers, to the extent of selling their Ceritificates of Land Transfer.........</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>What conclusion can be drawn from this observation?</p>\r\n', '<p>The rich and the landed find it difficult to part with their land.</p>\r\n', '<p>The agrarian reform program cannot improve the life of farmers.</p>\r\n', '<p>For the program to be ffective, land distribution must go with scheme of financial&nbsp; assistance.</p>\r\n', '<p>The farmers need not be given piece of land. They sell it anyway.</p>\r\n', 1, '', '2021-06-15 08:16:58', '2021-06-28 08:30:06'),
(287, 1, 7, 29, '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; After the Ice Age has ended, the climate of Navada and Utah became drier and warmer. Because large game became scarce, the Indians in those areas had to eat more and more plants. The areas became desert-like and the Indians began to roam in small bands in search for food.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, what does this prove?</p>\r\n', '<p>A group of people will survive when they live together.</p>\r\n', '<p>A group of peoples behavior can change a fertile land into a desert</p>\r\n', '<p>A group of people is so powerful that it can control changes in the environment</p>\r\n', '<p>Any change in the environment of a group results in a change in the group culture</p>\r\n', 1, '', '2021-06-15 08:17:20', '2021-06-28 08:30:06'),
(288, 1, 7, 29, '<p>Faher Reuter wrote: &ldquo; In a survey in Asia, they discovered that hte happiest people in Asia are the Filipinos. The most miserable are the Japanese, The Japanese have money. We dont have money, but we have smile, the warm embrace, the song, the laughter, the joy of living.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Based on the information given, it proves that____________</p>\r\n', '<p>The Filipinos are happy-go-lucky people.</p>\r\n', '<p>The Filipinos dont care about material welath.</p>\r\n', '<p>The Filipinos case about material welth</p>\r\n', '<p>The Filipinos are rich in the treasure of the spirit.</p>\r\n', 1, '', '2021-06-15 08:17:53', '2021-06-28 08:30:06'),
(289, 1, 7, 29, '<p>A UN report states &ldquo;We could prevent desertification which costs 5,6 billion dollars, an amount tha.t the world spends on armaments in 2 days.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, it can be validly concluded that ________</p>\r\n', '<p>Armaments help a nation develop into a world power.</p>\r\n', '<p>If the world is disarmed, we could prevent desertification.</p>\r\n', '<p>If the world is disarmed, we could prevent desertification.</p>\r\n', '<p>If the world is disarmed, we could prevent desertification.</p>\r\n', 1, '', '2021-06-15 08:18:18', '2021-06-28 08:30:06'),
(290, 1, 7, 29, '<p>&nbsp; &nbsp; &nbsp;Education is a life-long process which requires studying and learning from previous experiences. It is not enough to be educated as it is to be cultured.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, it can be validly concluded that ______</p>\r\n', '<p>Education means more than being a cultured person.</p>\r\n', '<p>Education means more than being a cultured person.</p>\r\n', '<p>A cultured person learns and profits from previous educational experiences</p>\r\n', '<p>A cultured person learns and profits from previous educational experiences</p>\r\n', 1, '', '2021-06-15 08:18:47', '2021-06-28 08:30:06'),
(291, 1, 7, 29, '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wages refer to the total earnings of a person for doing a certain kind of service in a given period of time. They are paid on an hourly basis or by the product of a piece rate: hence. The pay rate may be based on time, output or even a combination of these two.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the given paragraph, it can be validly concluded that the thought pertains to:</p>\r\n', '<p>Wages vary</p>\r\n', '<p>Wages vary</p>\r\n', '<p>Services are wave-oriented</p>\r\n', '<p>Combination of waves is better</p>\r\n', 1, '', '2021-06-15 08:19:09', '2021-06-28 08:30:06'),
(292, 1, 7, 29, '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Education is a life-long process which requires studying and learning from previous experiences. It is not enough to be educated as it is to be cultured.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given, it can be validly concluded that ______</p>\r\n', '<p>Education means more than being a cultured person.</p>\r\n', '<p>To be called a cultured a person require a continuing education</p>\r\n', '<p>A cultured person learns more to value things that are on past.</p>\r\n', '<p>A cultured person learns and profits from previous educational experiences</p>\r\n', 1, '', '2021-06-15 08:21:07', '2021-06-28 08:30:06');
INSERT INTO `questions` (`q_id`, `qs_id`, `q_cat`, `q_scat`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answerQ`, `q_logs`, `date_created`, `date_updated`) VALUES
(293, 1, 7, 29, '<p>A forwarding company can act as a common carrier to the general public at published rates. As a common carrier, it is liable for any cargo damage unless the damage was caused by force majuere or by an act of nature In contast, a contract of agreement signed by the shipper and the shipping company should specify the responsibility of the shipping company towards the cargoes, AB Forwarders Inc. Acting as common carrier was involved in a 4-vehicle accident that damaged its cargo.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From the information given above, it can be validly concluded that.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>AB Forwarders Inc. Has no contract, so they are not liable.</p>\r\n', '<p>AB Forwarders Inc has the agreement so they are liable</p>\r\n', '<p>AB Forwarders Inc is liable because its not an act of nature of force mejeure.</p>\r\n', '<p>AB Forwarders Inc is not liable because it is an act of nature of force majeure.</p>\r\n', 1, '', '2021-06-15 08:21:34', '2021-06-28 08:30:06'),
(294, 1, 7, 29, '<p>The social studies class of Mr. Jaylord Balisi is discussing the realationship of high population rate to the problems of nutrition and poverty. The class cannot agree that high population growth result in poor nutrition and poverty.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mr. Balisi should encourage his class to:</p>\r\n', '<p>Engage in lengthly debates and arguments.</p>\r\n', '<p>Rely on what he finally tells them to believe.</p>\r\n', '<p>Accept the facts as presented to them.</p>\r\n', '<p>Investigate all sources of information and withhold all conclusions until sufficient fact are available.</p>\r\n', 1, '', '2021-06-15 08:22:15', '2021-06-28 08:30:06'),
(295, 1, 2, 31, '<p>&nbsp;66&nbsp;&nbsp;&nbsp;&nbsp; 85&nbsp;&nbsp;&nbsp;&nbsp; m6&nbsp;&nbsp;&nbsp;&nbsp; 8n</p>\r\n', '<p>nn</p>\r\n', '<p>66</p>\r\n', '<p>8n</p>\r\n', '<p>m6</p>\r\n', 1, '', '2021-06-15 08:52:02', '2021-06-28 08:30:06'),
(296, 1, 3, 3, '<p>Which is equivalent to 13&radic;7+67-5&radic;7?</p>\r\n', '<p>14&radic;7</p>\r\n', '<p>&nbsp;15&radic;7</p>\r\n', '<p>&nbsp;14 &radic;21</p>\r\n', '<p>15 &radic;21</p>\r\n', 1, '', '2021-06-15 08:52:15', '2021-06-28 08:30:06'),
(297, 1, 3, 3, '<p>If the value of 2x + 10 is one half the value of 5x + 30, what is x?</p>\r\n', '<p>10</p>\r\n', '<p>- 2</p>\r\n', '<p>&nbsp;-10</p>\r\n', '<p>2</p>\r\n', 1, '', '2021-06-15 08:52:38', '2021-06-28 08:30:06'),
(298, 1, 3, 3, '<p>If-10-8, what is the value of?</p>\r\n', '<p>10</p>\r\n', '<p>20</p>\r\n', '<p>30</p>\r\n', '<p>40</p>\r\n', 1, '', '2021-06-15 08:52:57', '2021-06-28 08:30:06'),
(299, 1, 3, 3, '<p>Which of the following is another way of writing the expression 3x - (5x + 4) + (-2x-3)?</p>\r\n', '<p>-4x-7</p>\r\n', '<p>&nbsp;4x+7</p>\r\n', '<p>&nbsp;-7x-4</p>\r\n', '<p>&nbsp;4x-7</p>\r\n', 1, '', '2021-06-15 08:53:22', '2021-06-28 08:30:06'),
(300, 1, 3, 3, '<p>Which of the following is already expressed in the simplest?</p>\r\n', '<p>x+y x+y</p>\r\n', '<p>&nbsp;x-y x&sup2;+2xy+y-&sup2;</p>\r\n', '<p>&nbsp;x+y</p>\r\n', '<p>&nbsp;(x+y)3 x+y</p>\r\n', 1, '', '2021-06-15 08:53:48', '2021-06-28 08:30:06'),
(301, 1, 2, 31, '<p>zx&nbsp; by&nbsp; cx&nbsp; dw</p>\r\n', '<p>za</p>\r\n', '<p>yb</p>\r\n', '<p>wd</p>\r\n', '<p>cx</p>\r\n', 1, '', '2021-06-15 08:53:56', '2021-06-28 08:30:06'),
(302, 1, 3, 3, '<p>The sum of two polynomials is -5x&sup3;+ 18x&sup3;+3x2-18. If one polynomial is -8x&sup3;+ 10x&sup3; - 5x&sup2; - 10, what is the other polynomial?</p>\r\n', '<p>3x+8+ 8x&sup2;8</p>\r\n', '<p>&nbsp;3x+88</p>\r\n', '<p>&nbsp;3x3+ 8x&sup2;- 8x</p>\r\n', '<p>3x&sup2; + 8x&sup3;+ 8x&sup2;</p>\r\n', 1, '', '2021-06-15 08:54:07', '2021-06-28 08:30:06'),
(303, 1, 3, 3, '<p>. What type of an angle pair is LA and ZB ifZA+ZB-180⁰?</p>\r\n', '<p>reflex angles</p>\r\n', '<p>&nbsp;obtuse angles</p>\r\n', '<p>supplementary angles</p>\r\n', '<p>&nbsp;complementary angles</p>\r\n', 1, '', '2021-06-15 08:54:31', '2021-06-28 08:30:06'),
(304, 1, 2, 31, '<p>10&nbsp; 21&nbsp; 12&nbsp; 28</p>\r\n', '<p>12</p>\r\n', '<p>10</p>\r\n', '<p>28</p>\r\n', '<p>21</p>\r\n', 1, '', '2021-06-15 08:54:37', '2021-06-28 08:30:06'),
(305, 1, 3, 3, '<p>Which decimal is equal to 1+0+500?</p>\r\n', '<p>1.5</p>\r\n', '<p>2.25</p>\r\n', '<p>&nbsp;0.75</p>\r\n', '<p>&nbsp;0.55</p>\r\n', 1, '', '2021-06-15 08:54:46', '2021-06-28 08:30:06'),
(306, 1, 3, 3, '<p>What is the sum of all two-digit numbers that which are divisible by 11?</p>\r\n', '<p>425</p>\r\n', '<p>&nbsp;445</p>\r\n', '<p>485</p>\r\n', '<p>495</p>\r\n', 1, '', '2021-06-15 08:55:03', '2021-06-28 08:30:06'),
(307, 1, 3, 3, '<p>. In which of the following quadrilaterals is one pair of the opposite sides NOT parallel?</p>\r\n', '<p>square</p>\r\n', '<p>rectangle</p>\r\n', '<p>&nbsp;rhombus</p>\r\n', '<p>Trapezoid</p>\r\n', 1, '', '2021-06-15 08:55:19', '2021-06-28 08:30:06'),
(308, 1, 2, 31, '<p>45&nbsp; 36&nbsp; a10&nbsp; b9</p>\r\n', '<p>54</p>\r\n', '<p>B9</p>\r\n', '<p>a10</p>\r\n', '<p>63</p>\r\n', 1, '', '2021-06-15 08:55:35', '2021-06-28 08:30:06'),
(309, 1, 3, 3, '<p>In the table below the equation that expresses the relationship between a and m is _____________.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:58.25pt\">\r\n			<p>a</p>\r\n			</td>\r\n			<td style=\"width:72.0pt\">\r\n			<p>4</p>\r\n			</td>\r\n			<td style=\"width:72.0pt\">\r\n			<p>-16</p>\r\n			</td>\r\n			<td style=\"width:81.0pt\">\r\n			<p>-64</p>\r\n			</td>\r\n			<td style=\"width:81.0pt\">\r\n			<p>-256</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:58.25pt\">\r\n			<p>m</p>\r\n			</td>\r\n			<td style=\"width:72.0pt\">\r\n			<p>8</p>\r\n			</td>\r\n			<td style=\"width:72.0pt\">\r\n			<p>32</p>\r\n			</td>\r\n			<td style=\"width:81.0pt\">\r\n			<p>128</p>\r\n			</td>\r\n			<td style=\"width:81.0pt\">\r\n			<p>512</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<p>a=<em>m</em><em>2</em></p>\r\n', '<p>m=<em>a</em><em>2</em></p>\r\n', '<p>a=2m</p>\r\n', '<p>m=2a</p>\r\n', 1, '', '2021-06-15 08:56:11', '2021-06-28 08:30:06'),
(310, 1, 2, 31, '<p>68&nbsp; AC&nbsp; QM Lk</p>\r\n', '<p>Ca</p>\r\n', '<p>Ac</p>\r\n', '<p>MQ</p>\r\n', '<p>kL</p>\r\n', 1, '', '2021-06-15 08:56:27', '2021-06-28 08:30:06'),
(311, 1, 3, 3, '<p>Solve for y in 3y-9=-18</p>\r\n', '<p>y = -1</p>\r\n', '<p>y = -2</p>\r\n', '<p>y = -4</p>\r\n', '<p>y = -3</p>\r\n', 1, '', '2021-06-15 08:56:35', '2021-06-28 08:30:06'),
(312, 1, 3, 3, '<p>Solve for y in 3y-9=-18</p>\r\n', '<p>y = -4</p>\r\n', '<p>y = -4</p>\r\n', '<p>y = -1</p>\r\n', '<p>y = -2</p>\r\n', 1, '', '2021-06-15 08:57:06', '2021-06-28 08:30:06'),
(313, 1, 2, 31, '<p>33&nbsp; 46&nbsp; 62&nbsp; 58</p>\r\n', '<p>64</p>\r\n', '<p>33</p>\r\n', '<p>46</p>\r\n', '<p>85</p>\r\n', 1, '', '2021-06-15 08:57:07', '2021-06-28 08:30:06'),
(314, 1, 3, 3, '<p>What is the sum of all two-digit numbers that which are divisible by 11?</p>\r\n', '<p>425</p>\r\n', '<p>445</p>\r\n', '<p>&nbsp;485</p>\r\n', '<p>495</p>\r\n', 1, '', '2021-06-15 08:57:29', '2021-06-28 08:30:06'),
(315, 1, 2, 31, '<p>CAE&nbsp; BEE&nbsp; DAE&nbsp; XEA</p>\r\n', '<p>EEB</p>\r\n', '<p>BEE</p>\r\n', '<p>EBE</p>\r\n', '<p>BEEB</p>\r\n', 1, '', '2021-06-15 08:58:31', '2021-06-28 08:30:06'),
(316, 1, 2, 31, '<p>7M&nbsp; M7&nbsp; 77&nbsp; MM</p>\r\n', '<p>M7</p>\r\n', '<p>77</p>\r\n', '<p>7M</p>\r\n', '<p>MM</p>\r\n', 1, '', '2021-06-15 08:59:06', '2021-06-28 08:30:06'),
(317, 1, 2, 31, '<p>32A&nbsp; A32&nbsp; B39&nbsp; 3B9</p>\r\n', '<p>32A</p>\r\n', '<p>3A2</p>\r\n', '<p>3B9</p>\r\n', '<p>9B3</p>\r\n', 1, '', '2021-06-15 08:59:54', '2021-06-28 08:30:06'),
(318, 1, 3, 32, '<p>Mike obtains 80%, 90%, 90% in his first three exams in Algebra. What should be his score to enable him to get an average of 87%?</p>\r\n', '<p>95%</p>\r\n', '<p>86%</p>\r\n', '<p>88%</p>\r\n', '<p>90%</p>\r\n', 1, '', '2021-06-15 09:00:07', '2021-06-28 08:30:06'),
(319, 1, 3, 32, '<p>Jaime needs 2 pieces of woods for this project. The lengths of the woods are 1<em>3/</em><em>4&nbsp;</em>m and <em>5/</em><em>8&nbsp;</em>m what is the total length of wood?</p>\r\n', '<p>1&nbsp;<em>2/</em><em>3&nbsp;</em>m</p>\r\n', '<p>1&nbsp;<em>1/</em><em>4&nbsp;</em>m</p>\r\n', '<p><em>2&nbsp;&nbsp;</em><em>1/</em><em>2&nbsp;</em>m</p>\r\n', '<p><em>2&nbsp;&nbsp;</em><em>3/</em><em>8&nbsp;</em>m</p>\r\n', 1, '', '2021-06-15 09:02:02', '2021-06-28 08:30:06'),
(320, 1, 3, 32, '<p>Trisha ate <em>1/</em><em>8&nbsp;</em>of the cake while Mae ate <em>1/</em><em>6</em>&nbsp;.What part of the cake was eaten by the two girls?</p>\r\n', '<p>1/7</p>\r\n', '<p>7/24</p>\r\n', '<p>1/48</p>\r\n', '<p>1/14</p>\r\n', 1, '', '2021-06-15 09:03:29', '2021-06-28 08:30:06'),
(321, 1, 3, 3, '<p>Karlo had 6 pieces of coin and 4 pieces of 25 centavos coin and pieces of 5peso coin. How much more would be need if he wanted to buy a notebook worth of P30.75.?</p>\r\n', '<p>30.75</p>\r\n', '<p>11.25</p>\r\n', '<p>25.50</p>\r\n', '<p>28.60</p>\r\n', 1, '', '2021-06-15 09:04:06', '2021-06-28 08:30:06'),
(322, 1, 3, 3, '<p>How much is spent for food if the Lamadrid family&rsquo;s monthly income is?</p>\r\n', '<p>P960.00</p>\r\n', '<p>P1,200.00</p>\r\n', '<p>P9,600.00</p>\r\n', '<p>P14,400.00</p>\r\n', 1, '', '2021-06-15 09:05:10', '2021-06-28 08:30:06'),
(323, 1, 3, 3, '<p>Five percent of the total income is allotted to miscellaneous expenses. Seventy-five percent of this amount is spent for transportation. How much spent for Transportation?</p>\r\n', '<p>P18,000.00</p>\r\n', '<p>P12,000.00</p>\r\n', '<p>P1,200.00</p>\r\n', '<p>P900.00</p>\r\n', 1, '', '2021-06-15 09:05:27', '2021-06-28 08:30:06'),
(324, 1, 2, 34, '<p>Which pair has exactly the same elements?</p>\r\n', '<p>390216&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 309216</p>\r\n', '<p>902163&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 902163</p>\r\n', '<p>216390&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 216392</p>\r\n', '<p>921063&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 360129</p>\r\n', 1, '', '2021-06-15 09:06:06', '2021-06-28 08:30:06'),
(325, 1, 3, 3, '<p>Where does the greatest amount of their income go?</p>\r\n', '<p>Food</p>\r\n', '<p>Clothing</p>\r\n', '<p>Miscellaneous</p>\r\n', '<p>Water and Electricity</p>\r\n', 1, '', '2021-06-15 09:07:20', '2021-06-28 08:30:06'),
(326, 1, 3, 3, '<p>I have several coins in my pocket amounting to P31.25, I took out some coins and I got three 5-peso coins, four 1-peso and two 25 centavo coins. How much money is left in my pocket?</p>\r\n', '<p>P19.50</p>\r\n', '<p>P18.25</p>\r\n', '<p>P12.75</p>\r\n', '<p>P11.75</p>\r\n', 1, '', '2021-06-15 09:07:44', '2021-06-28 08:30:06'),
(327, 1, 3, 3, '<p>A string measuring 40cm is divided in the ratio. What is the length of the longer piece?</p>\r\n', '<p>25 cm</p>\r\n', '<p>15 cm</p>\r\n', '<p>8 cm</p>\r\n', '<p>5 cm</p>\r\n', 1, '', '2021-06-15 09:08:03', '2021-06-28 08:30:06'),
(328, 1, 3, 3, '<p>Ava can read 2 pocket books of the same number of pages in 1 day. How many pocketbooks can she finish in 5 days?</p>\r\n', '<p>8</p>\r\n', '<p>10</p>\r\n', '<p>12</p>\r\n', '<p>14</p>\r\n', 1, '', '2021-06-15 09:08:15', '2021-06-28 08:30:06'),
(329, 1, 3, 3, '<p>Ana got 80% of the 60-item test in Mathematics. How many items did she answer correctly?</p>\r\n', '<p>75</p>\r\n', '<p>7.5</p>\r\n', '<p>48</p>\r\n', '<p>4.8</p>\r\n', 1, '', '2021-06-15 09:08:28', '2021-06-28 08:30:06'),
(330, 1, 3, 3, '<p>In a school fair, some of the participants are Grade V pupils. If there are 180 pupils, how many are Grade V?</p>\r\n', '<p>72</p>\r\n', '<p>7.2</p>\r\n', '<p>45</p>\r\n', '<p>4.5</p>\r\n', 1, '', '2021-06-15 09:08:44', '2021-06-28 08:30:06'),
(331, 1, 2, 34, '', '<p>0955707&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0559709</p>\r\n', '<p>1209471&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1247109</p>\r\n', '<p>8817412&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8412817</p>\r\n', '<p>1099604&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1099604</p>\r\n', 1, '', '2021-06-15 09:08:51', '2021-06-28 08:30:06'),
(332, 1, 3, 3, '<p>In a class of 50 pupils, 35 walk to get to school. What percent of pupils go to school by walking?</p>\r\n', '<p>14%</p>\r\n', '<p>7%</p>\r\n', '<p>70%</p>\r\n', '<p>30%</p>\r\n', 1, '', '2021-06-15 09:08:58', '2021-06-28 08:30:06'),
(333, 1, 3, 3, '<p>Mang Tomas sent 960 pomelo fruits to Manila. He packed 20 pomelo fruits in a box. How many box were used?</p>\r\n', '<p>46</p>\r\n', '<p>47</p>\r\n', '<p>48</p>\r\n', '<p>49</p>\r\n', 1, '', '2021-06-15 09:09:10', '2021-06-28 08:30:06'),
(334, 1, 3, 3, '<p>A ship model is made to scale of 1 centimeter to 2 meters. How long is the ship if the model is 30 centimeters?</p>\r\n', '<p>33 m</p>\r\n', '<p>60 m</p>\r\n', '<p>90 m</p>\r\n', '<p>130 m</p>\r\n', 1, '', '2021-06-15 09:09:32', '2021-06-28 08:30:06'),
(335, 1, 2, 34, '', '<p>victory gained&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; victory shared</p>\r\n', '<p>dividing wall&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; shared wall</p>\r\n', '<p>shared word&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; shared value</p>\r\n', '<p>loving God&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; loving God</p>\r\n', 1, '', '2021-06-15 09:09:44', '2021-06-28 08:30:06'),
(336, 1, 3, 3, '<p>A farmer sold 18 baskets of mangoes for P1,536.30. How much did each basket of mangoes cost?</p>\r\n', '<p>P8.55</p>\r\n', '<p>P80.55</p>\r\n', '<p>P85.35</p>\r\n', '<p>P853.50</p>\r\n', 1, '', '2021-06-15 09:09:56', '2021-06-28 08:30:06'),
(337, 1, 2, 34, '', '<p>paraphrased mission&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; paraphrased version</p>\r\n', '<p>paraphraed mission&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; paphrrased version</p>\r\n', '<p>paraphrased vision&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; paraphrased vision</p>\r\n', '<p>school mission&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; school vision</p>\r\n', 1, '', '2021-06-15 09:10:42', '2021-06-28 08:30:06'),
(338, 1, 3, 3, '<p>A recipe good for 9 people need 60ml of honey. If 9 people are to be served, how many millimeters of honey required?</p>\r\n', '<p>54 ml</p>\r\n', '<p>75 ml</p>\r\n', '<p>90 ml</p>\r\n', '<p>130 ml</p>\r\n', 1, '', '2021-06-15 09:10:47', '2021-06-28 08:30:06'),
(339, 1, 3, 3, '<p>A newly overhauled taxi covered a distance of 55 km in the first hour, 65 km in the second hour, 75 km in the third hour, and so on. How far did it cover during the seventh hour?</p>\r\n', '<p>115 km</p>\r\n', '<p>105 km</p>\r\n', '<p>135 km</p>\r\n', '<p>125 km</p>\r\n', 1, '', '2021-06-15 09:11:07', '2021-06-28 08:30:06'),
(340, 1, 2, 34, '', '<p>inexplicable way&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;inexplicable current</p>\r\n', '<p>electric current&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; electric current</p>\r\n', '<p>educational establishments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; educational stabishments</p>\r\n', '<p>articulate sounds&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; articulate sounds</p>\r\n', 1, '', '2021-06-15 09:11:37', '2021-06-28 08:30:06'),
(341, 1, 3, 3, '<p>. A farmer sold 18 baskets of mangoes for P1,536.30. How much did each basket of mangoes cost?</p>\r\n', '<p>P8.55</p>\r\n', '<p>P80.55</p>\r\n', '<p>P85.35</p>\r\n', '<p>P853.50</p>\r\n', 1, '', '2021-06-15 09:12:08', '2021-06-28 08:30:06'),
(342, 1, 3, 3, '<p>A ship model is made to scale of 1 centimeter to 2 meters. How long is the ship if the model is 30 centimeters?</p>\r\n', '<p>33 m</p>\r\n', '<p>60 m</p>\r\n', '<p>90 m</p>\r\n', '<p>130 m</p>\r\n', 1, '', '2021-06-15 09:12:33', '2021-06-28 08:30:06'),
(343, 1, 2, 34, '', '<p>heavy burden&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;heavy burden</p>\r\n', '<p>social regeneration&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;social mobility</p>\r\n', '<p>educational curriculum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; educational curriculums</p>\r\n', '<p>baby mood&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;babys mood</p>\r\n', 1, '', '2021-06-15 09:12:42', '2021-06-28 08:30:06'),
(344, 1, 2, 34, '', '<p>Saviour&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saviour</p>\r\n', '<p>before noon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; afternoon</p>\r\n', '<p>avenger&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; avengeers</p>\r\n', '<p>moonlight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; moonlight</p>\r\n', 1, '', '2021-06-15 09:13:27', '2021-06-28 08:30:06'),
(345, 1, 2, 34, '', '<p>Father&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Father</p>\r\n', '<p>Family Affair&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Famieies Afir</p>\r\n', '<p>beautiful butterfly&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; beautiful buterly</p>\r\n', '<p>fourty-seven&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; forty-seven</p>\r\n', 1, '', '2021-06-15 09:14:15', '2021-06-28 08:30:06'),
(346, 1, 2, 35, '<p>abandonment</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:19:15', '2021-06-28 08:30:06'),
(347, 1, 2, 35, '<p>&nbsp;illogically</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:19:34', '2021-06-28 08:30:06'),
(348, 1, 2, 35, '<p>illuminate</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:20:01', '2021-06-28 08:30:06'),
(349, 1, 2, 35, '<p>abstract</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:20:26', '2021-06-28 08:30:06'),
(350, 1, 2, 35, '<p>accrue</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:21:20', '2021-06-28 08:30:06'),
(351, 1, 2, 35, '<p>tackle</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:21:36', '2021-06-28 08:30:06'),
(352, 1, 2, 35, '<p>pagan</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:22:10', '2021-06-28 08:30:06'),
(353, 1, 2, 35, '<p>taboo</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:22:29', '2021-06-28 08:30:06'),
(354, 1, 5, 5, '<p>Mire <em>drew</em></p>\r\n', '<p>swamp</p>\r\n', '<p>forest</p>\r\n', '<p>mine</p>\r\n', '<p>secluded place</p>\r\n', 1, '', '2021-06-15 09:24:28', '2021-06-28 08:30:06'),
(355, 1, 2, 36, '<p>&nbsp;UV&nbsp; PQ&nbsp; KL&nbsp; FG&nbsp; __</p>\r\n', '<p>AB</p>\r\n', '<p>Ba</p>\r\n', '<p>BA</p>\r\n', '<p>Ab</p>\r\n', 1, '', '2021-06-15 09:24:31', '2021-06-28 08:30:06'),
(356, 1, 5, 5, '<p><em>Brief</em> history</p>\r\n', '<p>limited</p>\r\n', '<p>small</p>\r\n', '<p>little</p>\r\n', '<p>short</p>\r\n', 1, '', '2021-06-15 09:24:51', '2021-06-28 08:30:06'),
(357, 1, 5, 5, '<p>Embezzle attitude</p>\r\n', '<p>misappropriate</p>\r\n', '<p>balance</p>\r\n', '<p>remunerate</p>\r\n', '<p>clear</p>\r\n', 1, '', '2021-06-15 09:25:14', '2021-06-28 08:30:06'),
(358, 1, 5, 5, '<p>Vent door</p>\r\n', '<p>opening</p>\r\n', '<p>stodge</p>\r\n', '<p>end</p>\r\n', '<p>past tense of &quot;go&quot;</p>\r\n', 1, '', '2021-06-15 09:25:32', '2021-06-28 08:30:06'),
(359, 1, 2, 36, '<p>aAa&nbsp; eEe&nbsp; iIi&nbsp; oOo&nbsp; __</p>\r\n', '<p>UUU</p>\r\n', '<p>uUu</p>\r\n', '<p>Uuu</p>\r\n', '<p>uuU</p>\r\n', 1, '', '2021-06-15 09:25:40', '2021-06-28 08:30:06'),
(360, 1, 5, 5, '<p>August movie</p>\r\n', '<p>common</p>\r\n', '<p>ridiculous</p>\r\n', '<p>dignified</p>\r\n', '<p>petty</p>\r\n', 1, '', '2021-06-15 09:25:50', '2021-06-28 08:30:06'),
(361, 1, 5, 5, '<p>Canny model</p>\r\n', '<p>obstinate</p>\r\n', '<p>handsome</p>\r\n', '<p>stout</p>\r\n', '<p>clever</p>\r\n', 1, '', '2021-06-15 09:26:05', '2021-06-28 08:30:06'),
(362, 1, 5, 5, '<p>Alert police</p>\r\n', '<p>energetic</p>\r\n', '<p>observant</p>\r\n', '<p>intelligent</p>\r\n', '<p>watchful</p>\r\n', 1, '', '2021-06-15 09:26:26', '2021-06-28 08:30:06'),
(363, 1, 5, 5, '<p>Eccentric habits</p>\r\n', '<p>normal</p>\r\n', '<p>strange</p>\r\n', '<p>messy</p>\r\n', '<p>done</p>\r\n', 1, '', '2021-06-15 09:26:44', '2021-06-28 08:30:06'),
(364, 1, 2, 36, '<p>C33&nbsp; H43&nbsp; M53&nbsp; K63 __</p>\r\n', '<p>W73</p>\r\n', '<p>3W7</p>\r\n', '<p>7W3</p>\r\n', '<p>W37</p>\r\n', 1, '', '2021-06-15 09:26:48', '2021-06-28 08:30:06'),
(365, 1, 5, 5, '<p>The stream became murky</p>\r\n', '<p>cloudy</p>\r\n', '<p>bottomless</p>\r\n', '<p>clear</p>\r\n', '<p>good</p>\r\n', 1, '', '2021-06-15 09:26:58', '2021-06-28 08:30:06'),
(366, 1, 5, 5, '<p>The debris on the stadium floor.</p>\r\n', '<p>products</p>\r\n', '<p>papers</p>\r\n', '<p>trash</p>\r\n', '<p>sale</p>\r\n', 1, '', '2021-06-15 09:27:14', '2021-06-28 08:30:06'),
(367, 1, 5, 5, '<p>Censure players</p>\r\n', '<p>approve of&nbsp;</p>\r\n', '<p>criticize</p>\r\n', '<p>choose</p>\r\n', '<p>follow</p>\r\n', 1, '', '2021-06-15 09:27:33', '2021-06-28 08:30:06'),
(368, 1, 5, 5, '<p>Frugal in their shopping</p>\r\n', '<p>economical</p>\r\n', '<p>wasteful</p>\r\n', '<p>interested</p>\r\n', '<p>untimely</p>\r\n', 1, '', '2021-06-15 09:27:52', '2021-06-28 08:30:06'),
(369, 1, 5, 5, '<p>Alex usually looks unkempt</p>\r\n', '<p>orderly</p>\r\n', '<p>handsome</p>\r\n', '<p>messy</p>\r\n', '<p>choosy</p>\r\n', 1, '', '2021-06-15 09:28:09', '2021-06-28 08:30:06'),
(370, 1, 2, 36, '<p>K15&nbsp; L20&nbsp; M25&nbsp; N30&nbsp; __</p>\r\n', '<p>O33</p>\r\n', '<p>3O3</p>\r\n', '<p>O35</p>\r\n', '<p>3O5</p>\r\n', 1, '', '2021-06-15 09:28:14', '2021-06-28 08:30:06'),
(371, 1, 5, 5, '<p>I&#39;m looking for a unique gift for my boyfriend.</p>\r\n', '<p>example</p>\r\n', '<p>synonym</p>\r\n', '<p>one of a kind</p>\r\n', '<p>bad</p>\r\n', 1, '', '2021-06-15 09:28:28', '2021-06-28 08:30:06'),
(372, 1, 5, 5, '<p>Paglipana ng mga sakit</p>\r\n', '<p>Pagkalat</p>\r\n', '<p>Paggaling</p>\r\n', '<p>Paglaho</p>\r\n', '<p>Pagsaliksik</p>\r\n', 1, '', '2021-06-15 09:29:31', '2021-06-28 08:30:06'),
(373, 1, 5, 5, '<p>Maghunos ng kaalaman</p>\r\n', '<p>magsinungaling</p>\r\n', '<p>ipahayag</p>\r\n', '<p>kinilala</p>\r\n', '<p>ipagkait</p>\r\n', 1, '', '2021-06-15 09:29:48', '2021-06-28 08:30:06'),
(374, 1, 2, 36, '<p>. x5 &nbsp;&nbsp;x10&nbsp;&nbsp; x15&nbsp;&nbsp; x20&nbsp;&nbsp; __</p>\r\n', '<p>x0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n', '<p>X-25</p>\r\n', '<p>X20</p>\r\n', '<p>X25</p>\r\n', 1, '', '2021-06-15 09:29:57', '2021-06-28 08:30:06'),
(375, 1, 2, 36, '<p>18&nbsp;&nbsp; 27&nbsp;&nbsp; 36&nbsp;&nbsp; 45&nbsp;&nbsp; __</p>\r\n', '<p>54</p>\r\n', '<p>55</p>\r\n', '<p>58</p>\r\n', '<p>60</p>\r\n', 1, '', '2021-06-15 09:30:40', '2021-06-28 08:30:06'),
(376, 1, 5, 5, '<p>The stream became murky</p>\r\n', '<p>cloudy</p>\r\n', '<p>bottomless</p>\r\n', '<p>clear</p>\r\n', '<p>good</p>\r\n', 1, '', '2021-06-15 09:30:54', '2021-06-28 08:30:06'),
(377, 1, 5, 5, '<p>Alert police</p>\r\n', '<p>watchful</p>\r\n', '<p>intelligent</p>\r\n', '<p>normal</p>\r\n', '<p>strange</p>\r\n', 1, '', '2021-06-15 09:31:11', '2021-06-28 08:30:06'),
(378, 1, 5, 5, '<p>Vent door</p>\r\n', '<p>end</p>\r\n', '<p>stodge</p>\r\n', '<p>petty</p>\r\n', '<p>dignified</p>\r\n', 1, '', '2021-06-15 09:31:29', '2021-06-28 08:30:06'),
(379, 1, 2, 36, '<p>12345&nbsp;&nbsp; 23451&nbsp;&nbsp; 34512&nbsp;&nbsp; 45123</p>\r\n', '<p>14523</p>\r\n', '<p>41235</p>\r\n', '<p>51234</p>\r\n', '<p>52341</p>\r\n', 1, '', '2021-06-15 09:31:42', '2021-06-28 08:30:06'),
(380, 1, 5, 5, '<p><em>Brief</em> history</p>\r\n', '<p>small</p>\r\n', '<p>limited</p>\r\n', '<p>little</p>\r\n', '<p>short</p>\r\n', 1, '', '2021-06-15 09:31:51', '2021-06-28 08:30:06'),
(381, 1, 5, 5, '<p><em>Essential </em>needs</p>\r\n', '<p>basic</p>\r\n', '<p>valuable</p>\r\n', '<p>complete</p>\r\n', '<p>universal</p>\r\n', 1, '', '2021-06-15 09:33:16', '2021-06-28 08:30:06'),
(382, 1, 5, 5, '<p>Scientists are <em>cosmopolitan.</em></p>\r\n', '<p>intellectual</p>\r\n', '<p>intellectual</p>\r\n', '<p>intellectual</p>\r\n', '<p>intellectual</p>\r\n', 1, '', '2021-06-15 09:33:29', '2021-06-28 08:30:06'),
(383, 1, 5, 5, '<p>Form of <em>vanity.</em></p>\r\n', '<p>insanity</p>\r\n', '<p>pride</p>\r\n', '<p>worthlessness</p>\r\n', '<p>prosperity</p>\r\n', 1, '', '2021-06-15 09:33:50', '2021-06-28 08:30:06'),
(384, 1, 5, 5, '<p>Mire <em>drew</em></p>\r\n', '<p>swamp</p>\r\n', '<p>forest</p>\r\n', '<p>mine</p>\r\n', '<p>secluded place</p>\r\n', 1, '', '2021-06-15 09:34:21', '2021-06-28 08:30:06'),
(385, 1, 2, 36, '<p>&nbsp;UV&nbsp; PQ&nbsp; KL&nbsp; FG&nbsp; __</p>\r\n', '<p>AB</p>\r\n', '<p>DC</p>\r\n', '<p>DC</p>\r\n', '<p>TY</p>\r\n', 1, '', '2021-06-15 09:36:05', '2021-06-28 08:30:06'),
(386, 1, 2, 36, '<p>K15&nbsp; L20&nbsp; M25&nbsp; N30&nbsp; __</p>\r\n', '<p>GH</p>\r\n', '<p>FD</p>\r\n', '<p>LO</p>\r\n', '<p>PE</p>\r\n', 1, '', '2021-06-15 09:36:40', '2021-06-28 08:30:06'),
(387, 1, 2, 36, '<p>UV&nbsp; PQ&nbsp; KL&nbsp; FG&nbsp; __</p>\r\n', '<p>HK</p>\r\n', '<p>DK</p>\r\n', '<p>FL</p>\r\n', '<p>LI</p>\r\n', 1, '', '2021-06-15 09:36:54', '2021-06-28 08:30:06'),
(388, 1, 2, 36, '<p>UV&nbsp; PQ&nbsp; KL&nbsp; FG&nbsp; __</p>\r\n', '<p>LP</p>\r\n', '<p>LE</p>\r\n', '<p>LD</p>\r\n', '<p>dL</p>\r\n', 1, '', '2021-06-15 09:37:05', '2021-06-28 08:30:06'),
(389, 1, 2, 31, '<p>&nbsp;66&nbsp;&nbsp;&nbsp;&nbsp; 85&nbsp;&nbsp;&nbsp;&nbsp; m6&nbsp;&nbsp;&nbsp;&nbsp; 8n</p>\r\n', '<p>nn</p>\r\n', '<p>jj</p>\r\n', '<p>jj</p>\r\n', '<p>kk</p>\r\n', 1, '', '2021-06-15 09:37:42', '2021-06-28 08:30:06'),
(390, 1, 2, 31, '<p>&nbsp;66&nbsp;&nbsp;&nbsp;&nbsp; 85&nbsp;&nbsp;&nbsp;&nbsp; m6&nbsp;&nbsp;&nbsp;&nbsp; 8n</p>\r\n', '<p>uu</p>\r\n', '<p>oo</p>\r\n', '<p>pp</p>\r\n', '<p>gg</p>\r\n', 1, '', '2021-06-15 09:37:50', '2021-06-28 08:30:06'),
(391, 1, 2, 34, '', '<p>0955707&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0559709</p>\r\n', '<p>0955707&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0559709</p>\r\n', '<p>0955707&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0559709</p>\r\n', '<p>0955707&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0559709</p>\r\n', 1, '', '2021-06-15 09:38:19', '2021-06-28 08:30:06'),
(392, 1, 2, 35, '<p>abandonment</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:38:39', '2021-06-28 08:30:06'),
(393, 1, 2, 35, '<p>&nbsp;illogically</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:38:49', '2021-06-28 08:30:06'),
(394, 1, 2, 35, '<p>abstract</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:39:18', '2021-06-28 08:30:06'),
(395, 1, 2, 35, '<p>abandonment</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:39:26', '2021-06-28 08:30:06'),
(396, 1, 2, 35, '<p>taboo</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:39:32', '2021-06-28 08:30:06'),
(397, 1, 2, 35, '<p>abandonment</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:39:40', '2021-06-28 08:30:06'),
(398, 1, 2, 35, '<p>tackle</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:39:46', '2021-06-28 08:30:06'),
(399, 1, 2, 35, '<p>accrue</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:40:03', '2021-06-28 08:30:06'),
(400, 1, 2, 35, '<p>illuminate</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:40:11', '2021-06-28 08:30:06'),
(401, 1, 2, 35, '<p>pagan</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:40:16', '2021-06-28 08:30:06'),
(402, 1, 2, 35, '<p>&nbsp;illogically</p>\r\n', '', '', '', '', 1, '', '2021-06-15 09:40:23', '2021-06-28 08:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `question_set`
--

CREATE TABLE `question_set` (
  `qs_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `qs_id` int(11) NOT NULL,
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

INSERT INTO `strand_formula` (`sf_id`, `strand_id`, `qs_id`, `category1`, `category2`, `category3`, `category4`, `category5`, `category6`, `category7`, `category8`, `category9`, `category10`, `total_category`) VALUES
(1, 4, 1, 1, 2, 3, 0, 5, 0, 7, 8, 9, 0, 7),
(2, 3, 1, 1, 2, 3, 4, 0, 6, 7, 8, 0, 0, 7),
(3, 2, 1, 1, 0, 0, 0, 5, 6, 7, 8, 0, 0, 5),
(4, 1, 1, 1, 0, 3, 0, 5, 0, 7, 8, 0, 0, 5);

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
(1, 123123123, 'asterisk@gmail.com', '123123', 'Aaron', 'Ramirez', 'Roque', '', '1995-11-19', 25, '09956119643', 'Dr. Yanga College\'s Inc', 10, 'B', '2021 - 2022', 'General Academic', 'Humanities and Social Science', 'Active', '2021-05-25 07:13:23'),
(2, 345345345, 'gervie@gmail.com', '123123', 'Gervie', '', 'Felizardo', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'A', '2021 - 2022', 'Humanities and Social Science', 'General Academic', 'Active', '2021-05-31 05:58:34'),
(3, 123123123, 'rean@gmail.com', '123123', 'Rean', '', 'Valencia', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'A', '2021 - 2022', 'Science Technology Engineering and Mathematics', 'Accountancy Business and Management', 'Active', '2021-05-29 03:24:42'),
(4, 123123123, 'vincent@gmail.com', '123123', 'Vincent', '', 'Escala', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'B', '2021 - 2022', 'Science Technology Engineering and Mathematics', 'Accountancy Business and Management', 'Active', '2021-05-29 03:25:27'),
(5, 123123123, 'brenn@gmail.com', '123123', 'Brenn', '', 'Dela Cruz', '', '0000-00-00', 0, '', 'Dr. Yanga College\'s Inc.', 10, 'B', '2021 - 2022', 'General Academic', 'Science Technology Engineering and Mathematics', 'Active', '2021-05-29 03:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `main_cat` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `sub_instruction` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `qs_id`, `main_cat`, `sub_title`, `sub_instruction`, `date_created`, `date_updated`) VALUES
(3, 1, '3', 'NUMERICAL ABILITY', '<p><strong>Direction:&nbsp;&nbsp;</strong>This is a test to see how well and ow fast you can work with numbers.</p>\r\n', '2021-05-28 03:50:57', '2021-06-28 08:29:48'),
(4, 1, '4', 'SIMILARITIES AND DIFFERENCES', '<p><strong>Direction:&nbsp;</strong>&nbsp;Each items consists of drawings with letters A,B,C and D. All Drawing are essentianly alike <strong>except one </strong>which is defferent from the others in some small details . Find this drawing and shade the circle with the corresponding letter on the appropriate items number in your Answer Sheet</p>\r\n', '2021-05-28 04:12:45', '2021-06-28 08:29:48'),
(5, 1, '5', 'Vocabulary', '<p><strong>Direction:&nbsp;&nbsp;</strong>Which lettered option is similar in meaning to the underlined word in the phrase?</p>\r\n', '2021-05-28 04:29:00', '2021-06-28 08:29:48'),
(6, 1, '6', 'Science', '<p><strong>Direction:</strong></p>\r\n', '2021-05-28 04:45:57', '2021-06-28 08:29:48'),
(8, 1, '8', 'Non-Verbal', '<p>Direction: The symbols or figures at the left side of each items make up a set.</p>\r\n', '2021-05-28 04:56:23', '2021-06-28 08:29:48'),
(9, 1, '9', 'Entreprenurial', '<p>Direction:&nbsp;</p>\r\n', '2021-05-28 05:06:23', '2021-06-28 08:29:48'),
(10, 1, '1', '5 Items', '<p>&quot;If people could only be more selfless, this world would be a much bette place to live in. If people could only be more giving and would share the blessings with others, then this world would be less chaotic. If people wou only offer a helping hand to those who are needy rather than deprivir them of help, then there would be less hungry, impoverished, sich, ar unhappy people.&quot;</p>\r\n', '2021-06-10 10:54:35', '2021-06-28 08:29:48'),
(11, 1, '1', '3 Items', '<p>A British company relieving the dreariness of dieting has taken the ordinary pack of playing cards and invented a way of taking the gamble out of it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the Pack of Diets, each of the 52 cards has one day&#39;s diet - breakfast, lunch, tea, dinner - printed on its face. To provide variety, the four suits are divided into vegetarian, farm house, seafood and health-food diets.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Drawn up by dietitians, the cards have been checked and edited by a physician; if played seriously on a 1200 calorie daily diet, any seven cards will help the average person lose two pounds a week, it is claimed.</p>\r\n', '2021-06-10 11:17:43', '2021-06-28 08:29:48'),
(12, 1, '', '', '', '2021-06-10 11:18:00', '2021-06-28 08:29:48'),
(13, 1, '1', 'Items 9-11', '<p>In the year 1847, a doctor from Edinburg discovered that chloroform could be used to render people insensible to the pain of surgery. This was claimed by some people as one of the most significant discoveries of modern the doctor replied, &quot;My most valuable discovery was when I discovered myself a sinner and that Jesus Christ was my Savior&quot;.</p>\r\n', '2021-06-10 14:52:25', '2021-06-28 08:29:48'),
(14, 1, '1', 'Items 12-14', '<p>Alertness and sensitivity are the keys to good learning. These qualities help you to overcome distractions that work against good listening. Distractions occur because the brain operates much faster than people speak. To keep your mind from wandering, try to listen for facts and feelings and respond to both. Let the other person know that you are aware of the feelings being expressed. A good way to do this is to repeat those feelings in your own words.</p>\r\n', '2021-06-11 02:00:03', '2021-06-28 08:29:48'),
(15, 1, '1', 'Items 15-17', '<p>Because of the energy crisis, price of gasoline has been going up. With it, transportation fares have also increased. To help the energy crisis, people have turned to riding a bicycle instead of a bus, jeepney, or taxicab. Riding a bicycle is as good as riding a bus or jeepney.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the Philippines, students,don&#39;t ride to school on bicycles yet, but many</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>of them go cycling for fun running errands for their families. During summer</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>and on weekends, these boys and girls ride their bicycles. Every year, there are many vehicular accidents that happen not only to bicycle riders but to other vehicles as well. This may be caused by lack of knowledge on traffic rules and regulations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>All bicycle riders should know two important traffic rules. First, a cyclist</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>must stop at a blinking red light. Second, in heavy traffic areas, the cyclist</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>should walk his bicycle on the sidewalk.</p>\r\n', '2021-06-11 02:09:08', '2021-06-28 08:29:48'),
(16, 1, '1', 'Items 18-20', '<p>plant and animal community and the environment in which it liver are linked together to form a so-called ecosystem. Each ecosystem is made</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>up of living things - animals and plants - and non-living, or abiotic substances It can be broken up conveniently into four different components: (1) non-living (abiotic) substances as water, carbon dioxide, oxygen, nitrogen and various minerals; (2) producers are the plants that make food from inorganic substances - foods essential for both plants and animals; (3) consumers are the organisms that eat other organisms. They are also known as herbivores or vegetation eaters. Animals that feed on other animals are known as secondary consumen or carnivores (flesh-eaters). Animals that eat other animals are also known as predators as a bird that has dived on an earthworm may later become the victim of a snake; (4) decomposers are made up chiefly of tiny organisms such as bacteria and various fungi that obtain food from the dead bodies or waste products of other organisms.</p>\r\n', '2021-06-11 02:15:14', '2021-06-28 08:29:48'),
(17, 1, '5', 'Verbal Relationship', '', '2021-06-11 02:44:06', '2021-06-28 08:29:48'),
(20, 1, '9', '2 Items', '<p>Ivan, an electric engineer, had just returned from Kuwait. Being jobless, he planned to use his Php100,000.00 savings to raise chickens. Upon knowing this, his father decided to donate his 450-square-meter empty lot to his son to start the poultry business.</p>\r\n', '2021-06-15 06:28:10', '2021-06-28 08:29:48'),
(21, 1, '9', '2 Items', '<p>Below is the list of things to consider in determining the pricing of services (fee per hour) for putting up an Internet caf&eacute;:</p>\r\n\r\n<ul>\r\n	<li>Taxes</li>\r\n	<li>Utilities</li>\r\n	<li>Shop rental</li>\r\n	<li>Office equipment Available software</li>\r\n	<li>Broadband connection</li>\r\n	<li>Employees&#39; salaries and benefits</li>\r\n	<li>Wear and tear at the units/equipment</li>\r\n	<li>Miscellaneous (e.g., food or other extra services)<br />\r\n	<br />\r\n	Number of days operational and number of hours per day</li>\r\n</ul>\r\n', '2021-06-15 06:30:10', '2021-06-28 08:29:48'),
(22, 1, '9', '2 Items', '<p>Mr. and Mrs. Vallega are interested in getting a franchise from from the town&#39;s burger shop. The investment requirements for franchising the burger shop are as follows:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Franchise fee &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. Php. 158,000</p>\r\n\r\n<p>&nbsp;Construction ..................................................................... Php. 350,000</p>\r\n\r\n<p>&nbsp;Equipment and other supplier&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. Php. 1,100,000</p>\r\n\r\n<p>&nbsp;Rent (with deposit) ............................................................. Php. 75,000</p>\r\n\r\n<p>Merchandising materials&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. Php. 12,000</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The total estimated initial financial investment is approximately 1.6M, and the recovery period for the investment is 2 to 2.5 years. In addition, the physical area required for the burger shop is approximately 60 square meters with a frontage of at least 4.5 meters.</p>\r\n', '2021-06-15 06:35:52', '2021-06-28 08:29:48'),
(29, 1, '7', 'Paragraph Meaning', '', '2021-06-15 07:54:41', '2021-06-28 08:29:48'),
(31, 1, '2', 'INSPECTION', '<p>Example: Select the combination set that is exactly the same as the underlined set in the item.Example: Select the combination set that is exactly the same as the underlined set in the item.</p>\r\n', '2021-06-15 08:49:57', '2021-06-28 08:29:48'),
(32, 1, '3', 'PROBLEM SOLVING', '<p>Example:</p>\r\n\r\n<p>&nbsp; At what rate should the amount be invested to earn a simple interest of P450.00 annually?</p>\r\n\r\n<p>A. 9%</p>\r\n\r\n<p>B. 11%</p>\r\n\r\n<p>C. 13%</p>\r\n\r\n<p>D. 15%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To get the rate, divide the interest by principal, which gives the answer 15%. The answer therefore is letter D.</p>\r\n', '2021-06-15 08:59:34', '2021-06-28 08:29:48'),
(33, 1, '2', 'CODING', '<p>Directions: Each test item consists of the name of an object or material which you will classify according to the given code table.</p>\r\n', '2021-06-15 09:00:38', '2021-06-28 08:29:48'),
(34, 1, '2', 'SPEED AND ACCURACY ', '<p>Directions: Each item consists of four (4) pairs of numbers or phrases. Select the lettered pair that is exactly the same, then shade the circle corresponding to the letter you have chosen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For example: Which pair has exactly the same elements?</p>\r\n\r\n<p>1)</p>\r\n\r\n<p>A. 62382&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 62382</p>\r\n\r\n<p>B. 17490&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 17490</p>\r\n\r\n<p>C. 58219&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 58319</p>\r\n\r\n<p>D. 70067&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 70057</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The answer is letter B.</p>\r\n', '2021-06-15 09:03:23', '2021-06-28 08:29:48'),
(35, 1, '2', 'CLASSIFICATION ', '<p>DIRECTIONS: Classify the word in each item based on the options given below, the circle that corresponds to your answer in your Answer Sheet. vowel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Options:</p>\r\n\r\n<p>A. If the first letter of the word is a consonant and the final letter is</p>\r\n\r\n<p>B. If the second letter is the third letter is g, and the final letter is</p>\r\n\r\n<p>C. If the initial and the final letters are vowels.</p>\r\n\r\n<p>D. If the word does NOT fall under any A, B or C.</p>\r\n', '2021-06-15 09:16:14', '2021-06-28 08:29:48'),
(36, 1, '2', 'SEQUENCING ', '<p>DIRECTIONS: Below each series are four sets of paired letters or numbers from which the next pair of letters or numbers can be chosen following the pattern shown in the given series. Choose this set.</p>\r\n\r\n<p>Example:</p>\r\n\r\n<p>1.X CX D XEX</p>\r\n\r\n<p>A. E F</p>\r\n\r\n<p>B. X F</p>\r\n\r\n<p>C. FG</p>\r\n\r\n<p>D. F X</p>\r\n', '2021-06-15 09:23:35', '2021-06-28 08:29:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `audit_trails`
--
ALTER TABLE `audit_trails`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `question_set`
--
ALTER TABLE `question_set`
  ADD PRIMARY KEY (`qs_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `audit_trails`
--
ALTER TABLE `audit_trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `examinee_student`
--
ALTER TABLE `examinee_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT for table `question_set`
--
ALTER TABLE `question_set`
  MODIFY `qs_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
