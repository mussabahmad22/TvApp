-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 11:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greet_screen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bgimgs`
--

CREATE TABLE `bgimgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `bg_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bgimgs`
--

INSERT INTO `bgimgs` (`id`, `device_id`, `bg_img`, `created_at`, `updated_at`) VALUES
(1, 10, 'images/YlgP7nYWRKsqvW6dYtFMgsDB0kvedIrem7WYBFJ2.jpg', '2023-08-28 01:27:32', '2023-08-28 01:27:32'),
(2, 10, 'images/tByKAxV5pYwD1aULahMCC3SGGmrvSJP7MdZ63VPh.png', '2023-08-28 01:27:32', '2023-08-28 01:27:32'),
(3, 10, 'images/Jm1f5HKxfi8ziJIusap13rzKPjD2k7F6vw9LHkKY.jpg', '2023-08-28 01:27:32', '2023-08-28 01:27:32'),
(4, 10, 'images/uTkcP5uABNGprbyaz97W45ZySCQ6sVW7i3YazOaX.jpg', '2023-08-28 01:27:33', '2023-08-28 01:27:33'),
(5, 11, 'images/cGzy9Qmg7Sc9Mjnrfx7bAJuvoFC0MzlrBx0ladkM.jpg', '2023-08-28 02:31:00', '2023-08-28 02:31:00'),
(6, 11, 'images/c3YRB2x0zWgl8uKPvTtksQ7HbEHjJqBM6xzWDORz.png', '2023-08-28 02:31:00', '2023-08-28 02:31:00'),
(7, 11, 'images/Td2gmeFK9rssSAmUC7WU7fB7jSemZAirnfODTilw.jpg', '2023-08-28 02:31:00', '2023-08-28 02:31:00'),
(8, 11, 'images/yJQImAOAMCPQAokx6inA98zsqE7aqmRJhatQRUin.jpg', '2023-08-28 02:31:00', '2023-08-28 02:31:00'),
(10, 11, 'images/3QC8XYXSwFDWSywJSdamY87LI89dRn9gPNGAuRNU.jpg', '2023-08-28 02:31:00', '2023-08-28 02:31:00'),
(14, 12, 'images/JgsHwauOecYHVXphFUSlBdCaSHPfDMXfjhzNwRLW.jpg', '2023-09-25 08:14:37', '2023-09-25 08:14:37'),
(15, 13, 'images/YmmtJwC9e9JPK5osaiNpR6BSTMhCRueqw1x3d7fA.png', '2023-10-09 02:31:28', '2023-10-09 02:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_vedio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_bg_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_wifi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_vedio`, `device_logo`, `device_bg_img`, `device_name`, `device_code`, `device_wifi`, `device_password`, `device_heading`, `device_description`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'videos/1692172221_y2mate.com - Mi amor x bohemia appa galla galla vich bohemia prem kahani bohemia full song_v720P.mp4', 'images/h4uszb1WkPlE1c6xzt8j3GmTaqlkPXARCbANNFAe.jpg', 'images/otQoXQmDSLcIrKehDK4iRauyvaSuLyzWxYXRwQRf.jpg', 'Mi Box', '778886', 'Tenda', '11223344', 'Welcome to this Device', 'Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).', 3, '2023-08-16 02:50:21', '2023-08-18 07:04:21'),
(4, 'videos/1692268138_y2mate.com - Udh Di Phiran Official Video Sunanda Sharma   Bilal Saeed  New Punjabi Song 2023_480p.mp4', 'images/GAssT5XQgItYn2qmI3ztkvufWyS7Np2iOIq4jGKH.png', 'images/tpEbQ8NNwONzYntFP572iGxTwv0fgtSKlvRovnPa.png', 'Theodore Hicks', '676878', 'New Device', '12345654@', 'Welcome to this Device', 'Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).                </p>', 3, '2023-08-16 05:33:36', '2023-08-18 07:04:46'),
(6, 'videos/1692266408_y2mate.com - Mi amor x bohemia appa galla galla vich bohemia prem kahani bohemia full song_v720P.mp4', 'images/vZXHF8DhWae4LzcbO3tr0TAe9wSOwldElQASeJJE.ico', 'images/elk3t4LSiQHwyRd6V1tRC4pJjWWDN8YocQTEED23.jpg', 'Jonah Long', 'code34', 'Consequuntur sed ill', 'Possimus explicabo', 'Perspiciatis sunt n', 'Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality', 3, '2023-08-16 05:50:10', '2023-08-17 05:05:15'),
(7, 'videos/1692257933_y2mate.com - Jara hole hole chalo more sajna by cute little babies cute baby singing little_1080p.mp4', 'images/prr1DZ70vhlBidEhgbo6mXExn8WyZD6Ls4RsH4T0.png', 'images/JYES0XMSS9qzgPM8nsDT52yN5EcTgprxAPzwk2oO.jpg', 'Panda Box', 'panda1', 'Xsmax', '@123213$', 'Good Morning', '    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).\r\n', 3, '2023-08-17 02:38:54', '2023-08-17 02:38:54'),
(8, 'videos/1692792986_y2mate.com - Jara hole hole chalo more sajna by cute little babies cute baby singing little_1080p.mp4', 'images/fp49xMuwm3pDrFxacsc54MryWyIEo4IhGRBU2Sz9.jpg', 'images/wlUqFg209gU8M5wZ3AuS5KSyD13BUIbrkvdUF7Jz.jpg', 'Oscar Snyder', '665676', 'Sint voluptas aut qu', 'Facilis eum deleniti', 'Aut quis odio dolore', 'kjhsdhfksdhkjdhsdfkjsdhfjksdhjkdsf', 3, '2023-08-23 07:16:26', '2023-08-23 07:20:40'),
(9, 'videos/1692796329_y2mate.com - Jara hole hole chalo more sajna by cute little babies cute baby singing little_1080p.mp4', 'images/uIiFUKomXIvU791lT7leumpDuiejnuRuequhOLNL.jpg', 'images/UDl3O3Bq6BfuLWDG1ECmXfEGOaJZEgIacaALgNbW.jpg', 'Kellie Whitfield', '400809', 'Sequi optio non rep', 'Eius voluptatibus et', 'In voluptatem ipsum', 'Repudiandae voluptat', 3, '2023-08-23 08:12:09', '2023-08-23 08:12:09'),
(10, 'videos/1693204052_y2mate.com - Jara hole hole chalo more sajna by cute little babies cute baby singing little_1080p.mp4', 'images/FcxZyPMTGgt0rFDw7wTHM7QEix2r6x1jDpu6L70J.jpg', NULL, 'Caryn Brock', '577266', 'Aliquam error in vol', 'Laborum Quia explic', 'Nostrum nisi ab tota', 'Sed error asperiores', 4, '2023-08-28 01:27:32', '2023-08-28 01:27:32'),
(11, 'videos/1693228249_y2mate.com - Jara hole hole chalo more sajna by cute little babies cute baby singing little_1080p.mp4', 'images/', NULL, 'Abigail Holden testing', '262788', 'Ea sed veniam quam', 'Quas consequuntur ve', 'Labore magna proiden', 'Proident autem obca', 4, '2023-08-28 02:31:00', '2023-08-28 08:10:49'),
(12, 'videos/1695647677_y2mate.com - Jara hole hole chalo more sajna by cute little babies cute baby singing little_1080p.mp4', 'images/COKFG0viF8FQ2bmv6eOFjFSSMIFfFI2dbsHHCIfM.jpg', NULL, 'Duo Box', '094075', 'Aspernatur id atque quis hic autem doloribus earum consequatur aliquam totam labore ex quam unde fa', 'Labore nesciunt dol', 'Aperiam sed quia eum deleniti eum explicabo Nemo in tenetur dolore', 'Totam omnis est dolor laborum Eiusmod non dolor', 3, '2023-09-25 08:14:37', '2023-09-25 08:14:37'),
(13, NULL, 'images/pkuJXonxieAfjPVhcMZBoNzXEpr2TX6zwKfUBuPG.png', NULL, 'Testing Device CodeCoy', '607561', 'Testing', '11223344', 'Porro numquam quidem', 'testing description', 9, '2023-10-09 02:31:28', '2023-10-09 02:31:28');

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
-- Table structure for table `landing_pages`
--

