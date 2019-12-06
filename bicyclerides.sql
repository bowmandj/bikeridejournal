-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2019 at 01:50 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
('ENDH', 'Ride to End Hunger in Calvert County', 'Y', '2019-11-27 18:08:53'),
('PRRL', 'Patuxent River Rural Legacy Ride', 'Y', '2019-11-27 18:08:53'),
('CWC', 'Civil War Century', 'Y', '2019-11-27 18:08:53'),
('1725', '1725 Gravel Ride - EX2', 'Y', '2019-11-27 18:08:53'),
('FF50', 'Firefighter 50', 'Y', '2019-11-27 18:08:53'),
('EASE', 'Tour de Conservation Easement', 'Y', '2019-11-27 18:08:53'),
('OTHER', 'Other event', 'Y', '2019-11-27 18:08:53'),
('X', 'N/A', 'Y', '2019-12-05 21:36:12');

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
('CLUBS', 'OHBTC', 'Oxon Hill Club', 1, 'Y', '2019-11-27 18:25:23'),
('CLUBS', 'BBC', 'Baltimore Bike Club', 2, 'Y', '2019-11-27 18:25:23'),
('CLUBS', 'PPTC', 'Potomac Pedalers', 3, 'Y', '2019-11-27 18:25:23'),
('BIKES', 'MAD', 'Madone road bike', 1, 'Y', '2019-11-27 18:25:23'),
('BIKES', 'CHECK', 'Checkpoint gravel bike', 2, 'Y', '2019-11-27 18:25:23'),
('BIKES', 'MTN', 'Mountain bike', 3, 'Y', '2019-11-27 18:25:23'),
('ROUTE_RATE', '0', 'Never again', 3, 'Y', '2019-12-05 00:14:21'),
('ROUTE_RATE', '1', 'Good', 2, 'Y', '2019-12-05 00:14:21'),
('ROUTE_RATE', '2', 'Great', 1, 'Y', '2019-12-05 00:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `ride_details`
--

DROP TABLE IF EXISTS `ride_details`;
CREATE TABLE IF NOT EXISTS `ride_details` (
  `ride_seq_no` int(11) NOT NULL AUTO_INCREMENT,
  `ride_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ride_date` date NOT NULL,
  `start_hour` varchar(2) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `start_minutes` varchar(2) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `start_ampm` varchar(2) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `ride_distance` int(11) DEFAULT NULL,
  `start_location` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `bicycle` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `club_ohbtc` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `club_bbc` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `club_pptc` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `route_link` float DEFAULT NULL,
  `route_rating` int(11) DEFAULT NULL,
  `report_link` float DEFAULT NULL,
  `event` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ride_seq_no`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `ride_details`
--

INSERT INTO `ride_details` (`ride_seq_no`, `ride_name`, `ride_date`, `start_hour`, `start_minutes`, `start_ampm`, `ride_distance`, `start_location`, `bicycle`, `club_ohbtc`, `club_bbc`, `club_pptc`, `route_link`, `route_rating`, `report_link`, `event`, `activity_date`) VALUES
(1, 'Civil War Century 2019', '2019-09-07', '9', '00', 'AM', 65, 'CWC', 'MAD', 'N/A', 'N/A', 'N/A', 31033100, 2, NULL, 'CWC', '2019-12-02 01:28:04'),
(2, 'Flora Corner, Chaptico and Woodburn Hill', '2019-11-23', '11', '00', 'AM', NULL, 'NSC', 'CHECK', 'PART', 'N/A', 'N/A', 31504900, 1, NULL, 'X', '2019-12-02 02:52:42'),
(3, 'Laurel Grove to Chaptico and Avenue', '2019-11-11', '11', '00', 'AM', NULL, 'LAUR', 'MAD', 'LEAD', 'N/A', 'N/A', 31435900, 1, NULL, 'X', '2019-12-02 05:13:03'),
(4, 'Short ride in south Arlington', '2019-11-26', '8', '30', 'PM', NULL, 'FAIR', 'CHECK', 'N/A', 'N/A', 'N/A', 0, 1, NULL, 'X', '2019-12-02 05:40:56'),
(5, 'Test Ride', '2019-12-03', '7', '15', 'PM', NULL, 'FCCC', 'CHECK', 'N/A', 'N/A', 'N/A', 0, 1, NULL, 'X', '2019-12-04 01:00:22'),
(6, 'Test 2', '2019-12-03', '11', '00', 'AM', NULL, 'JUG', 'MAD', 'N/A', 'N/A', 'N/A', 0, 1, NULL, 'X', '2019-12-04 01:02:49'),
(7, 'Test 4', '2019-12-04', '8', '30', 'PM', NULL, 'DPR', 'CHECK', 'N/A', 'N/A', 'N/A', 0, 1, NULL, 'X', '2019-12-05 01:02:48'),
(8, 'Test 4', '2019-12-04', '8', '30', 'PM', NULL, 'DPR', 'CHECK', 'N/A', 'N/A', 'N/A', 0, 1, NULL, 'X', '2019-12-05 01:03:33'),
(9, 'Test 4', '2019-12-04', '8', '30', 'PM', NULL, 'DPR', 'CHECK', 'N/A', 'N/A', 'N/A', 0, 1, NULL, 'X', '2019-12-05 01:18:09'),
(10, 'Test Thursday', '2019-12-05', '4', '45', 'PM', NULL, 'MERK', 'CHECK', 'N/A', 'PART', 'N/A', 0, 0, NULL, 'X', '2019-12-06 00:41:53');

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
('BRY', 'Bryans Rd Shopping Center, Bryans Rd MD', 'Y', '2019-11-27 18:30:21'),
('NHS', 'Northern High School, Chaneyville MD', 'Y', '2019-11-27 18:30:21'),
('CHAP', 'Chaptico Park, Chaptico MD', 'Y', '2019-11-27 18:30:21'),
('CWC', 'CWC, Frederick Rd and Moser Rd, Thurmont MD', 'Y', '2019-11-27 18:30:21'),
('DPR', 'Davidsonville Park and Ride, Davidsonville MD', 'Y', '2019-11-27 18:30:21'),
('EMMIT', 'Emmitsburg Park, Emmitsburg MD', 'Y', '2019-11-27 18:30:21'),
('FAIR', 'Fairlington, Arlington VA', 'Y', '2019-11-27 18:30:21'),
('FCCC', 'Falls Church Community Center, Falls Church VA', 'Y', '2019-11-27 18:30:21'),
('FRESH', 'Fresh Meadows Farm, Huntingtown MD', 'Y', '2019-11-27 18:30:21'),
('HAR', 'Southern High School, Harwood MD', 'Y', '2019-11-27 18:30:21'),
('IHRTL', 'IHRT Livingston Rd, Charles County MD', 'Y', '2019-11-27 18:30:21'),
('IHRTW', 'IHRT White Plains MD', 'Y', '2019-11-27 18:30:21'),
('IHRTI', 'IHRT Indian Head MD', 'Y', '2019-11-27 18:30:21'),
('JUG', 'Jug Bay Picnic Area, Patuxent River Park MD', 'Y', '2019-11-27 18:30:21'),
('LAUR', 'Laurel Grove Park, Laurel Grove MD', 'Y', '2019-11-27 18:30:21'),
('MERK', 'Merkle Wildlife Sanctuary, Croom MD', 'Y', '2019-11-27 18:30:21'),
('NKEYS', 'North Keys Park, Brandywine MD', 'Y', '2019-11-27 18:30:21'),
('NSC', 'Northern Senior Center, Charlotte Hall MD', 'Y', '2019-11-27 18:30:21'),
('OAK', 'Oak Ridge Park, Charles County MD', 'Y', '2019-11-27 18:30:21'),
('PIS', 'Pisgah Park, Charles County MD', 'Y', '2019-11-27 18:30:21'),
('STIG', 'Saint Ignatius Church, La Plata MD', 'Y', '2019-11-27 18:30:21'),
('TANPK', 'Taneytown Park, Taneytown MD', 'Y', '2019-11-27 18:30:21'),
('THURPK', 'Thurmont Community Park, Thurmont MD', 'Y', '2019-11-27 18:30:21'),
('UTICA', 'Utica Park, Frederick MD', 'Y', '2019-11-27 18:30:21'),
('WALK', 'Walkersville High School, Walkersville MD', 'Y', '2019-11-27 18:30:21'),
('WCPR', 'Waysons Corner Park and Ride, Lothian MD', 'Y', '2019-11-27 18:30:21'),
('OTHERVA', 'Other location - Virginia', 'Y', '2019-11-27 18:30:21'),
('OTHERMD', 'Other location - Maryland', 'Y', '2019-11-27 18:30:21'),
('OTHERDC', 'Other location - DC', 'Y', '2019-11-27 18:30:21'),
('OTHERANY', 'Other location - outside the DMV', 'Y', '2019-11-27 18:30:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
