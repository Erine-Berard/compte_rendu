-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 avr. 2022 à 11:29
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
-- Base de données : `compte-rendu`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

DROP TABLE IF EXISTS `familles`;
CREATE TABLE IF NOT EXISTS `familles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `familles`
--

INSERT INTO `familles` (`id`, `created_at`, `updated_at`, `nom`) VALUES
(1, NULL, NULL, 'Antibiotique de la famille des macrolides'),
(2, NULL, NULL, 'Antidépresseur imipraminique (tricyclique)'),
(3, NULL, NULL, 'Antidépresseur d\'action centrale');

-- --------------------------------------------------------

--
-- Structure de la table `labos`
--

DROP TABLE IF EXISTS `labos`;
CREATE TABLE IF NOT EXISTS `labos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `labos`
--

INSERT INTO `labos` (`id`, `created_at`, `updated_at`, `nom`) VALUES
(1, NULL, NULL, 'Swiss Kane'),
(2, NULL, NULL, 'Bichat'),
(3, NULL, NULL, 'Gyverny');

-- --------------------------------------------------------

--
-- Structure de la table `lieux_exercices`
--

DROP TABLE IF EXISTS `lieux_exercices`;
CREATE TABLE IF NOT EXISTS `lieux_exercices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lieux_exercices`
--

INSERT INTO `lieux_exercices` (`id`, `created_at`, `updated_at`, `nom`) VALUES
(1, NULL, NULL, 'Médecin Hospitalier'),
(2, NULL, NULL, 'Médecine de Ville'),
(3, NULL, NULL, 'Personnel de santé'),
(4, NULL, NULL, 'Pharmacien Hospitalier'),
(5, NULL, NULL, 'Pharmacien Officine');

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

