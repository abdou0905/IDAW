-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 nov. 2023 à 22:29
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
-- Base de données : `imangermieux`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliments`
--

-- DROP TABLE IF EXISTS `aliments`; 
CREATE TABLE IF NOT EXISTS `aliments` (
  `id_aliment` int NOT NULL AUTO_INCREMENT,
  `designation` varchar(30) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `calories` decimal(10,1) NOT NULL,
  `proteine` decimal(10,1) NOT NULL,
  `glucide` decimal(10,1) NOT NULL,
  `lipide` decimal(10,1) NOT NULL,
  `sel` decimal(10,1) NOT NULL,
  `sucre` decimal(10,1) NOT NULL,
  PRIMARY KEY (`id_aliment`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `aliments`
--

INSERT INTO `aliments` (`designation`, `categorie`, `calories`, `proteine`, `glucide`, `lipide`, `sel`, `sucre`) VALUES
('pomme', 'legume', '10.0', '1.0', '1.0', '1.0', '1.0', '1.0'),
('carotte', 'legume', '41.0', '0.9', '10.1', '0.2', '0.5', '4.7'),
('brocoli', 'legume', '34.0', '2.8', '7.0', '0.4', '0.7', '1.7'),
('tomate', 'legume', '18.0', '0.9', '3.9', '0.2', '0.0', '2.6'),
('epinard', 'legume', '23.0', '2.9', '3.6', '0.4', '0.8', '0.4'),
('poivron', 'legume', '31.0', '1.3', '6.0', '0.3', '0.0', '3.3'),
('pomme de terre', 'legume', '77.0', '2.0', '17.5', '0.2', '0.0', '0.8'),
('courgette', 'legume', '17.0', '1.2', '3.1', '0.3', '0.0', '1.7'),
('chou-fleur', 'legume', '25.0', '1.9', '4.9', '0.3', '0.3', '1.9'),
('aubergine', 'legume', '25.0', '1.0', '6.0', '0.2', '0.0', '2.3'),
('haricot vert', 'legume', '31.0', '1.8', '6.9', '0.2', '0.0', '2.4'),
('concombre', 'legume', '15.0', '0.6', '3.6', '0.2', '0.0', '1.8'),
('radis', 'legume', '16.0', '0.7', '3.4', '0.2', '0.0', '1.9'),
('celeri', 'legume', '16.0', '0.7', '3.4', '0.2', '0.1', '1.3'),
('oignon', 'legume', '40.0', '1.1', '9.3', '0.1', '0.0', '4.2'),
('courge butternut', 'legume', '45.0', '1.0', '12.4', '0.1', '0.0', '2.2'),
('pomme', 'fruit', '52.0', '0.3', '14.0', '0.2', '0.0', '10.4'),
('banane', 'fruit', '89.0', '1.1', '22.0', '0.3', '0.0', '12.2'),
('fraise', 'fruit', '32.0', '0.7', '7.7', '0.3', '0.0', '4.9'),
('orange', 'fruit', '43.0', '1.0', '8.2', '0.2', '0.0', '8.2'),
('kiwi', 'fruit', '61.0', '1.1', '14.9', '0.5', '0.0', '9.2'),
('ananas', 'fruit', '50.0', '0.5', '13.1', '0.2', '0.0', '9.9'),
('cerise', 'fruit', '50.0', '1.0', '11.3', '0.4', '0.0', '8.5'),
('raisin', 'fruit', '69.0', '0.7', '18.0', '0.2', '0.0', '16.2'),
('poire', 'fruit', '57.0', '0.4', '15.5', '0.1', '0.0', '9.2'),
('abricot', 'fruit', '43.0', '1.0', '9.0', '0.4', '0.0', '9.0'),
('pamplemousse', 'fruit', '32.0', '0.6', '6.7', '0.2', '0.0', '6.2'),
('framboise', 'fruit', '52.0', '1.5', '9.7', '0.7', '0.0', '4.4'),
('mangue', 'fruit', '60.0', '0.8', '14.0', '0.6', '0.0', '14.3'),
('peche', 'fruit', '39.0', '0.9', '9.5', '0.3', '0.0', '8.2'),
('grenade', 'fruit', '83.0', '1.7', '18.0', '0.7', '0.0', '9.2'),
('riz', 'feculent', '130.0', '2.7', '28.7', '0.3', '0.0', '0.1'),
('pates', 'feculent', '131.0', '5.2', '25.4', '1.1', '0.0', '0.4'),
('pain', 'feculent', '265.0', '8.4', '49.5', '2.9', '0.8', '3.7'),
('patate douce', 'feculent', '86.0', '1.6', '20.1', '0.1', '0.0', '4.2'),
('quinoa', 'feculent', '120.0', '4.1', '21.3', '1.9', '0.0', '1.5'),
('pomme de terre', 'feculent', '77.0', '2.0', '17.5', '0.2', '0.0', '0.8'),
('mais', 'feculent', '86.0', '3.2', '19.0', '1.3', '0.0', '3.2'),
('couscous', 'feculent', '112.0', '3.8', '23.2', '0.2', '0.0', '0.1'),
('ble', 'feculent', '329.0', '12.6', '68.0', '1.7', '0.0', '2.0'),
('pomme de terre', 'feculent', '77.0', '2.0', '17.5', '0.2', '0.0', '0.8'),
('haricot rouge', 'feculent', '333.0', '7.3', '63.7', '0.6', '0.0', '2.6'),
('patate douce', 'feculent', '86.0', '1.6', '20.1', '0.1', '0.0', '4.2'),
('pois chiche', 'feculent', '164.0', '8.9', '27.4', '2.6', '0.0', '4.8'),
('avoine', 'feculent', '389.0', '16.9', '66.3', '6.9', '0.0', '0.2'),
('sarrasin', 'feculent', '343.0', '13.3', '71.5', '3.4', '0.0', '0.1'),
('poulet', 'proteine', '165.0', '31.0', '0.0', '3.6', '0.3', '0.0'),
('boeuf', 'proteine', '250.0', '26.0', '0.0', '17.0', '0.1', '0.0'),
('saumon', 'proteine', '206.0', '22.0', '0.0', '13.4', '0.1', '0.0'),
('thon', 'proteine', '144.0', '30.0', '0.0', '1.0', '0.4', '0.0'),
('tofu', 'proteine', '144.0', '15.0', '3.9', '8.0', '0.0', '0.0'),
('lentilles', 'proteine', '116.0', '9.0', '19.0', '0.5', '0.0', '2.0'),
('haricot noir', 'proteine', '339.0', '21.6', '63.0', '1.1', '0.0', '2.3'),
('oeuf', 'proteine', '143.0', '13.0', '1.1', '9.9', '0.4', '1.1'),
('porc', 'proteine', '143.0', '20.0', '0.0', '6.0', '0.0', '0.0'),
('lait', 'produit laitier', '42.0', '3.4', '4.7', '1.0', '0.1', '5.1'),
('yaourt', 'produit laitier', '61.0', '4.0', '5.0', '3.6', '0.1', '4.7'),
('fromage', 'produit laitier', '356.0', '25.0', '2.0', '28.8', '1.4', '0.0'),
('beurre', 'produit laitier', '717.0', '0.9', '0.0', '81.0', '2.0', '0.0'),
('creme fraiche', 'produit laitier', '340.0', '2.0', '3.6', '35.0', '0.0', '3.6'),
('vache qui rit', 'produit laitier', '314.0', '13.0', '6.0', '24.0', '0.9', '0.1'),
('petit suisse', 'produit laitier', '55.0', '3.5', '6.0', '1.6', '0.2', '5.0'),
('yaourt grec', 'produit laitier', '105.0', '6.0', '3.6', '7.8', '0.1', '3.6'),
('lait ecreme', 'produit laitier', '34.0', '3.4', '4.7', '0.4', '0.1', '5.1'),
('lait de soja', 'produit laitier', '33.0', '3.4', '1.6', '1.8', '0.0', '0.5'),
('lait damande', 'produit laitier', '13.0', '0.5', '0.3', '1.1', '0.0', '0.3'),
('lait de noisette', 'produit laitier', '13.0', '0.5', '0.4', '0.8', '0.0', '0.3'),
('lait de coco', 'produit laitier', '230.0', '2.0', '4.4', '23.0', '0.0', '4.0'),
('fromage de chevre', 'produit laitier', '364.0', '21.0', '0.4', '30.0', '1.6', '0.0'),
('fromage blanc', 'produit laitier', '59.0', '8.0', '3.0', '1.0', '0.1', '3.0'),
('cafe', 'boisson', '2.0', '0.1', '0.3', '0.0', '0.0', '0.0'),
('the', 'boisson', '1.0', '0.1', '0.3', '0.0', '0.0', '0.0'),
('jus d\'orange', 'boisson', '43.0', '0.7', '8.2', '0.2', '0.0', '8.2'),
('jus de pomme', 'boisson', '46.0', '0.2', '11.0', '0.2', '0.0', '10.0'),
('soda', 'boisson', '41.0', '0.0', '11.0', '0.0', '0.0', '10.6'),
('biere', 'boisson', '43.0', '0.5', '3.6', '0.0', '0.0', '0.0'),
('vin rouge', 'boisson', '83.0', '0.6', '2.0', '0.0', '0.0', '0.0'),
('vin blanc', 'boisson', '82.0', '0.6', '3.0', '0.0', '0.0', '0.0'),
('cocktail', 'boisson', '150.0', '0.0', '5.0', '0.0', '0.0', '5.0'),
('smoothie', 'boisson', '63.0', '1.0', '15.0', '0.4', '0.0', '12.0'),
('energy drink', 'boisson', '45.0', '0.0', '11.0', '0.0', '0.0', '10.5'),
('limonade', 'boisson', '41.0', '0.0', '11.0', '0.0', '0.0', '10.6'),
('chocolat chaud', 'boisson', '192.0', '4.9', '27.8', '7.2', '0.1', '25.1'),
('sirop a l\'eau', 'boisson', '60.0', '0.0', '16.0', '0.0', '0.0', '16.0'),
('chips', 'snack sale', '536.0', '6.6', '48.9', '34.9', '1.1', '0.5'),
('cacahuetes', 'snack sale', '567.0', '25.8', '9.9', '49.7', '0.6', '3.1'),
('popcorn', 'snack sale', '375.0', '9.1', '78.5', '4.3', '0.1', '0.1'),
('pretzels', 'snack sale', '384.0', '8.4', '78.2', '2.0', '2.3', '2.0'),
('nachos', 'snack sale', '475.0', '9.2', '69.3', '20.7', '1.8', '0.9'),
('bretzels', 'snack sale', '351.0', '9.1', '74.3', '1.6', '1.2', '1.5'),
('cheetos', 'snack sale', '536.0', '6.6', '48.9', '34.9', '1.1', '0.5'),
('crackers', 'snack sale', '502.0', '7.4', '60.2', '26.0', '1.4', '5.0'),
('pizza surgelee', 'snack sale', '285.0', '10.3', '33.8', '11.1', '1.4', '3.5'),
('nuggets de poulet', 'snack sale', '264.0', '14.9', '16.2', '16.4', '0.8', '0.2'),
('frites', 'snack sale', '365.0', '3.4', '63.0', '15.0', '0.7', '0.4'),
('saucisses cocktail', 'snack sale', '305.0', '7.0', '0.9', '30.0', '1.2', '0.5'),
('pringles', 'snack sale', '524.0', '4.2', '50.6', '34.0', '1.0', '0.5'),
('fruits secs', 'snack sale', '349.0', '6.9', '52.3', '14.1', '0.0', '31.0'),
('chocolat', 'snack sucre', '546.0', '5.4', '59.0', '31.0', '0.0', '55.0'),
('bonbons', 'snack sucre', '394.0', '0.9', '97.6', '0.2', '0.2', '69.0'),
('biscuits', 'snack sucre', '479.0', '6.1', '66.0', '21.0', '0.6', '34.0'),
('gateau', 'snack sucre', '361.0', '4.2', '64.0', '9.0', '0.4', '41.0'),
('glace', 'snack sucre', '207.0', '3.0', '27.0', '10.0', '0.1', '24.0'),
('muffin', 'snack sucre', '265.0', '3.0', '49.0', '7.0', '0.3', '28.0'),
('donuts', 'snack sucre', '452.0', '4.9', '56.0', '23.0', '0.5', '31.0'),
('barre de chocolat', 'snack sucre', '515.0', '5.4', '58.0', '28.0', '0.0', '51.0'),
('caramel', 'snack sucre', '394.0', '0.9', '97.6', '0.2', '0.2', '69.0'),
('brioche', 'snack sucre', '317.0', '6.2', '50.0', '11.0', '0.6', '16.0'),
('barre granola', 'snack sucre', '367.0', '5.9', '62.0', '11.0', '0.3', '24.0'),
('beignet', 'snack sucre', '298.0', '3.4', '36.0', '15.0', '0.2', '15.0'),
('churros', 'snack sucre', '498.0', '4.0', '65.0', '24.0', '0.4', '35.0'),
('cereales', 'snack sucre', '379.0', '7.5', '82.0', '1.5', '0.8', '30.0'),
('pâte à tartiner', 'snack sucre', '541.0', '6.2', '56.0', '30.0', '0.0', '55.0');

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

-- DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `id_repas` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_repas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `repas_aliment`
--

DROP TABLE IF EXISTS `repas_aliment`;
CREATE TABLE IF NOT EXISTS `repas_aliment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_aliment` int NOT NULL,
  `id_repas` int NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_aliment` (`id_aliment`),
  KEY `id_repas` (`id_repas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prenom` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `age` int NOT NULL,
  `taille` int NOT NULL,
  `poids` int NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `sport` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `age`, `taille`, `poids`, `sexe`, `sport`) VALUES
('Patarot', 'Adele', 'ap@imt.fr', 22, 157, 60, 'F', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `repas_aliment`
--
ALTER TABLE `repas_aliment`
  ADD CONSTRAINT `repas_aliment_ibfk_1` FOREIGN KEY (`id_aliment`) REFERENCES `aliments` (`id_aliment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repas_aliment_ibfk_2` FOREIGN KEY (`id_repas`) REFERENCES `repas` (`id_repas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
