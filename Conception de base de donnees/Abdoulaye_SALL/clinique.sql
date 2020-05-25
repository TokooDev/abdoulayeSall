-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 mai 2020 à 18:43
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
-- Base de données :  `clinique`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `idChamb` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(100) NOT NULL,
  `typ` varchar(100) NOT NULL,
  `numDep` int(11) NOT NULL,
  PRIMARY KEY (`idChamb`),
  KEY `chambre_departement_FK` (`numDep`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`idChamb`, `categorie`, `typ`, `numDep`) VALUES
(1, 'categorie 1', 'type 1', 2),
(2, 'categorie 2', 'type 2', 4),
(3, 'categorie 3', 'type 3', 9),
(4, 'categorie 4', 'type 4', 1),
(5, 'categorie 5', 'type 5', 9),
(6, 'categorie 6', 'type 6', 2),
(7, 'categorie 7', 'type 7', 1),
(8, 'categorie 8', 'type 8', 5);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `numDep` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`numDep`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`numDep`, `nom`) VALUES
(1, 'ophtalmologie'),
(2, 'orthopédie'),
(3, 'chirurgie'),
(4, 'cardiologie'),
(5, 'gynécologie'),
(6, 'radiologie'),
(7, 'psychiatrie'),
(8, 'pediatrie'),
(9, 'D2');

-- --------------------------------------------------------

--
-- Structure de la table `feuilleevolution`
--

