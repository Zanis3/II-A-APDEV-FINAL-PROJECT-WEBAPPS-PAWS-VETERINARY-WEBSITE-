-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 08:02 PM
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
-- Table structure for table `tbl_logininfo`
--

CREATE TABLE `tbl_logininfo` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userEmail` varchar(254) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `usertype` enum('admin','doctor','user','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logininfo`
--

INSERT INTO `tbl_logininfo` (`userID`, `username`, `userEmail`, `userpassword`, `usertype`) VALUES
(1, 'usertest', 'testeranderson@gmail.com', '$2y$10$gAF6KUDIVD1uov1tnlCFpu8b0lFZT2ZXSFj5HRO8AvtkpitGYj1Am', 'user'),
(2, 'usertesttwo', 'testertwo@gmail.com', '$2y$10$JIqiOF.gKcVn/LTqI6FMluhD9ivdR1AlD5OR.OAaTvOAPyVL4hRv6', 'user'),
(3, 'admin', 'euvertzionpagad@gmail.com', '$2y$10$EhQ6I9fmzIJEAXNkf3TNvO4Hi18dfeWn94o2s./SIHjLAPt9N9qim', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userinfo`
--

CREATE TABLE `tbl_userinfo` (
  `userID` int(11) NOT NULL,
  `userLastName` varchar(50) NOT NULL,
  `userFirstName` varchar(50) NOT NULL,
  `userMiddleInitial` varchar(10) DEFAULT NULL,
  `userContactNumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userinfo`
--

INSERT INTO `tbl_userinfo` (`userID`, `userLastName`, `userFirstName`, `userMiddleInitial`, `userContactNumber`) VALUES
(1, 'Anderson', 'Tester', 'T.', '09603278727'),
(2, 'Tester', 'Pangalawang', 'B.', '0915 555 3142');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_logininfo`
--
ALTER TABLE `tbl_logininfo`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`userEmail`);

--
-- Indexes for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  ADD KEY `one to one` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_logininfo`
--
ALTER TABLE `tbl_logininfo`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_userinfo`
--
ALTER TABLE `tbl_userinfo`
  ADD CONSTRAINT `userID connection` FOREIGN KEY (`userID`) REFERENCES `tbl_logininfo` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
