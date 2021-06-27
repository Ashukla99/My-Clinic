-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2017 at 09:29 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_clinic`
--
CREATE DATABASE IF NOT EXISTS `my_clinic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `my_clinic`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `problem` varchar(233) NOT NULL,
  `med` varchar(2444) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sno` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `sno` (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `problem`, `med`, `time`, `sno`) VALUES
(3, 'fever', 'crosin', '2017-08-30 19:08:09', 1),
(3, 'none', 'none', '2017-08-30 19:08:15', 2),
(3, 'done', 'good health', '2017-08-30 19:11:14', 3),
(1, 'okay', 'jhwid', '2017-08-30 19:11:43', 4),
(4, 'ded', 'dead', '2017-08-30 19:13:29', 5),
(4, 'haH:APHa:P', ':P', '2017-08-30 19:13:38', 6),
(6, 'jukhaam', 'garam pani', '2017-08-30 19:17:16', 7),
(6, 'kgudwk', 'jgd', '2017-08-30 19:17:35', 8),
(2, 'cold', 'crocin', '2017-08-30 19:21:06', 9);

-- --------------------------------------------------------

--
-- Table structure for table `npatient`
--

CREATE TABLE IF NOT EXISTS `npatient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `nname` varchar(20) NOT NULL,
  `age` varchar(3) NOT NULL,
  `area` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `npatient`
--

INSERT INTO `npatient` (`id`, `fname`, `lname`, `nname`, `age`, `area`) VALUES
(1, 'navneet', 'gupta', 'nobi', '21', 'barra-2'),
(2, 'robin', 'raajpoot', 'roob', '21', 'nobashta'),
(3, 'rohan', 'raj', 'roon', '22', 'govind nagar'),
(4, 'rajat', 'gupta', 'raju', '33', 'dab'),
(5, 'navin', 'raj', 'nav', '20', 'barra'),
(6, 'nitin', 'nobi', 'nai', '22', 'barra');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
