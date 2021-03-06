-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 20 Février 2017 à 22:04
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_application`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `ID_Activite` int(11) NOT NULL,
  `Nom_Activite` varchar(75) NOT NULL,
  `Duree` varchar(30) NOT NULL,
  `Commentaire` text NOT NULL,
  `Ponderation` int(11) NOT NULL,
  `couleur` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`ID_Activite`, `Nom_Activite`, `Duree`, `Commentaire`, `Ponderation`, `couleur`) VALUES
(1, 'Tennis', '23', '23', 23, ''),
(2, 'Soccer', '32', '43', 43, ''),
(3, 'ttt', '223', '23', 23, 'A3BA81');

-- --------------------------------------------------------

--
-- Structure de la table `activites_prevues`
--

CREATE TABLE `activites_prevues` (
  `ID_activite_prevue` int(11) NOT NULL,
  `Date_Activite` date NOT NULL,
  `Heure_debut` time NOT NULL,
  `Participants_Max` int(11) NOT NULL,
  `Frais` double NOT NULL,
  `Endroit` varchar(200) NOT NULL,
  `ID_Activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites_prevues`
--

INSERT INTO `activites_prevues` (`ID_activite_prevue`, `Date_Activite`, `Heure_debut`, `Participants_Max`, `Frais`, `Endroit`, `ID_Activite`) VALUES
(1, '2017-02-15', '11:00:00', 20, 12, 'Parc Bellevue', 1),
(2, '2017-02-15', '17:00:00', 20, 12, 'Parc Mont-Tremblant', 1),
(5, '2017-02-25', '19:30:00', 5, 4, 'Parc Bellevue', 2),
(7, '2017-02-15', '19:00:00', 5, 0, 'Parc tennis', 2),
(8, '1970-01-01', '12:00:00', 1, 1, 'St-jacques', 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `ID_Groupe` int(11) NOT NULL,
  `Nom_Groupe` varchar(65) NOT NULL,
  `ID_Prof` int(11) NOT NULL,
  `ID_Session` int(11) NOT NULL,
  `Ensemble` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`ID_Groupe`, `Nom_Groupe`, `ID_Prof`, `ID_Session`, `Ensemble`) VALUES
(1, 'Groupe 1', 1, 0, 0),
(7, 'Groupe 4', 1, 0, 0),
(8, 'Groupe 6', 1, 0, 0),
(9, 'Groupe 10', 1, 0, 0),
(16, 'Groupe 17', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `ID_Session` int(11) NOT NULL,
  `Debut_Session` date NOT NULL,
  `Fin_Session` date NOT NULL,
  `Mi_Session` date NOT NULL,
  `Nom_Session` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`ID_Session`, `Debut_Session`, `Fin_Session`, `Mi_Session`, `Nom_Session`) VALUES
(1, '2016-08-24', '2016-12-21', '2016-10-12', 'A2016'),
(2, '2017-01-11', '2017-05-20', '2017-03-08', 'H2017'),
(3, '2017-08-31', '2017-10-05', '2017-12-21', 'H2016');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ID_Groupe` int(11) NOT NULL,
  `CODE_ACCES` char(5) DEFAULT NULL,
  `Actif` tinyint(1) DEFAULT '0',
  `Courriel` varchar(75) DEFAULT NULL,
  `Telephone` char(10) DEFAULT NULL,
  `Sexe` char(1) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `administrateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `ID_Groupe`, `CODE_ACCES`, `Actif`, `Courriel`, `Telephone`, `Sexe`, `username`, `password`, `administrateur`) VALUES
(1, 'Duchemin', 'Marc', 1, '', 1, 'marcduchemin01@hotmail.com', '8197092941', 'H', 'Marc21', '$2y$10$TB1Co5g9P/c0iDANo1e9xuL2M15x5hlRrQvl/1pQnUV/r/wBtZWk6', 0),
(2, 'Gelinas', 'Sylvain', 1, '', 1, 'root', 'root', 'F', 'ROOT', '$2y$10$Ifd8gJmsRmCgmprq7UVv0uf/xzX4ZzTbH5ryLGbcaWuXP5UMFTJJ6', 1),
(3, 'BÃ©land', 'Martin', 1, '', 1, 'mbeland@yahoo.fr', '8194342865', 'H', 'MartinB01', '$2y$10$4HVjZ7zh.XKw/kEHITYgs.rQMkeH/us.E83qRNVuobGYOTpcJHn1i', 0),
(4, 'dsadasd', 'asdasd', 6, '', 1, '2121@21.com', '412564365', 'F', 'jean21', '$2y$10$gxWJu.KTUnKRGgZOKCXmiOK9ZEuXPC9XvXlZbAVDC4zwlirJDUVPq', 0),
(5, 'Beliveau', 'Jean', 6, '', 1, 'j.beliveau@hotmail.com', '8193722827', 'H', 'User_test', '$2y$10$ARJxeS4GPv1zk3VDv.4UDOBsj0gW3D3SAGx5wjJulnvgJYcvtcD1q', 0),
(6, NULL, NULL, 6, 'qeA75', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, NULL, NULL, 6, '3rPVP', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, NULL, NULL, 6, 'rMx9F', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, NULL, NULL, 6, 'iJp90', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, NULL, NULL, 6, 'DQiqh', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, NULL, NULL, 6, 'GZB0w', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, NULL, NULL, 6, 'CnTBE', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, NULL, NULL, 6, 'GdXWv', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, NULL, NULL, 6, '0mA9x', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, NULL, NULL, 6, 'Z0nfn', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, 'Laquerre', 'Marc-Antoine', 7, '', 1, 'bobVingetUn@hotmail.com', '8193447658', 'H', 'Bob21', '$2y$10$Q6fmn.DCD5Uc2uPBVTv4ruznzZL/oRT5s55V5QnfMoUn46/PA8O2q', 0),
(17, 'Lacerte', 'Marie', 7, '', 1, '123', '123', 'F', 'test', '$2y$10$kEH.OWjh/AE164ChNfJcu.K.1dSgvPjDo4qy28rbGoqGe49D4lpmy', 0),
(18, 'Marchand', 'Marc', 7, '', 1, '123NouveauJour123', '123123123', 'F', 'NouveauJour123', '$2y$10$x2rOkRfL.PWFgztj7J4t3eXw3CElK6USsf7qTve6IkSKw8GIMPnsy', 0),
(19, NULL, NULL, 7, 'xKCBI', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, NULL, NULL, 7, 'rWaMF', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, NULL, NULL, 1, 'oBj8e', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, NULL, NULL, 1, 'l0UKc', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, NULL, NULL, 1, 'Cspsz', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, NULL, NULL, 1, '45PAm', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, NULL, NULL, 1, 'FdyWT', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, NULL, NULL, 1, 'sxLkJ', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(27, 'Lafreniere', 'Jonathan', 1, '', 1, 'jlafreniere@hotmail.com', '1231231233', 'H', 'JLafreniere', '$2y$10$fkIite8eM5xlLY/0aRcroOGCfggZLnHdFRj0MH7ZAY8y/uO3I7Cdy', 0),
(28, NULL, NULL, 1, 'I9KNM', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, NULL, NULL, 8, 'CzpEC', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, NULL, NULL, 8, 'EQtBi', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(31, NULL, NULL, 11, 'Ot8TA', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(32, NULL, NULL, 11, 'VNinl', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(33, NULL, NULL, 11, 'P48kt', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(34, NULL, NULL, 9, 'utPVF', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, NULL, NULL, 9, 'tMLAx', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(36, NULL, NULL, 9, '07khy', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, 'Lafreniere', 'Jonathan', 12, '', 1, 'j@j.c', '8192222222', 'H', 'JLafreniere01', '$2y$10$DwY68k7p/nsGHFCyhO4jSObbMO5VXaoj.SvUYeD7B3AF/AJV4MOJi', 0),
(38, NULL, NULL, 12, 'XM39Y', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(39, NULL, NULL, 12, 'jWDWe', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(40, NULL, NULL, 12, 'D8vdx', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, NULL, NULL, 12, 'XaY5k', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(42, NULL, NULL, 12, 'GXt3z', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(43, NULL, NULL, 12, 'BDWjI', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(44, NULL, NULL, 12, 'Ysnol', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(45, NULL, NULL, 12, '4MnBB', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(46, NULL, NULL, 12, 'Q72R0', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(47, NULL, NULL, 12, 'Qb0qw', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(48, NULL, NULL, 12, 'FeDBw', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(49, NULL, NULL, 12, '7TMPH', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(50, NULL, NULL, 12, 'HrPxt', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(51, NULL, NULL, 12, 'dHRO5', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(52, NULL, NULL, 12, 'HSKw2', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(53, NULL, NULL, 12, 'II1Rw', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(54, NULL, NULL, 12, 'BADP0', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(55, NULL, NULL, 12, 'l6ZQp', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(56, NULL, NULL, 12, '5tcnJ', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(57, NULL, NULL, 12, 'QgzuY', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(58, NULL, NULL, 12, 'AJbqR', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(59, NULL, NULL, 12, 'zXht8', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(60, NULL, NULL, 12, 'gxhuw', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(61, NULL, NULL, 1, 'Z3Kgd', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(62, NULL, NULL, 14, 'HNpU8', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(63, NULL, NULL, 14, 'dH2Bd', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(64, NULL, NULL, 14, 'VEfaI', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(65, NULL, NULL, 8, 'uf1lS', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(66, NULL, NULL, 8, 'Z3DUN', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(67, NULL, NULL, 0, 'GLmUj', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(68, 'Jean', 'Admin', 0, '', 1, 'j@j.j', '1231231233', 'H', 'JeanAdmin', '$2y$10$5DUaLHlkYQgYEehgf.R5iOPdRjJPbYFpjVd7.nb/0oCob1tQSw6Ju', 1),
(69, NULL, NULL, 0, 'YT3RJ', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(70, NULL, NULL, 0, 'ymvjy', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(71, NULL, NULL, 0, 'QWlI5', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(72, NULL, NULL, 0, 'MAF4s', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(73, NULL, NULL, 0, 'QPr1X', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(74, NULL, NULL, 0, 'nnFLC', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(75, NULL, NULL, 0, 'heFYK', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(76, NULL, NULL, 0, '9oDqy', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(77, NULL, NULL, 0, 'eMbqa', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(78, NULL, NULL, 0, 'VbeMs', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(79, NULL, NULL, 0, 'jHWQR', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(80, '123', '123', 0, '', 1, '123', '123', 'H', 'test', '$2y$10$9RKIPf9DuPGUw6vvX1gAcOpgESAGl2c2u9fo9h.0a/bHJsN2hf4mu', 0),
(81, NULL, NULL, 0, 'p7MGO', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(82, NULL, NULL, 0, 'X6N7o', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(83, NULL, NULL, 9, 'Y4TFC', 0, NULL, NULL, NULL, NULL, NULL, 0),
(84, NULL, NULL, 9, 'MoS5n', 0, NULL, NULL, NULL, NULL, NULL, 0),
(85, NULL, NULL, 9, '201aV', 0, NULL, NULL, NULL, NULL, NULL, 0),
(86, NULL, NULL, 9, 'fFUOj', 0, NULL, NULL, NULL, NULL, NULL, 0),
(87, NULL, NULL, 9, '6PW4Y', 0, NULL, NULL, NULL, NULL, NULL, 0),
(88, NULL, NULL, 9, 'C1k3y', 0, NULL, NULL, NULL, NULL, NULL, 0),
(89, NULL, NULL, 15, 'ocuxv', 0, NULL, NULL, NULL, NULL, NULL, 0),
(90, NULL, NULL, 15, 'M6CdU', 0, NULL, NULL, NULL, NULL, NULL, 0),
(91, NULL, NULL, 15, 'Fv0SF', 0, NULL, NULL, NULL, NULL, NULL, 0),
(92, NULL, NULL, 15, 'i9IOq', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(93, 'test', 'test', 15, '', 1, '123', '123', 'H', 'JLafreniere', '$2y$10$vBulHhMjaxGDdktDJsgsPebUSsdaIzLnu4M1wbvLpwqJMCLOZfeHe', 0),
(94, NULL, NULL, 16, '13jVO', 0, NULL, NULL, NULL, NULL, NULL, 0),
(95, NULL, NULL, 16, '52xvE', 0, NULL, NULL, NULL, NULL, NULL, 0),
(96, NULL, NULL, 16, 'bja4m', 0, NULL, NULL, NULL, NULL, NULL, 0),
(97, NULL, NULL, 16, 'sz6oL', 0, NULL, NULL, NULL, NULL, NULL, 0),
(98, NULL, NULL, 16, '6x3EJ', 0, NULL, NULL, NULL, NULL, NULL, 0),
(99, NULL, NULL, 16, '6GNvg', 0, NULL, NULL, NULL, NULL, NULL, 0),
(100, '123', '123', 16, '', 1, '123@123.123', '123123123', 'H', 'jlafreniere', '$2y$10$R0laoALowGOrbOZKbduDM.8crYCTc6Skwmyq5MuOUNjWhlGxT5Jpy', 0),
(101, NULL, NULL, 16, 'bzrwe', 0, NULL, NULL, NULL, NULL, NULL, 0),
(102, NULL, NULL, 16, 'LZGxF', 0, NULL, NULL, NULL, NULL, NULL, 0),
(103, NULL, NULL, 16, 'Haqty', 0, NULL, NULL, NULL, NULL, NULL, 0),
(104, NULL, NULL, 0, 'chSoW', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(105, NULL, NULL, 0, 'khlYG', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(106, NULL, NULL, 0, 'oAZRX', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(107, NULL, NULL, 0, 'YJOah', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(108, NULL, NULL, 0, '3sRxP', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(109, NULL, NULL, 0, 'Qo95B', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(110, NULL, NULL, 0, 'uSV0R', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(111, NULL, NULL, 0, 'lVLVF', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(112, NULL, NULL, 0, 'yDy1M', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(113, NULL, NULL, 0, 'vaD0M', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(114, NULL, NULL, 0, 'mhoqa', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_activites`
--

CREATE TABLE `utilisateur_activites` (
  `ID_Eleve_Activite` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  `ID_Activite_Prevue` int(11) NOT NULL,
  `Present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur_activites`
--

INSERT INTO `utilisateur_activites` (`ID_Eleve_Activite`, `ID_Utilisateur`, `ID_Activite_Prevue`, `Present`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 1, 2, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`ID_Activite`);

--
-- Index pour la table `activites_prevues`
--
ALTER TABLE `activites_prevues`
  ADD PRIMARY KEY (`ID_activite_prevue`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`ID_Groupe`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`ID_Session`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateur_activites`
--
ALTER TABLE `utilisateur_activites`
  ADD PRIMARY KEY (`ID_Eleve_Activite`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `ID_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `activites_prevues`
--
ALTER TABLE `activites_prevues`
  MODIFY `ID_activite_prevue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `ID_Session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT pour la table `utilisateur_activites`
--
ALTER TABLE `utilisateur_activites`
  MODIFY `ID_Eleve_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
