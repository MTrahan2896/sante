-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2017 at 03:21 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defi_sante`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `id_activite` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `point` double NOT NULL,
  `frais` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`id_activite`, `nom`, `point`, `frais`) VALUES
(1, 'badminton', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `activite_planifie`
--

CREATE TABLE `activite_planifie` (
  `id_activite_planif` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  `date` date NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `participant_max` int(11) NOT NULL,
  `endroit` varchar(25) NOT NULL,
  `Responsable` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blessure_utilisateur`
--

CREATE TABLE `blessure_utilisateur` (
  `id_blessure_utilisateur` int(11) NOT NULL,
  `blessure` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `nom_groupe` varchar(50) NOT NULL,
  `responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupe_utilisateur`
--

CREATE TABLE `groupe_utilisateur` (
  `id_groupe` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `probleme_sante`
--

CREATE TABLE `probleme_sante` (
  `id_probleme_sante` int(11) NOT NULL,
  `nom_probleme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sante_utilisateur`
--

CREATE TABLE `sante_utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `id_probleme_sante` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `medicament` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statut_activite`
--

CREATE TABLE `statut_activite` (
  `id_statut` int(11) NOT NULL,
  `titre_statut` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statut_utilisateur`
--

CREATE TABLE `statut_utilisateur` (
  `id_statut_utilisateur` int(11) NOT NULL,
  `titre_statut` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(25) NOT NULL,
  `mot de passe` varchar(25) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `type_utilisateur` int(11) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `telephone` char(14) NOT NULL,
  `sexe` char(1) NOT NULL,
  `personne_ressource` varchar(100) NOT NULL,
  `lien` varchar(50) NOT NULL,
  `telephone_ressource` char(14) NOT NULL,
  `handicap_physique` varchar(255) NOT NULL,
  `code_access` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_activite`
--

CREATE TABLE `utilisateur_activite` (
  `id_activite_planif` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id_activite`);

--
-- Indexes for table `activite_planifie`
--
ALTER TABLE `activite_planifie`
  ADD PRIMARY KEY (`id_activite_planif`),
  ADD KEY `fk_activite_Planif` (`id_activite`),
  ADD KEY `fk_responsable_activite` (`Responsable`),
  ADD KEY `fk_statut_activite` (`statut`);

--
-- Indexes for table `blessure_utilisateur`
--
ALTER TABLE `blessure_utilisateur`
  ADD PRIMARY KEY (`id_blessure_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`),
  ADD KEY `fk_groupe_responsable` (`responsable`);

--
-- Indexes for table `groupe_utilisateur`
--
ALTER TABLE `groupe_utilisateur`
  ADD PRIMARY KEY (`id_groupe`,`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `probleme_sante`
--
ALTER TABLE `probleme_sante`
  ADD PRIMARY KEY (`id_probleme_sante`);

--
-- Indexes for table `sante_utilisateur`
--
ALTER TABLE `sante_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`,`id_probleme_sante`),
  ADD KEY `id_probleme_sante` (`id_probleme_sante`);

--
-- Indexes for table `statut_activite`
--
ALTER TABLE `statut_activite`
  ADD PRIMARY KEY (`id_statut`);

--
-- Indexes for table `statut_utilisateur`
--
ALTER TABLE `statut_utilisateur`
  ADD PRIMARY KEY (`id_statut_utilisateur`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `type_utilisateur` (`type_utilisateur`);

--
-- Indexes for table `utilisateur_activite`
--
ALTER TABLE `utilisateur_activite`
  ADD PRIMARY KEY (`id_activite_planif`,`id_utilisateur`),
  ADD KEY `fk_statut_user_activite` (`id_statut`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activite_planifie`
--
ALTER TABLE `activite_planifie`
  MODIFY `id_activite_planif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blessure_utilisateur`
--
ALTER TABLE `blessure_utilisateur`
  MODIFY `id_blessure_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `probleme_sante`
--
ALTER TABLE `probleme_sante`
  MODIFY `id_probleme_sante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statut_activite`
--
ALTER TABLE `statut_activite`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statut_utilisateur`
--
ALTER TABLE `statut_utilisateur`
  MODIFY `id_statut_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activite_planifie`
--
ALTER TABLE `activite_planifie`
  ADD CONSTRAINT `activite_planifie_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `activite_planifie_ibfk_2` FOREIGN KEY (`Responsable`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `activite_planifie_ibfk_3` FOREIGN KEY (`statut`) REFERENCES `statut_activite` (`id_statut`);

--
-- Constraints for table `blessure_utilisateur`
--
ALTER TABLE `blessure_utilisateur`
  ADD CONSTRAINT `blessure_utilisateur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `groupe_utilisateur`
--
ALTER TABLE `groupe_utilisateur`
  ADD CONSTRAINT `groupe_utilisateur_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`),
  ADD CONSTRAINT `groupe_utilisateur_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Constraints for table `sante_utilisateur`
--
ALTER TABLE `sante_utilisateur`
  ADD CONSTRAINT `sante_utilisateur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `sante_utilisateur_ibfk_2` FOREIGN KEY (`id_probleme_sante`) REFERENCES `probleme_sante` (`id_probleme_sante`);

--
-- Constraints for table `utilisateur_activite`
--
ALTER TABLE `utilisateur_activite`
  ADD CONSTRAINT `utilisateur_activite_ibfk_1` FOREIGN KEY (`id_activite_planif`) REFERENCES `activite_planifie` (`id_activite_planif`),
  ADD CONSTRAINT `utilisateur_activite_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `utilisateur_activite_ibfk_3` FOREIGN KEY (`id_statut`) REFERENCES `statut_utilisateur` (`id_statut_utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
