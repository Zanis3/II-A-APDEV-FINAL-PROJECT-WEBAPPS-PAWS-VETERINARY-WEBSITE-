-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 07:47 AM
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
-- Database: `paws_vet_clinic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttbl`
--

CREATE TABLE `appointmenttbl` (
  `appointmentID` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `complaints` varchar(200) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `staff` varchar(100) DEFAULT NULL,
  `schedule` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ownertbl`
--

CREATE TABLE `ownertbl` (
  `ownerID` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `petID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pettbl`
--

CREATE TABLE `pettbl` (
  `petID` int(11) NOT NULL,
  `pName` varchar(100) DEFAULT NULL,
  `pAge` int(11) DEFAULT NULL,
  `pGender` varchar(10) DEFAULT NULL,
  `pType` varchar(50) DEFAULT NULL,
  `pBreed` varchar(100) DEFAULT NULL,
  `appointmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttbl`
--
ALTER TABLE `appointmenttbl`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `ownertbl`
--
ALTER TABLE `ownertbl`
  ADD PRIMARY KEY (`ownerID`),
  ADD KEY `petID` (`petID`);

--
-- Indexes for table `pettbl`
--
ALTER TABLE `pettbl`
  ADD PRIMARY KEY (`petID`),
  ADD KEY `fk_appointmentID` (`appointmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ownertbl`
--
ALTER TABLE `ownertbl`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pettbl`
--
ALTER TABLE `pettbl`
  MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ownertbl`
--
ALTER TABLE `ownertbl`
  ADD CONSTRAINT `ownertbl_ibfk_1` FOREIGN KEY (`petID`) REFERENCES `pettbl` (`petID`) ON DELETE CASCADE;

--
-- Constraints for table `pettbl`
--
ALTER TABLE `pettbl`
  ADD CONSTRAINT `fk_appointmentID` FOREIGN KEY (`appointmentID`) REFERENCES `appointmenttbl` (`appointmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
