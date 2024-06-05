-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 09:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawsvet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointmentID` int(11) NOT NULL,
  `contactID` int(11) NOT NULL,
  `petID` int(11) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `appointmentStatus` enum('pending','cancelled','done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactinfo`
--

CREATE TABLE `tbl_contactinfo` (
  `contactID` int(11) NOT NULL,
  `loginID` int(11) DEFAULT NULL,
  `contactLastName` varchar(50) NOT NULL,
  `contactFirstName` varchar(50) NOT NULL,
  `contactMiddleInitial` varchar(10) DEFAULT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `contactAddress` varchar(255) NOT NULL,
  `contactType` enum('doctor','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contactinfo`
--

INSERT INTO `tbl_contactinfo` (`contactID`, `loginID`, `contactLastName`, `contactFirstName`, `contactMiddleInitial`, `contactNumber`, `contactAddress`, `contactType`) VALUES
(1, 1, 'Anderson', 'Tester', 'T.', '09603278727', '2 Test Street, Testing City, Philippines', 'user'),
(2, 2, 'Tester', 'Pangalawang', 'B.', '09155553142', '45 Test Avenue, Testing City, Philippines', 'user'),
(4, 4, 'Testing', 'Pangatlong', '', '09565551234', 'Test Road, Testing City, Philippines', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctorinfo`
--

CREATE TABLE `tbl_doctorinfo` (
  `doctorID` int(11) NOT NULL,
  `contactID` int(11) NOT NULL,
  `doctorRole` enum('gpv','ims','surgeon','dentist','pet groomer') NOT NULL,
  `doctorService` enum('check-up','surgery','dentist','grooming','vaccination') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctorschedule`
--

CREATE TABLE `tbl_doctorschedule` (
  `scheduleID` int(11) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `scheduleTime` time NOT NULL,
  `scheduleStatus` enum('open','taken','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logininfo`
--

CREATE TABLE `tbl_logininfo` (
  `loginID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userEmail` varchar(254) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userType` enum('admin','doctor','user','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logininfo`
--

INSERT INTO `tbl_logininfo` (`loginID`, `username`, `userEmail`, `userPass`, `userType`) VALUES
(1, 'usertest', 'testeranderson@gmail.com', '$2y$10$gAF6KUDIVD1uov1tnlCFpu8b0lFZT2ZXSFj5HRO8AvtkpitGYj1Am', 'user'),
(2, 'usertesttwo', 'testertwo@gmail.com', '$2y$10$JIqiOF.gKcVn/LTqI6FMluhD9ivdR1AlD5OR.OAaTvOAPyVL4hRv6', 'user'),
(3, 'admin', 'euvertzionpagad@gmail.com', '$2y$10$EhQ6I9fmzIJEAXNkf3TNvO4Hi18dfeWn94o2s./SIHjLAPt9N9qim', 'admin'),
(4, 'testthree', 'testthree@gmail.com', '$2y$10$zZQtSPnulIzUHGhXovCXL.qJYo499HrjQOO1P67NEy1im./2Idcc.', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petinfo`
--

CREATE TABLE `tbl_petinfo` (
  `petID` int(11) NOT NULL,
  `contactID` int(11) NOT NULL,
  `petName` varchar(50) NOT NULL,
  `petGender` enum('male','female') NOT NULL,
  `petType` enum('dog','cat') NOT NULL,
  `petBreed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `tbl_appointment link tbl_contactinfo` (`contactID`),
  ADD KEY `tbl_appointment link tbl_doctorinfo` (`doctorID`),
  ADD KEY `tbl_appointment link tbl_petinfo` (`petID`),
  ADD KEY `tbl_appointment link tbl_doctorschedule` (`scheduleID`);

--
-- Indexes for table `tbl_contactinfo`
--
ALTER TABLE `tbl_contactinfo`
  ADD PRIMARY KEY (`contactID`),
  ADD UNIQUE KEY `tbl_contactinfo contact number unique` (`contactNumber`),
  ADD KEY `tbl_contactinfo link tbl_logininfo` (`loginID`);

--
-- Indexes for table `tbl_doctorinfo`
--
ALTER TABLE `tbl_doctorinfo`
  ADD PRIMARY KEY (`doctorID`),
  ADD KEY `tbl_doctorinfo link tbl_contactinfo` (`contactID`);

--
-- Indexes for table `tbl_doctorschedule`
--
ALTER TABLE `tbl_doctorschedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `tbl_doctorschedule like tbl_doctorinfo` (`doctorID`);

--
-- Indexes for table `tbl_logininfo`
--
ALTER TABLE `tbl_logininfo`
  ADD PRIMARY KEY (`loginID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`userEmail`);

--
-- Indexes for table `tbl_petinfo`
--
ALTER TABLE `tbl_petinfo`
  ADD PRIMARY KEY (`petID`),
  ADD KEY `tbl_petinfo link tbl_contactinfo` (`contactID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contactinfo`
--
ALTER TABLE `tbl_contactinfo`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_doctorinfo`
--
ALTER TABLE `tbl_doctorinfo`
  MODIFY `doctorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_doctorschedule`
--
ALTER TABLE `tbl_doctorschedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_logininfo`
--
ALTER TABLE `tbl_logininfo`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_petinfo`
--
ALTER TABLE `tbl_petinfo`
  MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `tbl_appointment link tbl_contactinfo` FOREIGN KEY (`contactID`) REFERENCES `tbl_contactinfo` (`contactID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_appointment link tbl_doctorinfo` FOREIGN KEY (`doctorID`) REFERENCES `tbl_doctorinfo` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_appointment link tbl_doctorschedule` FOREIGN KEY (`scheduleID`) REFERENCES `tbl_doctorschedule` (`scheduleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_appointment link tbl_petinfo` FOREIGN KEY (`petID`) REFERENCES `tbl_petinfo` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_contactinfo`
--
ALTER TABLE `tbl_contactinfo`
  ADD CONSTRAINT `tbl_contactinfo link tbl_logininfo` FOREIGN KEY (`loginID`) REFERENCES `tbl_logininfo` (`loginID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_doctorinfo`
--
ALTER TABLE `tbl_doctorinfo`
  ADD CONSTRAINT `tbl_doctorinfo link tbl_contactinfo` FOREIGN KEY (`contactID`) REFERENCES `tbl_contactinfo` (`contactID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_doctorschedule`
--
ALTER TABLE `tbl_doctorschedule`
  ADD CONSTRAINT `tbl_doctorschedule like tbl_doctorinfo` FOREIGN KEY (`doctorID`) REFERENCES `tbl_doctorinfo` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_petinfo`
--
ALTER TABLE `tbl_petinfo`
  ADD CONSTRAINT `tbl_petinfo link tbl_contactinfo` FOREIGN KEY (`contactID`) REFERENCES `tbl_contactinfo` (`contactID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
