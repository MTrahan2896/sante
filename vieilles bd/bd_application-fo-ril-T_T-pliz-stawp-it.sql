-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 02:03 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

DROP TABLE IF EXISTS `activites`;
CREATE TABLE IF NOT EXISTS `activites` (
  `ID_Activite` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Activite` varchar(75) NOT NULL,
  `Duree` varchar(30) NOT NULL,
  `Commentaire` text NOT NULL,
  `Ponderation` int(11) NOT NULL,
  `couleur` char(6) NOT NULL,
  PRIMARY KEY (`ID_Activite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activites`
--

INSERT INTO `activites` (`ID_Activite`, `Nom_Activite`, `Duree`, `Commentaire`, `Ponderation`, `couleur`) VALUES
(1, 'Tennis', '23', '23', 23, ''),
(2, 'Soccer', '32', '43', 43, ''),
(3, 'ttt', '223', '23', 23, 'A3BA81');

-- --------------------------------------------------------

--
-- Table structure for table `activites_prevues`
--

DROP TABLE IF EXISTS `activites_prevues`;
CREATE TABLE IF NOT EXISTS `activites_prevues` (
  `ID_activite_prevue` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Activite` date NOT NULL,
  `Heure_debut` time NOT NULL,
  `Participants_Max` int(11) NOT NULL,
  `Frais` double NOT NULL,
  `Endroit` varchar(200) NOT NULL,
  `ID_Activite` int(11) NOT NULL,
  PRIMARY KEY (`ID_activite_prevue`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activites_prevues`
--

INSERT INTO `activites_prevues` (`ID_activite_prevue`, `Date_Activite`, `Heure_debut`, `Participants_Max`, `Frais`, `Endroit`, `ID_Activite`) VALUES
(1, '2017-02-15', '11:00:00', 20, 12, 'Parc Bellevue', 1),
(2, '2017-02-15', '17:00:00', 20, 12, 'Parc Mont-Tremblant', 1),
(5, '2017-02-25', '19:30:00', 5, 4, 'Parc Bellevue', 2),
(7, '2017-02-15', '19:00:00', 5, 0, 'Parc tennis', 2),
(8, '1970-01-01', '12:00:00', 1, 1, 'St-jacques', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Groupe` varchar(65) NOT NULL,
  `ID_Prof` int(11) NOT NULL,
  `ID_Session` int(11) NOT NULL,
  `Ensemble` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Groupe`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`ID_Groupe`, `Nom_Groupe`, `ID_Prof`, `ID_Session`, `Ensemble`) VALUES
(1, 'Groupe 1', 1, 0, 0),
(7, 'Groupe 4', 1, 0, 0),
(8, 'Groupe 6', 1, 0, 0),
(17, 'Groupe 1 Ensemble 2', 5, 1, 2),
(18, 'ttt', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `ID_Session` int(11) NOT NULL AUTO_INCREMENT,
  `Debut_Session` date NOT NULL,
  `Fin_Session` date NOT NULL,
  `Mi_Session` date NOT NULL,
  `Nom_Session` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_Session`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`ID_Session`, `Debut_Session`, `Fin_Session`, `Mi_Session`, `Nom_Session`) VALUES
(1, '2016-08-24', '2016-12-21', '2016-10-12', 'A2016'),
(2, '2017-01-11', '2017-05-20', '2017-03-08', 'H2017'),
(3, '2017-08-31', '2017-10-05', '2017-12-21', 'H2016');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ID_Groupe` int(11) DEFAULT NULL,
  `CODE_ACCES` char(5) DEFAULT NULL,
  `Actif` tinyint(1) DEFAULT '0',
  `Courriel` varchar(75) DEFAULT NULL,
  `Telephone` char(10) DEFAULT NULL,
  `Sexe` char(1) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `administrateur` tinyint(1) NOT NULL,
  `Type_Utilisateur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `ID_Groupe`, `CODE_ACCES`, `Actif`, `Courriel`, `Telephone`, `Sexe`, `username`, `password`, `administrateur`, `Type_Utilisateur`) VALUES
