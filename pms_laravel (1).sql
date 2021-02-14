-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 05:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_laravel`
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
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `martial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_time_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `designation_id` int(10) UNSIGNED NOT NULL,
  `employment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`id`, `fullname`, `company`, `city`, `country`, `locale`, `address`, `phone`, `mobile`, `avatar`, `skype`, `language`, `joining_date`, `present_address`, `date_of_birth`, `gender`, `martial_status`, `father_name`, `mother_name`, `passport`, `direction`, `set_time_id`, `user_id`, `designation_id`, `employment_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mohab Mostafa Sayed', NULL, NULL, NULL, 'es_AR', NULL, '201006057763', '201006057763', NULL, NULL, NULL, '2019-01-01', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '3', NULL, NULL, NULL),
(3, 'Mohamed Ayman Mohamed', NULL, NULL, NULL, NULL, NULL, '201006057763', '201006057763', NULL, NULL, NULL, '2019-07-01', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 15, '6', NULL, NULL, NULL),
(4, 'Ahmed Abo-Zeid', NULL, NULL, NULL, NULL, NULL, '201550131255', '201550131255', NULL, NULL, NULL, '2019-07-01', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 15, '5', NULL, NULL, NULL),
(6, 'Wael El Taweel', NULL, NULL, NULL, NULL, NULL, '20114713542', '20114713542', NULL, NULL, NULL, '2019-09-01', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 2, '4', NULL, NULL, NULL),
(7, 'CFO', NULL, NULL, NULL, NULL, NULL, '201069606061', '201069606061', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 8, '2', NULL, NULL, NULL),
(8, 'Ismael Effat', NULL, NULL, NULL, NULL, NULL, '201069606061', '201069606061', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 0, '17', NULL, NULL, NULL),
(9, 'Ahmed Ayad', NULL, NULL, NULL, NULL, NULL, '201068608084', '201068608084', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '15', NULL, NULL, NULL),
(10, 'Ahmed Emara', NULL, NULL, NULL, NULL, NULL, '201228585555', '201228585555', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, '16', NULL, NULL, NULL),
(11, 'Mohamed Saleh Hassan', NULL, NULL, NULL, NULL, NULL, '971545843777', '971545843777', NULL, NULL, NULL, '2019-09-22', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 14, '8', NULL, NULL, NULL),
(13, 'Sherif Abd El', NULL, NULL, NULL, NULL, NULL, '201003355949', '201003355949', NULL, NULL, NULL, '2019-09-08', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 18, '7', NULL, NULL, NULL),
(14, 'Ahmed Abd Elfatah', NULL, NULL, NULL, NULL, NULL, '201090104345', '201090104345', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 21, '10', NULL, NULL, NULL),
(15, 'Reda Mohamed El', NULL, NULL, NULL, NULL, NULL, '201101004181', '201101004181', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 19, '9', NULL, NULL, NULL),
(19, 'Ahmed Fawzy El', NULL, NULL, NULL, NULL, NULL, '201023326488', '201023326488', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 21, '11', NULL, NULL, NULL),
(20, 'Ghada Youssef Wagih', NULL, NULL, NULL, NULL, NULL, '201023326488', '201023326488', NULL, NULL, NULL, '2019-11-17', NULL, '1982-04-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 3, '12', NULL, NULL, NULL),
(21, 'Norhan Mounir', NULL, NULL, NULL, NULL, NULL, '201005516664', '201005516664', NULL, NULL, NULL, '2019-01-19', NULL, '1996-01-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, 25, '14', NULL, NULL, NULL),
(22, 'Marwa Sayed Mostafa', NULL, NULL, NULL, NULL, NULL, '01017286932', '01017286932', NULL, NULL, NULL, '2019-01-18', NULL, '1996-01-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 26, '13', NULL, NULL, NULL),
(23, 'Shrouk Elshal', NULL, NULL, NULL, NULL, NULL, '01120176660', '01120176660', NULL, NULL, NULL, '2020-02-16', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 27, '18', NULL, NULL, NULL),
(24, 'Moaaz Radwan Ahmed', NULL, NULL, NULL, NULL, NULL, '201016297228', '201016297228', NULL, NULL, NULL, '2020-02-13', NULL, '1995-05-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 30, '15', NULL, NULL, NULL),
(26, 'camps', NULL, NULL, NULL, NULL, NULL, '201144836800', '201144836800', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 0, 'NULL', NULL, NULL, NULL),
(27, 'Nehal Gamal', NULL, NULL, NULL, NULL, NULL, '1554857786', '1554857786', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 0, 'NULL', NULL, NULL, NULL),
(28, 'Ahmed Radwan', NULL, NULL, NULL, NULL, NULL, '201006143107', '201006143107', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 23, '0', NULL, NULL, NULL),
(29, 'Mr mahmoud abdalla', NULL, NULL, NULL, NULL, NULL, '1091032423', '1091032423', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 0, 'NULL', NULL, NULL, NULL),
(30, 'Mohammed Ibrahim Hamed', NULL, NULL, NULL, NULL, NULL, '201028824642', '201028824642', NULL, NULL, NULL, '2020-05-17', NULL, '1994-10-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 15, '31', NULL, NULL, NULL),
(31, 'Ahmed Faruk', NULL, NULL, NULL, NULL, NULL, '201062164867', '201062164867', NULL, NULL, NULL, '2020-05-17', NULL, '1986-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, 0, 'NULL', NULL, NULL, NULL),
(32, 'Mahmoud Saied El', NULL, NULL, NULL, NULL, NULL, '201123408535', '201123408535', NULL, NULL, NULL, '2020-06-01', NULL, '1995-06-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 29, '33', NULL, NULL, NULL),
(33, 'Mostafa Gamal Abdelsatar', NULL, NULL, NULL, NULL, NULL, '201097034883', '201097034883', NULL, NULL, NULL, '2020-08-13', NULL, '1996-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 23, '34', NULL, NULL, NULL),
(34, 'ShadyOsama Fawzy', NULL, NULL, NULL, NULL, NULL, '201097034883', '201097034883', NULL, NULL, NULL, '2020-08-10', NULL, '1998-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 26, '26', NULL, NULL, NULL),
(35, 'Ali Emad Eldamiry', NULL, NULL, NULL, NULL, NULL, '201097034883', '201097034883', NULL, NULL, NULL, '2020-08-10', NULL, '1996-06-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 31, '36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_field_id` int(10) UNSIGNED DEFAULT NULL,
  `activity_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value1_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value1_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value2_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value2_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Bonus','Penalty') COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `assign_stocks`
--

CREATE TABLE `assign_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `stock_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leave_application_id` int(10) UNSIGNED DEFAULT NULL,
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
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `severity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reproducibility` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `bug_account_details_pivot`
--

CREATE TABLE `bug_account_details_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bug_id` int(10) UNSIGNED NOT NULL,
  `account_details_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `call_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call` enum('first','second') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` enum('Qualified-Meeting','Qualified-Follow Up','Proposal Sent','Qualified-Survey','Qualified-Postponed','Un-Qualified','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `opportunities_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL
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
  `short_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `client_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'my comment',
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
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'One Tec Group LLC', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(2, 'company_legal_name', 'One Tec Group LLC', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(3, 'contact_person', 'admin', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(4, 'company_address', '8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(5, 'company_country', 'Egypt', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(6, 'company_city', 'Cairo', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(7, 'company_zip_code', '1185', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(8, 'company_phone', '+201555836995', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(9, 'company_email', 'info@onetecgroup.com', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(10, 'company_domain', 'https://onetecgroup.com', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(11, 'company_vat', '14', '2021-02-09 10:43:10', '2021-02-09 10:43:10'),
(12, 'default_language', 'arabic', '2021-02-09 22:26:06', '2021-02-10 13:57:01'),
(13, 'locale', 'aa_ET', '2021-02-09 22:26:06', '2021-02-09 22:40:27'),
(14, 'timezone', 'Pacific/Midway', '2021-02-09 22:26:06', '2021-02-09 22:40:27'),
(15, 'code', NULL, '2021-02-09 22:26:06', '2021-02-09 22:26:06'),
(16, 'name', NULL, '2021-02-09 22:26:06', '2021-02-09 22:26:06'),
(17, 'symbol', NULL, '2021-02-09 22:26:06', '2021-02-09 22:26:06'),
(18, 'default_currency', 'EGP', '2021-02-09 22:26:06', '2021-02-10 13:58:43'),
(19, 'currency_position', 'left', '2021-02-09 22:26:06', '2021-02-09 22:40:27'),
(20, 'default_tax', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}', '2021-02-09 22:28:26', '2021-02-10 14:00:23'),
(21, 'tables_pagination_limit', '20', '2021-02-09 22:28:26', '2021-02-10 01:06:17'),
(22, 'date_format', '%Y.%m.%d', '2021-02-09 22:28:26', '2021-02-09 23:33:51'),
(23, 'time_format', 'g:i A', '2021-02-09 22:28:26', '2021-02-09 23:22:06'),
(24, 'money_format', '4', '2021-02-09 22:28:26', '2021-02-09 23:22:06'),
(25, 'decimal_separator', '2', '2021-02-09 22:28:26', '2021-02-09 22:28:26'),
(26, 'allowed_files', 'jpeg|jpg', '2021-02-09 22:28:26', '2021-02-09 22:28:26'),
(27, 'max_file_size', '5000', '2021-02-09 22:28:26', '2021-02-09 22:28:26'),
(28, 'google_api_key', NULL, '2021-02-09 22:28:26', '2021-02-09 22:40:27'),
(29, 'recaptcha_site_key', NULL, '2021-02-09 22:28:26', '2021-02-09 22:40:27'),
(30, 'recaptcha_secret_key', NULL, '2021-02-09 22:28:26', '2021-02-09 22:40:27'),
(31, 'auto_close_ticket', '50', '2021-02-09 22:28:26', '2021-02-09 22:28:26'),
(32, 'enable_languages', 'on', '2021-02-09 22:28:26', '2021-02-10 01:06:25'),
(33, 'allow_sub_tasks', 'off', '2021-02-09 22:28:26', '2021-02-10 13:57:02'),
(34, 'only_allowed_ip_can_clock', 'off', '2021-02-09 22:28:26', '2021-02-10 13:57:02'),
(35, 'allow_client_registration', 'off', '2021-02-09 22:28:26', '2021-02-09 23:33:51'),
(36, 'allow_apply_job_from_login', 'off', '2021-02-09 22:28:26', '2021-02-09 23:33:51'),
(37, 'date_picker_format', 'yyyy.mm.dd', '2021-02-09 23:20:36', '2021-02-09 23:33:51'),
(38, 'date_time_format', 'Y.m.d', '2021-02-09 23:21:27', '2021-02-09 23:33:51'),
(39, 'sender_name', 'mohamed', '2021-02-10 18:01:52', '2021-02-10 18:01:52'),
(40, 'protocol', 'mailgun', '2021-02-10 18:01:52', '2021-02-10 20:25:20'),
(41, 'mail_host', 'smtp.mailgun.org', '2021-02-10 18:01:52', '2021-02-10 20:02:24'),
(42, 'mail_user', 'postmaster@sandboxe31bb8c7d4b44782a216a3ee62328fc9.mailgun.org', '2021-02-10 18:01:52', '2021-02-10 20:08:28'),
(43, 'mail_password', '31d7a041ba3baf4f4fb9b51eacd23fac-4de08e90-2044ce92', '2021-02-10 18:01:52', '2021-02-10 19:49:00'),
(44, 'mail_port', '587', '2021-02-10 18:01:52', '2021-02-10 20:08:28'),
(45, 'mail_encryption', 'tls', '2021-02-10 18:01:52', '2021-02-10 20:10:15'),
(46, 'mailgun_email', 'mailgun@onetecgroup.com', '2021-02-10 21:25:15', '2021-02-10 22:14:45'),
(47, 'mailgun_sender_name', 'onetecgroup', '2021-02-10 21:25:15', '2021-02-10 21:25:15'),
(48, 'mailgun_protocol', 'mailgun', '2021-02-10 21:25:15', '2021-02-10 21:25:15'),
(49, 'mailgun_host', 'smtp.mailgun.org', '2021-02-10 21:25:15', '2021-02-10 21:25:15'),
(50, 'mailgun_user', 'postmaster@sandboxe31bb8c7d4b44782a216a3ee62328fc9.mailgun.org', '2021-02-10 21:25:15', '2021-02-10 21:25:15'),
(51, 'mailgun_password', '31d7a041ba3baf4f4fb9b51eacd23fac-4de08e90-2044ce92', '2021-02-10 21:25:15', '2021-02-10 21:25:15'),
(52, 'mailgun_port', '587', '2021-02-10 21:25:15', '2021-02-10 21:53:28'),
(53, 'mailgun_encryption', 'tls', '2021-02-10 21:25:15', '2021-02-14 03:25:04'),
(54, 'smtp_email', 'info@onetecgroup.com', '2021-02-10 21:39:23', '2021-02-10 22:58:52'),
(55, 'smtp_sender_name', 'onetecgroup', '2021-02-10 21:39:23', '2021-02-10 21:39:23'),
(56, 'smtp_protocol', 'smtp', '2021-02-10 21:39:23', '2021-02-10 21:39:23'),
(57, 'smtp_host', 'mail.onetecgroup.com', '2021-02-10 21:39:23', '2021-02-10 22:52:28'),
(58, 'smtp_user', 'admin@onetecgroup.com', '2021-02-10 21:39:23', '2021-02-10 22:51:31'),
(59, 'smtp_password', 'm7mdsdfcz', '2021-02-10 21:39:23', '2021-02-10 22:52:28'),
(60, 'smtp_port', '465', '2021-02-10 21:39:23', '2021-02-11 01:19:24'),
(61, 'smtp_encryption', 'ssl', '2021-02-10 21:39:23', '2021-02-10 22:55:17'),
(62, 'sms_invoice_reminder', 'Invoice Reminder Notice  {full_name}, {client_name}, {contact_email}, {invoice_link}, {invoice_ref}, {invoice_date}, {invoice_due_date}, {invoice_status}, {invoice_subtotal}, {invoice_total}, {site_name}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(63, 'sms_invoice_overdue', 'Send SMS when invoice overdue notice sent to client primary contact.{full_name}, {client_name}, {contact_email}, {invoice_link}, {invoice_ref}, {invoice_date}, {invoice_due_date}, {invoice_status}, {invoice_subtotal}, {invoice_total}, {site_name}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(64, 'sms_payment_recorded', 'Invoice Payment Recorded {\r\n{full_name}, {client_name}, {contact_email}, {invoice_link}, {invoice_ref}, {invoice_date}, {invoice_due_date}, {invoice_status}, {invoice_subtotal}, {invoice_total}, {site_name}, {payment_amount}, {payment_date}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(65, 'sms_estimate_exp_reminder', 'Estimate Expiration Reminder  {full_name}, {client_name}, {contact_email}, {estimate_link}, {estimate_ref}, {estimate_date}, {estimate_due_date}, {estimate_status}, {estimate_subtotal}, {estimate_total}, {site_name}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(66, 'sms_proposal_exp_reminder', 'Proposal Expiration Reminder  \r\n{proposal_ref}, {proposal_link}, {proposal_date}, {proposal_due_date}, {proposal_status}, {proposal_subtotal}, {proposal_total}, {proposal_related_to}, {site_name}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(67, 'sms_purchase_confirmation', 'Purchase Notice {supplier_name}, {supplier_email}, {purchase_link}, {purchase_ref}, {purchase_date}, {purchase_due_date}, {purchase_status}, {purchase_subtotal}, {purchase_total}, {site_name}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(68, 'sms_purchase_payment_confirmation', 'Purchase payment Notice \r\n{supplier_name}, {supplier_email}, {purchase_link}, {purchase_ref}, {purchase_date}, {purchase_due_date}, {purchase_status}, {purchase_subtotal}, {purchase_total}, {site_name}, {payment_amount}, {payment_date}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(69, 'sms_return_stock', 'Send SMS when Purchase return stock notice sent {supplier_name}, {supplier_email}, {return_stock_link}, {return_stock_ref}, {return_stock_date}, {return_stock_due_date}, {return_stock_status}, {return_stock_subtotal}, {return_stock_total}, {site_name}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(70, 'sms_transaction_record', 'Transaction Record expense/deposit/transfer \r\n{transaction_type}, {transaction_title}, {transaction_date}, {transaction_amount}, {transaction_account}, {transaction_balance}, {transaction_paid_by}, {transaction_link}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(71, 'sms_staff_reminder', 'Staff Reminder {name}, {reference}, {reminder_description}, {reminder_date}, {reminder_related}, {reminder_related_link}, {site_name}', '2021-02-12 15:10:23', '2021-02-12 15:14:15'),
(72, 'twilio_account_sid', 'AC3b2c049bdfa8077f9c6c682f98b94ebe', '2021-02-12 15:28:46', '2021-02-12 19:27:18'),
(73, 'twilio_phone_number', '+14437674122', '2021-02-12 15:28:46', '2021-02-14 03:33:32'),
(74, 'twilio_token_auth', 'fd2fb4fbe491eed24da585870d0e6786', '2021-02-12 15:28:46', '2021-02-12 19:27:18'),
(75, 'sms_status', 'twilio', '2021-02-12 15:30:32', '2021-02-14 03:35:15'),
(76, 'plivo_account_sid', 'MAMGJIMJE1MDY0ODDLMZ', '2021-02-12 16:42:18', '2021-02-12 18:33:19'),
(77, 'plivo_phone_number', '+13866142004', '2021-02-12 16:42:18', '2021-02-12 18:43:07'),
(78, 'plivo_token_auth', 'ZTY0NjRhMjMwMDRjYjliNjMyZjBmZTFiOTRmYjIw', '2021-02-12 16:42:18', '2021-02-12 18:33:19'),
(79, 'nexmo_account_sid', '6b0e32cf', '2021-02-12 17:29:33', '2021-02-12 17:29:33'),
(80, 'nexmo_from_name', NULL, '2021-02-12 17:29:33', '2021-02-12 18:02:32'),
(81, 'nexmo_token_auth', 'Fm6gxMsEtLkTIRhl', '2021-02-12 17:29:33', '2021-02-12 17:29:33'),
(82, 'nexmo_phone_number', '+201006143107', '2021-02-12 18:05:02', '2021-02-12 18:05:02'),
(83, 'invoice_prefix', 'INV-', '2021-02-14 02:14:25', '2021-02-14 02:14:25'),
(84, 'invoices_due_after', '5', '2021-02-14 02:14:25', '2021-02-14 02:14:25'),
(85, 'invoice_start_no', '1', '2021-02-14 02:14:25', '2021-02-14 02:14:25'),
(86, 'invoice_number_format', 'INV-[dd][mm][yyyy]/[number]', '2021-02-14 02:14:25', '2021-02-14 02:14:25'),
(87, 'qty_calculation_from_items', 'no', '2021-02-14 02:14:25', '2021-02-14 03:58:16'),
(88, 'amount_to_words', 'no', '2021-02-14 02:14:25', '2021-02-14 03:58:16'),
(89, 'allow_customer_edit_amount', 'no', '2021-02-14 02:14:25', '2021-02-14 03:58:16'),
(90, 'increment_invoice_number', 'no', '2021-02-14 02:14:25', '2021-02-14 03:58:16'),
(91, 'show_item_tax', 'no', '2021-02-14 02:14:25', '2021-02-14 03:58:16'),
(92, 'send_email_when_recur', 'no', '2021-02-14 02:14:25', '2021-02-14 03:58:16'),
(93, 'invoice_view', '1', '2021-02-14 02:14:25', '2021-02-14 02:14:25'),
(94, 'default_terms', NULL, '2021-02-14 02:14:25', '2021-02-14 04:33:05'),
(95, 'invoice_footer', '<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>TAX Registration Number</td>\r\n			<td>562-190-759</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trade License Number :</td>\r\n			<td>135842</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Address:</td>\r\n			<td colspan=\"0\">Villa 10 - Block 11 - 9th District - Nasr City</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">PAYMENT DETAILS:</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cheques are payable to:</td>\r\n			<td>One Tec Group</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\"><strong>Bank Transfer:</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>ACCOUNT NAME :</td>\r\n			<td>One Tec Group</td>\r\n		</tr>\r\n		<tr>\r\n			<td>A/C # (EGP):</td>\r\n			<td>760077-3931-EGP-001</td>\r\n		</tr>\r\n		<tr>\r\n			<td>BANK NAME :</td>\r\n			<td colspan=\"1\">Arab African International Bank</td>\r\n		</tr>\r\n		<tr>\r\n			<td>SWIFT CODE:</td>\r\n			<td>ARAIEGCXXX</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">ADDRESS: 13 Khaled Ebn El Waleed St. - Sheraton Buildings, Heliopolis, Cairo, Egypt</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">If you have any inquiry concerning this invoice, please send an email to: sales@onetecgroup.com</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"0\">RECEIVED BY:</td>\r\n			<td colspan=\"0\">SIGNATURE:</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"0\">DATE:</td>\r\n			<td colspan=\"0\">STAMP:</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">THANK YOU FOR YOUR BUSINESS!</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2021-02-14 02:14:25', '2021-02-14 04:33:05'),
(96, 'invoice_logo', '1613274978-inv.png', '2021-02-14 03:56:18', '2021-02-14 03:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `un_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calling_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cctld` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso2`, `value`, `long_name`, `iso3`, `numcode`, `un_member`, `calling_code`, `cctld`, `nationality`, `flag`, `phone_code`, `time_zone`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '004', 'yes', '93', '.af', 'Afghan', 'afghanistan.png', '+93', 'Asia/Kabul', NULL, NULL),
(2, 'AX', 'Aland Islands', '&Aring;land Islands', 'ALA', '248', 'no', '358', '.ax', 'Finland', 'alan_islands.jpg', '+358', 'Europe/Mariehamn', NULL, NULL),
(3, 'AL', 'Albania', 'Republic of Albania', 'ALB', '008', 'yes', '355', '.al', 'Albanian', 'albania.png', '+355', 'Europe/Tirane', NULL, NULL),
(4, 'DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', 'DZA', '012', 'yes', '213', '.dz', 'Algerian', 'algeria.png', '+213', 'Asia/Kabul', NULL, NULL),
(5, 'AS', 'American Samoa', 'American Samoa', 'ASM', '016', 'no', '1+684', '.as', 'American', 'united-states-of-america.png', '+1-684', 'Pacific/Pago_Pago', NULL, NULL),
(6, 'AD', 'Andorra', 'Principality of Andorra', 'AND', '020', 'yes', '376', '.ad', 'Andorran', 'andorra.png', '+376', 'Europe/Andorra', NULL, NULL),
(7, 'AO', 'Angola', 'Republic of Angola', 'AGO', '024', 'yes', '244', '.ao', 'Angolan', 'angola.png', '+244', 'Africa/Luanda', NULL, NULL),
(8, 'AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'no', '1+264', '.ai', 'American', 'anguilla.png', '+1-264', '	America/Anguilla', NULL, NULL),
(9, 'AQ', 'Antarctica', 'Antarctica', 'ATA', '010', 'no', '672', '.aq', 'Antarctician', 'unknown.png', '+672', 'Antarctica/Casey', NULL, NULL),
(10, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '028', 'yes', '1+268', '.ag', 'American', 'unknown.png', '+1-268', 'America/Antigua', NULL, NULL),
(11, 'AR', 'Argentina', 'Argentine Republic', 'ARG', '032', 'yes', '54', '.ar', 'Argentinian', 'argentina.png', '+54', 'America/Argentina/Buenos_Aires', NULL, NULL),
(12, 'AM', 'Armenia', 'Republic of Armenia', 'ARM', '051', 'yes', '374', '.am', 'Armenia', 'armenia.png', '+374', 'Asia/Yerevan', NULL, NULL),
(13, 'AW', 'Aruba', 'Aruba', 'ABW', '533', 'no', '297', '.aw', 'Dutch Caribbean', 'aruba.png', '+297', 'America/Aruba', NULL, NULL),
(14, 'AU', 'Australia', 'Commonwealth of Australia', 'AUS', '036', 'yes', '61', '.au', 'Australian', 'australia.png', '+61', 'Australia/Sydney', NULL, NULL),
(15, 'AT', 'Austria', 'Republic of Austria', 'AUT', '040', 'yes', '43', '.at', 'Austrian', 'austria.png', '+43', 'Europe/Vienna', NULL, NULL),
(16, 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '031', 'yes', '994', '.az', 'Azerbaijani', 'azerbaijan.png', '+994', 'Asia/Baku', NULL, NULL),
(17, 'BS', 'Bahamas', 'Commonwealth of The Bahamas', 'BHS', '044', 'yes', '1+242', '.bs', 'Bahamian', 'bahamas.png', '+1-242', 'America/Nassau', NULL, NULL),
(18, 'BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '048', 'yes', '973', '.bh', 'Bahraini', 'bahrain.png', '+973', 'Asia/Bahrain', NULL, NULL),
(19, 'BD', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', '050', 'yes', '880', '.bd', 'Bangladeshi', 'bangladesh.png', '+880', 'Asia/Dhaka', NULL, NULL),
(20, 'BB', 'Barbados', 'Barbados', 'BRB', '052', 'yes', '1+246', '.bb', 'Barbadian', 'barbados.png', '+1-246', 'America/Barbados', NULL, NULL),
(21, 'BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'yes', '375', '.by', 'Belorussian', 'belarus.png', '+375', 'Europe/Minsk', NULL, NULL),
(22, 'BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '056', 'yes', '32', '.be', 'Belgian', 'belgium.png', '+32', 'Europe/Brussels', NULL, NULL),
(23, 'BZ', 'Belize', 'Belize', 'BLZ', '084', 'yes', '501', '.bz', 'Belizean', 'belize.png', '+501', 'America/Belize', NULL, NULL),
(24, 'BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'yes', '229', '.bj', 'Beninese', 'benin.png', '+229', 'Africa/Porto-Novo', NULL, NULL),
(25, 'BM', 'Bermuda', 'Bermuda Islands', 'BMU', '060', 'no', '1+441', '.bm', 'Bermudian', 'bermuda.png', '+1-441', 'Atlantic/Bermuda', NULL, NULL),
(26, 'BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '064', 'yes', '975', '.bt', 'Bhutanese', 'bhutan.png', '+975', 'Asia/Thimphu', NULL, NULL),
(27, 'BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', '068', 'yes', '591', '.bo', 'Bolivian', 'bolivia.png', '+591', 'America/La_Paz', NULL, NULL),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'no', '599', '.bq', 'Dutch', 'unknown.png', '+599', 'America/Kralendijk', NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '070', 'yes', '387', '.ba', 'Bosnian', 'bosnia-and-herzegovina.png', '+387', 'Europe/Sarajevo', NULL, NULL),
(30, 'BW', 'Botswana', 'Republic of Botswana', 'BWA', '072', 'yes', '267', '.bw', 'Batswanain', 'botswana.png', '+267', 'Africa/Gaborone', NULL, NULL),
(31, 'BV', 'Bouvet Island', 'Bouvet Island', 'BVT', '074', 'no', NULL, '.bv', 'Norwegian', 'unknown.png', NULL, 'UNKNOWN', NULL, NULL),
(32, 'BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '076', 'yes', '55', '.br', 'Brazilian', 'brazil.png', '+55', 'America/Araguaina', NULL, NULL),
(33, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'IOT', '086', 'no', '246', '.io', 'British', 'unknown.png', '+246', 'Indian/Chagos', NULL, NULL),
(34, 'BN', 'Brunei', 'Brunei Darussalam', 'BRN', '096', 'yes', '673', '.bn', 'Bruneian', 'brunei.png', '+673', 'Asia/Brunei', NULL, NULL),
(35, 'BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'yes', '359', '.bg', 'Bulgarian', 'bulgaria.png', '+359', 'Europe/Sofia', NULL, NULL),
(36, 'BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'yes', '226', '.bf', 'Burkinabe', 'burkina-faso.png', '+226', 'Africa/Ouagadougou', NULL, NULL),
(37, 'BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'yes', '257', '.bi', 'Burundian', 'burundi.png', '+257', 'Africa/Bujumbura', NULL, NULL),
(38, 'KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'yes', '855', '.kh', 'Cambodian', 'cambodia.png', '+855', 'Asia/Phnom_Penh', NULL, NULL),
(39, 'CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'yes', '237', '.cm', 'Cameroonian', 'cameroon.png', '+237', 'Africa/Douala', NULL, NULL),
(40, 'CA', 'Canada', 'Canada', 'CAN', '124', 'yes', '1', '.ca', 'Canadian', 'canada.png', '+1', 'America/Atikokan', NULL, NULL),
(41, 'CV', 'Cape Verde', 'Republic of Cape Verde', 'CPV', '132', 'yes', '238', '.cv', 'unknown', 'cape-verde.png', '+238', 'Atlantic/Cape_Verde', NULL, NULL),
(42, 'KY', 'Cayman Islands', 'The Cayman Islands', 'CYM', '136', 'no', '1+345', '.ky', 'UNKNOWN', 'unknown.png', '+1-345', 'America/Cayman', NULL, NULL),
(43, 'CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'yes', '236', '.cf', 'unknown', 'central-african-republic.png', '+236', 'Africa/Bangui', NULL, NULL),
(44, 'TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'yes', '235', '.td', 'Chadian', 'chad.png', '+235', 'Africa/Ndjamena', NULL, NULL),
(45, 'CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'yes', '56', '.cl', 'Cameroonian', 'chile.png', '+56', 'America/Santiago', NULL, NULL),
(46, 'CN', 'China', 'People\'s Republic of China', 'CHN', '156', 'yes', '86', '.cn', 'Chinese', 'china.png', '+86', 'Asia/Shanghai', NULL, NULL),
(47, 'CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'no', '61', '.cx', 'Australian', 'unknown.png', '+61', 'Indian/Christmas', NULL, NULL),
(48, 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'no', '61', '.cc', 'UNKNOWN', 'cocos-island.png', '+61', 'Indian/Cocos', NULL, NULL),
(49, 'CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'yes', '57', '.co', 'Colombian', 'colombia.png', '+57', 'America/Bogota', NULL, NULL),
(50, 'KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'yes', '269', '.km', 'Comorian', 'comoros.png', '+269', 'Indian/Comoro', NULL, NULL),
(51, 'CG', 'Congo', 'Republic of the Congo', 'COG', '178', 'yes', '242', '.cg', 'Congolese', 'republic-of-the-congo.png', '+242', 'Africa/Kinshasa', NULL, NULL),
(52, 'CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'some', '682', '.ck', 'unknown', 'cook-islands.png', '+682', 'Pacific/Rarotonga', NULL, NULL),
(53, 'CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'yes', '506', '.cr', 'Costarricenses', 'unknown.png', '+506', 'America/Costa_Rica', NULL, NULL),
(54, 'CI', 'Cote d\'ivoire (Ivory Coast)', 'Republic of C&ocirc;te D\'Ivoire (Ivory Coast)', 'CIV', '384', 'yes', '225', '.ci', 'Ivoirian', 'ivory-coast.png', '+225', 'Africa/Abidjan', NULL, NULL),
(55, 'HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'yes', '385', '.hr', 'Croatian', 'croatia.png', '+385', 'Europe/Zagreb', NULL, NULL),
(56, 'CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'yes', '53', '.cu', 'Cuban', 'cuba.png', '+53', 'America/Havana', NULL, NULL),
(57, 'CW', 'Curacao', 'Cura&ccedil;ao', 'CUW', '531', 'no', '599', '.cw', 'Dutch', 'curacao.png', '+599', 'America/Curacao', NULL, NULL),
(58, 'CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'yes', '357', '.cy', 'Cypriot', 'cyprus.png', '+357', 'Asia/Famagusta', NULL, NULL),
(59, 'CZ', 'Czech Republic', 'Czech Republic', 'CZE', '203', 'yes', '420', '.cz', 'unknown', 'czech-republic.png', '+420', 'Europe/Prague', NULL, NULL),
(60, 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'COD', '180', 'yes', '243', '.cd', 'Congolese', 'democratic-republic-of-congo.png', '+243', 'Africa/Lubumbashi', NULL, NULL),
(61, 'DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'yes', '45', '.dk', 'Dane', 'denmark.png', '+45', 'Europe/Copenhagen', NULL, NULL),
(62, 'DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'yes', '253', '.dj', 'Djiboutian', 'djibouti.png', '+253', 'Africa/Djibouti', NULL, NULL),
(63, 'DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'yes', '1+767', '.dm', 'Dominican', 'dominica.png', '+1-767', 'America/Dominica', NULL, NULL),
(64, 'DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'yes', '1+809, 8', '.do', 'Dominican', 'dominican-republic.png', '+1-809, 8', 'America/Santo_Domingo', NULL, NULL),
(65, 'EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'yes', '593', '.ec', 'Ecuadorian', 'ecuador.png', '+593', 'America/Guayaquil', NULL, NULL),
(66, 'EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'yes', '20', '.eg', 'Egyptian', 'egypt.png', '+20', 'Africa/Cairo', NULL, NULL),
(67, 'SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'yes', '503', '.sv', 'Salvadoran', 'unknown.png', '+503', 'America/El_Salvador', NULL, NULL),
(68, 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'yes', '240', '.gq', 'Guinean', 'equatorial-guinea.png', '+240', 'Africa/Malabo', NULL, NULL),
(69, 'ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'yes', '291', '.er', 'Eritrean', 'eritrea.png', '+291', 'Africa/Asmara', NULL, NULL),
(70, 'EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'yes', '372', '.ee', 'Estonian', 'estonia.png', '+372', 'Europe/Tallinn', NULL, NULL),
(71, 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'yes', '251', '.et', 'Ethiopian', 'ethiopia.png', '+251', 'Africa/Addis_Ababa', NULL, NULL),
(72, 'FK', 'Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)', 'FLK', '238', 'no', '500', '.fk', 'British', 'falkland-islands.png', '+500', 'Atlantic/Stanley', NULL, NULL),
(73, 'FO', 'Faroe Islands', 'The Faroe Islands', 'FRO', '234', 'no', '298', '.fo', 'unknown', 'faroe-islands.png', '+298', 'Atlantic/Faroe', NULL, NULL),
(74, 'FJ', 'Fiji', 'Republic of Fiji', 'FJI', '242', 'yes', '679', '.fj', 'Fijian', 'fiji.png', '+679', 'Pacific/Fiji', NULL, NULL),
(75, 'FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'yes', '358', '.fi', 'Finn', 'finland.png', '+358', 'Europe/Helsinki', NULL, NULL),
(76, 'FR', 'France', 'French Republic', 'FRA', '250', 'yes', '33', '.fr', 'Frenchman', 'france.png', '+33', 'Europe/Paris', NULL, NULL),
(77, 'GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'no', '594', '.gf', 'French', 'unknown.png', '+594', 'America/Cayenne', NULL, NULL),
(78, 'PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'no', '689', '.pf', 'unknown', 'french-polynesia.png', '+689', 'Pacific/Marquesas', NULL, NULL),
(79, 'TF', 'French Southern Territories', 'French Southern Territories', 'ATF', '260', 'no', NULL, '.tf', 'French', 'unknown.png', NULL, 'Indian/Kerguelen', NULL, NULL),
(80, 'GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'yes', '241', '.ga', 'Gabonese', 'gabon.png', '+241', 'Africa/Libreville', NULL, NULL),
(81, 'GM', 'Gambia', 'Republic of The Gambia', 'GMB', '270', 'yes', '220', '.gm', 'Gambian', 'gambia.png', '+220', 'Africa/Banjul', NULL, NULL),
(82, 'GE', 'Georgia', 'Georgia', 'GEO', '268', 'yes', '995', '.ge', 'Georgian', 'georgia.png', '+995', 'Asia/Tbilisi', NULL, NULL),
(83, 'DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'yes', '', '.de', 'Geman', 'germany.png', '+49', 'Europe/Berlin', NULL, NULL),
(84, 'GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'yes', '233', '.gh', 'Ghanaian', 'ghana.png', '+233', 'Africa/Accra', NULL, NULL),
(85, 'GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'no', '350', '.gi', 'British', 'gibraltar.png', '+350', 'Europe/Gibraltar', NULL, NULL),
(86, 'GR', 'Greece', 'Hellenic Republic', 'GRC', '300', 'yes', '30', '.gr', 'Greek', 'greece.png', '+30', 'Europe/Athens', NULL, NULL),
(87, 'GL', 'Greenland', 'Greenland', 'GRL', '304', 'no', NULL, '.gl', 'Danish', 'greenland.png', NULL, 'America/Scoresbysund', NULL, NULL),
(88, 'GD', 'Grenada', 'Grenada', 'GRD', '308', 'yes', '1+473', '.gd', 'British', 'grenada.png', '+1-473', 'America/Grenada', NULL, NULL),
(89, 'GP', 'Guadaloupe', 'Guadeloupe', 'GLP', '312', 'no', '590', '.gp', 'UNKNOWN', 'unknown.png', '+590', 'UNKNOWN', NULL, NULL),
(90, 'GU', 'Guam', 'Guam', 'GUM', '316', 'no', '1+671', '.gu', 'Guamanian', 'guam.png', '+1-671', 'Pacific/Guam', NULL, NULL),
(91, 'GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', '', '502', '.gt', 'Guatemaltecos', 'guatemala.png', '+502', 'America/Guatemala', NULL, NULL),
(92, 'GG', 'Guernsey', 'Guernsey', 'GGY', '831', 'no', '44', '.gg', 'British', 'guernsey.png', '+44', 'Europe/Guernsey', NULL, NULL),
(93, 'GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'yes', '224', '.gn', 'Guinean', 'guinea.png', '+224', 'Africa/Conakry', NULL, NULL),
(94, 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'yes', '245', '.gw', 'Guinean', 'guinea-bissau.png', '+245', 'Africa/Bissau', NULL, NULL),
(95, 'GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'yes', '592', '.gy', 'Guyanese', 'guyana.png', '+592', 'America/Guyana', NULL, NULL),
(96, 'HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'yes', '509', '.ht', 'African', 'haiti.png', '+509', 'America/Port-au-Prince', NULL, NULL),
(97, 'HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'no', NULL, '.hm', 'UNKNOWN', 'unknown.png', NULL, 'UNKNOWN', NULL, NULL),
(98, 'HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'yes', '504', '.hn', 'Honduran', 'honduras.png', '+504', 'America/Tegucigalpa', NULL, NULL),
(99, 'HK', 'Hong Kong', 'Hong Kong', 'HKG', '344', 'no', '852', '.hk', 'Chinese', 'unknown.png', '+852', 'Asia/Hong_Kong', NULL, NULL),
(100, 'HU', 'Hungary', 'Hungary', 'HUN', '348', 'yes', '36', '.hu', 'Hungarian', 'hungary.png', '+36', 'Europe/Budapest', NULL, NULL),
(101, 'IS', 'Iceland', 'Republic of Iceland', 'ISL', '352', 'yes', '354', '.is', 'Icelandic', 'iceland.png', '+354', 'Atlantic/Reykjavik', NULL, NULL),
(102, 'IN', 'India', 'Republic of India', 'IND', '356', 'yes', '91', '.in', 'Indian', 'india.png', '+91', 'Asia/Kolkata', NULL, NULL),
(103, 'ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'yes', '62', '.id', 'Indonesian', 'indonesia.png', '+62', 'Asia/Pontianak', NULL, NULL),
(104, 'IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'yes', '98', '.ir', 'Iranian', 'iran.png', '+98', 'Asia/Tehran', NULL, NULL),
(105, 'IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'yes', '964', '.iq', 'UNKNOWN', 'iraq.png', '+964', 'Asia/Baghdad', NULL, NULL),
(106, 'IE', 'Ireland', 'Ireland', 'IRL', '372', 'yes', '353', '.ie', 'Irish', 'ireland.png', '+353', 'Europe/Dublin', NULL, NULL),
(107, 'IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'no', '44', '.im', 'UNKNOWN', 'unknown.png', '+44', 'Europe/Isle_of_Man', NULL, NULL),
(108, 'IL', 'Israel', 'State of Israel', 'ISR', '376', 'yes', '972', '.il', 'Israeli', 'israel.png', '+972', 'Asia/Jerusalem', NULL, NULL),
(109, 'IT', 'Italy', 'Italian Republic', 'ITA', '380', 'yes', '39', '.jm', 'Italian', 'italy.png', '+39', 'Europe/Rome', NULL, NULL),
(110, 'JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'yes', '1+876', '.jm', 'Jamaican', 'jamaica.png', '+1-876', 'America/Jamaica', NULL, NULL),
(111, 'JP', 'Japan', 'Japan', 'JPN', '392', 'yes', '81', '.jp', 'Japanese', 'japan.png', '+81', 'Asia/Tokyo', NULL, NULL),
(112, 'JE', 'Jersey', 'The Bailiwick of Jersey', 'JEY', '832', 'no', '44', '.je', 'British', 'jersey.png', '+44', 'Europe/Jersey', NULL, NULL),
(113, 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'yes', '962', '.jo', 'Jordanian', 'jordan.png', '+962', 'Asia/Amman', NULL, NULL),
(114, 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'yes', '7', '.kz', 'Kazakhstani', 'kazakhstan.png', '+7', 'Asia/Aqtau', NULL, NULL),
(115, 'KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'yes', '254', '.ke', 'Kenyan', 'kenya.png', '+254', 'Africa/Nairobi', NULL, NULL),
(116, 'KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'yes', '686', '.ki', 'Kiribatian', 'kiribati.png', '+686', 'Pacific/Enderbury', NULL, NULL),
(117, 'XK', 'Kosovo', 'Republic of Kosovo', '---', '---', 'some', '381', '', 'Albanian', 'kosovo.png', '+381', 'UNKNOWN', NULL, NULL),
(118, 'KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'yes', '965', '.kw', 'Kuwaiti', 'kuwait.png', '+965', 'Asia/Kuwait', NULL, NULL),
(119, 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', 'KGZ', '417', 'yes', '996', '.kg', 'UNKNOWN', 'kyrgyzstan.png', '+996', 'Asia/Bishkek', NULL, NULL),
(120, 'LA', 'Laos', 'Lao People\'s Democratic Republic', 'LAO', '418', 'yes', '856', '.la', 'UNKNOWN', 'laos.png', '+856', 'Asia/Vientiane', NULL, NULL),
(121, 'LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'yes', '371', '.lv', 'Latvian', 'latvia.png', '+371', 'Europe/Riga', NULL, NULL),
(122, 'LB', 'Lebanon', 'Republic of Lebanon', 'LBN', '422', 'yes', '961', '.lb', 'Lebanese', 'lebanon.png', '+961', 'Asia/Beirut', NULL, NULL),
(123, 'LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'yes', '266', '.ls', 'Basotho', 'lesotho.png', '+266', 'Africa/Maseru', NULL, NULL),
(124, 'LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'yes', '231', '.lr', 'Liberian', 'liberia.png', '+231', 'Africa/Monrovia', NULL, NULL),
(125, 'LY', 'Libya', 'Libya', 'LBY', '434', 'yes', '218', '.ly', 'Libyan', 'libya.png', '+218', 'Africa/Tripoli', NULL, NULL),
(126, 'LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'yes', '423', '.li', 'Liechtensteiner', 'liechtenstein.png', '+423', 'Europe/Vaduz', NULL, NULL),
(127, 'LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'yes', '370', '.lt', 'Lithuanian', 'lithuania.png', '+370', 'Europe/Vilnius', NULL, NULL),
(128, 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'yes', '352', '.lu', 'Luxembourger', 'luxembourg.png', '+352', 'Europe/Luxembourg', NULL, NULL),
(129, 'MO', 'Macao', 'The Macao Special Administrative Region', 'MAC', '446', 'no', '853', '.mo', 'Portuguese', 'macao.png', '+853', 'Asia/Macau', NULL, NULL),
(130, 'MK', 'North Macedonia', 'Republic of North Macedonia', 'MKD', '807', 'yes', '389', '.mk', 'Macedonian', 'republic-of-macedonia.png', '+389', 'Europe/Skopje', NULL, NULL),
(131, 'MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'yes', '261', '.mg', 'Madagascan', 'madagascar.png', '+261', 'Indian/Antananarivo', NULL, NULL),
(132, 'MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'yes', '265', '.mw', 'Malawian', 'malawi.png', '+265', 'Africa/Blantyre', NULL, NULL),
(133, 'MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'yes', '60', '.my', 'Malaysian', 'malaysia.png', '+60', 'Asia/Kuala_Lumpur', NULL, NULL),
(134, 'MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'yes', '960', '.mv', 'Maldivian', 'maldives.png', '+960', 'Indian/Maldives', NULL, NULL),
(135, 'ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'yes', '223', '.ml', 'Malian', 'mali.png', '+223', 'Africa/Bamako', NULL, NULL),
(136, 'MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'yes', '356', '.mt', 'Maltese', 'malta.png', '+356', 'Europe/Malta', NULL, NULL),
(137, 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'yes', '692', '.mh', 'Marshallese', 'unknown.png', '+692', 'Pacific/Kwajalein', NULL, NULL),
(138, 'MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'no', '596', '.mq', 'African', 'martinique.png', '+596', 'America/Martinique', NULL, NULL),
(139, 'MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'yes', '222', '.mr', 'Mauritanian', 'mauritania.png', '+222', 'Africa/Nouakchott', NULL, NULL),
(140, 'MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'yes', '230', '.mu', 'Mauritian', 'mauritius.png', '+230', 'Indian/Mauritius', NULL, NULL),
(141, 'YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'no', '262', '.yt', 'UNKNOWN', 'unknown.png', '+262', 'Indian/Mayotte', NULL, NULL),
(142, 'MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'yes', '52', '.mx', 'Mexican', 'mexico.png', '+52', 'America/Mexico_City', NULL, NULL),
(143, 'FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'yes', '691', '.fm', 'UNKNOWN', 'micronesia.png', '+691', 'Pacific/Kosrae', NULL, NULL),
(144, 'MD', 'Moldava', 'Republic of Moldova', 'MDA', '498', 'yes', '373', '.md', 'Moldovan', 'unknown.png', '+373', 'UNKNOWN', NULL, NULL),
(145, 'MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'yes', '377', '.mc', 'Monégasque', 'monaco.png', '+377', 'Europe/Monaco', NULL, NULL),
(146, 'MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'yes', '976', '.mn', 'Mongolian', 'mongolia.png', '+976', 'Asia/Choibalsan', NULL, NULL),
(147, 'ME', 'Montenegro', 'Montenegro', 'MNE', '499', 'yes', '382', '.me', 'Montenegrin', 'montenegro.png', '+382', 'Europe/Podgorica', NULL, NULL),
(148, 'MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'no', '1+664', '.ms', 'Montserratian', 'montserrat.png', '+1-664', 'America/Montserrat', NULL, NULL),
(149, 'MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'yes', '212', '.ma', 'Moroccan', 'morocco.png', '+212', 'Africa/Casablanca', NULL, NULL),
(150, 'MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'yes', '258', '.mz', 'UNKNOWN', 'mozambique.png', '+258', 'Africa/Maputo', NULL, NULL),
(151, 'MM', 'Myanmar (Burma)', 'Republic of the Union of Myanmar', 'MMR', '104', 'yes', '95', '.mm', 'UNKNOWN', 'unknown.png', '+95', 'Asia/Yangon', NULL, NULL),
(152, 'NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'yes', '264', '.na', 'Namibian', 'namibia.png', '+264', 'Africa/Windhoek', NULL, NULL),
(153, 'NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'yes', '674', '.nr', 'Nauruan', 'nauru.png', '+674', 'Pacific/Nauru', NULL, NULL),
(154, 'NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', '524', 'yes', '977', '.np', 'Nepalese', 'nepal.png', '+977', 'Asia/Kathmandu', NULL, NULL),
(155, 'NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'yes', '31', '.nl', 'unknown', 'netherlands.png', '+31', 'Europe/Amsterdam', NULL, NULL),
(156, 'NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'no', '687', '.nc', 'unkown', 'unknown.png', '+687', 'Pacific/Noumea', NULL, NULL),
(157, 'NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'yes', '64', '.nz', 'unknown', 'new-zealand.png', '+64', 'Pacific/Auckland', NULL, NULL),
(158, 'NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'yes', '505', '.ni', 'UNKNOWN', 'nicaragua.png', '+505', 'America/Managua', NULL, NULL),
(159, 'NE', 'Niger', 'Republic of Niger', 'NER', '562', 'yes', '227', '.ne', 'Nigerien', 'niger.png', '+227', 'Africa/Niamey', NULL, NULL),
(160, 'NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'yes', '234', '.ng', 'Nigerien', 'nigeria.png', '+234', 'Africa/Lagos', NULL, NULL),
(161, 'NU', 'Niue', 'Niue', 'NIU', '570', 'some', '683', '.nu', 'Niuean', 'niue.png', '+683', 'Pacific/Niue', NULL, NULL),
(162, 'NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'no', '672', '.nf', 'UNKNOWN', 'unknown.png', '+672', 'Pacific/Norfolk', NULL, NULL),
(163, 'KP', 'North Korea', 'Democratic People\'s Republic of Korea', 'PRK', '408', 'yes', '850', '.kp', 'Korean', 'unknown.png', '+850', 'Asia/Pyongyang', NULL, NULL),
(164, 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', 'MNP', '580', 'no', '1+670', '.mp', 'unknown', 'northern-marianas-islands.png', '+1-670', 'Pacific/Saipan', NULL, NULL),
(165, 'NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'yes', '47', '.no', 'Norwegian', 'norway.png', '+47', 'Europe/Oslo', NULL, NULL),
(166, 'OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'yes', '968', '.om', 'Omani', 'oman.png', '+968', 'Asia/Muscat', NULL, NULL),
(167, 'PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'yes', '92', '.pk', 'Pakistani', 'pakistan.png', '+92', 'Asia/Karachi', NULL, NULL),
(168, 'PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'yes', '680', '.pw', 'UNKNOWN', 'palau.png', '+680', 'Pacific/Palau', NULL, NULL),
(169, 'PS', 'Palestine', 'State of Palestine (or Occupied Palestinian Territory)', 'PSE', '275', 'some', '970', '.ps', 'Palestinian', 'palestine.png', '+970', 'UNKNOWN', NULL, NULL),
(170, 'PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'yes', '507', '.pa', 'Panamanian', 'panama.png', '+507', 'America/Panama', NULL, NULL),
(171, 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'yes', '675', '.pg', 'Guinean', 'papua-new-guinea.png', '+675', 'Pacific/Bougainville', NULL, NULL),
(172, 'PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'yes', '595', '.py', 'Paraguayan', 'paraguay.png', '+595', 'America/Asuncion', NULL, NULL),
(173, 'PE', 'Peru', 'Republic of Peru', 'PER', '604', 'yes', '51', '.pe', 'European', 'peru.png', '+51', 'America/Lima', NULL, NULL),
(174, 'PH', 'Philippines', 'Republic of the Philippines', 'PHL', '608', 'yes', '63', '.ph', 'Pilipino', 'unknown.png', '+63', 'Asia/Manila', NULL, NULL),
(175, 'PN', 'Pitcairn', 'Pitcairn', 'PCN', '612', 'no', 'NONE', '.pn', 'UNKNOWN', 'pitcairn-islands.png', '+612', 'Pacific/Pitcairn', NULL, NULL),
(176, 'PL', 'Poland', 'Republic of Poland', 'POL', '616', 'yes', '48', '.pl', 'Pole', 'republic-of-poland.png', '+48', 'Europe/Warsaw', NULL, NULL),
(177, 'PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'yes', '351', '.pt', 'Portuguese', 'portugal.png', '+351', 'Atlantic/Azores', NULL, NULL),
(178, 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'no', '1+939', '.pr', 'unknown', 'puerto-rico.png', '+1-939', 'America/Puerto_Rico', NULL, NULL),
(179, 'QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'yes', '974', '.qa', 'Qatari', 'qatar.png', '+974', 'Asia/Qatar', NULL, NULL),
(180, 'RE', 'Reunion', 'R&eacute;union', 'REU', '638', 'no', '262', '.re', 'UNKNOWN', 'unknown.png', '+262', 'Indian/Reunion', NULL, NULL),
(181, 'RO', 'Romania', 'Romania', 'ROU', '642', 'yes', '40', '.ro', 'Romanian', 'romania.png', '+40', 'Europe/Bucharest', NULL, NULL),
(182, 'RU', 'Russia', 'Russian Federation', 'RUS', '643', 'yes', '7', '.ru', 'Russian', 'russia.png', '+7', 'Asia/Anadyr', NULL, NULL),
(183, 'RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'yes', '250', '.rw', 'Rwandan', 'rwanda.png', '+250', 'Africa/Kigali', NULL, NULL),
(184, 'BL', 'Saint Barthelemy', 'Saint Barth&eacute;lemy', 'BLM', '652', 'no', '590', '.bl', 'French', 'unknown.png', '+590', 'America/St_Barthelemy', NULL, NULL),
(185, 'SH', 'Saint Helena', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', '654', 'no', '290', '.sh', 'UNKNOWN', 'unknown.png', '+290', 'Atlantic/St_Helena', NULL, NULL),
(186, 'KN', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', 'KNA', '659', 'yes', '1+869', '.kn', 'UNKNOWN', 'unknown.png', '+1-869', 'America/St_Kitts', NULL, NULL),
(187, 'LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'yes', '1+758', '.lc', 'African', 'unknown.png', '+1-758', 'America/St_Lucia', NULL, NULL),
(188, 'MF', 'Saint Martin', 'Saint Martin', 'MAF', '663', 'no', '590', '.mf', 'UNKNOWN', 'unknown.png', '+590', 'America/Marigot', NULL, NULL),
(189, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'no', '508', '.pm', 'French', 'unknown.png', '+508', 'America/Miquelon', NULL, NULL),
(190, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'yes', NULL, '.vc', 'UNKNOWN', 'unknown.png', NULL, 'America/St_Vincent', NULL, NULL),
(191, 'WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'yes', '685', '.ws', 'unknown', 'samoa.png', '+685', 'Pacific/Apia', NULL, NULL),
(192, 'SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', '', '378', '.sm', 'UNKNOWN', 'unknown.png', '+378', 'Europe/San_Marino', NULL, NULL),
(193, 'ST', 'Sao Tome and Principe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'STP', '678', 'yes', '239', '.st', 'Sao Tomean', 'unknown.png', '+239', 'Africa/Sao_Tome', NULL, NULL),
(194, 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'yes', '966', '.sa', 'Saudi', 'saudi-arabia.png', '+966', 'Asia/Riyadh', NULL, NULL),
(195, 'SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'yes', '221', '.sn', 'Senegalese', 'senegal.png', '+221', 'Africa/Dakar', NULL, NULL),
(196, 'RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'yes', '381', '.rs', 'Serbian', 'serbia.png', '+381', 'Europe/Belgrade', NULL, NULL),
(197, 'SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'yes', '248', '.sc', 'Seychellois', 'seychelles.png', '+248', 'Indian/Mahe', NULL, NULL),
(198, 'SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'yes', '232', '.sl', 'Sierra Leonean', 'unknown.png', '+232', 'Africa/Freetown', NULL, NULL),
(199, 'SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'yes', '65', '.sg', 'Singaporean', 'singapore.png', '+65', 'Asia/Singapore', NULL, NULL),
(200, 'SX', 'Sint Maarten', 'Sint Maarten', 'SXM', '534', 'no', '1+721', '.sx', 'Dutch', 'unknown.png', '+1-721', 'America/Lower_Princes', NULL, NULL),
(201, 'SK', 'Slovakia', 'Slovak Republic', 'SVK', '703', 'yes', '421', '.sk', 'Slovak', 'slovakia.png', '+421', 'Europe/Bratislava', NULL, NULL),
(202, 'SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'yes', '386', '.si', 'Slovenian', 'slovenia.png', '+386', 'Europe/Ljubljana', NULL, NULL),
(203, 'SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '090', 'yes', '677', '.sb', 'Melanesian', 'unknown.png', '+677', 'Pacific/Guadalcanal', NULL, NULL),
(204, 'SO', 'Somalia', 'Somali Republic', 'SOM', '706', 'yes', '252', '.so', 'Somalis', 'somalia.png', '+252', 'Africa/Mogadishu', NULL, NULL),
(205, 'ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'yes', '27', '.za', 'African', 'unknown.png', '+27', 'Africa/Johannesburg', NULL, NULL),
(206, 'GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'no', '500', '.gs', 'UNKNOWN', 'unknown.png', '+500', 'Atlantic/South_Georgia', NULL, NULL),
(207, 'KR', 'South Korea', 'Republic of Korea', 'KOR', '410', 'yes', '', '.kr', 'Koean', 'south-korea.png', '+82', 'Asia/Seoul', NULL, NULL),
(208, 'SS', 'South Sudan', 'Republic of South Sudan', 'SSD', '728', 'yes', '211', '.ss', 'Sudanese', 'unknown.png', '+211', 'Africa/Juba', NULL, NULL),
(209, 'ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'yes', '34', '.es', 'Spaniard', 'spain.png', '+34', 'Europe/Madrid', NULL, NULL),
(210, 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'yes', '94', '.lk', 'unknown', 'sri-lanka.png', '+94', 'Asia/Colombo', NULL, NULL),
(211, 'SD', 'Sudan', 'Republic of the Sudan', 'SDN', '729', 'yes', '249', '.sd', 'Sudanese', 'sudan.png', '+249', 'Africa/Khartoum', NULL, NULL),
(212, 'SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'yes', '597', '.sr', 'Dutch', 'suriname.png', '+597', 'America/Paramaribo', NULL, NULL),
(213, 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'SJM', '744', 'no', '47', '.sj', 'Norwegian', 'unknown.png', '+47', 'Arctic/Longyearbyen', NULL, NULL),
(214, 'SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', '748', 'yes', '268', '.sz', 'Swazi', 'swaziland.png', '+268', 'Africa/Mbabane', NULL, NULL),
(215, 'SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'yes', '46', '.se', 'Swede', 'sweden.png', '+46', 'Europe/Stockholm', NULL, NULL),
(216, 'CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'yes', '41', '.ch', 'Swiss', 'switzerland.png', '+41', 'Europe/Zurich', NULL, NULL),
(217, 'SY', 'Syria', 'Syrian Arab Republic', 'SYR', '760', 'yes', '963', '.sy', 'Syrian', 'syria.png', '+963', 'Asia/Damascus', NULL, NULL),
(218, 'TW', 'Taiwan', 'Republic of China (Taiwan)', 'TWN', '158', 'former', '886', '.tw', 'Taiwanese', 'taiwan.png', '+886', 'Asia/Taipei', NULL, NULL),
(219, 'TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'yes', '992', '.tj', 'Tadzhik', 'tajikistan.png', '+992', 'Asia/Dushanbe', NULL, NULL),
(220, 'TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'yes', '255', '.tz', 'Tanzanian', 'tanzania.png', '+255', 'Africa/Dar_es_Salaam', NULL, NULL),
(221, 'TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'yes', '66', '.th', 'Thai', 'thailand.png', '+66', 'Asia/Bangkok', NULL, NULL),
(222, 'TL', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'yes', '670', '.tl', 'Timorese', 'unknown.png', '+670', 'Asia/Dili', NULL, NULL),
(223, 'TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'yes', '228', '.tg', 'Togolese', 'togo.png', '+228', 'Africa/Lome', NULL, NULL),
(224, 'TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'no', '690', '.tk', 'Tokelauan', 'tokelau.png', '+690', 'Pacific/Fakaofo', NULL, NULL),
(225, 'TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'yes', '676', '.to', 'unknown', 'tonga.png', '+676', 'Pacific/Tongatapu', NULL, NULL),
(226, 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'yes', '1+868', '.tt', 'British', 'trinidad-and-tobago.png', '+1-868', 'America/Port_of_Spain', NULL, NULL),
(227, 'TN', 'Tunisia', 'Republic of Tunisia', 'TUN', '788', 'yes', '216', '.tn', 'Tunisian ', 'tunisia.png', '+216', 'Africa/Tunis', NULL, NULL),
(228, 'TR', 'Turkey', 'Republic of Turkey', 'TUR', '792', 'yes', '90', '.tr', 'Turk', 'turkey.png', '+90', 'Europe/Istanbul', NULL, NULL),
(229, 'TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'yes', '993', '.tm', 'Turkmen', 'turkmenistan.png', '+993', 'Asia/Ashgabat', NULL, NULL),
(230, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'no', '1+649', '.tc', 'British', 'turks-and-caicos.png', '++1-649', 'America/Grand_Turk', NULL, NULL),
(231, 'TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'yes', '688', '.tv', 'Tuvaluan', 'tuvalu.png', '+688', '	Pacific/Funafuti', NULL, NULL),
(232, 'UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'yes', '256', '.ug', 'UGANDAN', 'uganda.png', '+256', 'Africa/Kampala', NULL, NULL),
(233, 'UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'yes', '380', '.ua', 'Ukrainian', 'ukraine.png', '+380', 'Europe/Kiev', NULL, NULL),
(234, 'AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'yes', '971', '.ae', 'Emirati', 'united-arab-emirates.png', '+971', 'Asia/Dubai', NULL, NULL),
(235, 'GB', 'United Kingdom', 'United Kingdom of Great Britain and Nothern Ireland', 'GBR', '826', 'yes', '44', '.uk', 'British', 'united-kingdom.png', '+44', 'Europe/London', NULL, NULL),
(236, 'US', 'United States', 'United States of America', 'USA', '840', 'yes', '1', '.us', 'American', 'united-states-of-america.png', '+1', 'America/Adak', NULL, NULL),
(237, 'UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'no', 'NONE', 'NONE', 'American', 'unknown.png', 'UNKNOWN', 'Pacific/Midway', NULL, NULL),
(238, 'UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'yes', '598', '.uy', 'Uruguayan', 'uruguay.png', '+598', 'America/Montevideo', NULL, NULL),
(239, 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'yes', '998', '.uz', 'Uzbekistan', 'unknown.png', '+998', 'Asia/Samarkand', NULL, NULL),
(240, 'VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'yes', '678', '.vu', 'unknown', 'vanuatu.png', '+678', 'Pacific/Efate', NULL, NULL),
(241, 'VA', 'Vatican City', 'State of the Vatican City', 'VAT', '336', 'no', '39', '.va', 'Vaticanian', 'vatican-city.png', '+39', 'Europe/Vatican', NULL, NULL),
(242, 'VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'yes', '58', '.ve', 'Venezuelan', 'venezuela.png', '+58', 'America/Caracas', NULL, NULL),
(243, 'VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'yes', '84', '.vn', 'Vietnamese', 'vietnam.png', '+84', 'Asia/Ho_Chi_Minh', NULL, NULL),
(244, 'VG', 'Virgin Islands, British', 'British Virgin Islands', 'VGB', '092', 'no', '1+284', '.vg', 'American', 'unknown.png', '+1-284', 'America/Tortola', NULL, NULL),
(245, 'VI', 'Virgin Islands, US', 'Virgin Islands of the United States', 'VIR', '850', 'no', '1+340', '.vi', 'American', 'virgin-islands.png', '+1-340', 'America/St_Thomas', NULL, NULL),
(246, 'WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '876', 'no', '681', '.wf', 'UNKOWN', 'unknown.png', '+681', 'Pacific/Wallis', NULL, NULL),
(247, 'EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'no', '212', '.eh', 'Sahrawi', 'western-sahara.png', '+212', 'Africa/El_Aaiun', NULL, NULL),
(248, 'YE', 'Yemen', 'Republic of Yemen', 'YEM', '887', 'yes', '967', '.ye', 'Yemeni', 'yemen.png', '+967', 'Asia/Aden', NULL, NULL),
(249, 'ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'yes', '260', '.zm', 'Zambian', 'zambia.png', '+260', 'Africa/Lusaka', NULL, NULL),
(250, 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'yes', '263', '.zw', 'Zimbabwean', 'zimbabwe.png', '+263', 'Africa/Harare', NULL, NULL);

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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xrate` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `xrate`, `created_at`, `updated_at`) VALUES
(1, 'AED', 'United Arab Emirates dirham', 'AED', NULL, NULL, NULL),
(2, 'AUD', 'Australian Dollar', '$', NULL, NULL, NULL),
(3, 'BAN', 'Bangladesh', 'BDT', NULL, NULL, NULL),
(4, 'BRL', 'Brazilian Real', 'R$', NULL, NULL, NULL),
(5, 'CAD', 'Canadian Dollar', '$', NULL, NULL, NULL),
(6, 'CHF', 'Swiss Franc', 'Fr', NULL, NULL, NULL),
(7, 'CLP', 'Chilean Peso', '$', NULL, NULL, NULL),
(8, 'CNY', 'Chinese Yuan', 'Â¥', NULL, NULL, NULL),
(9, 'CZK', 'Czech Koruna', 'KÄ', NULL, NULL, NULL),
(10, 'DKK', 'Danish Krone', 'kr', NULL, NULL, NULL),
(11, 'EGP', 'EGP', 'EGP', NULL, NULL, NULL),
(12, 'EUR', 'Euro', 'â‚¬', NULL, NULL, NULL),
(13, 'GBP', 'British Pound', 'Â£', NULL, NULL, NULL),
(14, 'HKD', 'Hong Kong Dollar', '$', NULL, NULL, NULL),
(15, 'HUF', 'Hungarian Forint', 'Ft', NULL, NULL, NULL),
(16, 'IDR', 'Indonesian Rupiah', 'Rp', NULL, NULL, NULL),
(17, 'ILS', 'Israeli New Shekel', 'â‚ª', NULL, NULL, NULL),
(18, 'INR', 'Indian Rupee', 'â‚¹', NULL, NULL, NULL),
(19, 'JPY', 'Japanese Yen', 'å††', NULL, NULL, NULL),
(20, 'KRW', 'Korean Won', 'â‚©', NULL, NULL, NULL),
(21, 'MXN', 'Mexican Peso', '$', NULL, NULL, NULL),
(22, 'MYR', 'Malaysian Ringgit', 'RM', NULL, NULL, NULL),
(23, 'NOK', 'Norwegian Krone', 'kr', NULL, NULL, NULL),
(24, 'NZD', 'New Zealand Dollar', '$', NULL, NULL, NULL),
(25, 'PHP', 'Philippine Peso', 'â‚±', NULL, NULL, NULL),
(26, 'PKR', 'Pakistan Rupee', 'PKR', NULL, NULL, NULL),
(27, 'PLN', 'Polish Zloty', 'zl', NULL, NULL, NULL),
(28, 'RUB', 'Russian Ruble', 'â‚½', NULL, NULL, NULL),
(29, 'SEK', 'Swedish Krona', 'kr', NULL, NULL, NULL),
(30, 'SGD', 'Singapore Dollar', 'S$', NULL, NULL, NULL),
(31, 'THB', 'Thai Baht', 'à¸¿', NULL, NULL, NULL),
(32, 'TRY', 'Turkish Lira', 'â‚º', NULL, NULL, NULL),
(33, 'TWD', 'Taiwan Dollar', 'NT$', NULL, NULL, NULL),
(34, 'USD', 'US Dollar', '$', 1, NULL, NULL),
(35, 'VEF', 'Bol?var Fuerte', 'Bs.', NULL, NULL, NULL),
(36, 'ZAR', 'South African Rand', 'R', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minutes` int(11) DEFAULT NULL,
  `days` double(8,2) DEFAULT NULL,
  `subtracted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `minutes_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
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
(1, 'Software & App. Development', 'helpdesk@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'helpdesk@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', NULL, NULL, NULL, NULL, NULL, NULL, 25),
(2, 'Information Technology', 'support@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'support@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', NULL, NULL, NULL, NULL, NULL, NULL, 6),
(3, 'Sales & Marketing', 'sales@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'sales@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', NULL, NULL, NULL, NULL, NULL, NULL, 15),
(4, 'Finance', 'finance@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'finance@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', NULL, NULL, NULL, NULL, NULL, NULL, 7),
(5, 'Human Resources', 'hr@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'hr@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', NULL, NULL, NULL, NULL, NULL, NULL, 11),
(7, 'Board Members', 'ceo@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'ceo@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', NULL, NULL, NULL, NULL, NULL, NULL, 11),
(8, 'CEO', 'ceo@onetecgroup.com', 'ssl', 'mail.exclusivehosting.net', 'ceo@onetecgroup.com', 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09', 'INBOX', NULL, NULL, NULL, NULL, NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('paid','non_approved','unpaid') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deposit_category_id` int(10) UNSIGNED DEFAULT NULL,
  `paid_by_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_categories`
--

CREATE TABLE `deposit_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_leader_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `designation_name_ar`, `designation_leader_id`, `created_at`, `updated_at`, `deleted_at`, `department_id`) VALUES
(1, 'Operations Manager', NULL, NULL, NULL, NULL, NULL, 1),
(2, 'IT & Network Manager', NULL, NULL, NULL, NULL, NULL, 2),
(3, 'Coordinator', NULL, NULL, NULL, NULL, NULL, 3),
(4, 'Accountant', NULL, NULL, NULL, NULL, NULL, 4),
(5, 'System Administration', NULL, NULL, NULL, NULL, NULL, 1),
(6, 'IT Technical Support', NULL, NULL, NULL, NULL, NULL, 2),
(7, 'Marketing', NULL, NULL, NULL, NULL, NULL, 3),
(8, 'CFO', NULL, NULL, NULL, NULL, NULL, 7),
(9, 'Recruitment', NULL, NULL, NULL, NULL, NULL, 5),
(11, 'Training & Development', NULL, NULL, NULL, NULL, NULL, 5),
(12, 'Help Desk', NULL, NULL, NULL, NULL, NULL, 1),
(13, 'Technical Support', NULL, NULL, NULL, NULL, NULL, 1),
(14, 'CEO', NULL, NULL, NULL, NULL, NULL, 7),
(15, 'Senior Back End Developer', NULL, NULL, NULL, NULL, NULL, 1),
(16, 'Senior Android Developer', NULL, NULL, NULL, NULL, NULL, 1),
(17, 'Site Engineer', NULL, NULL, NULL, NULL, NULL, 2),
(18, 'Technician', NULL, NULL, NULL, NULL, NULL, 2),
(19, 'Electrician', NULL, NULL, NULL, NULL, NULL, 2),
(20, 'Sales Account Manager', NULL, NULL, NULL, NULL, NULL, 3),
(21, 'Senior Sales Account Manager', NULL, NULL, NULL, NULL, NULL, 3),
(23, 'Product UX/ UI', NULL, NULL, NULL, NULL, NULL, 1),
(24, 'QA Web & Mobile', NULL, NULL, NULL, NULL, NULL, 1),
(25, 'Telesales', NULL, NULL, NULL, NULL, NULL, 3),
(26, 'Junior Back End Developer', NULL, NULL, NULL, NULL, NULL, 1),
(27, 'Junior Sales', NULL, NULL, NULL, NULL, NULL, 3),
(28, 'Back End Developer', NULL, NULL, NULL, NULL, NULL, 1),
(29, 'Mobile App Developer', NULL, NULL, NULL, NULL, NULL, 1),
(30, 'Software Team Leader', NULL, NULL, NULL, NULL, NULL, 1),
(31, 'Junior Front-End Developer', NULL, NULL, NULL, NULL, NULL, 1),
(32, 'CEO', NULL, NULL, NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `email_group`, `subject`, `template_body`, `created_at`, `updated_at`) VALUES
(1, 'registration', 'Registration successful', '<p>Welcome to {SITE_NAME}</p>\r\n\r\n<p>Thanks for joining {SITE_NAME}. We listed your sign in details below, make sure you keep them safe.<br />\r\nTo open your {SITE_NAME} homepage, please follow this link:<br />\r\n<big><strong><a href=\"{SITE_URL}\">{SITE_NAME} Account!</a></strong></big><br />\r\nLink doesn&#39;t work? Copy the following link to your browser address bar:<br />\r\n<a href=\"{SITE_URL}\">{SITE_URL}</a><br />\r\nYour username: {USERNAME}<br />\r\nYour email address: {EMAIL}<br />\r\nYour password: {PASSWORD}<br />\r\nHave fun!<br />\r\nThe {SITE_NAME} Team.<br />\r\n&nbsp;</p>', NULL, '2021-02-13 03:22:28'),
(2, 'forgot_password', 'Forgot Password', '<p>New Password</p>\r\n\r\n<p>Forgot your password, huh? No big deal.<br />\r\nTo create a new password, just follow this link:<br />\r\n<br />\r\n<big><strong><a href=\"{PASS_KEY_URL}\">Create a new password</a></strong></big><br />\r\nLink doesn&#39;t work? Copy the following link to your browser address bar:<br />\r\n<a href=\"{PASS_KEY_URL}\">{PASS_KEY_URL}</a><br />\r\n<br />\r\n<br />\r\nYou received this email, because it was requested by a <a href=\"{SITE_URL}\">{SITE_NAME}</a> user.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.</p>\r\n\r\n<p><br />\r\nThank you,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 03:21:56'),
(3, 'change_email', 'Change Email', '<p>New email address on {SITE_NAME}</p>\r\n\r\n<p>You have changed your email address for {SITE_NAME}.<br />\r\nFollow this link to confirm your new email address:<br />\r\n<big><strong><a href=\"{NEW_EMAIL_KEY_URL}\">Confirm your new email</a></strong></big><br />\r\nLink doesn&#39;t work? Copy the following link to your browser address bar:<br />\r\n<a href=\"{NEW_EMAIL_KEY_URL}\">{NEW_EMAIL_KEY_URL}</a><br />\r\n<br />\r\nYour email address: {NEW_EMAIL}<br />\r\n<br />\r\nYou received this email, because it was requested by a <a href=\"{SITE_URL}\">{SITE_NAME}</a> user. If you have received this by mistake, please DO NOT click the confirmation link, and simply delete this email. After a short time, the request will be removed from the system.<br />\r\nThank you,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 03:19:09'),
(4, 'activate_account', 'Activate Account', '<p>Welcome to {SITE_NAME}!</p>\r\n\r\n<p>Thank you&nbsp;for joining {SITE_NAME}.</p>\r\n\r\n<p>Please Find your Log in details below, make sure you keep them safe.</p>\r\n\r\n<p>To verify your email address, please follow this link:<br />\r\n<big><strong><a href=\"{ACTIVATE_URL}\">Finish your registration...</a></strong></big><br />\r\nLink doesn&#39;t work? Copy the following link to your browser address bar:<br />\r\n<a href=\"{ACTIVATE_URL}\">{ACTIVATE_URL}</a></p>\r\n\r\n<p><br />\r\n<br />\r\nPlease verify your email within {ACTIVATION_PERIOD} hours, otherwise your registration will become invalid and you will have to register again.<br />\r\n<br />\r\n<br />\r\nYour username: {USERNAME}<br />\r\nYour email address: {EMAIL}<br />\r\nYour password: {PASSWORD}<br />\r\n<br />\r\nHave fun!<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 02:43:58'),
(5, 'reset_password', 'Reset Password', '<p>New password on {SITE_NAME}</p>\r\n\r\n<p>You have successfully changed your password.<br />\r\nPlease, find below log in details for your record:</p>\r\n\r\n<p>Your username: {USERNAME}<br />\r\nYour email address: {EMAIL}<br />\r\nYour new password: {NEW_PASSWORD}<br />\r\n<br />\r\nThank you,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 03:25:03'),
(6, 'bug_assigned', 'New Bug Assigned', '<p>Hi there,</p>\r\n\r\n<p>A new bug &nbsp;{BUG_TITLE} &nbsp;has been assigned to you by {ASSIGNED_BY}.</p>\r\n\r\n<p>You can view this bug by logging in to the portal using the link below.</p>\r\n\r\n<p><br />\r\n<big><strong><a href=\"{BUG_URL}\">View Bug</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:12:16'),
(7, 'bug_updated', 'Bug status changed', '<p>Hi there,</p>\r\n\r\n<p>Bug {BUG_TITLE} has been marked as {STATUS} by {MARKED_BY}.</p>\r\n\r\n<p>You can view this bug by logging in to the portal using the link below.</p>\r\n\r\n<p><big><strong><a href=\"{BUG_URL}\">View Bug</a></strong></big><br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 20:14:00'),
(8, 'bug_comments', 'New Bug Comment Received', '<p>Hi there,</p>\r\n\r\n<p>A new comment has been posted by {POSTED_BY} to bug {BUG_TITLE}.</p>\r\n\r\n<p>You can view the comment using the link below.</p>\r\n\r\n<p><em>{COMMENT_MESSAGE}</em></p>\r\n\r\n<p><br />\r\n<big><strong><a href=\"{COMMENT_URL}\">View Comment</a></strong></big><br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 20:12:56'),
(9, 'bug_attachment', 'New bug attachment', '<p>Hi there,</p>\r\n\r\n<p>A new attachment&nbsp;has been uploaded by {UPLOADED_BY} to issue {BUG_TITLE}.</p>\r\n\r\n<p>You can view the bug using the link below.</p>\r\n\r\n<p><br />\r\n<big><strong><a href=\"{BUG_URL}\">View Bug</a></strong></big></p>\r\n\r\n<p><br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:13:26'),
(10, 'bug_reported', 'New bug Reported', '<p>Hi there,</p>\r\n\r\n<p>A new bug ({BUG_TITLE}) has been reported by {ADDED_BY}.</p>\r\n\r\n<p>You can view the Bug using the Dashboard Page.</p>\r\n\r\n<p><br />\r\n<big><strong><a href=\"{BUG_URL}\">View Bug</a></strong></big></p>\r\n\r\n<p><br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:14:27'),
(13, 'refund_confirmation', 'Refund Confirmation', '<p>Refund Confirmation</p>\r\n\r\n<p>Hello {CLIENT}</p>\r\n\r\n<p>This is confirmation that a refund has been processed for Invoice&nbsp; of {CURRENCY} {AMOUNT}&nbsp;sent on {INVOICE_DATE}.<br />\r\nYou can view the invoice online at:<br />\r\n<big><strong><a href=\"{INVOICE_LINK}\">View Invoice</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 04:04:24'),
(14, 'payment_confirmation', 'Payment Confirmation', '<p>Payment Confirmation</p>\r\n\r\n<p>Hello {CLIENT}</p>\r\n\r\n<p>This is a payment receipt for your invoice of {CURRENCY} {AMOUNT}&nbsp;sent on {INVOICE_DATE}.<br />\r\nYou can view the invoice online at:<br />\r\n<big><strong><a href=\"{INVOICE_LINK}\">View Invoice</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>\r\n', NULL, NULL),
(15, 'payment_email', 'Payment Received', '<p>Payment Received</p>\r\n\r\n<p>Dear Customer</p>\r\n\r\n<p>We have received your payment of {INVOICE_CURRENCY} {PAID_AMOUNT}.</p>\r\n\r\n<p>Thank you for your Payment and business. We look forward to working with you again.</p>\r\n\r\n<p>--------------------------<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 04:03:14'),
(16, 'invoice_overdue_email', 'Invoice Overdue Notice', '<p>Invoice Overdue</p>\r\n\r\n<p>INVOICE {REF}</p>\r\n\r\n<p><strong>Hello {CLIENT}</strong></p>\r\n\r\n<p>This is the notice that your invoice overdue.&nbsp;The invoice {CURRENCY} {AMOUNT}. and Due Date: {DUE_DATE}</p>\r\n\r\n<p>You can view the invoice online at:<br />\r\n<big><strong><a href=\"{INVOICE_LINK}\">View Invoice</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 04:03:44'),
(17, 'invoice_message', 'New Invoice', '<p>INVOICE {REF}</p>\r\n\r\n<p><strong>Hello {CLIENT}</strong><br />\r\n<br />\r\nHere is the invoice of {CURRENCY} {AMOUNT}.<br />\r\n<br />\r\nYou can view the invoice online at:<br />\r\n<big><strong><a href=\"{INVOICE_LINK}\">View Invoice</a></strong></big><br />\r\n<br />\r\nBest Regards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 03:59:57'),
(18, 'invoice_reminder', 'Invoice Reminder', '<p>Invoice Reminder</p>\r\n\r\n<p>Hello {CLIENT}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br />\r\nYou can view the invoice online at:<br />\r\n<big><strong><a href=\"{INVOICE_LINK}\">View Invoice</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 04:02:41'),
(19, 'message_received', 'Message Received', '<p>Message Received</p>\r\n\r\n<p>Hi {RECIPIENT},</p>\r\n\r\n<p>You have received a message from {SENDER}.</p>\r\n\r\n<p>------------------------------------------------------------------</p>\r\n\r\n<blockquote>{MESSAGE}</blockquote>\r\n\r\n<p><big><strong><a href=\"{SITE_URL}\">Go to Account</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 22:47:32'),
(20, 'estimate_email', 'New Estimate', '<p>Estimate {ESTIMATE_REF}</p>\r\n\r\n<p>Hi {CLIENT}</p>\r\n\r\n<p>Thanks for your business inquiry.</p>\r\n\r\n<p>The estimate {ESTIMATE_REF} is attached with this email.<br />\r\nEstimate Overview:<br />\r\nEstimate # : {ESTIMATE_REF}<br />\r\nAmount: {CURRENCY} {AMOUNT}<br />\r\n<br />\r\nYou can view the estimate online at:<br />\r\n<big><strong><a href=\"{ESTIMATE_LINK}\">View Estimate</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 22:42:16'),
(21, 'ticket_staff_email', 'New Ticket [TICKET_CODE]', '<p>New Ticket</p>\r\n\r\n<p>Ticket #{TICKET_CODE} has been created by the client.</p>\r\n\r\n<p>You may view the ticket by clicking on the following link<br />\r\n<br />\r\nClient Email : {REPORTER_EMAIL}<br />\r\n<br />\r\n<big><strong><a href=\"{TICKET_LINK}\">View Ticket</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\n<br />\r\n{SITE_NAME}</p>', NULL, '2021-02-13 20:57:41'),
(22, 'ticket_client_email', 'Ticket [TICKET_CODE] Opened', '<p>Ticket Opened&nbsp;</p>\r\n\r\n<p>Hello {CLIENT_EMAIL},</p>\r\n\r\n<p>Your ticket has been opened with us.<br />\r\n<br />\r\nTicket # {TICKET_CODE}<br />\r\nStatus : Open<br />\r\n<br />\r\nClick on the below link to see the ticket details and post additional comments.<br />\r\n<br />\r\n<big><strong><a href=\"{TICKET_LINK}\">View Ticket</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:52:04'),
(23, 'ticket_reply_email', 'Ticket [TICKET_CODE] Response', '<p>Ticket Response</p>\r\n\r\n<p>A new response has been added to Ticket #{TICKET_CODE}<br />\r\n<br />\r\nTicket : #{TICKET_CODE}<br />\r\nStatus : {TICKET_STATUS}<br />\r\n&nbsp;</p>\r\n\r\n<p>To see the response and post additional comments, click on the link below.<br />\r\n<br />\r\n<big><strong><a href=\"{TICKET_LINK}\">View Reply</a> </strong></big><br />\r\n<br />\r\nNote: Do not reply to this email as this email is not monitored.<br />\r\n<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:55:04'),
(24, 'ticket_closed_email', 'Ticket [TICKET_CODE] Closed', '<p>Ticket Closed</p>\r\n\r\n<p>Hi {REPORTER_EMAIL}<br />\r\n<br />\r\nTicket #{TICKET_CODE} has been closed by {STAFF_USERNAME}<br />\r\n<br />\r\nTicket : #{TICKET_CODE}<br />\r\nStatus : {TICKET_STATUS}<br />\r\n<br />\r\nReplies : {NO_OF_REPLIES}<br />\r\n<br />\r\nTo see the responses or open the ticket, click on the link below.<br />\r\n<br />\r\n<big><strong><a href=\"{TICKET_LINK}\">View Ticket</a></strong></big><br />\r\n<br />\r\nNote: Do not reply to this email as this email is not monitored.<br />\r\n<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:53:48'),
(26, 'task_updated', 'Task updated', '<div style=\"height: 7px; background-color: #535353;\"></div>\r\n<div style=\"background-color:#E8E8E8; margin:0px; padding:55px 20px 40px 20px; font-family:Open Sans, Helvetica, sans-serif; font-size:12px; color:#535353;\"><div style=\"text-align:center; font-size:24px; font-weight:bold; color:#535353;\">Task updated</div>\r\n<div style=\"border-radius: 5px 5px 5px 5px; padding:20px; margin-top:45px; background-color:#FFFFFF; font-family:Open Sans, Helvetica, sans-serif; font-size:13px;\"><p>Hi there,</p>\r\n<p>{TASK_NAME} in {PROJECT_TITLE} has been updated by {ASSIGNED_BY}.</p>\r\n<p>You can view this project by logging in to the portal using the link below.</p>\r\n-----------------------------------<br><big><b><a href=\"{PROJECT_URL}\">View Project</a></b></big><br><br>Regards<br>The {SITE_NAME} Team</div>\r\n</div>', NULL, NULL),
(27, 'quotations_form', 'Your Quotation Request', '<p>QUOTATION</p>\r\n\r\n<p><strong>Hello {CLIENT}</strong><br />\r\n&nbsp;</p>\r\n\r\n<p>Thank you for you for filling in our Quotation Request Form.<br />\r\n<br />\r\nPlease find below are our quotation:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellpadding=\"8\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Quotation Date</td>\r\n			<td><strong>{DATE}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Our Quotation</td>\r\n			<td><strong>{CURRENCY} {AMOUNT}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Addtitional Comments</td>\r\n			<td><strong>{NOTES}</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\nYou can view the estimate online at:<br />\r\n<big><strong><a href=\"{QUOTATION LINK}\">View Quotation</a></strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nThank you and we look forward to working with you.<br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 22:48:35'),
(28, 'client_notification', 'New project created', '<p>Hello, <strong>{CLIENT_NAME}</strong>,<br />\r\nwe have created a new project with your account.<br />\r\n<br />\r\nProject name : <strong>{PROJECT_NAME}</strong><br />\r\nYou can login to see the status of your project by using this link:<br />\r\n<big><a href=\"{PROJECT_LINK}\"><strong>View Project</strong></a></big></p>\r\n\r\n<p><br />\r\nBest Regards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 20:28:30'),
(29, 'assigned_project', 'Assigned Project', '<p>Hi There,</p>\r\n\r\n<p>A<strong> {PROJECT_NAME}</strong> has been assigned by <strong>{ASSIGNED_BY} </strong>to you.You can view this project by logging in to the portal using the link below:<br />\r\n<big><a href=\"{PROJECT_URL}\"><strong>View Project</strong></a></big><br />\r\n<br />\r\nBest Regards<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 20:30:35'),
(30, 'complete_projects', 'Project Completed', '<p>Hi <strong>{CLIENT_NAME}</strong>,</p>\r\n\r\n<p>Project : <strong>{PROJECT_NAME}</strong> &nbsp;has been completed.<br />\r\nYou can view the project by logging into your portal Account:<br />\r\n<big><a href=\"{PROJECT_LINK}\"><strong>View Project</strong></a></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:32:27'),
(31, 'project_comments', 'New Project Comment Received', '<p>Hi There,</p>\r\n\r\n<p>A new comment has been posted by <strong>{POSTED_BY}</strong> to project <strong>{PROJECT_NAME}</strong>.</p>\r\n\r\n<p>You can view the comment using the link below:<br />\r\n<big><a href=\"{COMMENT_URL}\"><strong>View Project</strong></a></big><br />\r\n<br />\r\n<em>{COMMENT_MESSAGE}</em><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:36:16'),
(32, 'project_attachment', 'New Project  Attachment', '<p>Hi There,</p>\r\n\r\n<p>A new file has been uploaded by <strong>{UPLOADED_BY}</strong> to project <strong>{PROJECT_NAME}</strong>.<br />\r\nYou can view the Project using the link below:<br />\r\n<big><a href=\"{PROJECT_URL}\"><strong>View Project</strong></a></big><br />\r\n<br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:37:28'),
(33, 'responsible_milestone', 'Responsible for a Milestone', '<p>Hi There,&nbsp;</p>\r\n\r\n<p>You are a responsible&nbsp;for a project milestone&nbsp;<strong>{MILESTONE_NAME}</strong>&nbsp; assigned to you by <strong>{ASSIGNED_BY}</strong> in project <strong>{PROJECT_NAME}</strong>.</p>\r\n\r\n<p>You can view this Milestone&nbsp;by logging in to the portal using the link below:<br />\r\n<big><strong><a href=\"{PROJECT_URL}\">View Project</a></strong></big><br />\r\n<br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 20:39:46'),
(34, 'task_assigned', 'Task assigned', '<p>Hi there,</p>\r\n\r\n<p>A new task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p>\r\n\r\n<p>You can view this task by logging in to the portal using the link below.</p>\r\n\r\n<p><br />\r\n<big><strong><a href=\"{TASK_URL}\">View Task</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 19:30:29'),
(35, 'tasks_comments', 'New Task Comment Received', '<p>Hi There,</p>\r\n\r\n<p>A new comment has been posted by <strong>{POSTED_BY}</strong> to <strong>{TASK_NAME}</strong>.</p>\r\n\r\n<p>You can view the comment using the link below:<br />\r\n<big><strong><a href=\"{COMMENT_URL}\">View Comment</a></strong></big><br />\r\n<br />\r\n<em>{COMMENT_MESSAGE}</em><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 19:38:00'),
(36, 'tasks_attachment', 'New Tasks Attachment', '<p>Hi There,</p>\r\n\r\n<p>A new file has been uploaded by <strong>{UPLOADED_BY} </strong>to Task <strong>{TASK_NAME}</strong>.<br />\r\nYou can view the Task&nbsp;using the link below:</p>\r\n\r\n<p><br />\r\n<big><a href=\"{TASK_URL}\"><strong>View Task</strong></a></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 19:39:20'),
(37, 'tasks_updated', 'Task updated', '<p>Hi there,</p>\r\n\r\n<p><strong>{TASK_NAME}</strong> has been updated by <strong>{ASSIGNED_BY}</strong>.</p>\r\n\r\n<p>You can view this Task by logging in to the portal using the link below.</p>\r\n\r\n<p><br />\r\n<big><strong><a href=\"{TASK_URL}\">View Task</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 19:39:53'),
(38, 'goal_not_achieve', 'Not Achieve Goal', '<p><strong>Unfortunately!</strong> We failed to achieve goal!</p>\r\n\r\n<p><strong>Here is a Goal Details</strong></p>\r\n\r\n<p>Goal Type :&nbsp;<strong>{Goal_Type}</strong><br />\r\nTarget Achievement:&nbsp;<strong>{achievement}</strong><br />\r\nTotal Achievement:&nbsp;<strong>{total_achievement}</strong><br />\r\nStart Date:&nbsp;<strong>{start_date}</strong><br />\r\nEnd Date:&nbsp;<strong>{End_date}</strong><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 22:50:01'),
(39, 'goal_achieve', 'Achieve Goal', '<p><strong>Congratulation!</strong> We achieved new goal.</p>\r\n\r\n<p><strong>Here is a Goal Details</strong></p>\r\n\r\n<p>Goal Type :<strong>{Goal_Type}</strong><br />\r\nTarget Achievement:<strong>{achievement}</strong><br />\r\nTotal Achievement:<strong>{total_achievement}</strong><br />\r\nStart Date:<strong>{start_date}</strong><br />\r\nEnd Date:<strong>{End_date}</strong><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 22:49:19'),
(40, 'leave_request_email', 'Leave Request', '<p>Hi there,</p>\r\n\r\n<p><strong>{NAME}</strong> &nbsp;Want a leave request from you.</p>\r\n\r\n<p>Leave Type:&nbsp;&nbsp;<strong>{LEAVE_CATEGORY}</strong></p>\r\n\r\n<p>Duration:&nbsp;&nbsp;<strong>{START_DATE}</strong>&nbsp;to&nbsp;<strong>{END_DATE}</strong></p>\r\n\r\n<p>Reason:&nbsp;&nbsp;<strong>{REASON}</strong></p>\r\n\r\n<p>You can view this leave request by logging in to the portal using the link below<br />\r\n<big><strong><a href=\"{APPLICATION_LINK}\">View Application</a></strong></big><br />\r\n<br />\r\n<br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 21:45:27'),
(41, 'leave_approve_email', 'Your leave request has been approved', '<h1>Your leave request has been approved</h1>\r\n\r\n<p>Name :&nbsp;<strong>{FULLNAME}</strong>&nbsp;</p>\r\n\r\n<p>Leave Type:&nbsp; <strong>{LEAVE_CATEGORY}</strong></p>\r\n\r\n<p>Duration:&nbsp;&nbsp;<strong>{START_DATE}</strong>&nbsp;to&nbsp;<strong>{END_DATE}</strong></p>\r\n\r\n<p>Reason:&nbsp;&nbsp;<strong>{REASON}</strong></p>\r\n\r\n<p>Status:&nbsp; <strong>Approved</strong>&nbsp;</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 21:46:26'),
(42, 'leave_reject_email', 'Your leave request has been Rejected', '<h1>Your leave request has been Rejected</h1>\r\n\r\n<p><strong>Unfortunately! {FULLNAME}</strong>&nbsp;Your leave request &nbsp;</p>\r\n\r\n<p>Leave Type:&nbsp;&nbsp;<strong>{LEAVE_CATEGORY}</strong></p>\r\n\r\n<p>Duration:&nbsp;&nbsp;<strong>{START_DATE}</strong>&nbsp;to&nbsp;<strong>{END_DATE}</strong></p>\r\n\r\n<p>Reason:&nbsp;&nbsp;<strong>{REASON}</strong></p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:47:07'),
(43, 'overtime_request_email', 'Overtime Request', '<p>Hi there,</p>\r\n\r\n<p><strong>{NAME}</strong>&nbsp;&nbsp;to do an overtime.<br />\r\n<br />\r\n<br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:49:12'),
(44, 'overtime_approved_email', 'Your overtime request has been approved', '<h1>Your OverTime request has been approved</h1>\r\n\r\n<p><strong>Congratulations!</strong>&nbsp;Your overtime&nbsp;request at&nbsp;<strong>{DATE}</strong>&nbsp;and&nbsp;<strong>{HOUR}</strong>&nbsp;has been approved by your company management.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:50:14'),
(45, 'overtime_reject_email', 'Your Overtime request has been Rejected', '<h1>Your OverTime request has been Rejected</h1>\r\n\r\n<p><strong>Unfortunately&nbsp;!</strong>&nbsp;Your overtime&nbsp;request at&nbsp;<strong>{DATE}</strong>&nbsp;and&nbsp;<strong>{HOUR}</strong>&nbsp;has been Rejected by your company management.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:50:59'),
(46, 'wellcome_email', 'Welcome Email', '<p>Hello <strong>{NAME}</strong>,</p>\r\n\r\n<p>Welcome to <strong>{COMPANY_NAME}</strong> .Thanks for joining <strong>{COMPANY_NAME}</strong>.</p>\r\n\r\n<p>We just wanted to say welcome.</p>\r\n\r\n<p>Please contact us if you need any help.</p>\r\n\r\n<p>Click here to view your profile: <strong>{COMPANY_URL}</strong></p>\r\n\r\n<p><br />\r\nHave fun!<br />\r\nThe <strong>{COMPANY_NAME}</strong> Team.</p>', NULL, '2021-02-13 03:25:40'),
(47, 'payslip_generated_email', 'Payslip generated', '<p>Hello&nbsp;<strong>{NAME}</strong>,</p>\r\n\r\n<p>Your payslip generated for the month <strong>{MONTH_YEAR} .</strong></p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:52:22'),
(48, 'advance_salary_email', 'Advance Salary Reqeust', '<p>Hi there,</p>\r\n\r\n<p><strong>{NAME}</strong>&nbsp;&nbsp;Want to Advance Salary from you.</p>\r\n\r\n<p>You can view this Advance Salary by logging in to the portal using the link below.<br />\r\n<br />\r\n<big><strong><a href=\"{LINK}\">View Advance Salary</a></strong></big><br />\r\n<br />\r\n<br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:54:10'),
(49, 'advance_salary_approve_email', 'Your advance salary request has been approved', '<h1>Your advance salary request has been approved</h1>\r\n\r\n<p><strong>Congratulations!</strong>&nbsp;Your advance salary&nbsp;requested &nbsp;<strong>{AMOUNT}</strong>&nbsp;has been approved by your company management.</p>\r\n\r\n<p>This advance amount will deduct the next <strong>{DEDUCT_MOTNH}</strong> .</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:55:09'),
(50, 'advance_salary_reject_email', 'Your advance salary request has been Rejected', '<h1>Your advance salary request has been Rejected</h1>\r\n\r\n<p><strong>Unfortunately !</strong>&nbsp;Your advance salary requested&nbsp;<strong>{AMOUNT}</strong>&nbsp;has been Rejected by your company management.</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:56:10'),
(51, 'award_email', 'Award Received', '<p>Hello&nbsp;<strong>{NAME}</strong>,&nbsp;</p>\r\n\r\n<p>You have been&nbsp;awarded <strong>{AWARD_NAME} </strong>for this<strong> {MONTH} .&nbsp;</strong></p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:57:07'),
(52, 'new_job_application_email', 'New job application submitted', '<p>Hi there,</p>\r\n\r\n<p>&nbsp;<strong>{NAME}&nbsp;</strong>has submitted the job application</p>\r\n\r\n<p>Please find below are job application Details:</p>\r\n\r\n<table cellpadding=\"8\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Job Title</td>\r\n			<td><strong>{JOB_TITLE}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Email</td>\r\n			<td><strong>{EMAIL}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mobile</td>\r\n			<td><strong>{MOBILE}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cover Latter</td>\r\n			<td><strong>{COVER_LETTER}</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\nYou can view the Job Application online at:<br />\r\n<br />\r\n<big><strong><a href=\"{LINK}\">View Job Application</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 21:58:15'),
(53, 'new_notice_published', 'New Notice published', '<p>Hello&nbsp;<strong>{NAME}</strong>,</p>\r\n\r\n<p>New Notice Published&nbsp;<strong>{TITLE}</strong></p>\r\n\r\n<p><br />\r\nYou can view the Notice online at:<br />\r\n<br />\r\n<big><strong><a href=\"{LINK}\">View Notice</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 22:05:44'),
(54, 'new_training_email', 'Training  Assigned', '<p>Hi there,</p>\r\n\r\n<p>A new Training &nbsp;<strong>{TRAINING_NAME}</strong>&nbsp;&nbsp;has been assigned to you by&nbsp;<strong>{ASSIGNED_BY}</strong>.</p>\r\n\r\n<p>You can view this Training by logging in to the portal using the link below.</p>\r\n\r\n<p><br />\r\n<big><strong><a href=\"{LINK}\">View Training</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 22:07:20'),
(55, 'performance_appraisal_email', 'New Performance Appraisal', '', NULL, NULL),
(56, 'expense_request_email', 'PettyCash Request', '<p>Hi there,</p>\r\n\r\n<p><strong>{NAME}</strong> &nbsp;Requested Pettycash and the requested amount is&nbsp;<strong>{AMOUNT}</strong></p>\r\n\r\n<p>You can view this request&nbsp;by logging into the portal using the link below.<br />\r\n<br />\r\n<big><strong><a href=\"{URL}\">View Expense</a></strong></big><br />\r\n<br />\r\n<br />\r\nRegards,<br />\r\n<br />\r\nThe <strong>{SITE_NAME}</strong> Team</p>', NULL, '2021-02-13 22:13:47'),
(57, 'expense_approved_email', 'Expense Approved', '<p>Dear&nbsp;<strong>{NAME} ,</strong></p>\r\n\r\n<h1>Your Expense request has been approved</h1>\r\n\r\n<p><strong>Congratulations!</strong>&nbsp;Your Expense request from&nbsp;<strong>{AMOUNT}</strong>&nbsp;has been approved by your company management.</p>\r\n\r\n<p>Please Contact&nbsp;with our Accountant for collect the amount.</p>\r\n\r\n<p><br />\r\nRegards,<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 22:15:41'),
(58, 'expense_paid_email', 'Expense have been Paid', '<p>Hi there,</p>\r\n\r\n<p>The&nbsp;<strong>{NAME}</strong>&nbsp;expense&nbsp;<strong>{AMOUNT}&nbsp;</strong>has been paid by <strong>{PAID_BY}.</strong></p>\r\n\r\n<p>You can view this expense by logging in to the portal using the link below.<br />\r\n<br />\r\n<big><strong><a href=\"{URL}\">View Expense</a></strong></big><br />\r\n<br />\r\n<br />\r\nRegards,<br />\r\n<br />\r\nThe&nbsp;<strong>{SITE_NAME}</strong>&nbsp;Team</p>', NULL, '2021-02-13 22:18:16'),
(59, 'auto_close_ticket', 'Ticket Auto Closed', '<p>Ticket Closed</p>\r\n\r\n<p>Hello <strong>{REPORTER_EMAIL}</strong>,</p>\r\n\r\n<p>Ticket&nbsp;<strong>{SUBJECT}</strong>&nbsp;has been auto closed due to inactivity.&nbsp;<br />\r\n<br />\r\nTicket # <strong>{TICKET_CODE}</strong><br />\r\nStatus : &nbsp;<strong>{TICKET_STATUS}</strong><br />\r\n<br />\r\nTo see the responses or open the ticket, click on the link below:<br />\r\n<br />\r\n<big><strong><a href=\"{TICKET_LINK}\">View Ticket</a></strong></big><br />\r\n<br />\r\nRegards<br />\r\n<br />\r\nThe <strong>{SITE_NAME}</strong> Team</p>', NULL, '2021-02-13 20:59:56'),
(60, 'proposal_email', 'New Proposal', '<p>Proposal <strong>{PROPOSAL_REF}</strong></p>\r\n\r\n<p>Hi <strong>{CLIENT}</strong></p>\r\n\r\n<p>Thanks for your business inquiry.</p>\r\n\r\n<p>The Proposal <strong>{PROPOSAL_REF} </strong>is attached with this email.<br />\r\nProposal&nbsp;Overview:<br />\r\nProposal&nbsp;# :<strong> {PROPOSAL_REF}</strong><br />\r\nAmount: <strong>{CURRENCY} {AMOUNT}</strong><br />\r\n<br />\r\nYou can view the estimate online at:<br />\r\n<big><strong><a href=\"{PROPOSAL_LINK}\">View Proposal</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe <strong>{SITE_NAME}</strong> Team</p>', NULL, '2021-02-13 22:45:21'),
(61, 'project_overdue_email', 'Project Overdue Notice', '<p>Project Overdue</p>\r\n\r\n<p><strong>Hello {CLIENT}</strong></p>\r\n\r\n<p>This is the notice that your project overdue.&nbsp;<br />\r\n<br />\r\nProject name : <strong>{PROJECT_NAME}</strong><br />\r\nDue date : <strong>{DUE_DATE}</strong><br />\r\nYou can login to see the status of your project by using this link:<br />\r\n<big><a href=\"{PROJECT_LINK}\"><strong>View Project</strong></a></big></p>\r\n\r\n<p><br />\r\nBest Regards<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-02-13 20:41:50'),
(62, 'estimate_overdue_email', 'Estimate Overdue Notice', '<p>Estimate {ESTIMATE_REF}</p>\r\n\r\n<p>Hi {CLIENT}</p>\r\n\r\n<p>This is the notice that your Estimate&nbsp;overdue.<br />\r\n<br />\r\nEstimate Overview:<br />\r\nEstimate # : {ESTIMATE_REF}<br />\r\nAmount: {DUE_DATE}<br />\r\nAmount: {CURRENCY} {AMOUNT}<br />\r\n<br />\r\nYou can view the estimate online at:<br />\r\n<big><strong><a href=\"{ESTIMATE_LINK}\">View Estimate</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe {SITE_NAME} Team</p>', NULL, '2021-02-13 22:44:16'),
(63, 'proposal_overdue_email', 'Proposal overdue', '<p>Proposal&nbsp;<strong>{PROPOSAL_REF}</strong></p>\r\n\r\n<p>Hi&nbsp;<strong>{CLIENT}</strong></p>\r\n\r\n<p>This is the notice that your Proposal&nbsp;overdue.&nbsp;<br />\r\n<br />\r\nProposal&nbsp;Overview:<br />\r\nProposal&nbsp;# :<strong>&nbsp;{PROPOSAL_REF}</strong><br />\r\nDue Date: <strong>{DUE_DATE}</strong>&Atilde;&cent;&acirc;&sbquo;&not;&acirc;&euro;&sup1;<br />\r\nAmount:&nbsp;<strong>{CURRENCY} {AMOUNT}</strong><br />\r\n<br />\r\nYou can view the estimate online at:<br />\r\n<big><strong><a href=\"{PROPOSAL_LINK}\">View Proposal</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe&nbsp;<strong>{SITE_NAME}</strong>&nbsp;Team</p>', NULL, '2021-02-13 22:46:38'),
(64, 'call_for_interview', 'You have an interview Appointment!', '<p>Hello&nbsp;<strong>{NAME}</strong>,</p>\r\n\r\n<p>You have an interview offer for you.please see the details.&nbsp;<br />\r\n<br />\r\n<strong>Job Summary</strong>:<br />\r\nJob Title # :<strong>&nbsp;{JOB_TITLE}</strong><br />\r\nDesignation # :<strong>&nbsp;{DESIGNATION}</strong><br />\r\nInterview Date: <strong>{DATE}</strong></p>\r\n\r\n<p><strong>Postal Address</strong></p>\r\n\r\n<p>PO Box 11762&nbsp;<br />\r\n<samp><tt>8th Sector</tt></samp></p>\r\n\r\n<p><samp><tt>Building 10&nbsp;Block 11</tt></samp></p>\r\n\r\n<p><samp><tt>Nasr City - Cairo, Egypt &ndash;&nbsp;<a href=\"https://goo.gl/maps/Kb6xXvwUh2R15fKw8\" target=\"_blank\">Map</a></tt></samp></p>\r\n\r\n<p>Phone Number: 01555836995</p>\r\n\r\n<p>Alt: 01016297228<br />\r\nYou can view the circular details online at:<br />\r\n<big><strong><a href=\"{LINK}\">View Job Circular</a></strong></big><br />\r\n<br />\r\nBest Regards,<br />\r\nThe&nbsp;<strong>{SITE_NAME}</strong>&nbsp;Team</p>', NULL, '2021-02-13 21:59:23'),
(65, 'ticket_reopened_email', 'Ticket [SUBJECT] reopened', '<p>Ticket re-opened</p>\r\n\r\n<p>Hi {RECIPIENT},</p>\r\n\r\n<p>Ticket&nbsp;<strong>{SUBJECT}</strong>&nbsp;was re-opened by&nbsp;<strong>{USER}</strong>.<br />\r\nStatus :&nbsp;Open<br />\r\nClick on the below link to see the ticket details and post replies:&nbsp;<br />\r\n<a href=\"{TICKET_LINK}\"><strong>View Ticket</strong></a><br />\r\n<br />\r\n<br />\r\nBest Regards,<br />\r\n{SITE_NAME}</p>', NULL, '2021-02-13 21:01:44'),
(66, 'waiting_approval_proposal', 'Proposal need approval | PMS', '<p>Hi Mr: {RECIPIENT},</p>\r\n\r\n<p>You have an awaiting proposal that needs your approval.</p>\r\n\r\n<p>Subject :&nbsp;<strong>{SUBJECT}</strong>&nbsp;&nbsp;.</p>\r\n\r\n<p>Proposal Date :&nbsp;<strong>{PRO_DATE}</strong>&nbsp;&nbsp;.</p>\r\n\r\n<p>Refrence Number&nbsp;:&nbsp;<strong>{REFNO}</strong>&nbsp;&nbsp;.</p>\r\n\r\n<p>Client Name&nbsp;:&nbsp;<strong>{CLIENTNAME}</strong>&nbsp;&nbsp;.</p>\r\n\r\n<p>Click on the below link to see the proposal details:&nbsp;<br />\r\n<a href=\"{PROPOSAL_LINK}\"><strong>View Proposal</strong></a><br />\r\n<br />\r\nBest Regards,<br />\r\n{SITE_NAME} Team</p>', NULL, '2021-02-13 22:55:09'),
(67, 'pettycash_approve_email', 'Your Pettycash request has been approved', '<h1>Your pettycash request has been approved</h1>\r\n\r\n<p><strong>Congratulations!</strong> Your Pettycash request at <strong>{DATE}</strong>  has been approved by your company management.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL),
(68, 'pettycash_reject_email', 'Your pettycash request has been Rejected', '<h1>Your pettycash request has been Rejected</h1>\r\n\r\n<p><strong>Unfortunately !</strong>&nbsp;Your pettycash\r\n request from&nbsp;<strong>{DATE}</strong> has been Rejected by your company management.</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>\r\n', NULL, NULL),
(70, 'settlement_request_email', 'settlement notice ', '<p>Hi there,</p>\r\n\r\n<p><strong>{NAME}</strong>  Paid cash  amount  <strong>{AMOUNT}</strong></p>\r\n\r\n<p>You can view this request by logging into the portal using the link below.<br>\r\n<br>\r\n<big><strong><a href=\"{URL}\">View Expense</a></strong></big><br>\r\n<br>\r\n<br>\r\nRegards,<br>\r\n<br>\r\nThe <strong>{SITE_NAME}</strong> Team</p>\r\n', NULL, NULL),
(71, 'settlement_approve_email', 'Your Settlement request has been approved', '<h1>Your Settlement request has been approved</h1>\r\n\r\n<p><strong>Congratulations!</strong> Your Settlement request at <strong>{DATE}</strong>  has been approved by your company management.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL),
(72, 'settlement_reject_email', 'Your Settlement request has been Rejected', '<h1>Your Settlement request has been Rejected</h1>\r\n\r\n<p><strong>Unfortunately !</strong>&nbsp;Your Settlement\r\n request from&nbsp;<strong>{DATE}</strong> has been Rejected by your company management.</p>\r\n\r\n<p><br />\r\nRegards<br />\r\n<br />\r\nThe {SITE_NAME} Team</p>\r\n', NULL, NULL),
(73, 'interview_feedback_accept', 'Interview Feedback', '<p>Dear&nbsp;<strong>{NAME}</strong>,</p>\r\n\r\n<p>Thank you very much for meeting with us to talk about the open <strong>{JOB_TITLE}</strong>&nbsp;position. It was a pleasure getting to know you. We have finished conducting our interviews.</p>\r\n\r\n<p>On behalf of <strong>{SITE_NAME}</strong>, I am delighted to inform you that we have determined that you are the best candidate for this position.</p>\r\n\r\n<p>Expect a call from your direct manager to inform you of all details.</p>\r\n\r\n<p>I am looking forward to your response,<br />\r\n<strong>Job Summary</strong>:<br />\r\nJob Title # :<strong>&nbsp;{JOB_TITLE}</strong><br />\r\nDesignation # :<strong>&nbsp;{DESIGNATION}</strong></p>\r\n\r\n<p><br />\r\n<strong>Required Documents:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Bachelor&#39;s degree certificate.</strong></li>\r\n	<li><strong>Military Status document (For Men Only)</strong></li>\r\n	<li><strong>Birth-Date document.</strong></li>\r\n	<li><strong>Copy of National ID.</strong></li>\r\n	<li><strong>Criminal Case Document</strong></li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nBest Regards,<br />\r\nThe&nbsp;<strong>{SITE_NAME}</strong>&nbsp;Team</p>', NULL, '2021-02-13 22:01:35'),
(74, 'interview_feedback_reject', 'Interview Feedback', '<p>Dear&nbsp;<strong>{NAME}</strong>,&nbsp;</p>\r\n\r\n<p>We appreciate your interest in <strong>{SITE_NAME}</strong> and the time you&rsquo;ve invested in applying for the <strong>{JOB_TITLE}</strong>&nbsp;opening.</p>\r\n\r\n<p>We ended up moving forward with another candidate, but we&rsquo;d like to thank you for talking to our team and giving us the opportunity to learn about your skills and&nbsp;accomplishments.</p>\r\n\r\n<p>We will be advertising more positions in the coming months. We hope you&rsquo;ll keep us in mind and we encourage you to apply&nbsp;again.</p>\r\n\r\n<p>We wish you good luck with your job search and professional future&nbsp;endeavors.</p>\r\n\r\n<p><strong>Job Summary</strong>:<br />\r\nJob Title # :<strong>&nbsp;{JOB_TITLE}</strong><br />\r\nDesignation # :<strong>&nbsp;{DESIGNATION}</strong></p>\r\n\r\n<p>Best Regards,<br />\r\nThe&nbsp;<strong>{SITE_NAME}</strong>&nbsp;Team</p>', NULL, '2021-02-13 22:04:45'),
(75, 'deposit_email', 'Deposite Email', '<p><span style=\"color:#1abc9c\">Deposite test email</span></p>', NULL, '2021-02-13 22:11:48'),
(76, 'trying_clock_email', 'Trying Clockin Email', '<p>Put Template here</p>', NULL, '2021-02-13 22:20:52'),
(77, 'clock_in_email', 'Clockin Email', '<p>template here</p>', NULL, '2021-02-13 22:26:00'),
(78, 'clock_out_email', 'Clockout Email', '<p>Template</p>', NULL, '2021-02-13 22:27:48');

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
  `ban_reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_password_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_password_requested` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `online_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `employee_requests`
--

CREATE TABLE `employee_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` date DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `day_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'day',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending, approved, rejected',
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` enum('survey','client_meeting') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avg_rate` double(8,2) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_rating_evaluation`
--

CREATE TABLE `evaluation_rating_evaluation` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating_evaluation_id` int(10) UNSIGNED DEFAULT NULL,
  `evaluation_id` int(10) UNSIGNED DEFAULT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('paid','non_approved','unpaid') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expense_category_id` int(10) UNSIGNED DEFAULT NULL,
  `paid_by_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL
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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_results`
--

CREATE TABLE `final_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ceo_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Lost','Won','Pending') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_status` enum('in progress','meeting','Un Successful') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint_attendances`
--

CREATE TABLE `fingerprint_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hourly_rates`
--

CREATE TABLE `hourly_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `hourly_grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hourly_rate` int(11) NOT NULL,
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
  `recur_start_date` date DEFAULT NULL,
  `recur_end_date` date DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `alert_overdue` int(11) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(15,2) DEFAULT NULL,
  `total_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `after_discount` double DEFAULT NULL,
  `before_discount` double DEFAULT NULL,
  `discount_total` double DEFAULT NULL,
  `adjustment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recurring` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recurring_frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recur_frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recur_next_date` date DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'EGP',
  `status` enum('cancelled','unpaid','paid','draft','partially_paid','waiting_approval','approved','rejected') COLLATE utf8mb4_unicode_ci DEFAULT 'waiting_approval',
  `archived` int(11) DEFAULT NULL,
  `date_sent` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_taxs`
--

CREATE TABLE `invoice_item_taxs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_cost` decimal(15,2) DEFAULT NULL,
  `taxs_id` int(10) UNSIGNED DEFAULT NULL,
  `invoices_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_invoice_relations`
--

CREATE TABLE `item_invoice_relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double(15,2) DEFAULT NULL,
  `unit_cost` double(15,2) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `selling_price` decimal(15,2) DEFAULT NULL,
  `total_cost_price` decimal(15,2) NOT NULL,
  `tax_rate` double(15,2) DEFAULT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_total` decimal(15,2) DEFAULT NULL,
  `tax_cost` decimal(15,2) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoices_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_porposal_relations`
--

CREATE TABLE `item_porposal_relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double(15,2) DEFAULT NULL,
  `unit_cost` double(15,2) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `selling_price` decimal(15,2) DEFAULT NULL,
  `total_cost_price` decimal(15,2) NOT NULL,
  `tax_rate` double(15,2) DEFAULT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_total` decimal(15,2) DEFAULT NULL,
  `tax_cost` decimal(15,2) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposals_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_purchase`
--

CREATE TABLE `item_purchase` (
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `purchase_id` int(10) UNSIGNED DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_purchase_tax`
--

CREATE TABLE `item_purchase_tax` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED DEFAULT NULL
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
  `cover_letter` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `apply_date` date DEFAULT NULL,
  `send_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `job_circular_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kb_categories`
--

CREATE TABLE `kb_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `icon`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'arabic', 'ae', '', NULL, NULL),
(2, 'cs', 'czech', 'cs', '', NULL, NULL),
(3, 'da', 'danish', 'dk', '', NULL, NULL),
(4, 'de', 'german', 'de', '', NULL, NULL),
(5, 'el', 'greek', 'gr', '', NULL, NULL),
(6, 'en', 'english', 'us', '0', NULL, NULL),
(7, 'es', 'spanish', 'es', '', NULL, NULL),
(8, 'fr', 'french', 'fr', '', NULL, NULL),
(9, 'gu', 'gujarati', 'in', '', NULL, NULL),
(10, 'hi', 'hindi', 'in', '', NULL, NULL),
(11, 'id', 'indonesian', 'id', '', NULL, NULL),
(12, 'it', 'italian', 'it', '', NULL, NULL),
(13, 'ja', 'japanese', 'jp', '', NULL, NULL),
(14, 'nl', 'dutch', 'nl', '', NULL, NULL),
(15, 'no', 'norwegian', 'no', '', NULL, NULL),
(16, 'pl', 'polish', 'pl', '', NULL, NULL),
(17, 'pt', 'portuguese', 'pt', '', NULL, NULL),
(18, 'ro', 'romanian', 'ro', '', NULL, NULL),
(19, 'ru', 'russian', 'ru', '', NULL, NULL),
(20, 'tr', 'turkish', 'tr', '', NULL, NULL),
(21, 'vi', 'vietnamese', 'vn', '', NULL, NULL),
(22, 'zh', 'chinese', 'cn', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id_on_pms` int(11) DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `way_of_communication` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacted_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_call_done` tinyint(1) DEFAULT NULL,
  `second_call_done` tinyint(1) DEFAULT NULL,
  `priority` enum('URGENT','NORMAL','LOW','VIP') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contracted` enum('Busy','Call Later','No Answer','Not Interested','Out Of Service','Product Not Available','Switched OFF','Undefined','Whatsapp','Wrong Number','YES - INTERESTED','YES - Not Qualified') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_call_result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `second_call_result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_users`
--

CREATE TABLE `lead_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_start_date` date NOT NULL,
  `leave_end_date` date DEFAULT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `view_status` int(11) DEFAULT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `deduct` enum('no','yes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `leave_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_categories`
--

CREATE TABLE `leave_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_quota` int(11) DEFAULT NULL,
  `deducted_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `annual_monthly` double(8,2) NOT NULL DEFAULT 0.00 COMMENT 'annually=1 monthly=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_categories`
--

INSERT INTO `leave_categories` (`id`, `name`, `leave_quota`, `deducted_amount`, `annual_monthly`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Emergency Leave', 7, 0.00, 0.00, NULL, NULL, NULL),
(2, 'Annual Leave', 21, 0.00, 0.00, NULL, NULL, NULL),
(3, 'Sick Leave', 3, 0.00, 0.00, NULL, NULL, NULL),
(4, 'Haj Leave', 20, 0.00, 0.00, NULL, NULL, NULL),
(5, 'Umrah Leave', 10, 0.00, 0.00, NULL, NULL, NULL),
(6, 'Maternity Leave', 45, 0.00, 0.00, NULL, NULL, NULL),
(7, 'Marriage Leave', 15, 0.00, 0.00, NULL, NULL, NULL),
(8, 'Working From Home', 2, 0.00, 0.00, NULL, NULL, NULL),
(9, 'Leave Early', 2, 0.00, 0.00, NULL, NULL, NULL),
(10, 'Clock in late', 0, 0.50, 0.00, NULL, NULL, NULL),
(11, 'Client Meeting', 15, 0.00, 0.00, NULL, NULL, NULL),
(12, 'Survey', 30, 0.00, 0.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE `locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`id`, `locale`, `code`, `language`, `name`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aa_DJ', 'aa', 'afar', 'Afar (Djibouti)', 'dj', NULL, NULL, NULL),
(2, 'aa_ER', 'aa', 'afar', 'Afar (Eritrea)', 'dj', NULL, NULL, NULL),
(3, 'aa_ET', 'aa', 'afar', 'Afar (Ethiopia)', 'dj', NULL, NULL, NULL),
(4, 'af_ZA', 'af', 'afrikaans', 'Afrikaans (South Africa)', 'za', NULL, NULL, NULL),
(5, 'am_ET', 'am', 'amharic', 'Amharic (Ethiopia)', 'et', NULL, NULL, NULL),
(6, 'an_ES', 'an', 'aragonese', 'Aragonese (Spain)', 'es', NULL, NULL, NULL),
(7, 'ar_AE', 'ar', 'arabic', 'Arabic (United Arab Emirates)', 'es', NULL, NULL, NULL),
(8, 'ar_BH', 'ar', 'arabic', 'Arabic (Bahrain)', NULL, NULL, NULL, NULL),
(9, 'ar_DZ', 'ar', 'arabic', 'Arabic (Algeria)', NULL, NULL, NULL, NULL),
(10, 'ar_EG', 'ar', 'arabic', 'Arabic (Egypt)', NULL, NULL, NULL, NULL),
(11, 'ar_IN', 'ar', 'arabic', 'Arabic (India)', NULL, NULL, NULL, NULL),
(12, 'ar_IQ', 'ar', 'arabic', 'Arabic (Iraq)', NULL, NULL, NULL, NULL),
(13, 'ar_JO', 'ar', 'arabic', 'Arabic (Jordan)', NULL, NULL, NULL, NULL),
(14, 'ar_KW', 'ar', 'arabic', 'Arabic (Kuwait)', NULL, NULL, NULL, NULL),
(15, 'ar_LB', 'ar', 'arabic', 'Arabic (Lebanon)', NULL, NULL, NULL, NULL),
(16, 'ar_LY', 'ar', 'arabic', 'Arabic (Libya)', NULL, NULL, NULL, NULL),
(17, 'ar_MA', 'ar', 'arabic', 'Arabic (Morocco)', NULL, NULL, NULL, NULL),
(18, 'ar_OM', 'ar', 'arabic', 'Arabic (Oman)', NULL, NULL, NULL, NULL),
(19, 'ar_QA', 'ar', 'arabic', 'Arabic (Qatar)', NULL, NULL, NULL, NULL),
(20, 'ar_SA', 'ar', 'arabic', 'Arabic (Saudi Arabia)', NULL, NULL, NULL, NULL),
(21, 'ar_SD', 'ar', 'arabic', 'Arabic (Sudan)', NULL, NULL, NULL, NULL),
(22, 'ar_SY', 'ar', 'arabic', 'Arabic (Syria)', NULL, NULL, NULL, NULL),
(23, 'ar_TN', 'ar', 'arabic', 'Arabic (Tunisia)', NULL, NULL, NULL, NULL),
(24, 'ar_YE', 'ar', 'arabic', 'Arabic (Yemen)', NULL, NULL, NULL, NULL),
(25, 'ast_ES', 'ast', 'asturian', 'Asturian (Spain)', NULL, NULL, NULL, NULL),
(26, 'as_IN', 'as', 'assamese', 'Assamese (India)', NULL, NULL, NULL, NULL),
(27, 'az_AZ', 'az', 'azerbaijani', 'Azerbaijani (Azerbaijan)', NULL, NULL, NULL, NULL),
(28, 'az_TR', 'az', 'azerbaijani', 'Azerbaijani (Turkey)', NULL, NULL, NULL, NULL),
(29, 'bem_ZM', 'bem', 'bemba', 'Bemba (Zambia)', NULL, NULL, NULL, NULL),
(30, 'ber_DZ', 'ber', 'berber', 'Berber (Algeria)', NULL, NULL, NULL, NULL),
(31, 'ber_MA', 'ber', 'berber', 'Berber (Morocco)', NULL, NULL, NULL, NULL),
(32, 'be_BY', 'be', 'belarusian', 'Belarusian (Belarus)', NULL, NULL, NULL, NULL),
(33, 'bg_BG', 'bg', 'bulgarian', 'Bulgarian (Bulgaria)', NULL, NULL, NULL, NULL),
(34, 'bn_BD', 'bn', 'bengali', 'Bengali (Bangladesh)', NULL, NULL, NULL, NULL),
(35, 'bn_IN', 'bn', 'bengali', 'Bengali (India)', NULL, NULL, NULL, NULL),
(36, 'bo_CN', 'bo', 'tibetan', 'Tibetan (China)', NULL, NULL, NULL, NULL),
(37, 'bo_IN', 'bo', 'tibetan', 'Tibetan (India)', NULL, NULL, NULL, NULL),
(38, 'br_FR', 'br', 'breton', 'Breton (France)', NULL, NULL, NULL, NULL),
(39, 'bs_BA', 'bs', 'bosnian', 'Bosnian (Bosnia and Herzegovina)', NULL, NULL, NULL, NULL),
(40, 'byn_ER', 'byn', 'blin', 'Blin (Eritrea)', NULL, NULL, NULL, NULL),
(41, 'ca_AD', 'ca', 'catalan', 'Catalan (Andorra)', NULL, NULL, NULL, NULL),
(42, 'ca_ES', 'ca', 'catalan', 'Catalan (Spain)', NULL, NULL, NULL, NULL),
(43, 'ca_FR', 'ca', 'catalan', 'Catalan (France)', NULL, NULL, NULL, NULL),
(44, 'ca_IT', 'ca', 'catalan', 'Catalan (Italy)', NULL, NULL, NULL, NULL),
(45, 'crh_UA', 'crh', 'crimean turkish', 'Crimean Turkish (Ukraine)', NULL, NULL, NULL, NULL),
(46, 'csb_PL', 'csb', 'kashubian', 'Kashubian (Poland)', NULL, NULL, NULL, NULL),
(47, 'cs_CZ', 'cs', 'czech', 'Czech (Czech Republic)', NULL, NULL, NULL, NULL),
(48, 'cv_RU', 'cv', 'chuvash', 'Chuvash (Russia)', NULL, NULL, NULL, NULL),
(49, 'cy_GB', 'cy', 'welsh', 'Welsh (United Kingdom)', NULL, NULL, NULL, NULL),
(50, 'da_DK', 'da', 'danish', 'Danish (Denmark)', NULL, NULL, NULL, NULL),
(51, 'de_AT', 'de', 'german', 'German (Austria)', NULL, NULL, NULL, NULL),
(52, 'de_BE', 'de', 'german', 'German (Belgium)', NULL, NULL, NULL, NULL),
(53, 'de_CH', 'de', 'german', 'German (Switzerland)', NULL, NULL, NULL, NULL),
(54, 'de_DE', 'de', 'german', 'German (Germany)', NULL, NULL, NULL, NULL),
(55, 'de_LI', 'de', 'german', 'German (Liechtenstein)', NULL, NULL, NULL, NULL),
(56, 'de_LU', 'de', 'german', 'German (Luxembourg)', NULL, NULL, NULL, NULL),
(57, 'dv_MV', 'dv', 'divehi', 'Divehi (Maldives)', NULL, NULL, NULL, NULL),
(58, 'dz_BT', 'dz', 'dzongkha', 'Dzongkha (Bhutan)', NULL, NULL, NULL, NULL),
(59, 'ee_GH', 'ee', 'ewe', 'Ewe (Ghana)', NULL, NULL, NULL, NULL),
(60, 'el_CY', 'el', 'greek', 'Greek (Cyprus)', NULL, NULL, NULL, NULL),
(61, 'el_GR', 'el', 'greek', 'Greek (Greece)', NULL, NULL, NULL, NULL),
(62, 'en_AG', 'en', 'english', 'English (Antigua and Barbuda)', NULL, NULL, NULL, NULL),
(63, 'en_AS', 'en', 'english', 'English (American Samoa)', NULL, NULL, NULL, NULL),
(64, 'en_AU', 'en', 'english', 'English (Australia)', NULL, NULL, NULL, NULL),
(65, 'en_BW', 'en', 'english', 'English (Botswana)', NULL, NULL, NULL, NULL),
(66, 'en_CA', 'en', 'english', 'English (Canada)', NULL, NULL, NULL, NULL),
(67, 'en_DK', 'en', 'english', 'English (Denmark)', NULL, NULL, NULL, NULL),
(68, 'en_GB', 'en', 'english', 'English (United Kingdom)', NULL, NULL, NULL, NULL),
(69, 'en_GU', 'en', 'english', 'English (Guam)', NULL, NULL, NULL, NULL),
(70, 'en_HK', 'en', 'english', 'English (Hong Kong SAR China)', NULL, NULL, NULL, NULL),
(71, 'en_IE', 'en', 'english', 'English (Ireland)', NULL, NULL, NULL, NULL),
(72, 'en_IN', 'en', 'english', 'English (India)', NULL, NULL, NULL, NULL),
(73, 'en_JM', 'en', 'english', 'English (Jamaica)', NULL, NULL, NULL, NULL),
(74, 'en_MH', 'en', 'english', 'English (Marshall Islands)', NULL, NULL, NULL, NULL),
(75, 'en_MP', 'en', 'english', 'English (Northern Mariana Islands)', NULL, NULL, NULL, NULL),
(76, 'en_MU', 'en', 'english', 'English (Mauritius)', NULL, NULL, NULL, NULL),
(77, 'en_NG', 'en', 'english', 'English (Nigeria)', NULL, NULL, NULL, NULL),
(78, 'en_NZ', 'en', 'english', 'English (New Zealand)', NULL, NULL, NULL, NULL),
(79, 'en_PH', 'en', 'english', 'English (Philippines)', NULL, NULL, NULL, NULL),
(80, 'en_SG', 'en', 'english', 'English (Singapore)', NULL, NULL, NULL, NULL),
(81, 'en_TT', 'en', 'english', 'English (Trinidad and Tobago)', NULL, NULL, NULL, NULL),
(82, 'en_US', 'en', 'english', 'English (United States)', NULL, NULL, NULL, NULL),
(83, 'en_VI', 'en', 'english', 'English (Virgin Islands)', NULL, NULL, NULL, NULL),
(84, 'en_ZA', 'en', 'english', 'English (South Africa)', NULL, NULL, NULL, NULL),
(85, 'en_ZM', 'en', 'english', 'English (Zambia)', NULL, NULL, NULL, NULL),
(86, 'en_ZW', 'en', 'english', 'English (Zimbabwe)', NULL, NULL, NULL, NULL),
(87, 'eo', 'eo', 'esperanto', 'Esperanto', NULL, NULL, NULL, NULL),
(88, 'es_AR', 'es', 'spanish', 'Spanish (Argentina)', NULL, NULL, NULL, NULL),
(89, 'es_BO', 'es', 'spanish', 'Spanish (Bolivia)', NULL, NULL, NULL, NULL),
(90, 'es_CL', 'es', 'spanish', 'Spanish (Chile)', NULL, NULL, NULL, NULL),
(91, 'es_CO', 'es', 'spanish', 'Spanish (Colombia)', NULL, NULL, NULL, NULL),
(92, 'es_CR', 'es', 'spanish', 'Spanish (Costa Rica)', NULL, NULL, NULL, NULL),
(93, 'es_DO', 'es', 'spanish', 'Spanish (Dominican Republic)', NULL, NULL, NULL, NULL),
(94, 'es_EC', 'es', 'spanish', 'Spanish (Ecuador)', NULL, NULL, NULL, NULL),
(95, 'es_ES', 'es', 'spanish', 'Spanish (Spain)', NULL, NULL, NULL, NULL),
(96, 'es_GT', 'es', 'spanish', 'Spanish (Guatemala)', NULL, NULL, NULL, NULL),
(97, 'es_HN', 'es', 'spanish', 'Spanish (Honduras)', NULL, NULL, NULL, NULL),
(98, 'es_MX', 'es', 'spanish', 'Spanish (Mexico)', NULL, NULL, NULL, NULL),
(99, 'es_NI', 'es', 'spanish', 'Spanish (Nicaragua)', NULL, NULL, NULL, NULL),
(100, 'es_PA', 'es', 'spanish', 'Spanish (Panama)', NULL, NULL, NULL, NULL),
(101, 'es_PE', 'es', 'spanish', 'Spanish (Peru)', NULL, NULL, NULL, NULL),
(102, 'es_PR', 'es', 'spanish', 'Spanish (Puerto Rico)', NULL, NULL, NULL, NULL),
(103, 'es_PY', 'es', 'spanish', 'Spanish (Paraguay)', NULL, NULL, NULL, NULL),
(104, 'es_SV', 'es', 'spanish', 'Spanish (El Salvador)', NULL, NULL, NULL, NULL),
(105, 'es_US', 'es', 'spanish', 'Spanish (United States)', NULL, NULL, NULL, NULL),
(106, 'es_UY', 'es', 'spanish', 'Spanish (Uruguay)', NULL, NULL, NULL, NULL),
(107, 'es_VE', 'es', 'spanish', 'Spanish (Venezuela)', NULL, NULL, NULL, NULL),
(108, 'et_EE', 'et', 'estonian', 'Estonian (Estonia)', NULL, NULL, NULL, NULL),
(109, 'eu_ES', 'eu', 'basque', 'Basque (Spain)', NULL, NULL, NULL, NULL),
(110, 'eu_FR', 'eu', 'basque', 'Basque (France)', NULL, NULL, NULL, NULL),
(111, 'fa_AF', 'fa', 'persian', 'Persian (Afghanistan)', NULL, NULL, NULL, NULL),
(112, 'fa_IR', 'fa', 'persian', 'Persian (Iran)', NULL, NULL, NULL, NULL),
(113, 'ff_SN', 'ff', 'fulah', 'Fulah (Senegal)', NULL, NULL, NULL, NULL),
(114, 'fil_PH', 'fil', 'filipino', 'Filipino (Philippines)', NULL, NULL, NULL, NULL),
(115, 'fi_FI', 'fi', 'finnish', 'Finnish (Finland)', NULL, NULL, NULL, NULL),
(116, 'fo_FO', 'fo', 'faroese', 'Faroese (Faroe Islands)', NULL, NULL, NULL, NULL),
(117, 'fr_BE', 'fr', 'french', 'French (Belgium)', NULL, NULL, NULL, NULL),
(118, 'fr_BF', 'fr', 'french', 'French (Burkina Faso)', NULL, NULL, NULL, NULL),
(119, 'fr_BI', 'fr', 'french', 'French (Burundi)', NULL, NULL, NULL, NULL),
(120, 'fr_BJ', 'fr', 'french', 'French (Benin)', NULL, NULL, NULL, NULL),
(121, 'fr_CA', 'fr', 'french', 'French (Canada)', NULL, NULL, NULL, NULL),
(122, 'fr_CF', 'fr', 'french', 'French (Central African Republic)', NULL, NULL, NULL, NULL),
(123, 'fr_CG', 'fr', 'french', 'French (Congo)', NULL, NULL, NULL, NULL),
(124, 'fr_CH', 'fr', 'french', 'French (Switzerland)', NULL, NULL, NULL, NULL),
(125, 'fr_CM', 'fr', 'french', 'French (Cameroon)', NULL, NULL, NULL, NULL),
(126, 'fr_FR', 'fr', 'french', 'French (France)', NULL, NULL, NULL, NULL),
(127, 'fr_GA', 'fr', 'french', 'French (Gabon)', NULL, NULL, NULL, NULL),
(128, 'fr_GN', 'fr', 'french', 'French (Guinea)', NULL, NULL, NULL, NULL),
(129, 'fr_GP', 'fr', 'french', 'French (Guadeloupe)', NULL, NULL, NULL, NULL),
(130, 'fr_GQ', 'fr', 'french', 'French (Equatorial Guinea)', NULL, NULL, NULL, NULL),
(131, 'fr_KM', 'fr', 'french', 'French (Comoros)', NULL, NULL, NULL, NULL),
(132, 'fr_LU', 'fr', 'french', 'French (Luxembourg)', NULL, NULL, NULL, NULL),
(133, 'fr_MC', 'fr', 'french', 'French (Monaco)', NULL, NULL, NULL, NULL),
(134, 'fr_MG', 'fr', 'french', 'French (Madagascar)', NULL, NULL, NULL, NULL),
(135, 'fr_ML', 'fr', 'french', 'French (Mali)', NULL, NULL, NULL, NULL),
(136, 'fr_MQ', 'fr', 'french', 'French (Martinique)', NULL, NULL, NULL, NULL),
(137, 'fr_NE', 'fr', 'french', 'French (Niger)', NULL, NULL, NULL, NULL),
(138, 'fr_SN', 'fr', 'french', 'French (Senegal)', NULL, NULL, NULL, NULL),
(139, 'fr_TD', 'fr', 'french', 'French (Chad)', NULL, NULL, NULL, NULL),
(140, 'fr_TG', 'fr', 'french', 'French (Togo)', NULL, NULL, NULL, NULL),
(141, 'fur_IT', 'fur', 'friulian', 'Friulian (Italy)', NULL, NULL, NULL, NULL),
(142, 'fy_DE', 'fy', 'western frisian', 'Western Frisian (Germany)', NULL, NULL, NULL, NULL),
(143, 'fy_NL', 'fy', 'western frisian', 'Western Frisian (Netherlands)', NULL, NULL, NULL, NULL),
(144, 'ga_IE', 'ga', 'irish', 'Irish (Ireland)', NULL, NULL, NULL, NULL),
(145, 'gd_GB', 'gd', 'scottish gaelic', 'Scottish Gaelic (United Kingdom)', NULL, NULL, NULL, NULL),
(146, 'gez_ER', 'gez', 'geez', 'Geez (Eritrea)', NULL, NULL, NULL, NULL),
(147, 'gez_ET', 'gez', 'geez', 'Geez (Ethiopia)', NULL, NULL, NULL, NULL),
(148, 'gl_ES', 'gl', 'galician', 'Galician (Spain)', NULL, NULL, NULL, NULL),
(149, 'gu_IN', 'gu', 'gujarati', 'Gujarati (India)', NULL, NULL, NULL, NULL),
(150, 'gv_GB', 'gv', 'manx', 'Manx (United Kingdom)', NULL, NULL, NULL, NULL),
(151, 'ha_NG', 'ha', 'hausa', 'Hausa (Nigeria)', NULL, NULL, NULL, NULL),
(152, 'he_IL', 'he', 'hebrew', 'Hebrew (Israel)', NULL, NULL, NULL, NULL),
(153, 'hi_IN', 'hi', 'hindi', 'Hindi (India)', NULL, NULL, NULL, NULL),
(154, 'hr_HR', 'hr', 'croatian', 'Croatian (Croatia)', NULL, NULL, NULL, NULL),
(155, 'hsb_DE', 'hsb', 'upper sorbian', 'Upper Sorbian (Germany)', NULL, NULL, NULL, NULL),
(156, 'ht_HT', 'ht', 'haitian', 'Haitian (Haiti)', NULL, NULL, NULL, NULL),
(157, 'hu_HU', 'hu', 'hungarian', 'Hungarian (Hungary)', NULL, NULL, NULL, NULL),
(158, 'hy_AM', 'hy', 'armenian', 'Armenian (Armenia)', NULL, NULL, NULL, NULL),
(159, 'ia', 'ia', 'interlingua', 'Interlingua', NULL, NULL, NULL, NULL),
(160, 'id_ID', 'id', 'indonesian', 'Indonesian (Indonesia)', NULL, NULL, NULL, NULL),
(161, 'ig_NG', 'ig', 'igbo', 'Igbo (Nigeria)', NULL, NULL, NULL, NULL),
(162, 'ik_CA', 'ik', 'inupiaq', 'Inupiaq (Canada)', NULL, NULL, NULL, NULL),
(163, 'is_IS', 'is', 'icelandic', 'Icelandic (Iceland)', NULL, NULL, NULL, NULL),
(164, 'it_CH', 'it', 'italian', 'Italian (Switzerland)', NULL, NULL, NULL, NULL),
(165, 'it_IT', 'it', 'italian', 'Italian (Italy)', NULL, NULL, NULL, NULL),
(166, 'iu_CA', 'iu', 'inuktitut', 'Inuktitut (Canada)', NULL, NULL, NULL, NULL),
(167, 'ja_JP', 'ja', 'japanese', 'Japanese (Japan)', NULL, NULL, NULL, NULL),
(168, 'ka_GE', 'ka', 'georgian', 'Georgian (Georgia)', NULL, NULL, NULL, NULL),
(169, 'kk_KZ', 'kk', 'kazakh', 'Kazakh (Kazakhstan)', NULL, NULL, NULL, NULL),
(170, 'kl_GL', 'kl', 'kalaallisut', 'Kalaallisut (Greenland)', NULL, NULL, NULL, NULL),
(171, 'km_KH', 'km', 'khmer', 'Khmer (Cambodia)', NULL, NULL, NULL, NULL),
(172, 'kn_IN', 'kn', 'kannada', 'Kannada (India)', NULL, NULL, NULL, NULL),
(173, 'kok_IN', 'kok', 'konkani', 'Konkani (India)', NULL, NULL, NULL, NULL),
(174, 'ko_KR', 'ko', 'korean', 'Korean (South Korea)', NULL, NULL, NULL, NULL),
(175, 'ks_IN', 'ks', 'kashmiri', 'Kashmiri (India)', NULL, NULL, NULL, NULL),
(176, 'ku_TR', 'ku', 'kurdish', 'Kurdish (Turkey)', NULL, NULL, NULL, NULL),
(177, 'kw_GB', 'kw', 'cornish', 'Cornish (United Kingdom)', NULL, NULL, NULL, NULL),
(178, 'ky_KG', 'ky', 'kirghiz', 'Kirghiz (Kyrgyzstan)', NULL, NULL, NULL, NULL),
(179, 'lg_UG', 'lg', 'ganda', 'Ganda (Uganda)', NULL, NULL, NULL, NULL),
(180, 'li_BE', 'li', 'limburgish', 'Limburgish (Belgium)', NULL, NULL, NULL, NULL),
(181, 'li_NL', 'li', 'limburgish', 'Limburgish (Netherlands)', NULL, NULL, NULL, NULL),
(182, 'lo_LA', 'lo', 'lao', 'Lao (Laos)', NULL, NULL, NULL, NULL),
(183, 'lt_LT', 'lt', 'lithuanian', 'Lithuanian (Lithuania)', NULL, NULL, NULL, NULL),
(184, 'lv_LV', 'lv', 'latvian', 'Latvian (Latvia)', NULL, NULL, NULL, NULL),
(185, 'mai_IN', 'mai', 'maithili', 'Maithili (India)', NULL, NULL, NULL, NULL),
(186, 'mg_MG', 'mg', 'malagasy', 'Malagasy (Madagascar)', NULL, NULL, NULL, NULL),
(187, 'mi_NZ', 'mi', 'maori', 'Maori (New Zealand)', NULL, NULL, NULL, NULL),
(188, 'mk_MK', 'mk', 'macedonian', 'Macedonian (Macedonia)', NULL, NULL, NULL, NULL),
(189, 'ml_IN', 'ml', 'malayalam', 'Malayalam (India)', NULL, NULL, NULL, NULL),
(190, 'mn_MN', 'mn', 'mongolian', 'Mongolian (Mongolia)', NULL, NULL, NULL, NULL),
(191, 'mr_IN', 'mr', 'marathi', 'Marathi (India)', NULL, NULL, NULL, NULL),
(192, 'ms_BN', 'ms', 'malay', 'Malay (Brunei)', NULL, NULL, NULL, NULL),
(193, 'ms_MY', 'ms', 'malay', 'Malay (Malaysia)', NULL, NULL, NULL, NULL),
(194, 'mt_MT', 'mt', 'maltese', 'Maltese (Malta)', NULL, NULL, NULL, NULL),
(195, 'my_MM', 'my', 'burmese', 'Burmese (Myanmar)', NULL, NULL, NULL, NULL),
(196, 'naq_NA', 'naq', 'namibia', 'Namibia', NULL, NULL, NULL, NULL),
(197, 'nb_NO', 'nb', 'norwegian bokm?l', 'Norwegian Bokm?l (Norway)', NULL, NULL, NULL, NULL),
(198, 'nds_DE', 'nds', 'low german', 'Low German (Germany)', NULL, NULL, NULL, NULL),
(199, 'nds_NL', 'nds', 'low german', 'Low German (Netherlands)', NULL, NULL, NULL, NULL),
(200, 'ne_NP', 'ne', 'nepali', 'Nepali (Nepal)', NULL, NULL, NULL, NULL),
(201, 'nl_AW', 'nl', 'dutch', 'Dutch (Aruba)', NULL, NULL, NULL, NULL),
(202, 'nl_BE', 'nl', 'dutch', 'Dutch (Belgium)', NULL, NULL, NULL, NULL),
(203, 'nl_NL', 'nl', 'dutch', 'Dutch (Netherlands)', NULL, NULL, NULL, NULL),
(204, 'nn_NO', 'nn', 'norwegian nynorsk', 'Norwegian Nynorsk (Norway)', NULL, NULL, NULL, NULL),
(205, 'no_NO', 'no', 'norwegian', 'Norwegian (Norway)', NULL, NULL, NULL, NULL),
(206, 'nr_ZA', 'nr', 'south ndebele', 'South Ndebele (South Africa)', NULL, NULL, NULL, NULL),
(207, 'nso_ZA', 'nso', 'northern sotho', 'Northern Sotho (South Africa)', NULL, NULL, NULL, NULL),
(208, 'oc_FR', 'oc', 'occitan', 'Occitan (France)', NULL, NULL, NULL, NULL),
(209, 'om_ET', 'om', 'oromo', 'Oromo (Ethiopia)', NULL, NULL, NULL, NULL),
(210, 'om_KE', 'om', 'oromo', 'Oromo (Kenya)', NULL, NULL, NULL, NULL),
(211, 'or_IN', 'or', 'oriya', 'Oriya (India)', NULL, NULL, NULL, NULL),
(212, 'os_RU', 'os', 'ossetic', 'Ossetic (Russia)', NULL, NULL, NULL, NULL),
(213, 'pap_AN', 'pap', 'papiamento', 'Papiamento (Netherlands Antilles)', NULL, NULL, NULL, NULL),
(214, 'pa_IN', 'pa', 'punjabi', 'Punjabi (India)', NULL, NULL, NULL, NULL),
(215, 'pa_PK', 'pa', 'punjabi', 'Punjabi (Pakistan)', NULL, NULL, NULL, NULL),
(216, 'pl_PL', 'pl', 'polish', 'Polish (Poland)', NULL, NULL, NULL, NULL),
(217, 'ps_AF', 'ps', 'pashto', 'Pashto (Afghanistan)', NULL, NULL, NULL, NULL),
(218, 'pt_BR', 'pt', 'portuguese', 'Portuguese (Brazil)', NULL, NULL, NULL, NULL),
(219, 'pt_GW', 'pt', 'portuguese', 'Portuguese (Guinea-Bissau)', NULL, NULL, NULL, NULL),
(220, 'pt_PT', 'pt', 'portuguese', 'Portuguese (Portugal)', NULL, NULL, NULL, NULL),
(221, 'ro_MD', 'ro', 'romanian', 'Romanian (Moldova)', NULL, NULL, NULL, NULL),
(222, 'ro_RO', 'ro', 'romanian', 'Romanian (Romania)', NULL, NULL, NULL, NULL),
(223, 'ru_RU', 'ru', 'russian', 'Russian (Russia)', NULL, NULL, NULL, NULL),
(224, 'ru_UA', 'ru', 'russian', 'Russian (Ukraine)', NULL, NULL, NULL, NULL),
(225, 'rw_RW', 'rw', 'kinyarwanda', 'Kinyarwanda (Rwanda)', NULL, NULL, NULL, NULL),
(226, 'sa_IN', 'sa', 'sanskrit', 'Sanskrit (India)', NULL, NULL, NULL, NULL),
(227, 'sc_IT', 'sc', 'sardinian', 'Sardinian (Italy)', NULL, NULL, NULL, NULL),
(228, 'sd_IN', 'sd', 'sindhi', 'Sindhi (India)', NULL, NULL, NULL, NULL),
(229, 'seh_MZ', 'seh', 'sena', 'Sena (Mozambique)', NULL, NULL, NULL, NULL),
(230, 'se_NO', 'se', 'northern sami', 'Northern Sami (Norway)', NULL, NULL, NULL, NULL),
(231, 'sid_ET', 'sid', 'sidamo', 'Sidamo (Ethiopia)', NULL, NULL, NULL, NULL),
(232, 'si_LK', 'si', 'sinhala', 'Sinhala (Sri Lanka)', NULL, NULL, NULL, NULL),
(233, 'sk_SK', 'sk', 'slovak', 'Slovak (Slovakia)', NULL, NULL, NULL, NULL),
(234, 'sl_SI', 'sl', 'slovenian', 'Slovenian (Slovenia)', NULL, NULL, NULL, NULL),
(235, 'sn_ZW', 'sn', 'shona', 'Shona (Zimbabwe)', NULL, NULL, NULL, NULL),
(236, 'so_DJ', 'so', 'somali', 'Somali (Djibouti)', NULL, NULL, NULL, NULL),
(237, 'so_ET', 'so', 'somali', 'Somali (Ethiopia)', NULL, NULL, NULL, NULL),
(238, 'so_KE', 'so', 'somali', 'Somali (Kenya)', NULL, NULL, NULL, NULL),
(239, 'so_SO', 'so', 'somali', 'Somali (Somalia)', NULL, NULL, NULL, NULL),
(240, 'sq_AL', 'sq', 'albanian', 'Albanian (Albania)', NULL, NULL, NULL, NULL),
(241, 'sq_MK', 'sq', 'albanian', 'Albanian (Macedonia)', NULL, NULL, NULL, NULL),
(242, 'sr_BA', 'sr', 'serbian', 'Serbian (Bosnia and Herzegovina)', NULL, NULL, NULL, NULL),
(243, 'sr_ME', 'sr', 'serbian', 'Serbian (Montenegro)', NULL, NULL, NULL, NULL),
(244, 'sr_RS', 'sr', 'serbian', 'Serbian (Serbia)', NULL, NULL, NULL, NULL),
(245, 'ss_ZA', 'ss', 'swati', 'Swati (South Africa)', NULL, NULL, NULL, NULL),
(246, 'st_ZA', 'st', 'southern sotho', 'Southern Sotho (South Africa)', NULL, NULL, NULL, NULL),
(247, 'sv_FI', 'sv', 'swedish', 'Swedish (Finland)', NULL, NULL, NULL, NULL),
(248, 'sv_SE', 'sv', 'swedish', 'Swedish (Sweden)', NULL, NULL, NULL, NULL),
(249, 'sw_KE', 'sw', 'swahili', 'Swahili (Kenya)', NULL, NULL, NULL, NULL),
(250, 'sw_TZ', 'sw', 'swahili', 'Swahili (Tanzania)', NULL, NULL, NULL, NULL),
(251, 'ta_IN', 'ta', 'tamil', 'Tamil (India)', NULL, NULL, NULL, NULL),
(252, 'teo_UG', 'teo', 'teso', 'Teso (Uganda)', NULL, NULL, NULL, NULL),
(253, 'te_IN', 'te', 'telugu', 'Telugu (India)', NULL, NULL, NULL, NULL),
(254, 'tg_TJ', 'tg', 'tajik', 'Tajik (Tajikistan)', NULL, NULL, NULL, NULL),
(255, 'th_TH', 'th', 'thai', 'Thai (Thailand)', NULL, NULL, NULL, NULL),
(256, 'tig_ER', 'tig', 'tigre', 'Tigre (Eritrea)', NULL, NULL, NULL, NULL),
(257, 'ti_ER', 'ti', 'tigrinya', 'Tigrinya (Eritrea)', NULL, NULL, NULL, NULL),
(258, 'ti_ET', 'ti', 'tigrinya', 'Tigrinya (Ethiopia)', NULL, NULL, NULL, NULL),
(259, 'tk_TM', 'tk', 'turkmen', 'Turkmen (Turkmenistan)', NULL, NULL, NULL, NULL),
(260, 'tl_PH', 'tl', 'tagalog', 'Tagalog (Philippines)', NULL, NULL, NULL, NULL),
(261, 'tn_ZA', 'tn', 'tswana', 'Tswana (South Africa)', NULL, NULL, NULL, NULL),
(262, 'to_TO', 'to', 'tongan', 'Tongan (Tonga)', NULL, NULL, NULL, NULL),
(263, 'tr_CY', 'tr', 'turkish', 'Turkish (Cyprus)', NULL, NULL, NULL, NULL),
(264, 'tr_TR', 'tr', 'turkish', 'Turkish (Turkey)', NULL, NULL, NULL, NULL),
(265, 'ts_ZA', 'ts', 'tsonga', 'Tsonga (South Africa)', NULL, NULL, NULL, NULL),
(266, 'tt_RU', 'tt', 'tatar', 'Tatar (Russia)', NULL, NULL, NULL, NULL),
(267, 'ug_CN', 'ug', 'uighur', 'Uighur (China)', NULL, NULL, NULL, NULL),
(268, 'uk_UA', 'uk', 'ukrainian', 'Ukrainian (Ukraine)', NULL, NULL, NULL, NULL),
(269, 'ur_PK', 'ur', 'urdu', 'Urdu (Pakistan)', NULL, NULL, NULL, NULL),
(270, 'uz_UZ', 'uz', 'uzbek', 'Uzbek (Uzbekistan)', NULL, NULL, NULL, NULL),
(271, 've_ZA', 've', 'venda', 'Venda (South Africa)', NULL, NULL, NULL, NULL),
(272, 'vi_VN', 'vi', 'vietnamese', 'Vietnamese (Vietnam)', NULL, NULL, NULL, NULL),
(273, 'wa_BE', 'wa', 'walloon', 'Walloon (Belgium)', NULL, NULL, NULL, NULL),
(274, 'wo_SN', 'wo', 'wolof', 'Wolof (Senegal)', NULL, NULL, NULL, NULL),
(275, 'xh_ZA', 'xh', 'xhosa', 'Xhosa (South Africa)', NULL, NULL, NULL, NULL),
(276, 'yi_US', 'yi', 'yiddish', 'Yiddish (United States)', NULL, NULL, NULL, NULL),
(277, 'yo_NG', 'yo', 'yoruba', 'Yoruba (Nigeria)', NULL, NULL, NULL, NULL),
(278, 'zh_CN', 'zh', 'chinese', 'Chinese (China)', NULL, NULL, NULL, NULL),
(279, 'zh_HK', 'zh', 'chinese', 'Chinese (Hong Kong SAR China)', NULL, NULL, NULL, NULL),
(280, 'zh_SG', 'zh', 'chinese', 'Chinese (Singapore)', NULL, NULL, NULL, NULL),
(281, 'zh_TW', 'zh', 'chinese', 'Chinese (Taiwan)', NULL, NULL, NULL, NULL),
(282, 'zu_ZA', 'zu', 'zulu', 'Zulu (South Africa)', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `locale` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_minutes`
--

CREATE TABLE `meeting_minutes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `attendees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_04_02_193005_create_translations_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_09_03_113711_create_types_table', 1),
(9, '2020_09_03_113731_create_results_table', 1),
(10, '2020_09_03_114649_create_leads_table', 1),
(11, '2020_09_03_114750_create_calls_table', 1),
(12, '2020_09_03_122418_create_countries_table', 1),
(13, '2020_09_03_133002_create_final_results_table', 1),
(14, '2020_09_27_000001_create_media_table', 1),
(15, '2020_09_27_000002_create_menus_table', 1),
(16, '2020_09_27_000003_create_announcements_table', 1),
(17, '2020_09_27_000004_create_tickets_table', 1),
(18, '2020_09_27_000006_create_bugs_table', 1),
(19, '2020_09_27_000007_create_task_uploaded_files_table', 1),
(20, '2020_09_27_000008_create_milestones_table', 1),
(21, '2020_09_27_000009_create_accounts_table', 1),
(22, '2020_09_27_000010_create_work_trackings_table', 1),
(23, '2020_09_27_000011_create_project_settings_table', 1),
(24, '2020_09_27_000012_create_task_attachments_table', 1),
(25, '2020_09_27_000013_create_projects_table', 1),
(26, '2020_09_27_000014_create_client_menus_table', 1),
(27, '2020_09_27_000015_create_kb_categories_table', 1),
(28, '2020_09_27_000016_create_clients_table', 1),
(29, '2020_09_27_000017_create_penalty_categories_table', 1),
(30, '2020_09_27_000018_create_opportunities_table', 1),
(31, '2020_09_27_000019_create_private_chats_table', 1),
(32, '2020_09_27_000020_create_salary_payments_table', 1),
(33, '2020_09_27_000021_create_salutations_table', 1),
(34, '2020_09_27_000025_create_interested_ins_table', 1),
(35, '2020_09_27_000027_create_files_table', 1),
(36, '2020_09_27_000028_create_invoices_table', 1),
(37, '2020_09_27_000029_create_customer_groups_table', 1),
(38, '2020_09_27_000030_create_transfers_table', 1),
(39, '2020_09_27_000031_create_salary_templates_table', 1),
(40, '2020_09_27_000032_create_salary_allowances_table', 1),
(41, '2020_09_27_000033_create_salary_payment_allowances_table', 1),
(42, '2020_09_27_000034_create_advance_salaries_table', 1),
(43, '2020_09_27_000035_create_stocks_table', 1),
(44, '2020_09_27_000036_create_salary_payment_deductions_table', 1),
(45, '2020_09_27_000037_create_stock_sub_categories_table', 1),
(46, '2020_09_27_000038_create_stock_categories_table', 1),
(47, '2020_09_27_000039_create_tax_rates_table', 1),
(48, '2020_09_27_000040_create_employee_banks_table', 1),
(49, '2020_09_27_000041_create_salary_payment_details_table', 1),
(50, '2020_09_27_000042_create_transactions_table', 1),
(51, '2020_09_27_000043_create_todos_table', 1),
(52, '2020_09_27_000044_create_salary_payslips_table', 1),
(53, '2020_09_27_000045_create_payments_table', 1),
(54, '2020_09_27_000046_create_payment_methods_table', 1),
(55, '2020_09_27_000047_create_purchase_payments_table', 1),
(56, '2020_09_27_000048_create_hourly_rates_table', 1),
(57, '2020_09_27_000049_create_return_stocks_table', 1),
(58, '2020_09_27_000050_create_online_payments_table', 1),
(59, '2020_09_27_000052_create_vacations_table', 1),
(60, '2020_09_27_000053_create_suppliers_table', 1),
(61, '2020_09_27_000054_create_proposals_items_table', 1),
(62, '2020_09_27_000055_create_locales_table', 1),
(63, '2020_09_27_000056_create_job_applications_table', 1),
(64, '2020_09_27_000058_create_salary_deductions_table', 1),
(65, '2020_09_27_000059_create_time_entries_table', 1),
(66, '2020_09_27_000060_create_account_details_table', 1),
(67, '2020_09_27_000061_create_designations_table', 1),
(68, '2020_09_27_000062_create_dashboard_settings_table', 1),
(69, '2020_09_27_000063_create_job_circulars_table', 1),
(70, '2020_09_27_000064_create_user_alerts_table', 1),
(71, '2020_09_27_000065_create_deposit_categories_table', 1),
(72, '2020_09_27_000065_create_expense_categories_table', 1),
(73, '2020_09_27_000066_create_tasks_table', 1),
(74, '2020_09_27_000067_create_task_tags_table', 1),
(75, '2020_09_27_000068_create_task_statuses_table', 1),
(76, '2020_09_27_000069_create_income_categories_table', 1),
(77, '2020_09_27_000070_create_time_projects_table', 1),
(78, '2020_09_27_000071_create_overtimes_table', 1),
(79, '2020_09_27_000072_create_time_work_types_table', 1),
(80, '2020_09_27_000073_create_deposits_table', 1),
(81, '2020_09_27_000073_create_expenses_table', 1),
(82, '2020_09_27_000074_create_employees_table', 1),
(83, '2020_09_27_000075_create_crm_documents_table', 1),
(84, '2020_09_27_000076_create_incomes_table', 1),
(85, '2020_09_27_000077_create_crm_notes_table', 1),
(86, '2020_09_27_000078_create_crm_customers_table', 1),
(87, '2020_09_27_000079_create_crm_statuses_table', 1),
(88, '2020_09_27_000080_create_users_table', 1),
(89, '2020_09_27_000082_create_quotation_details_table', 1),
(90, '2020_09_27_000083_create_departments_table', 1),
(91, '2020_09_27_000084_create_quotation_forms_table', 1),
(92, '2020_09_27_000085_create_outgoing_emails_table', 1),
(93, '2020_09_27_000086_create_leave_applications_table', 1),
(94, '2020_09_27_000087_create_technical_categories_table', 1),
(95, '2020_09_27_000088_create_employee_awards_table', 1),
(96, '2020_09_27_000089_create_attendances_table', 1),
(97, '2020_09_27_000090_create_leave_categories_table', 1),
(98, '2020_09_27_000091_create_performance_indicators_table', 1),
(99, '2020_09_27_000092_create_meeting_minutes_table', 1),
(100, '2020_09_27_000093_create_daily_attendances_table', 1),
(101, '2020_09_27_000093_create_working_days_table', 1),
(102, '2020_09_27_000094_create_trainings_table', 1),
(103, '2020_09_27_000095_create_monthly_attendances_table', 1),
(104, '2020_09_27_000096_create_quotations_table', 1),
(105, '2020_09_27_000097_create_holidays_table', 1),
(106, '2020_09_27_000110_create_user_user_alert_pivot_table', 1),
(107, '2020_09_27_000119_create_task_task_tag_pivot_table', 1),
(108, '2020_09_27_000121_create_uploads_table', 1),
(109, '2020_09_27_000122_add_relationship_fields_to_todos_table', 1),
(110, '2020_09_27_000123_add_relationship_fields_to_salary_payments_table', 1),
(111, '2020_09_27_000124_add_relationship_fields_to_quotations_table', 1),
(112, '2020_09_27_000125_add_relationship_fields_to_private_chats_table', 1),
(113, '2020_09_27_000126_add_relationship_fields_to_task_uploaded_files_table', 1),
(114, '2020_09_27_000127_add_relationship_fields_to_salary_payment_allowances_table', 1),
(115, '2020_09_27_000128_add_relationship_fields_to_quotation_details_table', 1),
(116, '2020_09_27_000129_add_relationship_fields_to_task_attachments_table', 1),
(117, '2020_09_27_000130_add_relationship_fields_to_salary_payslips_table', 1),
(118, '2020_09_27_000131_add_relationship_fields_to_files_table', 1),
(119, '2020_09_27_000132_add_relationship_fields_to_salary_payment_deductions_table', 1),
(120, '2020_09_27_000133_add_relationship_fields_to_vacations_table', 1),
(121, '2020_09_27_000135_add_relationship_fields_to_quotation_forms_table', 1),
(122, '2020_09_27_000136_add_relationship_fields_to_deposits_table', 1),
(123, '2020_09_27_000136_add_relationship_fields_to_expenses_table', 1),
(124, '2020_09_27_000137_add_relationship_fields_to_salary_payment_details_table', 1),
(125, '2020_09_27_000138_add_relationship_fields_to_incomes_table', 1),
(126, '2020_09_27_000139_add_relationship_fields_to_bugs_table', 1),
(127, '2020_09_27_000140_add_relationship_fields_to_salary_deductions_table', 1),
(128, '2020_09_27_000141_add_relationship_fields_to_overtimes_table', 1),
(129, '2020_09_27_000142_add_relationship_fields_to_monthly_attendances_table', 1),
(130, '2020_09_27_000143_add_relationship_fields_to_daily_attendances_table', 1),
(131, '2020_09_27_000144_create_employee_requests_table', 1),
(132, '2020_09_27_000145_add_relationship_fields_to_employee_awards_table', 1),
(133, '2020_09_27_000146_add_relationship_fields_to_meeting_minutes_table', 1),
(134, '2020_09_27_000147_add_relationship_fields_to_leave_applications_table', 1),
(135, '2020_09_27_000148_add_relationship_fields_to_trainings_table', 1),
(136, '2020_09_27_000150_add_relationship_fields_to_account_details_table', 1),
(137, '2020_09_27_000152_add_relationship_fields_to_designations_table', 1),
(138, '2020_09_27_000153_add_relationship_fields_to_departments_table', 1),
(139, '2020_09_27_000154_add_relationship_fields_to_tasks_table', 1),
(140, '2020_09_27_000155_add_relationship_fields_to_time_entries_table', 1),
(141, '2020_09_27_000157_add_relationship_fields_to_crm_documents_table', 1),
(142, '2020_09_27_000158_add_relationship_fields_to_crm_notes_table', 1),
(143, '2020_09_27_000159_add_relationship_fields_to_crm_customers_table', 1),
(144, '2020_09_27_000161_add_relationship_fields_to_leads_table', 1),
(145, '2020_09_27_000162_add_relationship_fields_to_salary_allowances_table', 1),
(146, '2020_09_27_000163_add_relationship_fields_to_return_stocks_table', 1),
(147, '2020_09_27_000165_add_relationship_fields_to_stocks_table', 1),
(148, '2020_09_27_000166_add_relationship_fields_to_stock_sub_categories_table', 1),
(149, '2020_09_27_000167_add_relationship_fields_to_employee_banks_table', 1),
(150, '2020_09_27_000168_add_relationship_fields_to_transfers_table', 1),
(151, '2020_09_27_000168_create_set_times_table', 1),
(152, '2020_09_27_000169_create_absences_table', 1),
(153, '2020_09_27_000173_add_relationship_fields_to_opportunities_table', 1),
(154, '2020_09_27_000174_add_relationship_fields_to_suppliers_table', 1),
(155, '2020_09_27_000175_add_relationship_fields_to_proposals_items_table', 1),
(156, '2020_09_27_000177_add_relationship_fields_to_announcements_table', 1),
(157, '2020_09_27_000179_add_relationship_fields_to_milestones_table', 1),
(158, '2020_09_27_000181_add_relationship_fields_to_projects_table', 1),
(159, '2020_09_27_000182_add_relationship_fields_to_clients_table', 1),
(160, '2020_09_27_000183_create_notifications_x1_table', 1),
(161, '2020_09_27_000183_create_qa_topics_table', 1),
(162, '2020_09_27_000183_create_userables_table', 1),
(163, '2020_09_27_000184_create_qa_messages_table', 1),
(164, '2020_09_27_000233_create_payroll_summaries_table', 1),
(165, '2020_09_30_075151_create_fingerprint_attendances_table', 1),
(166, '2020_09_30_075177_create_evaluation_rating_evaluation_table', 1),
(167, '2020_09_30_075177_create_evaluations_table', 1),
(168, '2020_09_30_075177_create_rating_evaluations_table', 1),
(169, '2020_11_25_204008_create_permission_tables', 1),
(170, '2020_11_26_000234_create_deductions_table', 1),
(171, '2020_12_01_131111_create_project_account_details_table', 1),
(172, '2020_12_05_134419_create_notifications_table', 1),
(173, '2020_12_07_122119_create_milestone_account_details_table', 1),
(174, '2020_12_07_122648_drop_user_id_from_milestone', 1),
(175, '2020_12_09_144801_create_lead_users_table', 1),
(176, '2020_12_13_130435_create_task_account_details_table', 1),
(177, '2020_12_14_155627_create_bug_account_details_table', 1),
(178, '2020_12_1_123931_add_department_id_to_projects', 1),
(179, '2020_12_21_114934_add_sub_task_id_to_tasks', 1),
(180, '2020_12_27_000026_create_proposals_table', 1),
(181, '2020_12_28_110949_create_time_sheets_table', 1),
(182, '2020_12_28_131802_create_item_invoice_relations_table', 1),
(183, '2020_12_28_131802_create_item_porposal_relations_table', 1),
(184, '2020_12_29_124441_create_activities_table', 1),
(185, '2021_01_03_144401_create_ticket_replays_table', 1),
(186, '2021_01_07_000051_create_purchases_table', 1),
(187, '2021_01_07_000052_create_item_purchase_table', 1),
(188, '2021_01_08_000051_create_item_purchase_tax_table', 1),
(189, '2021_01_08_000172_add_relationship_fields_to_purchases_table', 1),
(190, '2021_01_10_151232_create_ticket_account_details_table', 1),
(191, '2021_01_18_133735_create_invoice_item_taxs_table', 1),
(192, '2021_01_18_133735_create_proposal_item_taxs_table', 1),
(193, '2021_01_18_151145_add_subject_to_work_trackings_table', 1),
(194, '2021_01_19_192942_drop_status_id_from_tasks', 1),
(195, '2021_01_20_000176_add_relationship_fields_to_invoices_table', 1),
(196, '2021_01_26_172241_create_work_tracking_account_details_table', 1),
(197, '2021_02_08_160559_create_currencies_table', 1),
(198, '2021_02_08_165828_create_languages_table', 1),
(199, '2020_10_09_122928_create_configs_table', 2),
(200, '2021_02_10_010311_add_columns_to_stocks_table', 3),
(201, '2021_02_10_212154_create_assign_stocks_table', 4),
(202, '2021_02_11_141957_add_coll_to_calls_table', 4),
(203, '2021_02_11_155824_add_col2_to_calls_table', 4),
(204, '2021_02_13_003948_create_email_templates_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client_visible` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milestone_account_details_pivot`
--

CREATE TABLE `milestone_account_details_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `milestone_id` int(10) UNSIGNED NOT NULL,
  `account_details_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 1),
(26, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 1),
(36, 'App\\Models\\User', 1),
(37, 'App\\Models\\User', 1),
(38, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 1),
(44, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 1),
(46, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 1),
(49, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 1),
(51, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 1),
(53, 'App\\Models\\User', 1),
(54, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 1),
(59, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 1),
(62, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 1),
(64, 'App\\Models\\User', 1),
(65, 'App\\Models\\User', 1),
(66, 'App\\Models\\User', 1),
(67, 'App\\Models\\User', 1),
(68, 'App\\Models\\User', 1),
(69, 'App\\Models\\User', 1),
(70, 'App\\Models\\User', 1),
(71, 'App\\Models\\User', 1),
(72, 'App\\Models\\User', 1),
(73, 'App\\Models\\User', 1),
(74, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 1),
(78, 'App\\Models\\User', 1),
(79, 'App\\Models\\User', 1),
(80, 'App\\Models\\User', 1),
(81, 'App\\Models\\User', 1),
(82, 'App\\Models\\User', 1),
(83, 'App\\Models\\User', 1),
(84, 'App\\Models\\User', 1),
(85, 'App\\Models\\User', 1),
(86, 'App\\Models\\User', 1),
(87, 'App\\Models\\User', 1),
(88, 'App\\Models\\User', 1),
(89, 'App\\Models\\User', 1),
(90, 'App\\Models\\User', 1),
(91, 'App\\Models\\User', 1),
(92, 'App\\Models\\User', 1),
(93, 'App\\Models\\User', 1),
(94, 'App\\Models\\User', 1),
(95, 'App\\Models\\User', 1),
(96, 'App\\Models\\User', 1),
(97, 'App\\Models\\User', 1),
(98, 'App\\Models\\User', 1),
(99, 'App\\Models\\User', 1),
(100, 'App\\Models\\User', 1),
(101, 'App\\Models\\User', 1),
(102, 'App\\Models\\User', 1),
(103, 'App\\Models\\User', 1),
(104, 'App\\Models\\User', 1),
(105, 'App\\Models\\User', 1),
(106, 'App\\Models\\User', 1),
(107, 'App\\Models\\User', 1),
(108, 'App\\Models\\User', 1),
(109, 'App\\Models\\User', 1),
(110, 'App\\Models\\User', 1),
(111, 'App\\Models\\User', 1),
(112, 'App\\Models\\User', 1),
(113, 'App\\Models\\User', 1),
(114, 'App\\Models\\User', 1),
(115, 'App\\Models\\User', 1),
(116, 'App\\Models\\User', 1),
(117, 'App\\Models\\User', 1),
(118, 'App\\Models\\User', 1),
(119, 'App\\Models\\User', 1),
(120, 'App\\Models\\User', 1),
(121, 'App\\Models\\User', 1),
(122, 'App\\Models\\User', 1),
(123, 'App\\Models\\User', 1),
(124, 'App\\Models\\User', 1),
(125, 'App\\Models\\User', 1),
(126, 'App\\Models\\User', 1),
(127, 'App\\Models\\User', 1),
(128, 'App\\Models\\User', 1),
(129, 'App\\Models\\User', 1),
(130, 'App\\Models\\User', 1),
(131, 'App\\Models\\User', 1),
(132, 'App\\Models\\User', 1),
(133, 'App\\Models\\User', 1),
(134, 'App\\Models\\User', 1),
(135, 'App\\Models\\User', 1),
(136, 'App\\Models\\User', 1),
(137, 'App\\Models\\User', 1),
(138, 'App\\Models\\User', 1),
(139, 'App\\Models\\User', 1),
(140, 'App\\Models\\User', 1),
(141, 'App\\Models\\User', 1),
(142, 'App\\Models\\User', 1),
(143, 'App\\Models\\User', 1),
(144, 'App\\Models\\User', 1),
(145, 'App\\Models\\User', 1),
(146, 'App\\Models\\User', 1),
(147, 'App\\Models\\User', 1),
(148, 'App\\Models\\User', 1),
(149, 'App\\Models\\User', 1),
(150, 'App\\Models\\User', 1),
(151, 'App\\Models\\User', 1),
(152, 'App\\Models\\User', 1),
(153, 'App\\Models\\User', 1),
(154, 'App\\Models\\User', 1),
(155, 'App\\Models\\User', 1),
(156, 'App\\Models\\User', 1),
(157, 'App\\Models\\User', 1),
(158, 'App\\Models\\User', 1),
(159, 'App\\Models\\User', 1),
(160, 'App\\Models\\User', 1),
(161, 'App\\Models\\User', 1),
(162, 'App\\Models\\User', 1),
(163, 'App\\Models\\User', 1),
(164, 'App\\Models\\User', 1),
(165, 'App\\Models\\User', 1),
(166, 'App\\Models\\User', 1),
(167, 'App\\Models\\User', 1),
(168, 'App\\Models\\User', 1),
(169, 'App\\Models\\User', 1),
(170, 'App\\Models\\User', 1),
(171, 'App\\Models\\User', 1),
(172, 'App\\Models\\User', 1),
(173, 'App\\Models\\User', 1),
(174, 'App\\Models\\User', 1),
(175, 'App\\Models\\User', 1),
(176, 'App\\Models\\User', 1),
(177, 'App\\Models\\User', 1),
(178, 'App\\Models\\User', 1),
(179, 'App\\Models\\User', 1),
(180, 'App\\Models\\User', 1),
(181, 'App\\Models\\User', 1),
(182, 'App\\Models\\User', 1),
(183, 'App\\Models\\User', 1),
(184, 'App\\Models\\User', 1),
(185, 'App\\Models\\User', 1),
(186, 'App\\Models\\User', 1),
(187, 'App\\Models\\User', 1),
(188, 'App\\Models\\User', 1),
(189, 'App\\Models\\User', 1),
(190, 'App\\Models\\User', 1),
(191, 'App\\Models\\User', 1),
(192, 'App\\Models\\User', 1),
(193, 'App\\Models\\User', 1),
(194, 'App\\Models\\User', 1),
(195, 'App\\Models\\User', 1),
(196, 'App\\Models\\User', 1),
(197, 'App\\Models\\User', 1),
(198, 'App\\Models\\User', 1),
(199, 'App\\Models\\User', 1),
(200, 'App\\Models\\User', 1),
(201, 'App\\Models\\User', 1),
(202, 'App\\Models\\User', 1),
(203, 'App\\Models\\User', 1),
(204, 'App\\Models\\User', 1),
(205, 'App\\Models\\User', 1),
(206, 'App\\Models\\User', 1),
(207, 'App\\Models\\User', 1),
(208, 'App\\Models\\User', 1),
(209, 'App\\Models\\User', 1),
(210, 'App\\Models\\User', 1),
(211, 'App\\Models\\User', 1),
(212, 'App\\Models\\User', 1),
(213, 'App\\Models\\User', 1),
(214, 'App\\Models\\User', 1),
(215, 'App\\Models\\User', 1),
(216, 'App\\Models\\User', 1),
(217, 'App\\Models\\User', 1),
(218, 'App\\Models\\User', 1),
(219, 'App\\Models\\User', 1),
(220, 'App\\Models\\User', 1),
(221, 'App\\Models\\User', 1),
(222, 'App\\Models\\User', 1),
(223, 'App\\Models\\User', 1),
(224, 'App\\Models\\User', 1),
(225, 'App\\Models\\User', 1),
(226, 'App\\Models\\User', 1),
(227, 'App\\Models\\User', 1),
(228, 'App\\Models\\User', 1),
(229, 'App\\Models\\User', 1),
(230, 'App\\Models\\User', 1),
(231, 'App\\Models\\User', 1),
(232, 'App\\Models\\User', 1),
(233, 'App\\Models\\User', 1),
(234, 'App\\Models\\User', 1),
(235, 'App\\Models\\User', 1),
(236, 'App\\Models\\User', 1),
(237, 'App\\Models\\User', 1),
(238, 'App\\Models\\User', 1),
(239, 'App\\Models\\User', 1),
(240, 'App\\Models\\User', 1),
(241, 'App\\Models\\User', 1),
(242, 'App\\Models\\User', 1),
(243, 'App\\Models\\User', 1),
(244, 'App\\Models\\User', 1),
(245, 'App\\Models\\User', 1),
(246, 'App\\Models\\User', 1),
(247, 'App\\Models\\User', 1),
(248, 'App\\Models\\User', 1),
(249, 'App\\Models\\User', 1),
(250, 'App\\Models\\User', 1),
(251, 'App\\Models\\User', 1),
(252, 'App\\Models\\User', 1),
(253, 'App\\Models\\User', 1),
(254, 'App\\Models\\User', 1),
(255, 'App\\Models\\User', 1),
(256, 'App\\Models\\User', 1),
(257, 'App\\Models\\User', 1),
(258, 'App\\Models\\User', 1),
(259, 'App\\Models\\User', 1),
(260, 'App\\Models\\User', 1),
(261, 'App\\Models\\User', 1),
(262, 'App\\Models\\User', 1),
(263, 'App\\Models\\User', 1),
(264, 'App\\Models\\User', 1),
(265, 'App\\Models\\User', 1),
(266, 'App\\Models\\User', 1),
(267, 'App\\Models\\User', 1),
(268, 'App\\Models\\User', 1),
(269, 'App\\Models\\User', 1),
(270, 'App\\Models\\User', 1),
(271, 'App\\Models\\User', 1),
(272, 'App\\Models\\User', 1),
(273, 'App\\Models\\User', 1),
(274, 'App\\Models\\User', 1),
(275, 'App\\Models\\User', 1),
(276, 'App\\Models\\User', 1),
(277, 'App\\Models\\User', 1),
(278, 'App\\Models\\User', 1),
(279, 'App\\Models\\User', 1),
(280, 'App\\Models\\User', 1),
(281, 'App\\Models\\User', 1),
(282, 'App\\Models\\User', 1),
(283, 'App\\Models\\User', 1),
(284, 'App\\Models\\User', 1),
(285, 'App\\Models\\User', 1),
(286, 'App\\Models\\User', 1),
(287, 'App\\Models\\User', 1),
(288, 'App\\Models\\User', 1),
(289, 'App\\Models\\User', 1),
(290, 'App\\Models\\User', 1),
(291, 'App\\Models\\User', 1),
(292, 'App\\Models\\User', 1),
(293, 'App\\Models\\User', 1),
(294, 'App\\Models\\User', 1),
(295, 'App\\Models\\User', 1),
(296, 'App\\Models\\User', 1),
(297, 'App\\Models\\User', 1),
(298, 'App\\Models\\User', 1),
(299, 'App\\Models\\User', 1),
(300, 'App\\Models\\User', 1),
(301, 'App\\Models\\User', 1),
(302, 'App\\Models\\User', 1),
(303, 'App\\Models\\User', 1),
(304, 'App\\Models\\User', 1),
(305, 'App\\Models\\User', 1),
(306, 'App\\Models\\User', 1),
(307, 'App\\Models\\User', 1),
(308, 'App\\Models\\User', 1),
(309, 'App\\Models\\User', 1),
(310, 'App\\Models\\User', 1),
(311, 'App\\Models\\User', 1),
(312, 'App\\Models\\User', 1),
(313, 'App\\Models\\User', 1),
(314, 'App\\Models\\User', 1),
(315, 'App\\Models\\User', 1),
(316, 'App\\Models\\User', 1),
(317, 'App\\Models\\User', 1),
(318, 'App\\Models\\User', 1),
(319, 'App\\Models\\User', 1),
(320, 'App\\Models\\User', 1),
(321, 'App\\Models\\User', 1),
(322, 'App\\Models\\User', 1),
(323, 'App\\Models\\User', 1),
(324, 'App\\Models\\User', 1),
(325, 'App\\Models\\User', 1),
(326, 'App\\Models\\User', 1),
(327, 'App\\Models\\User', 1),
(328, 'App\\Models\\User', 1),
(329, 'App\\Models\\User', 1),
(330, 'App\\Models\\User', 1),
(331, 'App\\Models\\User', 1),
(332, 'App\\Models\\User', 1),
(333, 'App\\Models\\User', 1),
(334, 'App\\Models\\User', 1),
(335, 'App\\Models\\User', 1),
(336, 'App\\Models\\User', 1),
(337, 'App\\Models\\User', 1),
(338, 'App\\Models\\User', 1),
(339, 'App\\Models\\User', 1),
(340, 'App\\Models\\User', 1),
(341, 'App\\Models\\User', 1),
(342, 'App\\Models\\User', 1),
(343, 'App\\Models\\User', 1),
(344, 'App\\Models\\User', 1),
(345, 'App\\Models\\User', 1),
(346, 'App\\Models\\User', 1),
(347, 'App\\Models\\User', 1),
(348, 'App\\Models\\User', 1),
(349, 'App\\Models\\User', 1),
(350, 'App\\Models\\User', 1),
(351, 'App\\Models\\User', 1),
(352, 'App\\Models\\User', 1),
(353, 'App\\Models\\User', 1),
(354, 'App\\Models\\User', 1),
(355, 'App\\Models\\User', 1),
(356, 'App\\Models\\User', 1),
(357, 'App\\Models\\User', 1),
(358, 'App\\Models\\User', 1),
(359, 'App\\Models\\User', 1),
(360, 'App\\Models\\User', 1),
(361, 'App\\Models\\User', 1),
(362, 'App\\Models\\User', 1),
(363, 'App\\Models\\User', 1),
(364, 'App\\Models\\User', 1),
(365, 'App\\Models\\User', 1),
(366, 'App\\Models\\User', 1),
(367, 'App\\Models\\User', 1),
(368, 'App\\Models\\User', 1),
(369, 'App\\Models\\User', 1),
(370, 'App\\Models\\User', 1),
(371, 'App\\Models\\User', 1),
(372, 'App\\Models\\User', 1),
(373, 'App\\Models\\User', 1),
(374, 'App\\Models\\User', 1),
(375, 'App\\Models\\User', 1),
(376, 'App\\Models\\User', 1),
(377, 'App\\Models\\User', 1),
(378, 'App\\Models\\User', 1),
(379, 'App\\Models\\User', 1),
(380, 'App\\Models\\User', 1),
(381, 'App\\Models\\User', 1),
(382, 'App\\Models\\User', 1),
(383, 'App\\Models\\User', 1),
(384, 'App\\Models\\User', 1),
(385, 'App\\Models\\User', 1),
(386, 'App\\Models\\User', 1),
(387, 'App\\Models\\User', 1),
(388, 'App\\Models\\User', 1),
(389, 'App\\Models\\User', 1),
(390, 'App\\Models\\User', 1),
(391, 'App\\Models\\User', 1),
(392, 'App\\Models\\User', 1),
(393, 'App\\Models\\User', 1),
(394, 'App\\Models\\User', 1),
(395, 'App\\Models\\User', 1),
(396, 'App\\Models\\User', 1),
(397, 'App\\Models\\User', 1),
(398, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_x1`
--

CREATE TABLE `notifications_x1` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `notify_type` int(10) UNSIGNED NOT NULL,
  `redirect_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_emails`
--

CREATE TABLE `outgoing_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Online', NULL, NULL, NULL),
(2, 'PayPal', NULL, NULL, NULL),
(3, 'Payoneer', NULL, NULL, NULL),
(4, 'Bank Transfer', NULL, NULL, NULL),
(5, 'Cache', NULL, NULL, NULL),
(6, 'Cheque', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_summaries`
--

CREATE TABLE `payroll_summaries` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `net_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `daily_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_absence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `holidays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `vacations` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deductions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `leave_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `late_minutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `extra_minutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bonus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `net_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
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
  `designation_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `permission_group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `permission_group_id`, `created_at`, `updated_at`) VALUES
(1, 'user_management_access', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(2, 'permission_create', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(3, 'permission_edit', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(4, 'permission_show', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(5, 'permission_delete', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(6, 'permission_access', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(7, 'role_create', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(8, 'role_edit', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(9, 'role_show', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(10, 'role_delete', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(11, 'role_access', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(12, 'user_create', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(13, 'user_edit', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(14, 'user_show', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(15, 'user_delete', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(16, 'user_access', 'web', 1, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(17, 'basic_c_r_m_access', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(18, 'crm_status_create', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(19, 'crm_status_delete', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(20, 'crm_status_access', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(21, 'crm_customer_create', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(22, 'crm_customer_edit', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(23, 'crm_customer_show', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(24, 'crm_customer_delete', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(25, 'crm_customer_access', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(26, 'crm_note_create', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(27, 'crm_note_edit', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(28, 'crm_note_show', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(29, 'crm_note_delete', 'web', 2, '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(30, 'crm_note_access', 'web', 2, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(31, 'crm_document_create', 'web', 2, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(32, 'crm_document_edit', 'web', 2, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(33, 'crm_document_show', 'web', 2, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(34, 'crm_document_delete', 'web', 2, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(35, 'crm_document_access', 'web', 2, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(36, 'setting_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(37, 'client_menu_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(38, 'menu_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(39, 'local_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(40, 'performance_indicator_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(41, 'technical_category_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(42, 'quotation_form_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(43, 'quotation_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(44, 'quotation_detail_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(45, 'dashboard_setting_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(46, 'private_chat_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(47, 'todo_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(48, 'outgoing_email_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(49, 'expense_management_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(50, 'expense_category_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(51, 'income_category_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(52, 'expense_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(53, 'income_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(54, 'expense_report_access', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(55, 'profile_password_edit', 'web', 3, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(56, 'hr_access', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(57, 'employee_create', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(58, 'employee_edit', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(59, 'employee_show', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(60, 'employee_delete', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(61, 'employee_access', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(62, 'settings', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(63, 'evaluations', 'web', 4, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(64, 'finance_access', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(65, 'bank_cash', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(66, 'balance_sheet', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(67, 'payment_method', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(68, 'payment_method_delete', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(69, 'payment_method_edit', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(70, 'payment_method_create', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(71, 'transfer', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(72, 'transfer_create', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(73, 'transfer_edit', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(74, 'transfer_delete', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(75, 'expenses_category', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(76, 'expenses_category_create', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(77, 'expenses_category_edit', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(78, 'expenses_category_delete', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(79, 'expenses', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(80, 'expenses_create', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(81, 'expenses_edit', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(82, 'expenses_delete', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(83, 'deposits_category', 'web', 5, '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(84, 'deposits_category_create', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(85, 'deposits_category_edit', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(86, 'deposits_category_delete', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(87, 'deposits', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(88, 'deposits_create', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(89, 'deposits_edit', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(90, 'deposits_delete', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(91, 'invoice', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(92, 'invoice_create', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(93, 'invoice_access', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(94, 'invoice_edit', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(95, 'invoice_delete', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(96, 'invoice_show', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(97, 'office_asset', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(98, 'stock_category', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(99, 'stock_category_delete', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(100, 'stock_category_edit', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(101, 'stock_category_create', 'web', 5, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(102, 'penalty_category_access', 'web', 6, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(103, 'penalty_category_create', 'web', 6, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(104, 'penalty_category_delete', 'web', 6, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(105, 'penalty_category_edit', 'web', 6, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(106, 'evaluation_access', 'web', 7, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(107, 'evaluation_create', 'web', 7, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(108, 'evaluation_print', 'web', 7, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(109, 'evaluation_delete', 'web', 7, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(110, 'time_management_access', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(111, 'time_work_type_create', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(112, 'time_work_type_edit', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(113, 'time_work_type_show', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(114, 'time_work_type_delete', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(115, 'time_work_type_access', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(116, 'time_project_create', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(117, 'time_project_edit', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(118, 'time_project_show', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(119, 'time_project_delete', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(120, 'time_project_access', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(121, 'time_entry_create', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(122, 'time_entry_edit', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(123, 'time_entry_show', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(124, 'time_entry_delete', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(125, 'time_entry_access', 'web', 8, '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(126, 'time_report_create', 'web', 8, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(127, 'time_report_edit', 'web', 8, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(128, 'time_report_show', 'web', 8, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(129, 'time_report_delete', 'web', 8, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(130, 'time_report_access', 'web', 8, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(131, 'task_management_access', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(132, 'task_tag_create', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(133, 'task_tag_edit', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(134, 'task_tag_show', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(135, 'task_tag_delete', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(136, 'task_tag_access', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(137, 'task_create', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(138, 'task_edit', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(139, 'task_show', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(140, 'task_delete', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(141, 'task_access', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(142, 'tasks_calendar_access', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(143, 'task_assign_to', 'web', 9, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(144, 'user_alert_create', 'web', 10, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(145, 'user_alert_show', 'web', 10, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(146, 'user_alert_delete', 'web', 10, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(147, 'user_alert_access', 'web', 10, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(148, 'department_create', 'web', 11, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(149, 'department_edit', 'web', 11, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(150, 'department_show', 'web', 11, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(151, 'department_delete', 'web', 11, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(152, 'department_access', 'web', 11, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(153, 'force-delete-departments', 'web', 11, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(154, 'designation_create', 'web', 12, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(155, 'designation_edit', 'web', 12, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(156, 'designation_show', 'web', 12, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(157, 'designation_delete', 'web', 12, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(158, 'designation_access', 'web', 12, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(159, 'account_detail_create', 'web', 13, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(160, 'account_detail_edit', 'web', 13, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(161, 'account_detail_show', 'web', 13, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(162, 'account_detail_delete', 'web', 13, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(163, 'account_detail_access', 'web', 13, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(164, 'employee_award_create', 'web', 13, '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(165, 'employee_award_edit', 'web', 13, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(166, 'employee_award_show', 'web', 13, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(167, 'employee_award_delete', 'web', 13, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(168, 'employee_award_access', 'web', 13, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(169, 'employees_access', 'web', 13, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(170, 'appointment_letter', 'web', 13, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(171, 'account_detail_evaluate', 'web', 13, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(172, 'overtime_create', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(173, 'overtime_edit', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(174, 'overtime_show', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(175, 'overtime_delete', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(176, 'overtime_access', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(177, 'holiday_create', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(178, 'holiday_edit', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(179, 'holiday_show', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(180, 'holiday_delete', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(181, 'holiday_access', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(182, 'training_create', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(183, 'training_edit', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(184, 'training_show', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(185, 'training_delete', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(186, 'training_access', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(187, 'employee_request_create', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(188, 'employee_request_edit', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(189, 'employee_request_delete', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(190, 'employee_request_access', 'web', 14, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(191, 'leave_category_create', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(192, 'leave_category_edit', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(193, 'leave_category_show', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(194, 'leave_category_delete', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(195, 'leave_category_access', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(196, 'leave_application_create', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(197, 'leave_application_edit', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(198, 'leave_application_show', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(199, 'leave_application_delete', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(200, 'leave_application_access', 'web', 15, '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(201, 'attendances_create', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(202, 'attendances_edit', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(203, 'attendances_show', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(204, 'attendances_delete', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(205, 'attendances_access', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(206, 'daily_attendance_create', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(207, 'daily_attendance_edit', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(208, 'daily_attendance_show', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(209, 'daily_attendance_delete', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(210, 'daily_attendance_access', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(211, 'monthly_attendance_show', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(212, 'monthly_attendance_access', 'web', 16, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(213, 'recruitment_access', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(214, 'job_circular_create', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(215, 'job_circular_edit', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(216, 'job_circular_show', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(217, 'job_circular_delete', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(218, 'job_circular_access', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(219, 'job_application_create', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(220, 'job_application_edit', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(221, 'job_application_show', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(222, 'job_application_delete', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(223, 'job_application_access', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(224, 'generate_hr_letter', 'web', 17, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(225, 'proposal_create', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(226, 'proposal_edit', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(227, 'proposal_show', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(228, 'proposal_delete', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(229, 'proposal_access', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(230, 'interested_in_create', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(231, 'interested_in_delete', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(232, 'interested_in_access', 'web', 18, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(233, 'proposals_item_access', 'web', 19, '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(234, 'proposals_item_create', 'web', 19, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(235, 'proposals_item_edit', 'web', 19, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(236, 'proposals_item_show', 'web', 19, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(237, 'proposals_item_delete', 'web', 19, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(238, 'opportunity_create', 'web', 20, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(239, 'opportunity_edit', 'web', 20, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(240, 'opportunity_show', 'web', 20, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(241, 'opportunity_delete', 'web', 20, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(242, 'opportunity_access', 'web', 20, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(243, 'work_tracking_create', 'web', 21, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(244, 'work_tracking_edit', 'web', 21, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(245, 'work_tracking_show', 'web', 21, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(246, 'work_tracking_delete', 'web', 21, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(247, 'work_tracking_access', 'web', 21, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(248, 'work_tracking_assign_to', 'web', 21, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(249, 'milestone_create', 'web', 22, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(250, 'milestone_edit', 'web', 22, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(251, 'milestone_show', 'web', 22, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(252, 'milestone_delete', 'web', 22, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(253, 'milestone_access', 'web', 22, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(254, 'milestone_assign_to', 'web', 22, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(255, 'bug_create', 'web', 23, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(256, 'bug_edit', 'web', 23, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(257, 'bug_show', 'web', 23, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(258, 'bug_delete', 'web', 23, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(259, 'bug_access', 'web', 23, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(260, 'bug_assign_to', 'web', 23, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(261, 'ticket_create', 'web', 24, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(262, 'ticket_edit', 'web', 24, '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(263, 'ticket_show', 'web', 24, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(264, 'ticket_delete', 'web', 24, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(265, 'ticket_access', 'web', 24, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(266, 'ticket_assign_to', 'web', 24, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(267, 'payroll_access', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(268, 'salary_template_show', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(269, 'salary_template_edit', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(270, 'salary_template_create', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(271, 'salary_template_delete', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(272, 'salary_template_access', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(273, 'salary_deduction_create', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(274, 'salary_deduction_delete', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(275, 'salary_deduction_access', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(276, 'salary_payment_create', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(277, 'salary_payment_edit', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(278, 'salary_payment_show', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(279, 'salary_payment_delete', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(280, 'salary_payment_access', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(281, 'salary_payment_detail_create', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(282, 'salary_payment_detail_delete', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(283, 'salary_payment_detail_access', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(284, 'salary_payslip_create', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(285, 'salary_payslip_edit', 'web', 25, '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(286, 'salary_payslip_show', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(287, 'salary_payslip_delete', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(288, 'salary_payslip_access', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(289, 'hourly_rate_create', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(290, 'hourly_rate_edit', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(291, 'hourly_rate_delete', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(292, 'hourly_rate_access', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(293, 'online_payment_create', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(294, 'online_payment_delete', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(295, 'online_payment_access', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(296, 'salary_payment_detail_show', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(297, 'payroll_summary', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(298, 'advance_salary_create', 'web', 25, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(299, 'vacation_create', 'web', 26, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(300, 'vacation_edit', 'web', 26, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(301, 'vacation_show', 'web', 26, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(302, 'vacation_delete', 'web', 26, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(303, 'vacation_access', 'web', 26, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(304, 'set_time_create', 'web', 27, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(305, 'set_time_edit', 'web', 27, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(306, 'set_time_show', 'web', 27, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(307, 'set_time_delete', 'web', 27, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(308, 'set_time_access', 'web', 27, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(309, 'countries_create', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(310, 'countries_edit', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(311, 'countries_show', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(312, 'countries_delete', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(313, 'countries_access', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(314, 'types_create', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(315, 'types_delete', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(316, 'types_access', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(317, 'result_create', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(318, 'result_delete', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(319, 'result_access', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(320, 'calls_create', 'web', 28, '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(321, 'calls_delete', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(322, 'calls_access', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(323, 'Finalresults_create', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(324, 'Finalresults_delete', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(325, 'Finalresults_access', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(326, 'lead_create', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(327, 'lead_edit', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(328, 'lead_show', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(329, 'lead_delete', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(330, 'lead_access', 'web', 28, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(331, 'client_create', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(332, 'client_edit', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(333, 'client_show', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(334, 'client_delete', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(335, 'client_access', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(336, 'client_menu_create', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(337, 'client_menu_edit', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(338, 'client_menu_show', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(339, 'client_menu_delete', 'web', 29, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(340, 'meeting_minute_create', 'web', 30, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(341, 'meeting_minute_edit', 'web', 30, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(342, 'meeting_minute_show', 'web', 30, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(343, 'meeting_minute_delete', 'web', 30, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(344, 'meeting_minute_access', 'web', 30, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(345, 'project_management_access', 'web', 31, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(346, 'project_create', 'web', 31, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(347, 'project_edit', 'web', 31, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(348, 'project_show', 'web', 31, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(349, 'project_delete', 'web', 31, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(350, 'project_access', 'web', 31, '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(351, 'project_setting_create', 'web', 31, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(352, 'project_setting_delete', 'web', 31, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(353, 'project_setting_access', 'web', 31, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(354, 'project_assign_to', 'web', 31, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(355, 'account_create', 'web', 32, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(356, 'account_edit', 'web', 32, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(357, 'account_show', 'web', 32, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(358, 'account_delete', 'web', 32, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(359, 'account_access', 'web', 32, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(360, 'force-delete-banks', 'web', 32, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(361, 'materials_supplier_access', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(362, 'supplier_access', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(363, 'supplier_index', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(364, 'supplier_create', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(365, 'supplier_edit', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(366, 'supplier_profile', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(367, 'supplier_delete', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(368, 'supplier_restore', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(369, 'supplier_force_delete', 'web', 33, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(370, 'tax_rate_access', 'web', 34, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(371, 'tax_rate_index', 'web', 34, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(372, 'tax_rate_create', 'web', 34, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(373, 'tax_rate_edit', 'web', 34, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(374, 'tax_rate_delete', 'web', 34, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(375, 'customer_group_access', 'web', 35, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(376, 'customer_group_index', 'web', 35, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(377, 'customer_group_create', 'web', 35, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(378, 'customer_group_edit', 'web', 35, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(379, 'customer_group_delete', 'web', 35, '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(380, 'purchase_payment_access', 'web', 36, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(381, 'purchase_payment_index', 'web', 36, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(382, 'purchase_payment_create', 'web', 36, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(383, 'purchase_payment_edit', 'web', 36, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(384, 'purchase_payment_delete', 'web', 36, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(385, 'purchase_access', 'web', 37, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(386, 'purchase_create', 'web', 37, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(387, 'purchase_edit', 'web', 37, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(388, 'purchase_show', 'web', 37, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(389, 'purchase_delete', 'web', 37, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(390, 'time_sheet_access', 'web', 38, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(391, 'time_sheet_index', 'web', 38, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(392, 'time_sheet_create', 'web', 38, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(393, 'time_sheet_edit', 'web', 38, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(394, 'time_sheet_delete', 'web', 38, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(395, 'project_report_access', 'web', 39, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(396, 'task_report_access', 'web', 39, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(397, 'bug_report_access', 'web', 39, '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(398, 'ticket_report_access', 'web', 39, '2021-02-09 10:23:31', '2021-02-09 10:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user_managements', '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(2, 'crm', '2021-02-09 10:23:20', '2021-02-09 10:23:20'),
(3, 'website_settings', '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(4, 'hr', '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(5, 'finance', '2021-02-09 10:23:21', '2021-02-09 10:23:21'),
(6, 'penalty_category', '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(7, 'evaluation', '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(8, 'time_management', '2021-02-09 10:23:22', '2021-02-09 10:23:22'),
(9, 'task_management', '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(10, 'user_alerts', '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(11, 'departments', '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(12, 'designations', '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(13, 'users', '2021-02-09 10:23:23', '2021-02-09 10:23:23'),
(14, 'requests', '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(15, 'leaves', '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(16, 'attendances', '2021-02-09 10:23:24', '2021-02-09 10:23:24'),
(17, 'jobs', '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(18, 'proposals', '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(19, 'proposals_item', '2021-02-09 10:23:25', '2021-02-09 10:23:25'),
(20, 'opportunity', '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(21, 'work_tracking', '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(22, 'milestones', '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(23, 'bugs', '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(24, 'tickets', '2021-02-09 10:23:26', '2021-02-09 10:23:26'),
(25, 'payroll', '2021-02-09 10:23:27', '2021-02-09 10:23:27'),
(26, 'vacations', '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(27, 'set_time', '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(28, 'leads', '2021-02-09 10:23:28', '2021-02-09 10:23:28'),
(29, 'clients', '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(30, 'meetings', '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(31, 'projects', '2021-02-09 10:23:29', '2021-02-09 10:23:29'),
(32, 'banks', '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(33, 'suppliers', '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(34, 'tax_rate', '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(35, 'customer_group', '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(36, 'purchase_payment', '2021-02-09 10:23:30', '2021-02-09 10:23:30'),
(37, 'purchase', '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(38, 'time_sheet', '2021-02-09 10:23:31', '2021-02-09 10:23:31'),
(39, 'reports', '2021-02-09 10:23:31', '2021-02-09 10:23:31');

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
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calculate_progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `actual_completion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_overdue` int(11) NOT NULL DEFAULT 0,
  `project_cost` double(15,2) DEFAULT NULL,
  `demo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timer_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timer_started_by` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `logged_time` time DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_settings` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `with_tasks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `estimate_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_account_details_pivot`
--

CREATE TABLE `project_account_details_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `account_details_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` decimal(15,2) DEFAULT NULL,
  `total_cost_price` decimal(15,2) DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_sent` date DEFAULT NULL,
  `proposal_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert_module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `convert_module_id` int(11) DEFAULT NULL,
  `converted_date` date DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount` decimal(15,2) DEFAULT NULL,
  `discount_total` decimal(15,2) DEFAULT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `show_quantity_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed_cmments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposal_validity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materials_supply_delivery` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintenance_service_contract` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
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
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(15,2) DEFAULT NULL,
  `unit_cost` double(15,2) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `selling_price` decimal(15,2) DEFAULT NULL,
  `total_cost_price` decimal(15,2) DEFAULT NULL,
  `tax_rate` double(15,2) DEFAULT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_total` decimal(15,2) DEFAULT NULL,
  `tax_cost` decimal(15,2) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_item_taxs`
--

CREATE TABLE `proposal_item_taxs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_cost` decimal(15,2) DEFAULT NULL,
  `taxs_id` int(10) UNSIGNED DEFAULT NULL,
  `proposals_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `paid_to` int(11) DEFAULT NULL,
  `paid_by` int(11) DEFAULT NULL,
  `purchase_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `rating_evaluations`
--

CREATE TABLE `rating_evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', NULL, NULL),
(2, 'Super Admin', 'web', NULL, NULL),
(3, 'User', 'web', NULL, NULL),
(4, 'Board Members', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_allowances`
--

CREATE TABLE `salary_allowances` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_template_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_deductions`
--

CREATE TABLE `salary_deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_template_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_payments`
--

CREATE TABLE `salary_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fine_deduction` double(8,2) NOT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_date` timestamp NULL DEFAULT NULL,
  `deduct_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
  `overtime_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_templates`
--

INSERT INTO `salary_templates` (`id`, `salary_grade`, `basic_salary`, `overtime_salary`, `designation_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Operations Manager', '13200', '0', 1, NULL, NULL, NULL),
(3, 'Senior Back End Developer', '8800', '0', 15, NULL, NULL, NULL),
(4, 'IT Technical Manager', '22000', '0', 2, NULL, NULL, NULL),
(5, 'Site Engineer', '6600', '0', 17, NULL, NULL, NULL),
(6, 'Network Technician', '4950', '0', 18, NULL, NULL, NULL),
(7, 'Senior Sales Account Manager', '12700', '0', 21, NULL, NULL, NULL),
(8, 'Electrician', '4400', '0', 19, NULL, NULL, NULL),
(9, 'Sales & Admin Coordinator', '11000', '0', 21, NULL, NULL, NULL),
(10, 'Telemarketing', '4400', '0', 18, NULL, NULL, NULL),
(11, 'Junior Back End Developer', '5500', '0', 26, NULL, NULL, NULL),
(12, 'Junior Sales', '7150', '0', 20, NULL, NULL, NULL),
(13, 'Senior Android Developer', '9900', '0', 21, NULL, NULL, NULL),
(14, 'Junior UI/UX Designer', '5500', '0', 23, NULL, NULL, NULL),
(15, 'Back End Developer', '7150', '0', 28, NULL, NULL, NULL),
(16, 'Senior Mobile Developer', '8800', '0', 29, NULL, NULL, NULL),
(17, 'Software Team Leader', '12100', '0', 30, NULL, NULL, NULL),
(18, 'UI/UX Designer', '6600', '0', 23, NULL, NULL, NULL),
(19, 'Junior Front End Developer', '5500', '0', 31, NULL, NULL, NULL),
(22, 'Junior Mobile App Developer', '5500', '0', 29, NULL, NULL, NULL),
(23, 'Mobile App Developer', '7150', '0', 29, NULL, NULL, NULL);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `allow_clock_in_late` time DEFAULT NULL,
  `allow_leave_early` time DEFAULT NULL,
  `deduction_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `stock_sub_category_id` int(10) UNSIGNED NOT NULL,
  `buying_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_category_id` int(10) UNSIGNED NOT NULL
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
  `customer_group_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `calculate_progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `assigned_to_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `milestone_id` int(10) UNSIGNED DEFAULT NULL,
  `opportunities_id` int(10) UNSIGNED DEFAULT NULL,
  `work_tracking_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_task_id` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_account_details_pivot`
--

CREATE TABLE `task_account_details_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `account_details_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_attachments`
--

CREATE TABLE `task_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `task_tags`
--

CREATE TABLE `task_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Dumping data for table `tax_rates`
--

INSERT INTO `tax_rates` (`id`, `name`, `rate_percent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Egyptian Tax Rate', 14.00, NULL, NULL, NULL),
(2, 'without  VAT', 0.00, NULL, NULL, NULL);

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
  `subject_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporter` int(11) DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_account_details_pivot`
--

CREATE TABLE `ticket_account_details_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `account_details_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replays`
--

CREATE TABLE `ticket_replays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED DEFAULT NULL,
  `ticket_replay_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replier_id` int(10) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `time_sheets`
--

CREATE TABLE `time_sheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_field_id` int(10) UNSIGNED DEFAULT NULL,
  `timer_status` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_work_types`
--

CREATE TABLE `time_work_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `expense_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userables`
--

CREATE TABLE `userables` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `userable_id` int(11) NOT NULL,
  `userable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_time_id` int(10) UNSIGNED DEFAULT NULL,
  `job_type` enum('full_time','part_time','freelance') COLLATE utf8mb4_unicode_ci DEFAULT 'full_time',
  `activated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `banned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `ban_reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `username`, `set_time_id`, `job_type`, `activated`, `banned`, `ban_reason`, `last_ip`, `last_login`, `online_time`, `smtp_email_type`, `smtp_encryption`, `smtp_action`, `smtp_host_name`, `smtp_user_name`, `smtp_password`, `smtp_port`, `smtp_additional_flag`, `last_postmaster_run`, `media_path_slug`, `marketing_username`, `marketing_password`, `marketing_type`, `sp_username`, `sp_password`, `vacation_balance`, `vacation_counterdown`, `date_of_join`, `date_of_insurance`, `vacation_verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$QxMncKe0p9EtLL78bZnq9ugsdxatAHtvpFxTG8h3uDYaLk90ZfCWW', NULL, NULL, NULL, 'full_time', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'mosayed', 'mohab@onetecgroup.com', NULL, '$2y$10$QtkRcnFgLNae9yHeLsI2w.mERNp7i85ltcFTWHRPD4kwFDi6sjH7G', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'mayman', 'mayman@onetecgroup.com', NULL, '$2y$10$N3zG.j8kHgyNKCKkSm/YjOfTYZg7cPwev8jG1WdEz.LyMzhy2Swti', NULL, NULL, NULL, 'full_time', '1', '1', 'Terminated', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'abozeid', 'abozeid@onetecgroup.com', NULL, '$2y$10$VTxEO5bh6lPKLOl13wC2t.4MGZgK/7L6eNK91h.HAwnJ/Fp9NdVH6', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'weltaweel', 'weltaweel@onetecgroup.com', NULL, '$2y$10$R8BIHDGESA1UOTmy5dxpF.sKX1Cus7hRjhWyy7CNcRaVqn8zEU8zm', NULL, NULL, NULL, 'full_time', '1', '1', 'Resigned', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'cfo', 'cfo@onetecgroup.com', NULL, '$2y$10$BpaigbWJm7Wd87hy..eOZOHI0VHf7Pp0mChwff.GsSU8zEDd5/vqO', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Ismael', 'Ismaeleffat@gmail.com', NULL, '$2y$10$U9U8UqZWCTPhMQTNbTFT5ON2NpAnyMBYBRTIj44XmdJxfF9hTvXQy', NULL, NULL, NULL, 'full_time', '1', '0', 'NULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'AhmedAyad', 'a.ayad@pcasa', NULL, '$2y$10$n1OSvFSPYCZ6Va0LHCMwVuJblVbCLr6TEVmcOBs0VPvW3HipQSopq', NULL, NULL, NULL, 'full_time', '1', '0', 'NULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Ahmed Emara', 'emara@stallingkott.ae', NULL, '$2y$10$.Umh4kRLqBr2E5brxwC5f.ZMxKB9OHDjEh5C45N147my6EFDnxQCq', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'ceo', 'ceo@onetecgroup.com', NULL, '$2y$10$eGDIc5I/imu8sI/9wB7x9.db3CGpA/5Q0Mxt.atZmGInx4A63gx8a', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'msaleh', 'msaleh@onetecgroup.com', NULL, '$2y$10$zMcvpsYECJ7Pt9pKU3DPxOXsw4NNIBK5XWPf1n/28QkIwnp0LeSJ.', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'sahamid', 'sahamid@onetecgroup.com', NULL, '$2y$10$0hLRCsFQNwksBDYeCfmp2uUXy73tHlun1U1OzWHcA8O.RW1AF/VLG', NULL, NULL, NULL, 'full_time', '1', '1', 'Resigned', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'aragab', 'aragab@onetecgroup.com', NULL, '$2y$10$6.5F/xGiRCSgsWxzTt6eb.VnctO0Dh.LXO2J72OVn8ouBdO5JsEGy', NULL, NULL, NULL, 'full_time', '1', '1', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'redamohamed', 'rmohamed@onetecgroup.com', NULL, '$2y$10$7AY07i9hK2/UR.Z5AxHqAOOIFtI5BcsalSu.LOYPwYGei2qQsG8ma', NULL, NULL, NULL, 'full_time', '1', '1', 'Resigned', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'afawzy', 'afawzy@onetecgroup.com', NULL, '$2y$10$825SxW1tt7ifI/w/idrJOO8GIm.chMqMP5K7MXrSsw48QSRoG1dou', NULL, NULL, NULL, 'full_time', '1', '1', 'He', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'ghadawagih', 'ghada@onetecgroup.com', NULL, '$2y$10$e5TUF1VRu4m.xGrBtXmL6uRUg8eOt/rzy45wLNboh4JXFGxIgfB02', NULL, NULL, NULL, 'full_time', '1', '1', 'Left', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'norhan', 'norhan@onetecgroup.com', NULL, '$2y$10$PG.sqq/58Q0TU2mz7jGGo.ihcKsWJfbXLPo/UdOrEALa43pMYyGvm', NULL, NULL, NULL, 'full_time', '1', '1', 'Resigned', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'marwa', 'marwa@onetecgroup.com', NULL, '$2y$10$GUnDM.NVmPB44VAIZOLxfe6CXlxEtaPaUVJaqUmvLpcmtt3P8kpwO', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'shrouk', 'shrouk@onetecgroup.com', NULL, '$2y$10$yKzS5GGbj7UmlMmydP0/zuKWmQBb1Aiu5VamPnMT8fQ2n6XMxsVVa', NULL, NULL, NULL, 'full_time', '1', '1', 'Terminated', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'moaaz', 'moaaz@onetecgroup.com', NULL, '$2y$10$WJz1WCna8n63ZMJNtMmrDO5dc0uucZHXjP/4BKanDMxTJDSPXvLKu', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Valuecamps', 'camps@valid.com', NULL, '$2y$10$Y3TN7.QgK2.eBqBrFhBd0u5nTsG2kkZoH3IttZu8Y0H6EOSnVtSlS', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'aaaaa', 'n.gamal@lesaffre', NULL, '$2y$10$lx2PMiXZML/bqY/w0MfxYuRnsLHL6Y.xvllxSMV0.5N0FSbpGS/cG', NULL, NULL, NULL, 'full_time', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'ahmedradwan98', 'radwan@onetecgroup.com', NULL, '$2y$10$rR5GfEq/5R0AUORiSgQCyeJN7N22KRnvIjNNYsR63q/.NOOgh24au', NULL, NULL, NULL, 'full_time', '1', '1', 'Resigned', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'nana', 'na@na.com', NULL, '$2y$10$czlQLTL0D7TEoO78Bjk/UurUm/xEsBluTvuCGQmW86pSUeRr9Zjk.', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'hamed', 'hamed@onetecgroup.com', NULL, '$2y$10$VbosvzFV65vn4Kp7onDVrOjRv2A.9I9PJBIF1TDpCTfYr7f67JxNK', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'ahmedfaruk', 'saidahmedfarouka@gmail.com', NULL, '$2y$10$w8x4AYI2o24D7rB9DABT6uvxVxpMzTlp.7XmE5VgESUQqi8G3WUMu', NULL, NULL, NULL, 'full_time', '1', '0', 'ULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Mahmoud', 'mahmoudsaidelbokl@gmail.com', NULL, '$2y$10$4vxohXNMJIDjVPNdU.A7yuKc8Q8S2JkN8srrQBwwPD8d8nZFFsF8O', NULL, NULL, NULL, 'full_time', '1', '0', 'NULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'mostafa', 'm.elgammal@onetecgroup', NULL, '$2y$10$UTvrseBhHiuabj/Z7X5uxOanbEAK9btcrGsWUdC1xEtN46sUUgk26', NULL, NULL, NULL, 'full_time', '1', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'shady', 'shady.osama@onetecgroup', NULL, '$2y$10$gCyu51mduinfGA8/y.9HgOtguPPz19D6EKgl/q5pTdLElbcNQSd2i', NULL, NULL, NULL, 'full_time', '1', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'ali', 'ali.emad@onetecgroup', NULL, '$2y$10$QcqsbwAlrvUXhLVDvkkqweanSXq38qkGYCGGl.L8slALm7DQ6E0lS', NULL, NULL, NULL, 'full_time', '1', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `work_trackings`
--

CREATE TABLE `work_trackings` (
  `id` int(10) UNSIGNED NOT NULL,
  `achievement` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_work_achive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_work_not_achive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_send` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_type_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `subject_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_tracking_account_details_pivot`
--

CREATE TABLE `work_tracking_account_details_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_tracking_id` int(10) UNSIGNED NOT NULL,
  `account_details_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  ADD UNIQUE KEY `accounts_name_unique` (`name`);

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_2176850` (`user_id`);

--
-- Indexes for table `assign_stocks`
--
ALTER TABLE `assign_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_stocks_user_id_foreign` (`user_id`),
  ADD KEY `assign_stocks_stock_id_foreign` (`stock_id`),
  ADD KEY `assign_stocks_sub_category_id_foreign` (`sub_category_id`);

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
-- Indexes for table `bug_account_details_pivot`
--
ALTER TABLE `bug_account_details_pivot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calls_result_id_foreign` (`result_id`),
  ADD KEY `calls_lead_id_foreign` (`lead_id`),
  ADD KEY `calls_opportunities_id_foreign` (`opportunities_id`),
  ADD KEY `calls_client_id_foreign` (`client_id`);

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
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
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposit_category_fk_2281155` (`deposit_category_id`),
  ADD KEY `deposits_paid_by_id_foreign` (`paid_by_id`),
  ADD KEY `deposits_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `deposits_account_id_foreign` (`account_id`),
  ADD KEY `deposits_created_by_foreign` (`created_by`);

--
-- Indexes for table `deposit_categories`
--
ALTER TABLE `deposit_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_username_unique` (`username`);

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
-- Indexes for table `employee_requests`
--
ALTER TABLE `employee_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_rating_evaluation`
--
ALTER TABLE `evaluation_rating_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_category_fk_2281155` (`expense_category_id`),
  ADD KEY `expenses_paid_by_id_foreign` (`paid_by_id`),
  ADD KEY `expenses_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `expenses_account_id_foreign` (`account_id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`);

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
-- Indexes for table `final_results`
--
ALTER TABLE `final_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `final_results_lead_id_foreign` (`lead_id`);

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
  ADD KEY `project_fk_2177096` (`project_id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoice_item_taxs`
--
ALTER TABLE `invoice_item_taxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_item_taxs_taxs_id_foreign` (`taxs_id`),
  ADD KEY `invoice_item_taxs_invoices_id_foreign` (`invoices_id`),
  ADD KEY `invoice_item_taxs_item_id_foreign` (`item_id`);

--
-- Indexes for table `item_invoice_relations`
--
ALTER TABLE `item_invoice_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_invoice_relations_invoices_id_foreign` (`invoices_id`),
  ADD KEY `item_invoice_relations_item_id_foreign` (`item_id`);

--
-- Indexes for table `item_porposal_relations`
--
ALTER TABLE `item_porposal_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_porposal_relations_proposals_id_foreign` (`proposals_id`),
  ADD KEY `item_porposal_relations_item_id_foreign` (`item_id`);

--
-- Indexes for table `item_purchase`
--
ALTER TABLE `item_purchase`
  ADD KEY `item_purchase_item_id_foreign` (`item_id`),
  ADD KEY `item_purchase_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `item_purchase_tax`
--
ALTER TABLE `item_purchase_tax`
  ADD KEY `item_purchase_tax_item_id_foreign` (`item_id`),
  ADD KEY `item_purchase_tax_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_circulars`
--
ALTER TABLE `job_circulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_categories`
--
ALTER TABLE `kb_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kb_categories_name_unique` (`name`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_type_id_foreign` (`type_id`),
  ADD KEY `leads_first_call_result_id_foreign` (`first_call_result_id`),
  ADD KEY `leads_second_call_result_id_foreign` (`second_call_result_id`);

--
-- Indexes for table `lead_users`
--
ALTER TABLE `lead_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_users_lead_id_foreign` (`lead_id`),
  ADD KEY `lead_users_user_id_foreign` (`user_id`);

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
-- Indexes for table `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
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
  ADD KEY `project_fk_2176531` (`project_id`);

--
-- Indexes for table `milestone_account_details_pivot`
--
ALTER TABLE `milestone_account_details_pivot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notifications_x1`
--
ALTER TABLE `notifications_x1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_x1_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_permission_group_id_foreign` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `projects_name_en_unique` (`name_en`),
  ADD UNIQUE KEY `projects_name_ar_unique` (`name_ar`),
  ADD KEY `client_fk_2176360` (`client_id`);

--
-- Indexes for table `project_account_details_pivot`
--
ALTER TABLE `project_account_details_pivot`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_user_id_foreign` (`user_id`);

--
-- Indexes for table `proposals_items`
--
ALTER TABLE `proposals_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_items_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `proposals_items_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `proposal_item_taxs`
--
ALTER TABLE `proposal_item_taxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_item_taxs_taxs_id_foreign` (`taxs_id`),
  ADD KEY `proposal_item_taxs_proposals_id_foreign` (`proposals_id`),
  ADD KEY `proposal_item_taxs_item_id_foreign` (`item_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rating_evaluations`
--
ALTER TABLE `rating_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary_allowances`
--
ALTER TABLE `salary_allowances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_template_fk_2181297` (`salary_template_id`);

--
-- Indexes for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `stock_sub_category_fk_2181050` (`stock_sub_category_id`),
  ADD KEY `stocks_stock_category_id_foreign` (`stock_category_id`);

--
-- Indexes for table `stock_categories`
--
ALTER TABLE `stock_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_sub_categories`
--
ALTER TABLE `stock_sub_categories`
  ADD PRIMARY KEY (`id`),
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
  ADD KEY `assigned_to_fk_2165611` (`assigned_to_id`),
  ADD KEY `project_fk_2176616` (`project_id`),
  ADD KEY `milestone_fk_2176617` (`milestone_id`),
  ADD KEY `opportunities_fk_2176618` (`opportunities_id`),
  ADD KEY `work_tracking_fk_2176619` (`work_tracking_id`),
  ADD KEY `lead_fk_2176628` (`lead_id`);

--
-- Indexes for table `task_account_details_pivot`
--
ALTER TABLE `task_account_details_pivot`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_account_details_pivot`
--
ALTER TABLE `ticket_account_details_pivot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `time_sheets`
--
ALTER TABLE `time_sheets`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_method_fk_2179000` (`payment_method_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_tracking_account_details_pivot`
--
ALTER TABLE `work_tracking_account_details_pivot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_stocks`
--
ALTER TABLE `assign_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `bug_account_details_pivot`
--
ALTER TABLE `bug_account_details_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_menus`
--
ALTER TABLE `client_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `crm_customers`
--
ALTER TABLE `crm_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_documents`
--
ALTER TABLE `crm_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_notes`
--
ALTER TABLE `crm_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_statuses`
--
ALTER TABLE `crm_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_attendances`
--
ALTER TABLE `daily_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboard_settings`
--
ALTER TABLE `dashboard_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_categories`
--
ALTER TABLE `deposit_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_awards`
--
ALTER TABLE `employee_awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_banks`
--
ALTER TABLE `employee_banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_requests`
--
ALTER TABLE `employee_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_rating_evaluation`
--
ALTER TABLE `evaluation_rating_evaluation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_results`
--
ALTER TABLE `final_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fingerprint_attendances`
--
ALTER TABLE `fingerprint_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hourly_rates`
--
ALTER TABLE `hourly_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interested_ins`
--
ALTER TABLE `interested_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_item_taxs`
--
ALTER TABLE `invoice_item_taxs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_invoice_relations`
--
ALTER TABLE `item_invoice_relations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_porposal_relations`
--
ALTER TABLE `item_porposal_relations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_circulars`
--
ALTER TABLE `job_circulars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kb_categories`
--
ALTER TABLE `kb_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_users`
--
ALTER TABLE `lead_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_categories`
--
ALTER TABLE `leave_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_minutes`
--
ALTER TABLE `meeting_minutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milestone_account_details_pivot`
--
ALTER TABLE `milestone_account_details_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_attendances`
--
ALTER TABLE `monthly_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications_x1`
--
ALTER TABLE `notifications_x1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_payments`
--
ALTER TABLE `online_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunities`
--
ALTER TABLE `opportunities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outgoing_emails`
--
ALTER TABLE `outgoing_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penalty_categories`
--
ALTER TABLE `penalty_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_indicators`
--
ALTER TABLE `performance_indicators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `private_chats`
--
ALTER TABLE `private_chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_account_details_pivot`
--
ALTER TABLE `project_account_details_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_settings`
--
ALTER TABLE `project_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals_items`
--
ALTER TABLE `proposals_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_item_taxs`
--
ALTER TABLE `proposal_item_taxs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_messages`
--
ALTER TABLE `qa_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_topics`
--
ALTER TABLE `qa_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_details`
--
ALTER TABLE `quotation_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_forms`
--
ALTER TABLE `quotation_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_evaluations`
--
ALTER TABLE `rating_evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_stocks`
--
ALTER TABLE `return_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_allowances`
--
ALTER TABLE `salary_allowances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_deductions`
--
ALTER TABLE `salary_deductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_payments`
--
ALTER TABLE `salary_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_payment_allowances`
--
ALTER TABLE `salary_payment_allowances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_payment_deductions`
--
ALTER TABLE `salary_payment_deductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_payment_details`
--
ALTER TABLE `salary_payment_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_payslips`
--
ALTER TABLE `salary_payslips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_templates`
--
ALTER TABLE `salary_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `salutations`
--
ALTER TABLE `salutations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_times`
--
ALTER TABLE `set_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_categories`
--
ALTER TABLE `stock_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_sub_categories`
--
ALTER TABLE `stock_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_account_details_pivot`
--
ALTER TABLE `task_account_details_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_attachments`
--
ALTER TABLE `task_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_tags`
--
ALTER TABLE `task_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_uploaded_files`
--
ALTER TABLE `task_uploaded_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technical_categories`
--
ALTER TABLE `technical_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_account_details_pivot`
--
ALTER TABLE `ticket_account_details_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_entries`
--
ALTER TABLE `time_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_projects`
--
ALTER TABLE `time_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_sheets`
--
ALTER TABLE `time_sheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_work_types`
--
ALTER TABLE `time_work_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userables`
--
ALTER TABLE `userables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_trackings`
--
ALTER TABLE `work_trackings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_tracking_account_details_pivot`
--
ALTER TABLE `work_tracking_account_details_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `user_fk_2176850` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `assign_stocks`
--
ALTER TABLE `assign_stocks`
  ADD CONSTRAINT `assign_stocks_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`),
  ADD CONSTRAINT `assign_stocks_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `stock_sub_categories` (`id`),
  ADD CONSTRAINT `assign_stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bugs`
--
ALTER TABLE `bugs`
  ADD CONSTRAINT `opportunities_fk_2176552` FOREIGN KEY (`opportunities_id`) REFERENCES `opportunities` (`id`),
  ADD CONSTRAINT `project_fk_2176551` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `task_fk_2176553` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `calls_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `calls_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_opportunities_id_foreign` FOREIGN KEY (`opportunities_id`) REFERENCES `opportunities` (`id`),
  ADD CONSTRAINT `calls_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `status_fk_2182725` FOREIGN KEY (`status_id`) REFERENCES `account_details` (`id`);

--
-- Constraints for table `crm_customers`
--
ALTER TABLE `crm_customers`
  ADD CONSTRAINT `status_fk_2159269` FOREIGN KEY (`status_id`) REFERENCES `crm_statuses` (`id`);

--
-- Constraints for table `crm_documents`
--
ALTER TABLE `crm_documents`
  ADD CONSTRAINT `customer_fk_2159286` FOREIGN KEY (`customer_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `crm_notes`
--
ALTER TABLE `crm_notes`
  ADD CONSTRAINT `customer_fk_2159280` FOREIGN KEY (`customer_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `user_fk_2182335` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `daily_attendances`
--
ALTER TABLE `daily_attendances`
  ADD CONSTRAINT `user_fk_2168401` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposit_category_fk_2281155` FOREIGN KEY (`deposit_category_id`) REFERENCES `deposit_categories` (`id`),
  ADD CONSTRAINT `deposits_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deposits_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deposits_paid_by_id_foreign` FOREIGN KEY (`paid_by_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deposits_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_awards`
--
ALTER TABLE `employee_awards`
  ADD CONSTRAINT `user_fk_2168023` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_banks`
--
ALTER TABLE `employee_banks`
  ADD CONSTRAINT `user_fk_2180883` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expense_category_fk_2281155` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`),
  ADD CONSTRAINT `expenses_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_paid_by_id_foreign` FOREIGN KEY (`paid_by_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `project_fk_2182388` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `final_results`
--
ALTER TABLE `final_results`
  ADD CONSTRAINT `final_results_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `income_category_fk_2281163` FOREIGN KEY (`income_category_id`) REFERENCES `income_categories` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `client_fk_2177095` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_fk_2177096` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `invoice_item_taxs`
--
ALTER TABLE `invoice_item_taxs`
  ADD CONSTRAINT `invoice_item_taxs_invoices_id_foreign` FOREIGN KEY (`invoices_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_item_taxs_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item_invoice_relations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_item_taxs_taxs_id_foreign` FOREIGN KEY (`taxs_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_invoice_relations`
--
ALTER TABLE `item_invoice_relations`
  ADD CONSTRAINT `item_invoice_relations_invoices_id_foreign` FOREIGN KEY (`invoices_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_invoice_relations_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `proposals_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_porposal_relations`
--
ALTER TABLE `item_porposal_relations`
  ADD CONSTRAINT `item_porposal_relations_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `proposals_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_porposal_relations_proposals_id_foreign` FOREIGN KEY (`proposals_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_purchase`
--
ALTER TABLE `item_purchase`
  ADD CONSTRAINT `item_purchase_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `proposals_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_purchase_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_purchase_tax`
--
ALTER TABLE `item_purchase_tax`
  ADD CONSTRAINT `item_purchase_tax_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `proposals_items` (`id`),
  ADD CONSTRAINT `item_purchase_tax_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax_rates` (`id`);

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_first_call_result_id_foreign` FOREIGN KEY (`first_call_result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_second_call_result_id_foreign` FOREIGN KEY (`second_call_result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_users`
--
ALTER TABLE `lead_users`
  ADD CONSTRAINT `lead_users_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD CONSTRAINT `leave_category_fk_2167933` FOREIGN KEY (`leave_category_id`) REFERENCES `leave_categories` (`id`),
  ADD CONSTRAINT `user_fk_2167932` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `meeting_minutes`
--
ALTER TABLE `meeting_minutes`
  ADD CONSTRAINT `user_fk_2167949` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `project_fk_2176531` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `monthly_attendances`
--
ALTER TABLE `monthly_attendances`
  ADD CONSTRAINT `user_fk_2168451` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications_x1`
--
ALTER TABLE `notifications_x1`
  ADD CONSTRAINT `notifications_x1_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD CONSTRAINT `lead_fk_2172516` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`);

--
-- Constraints for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `user_fk_2165825` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `private_chats`
--
ALTER TABLE `private_chats`
  ADD CONSTRAINT `user_fk_2182506` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `client_fk_2176360` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `proposals_items`
--
ALTER TABLE `proposals_items`
  ADD CONSTRAINT `proposals_items_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`),
  ADD CONSTRAINT `proposals_items_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax_rates` (`id`);

--
-- Constraints for table `proposal_item_taxs`
--
ALTER TABLE `proposal_item_taxs`
  ADD CONSTRAINT `proposal_item_taxs_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item_porposal_relations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_item_taxs_proposals_id_foreign` FOREIGN KEY (`proposals_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_item_taxs_taxs_id_foreign` FOREIGN KEY (`taxs_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `supplier_fk_2178504` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `user_fk_2178512` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD CONSTRAINT `qa_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `qa_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `client_fk_2182700` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `user_fk_2182699` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quotation_details`
--
ALTER TABLE `quotation_details`
  ADD CONSTRAINT `quotation_fk_2182711` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

--
-- Constraints for table `quotation_forms`
--
ALTER TABLE `quotation_forms`
  ADD CONSTRAINT `user_fk_2182666` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `return_stocks`
--
ALTER TABLE `return_stocks`
  ADD CONSTRAINT `supplier_fk_2178565` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `user_fk_2178573` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salary_allowances`
--
ALTER TABLE `salary_allowances`
  ADD CONSTRAINT `salary_template_fk_2181297` FOREIGN KEY (`salary_template_id`) REFERENCES `salary_templates` (`id`);

--
-- Constraints for table `salary_payments`
--
ALTER TABLE `salary_payments`
  ADD CONSTRAINT `user_fk_2181366` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `salary_payment_allowances`
--
ALTER TABLE `salary_payment_allowances`
  ADD CONSTRAINT `salary_payment_fk_2181433` FOREIGN KEY (`salary_payment_id`) REFERENCES `salary_payments` (`id`);

--
-- Constraints for table `salary_payment_deductions`
--
ALTER TABLE `salary_payment_deductions`
  ADD CONSTRAINT `salary_payment_fk_2181502` FOREIGN KEY (`salary_payment_id`) REFERENCES `salary_payments` (`id`);

--
-- Constraints for table `salary_payment_details`
--
ALTER TABLE `salary_payment_details`
  ADD CONSTRAINT `salary_payment_fk_2181521` FOREIGN KEY (`salary_payment_id`) REFERENCES `salary_payments` (`id`);

--
-- Constraints for table `salary_payslips`
--
ALTER TABLE `salary_payslips`
  ADD CONSTRAINT `salary_payment_fk_2181529` FOREIGN KEY (`salary_payment_id`) REFERENCES `salary_payments` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stock_sub_category_fk_2181050` FOREIGN KEY (`stock_sub_category_id`) REFERENCES `stock_sub_categories` (`id`),
  ADD CONSTRAINT `stocks_stock_category_id_foreign` FOREIGN KEY (`stock_category_id`) REFERENCES `stock_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_sub_categories`
--
ALTER TABLE `stock_sub_categories`
  ADD CONSTRAINT `stock_category_fk_2180993` FOREIGN KEY (`stock_category_id`) REFERENCES `stock_categories` (`id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `customer_group_fk_2178477` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `assigned_to_fk_2165611` FOREIGN KEY (`assigned_to_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lead_fk_2176628` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`),
  ADD CONSTRAINT `milestone_fk_2176617` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`id`),
  ADD CONSTRAINT `opportunities_fk_2176618` FOREIGN KEY (`opportunities_id`) REFERENCES `opportunities` (`id`),
  ADD CONSTRAINT `project_fk_2176616` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `work_tracking_fk_2176619` FOREIGN KEY (`work_tracking_id`) REFERENCES `work_trackings` (`id`);

--
-- Constraints for table `task_attachments`
--
ALTER TABLE `task_attachments`
  ADD CONSTRAINT `bug_fk_2182415` FOREIGN KEY (`bug_id`) REFERENCES `bugs` (`id`),
  ADD CONSTRAINT `lead_fk_2182412` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`),
  ADD CONSTRAINT `opportunities_fk_2182413` FOREIGN KEY (`opportunities_id`) REFERENCES `opportunities` (`id`),
  ADD CONSTRAINT `project_fk_2182414` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `task_fk_2182408` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `user_fk_2182409` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `task_task_tag`
--
ALTER TABLE `task_task_tag`
  ADD CONSTRAINT `task_id_fk_2165608` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_tag_id_fk_2165608` FOREIGN KEY (`task_tag_id`) REFERENCES `task_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_uploaded_files`
--
ALTER TABLE `task_uploaded_files`
  ADD CONSTRAINT `task_attachment_fk_2182421` FOREIGN KEY (`task_attachment_id`) REFERENCES `task_attachments` (`id`);

--
-- Constraints for table `time_entries`
--
ALTER TABLE `time_entries`
  ADD CONSTRAINT `project_fk_2165588` FOREIGN KEY (`project_id`) REFERENCES `time_projects` (`id`),
  ADD CONSTRAINT `work_type_fk_2165587` FOREIGN KEY (`work_type_id`) REFERENCES `time_work_types` (`id`);

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `user_fk_2182544` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `user_fk_2166213` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `payment_method_fk_2179000` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`);

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_2165618` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_2165618` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vacations`
--
ALTER TABLE `vacations`
  ADD CONSTRAINT `user_fk_2181745` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
