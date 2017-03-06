-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Février 2017 à 01:38
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
  `couleur` char(6) NOT NULL,
  `hidden` tinyint(1) DEFAULT NULL,
  `Ponderation` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`ID_Activite`, `Nom_Activite`, `Duree`, `Commentaire`, `couleur`, `hidden`, `Ponderation`) VALUES
(1, 'Soccer', '120', 'Soccer equipes', '3152C3', 0, 6),
(2, 'Badminton', '50', 'Badminton 2v2', '3152C3', 0, 1.5);

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
  `ID_Activite` int(11) NOT NULL,
  `hidden` tinyint(1) DEFAULT NULL,
  `presences_prises` tinyint(1) NOT NULL,
  `responsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activites_prevues`
--

INSERT INTO `activites_prevues` (`ID_activite_prevue`, `Date_Activite`, `Heure_debut`, `Participants_Max`, `Frais`, `Endroit`, `ID_Activite`, `hidden`, `presences_prises`, `responsable`) VALUES
(1, '2017-01-31', '20:00:00', 10, 20, 'Parc st-sacrement', 1, NULL, 0, 6),
(2, '2017-02-28', '19:00:00', 10, 10, 'Gymnase sciences', 2, NULL, 0, 6),
(3, '2017-03-23', '09:00:00', 1, 0, 'Terrain municipal', 1, NULL, 1, 6);

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
(1, 'Groupe 1 Hiver 2017', 6, 1, 1);

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
(1, '2017-01-20', '2017-04-30', '2017-03-01', 'H2017'),
(4, '2017-05-01', '2017-06-30', '2017-05-17', 'H2017p');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
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
  `Type_Utilisateur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `ID_Groupe`, `CODE_ACCES`, `Actif`, `Courriel`, `Telephone`, `Sexe`, `username`, `password`, `administrateur`, `Type_Utilisateur`) VALUES
(6, 'Lafreniere', 'Jonathan', 6, '', 1, 'Jonathan.lafreniere@hotmail.com', '1231231234', 'H', 'Administrateur', '$2y$10$uO8R31N32qnesMkIcWt9LO15yGVCbvsWkgg2P9yNmHb3ZGCR1IRb6', 2, 'eleve'),
(289, 'René', 'Jean', 1, '', 1, 'Jr@jeanrene.com', '8193833333', 'H', 'Jean', '$2y$10$ddHtrpqnlopuBgRAdWR5oOO.Pn3KAXjJzjdky.wPfIso5K6gDGFeO', 0, 'eleve'),
(290, NULL, NULL, 1, 'hDFJ3', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(291, NULL, NULL, 1, 'NeMwL', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(292, NULL, NULL, 1, 'cySCX', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(293, NULL, NULL, 1, 'QLgo7', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(294, NULL, NULL, 1, 'Hih8U', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(295, NULL, NULL, 1, '0E4hp', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(296, NULL, NULL, 1, 'fBjYC', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(297, NULL, NULL, 1, 'ihfAt', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(298, NULL, NULL, 1, 'kr1CD', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL);

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
(6, 289, 1, 1),
(7, 289, 2, 1),
(8, 289, 3, 1);

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
  MODIFY `ID_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `activites_prevues`
--
ALTER TABLE `activites_prevues`
  MODIFY `ID_activite_prevue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `ID_Session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;
--
-- AUTO_INCREMENT pour la table `utilisateur_activites`
--
ALTER TABLE `utilisateur_activites`
  MODIFY `ID_Eleve_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