DROP TABLE IF EXISTS `medicaments`;
CREATE TABLE IF NOT EXISTS `medicaments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `famille` bigint(20) UNSIGNED NOT NULL,
  `composition` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effetsIndesirables` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contreIndications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` decimal(3,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idFamille` (`famille`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `medicaments`
--

INSERT INTO `medicaments` (`id`, `created_at`, `updated_at`, `nom`, `famille`, `composition`, `effetsIndesirables`, `contreIndications`, `prix`) VALUES
(1, NULL, NULL, 'CLAZER', 1, 'Clarithromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l\'ulcère gastro-duodénal, en association avec d\'autres médicament', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides', '10'),
(2, NULL, NULL, 'DEPRAMIL', 2, 'Clomipramine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères. Certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l\'enfant', 'Ce médicament est contre-indiqué en cas de glaucome ou d\'adénome de la prostate, d\'infarctus récent, ou si vous avez reçu un traitement pas IMAO durant les 2 semaines précédentes ou en cas d\'allergie aux antidépresseurs imipraminiques', '15'),
(3, NULL, NULL, 'DIMIRTAM', 3, 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisode dépressifs sévères', 'La prise de ce produit est contre-indiquée en cas d\'allergie à l\'un des constituants', '13'),
(4, NULL, NULL, 'DOLORIL', 1, '', '', '', '0'),
(5, NULL, NULL, 'NORMADOR', 1, '', '', '', '0'),
(6, NULL, NULL, 'EQUILAR', 1, '', '', '', '0'),
(7, NULL, NULL, 'JOVENIL', 1, '', '', '', '0'),
(8, NULL, NULL, 'PIRIZAN', 1, '', '', '', '0'),
(9, NULL, NULL, 'INSECTIL', 1, '', '', '', '0'),
(10, NULL, NULL, 'EVEILLOR', 1, '', '', '', '0'),
(11, NULL, NULL, 'LITHORINE', 1, '', '', '', '0'),
(12, NULL, NULL, 'TROXADET', 1, '', '', '', '0');

-- --------------------------------------------------------

--
-- Structure de la table `medicament_rapports`
--

DROP TABLE IF EXISTS `medicament_rapports`;
CREATE TABLE IF NOT EXISTS `medicament_rapports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idMedicament` bigint(11) UNSIGNED NOT NULL,
  `idRapport` bigint(11) UNSIGNED NOT NULL,
  `quantite` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMedicament` (`idMedicament`),
  KEY `idRapports` (`idRapport`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `medicament_rapports`
--

INSERT INTO `medicament_rapports` (`id`, `created_at`, `updated_at`, `idMedicament`, `idRapport`, `quantite`) VALUES
(7, '2022-04-21 20:18:55', '2022-04-21 20:18:55', 1, 4, 3),
(8, '2022-04-21 20:18:55', '2022-04-21 20:18:55', 1, 4, 23),
(9, '2022-04-21 20:20:06', '2022-04-21 20:20:06', 1, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_20_200555_create_visiteus_table', 1),
(6, '2022_04_21_075245_create_rapports_table', 2),
(7, '2022_04_21_111704_create_medicaments_table', 3),
(8, '2022_04_21_111810_create_medicament_rapports_table', 3),
(9, '2022_04_21_174058_create_familles_table', 4),
(10, '2022_04_21_184357_create_praticiens_table', 5),
(11, '2022_04_21_191303_create_lieux_exercices_table', 6),
(12, '2022_04_21_205535_create_secteurs_table', 7),
(13, '2022_04_21_205637_create_labos_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `praticiens`
--

DROP TABLE IF EXISTS `praticiens`;
CREATE TABLE IF NOT EXISTS `praticiens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coeff` decimal(5,0) NOT NULL,
  `lieu` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idLieux` (`lieu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `praticiens`
--

INSERT INTO `praticiens` (`id`, `created_at`, `updated_at`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `coeff`, `lieu`) VALUES
(1, NULL, NULL, 'Notini', 'Alain', '114r Authi', '8500', 'LA ROCHE SUR YON', '290', 1),
(2, NULL, NULL, 'Gosselin', 'Albert', '13 r Devon', '41000', 'BLOIS', '307', 2),
(3, NULL, NULL, 'Delahaye', 'André', '36 av 6 Juin', '25000', 'Besancon', '186', 3);

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

DROP TABLE IF EXISTS `rapports`;
CREATE TABLE IF NOT EXISTS `rapports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idPraticien` bigint(20) UNSIGNED NOT NULL,
  `dateRapport` date NOT NULL,
  `motif` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bilan` char(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idVisiteur` bigint(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVisiteur` (`idVisiteur`),
  KEY `idPraticien` (`idPraticien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rapports`
--

INSERT INTO `rapports` (`id`, `created_at`, `updated_at`, `idPraticien`, `dateRapport`, `motif`, `bilan`, `idVisiteur`) VALUES
(4, '2022-04-21 20:18:55', '2022-04-21 20:18:55', 1, '2022-04-22', 'test', 'test', 3),
(5, '2022-04-21 20:20:06', '2022-04-21 20:20:06', 2, '2022-04-07', 'test 2', 'cdfff', 3);

-- --------------------------------------------------------

--
-- Structure de la table `secteurs`
--

DROP TABLE IF EXISTS `secteurs`;
CREATE TABLE IF NOT EXISTS `secteurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secteurs`
--

INSERT INTO `secteurs` (`id`, `created_at`, `updated_at`, `nom`) VALUES
(1, NULL, NULL, 'Est'),
(2, NULL, NULL, 'Nord'),
(3, NULL, NULL, 'Sud'),
(4, NULL, NULL, 'Ouest'),
(5, NULL, NULL, 'Paris centre');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

DROP TABLE IF EXISTS `visiteurs`;
CREATE TABLE IF NOT EXISTS `visiteurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateEmbauche` date NOT NULL,
  `statut` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDsecteur` bigint(20) UNSIGNED NOT NULL,
  `IDlabo` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id labo` (`IDlabo`),
  KEY `id secteur` (`IDsecteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `created_at`, `updated_at`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `dateEmbauche`, `statut`, `login`, `IDsecteur`, `IDlabo`) VALUES
(3, NULL, '2022-04-21 19:51:54', 'Berard', 'Erine', '1300 chemin des carrières 123', '38150', 'Sonnay', '2022-04-01', 'VIS', 'eberard', 1, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD CONSTRAINT `idFamille` FOREIGN KEY (`famille`) REFERENCES `familles` (`id`);

--
-- Contraintes pour la table `medicament_rapports`
--
ALTER TABLE `medicament_rapports`
  ADD CONSTRAINT `idMedicament` FOREIGN KEY (`idMedicament`) REFERENCES `medicaments` (`id`),
  ADD CONSTRAINT `idRapports` FOREIGN KEY (`idRapport`) REFERENCES `rapports` (`id`);

--
-- Contraintes pour la table `praticiens`
--
ALTER TABLE `praticiens`
  ADD CONSTRAINT `idLieux` FOREIGN KEY (`lieu`) REFERENCES `lieux_exercices` (`id`);

--
-- Contraintes pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD CONSTRAINT `idPraticien` FOREIGN KEY (`idPraticien`) REFERENCES `praticiens` (`id`),
  ADD CONSTRAINT `idVisiteur` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteurs` (`id`);

--
-- Contraintes pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD CONSTRAINT `id labo` FOREIGN KEY (`IDlabo`) REFERENCES `labos` (`id`),
  ADD CONSTRAINT `id secteur` FOREIGN KEY (`IDsecteur`) REFERENCES `secteurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
