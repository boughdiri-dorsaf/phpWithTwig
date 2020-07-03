-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 mai 2020 à 23:23
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ramsam`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre_hotel`
--

DROP TABLE IF EXISTS `chambre_hotel`;
CREATE TABLE IF NOT EXISTS `chambre_hotel` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_hotel` smallint(6) NOT NULL,
  `id_reservation` smallint(6) NOT NULL,
  `entree` date NOT NULL,
  `sortie` date NOT NULL,
  `type_chambre` tinyint(4) NOT NULL,
  `nbre_ad` tinyint(4) NOT NULL,
  `nbre_enf` tinyint(4) NOT NULL,
  `nbre_bb` tinyint(4) NOT NULL,
  `nom_ad1` varchar(255) DEFAULT NULL,
  `nom_ad2` varchar(255) DEFAULT NULL,
  `nom_ad3` varchar(255) DEFAULT NULL,
  `nom_ad4` varchar(255) DEFAULT NULL,
  `nom_ad5` varchar(255) DEFAULT NULL,
  `nom_enf1` varchar(255) DEFAULT NULL,
  `age_enf1` int(11) DEFAULT NULL,
  `nom_enf2` varchar(255) DEFAULT NULL,
  `age_enf2` int(11) DEFAULT NULL,
  `nom_enf3` varchar(255) DEFAULT NULL,
  `age_enf3` int(11) DEFAULT NULL,
  `nom_enf4` varchar(255) DEFAULT NULL,
  `age_enf4` int(11) DEFAULT NULL,
  `nom_enf5` varchar(255) DEFAULT NULL,
  `age_enf5` int(11) DEFAULT NULL,
  `arrangement` varchar(20) NOT NULL,
  `achat` float DEFAULT NULL,
  `vente` float DEFAULT NULL,
  `remarque` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre_hotel`
--

