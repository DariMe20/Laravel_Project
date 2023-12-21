-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: dec. 21, 2023 la 03:39 PM
-- Versiune server: 10.4.32-MariaDB
-- Versiune PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `eventticketapp`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titlu` varchar(191) NOT NULL,
  `descriere` text DEFAULT NULL,
  `data` date NOT NULL,
  `locatie` varchar(191) NOT NULL,
  `tip` varchar(191) NOT NULL,
  `pret` decimal(8,2) NOT NULL,
  `disponibilitate` tinyint(1) NOT NULL,
  `speaker` varchar(191) DEFAULT NULL,
  `sponsor` varchar(191) DEFAULT NULL,
  `partener` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `agendas`
--

INSERT INTO `agendas` (`id`, `titlu`, `descriere`, `data`, `locatie`, `tip`, `pret`, `disponibilitate`, `speaker`, `sponsor`, `partener`, `created_at`, `updated_at`) VALUES
(2, 'TedEx', 'Cel mai tare eveniment', '2024-11-30', 'Cluj-Napoca', 'Bilet concert', 50.00, 1, 'Andrei, Smileyyy, Dorian Popa', 'Kaufland, Atlantis, BT', 'SpeakerHub', '2023-12-20 12:44:43', '2023-12-20 12:44:43');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titlu` varchar(191) NOT NULL,
  `descriere` text NOT NULL,
  `data` date NOT NULL,
  `locatie` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `events`
--

INSERT INTO `events` (`id`, `titlu`, `descriere`, `data`, `locatie`, `created_at`, `updated_at`) VALUES
(3, 'NutriTalk', 'h', '2024-11-30', 'Cluj-Napoca', '2023-12-19 09:03:42', '2023-12-20 13:04:12'),
(4, 'Eveniment2', 'Descriere 1,2,3,4', '2024-11-30', 'Cluj-Napoca', '2023-12-19 09:03:59', '2023-12-19 10:25:55');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `event_partner`
--

CREATE TABLE `event_partner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `partner_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `event_partner`
--

