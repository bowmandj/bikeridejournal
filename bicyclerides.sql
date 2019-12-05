-- This file was generated by phpMyAdmin
-- An updated version is pending
-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2019 at 01:18 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bicyclerides`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_ref`
--

DROP TABLE IF EXISTS `event_ref`;
CREATE TABLE IF NOT EXISTS `event_ref` (
  `event_code` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `event_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `enabled_yn` varchar(1) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `event_ref`
--

INSERT INTO `event_ref` (`event_code`, `event_name`, `enabled_yn`, `activity_date`) VALUES
('ENDH', 'Ride to End Hunger in Calvert County', 'Y', '2019-11-22 05:41:17'),
('PRRL', 'Patuxent River Rural Legacy Ride', 'Y', '2019-11-22 05:41:17'),
('CWC', 'Civil War Century', 'Y', '2019-11-22 05:42:21'),
('1725', '1725 Gravel Ride - EX2', 'Y', '2019-11-22 05:42:21'),
('FF50', 'Firefighter 50', 'Y', '2019-11-22 05:42:49'),
('EASE', 'Tour de Conservation Easement', 'Y', '2019-11-22 05:42:49'),
('OTHER', 'Other event', 'Y', '2019-11-22 05:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `general_ref`
--

DROP TABLE IF EXISTS `general_ref`;
CREATE TABLE IF NOT EXISTS `general_ref` (
  `code_grp` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `code_value` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `code_desc` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `enabled_yn` varchar(1) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`code_grp`,`code_value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `general_ref`
--

INSERT INTO `general_ref` (`code_grp`, `code_value`, `code_desc`, `display_order`, `enabled_yn`, `activity_date`) VALUES
('CLUBS', 'OHBTC', 'Oxon Hill Bicycle and Trail Club', 1, 'Y', '2019-11-22 05:22:06'),
('CLUBS', 'BBC', 'Baltimore Bicycle Club', 2, 'Y', '2019-11-22 05:22:06'),
('CLUBS', 'PPTC', 'Potomac Pedalers', 3, 'Y', '2019-11-22 05:23:21'),
('BIKES', 'MAD', 'Madone road bike', 1, 'Y', '2019-11-22 05:24:52'),
('BIKES', 'CHECK', 'Checkpoint gravel bike', 2, 'Y', '2019-11-22 05:24:52'),
('BIKES', 'MTN', 'Mountain bike', 3, 'Y', '2019-11-22 05:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `ride_club`
--

DROP TABLE IF EXISTS `ride_club`;
CREATE TABLE IF NOT EXISTS `ride_club` (
  `ride_club_seq_no` int(11) NOT NULL AUTO_INCREMENT,
  `ride_seq_no` int(11) NOT NULL,
  `bike_club` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ride_leader_ind` int(11) NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ride_club_seq_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ride_details`
--

DROP TABLE IF EXISTS `ride_details`;
CREATE TABLE IF NOT EXISTS `ride_details` (
  `ride_seq_no` int(11) NOT NULL AUTO_INCREMENT,
  `ride_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ride_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `ride_distance` decimal(10,0) DEFAULT NULL,
  `start_location` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `bicycle` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `route_link` varchar(250) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `route_rating` int(11) DEFAULT NULL,
  `report_link` varchar(250) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `event` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `ride_rating` int(11) DEFAULT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ride_seq_no`),
  KEY `ride_name_idx` (`ride_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `start_location_ref`
--

DROP TABLE IF EXISTS `start_location_ref`;
CREATE TABLE IF NOT EXISTS `start_location_ref` (
  `location_code` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `location_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `enabled_yn` varchar(1) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`location_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `start_location_ref`
--

INSERT INTO `start_location_ref` (`location_code`, `location_name`, `enabled_yn`, `activity_date`) VALUES
('BRY', 'Bryans Rd Shopping Center, Bryans Rd MD', 'Y', '2019-11-22 05:26:28'),
('NHS', 'Northern High School, Chaneyville MD', 'Y', '2019-11-22 05:28:36'),
('CHAP', 'Chaptico Park, Chaptico MD', 'Y', '2019-11-22 05:28:36'),
('CWC', 'CWC, Frederick Rd and Moser Rd, Thurmont MD', 'Y', '2019-11-22 05:29:32'),
('DPR', 'Davidsonville Park and Ride, Davidsonville MD', 'Y', '2019-11-22 05:29:32'),
('EMMIT', 'Emmitsburg Park, Emmitsburg MD', 'Y', '2019-11-22 05:30:11'),
('FAIR', 'Fairlington, Arlington VA', 'Y', '2019-11-22 05:30:11'),
('FCCC', 'Falls Church Community Center, Falls Church VA', 'Y', '2019-11-22 05:30:49'),
('FRESH', 'Fresh Meadows Farm, Huntingtown MD', 'Y', '2019-11-22 05:30:49'),
('HAR', 'Southern High School, Harwood MD', 'Y', '2019-11-22 05:31:39'),
('IHRTL', 'IHRT Livingston Rd, Charles County MD', 'Y', '2019-11-22 05:33:06'),
('IHRTW', 'IHRT White Plains MD', 'Y', '2019-11-22 05:32:18'),
('IHRTI', 'IHRT Indian Head MD', 'Y', '2019-11-22 05:32:18'),
('JUG', 'Jug Bay Picnic Area, Patuxent River Park MD', 'Y', '2019-11-22 05:34:01'),
('LAUR', 'Laurel Grove Park, Laurel Grove MD', 'Y', '2019-11-22 05:34:01'),
('MERK', 'Merkle Wildlife Sanctuary, Croom MD', 'Y', '2019-11-22 05:34:37'),
('NKEYS', 'North Keys Park, Brandywine MD', 'Y', '2019-11-22 05:34:37'),
('NSC', 'Northern Senior Center, Charlotte Hall MD', 'Y', '2019-11-22 05:35:32'),
('OAK', 'Oak Ridge Park, Charles County MD', 'Y', '2019-11-22 05:35:32'),
('PIS', 'Pisgah Park, Charles County MD', 'Y', '2019-11-22 05:36:40'),
('STIG', 'Saint Ignatius Church, La Plata MD', 'Y', '2019-11-22 05:36:40'),
('TANPK', 'Taneytown Park, Taneytown MD', 'Y', '2019-11-22 05:37:21'),
('THURPK', 'Thurmont Community Park, Thurmont MD', 'Y', '2019-11-22 05:37:21'),
('UTICA', 'Utica Park, Frederick MD', 'Y', '2019-11-22 05:38:03'),
('WALK', 'Walkersville High School, Walkersville MD', 'Y', '2019-11-22 05:38:03'),
('WCPR', 'Waysons Corner Park and Ride, Lothian MD', 'Y', '2019-11-22 05:40:28'),
('OTHERVA', 'Other location - Virginia', 'Y', '2019-11-22 05:38:55'),
('OTHERMD', 'Other location - Maryland', 'Y', '2019-11-22 05:39:18'),
('OTHERDC', 'Other location - DC', 'Y', '2019-11-22 05:39:18'),
('OTHERANY', 'Other location - outside the DMV', 'Y', '2019-11-22 05:39:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
