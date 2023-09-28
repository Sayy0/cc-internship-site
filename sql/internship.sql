-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2023 at 12:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `Internship`
--

CREATE TABLE `Internship` (
  `internshipId` int(4) NOT NULL,
  `studentId` int(4) NOT NULL,
  `indemnityStatus` varchar(15) NOT NULL,
  `indemnityFP` varchar(200) NOT NULL,
  `parentsAckStatus` varchar(15) NOT NULL,
  `parentsAckFP` varchar(200) NOT NULL,
  `acceptanceLtrStatus` varchar(15) NOT NULL,
  `acceptanceLtrFP` varchar(200) NOT NULL,
  `report1Status` varchar(15) NOT NULL,
  `report1FP` varchar(200) NOT NULL,
  `report2Status` varchar(15) NOT NULL,
  `report2FP` varchar(200) NOT NULL,
  `report3Status` varchar(15) NOT NULL,
  `report3FP` varchar(200) NOT NULL,
  `finalReportStatus` varchar(15) NOT NULL,
  `finalReportFP` varchar(200) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
UPDATE Internship SET indemnityStatus = 'accepted', parentsAckStatus = 'accepted', acceptanceLtrStatus = 'accepted', indemnityFP = '$indemnFP', parentsAckFP = '$parentsFP', acceptanceLtrFP = '$companyFP' WHERE internshipId = 1
--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `staffId` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `staffPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `studentId` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `programme` varchar(3) NOT NULL,
  `studentPassword` varchar(200) NOT NULL,
  `picPath` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Internship`
--
ALTER TABLE `Internship`
  ADD PRIMARY KEY (`internshipId`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `studentId` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `Internship`
  MODIFY `internshipId` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
