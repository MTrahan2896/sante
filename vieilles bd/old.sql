-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Février 2017 à 22:14
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
DROP DATABASE bd_application;
CREATE DATABASE bd_application
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
  
  USE bd_application;

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
(7, 'Groupe 4', 1),
(8, 'Groupe 6', 1);

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
  `courriel` varchar(75) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `administrateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `ID_Groupe`, `CODE_ACCES`, `Actif`, `courriel`, `telephone`, `sexe`, `username`, `password`, `administrateur`) VALUES
(1, 'Duchemin', 'Marc', 1, '', 1, 'marcduchemin01@hotmail.com', '8197092941', 'H', 'Marc21', '$2y$10$TB1Co5g9P/c0iDANo1e9xuL2M15x5hlRrQvl/1pQnUV/r/wBtZWk6', 0),
(2, 'root', 'root', 1, '', 1, 'root', 'root', 'F', 'ROOT', '$2y$10$Ifd8gJmsRmCgmprq7UVv0uf/xzX4ZzTbH5ryLGbcaWuXP5UMFTJJ6', 1),
(3, 'BÃ©land', 'Martin', 1, '', 1, 'mbeland@yahoo.fr', '8194342865', 'H', 'MartinB01', '$2y$10$4HVjZ7zh.XKw/kEHITYgs.rQMkeH/us.E83qRNVuobGYOTpcJHn1i', 0),
(4, 'dsadasd', 'asdasd', 6, '', 1, '2121@21.com', '412564365', 'F', 'jean21', '$2y$10$gxWJu.KTUnKRGgZOKCXmiOK9ZEuXPC9XvXlZbAVDC4zwlirJDUVPq', 0),
(5, NULL, NULL, 6, 'mhYCe', NULL, NULL, NULL, NULL, NULL, NULL, 0),
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
(16, 'VingtEtUn', 'Bob', 7, '', 1, 'bobVingetUn@hotmail.com', '8193447658', 'H', 'Bob21', '$2y$10$Q6fmn.DCD5Uc2uPBVTv4ruznzZL/oRT5s55V5QnfMoUn46/PA8O2q', 0),
(17, '123', '123', 7, '', 1, '123', '123', 'F', 'test', '$2y$10$kEH.OWjh/AE164ChNfJcu.K.1dSgvPjDo4qy28rbGoqGe49D4lpmy', 0),
(18, 'NouveauJour123', 'NouveauJour123', 7, '', 1, '123NouveauJour123', '123123123', 'F', 'NouveauJour123', '$2y$10$x2rOkRfL.PWFgztj7J4t3eXw3CElK6USsf7qTve6IkSKw8GIMPnsy', 0),
(19, NULL, NULL, 7, 'xKCBI', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, NULL, NULL, 7, 'rWaMF', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, NULL, NULL, 1, 'oBj8e', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, NULL, NULL, 1, 'l0UKc', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, NULL, NULL, 1, 'Cspsz', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, NULL, NULL, 1, '45PAm', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, NULL, NULL, 1, 'FdyWT', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, NULL, NULL, 1, 'sxLkJ', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(27, NULL, NULL, 1, 'tuX2A', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(28, NULL, NULL, 1, 'I9KNM', NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
  MODIFY `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `utilisateur_activites`
--
ALTER TABLE `utilisateur_activites`
  MODIFY `ID_Eleve_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
