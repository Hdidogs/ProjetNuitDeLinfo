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
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int NOT NULL AUTO_INCREMENT,
  `question` varchar(55) NOT NULL,
  `ref_quizz` int NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `fk_question_quizz` (`ref_quizz`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question`, `ref_quizz`) VALUES
(1, 'Quelle est la plus grande source de pollution marine ? ', 3),
(2, 'Quel pourcentage de la pollution de l\'air est attribué ', 3),
(3, 'Quelle est la principale source de contamination de l e', 2),
(4, 'Quel est le principal facteur déclenchant les extinctio', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_quizz` FOREIGN KEY (`ref_quizz`) REFERENCES `quizz` (`id_quizz`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
