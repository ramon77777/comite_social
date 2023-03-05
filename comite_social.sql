-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 juin 2022 à 12:57
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comite_social`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `nom_s` varchar(50) NOT NULL,
  `prenom_s` varchar(100) NOT NULL,
  `contact_s` varchar(11) NOT NULL,
  `residence_s` varchar(100) NOT NULL,
  `numero_b` varchar(100) NOT NULL,
  `nom_b` varchar(50) NOT NULL,
  `prenom_b` varchar(100) NOT NULL,
  `lieu_naissance_b` varchar(100) NOT NULL,
  `date_naissance_b` date NOT NULL,
  `lieu_residence_b` varchar(100) NOT NULL,
  `date_inscription_b` date NOT NULL,
  `date_charge_b` date NOT NULL,
  `contact1` varchar(10) NOT NULL,
  `personne1` varchar(150) DEFAULT NULL,
  `personne2` varchar(150) DEFAULT NULL,
  `personne3` varchar(150) DEFAULT NULL,
  `c1` varchar(10) DEFAULT NULL,
  `c2` varchar(10) DEFAULT NULL,
  `c3` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id`, `nom_s`, `prenom_s`, `contact_s`, `residence_s`, `numero_b`, `nom_b`, `prenom_b`, `lieu_naissance_b`, `date_naissance_b`, `lieu_residence_b`, `date_inscription_b`, `date_charge_b`, `contact1`, `personne1`, `personne2`, `personne3`, `c1`, `c2`, `c3`) VALUES
(35, 'Koffi', 'konan', '0747875652', 'adzopé', '147', 'yao ', 'grace', 'adzope', '1999-05-12', 'abidjan', '2022-05-09', '2022-05-09', '0102020304', 'kone yaou', 'trgsg vsvv', 'hdhd dbd', '0102030405', '0504030600', '0102030405'),
(37, 'oko', 'ok', '7777777777', 'k', '54', 'fj', 'kk', 'kk', '1958-12-01', 'f', '1289-02-10', '2022-02-01', '5555555555', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `user`, `mot_de_passe`) VALUES
(11, 'ramon', '1234'),
(15, 'coseeadac', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `cotisationa`
--

CREATE TABLE `cotisationa` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `cotisation_annuelle` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cotisationa`
--

INSERT INTO `cotisationa` (`id`, `nom`, `prenom`, `date`, `cotisation_annuelle`) VALUES
(36, 'Koffi', 'konan', '2022-05-09', 10000),
(38, 'oko', 'ok', '2022-05-12', 15000);

-- --------------------------------------------------------

--
-- Structure de la table `cotisation_mensuelle`
--

CREATE TABLE `cotisation_mensuelle` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `montant` int(11) NOT NULL,
  `titre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cotisation_mensuelle`
--

INSERT INTO `cotisation_mensuelle` (`id`, `nom`, `prenom`, `date`, `montant`, `titre`) VALUES
(4, 'Koffi', 'konan', '2022-05-09', 1500, 'décès de x');

-- --------------------------------------------------------

--
-- Structure de la table `droit_inscription`
--

CREATE TABLE `droit_inscription` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `droit_inscription` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droit_inscription`
--

INSERT INTO `droit_inscription` (`id`, `nom`, `prenom`, `date`, `droit_inscription`) VALUES
(30, 'oko', 'ok', '2022-05-12', 5000),
(28, 'Koffi', 'konan', '2022-05-09', 1700);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cotisationa`
--
ALTER TABLE `cotisationa`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cotisation_mensuelle`
--
ALTER TABLE `cotisation_mensuelle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droit_inscription`
--
ALTER TABLE `droit_inscription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `cotisationa`
--
ALTER TABLE `cotisationa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `cotisation_mensuelle`
--
ALTER TABLE `cotisation_mensuelle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `droit_inscription`
--
ALTER TABLE `droit_inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
