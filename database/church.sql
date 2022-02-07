-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2022 at 10:52 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartchu_church`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `jadwal`, `title`, `description`, `meeting_link`, `created_at`, `updated_at`) VALUES
(11, '2022-01-01 08:00:00', 'ibadah tahun baru', 'menggunakan pakaian putih', 'https://meet.google.com/mqm-bpkg-qod', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(12, '2022-01-09 08:00:00', 'ibadah minggu pertama tahun 2022', 'pakaian rapih', 'https://meet.google.com/wpm-dxbd-smg', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(18, '2022-01-10 18:20:00', 'ibadah minggu biasa 3', 'ini uji coba', 'offline', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(19, '2022-01-10 18:30:00', 'ibadah minggu biasa 4', 'asdasd', 'offline', '2022-01-10 23:25:05', '2022-01-10 23:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `kursis`
--

CREATE TABLE `kursis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursis`
--

INSERT INTO `kursis` (`id`, `seat`, `created_at`, `updated_at`) VALUES
(3, '1', '2021-11-02 15:35:22', '2021-11-02 15:35:22'),
(4, '2', '2021-11-02 15:35:25', '2021-11-02 15:35:25'),
(5, '3', '2021-11-02 15:35:27', '2021-11-02 15:35:27'),
(6, '4', '2021-11-02 15:35:30', '2021-11-02 15:35:30'),
(7, '5', '2021-11-02 15:35:33', '2021-11-02 15:35:33'),
(8, '6', '2021-11-02 15:35:36', '2021-11-02 15:35:36'),
(9, '7', '2021-11-02 15:35:40', '2021-11-02 15:35:40'),
(10, '8', '2021-11-02 15:35:43', '2021-11-02 15:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `kursi_details`
--

CREATE TABLE `kursi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `seat` bigint(255) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursi_details`
--

INSERT INTO `kursi_details` (`id`, `jadwal_id`, `seat`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'available', 'This seat is available to book', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(2, 2, 4, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(3, 2, 5, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(4, 2, 6, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(5, 2, 7, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(6, 2, 8, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(7, 2, 9, 'available', 'This seat is available to book', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(8, 2, 10, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 18:56:14', '2021-11-04 18:56:14'),
(9, 3, 3, 'available', 'This seat is available to book', '2021-11-04 20:02:42', '2021-11-04 20:02:42'),
(10, 3, 4, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:02:43', '2021-11-04 20:02:43'),
(11, 3, 5, 'available', 'This seat is available to book', '2021-11-04 20:02:43', '2021-11-04 20:02:43'),
(12, 3, 6, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:02:43', '2021-11-04 20:02:43'),
(13, 3, 7, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:02:43', '2021-11-04 20:02:43'),
(14, 3, 8, 'available', 'This seat is available to book', '2021-11-04 20:02:43', '2021-11-04 20:02:43'),
(15, 3, 9, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:02:43', '2021-11-04 20:02:43'),
(16, 3, 10, 'available', 'This seat is available to book', '2021-11-04 20:02:43', '2021-11-04 20:02:43'),
(17, 4, 3, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(18, 4, 4, 'available', 'This seat is available to book', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(19, 4, 5, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(20, 4, 6, 'available', 'This seat is available to book', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(21, 4, 7, 'available', 'This seat is available to book', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(22, 4, 8, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(23, 4, 9, 'available', 'This seat is available to book', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(24, 4, 10, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:23:01', '2021-11-04 20:23:01'),
(25, 5, 3, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(26, 5, 4, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(27, 5, 5, 'available', 'This seat is available to book', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(28, 5, 6, 'available', 'This seat is available to book', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(29, 5, 7, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(30, 5, 8, 'disabled', 'This seat is disabled for this meeting', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(31, 5, 9, 'available', 'This seat is available to book', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(32, 5, 10, 'available', 'This seat is available to book', '2021-11-04 20:25:18', '2021-11-04 20:25:18'),
(33, 6, 3, 'available', 'This seat is available to book', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(34, 6, 4, 'available', 'This seat is available to book', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(35, 6, 5, 'disabled', 'This seat is disabled for this meeting', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(36, 6, 6, 'disabled', 'This seat is disabled for this meeting', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(37, 6, 7, 'available', 'This seat is available to book', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(38, 6, 8, 'available', 'This seat is available to book', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(39, 6, 9, 'disabled', 'This seat is disabled for this meeting', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(40, 6, 10, 'disabled', 'This seat is disabled for this meeting', '2021-11-05 03:13:32', '2021-11-05 03:13:32'),
(41, 7, 3, 'available', 'This seat is available to book', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(42, 7, 4, 'disabled', 'This seat is disabled for this meeting', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(43, 7, 5, 'available', 'This seat is available to book', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(44, 7, 6, 'disabled', 'This seat is disabled for this meeting', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(45, 7, 7, 'disabled', 'This seat is disabled for this meeting', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(46, 7, 8, 'available', 'This seat is available to book', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(47, 7, 9, 'disabled', 'This seat is disabled for this meeting', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(48, 7, 10, 'available', 'This seat is available to book', '2021-11-27 18:37:35', '2021-11-27 18:37:35'),
(49, 8, 3, 'available', 'This seat is available to book', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(50, 8, 4, 'disabled', 'This seat is disabled for this meeting', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(51, 8, 5, 'available', 'This seat is available to book', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(52, 8, 6, 'disabled', 'This seat is disabled for this meeting', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(53, 8, 7, 'disabled', 'This seat is disabled for this meeting', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(54, 8, 8, 'available', 'This seat is available to book', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(55, 8, 9, 'disabled', 'This seat is disabled for this meeting', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(56, 8, 10, 'available', 'This seat is available to book', '2021-11-28 10:21:22', '2021-11-28 10:21:22'),
(57, 9, 3, 'available', 'This seat is available to book', '2021-11-30 14:35:59', '2021-11-30 14:35:59'),
(58, 9, 4, 'disabled', 'This seat is disabled for this meeting', '2021-11-30 14:35:59', '2021-11-30 14:35:59'),
(59, 9, 5, 'disabled', 'This seat is disabled for this meeting', '2021-11-30 14:36:00', '2021-11-30 14:36:00'),
(60, 9, 6, 'available', 'This seat is available to book', '2021-11-30 14:36:00', '2021-11-30 14:36:00'),
(61, 9, 7, 'disabled', 'This seat is disabled for this meeting', '2021-11-30 14:36:00', '2021-11-30 14:36:00'),
(62, 9, 8, 'disabled', 'This seat is disabled for this meeting', '2021-11-30 14:36:00', '2021-11-30 14:36:00'),
(63, 9, 9, 'disabled', 'This seat is disabled for this meeting', '2021-11-30 14:36:00', '2021-11-30 14:36:00'),
(64, 9, 10, 'disabled', 'This seat is disabled for this meeting', '2021-11-30 14:36:00', '2021-11-30 14:36:00'),
(65, 10, 3, 'available', 'This seat is available to book', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(66, 10, 4, 'disabled', 'This seat is disabled for this meeting', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(67, 10, 5, 'available', 'This seat is available to book', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(68, 10, 6, 'disabled', 'This seat is disabled for this meeting', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(69, 10, 7, 'disabled', 'This seat is disabled for this meeting', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(70, 10, 8, 'available', 'This seat is available to book', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(71, 10, 9, 'disabled', 'This seat is disabled for this meeting', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(72, 10, 10, 'available', 'This seat is available to book', '2021-12-01 02:08:24', '2021-12-01 02:08:24'),
(73, 11, 3, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(74, 11, 4, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(75, 11, 5, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(76, 11, 6, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(77, 11, 7, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(78, 11, 8, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(79, 11, 9, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(80, 11, 10, 'available', 'This seat is available to book', '2022-01-03 02:09:12', '2022-01-03 02:09:12'),
(81, 12, 3, 'available', 'This seat is available to book', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(82, 12, 4, 'disabled', 'This seat is disabled for this meeting', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(83, 12, 5, 'available', 'This seat is available to book', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(84, 12, 6, 'disabled', 'This seat is disabled for this meeting', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(85, 12, 7, 'disabled', 'This seat is disabled for this meeting', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(86, 12, 8, 'disabled', 'This seat is disabled for this meeting', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(87, 12, 9, 'available', 'This seat is available to book', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(88, 12, 10, 'disabled', 'This seat is disabled for this meeting', '2022-01-03 15:02:15', '2022-01-03 15:02:15'),
(89, 13, 3, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(90, 13, 4, 'available', 'This seat is available to book', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(91, 13, 5, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(92, 13, 6, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(93, 13, 7, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(94, 13, 8, 'available', 'This seat is available to book', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(95, 13, 9, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(96, 13, 10, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 03:31:51', '2022-01-04 03:31:51'),
(97, 14, 3, 'available', 'This seat is available to book', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(98, 14, 4, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(99, 14, 5, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(100, 14, 6, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(101, 14, 7, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(102, 14, 8, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(103, 14, 9, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(104, 14, 10, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 05:19:35', '2022-01-04 05:19:35'),
(105, 15, 3, 'available', 'This seat is available to book', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(106, 15, 4, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(107, 15, 5, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(108, 15, 6, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(109, 15, 7, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(110, 15, 8, 'disabled', 'This seat is disabled for this meeting', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(111, 15, 9, 'available', 'This seat is available to book', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(112, 15, 10, 'available', 'This seat is available to book', '2022-01-04 13:49:38', '2022-01-04 13:49:38'),
(113, 16, 3, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(114, 16, 4, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(115, 16, 5, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(116, 16, 6, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(117, 16, 7, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(118, 16, 8, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(119, 16, 9, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(120, 16, 10, 'available', 'This seat is available to book', '2022-01-09 23:20:56', '2022-01-09 23:20:56'),
(121, 17, 3, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(122, 17, 4, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(123, 17, 5, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(124, 17, 6, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(125, 17, 7, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(126, 17, 8, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(127, 17, 9, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(128, 17, 10, 'available', 'This seat is available to book', '2022-01-10 21:50:35', '2022-01-10 21:50:35'),
(129, 18, 3, 'available', 'This seat is available to book', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(130, 18, 4, 'available', 'This seat is available to book', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(131, 18, 5, 'available', 'This seat is available to book', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(132, 18, 6, 'available', 'This seat is available to book', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(133, 18, 7, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(134, 18, 8, 'available', 'This seat is available to book', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(135, 18, 9, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(136, 18, 10, 'available', 'This seat is available to book', '2022-01-10 23:19:55', '2022-01-10 23:19:55'),
(137, 19, 3, 'available', 'This seat is available to book', '2022-01-10 23:25:05', '2022-01-10 23:25:05'),
(138, 19, 4, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:25:05', '2022-01-10 23:25:05'),
(139, 19, 5, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:25:05', '2022-01-10 23:25:05'),
(140, 19, 6, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:25:05', '2022-01-10 23:25:05'),
(141, 19, 7, 'available', 'This seat is available to book', '2022-01-10 23:25:05', '2022-01-10 23:25:05'),
(142, 19, 8, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:25:05', '2022-01-10 23:25:05'),
(143, 19, 9, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:25:05', '2022-01-10 23:25:05'),
(144, 19, 10, 'disabled', 'This seat is disabled for this meeting', '2022-01-10 23:25:05', '2022-01-10 23:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `temp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `jadwal_id`, `transaksi_id`, `temp`, `created_at`, `updated_at`) VALUES
(1, 5, 19, 24, '27', '2022-01-10 23:28:22', '2022-01-10 23:28:22'),
(2, 5, 19, 24, '27', '2022-01-10 23:34:20', '2022-01-10 23:34:20');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_27_140604_create_schedules_table', 2),
(6, '2021_10_27_140824_create_roles_table', 2),
(7, '2021_10_27_141038_create_role_users_table', 2),
(8, '2021_10_27_153311_create_kursis_table', 3),
(9, '2021_10_27_153708_create_jadwals_table', 4),
(10, '2021_10_31_162531_create_r_f_i_d_s_table', 5);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Umat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`) VALUES
(4, 1),
(5, 2),
(8, 2),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `r_f_i_d_s`
--

CREATE TABLE `r_f_i_d_s` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `UID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `r_f_i_d_s`
--

