-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 02:29 PM
-- Server version: 10.4.6-MariaDB-log
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `overtime`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prima Tech', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(2, 'Misaki', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(3, 'Migs', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(4, 'Four Pillars', '2019-12-17 09:00:00', '2019-12-17 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbls`
--

CREATE TABLE `department_tbls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_tbls`
--

INSERT INTO `department_tbls` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MIS', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(2, 'Facilities', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(3, 'MM', '2019-12-17 09:12:13', '2019-12-17 09:12:23'),
(4, 'SM', '2019-12-17 09:12:23', '2019-12-17 09:12:28'),
(5, 'SCM', '2019-12-17 09:13:17', '2019-12-17 09:13:31'),
(6, 'HG', '2019-12-17 09:13:00', '2019-12-17 09:13:00'),
(7, 'FA', '2019-12-17 09:15:00', '2019-12-17 09:15:08'),
(8, 'SMT', '2019-12-17 09:16:00', '2019-12-17 09:16:00'),
(9, 'None', '2019-12-17 09:17:00', '2019-12-17 09:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_tbls`
--

CREATE TABLE `emp_tbls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_11_104327_create_department_tbls_table', 1),
(16, '2019_12_12_001837_create_position_tbls_table', 1),
(17, '2019_12_12_002051_create_employee_tbls_table', 1),
(18, '2019_12_12_002130_create_ot_tbls_table', 1),
(19, '2019_12_16_102312_create_agencies_table', 1),
(20, '2020_01_17_010241_create_ot_shifts_table', 2),
(21, '2020_03_16_114443_create_emp_tbls_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ot_shifts`
--

CREATE TABLE `ot_shifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ot_shifts`
--

INSERT INTO `ot_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DAY', '2020-01-17 01:18:00', '2020-01-17 01:18:00'),
(2, 'NIGHT', '2020-01-17 01:18:00', '2020-01-17 02:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `ot_tbls`
--

CREATE TABLE `ot_tbls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `shift_sched` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `job_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_hrs` int(11) NOT NULL,
  `first_process` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_process` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ot_tbls`
--

