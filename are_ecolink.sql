-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 déc. 2023 à 02:44
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `are_ecolink`
--

-- --------------------------------------------------------

--
-- Structure de la table `arbre`
--

DROP TABLE IF EXISTS `arbre`;
CREATE TABLE IF NOT EXISTS `arbre` (
  `id_arbre` int(11) NOT NULL AUTO_INCREMENT,
  `nbr` int(11) NOT NULL,
  `ref_user` int(11) NOT NULL,
  PRIMARY KEY (`id_arbre`),
  KEY `fk_arbre_user` (`ref_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `arbre`
--

INSERT INTO `arbre` (`id_arbre`, `nbr`, `ref_user`) VALUES
(1, 2222, 1),
(2, 45, 1);

-- --------------------------------------------------------

--
-- Structure de la table `canal`
--

DROP TABLE IF EXISTS `canal`;
CREATE TABLE IF NOT EXISTS `canal` (
  `id_canal` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `theme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_canal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  `ref_user` int(11) NOT NULL,
  `ref_canal` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `fk_message_user` (`ref_user`),
  KEY `fk_message_canal` (`ref_canal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(55) NOT NULL,
  `ref_quizz` int(11) NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `fk_question_quizz` (`ref_quizz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE IF NOT EXISTS `quizz` (
  `id_quizz` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(55) NOT NULL,
  PRIMARY KEY (`id_quizz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(100) NOT NULL,
  `vrai` tinyint(1) NOT NULL,
  `ref_question` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `fk_reponse_question` (`ref_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `transac`
--

DROP TABLE IF EXISTS `transac`;
CREATE TABLE IF NOT EXISTS `transac` (
  `id_transac` int(11) NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL,
  `ref_user` int(11) NOT NULL,
  PRIMARY KEY (`id_transac`),
  KEY `fk_transac_user` (`ref_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transac`
--

INSERT INTO `transac` (`id_transac`, `montant`, `ref_user`) VALUES
(1, 4545, 1),
(2, 44, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `rue` varchar(55) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `ville` varchar(55) NOT NULL,
  `pays` varchar(55) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `argent_dep` float DEFAULT NULL,
  `grade` varchar(44) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `mail`, `mdp`, `rue`, `cp`, `ville`, `pays`, `admin`, `argent_dep`, `grade`) VALUES
(1, 'test', 'test', 'a', 'zqdesfrgd', 'zqdesf', 'dqesf', 'dsf', 'qdsf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `userquizz`
--

DROP TABLE IF EXISTS `userquizz`;
CREATE TABLE IF NOT EXISTS `userquizz` (
  `ref_user` int(11) NOT NULL,
  `ref_quizz` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`ref_user`,`ref_quizz`),
  KEY `fk_userquizz_quizz` (`ref_quizz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `arbre`
--
ALTER TABLE `arbre`
  ADD CONSTRAINT `fk_arbre_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_canal` FOREIGN KEY (`ref_canal`) REFERENCES `canal` (`id_canal`),
  ADD CONSTRAINT `fk_message_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_quizz` FOREIGN KEY (`ref_quizz`) REFERENCES `quizz` (`id_quizz`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_reponse_question` FOREIGN KEY (`ref_question`) REFERENCES `question` (`id_question`);

--
-- Contraintes pour la table `transac`
--
ALTER TABLE `transac`
  ADD CONSTRAINT `fk_transac_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `userquizz`
--
ALTER TABLE `userquizz`
  ADD CONSTRAINT `fk_userquizz_quizz` FOREIGN KEY (`ref_quizz`) REFERENCES `quizz` (`id_quizz`),
  ADD CONSTRAINT `fk_userquizz_user` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
