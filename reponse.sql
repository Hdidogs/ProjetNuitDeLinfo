-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 déc. 2023 à 03:54
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
-- Base de données : `lpb_ecolink`
--

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int NOT NULL AUTO_INCREMENT,
  `reponse` varchar(100) NOT NULL,
  `vrai` tinyint(1) NOT NULL,
  `ref_question` int NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `fk_reponse_question` (`ref_question`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `reponse`, `vrai`, `ref_question`) VALUES
(1, 'les sacs en plastique ', 0, 1),
(2, '51% pour les voitures et 21% pour l\'industrie', 1, 2),
(3, 'les mégots de cigarette ', 1, 1),
(4, '60% pour les voitures et 30% pour les industries', 0, 2),
(5, 'les déchets chimiques ', 0, 3),
(6, 'les déchets domestiques ', 1, 3),
(7, 'le changement climatique ', 0, 4),
(8, 'la déforestation ', 1, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_reponse_question` FOREIGN KEY (`ref_question`) REFERENCES `question` (`id_question`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
