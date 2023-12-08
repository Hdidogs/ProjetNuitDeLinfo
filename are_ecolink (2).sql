-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 déc. 2023 à 06:51
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `canal`
--

INSERT INTO `canal` (`id_canal`, `nom`, `theme`) VALUES
(1, 'General', 'Aucun'),
(2, 'Climat', 'Rechauffement climatique');

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `libelle`, `ref_user`, `ref_canal`) VALUES
(20, 'zdqe', 2, 1),
(21, 'z', 2, 1),
(22, 'qzdesfd', 2, 1),
(23, 'zqdsf', 2, 1),
(24, 'zqdsf', 2, 1),
(25, 'e', 2, 1),
(26, 'esfrdgf', 2, 1),
(27, 'esfrdgf', 2, 1),
(28, 'zsqd', 2, 1),
(29, 'zsqd', 2, 1),
(30, 'qzes', 2, 1),
(31, 'qzes', 2, 1),
(32, 'zqf', 2, 1),
(33, 'zqf', 2, 1),
(34, 'zqf', 2, 1),
(35, 'ezqesfdrgtfhuj', 2, 1),
(36, 'test', 2, 1),
(37, 'ezqesfdrgtfhuj', 2, 1),
(38, 'test', 2, 1),
(39, 'test', 2, 1),
(40, 'ezqesfdrgtfhuj', 2, 1),
(41, 'ezqesfdrgtfhuj', 2, 1),
(42, 'test', 2, 1),
(45, 'test', 3, 1),
(46, 'ezqesfdrgtfhuj', 3, 1),
(47, 'ezqesfdrgtfhuj', 3, 1),
(48, 'qzs', 3, 1),
(49, 'ezqesfdrgtfhuj', 3, 1),
(50, 'test', 3, 1),
(51, 'qzs', 3, 1),
(52, 'test', 3, 1),
(53, 'test', 3, 1),
(54, 'qzs', 3, 1),
(55, 'test', 3, 1),
(56, 'teqs<dzqs', 3, 1),
(57, 'zqesrdgtfesfrd qsfdgr', 3, 1),
(58, 'zqesrdgtfesfrd qsfdgr', 3, 1),
(59, 'zqesrdgtfesfrd qsfdgr', 3, 1),
(60, 'zqesrdgtfesfrd qsfdgr', 3, 1),
(61, 'tt', 3, 1),
(62, 'zqdesf', 2, 1),
(63, 'tt', 3, 1),
(64, 'test', 3, 1),
(65, 'test', 3, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question`, `ref_quizz`) VALUES
(1, 'Quelle est la plus grande source de pollution marine ? ', 3),
(2, 'Quel pourcentage de la pollution de l\'air est attribué ', 3),
(3, 'Quelle est la principale source de contamination de l e', 2),
(4, 'Quel est le principal facteur déclenchant les extinctio', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE IF NOT EXISTS `quizz` (
  `id_quizz` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(55) NOT NULL,
  PRIMARY KEY (`id_quizz`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`id_quizz`, `theme`) VALUES
(1, 'Nature'),
(2, 'Tri Selectif'),
(3, 'Nature'),
(4, 'Tri Selectif'),
(5, 'Polution');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `mail`, `mdp`, `rue`, `cp`, `ville`, `pays`, `admin`, `argent_dep`, `grade`) VALUES
(1, 'test', 'test', 'a', 'zqdesfrgd', 'zqdesf', 'dqesf', 'dsf', 'qdsf', 1, NULL, NULL),
(2, 'ROHEE', 'Alexis', 'A@gmail.com', '$2y$10$9S.8nesLeCUldQD.sdC49uT.UetL.4X0U5MfPhBc1vrQ/..5A28uq', '11 Avenue Glandaz', '95330', 'Domont', 'France', 0, NULL, NULL),
(3, 'S', 'as', 'ar@gmail.com', '$2y$10$Z8d56Yds9A9lrj8B1..XX./1K4zE2WaBrNoHK2dJaNy2SfCBe/bwi', 'as', 'aS', 'as', 'as', 0, NULL, NULL);

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