CREATE TABLE `landing_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `welcome_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `paragraph_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_pages`
--

INSERT INTO `landing_pages` (`id`, `logo_img`, `welcome_text`, `screen_1`, `screen_2`, `heading_text`, `paragraph_text`, `created_at`, `updated_at`) VALUES
(1, 'images/Z1ceFCX1QIMB9BwkHGnINPZcafpvcJN4I0CKsJ4z.png', '<p><p style=\"box-sizing: border-box; margin-bottom: 1rem; margin-top: 0px; font-family: Montserrat, sans-serif; color: rgb(33, 37, 41); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></p></p><h1 class=\"text-center\" style=\"box-sizing: border-box; font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem; margin-top: 0px; font-size: 2.5rem; text-align: center !important; color: rgb(33, 37, 41); font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Welcome your STR Guests with a Personalized Greeting</h1>', 'images/lmxDAvQpaS5OzSFljo4go5beFqz1gjUUNQ5hvIF4.png', 'images/WnRMXe0wC53JPThFCj4XWZAgzksl1hbW337733t9.png', '<h2 style=\"font-weight: 500; line-height: 1.2; font-size: 2rem; font-family: Montserrat, sans-serif; color: rgb(33, 37, 41); letter-spacing: normal;\">Welcome future Short Term Rental guests with a personalized greeting</h2>', '<p style=\"font-family: Montserrat, sans-serif; color: rgb(33, 37, 41); font-size: 16px;\">Welcome Screen allows you to create a curated, customized message to your guests the moment that they step into your rental property / boutique hotel. Imagine a couple that is celebrating their anniversay, a family getting together for a family reunion or a business traveler checking in after a series of flight delays. Their travels just became brighter with a simple welcome message.</p><p style=\"font-family: Montserrat, sans-serif; color: rgb(33, 37, 41); font-size: 16px;\">In addition to a welcome message, add the Wifi login (one of the first things a guest looks for) to the screen for easy access to the internet.</p>', '2023-10-16 04:45:11', '2023-10-16 06:48:47');

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
(5, '2023_08_16_054835_create_devices_table', 2),
(6, '2023_08_28_055329_create_bgimgs_table', 3),
(7, '2023_10_16_060819_create_landing_pages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mustafahmad030@gmail.com', 'G7VeULKjhtOXo2DJlQbSPh96X6rWCoU7WyRU3YtUpH9OA37dlNexCVOHoGNZ9Z95', '2023-10-11 01:05:12'),
('mustafahmad030@gmail.com', 'xFAl0Wy7t4g98JiDcA1XYiRrB0pMgRmoB9jTYPGTTf1yLfiXjjSOXr7TfgNkJ1BP', '2023-10-11 01:07:46'),
('mussab.ahmad1@gmail.com', 'YzQAeWT3Oow29SQv2pYAhpBrtLQaQMz3E5zsTsSHlj8BEPYX8HIzX2Rc3GZjf0cV', '2023-10-11 02:22:07'),
('admin@admin.com', '4JeEveUXgWnfCV6ZAsqV3TTyd5FL4mBVpEo3rAlCaiZl55EOUII8q67QPLL0skFU', '2023-10-11 05:53:41'),
('admin@admin.com', 'cVA4vZwheeaWE0goB9JzDOrHYVj6VCtwd38gKwATRyyQqVK4STnmIDXwI2DlsdYu', '2023-10-11 05:55:26');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT 0,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_pkg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sus_status` int(11) NOT NULL DEFAULT 0,
  `sus_days` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `payment_status`, `payment_date`, `subscription_pkg`, `subscription_price`, `sus_status`, `sus_days`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$/0kw80MZtbNOPZT/g9hrlOTxqqep96OhpIY6pJtiqEnmbswbTR09O', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, '2023-08-16 07:12:42', '2023-08-17 07:12:42'),
(3, 'CodeCoy User', 'mussab.ahmad1@gmail.com', NULL, '$2y$10$sRwbU/PPmk9gF5GE8Q.hAO2QdtHy7S.GbicnV93XW/q4TeKDljpOG', NULL, 1, '03-10-2023', 'STANDRED PACKAGE', '10', 0, 0, NULL, '2023-09-12 06:06:09', '2023-10-11 02:02:39'),
(4, 'Babar Aly', 'babar@gmail.com', NULL, '$2y$10$FxIlDgCsFIJhKg7/FySWge771okH81AT69FPQVoaKt1qF.4YyBt2u', NULL, 1, '03-10-2023', 'PREMIUM PACKAGE', '12', 0, 0, NULL, '2023-09-15 03:05:05', '2023-10-03 01:29:39'),
(5, 'test user new', 'testing@gmail.com', NULL, '$2y$10$mkEDHjn4PD7CvYu4YK1cYOsqvuBYcbbAcz.lHymuprcpY3FH6l7p2', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2023-09-20 07:33:07', '2023-09-26 02:04:03'),
(6, 'Hellow', 'hello@gmail.com', NULL, '$2y$10$ehGpFlW9Gv9pEVC7HlVKnedUOb6CQn6vLwxlQutIt2X5yaBTduxle', NULL, 0, NULL, NULL, NULL, 0, 0, NULL, '2023-10-03 01:41:20', '2023-10-03 01:41:20'),
(7, 'Kellie Avila', 'testing123@gmail.com', NULL, '$2y$10$sxAwqEfKu5bzDyrRto70yevIHTC5BaYUKTF3ToGTTtLR8x39lgM4e', NULL, 0, NULL, NULL, NULL, 0, 0, NULL, '2023-10-04 05:17:30', '2023-10-04 05:17:30'),
(8, 'Testing User', 'test1@gmail.com', NULL, '$2y$10$b2Nvkftsqn9XwqSunEyFSOKKyUEkdPBKtDJqnF4omJzAZFKCtSWdy', NULL, 1, '09-10-2023', 'STANDRED PACKAGE', '10', 0, 0, NULL, '2023-10-09 02:19:47', '2023-10-09 02:21:31'),
(9, 'CodeCoy User', 'mustafahmad030@gmail.com', NULL, '$2y$10$hL70PRYjLFNBkzfF20q1AuiPEbtAVxILeD3JIABGHDMxyZkKV048m', NULL, 1, '09-10-2023', 'STANDRED PACKAGE', '10', 1, 10, NULL, '2023-10-09 02:27:10', '2023-10-10 10:41:57'),
(10, 'lawa', 'lawa@gmail.com', NULL, '$2y$10$NR.hh.7BeRgvQAfKnDNLGuIr1RVj8XH3PwHh7oxyXSfXtfd3E3tVu', NULL, 0, NULL, NULL, NULL, 0, 0, NULL, '2023-10-13 02:23:16', '2023-10-13 02:23:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bgimgs`
--
ALTER TABLE `bgimgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bgimgs_device_id_foreign` (`device_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `landing_pages`
--
ALTER TABLE `landing_pages`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bgimgs`
--
ALTER TABLE `bgimgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_pages`
--
ALTER TABLE `landing_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bgimgs`
--
ALTER TABLE `bgimgs`
  ADD CONSTRAINT `bgimgs_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
