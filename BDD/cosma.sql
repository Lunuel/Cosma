-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 28 sep. 2018 à 18:14
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cosma`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `Id_adherent` char(8) NOT NULL,
  `Mdp` char(100) NOT NULL,
  `Mdpconfirm` char(100) NOT NULL,
  `Nom` char(30) NOT NULL,
  `Prenom` char(30) NOT NULL,
  `Email` char(50) NOT NULL,
  `DateNaissance` char(20) NOT NULL,
  `Adresse` char(100) NOT NULL,
  `Téléphone` char(50) NOT NULL,
  `Id_sexe` int(1) NOT NULL,
  `Unom` char(30) NOT NULL,
  `Uprenom` char(30) NOT NULL,
  `Utel` char(10) NOT NULL,
  `Photo_profil` char(100) DEFAULT 'PPModele.png',
  `Clef` char(100) DEFAULT NULL,
  `Validation` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`Id_adherent`, `Mdp`, `Mdpconfirm`, `Nom`, `Prenom`, `Email`, `DateNaissance`, `Adresse`, `Téléphone`, `Id_sexe`, `Unom`, `Uprenom`, `Utel`, `Photo_profil`, `Clef`, `Validation`) VALUES
('ADMINLUN', 'LK6SGK5hHK9FI', 'LK6SGK5hHK9FI', 'Admin', 'Boss', 'admin@yahoo.fr', '01/10/1999', '59 ter rue Eugène Lefebvre', '0666556293', 2, 'Kuster', 'Lunuel', '0666556293', 'PPModele.png', 'nhgyhfkjhliefhdjkljd', 1),
('m5r7764j', 'LKwE4i0tdZZ3Y', 'LKwE4i0tdZZ3Y', 'Kuster', 'Lunuel', 'kuster.lunuel@yahoo.com', '1999-09-01', '59 ter rue Eugène Lefebvre', '0666556293', 1, 'Kuster', 'Lunuel', '666556293', 'PPModele.png', 'xoal4l73d8gwwevtkg4vga1oc62bex', 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` char(8) NOT NULL,
  `Pseudo` char(100) NOT NULL,
  `Mdp` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Id_admin`, `Pseudo`, `Mdp`) VALUES
('ADMINYTB', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `Id_article` char(8) NOT NULL,
  `Titre_Article` text NOT NULL,
  `DateArticle` date DEFAULT NULL,
  `Contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Id_article`, `Titre_Article`, `DateArticle`, `Contenu`) VALUES
('ijipb4in', 'Résultats octobre 2016 : Trail de Nandy, Semi de Vincennes, Marathons du Val de Reuil, de Rennes et de Dublin', '2018-06-29', '<p><a href=\"http://cosma-marathon.fr/spip/spip.php?article54&amp;lang=fr\">R&eacute;sultats octobre 2016&nbsp;: Trail de Nandy, Semi de Vincennes, Marathons du Val de Reuil, de Rennes et de Dublin</a></p>\r\n\r\n<p>Apr&egrave;s la reprise des entra&icirc;nements, le COSMA &eacute;tait de sortie en octobre. Au programme des trails, des marathons, des semis, ...<br />\r\nVoici un aper&ccedil;u non exhaustif des r&eacute;sultats :<br />\r\nTrail du four &agrave; chaux &agrave; Nandy le 2/10<br />\r\nSur le 11km :<br />\r\n130 Francois VEDRENNE 00:59:07 (V2M : 22&egrave;me)<br />\r\n135 Anne SONNIER 00:59:29 (V1F : 7&egrave;me)<br />\r\n136 Jean-jacques THOMAS 00:59:32 (V2M : 24&egrave;me)<br />\r\n286 Christine MARCAILLOU 01:08:39 (V1F - 19&egrave;me)<br />\r\n441 Maia PEYRE 01:25:22 (SEF : 59&egrave;me)<br />\r\nSur le 26km :<br />\r\n176 Charles MARCAILLOU 02:20:37&nbsp;(...)</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `cat_questionnaire`
--

CREATE TABLE `cat_questionnaire` (
  `Id_cat_questionnaire` char(3) NOT NULL,
  `Libelle_cat_questionnaire` char(200) DEFAULT NULL,
  `link` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cat_questionnaire`
--

INSERT INTO `cat_questionnaire` (`Id_cat_questionnaire`, `Libelle_cat_questionnaire`, `link`) VALUES
('C1', 'Condition physique', 'Condition_Physique'),
('C2', 'Motivation', 'Motivation'),
('C3', 'Entraînement', 'Entrainement'),
('C4', 'Compétition', 'Competition'),
('C5', 'Connaissances', 'Connaissances');

-- --------------------------------------------------------

--
-- Structure de la table `checkbox_questionnaire`
--

