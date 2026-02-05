-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2026 at 02:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_auth`
--
CREATE DATABASE IF NOT EXISTS `laravel_auth` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `laravel_auth`;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@mail.com|127.0.0.1', 'i:1;', 1769717551),
('laravel-cache-admin@mail.com|127.0.0.1:timer', 'i:1769717551;', 1769717551),
('laravel-cache-glavniadmin@mail.com|127.0.0.1', 'i:1;', 1769717545),
('laravel-cache-glavniadmin@mail.com|127.0.0.1:timer', 'i:1769717545;', 1769717545);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

DROP TABLE IF EXISTS `kategorije`;
CREATE TABLE IF NOT EXISTS `kategorije` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(150) NOT NULL,
  `aktivna` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `naziv`, `aktivna`, `created_at`, `updated_at`) VALUES
(1, 'Pića', 1, '2026-01-22 13:51:41', '2026-01-22 13:51:41'),
(2, 'Hrana', 1, '2026-01-22 13:51:41', '2026-01-22 13:51:41'),
(3, 'Arhiva', 0, '2026-01-22 13:51:41', '2026-01-22 13:51:41'),
(5, 'Tehnika', 1, '2026-01-23 12:15:35', '2026-01-23 12:15:35'),
(6, 'Biljke', 1, '2026-01-23 12:19:02', '2026-01-23 12:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_22_114212_add_datumrod_to_users_table', 2),
(5, '2026_01_22_124727_add_usertype_to_users_table', 3),
(6, '2026_01_22_144344_create_kategorije_table', 4),
(7, '2026_01_22_152910_create_proizvodi_table', 5),
(8, '2026_01_25_162826_create_prognoze_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prognoze`
--

