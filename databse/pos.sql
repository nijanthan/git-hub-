-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2013 at 12:43 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `store_name` varchar(100) NOT NULL,
  `store_place` varchar(50) NOT NULL,
  `store_city` varchar(50) NOT NULL,
  `store_zip` varchar(40) NOT NULL,
  `store_country` varchar(50) NOT NULL,
  `store_website` varchar(30) NOT NULL,
  `store_phone` varchar(15) NOT NULL,
  `store_email` varchar(100) NOT NULL,
  `store_fax` varchar(100) NOT NULL,
  `store_tax1` varchar(100) NOT NULL,
  `store_tax2` varchar(100) NOT NULL,
  `delete_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `store_name`, `store_place`, `store_city`, `store_zip`, `store_country`, `store_website`, `store_phone`, `store_email`, `store_fax`, `store_tax1`, `store_tax2`, `delete_status`) VALUES
(1, 'HSR Layout', '', '', '', '', '', '', '', '', '', '', 0),
(2, 'Erumely', '', '', '', '', '', '', '', '', '', '', 0),
(3, 'Kottayam', '', '', '', '', '', '', '', '', '', '', 0),
(4, 'ponkunnam', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`) VALUES
(1, 'Sales Man'),
(2, 'Stock Man'),
(3, 'Office Supplies'),
(4, 'Support Managers'),
(5, 'Sales Support '),
(6, 'Marketing Office'),
(7, 'Store Main'),
(8, 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `employeepermission`
--

CREATE TABLE IF NOT EXISTS `employeepermission` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `employeepermission`
--

INSERT INTO `employeepermission` (`id`, `permission`, `emp_id`) VALUES
(13, '0001', 28),
(14, '0000', 29),
(15, '0000', 30),
(16, '0000', 32),
(17, '0000', 33),
(18, '0000', 34),
(19, '0000', 35),
(20, '0000', 36),
(21, '0000', 40),
(22, '0000', 42),
(23, '0000', 43),
(24, '1111', 45),
(25, '0000', 46),
(26, '0000', 47);

-- --------------------------------------------------------

--
-- Table structure for table `itempermission`
--

CREATE TABLE IF NOT EXISTS `itempermission` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `itempermission`
--

INSERT INTO `itempermission` (`id`, `permission`, `emp_id`) VALUES
(12, '1001', 28),
(13, '0000', 29),
(14, '0000', 30),
(15, '0000', 32),
(16, '0000', 33),
(17, '0000', 34),
(18, '0000', 35),
(19, '0000', 36),
(20, '0000', 40),
(21, '0000', 42),
(22, '0000', 43),
(23, '1111', 45),
(24, '0000', 46),
(25, '0000', 47);

-- --------------------------------------------------------

--
-- Table structure for table `userbranchs`
--

CREATE TABLE IF NOT EXISTS `userbranchs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `userbranchs`
--

INSERT INTO `userbranchs` (`id`, `branch_id`, `branch_name`, `emp_id`) VALUES
(50, 4, 'ponkunnam', 45),
(51, 1, 'HSR Layout', 45),
(63, 2, 'Erumely', 47),
(64, 1, 'HSR Layout', 47),
(65, 4, 'ponkunnam', 47);

-- --------------------------------------------------------

--
-- Table structure for table `userdepart`
--

CREATE TABLE IF NOT EXISTS `userdepart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `depart_id` int(11) NOT NULL,
  `depart_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `userdepart`
--

INSERT INTO `userdepart` (`id`, `depart_id`, `depart_name`, `emp_id`) VALUES
(22, 1, 'Sales Man', 45),
(23, 7, 'Store Main', 45),
(24, 5, 'Sales Support ', 45),
(35, 1, 'Sales Man', 47),
(36, 6, 'Marketing Office', 47),
(37, 5, 'Sales Support ', 47),
(38, 8, 'Art', 47),
(39, 7, 'Store Main', 47),
(40, 4, 'Support Managers', 47),
(41, 3, 'Office Supplies', 47),
(42, 2, 'Stock Man', 47);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `active` int(10) NOT NULL,
  `created_by` int(100) NOT NULL,
  `deleted_by` int(100) NOT NULL,
  `deleted` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `first_name`, `last_name`, `address`, `sex`, `age`, `city`, `state`, `zip`, `country`, `email`, `phone`, `image`, `dob`, `active`, `created_by`, `deleted_by`, `deleted`) VALUES
(45, 'Usd125', 'Reset@123', 'monish', 'km', 'Slvpg', 'Male', 23, 'bangalore', 'karnadaka', '675646', 'india', 'monish@gmail.com', '7795398584', '1322524800', '0', 0, 28, 0, 0),
(47, 'USD123', 'Reset@123', 'jibi', 'gopi', 'slvpg', 'Male', 23, 'bangalore', 'karandaka', '675643', 'india', 'jibi344443@yahoo.com', '7795398584', '654912000', '0', 0, 45, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
