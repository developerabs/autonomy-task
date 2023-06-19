-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 06:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autonomy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '''0'' = ''non-featured'', ''1'' = ''featured''',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''0'' = ''deactive'', ''1'' = ''active''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `level`, `cat_name`, `slug`, `icon`, `banner`, `featured`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 0, 'Electronics', 'electronics', NULL, NULL, 0, NULL, NULL, 1, '2023-06-18 03:08:37', '2023-06-18 03:08:37', NULL),
(2, 1, 1, 'Accessories', 'accessories', NULL, NULL, 0, NULL, NULL, 1, '2023-06-18 03:09:38', '2023-06-18 03:09:38', NULL),
(3, 2, 2, 'Wearable Accessories', 'wearable-accessories', NULL, NULL, 0, NULL, NULL, 1, '2023-06-18 03:10:12', '2023-06-18 03:10:12', NULL),
(4, 3, 3, 'Smart Watch', 'smart-watch', NULL, NULL, 0, NULL, NULL, 1, '2023-06-18 03:10:40', '2023-06-18 03:10:40', NULL),
(5, 0, 0, 'Fashon', 'fashon', NULL, NULL, 0, 'Fashon', 'Fashon', 1, '2023-06-19 09:43:27', '2023-06-19 09:43:27', NULL),
(6, 5, 1, 'Men\'s & Boys', 'mens-boys', NULL, NULL, 0, 'Men\'s & Boys', 'Men\'s & Boys', 1, '2023-06-19 09:44:37', '2023-06-19 09:44:37', NULL),
(7, 5, 1, 'Women\'s & Girls', 'womens-girls', NULL, NULL, 0, NULL, NULL, 1, '2023-06-19 09:45:28', '2023-06-19 09:45:28', NULL),
(8, 6, 2, 'Clothing\'s', 'clothings', NULL, NULL, 0, 'Clothing\'s', 'Clothing\'s', 1, '2023-06-19 09:46:27', '2023-06-19 09:46:27', NULL),
(9, 6, 2, 'Shoes', 'shoes', NULL, NULL, 0, NULL, NULL, 1, '2023-06-19 09:47:07', '2023-06-19 09:47:07', NULL),
(10, 6, 2, 'Bags', 'bags', NULL, NULL, 0, NULL, NULL, 1, '2023-06-19 09:47:52', '2023-06-19 09:47:52', NULL),
(11, 8, 3, 'T-Shirts', 't-shirts', NULL, NULL, 0, NULL, NULL, 1, '2023-06-19 09:48:36', '2023-06-19 09:48:36', NULL),
(12, 8, 3, 'Polo Shirts', 'polo-shirts', NULL, NULL, 0, NULL, NULL, 1, '2023-06-19 09:49:05', '2023-06-19 09:49:05', NULL),
(13, 8, 3, 'Jeans', 'jeans', NULL, NULL, 0, NULL, NULL, 1, '2023-06-19 09:49:30', '2023-06-19 09:49:30', NULL),
(14, 8, 3, 'Casual Shirt', 'casual-shirt', NULL, NULL, 0, NULL, NULL, 1, '2023-06-19 09:50:17', '2023-06-19 09:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Red', NULL, NULL, NULL, NULL),
(2, 'Blue', NULL, NULL, NULL, NULL),
(3, 'Green', NULL, NULL, NULL, NULL),
(4, 'Black', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(38, '2019_08_19_000000_create_failed_jobs_table', 1),
(39, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(40, '2022_01_31_171758_create_sessions_table', 1),
(41, '2023_06_15_060212_create_categories_table', 1),
(42, '2023_06_16_161017_create_products_table', 1),
(43, '2023_06_16_172428_create_product_categories_table', 1),
(44, '2023_06_16_173712_create_colors_table', 1),
(45, '2023_06_16_174131_create_sizes_table', 1),
(46, '2023_06_16_184139_add_new_column_stock_to_products', 1),
(47, '2023_06_16_185055_add_new_column_status_to_products', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `user_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `purchase_price` double DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '''0'' = ''non-featured'', ''1'' = ''featured''',
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_qty` int(11) NOT NULL,
  `discount` double DEFAULT NULL,
  `shipping_cost` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '''0'' = ''deactive'', ''1'' = ''active''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `added_by`, `user_id`, `unit_price`, `purchase_price`, `stock`, `size`, `color`, `photo`, `thumbnail_img`, `tags`, `featured`, `unit`, `min_qty`, `discount`, `shipping_cost`, `title`, `description`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Riversong SW46 Motive 3 Pro Waterproof Bluetooth Calling Smart Watch', 'admin', 1, 3500, 3000, 200, '[\"1\",\"2\",\"3\"]', '[\"2\",\"3\",\"4\"]', NULL, 'image.png', NULL, 0, 'pcs', 1, NULL, 0, 'Riversong SW46 Motive 3 Pro Waterproof Bluetooth Calling Smart Watch', 'Riversong SW46 Motive 3 Pro Waterproof Bluetooth Calling Smart Watch', 'riversong-sw46-motive-3-pro-waterproof-bluetooth-calling-smart-watch', 1, '2023-06-18 03:21:12', '2023-06-18 03:21:12', NULL),
(2, 'Riversong SW30 Motive 3 Waterproof Smart Watch', 'admin', 1, 4000, 3500, 100, '[\"1\",\"2\",\"3\"]', '[\"2\",\"3\",\"4\"]', NULL, 'image.png', NULL, 0, 'pcs', 1, NULL, 0, 'Riversong SW30 Motive 3 Waterproof Smart Watch', 'Riversong SW30 Motive 3 Waterproof Smart Watch', 'riversong-sw30-motive-3-waterproof-smart-watch', 1, '2023-06-18 03:24:04', '2023-06-18 03:24:04', NULL),
(3, 'Oraimo Watch 2 Pro OSW-32 Bluetooth Calling Smart Watch', 'admin', 1, 5800, 5500, 30, '[\"2\",\"3\"]', '[\"3\",\"4\"]', NULL, 'Products/MjQXa1cZC4.jpg', NULL, 0, 'pcs', 1, NULL, 0, 'Oraimo Watch 2 Pro OSW-32 Bluetooth Calling Smart Watch', 'Oraimo Watch 2 Pro OSW-32 Bluetooth Calling Smart Watch', 'oraimo-watch-2-pro-osw-32-bluetooth-calling-smart-watch', 1, '2023-06-18 12:18:56', '2023-06-18 12:18:56', NULL),
(4, 'Oraimo Watch R OSW-23N Smart Watch', 'admin', 1, 5000, 5000, 30, '[\"2\",\"3\"]', '[\"3\",\"4\"]', NULL, 'products/cYlcXM4fKg.jpg', NULL, 0, 'pcs', 1, NULL, 0, 'Oraimo Watch R OSW-23N Smart Watch', 'Oraimo Watch R OSW-23N Smart Watch', 'oraimo-watch-r-osw-23n-smart-watch', 1, '2023-06-18 12:28:07', '2023-06-18 12:28:07', NULL),
(5, 'Havit M90 Fashion Sports Smart Watch', 'admin', 1, 2100, 2000, 20, '[\"1\",\"2\"]', '[\"2\",\"4\"]', NULL, 'products/kPTN6JOBCJ.jpg', NULL, 0, 'pcs', 1, NULL, 0, 'Havit M90 Fashion Sports Smart Watch', 'Havit M90 Fashion Sports Smart Watch', 'havit-m90-fashion-sports-smart-watch', 1, '2023-06-18 12:40:59', '2023-06-18 12:40:59', NULL),
(6, 'COLMI P28 Plus Calling Smart Watch', 'admin', 1, 2200, 2200, 10, '[\"2\",\"3\"]', '[\"4\"]', '[{\"path\":\"Products\\/v2T97z2ik1.jpg\"},{\"path\":\"Products\\/oJ7CJrbzUk.jpg\"},{\"path\":\"Products\\/R1unWltaZE.jpg\"}]', 'Products/nRS6L22HKY.jpg', NULL, 0, 'pcs', 1, NULL, 0, 'COLMI P28 Plus Calling Smart Watch', 'COLMI P28 Plus Calling Smart Watch', 'colmi-p28-plus-calling-smart-watch', 1, '2023-06-18 13:03:48', '2023-06-18 13:03:48', NULL),
(7, 'Havit M9021 HD Screen Smart Watch', 'admin', 1, 2400, 2400, 20, '[\"1\",\"2\",\"3\"]', '[\"2\",\"4\"]', '[{\"path\":\"Products\\/Jl0gt5EkMF.jpg\"},{\"path\":\"Products\\/V9uUQO1NMF.jpg\"}]', 'Products/nBVrdwHCsc.jpg', NULL, 0, 'pcs', 1, NULL, 0, 'Havit M9021 HD Screen Smart Watch', 'sa-quill-control', 'havit-m9021-hd-screen-smart-watch', 1, '2023-06-18 14:17:37', '2023-06-19 10:10:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2023-06-18 03:21:12', '2023-06-18 03:21:12', NULL),
(2, 1, 3, '2023-06-18 03:21:13', '2023-06-18 03:21:13', NULL),
(3, 1, 4, '2023-06-18 03:21:13', '2023-06-19 07:55:47', '2023-06-19 07:55:47'),
(4, 2, 1, '2023-06-18 03:24:04', '2023-06-19 07:55:47', '2023-06-19 07:55:47'),
(5, 2, 3, '2023-06-18 03:24:04', '2023-06-18 03:24:04', NULL),
(6, 2, 4, '2023-06-18 03:24:04', '2023-06-18 03:24:04', NULL),
(7, 3, 3, '2023-06-18 12:18:57', '2023-06-18 12:18:57', NULL),
(8, 3, 4, '2023-06-18 12:18:57', '2023-06-18 12:18:57', NULL),
(9, 4, 1, '2023-06-18 12:28:07', '2023-06-18 12:28:07', NULL),
(10, 4, 4, '2023-06-18 12:28:07', '2023-06-18 12:28:07', NULL),
(11, 5, 3, '2023-06-18 12:40:59', '2023-06-18 12:40:59', NULL),
(12, 5, 4, '2023-06-18 12:40:59', '2023-06-18 12:40:59', NULL),
(13, 6, 1, '2023-06-18 13:03:48', '2023-06-18 13:03:48', NULL),
(14, 6, 4, '2023-06-18 13:03:48', '2023-06-18 13:03:48', NULL),
(35, 7, 3, '2023-06-19 10:10:46', '2023-06-19 10:10:46', NULL),
(36, 7, 4, '2023-06-19 10:10:46', '2023-06-19 10:10:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2mzpk909gwfVloW8C2WJ5mdvGSgawdPBRQ9dyzOR', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibGpweHh2UXhsdXpkUnNSbEVFT2xtdlhUdldzeXlYS3A4V1N3b0lrZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ3ekguS2ZzOXp6RjBxeFhHbWdka0VlenpmMFl5d2hZN1Iwb3FTeEpRdEZ4MEYuU0hpQXBadSI7fQ==', 1687191281),
('AoW13sjPPvcnFxE3g1h97w6g3x51u2RhsjdpWzpk', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1VBNVloS053R3puNVI0YTVoZndOOU1Td2VpVzRLbzRnRGdTbXNCeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjM6Imh0dHA6Ly9sb2NhbGhvc3QvYXV0b25vbXkvcHVibGljL2FkbWluL2NhdGVnb3JpZXM/c2VhcmNoPUZhc2hvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ3ekguS2ZzOXp6RjBxeFhHbWdka0VlenpmMFl5d2hZN1Iwb3FTeEpRdEZ4MEYuU0hpQXBadSI7fQ==', 1687191870);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'X', NULL, NULL, NULL),
(2, 'L', NULL, NULL, NULL),
(3, 'XL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Md Abu Bakkar Siddik', 'admin@gmail.com', NULL, '$2y$10$7zH.Kfs9zzF0qxXGmgdkEezzf0YywhY7R0oqSxJQtFx0F.SHiApZu', NULL, NULL, NULL, NULL, NULL, 'admin', '2023-06-18 03:07:39', '2023-06-18 03:07:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
