-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 06:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drivers_endorsements`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `name`) VALUES
(2, 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
`id` int(11) NOT NULL,
  `license_id` varchar(220) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `class` varchar(1) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `license_id`, `firstname`, `lastname`, `class`, `dob`, `photo`, `status`) VALUES
(3, '21201455', 'Daw', 'asd', 'A', '', 'default.png', ''),
(4, '2147483647', 'liberty', 'qjqwjqjq', 'd', '', 'WIN_20180723_07_12_23_Pro.jpg', ''),
(5, '2147483647', 'nydsgfhdfggf', 'gfxchgcj', 'h', '', 'default.png', ''),
(6, '2147483647', 'bjbnjhjhj', 'nlknlk;nml;', 'd', '', 'WIN_20180723_07_12_23_Pro.jpg', ''),
(12, '987978977', 'liberty', 'chatikobo', '4', '', 'WIN_20180723_07_12_23_Pro.jpg', ''),
(13, '2147483647', 'liberty', 'nlknlk;nml;', '4', '', 'WIN_20180723_07_12_23_Pro.jpg', ''),
(14, '765', 'liberty', 'nlknlk;nml;', '4', '', 'WIN_20180723_07_12_23_Pro.jpg', ''),
(21, '020183081', 'libo', 'libz', '2', '2018-10-24', 'default.png', ''),
(22, '02018742e76', 'liberty', 'test', '2', '2018-10-10', 'default.png', ''),
(23, '020183ff86c', 'bennnn', 'iweee', '2', '2018-10-16', 'WIN_20180723_07_12_23_Pro.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
`expense_id` int(11) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `price` varchar(3) NOT NULL,
  `ay` varchar(20) NOT NULL,
  `sem` varchar(5) NOT NULL,
  `deadline` varchar(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `detail`, `price`, `ay`, `sem`, `deadline`) VALUES
(2, 'T-Shirt', '300', '2016-2017', '2nd', '2017-03-07'),
(3, 'Equipment', '350', '2017-2018', '1st', '2017-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `offenses`
--

CREATE TABLE IF NOT EXISTS `offenses` (
`id` int(40) NOT NULL,
  `license_id` varchar(40) NOT NULL,
  `offense` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `offenses`
--

INSERT INTO `offenses` (`id`, `license_id`, `offense`) VALUES
(1, '02018742e76', 'no headlights '),
(2, '02018742e76', 'no headlights '),
(3, '2147483647', 'shameles'),
(5, '020183ff86c', 'no headlights '),
(6, '020183ff86c', 'over speeding');

-- --------------------------------------------------------

--
-- Table structure for table `offense_categorie`
--

CREATE TABLE IF NOT EXISTS `offense_categorie` (
`offense_id` int(11) NOT NULL,
  `offense_name` varchar(50) NOT NULL,
  `offense_points` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `offense_categorie`
--

INSERT INTO `offense_categorie` (`offense_id`, `offense_name`, `offense_points`) VALUES
(1, 'over speeding', '3'),
(2, 'no headlights ', '4'),
(3, 'shameles', '8'),
(4, 'ewrsdfghjbk', '4'),
(5, 'looolo', '9'),
(6, 'musorrroo', '2'),
(7, 'testt', '4'),
(8, 'over speeding', '3'),
(9, 'over speeding', '7'),
(10, 'over speeding', '9'),
(11, 'over speeding', '7'),
(12, 'loolol', '9');

-- --------------------------------------------------------

--
-- Table structure for table `offense_committed`
--

CREATE TABLE IF NOT EXISTS `offense_committed` (
`id` int(11) NOT NULL,
  `offense_id` int(11) NOT NULL,
  `driver_id` varchar(50) NOT NULL,
  `offense_points` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `offense_committed`
--

INSERT INTO `offense_committed` (`id`, `offense_id`, `driver_id`, `offense_points`) VALUES
(1, 2, '2147483647', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`transact_id` int(11) NOT NULL,
  `student_id` int(8) NOT NULL,
  `transact_detail` int(11) NOT NULL,
  `price` varchar(5) NOT NULL,
  `payment` varchar(5) NOT NULL,
  `balance` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transact_id`, `student_id`, `transact_detail`, `price`, `payment`, `balance`, `status`) VALUES
(3, 21201455, 2, '300', '300', '0', 'Paid'),
(4, 21201455, 3, '350', '10', '340', 'Balance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
 ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `offenses`
--
ALTER TABLE `offenses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offense_categorie`
--
ALTER TABLE `offense_categorie`
 ADD PRIMARY KEY (`offense_id`);

--
-- Indexes for table `offense_committed`
--
ALTER TABLE `offense_committed`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`transact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `offenses`
--
ALTER TABLE `offenses`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `offense_categorie`
--
ALTER TABLE `offense_categorie`
MODIFY `offense_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `offense_committed`
--
ALTER TABLE `offense_committed`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