INSERT INTO `ot_tbls` (`id`, `name`, `department_id`, `date`, `shift_sched`, `agency_id`, `job_content`, `results`, `time_from`, `time_to`, `time_hrs`, `first_process`, `second_process`, `created_at`, `updated_at`) VALUES
(1, 'Lawrence Bondad', 1, '2020-03-01', 1, 1, 'Inventory', 'Done encoding', '08:00', '15:00', 6, NULL, NULL, '2020-03-03 06:28:04', '2020-03-03 06:28:04'),
(2, 'Edmund Mati', 1, '2020-03-01', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, NULL, NULL, '2020-03-03 10:52:18', '2020-03-03 10:52:18'),
(3, 'Jun Recamara', 1, '2020-03-01', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', 'Approved', '2020-03-03 10:52:18', '2020-03-04 10:15:00'),
(4, 'Decie Jun Aguila', 3, '2020-03-01', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', 'Declined', '2020-03-03 10:52:18', '2020-03-04 00:57:41'),
(5, 'Edu Manzano', 1, '2020-03-04', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', 'Approved', '2020-03-04 00:37:59', '2020-03-04 00:57:31'),
(6, 'Alex Gonzales', 1, '2020-03-04', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', 'Approved', '2020-03-04 00:37:59', '2020-03-04 00:57:31'),
(7, 'Jennalyn Mercado', 1, '2020-03-04', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', NULL, '2020-03-04 00:37:59', '2020-03-09 07:36:42'),
(8, 'Gary Valenciano', 1, '2020-03-04', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', NULL, '2020-03-04 00:46:27', '2020-03-11 08:32:42'),
(9, 'Toni Gonzales', 1, '2020-03-04', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', NULL, '2020-03-04 00:46:27', '2020-03-04 00:46:27'),
(10, 'Neneng B', 1, '2020-03-04', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Declined', NULL, '2020-03-04 00:46:27', '2020-03-09 07:36:52'),
(11, 'Kevin Durant', 1, '2020-03-03', 2, 1, 'Dunk Contest', 'Done 360', '08:00', '17:00', 8, 'Approved', 'Approved', '2020-03-04 00:55:47', '2020-03-09 07:37:19'),
(12, 'Nilo Jay Tenorio', 1, '2020-03-08', 1, 1, 'Injection support', 'Done supporting machine problem', '08:00', '12:00', 8, 'Approved', 'Declined', '2020-03-09 07:20:10', '2020-03-09 07:37:23'),
(13, 'Jonel Escubido', 1, '2020-03-08', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', NULL, '2020-03-09 07:34:46', '2020-03-11 08:32:42'),
(14, 'Myca Salamanca', 1, '2020-03-08', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', NULL, '2020-03-09 07:34:46', '2020-03-11 08:32:42'),
(15, 'Midoriya Kun', 1, '2020-03-08', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Approved', 'Approved', '2020-03-09 07:34:46', '2020-03-09 07:37:19'),
(16, 'Park Bo Gum', 3, '2020-03-08', 2, 4, 'Done doing the thing to do', 'Done done', '18:00', '06:00', 11, 'Approved', NULL, '2020-03-11 05:20:57', '2020-03-11 05:22:28'),
(17, 'Park Min Young', 1, '2020-03-11', 1, 1, 'Inventory', 'Done inventory', '08:00', '17:00', 8, 'Approved', NULL, '2020-03-11 08:30:20', '2020-03-11 08:32:42'),
(18, 'Jennalyn Ortillo', 1, '2020-03-11', 1, 1, 'Inventory tagging', 'Done inventory', '08:00', '05:00', 8, NULL, NULL, '2020-03-11 08:56:46', '2020-03-11 08:56:46'),
(19, 'Lawrence G. Bondad', 1, '2020-03-11', 1, 1, 'Inventory tagging', 'Done inventory', '08:00', '05:00', 8, NULL, NULL, '2020-03-11 08:56:46', '2020-03-11 08:56:46'),
(20, 'Ej Mati', 1, '2020-03-11', 1, 1, 'Inventory tagging', 'Done inventory', '08:00', '05:00', 8, 'Declined', NULL, '2020-03-11 08:56:46', '2020-06-08 01:35:47'),
(21, 'Jonel Escubido', 1, '2020-03-11', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, 'Declined', NULL, '2020-03-12 03:20:57', '2020-06-08 01:35:47'),
(22, 'Myca Salamanca', 1, '2020-03-11', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, NULL, NULL, '2020-03-12 03:20:57', '2020-03-12 03:20:57'),
(23, 'Midoriya Kun', 1, '2020-03-11', 1, 1, 'Inventory', 'Done pcba prod raw tags', '08:00', '17:00', 8, NULL, NULL, '2020-03-12 03:20:57', '2020-03-12 03:20:57'),
(24, 'Jennalyn Ortillo', 1, '2020-03-13', 2, 2, 'Print Injection Tag', 'Done working print tag', '06:00', '18:00', 12, NULL, NULL, '2020-03-13 02:44:45', '2020-03-13 02:44:45'),
(25, 'Lawrence Bondad', 1, '2020-03-13', 2, 2, 'awlknej nawjebkj', 'jajnwkbawhebawbejwabe', '08:00', '17:00', 8, NULL, NULL, '2020-03-13 02:53:56', '2020-03-13 02:53:56'),
(26, 'Lawrence Bondad', 1, '2020-03-16', 1, 1, 'Production', 'Done production', '06:00', '18:00', 12, NULL, NULL, '2020-03-16 06:29:38', '2020-03-16 06:29:38'),
(27, 'Nino Raymundo', 1, '2020-03-16', 1, 1, 'Inventory', 'Done pcba prod raw tags', '06:00', '18:00', 12, 'Approved', NULL, '2020-03-16 06:38:01', '2020-03-16 06:43:27'),
(28, 'Lawrence Bondad', 1, '2020-03-16', 1, 1, 'Inventory', 'Done pcba prod raw tags', '06:00', '18:00', 12, 'Approved', NULL, '2020-03-16 06:38:01', '2020-03-16 06:43:27'),
(29, 'Jennalyn Ortillo', 1, '2020-03-16', 1, 1, 'Inventory', 'Done pcba prod raw tags', '06:00', '18:00', 12, 'Approved', NULL, '2020-03-16 06:38:01', '2020-03-16 06:43:27'),
(30, 'Rence Bondad', 1, '2020-06-08', 2, 1, 'Programming Support', 'Supported the program', '18:00', '06:00', 12, NULL, NULL, '2020-06-08 05:30:44', '2020-06-08 05:30:44');

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
-- Table structure for table `position_tbls`
--

CREATE TABLE `position_tbls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_tbls`
--

INSERT INTO `position_tbls` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(2, 'Manager', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(3, 'Supervisor', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(4, 'Requester', '2019-12-17 09:00:00', '2019-12-17 09:00:00'),
(5, 'HR-Prima Tech', '2019-12-17 09:08:00', '2019-12-17 09:08:00'),
(6, 'HR-Misaki', '2019-12-17 09:11:00', '2019-12-17 09:11:14'),
(7, 'HR-Migz', '2019-12-17 09:15:36', '2019-12-17 09:16:22'),
(8, 'HR-Four Pillars', '2019-12-17 09:12:00', '2019-12-17 09:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `position_id`, `department_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lawrence Bondad', 'lawrence.bondad@primatechphils.com', '09278387804', 'male', 1, 9, NULL, '$2y$10$UUgBvDcfIdGfzjqEaKgNnOE6aa8rG2MZvyH3mf0lcYEJ5AAsnfqIu', 'Yua7I9D1mcxCPnt1n5oONi3ZQ5uIC6hiK6q9tuuzON6Fssky3OTEqswPolGV', '2020-02-27 03:45:22', '2020-03-03 04:00:09'),
(2, 'Jennalyn Ortillo', 'jennalyn.ortillo@primatechphils.com', '09499763940', 'female', 3, 1, NULL, '$2y$10$IyCo4RQ2qLNfSRBn.t3ceuLqVRrIbVkmhKqh18CNp2MP47cfpbwk2', 'wVD2oiFXlM1zRkUyYg1JL9XaEBkJSOLjkYYh0Qwezlkrc4qXAO5Fi74hIUEy', '2020-03-02 19:08:42', '2020-03-09 07:17:51'),
(4, 'Nilo Jay Tenorio', 'niltenorio@primatechphils.com', '09951612420', 'male', 4, 1, NULL, '$2y$10$PGdvhgVD9Wqk4M0OLejNYuPt1VanvN.G334Q13h0EXmrvZUkNWLaC', 'fRo0cUF0MgJ3lhCSYlbDedAF8FqfKea3jZLWGhm6HN939Xwu9Ay6j3HFt4Xd', '2020-03-03 05:00:35', '2020-03-03 05:01:17'),
(5, 'Niño Raymundo', 'nino.raymundo@primatechphils.com', '09054020737', 'male', 2, 1, NULL, '$2y$10$RL.eBpEsV/Ju77bHWJhfteaz6/gnsRYLlz3SX6s0d3dWrzV3xtKKK', 'sPrDxsWxW6qPXnNqhZkzUihr8B6oajmXsj5p5fz7Y7yT0fZFTeRbT2ZIfuyv', '2020-03-03 05:03:55', '2020-03-03 05:03:55'),
(6, 'Melanie Monte Falcon', 'melanie.montefalcon@primatechphils.com', '09975641740', 'female', 5, 9, NULL, '$2y$10$IQp7XZtXh8obIYWrz4WZ5.6AbgwcrF8Pf0jvBCVNf7g6dJrUW.n2q', 'TTDeEMX40g7VNSuNTtFEC8MGdQPLDUlvR8eL6WY1eOIMmhuvP29CJpXEqboG', '2020-03-03 05:05:22', '2020-03-03 05:05:22'),
(8, 'Kim Ji Soo', 'jisoo123@gmail.com', '00000000000', 'female', 2, 3, NULL, '$2y$10$cEwGkQDqkf0.Eq4oJkztueiAPGGJUeF6iEyQUGT0azYQgyf0Wymfy', '3QJKExqtTkUmeqwkGJqu93s2zRJ6l1DdNwbBlJRI3Vzg7faW255f1jToWIc8', '2020-03-11 05:16:55', '2020-03-11 05:16:55'),
(9, 'Jennie Kim', 'jennie12@gmail.com', '00000000000', 'female', 4, 3, NULL, '$2y$10$e9q6xI5JpBAmEwae6YJdVekjWa91BO6XGkBBlyVI8v2F7C2de0LU.', 'ovzZKHEUbj6cOWFGkMs04DGpxVNrAeKV8mExP5sZWDFeU5uQFxIrToQLTj3Y', '2020-03-11 05:19:01', '2020-03-11 05:19:01'),
(10, 'Lisa Manoban', 'lisayah@gmail.com', '00000000000', 'female', 3, 3, NULL, '$2y$10$R/XhwUbzSxlLzSj1fh.pieNAWM.15I0A4qpSDfdU2/4DJxdWs.Jlu', 'Nfb4MsARaYu3BErEKHvJrzKwtL4YrHFYxsUonN4tGcilSaKZ37ZaPFNmELNc', '2020-03-11 05:22:04', '2020-03-11 05:22:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_tbls`
--
ALTER TABLE `department_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_tbls`
--
ALTER TABLE `emp_tbls`
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
-- Indexes for table `ot_shifts`
--
ALTER TABLE `ot_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_tbls`
--
ALTER TABLE `ot_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `position_tbls`
--
ALTER TABLE `position_tbls`
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
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department_tbls`
--
ALTER TABLE `department_tbls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_tbls`
--
ALTER TABLE `emp_tbls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ot_shifts`
--
ALTER TABLE `ot_shifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ot_tbls`
--
ALTER TABLE `ot_tbls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `position_tbls`
--
ALTER TABLE `position_tbls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
