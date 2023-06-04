-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 jun 2023 om 10:44
-- Serverversie: 8.0.28
-- PHP-versie: 8.1.9

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
-- Tabelstructuur voor tabel `artikelen`
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
-- Gegevens worden geëxporteerd voor tabel `artikelen`
--

INSERT INTO `artikelen` (`artid`, `artikelenomschrijving`, `artinkoop`, `artverkoop`, `artvoorraad`, `artminvoorraad`, `artmaxvoorraad`, `artlocatie`, `levid`) VALUES
(2, 'banaan', 1, 1.5, 20, 1, 100, 1234, 2),
(3, 'ICBM', 6990.42, 13370, 4, 1, 20, 5688, 2),
(4, 'DannyDaVito', 42.95, 50.95, 68, 1, 456, 9898, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inkooporders`
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
-- Tabelstructuur voor tabel `klanten`
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
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantid`, `klantnaam`, `klantemail`, `klantadres`, `klantpostcode`, `klantwoonplaats`) VALUES
(1, 'joe', 'joe@gmail.com', 'klokstraat', '7862OI', 'Amsterdam'),
(2, 'klaas', 'klaas@gmail.com', 'dirkseweg', '8763HG', 'Berlijn'),
(3, 'klaas', 'klaas@gmail.com', 'dirkseweg', '8763HG', 'Berlijn'),
(4, 'hatsune miku', 'miku@agency.net', 'tokyo', '8438HL', 'HDD #2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leveranciers`
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
-- Gegevens worden geëxporteerd voor tabel `leveranciers`
--

INSERT INTO `leveranciers` (`levid`, `levnaam`, `levcontact`, `levemail`, `levadres`, `levpostcode`, `levwoonplaats`) VALUES
(2, 'chacita', '010-32478760', 'lev@gmail.com', 'beunstraat', '6321IU', 'Denhaag'),
(3, 'CCP', '9837698436987', 'CCP@cmail.ch', 'china', '7443KV', 'Taiwan'),
(4, 'Joe', '7430983270', 'Joemama@gmail.com', 'YurMom', '9784KF', 'Fstreet');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tussentabelinkoop`
--

CREATE TABLE `tussentabelinkoop` (
  `artid` int NOT NULL,
  `inkoopid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tussentabelverkoop`
--

CREATE TABLE `tussentabelverkoop` (
  `artid` int NOT NULL,
  `verkoopid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verkooporders`
--

CREATE TABLE `verkooporders` (
  `verkordid` int NOT NULL,
  `klantid` int NOT NULL,
  `verkorddatum` date DEFAULT NULL,
  `verkordbestaantal` int DEFAULT NULL,
  `verkordstatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Gegevens worden geëxporteerd voor tabel `verkooporders`
--

INSERT INTO `verkooporders` (`verkordid`, `klantid`, `verkorddatum`, `verkordbestaantal`, `verkordstatus`) VALUES
(1, 2, '2023-06-04', 4, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikelen`
--
ALTER TABLE `artikelen`
  ADD PRIMARY KEY (`artid`),
  ADD KEY `levid` (`levid`);

--
-- Indexen voor tabel `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD PRIMARY KEY (`inkordid`,`levid`),
  ADD UNIQUE KEY `leveranciers_levid_UNIQUE` (`levid`),
  ADD KEY `fk_inkooporders_leveranciers1_idx` (`levid`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantid`);

--
-- Indexen voor tabel `leveranciers`
--
ALTER TABLE `leveranciers`
  ADD PRIMARY KEY (`levid`);

--
-- Indexen voor tabel `tussentabelinkoop`
--
ALTER TABLE `tussentabelinkoop`
  ADD PRIMARY KEY (`artid`,`inkoopid`),
  ADD KEY `inkoopid` (`inkoopid`);

--
-- Indexen voor tabel `tussentabelverkoop`
--
ALTER TABLE `tussentabelverkoop`
  ADD PRIMARY KEY (`artid`,`verkoopid`),
  ADD KEY `verkoopid` (`verkoopid`);

--
-- Indexen voor tabel `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD PRIMARY KEY (`verkordid`,`klantid`),
  ADD UNIQUE KEY `klanten_klantid_UNIQUE` (`klantid`),
  ADD KEY `fk_verkooporders_klanten1_idx` (`klantid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikelen`
--
ALTER TABLE `artikelen`
  MODIFY `artid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `inkooporders`
--
ALTER TABLE `inkooporders`
  MODIFY `inkordid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `leveranciers`
--
ALTER TABLE `leveranciers`
  MODIFY `levid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `verkooporders`
--
ALTER TABLE `verkooporders`
  MODIFY `verkordid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `artikelen`
--
ALTER TABLE `artikelen`
  ADD CONSTRAINT `artikelen_ibfk_1` FOREIGN KEY (`levid`) REFERENCES `leveranciers` (`levid`);

--
-- Beperkingen voor tabel `inkooporders`
--
ALTER TABLE `inkooporders`
  ADD CONSTRAINT `inkooporders_ibfk_1` FOREIGN KEY (`levid`) REFERENCES `leveranciers` (`levid`);

--
-- Beperkingen voor tabel `tussentabelinkoop`
--
ALTER TABLE `tussentabelinkoop`
  ADD CONSTRAINT `tussentabelinkoop_ibfk_1` FOREIGN KEY (`artid`) REFERENCES `artikelen` (`artid`),
  ADD CONSTRAINT `tussentabelinkoop_ibfk_2` FOREIGN KEY (`inkoopid`) REFERENCES `inkooporders` (`inkordid`);

--
-- Beperkingen voor tabel `tussentabelverkoop`
--
ALTER TABLE `tussentabelverkoop`
  ADD CONSTRAINT `tussentabelverkoop_ibfk_1` FOREIGN KEY (`artid`) REFERENCES `artikelen` (`artid`),
  ADD CONSTRAINT `tussentabelverkoop_ibfk_2` FOREIGN KEY (`verkoopid`) REFERENCES `verkooporders` (`verkordid`);

--
-- Beperkingen voor tabel `verkooporders`
--
ALTER TABLE `verkooporders`
  ADD CONSTRAINT `aaaaa` FOREIGN KEY (`klantid`) REFERENCES `klanten` (`klantid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
