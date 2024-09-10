-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `books_kode_buku_unique` (`kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `books` (`id`, `kode_buku`, `nama`, `categories_id`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(5,	'A5',	'11 Dosa Besar Soeharto',	10,	'Dipinjam',	NULL,	'2024-05-12 20:55:45',	'2024-05-16 17:15:39'),
(6,	'A6',	'Kitab Hengker',	2,	'Ada',	NULL,	'2024-05-12 21:04:03',	'2024-05-16 19:42:44'),
(7,	'A7',	'King Indo mengalahkan Korea 😱😱',	11,	'dipinjam',	NULL,	'2024-05-13 07:17:10',	'2024-05-16 19:42:06'),
(8,	'A8',	'Ipa Kelas 8',	10,	'Ada',	NULL,	'2024-05-13 07:23:26',	'2024-05-16 06:10:22'),
(9,	'A9',	'Ipa Kelas 8',	10,	'Ada',	NULL,	'2024-05-13 07:23:37',	'2024-05-16 06:10:29'),
(10,	'A10',	'IPS Kelas 8',	10,	'Ada',	NULL,	'2024-05-13 21:27:00',	'2024-05-13 21:29:28'),
(11,	'A11',	'Matematika Kelas 9',	9,	'Ada',	NULL,	'2024-05-17 20:52:22',	'2024-05-17 20:52:22'),
(12,	'A12',	'Matematika Kelas 9',	9,	'Ada',	NULL,	'2024-05-17 20:52:34',	'2024-05-17 20:52:34'),
(13,	'A13',	'Matematika Kelas 9',	9,	'Ada',	NULL,	'2024-05-17 20:52:46',	'2024-05-17 20:52:46'),
(14,	'A14',	'Matematika Kelas 9',	9,	'Ada',	NULL,	'2024-05-17 20:52:58',	'2024-05-17 20:52:58'),
(16,	'A15',	'Matematika Kelas 9',	9,	'Ada',	NULL,	'2024-05-17 20:53:25',	'2024-05-17 20:53:25'),
(17,	'A16',	'Matematika Kelas 9',	9,	'Ada',	NULL,	'2024-05-17 20:57:36',	'2024-05-17 20:57:36'),
(18,	'A17',	'PKN Kelas 7',	2,	'Ada',	NULL,	'2024-05-17 20:59:13',	'2024-05-17 20:59:13'),
(19,	'A18',	'PKN Kelas 7',	2,	'Ada',	NULL,	'2024-05-17 20:59:22',	'2024-05-17 20:59:22'),
(20,	'A19',	'PKN Kelas 7',	2,	'Ada',	NULL,	'2024-05-17 20:59:35',	'2024-05-17 20:59:35');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2,	'Comedy',	'2024-05-12 05:04:04',	'2024-05-12 05:04:04'),
(8,	'weladalah',	'2024-05-12 07:49:12',	'2024-05-12 08:19:18'),
(9,	'hai ges',	'2024-05-12 08:12:54',	'2024-05-12 08:33:57'),
(10,	'fiksi',	'2024-05-12 08:34:14',	'2024-05-12 08:34:19'),
(11,	'Dramatic',	'2024-05-12 16:08:28',	'2024-05-12 16:08:28');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2024_05_12_072958_categories',	2),
(6,	'2024_05_12_135518_books',	3),
(7,	'2024_05_12_235613_peminjaman',	4);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pinjam`;
CREATE TABLE `pinjam` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buku_id` bigint unsigned NOT NULL,
  `tanggal_dipinjam` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_buku_id_foreign` (`buku_id`),
  CONSTRAINT `peminjaman_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `books` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pinjam` (`id`, `nama_peminjam`, `kelas`, `buku_id`, `tanggal_dipinjam`, `status`, `created_at`, `updated_at`) VALUES
(16,	'Fuad',	'9C',	6,	'2024-05-17',	'Returned',	'2024-05-16 19:41:45',	'2024-05-16 19:42:44'),
(17,	'Soehar',	'8E',	7,	'2024-05-22',	'Ongoing',	'2024-05-16 19:42:06',	'2024-08-30 00:25:05');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'King MU',	'admin@gmail.com',	NULL,	'$2y$10$LP9J5vARyr9XZ/fRVWGw1esC3qsoc6RDVeXQpL1y9Zq4oPCwUjQxi',	NULL,	'2024-05-11 09:11:24',	'2024-05-13 07:25:07');

-- 2024-09-10 13:06:49
