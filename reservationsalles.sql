-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 déc. 2019 à 23:54
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationsalles`
--
CREATE DATABASE IF NOT EXISTS `reservationsalles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reservationsalles`;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(20, 'Paintball Anniversaire', 'moh', '2019-12-30 09:00:00', '2019-12-30 10:00:00', 5),
(21, 'Paintball en Famille', 'admin', '2019-12-31 08:00:00', '2019-12-31 09:00:00', 1),
(18, 'Paintball EVG', 'dodo', '2019-12-20 08:00:00', '2019-12-20 09:00:00', 3),
(19, 'Paintball Adulte', 'koko', '2019-12-23 12:00:00', '2019-12-23 13:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$12$yVx17MTPkbi4QCNmmw9J/esjkw4TY32kng684FTfDaODlN1iqaGfe'),
(3, 'momo', '$2y$12$1H6wPFafBjbvUk14Qp5tHOj/rHy/0gp6LZfveSiD29klhJMLxpATm'),
(4, 'kiki', '$2y$12$WP30kKLNnShyvgz3QanaCOkL0ApCiOEKk5.DN7uj4rZlyB4FKlm4y'),
(5, 'Mohamed', '$2y$12$tOwjya8NTaB.ukweyiMAcu5z7HT0NlVlrRK7tQkYfxMUaq77Nn9kO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
