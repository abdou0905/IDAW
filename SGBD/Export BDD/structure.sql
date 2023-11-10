SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
--
-- Base de données : `imangermieux`
--
-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Structure de la table `repas_aliment`
--
-- --------------------------------------------------------

DROP TABLE IF EXISTS `repas_aliment`;
CREATE TABLE IF NOT EXISTS `repas_aliment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_aliment` int NOT NULL,
  `id_repas` int NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id`)
  -- KEY `id_aliment` (`id_aliment`),
  -- KEY `id_repas` (`id_repas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Structure de la table `aliments`
--
-- --------------------------------------------------------

DROP TABLE IF EXISTS `aliments`; 
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
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Structure de la table `repas`
--
-- --------------------------------------------------------


DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `id_repas` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_repas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------
--
-- Structure de la table `utilisateur`
--
-- --------------------------------------------------------


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
-- Contraintes pour la table `repas_aliment`
--
ALTER TABLE `repas_aliment`
  ADD CONSTRAINT `repas_aliment_ibfk_1` FOREIGN KEY (`id_aliment`) REFERENCES `aliments` (`id_aliment`),
  ADD CONSTRAINT `repas_aliment_ibfk_2` FOREIGN KEY (`id_repas`) REFERENCES `repas` (`id_repas`);
COMMIT;

