-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 16 juin 2020 à 03:06
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` date NOT NULL,
  `id_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_user`, `commentaire`, `date_commentaire`, `id_publication`) VALUES
(78, '54786866598', 'ceci est un test de commentaire', '2020-06-16', 212),
(79, '05844445526', 'ceci est commentaire pour le tester', '2020-06-16', 212),
(80, '69852524487', 'ceci est commentaire pour le tester par anis lajmi', '2020-06-16', 211);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `nom_filiere` varchar(15) CHARACTER SET utf8 NOT NULL,
  `cin_user` varchar(8) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`nom_filiere`, `cin_user`) VALUES
('', '01478563'),
('', '02058445'),
('', '02145844'),
('', '02698524'),
('D-Fonda', '03214587'),
('', '03785214'),
('D-TMW', '11459863'),
('D-TMW', '11557896'),
('D-Fonda', '11941556'),
('', '12365894'),
('D-TMW', '12479655'),
('P-SI', '12547866');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `num_groupe` varchar(4) NOT NULL,
  `cin_user` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='group tabel';

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`num_groupe`, `cin_user`) VALUES
('', '01478563'),
('', '02058445'),
('', '02145844'),
('', '02698524'),
('SG', '03214587'),
('', '03785214'),
('AV', '11459863'),
('AV', '11557896'),
('TD1', '11941556'),
('', '12365894'),
('AV', '12479655'),
('TD7', '12547866');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_user1` varchar(11) NOT NULL,
  `id_user2` varchar(11) NOT NULL,
  `date_envoie` datetime NOT NULL,
  `message_text` text NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='message tabel';

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `id_user1`, `id_user2`, `date_envoie`, `message_text`, `nom_user`, `prenom_user`) VALUES
(14, '94155556404', '94155556404', '2020-06-16 01:06:07', 'Ceci Est Un Premier Exemple De message Envoyer D&#39;aprÃ¨s La Page D&#39;administrateur\r\n', 'malek syrine', 'fajria'),
(15, '94155556404', '54786866598', '2020-06-16 01:06:58', 'Ceci Est Un Premier Exemple De message Envoyer D&#39;aprÃ¨s La Page D&#39;administrateur\r\n', 'malek syrine', 'fajria');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_user` varchar(50) NOT NULL,
  `date_notif` varchar(50) NOT NULL,
  `text_notif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_user`, `date_notif`, `text_notif`) VALUES
('94155556404', '2020-06-16 01:06:22', 'Ceci Est Un deuxiÃ¨me Exemple De Notification Envoyer D&#39;aprÃ¨s La Page D&#39;administrateur\r\n'),
('94155556404', '2020-06-16 01:06:50', 'ceci est un premier exemple de notification envoyer d&#39;aprÃ¨s la page d&#39;administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id_profile` varchar(8) NOT NULL,
  `cin_user` varchar(8) NOT NULL,
  `nom_user` varchar(15) NOT NULL,
  `prenom_user` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `etat_user` varchar(15) NOT NULL,
  `telephone` varchar(8) NOT NULL,
  `date_inscription` varchar(60) NOT NULL,
  `photo_profile` varchar(500) NOT NULL,
  `vk` varchar(500) NOT NULL,
  `verifier` varchar(3) NOT NULL DEFAULT 'non',
  `date_veirfier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='profil tabel';

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id_profile`, `cin_user`, `nom_user`, `prenom_user`, `date_naissance`, `sexe`, `etat_user`, `telephone`, `date_inscription`, `photo_profile`, `vk`, `verifier`, `date_veirfier`) VALUES
('sourbel3', '01478563', 'soumaiya', 'ghorbel', '1983-05-18', 'Homme', 'Enseignient(e)', '55217489', '2020-06-16 02:06:10', 'Homme.png', '52bbb8e8e764391bac54ebb0a838f2df', 'non', ''),
('inemoun5', '02058445', 'ines', 'kammoun', '1976-02-16', 'Femme', 'Enseignient(e)', '98452663', '2020-06-16 02:06:02', 'Femme.png', 'd60f7d1d0e5060a602659afcf6aa363e', 'non', ''),
('ahmah46', '02145844', 'ahmed', 'salah', '1965-03-19', 'Homme', 'Enseignient(e)', '22889966', '2020-06-16 01:06:26', 'Homme.png', '56dc65f803dc274f6159cba61824e3f1', 'non', ''),
('animi45', '02698524', 'anis', 'lajmi', '1970-04-17', 'Homme', 'Enseignient(e)', '23548745', '2020-06-16 02:06:14', 'Homme.png', 'a4b1a2a425592e4f8da46acad739233e', 'non', ''),
('niddi75', '03214587', 'nidhal', 'hamdi', '1999-02-14', 'Homme', 'Etudient(e)', '23987455', '2020-06-16 01:06:51', 'Homme.png', '90b50f7c70c1d9839f8c7689cc996d96', 'non', ''),
('amibelsi', '03785214', 'amine', 'trabelsi', '1975-05-17', 'Homme', 'Enseignient(e)', '55786394', '2020-06-16 02:06:33', 'Homme.png', 'c09e65fe924f60988fa98a12118334f1', 'non', ''),
('amigui34', '11459863', 'amir', 'trigui', '1999-05-15', 'Homme', 'Etudient(e)', '23985674', '2020-06-16 01:06:27', 'Homme.png', 'c103bd4297c6eb47dce0e048284c422f', 'non', ''),
('taykthir', '11557896', 'tayssir', 'boukthir', '1999-10-05', 'Femme', 'Etudient(e)', '50784520', '2020-06-16 01:06:37', 'Femme.png', 'ef4f234cb4cc28fadfe660f1a3aa4584', 'non', ''),
('mouria65', '11941556', 'mouhamed dhia', 'fajria', '1999-03-15', 'Homme', 'Etudient(e)', '20940425', '2020-05-29 14:25:10', '83677538_1079056205771181_6272550009229541376_o.jpg', '', 'oui', ''),
('ibrri46', '12365894', 'ibrahim', 'sebri', '1969-08-30', 'Homme', 'Enseignient(e)', '98411256', '2020-06-16 02:06:16', 'Homme.png', '021b159b2c670933db126519451a0444', 'non', ''),
('ahlhlouf', '12479655', 'ahlem', 'makhlouf', '1999-06-15', 'Femme', 'Etudient(e)', '22887452', '2020-06-16 01:06:31', 'Femme.png', 'b0b0829f098605720e03727b0744696e', 'non', ''),
('oumemi62', '12547866', 'oumaima', 'hamemi', '1972-04-05', 'Femme', 'Etudient(e)', '23559852', '2020-06-16 01:06:55', 'Femme.png', 'eccbc6ee4975f8e87205ea708d619651', 'non', '');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  `contenu_publication` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `id_user`, `date_publication`, `contenu_publication`) VALUES
(211, '54786866598', '2020-06-16 01:46:02', 'bonjour je mappelle oumaima et ceci est test de publication'),
(212, '54786866598', '2020-06-16 01:48:59', 'bonjour je mappelle oumaima et ceci est ma 2eme test de publication avec modification'),
(214, '69852524487', '2020-06-16 02:11:34', 'bonjour je m appel anis lajmi je suis un enseignant et ceci est ma premiere publication');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `adresse_user` varchar(35) NOT NULL,
  `password_user` varchar(500) NOT NULL,
  `type_user` varchar(11) NOT NULL DEFAULT 'U',
  `id_profile` varchar(8) NOT NULL,
  `nbr_visite` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user tabel';

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `adresse_user`, `password_user`, `type_user`, `id_profile`, `nbr_visite`) VALUES
('47965655874', 'ahlemmakhlouf@gmail.com', '$2y$10$fPYROakzGhL2RmsPJo/ucuYx1kvlF3N7ChY88O5Sml7iR0TI1yBNW', 'user', 'ahlhlouf', -1),
('14584844899', 'ahmedsalah@gmail.com', '$2y$10$57H.cchlpM2BF49yITeA6ut4ZIEVlaRxguvAXltg4SYuRDiyykL2K', 'user', 'ahmah46', -1),
('78521214863', 'amin@yahoo.fr', '$2y$10$nMA/rUN/ouahZsVa1JvAjOZ4gYgx93chhxIXhw66iO0JgD2ISPTVK', 'user', 'amibelsi', -1),
('45986863856', 'amir@gmail.com', '$2y$10$Ns8UA5FC5ohRUs7df3rdyeNj7KH99.Lwi3SrGhnxv00gdlqgzN1re', 'user', 'amigui34', -1),
('69852524487', 'anislajmi@gmail.com', '$2y$10$MKyC1PAHU2kwcbfYbt1P4eoUmVll.92UCZV3HYJt41SNX1axmYRcy', 'user', 'animi45', 1),
('54786866598', 'hamemioumaima@gmail.com', '$2y$10$9KJLD6CNhMhE3qvFEwvW4.15jGdSgp22qSEH3Fre7kE96QAQQSADC', 'user', 'oumemi62', 1),
('36589894112', 'ibrahim@gmail.com', '$2y$10$Y6ihhUWyOLM/RAw/M7GThe7nhwH/6PCPdknEQNgl3avASCqxJ20be', 'user', 'ibrri46', -1),
('05844445526', 'ineskamoun@gmail.com', '$2y$10$qu6vJIV9DruBB2ufrYqciOsiKYAYkFjcPUGH.I6MIPHD4fTkukFaa', 'user', 'inemoun5', 1),
('94155556404', 'mouhameddhiafajria@gmail.com', '$2y$10$1K.OEmp2oPgTFbcwlh4xW.FxssElLm5ITLE5xMI1So.0pkevDGWbG', 'super admin', 'mouria65', 0),
('21458587874', 'nidhalhamdi@gmail.com', '$2y$10$ORqh95OVnr9ldvk7juQwxeC1tSfc2rSInBV6smCd4Y/GjbDV7oEB2', 'user', 'niddi75', 1),
('47856563174', 'soumayaghorbel@gmail.com', '$2y$10$DepWmhlZ2MVxPa5L7FnT1uKymLmW.fydputVMc30S0H/EBFodDKQe', 'user', 'sourbel3', -1),
('55789896845', 'tayssirboukthir@gmail.com', '$2y$10$VwNJgJ/6ZnJTeH/2Hms5RugJFKbZcoACCWaYE2ujDd5qNB3hoInF.', 'user', 'taykthir', -1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD UNIQUE KEY `cin_user` (`cin_user`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD UNIQUE KEY `cin_user` (`cin_user`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD UNIQUE KEY `date` (`date_notif`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`cin_user`),
  ADD UNIQUE KEY `id_profile` (`id_profile`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`adresse_user`,`id_user`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
