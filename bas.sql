-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2023 at 01:41 PM
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
  `artikelenomschrijving` varchar(12) NOT NULL,
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
(2, 'banaan', 1, 1.5, 20, 1, 100, 1234, 2),
(3, 'ICBM', 6990.42, 13370, 4, 1, 20, 5688, 2),
(4, 'DannyDaVito', 42.95, 50.95, 68, 1, 456, 9898, 4);

-- --------------------------------------------------------

--
-- Table structure for table `inkooporders`
--

CREATE TABLE `inkooporders` (
  `inkordid` int NOT NULL,
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
(1, 'joe', 'joe@gmail.com', 'klokstraat', '7862OI', 'Amsterdam'),
(2, 'klaas', 'klaas@gmail.com', 'dirkseweg', '8763HG', 'Berlijn'),
(3, 'klaas', 'klaas@gmail.com', 'dirkseweg', '8763HG', 'Berlijn'),
(4, 'hatsune miku', 'miku@agency.net', 'tokyo', '8438HL', 'HDD #2');

-- --------------------------------------------------------

--
-- Table structure for table `leveranciers`
--

CREATE TABLE `leveranciers` (
  `levid` int NOT NULL,
  `levnaam` varchar(15) DEFAULT NULL,
  `levcontact` varchar(20) DEFAULT NULL,
  `levemail` varchar(30) DEFAULT NULL,
  `levadres` varchar(30) DEFAULT NULL,
  `levpostcode` varchar(6) DEFAULT NULL,
  `levwoonplaats` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `leveranciers`
--

INSERT INTO `leveranciers` (`levid`, `levnaam`, `levcontact`, `levemail`, `levadres`, `levpostcode`, `levwoonplaats`) VALUES
(2, 'chacita', '010-32478760', 'lev@gmail.com', 'beunstraat', '6321IU', 'Denhaag'),
(3, 'CCP', '9837698436987', 'CCP@cmail.ch', 'china', '7443KV', 'Taiwan'),
(4, 'Joe', '7430983270', 'Joemama@gmail.com', 'YurMom', '9784KF', 'Fstreet');

-- --------------------------------------------------------

--
-- Table structure for table `tussentabelinkoop`
--

CREATE TABLE `tussentabelinkoop` (
  `artid` int NOT NULL,
  `inkoopid` int NOT NULL,
  `aantal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tussentabelverkoop`
--

CREATE TABLE `tussentabelverkoop` (
  `artid` int NOT NULL,
  `verkoopid` int NOT NULL,
  `aantal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `verkooporders`
--

CREATE TABLE `verkooporders` (
  `verkordid` int NOT NULL,
  `klantid` int NOT NULL,
  `verkorddatum` date DEFAULT NULL,
  `verkordstatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `verkooporders`
--

INSERT INTO `verkooporders` (`verkordid`, `klantid`, `verkorddatum`, `verkordstatus`) VALUES
(10, 1, '2023-06-04', 2),
(12, 2, '2023-06-04', 0),
(13, 1, '2023-06-04', 0),
(14, 1, '2023-06-04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`artid`),
  ADD KEY `levid` (`levid`);

--
-- Indexes for table `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD PRIMARY KEY (`inkordid`,`levid`),
  ADD UNIQUE KEY `leveranciers_levid_UNIQUE` (`levid`),
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
-- Indexes for table `tussentabelinkoop`
--
ALTER TABLE `tussentabelinkoop`
  ADD PRIMARY KEY (`artid`,`inkoopid`),
  ADD KEY `inkoopid` (`inkoopid`);

--
-- Indexes for table `tussentabelverkoop`
--
ALTER TABLE `tussentabelverkoop`
  ADD PRIMARY KEY (`artid`,`verkoopid`),
  ADD KEY `verkoopid` (`verkoopid`);

--
-- Indexes for table `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD PRIMARY KEY (`verkordid`,`klantid`),
  ADD KEY `fk_verkooporders_klanten1_idx` (`klantid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `artid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inkooporders`
--
ALTER TABLE `inkooporders`
  MODIFY `inkordid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `levid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verkooporders`
--
ALTER TABLE `verkooporders`
  MODIFY `verkordid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikelen`
--
ALTER TABLE `artikelen`
  ADD CONSTRAINT `artikelen_ibfk_1` FOREIGN KEY (`levid`) REFERENCES `leveranciers` (`levid`);

--
-- Constraints for table `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD CONSTRAINT `inkooporders_ibfk_1` FOREIGN KEY (`levid`) REFERENCES `leveranciers` (`levid`);

--
-- Constraints for table `tussentabelinkoop`
--
ALTER TABLE `tussentabelinkoop`
  ADD CONSTRAINT `tussentabelinkoop_ibfk_1` FOREIGN KEY (`artid`) REFERENCES `artikelen` (`artid`),
  ADD CONSTRAINT `tussentabelinkoop_ibfk_2` FOREIGN KEY (`inkoopid`) REFERENCES `inkooporders` (`inkordid`);

--
-- Constraints for table `tussentabelverkoop`
--
ALTER TABLE `tussentabelverkoop`
  ADD CONSTRAINT `tussentabelverkoop_ibfk_1` FOREIGN KEY (`artid`) REFERENCES `artikelen` (`artid`),
  ADD CONSTRAINT `tussentabelverkoop_ibfk_2` FOREIGN KEY (`verkoopid`) REFERENCES `verkooporders` (`verkordid`);

--
-- Constraints for table `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD CONSTRAINT `aaaaa` FOREIGN KEY (`klantid`) REFERENCES `klanten` (`klantid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
