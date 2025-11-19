-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2025 at 03:56 AM
-- Server version: 9.3.0
-- PHP Version: 8.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frankfinn_apidata`
--

-- --------------------------------------------------------

--
-- Table structure for table `lead_table`
--

CREATE TABLE `lead_table` (
  `id` int NOT NULL,
  `ts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `full_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `centerId` int DEFAULT NULL,
  `qualificationId` int DEFAULT NULL,
  `campaign_source` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `utm_medium` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `utm_campaign` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `utm_term` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `utm_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `gad_source` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `gclid` int DEFAULT NULL,
  `gbraid` int DEFAULT NULL,
  `api_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `api_message` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lead_table`
--

INSERT INTO `lead_table` (`id`, `ts`, `full_name`, `mobile`, `email`, `dob`, `centerId`, `qualificationId`, `campaign_source`, `utm_medium`, `utm_campaign`, `utm_term`, `utm_content`, `gad_source`, `gclid`, `gbraid`, `api_status`, `api_message`) VALUES
(1, '2025-11-10 12:00:11', 'Mahiya Mahi', '7542989172', 'hasibatajrin@gmail.com', '2004-05-02', 34, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(2, '2025-11-10 18:09:09', 'Test 151', '9615196151', 'test151@gmail.com', '2005-05-01', 20, 12, '89', 'test 151', 'test', 'test', 'test', NULL, NULL, NULL, 'fail', NULL),
(3, '2025-11-10 18:09:53', 'Test 151', '9615196151', 'test151@gmail.com', '2005-05-01', 20, 12, '89', 'test 151', 'test', 'test', 'test', NULL, NULL, NULL, 'fail', NULL),
(4, '2025-11-10 18:14:31', 'Test 151', '9615196151', 'test151@gmail.com', '2005-05-01', 20, 12, '89', 'test 151', 'test', 'test', 'test', NULL, NULL, NULL, 'fail', 'Email & Phone Already Exists!'),
(5, '2025-11-10 18:16:08', 'Test 151', '9615196151', 'test151@gmail.com', '2005-05-01', 20, 12, '89', 'test 151', 'test', 'test', 'test', NULL, NULL, NULL, 'fail', 'Email & Phone Already Exists!'),
(6, '2025-11-10 18:16:51', 'Test 151', '9615196151', 'test151@gmail.com', '2005-05-01', 20, 12, '89', 'test 151', 'test', 'test', 'test', NULL, NULL, NULL, 'fail', 'Email & Phone Already Exists!'),
(7, '2025-11-10 18:19:42', 'Test 152', '9615296152', 'test152@gmail.com', '2004-05-02', 34, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'You are not authorised!'),
(8, '2025-11-10 18:20:00', 'Test 152', '9615296152', 'test152@gmail.com', '2004-05-02', 34, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'You are not authorised!'),
(9, '2025-11-10 18:26:12', 'Test 152', '9615296152', 'test152@gmail.com', '2004-05-02', 20, 12, '89', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 'Lead Saved Successfully!'),
(10, '2025-11-10 18:26:12', 'Test 153', '9615396153', 'test153@gmail.com', '2000-05-02', 20, 12, '89', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'Email & Phone Already Exists!'),
(11, '2025-11-10 18:38:33', 'Test 241', '9624196241', 'test241@gmail.com', '2004-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 'Lead Saved Successfully!'),
(12, '2025-11-10 18:38:34', 'Test 242', '9624296242', 'test242@gmail.com', '2000-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'You are not eligible!'),
(13, '2025-11-10 18:40:20', 'Test 241', '9624196241', 'test241@gmail.com', '2004-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'Email & Phone Already Exists!'),
(14, '2025-11-10 18:40:20', 'Test 242', '9624296242', 'test242@gmail.com', '2000-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'You are not eligible!'),
(15, '2025-11-10 18:42:17', 'Test 241', '9624196241', 'test241@gmail.com', '2004-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'Email & Phone Already Exists!'),
(16, '2025-11-10 18:42:17', 'Test 242', '9624296242', 'test242@gmail.com', '2000-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'You are not eligible!'),
(17, '2025-11-10 18:42:17', 'Test 243', '9624396243', 'test243@gmail.com', '2004-05-03', 20, 12, '231', 'test', 'test', 'test', 'test', 'teset', 0, 0, 'success', 'Lead Saved Successfully!'),
(18, '2025-11-11 16:07:31', 'Test 241', '9624196241', 'test241@gmail.com', '2004-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 'Lead Saved Successfully!'),
(19, '2025-11-11 16:07:31', 'Test 242', '9624296242', 'test242@gmail.com', '2000-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'You are not eligible!'),
(20, '2025-11-11 16:07:32', 'Test 243', '9624396243', 'test243@gmail.com', '2004-05-03', 20, 12, '231', 'test', 'test', 'test', 'test', 'teset', 0, 0, 'success', 'Lead Saved Successfully!'),
(21, '2025-11-11 16:08:15', 'Test 241', '9624196241', 'test241@gmail.com', '2004-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 'Lead Saved Successfully!'),
(22, '2025-11-11 16:08:15', 'Test 242', '9624296242', 'test242@gmail.com', '2000-05-02', 20, 12, '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fail', 'You are not eligible!'),
(23, '2025-11-11 16:08:15', 'Test 243', '9624396243', 'test243@gmail.com', '2004-05-03', 20, 12, '231', 'test', 'test', 'test', 'test', 'teset', 0, 0, 'success', 'Lead Saved Successfully!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lead_table`
--
ALTER TABLE `lead_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lead_table`
--
ALTER TABLE `lead_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
