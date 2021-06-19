-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 06:47 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `product_enquiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `enquiry` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `user_id`, `product_id`, `enquiry`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'I want to know more about this product.', '2021-06-18 02:56:42', '2021-06-18 02:56:42'),
(2, 2, 3, 'More details.', '2021-06-18 02:57:32', '2021-06-18 02:57:32'),
(3, 2, 3, 'Good', '2021-06-18 03:00:39', '2021-06-18 03:00:39'),
(4, 2, 3, 'Good', '2021-06-18 03:01:03', '2021-06-18 03:01:03'),
(5, 3, 3, 'Any other feautures?', '2021-06-18 03:10:45', '2021-06-18 03:10:45'),
(6, 3, 2, 'Other features.', '2021-06-18 11:58:22', '2021-06-18 11:58:22'),
(7, 3, 2, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco.', '2021-06-18 12:42:30', '2021-06-18 12:42:30'),
(8, 3, 2, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco.', '2021-06-18 12:42:58', '2021-06-18 12:42:58'),
(9, 4, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2021-06-18 13:28:37', '2021-06-18 13:28:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_06_17_121515_create_products_table', 1),
(3, '2021_06_18_050114_create_enquiries_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `product_description`, `product_price`, `product_status`, `created_at`, `updated_at`) VALUES
(2, 'Samsung Smartphone', '60cb97fb24233.jpg', 'Ipsum dolor sit amet, Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipiscing.', '16000', 1, '2021-06-17 13:08:59', '2021-06-18 13:26:07'),
(3, 'Realme Smartphone', '60cba901e88dd.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', '9999', 1, '2021-06-17 14:26:50', '2021-06-18 13:15:28'),
(4, 'Apple Iphone', '60ccea8e1cab5.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '75000', 1, '2021-06-18 13:18:46', '2021-06-18 13:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sam Admin', 'nihal44.kp@gmail.com', '$2y$10$10bPopRoeydmMb/tpjgp9.ys4iyxwSFjg.S92r5S9yzB4JbzM/542', 'admin', NULL, '2021-06-17 10:28:33', '2021-06-17 10:28:33'),
(2, 'John', 'john@test.com', '$2y$10$sQu0KG2oclnnxxDgvpg9QeX7rkgIn4TjdDSGK5eAfVTKwmprBzOeq', 'customer', NULL, '2021-06-17 23:28:33', '2021-06-17 23:28:33'),
(3, 'Alex', 'alex@test.com', '$2y$10$jpqr0lro7Wy7KEmsuL6e3utH.gXUKE9sjgLVmCznjgkzDnZzE/7EC', 'customer', NULL, '2021-06-18 03:10:12', '2021-06-18 03:10:12'),
(4, 'Sharath', 'sharath@test.com', '$2y$10$M2p5OSC3ujCdcc12vlUANOx/iXH3n4DnY1djAcig7v2GMnFlr.CRO', 'customer', NULL, '2021-06-18 13:28:13', '2021-06-18 13:28:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_user_id_foreign` (`user_id`),
  ADD KEY `enquiries_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
