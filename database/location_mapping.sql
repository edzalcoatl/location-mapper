-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2018 at 03:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `location_mapping`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationID` int(11) NOT NULL,
  `locationCategory` int(11) NOT NULL,
  `locationName` varchar(200) NOT NULL,
  `locationAddress` varchar(200) NOT NULL,
  `locationLatitude` double NOT NULL,
  `locationLongitude` double NOT NULL,
  `locationDescription` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationID`, `locationCategory`, `locationName`, `locationAddress`, `locationLatitude`, `locationLongitude`, `locationDescription`) VALUES
(1, 3, 'Tibet', 'Tibet, China', 30.1533605, 88.7878678, ''),
(2, 3, 'Tehotihuacan', 'San Juan TeotihuacÃ¡n, State of Mexico, Mexico', 19.6860799, -98.8716361, ''),
(3, 4, 'Santa Cruz Beach', '400 Beach St, Santa Cruz, CA 95060, USA', 36.9642107, -122.0185246, ''),
(5, 2, 'Yosemite National Park', 'YOSEMITE NATIONAL PARK, CA 95389, USA', 37.6415479, -119.6267347, ''),
(6, 2, 'Blue Forest Australia', 'Shortridge Pass, Blue Mountains National Park NSW 2787, Australia', -33.6192367, 150.3601837, ''),
(7, 1, 'Weltmuseum Wien ', 'Heldenplatz, 1010 Wien, Austria', 48.2057815, 16.3628989, ''),
(9, 5, 'service &amp; media online-werbung GmbH', 'Eutiner Ring 2, 23611 Bad Schwartau, Germany', 53.9205, 10.6964754, ''),
(10, 5, 'service &amp; media online-werbung GmbH - Berlin', '12203 Berlin, Germany', 52.4426272, 13.3103367, ''),
(12, 5, 'Service &amp; Media Online Advertising SL ', '07830 Sant Josep de sa Talaia, Balearic Islands, Spain', 38.9217535, 1.2934954, ''),
(13, 4, 'Papaya Beach Club', 'Km 4.5 Carretera Tulum Boca Paila, 77780, Mexico', 20.1813925, -87.4451791, ''),
(14, 6, 'RincÃ³n Argentino', 'Av. Pdte. Masaryk 177, Polanco, Polanco V Secc, 11560 Ciudad de MÃ©xico, CDMX, Mexico', 19.4315985, -99.1888735, '');

-- --------------------------------------------------------

--
-- Table structure for table `location_categories`
--

CREATE TABLE `location_categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `categoryColor` varchar(8) NOT NULL,
  `categoryDescription` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_categories`
--

INSERT INTO `location_categories` (`categoryID`, `categoryName`, `categoryColor`, `categoryDescription`) VALUES
(1, 'Museums', '#3920d4', ''),
(2, 'National Parks', '#27813b', ''),
(3, 'Historical Places', '#cc121d', ''),
(4, 'Beaches ', '#ebc605', ''),
(5, 'Offices', '#181519', ''),
(6, 'Restaurants', '#0c4dcc', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationID`),
  ADD KEY `locationCategory` (`locationCategory`);

--
-- Indexes for table `location_categories`
--
ALTER TABLE `location_categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `location_categories`
--
ALTER TABLE `location_categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`locationCategory`) REFERENCES `location_categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