INSERT INTO `chambre_hotel` (`id`, `id_hotel`, `id_reservation`, `entree`, `sortie`, `type_chambre`, `nbre_ad`, `nbre_enf`, `nbre_bb`, `nom_ad1`, `nom_ad2`, `nom_ad3`, `nom_ad4`, `nom_ad5`, `nom_enf1`, `age_enf1`, `nom_enf2`, `age_enf2`, `nom_enf3`, `age_enf3`, `nom_enf4`, `age_enf4`, `nom_enf5`, `age_enf5`, `arrangement`, `achat`, `vente`, `remarque`) VALUES
(1, 5, 1, '2019-12-24', '2019-12-25', 1, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LPD', NULL, NULL, '0'),
(2, 5, 1, '2019-12-24', '2019-12-25', 1, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PC', NULL, NULL, '0'),
(3, 5, 2, '2019-12-24', '2019-12-25', 1, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'All In Soft', NULL, NULL, '0'),
(4, 5, 2, '2019-12-24', '2019-12-25', 1, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LPD', NULL, NULL, '0'),
(5, 5, 2, '2019-12-24', '2019-12-25', 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LPD', NULL, NULL, '0'),
(6, 5, 3, '2019-12-24', '2019-12-25', 1, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LPD', NULL, NULL, '0'),
(7, 5, 3, '2019-12-24', '2019-12-25', 1, 1, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PC', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Structure de la table `client_indiv`
--

DROP TABLE IF EXISTS `client_indiv`;
CREATE TABLE IF NOT EXISTS `client_indiv` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `tel` text NOT NULL,
  `mail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client_indiv`
--

INSERT INTO `client_indiv` (`id`, `nom`, `tel`, `mail`) VALUES
(1, 'jana', '45258693', 'jana@gmail.com'),
(2, 'Sami', '45258695', 'samia@gmail.com'),
(3, 'Sahar', '45258693', 'sahar@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nom` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `sujet` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `date`, `nom`, `mail`, `tel`, `sujet`, `message`) VALUES
(1, '2019-12-24', 'نهال الدامي', 'daminihel@gmail.com', '54212211', 'sujet', 'test msg'),
(2, '2020-03-16', 'mariem', 'dorsaf123@gmail.com', '45445544', 'test', 'test dorsaf');

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_bin,
  `img_descr` text COLLATE utf8_bin,
  `carousel1` text COLLATE utf8_bin,
  `carousel2` text COLLATE utf8_bin,
  `carousel3` text COLLATE utf8_bin,
  `carousel4` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id`, `description`, `img_descr`, `carousel1`, `carousel2`, `carousel3`, `carousel4`) VALUES
(1, '<p>Situ&eacute; &agrave; B&eacute;ja, &agrave; 100 km de la capitale et &agrave; 33 km de Dougga, le RamSam Hotel propose des chambres climatis&eacute;es avec connexion Wi-Fi gratuite. Cet h&ocirc;tel 2 &eacute;toiles abrite un restaurant. L&#39;&eacute;tablissement propose une r&eacute;ception ouverte 24h / 24 et un service d&#39;&eacute;tage.<br />\r\n&Agrave; l&#39;h&ocirc;tel, toutes les chambres sont &eacute;quip&eacute;es d&#39;une armoire. Les chambres sont &eacute;quip&eacute;es d&#39;une salle de bains privative, tandis que certaines chambres du RamSam Hotel disposent &eacute;galement d&#39;un balcon.<br />\r\nUn petit-d&eacute;jeuner continental est servi chaque matin sur place.<br />\r\nCette propri&eacute;t&eacute; a &eacute;galement l&#39;un des emplacements les mieux not&eacute;s &agrave; B&eacute;ja! Les clients sont plus heureux &agrave; ce sujet par rapport aux autres propri&eacute;t&eacute;s de la r&eacute;gion.<br />\r\nCette propri&eacute;t&eacute; est &eacute;galement &eacute;valu&eacute;e pour la meilleure valeur &agrave; B&eacute;ja! Les clients en ont plus pour leur argent par rapport &agrave; d&#39;autres propri&eacute;t&eacute;s de cette ville.</p>\r\n', 'carousel/1.jpg', 'carousel/2.jpg', 'carousel/3.jpg', 'carousel/4.jpg', 'carousel/5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `restaurants`
--

INSERT INTO `restaurants` (`id`, `nom`, `image`, `description`) VALUES
(1, 'Restaurant', 'resto/2.jpg', '<p>Le grand restaurant buffet avec sa large terrasse sur piscine centrale offre le service petit déjeuner, déjeuner et diner en proposant une cuisine méditerranéenne.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` text COLLATE utf8_bin,
  `type` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `prix` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `nom`, `image`, `type`, `description`, `prix`, `date`) VALUES
(1, 'Chambre Double', 'rooms/1.png', 2, '<p>Les chambres sont agencées en lit double ou twin avec salle de bain dont 2 sont aménagées pour personnes à mobilité réduite, facilement accessible en chaises roulantes.</p>\r\n', NULL, NULL),
(2, 'Chambre avec lits jumeaux', 'rooms/2.jpg', 1, '<p>Les chambres sont agencées en lits jumeaux avec salle de bain dont 2 sont aménagées pour personnes à mobilité réduite, facilement accessible en chaises roulantes.</p>\r\n', NULL, NULL),
(3, 'test', 'rooms/3.jpg', NULL, 'testttttttttttttttttttttttttttttttttttttttttttttttttttttttt\r\ntttttttttttttttttt\r\ntttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt\r\ntttttttttttttttttt\r\nlllllllllllllll\r\nhhhhhhhhhhhhh', 50, NULL),
(4, 'test2', 'rooms/4.jpg', NULL, 'bjhgghjg gh gjghgh ghjgjghgjggggggggggggggjhghhg  ghgghgjhhghghg', 800, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `saison_hotel`
--

DROP TABLE IF EXISTS `saison_hotel`;
CREATE TABLE IF NOT EXISTS `saison_hotel` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `agent` smallint(6) NOT NULL,
  `date_saisie` varchar(10) NOT NULL,
  `id_hotel` smallint(6) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `lpd_achat` float(9,3) DEFAULT NULL,
  `dp_achat` float(9,3) DEFAULT NULL,
  `pc_achat` float(9,3) DEFAULT NULL,
  `all_in_soft_achat` float(9,3) DEFAULT NULL,
  `all_in_achat` float(9,3) DEFAULT NULL,
  `ultra_all_in_achat` float(9,3) DEFAULT NULL,
  `supp_sing_achat` float(9,3) DEFAULT NULL,
  `lpd_vente` float(9,3) DEFAULT NULL,
  `dp_vente` float(9,3) DEFAULT NULL,
  `pc_vente` float(9,3) DEFAULT NULL,
  `all_in_soft_vente` float(9,3) DEFAULT NULL,
  `all_in_vente` float(9,3) DEFAULT NULL,
  `ultra_all_in_vente` float(9,3) DEFAULT NULL,
  `supp_week` int(11) DEFAULT NULL,
  `supp_sing_vente` float(9,3) DEFAULT NULL,
  `red_3_ad` float(9,2) DEFAULT NULL,
  `red_4_ad` float(9,2) DEFAULT NULL,
  `age_enf_gratuit` int(6) DEFAULT NULL,
  `supp_vue_piscine` text,
  `supp_vue_piscine_vente` float(9,3) DEFAULT NULL,
  `supp_vue_mer` text,
  `supp_vue_mer_vente` float(9,3) DEFAULT NULL,
  `red_1enf_0ad` float(9,2) DEFAULT NULL,
  `red_2enf_0ad` float(9,2) DEFAULT NULL,
  `red_3enf_0ad` float(9,2) DEFAULT NULL,
  `red_4enf_0ad` float(9,2) DEFAULT NULL,
  `red_1enf_1ad` float(9,2) DEFAULT NULL,
  `red_2enf_1ad` float(9,2) DEFAULT NULL,
  `red_3enf_1ad` float(9,2) DEFAULT NULL,
  `red_1enf_2ad` float(9,2) DEFAULT NULL,
  `red_2enf_2ad` float(9,2) DEFAULT NULL,
  `red_1enf_3ad` float(9,2) DEFAULT NULL,
  `min_stay` smallint(4) NOT NULL,
  `allotement` smallint(6) DEFAULT NULL,
  `delai_retrocession` smallint(6) NOT NULL,
  `delai_annulation` smallint(6) NOT NULL,
  `id_condition_annulation` int(11) DEFAULT NULL,
  `cote_bebe_achat` float(9,3) DEFAULT NULL,
  `cote_bebe_vente` float(9,3) DEFAULT NULL,
  `etat_cote_bebe` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `saison_hotel`
--

INSERT INTO `saison_hotel` (`id`, `agent`, `date_saisie`, `id_hotel`, `date_debut`, `date_fin`, `lpd_achat`, `dp_achat`, `pc_achat`, `all_in_soft_achat`, `all_in_achat`, `ultra_all_in_achat`, `supp_sing_achat`, `lpd_vente`, `dp_vente`, `pc_vente`, `all_in_soft_vente`, `all_in_vente`, `ultra_all_in_vente`, `supp_week`, `supp_sing_vente`, `red_3_ad`, `red_4_ad`, `age_enf_gratuit`, `supp_vue_piscine`, `supp_vue_piscine_vente`, `supp_vue_mer`, `supp_vue_mer_vente`, `red_1enf_0ad`, `red_2enf_0ad`, `red_3enf_0ad`, `red_4enf_0ad`, `red_1enf_1ad`, `red_2enf_1ad`, `red_3enf_1ad`, `red_1enf_2ad`, `red_2enf_2ad`, `red_1enf_3ad`, `min_stay`, `allotement`, `delai_retrocession`, `delai_annulation`, `id_condition_annulation`, `cote_bebe_achat`, `cote_bebe_vente`, `etat_cote_bebe`) VALUES
(1, 2, '2019-11-27', 1, '2019-12-24', '2020-02-13', 99.000, 104.000, 122.000, 134.000, 142.000, 0.000, 33.500, 113.850, 119.600, 140.300, 154.100, 163.300, 0.000, 0, 38.525, 0.70, 0.00, 2, '0', 0.000, '19', 21.000, 1.00, 1.00, 0.50, 0.00, 1.00, 0.50, 0.00, 0.50, 0.50, 0.00, 1, 0, 1, 1, 0, 0.000, 0.000, 1),
(2, 2, '2019-11-27', 1, '2020-01-09', '2020-04-16', 72.000, 77.000, 95.000, 107.000, 115.000, 0.000, 26.750, 82.800, 88.550, 109.250, 123.050, 132.250, 0.000, 0, 30.762, 0.70, 0.00, 2, '0', 0.000, '18', 20.000, 1.00, 1.00, 0.50, 0.00, 1.00, 0.50, 0.00, 0.50, 0.50, 0.00, 1, 0, 1, 1, 0, 0.000, 0.000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `image`, `description`) VALUES
(1, 'Piscine', 'services/2.png', '<p>L’hôtel Ramsam dispose 2 piscines :  l&#39;une à l&#39;intérieur et la dernière spécialement pour les enfants</p>\r\n'),
(3, 'SPA', 'services/3.png', '<p>Des massages et des soins de balnéothérapie et de beauté sont disponibles à l&#39;espace Cure et Spa.</p>\r\n'),
(4, 'Café Maure', 'services/1.png', '<p>Marina Palace dispose un Café Maure avec chicha que vous devez essayer, c’est une évidence.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `type_room`
--

DROP TABLE IF EXISTS `type_room`;
CREATE TABLE IF NOT EXISTS `type_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_room`
--

INSERT INTO `type_room` (`id`, `type`) VALUES
(1, 'Lits jumeaux'),
(2, 'Double'),
(3, 'Familiale');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(7, 'admin@ramsam.com', '$2y$10$bzUv97WnGHU7iWQRF4uGjeiMaTvfPr2sCpkNJ/xaxEMhAdk8DGGa6', 'admin', 0, 1, 1, 0, 1577092014, 1577103738, 0),
(8, 'dorsaf@gmail.com', '$2y$10$PdoPGmTHZN4I9Ie3h/bRBu/g8p1KVCT9UjPfSvcvhtleO4RelVgDG', 'dorsaf', 0, 1, 1, 0, 1584378461, 1584378474, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users_confirmations`
--

DROP TABLE IF EXISTS `users_confirmations`;
CREATE TABLE IF NOT EXISTS `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `email_expires` (`email`,`expires`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users_remembered`
--

DROP TABLE IF EXISTS `users_remembered`;
CREATE TABLE IF NOT EXISTS `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users_resets`
--

DROP TABLE IF EXISTS `users_resets`;
CREATE TABLE IF NOT EXISTS `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `user_expires` (`user`,`expires`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users_throttling`
--

DROP TABLE IF EXISTS `users_throttling`;
CREATE TABLE IF NOT EXISTS `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`bucket`),
  KEY `expires_at` (`expires_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('KAz89KsBQz6d9ZAqjQgXV35YhcgcnYZyaTs4CRM3xns', 29, 1577092014, 1577164014),
('fclkUNBng_tEDeHsdRUFXhnrTOYxq-3MIA2EQiFuIHg', 29, 1577092014, 1577164014),
('sZYXdcyzJCIQjhLWDhxqtQgKYyGMgsFMjHNxwbpWOAE', 49, 1577092014, 1577164014),
('CUeQSH1MUnRpuE3Wqv_fI3nADvMpK_cg6VpYK37vgIw', 4, 1577092014, 1577524014),
('ejWtPDKvxt-q7LZ3mFjzUoIWKJYzu47igC8Jd9mffFk', 66.2564, 1577103737, 1577643737),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 73.0039, 1584378474, 1584918474),
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 4, 1584378461, 1584810461),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 49, 1584378461, 1584450461),
('uOWAoANchAgzSsw1J9Zinq9ZyVq-TTtRbzlaQNxaMsw', 29, 1584378461, 1584450461),
('_0zHUi4nBHGgKmNZnn6ssH5Bd9U6Z3rUlW2geUZ5lws', 29, 1584378461, 1584450461);

-- --------------------------------------------------------

--
-- Structure de la table `vente_hotel`
--

DROP TABLE IF EXISTS `vente_hotel`;
CREATE TABLE IF NOT EXISTS `vente_hotel` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idBrave` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `date` text NOT NULL,
  `id_client` smallint(6) NOT NULL,
  `passager` text NOT NULL,
  `phone` text NOT NULL,
  `hotelId` int(10) UNSIGNED NOT NULL,
  `fournisseurId` int(11) DEFAULT NULL,
  `entree` text NOT NULL,
  `sortie` text NOT NULL,
  `arrangement` text NOT NULL,
  `achat` float(9,3) NOT NULL,
  `vente` float(9,3) NOT NULL,
  `etat_client` smallint(6) NOT NULL,
  `etat_fournisseur` smallint(6) NOT NULL,
  `etat_dossier` tinyint(4) NOT NULL,
  `remarque` text NOT NULL,
  `id_client_indiv` int(11) DEFAULT NULL,
  `uniqueId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente_hotel`
--

INSERT INTO `vente_hotel` (`id`, `idBrave`, `id_user`, `date`, `id_client`, `passager`, `phone`, `hotelId`, `fournisseurId`, `entree`, `sortie`, `arrangement`, `achat`, `vente`, `etat_client`, `etat_fournisseur`, `etat_dossier`, `remarque`, `id_client_indiv`, `uniqueId`) VALUES
(1, 0, 1, '2019-12-24', 135, 'jana', '45258693', 5, NULL, '2019-12-20', '2019-12-21', '0', 0.000, 0.000, 0, 0, 0, '0', 1, '5e023e5b3a462'),
(2, 0, 1, '2019-12-24', 135, 'Sami', '45258695', 5, NULL, '2019-12-20', '2019-12-21', '0', 0.000, 0.000, 0, 0, 0, '0', 2, '5e023eddd59a5'),
(3, 0, 1, '2019-12-24', 135, 'Sahar', '45258693', 5, NULL, '2019-12-20', '2019-12-21', '0', 0.000, 0.000, 0, 0, 0, '0', 3, '5e023f1200d8a');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
