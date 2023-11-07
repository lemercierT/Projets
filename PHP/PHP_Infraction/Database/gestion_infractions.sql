-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 07 nov. 2023 à 18:05
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_infractions`
--

-- --------------------------------------------------------

--
-- Structure de la table `comprend`
--

CREATE TABLE `comprend` (
  `id_inf` int(6) NOT NULL,
  `id_delit` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `comprend`
--

INSERT INTO `comprend` (`id_inf`, `id_delit`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 3),
(4, 4),
(4, 5),
(5, 2),
(5, 4),
(6, 1),
(6, 2),
(6, 4),
(6, 6),
(7, 1),
(7, 2),
(7, 5),
(8, 1),
(8, 2),
(8, 6),
(9, 3),
(9, 6),
(11, 3),
(11, 5),
(12, 3),
(13, 2);

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `num_permis` varchar(20) NOT NULL,
  `date_permis` date NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`num_permis`, `date_permis`, `nom`, `prenom`, `mdp`) VALUES
('AZ67', '2011-02-01', 'AIRPACH', 'Fabrice', 'fab1234'),
('AZ69', '2011-02-01', 'CAVALLI', 'Frédéric', 'fredou57'),
('AZ71', '2017-02-02', 'MANGONI', 'Joseph', 'jojotucoco'),
('AZ81', '1997-04-09', 'GAUDE', 'David', 'cmoidavid'),
('AZ90', '2000-05-04', 'KIEFFER', 'Claudine', 'claudine57'),
('AZ92', '2001-04-06', 'THEOBALD', 'Pascal', 'cpascal'),
('AZ99', '2003-09-06', 'CAMARA', 'Souleymane', 'souley'),
('test', '2020-02-20', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `delit`
--

CREATE TABLE `delit` (
  `id_delit` int(4) NOT NULL,
  `nature` varchar(100) NOT NULL,
  `tarif` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `delit`
--

INSERT INTO `delit` (`id_delit`, `nature`, `tarif`) VALUES
(1, 'Excès de vitesse', 220),
(2, 'Outrage à agent', 450),
(3, 'Feu rouge grillé', 270),
(4, 'Conduite en état d\'ivresse', 380),
(5, 'Délit de fuite', 400),
(6, 'refus de priorité', 280);

-- --------------------------------------------------------

--
-- Structure de la table `infraction`
--

CREATE TABLE `infraction` (
  `id_inf` int(6) NOT NULL,
  `date_inf` date NOT NULL,
  `num_immat` varchar(50) NOT NULL,
  `num_permis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `infraction`
--

INSERT INTO `infraction` (`id_inf`, `date_inf`, `num_immat`, `num_permis`) VALUES
(1, '2021-09-02', 'CA409BG', 'AZ97'),
(2, '2021-09-04', 'BE456AD', 'AZ69'),
(3, '2021-09-04', 'AA643BB', 'AZ71'),
(4, '2021-09-06', 'BF823NG', 'AZ81'),
(5, '2021-09-08', '5432YZ88', 'AZ90'),
(6, '2021-09-11', 'AB308FG', 'AZ92'),
(7, '2021-09-08', 'AB308FG', ''),
(8, '2020-06-05', 'AA643BB', 'AZ67'),
(9, '2020-10-01', 'CA409BG', 'AZ92'),
(11, '2020-05-14', 'AA643BB', ''),
(12, '2021-12-02', 'AA643BB', 'AZ99'),
(13, '2021-08-11', 'AA643BB', 'AZ67');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `num_immat` varchar(20) NOT NULL,
  `date_immat` date NOT NULL,
  `modele` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `num_permis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`num_immat`, `date_immat`, `modele`, `marque`, `num_permis`) VALUES
('5432YZ88', '2011-08-15', 'C3', 'Citroën', 'AZ90'),
('AA643BB', '2016-01-07', 'Golf', 'Volkswagen', 'AZ71'),
('AB308FG', '2017-03-27', '309', 'Peugeot', 'AZ92'),
('BE456AD', '2018-07-10', 'Kangoo', 'Renault', 'AZ69'),
('BF823NG', '2018-09-10', 'C3', 'Citroën', 'AZ81'),
('CA409BG', '2019-03-21', 'T-Roc', 'Volkswagen', 'AZ67');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comprend`
--
ALTER TABLE `comprend`
  ADD PRIMARY KEY (`id_inf`,`id_delit`);

--
-- Index pour la table `delit`
--
ALTER TABLE `delit`
  ADD PRIMARY KEY (`id_delit`);

--
-- Index pour la table `infraction`
--
ALTER TABLE `infraction`
  ADD PRIMARY KEY (`id_inf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
