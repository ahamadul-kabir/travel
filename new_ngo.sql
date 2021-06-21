-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 06:23 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_ngo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabin`
--

CREATE TABLE `cabin` (
  `id_cabin` int(11) NOT NULL,
  `id_patient` int(11) DEFAULT NULL,
  `cabin_name` varchar(250) NOT NULL,
  `rate` double NOT NULL,
  `booked_on` datetime DEFAULT NULL,
  `available_on` datetime DEFAULT NULL,
  `id_user_booked_by` int(11) DEFAULT NULL,
  `remark` text,
  `id_user` int(11) NOT NULL,
  `booking_status` enum('Booked','Available') DEFAULT 'Available',
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabin`
--

INSERT INTO `cabin` (`id_cabin`, `id_patient`, `cabin_name`, `rate`, `booked_on`, `available_on`, `id_user_booked_by`, `remark`, `id_user`, `booking_status`, `activation_status`, `create_date`, `update_date`) VALUES
(1, NULL, 'Single cabin - 1', 3000, '2020-10-01 00:00:00', '2020-10-04 12:32:00', 6, '', 1, 'Available', 'active', '2019-11-12 06:54:57', '2020-10-04 06:32:00'),
(2, 30238, 'Single cabin - 2', 3000, '2020-10-04 00:00:00', NULL, 8, '', 1, 'Booked', 'active', '2019-11-12 06:55:07', '2020-10-04 03:59:41'),
(3, NULL, 'Single cabin - 3', 3000, '2020-10-01 00:00:00', '2020-10-03 11:50:03', 7, '', 1, 'Available', 'active', '2019-11-12 06:55:16', '2020-10-03 05:50:03'),
(4, 30620, 'Semi cabin - 5A', 2000, '2020-10-06 00:00:00', NULL, 8, '', 1, 'Booked', 'active', '2019-11-12 06:55:36', '2020-10-06 03:45:28'),
(5, NULL, 'Semi C 5B', 2000, '2020-10-03 00:00:00', '2020-10-04 12:37:21', 3, '', 4, 'Available', 'active', '2019-11-12 06:55:48', '2020-10-04 06:37:21'),
(6, NULL, 'Semi cabin - 6A', 2000, '2020-10-03 00:00:00', '2020-10-06 11:55:25', 6, '', 1, 'Available', 'active', '2019-11-12 06:55:55', '2020-10-06 05:55:25'),
(7, 30690, 'Semi cabin - 6B', 2000, '2020-10-06 00:00:00', NULL, 3, '', 1, 'Booked', 'active', '2019-11-12 06:56:02', '2020-10-06 06:29:09'),
(8, NULL, 'Special cabin - 4', 5000, '2020-09-17 00:00:00', '2020-09-24 09:51:01', 5, '', 1, 'Available', 'active', '2019-11-12 06:56:18', '2020-09-24 03:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `caller_info`
--

CREATE TABLE `caller_info` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(15) NOT NULL,
  `call_before` enum('No','Yes','Not Asked','Refused to answer') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(3) NOT NULL,
  `district_id` int(2) NOT NULL,
  `thana_id` int(3) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `marital_status` enum('Unmarried','Married','Not asked','Refused to answer') NOT NULL,
  `source_of_knowing` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caller_info`
--

INSERT INTO `caller_info` (`id`, `unique_id`, `call_before`, `phone`, `email`, `name`, `age`, `district_id`, `thana_id`, `gender`, `marital_status`, `source_of_knowing`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, '1610257611545', 'No', '01987453409', 'admin@gb.net', 'Habib', 19, 28, 222, 'Male', 'Unmarried', 'GB project event', '2021-01-10 05:50:07', 1, '2021-01-16 09:52:52', 0, 'active'),
(2, '1610274566580', 'No', '01787453412', 'sa@ent.com', 'WASIM', 26, 33, 256, 'Male', 'Married', 'Website', '2021-01-10 10:30:47', 1, '2021-01-20 08:51:42', 0, 'active'),
(3, '1610445690329', 'No', '01987453412', 'sa2@ent.com', 'Monsura', 18, 47, 494, 'Female', 'Married', 'Friend', '2021-01-12 10:05:17', 1, '2021-01-16 10:25:31', 0, 'active'),
(4, '1610446226435', 'No', '01987453492', 'sa3@ent.com', 'Kabir', 22, 14, 126, 'Male', 'Not asked', 'Project staff', '2021-01-12 10:13:06', 1, '2021-01-16 07:08:11', 0, 'active'),
(5, '1610452882545', 'No', '01731042568', 'sa4@ent.com', 'Jumur', 16, 21, 181, 'Female', 'Married', 'Not asked', '2021-01-12 12:05:15', 1, '2021-01-16 07:08:19', 0, 'active'),
(6, '1610453525973', 'No', '01987453413', 'sa@ent.com', 'WASIM', 13, 35, 266, 'Male', 'Unmarried', 'Refused to answer', '2021-01-12 12:23:18', 1, '2021-01-16 07:08:21', 0, 'active'),
(7, '1610893196983', 'No', '01987443409', 'sa6@ent.com', 'Mong', 20, 9, 82, 'Male', 'Unmarried', 'Parents', '2021-01-17 14:21:20', 1, '0000-00-00 00:00:00', 0, 'active'),
(8, '1611050097536', 'No', '01987453408', 'sa7@ent.com', 'Sandip kumar', 22, 8, 75, 'Male', 'Married', 'Club member', '2021-01-19 09:56:55', 1, '0000-00-00 00:00:00', 0, 'active'),
(9, '1611241909668', 'No', '01513121416', 'sa7@ent.com', 'Miraj', 18, 14, 126, 'Male', 'Unmarried', 'Project staff', '2021-01-21 15:14:25', 1, '2021-01-23 09:03:33', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `caller_service`
--

CREATE TABLE `caller_service` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(15) NOT NULL,
  `medication` enum('No','Yes','Not Asked','Refused to answer') NOT NULL,
  `therapeutic` enum('No','Yes','Not Asked','Refused to answer') NOT NULL,
  `problem_description` text,
  `symptom` text,
  `action_taken` text,
  `risk_assessment` enum('Yes','No') DEFAULT NULL,
  `issue_of_counseling` enum('SRH','GBV','MH','GPH','FP','Other') NOT NULL,
  `services_of_refferral` enum('SRH','GBV','MH','GPH','FP','Other') DEFAULT NULL,
  `reason_of_refferral` text,
  `referral_id` int(11) DEFAULT NULL,
  `call_duration` varchar(100) NOT NULL,
  `caller_feeling` varchar(100) NOT NULL,
  `call_type` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caller_service`
--

INSERT INTO `caller_service` (`id`, `unique_id`, `medication`, `therapeutic`, `problem_description`, `symptom`, `action_taken`, `risk_assessment`, `issue_of_counseling`, `services_of_refferral`, `reason_of_refferral`, `referral_id`, `call_duration`, `caller_feeling`, `call_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, '1610257611545', 'No', 'No', 'west dream', 'west dream', 'nothing', 'Yes', 'Other', 'Other', 'no, anywhere', 7, '0-5 minutes', 'Satisfactory', 'information-call', '2020-12-09 19:20:20', 1, '2021-01-20 07:16:26', 0, 'active'),
(2, '1610257611545', 'No', 'No', 'Nothing', 'Nothing', 'Nothing', 'No', 'SRH', 'GBV', 'Nothing', 4, '11-15 minutes', 'Confusing', 'information-call', '2021-01-10 05:58:16', 6, '2021-01-13 05:26:50', 0, 'active'),
(3, '1610274566580', 'No', 'No', 'Nothing', 'Nothing', 'Nothing', 'Yes', 'MH', 'GPH', 'Nothing', 8, '6-10 minutes', 'Satisfactory', 'incomplete', '2021-01-10 10:30:47', 1, '0000-00-00 00:00:00', 0, 'active'),
(4, '1610274566580', 'No', 'No', 'Curiosity', 'Curiosity', 'Curiosity', 'No', 'SRH', 'SRH', 'No anywhere', 8, '6-10 minutes', 'Satisfactory', 'prank', '2021-01-12 09:48:11', 4, '2021-01-13 05:26:25', 0, 'active'),
(5, '1610445690329', 'No', 'No', 'Contraceptive pill', 'properly not telling', 'nothing', 'Yes', 'SRH', 'GBV', 'nothing', 7, '6-10 minutes', 'Satisfactory', 'information-call', '2021-01-12 10:05:17', 1, '0000-00-00 00:00:00', 0, 'active'),
(6, '1610446226435', 'No', 'No', 'Wet dreams', 'Wet dreams', 'nothing', 'Yes', 'FP', 'Other', 'nothing', 4, '0-5 minutes', 'Moderately satisfactory', 'information-call', '2021-01-12 10:13:06', 1, '0000-00-00 00:00:00', 0, 'active'),
(7, '1610446226435', 'No', 'No', 'Wet dreams not solved', 'nothing', 'nothing', 'Yes', 'FP', 'GBV', 'nothing', 7, '0-5 minutes', 'Confusing', 'information-call', '2021-01-12 10:21:04', 5, '2021-01-13 05:25:21', 0, 'active'),
(8, '1610452882545', 'No', 'No', 'Noting', 'Curiosity', 'nothing', 'No', 'SRH', 'SRH', 'no', 4, '0-5 minutes', 'Satisfactory', 'information-call', '2021-01-12 12:05:15', 1, '2021-01-16 10:24:26', 0, 'active'),
(9, '1610445690329', 'No', 'No', 'nothing', 'nothing', 'nothing', 'No', 'SRH', 'SRH', 'nothing', 0, '0-5 minutes', 'Confusing', 'information-call', '2021-01-20 12:07:40', 1, '2021-01-20 07:11:14', 0, 'active'),
(10, '1610453525973', 'No', 'No', 'nothing', 'nothing', 'nothing', 'No', 'GBV', 'MH', 'nothing', 0, '0-5 minutes', 'Satisfactory', 'information-call', '2021-01-12 12:23:18', 1, '2021-01-20 07:12:33', 0, 'active'),
(11, '1610446226435', 'No', 'No', 'third time calling', 'third time calling', 'third time calling', 'No', 'SRH', 'FP', 'third time calling', 0, '6-10 minutes', 'Not asked', 'hang_up', '2021-01-12 12:28:57', 3, '2021-01-20 07:07:24', 0, 'active'),
(12, '1610893196983', 'No', 'No', 'Nothing', 'Nothing', 'Nothing', 'No', 'SRH', 'GBV', 'Nothing', 7, '0-5 minutes', 'Satisfactory', 'information-call', '2021-01-17 14:21:20', 1, '2021-01-18 07:32:20', 0, 'active'),
(13, '1611050097536', 'No', 'No', 'nothing', 'nothing', 'nothing', 'No', 'GBV', 'SRH', 'nothing', 7, '0-5 minutes', 'Moderately satisfactory', 'incomplete', '2021-01-19 09:56:55', 1, '0000-00-00 00:00:00', 0, 'active'),
(14, '1611241909668', 'No', 'No', 'West dream', 'In this article I will explain with an example, how to convert (export) JSON string as PDF using JavaScript.', 'nothing', 'No', 'GBV', 'FP', 'nothing', 10, '11-15 minutes', 'Satisfactory', 'information-call', '2021-01-21 15:14:25', 1, '2021-01-24 12:07:07', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(11) NOT NULL,
  `department_name` varchar(150) NOT NULL,
  `remark` text,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `department_name`, `remark`, `activation_status`, `create_date`, `update_date`) VALUES
(1, 'Reception', NULL, 'active', '2019-07-07 12:10:16', '2019-07-09 18:00:00'),
(3, 'OT', '', 'active', '2019-07-07 12:10:47', '2019-07-10 18:00:00'),
(4, 'Accounts', '', 'active', '2019-07-07 12:10:47', '2019-07-17 18:00:00'),
(5, 'Audiology', NULL, 'active', '2019-07-21 05:17:32', NULL),
(6, 'Pathology', NULL, 'active', '2019-07-21 05:17:32', NULL),
(7, 'Radiology', NULL, 'active', '2019-07-21 05:17:47', NULL),
(8, 'Histopathology', NULL, 'active', '2019-07-21 05:17:47', NULL),
(9, 'Pharmacy', NULL, 'active', '2019-10-28 05:53:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `division_id` int(1) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `bn_name` varchar(75) DEFAULT NULL,
  `short_name` varchar(30) DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `lon` varchar(45) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `short_name`, `lat`, `lon`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', 'COM', '23.4682747', '91.1788135', 'www.comilla.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(2, 1, 'Feni', 'ফেনী', 'FEN', '23.023231', '91.3840844', 'www.feni.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 'BBA', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', '2020-12-14 05:34:35', 0, '2020-12-21 09:25:52', 0, 'active'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', 'RGM', NULL, NULL, 'www.rangamati.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(5, 1, 'Noakhali', 'নোয়াখালী', 'NOA', '22.869563', '91.099398', 'www.noakhali.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(6, 1, 'Chandpur', 'চাঁদপুর', 'CHA', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', 'LAK', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', 'CTG', '22.335109', '91.834073', 'www.chittagong.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', 'COX', NULL, NULL, 'www.coxsbazar.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', 'KHA', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(11, 1, 'Bandarban', 'বান্দরবান', 'BAN', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', 'SIR', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(13, 2, 'Pabna', 'পাবনা', 'PAB', '23.998524', '89.233645', 'www.pabna.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(14, 2, 'Bogura', 'বগুড়া', 'BOG', '24.8465228', '89.377755', 'www.bogra.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(15, 2, 'Rajshahi', 'রাজশাহী', 'RJS', NULL, NULL, 'www.rajshahi.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(16, 2, 'Natore', 'নাটোর', 'NAT', '24.420556', '89.000282', 'www.natore.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', 'JAI', NULL, NULL, 'www.joypurhat.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', 'NAW', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(19, 2, 'Naogaon', 'নওগাঁ', 'NAO', NULL, NULL, 'www.naogaon.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(20, 3, 'Jesshore', 'যশোর', 'JES', '23.16643', '89.2081126', 'www.jessore.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', 'SAT', NULL, NULL, 'www.satkhira.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(22, 3, 'Meherpur', 'মেহেরপুর', 'MEH', '23.762213', '88.631821', 'www.meherpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(23, 3, 'Narail', 'নড়াইল', 'NRA', '23.172534', '89.512672', 'www.narail.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', 'CHU', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', 'KUS', '23.901258', '89.120482', 'www.kushtia.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(26, 3, 'Magura', 'মাগুরা', 'MAG', '23.487337', '89.419956', 'www.magura.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(27, 3, 'Khulna', 'খুলনা', 'KHU', '22.815774', '89.568679', 'www.khulna.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(28, 3, 'Bagerhat', 'বাগেরহাট', 'BAG', '22.651568', '89.785938', 'www.bagerhat.gov.bd', '2020-12-14 05:34:35', 0, '2020-12-14 12:43:12', 0, 'active'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', 'JHE', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', 'JHA', NULL, NULL, 'www.jhalakathi.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', 'PAT', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(32, 4, 'Pirojpur', 'পিরোজপুর', 'PIR', NULL, NULL, 'www.pirojpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(33, 4, 'Barisal', 'বরিশাল', 'BRS', NULL, NULL, 'www.barisal.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(34, 4, 'Bhola', 'ভোলা', 'BHO', '22.685923', '90.648179', 'www.bhola.gov.bd', '2020-12-14 05:34:35', 1, '2020-12-14 09:58:18', 1, 'active'),
(35, 4, 'Barguna', 'বরগুনা', 'BRG', NULL, NULL, 'www.barguna.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(36, 5, 'Sylhet', 'সিলেট', 'SYL', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', 'MAU', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', 'HAB', '24.374945', '91.41553', 'www.habiganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', 'SUN', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(40, 6, 'Narsingdi', 'নরসিংদী', 'NSD', '23.932233', '90.71541', 'www.narsingdi.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(41, 6, 'Gazipur', 'গাজীপুর', 'GAZ', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', 'SHA', NULL, NULL, 'www.shariatpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', 'NYG', '23.63366', '90.496482', 'www.narayanganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(44, 6, 'Tangail', 'টাঙ্গাইল', 'TAN', NULL, NULL, 'www.tangail.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', 'KIS', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', 'MAN', NULL, NULL, 'www.manikganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(47, 6, 'Dhaka', 'ঢাকা', 'DHA', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', 'MUN', NULL, NULL, 'www.munshiganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(49, 6, 'Rajbari', 'রাজবাড়ী', 'RJB', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(50, 6, 'Madaripur', 'মাদারীপুর', 'MAD', '23.164102', '90.1896805', 'www.madaripur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', 'GOP', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(52, 6, 'Faridpur', 'ফরিদপুর', 'FAR', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', 'PAN', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(54, 7, 'Dinajpur', 'দিনাজপুর', 'DIN', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', 'LAL', NULL, NULL, 'www.lalmonirhat.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(56, 7, 'Nilphamari', 'নীলফামারী', 'NIL', '25.931794', '88.856006', 'www.nilphamari.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', 'GAI', '25.328751', '89.528088', 'www.gaibandha.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', 'THA', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(59, 7, 'Rangpur', 'রংপুর', 'RGP', '25.7558096', '89.244462', 'www.rangpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', 'KUR', '25.805445', '89.636174', 'www.kurigram.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(61, 8, 'Sherpur', 'শেরপুর', 'SHE', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', 'MYM', NULL, NULL, 'www.mymensingh.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(63, 8, 'Jamalpur', 'জামালপুর', 'JAM', '24.937533', '89.937775', 'www.jamalpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(64, 8, 'Netrokona', 'নেত্রকোণা', 'NET', '24.870955', '90.727887', 'www.netrokona.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(65, 1, 'Bhola sadar', NULL, NULL, NULL, NULL, NULL, '2020-12-28 05:10:54', 1, '2020-12-28 05:13:49', 0, 'deactive'),
(66, 1, 'Bhola sadar', NULL, NULL, NULL, NULL, NULL, '2021-01-02 07:45:55', 1, '2021-01-02 07:46:32', 0, 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `bn_name` varchar(75) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES
(1, 'Chittagong', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

CREATE TABLE `group_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, 'Admin', '2020-12-29 06:21:19', 1, '2020-12-29 06:22:16', 0, 'active'),
(2, 'Supervisor', '2020-12-29 06:27:17', 1, '2020-12-29 06:31:36', 1, 'active'),
(3, 'Monitor', '2020-12-29 06:32:24', 1, '2020-12-29 06:36:01', 1, 'active'),
(4, 'User', '2020-12-29 06:33:45', 1, '0000-00-00 00:00:00', 0, 'active'),
(6, 'Monitor hhh', '2020-12-29 07:29:44', 1, '2020-12-30 16:19:04', 0, 'deactive'),
(7, 'Supervisor 2', '2020-12-29 09:04:46', 1, '2020-12-30 16:19:00', 0, 'deactive'),
(8, 'Monitor hhh2', '2021-01-18 06:44:12', 1, '2021-01-23 05:10:24', 0, 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `module_name` varchar(150) NOT NULL,
  `page_name` varchar(250) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `module_name`, `page_name`, `activation_status`) VALUES
(1, 'Reception', 'Dashboard', 'active'),
(2, 'Reception', 'OPD / IPD', 'active'),
(3, 'Reception', 'OPD History', 'active'),
(4, 'Reception', 'IPD History', 'active'),
(5, 'Reception', 'Patient list', 'active'),
(6, 'Diagnostics', 'Dashboard', 'active'),
(7, 'Diagnostics', 'Diagnostic entry', 'active'),
(8, 'Diagnostics', 'Audiology history', 'active'),
(9, 'Diagnostics', 'Pathology history', 'active'),
(10, 'Diagnostics', 'Radiology history', 'active'),
(11, 'Diagnostics', 'Histopathology history', 'active'),
(12, 'OT', 'Dashboard', 'active'),
(13, 'OT', 'OT Entry', 'active'),
(14, 'OT', 'OT Billing history', 'active'),
(15, 'OT', 'OT Details history', 'active'),
(16, 'Settings', 'Doctor', 'active'),
(17, 'Settings', 'Medical condition', 'active'),
(18, 'Settings', 'Package', 'active'),
(19, 'Settings', 'Ward', 'active'),
(20, 'Settings', 'Cabin', 'active'),
(21, 'Settings', 'Service settings', 'active'),
(22, 'Settings', 'User', 'active'),
(23, 'Settings', 'User access', 'active'),
(24, 'Accounts', 'Dashboard', 'active'),
(25, 'Accounts', 'Income head', 'active'),
(26, 'Accounts', 'Expense head', 'active'),
(27, 'Accounts', 'Add new income', 'active'),
(28, 'Accounts', 'Add new expense', 'active'),
(29, 'Accounts', 'OPD bills', 'active'),
(30, 'Accounts', 'IPD bills', 'active'),
(31, 'Pharmacy', 'Dashboard', 'active'),
(32, 'Pharmacy', 'Add drugs', 'active'),
(33, 'Pharmacy', 'Buy', 'active'),
(34, 'Pharmacy', 'Buy history', 'active'),
(35, 'Pharmacy', 'Sell', 'active'),
(36, 'Pharmacy', 'Sell history', 'active'),
(37, 'Pharmacy', 'Inventory', 'active'),
(38, 'Pharmacy', 'Expired drugs', 'active'),
(39, 'Reports', 'Revenue report yearly', 'active'),
(40, 'Reports', 'Dept. wise income report', 'active'),
(41, 'Accounts', 'Create bill', 'active'),
(42, 'Accounts', 'Advance', 'active'),
(43, 'Reports', 'Expense head report', 'active'),
(44, 'Reports', 'Expense subhead report', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `page_users`
--

CREATE TABLE `page_users` (
  `id_page_users` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `allow_deny` enum('allow','deny') NOT NULL DEFAULT 'allow',
  `module_name` varchar(50) NOT NULL,
  `id_user_access_given_by` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_users`
--

INSERT INTO `page_users` (`id_page_users`, `id_page`, `id_user`, `allow_deny`, `module_name`, `id_user_access_given_by`, `create_date`, `update_date`) VALUES
(77, 24, 1, 'allow', 'Accounts', 1, '2019-11-05 07:20:13', NULL),
(78, 25, 1, 'allow', 'Accounts', 1, '2019-10-30 05:39:12', NULL),
(79, 26, 1, 'allow', 'Accounts', 1, '2019-10-30 05:39:12', NULL),
(80, 27, 1, 'allow', 'Accounts', 1, '2019-10-30 05:39:12', NULL),
(81, 28, 1, 'allow', 'Accounts', 1, '2019-10-30 05:39:12', NULL),
(82, 29, 1, 'allow', 'Accounts', 1, '2019-10-30 05:39:12', NULL),
(83, 30, 1, 'allow', 'Accounts', 1, '2019-10-30 05:39:12', NULL),
(84, 6, 1, 'allow', 'Diagnostics', 1, '2019-10-30 05:39:16', NULL),
(85, 7, 1, 'allow', 'Diagnostics', 1, '2019-10-30 05:39:16', NULL),
(86, 8, 1, 'allow', 'Diagnostics', 1, '2019-10-30 05:39:16', NULL),
(87, 9, 1, 'allow', 'Diagnostics', 1, '2019-10-30 05:39:16', NULL),
(88, 10, 1, 'allow', 'Diagnostics', 1, '2019-10-30 05:39:16', NULL),
(89, 11, 1, 'allow', 'Diagnostics', 1, '2019-10-30 05:39:16', NULL),
(90, 12, 1, 'allow', 'OT', 1, '2019-10-30 05:39:21', NULL),
(91, 13, 1, 'allow', 'OT', 1, '2019-10-30 05:39:21', NULL),
(92, 14, 1, 'allow', 'OT', 1, '2019-10-30 05:39:21', NULL),
(93, 15, 1, 'allow', 'OT', 1, '2019-10-30 05:39:21', NULL),
(94, 31, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(95, 32, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(96, 33, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(97, 34, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(98, 35, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(99, 36, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(100, 37, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(101, 38, 1, 'allow', 'Pharmacy', 1, '2019-10-30 05:39:27', NULL),
(102, 1, 1, 'allow', 'Reception', 1, '2019-10-30 05:39:31', NULL),
(103, 2, 1, 'allow', 'Reception', 1, '2019-10-30 05:39:31', NULL),
(104, 3, 1, 'allow', 'Reception', 1, '2019-10-30 05:39:31', NULL),
(105, 4, 1, 'allow', 'Reception', 1, '2019-10-30 05:39:31', NULL),
(106, 5, 1, 'allow', 'Reception', 1, '2019-10-30 05:39:31', NULL),
(107, 16, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(108, 17, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(109, 18, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(110, 19, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(111, 20, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(112, 21, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(113, 22, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(114, 23, 1, 'allow', 'Settings', 1, '2019-10-30 05:39:35', NULL),
(145, 41, 1, 'allow', 'Accounts', 1, '2019-11-05 07:14:36', NULL),
(146, 42, 1, 'allow', 'Accounts', 1, '2019-11-05 07:15:05', NULL),
(495, 39, 1, 'allow', 'Reports', 1, '2019-11-12 09:12:40', '2019-11-12 09:12:40'),
(496, 40, 1, 'allow', 'Reports', 1, '2019-11-12 09:12:40', '2019-11-12 09:12:40'),
(497, 43, 1, 'allow', 'Reports', 1, '2019-11-12 09:13:26', '2019-11-12 09:13:26'),
(498, 44, 1, 'allow', 'Reports', 1, '2019-11-12 09:13:26', '2019-11-12 09:13:26'),
(524, 1, 3, 'allow', 'Reception', 1, '2019-12-03 07:12:56', NULL),
(525, 2, 3, 'allow', 'Reception', 1, '2019-12-03 07:12:56', NULL),
(526, 3, 3, 'allow', 'Reception', 1, '2019-12-03 07:12:56', NULL),
(527, 4, 3, 'allow', 'Reception', 1, '2019-12-03 07:12:56', NULL),
(528, 5, 3, 'allow', 'Reception', 1, '2019-12-03 07:12:56', NULL),
(529, 1, 4, 'allow', 'Reception', 1, '2019-12-03 07:23:56', NULL),
(530, 2, 4, 'allow', 'Reception', 1, '2019-12-03 07:23:56', NULL),
(531, 3, 4, 'allow', 'Reception', 1, '2019-12-03 07:23:56', NULL),
(532, 4, 4, 'allow', 'Reception', 1, '2019-12-03 07:23:56', NULL),
(533, 5, 4, 'allow', 'Reception', 1, '2019-12-03 07:23:56', NULL),
(534, 1, 5, 'allow', 'Reception', 1, '2019-12-03 07:38:48', NULL),
(535, 2, 5, 'allow', 'Reception', 1, '2019-12-03 07:38:48', NULL),
(536, 3, 5, 'allow', 'Reception', 1, '2019-12-03 07:38:48', NULL),
(537, 4, 5, 'allow', 'Reception', 1, '2019-12-03 07:38:48', NULL),
(538, 5, 5, 'allow', 'Reception', 1, '2019-12-03 07:38:48', NULL),
(539, 1, 6, 'allow', 'Reception', 1, '2019-12-03 07:40:20', NULL),
(540, 2, 6, 'allow', 'Reception', 1, '2019-12-03 07:40:20', NULL),
(541, 3, 6, 'allow', 'Reception', 1, '2019-12-03 07:40:20', NULL),
(542, 4, 6, 'allow', 'Reception', 1, '2019-12-03 07:40:20', NULL),
(543, 5, 6, 'allow', 'Reception', 1, '2019-12-03 07:40:20', NULL),
(544, 1, 7, 'allow', 'Reception', 1, '2019-12-03 07:41:23', NULL),
(545, 2, 7, 'allow', 'Reception', 1, '2019-12-03 07:41:23', NULL),
(546, 3, 7, 'allow', 'Reception', 1, '2019-12-03 07:41:23', NULL),
(547, 4, 7, 'allow', 'Reception', 1, '2019-12-03 07:41:23', NULL),
(548, 5, 7, 'allow', 'Reception', 1, '2019-12-03 07:41:23', NULL),
(549, 1, 8, 'allow', 'Reception', 1, '2019-12-03 07:42:34', NULL),
(550, 2, 8, 'allow', 'Reception', 1, '2019-12-03 07:42:34', NULL),
(551, 3, 8, 'allow', 'Reception', 1, '2019-12-03 07:42:34', NULL),
(552, 4, 8, 'allow', 'Reception', 1, '2019-12-03 07:42:34', NULL),
(553, 5, 8, 'allow', 'Reception', 1, '2019-12-03 07:42:34', NULL),
(554, 1, 2, 'allow', 'Reception', 1, '2019-12-03 07:43:02', NULL),
(555, 2, 2, 'allow', 'Reception', 1, '2019-12-03 07:43:02', NULL),
(556, 3, 2, 'allow', 'Reception', 1, '2019-12-03 07:43:02', NULL),
(557, 4, 2, 'allow', 'Reception', 1, '2019-12-03 07:43:02', NULL),
(558, 5, 2, 'allow', 'Reception', 1, '2019-12-03 07:43:02', NULL),
(573, 24, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(574, 25, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(575, 26, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(576, 27, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(577, 28, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(578, 29, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(579, 30, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(580, 41, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(581, 42, 9, 'allow', 'Accounts', 2, '2019-12-03 08:09:31', NULL),
(582, 16, 4, 'allow', 'Settings', 1, '2019-12-08 06:24:55', NULL),
(583, 16, 3, 'allow', 'Settings', 1, '2019-12-08 06:25:03', NULL),
(584, 16, 7, 'allow', 'Settings', 1, '2019-12-08 06:25:16', NULL),
(586, 16, 5, 'allow', 'Settings', 1, '2019-12-08 06:25:56', NULL),
(587, 31, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(588, 32, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(589, 33, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(590, 34, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(591, 35, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(592, 36, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(593, 37, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(594, 38, 10, 'allow', 'Pharmacy', 1, '2019-12-11 09:36:10', NULL),
(601, 20, 7, 'allow', 'Settings', 1, '2019-12-17 13:13:39', NULL),
(602, 19, 7, 'allow', 'Settings', 1, '2019-12-17 13:13:48', NULL),
(605, 19, 3, 'allow', 'Settings', 1, '2019-12-17 13:14:26', NULL),
(606, 20, 3, 'allow', 'Settings', 1, '2019-12-17 13:14:34', NULL),
(607, 19, 4, 'allow', 'Settings', 1, '2019-12-17 13:14:44', NULL),
(608, 20, 4, 'allow', 'Settings', 1, '2019-12-17 13:14:54', NULL),
(609, 19, 5, 'allow', 'Settings', 1, '2019-12-17 13:18:12', NULL),
(610, 20, 5, 'allow', 'Settings', 1, '2019-12-17 13:18:17', NULL),
(611, 6, 12, 'allow', 'Diagnostics', 1, '2019-12-21 05:42:28', NULL),
(612, 7, 12, 'allow', 'Diagnostics', 1, '2019-12-21 05:42:28', NULL),
(613, 8, 12, 'allow', 'Diagnostics', 1, '2019-12-21 05:42:28', NULL),
(614, 9, 12, 'allow', 'Diagnostics', 1, '2019-12-21 05:42:28', NULL),
(615, 10, 12, 'allow', 'Diagnostics', 1, '2019-12-21 05:42:28', NULL),
(616, 11, 12, 'allow', 'Diagnostics', 1, '2019-12-21 05:42:28', NULL),
(617, 6, 13, 'allow', 'Diagnostics', 1, '2019-12-21 05:56:05', NULL),
(618, 7, 13, 'allow', 'Diagnostics', 1, '2019-12-21 05:56:05', NULL),
(619, 8, 13, 'allow', 'Diagnostics', 1, '2019-12-21 05:56:05', NULL),
(620, 9, 13, 'allow', 'Diagnostics', 1, '2019-12-21 05:56:05', NULL),
(621, 10, 13, 'allow', 'Diagnostics', 1, '2019-12-21 05:56:05', NULL),
(622, 11, 13, 'allow', 'Diagnostics', 1, '2019-12-21 05:56:05', NULL),
(623, 7, 4, 'allow', 'Diagnostics', 2, '2019-12-21 06:26:04', NULL),
(624, 7, 3, 'allow', 'Diagnostics', 2, '2019-12-21 06:26:18', NULL),
(625, 6, 14, 'allow', 'Diagnostics', 1, '2019-12-29 09:18:03', NULL),
(626, 7, 14, 'allow', 'Diagnostics', 1, '2019-12-29 09:18:03', NULL),
(627, 8, 14, 'allow', 'Diagnostics', 1, '2019-12-29 09:18:03', NULL),
(628, 9, 14, 'allow', 'Diagnostics', 1, '2019-12-29 09:18:03', NULL),
(629, 10, 14, 'allow', 'Diagnostics', 1, '2019-12-29 09:18:03', NULL),
(630, 11, 14, 'allow', 'Diagnostics', 1, '2019-12-29 09:18:03', NULL),
(631, 1, 15, 'allow', 'Reception', 1, '2019-12-29 12:52:21', NULL),
(632, 2, 15, 'allow', 'Reception', 1, '2019-12-29 12:52:21', NULL),
(633, 3, 15, 'allow', 'Reception', 1, '2019-12-29 12:52:21', NULL),
(634, 4, 15, 'allow', 'Reception', 1, '2019-12-29 12:52:21', NULL),
(635, 5, 15, 'allow', 'Reception', 1, '2019-12-29 12:52:21', NULL),
(636, 4, 14, 'allow', 'Reception', 1, '2019-12-30 04:23:36', NULL),
(637, 3, 14, 'allow', 'Reception', 1, '2019-12-30 04:23:44', NULL),
(638, 12, 16, 'allow', 'OT', 1, '2019-12-31 06:03:55', NULL),
(639, 13, 16, 'allow', 'OT', 1, '2019-12-31 06:03:55', NULL),
(640, 14, 16, 'allow', 'OT', 1, '2019-12-31 06:03:55', NULL),
(641, 15, 16, 'allow', 'OT', 1, '2019-12-31 06:03:55', NULL),
(642, 12, 17, 'allow', 'OT', 1, '2019-12-31 06:04:33', NULL),
(643, 13, 17, 'allow', 'OT', 1, '2019-12-31 06:04:33', NULL),
(644, 14, 17, 'allow', 'OT', 1, '2019-12-31 06:04:33', NULL),
(645, 15, 17, 'allow', 'OT', 1, '2019-12-31 06:04:33', NULL),
(646, 21, 3, 'allow', 'Settings', 1, '2020-01-04 09:18:49', NULL),
(647, 25, 3, 'allow', 'Accounts', 1, '2020-01-04 09:19:24', NULL),
(648, 8, 9, 'allow', 'Diagnostics', 1, '2020-01-29 05:31:55', NULL),
(649, 11, 9, 'allow', 'Diagnostics', 1, '2020-01-29 05:32:01', NULL),
(650, 7, 9, 'allow', 'Diagnostics', 1, '2020-01-29 05:32:07', NULL),
(651, 10, 9, 'allow', 'Diagnostics', 1, '2020-01-29 05:32:10', NULL),
(652, 9, 9, 'allow', 'Diagnostics', 1, '2020-01-29 05:32:14', NULL),
(653, 6, 9, 'allow', 'Diagnostics', 1, '2020-01-29 05:32:51', NULL),
(654, 1, 9, 'allow', 'Reception', 1, '2020-01-29 05:32:57', NULL),
(655, 2, 9, 'allow', 'Reception', 1, '2020-01-29 05:32:57', NULL),
(656, 3, 9, 'allow', 'Reception', 1, '2020-01-29 05:32:57', NULL),
(657, 4, 9, 'allow', 'Reception', 1, '2020-01-29 05:32:57', NULL),
(658, 5, 9, 'allow', 'Reception', 1, '2020-01-29 05:32:57', NULL),
(659, 39, 9, 'allow', 'Reports', 1, '2020-01-29 05:33:01', NULL),
(660, 40, 9, 'allow', 'Reports', 1, '2020-01-29 05:33:01', NULL),
(661, 43, 9, 'allow', 'Reports', 1, '2020-01-29 05:33:01', NULL),
(662, 44, 9, 'allow', 'Reports', 1, '2020-01-29 05:33:01', NULL),
(663, 12, 9, 'allow', 'OT', 1, '2020-01-29 05:33:10', NULL),
(664, 13, 9, 'allow', 'OT', 1, '2020-01-29 05:33:10', NULL),
(665, 14, 9, 'allow', 'OT', 1, '2020-01-29 05:33:10', NULL),
(666, 15, 9, 'allow', 'OT', 1, '2020-01-29 05:33:10', NULL),
(673, 8, 7, 'allow', 'Diagnostics', 1, '2020-02-12 04:56:32', NULL),
(674, 7, 7, 'allow', 'Diagnostics', 1, '2020-02-12 04:56:43', NULL),
(675, 6, 7, 'allow', 'Diagnostics', 1, '2020-02-12 04:56:47', NULL),
(684, 31, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:23', NULL),
(685, 32, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:23', NULL),
(686, 33, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:24', NULL),
(687, 34, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:24', NULL),
(688, 35, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:24', NULL),
(689, 36, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:24', NULL),
(690, 37, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:24', NULL),
(691, 38, 11, 'allow', 'Pharmacy', 1, '2020-02-17 05:28:24', NULL),
(692, 24, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(693, 25, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(694, 26, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(695, 27, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(696, 28, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(697, 29, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(698, 30, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(699, 41, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(700, 42, 19, 'allow', 'Accounts', 1, '2020-02-18 04:18:58', NULL),
(701, 6, 19, 'allow', 'Diagnostics', 1, '2020-02-18 04:19:10', NULL),
(702, 7, 19, 'allow', 'Diagnostics', 1, '2020-02-18 04:19:10', NULL),
(703, 8, 19, 'allow', 'Diagnostics', 1, '2020-02-18 04:19:10', NULL),
(704, 9, 19, 'allow', 'Diagnostics', 1, '2020-02-18 04:19:10', NULL),
(705, 10, 19, 'allow', 'Diagnostics', 1, '2020-02-18 04:19:10', NULL),
(706, 11, 19, 'allow', 'Diagnostics', 1, '2020-02-18 04:19:10', NULL),
(707, 12, 19, 'allow', 'OT', 1, '2020-02-18 04:19:13', NULL),
(708, 13, 19, 'allow', 'OT', 1, '2020-02-18 04:19:13', NULL),
(709, 14, 19, 'allow', 'OT', 1, '2020-02-18 04:19:13', NULL),
(710, 15, 19, 'allow', 'OT', 1, '2020-02-18 04:19:13', NULL),
(711, 31, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(712, 32, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(713, 33, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(714, 34, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(715, 35, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(716, 36, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(717, 37, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(718, 38, 19, 'allow', 'Pharmacy', 1, '2020-02-18 04:19:16', NULL),
(719, 1, 19, 'allow', 'Reception', 1, '2020-02-18 04:19:18', NULL),
(720, 2, 19, 'allow', 'Reception', 1, '2020-02-18 04:19:18', NULL),
(721, 3, 19, 'allow', 'Reception', 1, '2020-02-18 04:19:18', NULL),
(722, 4, 19, 'allow', 'Reception', 1, '2020-02-18 04:19:18', NULL),
(723, 5, 19, 'allow', 'Reception', 1, '2020-02-18 04:19:18', NULL),
(724, 39, 19, 'allow', 'Reports', 1, '2020-02-18 04:19:21', NULL),
(725, 40, 19, 'allow', 'Reports', 1, '2020-02-18 04:19:21', NULL),
(726, 43, 19, 'allow', 'Reports', 1, '2020-02-18 04:19:21', NULL),
(727, 44, 19, 'allow', 'Reports', 1, '2020-02-18 04:19:21', NULL),
(728, 16, 19, 'allow', 'Settings', 1, '2020-02-18 04:19:24', NULL),
(729, 17, 19, 'allow', 'Settings', 1, '2020-02-18 04:19:24', NULL),
(730, 18, 19, 'allow', 'Settings', 1, '2020-02-18 04:19:24', NULL),
(731, 19, 19, 'allow', 'Settings', 1, '2020-02-18 04:19:24', NULL),
(732, 20, 19, 'allow', 'Settings', 1, '2020-02-18 04:19:24', NULL),
(733, 21, 19, 'allow', 'Settings', 1, '2020-02-18 04:19:24', NULL),
(736, 31, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(737, 32, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(738, 33, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(739, 34, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(740, 35, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(741, 36, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(742, 37, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(743, 38, 9, 'allow', 'Pharmacy', 1, '2020-02-18 09:35:47', NULL),
(744, 8, 3, 'allow', 'Diagnostics', 1, '2020-02-22 06:27:09', NULL),
(745, 6, 3, 'allow', 'Diagnostics', 1, '2020-02-22 06:28:01', NULL),
(746, 8, 8, 'allow', 'Diagnostics', 1, '2020-02-22 06:28:19', NULL),
(747, 6, 8, 'allow', 'Diagnostics', 1, '2020-02-22 06:28:25', NULL),
(748, 7, 8, 'allow', 'Diagnostics', 1, '2020-02-22 06:28:29', NULL),
(749, 6, 4, 'allow', 'Diagnostics', 1, '2020-02-22 08:46:17', NULL),
(750, 8, 4, 'allow', 'Diagnostics', 1, '2020-02-22 08:46:19', NULL),
(751, 6, 5, 'allow', 'Diagnostics', 1, '2020-02-22 08:50:40', NULL),
(752, 8, 5, 'allow', 'Diagnostics', 1, '2020-02-22 08:50:45', NULL),
(753, 7, 5, 'allow', 'Diagnostics', 1, '2020-02-22 08:50:52', NULL),
(754, 12, 20, 'allow', 'OT', 1, '2020-03-04 09:34:58', NULL),
(755, 13, 20, 'allow', 'OT', 1, '2020-03-04 09:34:58', NULL),
(756, 14, 20, 'allow', 'OT', 1, '2020-03-04 09:34:58', NULL),
(757, 15, 20, 'allow', 'OT', 1, '2020-03-04 09:34:58', NULL),
(758, 12, 21, 'allow', 'OT', 1, '2020-03-14 06:02:14', NULL),
(759, 13, 21, 'allow', 'OT', 1, '2020-03-14 06:02:14', NULL),
(760, 14, 21, 'allow', 'OT', 1, '2020-03-14 06:02:14', NULL),
(761, 15, 21, 'allow', 'OT', 1, '2020-03-14 06:02:14', NULL),
(762, 6, 22, 'allow', 'Diagnostics', 1, '2020-07-11 07:21:46', NULL),
(763, 7, 22, 'allow', 'Diagnostics', 1, '2020-07-11 07:21:46', NULL),
(764, 8, 22, 'allow', 'Diagnostics', 1, '2020-07-11 07:21:46', NULL),
(765, 9, 22, 'allow', 'Diagnostics', 1, '2020-07-11 07:21:46', NULL),
(766, 10, 22, 'allow', 'Diagnostics', 1, '2020-07-11 07:21:46', NULL),
(767, 11, 22, 'allow', 'Diagnostics', 1, '2020-07-11 07:21:46', NULL),
(769, 7, 18, 'allow', 'Diagnostics', 1, '2020-07-11 07:26:36', NULL),
(773, 6, 18, 'allow', 'Diagnostics', 1, '2020-07-11 07:29:05', NULL),
(775, 10, 18, 'allow', 'Diagnostics', 1, '2020-07-11 07:29:49', NULL),
(777, 24, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(778, 25, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(779, 26, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(780, 27, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(781, 28, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(782, 29, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(783, 30, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(784, 41, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(785, 42, 23, 'allow', 'Accounts', 1, '2020-08-12 05:17:07', NULL),
(786, 8, 23, 'allow', 'Diagnostics', 1, '2020-08-12 05:18:11', NULL),
(787, 6, 23, 'allow', 'Diagnostics', 1, '2020-08-12 05:18:14', NULL),
(788, 7, 23, 'allow', 'Diagnostics', 1, '2020-08-12 05:18:18', NULL),
(789, 11, 23, 'allow', 'Diagnostics', 1, '2020-08-12 05:18:20', NULL),
(790, 9, 23, 'allow', 'Diagnostics', 1, '2020-08-12 05:18:22', NULL),
(791, 10, 23, 'allow', 'Diagnostics', 1, '2020-08-12 05:18:25', NULL),
(792, 12, 23, 'allow', 'OT', 1, '2020-08-12 05:18:28', NULL),
(793, 14, 23, 'allow', 'OT', 1, '2020-08-12 05:18:30', NULL),
(794, 15, 23, 'allow', 'OT', 1, '2020-08-12 05:18:33', NULL),
(795, 13, 23, 'allow', 'OT', 1, '2020-08-12 05:18:37', NULL),
(796, 32, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:18:40', NULL),
(797, 33, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:18:43', NULL),
(798, 34, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:18:47', NULL),
(799, 31, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:19:03', NULL),
(800, 38, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:19:07', NULL),
(801, 35, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:19:20', NULL),
(802, 36, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:19:21', NULL),
(803, 37, 23, 'allow', 'Pharmacy', 1, '2020-08-12 05:19:21', NULL),
(804, 1, 23, 'allow', 'Reception', 1, '2020-08-12 05:19:24', NULL),
(805, 2, 23, 'allow', 'Reception', 1, '2020-08-12 05:19:24', NULL),
(806, 3, 23, 'allow', 'Reception', 1, '2020-08-12 05:19:24', NULL),
(807, 4, 23, 'allow', 'Reception', 1, '2020-08-12 05:19:24', NULL),
(808, 5, 23, 'allow', 'Reception', 1, '2020-08-12 05:19:24', NULL),
(809, 39, 23, 'allow', 'Reports', 1, '2020-08-12 05:19:27', NULL),
(810, 40, 23, 'allow', 'Reports', 1, '2020-08-12 05:19:27', NULL),
(811, 43, 23, 'allow', 'Reports', 1, '2020-08-12 05:19:27', NULL),
(812, 44, 23, 'allow', 'Reports', 1, '2020-08-12 05:19:27', NULL),
(813, 24, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(814, 25, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(815, 26, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(816, 27, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(817, 28, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(818, 29, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(819, 30, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(820, 41, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(821, 42, 24, 'allow', 'Accounts', 1, '2020-08-20 05:08:52', NULL),
(822, 6, 24, 'allow', 'Diagnostics', 1, '2020-08-20 05:09:41', NULL),
(823, 7, 24, 'allow', 'Diagnostics', 1, '2020-08-20 05:09:41', NULL),
(824, 8, 24, 'allow', 'Diagnostics', 1, '2020-08-20 05:09:41', NULL),
(825, 9, 24, 'allow', 'Diagnostics', 1, '2020-08-20 05:09:41', NULL),
(826, 10, 24, 'allow', 'Diagnostics', 1, '2020-08-20 05:09:41', NULL),
(827, 11, 24, 'allow', 'Diagnostics', 1, '2020-08-20 05:09:41', NULL),
(828, 12, 24, 'allow', 'OT', 1, '2020-08-20 05:09:44', NULL),
(829, 13, 24, 'allow', 'OT', 1, '2020-08-20 05:09:44', NULL),
(830, 14, 24, 'allow', 'OT', 1, '2020-08-20 05:09:44', NULL),
(831, 15, 24, 'allow', 'OT', 1, '2020-08-20 05:09:44', NULL),
(832, 31, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(833, 32, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(834, 33, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(835, 34, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(836, 35, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(837, 36, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(838, 37, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(839, 38, 24, 'allow', 'Pharmacy', 1, '2020-08-20 05:09:47', NULL),
(840, 1, 24, 'allow', 'Reception', 1, '2020-08-20 05:09:50', NULL),
(841, 2, 24, 'allow', 'Reception', 1, '2020-08-20 05:09:50', NULL),
(842, 3, 24, 'allow', 'Reception', 1, '2020-08-20 05:09:50', NULL),
(843, 4, 24, 'allow', 'Reception', 1, '2020-08-20 05:09:50', NULL),
(844, 5, 24, 'allow', 'Reception', 1, '2020-08-20 05:09:50', NULL),
(845, 39, 24, 'allow', 'Reports', 1, '2020-08-20 05:09:54', NULL),
(846, 40, 24, 'allow', 'Reports', 1, '2020-08-20 05:09:54', NULL),
(847, 43, 24, 'allow', 'Reports', 1, '2020-08-20 05:09:54', NULL),
(848, 44, 24, 'allow', 'Reports', 1, '2020-08-20 05:09:54', NULL),
(854, 1, 25, 'allow', 'Reception', 1, '2020-09-05 04:56:07', NULL),
(855, 2, 25, 'allow', 'Reception', 1, '2020-09-05 04:56:07', NULL),
(856, 3, 25, 'allow', 'Reception', 1, '2020-09-05 04:56:07', NULL),
(857, 4, 25, 'allow', 'Reception', 1, '2020-09-05 04:56:07', NULL),
(858, 5, 25, 'allow', 'Reception', 1, '2020-09-05 04:56:07', NULL),
(859, 24, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(860, 25, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(861, 26, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(862, 27, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(863, 28, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(864, 29, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(865, 30, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(866, 41, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(867, 42, 26, 'allow', 'Accounts', 1, '2020-09-07 04:41:19', NULL),
(868, 24, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(869, 25, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(870, 26, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(871, 27, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(872, 28, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(873, 29, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(875, 41, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(876, 42, 2, 'allow', 'Accounts', 1, '2020-09-07 04:41:32', NULL),
(877, 6, 26, 'allow', 'Diagnostics', 1, '2020-09-07 04:41:50', NULL),
(878, 7, 26, 'allow', 'Diagnostics', 1, '2020-09-07 04:41:50', NULL),
(879, 8, 26, 'allow', 'Diagnostics', 1, '2020-09-07 04:41:50', NULL),
(880, 9, 26, 'allow', 'Diagnostics', 1, '2020-09-07 04:41:50', NULL),
(881, 10, 26, 'allow', 'Diagnostics', 1, '2020-09-07 04:41:50', NULL),
(882, 11, 26, 'allow', 'Diagnostics', 1, '2020-09-07 04:41:50', NULL),
(883, 12, 26, 'allow', 'OT', 1, '2020-09-07 04:41:52', NULL),
(884, 13, 26, 'allow', 'OT', 1, '2020-09-07 04:41:52', NULL),
(885, 14, 26, 'allow', 'OT', 1, '2020-09-07 04:41:52', NULL),
(886, 15, 26, 'allow', 'OT', 1, '2020-09-07 04:41:52', NULL),
(887, 31, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(888, 32, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(889, 33, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(890, 34, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(891, 35, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(892, 36, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(893, 37, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(894, 38, 26, 'allow', 'Pharmacy', 1, '2020-09-07 04:41:55', NULL),
(895, 1, 26, 'allow', 'Reception', 1, '2020-09-07 04:41:57', NULL),
(896, 2, 26, 'allow', 'Reception', 1, '2020-09-07 04:41:57', NULL),
(897, 3, 26, 'allow', 'Reception', 1, '2020-09-07 04:41:57', NULL),
(898, 4, 26, 'allow', 'Reception', 1, '2020-09-07 04:41:57', NULL),
(899, 5, 26, 'allow', 'Reception', 1, '2020-09-07 04:41:57', NULL),
(900, 39, 26, 'allow', 'Reports', 1, '2020-09-07 04:41:59', NULL),
(901, 40, 26, 'allow', 'Reports', 1, '2020-09-07 04:41:59', NULL),
(902, 43, 26, 'allow', 'Reports', 1, '2020-09-07 04:41:59', NULL),
(903, 44, 26, 'allow', 'Reports', 1, '2020-09-07 04:41:59', NULL),
(904, 16, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(905, 17, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(906, 18, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(907, 19, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(908, 20, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(909, 21, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(910, 22, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(911, 23, 26, 'allow', 'Settings', 1, '2020-09-07 04:42:02', NULL),
(912, 24, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(913, 25, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(914, 26, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(915, 27, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(916, 28, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(917, 29, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(918, 30, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(919, 41, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(920, 42, 27, 'allow', 'Accounts', 26, '2020-09-07 04:52:36', NULL),
(927, 12, 2, 'allow', 'OT', 26, '2020-09-07 04:52:51', NULL),
(928, 13, 2, 'allow', 'OT', 26, '2020-09-07 04:52:51', NULL),
(929, 14, 2, 'allow', 'OT', 26, '2020-09-07 04:52:51', NULL),
(930, 15, 2, 'allow', 'OT', 26, '2020-09-07 04:52:51', NULL),
(931, 31, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(932, 32, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(933, 33, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(934, 34, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(935, 35, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(936, 36, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(937, 37, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(938, 38, 2, 'allow', 'Pharmacy', 26, '2020-09-07 04:52:53', NULL),
(939, 39, 2, 'allow', 'Reports', 26, '2020-09-07 04:52:56', NULL),
(940, 40, 2, 'allow', 'Reports', 26, '2020-09-07 04:52:56', NULL),
(941, 43, 2, 'allow', 'Reports', 26, '2020-09-07 04:52:56', NULL),
(942, 44, 2, 'allow', 'Reports', 26, '2020-09-07 04:52:56', NULL),
(951, 6, 27, 'allow', 'Diagnostics', 1, '2020-09-07 04:54:39', NULL),
(952, 7, 27, 'allow', 'Diagnostics', 1, '2020-09-07 04:54:39', NULL),
(953, 8, 27, 'allow', 'Diagnostics', 1, '2020-09-07 04:54:39', NULL),
(954, 9, 27, 'allow', 'Diagnostics', 1, '2020-09-07 04:54:39', NULL),
(955, 10, 27, 'allow', 'Diagnostics', 1, '2020-09-07 04:54:39', NULL),
(956, 11, 27, 'allow', 'Diagnostics', 1, '2020-09-07 04:54:39', NULL),
(957, 12, 27, 'allow', 'OT', 1, '2020-09-07 04:54:41', NULL),
(958, 13, 27, 'allow', 'OT', 1, '2020-09-07 04:54:41', NULL),
(959, 14, 27, 'allow', 'OT', 1, '2020-09-07 04:54:41', NULL),
(960, 15, 27, 'allow', 'OT', 1, '2020-09-07 04:54:41', NULL),
(961, 31, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(962, 32, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(963, 33, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(964, 34, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(965, 35, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(966, 36, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(967, 37, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(968, 38, 27, 'allow', 'Pharmacy', 1, '2020-09-07 04:54:44', NULL),
(969, 1, 27, 'allow', 'Reception', 1, '2020-09-07 04:54:46', NULL),
(970, 2, 27, 'allow', 'Reception', 1, '2020-09-07 04:54:46', NULL),
(971, 3, 27, 'allow', 'Reception', 1, '2020-09-07 04:54:46', NULL),
(972, 4, 27, 'allow', 'Reception', 1, '2020-09-07 04:54:46', NULL),
(973, 5, 27, 'allow', 'Reception', 1, '2020-09-07 04:54:46', NULL),
(974, 39, 27, 'allow', 'Reports', 1, '2020-09-07 04:54:48', NULL),
(975, 40, 27, 'allow', 'Reports', 1, '2020-09-07 04:54:48', NULL),
(976, 43, 27, 'allow', 'Reports', 1, '2020-09-07 04:54:48', NULL),
(977, 44, 27, 'allow', 'Reports', 1, '2020-09-07 04:54:48', NULL),
(978, 16, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(979, 17, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(980, 18, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(981, 19, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(982, 20, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(983, 21, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(984, 22, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(985, 23, 27, 'allow', 'Settings', 1, '2020-09-07 04:54:50', NULL),
(986, 18, 2, 'allow', 'Settings', 1, '2020-10-01 08:11:12', NULL),
(987, 20, 2, 'allow', 'Settings', 1, '2020-10-01 08:11:23', NULL),
(988, 19, 2, 'allow', 'Settings', 1, '2020-10-01 08:11:30', NULL),
(990, 6, 2, 'allow', 'Diagnostics', 1, '2020-10-01 08:18:09', NULL),
(991, 7, 2, 'allow', 'Diagnostics', 1, '2020-10-01 08:18:09', NULL),
(992, 8, 2, 'allow', 'Diagnostics', 1, '2020-10-01 08:18:09', NULL),
(993, 9, 2, 'allow', 'Diagnostics', 1, '2020-10-01 08:18:09', NULL),
(994, 10, 2, 'allow', 'Diagnostics', 1, '2020-10-01 08:18:09', NULL),
(995, 11, 2, 'allow', 'Diagnostics', 1, '2020-10-01 08:18:09', NULL),
(996, 30, 2, 'allow', 'Accounts', 1, '2020-12-23 08:43:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recovery_password`
--

CREATE TABLE `recovery_password` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `token_expiration_time` varchar(50) NOT NULL,
  `token_status` enum('active','expired') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recovery_password`
--

INSERT INTO `recovery_password` (`id`, `token`, `user_id`, `user_email`, `token_expiration_time`, `token_status`) VALUES
(36, 'f5c67d0d3cd9db7512bd9589bf715355d3e42076998bc472c5399787b32b6b80', 2, 'ibnulhayatkhan@gmail.com', '2021-01-26 18:59:15', 'expired'),
(38, 'fdee249ce661b90f5941ed0d356e51a3f5b9f114096d6f1ff20df38d761aa034', 1, 'admin@gmail.com', '2021-01-26 19:16:52', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district_id` int(11) NOT NULL,
  `thana_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `name`, `address`, `district_id`, `thana_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(4, 'Kachipara Union Health & Family Welfare Center', 'Vill- Kachipara, P.O.- Kachipara, Union-Kachipara.', 31, 234, '2020-12-14 10:06:03', 1, '2020-12-30 11:36:42', 1, 'active'),
(7, 'Dhulia Union Health & Family Welfare Center', 'Vill- Dhulia, P.O.- Dhulia Union- Dhulia', 31, 234, '2020-12-30 11:38:34', 1, '0000-00-00 00:00:00', 0, 'active'),
(8, 'Bangladesh Protibondhi Foundation', 'Mirpur-2 , Borobag, Post-office 01726851582', 47, 494, '2020-12-30 11:40:09', 1, '2020-12-30 12:03:55', 1, 'active'),
(9, 'Acid Survivors Foundation', 'House#12-13, Road#22, Block#K, Banani Model Town, Dhaka-1213.', 47, 495, '2020-12-30 12:27:12', 1, '2021-01-16 11:29:31', 1, 'active'),
(10, 'Autism Welfare Foundation', 'House#38/40, Road-4, Block- Kha, PC Culture Housing Society, Mohammadpur, Dhaka-1207 Contact No. 8121759, 01552363575, 01819447233', 47, 367, '2021-01-16 11:28:00', 1, '2021-01-16 11:29:27', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id`, `title`, `category_id`, `keywords`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(8, 'কেন আমি হীনমন্যতা ভুগী?', 6, 'unknown', '<p>ঋতুস্রাবের ৭-১০ দিন আগে কিশোরীরা অনুভব করতে পারেন-</p>\r\n\r\n<ul>\r\n	<li>বিরক্তি ও অস্বস্তি</li>\r\n	<li>খাদ্যনালীতে গোলোযোগ, কোষ্টকাঠিন্য ও বৃহদান্ত্রে ব্যথা</li>\r\n	<li>স্তন, তলপেট, মুখ ও পা ভারী হয়ে আসা</li>\r\n	<li>ওজন বৃদ্ধি ১-১.৫ কেজি।</li>\r\n</ul>\r\n\r\n<p>অধিকাংশ কিশোরীই লবণ গ্রহণ কমিয়ে নিয়মিত ব্যায়াম করে এবং আবেগজনিত সহায়তার মাধ্যমে উপকার পেতে পারেন, না হলে চিকিৎসকের পরামর্শ বাঞ্ছনীয়।&nbsp;</p>', '2020-12-29 11:43:20', 1, '2020-12-29 12:52:48', 1, 'active'),
(9, 'বাজারে যে নামে ইসিপি পাওয়া যায় এবং এগুলো খাওয়ার নিয়ম', 13, 'unknown', '<p>ইসিপি বাজারে পসটিনর-২, এমকন-১, নোরপিল-১ ও নোরিক্স নামে পাওয়া যায়।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>পসটিনর ২ এবং নোরিক্স &ndash; এর একটি পাতায় দুইটি বড়ি থাকে।&nbsp;</p>\r\n\r\n<p>খাওয়ার নিয়মঃ</p>\r\n\r\n<ol>\r\n	<li>১ম বড়ি অরক্ষিত সহবাসের ৭২ ঘন্টা বা ৩ দিনের মধ্যে অবশ্যই খেতে হবে। তবে অরক্ষিত সহবাসের প্রথম ২৪ ঘন্টার মধ্যে ইসিপি নিলে তা সবচেয়ে বেশি কার্জকর হয়।প্রথম ২৪ ঘন্টার পর যত দেরী হবে এর কার্জকারিতা কমতে থাকে। এজন্য ইসিপি অরক্ষিত যৌনমিলনের পর যত তারাতারি সম্ভব খাওয়া উচিত। &nbsp;&nbsp;</li>\r\n	<li>২য় বড়ি ১ম ডোজের ১২ ঘন্টা পর খেতে হবে।</li>\r\n	<li>যদি ইসিপির যে কোন একটি ডোজ খাওয়ার ২ ঘন্টার মধ্যে বমি হয়ে যায় তাহলে পুনরায় সে ডোজ খেতে হবে। তা না হলে ইসিপি শরীরে ঠিকভাবে &nbsp;শোষণ হবেনা এবং এর কার্জকরীতা নষ্ট হবে।&nbsp;</li>\r\n	<li>বমি রোধ করার জন্য ভরা পেটে ইসিপি খেতে হবে কিংবা ইসিপি খাওয়ার আগে বমির ঔষধ খেয়ে নিতে হবে।&nbsp;</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>এমকন ১ এবং নোরপিল ১ এর একটি পাতায় একটি বড়ি থাকে।</p>\r\n\r\n<p>খাওয়ার নিয়মঃ</p>\r\n\r\n<p>অরক্ষিত সহবাসের ৭২ ঘন্টা বা ৩ দিনের মধ্যে অবশ্যই বড়ি খেতে হবে। তবে অরক্ষিত সহবাসের প্রথম ২৪ ঘন্টার মধ্যে ইসিপি নিলে তা সবচেয়ে বেশি কার্জকর হয়। এজন্য ইসিপি অরক্ষিত যৌনমিলনের পর যত তারাতারি সম্ভব খাওয়া উচিত।&nbsp;</p>\r\n\r\n<ol>\r\n	<li>কোন কারনে বড়ি খাওয়ার দুই ঘন্টার মধ্যে বমি হয়ে গেলে সাথে সাথে পুনরায় আরেকটি বড়ি খেতে হবে।তা না হলে ইসিপি শরীরে ঠিকভাবে শোষণ হবেনা এবং এর কার্জকরীতা নষ্ট হবে।&nbsp;</li>\r\n	<li>বমি রোধ করার জন্য ভরা পেটে ইসিপি খেতে হবে কিংবা ইসিপি খাওয়ার আগে বমির ঔষধ খেয়ে নিতে হবে।</li>\r\n</ol>', '2020-12-29 12:59:16', 1, '0000-00-00 00:00:00', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reso_category`
--

CREATE TABLE `reso_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reso_category`
--

INSERT INTO `reso_category` (`id`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(6, 'Menstruation', 'Periodic discharge of blood and mucosal tissue from the inner lining of the uterus through the vagina.', '2020-12-20 09:43:22', 1, '2020-12-20 09:49:51', 1, 'active'),
(7, 'Wet dreams', 'A nocturnal emission or wet dream is a spontaneous orgasm during sleep, including ejaculation for a male, and vaginal wetness for a female.', '2020-12-20 09:44:20', 1, '2020-12-20 09:50:09', 1, 'active'),
(8, 'Masturbation', 'Self-sexual stimulation of the genitals for sexual arousal or other sexual pleasure, usually to the point of orgasm.', '2020-12-20 09:44:58', 1, '2020-12-20 09:49:21', 1, 'active'),
(9, 'Sexuality', 'Capacity to have erotic experiences and responses.', '2020-12-20 09:45:30', 1, '0000-00-00 00:00:00', 0, 'active'),
(10, 'Puberty', 'The process of physical changes by which a child\'s body matures into an adult body capable of sexual reproduction to enable fertilization.', '2020-12-20 09:48:32', 1, '0000-00-00 00:00:00', 0, 'active'),
(13, 'Contraception', 'Contraception are methods or devices that are used to prevent pregnancy.', '2020-12-29 12:56:23', 1, '0000-00-00 00:00:00', 0, 'active'),
(14, 'Condom', 'It is a barrier device commonly used during sexual intercourse to reduce the probability of pregnancy and spreading sexually transmitted infections.', '2021-01-05 04:55:25', 1, '0000-00-00 00:00:00', 0, 'active'),
(15, 'Contraceptive pill', 'These are medications taken by mouth for the purpose of birth control.', '2021-01-05 04:55:45', 1, '0000-00-00 00:00:00', 0, 'active'),
(16, 'Contraceptive methods', 'These are methods or devices used to prevent pregnancy.', '2021-01-05 04:56:11', 1, '0000-00-00 00:00:00', 0, 'active'),
(17, 'Rape', 'Rape is a type of sexual assault usually involving sexual intercourse or other forms of sexual penetration initiated against one or more individuals without the consent of those individuals.', '2021-01-05 05:00:24', 1, '0000-00-00 00:00:00', 0, 'active'),
(18, 'Sexual Harassment/ Assault', 'no, any description', '2021-01-05 10:58:22', 1, '2021-01-09 07:49:53', 1, 'active'),
(19, 'Support for family and friends of victims of sexual assault', 'The crime of sexual assault stirs-up a lot of strong feelings, such as shock or distress. Sometimes people want to take matters into their own hands or are very angry. If the assault was committed by someone in the family, or by someone you know, their mahfjd.', '2021-01-09 10:00:37', 1, '2021-01-24 12:04:11', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas_or_thanas`
--

CREATE TABLE `upazilas_or_thanas` (
  `id` int(11) NOT NULL,
  `district_id` int(2) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `bn_name` varchar(75) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upazilas_or_thanas`
--

INSERT INTO `upazilas_or_thanas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd', '2020-12-14 07:50:55', 1, '2020-12-15 14:01:34', 1, 'active'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    ', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active');
INSERT INTO `upazilas_or_thanas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(494, 47, 'Mirpur', NULL, NULL, '2020-12-30 12:03:08', 1, '0000-00-00 00:00:00', 0, 'active'),
(495, 47, 'Banani Model Town', NULL, NULL, '2020-12-30 12:28:00', 1, '0000-00-00 00:00:00', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`, `address`, `phone`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, 'Admin', 'admin@gmail.com', '93279e3308bdbbeed946fc965017f67a', 1, '1608537589.jpg', '4/A, Niikunja-2, Dhaka-1229', '01512212123', '2020-12-21 07:59:49', 1, '2021-01-23 07:10:47', 0, 'active'),
(2, 'Kabir sing', 'ibnulhayatkhan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, '1608538405.jpg', '6/B, Uttara, Dhaka-1230', '01317298127', '2020-12-21 08:13:25', 1, '2021-01-26 12:30:15', 0, 'active'),
(3, 'Boric jonson', 'boricjonson@gmail.com', '93279e3308bdbbeed946fc965017f67a', 3, NULL, '', '01700231245', '2020-12-21 08:29:40', 1, '2021-01-23 07:49:19', 0, 'active'),
(4, 'Eleyas Suny', 'eleyassuny@gmail.com', '93279e3308bdbbeed946fc965017f67a', 4, '1608542459.jpeg', '3/B, Uttara, Dhaka-1230', '01987453409', '2020-12-21 09:20:59', 1, '2021-01-23 07:49:22', 0, 'active'),
(5, 'Mosarof jonson', 'helloworld3@gmail.com', '93279e3308bdbbeed946fc965017f67a', 4, '1608661846.jpg', '4/C, Uttara', '01987453412', '2020-12-22 18:30:46', 1, '2021-01-23 07:49:24', 0, 'active'),
(6, 'Himika Aksir', 'himikaaksir@gmail.com', '93279e3308bdbbeed946fc965017f67a', 2, '1609247957.jpg', 'nikunja-2,Dhaka', '01987453490', '2020-12-29 13:19:17', 1, '2021-01-23 07:49:45', 0, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabin`
--
ALTER TABLE `cabin`
  ADD PRIMARY KEY (`id_cabin`);

--
-- Indexes for table `caller_info`
--
ALTER TABLE `caller_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `caller_service`
--
ALTER TABLE `caller_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_list`
--
ALTER TABLE `group_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `page_users`
--
ALTER TABLE `page_users`
  ADD PRIMARY KEY (`id_page_users`);

--
-- Indexes for table `recovery_password`
--
ALTER TABLE `recovery_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reso_category`
--
ALTER TABLE `reso_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas_or_thanas`
--
ALTER TABLE `upazilas_or_thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabin`
--
ALTER TABLE `cabin`
  MODIFY `id_cabin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `caller_info`
--
ALTER TABLE `caller_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `caller_service`
--
ALTER TABLE `caller_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `group_list`
--
ALTER TABLE `group_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `page_users`
--
ALTER TABLE `page_users`
  MODIFY `id_page_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=997;

--
-- AUTO_INCREMENT for table `recovery_password`
--
ALTER TABLE `recovery_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reso_category`
--
ALTER TABLE `reso_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `upazilas_or_thanas`
--
ALTER TABLE `upazilas_or_thanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
