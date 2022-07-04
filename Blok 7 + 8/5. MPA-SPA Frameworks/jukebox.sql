-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 04 jul 2022 om 11:41
-- Serverversie: 8.0.18
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jukebox`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pop', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(2, 'House', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(3, 'Hiphop / Rap', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(4, 'Electronic', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(5, 'Rock', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(6, 'eos', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(7, 'voluptatem', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(8, 'qui', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(9, 'nesciunt', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(10, 'soluta', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(11, 'praesentium', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(12, 'sed', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(13, 'dolores', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(14, 'consequatur', '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(15, 'voluptate', '2022-06-20 07:56:24', '2022-06-20 07:56:24');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(126, '2014_10_12_000000_create_users_table', 1),
(127, '2014_10_12_100000_create_password_resets_table', 1),
(128, '2019_08_19_000000_create_failed_jobs_table', 1),
(129, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(130, '2022_05_30_113440_create_genres_table', 1),
(131, '2022_06_03_091655_create_songs_table', 1),
(132, '2022_06_17_105259_create_playlists_table', 1),
(133, '2022_06_17_114048_create_playlist_song_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `playlist_song`
--

CREATE TABLE `playlist_song` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `playlist_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `songs`
--

CREATE TABLE `songs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `songs`
--

INSERT INTO `songs` (`id`, `genre_id`, `name`, `artist`, `duration`, `created_at`, `updated_at`) VALUES
(1, 10, 'alias', 'Genesis Crona', 211, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(2, 7, 'laboriosam', 'Dr. Kaleb Larson', 207, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(3, 3, 'dignissimos', 'Megane Kihn', 231, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(4, 14, 'eum', 'Raoul Kuhlman I', 204, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(5, 7, 'consequatur', 'Ray Jenkins', 205, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(6, 7, 'culpa', 'Prof. Marty Howell', 189, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(7, 5, 'debitis', 'Dr. Queen Terry', 158, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(8, 9, 'earum', 'Clint Purdy', 111, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(9, 4, 'quos', 'Cleora Purdy II', 236, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(10, 7, 'quibusdam', 'Francisca Morar', 236, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(11, 9, 'non', 'Idell Zulauf', 247, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(12, 8, 'est', 'Ashtyn Purdy DDS', 279, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(13, 7, 'tempore', 'Jaydon Hane', 164, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(14, 4, 'ea', 'Oren Balistreri', 248, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(15, 6, 'dolores', 'Eulah Renner', 143, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(16, 3, 'et', 'Ms. Aditya Sipes', 132, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(17, 11, 'optio', 'Vilma Stark', 103, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(18, 2, 'quos', 'Trycia Heaney', 218, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(19, 8, 'voluptate', 'Mr. Noe Swaniawski II', 218, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(20, 6, 'non', 'Helena Barrows', 268, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(21, 13, 'suscipit', 'Palma Littel II', 186, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(22, 12, 'ipsam', 'Granville Halvorson', 146, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(23, 5, 'atque', 'Ms. Adele Zboncak IV', 128, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(24, 11, 'consequuntur', 'Edwina Rath', 275, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(25, 13, 'est', 'Lorna Herman', 180, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(26, 6, 'occaecati', 'Dr. Marvin Lakin IV', 190, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(27, 9, 'temporibus', 'Mr. Otis Frami I', 182, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(28, 9, 'modi', 'Joana Yost', 95, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(29, 11, 'adipisci', 'Tabitha Smith', 154, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(30, 5, 'expedita', 'Junius Hammes', 209, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(31, 7, 'at', 'Boris O\'Conner DDS', 140, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(32, 1, 'molestiae', 'Isabelle Price', 127, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(33, 7, 'possimus', 'Mr. Benjamin Bode II', 192, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(34, 8, 'molestiae', 'Louisa Thiel', 115, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(35, 15, 'dolore', 'Curtis Murazik', 128, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(36, 8, 'tempora', 'Carmine Reinger', 148, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(37, 15, 'excepturi', 'Mrs. Tiffany Crooks', 115, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(38, 4, 'illum', 'Maude Hettinger MD', 277, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(39, 6, 'repellat', 'Zoey Nikolaus', 155, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(40, 15, 'quia', 'Barbara Kuphal', 138, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(41, 7, 'excepturi', 'Maryam Nitzsche', 174, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(42, 8, 'occaecati', 'Kristin Schmidt', 271, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(43, 6, 'vel', 'Dudley Moore', 272, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(44, 2, 'expedita', 'Dr. Van Hansen PhD', 224, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(45, 5, 'culpa', 'Dr. Abigale Schmeler Sr.', 216, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(46, 14, 'voluptatum', 'Mrs. Jalyn Cremin Sr.', 156, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(47, 6, 'facere', 'Green Runolfsson', 269, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(48, 8, 'ut', 'Scarlett Hirthe', 109, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(49, 5, 'quo', 'Doug Rohan', 199, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(50, 3, 'dolor', 'Michaela Wilkinson', 272, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(51, 14, 'quae', 'Ebba Kuhlman', 274, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(52, 4, 'molestiae', 'Bridie Stracke', 191, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(53, 1, 'et', 'Helene Stark', 116, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(54, 9, 'officiis', 'Granville Upton V', 175, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(55, 6, 'ex', 'Holly Jacobi', 297, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(56, 4, 'nihil', 'Simone Roberts', 217, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(57, 15, 'vel', 'Frank Ward', 238, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(58, 7, 'est', 'Letha Ledner', 277, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(59, 12, 'ex', 'Johnathon Williamson', 279, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(60, 15, 'sed', 'Prof. Leon Koelpin', 170, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(61, 2, 'consequuntur', 'Elyssa Macejkovic', 170, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(62, 10, 'voluptatibus', 'Sophia Wehner DDS', 246, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(63, 10, 'alias', 'Gerda Toy Jr.', 260, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(64, 5, 'suscipit', 'Leopold McDermott', 194, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(65, 9, 'nisi', 'Deondre Graham', 136, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(66, 4, 'enim', 'Jedediah Torphy', 265, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(67, 9, 'sed', 'Mauricio Nader', 178, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(68, 6, 'tempore', 'Elizabeth Swift', 153, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(69, 7, 'totam', 'Laila Raynor', 231, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(70, 12, 'omnis', 'Herminia Maggio', 285, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(71, 7, 'fugit', 'Charlie Gottlieb', 95, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(72, 5, 'voluptates', 'Iliana Thompson', 272, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(73, 2, 'ipsum', 'Ms. Dina Auer', 297, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(74, 8, 'qui', 'Maynard Leffler', 136, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(75, 2, 'inventore', 'Mr. Baron Roberts Jr.', 116, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(76, 8, 'qui', 'Christine Bartell', 240, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(77, 15, 'ipsam', 'Guido Bergstrom', 155, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(78, 7, 'voluptates', 'Mrs. Marisa Volkman', 171, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(79, 6, 'et', 'Oliver Quigley', 188, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(80, 8, 'exercitationem', 'Keith Larkin', 109, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(81, 3, 'aliquid', 'Savanna Kshlerin', 146, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(82, 3, 'sed', 'Mekhi Littel', 103, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(83, 15, 'est', 'Raymundo Pouros III', 212, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(84, 7, 'ratione', 'Daron Shanahan MD', 210, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(85, 8, 'numquam', 'Amya Reilly', 291, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(86, 3, 'cupiditate', 'Cristobal Bartoletti', 149, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(87, 8, 'adipisci', 'Ms. Icie Nitzsche', 194, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(88, 5, 'voluptates', 'Micaela Stokes IV', 117, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(89, 12, 'ipsa', 'Alfonso Abshire', 143, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(90, 10, 'porro', 'Dr. Antoinette Dach', 164, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(91, 9, 'aut', 'Madge Blanda III', 140, '2022-06-20 07:56:24', '2022-06-20 07:56:24'),
(92, 1, 'eius', 'Ardith Hammes', 212, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(93, 9, 'ex', 'Rolando Upton', 210, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(94, 3, 'repellendus', 'Leslie Block Sr.', 225, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(95, 5, 'quia', 'Ryann Herzog', 282, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(96, 6, 'consectetur', 'Dusty Pouros III', 227, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(97, 10, 'asperiores', 'Derrick Aufderhar', 170, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(98, 2, 'et', 'Issac Hauck', 223, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(99, 14, 'rem', 'John Schimmel', 154, '2022-06-20 07:56:25', '2022-06-20 07:56:25'),
(100, 7, 'facilis', 'Jakayla Wilderman III', 161, '2022-06-20 07:56:25', '2022-06-20 07:56:25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ricardo Froeliger', 'ricardofroeliger@gmail.com', NULL, '$2y$10$ivTl9rurpDTczhPq9MIQqeod89pfpe9vT/7aIDZramKDqxJ3YCrRy', 'rnEswSAS3uFueudkfL1rllEfRlHF5c3C3I45BBQDQowByRQGnKOd4sJy9f5q', '2022-07-04 09:33:54', '2022-07-04 09:33:54');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexen voor tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_name_unique` (`name`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexen voor tabel `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT voor een tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `playlist_song`
--
ALTER TABLE `playlist_song`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
