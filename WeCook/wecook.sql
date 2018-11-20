-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Mars 2018 à 17:34
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;





CREATE DATABASE IF NOT EXISTS `wecookbyrr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wecookbyrr`;

-- --------------------------------------------------------

--
-- Structure de la table `aliments`
--

CREATE TABLE `aliments` (
  `id` int(10) UNSIGNED NOT NULL,
  `qt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtToShow` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredient_id` int(10) UNSIGNED NOT NULL,
  `recette_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `aliments`
--

INSERT INTO `aliments` (`id`, `qt`, `qtToShow`, `qtType`, `ingredient_id`, `recette_id`, `created_at`, `updated_at`) VALUES
(1, '54', '54', 'fghj', 1, 1, NULL, NULL),
(2, '54', '54', 'fghj', 1, 3, NULL, NULL),
(3, '54', '54', 'fghj', 1, 6, NULL, NULL),
(4, '54', '54', 'fghj', 1, 63, NULL, NULL),
(5, '54', '54', 'fghj', 1, 86, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `catealiments`
--

CREATE TABLE `catealiments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `catealiments`
--

INSERT INTO `catealiments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'azer', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cateforbiden`
--

CREATE TABLE `cateforbiden` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `caterecettes`
--

CREATE TABLE `caterecettes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `caterecettes`
--

INSERT INTO `caterecettes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'a', '2017-11-23 20:00:57', '2017-11-23 20:00:57');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `validate` int(11) NOT NULL,
  `recette_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compos`
--

CREATE TABLE `compos` (
  `id` int(10) UNSIGNED NOT NULL,
  `entrée_id` int(11) NOT NULL,
  `plat_id` int(11) NOT NULL,
  `dessert_id` int(11) NOT NULL,
  `boisson_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cateCompo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dejavu`
--

CREATE TABLE `dejavu` (
  `id` int(10) UNSIGNED NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `recette_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `recette_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`id`, `user_id`, `recette_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-12-14 19:32:40', '2017-12-14 19:32:40'),
(2, 1, 79, '2017-12-18 21:03:48', '2017-12-18 21:03:48');

-- --------------------------------------------------------

--
-- Structure de la table `forbiden`
--

CREATE TABLE `forbiden` (
  `id` int(10) UNSIGNED NOT NULL,
  `cateForbiden_id` int(10) UNSIGNED NOT NULL,
  `cateAliment_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `forbiden`
--

INSERT INTO `forbiden` (`id`, `cateForbiden_id`, `cateAliment_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 0, 0, 3, 1, '2017-12-16 13:13:41', '2017-12-16 13:13:41');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `friend_id` int(10) UNSIGNED NOT NULL,
  `validate` tinyint(1) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `validate`, `visible`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, '2017-12-16 14:56:09', '2018-03-15 11:37:30');

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` int(11) NOT NULL,
  `recette_id` int(10) UNSIGNED NOT NULL,
  `compo_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nbPers` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kcal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cholesterol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtMin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtMinToAdd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixMin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixGramme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sousCateAliment_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `kcal`, `cholesterol`, `qtMin`, `qtMinToAdd`, `prixMin`, `prixGramme`, `sousCateAliment_id`, `created_at`, `updated_at`) VALUES
(1, 'paprika', '10', '50', '15', '15', '10', '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `listes`
--

CREATE TABLE `listes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nbPers` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `recette_id` int(10) UNSIGNED DEFAULT NULL,
  `nameList_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `listes`
--

INSERT INTO `listes` (`id`, `nbPers`, `day`, `recette_id`, `nameList_id`, `created_at`, `updated_at`) VALUES
(210, 1, 2, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(209, 1, 2, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(208, 1, 1, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(207, 1, 1, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(206, 1, 0, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(205, 1, 0, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(186, 1, 7, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(185, 1, 7, 104, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(184, 1, 7, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(183, 1, 7, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(182, 1, 7, 97, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(181, 1, 7, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(180, 1, 6, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(179, 1, 6, 92, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(178, 1, 6, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(177, 1, 6, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(176, 1, 6, 91, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(175, 1, 6, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(174, 1, 5, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(173, 1, 5, 90, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(172, 1, 5, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(171, 1, 5, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(170, 1, 5, 83, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(169, 1, 5, 99, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(168, 1, 4, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(167, 1, 4, 81, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(166, 1, 4, 56, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(165, 1, 4, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(164, 1, 4, 79, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(163, 1, 4, 43, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(162, 1, 3, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(161, 1, 3, 76, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(160, 1, 3, 38, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(159, 1, 3, 0, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(158, 1, 3, 70, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(157, 1, 3, 35, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(156, 1, 2, 110, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(155, 1, 2, 64, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(154, 1, 2, 13, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(153, 1, 2, 101, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(152, 1, 2, 57, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(151, 1, 2, 11, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(150, 1, 1, 72, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(149, 1, 1, 49, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(148, 1, 1, 5, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(147, 1, 1, 71, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(146, 1, 1, 12, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(145, 1, 1, 4, 1, '2017-12-16 12:27:19', '2017-12-16 12:27:19'),
(216, 1, 5, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(215, 1, 5, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(214, 1, 4, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(213, 1, 4, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(212, 1, 3, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(211, 1, 3, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(238, 1, 3, 0, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(237, 1, 3, 79, 2, '2017-12-18 16:08:10', '2017-12-18 21:04:22'),
(236, 1, 3, 56, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(235, 1, 3, 0, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(234, 1, 3, 109, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(233, 1, 3, 38, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(232, 1, 2, 110, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(231, 1, 2, 92, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(230, 1, 2, 35, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(229, 1, 2, 101, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(228, 1, 2, 85, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(227, 1, 2, 13, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(226, 1, 1, 72, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(225, 1, 1, 81, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(224, 1, 1, 5, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(223, 1, 1, 71, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(222, 1, 1, 7, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(221, 1, 1, 4, 2, '2017-12-18 16:08:10', '2017-12-18 16:08:10'),
(217, 1, 6, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(218, 1, 6, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(219, 1, 7, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45'),
(220, 1, 7, NULL, 3, '2017-12-16 15:29:45', '2017-12-16 15:29:45');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1307, '2017_11_14_121129_create_foreignSouscatealiment_table', 1),
(1273, '2014_10_12_000000_create_users_table', 1),
(1274, '2014_10_12_100000_create_password_resets_table', 1),
(1275, '2017_05_08_142146_create_recettes_table', 1),
(1276, '2017_05_08_145954_create_compos_table', 1),
(1277, '2017_05_08_150015_create_dejaVu_table', 1),
(1278, '2017_05_08_150640_create_aliments_table', 1),
(1279, '2017_05_08_151022_create_cateAliments_table', 1),
(1280, '2017_05_08_151046_create_cateRecettes_table', 1),
(1281, '2017_05_08_151336_create_country_table', 1),
(1282, '2017_05_08_194137_create_foreign_key', 1),
(1283, '2017_05_12_164912_create_comments_table', 1),
(1284, '2017_05_12_170004_create_grades_table', 1),
(1285, '2017_05_14_105541_create_forbiden_table', 1),
(1286, '2017_05_15_173919_create_cateForbiden_table', 1),
(1287, '2017_05_15_174629_create_player_table', 1),
(1288, '2017_05_18_174903_create_foreignKey_Update', 1),
(1289, '2017_07_13_163655_create_favoris_table', 1),
(1290, '2017_07_14_085736_foreignKeyFavoris', 1),
(1291, '2017_07_21_165538_create_listes_table', 1),
(1292, '2017_08_01_111245_create_nameList_table', 1),
(1293, '2017_08_01_113519_create_foreignKeyListes', 1),
(1294, '2017_08_20_085949_create_usersListe_table', 1),
(1295, '2017_08_20_093947_create_ForeignKeyUsersListe_table', 1),
(1296, '2017_08_22_070457_create_friends_table', 1),
(1297, '2017_08_22_070616_create_friendsForeignKey_table', 1),
(1298, '2017_10_26_184735_create_groups_table', 1),
(1299, '2017_10_26_203834_create_groupsForeignKey_table', 1),
(1300, '2017_10_28_142907_create_social_providers_table', 1),
(1301, '2017_10_28_180025_create_foreignKeySocial_table', 1),
(1302, '2017_10_29_123048_create_ingredients_table', 1),
(1303, '2017_10_29_123147_create_ingredientsForeignKey_table', 1),
(1304, '2017_11_09_152816_create_typePLats_table', 1),
(1305, '2017_11_09_152939_create_typePLatsForeign', 1),
(1306, '2017_11_14_120619_create_sousCate_Aliment_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `namelist`
--

CREATE TABLE `namelist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rights` int(11) NOT NULL DEFAULT '1',
  `nbDay` int(11) NOT NULL DEFAULT '7',
  `date` date NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `nbByDay` int(11) NOT NULL DEFAULT '2',
  `type` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `namelist`
--

INSERT INTO `namelist` (`id`, `name`, `user_id`, `rights`, `nbDay`, `date`, `valide`, `nbByDay`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Romain Rollo-1', 1, 1, 7, '2017-11-22', 1, 23, 123, '2017-11-22 14:39:07', '2017-11-22 14:39:07'),
(2, 'Romain Rollo-2', 1, 1, 3, '2017-11-23', 1, 23, 123, '2017-11-23 20:05:30', '2017-11-23 20:05:30'),
(3, 'ro3lo-1', 2, 1, 7, '2017-12-16', 1, 3, 23, '2017-12-16 15:29:45', '2017-12-16 15:29:45');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id` int(10) UNSIGNED NOT NULL,
  `cateForbiden_id` int(10) UNSIGNED DEFAULT NULL,
  `recette_id` int(10) UNSIGNED NOT NULL,
  `typeplat_id` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `toknow` mediumtext COLLATE utf8mb4_unicode_ci,
  `timeCuisson` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `iframe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vid` int(11) NOT NULL,
  `nbPers` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `cateRecette_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `recettes`
--

INSERT INTO `recettes` (`id`, `title`, `description`, `toknow`, `timeCuisson`, `time`, `iframe`, `picture`, `vid`, `nbPers`, `visible`, `cateRecette_id`, `country_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Recette de Tartelettes aux Fruits Rouges Healthy et Vegan', NULL, NULL, 25, 5, 'HGaUjKn0qE0', 'HGaUjKn0qE0', 1, 2, 0, 5, NULL, 1, NULL, NULL),
(2, 'Recette de Cheesecake Vegan (sans cuisson)', NULL, NULL, 0, 5, 'lfV3FhA23f4', 'lfV3FhA23f4', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(3, 'Recette de Verrines Tapioca Myrtilles', NULL, NULL, 10, 5, '7XvbJbQyXhU', '7XvbJbQyXhU', 1, 4, 0, 3, NULL, 1, NULL, NULL),
(4, 'Recette de Panna Cotta Vegan Mangue Coco', NULL, NULL, 240, 5, 'GZNrBnhkreM', 'GZNrBnhkreM', 1, 4, 0, 3, NULL, 1, NULL, NULL),
(5, 'Recette de Crumble Pêche Abricot à l\'Avoine', NULL, NULL, 30, 5, 'pPPuw-WXG5A', 'pPPuw-WXG5A', 1, 8, 0, 3, NULL, 1, NULL, NULL),
(6, 'Recette de Boulettes de Lentilles épicées et Curry de Légumes Indien', NULL, NULL, 20, 10, '_YI6YmPKvGc', '_YI6YmPKvGc', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(7, 'Recette de Burger Vegan et Frites de Patates Douces', NULL, NULL, 55, 10, 'W3qVAJfNcTM', 'W3qVAJfNcTM', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(8, '2 Recettes de Smoothie Bowls pour le Petit-Déjeuner', NULL, NULL, 20, 5, 'yS4Gk5LLmlc', 'yS4Gk5LLmlc', 1, 2, 0, 5, NULL, 1, NULL, NULL),
(9, '3 Recettes de Nice Creams : Les Glaces minute Sans Sorbetière', NULL, NULL, 0, 5, 'oapjYlfXl-g', 'oapjYlfXl-g', 1, 2, 0, 4, NULL, 1, NULL, NULL),
(10, 'Recette de Fondant au Chocolat Vegan', NULL, NULL, 40, 5, 'XkeB1IVUbg4', 'XkeB1IVUbg4', 1, 5, 0, 5, NULL, 1, NULL, NULL),
(11, 'Crème au Chocolat et Fraises Sans Gluten', NULL, NULL, 0, 0, '5', '6yrIGhu8lzc', 6, 1, 4, 3, NULL, 3, NULL, NULL),
(12, 'Recette de Pizza Vegan', NULL, NULL, 20, 5, 'oyR6BBjxgM8', 'oyR6BBjxgM8', 1, 1, 0, 2, NULL, 1, NULL, NULL),
(13, 'Recette de Panna Cotta Pistache Fruits Rouges Vegan et Sans Gluten', NULL, NULL, 0, 10, 'c0hhGHYN_8g', 'c0hhGHYN_8g', 1, 4, 0, 3, NULL, 1, NULL, NULL),
(14, 'Recette du Fraisier - Fête des Mères', NULL, NULL, 12, 20, '7zpFJHr_h1k', '7zpFJHr_h1k', 1, 8, 0, 5, NULL, 1, NULL, NULL),
(15, 'Recette de la Charlotte aux Fraises', NULL, NULL, 20, 15, 'CI1wm0QcNj8', 'CI1wm0QcNj8', 1, 5, 0, 5, NULL, 1, NULL, NULL),
(16, 'Recette de Bavarois Fraise Rhubarbe pour la Fête des Mères', NULL, NULL, 20, 15, 'MrcccIMdhvo', 'MrcccIMdhvo', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(17, 'Recette de Bavarois à la Framboise (sans gélatine)', NULL, NULL, 12, 10, 'cHfKZvZML7o', 'cHfKZvZML7o', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(18, 'Recette de Framboisier - Fête des Pères', NULL, NULL, 20, 20, '95BsKmBun8M', '95BsKmBun8M', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(19, 'Recette de la Tarte à la Framboise', NULL, NULL, 20, 15, 'McNuGvj5P7s', 'McNuGvj5P7s', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(20, 'Recette de Tarte Figues', NULL, NULL, 0, 0, '12', '15', 0, 0, 1, 6, NULL, 0, NULL, NULL),
(21, 'Recette d\'Entremet Ananas Passion', NULL, NULL, 15, 10, 'mTa6oK0xyEs', 'mTa6oK0xyEs', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(22, 'Recette de Gâteau au Chocolat "Smoking" pour la Fête des Pères', NULL, NULL, 20, 15, 'syMp5gP84MQ', 'syMp5gP84MQ', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(23, 'Recette du Trianon ou Royal au Chocolat', NULL, NULL, 15, 15, 'CtqxxtGJI6Y', 'CtqxxtGJI6Y', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(24, 'Recette de l\'Opéra', NULL, NULL, 12, 20, 'SZJI2-N9QxQ', 'SZJI2-N9QxQ', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(25, '❅ Recette de la Forêt Noire ❅', NULL, NULL, 25, 15, 'NBaSJ6uiOkU', 'NBaSJ6uiOkU', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(26, 'Recette du Paris-Brest', NULL, NULL, 45, 10, '_710LxPREYc', '_710LxPREYc', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(27, 'Recettte de la Tarte Tropézienne', NULL, NULL, 25, 15, 'rgo4cFD-uqM', 'rgo4cFD-uqM', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(28, 'Recette de Baba au Rhum', NULL, NULL, 20, 10, 'ackM2MVJ6O8', 'ackM2MVJ6O8', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(29, 'Recette de Fantastik Cassis Citron inspiration Christophe Michalak', NULL, NULL, 12, 20, 'uKl_epCac3I', 'uKl_epCac3I', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(30, '♡ Recette d\'Entremet Pomme', NULL, NULL, 0, 15, '20', 'mIu5Q_3Dz_8', 0, 1, 6, 0, NULL, 5, NULL, NULL),
(31, '♡ Recette de Saint-Honoré Mangue Abricot pour la Saint-Valentin ♡', NULL, NULL, 35, 20, 'caBJYuvU4ps', 'caBJYuvU4ps', 1, 5, 0, 5, NULL, 1, NULL, NULL),
(32, '❀ Recette du Panier de Pâques : Gâteau Chocolat Ganache Kinder ❀', NULL, NULL, 50, 15, 'iUi8mCsruCE', 'iUi8mCsruCE', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(33, '❀ Recette de Tarte aux Fruits Œuf de Pâques ❀', NULL, NULL, 15, 15, '5aoEIFfDUK4', '5aoEIFfDUK4', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(34, 'Recette de Babas au Rhum revisités façon Mojito', NULL, NULL, 15, 15, '3OlCcrac3XQ', '3OlCcrac3XQ', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(35, 'Recette de Tartelettes aux Pommes revisitées', NULL, NULL, 30, 20, 'wfiZlHrQ0GY', 'wfiZlHrQ0GY', 1, 8, 0, 3, NULL, 1, NULL, NULL),
(36, 'Recette de Cake Moelleux à la Noisette (sans gluten', NULL, NULL, 0, 40, '10', 'BAW6agAzu30', 0, 1, 10, 0, NULL, 5, NULL, NULL),
(37, 'Recette de Gâteau Sans Gluten au Citron et aux Graines de Pavot', NULL, NULL, 35, 7, 'X3nOmxNiiFM', 'X3nOmxNiiFM', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(38, 'Recette de Flan à la Noix de Coco', NULL, NULL, 45, 7, 'xJ1orAZThbU', 'xJ1orAZThbU', 1, 6, 0, 3, NULL, 1, NULL, NULL),
(39, 'Recette de Terrines d\'Agrumes', NULL, NULL, 0, 0, '5', 'unAgWgw4Twk', 0, 1, 4, 0, NULL, 3, NULL, NULL),
(40, 'Recette de Moelleux au Chocolat Sans Gluten', NULL, NULL, 50, 5, 'LCAGkVPMifo', 'LCAGkVPMifo', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(41, 'Recette de Gâteau automnal aux Raisins Sans Gluten', NULL, NULL, 45, 7, 'g2uNJGChO18', 'g2uNJGChO18', 1, 4, 0, 5, NULL, 1, NULL, NULL),
(42, 'Recette de Gâteau Sans Gluten Sans Lactose aux Pépites de Chocolat', NULL, NULL, 45, 5, 'SswMLIJxTRs', 'SswMLIJxTRs', 1, 5, 0, 5, NULL, 1, NULL, NULL),
(43, 'Recette de Petits Gâteaux Sans Gluten Myrtille Citron', NULL, NULL, 25, 7, 'DgigtdWRAQc', 'DgigtdWRAQc', 1, 6, 0, 3, NULL, 1, NULL, NULL),
(44, 'Recette de la Galette des Rois', NULL, NULL, 50, 15, 'aiR8uFyxwzE', 'aiR8uFyxwzE', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(45, 'Recette de Beignets au Nutella', NULL, NULL, 10, 10, 'NH7WVp2Zorc', 'NH7WVp2Zorc', 1, 12, 0, 5, NULL, 1, NULL, NULL),
(46, 'Recette des Eclairs au Chocolat', NULL, NULL, 35, 15, 'MisvPHvaH_g', 'MisvPHvaH_g', 1, 8, 0, 5, NULL, 1, NULL, NULL),
(47, 'Recette de Donuts Américains', NULL, NULL, 25, 15, 'BaKiMvmlWm8', 'BaKiMvmlWm8', 1, 10, 0, 5, NULL, 1, NULL, NULL),
(48, 'Recette des Brownies fondants au Chocolat et aux Noix', NULL, NULL, 30, 10, 'xtAnVgtNEhc', 'xtAnVgtNEhc', 1, 12, 0, 5, NULL, 1, NULL, NULL),
(49, 'Recette de Quiche Végétarienne aux Légumes du Soleil', NULL, NULL, 45, 10, '42QTDWNcRaY', '42QTDWNcRaY', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(50, 'Recette Quiche Originale Facile et Rapide', NULL, NULL, 50, 25, 'pQj_Kv9DKew', 'pQj_Kv9DKew', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(51, 'Recette de Macarons au Fruit de la Passion', NULL, NULL, 15, 15, 'QO7d7VK20JU', 'QO7d7VK20JU', 1, 9, 0, 5, NULL, 1, NULL, NULL),
(52, 'Recette de Chouquettes au Nutella', NULL, NULL, 25, 8, 'fTFXDpFLCXw', 'fTFXDpFLCXw', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(53, 'Recette de Mille-feuilles à la Vanille', NULL, NULL, 50, 15, 'WawRk3ND8XQ', 'WawRk3ND8XQ', 1, 12, 0, 5, NULL, 1, NULL, NULL),
(54, '❅ Recette de Bûche de Noël aux Fruits Rouges et à la Vanille ❅', NULL, NULL, 15, 20, 'DWMSkKbj8y8', 'DWMSkKbj8y8', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(55, 'Recette de Gâteau Cimetière d\'Halloween', NULL, NULL, 30, 15, '2X_P2kwsfVI', '2X_P2kwsfVI', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(56, 'Recette de Crèmes aux Œufs à la Vanille et Madeleines au Chocolat', NULL, NULL, 40, 10, '_Cy3yP4Y5ZM', '_Cy3yP4Y5ZM', 1, 4, 0, 3, NULL, 1, NULL, NULL),
(57, 'Recette facile et rapide des œufs cocotte', NULL, NULL, 0, 5, '3SfpTbcuz10', '3SfpTbcuz10', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(58, 'Pizza au poulet tomate mozzarella facile & rapide', NULL, NULL, 10, 10, 'wUhlLQ9R_co', 'wUhlLQ9R_co', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(59, 'Beignets de pomme de terre au thon rapide & facile', NULL, NULL, 0, 35, 'SuCSPV7XdKk', 'SuCSPV7XdKk', 1, 6, 0, 2, NULL, 1, NULL, NULL),
(61, 'Tandoori Chicken facile & rapide', NULL, NULL, 45, 10, 'UDPU9qnQ-Cw', 'UDPU9qnQ-Cw', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(62, 'Recette facile et rapide des nuggets au poulet', NULL, NULL, 25, 10, 'gUBfkSTk6Vs', 'gUBfkSTk6Vs', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(63, 'Recette de Courgette Farcie', NULL, NULL, 15, 10, 'HuKHQVOak_U', 'HuKHQVOak_U', 1, 4, 0, 1, NULL, 1, NULL, NULL),
(64, 'Recette rapide et facile de la paella ', NULL, NULL, 0, 10, 'bEpqS8wSBKY', 'bEpqS8wSBKY', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(65, 'Recette facile du burger dietétique', NULL, NULL, 0, 10, 'y9oaIu6LP6E', 'y9oaIu6LP6E', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(66, 'Brochette de poulet au citron confit', NULL, NULL, 0, 10, 'PT4SITFEMIE', 'PT4SITFEMIE', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(67, 'Crèpe Sandwich au Poulet Facile & Rapide', NULL, NULL, 0, 15, 'spcjAOTx7Fw', 'spcjAOTx7Fw', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(68, 'Recette Saint Valentin de Salade de noix de Saint-Jacques', NULL, NULL, 0, 0, '', 'WaiemxSNX0', 0, 1, 2, 0, NULL, 2, NULL, NULL),
(69, 'Recette Saint Valentin de Pavé de saumon au bouillon de boutons de rose', NULL, NULL, 10, 5, 'VGtUF3dwEZQ', 'VGtUF3dwEZQ', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(70, 'Saumon grillé à la méditerranéenne', NULL, NULL, 10, 10, 'DxTN4HRZOAk', 'DxTN4HRZOAk', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(71, 'Recette NEMS au POULET croustillants (Cuisine Asiatique)', NULL, NULL, 0, 12, 'MabMOlwOCfI', 'MabMOlwOCfI', 1, 4, 0, 1, NULL, 1, NULL, NULL),
(72, 'Beignets de crevettes croustillants au curry', NULL, NULL, 0, 7, 'ThiGJfDLSoc', 'ThiGJfDLSoc', 1, 3, 0, 1, NULL, 1, NULL, NULL),
(73, 'La recette de beignet au nutella', NULL, NULL, 6, 10, 'DTbUeezEvTI', 'DTbUeezEvTI', 1, 4, 0, 5, NULL, 1, NULL, NULL),
(74, 'Recette de Pancakes Vanille avec Napage Chocolat', NULL, NULL, 0, 10, 'S-8jeR5io_4', 'S-8jeR5io_4', 1, 5, 0, 5, NULL, 1, NULL, NULL),
(75, 'Recettes de Pancakes délicieux', NULL, NULL, 0, 10, 'C7zcIlECSAo', 'C7zcIlECSAo', 1, 2, 0, 5, NULL, 1, NULL, NULL),
(76, 'Pomme de terre roulée à la viande haché', NULL, NULL, 10, 15, 'ou--ffwTbZA', 'ou--ffwTbZA', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(77, 'Recette des Croissants et Pains au Chocolat', NULL, NULL, 20, 5, 'rdjuoU_M83w', 'rdjuoU_M83w', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(78, 'Recette Omelette à l\'italienne facile et rapide', NULL, NULL, 0, 5, '4LhI7Ey0Rxk', '4LhI7Ey0Rxk', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(79, 'Recette Facile Pattes Penne au Poulet Sauce Alfredo', NULL, NULL, 0, 15, 'CTTsN3QggDc', 'CTTsN3QggDc', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(80, 'Épinards aux crevettes Bacon Alfredo', NULL, NULL, 0, 15, 'uHf7cDhh-r0', 'uHf7cDhh-r0', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(81, 'Pâtes crémeuses aux champignons et au poulet', NULL, NULL, 0, 15, 'hGO2P0jyafw', 'hGO2P0jyafw', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(82, 'Pâtes au fromage Mac \'N\' végétalien', NULL, NULL, 0, 15, 'IRNEMiRg0Y', 'IRNEMiRg0Y', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(83, 'Chicken Alfredo Lasagna', NULL, NULL, 25, 10, '6Ehqyrw0eD4', '6Ehqyrw0eD4', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(84, 'Recette Pâtes crémeuse à la bolognaise', NULL, NULL, 0, 5, 'eRTKyj0SXCY', 'eRTKyj0SXCY', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(85, 'Recette Crémeuse au Pesto', NULL, NULL, 0, 15, 'rkiQlm73CEs', 'rkiQlm73CEs', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(86, 'Recette de Pâtes aux crevettes et au paprika', NULL, NULL, 0, 15, 'iVtkj3QJ8hU', 'iVtkj3QJ8hU', 1, 4, 0, 4, NULL, 1, NULL, NULL),
(87, 'Cuisson des pâtes au poulet BBQ', NULL, NULL, 30, 10, 'jLPSoBTVT-U', 'jLPSoBTVT-U', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(88, 'Recette Pizza Facile', NULL, NULL, 15, 10, 'PG6oAO9sgEU', 'PG6oAO9sgEU', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(89, 'Recette Tortellini au bœuf et au fromage', NULL, NULL, 20, 10, 'qfFdHKWmc80', 'qfFdHKWmc80', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(90, 'Recette Bolognaise à l\'italienne (Ragù)', NULL, NULL, 120, 5, '9_6W9yFRaTY', '9_6W9yFRaTY', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(91, 'Recette Pâtes Alfredo au poulet Healthy', NULL, NULL, 0, 10, 'HC9k6y9bLmM', 'HC9k6y9bLmM', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(92, 'Recette Pâtes à la grecque (Pasticcio)', NULL, NULL, 60, 10, '5dJgMkCherA', '5dJgMkCherA', 1, 6, 0, 2, NULL, 1, NULL, NULL),
(93, 'Recette Boulettes de viande végétariennes cachées', NULL, NULL, 30, 10, 'Dq_Xb_KCNtY', 'Dq_Xb_KCNtY', 1, 2, 0, 2, NULL, 1, NULL, NULL),
(94, 'Recette Crevettes et épinards Fettuccine Alfredo', NULL, NULL, 0, 10, 'GBc7ES2IVZk', 'GBc7ES2IVZk', 1, 6, 0, 2, NULL, 1, NULL, NULL),
(95, 'Recette Pâtes au poulet au citron et au fromage', NULL, NULL, 20, 5, 'KfMMk6l97SI', 'KfMMk6l97SI', 1, 3, 0, 2, NULL, 1, NULL, NULL),
(96, 'Recette Gâteau au fromage japonais Jiggly Fluffy', NULL, NULL, 25, 10, 'TeoS_fQWvkY', 'TeoS_fQWvkY', 1, 6, 0, 5, NULL, 1, NULL, NULL),
(97, 'Recette Poulet au beurre facile', NULL, NULL, 0, 10, 'VHfhCXkJh34', 'VHfhCXkJh34', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(98, 'Recette Ailes de poulet BBQ au miel', NULL, NULL, 45, 10, '_r1B365GxNY', '_r1B365GxNY', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(99, 'Recette de tiramisu au nutella', NULL, NULL, 0, 5, 'FfrfPDfXfTY', 'FfrfPDfXfTY', 1, 6, 0, 3, NULL, 1, NULL, NULL),
(100, 'Recette Big Mac toast français', NULL, NULL, 0, 10, 'mXNUgY2Jo7E', 'mXNUgY2Jo7E', 1, 1, 0, 2, NULL, 1, NULL, NULL),
(101, 'Recette de saucisses toaster pour l\'apperitif', NULL, NULL, 0, 10, 'z_zI4MwKkEw', 'z_zI4MwKkEw', 1, 3, 0, 1, NULL, 1, NULL, NULL),
(102, 'Recette de Lasagne au Poulet', NULL, NULL, 30, 10, 'Y37F0xBUQCU', 'Y37F0xBUQCU', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(103, 'Recette Rouleau de Fajita en croûte de Nacho', NULL, NULL, 40, 10, 'kzVyg59_42g', 'kzVyg59_42g', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(104, 'Recette Mini Enchiladas au poulet', NULL, NULL, 20, 10, 'PX8Lrltlswc', 'PX8Lrltlswc', 1, 6, 0, 2, NULL, 1, NULL, NULL),
(105, 'Recette French toast Cheesburger ', NULL, NULL, 0, 10, 'I6fJU1zAQhQ', 'I6fJU1zAQhQ', 1, 1, 0, 2, NULL, 1, NULL, NULL),
(106, 'Recette burger salade César au poulet', NULL, NULL, 0, 10, 'j4rLjg1njuo', 'j4rLjg1njuo', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(107, 'Recette Croque Monsieur au Poulet', NULL, NULL, 5, 10, 'KARMopyTaM8', 'KARMopyTaM8', 1, 4, 0, 2, NULL, 1, NULL, NULL),
(108, 'Recette Poulet cajun et pâtes à la saucisse', NULL, NULL, 0, 15, 'LTy9pro0uRk', 'LTy9pro0uRk', 1, 5, 0, 2, NULL, 1, NULL, NULL),
(109, 'Recette nuggets d\'Anneaux d\'oignon de poulet Fajita', NULL, NULL, 0, 10, 'xbZR43-raqk', 'xbZR43-raqk', 1, 1, 0, 2, NULL, 1, NULL, NULL),
(110, 'Recette Chips de pain à l\'ail avec bolognaise fondue ', NULL, NULL, 30, 10, 'QuTIX3wxXQ', 'QuTIX3wxXQ', 1, 3, 0, 1, NULL, 1, NULL, NULL),
(111, 'Recette Boulette de viande au fromage & Frites', NULL, NULL, 5, 10, 'yavAnwdOnA', 'yavAnwdOnA', 1, 4, 0, 2, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 1, '1901266659889790', 'facebook', '2017-11-22 14:37:48', '2017-11-22 14:37:48');

-- --------------------------------------------------------

--
-- Structure de la table `souscatealiment`
--

CREATE TABLE `souscatealiment` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateAliment_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `souscatealiment`
--

INSERT INTO `souscatealiment` (`id`, `name`, `cateAliment_id`, `created_at`, `updated_at`) VALUES
(1, 'azerty', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typeplats`
--

CREATE TABLE `typeplats` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `isAdmin` tinyint(1) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `groups_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `isAdmin`, `status`, `groups_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Romain Rollo', 'romain.rollo92@gmail.com', '', '1513433646.jpg', NULL, 1, NULL, '4qBWWZmH2OELENlYs4GMrBejsTuv9HY517AV4jvKdSmp1DAFAOCVLJMHuILs', '2017-11-22 14:37:48', '2017-12-16 13:14:07'),
(2, 'ro3lo', 'ro3lo@gmail.com', '$2y$10$TrZ5KDme9tmIAWQghM.Ru.Wh6Ueu8HQe.5DOa.n2WEFVILTPBhQey', 'default.jpg', NULL, 0, NULL, 'egU6DkaKhlqe5UrborMEyKMeZcsP36vGHP2jQJMiMBTuA4FAdYOCvcLSSMGL', '2017-12-16 14:54:52', '2017-12-16 14:54:52');

-- --------------------------------------------------------

--
-- Structure de la table `usersliste`
--

CREATE TABLE `usersliste` (
  `id` int(10) UNSIGNED NOT NULL,
  `rights` int(11) NOT NULL DEFAULT '1',
  `validate` int(11) NOT NULL DEFAULT '2',
  `nameList_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `aliments`
--
ALTER TABLE `aliments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aliments_recette_id_foreign` (`recette_id`),
  ADD KEY `aliments_ingredient_id_foreign` (`ingredient_id`);

--
-- Index pour la table `catealiments`
--
ALTER TABLE `catealiments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cateforbiden`
--
ALTER TABLE `cateforbiden`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `caterecettes`
--
ALTER TABLE `caterecettes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_recette_id_foreign` (`recette_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Index pour la table `compos`
--
ALTER TABLE `compos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compos_user_id_foreign` (`user_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dejavu`
--
ALTER TABLE `dejavu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dejavu_recette_id_foreign` (`recette_id`),
  ADD KEY `dejavu_user_id_foreign` (`user_id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favoris_recette_id_foreign` (`recette_id`),
  ADD KEY `favoris_user_id_foreign` (`user_id`);

--
-- Index pour la table `forbiden`
--
ALTER TABLE `forbiden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forbiden_cateforbiden_id_foreign` (`cateForbiden_id`),
  ADD KEY `forbiden_catealiment_id_foreign` (`cateAliment_id`),
  ADD KEY `forbiden_user_id_foreign` (`user_id`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friends_user_id_foreign` (`user_id`),
  ADD KEY `friends_friend_id_foreign` (`friend_id`);

--
-- Index pour la table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_recette_id_foreign` (`recette_id`),
  ADD KEY `grades_user_id_foreign` (`user_id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_user_id_foreign` (`user_id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_souscatealiment_id_foreign` (`sousCateAliment_id`);

--
-- Index pour la table `listes`
--
ALTER TABLE `listes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listes_recette_id_foreign` (`recette_id`),
  ADD KEY `listes_namelist_id_foreign` (`nameList_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `namelist`
--
ALTER TABLE `namelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `namelist_user_id_foreign` (`user_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_cateforbiden_id_foreign` (`cateForbiden_id`),
  ADD KEY `player_recette_id_foreign` (`recette_id`),
  ADD KEY `player_typeplat_id_foreign` (`typeplat_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recettes_caterecette_id_foreign` (`cateRecette_id`),
  ADD KEY `recettes_country_id_foreign` (`country_id`),
  ADD KEY `recettes_user_id_foreign` (`user_id`);

--
-- Index pour la table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_providers_user_id_foreign` (`user_id`);

--
-- Index pour la table `souscatealiment`
--
ALTER TABLE `souscatealiment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `souscatealiment_catealiment_id_foreign` (`cateAliment_id`);

--
-- Index pour la table `typeplats`
--
ALTER TABLE `typeplats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_groups_id_foreign` (`groups_id`);

--
-- Index pour la table `usersliste`
--
ALTER TABLE `usersliste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersliste_user_id_foreign` (`user_id`),
  ADD KEY `usersliste_namelist_id_foreign` (`nameList_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `aliments`
--
ALTER TABLE `aliments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `catealiments`
--
ALTER TABLE `catealiments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cateforbiden`
--
ALTER TABLE `cateforbiden`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `caterecettes`
--
ALTER TABLE `caterecettes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compos`
--
ALTER TABLE `compos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `dejavu`
--
ALTER TABLE `dejavu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `forbiden`
--
ALTER TABLE `forbiden`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `listes`
--
ALTER TABLE `listes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1308;
--
-- AUTO_INCREMENT pour la table `namelist`
--
ALTER TABLE `namelist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT pour la table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `souscatealiment`
--
ALTER TABLE `souscatealiment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `typeplats`
--
ALTER TABLE `typeplats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `usersliste`
--
ALTER TABLE `usersliste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;