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

REPLACE INTO `Benutzer` (`BenutzerID`, `Name`, `E-Mail`, `Passwort`, `Mail bestätigt`, `Erstellt am`, `Administrator`, `VerifizierungCode`) VALUES
(1, 'abel', 'abel', '$2y$10$7ZZ.1schqTTbm7AEMqJHx.1bw3HCj7R/KYEuLp4GFnh7Ivh/AIGsu', 0, '2020-02-01 21:54:01', NULL, NULL),
(2, 'bebel', 'bebel', '$2y$10$f7LJC4g1xHSv6GawHDqiHeD7TTa6Oygft1hUkVfTk5MVgMDgUcuWC', 0, '2020-02-01 21:54:11', NULL, NULL),
(3, 'cebel', 'cebel', '$2y$10$jfC4SWRR4cmpB4NgyLnNlObUWJXNYkM2Pa6YNgLjIQcH5V9fBsfR.', 0, '2020-02-01 21:54:22', NULL, NULL),
(5, 'test', 'test', '$2y$10$fx/5Vd/0BxGa/fCSjeieA.vpwd7OX//S6vGF1qpeFLODbHk7tKMc6', 0, '2020-02-01 21:54:41', NULL, NULL),
(7, 'hamster', 'hamster', '$2y$10$mbwIK/G4qc0eP3UD1edO8eskfvU7sFK0xsE0lMkbHQFyeyzhIIGdu', 0, '2020-02-01 22:16:01', NULL, NULL),
(8, 'simon', 'simon', '$2y$10$rUznuEyMyhL.Zuf6Ohy0x.YOGTKjiEHHqxcAWtC3R2C8x.vfpM3me', 0, '2020-02-02 14:23:24', NULL, NULL);

REPLACE INTO `Charakter` (`CharakterID`, `BenutzerNR`, `Eingetr. Training`, `Tage Training`, `Name`, `Geburtsdatum`, `Bildlink`, `Geschlecht`) VALUES
(1, 1, 4, 1, 'Abra', NULL, 'https://www.pokedexia.net/images/7/70/PGL-063.png', 'w'),
(2, 2, 5, 2, 'August Bebel', NULL, 'https://www.dhm.de/fileadmin/medien/lemo/images/f53_1623.jpg', 'm'),
(3, 3, 3, 8, 'C-Bra', NULL, 'https://i.imgur.com/ZXIVwhF.png', 'w'),
(4, 5, 1, NULL, 'Test Charakter', NULL, 'https://www.stern.de/vergleich/wp-content/uploads/2018/06/fragezeichen-300x300.png', 'w'),
(6, 7, 2, NULL, 'Ham Star', NULL, 'https://apollo2.dl.playstation.net/cdn/UP8805/CUSA03855_00/LOoxtVp4t1RL4ZjCODqAGr53Qbp38bfU.png', 'w'),
(7, 8, NULL, NULL, 'S. Imon', NULL, 'https://yt3.ggpht.com/a/AGF-l79sX8ntFRo-z1YNgT93XQYQlR7qHCWBCh3umA=s900-c-k-c0xffffffff-no-rj-mo', 'm');

REPLACE INTO `Message` (`MessageID`, `SenderNr`, `EmpfängerNr`, `Datum`, `Betreff`, `Nachricht`) VALUES
(1, 5, NULL, '2020-02-01 23:04:13', 'Hamsternachten', 'Hallo,\r\nmorgen feiern wir Hamsternachten, bist du mit dabei?'),
(2, 8, 1, '2020-02-02 15:24:17', 'Treffen wir uns', 'Wir gehen grillen.');

REPLACE INTO `Wertnamen` (`WertnamenID`, `Name`, `Tägl. Training`, `Startwert`) VALUES
(1, 'Stärke', 1, 10),
(2, 'Verteidigung', 1, 10),
(3, 'Geschwindigkeit', 1, 10),
(4, 'Ausdauer', 5, 50),
(5, 'Geisteskraft', 5, 50);

REPLACE INTO `ZO_CharakterWerte` (`CharakterWerteID`, `CharakterNR`, `WertnamenNR`, `Wert`) VALUES
(1, 1, 1, 12),
(2, 1, 2, 10),
(3, 1, 3, 10),
(4, 1, 4, 55),
(5, 1, 5, 50),
(6, 2, 1, 10),
(7, 2, 2, 10),
(8, 2, 3, 10),
(9, 2, 4, 55),
(10, 2, 5, 55),
(11, 3, 1, 10),
(12, 3, 2, 10),
(13, 3, 3, 13),
(14, 3, 4, 50),
(15, 3, 5, 50),
(16, 4, 1, 10),
(17, 4, 2, 11),
(18, 4, 3, 10),
(19, 4, 4, 50),
(20, 4, 5, 50),
(26, 6, 1, 10),
(27, 6, 2, 10),
(28, 6, 3, 10),
(29, 6, 4, 50),
(30, 6, 5, 55),
(31, 7, 1, 10),
(32, 7, 2, 10),
(33, 7, 3, 10),
(34, 7, 4, 50),
(35, 7, 5, 50);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
