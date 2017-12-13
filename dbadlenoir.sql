-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 déc. 2017 à 16:22
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbadlenoir`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `flux`
--

INSERT INTO `flux` (`id`, `name`, `link`) VALUES
(3, 'test', 'test'),
(4, 'test2', 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `guid` varchar(200) NOT NULL,
  `pubdate` datetime NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`title`, `description`, `link`, `guid`, `pubdate`, `category`) VALUES
('La Xbox 360 noire avec HDMI et disque dur 120 Go ?', 'Le 11 janvier dernier, une nouvelle rumeur concernant une possible &#171; nouvelle Xbox 360 &#187; am&#233;lior&#233;e &#224; vue le jour. Connue sous le nom de code &#171; Zephyr &#187;, cette Xbox de couleur noire pourrait inclure un [...]', 'http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html', 'http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html', '2007-02-12 13:01:28', 'Console'),
('test', 'test', 'test', 'test', '2017-11-29 23:38:00', 'test'),
('test1', 'test1', 'test1', 'test1', '2017-12-11 00:00:00', 'test1'),
('test2', 'test2', 'test2', 'test2', '2017-12-11 00:00:00', 'test2'),
('test3', 'test3', 'test3', 'test3', '2017-12-11 00:00:00', 'test3'),
('test4', 'test4', 'test4', 'test4', '2017-12-11 00:00:00', 'test4'),
('test5', 'test5', 'test5', 'test5', '2017-12-11 00:00:00', 'test5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
