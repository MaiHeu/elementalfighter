-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jan 2020 um 12:02
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

--
-- Daten für Tabelle `Benutzer`
--

INSERT INTO `Benutzer` (`BenutzerID`, `Name`, `E-Mail`, `Passwort`, `Mail bestätigt`, `Erstellt am`) VALUES
(1, 'alfred', 'alfred.abel@abele-optik.de', 'alfred', 0, '2020-01-03 10:44:35'),
(2, 'berbel', 'berbel.bebel@barbershop-barbmann.de', 'berbel', 0, '2020-01-03 10:46:08'),
(3, 'cebra', 'c-bras@dessous.de', 'cebra', 0, '2020-01-03 10:46:08');

--
-- Daten für Tabelle `Charakter`
--

INSERT INTO `Charakter` (`CharakterID`, `BenutzerNR`, `Eingetr. Training`, `Tage Training`, `Name`, `Geburtsdatum`, `Bildlink`, `Geschlecht`) VALUES
(1, 1, 1, 10, 'Alfred Abel', '2010-02-09', 'https://i.pinimg.com/236x/fc/f0/0f/fcf00f7f9ec7b67f7f1deb0c3107ed2a--anime-boys-black-hair-anime-guy-hair.jpg', 'm'),
(2, 2, 3, 10, 'Bärbel Berbel', '2000-09-01', 'https://media1.tenor.com/images/17522fdf5d21b805a3889d1720c290e5/tenor.gif', 'w');

--
-- Daten für Tabelle `Wertnamen`
--

INSERT INTO `Wertnamen` (`WertnamenID`, `Name`, `Tägl. Training`) VALUES
(1, 'Stärke', 1),
(2, 'Verteidigung', 1),
(3, 'Geschwindigkeit', 1),
(4, 'Geist', 5),
(5, 'Ausdauer', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
