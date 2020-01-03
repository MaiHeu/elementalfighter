-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jan 2020 um 12:03
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `elementalfighter`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Benutzer`
--

CREATE TABLE `Benutzer` (
  `BenutzerID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE latin1_german1_ci NOT NULL,
  `E-Mail` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `Passwort` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `Mail bestätigt` tinyint(1) NOT NULL DEFAULT '0',
  `Erstellt am` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Charakter`
--

CREATE TABLE `Charakter` (
  `CharakterID` int(11) NOT NULL,
  `BenutzerNR` int(11) NOT NULL,
  `Eingetr. Training` int(11) DEFAULT NULL,
  `Tage Training` int(11) DEFAULT NULL,
  `Name` varchar(50) COLLATE latin1_german1_ci DEFAULT NULL,
  `Geburtsdatum` date DEFAULT NULL,
  `Bildlink` varchar(500) COLLATE latin1_german1_ci DEFAULT NULL,
  `Geschlecht` varchar(1) COLLATE latin1_german1_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Wertnamen`
--

CREATE TABLE `Wertnamen` (
  `WertnamenID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE latin1_german1_ci NOT NULL,
  `Tägl. Training` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ZO_CharakterWerte`
--

CREATE TABLE `ZO_CharakterWerte` (
  `CharakterWerteID` int(11) NOT NULL,
  `CharakterNR` int(11) NOT NULL,
  `WertnamenNR` int(11) NOT NULL,
  `Wert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Benutzer`
--
ALTER TABLE `Benutzer`
  ADD PRIMARY KEY (`BenutzerID`),
  ADD UNIQUE KEY `UNQ_Benutzer_NameMail` (`Name`,`E-Mail`);

--
-- Indizes für die Tabelle `Charakter`
--
ALTER TABLE `Charakter`
  ADD PRIMARY KEY (`CharakterID`),
  ADD KEY `BenutzerNR` (`BenutzerNR`),
  ADD KEY `Eingetr. Training` (`Eingetr. Training`);

--
-- Indizes für die Tabelle `Wertnamen`
--
ALTER TABLE `Wertnamen`
  ADD PRIMARY KEY (`WertnamenID`),
  ADD UNIQUE KEY `UNQ_Wertnamen_Name` (`Name`);

--
-- Indizes für die Tabelle `ZO_CharakterWerte`
--
ALTER TABLE `ZO_CharakterWerte`
  ADD UNIQUE KEY `UNQ_CharakterWerte_CharakterWertnamen` (`WertnamenNR`,`CharakterNR`),
  ADD KEY `CharakterNR` (`CharakterNR`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Benutzer`
--
ALTER TABLE `Benutzer`
  MODIFY `BenutzerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Charakter`
--
ALTER TABLE `Charakter`
  MODIFY `CharakterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Wertnamen`
--
ALTER TABLE `Wertnamen`
  MODIFY `WertnamenID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Charakter`
--
ALTER TABLE `Charakter`
  ADD CONSTRAINT `charakter_ibfk_1` FOREIGN KEY (`BenutzerNR`) REFERENCES `Benutzer` (`BenutzerID`),
  ADD CONSTRAINT `charakter_ibfk_2` FOREIGN KEY (`Eingetr. Training`) REFERENCES `Wertnamen` (`WertnamenID`);

--
-- Constraints der Tabelle `ZO_CharakterWerte`
--
ALTER TABLE `ZO_CharakterWerte`
  ADD CONSTRAINT `zo_charakterwerte_ibfk_1` FOREIGN KEY (`CharakterNR`) REFERENCES `Charakter` (`CharakterID`),
  ADD CONSTRAINT `zo_charakterwerte_ibfk_2` FOREIGN KEY (`WertnamenNR`) REFERENCES `Wertnamen` (`WertnamenID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