(1, 'Duchemin', 'Marc', 1, '', 1, 'marcduchemin01@hotmail.com', '8197092941', 'H', 'Marc21', '$2y$10$TB1Co5g9P/c0iDANo1e9xuL2M15x5hlRrQvl/1pQnUV/r/wBtZWk6', 0, ''),
(2, 'Gelinas', 'Sylvain', 1, '', 1, 'root', 'root', 'F', 'ROOT', '$2y$10$Ifd8gJmsRmCgmprq7UVv0uf/xzX4ZzTbH5ryLGbcaWuXP5UMFTJJ6', 1, ''),
(3, 'BÃ©land', 'Martin', 1, '', 1, 'mbeland@yahoo.fr', '8194342865', 'H', 'MartinB01', '$2y$10$4HVjZ7zh.XKw/kEHITYgs.rQMkeH/us.E83qRNVuobGYOTpcJHn1i', 0, ''),
(4, 'dsadasd', 'asdasd', 6, '', 1, '2121@21.com', '412564365', 'F', 'jean21', '$2y$10$gxWJu.KTUnKRGgZOKCXmiOK9ZEuXPC9XvXlZbAVDC4zwlirJDUVPq', 0, ''),
(5, 'Beliveau', 'Jean-m', NULL, '', 1, 'J.beliveau@hotmail.com', '8193722827', 'H', 'User_test', '$2y$10$ARJxeS4GPv1zk3VDv.4UDOBsj0gW3D3SAGx5wjJulnvgJYcvtcD1q', 0, 'soutien'),
(6, NULL, NULL, 6, 'qeA75', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(7, 'Bob', 'Robert', 6, '', 1, 'Bob@b.x', '819191819', 'H', 'Bob', '$2y$10$jS9NzhkEYoc432BGNUiRtOO7zkmYcYtvT6If0S/.EH7Jq4vi36e0K', 0, ''),
(8, NULL, NULL, 6, 'rMx9F', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(9, 'D', 'd', 6, '', 1, 'd', '', '', 'user', '$2y$10$t.tjyLZxil5WScUccj93iesRYPb3AqGjEcEIpiiBGCSELWeHTmtNC', 0, ''),
(10, NULL, NULL, 6, 'DQiqh', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(11, NULL, NULL, 6, 'GZB0w', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(12, NULL, NULL, 6, 'CnTBE', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(13, NULL, NULL, 6, 'GdXWv', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(14, NULL, NULL, 6, '0mA9x', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(15, NULL, NULL, 6, 'Z0nfn', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(16, 'Laquerre', 'Marc-Antoine', 7, '', 1, 'bobVingetUn@hotmail.com', '8193447658', 'H', 'Bob21', '$2y$10$Q6fmn.DCD5Uc2uPBVTv4ruznzZL/oRT5s55V5QnfMoUn46/PA8O2q', 0, ''),
(17, 'Lacerte', 'Marie', 7, '', 1, '123', '123', 'F', 'test', '$2y$10$kEH.OWjh/AE164ChNfJcu.K.1dSgvPjDo4qy28rbGoqGe49D4lpmy', 0, ''),
(18, 'Marchand', 'Marc', 7, '', 1, '123NouveauJour123', '123123123', 'F', 'NouveauJour123', '$2y$10$x2rOkRfL.PWFgztj7J4t3eXw3CElK6USsf7qTve6IkSKw8GIMPnsy', 0, ''),
(19, NULL, NULL, 7, 'xKCBI', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(20, NULL, NULL, 7, 'rWaMF', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(21, NULL, NULL, 1, 'oBj8e', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(22, NULL, NULL, 1, 'l0UKc', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(23, NULL, NULL, 1, 'Cspsz', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(24, NULL, NULL, 1, '45PAm', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(25, NULL, NULL, 1, 'FdyWT', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(26, NULL, NULL, 1, 'sxLkJ', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(27, 'Lafreniere', 'Jonathan', 1, '', 1, 'jlafreniere@hotmail.com', '1231231233', 'H', 'JLafreniere', '$2y$10$fkIite8eM5xlLY/0aRcroOGCfggZLnHdFRj0MH7ZAY8y/uO3I7Cdy', 0, ''),
(28, NULL, NULL, 1, 'I9KNM', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(29, NULL, NULL, 8, 'CzpEC', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(30, NULL, NULL, 8, 'EQtBi', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(31, NULL, NULL, 11, 'Ot8TA', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(32, NULL, NULL, 11, 'VNinl', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(33, NULL, NULL, 11, 'P48kt', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(34, NULL, NULL, 9, 'utPVF', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(35, NULL, NULL, 9, 'tMLAx', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(36, NULL, NULL, 9, '07khy', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(37, 'Lafreniere', 'Jonathan', 12, '', 1, 'j@j.c', '8192222222', 'H', 'JLafreniere01', '$2y$10$DwY68k7p/nsGHFCyhO4jSObbMO5VXaoj.SvUYeD7B3AF/AJV4MOJi', 0, ''),
(38, NULL, NULL, 12, 'XM39Y', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(39, NULL, NULL, 12, 'jWDWe', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(40, NULL, NULL, 12, 'D8vdx', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(41, NULL, NULL, 12, 'XaY5k', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(42, NULL, NULL, 12, 'GXt3z', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(43, NULL, NULL, 12, 'BDWjI', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(44, NULL, NULL, 12, 'Ysnol', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(45, NULL, NULL, 12, '4MnBB', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(46, NULL, NULL, 12, 'Q72R0', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(47, NULL, NULL, 12, 'Qb0qw', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(48, NULL, NULL, 12, 'FeDBw', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(49, NULL, NULL, 12, '7TMPH', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(50, NULL, NULL, 12, 'HrPxt', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(51, NULL, NULL, 12, 'dHRO5', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(52, NULL, NULL, 12, 'HSKw2', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(53, NULL, NULL, 12, 'II1Rw', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(54, NULL, NULL, 12, 'BADP0', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(55, NULL, NULL, 12, 'l6ZQp', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(56, NULL, NULL, 12, '5tcnJ', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(57, NULL, NULL, 12, 'QgzuY', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(58, NULL, NULL, 12, 'AJbqR', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(59, NULL, NULL, 12, 'zXht8', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(60, NULL, NULL, 12, 'gxhuw', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(61, NULL, NULL, 1, 'Z3Kgd', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(62, NULL, NULL, 14, 'HNpU8', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(63, NULL, NULL, 14, 'dH2Bd', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(64, NULL, NULL, 14, 'VEfaI', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(65, NULL, NULL, 8, 'uf1lS', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(66, NULL, NULL, 8, 'Z3DUN', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(67, NULL, NULL, NULL, 'GLmUj', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(68, 'Jean', 'Admin', NULL, '', 1, 'j@j.j', '1231231233', 'H', 'JeanAdmin', '$2y$10$5DUaLHlkYQgYEehgf.R5iOPdRjJPbYFpjVd7.nb/0oCob1tQSw6Ju', 1, ''),
(69, NULL, NULL, NULL, 'YT3RJ', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(70, NULL, NULL, NULL, 'ymvjy', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(71, NULL, NULL, NULL, 'QWlI5', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(72, NULL, NULL, NULL, 'MAF4s', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(73, NULL, NULL, NULL, 'QPr1X', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(74, NULL, NULL, NULL, 'nnFLC', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(75, NULL, NULL, NULL, 'heFYK', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(76, NULL, NULL, NULL, '9oDqy', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(77, NULL, NULL, NULL, 'eMbqa', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(78, NULL, NULL, NULL, 'VbeMs', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(79, NULL, NULL, NULL, 'jHWQR', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(80, '123', '123', NULL, '', 1, '123', '123', 'H', 'test', '$2y$10$9RKIPf9DuPGUw6vvX1gAcOpgESAGl2c2u9fo9h.0a/bHJsN2hf4mu', 0, ''),
(81, NULL, NULL, NULL, 'p7MGO', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(82, NULL, NULL, NULL, 'X6N7o', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(83, NULL, NULL, 9, 'Y4TFC', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(84, NULL, NULL, 9, 'MoS5n', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(85, NULL, NULL, 9, '201aV', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(86, NULL, NULL, 9, 'fFUOj', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(87, NULL, NULL, 9, '6PW4Y', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(88, NULL, NULL, 9, 'C1k3y', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(89, NULL, NULL, 15, 'ocuxv', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(90, NULL, NULL, 15, 'M6CdU', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(91, NULL, NULL, 15, 'Fv0SF', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(92, NULL, NULL, 15, 'i9IOq', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(93, 'test', 'test', 15, '', 1, '123', '123', 'H', 'JLafreniere', '$2y$10$vBulHhMjaxGDdktDJsgsPebUSsdaIzLnu4M1wbvLpwqJMCLOZfeHe', 0, ''),
(94, NULL, NULL, 16, '13jVO', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(95, NULL, NULL, 16, '52xvE', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(96, NULL, NULL, 16, 'bja4m', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(97, NULL, NULL, 16, 'sz6oL', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(98, NULL, NULL, 16, '6x3EJ', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(99, NULL, NULL, 16, '6GNvg', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(100, '123', '123', 16, '', 1, '123@123.123', '123123123', 'H', 'jlafreniere', '$2y$10$R0laoALowGOrbOZKbduDM.8crYCTc6Skwmyq5MuOUNjWhlGxT5Jpy', 0, ''),
(101, NULL, NULL, 16, 'bzrwe', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(102, NULL, NULL, 16, 'LZGxF', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(103, NULL, NULL, 16, 'Haqty', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(104, NULL, NULL, NULL, 'chSoW', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(105, NULL, NULL, NULL, 'khlYG', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(106, NULL, NULL, NULL, 'oAZRX', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(107, NULL, NULL, NULL, 'YJOah', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(108, NULL, NULL, NULL, '3sRxP', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(109, NULL, NULL, NULL, 'Qo95B', NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(110, NULL, NULL, NULL, 'uSV0R', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(111, NULL, NULL, NULL, 'lVLVF', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(112, NULL, NULL, NULL, 'yDy1M', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(113, NULL, NULL, NULL, 'vaD0M', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(114, NULL, NULL, NULL, 'mhoqa', NULL, NULL, NULL, NULL, NULL, NULL, 1, ''),
(115, NULL, NULL, 8, 'dUd0e', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(116, NULL, NULL, 8, 'VzYBW', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(117, NULL, NULL, 8, 'lBvmA', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(118, NULL, NULL, 8, '5re9B', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(119, NULL, NULL, 8, '3ZjZi', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(120, NULL, NULL, 8, 'DBKdo', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(121, NULL, NULL, 8, 'PTYF7', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(122, NULL, NULL, 8, '7iALT', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(123, NULL, NULL, 8, 'pOLgW', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(124, NULL, NULL, 8, 'bUB8X', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(125, NULL, NULL, 8, 'xkvwX', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(126, NULL, NULL, 8, 'w1tOV', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(127, NULL, NULL, 8, 'BWwyK', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(128, NULL, NULL, 8, 'YmJyd', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(129, NULL, NULL, 8, 'cl1kb', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(130, NULL, NULL, 8, 'v1ZTi', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(131, NULL, NULL, 8, '5hlWi', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(132, NULL, NULL, 8, 'U7Smy', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(133, NULL, NULL, 8, '6RGzu', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(134, NULL, NULL, 8, 'dT8Yn', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(135, NULL, NULL, 8, 'QDR6P', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(136, NULL, NULL, 8, 'I1NCx', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(137, NULL, NULL, 8, 'uy1vh', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(138, NULL, NULL, 8, 'R7EUm', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(139, NULL, NULL, 8, 'QXm2R', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(140, NULL, NULL, 8, 'wIzNv', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(141, NULL, NULL, 8, 'AN81x', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(142, NULL, NULL, 8, '7kZXy', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(143, NULL, NULL, 8, 'nv6BX', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(144, NULL, NULL, 8, 'AGQpD', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(145, NULL, NULL, 8, '8xIq8', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(146, NULL, NULL, 8, 'SHbvA', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(147, NULL, NULL, 8, 'jQLlm', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(148, NULL, NULL, 17, 'qa5NU', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(149, NULL, NULL, 17, 'rm4d9', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(150, NULL, NULL, 17, 'SM8Wp', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(151, NULL, NULL, 17, 'kM0HX', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(152, NULL, NULL, 17, 'EdSVF', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(153, NULL, NULL, 17, 'O94OX', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(154, NULL, NULL, 17, 'YSZ9t', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(155, NULL, NULL, 17, 'qgTxe', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(156, NULL, NULL, 17, 'skfUO', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(157, NULL, NULL, 17, 'g2ALY', 0, NULL, NULL, NULL, NULL, NULL, 0, ''),
(158, NULL, NULL, 18, '71yvt', 0, NULL, NULL, NULL, NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_activites`
--

DROP TABLE IF EXISTS `utilisateur_activites`;
CREATE TABLE IF NOT EXISTS `utilisateur_activites` (
  `ID_Eleve_Activite` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int(11) NOT NULL,
  `ID_Activite_Prevue` int(11) NOT NULL,
  `Present` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_Eleve_Activite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur_activites`
--

INSERT INTO `utilisateur_activites` (`ID_Eleve_Activite`, `ID_Utilisateur`, `ID_Activite_Prevue`, `Present`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 1, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
