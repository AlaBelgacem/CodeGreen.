-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 nov. 2021 à 19:37
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `IdArticle` int(10) NOT NULL,
  `IdCategorie` int(10) NOT NULL,
  `NomArticle` varchar(150) NOT NULL,
  `ImageArticle` varchar(200) NOT NULL,
  `DescriptionArticle` varchar(200) NOT NULL,
  `PrixArticle` float NOT NULL,
  `QuantiteArticle` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`IdArticle`, `IdCategorie`, `NomArticle`, `ImageArticle`, `DescriptionArticle`, `PrixArticle`, `QuantiteArticle`) VALUES
(13, 1, 'Bambo toothbrushes', 'bambotoothbrush.jpg', 'oral health', 25, 6),
(14, 1, 'Soap bar', 'Soap.jpg', 'zero waste soap bar', 12, 7),
(15, 2, 'Cat basket', 'catbasket.jpg', 'cozy cat home', 50, 13),
(16, 2, 'Napkins', 'napkins.jpg', 'Our table napkins set', 20, 12),
(17, 2, 'Potscrubber', 'potscrubber.jpg', 'For clean dishes', 46, 20),
(18, 3, 'Black totebag', 'totebag.jpg', 'Our basic totebag', 12, 10),
(19, 3, 'Couffin', 'couffin.jpg', 'Traditional Tunisian couffin', 48, 7),
(20, 3, 'French shopping bag', 'frenchshoppingbag.jpg', 'Our stylish shopping bag', 18, 5),
(21, 2, 'lipbalm', 'lipbalm.jpg', 'desc', 15, 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`IdArticle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `IdArticle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
