-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 04:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `deliveryprime`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `business_id`, `user_id`, `subtotal`, `total`, `address`, `Status`, `placed_at`, `created_at`, `updated_at`) VALUES
(3, 1, 5, 20000, 23400, 'Street 1, Islamabad', 'Dispatched', '2022-06-22 07:46:30', '2022-06-21 02:03:12', '2022-06-22 02:46:30'),
(4, 1, 5, 24, 28, 'COMSATS', 'Pending', '2022-06-21 18:56:00', '2022-06-21 13:56:00', '2022-06-21 13:56:00'),
(5, 1, 5, 4000, 4680, 'Street 123, Islamabad', 'Pending', '2022-06-22 06:50:43', '2022-06-22 01:50:43', '2022-06-22 01:50:43'),
(6, 1, 5, 210, 246, 'COMSATS Islamabad', 'Pending', '2022-06-22 06:55:34', '2022-06-22 01:55:34', '2022-06-22 01:55:34'),
(7, 4, 5, 210, 246, 'CL4 COMSATS', 'Pending', '2022-06-22 07:00:36', '2022-06-22 02:00:36', '2022-06-22 02:00:36'),
(8, 5, 5, 200, 234, 'Street 123, Islamabad', 'Pending', '2022-06-22 07:54:42', '2022-06-22 02:54:42', '2022-06-22 02:54:42'),
(9, 4, 5, 2210, 2586, 'lahore', 'Pending', '2022-06-22 09:13:49', '2022-06-22 04:13:49', '2022-06-22 04:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `bill_dishes`
--

CREATE TABLE `bill_dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `dishes_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_dishes`
--

INSERT INTO `bill_dishes` (`id`, `bill_id`, `dishes_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 4, NULL, NULL),
(2, 4, 3, 2, NULL, NULL),
(3, 5, 5, 4, NULL, NULL),
(4, 6, 6, 1, NULL, NULL),
(5, 7, 6, 1, NULL, NULL),
(6, 8, 7, 1, NULL, NULL),
(7, 9, 5, 1, NULL, NULL),
(8, 9, 5, 1, NULL, NULL),
(9, 9, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_Verified` tinyint(1) NOT NULL,
  `mainimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `created_at`, `updated_at`, `user_id`, `business_name`, `city`, `address`, `is_Verified`, `mainimage`, `header`) VALUES
