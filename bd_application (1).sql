-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Février 2017 à 20:13
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
(1, 'test', '23', '23', 23, ''),
(2, 'test2', '32', '43', 43, '');

-- --------------------------------------------------------

--
-- Structure de la table `activite_prevue`
--

CREATE TABLE `activite_prevue` (
  `ID_activite_prevue` int(11) NOT NULL,
  `Date_Activite` datetime NOT NULL,
  `Participants_Max` int(11) NOT NULL,
  `Frais` double NOT NULL,
  `Endroit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `ID_Groupe` int(11) NOT NULL,
  `Nom_Groupe` varchar(65) NOT NULL,
  `ID_Prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`ID_Groupe`, `Nom_Groupe`, `ID_Prof`) VALUES
(1, 'Groupe 1', 1),
(2, 'Groupe 2', 1),
(3, 'Groupe 3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `Nom` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Prenom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ID_Groupe` int(11) NOT NULL,
  `CODE_ACCES` char(5) CHARACTER SET latin1 DEFAULT NULL,
  `Actif` tinyint(1) DEFAULT '0',
  `courriel` varchar(75) CHARACTER SET latin1 DEFAULT NULL,
  `telephone` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `sexe` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `ID_Groupe`, `CODE_ACCES`, `Actif`, `courriel`, `telephone`, `sexe`, `username`, `password`) VALUES
(1, 'Ouelette', 'Vincent', 1, '', 0, '', '', '', 'noot', '$2y$10$VWcSuI0TjO0QN5Tj4phLtOLXrHJ/.1m4kAujY8DS3zJ1ViqKsB0cW'),
(2, 'Frigon', 'Marc-Antoine', 1, '', 0, '', '', '', '', ''),
(3, 'Maurais', 'Lionel', 1, '', 0, '', '', '', '', ''),
(4, 'Senneville', 'Samuel', 2, '', 0, '', '', '', '', ''),
(5, 'Bellavance', 'Marc', 3, '', 0, '', '', '', '', ''),
(6, NULL, NULL, 2, 'BASiS', NULL, '', '', '', '', ''),
(7, 'ParÉ', 'MarieP', 2, '', 1, 'mariepare@liveleak.com', '8193832896', 'F', 'MarieP', '$2y$10$WIswmAB0b.Y48kJUhRgKg.SsTJD6bJjBBoDCd7fYOZCKQ.cG/SP0S'),
(8, NULL, NULL, 2, 'DSHdG', NULL, '', '', '', '', ''),
(9, NULL, NULL, 2, 'HfkYC', NULL, '', '', '', '', ''),
(10, NULL, NULL, 2, 'Wb2jy', NULL, '', '', '', '', ''),
(11, 'ParÃ©', 'MarieP', 2, '', 1, 'mariepare@liveleak.com', '8193832896', 'F', 'MarieP', '$2y$10$vTdp0AwMHxxIa7DbEdE4W.oCTsn/RGcf0oK2aow7.YeYiXDcWY2US'),
(12, NULL, NULL, 2, 'RFXbR', NULL, '', '', '', '', ''),
(13, 'tr', 'rt', 1, '', 1, 'tr', 'nr', 'F', 'rt', '$2y$10$JCtQteqGz03.KATdwFwQ0uOgo0T0/9c0c5BiB.5mEsNrp4GnqVzDC'),
(14, 'ttt', 'ttttt', 1, '', 1, 'ttt', 'ttt', 'F', 'ttttt', '$2y$10$MQfINYkZjUR1wif6vxBKW.slKUMO5k9Sm03jclxe1g9dlwjqExPgq'),
(15, 'trÃ©Ã©Ã©Ã©', 'rt', 1, '', 1, 'trÃ©Ã©Ã©', 'nrÃ©Ã©', 'F', 'rt', '$2y$10$cJYQsXJydJvg5s0Uoou.LO/0kqIe/2VPjFE6FpRMhRKK6hr5brZ..'),
(16, NULL, NULL, 1, 'l0Tfg', NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, 1, 'UkxZI', NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, 1, '4Tgyt', NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, 1, 'dDIyn', NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, 1, 'Fndky', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'trÃ©Ã©Ã©Ã©', 'rt', 1, '', 1, 'trÃ©Ã©Ã©', 'nrÃ©Ã©', 'F', 'rt', '$2y$10$sIdCt8ZVN5qthYFJKxvH8OF5Bx0FkuopRqeTwv1/rJRLhoMZwu2Ju'),
(22, NULL, NULL, 1, '9jvFo', NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, 1, 'sEBOt', NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, 1, 'csF1O', NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, 1, '4Duth', NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, 1, '474Xo', NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, 1, 'waTxQ', NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, 1, 'T9RkU', NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, 1, 'eJBuD', NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, 1, 'EhVtW', NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, 1, 'KQkuv', NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, 1, 'Si9p6', NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, 1, 'XcdJW', NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, 1, 'TtUI0', NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, 1, 'IRpaz', NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, NULL, 1, 'pTAuV', NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, NULL, 1, 'RWRun', NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, 1, 'O0wrk', NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, 1, '1ueL3', NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, 1, 'Febjh', NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, 1, 'ZOt3w', NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, 1, 'HON9Z', NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, 1, 'URHew', NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, 1, '3LYfI', NULL, NULL, NULL, NULL, NULL, NULL),
(45, NULL, NULL, 1, 'nKJp5', NULL, NULL, NULL, NULL, NULL, NULL),
(46, NULL, NULL, 1, 'BqY9R', NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, NULL, 1, 'o5wKX', NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, NULL, 1, 'Y2tBA', NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, NULL, 1, 'Q9tsD', NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, NULL, 1, 'peNhO', NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, 1, 'yscBK', NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, 1, 'Df5st', NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, 1, 'v0wn1', NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, 1, 'XTnL5', NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, NULL, 1, '0XxLm', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_activites`
--

CREATE TABLE `utilisateur_activites` (
  `ID_Eleve_Activite` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  `ID_Activite` int(11) NOT NULL,
  `Present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur_activites`
--

INSERT INTO `utilisateur_activites` (`ID_Eleve_Activite`, `ID_Utilisateur`, `ID_Activite`, `Present`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`ID_Activite`);

--
-- Index pour la table `activite_prevue`
--
ALTER TABLE `activite_prevue`
  ADD PRIMARY KEY (`ID_activite_prevue`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`ID_Groupe`);

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
  MODIFY `ID_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `activite_prevue`
--
ALTER TABLE `activite_prevue`
  MODIFY `ID_activite_prevue` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `utilisateur_activites`
--
ALTER TABLE `utilisateur_activites`
  MODIFY `ID_Eleve_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
