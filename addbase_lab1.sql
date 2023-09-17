-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 09:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addbase_lab1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientid` char(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `unit` char(10) NOT NULL,
  `unitprice` int(5) NOT NULL,
  `foodgroup` char(15) NOT NULL,
  `inventory` int(30) NOT NULL,
  `supplierid_FK` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredientid`, `name`, `unit`, `unitprice`, `foodgroup`, `inventory`, `supplierid_FK`) VALUES
('003', 'Fairy', '45', 678, 'Meat', 44, '001'),
('i005', 'Claire', '00051', 2500, 'Database', 0, '009');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` char(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `datepicker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `name`, `price`, `datepicker`) VALUES
('1', 'Claire', 55.00, '09/12/2023');

-- --------------------------------------------------------

--
-- Table structure for table `madewith`
--

CREATE TABLE `madewith` (
  `itemid` char(5) NOT NULL,
  `ingredientid` char(5) NOT NULL,
  `quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `madewith`
--

INSERT INTO `madewith` (`itemid`, `ingredientid`, `quantity`) VALUES
('1', 'i005', 23);

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `mealid` char(5) NOT NULL,
  `name` char(10) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`mealid`, `name`, `description`) VALUES
('01', 'Claire', 'Best');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `menuitemid` char(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`menuitemid`, `name`, `price`) VALUES
('01', 'Claire', 45.00);

-- --------------------------------------------------------

--
-- Table structure for table `partof`
--

CREATE TABLE `partof` (
  `mealid_FK` char(5) NOT NULL,
  `itemid_FK` char(5) NOT NULL,
  `quantity` int(30) NOT NULL,
  `discount` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partof`
--

INSERT INTO `partof` (`mealid_FK`, `itemid_FK`, `quantity`, `discount`) VALUES
('01', '1', 23, 0.20);

-- --------------------------------------------------------

--
-- Table structure for table `suupliers`
--

CREATE TABLE `suupliers` (
  `supplierid` char(5) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `rep_fname` varchar(20) NOT NULL,
  `rep_lname` varchar(20) NOT NULL,
  `referred_by_FK` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suupliers`
--

INSERT INTO `suupliers` (`supplierid`, `company_name`, `rep_fname`, `rep_lname`, `referred_by_FK`) VALUES
('001', 'Jollibee', 'Patrick', 'Q', '001'),
('005', 'yahoo', 'Patrick', 'Q', '009'),
('009', 'Jollibee', 'Patrick', 'A', '009');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`supplierid_FK`),
  ADD UNIQUE KEY `ingredientid` (`ingredientid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `itemid` (`itemid`);

--
-- Indexes for table `madewith`
--
ALTER TABLE `madewith`
  ADD PRIMARY KEY (`ingredientid`),
  ADD KEY `itemid` (`itemid`,`ingredientid`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD UNIQUE KEY `mealid` (`mealid`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD UNIQUE KEY `menuitemid` (`menuitemid`);

--
-- Indexes for table `partof`
--
ALTER TABLE `partof`
  ADD PRIMARY KEY (`mealid_FK`),
  ADD KEY `mealid_FK` (`mealid_FK`,`itemid_FK`),
  ADD KEY `FK_POiSupID` (`itemid_FK`);

--
-- Indexes for table `suupliers`
--
ALTER TABLE `suupliers`
  ADD PRIMARY KEY (`supplierid`),
  ADD UNIQUE KEY `supplierid` (`supplierid`,`referred_by_FK`),
  ADD KEY `FK_RefSupID` (`referred_by_FK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `FK_IngSupID` FOREIGN KEY (`supplierid_FK`) REFERENCES `suupliers` (`supplierid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `madewith`
--
ALTER TABLE `madewith`
  ADD CONSTRAINT `FK_MISupID` FOREIGN KEY (`ingredientid`) REFERENCES `ingredients` (`ingredientid`),
  ADD CONSTRAINT `FK_MWSupID` FOREIGN KEY (`itemid`) REFERENCES `items` (`itemid`);

--
-- Constraints for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `FK_MID` FOREIGN KEY (`menuitemid`) REFERENCES `meals` (`mealid`);

--
-- Constraints for table `partof`
--
ALTER TABLE `partof`
  ADD CONSTRAINT `FK_POiSupID` FOREIGN KEY (`itemid_FK`) REFERENCES `items` (`itemid`),
  ADD CONSTRAINT `FK_POmSupID` FOREIGN KEY (`mealid_FK`) REFERENCES `meals` (`mealid`);

--
-- Constraints for table `suupliers`
--
ALTER TABLE `suupliers`
  ADD CONSTRAINT `FK_RefSupID` FOREIGN KEY (`referred_by_FK`) REFERENCES `suupliers` (`supplierid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
