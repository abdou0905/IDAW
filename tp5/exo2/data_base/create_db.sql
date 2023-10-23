-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 oct. 2023 à 12:40
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbtest`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'adele', 'adele.patarot@gmail.com'),
(2, 'toto', 'toto@imt.fr'),
(3, 'anna', 'anna@orange.fr'),
(4, 'mickey', 'mimi@disney.fr'),
(5, 'adele', 'adele.patarot@gmail.com'),
(6, 'toto', 'toto@imt.fr'),
(7, 'anna', 'anna@orange.fr'),
(8, 'mickey', 'mimi@disney.fr'),
(9, 'adele', 'adele.patarot@gmail.com'),
(10, 'toto', 'toto@imt.fr'),
(11, 'anna', 'anna@orange.fr'),
(12, 'mickey', 'mimi@disney.fr'),
(13, 'adele', 'adele.patarot@gmail.com'),
(14, 'toto', 'toto@imt.fr'),
(15, 'anna', 'anna@orange.fr'),
(16, 'mickey', 'mimi@disney.fr'),
(17, 'adele', 'adele.patarot@gmail.com'),
(18, 'toto', 'toto@imt.fr'),
(19, 'anna', 'anna@orange.fr'),
(20, 'mickey', 'mimi@disney.fr'),
(21, 'adele', 'adele.patarot@gmail.com'),
(22, 'toto', 'toto@imt.fr'),
(23, 'anna', 'anna@orange.fr'),
(24, 'mickey', 'mimi@disney.fr'),
(25, 'adele', 'adele.patarot@gmail.com'),
(26, 'toto', 'toto@imt.fr'),
(27, 'anna', 'anna@orange.fr'),
(28, 'mickey', 'mimi@disney.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
