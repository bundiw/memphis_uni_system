-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 07:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memphis_admission_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `staff_id` int(5) NOT NULL,
  `staff_email` varchar(30) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `access` varchar(10) NOT NULL DEFAULT 'admission'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`staff_id`, `staff_email`, `staff_password`, `access`) VALUES
(1, 'admission@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admission');

-- --------------------------------------------------------

--
-- Table structure for table `admission_status`
--

CREATE TABLE `admission_status` (
  `adm_id` int(5) NOT NULL,
  `a_id` int(5) NOT NULL,
  `remark` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_status`
--

INSERT INTO `admission_status` (`adm_id`, `a_id`, `remark`, `status`) VALUES
(1, 26, 'Form has not been fully filled, complete filling it for consideration.', 'proccessing');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `app_id` int(5) NOT NULL,
  `app_email` varchar(30) NOT NULL,
  `app_password` varchar(50) NOT NULL,
  `access` varchar(10) NOT NULL DEFAULT 'applicant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_id`, `app_email`, `app_password`, `access`) VALUES
(26, 'mary@gmail.com', '202cb962ac59075b964b07152d234b70', 'applicant'),
(27, 'kenn@gmail.com', '202cb962ac59075b964b07152d234b70', 'applicant');

-- --------------------------------------------------------

--
-- Table structure for table `attatchments`
--

CREATE TABLE `attatchments` (
  `file_id` int(5) NOT NULL,
  `a_id` int(5) NOT NULL,
  `idcard_url` varchar(30) NOT NULL,
  `highschool_file_url` varchar(30) NOT NULL,
  `tertiary_file_url` varchar(30) NOT NULL,
  `passport_file_url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eduaction_background`
--

CREATE TABLE `eduaction_background` (
  `eid` int(5) NOT NULL,
  `aid` int(5) NOT NULL,
  `school_level` varchar(20) NOT NULL,
  `school_name` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `town` varchar(20) NOT NULL,
  `zip_addr` varchar(30) NOT NULL,
  `gpa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `pid` int(5) NOT NULL,
  `a_id` int(5) NOT NULL,
  `a_fname` varchar(20) NOT NULL,
  `a_lname` varchar(20) NOT NULL,
  `a_sname` varchar(20) NOT NULL,
  `a_dob` varchar(20) NOT NULL,
  `a_gender` varchar(8) NOT NULL,
  `a_phoneno` varchar(13) NOT NULL,
  `a_idno` int(8) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `k_relationship` varchar(15) NOT NULL,
  `k_fname` varchar(20) NOT NULL,
  `k_lname` varchar(20) NOT NULL,
  `k_sname` varchar(20) NOT NULL,
  `k_gender` varchar(8) NOT NULL,
  `k-phoneno` varchar(13) NOT NULL,
  `k_idno` int(8) NOT NULL,
  `k_email` varchar(30) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip_addr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `study_programme`
--

CREATE TABLE `study_programme` (
  `pid` int(5) NOT NULL,
  `aid` int(5) NOT NULL,
  `study_level` varchar(30) NOT NULL,
  `study_facualty` varchar(30) NOT NULL,
  `study_programme` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `study_programme`
--

INSERT INTO `study_programme` (`pid`, `aid`, `study_level`, `study_facualty`, `study_programme`) VALUES
(1, 26, 'degree', 'arts', 'cre'),
(2, 26, 'diploma', 'physical science', 'chemisitry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_email` (`staff_email`);

--
-- Indexes for table `admission_status`
--
ALTER TABLE `admission_status`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`app_id`),
  ADD UNIQUE KEY `email` (`app_email`);

--
-- Indexes for table `attatchments`
--
ALTER TABLE `attatchments`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `eduaction_background`
--
ALTER TABLE `eduaction_background`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `study_programme`
--
ALTER TABLE `study_programme`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `staff_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_status`
--
ALTER TABLE `admission_status`
  MODIFY `adm_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `attatchments`
--
ALTER TABLE `attatchments`
  MODIFY `file_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eduaction_background`
--
ALTER TABLE `eduaction_background`
  MODIFY `eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `study_programme`
--
ALTER TABLE `study_programme`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
