-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 04:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `biz_categories`
--

CREATE TABLE `biz_categories` (
  `ID_Business` int(11) NOT NULL,
  `ID_Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biz_categories`
--

INSERT INTO `biz_categories` VALUES
(1, 1),
(3, 4),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `ID_Business` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Telephone` varchar(45) NOT NULL,
  `URL` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` VALUES
(1, 'Bach Khoa Ha Noi', '1 Dai Co Viet', 'Ha Noi', '0123456789', 'hust.edu.vn'),
(2, '', '', '', '', ''),
(3, 'DH BK HN', 'So 1 Tran Dai Nghia ', 'Ha Noi', '0123456789', 'hust.edu.vn'),
(4, 'DH BK HN', 'So 1 Tran Dai Nghia ', 'Ha Noi', '0123456789', 'hust.edu.vn'),
(5, 'DH BK HN', 'So 1 Tran Dai Nghia', 'Ha Noi', '0123456789', 'hust.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID_Category` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES
(1, 'Automative Parts and Supplies', 'Accessories for your car'),
(2, 'Seafood Stores and Restaurants', 'Place to get your fish'),
(3, 'Health and Beauty', 'Everything for your body'),
(4, 'Schools and Colleges', 'Public and Private Learning'),
(5, 'Community Sports and Recreation', 'Guide to Parks and Leagues'),
(12, '12', '12'),
(13, '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD KEY `FK_Business` (`ID_Business`),
  ADD KEY `FK_Category` (`ID_Category`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`ID_Business`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_Category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `ID_Business` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD CONSTRAINT `FK_Business` FOREIGN KEY (`ID_Business`) REFERENCES `businesses` (`ID_Business`),
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`ID_Category`) REFERENCES `categories` (`ID_Category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