DROP TABLE IF EXISTS `prognoze`;
CREATE TABLE IF NOT EXISTS `prognoze` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grad` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `maxTempC` decimal(5,2) DEFAULT NULL,
  `weather` varchar(255) DEFAULT NULL,
  `windSpeed` decimal(6,2) DEFAULT NULL,
  `visibility` decimal(6,2) DEFAULT NULL,
  `zadnji_dohvat` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prognoze_grad_datum_unique` (`grad`,`datum`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prognoze`
--

INSERT INTO `prognoze` (`id`, `grad`, `datum`, `maxTempC`, `weather`, `windSpeed`, `visibility`, `zadnji_dohvat`, `created_at`, `updated_at`) VALUES
(1, 'Zagreb,Croatia', '2026-01-25', 6.30, 'Cloudy with Chance of Light Showers', 3.00, 6.14, '2026-01-25 15:50:16', '2026-01-25 15:50:16', '2026-01-25 15:50:16'),
(2, 'Zagreb,Croatia', '2026-01-26', 6.50, 'Partly Cloudy', 5.00, 9.57, '2026-01-25 15:50:16', '2026-01-25 15:50:16', '2026-01-25 15:50:16'),
(3, 'Zagreb,Croatia', '2026-01-27', 3.40, 'Mostly Cloudy', 5.00, 11.36, '2026-01-25 15:50:16', '2026-01-25 15:50:16', '2026-01-25 15:50:16'),
(4, 'Zagreb,Croatia', '2026-01-28', 7.70, 'Mostly Cloudy with Scattered Showers', 6.00, 10.55, '2026-01-25 15:50:16', '2026-01-25 15:50:16', '2026-01-25 15:50:16'),
(5, 'Zagreb,Croatia', '2026-01-29', 6.10, 'Mostly Cloudy with Showers', 5.00, 5.11, '2026-01-25 15:50:16', '2026-01-25 15:50:16', '2026-01-25 15:50:16'),
(6, 'Zagreb,Croatia', '2026-01-30', 7.80, 'Mostly Cloudy with Scattered Showers', 2.00, 11.91, '2026-01-25 15:50:16', '2026-01-25 15:50:16', '2026-01-25 15:50:16'),
(7, 'Zagreb,Croatia', '2026-01-31', 6.40, 'Cloudy with Light Rain Showers', 7.00, 3.68, '2026-01-25 15:50:16', '2026-01-25 15:50:16', '2026-01-25 15:50:16'),
(8, 'Split,Croatia', '2026-01-25', 14.50, 'Cloudy with Chance of Rain and Scattered Storms', 26.00, 10.60, '2026-01-25 16:21:48', '2026-01-25 15:50:37', '2026-01-25 16:21:48'),
(9, 'Split,Croatia', '2026-01-26', 12.90, 'Partly Cloudy with Showers', 9.00, 14.29, '2026-01-25 16:21:48', '2026-01-25 15:50:37', '2026-01-25 16:21:48'),
(10, 'Split,Croatia', '2026-01-27', 12.10, 'Sunny', 11.00, 15.64, '2026-01-25 16:21:48', '2026-01-25 15:50:37', '2026-01-25 16:21:48'),
(11, 'Split,Croatia', '2026-01-28', 13.30, 'Cloudy with Chance of Rain', 21.00, 5.50, '2026-01-25 16:21:48', '2026-01-25 15:50:37', '2026-01-25 16:21:48'),
(12, 'Split,Croatia', '2026-01-29', 10.70, 'Mostly Cloudy with Showers', 3.00, 15.93, '2026-01-25 16:21:48', '2026-01-25 15:50:37', '2026-01-25 16:21:48'),
(13, 'Split,Croatia', '2026-01-30', 12.90, 'Partly Cloudy with Showers', 2.00, 14.62, '2026-01-25 16:21:48', '2026-01-25 15:50:37', '2026-01-25 16:21:48'),
(14, 'Split,Croatia', '2026-01-31', 12.10, 'Cloudy with Light Rain Showers', 12.00, 13.74, '2026-01-25 16:21:48', '2026-01-25 15:50:37', '2026-01-25 16:21:48'),
(15, 'Zadar, Croatia', '2026-01-25', 14.70, 'Windy with Scattered Showers and Scattered Storms', 25.00, 12.80, '2026-01-25 15:55:27', '2026-01-25 15:55:27', '2026-01-25 15:55:27'),
(16, 'Zadar, Croatia', '2026-01-26', 11.80, 'Partly Cloudy with Showers', 9.00, 15.67, '2026-01-25 15:55:27', '2026-01-25 15:55:27', '2026-01-25 15:55:27'),
(17, 'Zadar, Croatia', '2026-01-27', 11.40, 'Partly Cloudy', 2.00, 13.63, '2026-01-25 15:55:27', '2026-01-25 15:55:27', '2026-01-25 15:55:27'),
(18, 'Zadar, Croatia', '2026-01-28', 13.10, 'Cloudy with Chance of Rain', 33.00, 5.14, '2026-01-25 15:55:27', '2026-01-25 15:55:27', '2026-01-25 15:55:27'),
(19, 'Zadar, Croatia', '2026-01-29', 10.90, 'Mostly Cloudy with Scattered Showers', 24.00, 11.67, '2026-01-25 15:55:27', '2026-01-25 15:55:27', '2026-01-25 15:55:27'),
(20, 'Zadar, Croatia', '2026-01-30', 12.60, 'Partly Cloudy with Showers', 9.00, 15.25, '2026-01-25 15:55:27', '2026-01-25 15:55:27', '2026-01-25 15:55:27'),
(21, 'Zadar, Croatia', '2026-01-31', 11.50, 'Cloudy', 24.00, 15.73, '2026-01-25 15:55:27', '2026-01-25 15:55:27', '2026-01-25 15:55:27'),
(22, 'Pula,Croatia', '2026-01-25', 11.50, 'Mostly Cloudy with Scattered Showers', 20.00, 11.73, '2026-01-25 19:37:37', '2026-01-25 19:37:37', '2026-01-25 19:37:37'),
(23, 'Pula,Croatia', '2026-01-26', 10.90, 'Partly Cloudy with Showers', 10.00, 15.67, '2026-01-25 19:37:37', '2026-01-25 19:37:37', '2026-01-25 19:37:37'),
(24, 'Pula,Croatia', '2026-01-27', 10.90, 'Partly Cloudy', 7.00, 15.96, '2026-01-25 19:37:37', '2026-01-25 19:37:37', '2026-01-25 19:37:37'),
(25, 'Pula,Croatia', '2026-01-28', 12.80, 'Cloudy with Chance of Rain', 31.00, 5.29, '2026-01-25 19:37:37', '2026-01-25 19:37:37', '2026-01-25 19:37:37'),
(26, 'Pula,Croatia', '2026-01-29', 10.70, 'Mostly Cloudy with Showers', 15.00, 15.23, '2026-01-25 19:37:37', '2026-01-25 19:37:37', '2026-01-25 19:37:37'),
(27, 'Pula,Croatia', '2026-01-30', 12.20, 'Partly Cloudy with Showers', 7.00, 13.73, '2026-01-25 19:37:37', '2026-01-25 19:37:37', '2026-01-25 19:37:37'),
(28, 'Pula,Croatia', '2026-01-31', 10.00, 'Mostly Cloudy', 20.00, 16.00, '2026-01-25 19:37:37', '2026-01-25 19:37:37', '2026-01-25 19:37:37'),
(29, 'Osijek,Croatia', '2026-01-26', 6.10, 'Mostly Cloudy with Showers', 5.00, 9.17, '2026-01-26 15:36:41', '2026-01-26 15:36:41', '2026-01-26 15:36:41'),
(30, 'Osijek,Croatia', '2026-01-27', 8.30, 'Mostly Sunny', 9.00, 11.03, '2026-01-26 15:36:41', '2026-01-26 15:36:41', '2026-01-26 15:36:41'),
(31, 'Osijek,Croatia', '2026-01-28', 7.80, 'Cloudy with Chance of Light Rain', 11.00, 13.83, '2026-01-26 15:36:41', '2026-01-26 15:36:41', '2026-01-26 15:36:41'),
(32, 'Osijek,Croatia', '2026-01-29', 5.00, 'Mostly Cloudy', 5.00, 16.00, '2026-01-26 15:36:41', '2026-01-26 15:36:41', '2026-01-26 15:36:41'),
(33, 'Osijek,Croatia', '2026-01-30', 3.60, 'Mostly Cloudy with Scattered Showers', 16.00, 15.98, '2026-01-26 15:36:41', '2026-01-26 15:36:41', '2026-01-26 15:36:41'),
(34, 'Osijek,Croatia', '2026-01-31', 4.20, 'Partly Cloudy', 13.00, 16.00, '2026-01-26 15:36:41', '2026-01-26 15:36:41', '2026-01-26 15:36:41'),
(35, 'Osijek,Croatia', '2026-02-01', 3.20, 'Partly Cloudy', 2.00, 16.00, '2026-01-26 15:36:41', '2026-01-26 15:36:41', '2026-01-26 15:36:41'),
(36, 'Imotski,Croatia', '2026-01-28', 7.30, 'Mostly Cloudy with Scattered Showers', 13.00, 3.31, '2026-01-28 15:18:23', '2026-01-28 15:18:23', '2026-01-28 15:18:23'),
(37, 'Imotski,Croatia', '2026-01-29', 10.60, 'Mostly Cloudy', 2.00, 9.92, '2026-01-28 15:18:23', '2026-01-28 15:18:23', '2026-01-28 15:18:23'),
(38, 'Imotski,Croatia', '2026-01-30', 8.80, 'Partly Cloudy with Showers', 2.00, 13.30, '2026-01-28 15:18:23', '2026-01-28 15:18:23', '2026-01-28 15:18:23'),
(39, 'Imotski,Croatia', '2026-01-31', 9.00, 'Partly Cloudy', 0.00, 15.04, '2026-01-28 15:18:23', '2026-01-28 15:18:23', '2026-01-28 15:18:23'),
(40, 'Imotski,Croatia', '2026-02-01', 9.70, 'Mostly Sunny', 11.00, 15.99, '2026-01-28 15:18:23', '2026-01-28 15:18:23', '2026-01-28 15:18:23'),
(41, 'Imotski,Croatia', '2026-02-02', 11.00, 'Sunny', 7.00, 16.00, '2026-01-28 15:18:23', '2026-01-28 15:18:23', '2026-01-28 15:18:23'),
(42, 'Imotski,Croatia', '2026-02-03', 11.20, 'Cloudy with Light Rain Showers', 14.00, 12.26, '2026-01-28 15:18:23', '2026-01-28 15:18:23', '2026-01-28 15:18:23'),
(43, 'Livno,Bosnia', '2026-01-28', 4.80, 'Cloudy with Chance of Rain', 15.00, 1.26, '2026-01-28 15:18:34', '2026-01-28 15:18:34', '2026-01-28 15:18:34'),
(44, 'Livno,Bosnia', '2026-01-29', 6.30, 'Mostly Cloudy', 4.00, 9.64, '2026-01-28 15:18:34', '2026-01-28 15:18:34', '2026-01-28 15:18:34'),
(45, 'Livno,Bosnia', '2026-01-30', 5.10, 'Partly Cloudy', 4.00, 13.22, '2026-01-28 15:18:34', '2026-01-28 15:18:34', '2026-01-28 15:18:34'),
(46, 'Livno,Bosnia', '2026-01-31', 4.80, 'Partly Cloudy', 0.00, 14.36, '2026-01-28 15:18:34', '2026-01-28 15:18:34', '2026-01-28 15:18:34'),
(47, 'Livno,Bosnia', '2026-02-01', 3.60, 'Mostly Sunny', 11.00, 14.98, '2026-01-28 15:18:34', '2026-01-28 15:18:34', '2026-01-28 15:18:34'),
(48, 'Livno,Bosnia', '2026-02-02', 8.00, 'Sunny', 7.00, 15.96, '2026-01-28 15:18:34', '2026-01-28 15:18:34', '2026-01-28 15:18:34'),
(49, 'Livno,Bosnia', '2026-02-03', 8.20, 'Cloudy with Light Rain Showers', 14.00, 2.81, '2026-01-28 15:18:34', '2026-01-28 15:18:34', '2026-01-28 15:18:34'),
(50, 'Karlovac,Croatia', '2026-01-29', 9.40, 'Mostly Cloudy', 1.00, 10.57, '2026-01-29 19:13:13', '2026-01-29 19:13:13', '2026-01-29 19:13:13'),
(51, 'Karlovac,Croatia', '2026-01-30', 7.50, 'Mostly Cloudy', 2.00, 14.08, '2026-01-29 19:13:13', '2026-01-29 19:13:13', '2026-01-29 19:13:13'),
(52, 'Karlovac,Croatia', '2026-01-31', 6.50, 'Mostly Cloudy', 0.00, 11.35, '2026-01-29 19:13:13', '2026-01-29 19:13:13', '2026-01-29 19:13:13'),
(53, 'Karlovac,Croatia', '2026-02-01', 5.50, 'Cloudy', 1.00, 13.79, '2026-01-29 19:13:13', '2026-01-29 19:13:13', '2026-01-29 19:13:13'),
(54, 'Karlovac,Croatia', '2026-02-02', 4.30, 'Cloudy', 2.00, 15.61, '2026-01-29 19:13:13', '2026-01-29 19:13:13', '2026-01-29 19:13:13'),
(55, 'Karlovac,Croatia', '2026-02-03', 5.30, 'Cloudy', 2.00, 16.00, '2026-01-29 19:13:13', '2026-01-29 19:13:13', '2026-01-29 19:13:13'),
(56, 'Karlovac,Croatia', '2026-02-04', 11.30, 'Mostly Cloudy', 0.00, 16.00, '2026-01-29 19:13:13', '2026-01-29 19:13:13', '2026-01-29 19:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

DROP TABLE IF EXISTS `proizvodi`;
CREATE TABLE IF NOT EXISTS `proizvodi` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(150) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `cijena` decimal(10,2) NOT NULL,
  `kategorija_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proizvodi_kategorija_id_foreign` (`kategorija_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `kolicina`, `cijena`, `kategorija_id`, `created_at`, `updated_at`) VALUES
