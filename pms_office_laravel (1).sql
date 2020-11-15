-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2020 at 11:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_office_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `date`, `user_id`) VALUES
(1, '2020-09-08', 2),
(2, '2020-09-24', 2),
(3, '2020-08-25', 24),
(4, '2020-08-26', 24),
(5, '2020-08-27', 24),
(6, '2020-08-30', 24),
(7, '2020-08-31', 24),
(8, '2020-09-01', 24),
(9, '2020-09-02', 24),
(10, '2020-09-03', 24),
(11, '2020-09-06', 24),
(12, '2020-09-07', 24),
(13, '2020-09-08', 24),
(14, '2020-09-09', 24),
(15, '2020-09-10', 24),
(16, '2020-09-13', 24),
(17, '2020-09-14', 24),
(18, '2020-09-15', 24),
(19, '2020-09-16', 24),
(20, '2020-09-17', 24),
(21, '2020-09-20', 24),
(22, '2020-09-21', 24),
(23, '2020-09-22', 24),
(24, '2020-09-23', 24),
(25, '2020-09-24', 24),
(26, '2020-08-25', 12),
(27, '2020-08-26', 12),
(28, '2020-08-27', 12),
(29, '2020-08-30', 12),
(30, '2020-08-31', 12),
(31, '2020-09-01', 12),
(32, '2020-09-02', 12),
(33, '2020-09-03', 12),
(34, '2020-09-06', 12),
(35, '2020-09-07', 12),
(36, '2020-09-08', 12),
(37, '2020-09-09', 12),
(38, '2020-09-10', 12),
(39, '2020-09-13', 12),
(40, '2020-09-14', 12),
(41, '2020-09-15', 12),
(42, '2020-09-16', 12),
(43, '2020-09-17', 12),
(44, '2020-09-20', 12),
(45, '2020-09-21', 12),
(46, '2020-09-22', 12),
(47, '2020-09-23', 12),
(48, '2020-09-24', 12),
(49, '2020-09-10', 33),
(50, '2020-09-20', 33),
(51, '2020-09-24', 33),
(52, '2020-09-02', 22),
(53, '2020-09-03', 22),
(54, '2020-09-08', 22),
(55, '2020-09-09', 22),
(56, '2020-09-16', 22),
(57, '2020-09-20', 22),
(58, '2020-09-23', 22),
(59, '2020-09-24', 22),
(60, '2020-08-25', 9),
(61, '2020-08-26', 9),
(62, '2020-08-27', 9),
(63, '2020-08-30', 9),
(64, '2020-08-31', 9),
(65, '2020-09-01', 9),
(66, '2020-09-02', 9),
(67, '2020-09-03', 9),
(68, '2020-09-06', 9),
(69, '2020-09-07', 9),
(70, '2020-09-08', 9),
(71, '2020-09-09', 9),
(72, '2020-09-10', 9),
(73, '2020-09-13', 9),
(74, '2020-09-14', 9),
(75, '2020-09-15', 9),
(76, '2020-09-16', 9),
(77, '2020-09-17', 9),
(78, '2020-09-20', 9),
(79, '2020-09-21', 9),
(80, '2020-09-22', 9),
(81, '2020-09-23', 9),
(82, '2020-09-24', 9),
(83, '2020-08-25', 30),
(84, '2020-08-26', 30),
(85, '2020-08-27', 30),
(86, '2020-08-30', 30),
(87, '2020-08-31', 30),
(88, '2020-09-01', 30),
(89, '2020-09-02', 30),
(90, '2020-09-03', 30),
(91, '2020-09-06', 30),
(92, '2020-09-07', 30),
(93, '2020-09-08', 30),
(94, '2020-09-09', 30),
(95, '2020-09-10', 30),
(96, '2020-09-13', 30),
(97, '2020-09-14', 30),
(98, '2020-09-15', 30),
(99, '2020-09-16', 30),
(100, '2020-09-17', 30),
(101, '2020-09-20', 30),
(102, '2020-09-21', 30),
(103, '2020-09-22', 30),
(104, '2020-09-23', 30),
(105, '2020-09-24', 30),
(106, '2020-09-24', 35),
(107, '2020-09-27', 35),
(108, '2020-09-27', 35),
(109, '2020-09-28', 35),
(110, '2020-09-29', 35),
(111, '2020-09-30', 35),
(116, '2020-09-28', 2),
(117, '2020-09-28', 4),
(118, '2020-09-28', 7),
(119, '2020-09-28', 8),
(120, '2020-09-28', 9),
(121, '2020-09-28', 10),
(122, '2020-09-28', 11),
(123, '2020-09-28', 13),
(124, '2020-09-28', 23),
(125, '2020-09-28', 25),
(126, '2020-09-28', 27),
(127, '2020-09-28', 28),
(128, '2020-09-28', 30),
(129, '2020-09-28', 31),
(130, '2020-09-28', 32),
(131, '2020-09-28', 33),
(132, '2020-09-28', 34),
(133, '2020-09-28', 36),
(134, '2020-09-21', 4),
(135, '2020-09-21', 7),
(136, '2020-09-21', 8),
(137, '2020-09-21', 10),
(138, '2020-09-21', 11),
(139, '2020-09-21', 27),
(140, '2020-09-21', 28),
(141, '2020-09-21', 32),
(142, '2020-08-25', 11),
(143, '2020-08-26', 11),
(144, '2020-08-27', 11),
(145, '2020-08-30', 11),
(146, '2020-08-31', 11),
(147, '2020-09-01', 11),
(148, '2020-09-02', 11),
(149, '2020-09-03', 11),
(150, '2020-09-06', 11),
(151, '2020-09-07', 11),
(152, '2020-09-08', 11),
(153, '2020-09-09', 11),
(154, '2020-09-10', 11),
(155, '2020-09-13', 11),
(156, '2020-09-14', 11),
(157, '2020-09-15', 11),
(158, '2020-09-16', 11),
(159, '2020-09-17', 11),
(160, '2020-09-20', 11),
(161, '2020-09-22', 11),
(162, '2020-09-23', 11),
(163, '2020-09-24', 11),
(164, '2020-09-27', 33),
(165, '2020-09-29', 33),
(166, '2020-09-30', 33),
(171, '2020-09-27', 12),
(172, '2020-09-28', 12),
(173, '2020-09-29', 12),
(174, '2020-09-30', 12),
(179, '2020-09-27', 34),
(180, '2020-09-29', 34),
(181, '2020-09-30', 34),
(186, '2020-09-27', 34),
(187, '2020-09-28', 34),
(188, '2020-09-29', 34),
(189, '2020-09-30', 34),
(191, '2020-09-27', 34),
(192, '2020-09-28', 34),
(193, '2020-09-29', 34),
(194, '2020-09-30', 34),
(199, '2020-09-27', 34),
(200, '2020-09-28', 34),
(201, '2020-09-29', 34),
(202, '2020-09-30', 34),
(204, '2020-09-25', 34),
(205, '2020-09-26', 34),
(228, '2020-10-01', 34),
(229, '2020-10-07', 34),
(230, '2020-10-08', 34),
(231, '2020-10-11', 34),
(232, '2020-10-12', 34),
(233, '2020-10-13', 34),
(234, '2020-10-04', 35),
(235, '2020-10-05', 35),
(236, '2020-10-06', 35),
(237, '2020-10-07', 35),
(238, '2020-10-08', 35),
(239, '2020-10-11', 35),
(240, '2020-10-12', 35),
(241, '2020-10-13', 35),
(242, '2020-09-14', 36),
(243, '2020-09-24', 36),
(244, '2020-09-24', 34);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `martial_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `employment_id` int(11) DEFAULT NULL,
  `set_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`id`, `fullname`, `company`, `city`, `country`, `locale`, `address`, `phone`, `avatar`, `mobile`, `skype`, `language`, `joining_date`, `present_address`, `date_of_birth`, `gender`, `martial_status`, `father_name`, `mother_name`, `passport`, `direction`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `designation_id`, `employment_id`, `set_time`) VALUES
