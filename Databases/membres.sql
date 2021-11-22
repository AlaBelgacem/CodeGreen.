-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 nov. 2021 à 09:39
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compte`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(200) NOT NULL,
  `Last_Name` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  `Region` varchar(200) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Zip_Code` int(11) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `First_Name`, `Last_Name`, `phone`, `Email`, `Pass`, `Region`, `City`, `Zip_Code`, `role`) VALUES
(2, 'Susane', 'Meyer', 26441812, 'susan.meyer@esprit.tn', '$2y$10$diG3jaLOvckdkCfT9qq28e2djZ2zpstd/92K/arOCkFNBqaT.zCx6', 'Tunis', 'Menzah', 2056, 'admin'),
(3, 'Donald', 'test', 96258147, 'donaldmaziechi@esprit.tn', '$2y$10$Zd7wq5fHdwinWqTIQTaU..W8XNfLAeYqsmwj0EFkbhX1WCiSLtgNu', 'Gafsa', 'gafsa', 1087, 'client'),
(4, 'Gabby', 'Solice', 21456812, 'Gabby.solice@gmail.com', '$2y$10$VBDT7ZysKSZt0tiPFC1FYe8pnr/PexdRyWZy397OqqOconTOXKYYm', 'Gasserine', 'sbietla', 4022, 'client'),
(5, 'Marilyn', 'Monroe', 58691429, 'Marilynmonroe@yahoo.fr', '$2y$10$vD0uFpnh1MBv5ww1Q/wltukM5y3VvZ6t34CwzkM3Z8HB/IdAkCVu2', 'Tunis', 'Ennasr', 1058, 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
