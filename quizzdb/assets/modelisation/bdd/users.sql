-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 juin 2020 à 20:16
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quizzdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `score` int(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `score`, `type`) VALUES
(1, 'Les précurseurs d\'internet sont :', 7, 'unique'),
(4, 'La première école de codage gratuite est :', 10, 'unique'),
(3, 'Les langages web sont', 5, 'multiple'),
(7, 'Quelles sont les régions du Sénégal ', 5, 'multiple'),
(8, 'Qui est le président du senegal', 5, 'text');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(255) NOT NULL,
  `juste` int(50) NOT NULL,
  `id_question` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `reponse`, `juste`, `id_question`) VALUES
(1, 'GAFAM', 1, 1),
(2, 'CIA/FBI', 0, 1),
(3, 'html', 1, 3),
(4, 'js', 1, 3),
(5, 'word', 0, 3),
(6, 'Sonatel academy', 1, 4),
(7, 'ISM', 0, 4),
(11, 'Dakar', 1, 7),
(12, 'matam', 1, 7),
(13, 'pikine', 1, 7),
(14, 'podor', 0, 7),
(15, 'Macky SALL', 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `profil` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp1` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `profil`, `prenom`, `nom`, `login`, `mdp1`, `avatar`, `statut`) VALUES
(1, 'admin', 'tokosel abdoulaye', 'sall', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'assets/images/users-images/admin.png', 'actif'),
(18, 'player', 'ousmane', 'traore', 'ousmane', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/9d8031f6d1c24bdbb64e020f2b657ac6.jpg', 'bloqué'),
(7, 'admin', 'Abdoulaye ', 'Sall', 'laye', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20171009_083630.jpg', 'actif'),
(8, 'player', 'Abdoulaye ', 'diatta', 'layee', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/_20180910_232058.jpg', 'actif'),
(11, 'admin', 'ousmane', 'diop', 'weuz', '81dc9bdb52d04dc20036dbd8313ed055', 'images/users-images/', 'actif'),
(12, 'admin', 'lamine', 'thiam', 'lamzo', '81dc9bdb52d04dc20036dbd8313ed055', 'images/users-images/', 'actif'),
(19, 'player', 'ramata', 'diatta', 'ramata', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/346c80d8d61003f830a6b35f75936642.jpg', 'actif'),
(22, 'admin', 'aly tall', 'niang', 'aly', 'ec6a6536ca304edf844d1d248a4f08dc', 'assets/images/users-images/', 'actif'),
(23, 'admin', 'Abou', 'Sy', 'abou', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/', 'actif'),
(24, 'admin', 'Amina', 'Diallo', 'amina', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/', 'actif'),
(25, 'player', 'Ibrahima', 'Sall', 'ibzo', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/0e614a28d38d4d267ee04f0a2742ba77.jpg', 'actif'),
(26, 'player', 'Oumou', 'kalsoum', 'oumy', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/Amitoulaye 20161221_211509.jpg', 'bloqué'),
(27, 'admin', 'Amadou', 'almamy', 'amadou', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/', 'actif'),
(28, 'admin', 'Seynabou', 'thiam', 'seynabou', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/', 'actif'),
(29, 'admin', 'Bacacar', 'Sene', 'babs', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20171216_182800.jpg', 'actif'),
(30, 'admin', 'cheikh', 'ndiaye', 'cheikh', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20171114_191735.jpg', 'actif'),
(31, 'admin', 'binta', 'ba', 'binta', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20180318_212342.jpg', 'actif'),
(32, 'admin', 'Laye', 'messi', 'messi', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/IMG-20170918-WA0410.jpg', 'actif'),
(33, 'admin', 'test', 'test', 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20180804_220715.jpg', 'actif'),
(34, 'admin', 'meissa', 'sognane', 'maissa', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20190512_115814.jpg', 'actif'),
(35, 'admin', 'soro', 'thiam', 'soro', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20180315_114050.jpg', 'actif'),
(39, 'admin', 'yero', 'sy', 'yero', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/0e614a28d38d4d267ee04f0a2742ba77.jpg', 'actif'),
(40, 'admin', 'Dieynaba', 'diop', 'diez', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20190409_212837.jpg', 'actif'),
(41, 'admin', 'Salif', 'Mar', 'salif', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20190511_230650.jpg', 'actif'),
(42, 'admin', 'Abdoul', 'SALL', 'abdoul', '81dc9bdb52d04dc20036dbd8313ed055', 'assets/images/users-images/20180608_221923.png', 'actif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