DROP TABLE IF EXISTS `feuilleevolution`;
CREATE TABLE IF NOT EXISTS `feuilleevolution` (
  `idFeuil` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `idMald` int(11) NOT NULL,
  `idMed` int(11) NOT NULL,
  PRIMARY KEY (`idFeuil`),
  KEY `feuilleEvolution_malade_FK` (`idMald`),
  KEY `feuilleEvolution_medecin0_FK` (`idMed`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `feuilleevolution`
--

INSERT INTO `feuilleevolution` (`idFeuil`, `date`, `idMald`, `idMed`) VALUES
(1, '2019-06-12', 3, 1),
(2, '2019-11-06', 2, 3),
(7, '2012-06-12', 5, 4),
(8, '2017-11-06', 4, 5),
(9, '2015-01-12', 9, 11),
(10, '2018-11-01', 4, 3),
(11, '2019-12-10', 3, 10),
(12, '2020-04-08', 9, 10),
(13, '2019-10-10', 1, 11),
(14, '2018-04-05', 4, 10),
(15, '2019-09-04', 11, 10),
(16, '2020-06-03', 19, 13),
(17, '2020-01-08', 20, 12),
(18, '2019-06-03', 21, 5),
(19, '2020-01-08', 22, 12),
(20, '2019-11-07', 6, 4),
(21, '2020-03-12', 7, 3),
(22, '2020-05-04', 8, 2),
(23, '2019-12-11', 10, 12),
(24, '2020-05-01', 12, 9),
(25, '2020-05-05', 15, 4),
(26, '2019-06-12', 16, 11),
(27, '2020-05-12', 17, 11),
(28, '2019-11-12', 18, 9),
(29, '2020-05-04', 23, 6);

-- --------------------------------------------------------

--
-- Structure de la table `lit`
--

DROP TABLE IF EXISTS `lit`;
CREATE TABLE IF NOT EXISTS `lit` (
  `numLit` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `idChamb` int(11) NOT NULL,
  PRIMARY KEY (`numLit`),
  KEY `lit_chambre_FK` (`idChamb`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lit`
--

INSERT INTO `lit` (`numLit`, `libelle`, `idChamb`) VALUES
(1, 'lit numero 1', 2),
(2, 'lit numero 2', 4),
(3, 'lit numero 3', 2),
(4, 'lit numero 4', 5),
(5, 'lit numero 5', 3),
(6, 'lit numero 6', 2),
(7, 'lit numero 7', 3),
(8, 'lit numero 8', 2),
(9, 'lit numero 9', 3),
(10, 'lit numero 10', 2),
(11, 'lit numero 11', 3),
(12, 'lit numero 12', 2),
(13, 'lit numero 13', 3),
(14, 'lit numero 14', 6),
(15, 'lit numero 15', 1),
(16, 'lit numero 16', 2),
(17, 'lit numero 17', 3),
(18, 'lit numero 18', 4),
(19, 'lit numero 19', 2),
(20, 'lit numero 20', 2),
(21, 'lit numero 21', 3),
(22, 'lit numero 22', 3),
(23, 'lit numero 23', 3),
(24, 'lit numero 24', 2),
(25, 'lit numero 25', 4),
(26, 'lit numero 26', 1),
(27, 'lit numero 27', 3),
(28, 'lit numero 28', 2),
(29, 'lit numero 29', 3),
(30, 'lit numero 30', 5);

-- --------------------------------------------------------

--
-- Structure de la table `malade`
--

DROP TABLE IF EXISTS `malade`;
CREATE TABLE IF NOT EXISTS `malade` (
  `idMald` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `lieuNaissance` varchar(20) NOT NULL,
  `dateOccupLit` date NOT NULL,
  `numLit` int(11) NOT NULL,
  PRIMARY KEY (`idMald`),
  KEY `malade_lit_FK` (`numLit`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `malade`
--

INSERT INTO `malade` (`idMald`, `nom`, `adresse`, `sexe`, `dateNaissance`, `lieuNaissance`, `dateOccupLit`, `numLit`) VALUES
(1, 'Fatima samb', 'pikine', 'feminin', '2020-03-02', 'pikine', '2019-10-02', 1),
(2, 'Amadou Diop', 'golf', 'masculin', '2018-06-06', 'golf', '2020-01-08', 4),
(3, 'Aissata SALL', 'podor', 'feminin', '2012-04-22', 'podor', '2020-03-05', 3),
(4, 'Ousmane tall', 'mermoz', 'masculin', '2006-02-15', 'mermoz', '2020-01-14', 21),
(5, 'Aliou Thiam', 'golf', 'masculin', '1998-01-06', 'golf', '2020-03-04', 7),
(6, 'Dieynaba Seye', 'plateau', 'feminin', '1995-06-16', 'plateau', '2020-01-15', 5),
(7, 'Fatima samb', 'pikine', 'feminin', '2020-03-02', 'pikine', '2019-05-10', 3),
(8, 'Assane Diop', 'golf', 'masculin', '2018-08-15', 'dakar', '2018-03-09', 7),
(9, 'Ismael dia', 'matam', 'masculin', '2019-10-15', 'golf', '2019-03-14', 21),
(10, 'seynabou ly', 'ndioum', 'feminin', '2020-01-08', 'podor', '2020-05-01', 2),
(11, 'Ramata diallo', 'medina', 'feminin', '2005-10-12', 'pikine', '2019-07-04', 14),
(12, 'Dieynaba Seye', 'plateau', 'feminin', '1995-06-16', 'plateau', '2019-10-10', 5),
(15, 'baba ly', 'thiambe', 'masculin', '2019-10-08', 'dakar', '2019-12-13', 18),
(16, 'Aissata Dia', 'grand yoff', 'feminin', '2018-09-13', 'pikine', '2018-02-09', 15),
(17, 'Samba anne', 'boke', 'masculin', '2019-10-08', 'boke', '2019-12-13', 10),
(18, 'Salamata', 'yoff', 'feminin', '2018-09-13', 'yoff', '2018-02-09', 11),
(19, 'ousseynou Sylla', 'yeumbeul', 'masculin', '2006-12-12', 'dakar', '2020-06-02', 7),
(20, 'Mamadou Diokh', 'Dakar', 'masculin', '1996-04-12', 'dakar', '2020-06-11', 4),
(21, 'Fatima Sylla', 'yeumbeul', 'feminin', '1992-01-17', 'dakar', '2020-06-13', 5),
(22, 'Alassane Thiam', 'Matam', 'masculin', '2019-12-12', 'dakar', '2020-06-22', 11),
(23, 'Aissata SALL', 'podor', 'feminin', '2012-04-22', 'podor', '2019-12-11', 14);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `idMed` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `idSpec` int(11) NOT NULL,
  PRIMARY KEY (`idMed`),
  KEY `medecin_specialite_FK` (`idSpec`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`idMed`, `nom`, `idSpec`) VALUES
(1, 'Assane Diop', 2),
(2, 'Ismael dia', 4),
(3, 'Coumba ndiaye', 3),
(4, 'Amadou sy', 6),
(5, 'Aliou sow', 4),
(6, 'Sarata ly', 1),
(7, 'oumou thiam', 2),
(8, 'papa diop', 5),
(9, 'Oumar niang', 10),
(10, 'ablaye ndiaye', 10),
(11, 'M3', 6),
(12, 'lamine thiam', 1),
(13, 'Adja ngom', 1);

-- --------------------------------------------------------

--
-- Structure de la table `servir`
--

DROP TABLE IF EXISTS `servir`;
CREATE TABLE IF NOT EXISTS `servir` (
  `numDep` int(11) NOT NULL,
  `idMed` int(11) NOT NULL,
  PRIMARY KEY (`numDep`,`idMed`),
  KEY `servir_medecin0_FK` (`idMed`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `servir`
--

INSERT INTO `servir` (`numDep`, `idMed`) VALUES
(1, 2),
(1, 3),
(1, 5),
(1, 7),
(2, 4),
(2, 7),
(3, 4),
(4, 2),
(4, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `idSpec` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idSpec`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`idSpec`, `libelle`) VALUES
(1, 'S1'),
(2, 'pediatre'),
(3, 'neurologue'),
(4, 'dermatologue'),
(5, 'ophtalmologue'),
(6, 'cardiologue'),
(7, 'generaliste'),
(8, 'gynechologue'),
(9, 'S9'),
(10, 'S2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_departement_FK` FOREIGN KEY (`numDep`) REFERENCES `departement` (`numDep`);

--
-- Contraintes pour la table `feuilleevolution`
--
ALTER TABLE `feuilleevolution`
  ADD CONSTRAINT `feuilleEvolution_malade_FK` FOREIGN KEY (`idMald`) REFERENCES `malade` (`idMald`),
  ADD CONSTRAINT `feuilleEvolution_medecin0_FK` FOREIGN KEY (`idMed`) REFERENCES `medecin` (`idMed`);

--
-- Contraintes pour la table `lit`
--
ALTER TABLE `lit`
  ADD CONSTRAINT `lit_chambre_FK` FOREIGN KEY (`idChamb`) REFERENCES `chambre` (`idChamb`);

--
-- Contraintes pour la table `malade`
--
ALTER TABLE `malade`
  ADD CONSTRAINT `malade_lit_FK` FOREIGN KEY (`numLit`) REFERENCES `lit` (`numLit`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_specialite_FK` FOREIGN KEY (`idSpec`) REFERENCES `specialite` (`idSpec`);

--
-- Contraintes pour la table `servir`
--
ALTER TABLE `servir`
  ADD CONSTRAINT `servir_departement_FK` FOREIGN KEY (`numDep`) REFERENCES `departement` (`numDep`),
  ADD CONSTRAINT `servir_medecin0_FK` FOREIGN KEY (`idMed`) REFERENCES `medecin` (`idMed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