(1, '2022-06-18 19:01:53', '2022-06-21 22:11:02', 2, 'Test Restaurant', 'Islamabad', 'Street 1, Islamabad', 0, 'logos/ZrtYun5BHxxaRsGV0eik70b80Hb67zqooVD7Fyvi.jpg', ''),
(2, '2022-06-20 08:03:56', '2022-06-20 08:03:56', 3, 'Pizza Hut', 'Lahore', 'Lahore', 0, NULL, NULL),
(4, '2022-06-21 21:30:05', '2022-06-21 21:30:05', 8, 'KFC', 'Islamabad', 'Islamabad', 0, NULL, NULL),
(5, '2022-06-22 02:51:31', '2022-06-22 02:51:31', 10, 'Arshik', 'Islamabad', 'Street 123, Islamabad', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `business_id`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(6, 4, 3, NULL, NULL),
(7, 4, 4, NULL, NULL),
(8, 4, 6, NULL, NULL),
(9, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Burger king', '2022-06-20 07:28:55', '2022-06-22 04:16:04'),
(2, 'Local', '2022-06-20 07:29:02', '2022-06-20 07:29:02'),
(3, 'Pizza', '2022-06-20 08:03:15', '2022-06-20 08:03:15'),
(4, 'Fast Food', '2022-06-20 13:14:17', '2022-06-20 13:14:17'),
(5, 'Dessert', '2022-06-20 13:14:27', '2022-06-20 13:14:27'),
(6, 'Drinks', '2022-06-20 13:14:38', '2022-06-20 13:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `business_id`, `name`, `cost`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chicken Tikka Pizza', 5000, 'food/U3m2S3b90uCUfuAe4OPe5He50cv6DDjJdODqJUmv.png', 'Double Cheese', '2022-06-18 19:50:54', '2022-06-21 21:11:26'),
(3, 1, 'Chicken Pizza', 12, 'food/U3m2S3b90uCUfuAe4OPe5He50cv6DDjJdODqJUmv.png', 'Grilled', '2022-06-18 20:00:30', '2022-06-18 20:00:30'),
(5, 4, 'Chicken Burger', 1000, 'food/SCprEoZd6791e78LSoSKH4nMjE0NDQ66k1B6RvbH.png', 'Enjoy the crispy chicken fillet in a soft bun with spicy mayo and our signature sauce with fresh lettuce.', '2022-06-21 21:35:06', '2022-06-21 21:39:49'),
(6, 4, 'Krunch Burger', 210, 'food/vtuKMcX5Wt64ArO4fWObZOzU0rDG42tcDmW8f7xw.png', 'Enjoy the crispy chicken fillet in a soft bun with spicy mayo and our signature sauce with fresh lettuce.', '2022-06-21 21:37:09', '2022-06-21 21:37:09'),
(7, 5, 'Karahi', 200, 'food/w37iNH2zqMFR7IMJWaoF6HYGZEkIxGhRWvC72WFE.png', 'Karahi', '2022-06-22 02:53:37', '2022-06-22 02:53:37');

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
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2022_06_18_092904_create_roles_table', 1),
(23, '2022_06_18_143322_create_business_table', 1),
(25, '2022_06_19_042734_create_dishes_table', 2),
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2022_06_18_092904_create_roles_table', 1),
(36, '2022_06_18_143322_create_business_table', 1),
(37, '2022_06_19_042734_create_dishes_table', 1),
(43, '2022_06_19_102155_create_categories_table', 3),
(44, '2022_06_20_121121_create_business_categories_table', 3),
(51, '2022_06_21_051848_create_bill_table', 4),
(52, '2022_06_21_051902_create_bill_dishes_table', 4);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-06-18 23:59:44', '2022-06-18 23:59:50'),
(2, 'Business', '2022-06-18 23:59:44', '2022-06-18 23:59:50'),
(3, 'Customer', '2022-06-18 23:59:44', '2022-06-18 23:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roles_id`, `name`, `email`, `username`, `password`, `contactnumber`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test Admin', 'muhammadtouseefmughal5@gmail.com', 'testadmin', '$2y$10$4zst8XGj7v19ewjOHDVqWOEVwqOpq4tFEtpq1OdAIOuvdpSuLksT6', '0300000000', NULL, NULL, NULL, NULL),
(2, 2, 'Test Business', 'muhammadtouseefmughal@gmail.com', 'testbusiness', '$2y$10$u5lIGMYT5LgYqc0Z2a/Fce.yu2IBCfns8WVhH2ynEwF.Nr0FfslLC', '0900000000', NULL, NULL, '2022-06-18 19:01:53', '2022-06-18 19:01:53'),
(3, 2, 'Michal', 'abcz@gmail.com', 'pizzahut', '$2y$10$THZsMikLolVO3hnoJPK2veDs1gdDU4G.FSGDcasCP0Qf6P/U.Defa', '030000000000', NULL, NULL, '2022-06-20 08:03:56', '2022-06-20 08:03:56'),
(5, 3, 'Test Customer', 'test@deliverprime.com', 'testcustomer', '$2y$10$CorDdILPUtUUf63YVlYIVuMdUxDcOgR1H0gpQr/NXMf0ALkPAi4L6', '030000000000', NULL, NULL, '2022-06-20 13:37:03', '2022-06-20 13:37:03'),
(7, 2, 'tmp', 'abc@gmail.com', 'abcdef', '$2y$10$6GEatvPbfFocbWJxp3iQp.QMuXsvw59T./iYtq32KlcGbZukCdkmC', '03000000000', NULL, NULL, '2022-06-21 12:49:11', '2022-06-21 12:49:11'),
(8, 2, 'John', 'kfc@deliveryprime.com', 'kfc', '$2y$10$OjF8LzfZK5kHQc9SrFSyuu.am9NizfK65vrIJw9ut3Pxdl58U3TGa', '03000000000', NULL, NULL, '2022-06-21 21:30:05', '2022-06-21 21:30:05'),
(10, 2, 'new', 'arshik.javed@gmail.com', 'new', '$2y$10$hteWo6SbOOApUkpRzvlinu33hDLZz9kkBJkylzxsZmhkg7dtyQSc.', '03315200019', NULL, NULL, '2022-06-22 02:51:31', '2022-06-22 02:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_dishes`
--
ALTER TABLE `bill_dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_user_id_foreign` (`user_id`);

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_business_id_foreign` (`business_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bill_dishes`
--
ALTER TABLE `bill_dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);
COMMIT;
