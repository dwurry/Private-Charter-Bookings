-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2015 at 12:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

connect `lyfft_db';

--
-- Database: `lyfft_db`;
--

-- --------------------------------------------------------

--
-- Table structure for table `chop_quote_detail`
--

DROP TABLE IF EXISTS `op_leg_detail`;
CREATE TABLE IF NOT EXISTS `op_leg_detail` (
  `id` int(11) NOT NULL,
  `leg_id' int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `flight_mins` int(11) NOT NULL,
  `flight_cost` decimal(9,2) NOT NULL,
  `margin` decimal(9,2) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `dep_ts` int(11) NOT NULL,
  `arr_ts` int(11) NOT NULL,
  `dist` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `op_leg_detail`
--
ALTER TABLE `op_leg_detail`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `chop_quote_detail`
--
ALTER TABLE `op_leg_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

RENAME TABLE `lyfft_db`.`quote_legs` TO `lyfft_db`.`leg`;

RENAME TABLE `lyfft_db`.`chop_quote_detail` TO `lyfft_db`.`op_quote`;

ALTER TABLE `op_quote`
  DROP `aircraft_id`,
  DROP `flight_mins`,
  DROP `flight_cost`,
  DROP `margin`;
