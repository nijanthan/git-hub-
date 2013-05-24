-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2013 at 06:21 AM
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
-- Table structure for table `branchs`
--

CREATE TABLE IF NOT EXISTS `branchs` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `store_name` varchar(100) NOT NULL,
  `store_city` varchar(50) NOT NULL,
  `store_state` varchar(50) NOT NULL,
  `store_zip` varchar(40) NOT NULL,
  `store_country` varchar(50) NOT NULL,
  `store_website` varchar(30) NOT NULL,
  `store_phone` varchar(15) NOT NULL,
  `store_email` varchar(100) NOT NULL,
  `store_fax` varchar(100) NOT NULL,
  `store_tax1` varchar(100) NOT NULL,
  `store_tax2` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `store_name`, `store_city`, `store_state`, `store_zip`, `store_country`, `store_website`, `store_phone`, `store_email`, `store_fax`, `store_tax1`, `store_tax2`, `active_status`, `deleted_by`) VALUES
(1, 'K F C', 'H S R ', 'karnada', '676809', 'india', 'hkjk', '9000607666', 'jibi@pluskb.com', '04828320080', '11', '10.12', 0, 0),
(2, 'Pizza Hut', 'Agra', '', '', '', '', '9000607667', '', '04828320081', '', '', 0, 0),
(3, 'Mcdonalds', 'Kormangala', '', '', '', '', '9000607668', '', '04828320082', '', '', 0, 0),
(4, 'Dominos', 'B T M', '', '', '', '', '9000607669', '', '04828320083', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch_x_page_x_permissions`
--

CREATE TABLE IF NOT EXISTS `branch_x_page_x_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `branch_x_page_x_permissions`
--

INSERT INTO `branch_x_page_x_permissions` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(28, '1101', 27, 3),
(29, '1101', 28, 3),
(30, '1111', 29, 3),
(31, '0', 30, 1),
(32, '1111', 31, 1),
(33, '1011', 32, 2),
(34, '1111', 33, 4),
(35, '1111', 34, 3),
(36, '1111', 35, 3),
(37, '1000', 36, 4),
(38, '1000', 37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_x_page_permissions`
--

CREATE TABLE IF NOT EXISTS `item_x_page_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `item_x_page_permissions`
--

INSERT INTO `item_x_page_permissions` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(28, '1111', 27, 3),
(29, '1111', 28, 3),
(30, '1111', 29, 3),
(31, '0', 30, 1),
(32, '1111', 31, 1),
(33, '1111', 32, 2),
(34, '1111', 33, 4),
(35, '1111', 34, 3),
(36, '1111', 35, 3),
(37, '1000', 36, 4),
(38, '1000', 37, 2);

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
  `delete_status` int(10) NOT NULL,
  `user_type` int(11) NOT NULL,
  `default_branch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `first_name`, `last_name`, `address`, `sex`, `age`, `city`, `state`, `zip`, `country`, `email`, `phone`, `image`, `dob`, `active`, `created_by`, `deleted_by`, `delete_status`, `user_type`, `default_branch`) VALUES
(99, 'Usd124', 'f91e15dbec69fc40f81f0876e7009648', 'nijan', 'kumar', 'slvpg', 'Male', 23, 'bangalore', 'karnada', '676809', 'india', 'nijan@yahoo.com', '7795398584', '102.jpg', '654739200', 0, 55, 0, 0, 0, 1),
(100, 'Usd120', 'f91e15dbec69fc40f81f0876e7009648', 'jibi', 'gopi', 'slvpg', 'Male', 23, 'bangalore', 'karnada', '676809', 'india', 'jibigopi007@gmail.com', '7795398584', '10', '654739200', 0, 99, 99, 0, 0, 1),
(101, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'slvpg', 'Male', 23, 'bangalore', 'karnada', '676809', 'india', 'jibi344443@yahoo.com', '7795398584', '10', '654739200', 0, 99, 0, 0, 2, 1),
(102, 'Usd126', 'f91e15dbec69fc40f81f0876e7009648', 'monish', 'km', 'slvpg', 'Male', 23, 'bangalore', 'karnada', '676809', 'india', 'kmonish90@gmail.com', '7795398584', '10', '654739200', 0, 101, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_x_branchs`
--

CREATE TABLE IF NOT EXISTS `users_x_branchs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  `user_delete` int(11) NOT NULL,
  `user_active` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `users_x_branchs`
--

INSERT INTO `users_x_branchs` (`id`, `branch_id`, `branch_name`, `emp_id`, `active_status`, `delete_status`, `user_delete`, `user_active`, `deleted_by`) VALUES
(120, 4, 'Dominos', 101, 0, 0, 0, 0, 0),
(121, 3, 'Mcdonalds', 101, 0, 0, 0, 0, 0),
(122, 1, 'K F C', 101, 1, 0, 0, 0, 0),
(123, 2, 'Pizza Hut', 101, 0, 0, 0, 0, 0),
(140, 1, 'K F C', 99, 1, 0, 0, 0, 0),
(141, 4, 'Dominos', 99, 0, 0, 0, 0, 0),
(144, 1, 'K F C', 100, 1, 0, 0, 0, 0),
(145, 4, 'Dominos', 100, 0, 0, 0, 0, 0),
(149, 3, 'Mcdonalds', 102, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_x_user_groups`
--

CREATE TABLE IF NOT EXISTS `users_x_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `depart_id` int(11) NOT NULL,
  `depart_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=170 ;

--
-- Dumping data for table `users_x_user_groups`
--

INSERT INTO `users_x_user_groups` (`id`, `depart_id`, `depart_name`, `emp_id`, `branch_id`, `active_status`, `delete_status`) VALUES
(134, 27, 'Art', 101, 3, 0, 0),
(135, 28, 'Sales Man', 101, 3, 0, 0),
(136, 29, 'Stock Man', 101, 3, 0, 0),
(137, 34, 'supplier one', 101, 3, 0, 0),
(138, 35, 'casher', 101, 3, 0, 0),
(139, 30, 'Sales Man', 101, 1, 0, 0),
(140, 31, 'Art', 101, 1, 0, 0),
(141, 32, 'supplier', 101, 2, 0, 0),
(158, 30, 'Sales Man', 99, 1, 0, 0),
(159, 36, 'supplier', 99, 4, 0, 0),
(162, 30, 'Sales Man', 100, 1, 0, 0),
(163, 33, 'Art', 100, 4, 0, 0),
(164, 31, 'Art', 100, 1, 0, 0),
(168, 27, 'Art', 102, 3, 0, 0),
(169, 28, 'Sales Man', 102, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `dep_name`, `branch_id`, `active_status`, `delete_status`) VALUES
(27, 'Art', 3, 0, 0),
(28, 'Sales Man', 3, 0, 0),
(29, 'Stock Man', 3, 0, 0),
(30, 'Sales Man', 1, 0, 0),
(31, 'Art', 1, 0, 0),
(32, 'supplier', 2, 0, 0),
(33, 'Art', 4, 0, 0),
(34, 'supplier one', 3, 0, 0),
(35, 'casher', 3, 0, 0),
(36, 'supplier', 4, 0, 0),
(37, 'Art', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups_x_branchs`
--

CREATE TABLE IF NOT EXISTS `user_groups_x_branchs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `user_groups_x_branchs`
--

INSERT INTO `user_groups_x_branchs` (`id`, `branch_id`, `user_group_id`, `active_status`, `delete_status`) VALUES
(33, 3, 27, 0, 0),
(34, 3, 28, 0, 0),
(35, 3, 29, 0, 0),
(36, 1, 30, 0, 0),
(37, 1, 31, 0, 0),
(38, 2, 32, 0, 0),
(39, 4, 33, 0, 0),
(40, 3, 34, 0, 0),
(41, 3, 35, 0, 0),
(42, 4, 36, 0, 0),
(43, 2, 37, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups_x_page_x_permissions`
--

CREATE TABLE IF NOT EXISTS `user_groups_x_page_x_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user_groups_x_page_x_permissions`
--

INSERT INTO `user_groups_x_page_x_permissions` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(28, '1111', 27, 3),
(29, '1111', 28, 3),
(30, '1111', 29, 3),
(31, '1111', 30, 1),
(32, '1111', 31, 1),
(33, '1111', 32, 2),
(34, '1111', 33, 4),
(35, '1111', 34, 3),
(36, '1111', 35, 3),
(37, '1111', 36, 4),
(38, '1111', 37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_x_page_x_permissions`
--

CREATE TABLE IF NOT EXISTS `user_x_page_x_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user_x_page_x_permissions`
--

INSERT INTO `user_x_page_x_permissions` (`id`, `permission`, `depart_id`, `branch_id`) VALUES
(28, '1111', 27, 3),
(29, '1101', 28, 3),
(30, '1111', 29, 3),
(31, '1111', 30, 1),
(32, '1111', 31, 1),
(33, '1111', 32, 2),
(34, '1111', 33, 4),
(35, '1111', 34, 3),
(36, '1111', 35, 3),
(37, '1111', 36, 4),
(38, '1111', 37, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
