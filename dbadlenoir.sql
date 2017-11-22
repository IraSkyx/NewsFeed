-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 02:29 PM
-- Server version: 5.5.58-0+deb8u1-log
-- PHP Version: 7.0.25-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbadlenoir`
--

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `Title` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Link` varchar(200) NOT NULL,
  `Guid` varchar(200) NOT NULL,
  `PubDate` datetime NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`Title`, `Description`, `Link`, `Guid`, `PubDate`, `Category`) VALUES
('La Xbox 360 noire avec HDMI et disque dur 120 Go ?', 'Le 11 janvier dernier, une nouvelle rumeur concernant une possible &#171; nouvelle Xbox 360 &#187; am&#233;lior&#233;e &#224; vue le jour. Connue sous le nom de code &#171; Zephyr &#187;, cette Xbox de couleur noire pourrait inclure un [...]', 'http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html', 'http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html', '2007-02-12 13:01:28', 'Console');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`Guid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
