-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Mars 2017 à 20:00
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commande`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `NCLI` varchar(16) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `ADRESSE` varchar(255) NOT NULL,
  `LOCALITE` varchar(255) NOT NULL,
  `CAT` varchar(8),
  `COMPTE` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`NCLI`, `NOM`, `ADRESSE`, `LOCALITE`, `CAT`, `COMPTE`) VALUES
('B062', 'GOFFIN', '72, r. de la Gare', 'Namur', 'B2', '-3200'),
('B112', 'HANSENNE', '23, r. Dumont', 'Poitiers', 'C1', '1250'),
('B332', 'MONTI', '112, r. Neuve', 'Genève', 'B2', '0'),
('B512', 'GILLET', '14, r. de l''Eté', 'Toulouse', 'B1', '-8700'),
('C003', 'AVRON', '8, r. de la Cure', 'Toulouse', 'B1', '-1700'),
('C123', 'MERCIER', '25, r. Lemaître', 'Namur', 'C1', '-2300'),
('C400', 'FERARD', '65, r. du Tertre', 'Poitiers', 'B2', '350'),
('D063', 'MERCIER', '201, bvd du Nord', 'Toulouse', '', '-2250'),
('F010', 'TOUSSAINT', '5, r. Godefroid', 'Poitiers', 'C1', '0'),
('F011', 'PONCELET', '17, Clos des Erables', 'Toulouse', 'B2', '0'),
('F400', 'JACOB', '78, ch. du Moulin', 'Bruxelles','C2', '0'),
('K111', 'VANBIST', '180, r. du Florimont', 'Lille', 'B1', '720'),
('K729', 'NEUMAN', '40, r. Bransart', 'Toulouse', '', '0'),
('L422', 'FRANCK', '60, r. de Wépion', 'Namur', 'C1', '0'),
('S127', 'VANDERKA', '3, av. des Roses', 'Namur', 'C1', '-4580'),
('S712', 'GUILLAUME', '14a, ch. des Roses', 'Paris', 'B1', '0');

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `NCOM` int(11) NOT NULL,
  `NPRO` varchar(16) NOT NULL,
  `QCOM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `detaim`
--

INSERT INTO `detail` (`NCOM`, `NPRO`, `QCOM`) VALUES
(30178, 'CS464', 25),
(30179, 'CS262', 60),
(30179, 'PA60', 20),
(30182, 'PA60', 30),
(30184, 'CS464', 120),
(30184, 'PA45', 20),
(30185, 'CS464', 260),
(30185, 'PA60', 15),
(30185, 'PS222', 600),
(30186, 'PA45', 3),
(30188, 'CS464', 180),
(30188, 'PA45', 22),
(30188, 'PA60', 70),
(30188, 'PH222', 95);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `NCOM` int(11) NOT NULL,
  `NCLI` varchar(16) NOT NULL,
  `DATECOM` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`NCOM`, `NCLI`, `DATECOM`) VALUES
(30178, 'K111','2016-11-24'),
(30179, 'C400','2016-12-01'),
(30182, 'S127','2016-11-24'),
(30184, 'C400','2017-03-09'),
(30185, 'F011','2017-03-16'),
(30186, 'C400','2017-03-09'),
(30188, 'B512','2017-03-16');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `NPRO` varchar(16) NOT NULL,
  `LIBELLE` varchar(255) NOT NULL,
  `PRIX` int(11) NOT NULL,
  `QSTOCK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`NPRO`, `LIBELLE`, `PRIX`, `QSTOCK`) VALUES
('CS262', 'CHEV. SAPIN 200x6x2', 75, 45),
('CS264', 'CHEV. SAPIN 200x6x4', 120, 2690),
('CS464', 'CHEV. SAPIN 400x6x4', 220, 450),
('PA45', 'POINTE ACIER 45 (2K)', 105, 580),
('PA60', 'POINTE ACIER 60 (1K)', 95, 134),
('PH222', 'PL. HETRE 200x20x2', 230, 782),
('PS222', 'PL. SAPIN 200x20x2', 185, 1220);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_UTIL` int(11) NOT NULL,
  `NOM_UTIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTIL`, `NOM_UTIL`, `PASSWORD`) VALUES
(1, 'admin', '$2y$10$w07bry22h6xfJhShZXM7ouH6K8V5xuXyfjYRGdxi/mwG1yzT7O6w6'),
(2, 'user', '$2y$10$pjE2QJx0Apzv0RQgWq5XEu5rqJMzFNAiOusCouz1qTKbBlUYV1.J.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`NCLI`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`NCOM`,`NPRO`),
  ADD KEY `NCOM` (`NCOM`),
  ADD KEY `NPRO` (`NPRO`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`NCOM`),
  ADD KEY `NCLI` (`NCLI`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`NPRO`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_UTIL`),
  ADD UNIQUE KEY `NOM_UTIL` (`NOM_UTIL`);

--
-- AUTO_INCREMENT pour les tables exportées
--
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `NCOM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_UTIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`NPRO`) REFERENCES `produit` (`NPRO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`NCOM`) REFERENCES `commande` (`NCOM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`NCLI`) REFERENCES `client` (`NCLI`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