CREATE TABLE `checkbox_questionnaire` (
  `Id_checkbox_questionnaire` char(8) NOT NULL,
  `Libelle_checkbox_questionnaire` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `checkbox_questionnaire`
--

INSERT INTO `checkbox_questionnaire` (`Id_checkbox_questionnaire`, `Libelle_checkbox_questionnaire`) VALUES
('CHECK1', 'Faible (aucune activité physique pratiquée régulièrement)'),
('CHECK10', 'Autre'),
('CHECK11', '1 à 2 fois par semaines'),
('CHECK12', '1 à 3 fois par semaines'),
('CHECK13', 'plus...'),
('CHECK14', 'Aucune'),
('CHECK15', 'Occasionnelles sur des compétitions populaires'),
('CHECK16', 'Plus concerné par le défi personnel de terminer la course que le classement et la performance'),
('CHECK17', 'Lecture de revues'),
('CHECK18', 'Conseil d\'amis...'),
('CHECK2', 'Moyenne (pratique ou a pratiqué un autre sport, est capable de courir 30\' sans s\'arrêter)'),
('CHECK3', 'Bonne'),
('CHECK4', 'Recherche de mieux-être (perdre du poids, cesser de fumer)'),
('CHECK5', 'Recherche d\'une activité physique individuelle sans contrainte'),
('CHECK6', 'Recherche d\'un groupe pour partager le plaisir de la course à pied'),
('CHECK7', 'Amélioration de son niveau'),
('CHECK8', 'La compétition'),
('CHECK9', 'Recherche de la convivialité des courses hors stades');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `Id_commande` char(8) NOT NULL,
  `Id_adherent` char(8) NOT NULL,
  `Id_typeVetement` char(8) NOT NULL,
  `Id_taille` int(2) NOT NULL,
  `DateCommande` date DEFAULT NULL,
  `Id_statutCommande` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`Id_commande`, `Id_adherent`, `Id_typeVetement`, `Id_taille`, `DateCommande`, `Id_statutCommande`) VALUES
('lraweons', 'ADMINLUN', 'TYPEVET2', 1, '2018-08-19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `Id_course` char(8) NOT NULL,
  `libelle` char(100) DEFAULT NULL,
  `Saison` int(4) DEFAULT NULL,
  `CompteRendu` char(100) DEFAULT NULL,
  `Resultats` char(100) DEFAULT NULL,
  `Siteweb` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`Id_course`, `libelle`, `Saison`, `CompteRendu`, `Resultats`, `Siteweb`) VALUES
('sllzfz', 'Trail de la Loco du Trieux', 2018, 'CRLocodutieux.pdf', 'ResLocodutieux.png', 'http://www.lalocodutrieux.com/');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `Id_galerie` char(8) NOT NULL,
  `Id_course` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`Id_galerie`, `Id_course`) VALUES
('NHGDCGU', 'JHF5VD4');

-- --------------------------------------------------------

--
-- Structure de la table `liaison_questionnaire`
--

