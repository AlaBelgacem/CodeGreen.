-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 nov. 2021 à 11:27
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `codegreen`
--

-- --------------------------------------------------------

--
-- Structure de la table `plastique`
--

CREATE TABLE `plastique` (
  `ID` int(255) NOT NULL,
  `ID_U` varchar(100) NOT NULL,
  `Quantity` float NOT NULL,
  `DateOfRecuperation` datetime NOT NULL,
  `Adress` text NOT NULL,
  `Note` text NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plastique`
--

INSERT INTO `plastique` (`ID`, `ID_U`, `Quantity`, `DateOfRecuperation`, `Adress`, `Note`, `Status`, `Points`) VALUES
(64, 'Essyl', 4, '2021-12-05 12:30:00', 'Ezzahra', 'Merci', 'Accepted', 40),
(65, 'Essyl', 1.5, '2021-12-08 15:35:00', 'Ezzahra', 'Merci', 'Declined', 15),
(66, 'Essyl', 0.6, '2021-11-23 20:30:00', '13 Rue Ahmed Khaireddine , Le Bardo', 'Merci', 'Pending', 6),
(67, 'Essyl', 3, '2021-12-08 19:15:00', 'Le Bardo', 'Rien', 'Pending', 30);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `plastique`
--
ALTER TABLE `plastique`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `plastique`
--
ALTER TABLE `plastique`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
