-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 11:27 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unity`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_medical` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_contact_people`
--

CREATE TABLE `client_contact_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_documents`
--

CREATE TABLE `client_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_phones`
--

CREATE TABLE `client_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type_id` bigint(20) UNSIGNED NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_14_184949_create_clients_table', 2),
(12, '2021_08_10_065650_create_states_table', 3),
(13, '2021_08_11_073026_create_business_types_table', 3),
(14, '2021_08_11_110933_create_phone_descriptions_table', 3),
(15, '2021_08_15_105932_create_client_phones_table', 3),
(16, '2021_08_15_122232_create_client_documents_table', 4),
(17, '2021_08_17_132238_create_leads_table', 4),
(18, '2021_08_18_110259_create_client_contact_people_table', 4),
(19, '2021_10_19_200000_create_users_table', 4);

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
-- Table structure for table `phone_descriptions`
--

CREATE TABLE `phone_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AL', 'Alabama', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(2, 'AK', 'Alaska', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(3, 'AS', 'American Samoa', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(4, 'AZ', 'Arizona', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(5, 'AR', 'Arkansas', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(6, 'CA', 'California', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(7, 'CO', 'Colorado', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(8, 'CT', 'Connecticut', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(9, 'DE', 'Delaware', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(10, 'DC', 'District of Columbia', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(11, 'FM', 'Federated States of Micronesia', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(12, 'FL', 'Florida', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(13, 'GA', 'Georgia', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(14, 'GU', 'Guam', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(15, 'HI', 'Hawaii', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(16, 'ID', 'Idaho', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(17, 'IL', 'Illinois', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(18, 'IN', 'Indiana', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(19, 'IA', 'Iowa', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(20, 'KS', 'Kansas', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(21, 'KY', 'Kentucky', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(22, 'LA', 'Louisiana', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(23, 'ME', 'Maine', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(24, 'MH', 'Marshall Islands', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(25, 'MD', 'Maryland', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(26, 'MA', 'Massachusetts', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(27, 'MI', 'Michigan', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(28, 'MN', 'Minnesota', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(29, 'MS', 'Mississippi', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(30, 'MO', 'Missouri', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(31, 'MT', 'Montana', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(32, 'NE', 'Nebraska', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(33, 'NV', 'Nevada', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(34, 'NH', 'New Hampshire', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(35, 'NJ', 'New Jersey', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(36, 'NM', 'New Mexico', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(37, 'NY', 'New York', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(38, 'NC', 'North Carolina', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(39, 'ND', 'North Dakota', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(40, 'MP', 'Northern Mariana Islands', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(41, 'OH', 'Ohio', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(42, 'OK', 'Oklahoma', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(43, 'OR', 'Oregon', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(44, 'PW', 'Palau', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(45, 'PA', 'Pennsylvania', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(46, 'PR', 'Puerto Rico', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(47, 'RI', 'Rhode Island', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(48, 'SC', 'South Carolina', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(49, 'SD', 'South Dakota', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(50, 'TN', 'Tennessee', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(51, 'TX', 'Texas', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(52, 'UT', 'Utah', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(53, 'VT', 'Vermont', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(54, 'VI', 'Virgin Islands', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(55, 'VA', 'Virginia', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(56, 'WA', 'Washington', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(57, 'WV', 'West Virginia', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(58, 'WI', 'Wisconsin', '2021-08-19 05:56:33', '2021-08-19 05:56:33'),
(59, 'WY', 'Wyoming', '2021-08-19 05:56:33', '2021-08-19 05:56:33');

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `state_id`, `address`, `phone1`, `phone2`, `dob`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Chris Motari', 'chris@chris.chris', NULL, '$2y$10$DmDCvC7pLJXnCs9CopXxoeE2ZP9Tn7MuAAoAdzK/DOiFyKtuaxNry', 'BbxChu4zYyeEyT5xtxFkfH6E8Q4lhGu2cdEOiGcFypzh8DcicZDYdyBf2V5y', 'Admin', 1, 'Nairobi', '32784435165', '432354243', '2000-07-20', 'Male', '2021-08-19 09:24:52', '2021-08-19 17:48:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_contact_people`
--
ALTER TABLE `client_contact_people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_contact_people_lead_id_foreign` (`lead_id`);

--
-- Indexes for table `client_documents`
--
ALTER TABLE `client_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_documents_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_phones`
--
ALTER TABLE `client_phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_business_type_id_foreign` (`business_type_id`),
  ADD KEY `leads_state_id_foreign` (`state_id`);

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
-- Indexes for table `phone_descriptions`
--
ALTER TABLE `phone_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_state_id_foreign` (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_contact_people`
--
ALTER TABLE `client_contact_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_documents`
--
ALTER TABLE `client_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_phones`
--
ALTER TABLE `client_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `phone_descriptions`
--
ALTER TABLE `phone_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_contact_people`
--
ALTER TABLE `client_contact_people`
  ADD CONSTRAINT `client_contact_people_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`);

--
-- Constraints for table `client_documents`
--
ALTER TABLE `client_documents`
  ADD CONSTRAINT `client_documents_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_business_type_id_foreign` FOREIGN KEY (`business_type_id`) REFERENCES `business_types` (`id`),
  ADD CONSTRAINT `leads_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
