-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2020 at 07:08 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devRoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_06_101038_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mil_cost`
--

DROP TABLE IF EXISTS `mil_cost`;
CREATE TABLE `mil_cost` (
  `id` int NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mil_cost`
--

INSERT INTO `mil_cost` (`id`, `cost`, `created_at`, `updated_at`) VALUES
(4, '317.00', '2020-10-12 10:14:27', '2020-10-12 10:14:27'),
(5, '28.00', '2020-10-12 10:14:47', '2020-10-12 10:14:47'),
(6, '38.00', '2020-10-12 10:14:56', '2020-10-12 10:14:56'),
(7, '68.00', '2020-10-12 10:15:22', '2020-10-12 10:15:22'),
(8, '365.00', '2020-10-14 09:05:47', '2020-10-14 09:05:47'),
(9, '25.00', '2020-10-14 09:43:00', '2020-10-14 09:43:00'),
(10, '20.00', '2020-10-14 09:44:19', '2020-10-14 09:44:19'),
(11, '70.00', '2020-10-15 08:58:46', '2020-10-15 08:58:46'),
(12, '45.00', '2020-10-16 10:07:42', '2020-10-16 10:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `mil_count`
--

DROP TABLE IF EXISTS `mil_count`;
CREATE TABLE `mil_count` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=lunch,2=diner',
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mil_count`
--

INSERT INTO `mil_count` (`id`, `user_id`, `status`, `date`, `created_at`, `updated_at`) VALUES
(21, 1, '1', '2020-10-12', '2020-10-12 10:18:29', '2020-10-12 10:18:29'),
(22, 1, '1', '2020-10-12', '2020-10-12 10:18:31', '2020-10-12 10:18:31'),
(23, 1, '1', '2020-10-12', '2020-10-12 10:18:33', '2020-10-12 10:18:33'),
(24, 1, '2', '2020-10-12', '2020-10-12 10:18:34', '2020-10-12 10:18:34'),
(25, 1, '2', '2020-10-12', '2020-10-12 10:18:36', '2020-10-12 10:18:36'),
(26, 1, '2', '2020-10-12', '2020-10-12 10:18:37', '2020-10-12 10:18:37'),
(27, 2, '2', '2020-10-12', '2020-10-12 10:18:44', '2020-10-12 10:18:44'),
(28, 2, '2', '2020-10-12', '2020-10-12 10:18:46', '2020-10-12 10:18:46'),
(29, 2, '2', '2020-10-12', '2020-10-12 10:18:47', '2020-10-12 10:18:47'),
(30, 4, '2', '2020-10-12', '2020-10-12 10:18:51', '2020-10-12 10:18:51'),
(31, 4, '2', '2020-10-12', '2020-10-12 10:18:51', '2020-10-12 10:18:51'),
(32, 4, '2', '2020-10-12', '2020-10-12 10:18:52', '2020-10-12 10:18:52'),
(33, 3, '1', '2020-10-12', '2020-10-12 10:18:55', '2020-10-12 10:18:55'),
(34, 3, '1', '2020-10-12', '2020-10-12 10:18:55', '2020-10-12 10:18:55'),
(35, 3, '1', '2020-10-12', '2020-10-12 10:18:56', '2020-10-12 10:18:56'),
(36, 3, '2', '2020-10-12', '2020-10-12 10:18:58', '2020-10-12 10:18:58'),
(37, 3, '2', '2020-10-12', '2020-10-12 10:18:59', '2020-10-12 10:18:59'),
(38, 3, '2', '2020-10-12', '2020-10-12 10:19:00', '2020-10-12 10:19:00'),
(39, 4, '2', '2020-10-13', '2020-10-13 09:15:53', '2020-10-13 09:15:53'),
(40, 3, '2', '2020-10-13', '2020-10-13 09:15:54', '2020-10-13 09:15:54'),
(41, 2, '2', '2020-10-13', '2020-10-13 09:15:56', '2020-10-13 09:15:56'),
(42, 1, '2', '2020-10-13', '2020-10-13 09:15:57', '2020-10-13 09:15:57'),
(43, 1, '2', '2020-10-14', '2020-10-14 09:06:09', '2020-10-14 09:06:09'),
(44, 2, '2', '2020-10-14', '2020-10-14 09:06:11', '2020-10-14 09:06:11'),
(45, 3, '2', '2020-10-14', '2020-10-14 09:06:13', '2020-10-14 09:06:13'),
(46, 4, '2', '2020-10-14', '2020-10-14 09:06:17', '2020-10-14 09:06:17'),
(47, 1, '1', '2020-10-14', '2020-10-14 09:44:24', '2020-10-14 09:44:24'),
(48, 3, '1', '2020-10-14', '2020-10-14 09:44:28', '2020-10-14 09:44:28'),
(49, 1, '1', '2020-10-15', '2020-10-15 08:58:52', '2020-10-15 08:58:52'),
(50, 1, '2', '2020-10-15', '2020-10-15 08:58:54', '2020-10-15 08:58:54'),
(51, 3, '1', '2020-10-15', '2020-10-15 08:59:00', '2020-10-15 08:59:00'),
(52, 3, '2', '2020-10-15', '2020-10-15 08:59:01', '2020-10-15 08:59:01'),
(53, 2, '2', '2020-10-15', '2020-10-15 08:59:03', '2020-10-15 08:59:03'),
(54, 4, '2', '2020-10-15', '2020-10-15 08:59:05', '2020-10-15 08:59:05'),
(55, 1, '1', '2020-10-16', '2020-10-16 10:09:27', '2020-10-16 10:09:27'),
(56, 1, '2', '2020-10-16', '2020-10-16 10:09:29', '2020-10-16 10:09:29'),
(57, 3, '1', '2020-10-16', '2020-10-16 10:09:35', '2020-10-16 10:09:35'),
(58, 3, '2', '2020-10-16', '2020-10-16 10:09:36', '2020-10-16 10:09:36'),
(59, 4, '1', '2020-10-16', '2020-10-16 10:09:39', '2020-10-16 10:09:39'),
(60, 4, '2', '2020-10-16', '2020-10-16 10:09:41', '2020-10-16 10:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `mil_savings`
--

DROP TABLE IF EXISTS `mil_savings`;
CREATE TABLE `mil_savings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `savings` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mil_savings`
--

INSERT INTO `mil_savings` (`id`, `user_id`, `savings`, `created_at`, `updated_at`) VALUES
(7, 4, '268.00', '2020-10-12 10:12:03', '2020-10-12 10:12:03'),
(8, 2, '200.00', '2020-10-12 10:12:22', '2020-10-12 10:12:22'),
(9, 1, '145.00', '2020-10-12 10:13:55', '2020-10-12 10:13:55'),
(10, 3, '365.00', '2020-10-14 09:05:32', '2020-10-14 09:05:32'),
(11, 2, '25.00', '2020-10-14 09:42:31', '2020-10-14 09:42:31'),
(12, 1, '10.00', '2020-10-14 09:44:05', '2020-10-14 09:44:05'),
(13, 3, '10.00', '2020-10-14 09:44:13', '2020-10-14 09:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0bbe0577-582e-4df4-a9df-083ad92dce68', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 07:32:41', '2020-10-06 07:32:41'),
('0ffb5ffe-fdbb-41d2-9633-dfa19b712498', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 09:03:12', '2020-10-06 09:03:12'),
('11992dfc-8e82-43c0-ab9c-3862ece02658', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 07:50:58', '2020-10-06 07:50:58'),
('405cf1a8-31e6-49f0-a549-3fc661a75731', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 08:10:00', '2020-10-06 08:10:00'),
('43e8a043-ce53-4d1f-96a0-895a45b9f83b', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 08:50:49', '2020-10-06 08:50:49'),
('499e063a-5346-4922-b505-249bee365b34', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 08:52:56', '2020-10-06 08:52:56'),
('4e1bb4ae-21bf-4ab0-a427-fc0b4c73a5b9', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 09:13:41', '2020-10-06 09:13:41'),
('5cb4529a-7db8-407d-a51c-e2126d5a8f87', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 09:12:28', '2020-10-06 09:12:28'),
('743d4622-a44c-4991-8e2f-7c83ca8b99bc', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', '2020-10-06 05:10:38', '2020-10-06 05:10:36', '2020-10-06 05:10:38'),
('c8c6a397-abb4-44d5-9e25-a5eb29ef0487', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', '2020-10-06 05:04:38', '2020-10-06 04:25:58', '2020-10-06 05:04:38'),
('c9e6ec2f-a44e-4421-bac1-0aea4cbe83a0', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 07:30:01', '2020-10-06 07:30:01'),
('ce1fe9ed-147f-47d2-9514-6e40cbc9d3c7', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', '2020-10-06 05:07:00', '2020-10-06 05:06:58', '2020-10-06 05:07:00'),
('d6a7b92c-c1b1-47e2-bc0a-89622f78c65e', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 07:31:41', '2020-10-06 07:31:41'),
('dd8e4e68-8359-4e7c-a6ec-26026e2e9433', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 09:09:05', '2020-10-06 09:09:05'),
('e530619f-298f-4910-93dc-9c51aad4e377', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', NULL, '2020-10-06 08:05:32', '2020-10-06 08:05:32'),
('e8155ced-3ffc-4b0d-a142-815f8b7df728', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', '2020-10-06 05:05:04', '2020-10-06 05:05:01', '2020-10-06 05:05:04'),
('eec21b8e-11eb-40ad-bd9f-e09482ad0ad4', 'App\\Notifications\\PeymentNotify', 'App\\User', 1, '{\"amount\":900}', '2020-10-06 05:04:38', '2020-10-06 04:55:03', '2020-10-06 05:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sharif Khan Milon', 'khanmilon114@gmail.com', NULL, '$2y$10$4cjtb4GTGBHzCVaAXIQdte3c3Cn9./EkmAVWK.tky0twQCu67Jfq2', 'P78mg5cMl7yz1ACXFSENKXSh7SWp4WcguwNsEV91jt1fCCYlULhpl3PghiH3', '2020-10-05 00:34:36', '2020-10-05 09:14:49'),
(2, 'Iqbal Ahmed Tuhin', 'jn@mail.com', NULL, '$2y$10$eQ.3rtJ5JaRoVcCn9FA3u.2AEp.riQcmq8CWY7MUtGf5a/wKDpfIi', NULL, '2020-10-12 01:55:12', '2020-10-12 01:55:12'),
(3, 'Sharif Feni', 'sharif@mail.com', NULL, '$2y$10$lLdnreMQEZZLJXddeIijn.RtgUYxlEvkGGFXMalV6uDw.We0OacLa', NULL, '2020-10-12 01:55:59', '2020-10-12 01:55:59'),
(4, 'Muntaser Muttaqi', 'muntaser@mail.com', NULL, '$2y$10$Dzl/UhhgGucGRTCJWSzQrusLy2PglwBzP0hSR/GCFICoupoVQxL5G', NULL, '2020-10-12 01:56:37', '2020-10-12 01:56:37'),
(5, 'Pujan Das', 'puandas@mail.com', NULL, '$2y$10$i4l13g6XJu/nmP6FLGAi7eBsrJZtYKSvk3LvcUdGKL4YVtImvp0Ly', NULL, '2020-10-16 10:07:24', '2020-10-16 10:07:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mil_cost`
--
ALTER TABLE `mil_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mil_count`
--
ALTER TABLE `mil_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mil_savings`
--
ALTER TABLE `mil_savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mil_cost`
--
ALTER TABLE `mil_cost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mil_count`
--
ALTER TABLE `mil_count`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `mil_savings`
--
ALTER TABLE `mil_savings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
