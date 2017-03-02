-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 02 Mars 2017 à 18:56
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
(1, 'Soccer intérieur', '50', 'Equipes 4 contre 4', '3152C3', 0, 1),
(2, 'Badminton', '50', 'Badminton en double', '3152C3', 0, 1),
(3, 'Badminton', '45', 'Badminton en simple', '980783', 0, 1),
(6, 'Soccer extérieur', '50', 'Equipe 7 contre 7', '48B492', 0, 1),
(7, 'Natation', '60', 'Nage libre', '1B7EBB', 0, 1);

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
(5, '2017-03-23', '18:30:00', 30, 0, 'Gymnase des sciences', 2, NULL, 0, 1),
(6, '2017-05-09', '18:30:00', 20, 0, 'Gymnase des humanités', 1, NULL, 0, 1),
(7, '2017-03-30', '18:30:00', 20, 0, 'Piscine des humanité', 7, NULL, 0, 1),
(8, '2017-03-15', '11:35:00', 20, 0, 'Gymnase des sciences', 3, 0, 0, 1),
(9, '2017-03-15', '11:35:00', 20, 0, 'Gymnase des sciences', 2, 0, 0, 1);

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
(1, 'Groupe 1 Hiver 2017', 1, 1, 1),
(6, 'Groupe 2 Hiver 2017', 1, 1, 3),
(7, 'Groupe 1 Automne 2017', 1, 4, 2),
(8, 'Groupe 2 Automne 2017', 1, 4, 3);

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
(1, '2017-01-20', '2017-05-19', '2017-03-13', 'Hiver 2017'),
(4, '2017-08-20', '2017-12-15', '2017-10-18', 'Automne 2017');

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
  `Type_Utilisateur` varchar(50) DEFAULT NULL,
  `Date_Inscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `ID_Groupe`, `CODE_ACCES`, `Actif`, `Courriel`, `Telephone`, `Sexe`, `username`, `password`, `administrateur`, `Type_Utilisateur`, `Date_Inscription`) VALUES
(1, 'Lafreniere', 'Jonathan', 0, '', 1, 'Jonathan.lafreniere@hotmail.com', '1231231234', 'H', 'Administrateur', '$2y$10$uO8R31N32qnesMkIcWt9LO15yGVCbvsWkgg2P9yNmHb3ZGCR1IRb6', 2, 'eleve', '2017-01-31'),
(306, 'Gagnon', 'Sarah', 1, '', 1, 'S.gagnon@hotmail.com', '', 'F', 'Sgagnon', '$2y$10$12jy3VtaNvvElcb9xbQpiOOn.mL2awfLccuRVvQ2ZHYswGxUwVqIW', 0, 'eleve', '2017-03-02'),
(307, 'Laberge', 'émily', 1, '', 1, 'Emimilab@live.ca', '', 'F', 'Elaberge', '$2y$10$bwlJJ4YJKoTeBN2.rx/dgOSd4BFgUG0i3Akx4mjRJ2ctEKmYin5Ri', 0, 'eleve', '2017-03-02'),
(308, 'Dubé', 'Catherine', 1, '', 1, 'Catoudub@hotmail.com', '', 'H', 'Cdub', '$2y$10$inkeuYzht6I1Y5Jk9miKx.h9wvvzDagGc16mUfB4pXjiZ.X8px5PC', 0, 'eleve', '2017-03-02'),
(309, NULL, NULL, 1, 'wk3eh', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(310, 'Bergeron', 'Vincent', 6, '', 1, 'Vberg21@hotmail.com', '', 'H', 'Vberg01', '$2y$10$zHSE7wxVJfxUWMsGWlnsG.v9jW0E/WKqTeR7ISMRrcTBqHDuugzfy', 0, 'eleve', '2017-03-02'),
(311, 'Rivest', 'Julien', 6, '', 1, 'Ju.riv919182@hotmail.com', '', 'H', 'Jujuriv', '$2y$10$l45vex0HAYztlmvm./6Q4uypnYggNu6FQDOTKX/ZX5US0kYX1XOCS', 0, 'eleve', '2017-03-02'),
(312, 'Morin', 'Mario', 6, '', 1, 'Mamo@live.ca', '', 'H', 'Mamo', '$2y$10$5iR.rIadyvUS4mW/S0m2n.z54x5bsoTiWuv692EE8FYvv9is7pm4y', 0, 'eleve', '2017-03-02'),
(313, 'Lavoie', 'Mélanie', 6, '', 1, 'Memelavoie@live.ca', '', 'F', 'Mlavoie21', '$2y$10$6i5.Z.rBjoH7y71cyBVWKeeG1dyLg2JEhl05TZ1gDuWIDmofMtXuK', 0, 'eleve', '2017-03-02'),
(314, NULL, NULL, 6, 'FpiCa', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(315, NULL, NULL, 6, 'sZBb5', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(316, NULL, NULL, 6, '3DHpr', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(317, NULL, NULL, 6, 'WudND', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(318, NULL, NULL, 6, 'iNXUr', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(319, NULL, NULL, 6, 'at9F3', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(320, NULL, NULL, 6, 'bXAwF', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(321, 'Lacoursière', 'Marie', 0, '', 1, 'Mlacourse@hotmail.com', '', 'F', 'Mlacoursiere', '$2y$10$gyX2c/1RR/1M6iDwFuM/Xeax.nxcqpMNwGC5.bRVtTIXrmBEgOJ8K', 0, 'eleve', '2017-03-02'),
(322, NULL, NULL, 0, 'FvULY', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(323, NULL, NULL, 0, '2E2Nm', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(324, 'Ouellet', 'Vincent', 7, '', 1, 'Vincouell@live.ca', '', 'H', 'Vincou', '$2y$10$b8.gHT4uchKffZFh96T74ugwoBW2uNR9zeQYx/ERtCFYhvla5rFpa', 0, 'eleve', '2017-03-02'),
(325, 'Paquette', 'Stephane', 7, '', 1, 'Steph.paq@hotmail.com', '', 'H', 'Stepanopaq', '$2y$10$du6OEzAG9XAEKT9uqLwcHuDhiFJbFcML8umxPnG7TlbwowGaBItaW', 0, 'eleve', '2017-03-02'),
(326, NULL, NULL, 7, 'oxpEr', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(327, 'Beaulieu', 'émilie', 7, '', 1, 'Chsebeaulieu@hotmail.com', '', 'F', 'Emilbeulieu', '$2y$10$EFw5tHNkL4JBQnc.YYEISO/hNXEqIg.Pz13eNwOZhR25RX6y0sHEa', 0, 'eleve', '2017-03-02'),
(328, NULL, NULL, 7, 'dolwy', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(329, NULL, NULL, 8, 'l8mc3', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(330, 'Brousseau', 'Simon', 8, '', 1, 'Simonobroubrou@live.ca', '', 'H', 'Sbrousseau02', '$2y$10$RUp20UlS.7oSN7O16n6RU.l7ZsTpidRimLY0QJS73.vd2yew7yIRq', 0, 'eleve', '2017-03-02'),
(331, 'Labranche', 'Camille', 8, '', 1, 'Camzielabrance@live.ca', '', 'F', 'Clabranche', '$2y$10$X5QlmplUJVrjmcHZXylZ0.c4OyI0CbDETLv.mggToZUox6VVsyvZ.', 0, 'eleve', '2017-03-02'),
(332, NULL, NULL, 8, 'lrJe4', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(333, NULL, NULL, 8, 'akjoh', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL);

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
  MODIFY `ID_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `activites_prevues`
--
ALTER TABLE `activites_prevues`
  MODIFY `ID_activite_prevue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `ID_Groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `ID_Session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;
--
-- AUTO_INCREMENT pour la table `utilisateur_activites`
--
ALTER TABLE `utilisateur_activites`
  MODIFY `ID_Eleve_Activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
