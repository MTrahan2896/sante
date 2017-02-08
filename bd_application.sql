-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Février 2017 à 00:27
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
  `Date_Debut` date NOT NULL,
  `Duree` varchar(30) NOT NULL,
  `Commentaire` text NOT NULL,
  `Participants_Max` int(11) NOT NULL,
  `Ponderation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`ID_Activite`, `Nom_Activite`, `Date_Debut`, `Duree`, `Commentaire`, `Participants_Max`, `Ponderation`) VALUES
(1, 'test', '2017-02-15', '23', '23', 23, 23),
(2, 'test2', '2017-02-17', '32', '43', 43, 43);

-- --------------------------------------------------------

--
-- Structure de la table `eleves_activites`
--

CREATE TABLE `eleves_activites` (
  `ID_Eleve_Activite` int(11) NOT NULL,
  `ID_Eleve` int(11) NOT NULL,
  `ID_Activite` int(11) NOT NULL,
  `Present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eleves_activites`
--

INSERT INTO `eleves_activites` (`ID_Eleve_Activite`, `ID_Eleve`, `ID_Activite`, `Present`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);

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
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `ID_Prof` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeurs`
--

INSERT INTO `professeurs` (`ID_Prof`, `Nom`, `Prenom`) VALUES
(1, 'Sylvie', 'Paré'),
(2, 'André', 'Villeneuve');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_Eleve` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `ID_Groupe` int(11) NOT NULL,
  `CODE_ACCES` char(5) DEFAULT NULL,
  `Actif` tinyint(1) DEFAULT '0',
  `courriel` varchar(75) NOT NULL,
  `telephone` char(10) NOT NULL,
  `sexe` char(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_Eleve`, `Nom`, `Prenom`, `ID_Groupe`, `CODE_ACCES`, `Actif`, `courriel`, `telephone`, `sexe`, `username`, `password`) VALUES
(1, 'Ouelette', 'Vincent', 1, '', 0, '', '', '', '', ''),
(2, 'Frigon', 'Marc-Antoine', 1, '', 0, '', '', '', '', ''),
(3, 'Maurais', 'Lionel', 1, '', 0, '', '', '', '', ''),
(4, 'Senneville', 'Samuel', 2, '', 0, '', '', '', '', ''),
(5, 'Bellavance', 'Marc', 3, '', 0, '', '', '', '', ''),
(6, NULL, NULL, 2, 'BASiS', NULL, '', '', '', '', ''),
(7, NULL, NULL, 2, 'Q5GQs', NULL, '', '', '', '', ''),
(8, NULL, NULL, 2, 'DSHdG', NULL, '', '', '', '', ''),
(9, NULL, NULL, 2, 'HfkYC', NULL, '', '', '', '', ''),
(10, NULL, NULL, 2, 'Wb2jy', NULL, '', '', '', '', ''),
(11, NULL, NULL, 2, 'BFFTz', NULL, '', '', '', '', ''),
(12, NULL, NULL, 2, 'RFXbR', NULL, '', '', '', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`ID_Activite`);

--
-- Index pour la table `eleves_activites`
--
ALTER TABLE `eleves_activites`
  ADD PRIMARY KEY (`ID_Eleve_Activite`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`ID_Groupe`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`ID_Prof`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_Eleve`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `ID_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `eleves_activites`
--
ALTER TABLE `eleves_activites`
  MODIFY `ID_Eleve_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `ID_Prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_Eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