(3, 'Pelinkovac', 200, 15.59, 1, '2026-01-22 14:46:37', '2026-01-22 14:46:37'),
(4, 'Novine', 400, 2.39, 3, '2026-01-22 14:46:37', '2026-01-22 14:46:37'),
(5, 'Sok od Cole', 100, 2.69, 2, '2026-01-22 14:53:17', '2026-01-22 14:53:17'),
(6, 'Pršut', 100, 20.00, 2, '2026-01-23 07:52:02', '2026-01-23 07:52:02'),
(7, 'Kobasica', 120, 25.00, 2, '2026-01-23 07:52:16', '2026-01-23 07:52:16'),
(8, 'Rakija', 120, 43.00, 1, '2026-01-23 07:52:32', '2026-01-23 07:52:32'),
(9, 'Lubenica', 150, 10.00, 2, '2026-01-23 11:24:07', '2026-01-23 11:24:07'),
(10, 'Tipkovnica', 200, 10.00, 5, '2026-01-23 12:15:35', '2026-01-23 12:15:35'),
(11, 'Cvijeće', 100, 10.00, 6, '2026-01-23 12:19:02', '2026-01-23 12:19:02'),
(12, 'Viski', 100, 10.00, 1, '2026-01-29 19:12:31', '2026-01-29 19:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ELyDb7U3ISRCuVHdRhGQ9JxtcdvW1L9PxdVIbNl2', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU2VKRHU5NXZvMUkzdmM4cnpwUnVGbjltSXBYa2NDNWdwSlVGQmNoQyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1769778529);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datumrod` date DEFAULT NULL,
  `usertype` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `datumrod`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Adminko User', 'admin@test.com', '2010-10-13', 0, NULL, '$2y$12$IB4f2Y87EgkHl3.JWHp1Z.iBo2XI1adVF.ZHx/30IA84XGKLOvD1e', NULL, '2026-01-22 11:56:42', '2026-01-22 13:06:42');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_kategorija_id_foreign` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorije` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
