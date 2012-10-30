-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2012 at 06:58 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fireguarddb`
--
CREATE DATABASE `fireguarddb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fireguarddb`;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MId` varchar(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` int(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Type` enum('Station','Squad','Member') NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `MId` (`MId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opensesame`
--

CREATE TABLE IF NOT EXISTS `opensesame` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MId` varchar(10) NOT NULL,
  `AccessCode` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `MId` (`MId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MId` varchar(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmploymentDate` date DEFAULT NULL,
  `JoiningDate` date NOT NULL,
  `Age` int(11) NOT NULL,
  `ProfileImage` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `MId` (`MId`,`ProfileImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Id`, `MId`, `FirstName`, `LastName`, `EmploymentDate`, `JoiningDate`, `Age`, `ProfileImage`, `Username`) VALUES
(1, '', 'Test', 'Test2', NULL, '2012-10-30', 15, '', 'asd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
