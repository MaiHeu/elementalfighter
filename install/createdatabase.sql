SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `elementalfighter` DEFAULT CHARACTER SET latin1 COLLATE latin1_german1_ci;
USE `elementalfighter`;

DROP TABLE IF EXISTS `Benutzer`;
CREATE TABLE `Benutzer` (
  `BenutzerID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE latin1_german1_ci NOT NULL,
  `E-Mail` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `Passwort` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `Mail bestätigt` tinyint(1) NOT NULL DEFAULT '0',
  `Erstellt am` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Administrator` tinyint(1) DEFAULT NULL,
  `VerifizierungCode` varchar(255) COLLATE latin1_german1_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

DROP TABLE IF EXISTS `Charakter`;
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

DROP TABLE IF EXISTS `Message`;
CREATE TABLE `Message` (
  `MessageID` int(11) NOT NULL,
  `SenderNr` int(11) DEFAULT NULL,
  `EmpfängerNr` int(11) DEFAULT NULL,
  `Datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Betreff` text COLLATE latin1_german1_ci NOT NULL,
  `Nachricht` text COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

DROP TABLE IF EXISTS `Wertnamen`;
CREATE TABLE `Wertnamen` (
  `WertnamenID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE latin1_german1_ci NOT NULL,
  `Tägl. Training` double NOT NULL,
  `Startwert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

DROP TABLE IF EXISTS `ZO_CharakterWerte`;
CREATE TABLE `ZO_CharakterWerte` (
  `CharakterWerteID` int(11) NOT NULL,
  `CharakterNR` int(11) NOT NULL,
  `WertnamenNR` int(11) NOT NULL,
  `Wert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;


ALTER TABLE `Benutzer`
  ADD PRIMARY KEY (`BenutzerID`),
  ADD UNIQUE KEY `UNQ_Benutzer_NameMail` (`Name`,`E-Mail`);

ALTER TABLE `Charakter`
  ADD PRIMARY KEY (`CharakterID`),
  ADD KEY `BenutzerNR` (`BenutzerNR`),
  ADD KEY `Eingetr. Training` (`Eingetr. Training`);

ALTER TABLE `Message`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `messageBenutzer_sender_fk` (`SenderNr`),
  ADD KEY `messageBenutzer_empfaenger_fk` (`EmpfängerNr`);

ALTER TABLE `Wertnamen`
  ADD PRIMARY KEY (`WertnamenID`),
  ADD UNIQUE KEY `UNQ_Wertnamen_Name` (`Name`);

ALTER TABLE `ZO_CharakterWerte`
  ADD PRIMARY KEY (`CharakterWerteID`),
  ADD UNIQUE KEY `UNQ_CharakterWerte_CharakterWertnamen` (`WertnamenNR`,`CharakterNR`),
  ADD KEY `CharakterNR` (`CharakterNR`);


ALTER TABLE `Benutzer`
  MODIFY `BenutzerID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Charakter`
  MODIFY `CharakterID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Wertnamen`
  MODIFY `WertnamenID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ZO_CharakterWerte`
  MODIFY `CharakterWerteID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `Charakter`
  ADD CONSTRAINT `charakter_ibfk_1` FOREIGN KEY (`BenutzerNR`) REFERENCES `benutzer` (`BenutzerID`),
  ADD CONSTRAINT `charakter_ibfk_2` FOREIGN KEY (`Eingetr. Training`) REFERENCES `wertnamen` (`WertnamenID`);

ALTER TABLE `Message`
  ADD CONSTRAINT `messageBenutzer_empfaenger_fk` FOREIGN KEY (`EmpfängerNr`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE SET NULL,
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`SenderNr`) REFERENCES `benutzer` (`BenutzerID`) ON DELETE SET NULL;

ALTER TABLE `ZO_CharakterWerte`
  ADD CONSTRAINT `zo_charakterwerte_ibfk_1` FOREIGN KEY (`CharakterNR`) REFERENCES `charakter` (`CharakterID`) ON DELETE CASCADE,
  ADD CONSTRAINT `zo_charakterwerte_ibfk_2` FOREIGN KEY (`WertnamenNR`) REFERENCES `wertnamen` (`WertnamenID`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
