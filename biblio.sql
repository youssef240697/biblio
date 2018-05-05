-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mar 21 Février 2017 à 10:11
-- Version du serveur :  5.7.15-log
-- Version de PHP :  5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `dt_debut` date NOT NULL,
  `dt_retour` date DEFAULT NULL,
  `id_gestionaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_etudiant`, `id_livre`, `dt_debut`, `dt_retour`, `id_gestionaire`) VALUES
(1, 13003031, 2, '2017-02-08', '2017-02-14', 1),
(2, 14000149, 10, '2017-02-15', '2017-02-22', 2),
(3, 14001914, 10, '2017-02-05', '2017-02-07', 1),
(4, 14004046, 9, '2017-04-05', '2017-02-22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `num_apogee` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`num_apogee`, `nom`, `prenom`, `image`) VALUES
(13003031, 'ALMOUHAK', 'KAOUTAR', 'IMAGE3'),
(13007111, 'AKSBI', 'OUSSAMA', 'IMAGE2'),
(13007921, 'CHTIBY', 'SAFAA', 'IMAGE15'),
(14000054, 'BAHOUMI', 'BASMA', 'IMAGE5'),
(14000108, 'EL ATTAOUI', 'ANAS', 'IMAGE20'),
(14000149, 'BELOUIZA', 'CHARIFA', 'IMAGE8'),
(14000198, 'BOUSFIHA', 'TAREK', 'IMAGE11'),
(14001418, 'BELHAJ', 'ZOUBIDA', 'IMAGE6'),
(14001914, 'ABERCHANE', 'OUMAIMA', 'IMAGE1'),
(14003733, 'EDDOUMY', 'MONCEF', 'IMAGE18'),
(14004046, 'DURGUT', 'JIHANE', 'IMAGE17'),
(14004254, 'BOUZIANE', 'WALID', 'IMAGE12'),
(14004781, 'BELHOUSSINE', 'MOUAAD', 'IMAGE7'),
(14008626, 'EL ACHRAF', 'ABDEDDAIM', 'IMAGE19'),
(14009372, 'BENTALEB', 'YOUSSEF', 'IMAGE10'),
(14010196, 'DJUIPOU NJOUYEP', 'PAMELA', 'IMAGE16'),
(16005700, 'CHAKIR', 'HIND', 'IMAGE13'),
(16006082, 'BENABBOU', 'RAJAE', 'IMAGE9'),
(16007935, 'CHRAIBI', 'HASSAN', 'IMAGE14'),
(16008664, 'BAALI', 'AYOUB', 'IMAGE4');

-- --------------------------------------------------------

--
-- Structure de la table `gestionaire`
--

CREATE TABLE `gestionaire` (
  `id_gestionaire` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gestionaire`
--

INSERT INTO `gestionaire` (`id_gestionaire`, `login`, `pass`, `nom`, `prenom`) VALUES
(1, 'marso', 'azerty', 'Marso', 'Mohamed'),
(2, 'naziha', '1234', 'El yaakoubi', 'Naziha');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `isbn` int(11) NOT NULL,
  `titre_livre` varchar(100) NOT NULL,
  `auteur` varchar(40) NOT NULL,
  `image_livre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`isbn`, `titre_livre`, `auteur`, `image_livre`) VALUES
(1, 'LIVRE A', 'Auteur 1', 'LIV1'),
(2, 'LIVRE B', 'Auteur 2', 'LIV2'),
(3, 'LIVRE C', 'Auteur 3', 'LIV3'),
(4, 'LIVRE D', 'Auteur 4', 'LIV4'),
(5, 'LIVRE E', 'Auteur 5', 'LIV5'),
(6, 'LIVRE F', 'Auteur 6', 'LIV6'),
(7, 'LIVRE G', 'Auteur 7', 'LIV7'),
(8, 'LIVRE H', 'Auteur 8', 'LIV8'),
(9, 'LIVRE I', 'Auteur 9', 'LIV9'),
(10, 'LIVRE J', 'Auteur 10', 'LIV10'),
(11, 'LIVRE K', 'Auteur 11', 'LIV11'),
(12, 'LIVRE L', 'Auteur 12', 'LIV12'),
(13, 'LIVRE M', 'Auteur 13', 'LIV13'),
(14, 'LIVRE N', 'Auteur 14', 'LIV14'),
(15, 'LIVRE O', 'Auteur 15', 'LIV15'),
(16, 'LIVRE P', 'Auteur 16', 'LIV16'),
(17, 'LIVRE Q', 'Auteur 17', 'LIV17'),
(18, 'LIVRE R', 'Auteur 18', 'LIV18'),
(19, 'LIVRE S', 'Auteur 19', 'LIV19'),
(20, 'LIVRE T', 'Auteur 20', 'LIV20'),
(21, 'LIVRE U', 'Auteur 21', 'LIV21'),
(22, 'LIVRE V', 'Auteur 22', 'LIV22'),
(23, 'LIVRE W', 'Auteur 23', 'LIV23'),
(24, 'LIVRE X', 'Auteur 24', 'LIV24'),
(25, 'LIVRE Y', 'Auteur 25', 'LIV25');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `id_admin` (`id_gestionaire`),
  ADD KEY `id_gestionaire` (`id_gestionaire`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`num_apogee`);

--
-- Index pour la table `gestionaire`
--
ALTER TABLE `gestionaire`
  ADD PRIMARY KEY (`id_gestionaire`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`isbn`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `gestionaire`
--
ALTER TABLE `gestionaire`
  MODIFY `id_gestionaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`num_apogee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_3` FOREIGN KEY (`id_gestionaire`) REFERENCES `gestionaire` (`id_gestionaire`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
