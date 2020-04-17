-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 01:57 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinventory`
--

CREATE TABLE IF NOT EXISTS `bookinventory` (
  `BookID` int(11) NOT NULL,
  `bookname` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookinventory`
--

INSERT INTO `bookinventory` (`BookID`, `bookname`, `quantity`) VALUES
(1, 'A Game of Thrones  ', 2),
(2, 'A Clash of Kings', 4),
(3, 'A Storm of Swords', 6),
(4, 'A Feast for Crows', 3),
(5, 'A Dance with Dragons', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bookinventoryorder`
--

CREATE TABLE IF NOT EXISTS `bookinventoryorder` (
  `binvid` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `payment` varchar(30) DEFAULT NULL,
  `BookID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `bookinventoryorder`
--
ALTER TABLE `bookinventoryorder`
  ADD PRIMARY KEY (`binvid`),
  ADD KEY `BookID` (`BookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinventory`
--
ALTER TABLE `bookinventory`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookinventoryorder`
--
ALTER TABLE `bookinventoryorder`
  MODIFY `binvid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookinventoryorder`
--
ALTER TABLE `bookinventoryorder`
  ADD CONSTRAINT `bookinventoryorder_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `bookinventory` (`BookID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
