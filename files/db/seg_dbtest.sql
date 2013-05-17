-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2013 at 03:09 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seg_dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `seg_employee_import`
--

CREATE TABLE IF NOT EXISTS `seg_employee_import` (
  `batch_name` varchar(50) NOT NULL,
  `id` int(5) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  UNIQUE KEY `date_time` (`date_time`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `id_4` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seg_employee_list`
--

CREATE TABLE IF NOT EXISTS `seg_employee_list` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `holiday_rate` varchar(8) NOT NULL,
  `ot_rate` varchar(8) NOT NULL,
  `night_premium` varchar(8) NOT NULL,
  `creditable_hours` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
