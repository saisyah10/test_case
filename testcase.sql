-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 04:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`, `description`, `account_type`, `email`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dummyyyyy', 'dummy4 lorem lorem lorem ipsum', 'dummy4', 'dummy4@gmail.com', '$2y$10$QX3Y22pEkXbTx6lth7njlewKpv.dl.cGw7LiYihGNfzic37.M8Qe6', NULL, '2020-09-19 07:43:07', '2020-09-20 05:53:33'),
(2, 'dummy4', 'dummy4 lorem lorem lorem ipsum', 'dummy4', 'dummy4@gmail.com', 'qwertyui', '2020-09-20 05:51:23', '2020-09-19 07:52:11', '2020-09-20 05:51:23'),
(3, 'dummy5', 'dummy5 lorem lorem lorem ipsum', 'dummy5', 'dummy5@gmail.com', 'qwertyui', NULL, '2020-09-20 00:30:39', '2020-09-20 00:30:39'),
(4, 'dummy7', 'dummy5 lorem lorem lorem ipsum', 'dummy5', 'dummy7@gmail.com', 'qwertyui', NULL, '2020-09-20 02:44:52', '2020-09-20 02:44:52'),
(5, 'dummy9', 'dummy9 lorem lorem lorem ipsum', 'dummy9', 'dummy9@gmail.com', 'qwertyui', NULL, '2020-09-20 03:20:36', '2020-09-20 03:20:36'),
(6, 'dummy10', 'dummy10 lorem lorem lorem ipsum', 'dummy10', 'dummy10@gmail.com', 'qwertyui', NULL, '2020-09-20 03:26:20', '2020-09-20 03:26:20'),
(7, 'dummy10', 'dummy10 lorem lorem lorem ipsum', 'dummy10', 'dummy10@gmail.com', 'qwertyui', NULL, '2020-09-20 03:27:38', '2020-09-20 03:27:38'),
(8, 'dummy11', 'dummy11 llorem lorem lorem ipsum', 'dummy11', 'dummy11@gmail.com', 'qwertyui', NULL, '2020-09-20 03:35:41', '2020-09-20 03:35:41'),
(9, 'dummy12', 'dummy12 llorem lorem lorem ipsum', 'dummy12', 'dummy1@gmail.com', 'qwertyui', NULL, '2020-09-20 04:12:30', '2020-09-20 04:12:30'),
(10, 'dummy20', 'dummy20 llorem lorem lorem ipsum', 'dummy20', 'dummy20@gmail.com', '$2y$10$x/aT1gD0yZSDdFkIoMD.Uuo6DMnZFmNhk/1U8bzwVsL23IBkWYrj6', NULL, '2020-09-20 05:46:06', '2020-09-20 05:46:06'),
(11, 'dummy55', 'dummy55 llorem lorem lorem ipsum', 'dummy55', 'dummy55@gmail.com', '$2y$10$VmDkG7ZdzS/a4BF27SuMx.YWfDZa/Vts5KhKZ5Kc0mTZSsvo9gRAu', NULL, '2020-09-20 06:56:17', '2020-09-20 06:56:17'),
(12, 'dummy55', 'dummy333 llorem lorem lorem ipsum', 'dummy333', 'dummy333@gmail.com', '$2y$10$Ee.WCuXndm7dfEPkYP0/z.xmfAIwJNcP04MFsCpGqnM/JIv3kjLuq', NULL, '2020-09-20 07:02:45', '2020-09-20 07:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_account` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`id`, `id_account`, `title`, `description`, `amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'pemasukan', 'lorem ipsum lorem ipsum lorem ipsum', 500000, NULL, NULL, '2020-09-20 00:58:52'),
(2, 1, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum', 100000, NULL, '2020-09-20 00:54:00', '2020-09-20 01:13:31'),
(3, 1, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum', 500000, NULL, '2020-09-20 00:56:30', '2020-09-20 00:56:30');

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
(3, '2020_09_19_063238_create_accounts_table', 1),
(4, '2020_09_19_063322_create_finances_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finances_id_account_foreign` (`id_account`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `finances`
--
ALTER TABLE `finances`
  ADD CONSTRAINT `finances_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
