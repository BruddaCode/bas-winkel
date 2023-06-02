-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2023 at 03:32 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bas`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikelen`
--

CREATE TABLE `artikelen` (
  `artid` int NOT NULL,
  `artikelenomschrijving` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `artinkoop` float DEFAULT NULL,
  `artverkoop` float DEFAULT NULL,
  `artvoorraad` int NOT NULL,
  `artminvoorraad` int NOT NULL,
  `artmaxvoorraad` int NOT NULL,
  `artlocatie` int DEFAULT NULL,
  `levid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `artikelen`
--

INSERT INTO `artikelen` (`artid`, `artikelenomschrijving`, `artinkoop`, `artverkoop`, `artvoorraad`, `artminvoorraad`, `artmaxvoorraad`, `artlocatie`, `levid`) VALUES
(1, 'somsing s26 ultra+ - 8k/1000hz screen - battery last 12 days', 3.32, 64.99, 1500, 0, 5000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inkooporders`
--

CREATE TABLE `inkooporders` (
  `inkordid` int NOT NULL,
  `artid` int NOT NULL,
  `levid` int NOT NULL,
  `inkorddatum` date DEFAULT NULL,
  `inkordbestaantal` int DEFAULT NULL,
  `inkordstatus` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `klantid` int NOT NULL,
  `klantnaam` varchar(20) DEFAULT NULL,
  `klantemail` varchar(30) NOT NULL,
  `klantadres` varchar(30) NOT NULL,
  `klantpostcode` varchar(6) DEFAULT NULL,
  `klantwoonplaats` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`klantid`, `klantnaam`, `klantemail`, `klantadres`, `klantpostcode`, `klantwoonplaats`) VALUES
(0, 'Max', 'maxvdwolf@sina.cn', 'Somewhere in the Netherlands', '6969', 'The World');

-- --------------------------------------------------------

--
-- Table structure for table `leveranciers`
--

CREATE TABLE `leveranciers` (
  `levid` int NOT NULL,
  `levnaam` varchar(15) DEFAULT NULL,
  `levcontact` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `levemail` varchar(30) DEFAULT NULL,
  `levadres` varchar(30) DEFAULT NULL,
  `levpostcode` varchar(6) DEFAULT NULL,
  `levwoonplaats` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`levid`, `levnaam`, `levcontact`, `levemail`, `levadres`, `levpostcode`, `levwoonplaats`) VALUES
(0, 'Alibaba', 'CCPID: 33010802012741', 'nihao@alibaba.cn', '中文隨機詞 73', ' 6273史', '中國第一');

-- --------------------------------------------------------

--
-- Table structure for table `verkooporders`
--

CREATE TABLE `verkooporders` (
  `verkordid` int NOT NULL,
  `artid` int NOT NULL,
  `klantid` int NOT NULL,
  `verkorddatum` date DEFAULT NULL,
  `verkordbestaantal` int DEFAULT NULL,
  `verkordstatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `verkooporders`
--

INSERT INTO `verkooporders` (`verkordid`, `artid`, `klantid`, `verkorddatum`, `verkordbestaantal`, `verkordstatus`) VALUES
(0, 1, 0, '2023-06-16', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`artid`);

--
-- Indexes for table `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD PRIMARY KEY (`inkordid`,`artid`,`levid`),
  ADD UNIQUE KEY `artikelen_artid_UNIQUE` (`artid`),
  ADD UNIQUE KEY `leveranciers_levid_UNIQUE` (`levid`),
  ADD KEY `fk_inkooporders_artikelen_idx` (`artid`),
  ADD KEY `fk_inkooporders_leveranciers1_idx` (`levid`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantid`);

--
-- Indexes for table `leveranciers`
--
ALTER TABLE `leveranciers`
  ADD PRIMARY KEY (`levid`);

--
-- Indexes for table `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD PRIMARY KEY (`verkordid`,`artid`,`klantid`),
  ADD UNIQUE KEY `klanten_klantid_UNIQUE` (`klantid`),
  ADD UNIQUE KEY `artikelen_artid_UNIQUE` (`artid`),
  ADD KEY `fk_verkooporders_artikelen1_idx` (`artid`),
  ADD KEY `fk_verkooporders_klanten1_idx` (`klantid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `artid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inkooporders`
--
ALTER TABLE `inkooporders`
  MODIFY `inkordid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD CONSTRAINT `fk_inkooporders_artikelen` FOREIGN KEY (`artid`) REFERENCES `artikelen` (`artid`),
  ADD CONSTRAINT `fk_inkooporders_leveranciers1` FOREIGN KEY (`levid`) REFERENCES `leveranciers` (`levid`);

--
-- Constraints for table `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD CONSTRAINT `fk_verkooporders_artikelen1` FOREIGN KEY (`artid`) REFERENCES `artikelen` (`artid`),
  ADD CONSTRAINT `fk_verkooporders_klanten1` FOREIGN KEY (`klantid`) REFERENCES `klanten` (`klantid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
