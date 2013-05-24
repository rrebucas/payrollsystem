-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2013 at 07:03 AM
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
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `id_4` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seg_employee_import`
--

INSERT INTO `seg_employee_import` (`batch_name`, `id`, `date_time`, `status`) VALUES
('May1-15.13', 1, '3/14/2013 9:32:52 AM', 'C/In'),
('May1-15.13', 1, '3/15/2013 8:47:28 AM', 'C/Out'),
('May1-15.13', 1, '3/18/2013 6:55:32 AM', 'C/Out'),
('May1-15.13', 1, '3/18/2013 6:55:42 AM', 'C/In'),
('May1-15.13', 1, '3/19/2013 7:02:21 AM', 'C/In'),
('May1-15.13', 1, '3/22/2013 2:49:26 PM', 'C/In'),
('May1-15.13', 1, '3/22/2013 3:24:01 PM', 'C/In'),
('May1-15.13', 1, '3/22/2013 5:41:06 PM', 'C/Out'),
('May1-15.13', 15, '3/14/2013 10:09:15 PM', 'C/Out'),
('May1-15.13', 15, '3/15/2013 10:53:16 PM', 'C/Out'),
('May1-15.13', 15, '3/18/2013 9:11:05 AM', 'C/In'),
('May1-15.13', 15, '3/18/2013 10:16:10 PM', 'C/Out'),
('May1-15.13', 15, '3/19/2013 7:55:29 PM', 'C/Out'),
('May1-15.13', 15, '3/20/2013 1:42:46 PM', 'C/In'),
('May1-15.13', 15, '3/20/2013 8:28:27 PM', 'C/Out'),
('May1-15.13', 15, '3/21/2013 10:15:35 PM', 'C/Out'),
('May1-15.13', 15, '3/22/2013 10:15:02 PM', 'C/Out'),
('May1-15.13', 15, '3/25/2013 10:32:07 PM', 'C/Out'),
('May1-15.13', 15, '3/26/2013 11:20:08 AM', 'C/In');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
