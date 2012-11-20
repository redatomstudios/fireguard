-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2012 at 10:25 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

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
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `EventTypeId` int(11) NOT NULL,
  `SquadId` varchar(10) NOT NULL,
  `CreateTime` datetime NOT NULL,
  `EventTime` datetime NOT NULL,
  `Duration` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE IF NOT EXISTS `eventtype` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MId` varchar(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` int(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Type` enum('Station','Squad','Member','Default') NOT NULL DEFAULT 'Default',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `MId` (`MId`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id`, `MId`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `Type`) VALUES
(1, 'usCDjz', 'Albi', 'Geo', 123, 'albin@gmail.com', 'Default');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `opensesame`
--

INSERT INTO `opensesame` (`Id`, `MId`, `AccessCode`) VALUES
(1, 'usCDjz', '334389048b872a533002b34d73f8c29fd09efc50');

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
  PRIMARY KEY (`Id`),
  UNIQUE KEY `MId` (`MId`,`ProfileImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Id`, `MId`, `FirstName`, `LastName`, `EmploymentDate`, `JoiningDate`, `Age`, `ProfileImage`) VALUES
(1, 'usCDjz', 'Albi', 'Geo', '0000-00-00', '2012-11-15', 25, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