CREATE TABLE `liaison_questionnaire` (
  `Id_questionnaire` char(8) NOT NULL,
  `Id_cat_questionnaire` char(3) NOT NULL,
  `Id_checkbox_questionnaire` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liaison_questionnaire`
--

INSERT INTO `liaison_questionnaire` (`Id_questionnaire`, `Id_cat_questionnaire`, `Id_checkbox_questionnaire`) VALUES
('QSRE1', 'C1', 'CHECK1'),
('QSRE1', 'C1', 'CHECK2'),
('QSRE1', 'C1', 'CHECK3'),
('QSRE1', 'C2', 'CHECK10'),
('QSRE1', 'C2', 'CHECK4'),
('QSRE1', 'C2', 'CHECK5'),
('QSRE1', 'C2', 'CHECK6'),
('QSRE1', 'C2', 'CHECK7'),
('QSRE1', 'C2', 'CHECK8'),
('QSRE1', 'C2', 'CHECK9'),
('QSRE1', 'C3', 'CHECK11'),
('QSRE1', 'C3', 'CHECK12'),
('QSRE1', 'C3', 'CHECK13'),
('QSRE1', 'C4', 'CHECK14'),
('QSRE1', 'C4', 'CHECK15'),
('QSRE1', 'C4', 'CHECK16'),
('QSRE1', 'C5', 'CHECK14'),
('QSRE1', 'C5', 'CHECK17'),
('QSRE1', 'C5', 'CHECK18');

-- --------------------------------------------------------

--
-- Structure de la table `photos_galerie`
--

CREATE TABLE `photos_galerie` (
  `Id_photosgalerie` char(8) NOT NULL,
  `Id_galerie` char(8) NOT NULL,
  `url` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photos_galerie`
--

INSERT INTO `photos_galerie` (`Id_photosgalerie`, `Id_galerie`, `url`) VALUES
('JJGFDJ', 'NHGDCGU', 'GLocodutieux.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `Id_questionnaire` char(8) NOT NULL,
  `Libelle_questionnaire` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`Id_questionnaire`, `Libelle_questionnaire`) VALUES
('QSRE1', 'Niveau Adhérent');

-- --------------------------------------------------------

--
-- Structure de la table `res_questionnaire`
--

CREATE TABLE `res_questionnaire` (
  `Id_res_questionnaire` char(8) NOT NULL,
  `Id_adherent` char(8) NOT NULL,
  `Condition_Physique` char(8) DEFAULT NULL,
  `Motivation` char(8) DEFAULT NULL,
  `Entrainement` char(8) DEFAULT NULL,
  `Competition` char(8) DEFAULT NULL,
  `Connaissances` char(8) DEFAULT NULL,
  `Divers` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `res_questionnaire`
--

INSERT INTO `res_questionnaire` (`Id_res_questionnaire`, `Id_adherent`, `Condition_Physique`, `Motivation`, `Entrainement`, `Competition`, `Connaissances`, `Divers`) VALUES
('gkpd8agv', 'ADMINLUN', 'CHECK1', 'CHECK4', 'CHECK13', 'CHECK15', 'CHECK17', '');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE `sexe` (
  `Id_sexe` int(1) NOT NULL,
  `Sexe` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`Id_sexe`, `Sexe`) VALUES
(1, 'Femme'),
(2, 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `Id_statut` char(10) NOT NULL,
  `libelle` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`Id_statut`, `libelle`) VALUES
('STTAR', 'Adhérent avec Remboursement'),
('STTSR', 'Adhérent sans Remboursement');

-- --------------------------------------------------------

--
-- Structure de la table `statutremboursement`
--

CREATE TABLE `statutremboursement` (
  `Id_StatutRemboursement` int(1) NOT NULL,
  `Libelle_StatutRemboursement` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statutremboursement`
--

INSERT INTO `statutremboursement` (`Id_StatutRemboursement`, `Libelle_StatutRemboursement`) VALUES
(1, 'en demande'),
(2, 'remboursé');

-- --------------------------------------------------------

--
-- Structure de la table `stcommande`
--

CREATE TABLE `stcommande` (
  `Id_statutCommande` int(1) NOT NULL,
  `libelleCommande` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stcommande`
--

INSERT INTO `stcommande` (`Id_statutCommande`, `libelleCommande`) VALUES
(1, 'effectuée'),
(2, 'payée'),
(3, 'distribuée');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE `taille` (
  `Id_taille` int(2) NOT NULL,
  `libelle_taille` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taille`
--

INSERT INTO `taille` (`Id_taille`, `libelle_taille`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XS'),
(5, 'XL'),
(6, 'XXL');

-- --------------------------------------------------------

--
-- Structure de la table `type_vetement`
--

CREATE TABLE `type_vetement` (
  `Id_typeVetement` char(8) NOT NULL,
  `Libelle` char(100) NOT NULL,
  `Url` char(100) NOT NULL,
  `Prix` int(3) NOT NULL,
  `Id_sexe` int(1) NOT NULL,
  `Details` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_vetement`
--

INSERT INTO `type_vetement` (`Id_typeVetement`, `Libelle`, `Url`, `Prix`, `Id_sexe`, `Details`) VALUES
('TYPEVET1', 'DEBARDEUR F', 'Erima-debardeur.jpg', 22, 1, 'Le débardeur ultra léger pour les longues distances !'),
('TYPEVET2', 'T-shirt PERFORMANCE F', 'Erima-t-shirt.jpg', 22, 1, 'Le t-shirt ultra léger pour les longues distances !'),
('TYPEVET3', 'Polo F', 'Erima-polo.jpg', 44, 1, 'Le polo ultra léger pour les longues distances !');

-- --------------------------------------------------------

--
-- Structure de la table `validationremboursement`
--

CREATE TABLE `validationremboursement` (
  `Id_ValidationRemboursement` int(1) NOT NULL,
  `Libelle_ValidationRemboursement` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `validationremboursement`
--

INSERT INTO `validationremboursement` (`Id_ValidationRemboursement`, `Libelle_ValidationRemboursement`) VALUES
(1, 'non validé'),
(2, 'validé');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`Id_adherent`),
  ADD KEY `fk_adherentSexe` (`Id_sexe`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Id_article`);

--
-- Index pour la table `cat_questionnaire`
--
ALTER TABLE `cat_questionnaire`
  ADD PRIMARY KEY (`Id_cat_questionnaire`);

--
-- Index pour la table `checkbox_questionnaire`
--
ALTER TABLE `checkbox_questionnaire`
  ADD PRIMARY KEY (`Id_checkbox_questionnaire`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`Id_commande`),
  ADD KEY `fk_adherentC` (`Id_adherent`),
  ADD KEY `fk_type_vetementC` (`Id_typeVetement`),
  ADD KEY `fk_tailleC` (`Id_taille`),
  ADD KEY `fk_statutCommandeC` (`Id_statutCommande`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Id_course`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`Id_galerie`),
  ADD KEY `fk_galerie` (`Id_course`);

--
-- Index pour la table `liaison_questionnaire`
--
ALTER TABLE `liaison_questionnaire`
  ADD PRIMARY KEY (`Id_checkbox_questionnaire`,`Id_questionnaire`,`Id_cat_questionnaire`),
  ADD KEY `fk_liasonQ_questionnaire` (`Id_questionnaire`),
  ADD KEY `fk_liaisonQ_cat_questionnaire` (`Id_cat_questionnaire`);

--
-- Index pour la table `photos_galerie`
--
ALTER TABLE `photos_galerie`
  ADD PRIMARY KEY (`Id_galerie`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`Id_questionnaire`);

--
-- Index pour la table `res_questionnaire`
--
ALTER TABLE `res_questionnaire`
  ADD PRIMARY KEY (`Id_res_questionnaire`),
  ADD KEY `fk_res_questionnairet` (`Id_adherent`);

--
-- Index pour la table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`Id_sexe`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`Id_statut`);

--
-- Index pour la table `statutremboursement`
--
ALTER TABLE `statutremboursement`
  ADD PRIMARY KEY (`Id_StatutRemboursement`);

--
-- Index pour la table `stcommande`
--
ALTER TABLE `stcommande`
  ADD PRIMARY KEY (`Id_statutCommande`);

--
-- Index pour la table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`Id_taille`);

--
-- Index pour la table `type_vetement`
--
ALTER TABLE `type_vetement`
  ADD PRIMARY KEY (`Id_typeVetement`),
  ADD KEY `fk_typeAdherentSexe` (`Id_sexe`);

--
-- Index pour la table `validationremboursement`
--
ALTER TABLE `validationremboursement`
  ADD PRIMARY KEY (`Id_ValidationRemboursement`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `fk_adherentSexe` FOREIGN KEY (`Id_sexe`) REFERENCES `sexe` (`Id_sexe`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_adherentC` FOREIGN KEY (`Id_adherent`) REFERENCES `adherent` (`Id_adherent`),
  ADD CONSTRAINT `fk_statutCommandeC` FOREIGN KEY (`Id_statutCommande`) REFERENCES `stcommande` (`Id_statutCommande`),
  ADD CONSTRAINT `fk_tailleC` FOREIGN KEY (`Id_taille`) REFERENCES `taille` (`Id_taille`),
  ADD CONSTRAINT `fk_type_vetementC` FOREIGN KEY (`Id_typeVetement`) REFERENCES `type_vetement` (`Id_typeVetement`);

--
-- Contraintes pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `fk_galerie` FOREIGN KEY (`Id_course`) REFERENCES `course` (`Id_course`);

--
-- Contraintes pour la table `liaison_questionnaire`
--
ALTER TABLE `liaison_questionnaire`
  ADD CONSTRAINT `fk_liaisonQ_cat_questionnaire` FOREIGN KEY (`Id_cat_questionnaire`) REFERENCES `cat_questionnaire` (`Id_cat_questionnaire`),
  ADD CONSTRAINT `fk_liaisonQ_checkbox_questionnaire` FOREIGN KEY (`Id_checkbox_questionnaire`) REFERENCES `checkbox_questionnaire` (`Id_checkbox_questionnaire`),
  ADD CONSTRAINT `fk_liasonQ_questionnaire` FOREIGN KEY (`Id_questionnaire`) REFERENCES `questionnaire` (`Id_questionnaire`);

--
-- Contraintes pour la table `photos_galerie`
--
ALTER TABLE `photos_galerie`
  ADD CONSTRAINT `fk_photosgaleriet` FOREIGN KEY (`Id_galerie`) REFERENCES `galerie` (`Id_galerie`);

--
-- Contraintes pour la table `res_questionnaire`
--
ALTER TABLE `res_questionnaire`
  ADD CONSTRAINT `fk_res_questionnairet` FOREIGN KEY (`Id_adherent`) REFERENCES `adherent` (`Id_adherent`);

--
-- Contraintes pour la table `type_vetement`
--
ALTER TABLE `type_vetement`
  ADD CONSTRAINT `fk_typeAdherentSexe` FOREIGN KEY (`Id_sexe`) REFERENCES `sexe` (`Id_sexe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