INSERT INTO `r_f_i_d_s` (`user_id`, `UID`, `created_at`, `updated_at`) VALUES
(4, '1c8a5e23', '2021-11-06 16:14:23', '2021-11-06 16:14:23'),
(10, '24c90146', '2022-01-03 02:00:21', '2022-01-03 02:00:21'),
(9, '3445aa57', '2022-01-03 02:03:08', '2022-01-03 02:03:08'),
(9, '3445aa573445aa57', '2022-01-03 02:03:09', '2022-01-03 02:03:09'),
(5, '43d07302', '2021-12-05 18:09:36', '2021-12-05 18:09:36'),
(8, 'c432ad57', '2022-01-03 02:02:33', '2022-01-03 02:02:33'),
(8, 'c432ad57c432ad57', '2022-01-03 02:02:34', '2022-01-03 02:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_date` datetime NOT NULL,
  `seat` bigint(255) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `jadwal_id`, `user_id`, `reservation_date`, `seat`, `status`, `description`, `created_at`, `updated_at`) VALUES
(7, 9, 5, '2021-11-30 21:36:00', 6, 'canceled', 'Canceled by user', '2021-11-30 14:53:17', '2021-11-30 14:53:17'),
(8, 9, 5, '2021-12-01 01:55:35', 3, 'canceled', 'Canceled by user', '2021-11-30 19:05:58', '2021-11-30 19:05:58'),
(9, 10, 5, '2021-12-18 09:08:00', 3, 'accepted', 'User reserved', '2021-12-05 12:24:12', '2021-12-05 14:48:01'),
(10, 11, 10, '2022-01-01 08:00:00', 4, 'accepted', 'User reserved', '2022-01-03 02:09:51', '2022-01-03 02:41:56'),
(11, 11, 8, '2022-01-01 08:00:00', 7, 'canceled', 'Canceled by user', '2022-01-03 03:32:05', '2022-01-03 03:32:05'),
(12, 11, 9, '2022-01-01 08:00:00', 9, 'canceled', 'Canceled by user', '2022-01-03 03:33:29', '2022-01-03 03:33:29'),
(13, 11, 5, '2022-01-01 08:00:00', 5, 'reserved', 'User reserved', '2022-01-03 03:35:28', '2022-01-03 03:35:28'),
(14, 12, 5, '2022-01-09 08:00:00', 5, 'reserved', 'User reserved', '2022-01-03 15:07:58', '2022-01-03 15:07:58'),
(15, 12, 8, '2022-01-09 08:00:00', 9, 'reserved', 'User reserved', '2022-01-03 15:12:11', '2022-01-03 15:12:11'),
(16, 12, 10, '2022-01-09 08:00:00', 3, 'reserved', 'User reserved', '2022-01-03 15:15:40', '2022-01-03 15:15:40'),
(17, 10, 9, '2021-12-18 09:08:00', 8, 'reserved', 'User reserved', '2022-01-04 03:08:11', '2022-01-04 03:08:11'),
(18, 13, 9, '2022-01-04 22:31:00', 4, 'canceled', 'Canceled by user', '2022-01-04 03:32:02', '2022-01-04 03:32:02'),
(19, 14, 5, '2022-01-14 18:30:00', 3, 'canceled', 'Canceled by user', '2022-01-04 05:43:44', '2022-01-04 05:43:44'),
(20, 15, 5, '2022-01-16 08:00:00', 9, 'canceled', 'Canceled by user', '2022-01-04 13:51:42', '2022-01-06 02:39:02'),
(21, 15, 9, '2022-01-16 08:00:00', 3, 'canceled', 'Canceled by user', '2022-01-06 02:19:48', '2022-01-06 02:34:27'),
(22, 16, 5, '2022-01-22 08:00:00', 4, 'canceled', 'Canceled by user', '2022-01-09 23:34:30', '2022-01-09 23:45:08'),
(23, 18, 5, '2022-01-10 18:20:00', 8, 'reserved', 'User reserved', '2022-01-10 23:20:36', '2022-01-10 23:20:36'),
(24, 19, 5, '2022-01-10 18:30:00', 3, 'accepted', 'User reserved', '2022-01-10 23:26:09', '2022-01-10 23:34:20');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@admin.com', NULL, '$2y$10$DC/HXtnRVQVJsyZT6IRe/epZ1QsJ5W2kJ8igGkmqR5JiQY71mbTE.', '2xefs4ethxa37LRaT3fvR9QdQeQpyHDn94uvxuCFF79aIfIAbmZV5nwH9TIe', '2021-11-03 02:10:21', '2021-11-03 02:10:21'),
(5, 'user1', 'user1@user1.com', NULL, '$2y$10$rW/qBvC4TDtGwZ/2MmVP6.pUOBV9PUCImiqORx5q6EPQh9JDYbxXi', NULL, '2021-11-03 02:11:05', '2021-11-03 02:11:05'),
(8, 'user3', 'user3@user3.com', NULL, '$2y$10$8Pup5hESptK2O5sc1iDzeukXhFe05rPnj7OGJVrIMRmFuLsccPuFW', NULL, '2021-12-30 14:26:28', '2021-12-30 14:26:28'),
(9, 'user4', 'user4@user4.com', NULL, '$2y$10$Crtdd0GeHix8CBQizWzYeOryaWsDh5hXZWLL.yGtTKYr305i7oMIS', NULL, '2021-12-30 14:38:53', '2021-12-30 14:38:53'),
(10, 'warda', 'warda@warda.com', NULL, '$2y$10$aplk6mIsYH1ubfNZ2OQXFuw3zslekmO2ES./hX5BgwfEozSLkO7XW', NULL, '2021-12-31 04:05:11', '2021-12-31 04:05:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursis`
--
ALTER TABLE `kursis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursi_details`
--
ALTER TABLE `kursi_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `r_f_i_d_s`
--
ALTER TABLE `r_f_i_d_s`
  ADD UNIQUE KEY `r_f_i_d_s_uid_unique` (`UID`),
  ADD KEY `r_f_i_d_s_user_id_foreign` (`user_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kursis`
--
ALTER TABLE `kursis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kursi_details`
--
ALTER TABLE `kursi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `r_f_i_d_s`
--
ALTER TABLE `r_f_i_d_s`
  ADD CONSTRAINT `r_f_i_d_s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
