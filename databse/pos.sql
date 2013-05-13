-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2013 at 11:26 AM
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
-- Table structure for table `branch_per`
--

CREATE TABLE IF NOT EXISTS `branch_per` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `branch_per`
--

INSERT INTO `branch_per` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(12, '1111', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `depabranch`
--

CREATE TABLE IF NOT EXISTS `depabranch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `depabranch`
--

INSERT INTO `depabranch` (`id`, `branch_id`, `department_id`) VALUES
(16, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`) VALUES
(17, 'Sales Man');

-- --------------------------------------------------------

--
-- Table structure for table `depart_per`
--

CREATE TABLE IF NOT EXISTS `depart_per` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `depart_per`
--

INSERT INTO `depart_per` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(12, '1111', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeepermission`
--

CREATE TABLE IF NOT EXISTS `employeepermission` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `employeepermission`
--

INSERT INTO `employeepermission` (`id`, `permission`, `emp_id`) VALUES
(34, '1111', 55);

-- --------------------------------------------------------

--
-- Table structure for table `itempermission`
--

CREATE TABLE IF NOT EXISTS `itempermission` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `itempermission`
--

INSERT INTO `itempermission` (`id`, `permission`, `emp_id`) VALUES
(34, '1111', 55);

-- --------------------------------------------------------

--
-- Table structure for table `item_per`
--

CREATE TABLE IF NOT EXISTS `item_per` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `item_per`
--

INSERT INTO `item_per` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(12, '1111', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `department`, `branch`) VALUES
(1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `userbranchs`
--

INSERT INTO `userbranchs` (`id`, `branch_id`, `branch_name`, `emp_id`) VALUES
(88, 1, 'HSR Layout', 55),
(89, 4, 'ponkunnam', 55),
(90, 3, 'Kottayam', 55);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `userdepart`
--

INSERT INTO `userdepart` (`id`, `depart_id`, `depart_name`, `emp_id`) VALUES
(22, 1, 'Sales Man', 45),
(23, 7, 'Store Main', 45),
(24, 5, 'Sales Support ', 45),
(43, 1, 'Sales Man', 47),
(44, 5, 'Sales Support ', 47),
(45, 2, 'Stock Man', 47),
(54, 1, 'Sales Man', 48),
(55, 1, 'Sales Man', 49),
(56, 4, 'Support Managers', 49),
(57, 1, 'Sales Man', 50),
(58, 3, 'Office Supplies', 50),
(59, 6, 'Marketing Office', 50),
(60, 3, 'Office Supplies', 51),
(61, 5, 'Sales Support ', 51),
(62, 1, 'Sales Man', 52),
(63, 4, 'Support Managers', 52),
(64, 4, 'Support Managers', 53),
(65, 3, 'Office Supplies', 54),
(66, 17, 'Sales Man', 55);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `first_name`, `last_name`, `address`, `sex`, `age`, `city`, `state`, `zip`, `country`, `email`, `phone`, `image`, `dob`, `active`, `created_by`, `deleted_by`, `deleted`) VALUES
(55, 'Usd123', 'f91e15dbec69fc40f81f0876e7009648', 'jibi', 'gopi', 'slvpg', 'Male', 23, 'bangalore', 'karnada', '676809', 'india', 'jibi344443@yahoo.com', '7795398584', '10.jpg', '654739200', 0, 45, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_per`
--

CREATE TABLE IF NOT EXISTS `user_per` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_per`
--

INSERT INTO `user_per` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(12, '1111', 17, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
