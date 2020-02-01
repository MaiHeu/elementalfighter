-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Feb 2020 um 23:12
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

INSERT INTO `Benutzer` (`BenutzerID`, `Name`, `E-Mail`, `Passwort`, `Mail bestätigt`, `Erstellt am`, `Administrator`, `VerifizierungCode`) VALUES
(1, 'abel', 'abel', '$2y$10$7ZZ.1schqTTbm7AEMqJHx.1bw3HCj7R/KYEuLp4GFnh7Ivh/AIGsu', 0, '2020-02-01 21:54:01', NULL, NULL),
(2, 'bebel', 'bebel', '$2y$10$f7LJC4g1xHSv6GawHDqiHeD7TTa6Oygft1hUkVfTk5MVgMDgUcuWC', 0, '2020-02-01 21:54:11', NULL, NULL),
(3, 'cebel', 'cebel', '$2y$10$jfC4SWRR4cmpB4NgyLnNlObUWJXNYkM2Pa6YNgLjIQcH5V9fBsfR.', 0, '2020-02-01 21:54:22', NULL, NULL),
(5, 'test', 'test', '$2y$10$fx/5Vd/0BxGa/fCSjeieA.vpwd7OX//S6vGF1qpeFLODbHk7tKMc6', 0, '2020-02-01 21:54:41', NULL, NULL),
(6, 'hamster', 'hamster', '$2y$10$/TwzBP5.Mq6qZszB1XQ9kOw6H9DWB95pWFzL6OeYkZTrcE3TZQArG', 0, '2020-02-01 22:01:51', NULL, NULL);

--
-- Daten für Tabelle `Charakter`
--

INSERT INTO `Charakter` (`CharakterID`, `BenutzerNR`, `Eingetr. Training`, `Tage Training`, `Name`, `Geburtsdatum`, `Bildlink`, `Geschlecht`) VALUES
(1, 1, NULL, NULL, 'Abra', NULL, 'https://www.pokedexia.net/images/7/70/PGL-063.png', 'w'),
(2, 2, NULL, NULL, 'August Bebel', NULL, 'https://www.dhm.de/fileadmin/medien/lemo/images/f53_1623.jpg', 'm'),
(3, 3, NULL, NULL, 'C-Bra', NULL, 'https://i.imgur.com/ZXIVwhF.png', 'w'),
(4, 5, NULL, NULL, 'Test Charakter', NULL, 'https://www.stern.de/vergleich/wp-content/uploads/2018/06/fragezeichen-300x300.png', 'w'),
(5, 6, NULL, NULL, 'Ham Star', NULL, 'https://apollo2.dl.playstation.net/cdn/UP8805/CUSA03855_00/LOoxtVp4t1RL4ZjCODqAGr53Qbp38bfU.png', 'm');

--
-- Daten für Tabelle `Message`
--

INSERT INTO `Message` (`MessageID`, `SenderNr`, `EmpfängerNr`, `Datum`, `Betreff`, `Nachricht`) VALUES
(1, 5, 6, '2020-02-01 23:04:13', 'Hamsternachten', 'Hallo,\r\nmorgen feiern wir Hamsternachten, bist du mit dabei?');

--
-- Daten für Tabelle `Wertnamen`
--

INSERT INTO `Wertnamen` (`WertnamenID`, `Name`, `Tägl. Training`, `Startwert`) VALUES
(1, 'Stärke', 1, 10),
(2, 'Verteidigung', 1, 10),
(3, 'Geschwindigkeit', 1, 10),
(4, 'Ausdauer', 5, 50),
(5, 'Geisteskraft', 5, 50);

--
-- Daten für Tabelle `ZO_CharakterWerte`
--

INSERT INTO `ZO_CharakterWerte` (`CharakterWerteID`, `CharakterNR`, `WertnamenNR`, `Wert`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 10),
(3, 1, 3, 10),
(4, 1, 4, 50),
(5, 1, 5, 50),
(6, 2, 1, 10),
(7, 2, 2, 10),
(8, 2, 3, 10),
(9, 2, 4, 50),
(10, 2, 5, 50),
(11, 3, 1, 10),
(12, 3, 2, 10),
(13, 3, 3, 10),
(14, 3, 4, 50),
(15, 3, 5, 50),
(16, 4, 1, 10),
(17, 4, 2, 10),
(18, 4, 3, 10),
(19, 4, 4, 50),
(20, 4, 5, 50),
(21, 5, 1, 10),
(22, 5, 2, 10),
(23, 5, 3, 10),
(24, 5, 4, 50),
(25, 5, 5, 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