(2, 'Mohab Mostafa Sayed ', '0', NULL, NULL, 'en_US', '-', '+201006057763', 'uploads/me.jpg', '+201006057763', '', 'english', '2019-01-01', '', '1986-02-23', 'male', 'married', 'Mostafa', 'Mostafa', '', 'ltr', NULL, NULL, NULL, 2, 1, 3, NULL),
(3, 'Mohamed Ayman Mohamed ', '0', NULL, NULL, 'ar_EG', '-', '+201550131255', 'uploads/PP.png', '+20114713542', '', 'english', '2019-07-01', '10th of Ramadan city, Al-Sharqyia, Egypt', '1995-05-16', 'male', 'unmarried', '--', '--', '', 'ltr', NULL, NULL, NULL, 3, 1, 6, NULL),
(4, 'Ahmed Abo-Zeid Mosalamy ', '0', NULL, NULL, 'ar_EG', '-', '+201069606061', 'uploads/pp.jpg', '+201069606061', '', 'english', '2019-07-01', 'Helmiat El-Zitone - Cairo, Egypt', '1991-01-22', 'male', 'married', '--', '--', '', 'ltr', NULL, NULL, NULL, 4, 15, 5, NULL),
(6, 'Wael El Taweel', '0', NULL, NULL, 'ar_EG', '-', '201097904390', 'uploads/1375919_652482398138073_2087212599_n.jpg', '201068608084', '', 'english', '2019-09-01', 'Giza, Egypt', '1984-03-07', 'male', 'married', '--', '--', '', 'ltr', NULL, NULL, NULL, 6, 2, 4, NULL),
(7, 'CFO', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 7, 8, 2, NULL),
(8, 'Ismael Effat', '1', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '+201228585555', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 8, NULL, 17, NULL),
(9, 'Ahmed Ayad', '2', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '+971 551900600', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 9, NULL, 15, NULL),
(10, 'Ahmed Emara', '3', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '+971545843777', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 10, NULL, 16, NULL),
(11, 'Ahmed Ayad', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/ayad_pp.jpg', '', '', 'english', '2019-01-01', '', '1975-04-01', 'male', 'divorced', 'Amin', 'Salwa', '', 'ltr', NULL, NULL, NULL, 11, 14, 1, NULL),
(12, 'Mohamed Saleh Hassan', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/201912223122_204431.png', '+201003355949', '', 'english', '2019-09-22', 'Cairo, Egypt', NULL, 'male', 'married', '--', '--', '', 'ltr', NULL, NULL, NULL, 13, 17, 8, NULL),
(13, 'Sherif Abd El Hamid Ahmed', '0', NULL, NULL, 'ar_EG', '-', '+201090104345', 'uploads/default_avatar.jpg', '', '', 'english', '2019-09-08', 'Cairo, Egypt', NULL, 'male', 'married', '--', '--', '', 'ltr', NULL, NULL, NULL, 14, 18, 7, NULL),
(14, 'Ahmed Abd Elfatah Ragab', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/b524cdbc-1b9f-40b5-bd5e-753d9a4de451.jpg', '+201101004181', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 15, 21, 10, NULL),
(15, 'Reda Mohamed El Sayed ', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 16, 19, 9, NULL),
(19, 'Ahmed Fawzy El Husini', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/69261502_2968224319916431_4470786364991864832_n.jpg', '', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 20, 21, 11, NULL),
(20, 'Ghada Youssef Wagih', '0', NULL, NULL, 'ar_EG', '-', '+201023326488', 'uploads/ghad.png', '+201023326488', '', 'english', '2019-11-17', '', '1982-04-06', 'female', 'unmarried', 'Wagih', 'Ghada', '', 'ltr', NULL, NULL, NULL, 21, 3, 12, NULL),
(21, 'Norhan Mounir', '0', NULL, NULL, 'ar_EG', '-', '01553809196', 'uploads/bdef14cc-fcf0-4887-a2e1-6a9d343f96f2.jpg', '+201005516664', '', 'english', '2019-01-19', '', '1996-01-27', 'female', 'unmarried', 'Mounir', 'Norhan', '', 'ltr', NULL, NULL, NULL, 22, 25, 14, NULL),
(22, 'Marwa Sayed Mostafa', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/Romantic-Birthday-Wishes-For-Husband-1-1-1024x637.jpg', '01017286932', '', 'english', '2019-01-18', '', '1996-01-27', 'female', 'unmarried', 'Elsayed', 'Marwa', '', 'ltr', NULL, NULL, NULL, 23, 26, 13, NULL),
(23, 'Shrouk Elshal', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/50610848_2447557498651027_4591655630988640256_n.jpg', '01120176660', '', 'english', '2020-02-16', '5th settlement ', '1995-04-01', 'female', 'unmarried', 'Usama', 'Shrouk', '', 'ltr', NULL, NULL, NULL, 24, 27, 18, NULL),
(24, 'Moaaz Radwan Ahmed', '0', NULL, NULL, 'ar_EG', '-', '', 'uploads/82165400_10219212036264459_924576673507049472_n.jpg', '+201016297228', '', 'english', '2020-02-13', '', '1995-05-22', 'male', 'unmarried', 'Radwan', 'None', '', 'ltr', NULL, NULL, NULL, 25, 30, 15, NULL),
(26, 'camps', '37', NULL, NULL, 'ar_EG', '-', '+5167', 'uploads/default_avatar.jpg', '+680354', 'camps', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'rtl', NULL, NULL, NULL, 27, 0, NULL, NULL),
(27, 'Nehal Gamal', '42', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '+20011 25444977', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 28, 0, NULL, NULL),
(28, 'Ahmed Radwan', '0', NULL, NULL, 'ar_EG', '-', '+201144836800', 'uploads/formal.jpg', '', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 29, 23, 0, NULL),
(29, 'Mr mahmoud abdalla ', '43', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '011554857786', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 30, 0, NULL, NULL),
(30, 'Mohammed Ibrahim Hamed', '0', NULL, NULL, 'ar_EG', '-', '00201006143107', 'uploads/hamed.jpg', '', '', 'english', '2020-05-17', '', '1994-10-01', 'male', 'unmarried', 'Ibrahim', 'None', '', 'ltr', NULL, NULL, NULL, 31, 15, 31, NULL),
(31, 'Ahmed Faruk ', '44', NULL, NULL, 'ar_EG', '-', '', 'uploads/default_avatar.jpg', '00 201091032423', '', 'english', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 'ltr', NULL, NULL, NULL, 32, 0, NULL, NULL),
(32, 'Mahmoud Saied El Bokl', '0', NULL, NULL, 'ar_EG', '-', '00201028824642', 'uploads/1024px-Circle-icons-profile_svg.png', '', '', 'english', '2020-06-01', '', '1995-06-29', 'male', 'unmarried', 'Saieed', 'None', '', 'ltr', NULL, NULL, NULL, 33, 29, 33, NULL),
(33, 'Mostafa Gamal Abdelsatar', '0', NULL, NULL, 'ar_EG', '-', '00201062164867', 'uploads/default_avatar.jpg', '00201142400557', '', 'english', '2020-08-13', '', '1996-06-01', 'male', 'unmarried', 'Gamal', 'None', '', 'ltr', NULL, NULL, NULL, 34, 23, 34, NULL),
(34, 'ShadyOsama Fawzy', '0', NULL, NULL, 'ar_EG', '-', '00201123408535', 'uploads/default_avatar.jpg', '', '', 'english', '2020-08-10', '', '1998-02-28', 'male', 'unmarried', 'Osama', 'None', '', 'ltr', NULL, NULL, NULL, 35, 26, 35, NULL),
(35, 'Ali Emad Eldamiry', '0', NULL, NULL, 'ar_EG', '-', '00201097034883', 'uploads/default_avatar.jpg', NULL, NULL, 'english', '2020-08-10', NULL, '1996-06-03', 'male', 'unmarried', 'Emad', 'None', NULL, 'ltr', NULL, '2020-11-03 14:52:04', NULL, 36, 31, 36, NULL),
(36, 'sjadvscvc', 'dasfvbcv', 'sadsfdv', 'wsdsfdvbv', 'sdfv', 'sadsfdvcb', 'sdasadsfvb', NULL, 'sdscvcbv', 'sadsfbv bq', 'sadsfbvb', '2020-11-18', 'aDSAVCCBV', '2020-11-03', 'male', 'unmarried', 'WDSFDF', 'WSADSFFBV', 'SDSFBV', 'ltr', '2020-11-03 17:10:01', '2020-11-03 17:10:01', NULL, 3, 3, NULL, NULL),
(37, 'bnmnbnk.m,', 'mnmdnvcl,', 'mnbdkjvbn k', 'jmbjkmbk,j', 'nbjhmb', 'kjhb', 'j,mb', NULL, ',jkjbjm', 'b,jmb', 'jkjm', '2020-11-03', 'kj,hl', '2020-11-03', 'male', 'unmarried', 'kjjh,jlk', 'jklkjh', 'kjhkj,hn', 'ltr', '2020-11-03 17:15:39', '2020-11-03 17:15:39', NULL, 6, 2, 202, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_permission`
--

CREATE TABLE `account_permission` (
  `acount_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `advance_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduct_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` longtext COLLATE utf8mb4_unicode_ci,
  `request_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `all_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `description`, `status`, `view_status`, `start_date`, `end_date`, `all_client`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'sadsfdvfbv', NULL, 'unpublished', 12, '2020-10-07', NULL, NULL, '2020-10-16 09:08:30', '2020-10-16 09:08:30', NULL, 3),
(2, 'dsbvbvnb adsfbv', '<p>adsfvcbv fv cadsbv c&nbsp;</p>', 'unpublished', 2, '2020-10-20', NULL, NULL, '2020-10-16 17:00:19', '2020-10-16 17:00:19', NULL, 3),
(3, 'adsfjbkvu;jhmne', '<p>dv.j ,n gkrn dxjn lkdngbc kjv&nbsp;</p>', 'unpublished', 2, '2020-10-14', NULL, NULL, '2020-10-16 17:05:12', '2020-10-16 17:05:12', NULL, 7),
(4, 'adsfjbkvu;jhmne', '<p>dv.j ,n gkrn dxjn lkdngbc kjv&nbsp;</p>', 'unpublished', 2, '2020-10-14', NULL, NULL, '2020-10-16 17:05:25', '2020-10-16 17:05:25', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `attendance_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clocking_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `issue_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `severity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reproducibility` longtext COLLATE utf8mb4_unicode_ci,
  `reporter` int(11) DEFAULT NULL,
  `client_visible` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `opportunities_id` int(10) UNSIGNED DEFAULT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bug_permission`
--

CREATE TABLE `bug_permission` (
  `bug_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `primary_contact` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_note` longtext COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hosting_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'my comment',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_menus`
--

CREATE TABLE `client_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `key`, `value`) VALUES
(1, 'company_name', 'One Tec Group LLC'),
(2, 'company_address', '8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt'),
(3, 'company_city', 'Cairo'),
(4, 'company_country', 'Egypt'),
(5, 'company_domain', 'https://onetecgroup.com'),
(6, 'company_email', 'info@onetecgroup.com'),
(7, 'company_legal_name', ''),
(8, 'company_logo', 'uploads/Picture1.png'),
(9, 'company_phone_2', ''),
(10, 'company_phone', '+201555836995'),
(11, 'company_vat', '14'),
(12, 'company_zip_code', '1185');

-- --------------------------------------------------------

--
-- Table structure for table `crm_customers`
--

CREATE TABLE `crm_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_documents`
--

CREATE TABLE `crm_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_notes`
--

CREATE TABLE `crm_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `added_by` int(11) DEFAULT NULL,
  `is_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_statuses`
--

CREATE TABLE `crm_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_statuses`
--

INSERT INTO `crm_statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lead', '2020-09-27 18:13:21', '2020-09-27 18:13:21', NULL),
(2, 'Customer', '2020-09-27 18:13:21', '2020-09-27 18:13:21', NULL),
(3, 'Partner', '2020-09-27 18:13:21', '2020-09-27 18:13:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendances`
--

CREATE TABLE `daily_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `clock_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clock_out` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `absent` int(11) DEFAULT NULL,
  `vacation` int(11) DEFAULT NULL,
  `holiday` int(11) DEFAULT NULL,
  `created_day` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_attendances`
--

INSERT INTO `daily_attendances` (`id`, `clock_in`, `clock_out`, `absent`, `vacation`, `holiday`, `created_day`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, '09:55:14', '09:55:14', NULL, NULL, NULL, NULL, '2020-10-01 06:36:58', '2020-10-01 06:36:58', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_settings`
--

CREATE TABLE `dashboard_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `col` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `for_staff` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailbox` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unread_email` int(11) DEFAULT NULL,
  `delete_email_after_import` int(11) DEFAULT NULL,
  `last_postmaster_run` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `department_head_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `email`, `encryption`, `host`, `username`, `password`, `mailbox`, `unread_email`, `delete_email_after_import`, `last_postmaster_run`, `created_at`, `updated_at`, `deleted_at`, `department_head_id`) VALUES
(1, 'Software & App. Development', 'helpdesk@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'helpdesk@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', 0, 0, NULL, NULL, NULL, NULL, 25),
(2, 'Information Technology', 'support@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'support@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', 0, 0, NULL, NULL, NULL, NULL, 6),
(3, 'Sales & Marketing', 'sales@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'sales@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', 0, 0, NULL, NULL, NULL, NULL, 15),
(4, 'Finance', 'finance@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'finance@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', 0, 0, NULL, NULL, NULL, NULL, 7),
(5, 'Human Resources', 'hr@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'hr@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', 0, 0, NULL, NULL, NULL, NULL, NULL),
(7, 'Board Members', 'ceo@onetecgroup.com', '', '', 'ceo@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', 0, 0, NULL, NULL, NULL, NULL, 11),
(8, 'CEO', NULL, '', '', '', '', '', 0, 0, NULL, NULL, NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `created_at`, `updated_at`, `deleted_at`, `department_id`) VALUES
(1, 'Operations Manager', NULL, NULL, NULL, 1),
(2, 'IT & Network Manager', NULL, NULL, NULL, 2),
(3, 'Coordinator', NULL, NULL, NULL, 3),
(4, 'Accountant', NULL, NULL, NULL, 4),
(5, 'System Administration', NULL, NULL, NULL, 1),
(6, 'IT Technical Support', NULL, NULL, NULL, 2),
(7, 'Marketing', NULL, NULL, NULL, 3),
(8, 'CFO', NULL, NULL, NULL, 7),
(9, 'Recruitment', NULL, NULL, NULL, 5),
(11, 'Training & Development', NULL, NULL, NULL, 5),
(12, 'Help Desk', NULL, NULL, NULL, 1),
(13, 'Technical Support', NULL, NULL, NULL, 1),
(14, 'CEO', NULL, NULL, NULL, 7),
(15, 'Senior Back End Developer', NULL, NULL, NULL, 1),
(16, 'Senior Android Developer', NULL, NULL, NULL, 1),
(17, 'Site Engineer', NULL, NULL, NULL, 2),
(18, 'Technician', NULL, NULL, NULL, 2),
(19, 'Electrician', NULL, NULL, NULL, 2),
(20, 'Sales Account Manager', NULL, NULL, NULL, 3),
(21, 'Senior Sales Account Manager', NULL, NULL, NULL, 3),
(23, 'Product UX/ UI Designer', NULL, NULL, NULL, 1),
(24, 'QA Web & Mobile Apps Tester', NULL, NULL, NULL, 1),
(25, 'Telesales', NULL, NULL, NULL, 3),
(26, 'Junior Back End Developer', NULL, NULL, NULL, 1),
(27, 'Junior Sales', NULL, NULL, NULL, 3),
(28, 'Back End Developer', NULL, NULL, NULL, 1),
(29, 'Mobile App Developer', NULL, NULL, NULL, 1),
(30, 'Software Team Leader', NULL, NULL, NULL, 1),
(31, 'Junior Front-End Developer', NULL, NULL, NULL, 1),
(32, 'CEO', NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `designation_permission`
--

CREATE TABLE `designation_permission` (
  `designation_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban_reason` longtext COLLATE utf8mb4_unicode_ci,
  `new_password_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_password_requested` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `online_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_email_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_encription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_additional_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_postmaster_run` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_path_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketting_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacation_balance` int(11) DEFAULT NULL,
  `vacation_counterdown` int(11) DEFAULT NULL,
  `date_of_join` date DEFAULT NULL,
  `date_of_insurance` date DEFAULT NULL,
  `vacation_verified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_awards`
--

CREATE TABLE `employee_awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `award_amount` decimal(15,2) NOT NULL,
  `view_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `given_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_banks`
--

CREATE TABLE `employee_banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_permission`
--

CREATE TABLE `employee_permission` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_requests`
--

CREATE TABLE `employee_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` date DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `day_hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending' COMMENT '0=pending, 1=accepted. 2=rejected',
  `comments` longtext COLLATE utf8mb4_unicode_ci,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `request_type` enum('survey','client_meeting') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_requests`
--

INSERT INTO `employee_requests` (`id`, `day`, `from_time`, `to_time`, `day_hour`, `status`, `comments`, `approved_by`, `users`, `request_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '2020-11-18', NULL, NULL, 'day', 'pending', 'sdadsvdbv b', '1', '[\"2\",\"10\"]', 'survey', '2020-11-13 11:24:49', '2020-11-13 18:09:43', NULL),
(5, '2020-11-18', NULL, NULL, 'day', 'pending', 'sdadsvdbv b', NULL, '[\"2\",\"4\",\"8\"]', 'client_meeting', '2020-11-13 11:25:12', '2020-11-13 11:25:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expense_category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint_attendances`
--

CREATE TABLE `fingerprint_attendances` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fingerprint_attendances`
--

INSERT INTO `fingerprint_attendances` (`id`, `user_id`, `date`, `time`, `type`, `created_at`, `updated_at`) VALUES
(1, 23, '2020-09-21', '16:57:20', 'Check-in', NULL, NULL),
(2, 36, '2020-09-21', '16:56:50', 'Check-in', NULL, NULL),
(3, 25, '2020-09-21', '16:56:44', 'Check-in', NULL, NULL),
(4, 31, '2020-09-21', '16:56:41', 'Check-in', NULL, NULL),
(5, 36, '2020-09-21', '16:53:48', 'Check-in', NULL, NULL),
(6, 35, '2020-09-21', '16:53:31', 'Check-in', NULL, NULL),
(7, 25, '2020-09-21', '16:53:23', 'Check-in', NULL, NULL),
(8, 34, '2020-09-21', '16:53:05', 'Check-in', NULL, NULL),
(9, 31, '2020-09-21', '16:51:19', 'Check-in', NULL, NULL),
(10, 33, '2020-09-21', '16:51:05', 'Check-in', NULL, NULL),
(11, 13, '2020-09-21', '16:48:26', 'Check-in', NULL, NULL),
(12, 34, '2020-09-21', '16:47:36', 'Check-in', NULL, NULL),
(13, 2, '2020-09-21', '16:46:13', 'Check-in', NULL, NULL),
(14, 2, '2020-09-21', '09:36:35', 'Check-in', NULL, NULL),
(15, 13, '2020-09-21', '09:26:22', 'Check-in', NULL, NULL),
(16, 22, '2020-09-21', '09:26:05', 'Check-in', NULL, NULL),
(17, 33, '2020-09-21', '09:02:17', 'Check-in', NULL, NULL),
(18, 35, '2020-09-21', '08:44:30', 'Check-in', NULL, NULL),
(19, 25, '2020-09-21', '08:43:11', 'Check-in', NULL, NULL),
(20, 36, '2020-09-21', '08:39:44', 'Check-in', NULL, NULL),
(21, 34, '2020-09-21', '08:39:35', 'Check-in', NULL, NULL),
(22, 34, '2020-09-21', '08:39:34', 'Check-in', NULL, NULL),
(23, 31, '2020-09-21', '08:39:23', 'Check-in', NULL, NULL),
(24, 23, '2020-09-21', '08:39:19', 'Check-in', NULL, NULL),
(25, 23, '2020-09-20', '16:54:05', 'Check-out', NULL, NULL),
(26, 31, '2020-09-20', '16:48:18', 'Check-out', NULL, NULL),
(27, 34, '2020-09-20', '16:46:55', 'Check-out', NULL, NULL),
(28, 36, '2020-09-20', '16:46:40', 'Check-out', NULL, NULL),
(29, 35, '2020-09-20', '16:45:42', 'Check-out', NULL, NULL),
(30, 13, '2020-09-20', '16:35:09', 'Check-out', NULL, NULL),
(31, 2, '2020-09-20', '16:35:01', 'Check-in', NULL, NULL),
(32, 13, '2020-09-20', '09:45:03', 'Check-in', NULL, NULL),
(33, 2, '2020-09-20', '09:27:58', 'Check-in', NULL, NULL),
(34, 23, '2020-09-20', '09:01:55', 'Check-in', NULL, NULL),
(35, 31, '2020-09-20', '08:52:02', 'Check-in', NULL, NULL),
(36, 34, '2020-09-20', '08:41:15', 'Check-in', NULL, NULL),
(37, 35, '2020-09-20', '08:36:59', 'Check-in', NULL, NULL),
(38, 36, '2020-09-20', '08:29:19', 'Check-in', NULL, NULL),
(39, 31, '2020-09-17', '16:49:45', 'Check-out', NULL, NULL),
(40, 23, '2020-09-17', '16:49:39', 'Check-out', NULL, NULL),
(41, 22, '2020-09-17', '16:49:28', 'Check-out', NULL, NULL),
(42, 36, '2020-09-17', '16:48:46', 'Check-out', NULL, NULL),
(43, 35, '2020-09-17', '16:45:33', 'Check-out', NULL, NULL),
(44, 33, '2020-09-17', '16:45:25', 'Check-out', NULL, NULL),
(45, 33, '2020-09-17', '16:45:24', 'Check-out', NULL, NULL),
(46, 25, '2020-09-17', '16:45:11', 'Check-out', NULL, NULL),
(47, 34, '2020-09-17', '15:11:10', 'Check-out', NULL, NULL),
(48, 2, '2020-09-17', '13:23:08', 'Check-in', NULL, NULL),
(49, 22, '2020-09-17', '09:49:15', 'Check-in', NULL, NULL),
(50, 2, '2020-09-17', '09:19:14', 'Check-in', NULL, NULL),
(51, 35, '2020-09-17', '08:51:32', 'Check-in', NULL, NULL),
(52, 33, '2020-09-17', '08:50:30', 'Check-in', NULL, NULL),
(53, 23, '2020-09-17', '08:50:25', 'Check-in', NULL, NULL),
(54, 36, '2020-09-17', '08:39:53', 'Check-in', NULL, NULL),
(55, 31, '2020-09-17', '08:39:45', 'Check-in', NULL, NULL),
(56, 25, '2020-09-17', '08:39:33', 'Check-in', NULL, NULL),
(57, 34, '2020-09-17', '08:11:45', 'Check-in', NULL, NULL),
(58, 23, '2020-09-16', '16:51:16', 'Check-out', NULL, NULL),
(59, 36, '2020-09-16', '16:50:52', 'Check-out', NULL, NULL),
(60, 33, '2020-09-16', '16:50:21', 'Check-out', NULL, NULL),
(61, 35, '2020-09-16', '16:49:31', 'Check-out', NULL, NULL),
(62, 31, '2020-09-16', '16:49:28', 'Check-out', NULL, NULL),
(63, 25, '2020-09-16', '16:49:25', 'Check-out', NULL, NULL),
(64, 34, '2020-09-16', '16:47:59', 'Check-out', NULL, NULL),
(65, 2, '2020-09-16', '16:29:15', 'Check-in', NULL, NULL),
(66, 13, '2020-09-16', '16:29:00', 'Check-in', NULL, NULL),
(67, 35, '2020-09-16', '15:51:50', 'Check-in', NULL, NULL),
(68, 25, '2020-09-16', '14:05:56', 'Check-in', NULL, NULL),
(69, 25, '2020-09-16', '14:00:42', 'Check-in', NULL, NULL),
(70, 13, '2020-09-16', '09:11:19', 'Check-in', NULL, NULL),
(71, 33, '2020-09-16', '09:06:31', 'Check-in', NULL, NULL),
(72, 35, '2020-09-16', '08:49:02', 'Check-in', NULL, NULL),
(73, 25, '2020-09-16', '08:43:48', 'Check-in', NULL, NULL),
(74, 31, '2020-09-16', '08:43:43', 'Check-in', NULL, NULL),
(75, 36, '2020-09-16', '08:43:35', 'Check-in', NULL, NULL),
(76, 23, '2020-09-16', '08:31:00', 'Check-in', NULL, NULL),
(77, 34, '2020-09-16', '08:28:50', 'Check-in', NULL, NULL),
(78, 2, '2020-09-16', '08:28:48', 'Check-in', NULL, NULL),
(79, 23, '2020-09-15', '16:53:12', 'Check-out', NULL, NULL),
(80, 33, '2020-09-15', '16:52:36', 'Check-out', NULL, NULL),
(81, 22, '2020-09-15', '16:50:03', 'Check-out', NULL, NULL),
(82, 35, '2020-09-15', '16:49:11', 'Check-out', NULL, NULL),
(83, 36, '2020-09-15', '16:48:06', 'Check-out', NULL, NULL),
(84, 34, '2020-09-15', '16:47:36', 'Check-out', NULL, NULL),
(85, 2, '2020-09-15', '16:34:54', 'Check-out', NULL, NULL),
(86, 13, '2020-09-15', '16:34:36', 'Check-in', NULL, NULL),
(87, 13, '2020-09-15', '16:34:34', 'Check-in', NULL, NULL),
(88, 22, '2020-09-15', '09:43:00', 'Check-in', NULL, NULL),
(89, 33, '2020-09-15', '09:22:11', 'Check-in', NULL, NULL),
(90, 2, '2020-09-15', '09:20:14', 'Check-in', NULL, NULL),
(91, 23, '2020-09-15', '08:54:13', 'Check-in', NULL, NULL),
(92, 36, '2020-09-15', '08:47:05', 'Check-in', NULL, NULL),
(93, 35, '2020-09-15', '08:42:29', 'Check-in', NULL, NULL),
(94, 34, '2020-09-15', '08:41:13', 'Check-in', NULL, NULL),
(95, 36, '2020-09-15', '08:41:08', 'Check-in', NULL, NULL),
(96, 22, '2020-09-14', '16:55:16', 'Check-out', NULL, NULL),
(97, 31, '2020-09-14', '16:54:56', 'Check-out', NULL, NULL),
(98, 23, '2020-09-14', '16:54:50', 'Check-out', NULL, NULL),
(99, 35, '2020-09-14', '16:52:56', 'Check-out', NULL, NULL),
(100, 25, '2020-09-14', '16:52:36', 'Check-out', NULL, NULL),
(101, 33, '2020-09-14', '16:49:43', 'Check-out', NULL, NULL),
(102, 34, '2020-09-14', '16:47:43', 'Check-out', NULL, NULL),
(103, 2, '2020-09-14', '15:30:34', 'Check-in', NULL, NULL),
(104, 22, '2020-09-14', '09:55:22', 'Check-in', NULL, NULL),
(105, 33, '2020-09-14', '09:20:55', 'Check-in', NULL, NULL),
(106, 23, '2020-09-14', '09:12:06', 'Check-in', NULL, NULL),
(107, 2, '2020-09-14', '09:07:03', 'Check-in', NULL, NULL),
(108, 31, '2020-09-14', '09:00:55', 'Check-in', NULL, NULL),
(109, 13, '2020-09-14', '08:51:44', 'Check-in', NULL, NULL),
(110, 35, '2020-09-14', '08:34:52', 'Check-in', NULL, NULL),
(111, 34, '2020-09-14', '08:26:25', 'Check-in', NULL, NULL),
(112, 22, '2020-09-13', '16:57:10', 'Check-out', NULL, NULL),
(113, 31, '2020-09-13', '16:56:24', 'Check-out', NULL, NULL),
(114, 2, '2020-09-13', '16:54:31', 'Check-out', NULL, NULL),
(115, 36, '2020-09-13', '16:53:38', 'Check-out', NULL, NULL),
(116, 25, '2020-09-13', '16:53:03', 'Check-out', NULL, NULL),
(117, 33, '2020-09-13', '16:52:36', 'Check-out', NULL, NULL),
(118, 34, '2020-09-13', '16:50:03', 'Check-out', NULL, NULL),
(119, 13, '2020-09-13', '16:40:28', 'Check-out', NULL, NULL),
(120, 35, '2020-09-13', '16:28:57', 'Check-out', NULL, NULL),
(121, 35, '2020-09-13', '16:27:56', 'Check-out', NULL, NULL),
(122, 2, '2020-09-13', '10:29:56', 'Check-in', NULL, NULL),
(123, 22, '2020-09-13', '10:01:57', 'Check-in', NULL, NULL),
(124, 23, '2020-09-13', '09:18:13', 'Check-in', NULL, NULL),
(125, 25, '2020-09-13', '09:12:36', 'Check-in', NULL, NULL),
(126, 33, '2020-09-13', '09:10:04', 'Check-in', NULL, NULL),
(127, 25, '2020-09-13', '09:07:22', 'Check-in', NULL, NULL),
(128, 31, '2020-09-13', '09:07:18', 'Check-in', NULL, NULL),
(129, 36, '2020-09-13', '09:07:13', 'Check-in', NULL, NULL),
(130, 13, '2020-09-13', '08:54:01', 'Check-in', NULL, NULL),
(131, 35, '2020-09-13', '08:43:29', 'Check-in', NULL, NULL),
(132, 34, '2020-09-13', '08:43:00', 'Check-in', NULL, NULL),
(133, 35, '2020-09-10', '16:51:17', 'Check-out', NULL, NULL),
(134, 36, '2020-09-10', '16:51:07', 'Check-out', NULL, NULL),
(135, 31, '2020-09-10', '16:50:54', 'Check-out', NULL, NULL),
(136, 34, '2020-09-10', '16:49:18', 'Check-out', NULL, NULL),
(137, 23, '2020-09-10', '16:48:48', 'Check-in', NULL, NULL),
(138, 22, '2020-09-10', '16:48:33', 'Check-in', NULL, NULL),
(139, 2, '2020-09-10', '14:39:07', 'Check-in', NULL, NULL),
(140, 2, '2020-09-10', '09:54:12', 'Check-in', NULL, NULL),
(141, 22, '2020-09-10', '09:39:16', 'Check-in', NULL, NULL),
(142, 23, '2020-09-10', '09:12:49', 'Check-in', NULL, NULL),
(143, 36, '2020-09-10', '09:05:53', 'Check-in', NULL, NULL),
(144, 34, '2020-09-10', '08:49:46', 'Check-in', NULL, NULL),
(145, 35, '2020-09-10', '08:49:44', 'Check-in', NULL, NULL),
(146, 31, '2020-09-10', '08:49:38', 'Check-in', NULL, NULL),
(147, 36, '2020-09-09', '17:11:57', 'Check-out', NULL, NULL),
(148, 25, '2020-09-09', '17:11:43', 'Check-out', NULL, NULL),
(149, 23, '2020-09-09', '17:10:42', 'Check-out', NULL, NULL),
(150, 35, '2020-09-09', '17:10:38', 'Check-out', NULL, NULL),
(151, 31, '2020-09-09', '17:10:32', 'Check-out', NULL, NULL),
(152, 33, '2020-09-09', '16:52:38', 'Check-out', NULL, NULL),
(153, 34, '2020-09-09', '16:52:32', 'Check-out', NULL, NULL),
(154, 34, '2020-09-09', '16:52:17', 'Check-out', NULL, NULL),
(155, 33, '2020-09-09', '10:13:08', 'Check-out', NULL, NULL),
(156, 25, '2020-09-09', '10:11:52', 'Check-out', NULL, NULL),
(157, 36, '2020-09-09', '09:38:36', 'Check-out', NULL, NULL),
(158, 2, '2020-09-09', '09:23:30', 'Check-out', NULL, NULL),
(159, 23, '2020-09-09', '08:58:54', 'Check-out', NULL, NULL),
(160, 23, '2020-09-09', '08:58:52', 'Check-out', NULL, NULL),
(161, 31, '2020-09-09', '08:51:02', 'Check-out', NULL, NULL),
(162, 35, '2020-09-09', '08:48:29', 'Check-out', NULL, NULL),
(163, 34, '2020-09-09', '08:37:31', 'Check-out', NULL, NULL),
(164, 35, '2020-09-08', '16:54:48', 'Check-out', NULL, NULL),
(165, 36, '2020-09-08', '16:54:31', 'Check-out', NULL, NULL),
(166, 31, '2020-09-08', '16:54:20', 'Check-out', NULL, NULL),
(167, 25, '2020-09-08', '16:53:46', 'Check-out', NULL, NULL),
(168, 13, '2020-09-08', '16:53:16', 'Check-out', NULL, NULL),
(169, 33, '2020-09-08', '16:51:36', 'Check-out', NULL, NULL),
(170, 34, '2020-09-08', '16:49:13', 'Check-out', NULL, NULL),
(171, 23, '2020-09-08', '14:30:18', 'Check-out', NULL, NULL),
(172, 23, '2020-09-08', '14:30:11', 'Check-in', NULL, NULL),
(173, 23, '2020-09-08', '09:30:20', 'Check-in', NULL, NULL),
(174, 33, '2020-09-08', '09:08:04', 'Check-in', NULL, NULL),
(175, 36, '2020-09-08', '08:56:30', 'Check-in', NULL, NULL),
(176, 25, '2020-09-08', '08:56:27', 'Check-in', NULL, NULL),
(177, 31, '2020-09-08', '08:56:21', 'Check-in', NULL, NULL),
(178, 35, '2020-09-08', '08:41:22', 'Check-in', NULL, NULL),
(179, 34, '2020-09-08', '08:33:16', 'Check-in', NULL, NULL),
(180, 22, '2020-09-07', '16:57:38', 'Check-out', NULL, NULL),
(181, 33, '2020-09-07', '16:56:49', 'Check-out', NULL, NULL),
(182, 35, '2020-09-07', '16:55:34', 'Check-out', NULL, NULL),
(183, 31, '2020-09-07', '16:53:59', 'Check-out', NULL, NULL),
(184, 23, '2020-09-07', '16:53:51', 'Check-out', NULL, NULL),
(185, 33, '2020-09-07', '16:49:35', 'Check-out', NULL, NULL),
(186, 36, '2020-09-07', '16:47:03', 'Check-out', NULL, NULL),
(187, 34, '2020-09-07', '16:46:19', 'Check-out', NULL, NULL),
(188, 25, '2020-09-07', '16:32:11', 'Check-in', NULL, NULL),
(189, 25, '2020-09-07', '16:32:09', 'Check-in', NULL, NULL),
(190, 13, '2020-09-07', '16:01:19', 'Check-in', NULL, NULL),
(191, 2, '2020-09-07', '16:01:15', 'Check-in', NULL, NULL),
(192, 22, '2020-09-07', '09:44:13', 'Check-in', NULL, NULL),
(193, 23, '2020-09-07', '09:36:04', 'Check-in', NULL, NULL),
(194, 13, '2020-09-07', '09:17:22', 'Check-in', NULL, NULL),
(195, 13, '2020-09-07', '09:17:20', 'Check-in', NULL, NULL),
(196, 2, '2020-09-07', '09:05:34', 'Check-in', NULL, NULL),
(197, 25, '2020-09-07', '08:56:40', 'Check-in', NULL, NULL),
(198, 31, '2020-09-07', '08:56:31', 'Check-in', NULL, NULL),
(199, 36, '2020-09-07', '08:56:10', 'Check-in', NULL, NULL),
(200, 34, '2020-09-07', '08:56:06', 'Check-in', NULL, NULL),
(201, 35, '2020-09-07', '08:44:54', 'Check-in', NULL, NULL),
(202, 33, '2020-09-07', '08:12:55', 'Check-in', NULL, NULL),
(203, 31, '2020-09-06', '16:56:42', 'Check-in', NULL, NULL),
(204, 25, '2020-09-06', '16:56:31', 'Check-in', NULL, NULL),
(205, 36, '2020-09-06', '16:54:03', 'Check-in', NULL, NULL),
(206, 36, '2020-09-06', '16:54:01', 'Check-in', NULL, NULL),
(207, 31, '2020-09-06', '16:53:28', 'Check-in', NULL, NULL),
(208, 33, '2020-09-06', '16:52:09', 'Check-in', NULL, NULL),
(209, 23, '2020-09-06', '16:50:25', 'Check-in', NULL, NULL),
(210, 34, '2020-09-06', '16:50:08', 'Check-in', NULL, NULL),
(211, 13, '2020-09-06', '16:37:04', 'Check-in', NULL, NULL),
(212, 2, '2020-09-06', '16:36:51', 'Check-in', NULL, NULL),
(213, 22, '2020-09-06', '16:16:05', 'Check-in', NULL, NULL),
(214, 23, '2020-09-06', '09:45:32', 'Check-in', NULL, NULL),
(215, 13, '2020-09-06', '09:32:29', 'Check-in', NULL, NULL),
(216, 13, '2020-09-06', '09:32:27', 'Check-in', NULL, NULL),
(217, 2, '2020-09-06', '09:25:13', 'Check-in', NULL, NULL),
(218, 36, '2020-09-06', '09:24:43', 'Check-in', NULL, NULL),
(219, 33, '2020-09-06', '09:13:42', 'Check-in', NULL, NULL),
(220, 31, '2020-09-06', '08:58:48', 'Check-in', NULL, NULL),
(221, 34, '2020-09-06', '08:48:39', 'Check-in', NULL, NULL),
(222, 35, '2020-09-03', '16:59:12', 'Check-out', NULL, NULL),
(223, 25, '2020-09-03', '16:55:25', 'Check-out', NULL, NULL),
(224, 33, '2020-09-03', '16:55:21', 'Check-out', NULL, NULL),
(225, 36, '2020-09-03', '16:54:46', 'Check-out', NULL, NULL),
(226, 31, '2020-09-03', '16:53:09', 'Check-out', NULL, NULL),
(227, 35, '2020-09-03', '16:52:26', 'Check-out', NULL, NULL),
(228, 23, '2020-09-03', '16:31:05', 'Check-out', NULL, NULL),
(229, 34, '2020-09-03', '14:36:34', 'Check-out', NULL, NULL),
(230, 34, '2020-09-03', '14:36:19', 'Check-in', NULL, NULL),
(231, 2, '2020-09-03', '09:24:18', 'Check-in', NULL, NULL),
(232, 23, '2020-09-03', '09:24:12', 'Check-in', NULL, NULL),
(233, 33, '2020-09-03', '09:05:15', 'Check-in', NULL, NULL),
(234, 35, '2020-09-03', '08:42:55', 'Check-in', NULL, NULL),
(235, 36, '2020-09-03', '08:39:10', 'Check-in', NULL, NULL),
(236, 31, '2020-09-03', '08:39:04', 'Check-in', NULL, NULL),
(237, 25, '2020-09-03', '08:39:00', 'Check-in', NULL, NULL),
(238, 34, '2020-09-03', '08:36:11', 'Check-in', NULL, NULL),
(239, 34, '2020-09-03', '08:36:09', 'Check-in', NULL, NULL),
(240, 25, '2020-09-02', '16:53:10', 'Check-in', NULL, NULL),
(241, 36, '2020-09-02', '16:49:25', 'Check-in', NULL, NULL),
(242, 33, '2020-09-02', '16:49:13', 'Check-in', NULL, NULL),
(243, 31, '2020-09-02', '16:48:56', 'Check-in', NULL, NULL),
(244, 35, '2020-09-02', '16:48:16', 'Check-in', NULL, NULL),
(245, 23, '2020-09-02', '16:48:05', 'Check-in', NULL, NULL),
(246, 34, '2020-09-02', '16:47:43', 'Check-in', NULL, NULL),
(247, 2, '2020-09-02', '15:52:39', 'Check-in', NULL, NULL),
(248, 25, '2020-09-02', '12:41:46', 'Check-in', NULL, NULL),
(249, 2, '2020-09-02', '10:23:21', 'Check-in', NULL, NULL),
(250, 36, '2020-09-02', '09:48:39', 'Check-in', NULL, NULL),
(251, 23, '2020-09-02', '09:45:50', 'Check-in', NULL, NULL),
(252, 13, '2020-09-02', '09:20:15', 'Check-in', NULL, NULL),
(253, 33, '2020-09-02', '09:11:01', 'Check-in', NULL, NULL),
(254, 31, '2020-09-02', '09:03:42', 'Check-in', NULL, NULL),
(255, 35, '2020-09-02', '08:31:45', 'Check-in', NULL, NULL),
(256, 34, '2020-09-02', '08:25:22', 'Check-in', NULL, NULL),
(257, 34, '2020-09-02', '08:25:20', 'Check-in', NULL, NULL),
(258, 25, '2020-09-01', '16:51:18', 'Check-in', NULL, NULL),
(259, 25, '2020-09-01', '16:51:16', 'Check-in', NULL, NULL),
(260, 13, '2020-09-01', '16:50:24', 'Check-in', NULL, NULL),
(261, 35, '2020-09-01', '16:49:25', 'Check-in', NULL, NULL),
(262, 2, '2020-09-01', '16:48:18', 'Check-in', NULL, NULL),
(263, 33, '2020-09-01', '16:48:06', 'Check-in', NULL, NULL),
(264, 36, '2020-09-01', '16:48:03', 'Check-in', NULL, NULL),
(265, 31, '2020-09-01', '16:47:25', 'Check-in', NULL, NULL),
(266, 34, '2020-09-01', '16:47:09', 'Check-in', NULL, NULL),
(267, 2, '2020-09-01', '16:06:22', 'Check-in', NULL, NULL),
(268, 23, '2020-09-01', '15:41:49', 'Check-in', NULL, NULL),
(269, 2, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(270, 2, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(271, 13, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(272, 13, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(273, 22, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(274, 22, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(275, 23, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(276, 23, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(277, 25, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(278, 25, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(279, 31, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(280, 31, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(281, 33, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(282, 33, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(283, 34, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(284, 34, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(285, 35, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(286, 35, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(287, 36, '2020-08-25', '16:50:54', 'Check-in', NULL, NULL),
(288, 36, '2020-08-25', '08:49:44', 'Check-out', NULL, NULL),
(289, 2, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(290, 2, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(291, 13, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(292, 13, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(293, 22, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(294, 22, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(295, 23, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(296, 23, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(297, 25, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(298, 25, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(299, 31, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(300, 31, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(301, 33, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(302, 33, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(303, 34, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(304, 34, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(305, 35, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(306, 35, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(307, 36, '2020-08-26', '16:50:54', 'Check-in', NULL, NULL),
(308, 36, '2020-08-26', '08:49:44', 'Check-out', NULL, NULL),
(309, 2, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(310, 2, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(311, 13, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(312, 13, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(313, 22, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(314, 22, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(315, 23, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(316, 23, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(317, 25, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(318, 25, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(319, 31, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(320, 31, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(321, 33, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(322, 33, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(323, 34, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(324, 34, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(325, 35, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(326, 35, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(327, 36, '2020-08-27', '16:50:54', 'Check-in', NULL, NULL),
(328, 36, '2020-08-27', '08:49:44', 'Check-out', NULL, NULL),
(329, 2, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(330, 2, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(331, 13, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(332, 13, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(333, 22, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(334, 22, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(335, 23, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(336, 23, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(337, 25, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(338, 25, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(339, 31, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(340, 31, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(341, 33, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(342, 33, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(343, 34, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(344, 34, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(345, 35, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(346, 35, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(347, 36, '2020-08-30', '16:50:54', 'Check-in', NULL, NULL),
(348, 36, '2020-08-30', '08:49:44', 'Check-out', NULL, NULL),
(349, 2, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(350, 2, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(351, 13, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(352, 13, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(353, 22, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(354, 22, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(355, 23, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(356, 23, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(357, 25, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(358, 25, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(359, 31, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(360, 31, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(361, 33, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(362, 33, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(363, 34, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(364, 34, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(365, 35, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(366, 35, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(367, 36, '2020-08-31', '16:50:54', 'Check-in', NULL, NULL),
(368, 36, '2020-08-31', '08:49:44', 'Check-out', NULL, NULL),
(369, 2, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(370, 13, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(371, 22, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(372, 23, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(373, 25, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(374, 31, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(375, 33, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(376, 34, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(377, 35, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(378, 36, '2020-09-01', '08:49:44', 'Check-out', NULL, NULL),
(379, 2, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(381, 22, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(382, 23, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(383, 25, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(384, 31, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(385, 33, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(386, 34, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(387, 35, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(388, 36, '2020-09-22', '08:49:44', 'Check-out', NULL, NULL),
(389, 35, '2020-09-06', '08:49:44', 'Check-in', NULL, NULL),
(390, 35, '2020-09-06', '16:49:44', 'Check-out', NULL, NULL),
(391, 23, '2020-09-22', '16:55:18', 'Check-out', NULL, NULL),
(392, 25, '2020-09-22', '16:54:03', 'Check-out', NULL, NULL),
(393, 31, '2020-09-22', '16:54:00', 'Check-out', NULL, NULL),
(394, 36, '2020-09-22', '16:53:23', 'Check-out', NULL, NULL),
(395, 33, '2020-09-22', '16:51:13', 'Check-out', NULL, NULL),
(396, 34, '2020-09-22', '16:50:52', 'Check-out', NULL, NULL),
(397, 2, '2020-09-22', '16:47:47', 'Check-in', NULL, NULL),
(398, 35, '2020-09-22', '16:46:26', 'Check-in', NULL, NULL),
(399, 2, '2020-09-23', '09:33:33', 'Check-in', NULL, NULL),
(400, 23, '2020-09-23', '09:10:33', 'Check-in', NULL, NULL),
(401, 33, '2020-09-23', '09:08:20', 'Check-in', NULL, NULL),
(402, 34, '2020-09-23', '08:38:50', 'Check-in', NULL, NULL),
(403, 36, '2020-09-23', '08:38:42', 'Check-in', NULL, NULL),
(404, 31, '2020-09-23', '08:38:37', 'Check-in', NULL, NULL),
(405, 25, '2020-09-23', '08:38:33', 'Check-in', NULL, NULL),
(406, 35, '2020-09-23', '08:38:07', 'Check-in', NULL, NULL),
(407, 25, '2020-09-23', '17:04:45', 'Check-out', NULL, NULL),
(408, 25, '2020-09-23', '17:04:45', 'Check-out', NULL, NULL),
(409, 36, '2020-09-23', '17:01:15', 'Check-out', NULL, NULL),
(410, 36, '2020-09-23', '17:01:15', 'Check-out', NULL, NULL),
(411, 23, '2020-09-23', '16:59:21', 'Check-out', NULL, NULL),
(412, 23, '2020-09-23', '16:59:21', 'Check-out', NULL, NULL),
(413, 31, '2020-09-23', '16:59:07', 'Check-out', NULL, NULL),
(414, 31, '2020-09-23', '16:59:07', 'Check-out', NULL, NULL),
(415, 33, '2020-09-23', '16:52:49', 'Check-out', NULL, NULL),
(416, 34, '2020-09-23', '16:50:09', 'Check-out', NULL, NULL),
(417, 34, '2020-09-23', '16:50:09', 'Check-out', NULL, NULL),
(418, 35, '2020-09-23', '16:49:35', 'Check-in', NULL, NULL),
(419, 35, '2020-09-23', '16:49:35', 'Check-in', NULL, NULL),
(420, 2, '2020-09-23', '16:48:22', 'Check-in', NULL, NULL),
(421, 2, '2020-09-23', '16:48:22', 'Check-in', NULL, NULL),
(422, 1, '2020-08-26', '09:45:44', NULL, NULL, NULL),
(423, 1, '2020-08-26', '17:45:44', NULL, NULL, NULL),
(424, 2, '2020-08-26', '10:45:44', NULL, NULL, NULL),
(425, 2, '2020-08-26', '14:45:44', NULL, NULL, NULL),
(426, 3, '2020-08-26', '08:45:44', NULL, NULL, NULL),
(427, 3, '2020-08-26', '17:45:44', NULL, NULL, NULL),
(428, 1, '2020-08-26', '19:45:44', NULL, NULL, NULL),
(429, 1, '2020-08-27', '09:45:44', NULL, NULL, NULL),
(430, 1, '2020-08-27', '09:45:44', NULL, NULL, NULL),
(431, 1, '2020-08-28', '09:45:44', NULL, NULL, NULL),
(432, 1, '2020-08-28', '09:45:44', NULL, NULL, NULL),
(433, 1, '2020-08-26', '09:45:44', NULL, NULL, NULL),
(434, 1, '2020-08-26', '17:45:44', NULL, NULL, NULL),
(435, 2, '2020-08-26', '10:45:44', NULL, NULL, NULL),
(436, 2, '2020-08-26', '14:45:44', NULL, NULL, NULL),
(437, 3, '2020-08-26', '08:45:44', NULL, NULL, NULL),
(438, 3, '2020-08-26', '17:45:44', NULL, NULL, NULL),
(439, 1, '2020-08-26', '19:45:44', NULL, NULL, NULL),
(440, 1, '2020-08-27', '09:45:44', NULL, NULL, NULL),
(441, 1, '2020-08-27', '09:45:44', NULL, NULL, NULL),
(442, 1, '2020-08-28', '09:45:44', NULL, NULL, NULL),
(443, 1, '2020-08-28', '09:45:44', NULL, NULL, NULL),
(444, 1, '2020-08-26', '09:45:44', NULL, NULL, NULL),
(445, 1, '2020-08-26', '17:45:44', NULL, NULL, NULL),
(446, 2, '2020-08-26', '10:45:44', NULL, NULL, NULL),
(447, 2, '2020-08-26', '14:45:44', NULL, NULL, NULL),
(448, 3, '2020-08-26', '08:45:44', NULL, NULL, NULL),
(449, 3, '2020-08-26', '17:45:44', NULL, NULL, NULL),
(450, 1, '2020-08-26', '19:45:44', NULL, NULL, NULL),
(451, 1, '2020-08-27', '09:45:44', NULL, NULL, NULL),
(452, 1, '2020-08-27', '09:45:44', NULL, NULL, NULL),
(453, 1, '2020-08-28', '09:45:44', NULL, NULL, NULL),
(454, 1, '2020-08-28', '09:45:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pppppppppppp', NULL, '2020-09-28', '2020-10-03', '2020-10-07 19:08:45', '2020-10-07 19:08:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hourly_rates`
--

CREATE TABLE `hourly_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `hourly_grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hourly_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `income_category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interested_ins`
--

CREATE TABLE `interested_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `recur_start_date` date NOT NULL,
  `recur_end_date` date NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `alert_overdue` int(11) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `tax` double(15,2) NOT NULL,
  `total_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `recurring` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recurring_frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recur_frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recur_next_date` date DEFAULT NULL,
  `currerncy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archived` int(11) DEFAULT NULL,
  `date_sent` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` longtext COLLATE utf8mb4_unicode_ci,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `apply_date` date DEFAULT NULL,
  `send_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `job_circular_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `name`, `email`, `mobile`, `cover_letter`, `application_status`, `apply_date`, `send_email`, `interview_date`, `created_at`, `updated_at`, `deleted_at`, `job_circular_id`) VALUES
(1, 'mmm', 'm@m.com', '01028596456', '<p>adsfbdfvnb&nbsp;</p>', 'unread', NULL, NULL, NULL, '2020-11-09 05:18:44', '2020-11-09 05:18:44', NULL, 1),
(2, 'mmm', 'm@m.com', '01028596456', '<p>adsfbdfvnb&nbsp;</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:27:39', '2020-11-09 05:27:39', NULL, 1),
(3, 'mmm', 'm@m.com', '01028596456', '<p>adsfbdfvnb&nbsp;</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:27:49', '2020-11-09 05:27:49', NULL, 1),
(4, 'mmm', 'm@m.com', '01028596456', '<p>adsfbdfvnb&nbsp;</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:28:17', '2020-11-09 05:28:17', NULL, 1),
(5, 'kkkkk', 'kkk@k.com', '01055668899', '<p>dFADSVDBFV B</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:29:46', '2020-11-09 05:29:46', NULL, 1),
(6, 'kkkkk', 'kkk@k.com', '01055668899', '<p>dFADSVDBFV B</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:30:53', '2020-11-09 05:30:53', NULL, 1),
(7, 'dsfdb', 'x@x.com', '01555668844', '<p>wkdsfdjgbvjkhnv</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:31:55', '2020-11-09 05:31:55', NULL, 1),
(8, 'dsfdb', 'x@x.com', '01555668844', '<p>wkdsfdjgbvjkhnv</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:34:05', '2020-11-09 05:34:05', NULL, 1),
(9, 'uiuuuuu', 'user@gmail.com', '01555668844', '<p>jhgikuh</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:34:41', '2020-11-09 05:34:41', NULL, 1),
(10, 'uiuuuuu', 'user@gmail.com', '01555668844', '<p>jhgikuh</p>', NULL, NULL, NULL, NULL, '2020-11-09 05:35:26', '2020-11-09 07:02:12', '2020-11-09 07:02:12', 1),
(11, 'ewrrqreq', 'wwrE@ffd.fd', '01578565455', '<p>fhdsvfdvkv kj<strong>kjefhfdkuvh kejqf &nbsp;kwjqehwdkfsh lenqlw nfqe&nbsp;</strong></p>', 'unread', NULL, NULL, NULL, '2020-11-09 05:36:18', '2020-11-09 05:36:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_circulars`
--

CREATE TABLE `job_circulars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `employment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_circulars`
--

INSERT INTO `job_circulars` (`id`, `name`, `vacancy_no`, `posted_date`, `employment_type`, `experience`, `age`, `salary_range`, `last_date`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `designation_id`) VALUES
(1, 'AAAA', '5', '2020-11-09', 'full_time', '5', '50', '100000', '2020-11-24', '<p>qwldsfhdkvfbnj</p>', 'published', '2020-11-09 05:13:59', '2020-11-09 05:13:59', NULL, 2),
(2, 'wfdasfdvbf', '5', '2020-11-09', 'full_time', '5', '22', '555555', '2020-11-08', '<p>felkfsndb</p>', 'published', '2020-11-09 08:14:40', '2020-11-09 15:12:51', NULL, 3),
(3, 'uyghil', '65', '2020-11-09', 'full_time', NULL, '42', '54', NULL, NULL, 'unpublished', '2020-11-09 08:21:45', '2020-11-09 08:22:05', '2020-11-09 08:22:05', 2),
(4, 'uyghil', '65', '2020-11-09', 'full_time', NULL, '42', '545', NULL, NULL, 'unpublished', '2020-11-09 08:21:46', '2020-11-09 08:22:11', '2020-11-09 08:22:11', 2),
(5, 'jhklihk', '45', '2020-11-09', 'full_time', '44', '55', '54', NULL, NULL, 'unpublished', '2020-11-09 08:22:30', '2020-11-09 08:22:36', '2020-11-09 08:22:36', 2),
(6, 'kjhikn', '55', '2020-11-09', 'full_time', '464', '55', '45595', '2020-11-30', '<p>jhgikljk</p>', 'published', '2020-11-09 08:23:10', '2020-11-09 08:23:10', NULL, 2),
(7, 'kjhikn', '55', '2020-11-09', 'full_time', '464', '55', '45595', '2020-11-30', '<p>jhgikljk</p>', 'published', '2020-11-09 08:24:01', '2020-11-09 08:24:01', NULL, 2),
(8, 'adsgfdgfhgn', '5', '2020-11-09', 'full_time', '5', '55', '45465', '2020-11-23', '<p>kjhkjhgkjhkjn</p>', 'published', '2020-11-09 10:25:26', '2020-11-09 10:25:26', NULL, 3),
(9, 'adsgfdgfhgn', '5', '2020-11-09', 'full_time', '5', '55', '45465', '2020-11-23', '<p>kjhkjhgkjhkjn</p>', 'published', '2020-11-09 10:25:27', '2020-11-09 10:25:27', NULL, 3),
(10, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:34:35', '2020-11-09 10:34:35', NULL, 4),
(11, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:35:12', '2020-11-09 10:35:12', NULL, 4),
(12, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:43:55', '2020-11-09 10:43:55', NULL, 4),
(13, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:47:12', '2020-11-09 10:47:12', NULL, 4),
(14, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:47:52', '2020-11-09 10:47:52', NULL, 4),
(15, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:53:28', '2020-11-09 10:53:28', NULL, 4),
(16, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:53:42', '2020-11-09 10:53:42', NULL, 4),
(17, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:53:55', '2020-11-09 10:53:55', NULL, 4),
(18, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:55:05', '2020-11-09 10:55:05', NULL, 4),
(19, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:56:32', '2020-11-09 10:56:32', NULL, 4),
(20, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:56:41', '2020-11-09 10:56:41', NULL, 4),
(21, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:57:23', '2020-11-09 10:57:23', NULL, 4),
(22, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 10:59:07', '2020-11-09 10:59:07', NULL, 4),
(23, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:01:10', '2020-11-09 11:01:10', NULL, 4),
(24, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:08:35', '2020-11-09 11:08:35', NULL, 4),
(25, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:08:44', '2020-11-09 11:08:44', NULL, 4),
(26, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:08:59', '2020-11-09 11:08:59', NULL, 4),
(27, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:09:25', '2020-11-09 11:09:25', NULL, 4),
(28, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:09:40', '2020-11-09 11:09:40', NULL, 4),
(29, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:09:51', '2020-11-09 11:09:51', NULL, 4),
(30, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:10:40', '2020-11-09 11:10:40', NULL, 4),
(31, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:11:01', '2020-11-09 11:11:01', NULL, 4),
(32, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:12:28', '2020-11-09 11:12:28', NULL, 4),
(33, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:13:18', '2020-11-09 11:13:18', NULL, 4),
(34, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:13:25', '2020-11-09 11:13:25', NULL, 4),
(35, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:15:17', '2020-11-09 11:15:17', NULL, 4),
(36, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:16:36', '2020-11-09 11:16:36', NULL, 4),
(37, 'dasfdsfdbf', '5', '2020-11-09', 'full_time', '5', '55', '545454', '2020-11-24', '<p>kjnkkbh</p>', 'published', '2020-11-09 11:17:18', '2020-11-09 11:17:18', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `job_circular_permission`
--

CREATE TABLE `job_circular_permission` (
  `job_circular_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_circular_permission`
--

INSERT INTO `job_circular_permission` (`job_circular_id`, `permission_id`) VALUES
(2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `kb_categories`
--

CREATE TABLE `kb_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imported_from_email` int(11) DEFAULT NULL,
  `email_integration_uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salutation_id` int(10) UNSIGNED DEFAULT NULL,
  `interested_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_status_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_source_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_categories`
--

CREATE TABLE `lead_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_permission`
--

CREATE TABLE `lead_permission` (
  `lead_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_sources`
--

CREATE TABLE `lead_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_statuses`
--

CREATE TABLE `lead_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` longtext COLLATE utf8mb4_unicode_ci,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_start_date` date NOT NULL,
  `leave_end_date` date DEFAULT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `view_status` int(11) DEFAULT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leave_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `reason`, `leave_type`, `hours`, `leave_start_date`, `leave_end_date`, `application_status`, `view_status`, `comments`, `approved_by`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `leave_category_id`) VALUES
(1, '<p>xxxxxxxxxxxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, 0, NULL, NULL, '2020-09-30 12:01:51', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 2),
(2, '<p>xxxxxxxxxxxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, 0, NULL, NULL, '2020-09-30 12:03:03', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 2),
(3, '<p>xxxxxxxxxxxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, 0, NULL, NULL, '2020-09-30 12:03:29', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 2),
(4, '<p>xxxxxxxxxxxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, 0, NULL, NULL, '2020-09-30 12:04:43', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 2),
(5, '<p>xxxxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, NULL, NULL, NULL, '2020-09-30 12:05:06', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 2),
(6, '<p>xxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, NULL, NULL, NULL, '2020-09-30 12:05:54', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 2),
(7, '<p>xxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, NULL, NULL, NULL, '2020-09-30 12:06:27', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 3),
(8, '<p>xxx</p>', 'single_day', NULL, '2020-09-30', '2020-09-30', NULL, NULL, NULL, NULL, '2020-09-30 12:06:47', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 4, 2),
(9, '<p>yyyyyyyyyyy</p>', 'multi_days', NULL, '2020-10-02', '2020-10-08', NULL, NULL, '<p>trttttttttttttttttt</p>', NULL, '2020-10-01 05:14:02', '2020-10-13 22:15:20', '2020-10-13 22:15:20', 5, 6),
(10, NULL, 'single_day', NULL, '2020-10-28', NULL, NULL, NULL, NULL, NULL, '2020-10-13 05:47:53', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 4),
(11, NULL, 'single_day', NULL, '2020-10-28', NULL, NULL, NULL, NULL, NULL, '2020-10-13 05:50:40', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 4),
(12, NULL, 'single_day', NULL, '2020-10-28', NULL, NULL, NULL, NULL, NULL, '2020-10-13 05:51:27', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 4),
(13, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:47:00', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(14, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:50:09', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(15, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:50:25', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(16, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:50:49', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(17, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:50:58', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(18, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:51:36', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(19, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:51:47', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(20, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:52:00', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(21, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:53:21', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(22, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:55:25', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(23, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:56:44', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(24, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:57:16', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(25, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:57:48', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(26, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:58:14', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(27, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:58:31', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(28, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:58:50', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(29, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:59:00', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(30, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:59:34', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(31, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 15:59:51', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(32, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:00:05', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(33, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:00:13', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(34, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:00:29', '2020-10-13 22:15:08', '2020-10-13 22:15:08', 6, 5),
(35, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:00:55', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(36, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:01:05', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(37, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:01:36', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(38, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:02:03', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(39, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:04:51', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(40, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:08:42', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(41, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:09:08', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(42, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:09:17', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(43, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:09:50', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(44, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:11:57', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(45, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:14:08', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(46, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:14:19', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(47, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:14:23', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(48, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:14:43', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(49, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:15:40', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(50, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:17:05', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 6, 5),
(51, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:19:58', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(52, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:20:48', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(53, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:21:11', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(54, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:21:21', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(55, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:21:34', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(56, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:22:29', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(57, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:22:35', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(58, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:24:01', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(59, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:24:13', '2020-10-13 22:14:51', '2020-10-13 22:14:51', 3, 3),
(60, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:25:10', '2020-10-13 22:14:26', '2020-10-13 22:14:26', 3, 3),
(61, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 16:32:24', '2020-10-13 22:14:12', '2020-10-13 22:14:12', 3, 3),
(62, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:15:38', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(63, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:25:28', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(64, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:26:22', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(65, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:26:44', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(66, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:27:00', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(67, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:27:46', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(68, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:28:41', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(69, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:29:02', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(70, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:30:25', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(71, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:34:00', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(72, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:34:26', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(73, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:34:39', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(74, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:35:25', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(75, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:36:58', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(76, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:37:09', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(77, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:39:53', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(78, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:42:55', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(79, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:44:08', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(80, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:46:02', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(81, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 22:46:37', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(82, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 23:07:30', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(83, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 23:08:39', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(84, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 23:14:17', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(85, NULL, 'single_day', NULL, '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-13 23:19:35', '2020-10-13 23:20:36', '2020-10-13 23:20:36', 2, 2),
(86, NULL, 'single_day', NULL, '2020-10-06', NULL, NULL, NULL, NULL, NULL, '2020-10-13 23:21:31', '2020-10-16 15:42:35', '2020-10-16 15:42:35', 3, 2),
(87, NULL, 'single_day', NULL, '2020-09-30', NULL, NULL, NULL, NULL, NULL, '2020-10-14 16:16:10', '2020-10-14 16:47:44', '2020-10-14 16:47:44', 2, 2),
(88, NULL, 'single_day', NULL, '2020-09-30', NULL, NULL, NULL, NULL, NULL, '2020-10-14 16:18:45', '2020-10-14 16:47:44', '2020-10-14 16:47:44', 2, 2),
(89, NULL, 'single_day', NULL, '2020-09-30', NULL, NULL, NULL, NULL, NULL, '2020-10-14 16:21:32', '2020-10-14 16:47:44', '2020-10-14 16:47:44', 2, 2),
(90, NULL, 'single_day', NULL, '2020-09-30', NULL, NULL, NULL, NULL, NULL, '2020-10-14 16:22:14', '2020-10-14 16:47:44', '2020-10-14 16:47:44', 2, 2),
(91, NULL, 'single_day', NULL, '2020-09-30', NULL, NULL, NULL, NULL, NULL, '2020-10-14 16:29:31', '2020-10-14 16:47:44', '2020-10-14 16:47:44', 2, 2),
(92, NULL, 'single_day', NULL, '2020-09-30', NULL, NULL, NULL, NULL, NULL, '2020-10-14 16:29:50', '2020-10-14 16:47:44', '2020-10-14 16:47:44', 2, 2),
(93, NULL, 'single_day', NULL, '2020-09-30', NULL, NULL, NULL, NULL, NULL, '2020-10-14 16:30:02', '2020-11-12 15:00:25', NULL, 2, 2),
(97, NULL, 'single_day', NULL, '2020-09-29', NULL, NULL, NULL, NULL, NULL, '2020-10-14 17:16:20', '2020-11-12 14:58:50', NULL, 4, 4),
(99, NULL, 'single_day', NULL, '2020-09-29', NULL, NULL, NULL, NULL, NULL, '2020-10-14 17:19:22', '2020-10-16 15:42:35', '2020-10-16 15:42:35', 4, 4),
(100, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:44:12', '2020-10-16 15:44:12', NULL, 3, 4),
(101, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:44:44', '2020-10-16 15:44:44', NULL, 3, 4),
(102, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:45:01', '2020-10-16 15:45:01', NULL, 3, 4),
(103, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:45:21', '2020-10-16 15:45:21', NULL, 3, 4),
(104, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:49:58', '2020-10-16 15:49:58', NULL, 3, 4),
(105, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:52:20', '2020-10-16 15:52:20', NULL, 3, 4),
(106, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:53:27', '2020-10-16 15:53:27', NULL, 3, 4),
(107, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:54:33', '2020-10-16 15:54:33', NULL, 3, 4),
(108, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:56:07', '2020-10-16 15:56:07', NULL, 3, 4),
(109, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:56:43', '2020-10-16 15:56:43', NULL, 3, 4),
(110, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:57:04', '2020-10-16 15:57:04', NULL, 3, 4),
(111, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 15:57:20', '2020-10-16 15:57:20', NULL, 3, 4),
(112, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:02:30', '2020-10-16 16:02:30', NULL, 3, 4),
(113, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:02:49', '2020-10-16 16:02:49', NULL, 3, 4),
(114, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:03:57', '2020-10-16 16:03:57', NULL, 3, 4),
(115, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:04:17', '2020-10-16 16:04:17', NULL, 3, 4),
(116, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:04:34', '2020-10-16 16:04:34', NULL, 3, 4),
(117, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:04:48', '2020-10-16 16:04:48', NULL, 3, 4),
(118, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:05:24', '2020-10-16 16:05:24', NULL, 3, 4),
(119, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:11:16', '2020-10-16 16:11:16', NULL, 3, 4),
(120, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:11:51', '2020-10-16 16:11:51', NULL, 3, 4),
(121, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:15:16', '2020-10-16 16:15:16', NULL, 3, 4),
(122, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:15:26', '2020-10-16 16:15:26', NULL, 3, 4),
(123, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:18:11', '2020-10-16 16:18:11', NULL, 3, 4),
(124, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:18:20', '2020-10-16 16:18:20', NULL, 3, 4),
(125, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:18:45', '2020-10-16 16:18:45', NULL, 3, 4),
(126, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:19:17', '2020-10-16 16:19:17', NULL, 3, 4),
(127, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:19:45', '2020-10-16 16:19:45', NULL, 3, 4),
(128, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:22:46', '2020-10-16 16:22:46', NULL, 3, 4),
(129, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:23:00', '2020-10-16 16:23:00', NULL, 3, 4),
(130, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:23:18', '2020-10-16 16:23:18', NULL, 3, 4),
(131, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:23:27', '2020-10-16 16:23:27', NULL, 3, 4),
(132, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:25:44', '2020-10-16 16:25:44', NULL, 3, 4),
(133, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:26:39', '2020-10-16 16:26:39', NULL, 3, 4),
(134, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:29:30', '2020-10-16 16:29:30', NULL, 3, 4),
(135, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:29:38', '2020-10-16 16:29:38', NULL, 3, 4),
(136, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:29:46', '2020-10-16 16:29:46', NULL, 3, 4),
(137, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:29:52', '2020-10-16 16:29:52', NULL, 3, 4),
(138, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:30:35', '2020-10-16 16:30:35', NULL, 3, 4),
(139, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:31:23', '2020-10-16 16:31:23', NULL, 3, 4),
(140, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:31:27', '2020-10-16 16:31:27', NULL, 3, 4),
(141, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:31:37', '2020-10-16 16:31:37', NULL, 3, 4),
(142, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:33:36', '2020-10-16 16:33:36', NULL, 3, 4),
(143, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:38:24', '2020-10-16 16:38:24', NULL, 3, 4),
(144, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:38:43', '2020-10-16 16:38:43', NULL, 3, 4),
(145, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:39:05', '2020-10-16 16:39:05', NULL, 3, 4),
(146, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:39:48', '2020-10-16 16:39:48', NULL, 3, 4),
(147, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:39:58', '2020-10-16 16:39:58', NULL, 3, 4),
(148, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:46:23', '2020-10-16 16:46:23', NULL, 3, 4),
(149, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:47:00', '2020-10-16 16:47:00', NULL, 3, 4),
(150, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:47:29', '2020-10-16 16:47:29', NULL, 3, 4),
(151, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:47:39', '2020-10-16 16:47:39', NULL, 3, 4),
(152, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:47:59', '2020-10-16 16:47:59', NULL, 3, 4),
(153, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:48:05', '2020-10-16 16:48:05', NULL, 3, 4),
(154, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:53:17', '2020-10-16 16:53:17', NULL, 3, 4),
(155, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:53:36', '2020-10-16 16:53:36', NULL, 3, 4),
(156, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:53:55', '2020-10-16 16:53:55', NULL, 3, 4),
(157, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:54:33', '2020-10-16 16:54:33', NULL, 3, 4),
(158, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:54:38', '2020-10-16 16:54:38', NULL, 3, 4),
(159, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:55:42', '2020-10-16 16:55:42', NULL, 3, 4),
(160, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:55:53', '2020-10-16 16:55:53', NULL, 3, 4),
(161, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:56:14', '2020-10-16 16:56:14', NULL, 3, 4),
(162, '<p>dfgnvnblk.jmnd gfv</p>', 'hours', '4', '2020-10-14', NULL, NULL, NULL, NULL, NULL, '2020-10-16 16:59:00', '2020-10-16 16:59:00', NULL, 3, 4),
(163, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:20:51', '2020-10-16 17:20:51', NULL, 2, 4),
(164, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:24:00', '2020-10-16 17:24:00', NULL, 2, 4),
(165, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:24:23', '2020-10-16 17:24:23', NULL, 2, 4),
(166, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:24:46', '2020-10-16 17:24:46', NULL, 2, 4),
(167, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:24:52', '2020-10-16 17:24:52', NULL, 2, 4),
(168, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:24:59', '2020-10-16 17:24:59', NULL, 2, 4),
(169, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:25:12', '2020-10-16 17:25:12', NULL, 2, 4),
(170, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:25:19', '2020-10-16 17:25:19', NULL, 2, 4),
(171, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:25:29', '2020-10-16 17:25:29', NULL, 2, 4),
(172, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:25:55', '2020-10-16 17:25:55', NULL, 2, 4),
(173, '<p>FDGSFBCBVNBN&nbsp;</p>', 'multi_days', NULL, '2020-10-13', '2020-10-14', NULL, NULL, NULL, NULL, '2020-10-16 17:26:29', '2020-11-12 20:26:28', '2020-11-12 20:26:28', 2, 4),
(174, '<p>dsfdvlukjer gjbudkj</p>', 'multi_days', NULL, '2020-10-07', '2020-10-21', 'accepted', NULL, NULL, NULL, '2020-10-16 17:34:35', '2020-10-16 18:53:59', NULL, 4, 2),
(175, '<p>WAFDSFVBVKJ HN&nbsp;</p>', 'single_day', '4', '2020-10-13', NULL, NULL, NULL, NULL, NULL, '2020-10-16 17:41:21', '2020-10-16 17:51:16', NULL, 9, 7),
(176, '<p>dsafdsnbvn n</p>', 'hours', '7', '2020-10-13', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:49:45', '2020-10-17 09:49:45', NULL, 6, 4),
(177, '<p>dsafdsnbvn n</p>', 'hours', '7', '2020-10-13', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:50:37', '2020-10-17 09:50:37', NULL, 6, 4),
(178, '<p>dsafdsnbvn n</p>', 'hours', '7', '2020-10-13', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:51:11', '2020-10-17 09:51:11', NULL, 6, 4),
(179, '<p>dsafdsnbvn n</p>', 'hours', '7', '2020-10-13', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:51:21', '2020-10-17 09:51:21', NULL, 6, 4),
(180, '<p>dsafdsnbvn n</p>', 'hours', '7', '2020-10-13', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:53:56', '2020-10-17 09:53:56', NULL, 6, 4),
(181, '<p>sadsfb&nbsp;</p>', 'single_day', '5', '2020-10-06', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:55:48', '2020-10-17 09:55:48', NULL, 6, 3),
(182, '<p>sadsfb&nbsp;</p>', 'single_day', '5', '2020-10-06', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:56:18', '2020-10-17 09:56:18', NULL, 6, 3),
(183, '<p>sadsfb&nbsp;</p>', 'single_day', '5', '2020-10-06', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:56:33', '2020-10-17 09:56:33', NULL, 6, 3),
(184, '<p>sadsfb&nbsp;</p>', 'single_day', '5', '2020-10-06', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:56:39', '2020-10-17 09:56:39', NULL, 6, 3),
(185, '<p>sadsfb&nbsp;</p>', 'single_day', '5', '2020-10-06', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:58:41', '2020-10-17 09:58:41', NULL, 6, 3),
(186, '<p>sadsfb&nbsp;</p>', 'single_day', '5', '2020-10-06', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:58:59', '2020-10-17 09:58:59', NULL, 6, 3),
(187, '<p>sadsfb&nbsp;</p>', 'single_day', '5', '2020-10-06', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 09:59:17', '2020-10-17 09:59:17', NULL, 6, 3),
(188, NULL, 'single_day', NULL, '2020-10-17', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 10:00:22', '2020-10-17 10:00:22', NULL, 6, 4),
(189, NULL, 'single_day', NULL, '2020-10-17', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 10:02:24', '2020-10-17 10:02:24', NULL, 6, 4),
(190, NULL, 'single_day', NULL, '2020-10-17', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 10:02:59', '2020-10-17 10:02:59', NULL, 6, 4),
(191, NULL, 'single_day', NULL, '2020-10-17', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 10:03:21', '2020-10-17 10:03:21', NULL, 6, 4),
(192, '<p>wafdsfgbvnb</p>', 'single_day', NULL, '2020-10-14', NULL, 'pending', NULL, NULL, NULL, '2020-10-17 10:04:10', '2020-10-17 10:04:10', NULL, 14, 3),
(193, '<p>qwfewgfbdgfb</p>', 'multi_days', NULL, '2020-11-07', '2020-11-14', 'pending', NULL, '<p>fadvsfdvbv&nbsp;</p>', NULL, '2020-11-07 19:21:56', '2020-11-07 19:21:56', NULL, 23, 9),
(194, '<p>qwfewgfbdgfb</p>', 'multi_days', NULL, '2020-11-07', '2020-11-14', 'pending', NULL, '<p>fadvsfdvbv&nbsp;</p>', NULL, '2020-11-07 19:23:22', '2020-11-07 19:23:22', NULL, 23, 9),
(195, '<p>qwfewgfbdgfb</p>', 'multi_days', NULL, '2020-11-07', '2020-11-14', 'pending', NULL, '<p>fadvsfdvbv&nbsp;</p>', NULL, '2020-11-07 19:23:43', '2020-11-07 19:23:43', NULL, 23, 9),
(196, '<p>qwfewgfbdgfb</p>', 'multi_days', NULL, '2020-11-07', '2020-11-14', 'pending', NULL, '<p>fadvsfdvbv&nbsp;</p>', NULL, '2020-11-07 19:24:02', '2020-11-07 19:24:02', NULL, 23, 9),
(197, '<p>qwfewgfbdgfb</p>', 'multi_days', NULL, '2020-11-07', '2020-11-14', 'pending', NULL, '<p>fadvsfdvbv&nbsp;</p>', NULL, '2020-11-07 19:24:49', '2020-11-07 19:24:49', NULL, 23, 9),
(198, '<p>DSADVFCVKJHKJ</p>', 'single_day', NULL, '2020-11-12', NULL, 'pending', NULL, '<p>dsvvcbv</p>', NULL, '2020-11-11 19:02:06', '2020-11-11 19:02:06', NULL, 23, 2),
(199, '<p>DSADVFCVKJHKJ</p>', 'single_day', NULL, '2020-11-12', NULL, 'pending', NULL, '<p>dsvvcbv</p>', NULL, '2020-11-11 19:03:08', '2020-11-11 19:03:08', NULL, 23, 2),
(200, '<p>DSADVFCVKJHKJ</p>', 'single_day', NULL, '2020-11-12', NULL, 'pending', NULL, '<p>dsvvcbv</p>', NULL, '2020-11-11 19:04:27', '2020-11-11 19:04:27', NULL, 23, 2),
(201, '<p>DSADVFCVKJHKJ</p>', 'single_day', NULL, '2020-11-12', NULL, 'pending', NULL, '<p>dsvvcbv</p>', NULL, '2020-11-11 19:08:19', '2020-11-11 19:08:19', NULL, 23, 2),
(202, '<p>DSADVFCVKJHKJ</p>', 'single_day', NULL, '2020-11-12', NULL, 'pending', NULL, '<p>dsvvcbv</p>', NULL, '2020-11-11 19:08:39', '2020-11-11 19:08:39', NULL, 23, 2),
(203, '<p>DSADVFCVKJHKJ</p>', 'single_day', NULL, '2020-11-12', NULL, 'pending', NULL, '<p>dsvvcbv</p>', NULL, '2020-11-11 19:09:30', '2020-11-11 19:09:30', NULL, 23, 2),
(204, '<p>DSADVFCVKJHKJ</p>', 'single_day', NULL, '2020-11-12', NULL, 'pending', NULL, '<p>dsvvcbv</p>', NULL, '2020-11-11 19:09:57', '2020-11-12 14:52:40', '2020-11-12 14:52:40', 23, 2),
(205, '<p>kldfdvgbhkjn&nbsp;</p>', 'single_day', NULL, '2020-11-11', NULL, 'pending', NULL, NULL, NULL, '2020-11-11 19:12:59', '2020-11-12 18:45:46', NULL, 23, 5),
(206, NULL, 'single_day', NULL, '2020-11-11', NULL, 'pending', NULL, NULL, NULL, '2020-11-12 06:14:32', '2020-11-12 06:14:32', NULL, 23, 3),
(207, NULL, 'single_day', NULL, '2020-11-11', NULL, 'pending', NULL, NULL, NULL, '2020-11-12 06:15:13', '2020-11-12 06:15:13', NULL, 23, 3),
(208, NULL, 'single_day', NULL, '2020-11-12', '2020-11-12', 'pending', NULL, NULL, NULL, '2020-11-12 06:37:32', '2020-11-12 06:37:32', NULL, 23, 5),
(209, NULL, 'single_day', NULL, '2020-11-04', NULL, 'pending', NULL, NULL, NULL, '2020-11-14 07:26:34', '2020-11-14 07:26:34', NULL, 2, 2),
(210, NULL, 'single_day', NULL, '2020-11-04', NULL, 'pending', NULL, NULL, NULL, '2020-11-14 07:27:30', '2020-11-14 07:27:30', NULL, 2, 2),
(211, '<p>wafdsfbbvb</p>', 'single_day', NULL, '2020-10-28', NULL, 'pending', NULL, NULL, NULL, '2020-11-14 07:36:19', '2020-11-14 07:36:19', NULL, 8, 3),
(212, NULL, 'single_day', NULL, '2020-11-13', NULL, 'pending', NULL, NULL, NULL, '2020-11-14 07:41:46', '2020-11-14 07:41:46', NULL, 2, 3),
(213, '<p>hgnbggjh,mb</p>', 'single_day', NULL, '2020-11-14', '2020-11-14', 'pending', NULL, NULL, NULL, '2020-11-14 12:05:09', '2020-11-14 12:05:09', NULL, 4, 2),
(214, '<p>hgnbggjh,mb</p>', 'single_day', NULL, '2020-11-14', '2020-11-14', 'pending', NULL, NULL, NULL, '2020-11-14 12:06:10', '2020-11-14 12:06:10', NULL, 4, 2),
(215, '<p>hgnbggjh,mb</p>', 'single_day', NULL, '2020-11-14', '2020-11-14', 'pending', NULL, NULL, NULL, '2020-11-14 12:06:33', '2020-11-14 12:06:33', NULL, 4, 2),
(216, '<p>dvvcbv&nbsp;</p>', 'single_day', NULL, '2020-11-21', NULL, 'pending', NULL, NULL, NULL, '2020-11-14 17:06:19', '2020-11-14 17:06:19', NULL, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `leave_categories`
--

CREATE TABLE `leave_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_quota` int(11) DEFAULT NULL,
  `deducted_amount` float DEFAULT NULL,
  `annual_monthly` float DEFAULT NULL COMMENT '	annually=1 monthly=0	',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_categories`
--

INSERT INTO `leave_categories` (`id`, `name`, `leave_quota`, `deducted_amount`, `annual_monthly`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Emergency Leave', 7, 0, 0, NULL, NULL, NULL),
(3, 'Annual Leave', 21, 0, 0, NULL, NULL, NULL),
(4, 'Sick Leave', 3, 0, 0, NULL, NULL, NULL),
(5, 'Haj Leave', 20, 0, 0, NULL, NULL, NULL),
(6, 'Umrah Leave', 10, 0, 0, NULL, NULL, NULL),
(7, 'Maternity Leave', 45, 0, 0, NULL, NULL, NULL),
(8, 'Marriage Leave', 15, 0, 0, NULL, NULL, NULL),
(9, 'Working From Home', 2, 0, 0, NULL, NULL, NULL),
(10, 'Leave Early', 2, 0, 0, NULL, NULL, NULL),
(11, 'Clock in late', 2, 0.5, 0, NULL, NULL, NULL),
(12, 'Client Meeting', 15, 0, 0, NULL, NULL, NULL),
(15, 'Survey', 30, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locals`
--

CREATE TABLE `locals` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'Modules\\HR\\Entities\\LeaveApplication', 106, 'attachments', '5f89dc1ad10c9_61NYwvfwPtL._AC_UX385_', '5f89dc1ad10c9_61NYwvfwPtL._AC_UX385_.jpg', 'image/jpeg', 'public', 16029, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 1, '2020-10-16 15:53:28', '2020-10-16 15:53:39'),
(2, 'App\\Models\\Announcement', 2, 'attachments', '5f89edbb79562_1633128_1', '5f89edbb79562_1633128_1.jpg', 'image/jpeg', 'public', 60976, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 2, '2020-10-16 17:00:20', '2020-10-16 17:00:48'),
(3, 'App\\Models\\Announcement', 4, 'attachments', '5f89eee6af8bd_4105284_0', '5f89eee6af8bd_4105284_0.jpg', 'image/jpeg', 'public', 57782, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 3, '2020-10-16 17:05:25', '2020-10-16 17:05:26'),
(4, 'Modules\\HR\\Entities\\LeaveApplication', 163, 'attachments', '5f89f28ec7f6b_Women-Flamingo-Tshirt-Harajuku-Summer-Funny-Printed-T-Shirt-Femme-Camisetas-Mujer-Graceful-Elegant-Flamingo-shirt_grande', '5f89f28ec7f6b_Women-Flamingo-Tshirt-Harajuku-Summer-Funny-Printed-T-Shirt-Femme-Camisetas-Mujer-Graceful-Elegant-Flamingo-shirt_grande.jpg', 'image/jpeg', 'public', 29738, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 4, '2020-10-16 17:20:51', '2020-10-16 17:20:52'),
(6, 'Modules\\HR\\Entities\\LeaveApplication', 174, 'attachments', '5f89f5c94a7cc_2020-01-14 at 01-45-39', '5f89f5c94a7cc_2020-01-14-at-01-45-39.png', 'image/png', 'public', 36217, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 6, '2020-10-16 17:34:35', '2020-10-16 17:34:36'),
(7, 'Modules\\HR\\Entities\\LeaveApplication', 175, 'attachments', '5f89f75fd1d20_2020-01-13 at 23-16-46', '5f89f75fd1d20_2020-01-13-at-23-16-46.png', 'image/png', 'public', 67372, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 7, '2020-10-16 17:41:22', '2020-10-16 17:41:22'),
(8, 'Modules\\HR\\Entities\\LeaveApplication', 173, 'attachments', '5f8ad30283315_2020-01-14 at 01-41-57', '5f8ad30283315_2020-01-14-at-01-41-57.png', 'image/png', 'public', 88068, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 8, '2020-10-17 09:18:38', '2020-10-17 09:18:49'),
(9, 'Modules\\HR\\Entities\\LeaveApplication', 172, 'attachments', '5f8ad7fe8608c_2020-01-14 at 01-45-39', '5f8ad7fe8608c_2020-01-14-at-01-45-39.png', 'image/png', 'public', 36217, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 9, '2020-10-17 09:40:49', '2020-10-17 09:40:51'),
(11, 'Modules\\HR\\Entities\\LeaveApplication', 171, 'attachments', '5f8ad9c046e2c_2020-03-24 at 10-54-19', '5f8ad9c046e2c_2020-03-24-at-10-54-19.png', 'image/png', 'public', 11053, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 10, '2020-10-17 09:47:14', '2020-10-17 09:47:15'),
(12, 'Modules\\HR\\Entities\\LeaveApplication', 190, 'attachments', '5f8adcc3efc6a_Marwa Mostafa', '5f8adcc3efc6a_Marwa-Mostafa.doc', 'application/msword', 'public', 160256, '[]', '[]', '[]', 11, '2020-10-17 10:02:59', '2020-10-17 10:02:59'),
(13, 'Modules\\HR\\Entities\\LeaveApplication', 191, 'attachments', '5f8add8752527_Marwa Mostafa', '5f8add8752527_Marwa-Mostafa.doc', 'application/msword', 'public', 160256, '[]', '[]', '[]', 12, '2020-10-17 10:03:21', '2020-10-17 10:03:21'),
(14, 'Modules\\HR\\Entities\\LeaveApplication', 192, 'attachments', '5f8adda831b6f_Marwa Mostafa', '5f8adda831b6f_Marwa-Mostafa.doc', 'application/msword', 'public', 160256, '[]', '[]', '[]', 13, '2020-10-17 10:04:10', '2020-10-17 10:04:10'),
(15, 'App\\Models\\AccountDetail', 35, 'avatar', '5fa18aa912e17_sample', '5fa18aa912e17_sample.jpg', 'image/png', 'public', 36217, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 14, '2020-11-03 14:52:05', '2020-11-03 14:52:13'),
(16, 'App\\Models\\AccountDetail', 37, 'avatar', '5fa1abe82bf11_120453302_188618032671628_2852122862132844012_o', '5fa1abe82bf11_120453302_188618032671628_2852122862132844012_o.jpg', 'image/jpeg', 'public', 73759, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 15, '2020-11-03 17:15:40', '2020-11-03 17:15:42'),
(17, 'Modules\\HR\\Entities\\JobApplication', 1, 'resume', '5fa8ed4e56113_OTG Privacy Policy', '5fa8ed4e56113_OTG-Privacy-Policy.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 18455, '[]', '[]', '[]', 16, '2020-11-09 05:18:52', '2020-11-09 05:18:52'),
(18, 'Modules\\HR\\Entities\\JobApplication', 5, 'resume', '5fa8efc4074b9_New Microsoft Office Word Document-converted', '5fa8efc4074b9_New-Microsoft-Office-Word-Document-converted.pdf', 'application/pdf', 'public', 305472, '[]', '[]', '[]', 17, '2020-11-09 05:29:46', '2020-11-09 05:29:46'),
(19, 'Modules\\HR\\Entities\\JobApplication', 7, 'resume', '5fa8f0687761c_New Microsoft Office Word Document-converted', '5fa8f0687761c_New-Microsoft-Office-Word-Document-converted.pdf', 'application/pdf', 'public', 305472, '[]', '[]', '[]', 18, '2020-11-09 05:31:55', '2020-11-09 05:31:55'),
(20, 'Modules\\HR\\Entities\\JobApplication', 9, 'resume', '5fa8f110009c1_New Microsoft Office Word Document-converted', '5fa8f110009c1_New-Microsoft-Office-Word-Document-converted.pdf', 'application/pdf', 'public', 305472, '[]', '[]', '[]', 19, '2020-11-09 05:34:41', '2020-11-09 05:34:41'),
(21, 'Modules\\HR\\Entities\\JobApplication', 11, 'resume', '5fa8f1701833e_New Microsoft Office Word Document-converted', '5fa8f1701833e_New-Microsoft-Office-Word-Document-converted.pdf', 'application/pdf', 'public', 305472, '[]', '[]', '[]', 20, '2020-11-09 05:36:19', '2020-11-09 05:36:19'),
(22, 'Modules\\HR\\Entities\\Vacation', 3, 'attachments', '5faaf26a4de9d_54b60af2', '5faaf26a4de9d_54b60af2.png', 'image/png', 'public', 46744, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 21, '2020-11-10 18:05:01', '2020-11-10 18:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_minutes`
--

CREATE TABLE `meeting_minutes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `attendees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_minutes`
--

INSERT INTO `meeting_minutes` (`id`, `name`, `start_date`, `end_date`, `attendees`, `location`, `description`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'wfaedgfhnmn65461', '2020-10-21 16:45:48', '2020-10-19 16:45:51', '[\"3\",\"6\",\"12\",\"14\"]', 'public_html/creatoreg/resources/js/components', '<p>efsgdgfnhgb&nbsp;</p>', '2020-10-17 14:18:59', '2020-10-17 19:40:40', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_09_27_000001_create_media_table', 1),
(8, '2020_09_27_000002_create_menus_table', 1),
(9, '2020_09_27_000003_create_announcements_table', 1),
(10, '2020_09_27_000004_create_tickets_table', 1),
(11, '2020_09_27_000005_create_permissions_table', 1),
(12, '2020_09_27_000006_create_bugs_table', 1),
(13, '2020_09_27_000007_create_task_uploaded_files_table', 1),
(14, '2020_09_27_000008_create_milestones_table', 1),
(15, '2020_09_27_000009_create_acounts_table', 1),
(16, '2020_09_27_000010_create_work_trackings_table', 1),
(17, '2020_09_27_000011_create_project_settings_table', 1),
(18, '2020_09_27_000012_create_task_attachments_table', 1),
(19, '2020_09_27_000013_create_projects_table', 1),
(20, '2020_09_27_000014_create_client_menus_table', 1),
(21, '2020_09_27_000015_create_kb_categories_table', 1),
(22, '2020_09_27_000016_create_clients_table', 1),
(23, '2020_09_27_000017_create_penalty_categories_table', 1),
(24, '2020_09_27_000018_create_opportunities_table', 1),
(25, '2020_09_27_000019_create_private_chats_table', 1),
(26, '2020_09_27_000020_create_salary_payments_table', 1),
(27, '2020_09_27_000021_create_salutations_table', 1),
(28, '2020_09_27_000022_create_lead_statuses_table', 1),
(29, '2020_09_27_000023_create_lead_sources_table', 1),
(30, '2020_09_27_000024_create_lead_categories_table', 1),
(31, '2020_09_27_000025_create_interested_ins_table', 1),
(32, '2020_09_27_000026_create_proposals_table', 1),
(33, '2020_09_27_000027_create_files_table', 1),
(34, '2020_09_27_000028_create_invoices_table', 1),
(35, '2020_09_27_000029_create_customer_groups_table', 1),
(36, '2020_09_27_000030_create_transfers_table', 1),
(37, '2020_09_27_000031_create_salary_templates_table', 1),
(38, '2020_09_27_000032_create_dalary_allowances_table', 1),
(39, '2020_09_27_000033_create_salary_payment_allowances_table', 1),
(40, '2020_09_27_000034_create_advance_salaries_table', 1),
(41, '2020_09_27_000035_create_stocks_table', 1),
(42, '2020_09_27_000036_create_salary_payment_deductions_table', 1),
(43, '2020_09_27_000037_create_stock_sub_categories_table', 1),
(44, '2020_09_27_000038_create_stock_categories_table', 1),
(45, '2020_09_27_000039_create_tax_rates_table', 1),
(46, '2020_09_27_000040_create_employee_banks_table', 1),
(47, '2020_09_27_000041_create_salary_payment_details_table', 1),
(48, '2020_09_27_000042_create_transactions_table', 1),
(49, '2020_09_27_000043_create_todos_table', 1),
(50, '2020_09_27_000044_create_salary_payslips_table', 1),
(51, '2020_09_27_000045_create_payments_table', 1),
(52, '2020_09_27_000046_create_payment_methods_table', 1),
(53, '2020_09_27_000047_create_purchase_payments_table', 1),
(54, '2020_09_27_000048_create_hourly_rates_table', 1),
(55, '2020_09_27_000049_create_return_stocks_table', 1),
(56, '2020_09_27_000050_create_online_payments_table', 1),
(57, '2020_09_27_000051_create_purchases_table', 1),
(58, '2020_09_27_000052_create_vacations_table', 1),
(59, '2020_09_27_000053_create_suppliers_table', 1),
(60, '2020_09_27_000054_create_proposals_items_table', 1),
(61, '2020_09_27_000055_create_locals_table', 1),
(62, '2020_09_27_000056_create_job_applications_table', 1),
(63, '2020_09_27_000057_create_leads_table', 1),
(64, '2020_09_27_000058_create_salary_deductions_table', 1),
(65, '2020_09_27_000059_create_time_entries_table', 1),
(66, '2020_09_27_000060_create_account_details_table', 1),
(67, '2020_09_27_000061_create_designations_table', 1),
(68, '2020_09_27_000062_create_dashboard_settings_table', 1),
(69, '2020_09_27_000063_create_job_circulars_table', 1),
(70, '2020_09_27_000064_create_user_alerts_table', 1),
(71, '2020_09_27_000065_create_expense_categories_table', 1),
(72, '2020_09_27_000066_create_tasks_table', 1),
(73, '2020_09_27_000067_create_task_tags_table', 1),
(74, '2020_09_27_000068_create_task_statuses_table', 1),
(75, '2020_09_27_000069_create_income_categories_table', 1),
(76, '2020_09_27_000070_create_time_projects_table', 1),
(77, '2020_09_27_000071_create_overtimes_table', 1),
(78, '2020_09_27_000072_create_time_work_types_table', 1),
(79, '2020_09_27_000073_create_expenses_table', 1),
(80, '2020_09_27_000074_create_employees_table', 1),
(81, '2020_09_27_000075_create_crm_documents_table', 1),
(82, '2020_09_27_000076_create_incomes_table', 1),
(83, '2020_09_27_000077_create_crm_notes_table', 1),
(84, '2020_09_27_000078_create_crm_customers_table', 1),
(85, '2020_09_27_000079_create_crm_statuses_table', 1),
(86, '2020_09_27_000080_create_users_table', 1),
(87, '2020_09_27_000081_create_roles_table', 1),
(88, '2020_09_27_000082_create_quotation_details_table', 1),
(89, '2020_09_27_000083_create_deparrtments_table', 1),
(90, '2020_09_27_000084_create_quotation_forms_table', 1),
(91, '2020_09_27_000085_create_outgoing_emails_table', 1),
(92, '2020_09_27_000086_create_leave_applications_table', 1),
(93, '2020_09_27_000087_create_technical_categories_table', 1),
(94, '2020_09_27_000088_create_employee_awards_table', 1),
(95, '2020_09_27_000089_create_attendancesses_table', 1),
(96, '2020_09_27_000090_create_leave_categories_table', 1),
(97, '2020_09_27_000091_create_performance_indicators_table', 1),
(98, '2020_09_27_000092_create_meeting_minutes_table', 1),
(99, '2020_09_27_000093_create_daily_attendances_table', 1),
(100, '2020_09_27_000094_create_trainings_table', 1),
(101, '2020_09_27_000095_create_monthly_attendances_table', 1),
(102, '2020_09_27_000096_create_quotations_table', 1),
(103, '2020_09_27_000097_create_holidays_table', 1),
(104, '2020_09_27_000098_create_permission_tax_rate_pivot_table', 1),
(105, '2020_09_27_000099_create_permission_proposal_pivot_table', 1),
(106, '2020_09_27_000100_create_permission_user_pivot_table', 1),
(107, '2020_09_27_000101_create_permission_transfer_pivot_table', 1),
(108, '2020_09_27_000102_create_permission_transaction_pivot_table', 1),
(109, '2020_09_27_000103_create_employee_permission_pivot_table', 1),
(110, '2020_09_27_000104_create_lead_permission_pivot_table', 1),
(111, '2020_09_27_000105_create_role_user_pivot_table', 1),
(112, '2020_09_27_000106_create_permission_role_pivot_table', 1),
(113, '2020_09_27_000107_create_permission_work_tracking_pivot_table', 1),
(114, '2020_09_27_000108_create_permission_return_stock_pivot_table', 1),
(115, '2020_09_27_000109_create_opportunity_permission_pivot_table', 1),
(116, '2020_09_27_000110_create_user_user_alert_pivot_table', 1),
(117, '2020_09_27_000111_create_acount_permission_pivot_table', 1),
(118, '2020_09_27_000112_create_bug_permission_pivot_table', 1),
(119, '2020_09_27_000113_create_designation_permission_pivot_table', 1),
(120, '2020_09_27_000114_create_permission_ticket_pivot_table', 1),
(121, '2020_09_27_000115_create_permission_purchase_pivot_table', 1),
(122, '2020_09_27_000116_create_permission_training_pivot_table', 1),
(123, '2020_09_27_000117_create_permission_project_pivot_table', 1),
(124, '2020_09_27_000118_create_job_circular_permission_pivot_table', 1),
(125, '2020_09_27_000119_create_task_task_tag_pivot_table', 1),
(126, '2020_09_27_000120_create_permission_supplier_pivot_table', 1),
(127, '2020_09_27_000121_create_permission_task_pivot_table', 1),
(128, '2020_09_27_000122_add_relationship_fields_to_todos_table', 1),
(129, '2020_09_27_000123_add_relationship_fields_to_salary_payments_table', 1),
(130, '2020_09_27_000124_add_relationship_fields_to_quotations_table', 1),
(131, '2020_09_27_000125_add_relationship_fields_to_private_chats_table', 1),
(132, '2020_09_27_000126_add_relationship_fields_to_task_uploaded_files_table', 1),
(133, '2020_09_27_000127_add_relationship_fields_to_salary_payment_allowances_table', 1),
(134, '2020_09_27_000128_add_relationship_fields_to_quotation_details_table', 1),
(135, '2020_09_27_000129_add_relationship_fields_to_task_attachments_table', 1),
(136, '2020_09_27_000130_add_relationship_fields_to_salary_payslips_table', 1),
(137, '2020_09_27_000131_add_relationship_fields_to_files_table', 1),
(138, '2020_09_27_000132_add_relationship_fields_to_salary_payment_deductions_table', 1),
(139, '2020_09_27_000133_add_relationship_fields_to_vacations_table', 1),
(140, '2020_09_27_000134_add_relationship_fields_to_performance_indicators_table', 1),
(141, '2020_09_27_000135_add_relationship_fields_to_quotation_forms_table', 1),
(142, '2020_09_27_000136_add_relationship_fields_to_expenses_table', 1),
(143, '2020_09_27_000137_add_relationship_fields_to_salary_payment_details_table', 1),
(144, '2020_09_27_000138_add_relationship_fields_to_incomes_table', 1),
(145, '2020_09_27_000139_add_relationship_fields_to_bugs_table', 1),
(146, '2020_09_27_000140_add_relationship_fields_to_salary_deductions_table', 1),
(147, '2020_09_27_000141_add_relationship_fields_to_overtimes_table', 1),
(148, '2020_09_27_000142_add_relationship_fields_to_monthly_attendances_table', 1),
(149, '2020_09_27_000143_add_relationship_fields_to_daily_attendances_table', 1),
(150, '2020_09_27_000144_add_relationship_fields_to_attendancesses_table', 1),
(151, '2020_09_27_000145_add_relationship_fields_to_employee_awards_table', 1),
(152, '2020_09_27_000146_add_relationship_fields_to_meeting_minutes_table', 1),
(153, '2020_09_27_000147_add_relationship_fields_to_leave_applications_table', 1),
(154, '2020_09_27_000148_add_relationship_fields_to_trainings_table', 1),
(155, '2020_09_27_000149_add_relationship_fields_to_holidays_table', 1),
(156, '2020_09_27_000150_add_relationship_fields_to_account_details_table', 1),
(157, '2020_09_27_000151_add_relationship_fields_to_job_applications_table', 1),
(158, '2020_09_27_000152_add_relationship_fields_to_designations_table', 1),
(159, '2020_09_27_000153_add_relationship_fields_to_deparrtments_table', 1),
(160, '2020_09_27_000154_add_relationship_fields_to_tasks_table', 1),
(161, '2020_09_27_000155_add_relationship_fields_to_time_entries_table', 1),
(162, '2020_09_27_000156_add_relationship_fields_to_employees_table', 1),
(163, '2020_09_27_000157_add_relationship_fields_to_crm_documents_table', 1),
(164, '2020_09_27_000158_add_relationship_fields_to_crm_notes_table', 1),
(165, '2020_09_27_000159_add_relationship_fields_to_crm_customers_table', 1),
(166, '2020_09_27_000160_add_relationship_fields_to_job_circulars_table', 1),
(167, '2020_09_27_000161_add_relationship_fields_to_leads_table', 1),
(168, '2020_09_27_000162_add_relationship_fields_to_dalary_allowances_table', 1),
(169, '2020_09_27_000163_add_relationship_fields_to_return_stocks_table', 1),
(170, '2020_09_27_000164_add_relationship_fields_to_advance_salaries_table', 1),
(171, '2020_09_27_000165_add_relationship_fields_to_stocks_table', 1),
(172, '2020_09_27_000166_add_relationship_fields_to_stock_sub_categories_table', 1),
(173, '2020_09_27_000167_add_relationship_fields_to_employee_banks_table', 1),
(174, '2020_09_27_000168_add_relationship_fields_to_transfers_table', 1),
(175, '2020_09_27_000169_add_relationship_fields_to_transactions_table', 1),
(176, '2020_09_27_000170_add_relationship_fields_to_payments_table', 1),
(177, '2020_09_27_000171_add_relationship_fields_to_purchase_payments_table', 1),
(178, '2020_09_27_000172_add_relationship_fields_to_purchases_table', 1),
(179, '2020_09_27_000173_add_relationship_fields_to_opportunities_table', 1),
(180, '2020_09_27_000174_add_relationship_fields_to_suppliers_table', 1),
(181, '2020_09_27_000175_add_relationship_fields_to_proposals_items_table', 1),
(182, '2020_09_27_000176_add_relationship_fields_to_invoices_table', 1),
(183, '2020_09_27_000177_add_relationship_fields_to_announcements_table', 1),
(184, '2020_09_27_000178_add_relationship_fields_to_tickets_table', 1),
(185, '2020_09_27_000179_add_relationship_fields_to_milestones_table', 1),
(186, '2020_09_27_000180_add_relationship_fields_to_work_trackings_table', 1),
(187, '2020_09_27_000181_add_relationship_fields_to_projects_table', 1),
(188, '2020_09_27_000182_add_relationship_fields_to_clients_table', 1),
(189, '2020_09_27_000183_create_qa_topics_table', 1),
(190, '2020_09_27_000184_create_qa_messages_table', 1),
(191, '2020_09_30_075151_create_fingerprint_attendances_table', 2),
(192, '2020_09_27_000083_create_departments_table', 3),
(193, '2020_09_27_000089_create_attendances_table', 3),
(196, '2020_09_27_000144_create_employee_requests_table', 4),
(197, '2020_09_27_000093_create_working_days_table', 5),
(198, '2020_09_27_000153_add_relationship_fields_to_departments_table', 5),
(201, '2020_09_27_000168_create_set_times_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client_visible` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_attendances`
--

CREATE TABLE `monthly_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_attendance_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_hours` int(11) DEFAULT NULL,
  `total_absence` int(11) DEFAULT NULL,
  `total_vacation` int(11) DEFAULT NULL,
  `holidays` int(11) DEFAULT NULL,
  `created_month` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `model_id` int(10) UNSIGNED DEFAULT NULL,
  `model_type` varchar(191) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `model_id`, `model_type`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Emergency Leave', 215, 'Modules\\HR\\Entities\\LeaveApplication', 'Ahmed Abo-Zeid Mosalamy  wants to apply for leave.', '2020-11-14 12:06:37', '2020-11-14 12:06:37'),
(2, 'Emergency Leave', 216, 'Modules\\HR\\Entities\\LeaveApplication', 'Marwa Sayed Mostafa wants to apply for leave.', '2020-11-14 17:06:27', '2020-11-14 17:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_payments`
--

CREATE TABLE `online_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `gateway_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

CREATE TABLE `opportunities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `probability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closed_date` date DEFAULT NULL,
  `expected_revenue` double(15,2) DEFAULT NULL,
  `new_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lead_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_permission`
--

CREATE TABLE `opportunity_permission` (
  `opportunity_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_emails`
--

CREATE TABLE `outgoing_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `delivered` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `overtime_date` date NOT NULL,
  `overtime_hours` time NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `payment_date` date DEFAULT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalty_categories`
--

CREATE TABLE `penalty_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fine_amount` int(11) NOT NULL,
  `penelty_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_indicators`
--

CREATE TABLE `performance_indicators` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_technical_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentation_skill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_of_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `efficiency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `integrity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profissionalism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `critical_thinking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conflict_management` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ability_to_meet_deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `designation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'basic_c_r_m_access', NULL, NULL, NULL),
(18, 'crm_status_create', NULL, NULL, NULL),
(19, 'crm_status_delete', NULL, NULL, NULL),
(20, 'crm_status_access', NULL, NULL, NULL),
(21, 'crm_customer_create', NULL, NULL, NULL),
(22, 'crm_customer_edit', NULL, NULL, NULL),
(23, 'crm_customer_show', NULL, NULL, NULL),
(24, 'crm_customer_delete', NULL, NULL, NULL),
(25, 'crm_customer_access', NULL, NULL, NULL),
(26, 'crm_note_create', NULL, NULL, NULL),
(27, 'crm_note_edit', NULL, NULL, NULL),
(28, 'crm_note_show', NULL, NULL, NULL),
(29, 'crm_note_delete', NULL, NULL, NULL),
(30, 'crm_note_access', NULL, NULL, NULL),
(31, 'crm_document_create', NULL, NULL, NULL),
(32, 'crm_document_edit', NULL, NULL, NULL),
(33, 'crm_document_show', NULL, NULL, NULL),
(34, 'crm_document_delete', NULL, NULL, NULL),
(35, 'crm_document_access', NULL, NULL, NULL),
(36, 'hr_access', NULL, NULL, NULL),
(37, 'employee_create', NULL, NULL, NULL),
(38, 'employee_edit', NULL, NULL, NULL),
(39, 'employee_show', NULL, NULL, NULL),
(40, 'employee_delete', NULL, NULL, NULL),
(41, 'employee_access', NULL, NULL, NULL),
(42, 'time_management_access', NULL, NULL, NULL),
(43, 'time_work_type_create', NULL, NULL, NULL),
(44, 'time_work_type_edit', NULL, NULL, NULL),
(45, 'time_work_type_show', NULL, NULL, NULL),
(46, 'time_work_type_delete', NULL, NULL, NULL),
(47, 'time_work_type_access', NULL, NULL, NULL),
(48, 'time_project_create', NULL, NULL, NULL),
(49, 'time_project_edit', NULL, NULL, NULL),
(50, 'time_project_show', NULL, NULL, NULL),
(51, 'time_project_delete', NULL, NULL, NULL),
(52, 'time_project_access', NULL, NULL, NULL),
(53, 'time_entry_create', NULL, NULL, NULL),
(54, 'time_entry_edit', NULL, NULL, NULL),
(55, 'time_entry_show', NULL, NULL, NULL),
(56, 'time_entry_delete', NULL, NULL, NULL),
(57, 'time_entry_access', NULL, NULL, NULL),
(58, 'time_report_create', NULL, NULL, NULL),
(59, 'time_report_edit', NULL, NULL, NULL),
(60, 'time_report_show', NULL, NULL, NULL),
(61, 'time_report_delete', NULL, NULL, NULL),
(62, 'time_report_access', NULL, NULL, NULL),
(63, 'task_management_access', NULL, NULL, NULL),
(64, 'task_status_create', NULL, NULL, NULL),
(65, 'task_status_edit', NULL, NULL, NULL),
(66, 'task_status_show', NULL, NULL, NULL),
(67, 'task_status_delete', NULL, NULL, NULL),
(68, 'task_status_access', NULL, NULL, NULL),
(69, 'task_tag_create', NULL, NULL, NULL),
(70, 'task_tag_edit', NULL, NULL, NULL),
(71, 'task_tag_show', NULL, NULL, NULL),
(72, 'task_tag_delete', NULL, NULL, NULL),
(73, 'task_tag_access', NULL, NULL, NULL),
(74, 'task_create', NULL, NULL, NULL),
(75, 'task_edit', NULL, NULL, NULL),
(76, 'task_show', NULL, NULL, NULL),
(77, 'task_delete', NULL, NULL, NULL),
(78, 'task_access', NULL, NULL, NULL),
(79, 'tasks_calendar_access', NULL, NULL, NULL),
(80, 'user_alert_create', NULL, NULL, NULL),
(81, 'user_alert_show', NULL, NULL, NULL),
(82, 'user_alert_delete', NULL, NULL, NULL),
(83, 'user_alert_access', NULL, NULL, NULL),
(84, 'department_create', NULL, NULL, NULL),
(85, 'department_edit', NULL, NULL, NULL),
(86, 'department_show', NULL, NULL, NULL),
(87, 'department_delete', NULL, NULL, NULL),
(88, 'department_access', NULL, NULL, NULL),
(89, 'designation_create', NULL, NULL, NULL),
(90, 'designation_edit', NULL, NULL, NULL),
(91, 'designation_show', NULL, NULL, NULL),
(92, 'designation_delete', NULL, NULL, NULL),
(93, 'designation_access', NULL, NULL, NULL),
(94, 'account_detail_create', NULL, NULL, NULL),
(95, 'account_detail_edit', NULL, NULL, NULL),
(96, 'account_detail_show', NULL, NULL, NULL),
(97, 'account_detail_delete', NULL, NULL, NULL),
(98, 'account_detail_access', NULL, NULL, NULL),
(99, 'overtime_create', NULL, NULL, NULL),
(100, 'overtime_edit', NULL, NULL, NULL),
(101, 'overtime_show', NULL, NULL, NULL),
(102, 'overtime_delete', NULL, NULL, NULL),
(103, 'overtime_access', NULL, NULL, NULL),
(104, 'holiday_create', NULL, NULL, NULL),
(105, 'holiday_edit', NULL, NULL, NULL),
(106, 'holiday_show', NULL, NULL, NULL),
(107, 'holiday_delete', NULL, NULL, NULL),
(108, 'holiday_access', NULL, NULL, NULL),
(109, 'training_create', NULL, NULL, NULL),
(110, 'training_edit', NULL, NULL, NULL),
(111, 'training_show', NULL, NULL, NULL),
(112, 'training_delete', NULL, NULL, NULL),
(113, 'training_access', NULL, NULL, NULL),
(114, 'leave_category_create', NULL, NULL, NULL),
(115, 'leave_category_edit', NULL, NULL, NULL),
(116, 'leave_category_show', NULL, NULL, NULL),
(117, 'leave_category_delete', NULL, NULL, NULL),
(118, 'leave_category_access', NULL, NULL, NULL),
(119, 'leave_application_create', NULL, NULL, NULL),
(120, 'leave_application_edit', NULL, NULL, NULL),
(121, 'leave_application_show', NULL, NULL, NULL),
(122, 'leave_application_delete', NULL, NULL, NULL),
(123, 'leave_application_access', NULL, NULL, NULL),
(124, 'meeting_minute_create', NULL, NULL, NULL),
(125, 'meeting_minute_edit', NULL, NULL, NULL),
(126, 'meeting_minute_show', NULL, NULL, NULL),
(127, 'meeting_minute_delete', NULL, NULL, NULL),
(128, 'meeting_minute_access', NULL, NULL, NULL),
(129, 'employee_award_create', NULL, NULL, NULL),
(130, 'employee_award_edit', NULL, NULL, NULL),
(131, 'employee_award_show', NULL, NULL, NULL),
(132, 'employee_award_delete', NULL, NULL, NULL),
(133, 'employee_award_access', NULL, NULL, NULL),
(134, 'attendance_access', NULL, NULL, NULL),
(135, 'attendances_create', NULL, NULL, NULL),
(136, 'attendances_edit', NULL, NULL, NULL),
(137, 'attendances_show', NULL, NULL, NULL),
(138, 'attendances_delete', NULL, NULL, NULL),
(139, 'attendances_access', NULL, NULL, NULL),
(140, 'employees_access', NULL, NULL, NULL),
(141, 'daily_attendance_create', NULL, NULL, NULL),
(142, 'daily_attendance_edit', NULL, NULL, NULL),
(143, 'daily_attendance_show', NULL, NULL, NULL),
(144, 'daily_attendance_delete', NULL, NULL, NULL),
(145, 'daily_attendance_access', NULL, NULL, NULL),
(146, 'monthly_attendance_show', NULL, NULL, NULL),
(147, 'monthly_attendance_access', NULL, NULL, NULL),
(148, 'recruitment_access', NULL, NULL, NULL),
(149, 'job_circular_create', NULL, NULL, NULL),
(150, 'job_circular_edit', NULL, NULL, NULL),
(151, 'job_circular_show', NULL, NULL, NULL),
(152, 'job_circular_delete', NULL, NULL, NULL),
(153, 'job_circular_access', NULL, NULL, NULL),
(154, 'job_application_create', NULL, NULL, NULL),
(155, 'job_application_edit', NULL, NULL, NULL),
(156, 'job_application_show', NULL, NULL, NULL),
(157, 'job_application_delete', NULL, NULL, NULL),
(158, 'job_application_access', NULL, NULL, NULL),
(159, 'project_management_access', NULL, NULL, NULL),
(160, 'sale_access', NULL, NULL, NULL),
(161, 'proposal_create', NULL, NULL, NULL),
(162, 'proposal_edit', NULL, NULL, NULL),
(163, 'proposal_show', NULL, NULL, NULL),
(164, 'proposal_delete', NULL, NULL, NULL),
(165, 'proposal_access', NULL, NULL, NULL),
(166, 'interested_in_create', NULL, NULL, NULL),
(167, 'interested_in_delete', NULL, NULL, NULL),
(168, 'interested_in_access', NULL, NULL, NULL),
(169, 'lead_category_create', NULL, NULL, NULL),
(170, 'lead_category_edit', NULL, NULL, NULL),
(171, 'lead_category_show', NULL, NULL, NULL),
(172, 'lead_category_delete', NULL, NULL, NULL),
(173, 'lead_category_access', NULL, NULL, NULL),
(174, 'lead_source_create', NULL, NULL, NULL),
(175, 'lead_source_delete', NULL, NULL, NULL),
(176, 'lead_source_access', NULL, NULL, NULL),
(177, 'lead_status_create', NULL, NULL, NULL),
(178, 'lead_status_delete', NULL, NULL, NULL),
(179, 'lead_status_access', NULL, NULL, NULL),
(180, 'salutation_create', NULL, NULL, NULL),
(181, 'salutation_delete', NULL, NULL, NULL),
(182, 'salutation_access', NULL, NULL, NULL),
(183, 'lead_create', NULL, NULL, NULL),
(184, 'lead_edit', NULL, NULL, NULL),
(185, 'lead_show', NULL, NULL, NULL),
(186, 'lead_delete', NULL, NULL, NULL),
(187, 'lead_access', NULL, NULL, NULL),
(188, 'opportunity_create', NULL, NULL, NULL),
(189, 'opportunity_edit', NULL, NULL, NULL),
(190, 'opportunity_show', NULL, NULL, NULL),
(191, 'opportunity_delete', NULL, NULL, NULL),
(192, 'opportunity_access', NULL, NULL, NULL),
(193, 'client_create', NULL, NULL, NULL),
(194, 'client_edit', NULL, NULL, NULL),
(195, 'client_show', NULL, NULL, NULL),
(196, 'client_delete', NULL, NULL, NULL),
(197, 'client_access', NULL, NULL, NULL),
(198, 'client_menu_create', NULL, NULL, NULL),
(199, 'client_menu_edit', NULL, NULL, NULL),
(200, 'client_menu_show', NULL, NULL, NULL),
(201, 'client_menu_delete', NULL, NULL, NULL),
(202, 'client_menu_access', NULL, NULL, NULL),
(203, 'menu_create', NULL, NULL, NULL),
(204, 'menu_edit', NULL, NULL, NULL),
(205, 'menu_show', NULL, NULL, NULL),
(206, 'menu_delete', NULL, NULL, NULL),
(207, 'menu_access', NULL, NULL, NULL),
(208, 'project_create', NULL, NULL, NULL),
(209, 'project_edit', NULL, NULL, NULL),
(210, 'project_show', NULL, NULL, NULL),
(211, 'project_delete', NULL, NULL, NULL),
(212, 'project_access', NULL, NULL, NULL),
(213, 'project_setting_create', NULL, NULL, NULL),
(214, 'project_setting_delete', NULL, NULL, NULL),
(215, 'project_setting_access', NULL, NULL, NULL),
(216, 'work_tracking_create', NULL, NULL, NULL),
(217, 'work_tracking_edit', NULL, NULL, NULL),
(218, 'work_tracking_show', NULL, NULL, NULL),
(219, 'work_tracking_delete', NULL, NULL, NULL),
(220, 'work_tracking_access', NULL, NULL, NULL),
(221, 'account_create', NULL, NULL, NULL),
(222, 'account_edit', NULL, NULL, NULL),
(223, 'account_show', NULL, NULL, NULL),
(224, 'account_delete', NULL, NULL, NULL),
(225, 'account_access', NULL, NULL, NULL),
(226, 'milestone_create', NULL, NULL, NULL),
(227, 'milestone_edit', NULL, NULL, NULL),
(228, 'milestone_show', NULL, NULL, NULL),
(229, 'milestone_delete', NULL, NULL, NULL),
(230, 'milestone_access', NULL, NULL, NULL),
(231, 'bug_create', NULL, NULL, NULL),
(232, 'bug_edit', NULL, NULL, NULL),
(233, 'bug_show', NULL, NULL, NULL),
(234, 'bug_delete', NULL, NULL, NULL),
(235, 'bug_access', NULL, NULL, NULL),
(236, 'ticket_create', NULL, NULL, NULL),
(237, 'ticket_edit', NULL, NULL, NULL),
(238, 'ticket_show', NULL, NULL, NULL),
(239, 'ticket_delete', NULL, NULL, NULL),
(240, 'ticket_access', NULL, NULL, NULL),
(241, 'adminstration_access', NULL, NULL, NULL),
(242, 'announcement_create', NULL, NULL, NULL),
(243, 'announcement_edit', NULL, NULL, NULL),
(244, 'announcement_show', NULL, NULL, NULL),
(245, 'announcement_delete', NULL, NULL, NULL),
(246, 'announcement_access', NULL, NULL, NULL),
(247, 'kb_category_create', NULL, NULL, NULL),
(248, 'kb_category_delete', NULL, NULL, NULL),
(249, 'kb_category_access', NULL, NULL, NULL),
(250, 'materials_supplier_access', NULL, NULL, NULL),
(251, 'customer_group_create', NULL, NULL, NULL),
(252, 'customer_group_edit', NULL, NULL, NULL),
(253, 'customer_group_show', NULL, NULL, NULL),
(254, 'customer_group_delete', NULL, NULL, NULL),
(255, 'customer_group_access', NULL, NULL, NULL),
(256, 'finance_access', NULL, NULL, NULL),
(257, 'invoice_create', NULL, NULL, NULL),
(258, 'invoice_edit', NULL, NULL, NULL),
(259, 'invoice_show', NULL, NULL, NULL),
(260, 'invoice_delete', NULL, NULL, NULL),
(261, 'invoice_access', NULL, NULL, NULL),
(262, 'proposals_item_create', NULL, NULL, NULL),
(263, 'proposals_item_edit', NULL, NULL, NULL),
(264, 'proposals_item_show', NULL, NULL, NULL),
(265, 'proposals_item_delete', NULL, NULL, NULL),
(266, 'proposals_item_access', NULL, NULL, NULL),
(267, 'supplier_create', NULL, NULL, NULL),
(268, 'supplier_edit', NULL, NULL, NULL),
(269, 'supplier_show', NULL, NULL, NULL),
(270, 'supplier_delete', NULL, NULL, NULL),
(271, 'supplier_access', NULL, NULL, NULL),
(272, 'purchase_create', NULL, NULL, NULL),
(273, 'purchase_edit', NULL, NULL, NULL),
(274, 'purchase_show', NULL, NULL, NULL),
(275, 'purchase_delete', NULL, NULL, NULL),
(276, 'purchase_access', NULL, NULL, NULL),
(277, 'return_stock_create', NULL, NULL, NULL),
(278, 'return_stock_edit', NULL, NULL, NULL),
(279, 'return_stock_show', NULL, NULL, NULL),
(280, 'return_stock_delete', NULL, NULL, NULL),
(281, 'return_stock_access', NULL, NULL, NULL),
(282, 'purchase_payment_create', NULL, NULL, NULL),
(283, 'purchase_payment_edit', NULL, NULL, NULL),
(284, 'purchase_payment_show', NULL, NULL, NULL),
(285, 'purchase_payment_delete', NULL, NULL, NULL),
(286, 'purchase_payment_access', NULL, NULL, NULL),
(287, 'payment_method_create', NULL, NULL, NULL),
(288, 'payment_method_delete', NULL, NULL, NULL),
(289, 'payment_method_access', NULL, NULL, NULL),
(290, 'payment_create', NULL, NULL, NULL),
(291, 'payment_edit', NULL, NULL, NULL),
(292, 'payment_show', NULL, NULL, NULL),
(293, 'payment_delete', NULL, NULL, NULL),
(294, 'payment_access', NULL, NULL, NULL),
(295, 'transaction_create', NULL, NULL, NULL),
(296, 'transaction_edit', NULL, NULL, NULL),
(297, 'transaction_show', NULL, NULL, NULL),
(298, 'transaction_delete', NULL, NULL, NULL),
(299, 'transaction_access', NULL, NULL, NULL),
(300, 'transfer_create', NULL, NULL, NULL),
(301, 'transfer_edit', NULL, NULL, NULL),
(302, 'transfer_show', NULL, NULL, NULL),
(303, 'transfer_delete', NULL, NULL, NULL),
(304, 'transfer_access', NULL, NULL, NULL),
(305, 'employee_bank_create', NULL, NULL, NULL),
(306, 'employee_bank_edit', NULL, NULL, NULL),
(307, 'employee_bank_show', NULL, NULL, NULL),
(308, 'employee_bank_delete', NULL, NULL, NULL),
(309, 'employee_bank_access', NULL, NULL, NULL),
(310, 'tax_rate_create', NULL, NULL, NULL),
(311, 'tax_rate_edit', NULL, NULL, NULL),
(312, 'tax_rate_show', NULL, NULL, NULL),
(313, 'tax_rate_delete', NULL, NULL, NULL),
(314, 'tax_rate_access', NULL, NULL, NULL),
(315, 'office_asset_access', NULL, NULL, NULL),
(316, 'stock_category_create', NULL, NULL, NULL),
(317, 'stock_category_delete', NULL, NULL, NULL),
(318, 'stock_category_access', NULL, NULL, NULL),
(319, 'stock_sub_category_create', NULL, NULL, NULL),
(320, 'stock_sub_category_delete', NULL, NULL, NULL),
(321, 'stock_sub_category_access', NULL, NULL, NULL),
(322, 'stock_create', NULL, NULL, NULL),
(323, 'stock_edit', NULL, NULL, NULL),
(324, 'stock_delete', NULL, NULL, NULL),
(325, 'stock_access', NULL, NULL, NULL),
(326, 'payroll_access', NULL, NULL, NULL),
(327, 'advance_salary_create', NULL, NULL, NULL),
(328, 'advance_salary_edit', NULL, NULL, NULL),
(329, 'advance_salary_show', NULL, NULL, NULL),
(330, 'advance_salary_delete', NULL, NULL, NULL),
(331, 'advance_salary_access', NULL, NULL, NULL),
(332, 'salary_allowance_create', NULL, NULL, NULL),
(333, 'salary_allowance_delete', NULL, NULL, NULL),
(334, 'salary_allowance_access', NULL, NULL, NULL),
(335, 'salary_template_create', NULL, NULL, NULL),
(336, 'salary_template_delete', NULL, NULL, NULL),
(337, 'salary_template_access', NULL, NULL, NULL),
(338, 'salary_deduction_create', NULL, NULL, NULL),
(339, 'salary_deduction_delete', NULL, NULL, NULL),
(340, 'salary_deduction_access', NULL, NULL, NULL),
(341, 'salary_payment_create', NULL, NULL, NULL),
(342, 'salary_payment_edit', NULL, NULL, NULL),
(343, 'salary_payment_show', NULL, NULL, NULL),
(344, 'salary_payment_delete', NULL, NULL, NULL),
(345, 'salary_payment_access', NULL, NULL, NULL),
(346, 'salary_payment_allowance_create', NULL, NULL, NULL),
(347, 'salary_payment_allowance_delete', NULL, NULL, NULL),
(348, 'salary_payment_allowance_access', NULL, NULL, NULL),
(349, 'salary_payment_deduction_create', NULL, NULL, NULL),
(350, 'salary_payment_deduction_delete', NULL, NULL, NULL),
(351, 'salary_payment_deduction_access', NULL, NULL, NULL),
(352, 'salary_payment_detail_create', NULL, NULL, NULL),
(353, 'salary_payment_detail_delete', NULL, NULL, NULL),
(354, 'salary_payment_detail_access', NULL, NULL, NULL),
(355, 'salary_payslip_create', NULL, NULL, NULL),
(356, 'salary_payslip_edit', NULL, NULL, NULL),
(357, 'salary_payslip_show', NULL, NULL, NULL),
(358, 'salary_payslip_delete', NULL, NULL, NULL),
(359, 'salary_payslip_access', NULL, NULL, NULL),
(360, 'hourly_rate_create', NULL, NULL, NULL),
(361, 'hourly_rate_delete', NULL, NULL, NULL),
(362, 'hourly_rate_access', NULL, NULL, NULL),
(363, 'online_payment_create', NULL, NULL, NULL),
(364, 'online_payment_delete', NULL, NULL, NULL),
(365, 'online_payment_access', NULL, NULL, NULL),
(366, 'setting_access', NULL, NULL, NULL),
(367, 'vacation_create', NULL, NULL, NULL),
(368, 'vacation_edit', NULL, NULL, NULL),
(369, 'vacation_show', NULL, NULL, NULL),
(370, 'vacation_delete', NULL, NULL, NULL),
(371, 'vacation_access', NULL, NULL, NULL),
(372, 'local_create', NULL, NULL, NULL),
(373, 'local_delete', NULL, NULL, NULL),
(374, 'local_access', NULL, NULL, NULL),
(375, 'file_create', NULL, NULL, NULL),
(376, 'file_show', NULL, NULL, NULL),
(377, 'file_delete', NULL, NULL, NULL),
(378, 'file_access', NULL, NULL, NULL),
(379, 'task_uploaded_file_create', NULL, NULL, NULL),
(380, 'task_uploaded_file_edit', NULL, NULL, NULL),
(381, 'task_uploaded_file_show', NULL, NULL, NULL),
(382, 'task_uploaded_file_delete', NULL, NULL, NULL),
(383, 'task_uploaded_file_access', NULL, NULL, NULL),
(384, 'task_attachment_create', NULL, NULL, NULL),
(385, 'task_attachment_edit', NULL, NULL, NULL),
(386, 'task_attachment_show', NULL, NULL, NULL),
(387, 'task_attachment_delete', NULL, NULL, NULL),
(388, 'task_attachment_access', NULL, NULL, NULL),
(389, 'penalty_category_create', NULL, NULL, NULL),
(390, 'penalty_category_delete', NULL, NULL, NULL),
(391, 'penalty_category_access', NULL, NULL, NULL),
(392, 'private_chat_create', NULL, NULL, NULL),
(393, 'private_chat_delete', NULL, NULL, NULL),
(394, 'private_chat_access', NULL, NULL, NULL),
(395, 'todo_create', NULL, NULL, NULL),
(396, 'todo_delete', NULL, NULL, NULL),
(397, 'todo_access', NULL, NULL, NULL),
(398, 'outgoing_email_create', NULL, NULL, NULL),
(399, 'outgoing_email_edit', NULL, NULL, NULL),
(400, 'outgoing_email_show', NULL, NULL, NULL),
(401, 'outgoing_email_delete', NULL, NULL, NULL),
(402, 'outgoing_email_access', NULL, NULL, NULL),
(403, 'performance_indicator_create', NULL, NULL, NULL),
(404, 'performance_indicator_edit', NULL, NULL, NULL),
(405, 'performance_indicator_show', NULL, NULL, NULL),
(406, 'performance_indicator_delete', NULL, NULL, NULL),
(407, 'performance_indicator_access', NULL, NULL, NULL),
(408, 'technical_category_show', NULL, NULL, NULL),
(409, 'technical_category_access', NULL, NULL, NULL),
(410, 'quotation_form_create', NULL, NULL, NULL),
(411, 'quotation_form_edit', NULL, NULL, NULL),
(412, 'quotation_form_show', NULL, NULL, NULL),
(413, 'quotation_form_delete', NULL, NULL, NULL),
(414, 'quotation_form_access', NULL, NULL, NULL),
(415, 'quotation_create', NULL, NULL, NULL),
(416, 'quotation_edit', NULL, NULL, NULL),
(417, 'quotation_show', NULL, NULL, NULL),
(418, 'quotation_delete', NULL, NULL, NULL),
(419, 'quotation_access', NULL, NULL, NULL),
(420, 'quotation_detail_create', NULL, NULL, NULL),
(421, 'quotation_detail_delete', NULL, NULL, NULL),
(422, 'quotation_detail_access', NULL, NULL, NULL),
(423, 'dashboard_setting_create', NULL, NULL, NULL),
(424, 'dashboard_setting_delete', NULL, NULL, NULL),
(425, 'dashboard_setting_access', NULL, NULL, NULL),
(426, 'expense_management_access', NULL, NULL, NULL),
(427, 'expense_category_create', NULL, NULL, NULL),
(428, 'expense_category_edit', NULL, NULL, NULL),
(429, 'expense_category_show', NULL, NULL, NULL),
(430, 'expense_category_delete', NULL, NULL, NULL),
(431, 'expense_category_access', NULL, NULL, NULL),
(432, 'income_category_create', NULL, NULL, NULL),
(433, 'income_category_edit', NULL, NULL, NULL),
(434, 'income_category_show', NULL, NULL, NULL),
(435, 'income_category_delete', NULL, NULL, NULL),
(436, 'income_category_access', NULL, NULL, NULL),
(437, 'expense_create', NULL, NULL, NULL),
(438, 'expense_edit', NULL, NULL, NULL),
(439, 'expense_show', NULL, NULL, NULL),
(440, 'expense_delete', NULL, NULL, NULL),
(441, 'expense_access', NULL, NULL, NULL),
(442, 'income_create', NULL, NULL, NULL),
(443, 'income_edit', NULL, NULL, NULL),
(444, 'income_show', NULL, NULL, NULL),
(445, 'income_delete', NULL, NULL, NULL),
(446, 'income_access', NULL, NULL, NULL),
(447, 'expense_report_create', NULL, NULL, NULL),
(448, 'expense_report_edit', NULL, NULL, NULL),
(449, 'expense_report_show', NULL, NULL, NULL),
(450, 'expense_report_delete', NULL, NULL, NULL),
(451, 'expense_report_access', NULL, NULL, NULL),
(452, 'profile_password_edit', NULL, NULL, NULL),
(453, 'employee_request_create', NULL, NULL, NULL),
(454, 'employee_request_edit', NULL, NULL, NULL),
(455, 'employee_request_show', NULL, NULL, NULL),
(456, 'employee_request_delete', NULL, NULL, NULL),
(457, 'employee_request_access', NULL, NULL, NULL),
(458, 'set_time_access', NULL, NULL, NULL),
(459, 'set_time_delete', NULL, NULL, NULL),
(460, 'set_time_show', NULL, NULL, NULL),
(461, 'set_time_edit', NULL, NULL, NULL),
(462, 'set_time_create', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_project`
--

CREATE TABLE `permission_project` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_proposal`
--

CREATE TABLE `permission_proposal` (
  `proposal_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_purchase`
--

CREATE TABLE `permission_purchase` (
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_return_stock`
--

CREATE TABLE `permission_return_stock` (
  `return_stock_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 174),
(1, 175),
(1, 176),
(1, 177),
(1, 178),
(1, 179),
(1, 180),
(1, 181),
(1, 182),
(1, 183),
(1, 184),
(1, 185),
(1, 186),
(1, 187),
(1, 188),
(1, 189),
(1, 190),
(1, 191),
(1, 192),
(1, 193),
(1, 194),
(1, 195),
(1, 196),
(1, 197),
(1, 198),
(1, 199),
(1, 200),
(1, 201),
(1, 202),
(1, 203),
(1, 204),
(1, 205),
(1, 206),
(1, 207),
(1, 208),
(1, 209),
(1, 210),
(1, 211),
(1, 212),
(1, 213),
(1, 214),
(1, 215),
(1, 216),
(1, 217),
(1, 218),
(1, 219),
(1, 220),
(1, 221),
(1, 222),
(1, 223),
(1, 224),
(1, 225),
(1, 226),
(1, 227),
(1, 228),
(1, 229),
(1, 230),
(1, 231),
(1, 232),
(1, 233),
(1, 234),
(1, 235),
(1, 236),
(1, 237),
(1, 238),
(1, 239),
(1, 240),
(1, 241),
(1, 242),
(1, 243),
(1, 244),
(1, 245),
(1, 246),
(1, 247),
(1, 248),
(1, 249),
(1, 250),
(1, 251),
(1, 252),
(1, 253),
(1, 254),
(1, 255),
(1, 256),
(1, 257),
(1, 258),
(1, 259),
(1, 260),
(1, 261),
(1, 262),
(1, 263),
(1, 264),
(1, 265),
(1, 266),
(1, 267),
(1, 268),
(1, 269),
(1, 270),
(1, 271),
(1, 272),
(1, 273),
(1, 274),
(1, 275),
(1, 276),
(1, 277),
(1, 278),
(1, 279),
(1, 280),
(1, 281),
(1, 282),
(1, 283),
(1, 284),
(1, 285),
(1, 286),
(1, 287),
(1, 288),
(1, 289),
(1, 290),
(1, 291),
(1, 292),
(1, 293),
(1, 294),
(1, 295),
(1, 296),
(1, 297),
(1, 298),
(1, 299),
(1, 300),
(1, 301),
(1, 302),
(1, 303),
(1, 304),
(1, 305),
(1, 306),
(1, 307),
(1, 308),
(1, 309),
(1, 310),
(1, 311),
(1, 312),
(1, 313),
(1, 314),
(1, 315),
(1, 316),
(1, 317),
(1, 318),
(1, 319),
(1, 320),
(1, 321),
(1, 322),
(1, 323),
(1, 324),
(1, 325),
(1, 326),
(1, 327),
(1, 328),
(1, 329),
(1, 330),
(1, 331),
(1, 332),
(1, 333),
(1, 334),
(1, 335),
(1, 336),
(1, 337),
(1, 338),
(1, 339),
(1, 340),
(1, 341),
(1, 342),
(1, 343),
(1, 344),
(1, 345),
(1, 346),
(1, 347),
(1, 348),
(1, 349),
(1, 350),
(1, 351),
(1, 352),
(1, 353),
(1, 354),
(1, 355),
(1, 356),
(1, 357),
(1, 358),
(1, 359),
(1, 360),
(1, 361),
(1, 362),
(1, 363),
(1, 364),
(1, 365),
(1, 366),
(1, 367),
(1, 368),
(1, 369),
(1, 370),
(1, 371),
(1, 372),
(1, 373),
(1, 374),
(1, 375),
(1, 376),
(1, 377),
(1, 378),
(1, 379),
(1, 380),
(1, 381),
(1, 382),
(1, 383),
(1, 384),
(1, 385),
(1, 386),
(1, 387),
(1, 388),
(1, 389),
(1, 390),
(1, 391),
(1, 392),
(1, 393),
(1, 394),
(1, 395),
(1, 396),
(1, 397),
(1, 398),
(1, 399),
(1, 400),
(1, 401),
(1, 402),
(1, 403),
(1, 404),
(1, 405),
(1, 406),
(1, 407),
(1, 408),
(1, 409),
(1, 410),
(1, 411),
(1, 412),
(1, 413),
(1, 414),
(1, 415),
(1, 416),
(1, 417),
(1, 418),
(1, 419),
(1, 420),
(1, 421),
(1, 422),
(1, 423),
(1, 424),
(1, 425),
(1, 426),
(1, 427),
(1, 428),
(1, 429),
(1, 430),
(1, 431),
(1, 432),
(1, 433),
(1, 434),
(1, 435),
(1, 436),
(1, 437),
(1, 438),
(1, 439),
(1, 440),
(1, 441),
(1, 442),
(1, 443),
(1, 444),
(1, 445),
(1, 446),
(1, 447),
(1, 448),
(1, 449),
(1, 450),
(1, 451),
(1, 452),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 134),
(2, 135),
(2, 136),
(2, 137),
(2, 138),
(2, 139),
(2, 140),
(2, 141),
(2, 142),
(2, 143),
(2, 144),
(2, 145),
(2, 146),
(2, 147),
(2, 148),
(2, 149),
(2, 150),
(2, 151),
(2, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 158),
(2, 159),
(2, 160),
(2, 161),
(2, 162),
(2, 163),
(2, 164),
(2, 165),
(2, 166),
(2, 167),
(2, 168),
(2, 169),
(2, 170),
(2, 171),
(2, 172),
(2, 173),
(2, 174),
(2, 175),
(2, 176),
(2, 177),
(2, 178),
(2, 179),
(2, 180),
(2, 181),
(2, 182),
(2, 183),
(2, 184),
(2, 185),
(2, 186),
(2, 187),
(2, 188),
(2, 189),
(2, 190),
(2, 191),
(2, 192),
(2, 193),
(2, 194),
(2, 195),
(2, 196),
(2, 197),
(2, 198),
(2, 199),
(2, 200),
(2, 201),
(2, 202),
(2, 203),
(2, 204),
(2, 205),
(2, 206),
(2, 207),
(2, 208),
(2, 209),
(2, 210),
(2, 211),
(2, 212),
(2, 213),
(2, 214),
(2, 215),
(2, 216),
(2, 217),
(2, 218),
(2, 219),
(2, 220),
(2, 221),
(2, 222),
(2, 223),
(2, 224),
(2, 225),
(2, 226),
(2, 227),
(2, 228),
(2, 229),
(2, 230),
(2, 231),
(2, 232),
(2, 233),
(2, 234),
(2, 235),
(2, 236),
(2, 237),
(2, 238),
(2, 239),
(2, 240),
(2, 241),
(2, 242),
(2, 243),
(2, 244),
(2, 245),
(2, 246),
(2, 247),
(2, 248),
(2, 249),
(2, 250),
(2, 251),
(2, 252),
(2, 253),
(2, 254),
(2, 255),
(2, 256),
(2, 257),
(2, 258),
(2, 259),
(2, 260),
(2, 261),
(2, 262),
(2, 263),
(2, 264),
(2, 265),
(2, 266),
(2, 267),
(2, 268),
(2, 269),
(2, 270),
(2, 271),
(2, 272),
(2, 273),
(2, 274),
(2, 275),
(2, 276),
(2, 277),
(2, 278),
(2, 279),
(2, 280),
(2, 281),
(2, 282),
(2, 283),
(2, 284),
(2, 285),
(2, 286),
(2, 287),
(2, 288),
(2, 289),
(2, 290),
(2, 291),
(2, 292),
(2, 293),
(2, 294),
(2, 295),
(2, 296),
(2, 297),
(2, 298),
(2, 299),
(2, 300),
(2, 301),
(2, 302),
(2, 303),
(2, 304),
(2, 305),
(2, 306),
(2, 307),
(2, 308),
(2, 309),
(2, 310),
(2, 311),
(2, 312),
(2, 313),
(2, 314),
(2, 315),
(2, 316),
(2, 317),
(2, 318),
(2, 319),
(2, 320),
(2, 321),
(2, 322),
(2, 323),
(2, 324),
(2, 325),
(2, 326),
(2, 327),
(2, 328),
(2, 329),
(2, 330),
(2, 331),
(2, 332),
(2, 333),
(2, 334),
(2, 335),
(2, 336),
(2, 337),
(2, 338),
(2, 339),
(2, 340),
(2, 341),
(2, 342),
(2, 343),
(2, 344),
(2, 345),
(2, 346),
(2, 347),
(2, 348),
(2, 349),
(2, 350),
(2, 351),
(2, 352),
(2, 353),
(2, 354),
(2, 355),
(2, 356),
(2, 357),
(2, 358),
(2, 359),
(2, 360),
(2, 361),
(2, 362),
(2, 363),
(2, 364),
(2, 365),
(2, 366),
(2, 367),
(2, 368),
(2, 369),
(2, 370),
(2, 371),
(2, 372),
(2, 373),
(2, 374),
(2, 375),
(2, 376),
(2, 377),
(2, 378),
(2, 379),
(2, 380),
(2, 381),
(2, 382),
(2, 383),
(2, 384),
(2, 385),
(2, 386),
(2, 387),
(2, 388),
(2, 389),
(2, 390),
(2, 391),
(2, 392),
(2, 393),
(2, 394),
(2, 395),
(2, 396),
(2, 397),
(2, 398),
(2, 399),
(2, 400),
(2, 401),
(2, 402),
(2, 403),
(2, 404),
(2, 405),
(2, 406),
(2, 407),
(2, 408),
(2, 409),
(2, 410),
(2, 411),
(2, 412),
(2, 413),
(2, 414),
(2, 415),
(2, 416),
(2, 417),
(2, 418),
(2, 419),
(2, 420),
(2, 421),
(2, 422),
(2, 423),
(2, 424),
(2, 425),
(2, 426),
(2, 427),
(2, 428),
(2, 429),
(2, 430),
(2, 431),
(2, 432),
(2, 433),
(2, 434),
(2, 435),
(2, 436),
(2, 437),
(2, 438),
(2, 439),
(2, 440),
(2, 441),
(2, 442),
(2, 443),
(2, 444),
(2, 445),
(2, 446),
(2, 447),
(2, 448),
(2, 449),
(2, 450),
(2, 451),
(2, 452),
(1, 453),
(1, 454),
(1, 453),
(1, 454),
(1, 455),
(1, 456),
(1, 457),
(1, 458),
(1, 459),
(1, 460),
(1, 461),
(1, 462),
(3, 36),
(3, 37),
(3, 41),
(3, 134),
(3, 137),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 80),
(4, 81),
(4, 82),
(4, 83),
(4, 453),
(4, 454),
(4, 455),
(4, 456),
(4, 457),
(4, 458),
(4, 459),
(4, 460),
(4, 461),
(4, 462);

-- --------------------------------------------------------

--
-- Table structure for table `permission_supplier`
--

CREATE TABLE `permission_supplier` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_task`
--

CREATE TABLE `permission_task` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_tax_rate`
--

CREATE TABLE `permission_tax_rate` (
  `tax_rate_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_ticket`
--

CREATE TABLE `permission_ticket` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_training`
--

CREATE TABLE `permission_training` (
  `training_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_transaction`
--

CREATE TABLE `permission_transaction` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_transfer`
--

CREATE TABLE `permission_transfer` (
  `transfer_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`user_id`, `permission_id`) VALUES
(23, 20),
(23, 36),
(23, 37),
(23, 39),
(23, 137),
(23, 1),
(23, 2),
(23, 136);

-- --------------------------------------------------------

--
-- Table structure for table `permission_work_tracking`
--

CREATE TABLE `permission_work_tracking` (
  `work_tracking_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `private_chats`
--

CREATE TABLE `private_chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calculate_progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `actual_completion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert_overdue` int(11) NOT NULL,
  `project_cost` double(15,2) DEFAULT NULL,
  `demo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `notify_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timer_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timer_started_by` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `logged_time` time DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `hourly_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_settings` longtext COLLATE utf8mb4_unicode_ci,
  `with_tasks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimate_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_settings`
--

CREATE TABLE `project_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposal_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `alert_overdue` int(11) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `total_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost_price` decimal(15,2) DEFAULT NULL,
  `tax` decimal(15,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_sent` date DEFAULT NULL,
  `proposal_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert_module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals_items`
--

CREATE TABLE `proposals_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(15,2) DEFAULT NULL,
  `unit_cost` double(15,2) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `selling_price` decimal(15,2) DEFAULT NULL,
  `total_cost_price` decimal(15,2) NOT NULL,
  `tax_rate` double(15,2) NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_total` decimal(15,2) DEFAULT NULL,
  `tax_cost` decimal(15,2) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `proposals_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(15,2) DEFAULT NULL,
  `update_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_sent` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` double(15,2) DEFAULT NULL,
  `adjustment` double(15,2) DEFAULT NULL,
  `discount_total` double(15,2) DEFAULT NULL,
  `show_quantity_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(15,2) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payments`
--

CREATE TABLE `purchase_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `payment_date` date DEFAULT NULL,
  `paid_to` int(11) DEFAULT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `purchase_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_messages`
--

CREATE TABLE `qa_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_topics`
--

CREATE TABLE `qa_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(15,2) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

CREATE TABLE `quotation_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quotation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_forms`
--

CREATE TABLE `quotation_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_stocks`
--

CREATE TABLE `return_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(15,2) DEFAULT NULL,
  `update_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_sent` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `return_stock_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` double(15,2) DEFAULT NULL,
  `adjustment` double(15,2) DEFAULT NULL,
  `discount_total` double(15,2) DEFAULT NULL,
  `show_quantity_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(15,2) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL),
(3, 'Supper Admin', '2020-11-07 15:24:17', '2020-11-07 15:24:17', NULL),
(4, '23_marwa_891f', '2020-11-14 07:40:16', '2020-11-14 07:40:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(23, 2),
(23, 4);

-- --------------------------------------------------------

--
-- Table structure for table `salary_allowances`
--

CREATE TABLE `salary_allowances` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salary_template_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_deductions`
--

CREATE TABLE `salary_deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salary_template_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_deductions`
--

INSERT INTO `salary_deductions` (`id`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`, `salary_template_id`) VALUES
(1, 'Income Tax', '1200', NULL, NULL, NULL, 1),
(3, 'Income Tax', '800', NULL, NULL, NULL, 3),
(4, 'Income Tax', '2000', NULL, NULL, NULL, 4),
(5, 'Tax Deduction', '600', NULL, NULL, NULL, 5),
(6, 'Tax Deduction', '450', NULL, NULL, NULL, 6),
(7, 'Tax Deduction', '1700', NULL, NULL, NULL, 7),
(8, 'Tax Deduction', '400', NULL, NULL, NULL, 8),
(9, 'Tax Deduction', '1000', NULL, NULL, NULL, 9),
(10, 'Tax Deduction', '400', NULL, NULL, NULL, 10),
(11, 'Tax Deduction', '500', NULL, NULL, NULL, 11),
(12, 'Tax Deduction', '650', NULL, NULL, NULL, 12),
(13, 'Tax Deduction', '900', NULL, NULL, NULL, 13),
(14, 'Tax Deduction', '500', NULL, NULL, NULL, 14),
(15, 'Tax Deduction', '650', NULL, NULL, NULL, 15),
(16, 'Provident Fund', '650', NULL, NULL, NULL, 16),
(17, 'Tax Deduction', '1100', NULL, NULL, NULL, 17),
(18, 'Tax Deduction', '600', NULL, NULL, NULL, 18),
(19, 'Tax Deduction', '500', NULL, NULL, NULL, 19),
(20, 'Tax Deduction', '500', NULL, NULL, NULL, 20),
(21, 'Tax Deduction', '800', NULL, NULL, NULL, 21),
(22, 'Tax Deduction', '500', NULL, NULL, NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `salary_payments`
--

CREATE TABLE `salary_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fine_deductio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci,
  `paid_date` date NOT NULL,
  `deduct_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment_allowances`
--

CREATE TABLE `salary_payment_allowances` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salary_payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment_deductions`
--

CREATE TABLE `salary_payment_deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salary_payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment_details`
--

CREATE TABLE `salary_payment_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salary_payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_payslips`
--

CREATE TABLE `salary_payslips` (
  `id` int(10) UNSIGNED NOT NULL,
  `payslip_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payslip_generate_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `salary_payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_templates`
--

CREATE TABLE `salary_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `salary_grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_templates`
--

INSERT INTO `salary_templates` (`id`, `salary_grade`, `basic_salary`, `overtime_salary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Operations Manager ', '13200', '', NULL, NULL, NULL),
(2, 'Senior Back End Developer', '8800', '', NULL, NULL, NULL),
(3, 'IT-Technical-Manager', '22000', '', NULL, NULL, NULL),
(4, 'Site Engineer', '6600', '', NULL, NULL, NULL),
(5, 'Network Technician ', '4950', '', NULL, NULL, NULL),
(6, 'Senior Sales Accounts Manager', '12700', '', NULL, NULL, NULL),
(7, 'Electrician', '4400', '', NULL, NULL, NULL),
(8, 'Senior Sales & Admin Coordinator', '11000', '', NULL, NULL, NULL),
(9, 'Telemarketing', '4400', '', NULL, NULL, NULL),
(10, 'Junior Back End Developer', '5500', '', NULL, NULL, NULL),
(11, 'Junior Sales', '7150', '', NULL, NULL, NULL),
(12, 'Senior Android Developer', '9900', '', NULL, NULL, NULL),
(13, 'Junior UI/UX Designer', '5500', '', NULL, NULL, NULL),
(14, 'Back End Developer', '7150', '', NULL, NULL, NULL),
(15, 'Mobile App Developer', '7150', '', NULL, NULL, NULL),
(16, 'Software Team Leader', '12100', '', NULL, NULL, NULL),
(17, 'UI/UX Designer', '6600', '', NULL, NULL, NULL),
(18, 'Junior Front End Developer', '5500', '', NULL, NULL, NULL),
(19, 'Junior Back End Developer', '5500', '', NULL, NULL, NULL),
(20, 'Senior Mobile Developer', '8800', '', NULL, NULL, NULL),
(21, 'Junior Mobile App Developer', '5500', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salutations`
--

CREATE TABLE `salutations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `set_times`
--

CREATE TABLE `set_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `allow_clock_in_late` time DEFAULT NULL,
  `allow_leave_early` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_times`
--

INSERT INTO `set_times` (`id`, `name`, `in_time`, `out_time`, `allow_clock_in_late`, `allow_leave_early`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aaaaa', '07:00:00', '15:00:00', '12:00:00', '21:00:00', NULL, NULL, NULL),
(2, 'ppp', '15:34:00', '19:35:00', '15:40:00', '19:40:00', '2020-10-04 09:43:53', '2020-10-04 09:43:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stock_sub_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_categories`
--

CREATE TABLE `stock_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_sub_categories`
--

CREATE TABLE `stock_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stock_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `due_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `calculate_progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `timer_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timer_started_by` int(11) DEFAULT NULL,
  `start_timer` int(11) DEFAULT NULL,
  `logged_timer` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `client_visible` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_rate` double(15,2) DEFAULT NULL,
  `billable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `assigned_to_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `milestone_id` int(10) UNSIGNED DEFAULT NULL,
  `opportunities_id` int(10) UNSIGNED DEFAULT NULL,
  `work_tracking_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_attachments`
--

CREATE TABLE `task_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_id` int(10) UNSIGNED DEFAULT NULL,
  `opportunities_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `bug_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Open', NULL, NULL, NULL),
(2, 'In progress', NULL, NULL, NULL),
(3, 'Closed', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_tags`
--

CREATE TABLE `task_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_task_tag`
--

CREATE TABLE `task_task_tag` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `task_tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_uploaded_files`
--

CREATE TABLE `task_uploaded_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `uploaded_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `task_attachment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_percent` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technical_categories`
--

CREATE TABLE `technical_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `beginner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intermediate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advanced` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expert_leader` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporter` int(11) DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `last_reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_entries`
--

CREATE TABLE `time_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `work_type_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_projects`
--

CREATE TABLE `time_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_work_types`
--

CREATE TABLE `time_work_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `tbl_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `assigned_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `finish_date` date DEFAULT NULL,
  `training_cost` decimal(15,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `debit` double(15,2) DEFAULT NULL,
  `credit` double(15,2) DEFAULT NULL,
  `total_balance` double(15,2) DEFAULT NULL,
  `client_visible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `paid` int(11) DEFAULT NULL,
  `billable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `under_55` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `expense_category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `to_account` int(11) NOT NULL,
  `from_account` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userables`
--

CREATE TABLE `userables` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `userable_id` int(11) DEFAULT NULL,
  `userable_type` varchar(191) DEFAULT NULL,
  `is_read` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `userables`
--

INSERT INTO `userables` (`id`, `user_id`, `userable_id`, `userable_type`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 23, 4, 'App\\Models\\Notification', 0, '2020-11-11 21:10:01', '2020-11-11 21:10:01'),
(2, 23, 5, 'App\\Models\\Notification', 0, '2020-11-11 21:13:01', '2020-11-11 21:13:01'),
(3, 23, 6, 'App\\Models\\Notification', 0, '2020-11-12 08:37:36', '2020-11-12 08:37:36'),
(4, 4, 1, 'App\\Models\\Notification', 0, '2020-11-14 14:06:37', '2020-11-14 14:06:37'),
(5, 23, 2, 'App\\Models\\Notification', 0, '2020-11-14 19:06:27', '2020-11-14 19:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban_reason` longtext COLLATE utf8mb4_unicode_ci,
  `last_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `online_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_email_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_additional_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_postmaster_run` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_path_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacation_balance` int(11) DEFAULT NULL,
  `vacation_counterdown` int(11) DEFAULT NULL,
  `date_of_join` date DEFAULT NULL,
  `date_of_insurance` date DEFAULT NULL,
  `vacation_verified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `username`, `activated`, `banned`, `ban_reason`, `last_ip`, `last_login`, `online_time`, `smtp_email_type`, `smtp_encryption`, `smtp_action`, `smtp_host_name`, `smtp_user_name`, `smtp_password`, `smtp_port`, `smtp_additional_flag`, `last_postmaster_run`, `media_path_slug`, `marketing_username`, `marketing_password`, `marketing_type`, `sp_username`, `sp_password`, `vacation_balance`, `vacation_counterdown`, `date_of_join`, `date_of_insurance`, `vacation_verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$wziGN0IVu6XjVBuB5S4/hOExbDXQRZyireijHzFIaIMlye7Ti25pO', 1, 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'mosayed', 'mohab@onetecgroup.com', NULL, '$2y$10$kEG3i5eRS2gVIfEgF8n9.umSgTzsqLOnrx0tSopR324BJJ6sd3ppK', 1, NULL, NULL, '1', '0', 'NULL', '41.42.178.84', NULL, '1584366179', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'marketing@onetecgroup.com', 'hple1901w', 'cutomer', 'marketing@onetecgroup.com', 'hple1901w', 21, 21, NULL, NULL, 0, '2020-10-04 12:09:57', '2020-10-04 12:09:57', NULL),
(3, 'mayman', 'mayman@onetecgroup.com', NULL, '$2y$10$X/hMWfkLiQRRH2oxFqkCQOvF2E9vbIRtrcYm7ZDDy5/tPLEVwR0xa', 3, NULL, NULL, '0', '1', 'Terminated', '41.42.185.255', NULL, '1584365954', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'mayman', 'marketing@onetecgroup.com', 'hple1901w', 'cutomer', 'marketing@onetecgroup.com', 'hple1901w', 21, 21, NULL, NULL, 0, '2020-10-04 12:09:57', '2020-10-04 12:09:57', NULL),
(4, 'abozeid', 'abozeid@onetecgroup.com', NULL, '$2y$10$kOtLH0Ep7ZmZ/h.9ici0eeAUQ5acXhKv4KLyx2/NrgdK7hsvDSqLm', 1, NULL, NULL, '1', '0', 'NULL', '156.213.159.4', NULL, '1588683242', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'aabozeid', 'marketing@onetecgroup.com', 'hple1901w', 'cutomer', NULL, NULL, 21, 21, NULL, NULL, 0, '2020-10-04 12:09:57', '2020-10-04 12:09:57', NULL),
(6, 'weltaweel', 'weltaweel@onetecgroup.com', NULL, '$2y$10$ieYab5/wbiWn0MYyhRsHSOE/J2MtNHvdOnUuJXno65PjyeqL0l8du', 1, NULL, NULL, '0', '1', 'Resigned', '41.42.185.255', NULL, '1584354783', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'weltaweel', 'NULL', 'NULL', 'NULL', NULL, NULL, 21, 21, NULL, NULL, 0, '2020-10-04 12:09:57', '2020-10-04 12:09:57', NULL),
(7, 'cfo', 'cfo@onetecgroup.com', NULL, '$2y$10$.9iqjVM664c401rkR0HYMeGijU3i0/jpQLwqgGvx4xy6mDBigNYre', 3, NULL, NULL, '1', '0', 'NULL', '41.42.185.255', NULL, '1567351577', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'cfo', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 0, NULL, NULL, 0, '2020-10-04 12:09:57', '2020-10-04 12:09:57', NULL),
(8, 'Ismael', 'Ismaeleffat@gmail.com', NULL, '$2y$10$bfMVeXemg3oGFYNOgYI5feviYC4W0UnYp4fQntO9Qbd7aQh177wPq', 2, NULL, NULL, '0', '0', 'NULL', '41.42.185.255', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'ismael', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 0, NULL, NULL, 0, '2020-10-04 12:09:57', '2020-10-04 12:09:57', NULL),
(9, 'AhmedAyad', 'a.ayad@pcasa.ae', NULL, '$2y$10$guPeL6Wvje565IhoRt/joO50CCFQBE83efOzDCsP9z9wMuCZOFsMS', 2, NULL, NULL, '0', '0', 'NULL', '41.42.185.255', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'ahmedayad', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 0, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(10, 'Ahmed Emara', 'emara@stallingkott.ae', NULL, '$2y$10$PGKKSk26KHe.ImH5js36muzYiHd7HyUHt9ytl9EhXP5cWtwwldG/C', 2, NULL, NULL, '0', '0', 'NULL', '41.42.185.255', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'ahmed_emara', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 0, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(11, 'ceo', 'ceo@onetecgroup.com', NULL, '$2y$10$w9bweAPF9Tp6j.uCl/XNYupp8ZmBlDf1wUpHnIKOivibckUaz7bIy', 1, NULL, NULL, '1', '0', 'NULL', '197.246.246.232', NULL, '1584350260', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'marketing@onetecgroup.com', 'hple1901w', 'cutomer', NULL, NULL, 21, 21, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(13, 'msaleh', 'msaleh@onetecgroup.com', NULL, '$2y$10$Duah868FuZ6k4ja/o33PZOUkJLwdJ6ab0KVsCUG69rs2f38IblW6.', 3, NULL, NULL, '1', '0', 'NULL', '41.42.185.255', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'msaleh', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 21, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(14, 'sahamid', 'sahamid@onetecgroup.com', NULL, '$2y$10$IZSQrCY0CEhBLYHgo.gCbu82gSJvaNAjxAT/15CzuJOOfnCHKAwYG', 3, NULL, NULL, '0', '1', 'Resigned', '41.42.185.255', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 21, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(15, 'aragab', 'aragab@onetecgroup.com', NULL, '$2y$10$wIp.dAtraWLcf0/HgYhCCuY/uItHKgojlvUwt7jnXk7EyObZcsx9K', 3, NULL, NULL, '0', '1', 'NULL', '41.42.185.255', NULL, '1574603696', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'aragab', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 0, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(16, 'redamohamed', 'rmohamed@onetecgroup.com', NULL, '$2y$10$e6TX7CebM781ry0T3gFexullaXQ6evwWpoKku9G2PHSewEBv9Ehbq', 3, NULL, NULL, '0', '1', 'Resigned', '41.42.185.255', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 0, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(20, 'afawzy', 'afawzy@onetecgroup.com', NULL, '$2y$10$SzR3t6QC5weqreU1IQCw4uK8IorCWnB3iFRN5cWFZcf4dg1rMKehK', 3, NULL, NULL, '0', '1', 'He resigned. ', '41.42.185.255', NULL, '1575968243', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'afawzy', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 0, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(21, 'ghadawagih', 'ghada@onetecgroup.com', NULL, '$2y$10$/oMcCiaiQcIIGL6jZhrWGuYkPGpYehoHEezMEn9FHePsC7QJRQyc.', 3, NULL, NULL, '0', '1', 'Left the office', '41.42.185.255', NULL, '1583839790', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'ghadawagih', 'NULL', 'NULL', 'NULL', NULL, NULL, 21, 21, NULL, NULL, 0, '2020-10-04 12:09:58', '2020-10-04 12:09:58', NULL),
(22, 'norhan', 'norhan@onetecgroup.com', NULL, '$2y$10$lZl0bTkAOx2jmvXNyaHcfuVyoa4q.DMz73jzsDWu7Bl4RaeOSyGWG', 3, NULL, NULL, '0', '1', 'Resigned', '41.42.185.255', NULL, '1584285028', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'norhan', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 21, 21, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(23, 'marwa', 'marwa@onetecgroup.com', NULL, '$2y$10$wziGN0IVu6XjVBuB5S4/hOExbDXQRZyireijHzFIaIMlye7Ti25pO', 2, NULL, NULL, '1', '0', 'NULL', '41.42.185.255', NULL, '1584364802', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'marwa', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 21, 21, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-11-14 07:40:17', NULL),
(24, 'shrouk', 'shrouk@onetecgroup.com', NULL, '$2y$10$ExXZaQ7tQYO2bupdbbsX3.PCgBgp0m5CpWtDyQEWzaUzNdnMEc.16', 3, NULL, NULL, '0', '1', 'Terminated ', '41.42.185.255', NULL, '1584365703', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'shrouk', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 11, 11, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(25, 'moaaz', 'moaaz@onetecgroup.com', NULL, '$2y$10$1Xppml7pycBmLV8PxJO2NOL2IEkCdsMXICUo852mzbhn1rhSimDnq', 1, NULL, NULL, '1', '0', 'NULL', '91.74.215.134', NULL, '1584365200', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'moaaz', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 11, 11, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(27, 'Valuecamps', 'camps@valid.com', NULL, '$2y$10$NQP/ITTK9sp6ygm7x6D6VePXVrJHdi82HNaPmmR4HYsq18vNWRyN.', 2, NULL, NULL, '1', '0', 'NULL', '156.213.53.38', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'valuecamps', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(28, 'aaaaa', 'n.gamal@lesaffre.com', NULL, '$2y$10$L2Zmk16YoquS/S.CBgoQlO/5JKYXVvwN6ivxZT31U8mMl/8Ea8G4S', 2, NULL, NULL, '1', '0', 'NULL', '196.154.1.72', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'aaaaa', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(29, 'ahmedradwan98', 'radwan@onetecgroup.com', NULL, '$2y$10$DJvIsnNdOMSsQjZJdJ8dL.i7ma8vAMCRwIu4mMOPsbIRxlaziCOh2', 3, NULL, NULL, '0', '1', 'Resigned', '197.37.233.70', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'radwan', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(30, 'nana', 'na@na.com', NULL, '$2y$10$fZjYKg88EJFm1cdw4DejO.ijYlzyCFvdnuClY1XFjcTxXrHVY8tUa', 2, NULL, NULL, '1', '0', 'NULL', '197.246.212.249', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'nana', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(31, 'hamed', 'hamed@onetecgroup.com', NULL, '$2y$10$SYSW0kUdMTryKJ9ccj0ihuZZyW34lq1.do6ajurGhFLTl4wyuxY.2', 1, NULL, NULL, '1', '0', 'NULL', '156.213.65.23', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'hamed', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5, 5, NULL, NULL, 0, '2020-10-04 12:09:59', '2020-10-04 12:09:59', NULL),
(32, 'ahmedfaruk', 'saidahmedfarouka@gmail.com', NULL, '$2y$10$weB0vT100HampaYb/UMv7eR7IGGIBAHL88aljKzO41Yw/59fW3Vm6', 2, NULL, NULL, '1', '0', 'NULL', '156.196.239.98', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'ahmedfaruk', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:10:00', '2020-10-04 12:10:00', NULL),
(33, 'Mahmoud', 'mahmoudsaidelbokl@gmail.com', NULL, '$2y$10$jXxCb8Yz6CblKyVUv25hMOh82gyfwyagIKac5JJQOg5Iiy3nrJTxK', 3, NULL, NULL, '1', '0', 'NULL', '196.158.201.24', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'mahmoud', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5, 5, NULL, NULL, 0, '2020-10-04 12:10:00', '2020-10-04 12:10:00', NULL),
(34, 'mostafa', 'm.elgammal@onetecgroup.com', NULL, '$2y$10$vVkm16o4ptZ7M2dCCn/Ln.FBK0UDdrQ.vt9ystpXax0uloz0K4BrG', 3, NULL, NULL, '1', '0', 'NULL', '156.213.160.48', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'mostafa', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:10:00', '2020-10-04 12:10:00', NULL),
(35, 'shady', 'shady.osama@onetecgroup.com', NULL, '$2y$10$ZS4I10/Q2vIWsX0pm0zQIOgoZTYBk6fk77AIJf6dI1dJss8zMIRAa', 3, NULL, NULL, '1', '0', 'NULL', '156.213.65.23', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'shady', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:10:00', '2020-10-04 12:10:00', NULL),
(36, 'ali', 'ali.emad@onetecgroup.com', NULL, '$2y$10$BLc0i2UTquqh5l7Y3epAIuHgdzME.dauOFvGiuH7QqzVdFZhXE2HG', 3, NULL, NULL, '1', '0', 'NULL', '156.196.99.162', NULL, '0', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'ali', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 0, 0, NULL, NULL, 0, '2020-10-04 12:10:00', '2020-10-04 12:10:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` int(10) UNSIGNED NOT NULL,
  `alert_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_alerts`
--

INSERT INTO `user_alerts` (`id`, `alert_text`, `alert_link`, `model_path`, `model`, `created_at`, `updated_at`) VALUES
(1, 'jg lkgojglkuhj ;lkvggghvhjhlkjvgkjhkhkbljvjl hmblk.jn;l.jhlbkmvnblkj ,hkj,', 'kjhkjgbjlhglhkjhb ljgkjhblkjh; lhjnlm', 'App\\Models\\User', 1225, '2020-11-11 20:24:29', '2020-11-11 20:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_user_alert`
--

INSERT INTO `user_user_alert` (`user_alert_id`, `user_id`, `read`) VALUES
(1, 1, 1),
(1, 9, 0),
(1, 11, 0),
(1, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacations`
--

INSERT INTO `vacations` (`id`, `name`, `description`, `start_date`, `end_date`, `location`, `color`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'admin', '<p>jgkyg</p>', '2020-09-28', '2020-09-29', NULL, NULL, '2020-10-04 08:58:06', '2020-10-04 08:58:06', NULL, 2),
(2, 'pppppppppppppp', '<p>jgkyg</p>', '2020-09-28', '2020-09-01', NULL, NULL, '2020-10-04 08:58:06', '2020-10-04 08:58:06', NULL, 31),
(3, 'bbbbbbbbbb', NULL, '2020-10-02', '2020-10-06', NULL, '#990a0a', '2020-10-07 18:37:09', '2020-10-07 18:37:09', NULL, 34);

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE `working_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `updated_by` int(11) NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_status` tinyint(4) NOT NULL COMMENT '0 for holiday & 1 for working day',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `updated_by`, `day`, `working_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fri', 0, NULL, '2020-10-06 17:48:31', '2020-10-06 17:48:31'),
(2, 1, 'Sat', 0, NULL, '2020-10-06 17:48:31', '2020-10-06 17:48:31'),
(3, 1, 'Sun', 1, NULL, '2020-10-06 17:48:31', '2020-10-06 17:48:31'),
(4, 1, 'Mon', 1, NULL, '2020-10-06 17:48:31', '2020-10-06 17:48:31'),
(5, 1, 'Tue', 1, NULL, '2020-10-06 17:48:31', '2020-10-06 17:48:31'),
(6, 1, 'Wed', 1, NULL, '2020-10-06 17:48:31', '2020-10-06 17:48:31'),
(7, 1, 'Thu', 1, NULL, '2020-10-06 17:48:31', '2020-10-06 17:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `work_trackings`
--

CREATE TABLE `work_trackings` (
  `id` int(10) UNSIGNED NOT NULL,
  `achievement` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `notify_work_achive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_work_not_achive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_send` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `work_type_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acounts_name_unique` (`name`);

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2165793` (`user_id`),
  ADD KEY `designation_fk_2165804` (`designation_id`);

--
-- Indexes for table `account_permission`
--
ALTER TABLE `account_permission`
  ADD KEY `acount_id_fk_2176503` (`acount_id`),
  ADD KEY `permission_id_fk_2176503` (`permission_id`);

--
-- Indexes for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2181058` (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2176850` (`user_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_fk_2176551` (`project_id`),
  ADD KEY `opportunities_fk_2176552` (`opportunities_id`),
  ADD KEY `task_fk_2176553` (`task_id`);

--
-- Indexes for table `bug_permission`
--
ALTER TABLE `bug_permission`
  ADD KEY `bug_id_fk_2176562` (`bug_id`),
  ADD KEY `permission_id_fk_2176562` (`permission_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_fk_2182725` (`status_id`);

--
-- Indexes for table `client_menus`
--
ALTER TABLE `client_menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_menus_label_unique` (`label`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_customers`
--
ALTER TABLE `crm_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_fk_2159269` (`status_id`);

--
-- Indexes for table `crm_documents`
--
ALTER TABLE `crm_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk_2159286` (`customer_id`);

--
-- Indexes for table `crm_notes`
--
ALTER TABLE `crm_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk_2159280` (`customer_id`),
  ADD KEY `user_fk_2182335` (`user_id`);

--
-- Indexes for table `crm_statuses`
--
ALTER TABLE `crm_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_groups_name_unique` (`name`);

--
-- Indexes for table `daily_attendances`
--
ALTER TABLE `daily_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2168401` (`user_id`);

--
-- Indexes for table `dashboard_settings`
--
ALTER TABLE `dashboard_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_head_fk_2165716` (`department_head_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_fk_2165736` (`department_id`);

--
-- Indexes for table `designation_permission`
--
ALTER TABLE `designation_permission`
  ADD KEY `designation_id_fk_2165738` (`designation_id`),
  ADD KEY `permission_id_fk_2165738` (`permission_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_username_unique` (`username`),
  ADD KEY `role_fk_2164801` (`role_id`);

--
-- Indexes for table `employee_awards`
--
ALTER TABLE `employee_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2168023` (`user_id`);

--
-- Indexes for table `employee_banks`
--
ALTER TABLE `employee_banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_banks_name_unique` (`name`),
  ADD KEY `user_fk_2180883` (`user_id`);

--
-- Indexes for table `employee_permission`
--
ALTER TABLE `employee_permission`
  ADD KEY `employee_id_fk_2165491` (`employee_id`),
  ADD KEY `permission_id_fk_2165491` (`permission_id`);

--
-- Indexes for table `employee_requests`
--
ALTER TABLE `employee_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_category_fk_2281155` (`expense_category_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_fk_2182388` (`project_id`);

--
-- Indexes for table `fingerprint_attendances`
--
ALTER TABLE `fingerprint_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hourly_rates`
--
ALTER TABLE `hourly_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_category_fk_2281163` (`income_category_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interested_ins`
--
ALTER TABLE `interested_ins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `interested_ins_name_unique` (`name`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_fk_2177095` (`client_id`),
  ADD KEY `project_fk_2177096` (`project_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_circular_fk_2168799` (`job_circular_id`);

--
-- Indexes for table `job_circulars`
--
ALTER TABLE `job_circulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_fk_2168603` (`designation_id`);

--
-- Indexes for table `job_circular_permission`
--
ALTER TABLE `job_circular_permission`
  ADD KEY `job_circular_id_fk_2168613` (`job_circular_id`),
  ADD KEY `permission_id_fk_2168613` (`permission_id`);

--
-- Indexes for table `kb_categories`
--
ALTER TABLE `kb_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kb_categories_name_unique` (`name`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_name_unique` (`name`),
  ADD KEY `salutation_fk_2172442` (`salutation_id`),
  ADD KEY `interested_fk_2172443` (`interested_id`),
  ADD KEY `lead_status_fk_2172445` (`lead_status_id`),
  ADD KEY `lead_source_fk_2172446` (`lead_source_id`),
  ADD KEY `lead_category_fk_2172447` (`lead_category_id`);

--
-- Indexes for table `lead_categories`
--
ALTER TABLE `lead_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lead_categories_name_unique` (`name`);

--
-- Indexes for table `lead_permission`
--
ALTER TABLE `lead_permission`
  ADD KEY `lead_id_fk_2172463` (`lead_id`),
  ADD KEY `permission_id_fk_2172463` (`permission_id`);

--
-- Indexes for table `lead_sources`
--
ALTER TABLE `lead_sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lead_sources_name_unique` (`name`);

--
-- Indexes for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lead_statuses_name_unique` (`name`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2167932` (`user_id`),
  ADD KEY `leave_category_fk_2167933` (`leave_category_id`);

--
-- Indexes for table `leave_categories`
--
ALTER TABLE `leave_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locals`
--
ALTER TABLE `locals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `meeting_minutes`
--
ALTER TABLE `meeting_minutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2167949` (`user_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_label_unique` (`label`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `milestones_name_unique` (`name`),
  ADD KEY `user_fk_2176530` (`user_id`),
  ADD KEY `project_fk_2176531` (`project_id`);

--
-- Indexes for table `monthly_attendances`
--
ALTER TABLE `monthly_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2168451` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `online_payments_gateway_name_unique` (`gateway_name`);

--
-- Indexes for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_fk_2172516` (`lead_id`);

--
-- Indexes for table `opportunity_permission`
--
ALTER TABLE `opportunity_permission`
  ADD KEY `opportunity_id_fk_2172525` (`opportunity_id`),
  ADD KEY `permission_id_fk_2172525` (`permission_id`);

--
-- Indexes for table `outgoing_emails`
--
ALTER TABLE `outgoing_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2165825` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_fk_2178715` (`invoice_id`),
  ADD KEY `account_fk_2178723` (`account_id`),
  ADD KEY `transaction_fk_2178994` (`transaction_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_unique` (`name`);

--
-- Indexes for table `penalty_categories`
--
ALTER TABLE `penalty_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_indicators`
--
ALTER TABLE `performance_indicators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_fk_2182562` (`designation_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_project`
--
ALTER TABLE `permission_project`
  ADD KEY `project_id_fk_2176377` (`project_id`),
  ADD KEY `permission_id_fk_2176377` (`permission_id`);

--
-- Indexes for table `permission_proposal`
--
ALTER TABLE `permission_proposal`
  ADD KEY `proposal_id_fk_2172031` (`proposal_id`),
  ADD KEY `permission_id_fk_2172031` (`permission_id`);

--
-- Indexes for table `permission_purchase`
--
ALTER TABLE `permission_purchase`
  ADD KEY `purchase_id_fk_2178520` (`purchase_id`),
  ADD KEY `permission_id_fk_2178520` (`permission_id`);

--
-- Indexes for table `permission_return_stock`
--
ALTER TABLE `permission_return_stock`
  ADD KEY `return_stock_id_fk_2178581` (`return_stock_id`),
  ADD KEY `permission_id_fk_2178581` (`permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_2159247` (`role_id`),
  ADD KEY `permission_id_fk_2159247` (`permission_id`);

--
-- Indexes for table `permission_supplier`
--
ALTER TABLE `permission_supplier`
  ADD KEY `supplier_id_fk_2178478` (`supplier_id`),
  ADD KEY `permission_id_fk_2178478` (`permission_id`);

--
-- Indexes for table `permission_task`
--
ALTER TABLE `permission_task`
  ADD KEY `task_id_fk_2176630` (`task_id`),
  ADD KEY `permission_id_fk_2176630` (`permission_id`);

--
-- Indexes for table `permission_tax_rate`
--
ALTER TABLE `permission_tax_rate`
  ADD KEY `tax_rate_id_fk_2180897` (`tax_rate_id`),
  ADD KEY `permission_id_fk_2180897` (`permission_id`);

--
-- Indexes for table `permission_ticket`
--
ALTER TABLE `permission_ticket`
  ADD KEY `ticket_id_fk_2176650` (`ticket_id`),
  ADD KEY `permission_id_fk_2176650` (`permission_id`);

--
-- Indexes for table `permission_training`
--
ALTER TABLE `permission_training`
  ADD KEY `training_id_fk_2166224` (`training_id`),
  ADD KEY `permission_id_fk_2166224` (`permission_id`);

--
-- Indexes for table `permission_transaction`
--
ALTER TABLE `permission_transaction`
  ADD KEY `transaction_id_fk_2178835` (`transaction_id`),
  ADD KEY `permission_id_fk_2178835` (`permission_id`);

--
-- Indexes for table `permission_transfer`
--
ALTER TABLE `permission_transfer`
  ADD KEY `transfer_id_fk_2179006` (`transfer_id`),
  ADD KEY `permission_id_fk_2179006` (`permission_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD KEY `user_id_fk_2182740` (`user_id`),
  ADD KEY `permission_id_fk_2182740` (`permission_id`);

--
-- Indexes for table `permission_work_tracking`
--
ALTER TABLE `permission_work_tracking`
  ADD KEY `work_tracking_id_fk_2176413` (`work_tracking_id`),
  ADD KEY `permission_id_fk_2176413` (`permission_id`);

--
-- Indexes for table `private_chats`
--
ALTER TABLE `private_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2182506` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_name_unique` (`name`),
  ADD KEY `client_fk_2176360` (`client_id`);

--
-- Indexes for table `project_settings`
--
ALTER TABLE `project_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_settings_name_unique` (`name`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals_items`
--
ALTER TABLE `proposals_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proposals_items_name_unique` (`name`),
  ADD KEY `proposals_fk_2178422` (`proposals_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_fk_2178504` (`supplier_id`),
  ADD KEY `user_fk_2178512` (`user_id`);

--
-- Indexes for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_fk_2178631` (`purchase_id`),
  ADD KEY `account_fk_2178639` (`account_id`),
  ADD KEY `transaction_fk_2178995` (`transaction_id`);

--
-- Indexes for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_messages_topic_id_foreign` (`topic_id`),
  ADD KEY `qa_messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_topics_creator_id_foreign` (`creator_id`),
  ADD KEY `qa_topics_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2182699` (`user_id`),
  ADD KEY `client_fk_2182700` (`client_id`);

--
-- Indexes for table `quotation_details`
--
ALTER TABLE `quotation_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_fk_2182711` (`quotation_id`);

--
-- Indexes for table `quotation_forms`
--
ALTER TABLE `quotation_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2182666` (`user_id`);

--
-- Indexes for table `return_stocks`
--
ALTER TABLE `return_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_fk_2178565` (`supplier_id`),
  ADD KEY `user_fk_2178573` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_2159256` (`user_id`),
  ADD KEY `role_id_fk_2159256` (`role_id`);

--
-- Indexes for table `salary_allowances`
--
ALTER TABLE `salary_allowances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dalary_allowances_name_unique` (`name`),
  ADD KEY `salary_template_fk_2181297` (`salary_template_id`);

--
-- Indexes for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_template_fk_2181316` (`salary_template_id`);

--
-- Indexes for table `salary_payments`
--
ALTER TABLE `salary_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2181366` (`user_id`);

--
-- Indexes for table `salary_payment_allowances`
--
ALTER TABLE `salary_payment_allowances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salary_payment_allowances_name_unique` (`name`),
  ADD KEY `salary_payment_fk_2181433` (`salary_payment_id`);

--
-- Indexes for table `salary_payment_deductions`
--
ALTER TABLE `salary_payment_deductions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salary_payment_deductions_name_unique` (`name`),
  ADD KEY `salary_payment_fk_2181502` (`salary_payment_id`);

--
-- Indexes for table `salary_payment_details`
--
ALTER TABLE `salary_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salary_payment_details_name_unique` (`name`),
  ADD KEY `salary_payment_fk_2181521` (`salary_payment_id`);

--
-- Indexes for table `salary_payslips`
--
ALTER TABLE `salary_payslips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_payment_fk_2181529` (`salary_payment_id`);

--
-- Indexes for table `salary_templates`
--
ALTER TABLE `salary_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salutations`
--
ALTER TABLE `salutations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salutations_name_unique` (`name`);

--
-- Indexes for table `set_times`
--
ALTER TABLE `set_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stocks_name_unique` (`name`),
  ADD KEY `stock_sub_category_fk_2181050` (`stock_sub_category_id`);

--
-- Indexes for table `stock_categories`
--
ALTER TABLE `stock_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_categories_name_unique` (`name`);

--
-- Indexes for table `stock_sub_categories`
--
ALTER TABLE `stock_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_sub_categories_name_unique` (`name`),
  ADD KEY `stock_category_fk_2180993` (`stock_category_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_group_fk_2178477` (`customer_group_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_fk_2165607` (`status_id`),
  ADD KEY `assigned_to_fk_2165611` (`assigned_to_id`),
  ADD KEY `project_fk_2176616` (`project_id`),
  ADD KEY `milestone_fk_2176617` (`milestone_id`),
  ADD KEY `opportunities_fk_2176618` (`opportunities_id`),
  ADD KEY `work_tracking_fk_2176619` (`work_tracking_id`),
  ADD KEY `lead_fk_2176628` (`lead_id`);

--
-- Indexes for table `task_attachments`
--
ALTER TABLE `task_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_fk_2182408` (`task_id`),
  ADD KEY `user_fk_2182409` (`user_id`),
  ADD KEY `lead_fk_2182412` (`lead_id`),
  ADD KEY `opportunities_fk_2182413` (`opportunities_id`),
  ADD KEY `project_fk_2182414` (`project_id`),
  ADD KEY `bug_fk_2182415` (`bug_id`);

--
-- Indexes for table `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_tags`
--
ALTER TABLE `task_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_task_tag`
--
ALTER TABLE `task_task_tag`
  ADD KEY `task_id_fk_2165608` (`task_id`),
  ADD KEY `task_tag_id_fk_2165608` (`task_tag_id`);

--
-- Indexes for table `task_uploaded_files`
--
ALTER TABLE `task_uploaded_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_attachment_fk_2182421` (`task_attachment_id`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_rates_name_unique` (`name`);

--
-- Indexes for table `technical_categories`
--
ALTER TABLE `technical_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_fk_2176638` (`project_id`),
  ADD KEY `department_fk_2176644` (`department_id`);

--
-- Indexes for table `time_entries`
--
ALTER TABLE `time_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_type_fk_2165587` (`work_type_id`),
  ADD KEY `project_fk_2165588` (`project_id`);

--
-- Indexes for table `time_projects`
--
ALTER TABLE `time_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_work_types`
--
ALTER TABLE `time_work_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2182544` (`user_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2166213` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_fk_2178818` (`project_id`),
  ADD KEY `account_fk_2178819` (`account_id`),
  ADD KEY `invoice_fk_2178820` (`invoice_id`),
  ADD KEY `payment_method_fk_2178823` (`payment_method_id`),
  ADD KEY `expense_category_fk_2281170` (`expense_category_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_method_fk_2179000` (`payment_method_id`);

--
-- Indexes for table `userables`
--
ALTER TABLE `userables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_2165618` (`user_alert_id`),
  ADD KEY `user_id_fk_2165618` (`user_id`);

--
-- Indexes for table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2181745` (`user_id`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_trackings`
--
ALTER TABLE `work_trackings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_type_fk_2176406` (`work_type_id`),
  ADD KEY `account_fk_2176507` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_requests`
--
ALTER TABLE `employee_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fingerprint_attendances`
--
ALTER TABLE `fingerprint_attendances`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_circulars`
--
ALTER TABLE `job_circulars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `meeting_minutes`
--
ALTER TABLE `meeting_minutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_templates`
--
ALTER TABLE `salary_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userables`
--
ALTER TABLE `userables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
