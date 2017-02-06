-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Février 2017 à 16:30
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
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `ID_Eleve` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `ID_Groupe` int(11) NOT NULL,
  `Points_Debut_Session` int(11) NOT NULL,
  `Points_Fin_Session` int(11) NOT NULL,
  `Points_Bonus` int(11) NOT NULL,
  `CODE_ACCES` char(5) NOT NULL,
  `Actif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`ID_Eleve`, `Nom`, `Prenom`, `ID_Groupe`, `Points_Debut_Session`, `Points_Fin_Session`, `Points_Bonus`, `CODE_ACCES`, `Actif`) VALUES
(1, 'Ouelette', 'Vincent', 1, 0, 5, 4, '', 0),
(2, 'Frigon', 'Marc-Antoine', 1, 5, 5, 5, '', 0),
(3, 'Maurais', 'Lionel', 1, 4, 4, 0, '', 0),
(4, 'Senneville', 'Samuel', 2, 5, 0, 2, '', 0),
(5, 'Bellavance', 'Marc', 3, 1, 2, 4, '', 0);

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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`ID_Eleve`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `ID_Eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `ID_Prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