INSERT INTO `event_partner` (`id`, `created_at`, `updated_at`, `event_id`, `partner_id`) VALUES
(2, NULL, NULL, 3, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `event_speaker`
--

CREATE TABLE `event_speaker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `speaker_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `event_speaker`
--

INSERT INTO `event_speaker` (`id`, `created_at`, `updated_at`, `event_id`, `speaker_id`) VALUES
(15, NULL, NULL, 4, 1),
(16, NULL, NULL, 3, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `event_sponsor`
--

CREATE TABLE `event_sponsor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `sponsor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `event_sponsor`
--

INSERT INTO `event_sponsor` (`id`, `event_id`, `sponsor_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_19_063514_create_agenda', 2),
(6, '2023_12_19_063815_create_event', 3),
(7, '2023_12_19_063834_create_speaker', 3),
(8, '2023_12_19_063848_create_sponsor', 3),
(9, '2023_12_19_063922_create_ticket', 3),
(10, '2023_12_19_064109_create_partner', 3),
(11, '2023_12_19_104901_add_event_id_to_tickets_table', 4),
(12, '2023_12_19_105647_create_event_speaker_table', 5),
(13, '2023_12_19_105654_create_event_partner_table', 5),
(14, '2023_12_19_113225_modify_event_speaker_table', 6),
(15, '2023_12_19_113325_modify_event_partner_table', 6),
(16, '2023_12_19_113407_create_event_sponsor_table', 6);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `partners`
--

INSERT INTO `partners` (`id`, `nume`, `created_at`, `updated_at`) VALUES
(1, 'Kaufland', '2023-12-19 08:04:44', '2023-12-19 08:04:44'),
(2, 'Atlantis', '2023-12-19 08:04:51', '2023-12-19 08:04:51'),
(3, 'SpeakerHub', '2023-12-19 08:05:08', '2023-12-19 08:05:08'),
(5, 'Partener Fantastic', '2023-12-20 12:43:16', '2023-12-20 12:43:16');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `speakers`
--

INSERT INTO `speakers` (`id`, `nume`, `created_at`, `updated_at`) VALUES
(1, 'Smileyyyy', '2023-12-19 08:09:01', '2023-12-19 10:16:06'),
(2, 'Dorian Popa', '2023-12-19 08:09:12', '2023-12-19 08:09:12'),
(3, 'Andra', '2023-12-20 12:40:39', '2023-12-20 12:40:39'),
(4, 'Maruta', '2023-12-20 12:40:43', '2023-12-20 12:40:43'),
(5, 'Artist nou', '2023-12-20 12:40:49', '2023-12-20 12:40:49');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `sponsors`
--

INSERT INTO `sponsors` (`id`, `nume`, `created_at`, `updated_at`) VALUES
(1, 'BT', '2023-12-19 08:05:28', '2023-12-19 08:05:28'),
(3, 'Sponsor5', '2023-12-19 09:56:37', '2023-12-19 09:56:37'),
(4, 'Untold', '2023-12-20 12:43:35', '2023-12-20 12:43:35'),
(5, 'EC', '2023-12-20 12:43:38', '2023-12-20 12:43:38');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tip` varchar(191) NOT NULL,
  `pret` decimal(8,2) NOT NULL,
  `disponibilitate` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `tip`, `pret`, `disponibilitate`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Bilet normal', 20.00, 0, '2023-12-19 10:33:08', '2023-12-20 13:35:20'),
(4, NULL, 'Bilet premium', 100.00, 0, '2023-12-19 10:41:25', '2023-12-20 12:45:54'),
(5, NULL, 'Bilet Eveniment1', 15.00, 1, '2023-12-19 10:58:13', '2023-12-19 10:58:13'),
(6, NULL, 'Bilet concert', 200.00, 1, '2023-12-19 11:47:11', '2023-12-19 11:47:11'),
(7, NULL, 'Bilet TedEx', 55.00, 0, '2023-12-20 12:45:44', '2023-12-20 13:01:04');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daria', 'dariamesesan@yahoo.com', NULL, '$2y$12$gWil/woqIO5PDwgHosM8wOfb69Teol2tZT.Vw2H.DwkrwtbEfHBH6', NULL, '2023-12-19 04:06:25', '2023-12-19 04:06:25'),
(2, 'Alexia', 'alexia@yahoo.com', NULL, '$2y$12$X7SWKyApOuNyVLVTCKbNiet8XOM.Icv.IaGlSIWvQor/a84nrEQGO', NULL, '2023-12-20 12:40:01', '2023-12-20 12:40:01');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `event_partner`
--
ALTER TABLE `event_partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_partner_event_id_foreign` (`event_id`),
  ADD KEY `event_partner_partner_id_foreign` (`partner_id`);

--
-- Indexuri pentru tabele `event_speaker`
--
ALTER TABLE `event_speaker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_speaker_event_id_foreign` (`event_id`),
  ADD KEY `event_speaker_speaker_id_foreign` (`speaker_id`);

--
-- Indexuri pentru tabele `event_sponsor`
--
ALTER TABLE `event_sponsor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_sponsor_event_id_foreign` (`event_id`),
  ADD KEY `event_sponsor_sponsor_id_foreign` (`sponsor_id`);

--
-- Indexuri pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexuri pentru tabele `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexuri pentru tabele `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_event_id_foreign` (`event_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `event_partner`
--
ALTER TABLE `event_partner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `event_speaker`
--
ALTER TABLE `event_speaker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `event_sponsor`
--
ALTER TABLE `event_sponsor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pentru tabele `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `event_partner`
--
ALTER TABLE `event_partner`
  ADD CONSTRAINT `event_partner_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_partner_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `event_speaker`
--
ALTER TABLE `event_speaker`
  ADD CONSTRAINT `event_speaker_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_speaker_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `event_sponsor`
--
ALTER TABLE `event_sponsor`
  ADD CONSTRAINT `event_sponsor_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_sponsor_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
