-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2020 at 06:10 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
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
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

DROP TABLE IF EXISTS `cost`;
CREATE TABLE `cost` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `user_id`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, '100.00', '2020-11-07 08:15:59', '2020-11-07 08:15:59'),
(2, 1, '250.00', '2020-11-07 08:16:21', '2020-11-07 08:16:21'),
(3, 1, '285.00', '2020-11-07 08:16:33', '2020-11-07 08:16:33'),
(4, 1, '240.00', '2020-11-09 10:35:37', '2020-11-09 10:35:37'),
(5, 1, '180.00', '2020-11-10 19:04:40', '2020-11-10 19:04:40'),
(6, 1, '265.00', '2020-11-12 18:45:43', '2020-11-12 18:45:43'),
(8, 1, '35.00', '2020-11-13 17:35:32', '2020-11-13 17:35:32'),
(9, 1, '30.00', '2020-11-14 16:26:44', '2020-11-14 16:26:44'),
(10, 5, '110.00', '2020-11-15 17:24:24', '2020-11-15 17:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

DROP TABLE IF EXISTS `count`;
CREATE TABLE `count` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=lunch,2=diner,3=guest,4=Fine',
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`id`, `user_id`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '2020-11-05', '2020-11-05 08:18:09', '2020-11-05 08:18:09'),
(2, 2, '2', '2020-11-05', '2020-11-05 08:18:11', '2020-11-05 08:18:11'),
(3, 3, '2', '2020-11-05', '2020-11-05 08:18:12', '2020-11-05 08:18:12'),
(4, 4, '2', '2020-11-05', '2020-11-05 08:18:14', '2020-11-05 08:18:14'),
(5, 5, '2', '2020-11-05', '2020-11-05 08:18:16', '2020-11-05 08:18:16'),
(6, 1, '1', '2020-11-06', '2020-11-06 08:18:45', '2020-11-06 08:18:45'),
(7, 1, '2', '2020-11-06', '2020-11-06 08:18:47', '2020-11-06 08:18:47'),
(8, 2, '2', '2020-11-06', '2020-11-06 08:18:49', '2020-11-06 08:18:49'),
(9, 3, '1', '2020-11-06', '2020-11-06 08:18:51', '2020-11-06 08:18:51'),
(10, 3, '2', '2020-11-06', '2020-11-06 08:18:54', '2020-11-06 08:18:54'),
(11, 4, '1', '2020-11-06', '2020-11-06 08:18:58', '2020-11-06 08:18:58'),
(12, 4, '2', '2020-11-06', '2020-11-06 08:18:59', '2020-11-06 08:18:59'),
(13, 5, '1', '2020-11-06', '2020-11-06 08:19:01', '2020-11-06 08:19:01'),
(14, 5, '2', '2020-11-06', '2020-11-06 08:19:03', '2020-11-06 08:19:03'),
(15, 1, '1', '2020-11-07', '2020-11-07 08:19:32', '2020-11-07 08:19:32'),
(16, 1, '2', '2020-11-07', '2020-11-07 08:19:33', '2020-11-07 08:19:33'),
(17, 2, '1', '2020-11-07', '2020-11-07 08:19:34', '2020-11-07 08:19:34'),
(18, 2, '2', '2020-11-07', '2020-11-07 08:19:36', '2020-11-07 08:19:36'),
(19, 3, '1', '2020-11-07', '2020-11-07 08:19:37', '2020-11-07 08:19:37'),
(20, 3, '2', '2020-11-07', '2020-11-07 08:19:39', '2020-11-07 08:19:39'),
(21, 4, '2', '2020-11-07', '2020-11-07 08:19:41', '2020-11-07 08:19:41'),
(22, 5, '1', '2020-11-07', '2020-11-07 08:19:43', '2020-11-07 08:19:43'),
(23, 5, '2', '2020-11-07', '2020-11-07 08:19:45', '2020-11-07 08:19:45'),
(24, 1, '1', '2020-11-08', '2020-11-08 10:49:49', '2020-11-08 10:49:49'),
(25, 1, '2', '2020-11-08', '2020-11-08 10:49:52', '2020-11-08 10:49:52'),
(26, 2, '2', '2020-11-08', '2020-11-08 10:49:56', '2020-11-08 10:49:56'),
(27, 4, '2', '2020-11-08', '2020-11-08 10:50:01', '2020-11-08 10:50:01'),
(28, 5, '1', '2020-11-08', '2020-11-08 10:50:04', '2020-11-08 10:50:04'),
(29, 5, '2', '2020-11-08', '2020-11-08 10:50:06', '2020-11-08 10:50:06'),
(30, 1, '2', '2020-11-09', '2020-11-09 10:35:45', '2020-11-09 10:35:45'),
(31, 2, '2', '2020-11-09', '2020-11-09 10:35:48', '2020-11-09 10:35:48'),
(32, 4, '2', '2020-11-09', '2020-11-09 10:35:51', '2020-11-09 10:35:51'),
(33, 5, '2', '2020-11-09', '2020-11-09 10:35:54', '2020-11-09 10:35:54'),
(34, 1, '1', '2020-11-10', '2020-11-10 01:10:26', '2020-11-10 01:10:26'),
(35, 1, '2', '2020-11-10', '2020-11-10 01:10:29', '2020-11-10 01:10:29'),
(36, 2, '2', '2020-11-10', '2020-11-10 01:10:33', '2020-11-10 01:10:33'),
(37, 4, '2', '2020-11-10', '2020-11-10 01:10:37', '2020-11-10 01:10:37'),
(38, 5, '2', '2020-11-10', '2020-11-10 01:10:39', '2020-11-10 01:10:39'),
(39, 1, '1', '2020-11-11', '2020-11-10 19:05:37', '2020-11-10 19:05:37'),
(40, 1, '2', '2020-11-11', '2020-11-10 19:05:39', '2020-11-10 19:05:39'),
(41, 2, '2', '2020-11-11', '2020-11-10 19:05:42', '2020-11-10 19:05:42'),
(42, 4, '2', '2020-11-11', '2020-11-10 19:05:45', '2020-11-10 19:05:45'),
(43, 5, '2', '2020-11-11', '2020-11-10 19:05:48', '2020-11-10 19:05:48'),
(44, 5, '1', '2020-11-11', '2020-11-10 19:05:50', '2020-11-10 19:05:50'),
(45, 1, '1', '2020-11-12', '2020-11-12 19:04:19', '2020-11-12 19:04:19'),
(46, 1, '2', '2020-11-12', '2020-11-12 19:04:29', '2020-11-12 19:04:29'),
(47, 2, '2', '2020-11-12', '2020-11-12 19:04:34', '2020-11-12 19:04:34'),
(48, 5, '1', '2020-11-12', '2020-11-12 19:04:43', '2020-11-12 19:04:43'),
(49, 5, '2', '2020-11-12', '2020-11-12 19:04:47', '2020-11-12 19:04:47'),
(50, 1, '1', '2020-11-13', '2020-11-13 17:37:52', '2020-11-13 17:37:52'),
(51, 1, '2', '2020-11-13', '2020-11-13 17:37:57', '2020-11-13 17:37:57'),
(52, 1, '1', '2020-11-14', '2020-11-14 16:26:57', '2020-11-14 16:26:57'),
(53, 1, '2', '2020-11-14', '2020-11-14 16:26:59', '2020-11-14 16:26:59'),
(54, 2, '1', '2020-11-14', '2020-11-14 16:27:02', '2020-11-14 16:27:02'),
(55, 2, '2', '2020-11-14', '2020-11-14 16:27:04', '2020-11-14 16:27:04'),
(56, 4, '2', '2020-11-14', '2020-11-14 16:27:11', '2020-11-14 16:27:11'),
(57, 5, '1', '2020-11-14', '2020-11-14 16:27:14', '2020-11-14 16:27:14'),
(58, 5, '2', '2020-11-14', '2020-11-14 16:27:16', '2020-11-14 16:27:16'),
(59, 1, '2', '2020-11-15', '2020-11-15 17:24:50', '2020-11-15 17:24:50'),
(60, 2, '2', '2020-11-15', '2020-11-15 17:24:58', '2020-11-15 17:24:58'),
(61, 4, '2', '2020-11-15', '2020-11-15 17:25:13', '2020-11-15 17:25:13'),
(62, 5, '2', '2020-11-15', '2020-11-15 17:25:22', '2020-11-15 17:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

DROP TABLE IF EXISTS `savings`;
CREATE TABLE `savings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `savings` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `user_id`, `savings`, `created_at`, `updated_at`) VALUES
(1, 1, '200.00', '2020-11-07 08:14:42', '2020-11-07 08:14:42'),
(2, 2, '300.00', '2020-11-07 08:14:57', '2020-11-07 08:14:57'),
(3, 4, '500.00', '2020-11-07 08:15:07', '2020-11-07 08:15:07'),
(4, 5, '300.00', '2020-11-07 08:15:20', '2020-11-07 08:15:20'),
(5, 3, '100.00', '2020-11-07 08:15:34', '2020-11-07 08:15:34'),
(6, 5, '450.00', '2020-11-09 10:35:29', '2020-11-09 10:35:29'),
(7, 1, '230.00', '2020-11-10 19:05:22', '2020-11-10 19:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `group_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sharif Khan Milon', 'khanmilon114@gmail.com', NULL, '$2y$10$4cjtb4GTGBHzCVaAXIQdte3c3Cn9./EkmAVWK.tky0twQCu67Jfq2', 'YSXvHNxErjGoh1N4R3Ul7WmMLsWsTIwLIHHBjpg93zkjN5zNLJ59Ch3Ff2Zi', '2020-10-05 00:34:36', '2020-10-05 09:14:49'),
(2, 2, 'Iqbal Ahmed Tuhin', 'jniqbal1@gmail.com', NULL, '$2y$10$eQ.3rtJ5JaRoVcCn9FA3u.2AEp.riQcmq8CWY7MUtGf5a/wKDpfIi', NULL, '2020-10-12 01:55:12', '2020-10-12 01:55:12'),
(3, 2, 'Sharif Feni', 'sharif753560@gmail.com', NULL, '$2y$10$lLdnreMQEZZLJXddeIijn.RtgUYxlEvkGGFXMalV6uDw.We0OacLa', NULL, '2020-10-12 01:55:59', '2020-10-12 01:55:59'),
(4, 2, 'Muntaser Muttaqi', 'muntasermuttaqi@gmail.com', NULL, '$2y$10$Dzl/UhhgGucGRTCJWSzQrusLy2PglwBzP0hSR/GCFICoupoVQxL5G', NULL, '2020-10-12 01:56:37', '2020-10-12 01:56:37'),
(5, 2, 'Pujan Das', 'pujandas0505@gmail.com', NULL, '$2y$10$i4l13g6XJu/nmP6FLGAi7eBsrJZtYKSvk3LvcUdGKL4YVtImvp0Ly', NULL, '2020-10-16 10:07:24', '2020-10-16 10:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`) VALUES
(1, 'Manager'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `count`
--
ALTER TABLE `count`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
