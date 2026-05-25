-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2026 at 08:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `km`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `description`, `created_at`) VALUES
(1, 1, 'Login', 'User logged in', '2026-02-20 11:14:09'),
(2, 1, 'Create Folder', 'Created folder \'abc\'', '2026-02-20 11:29:16'),
(3, 1, 'Upload File', 'Uploaded file \'Circular dtd 01.01.26 reg Knowledge Sharing Management System.pdf112026.pdf\' in folder \'abc\'', '2026-02-20 11:32:12'),
(4, 1, 'Delete File', 'Deleted file \'Circular dtd 01.01.26 reg Knowledge Sharing Management System.pdf112026.pdf\'', '2026-02-20 11:37:50'),
(5, 1, 'Upload File', 'Uploaded file \'nmllogo.jpg\' in folder \'abc\'', '2026-02-20 11:38:01'),
(6, 1, 'Add User', 'Created user cmhqranchi@gmail.com', '2026-02-20 11:43:11'),
(7, 2, 'Login', 'User logged in', '2026-02-20 11:43:21'),
(8, 1, 'Login', 'User logged in', '2026-02-20 11:43:45'),
(9, 1, 'Add User', 'Created user karan@gmail.com', '2026-02-20 11:47:34'),
(10, 1, 'Login', 'User logged in', '2026-02-20 11:48:55'),
(11, 1, 'Upload File', 'Uploaded file \'northdhadu pdf directory.xlsx\' in folder \'abc\'', '2026-02-20 11:49:47'),
(12, 1, 'Login', 'User logged in', '2026-02-21 05:30:09'),
(13, 2, 'Login', 'User logged in', '2026-02-21 05:32:52'),
(14, 1, 'Login', 'User logged in', '2026-02-21 05:34:17'),
(15, 1, 'Upload File', 'Uploaded file \'DOP Section I - Office order- 476-2022.pdf\' in folder \'abc\'', '2026-02-21 05:36:26'),
(16, 1, 'Create Folder', 'Created folder \'TEST\'', '2026-02-21 05:36:49'),
(17, 1, 'Upload File', 'Uploaded file \'RC_UPLOAD_USER_MANUAL.pdf\' in folder \'TEST\'', '2026-02-21 05:37:06'),
(18, 1, 'Login', 'User logged in', '2026-02-21 05:51:30'),
(19, 3, 'Login', 'User logged in', '2026-02-21 05:52:07'),
(20, 1, 'Login', 'User logged in', '2026-02-21 06:12:08'),
(21, 1, 'Login', 'User logged in', '2026-02-21 06:17:29'),
(22, 1, 'Add User', 'Created user lnpradhan@ntpc.co.in', '2026-02-21 06:18:10'),
(23, 4, 'Login', 'User logged in', '2026-02-21 06:18:16'),
(24, 4, 'Upload File', 'Uploaded file \'1793_260123154846_001.pdf\' in folder \'456\'', '2026-02-21 06:20:57'),
(25, 1, 'Login', 'User logged in', '2026-02-21 06:21:31'),
(26, 4, 'Login', 'User logged in', '2026-02-21 07:31:39'),
(27, 2, 'Login', 'User logged in', '2026-02-21 07:32:08'),
(28, 4, 'Login', 'User logged in', '2026-02-23 05:44:10'),
(29, 4, 'Create Folder', 'Created folder \'123\'', '2026-02-23 05:44:53'),
(30, 4, 'Upload File', 'Uploaded file \'Before & After.pdf\' in folder \'123\'', '2026-02-23 05:45:14'),
(31, 1, 'Login', 'User logged in', '2026-02-23 05:48:09'),
(32, 4, 'Login', 'User logged in', '2026-02-23 05:50:17'),
(33, 2, 'Login', 'User logged in', '2026-02-23 05:50:29'),
(34, 2, 'Login', 'User logged in', '2026-02-23 07:28:46'),
(35, 2, 'Login', 'User logged in', '2026-02-23 07:36:32'),
(36, 2, 'Delete File', 'Deleted file \'Attandance jan 20261.pdf\'', '2026-02-23 07:37:52'),
(37, 1, 'Login', 'User logged in', '2026-02-23 07:38:32'),
(38, 2, 'Login', 'User logged in', '2026-02-23 11:20:42'),
(39, 2, 'Login', 'User logged in', '2026-02-23 11:22:39'),
(40, 4, 'Login', 'User logged in', '2026-02-23 11:22:52'),
(41, 2, 'Login', 'User logged in', '2026-02-24 04:58:13'),
(42, 1, 'Login', 'User logged in', '2026-02-24 05:20:05'),
(43, 2, 'Login', 'User logged in', '2026-02-24 05:25:28'),
(44, 2, 'Login', 'User logged in', '2026-02-24 11:20:39'),
(45, 4, 'Login', 'User logged in', '2026-02-24 11:35:19'),
(46, 4, 'Login', 'User logged in', '2026-02-24 11:37:30'),
(47, 4, 'Create Folder', 'Created folder \'TechnicalServices\'', '2026-02-24 11:39:20'),
(48, 4, 'Create Folder', 'Created folder \'HumanResource\'', '2026-02-24 11:40:05'),
(49, 4, 'Create Folder', 'Created folder \'SSC-Finance\'', '2026-02-24 11:40:37'),
(50, 4, 'Create Folder', 'Created folder \'ProjectManagement\'', '2026-02-24 11:41:12'),
(51, 4, 'Create Folder', 'Created folder \'Mining\'', '2026-02-24 11:41:51'),
(52, 4, 'Create Folder', 'Created folder \'EnvironmentManagement\'', '2026-02-24 11:42:23'),
(53, 4, 'Create Folder', 'Created folder \'Legal\'', '2026-02-24 11:43:24'),
(54, 4, 'Login', 'User logged in', '2026-02-24 11:43:47'),
(55, 4, 'Create Folder', 'Created folder \'BusinessDevelopment\'', '2026-02-24 11:44:48'),
(56, 4, 'Create Folder', 'Created folder \'Commercial\'', '2026-02-24 11:45:03'),
(57, 4, 'Create Folder', 'Created folder \'InformationTechnology\'', '2026-02-24 11:45:43'),
(58, 4, 'Create Folder', 'Created folder \'Safety\'', '2026-02-24 11:46:05'),
(59, 4, 'Create Folder', 'Created folder \'LARRCSR\'', '2026-02-24 11:46:25'),
(60, 4, 'Create Folder', 'Created folder \'FuelManagement\'', '2026-02-24 11:47:02'),
(61, 4, 'Create Folder', 'Created folder \'Engineering\'', '2026-02-24 11:47:12'),
(62, 4, 'Create Folder', 'Created folder \'SSC-CnM\'', '2026-02-24 11:47:24'),
(63, 2, 'Login', 'User logged in', '2026-02-24 11:48:02'),
(64, 4, 'Login', 'User logged in', '2026-02-24 11:49:03'),
(65, 4, 'Upload File', 'Uploaded file \'SAP GUI.pdf\' in folder \'InformationTechnology\'', '2026-02-24 11:50:44'),
(66, 4, 'Upload File', 'Uploaded file \'SAP Password reset.pdf\' in folder \'InformationTechnology\'', '2026-02-24 11:50:50'),
(67, 1, 'Login', 'User logged in', '2026-02-25 05:51:41'),
(68, 4, 'Login', 'User logged in', '2026-02-25 06:45:52'),
(69, 4, 'Upload File', 'Uploaded file \'RC_UPLOAD_USER_MANUAL.pdf\' in folder \'Human Resource\'', '2026-02-25 06:46:19'),
(70, 4, 'Login', 'User logged in', '2026-02-25 06:49:26'),
(71, 4, 'Upload File', 'Uploaded file \'km.sql\' in folder \'LA R&R CSR\'', '2026-02-25 06:49:35'),
(72, 4, 'Delete File', 'Deleted file \'km.sql\'', '2026-02-25 06:49:53'),
(73, 4, 'Delete File', 'Deleted file \'RC_UPLOAD_USER_MANUAL.pdf\'', '2026-02-25 06:50:02'),
(74, 2, 'Login', 'User logged in', '2026-02-25 09:08:56'),
(75, 1, 'Login', 'User logged in', '2026-02-25 09:10:17'),
(76, 1, 'Login', 'User logged in', '2026-03-03 08:39:40'),
(77, 4, 'Login', 'User logged in', '2026-03-09 10:23:24'),
(78, 1, 'Login', 'User logged in', '2026-03-09 10:28:11'),
(79, 1, 'Add User', 'Created user abhishekmehra@ntpc.co.in', '2026-03-09 10:29:10'),
(80, 5, 'Login', 'User logged in', '2026-03-09 10:29:52'),
(81, 5, 'Login', 'User logged in', '2026-03-09 10:35:10'),
(82, 4, 'Login', 'User logged in', '2026-03-09 10:37:08'),
(83, 4, 'Login', 'User logged in', '2026-03-09 10:38:48'),
(84, 4, 'Login', 'User logged in', '2026-03-09 10:45:48'),
(85, 4, 'Login', 'User logged in', '2026-03-09 10:46:15'),
(86, 5, 'Login', 'User logged in', '2026-03-09 10:47:03'),
(87, 4, 'Login', 'User logged in', '2026-03-10 05:58:26'),
(88, 4, 'Add User', 'Created user jeetendragupta@ntpc.co.in', '2026-03-10 05:59:27'),
(89, 4, 'Add User', 'Created user manishs@ntpc.co.in', '2026-03-10 06:00:06'),
(90, 4, 'Add User', 'Created user mithleshkumar02@ntpc.co.in', '2026-03-10 06:01:21'),
(91, 4, 'Add User', 'Created user MAGARWAL@NTPC.CO.IN', '2026-03-10 06:01:47'),
(92, 4, 'Add User', 'Created user MAHIRWAR01@NTPC.CO.IN', '2026-03-10 06:02:48'),
(93, 4, 'Add User', 'Created user ARNABMONDAL@NTPC.CO.IN', '2026-03-10 06:03:29'),
(94, 4, 'Add User', 'Created user suneetparashar@ntpc.co.in', '2026-03-10 06:04:18'),
(95, 4, 'Add User', 'Created user pranavkumar@ntpc.co.in', '2026-03-10 06:05:09'),
(96, 4, 'Add User', 'Created user ssenapati@ntpc.co.in', '2026-03-10 06:05:42'),
(97, 4, 'Add User', 'Created user sunilkrai@ntpc.co.in', '2026-03-10 06:06:14'),
(98, 4, 'Add User', 'Created user rkrai@ntpc.co.in', '2026-03-10 06:07:20'),
(99, 16, 'Login', 'User logged in', '2026-03-10 06:07:52'),
(100, 4, 'Login', 'User logged in', '2026-03-10 06:10:43'),
(101, 4, 'Login', 'User logged in', '2026-03-11 04:06:38'),
(102, 4, 'Login', 'User logged in', '2026-03-11 04:08:05'),
(103, 12, 'Login', 'User logged in', '2026-03-11 04:14:09'),
(104, 12, 'Login', 'User logged in', '2026-03-11 04:15:34'),
(105, 1, 'Login', 'User logged in', '2026-03-11 04:40:56'),
(106, 1, 'Add User', 'Created user cmhqranchi@gmail.com', '2026-03-11 04:41:40'),
(107, 9, 'Login', 'User logged in', '2026-03-11 04:53:29'),
(108, 1, 'Login', 'User logged in', '2026-04-21 07:16:10'),
(109, 1, 'Login', 'User logged in', '2026-04-21 07:20:05'),
(110, 1, 'Login', 'User logged in', '2026-04-21 07:22:44'),
(111, 1, 'Upload File', 'Uploaded file \'Ranchi Emp_Email Ids.txt\' in folder \'Legal\'', '2026-04-21 07:26:52'),
(112, 1, 'Delete File', 'Deleted file \'Ranchi Emp_Email Ids.txt\'', '2026-04-21 07:27:00'),
(113, 1, 'Delete User', 'User ID 7', '2026-04-21 07:32:12'),
(114, 1, 'Delete User', 'User ID 13', '2026-04-21 07:32:17'),
(115, 1, 'Delete User', 'User ID 14', '2026-04-21 07:32:41'),
(116, 1, 'Delete User', 'User ID 9', '2026-04-21 07:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `stored_name` varchar(255) DEFAULT NULL,
  `file_path` text NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `is_deleted` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `project_name`, `folder_id`, `file_name`, `stored_name`, `file_path`, `uploaded_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '', 7, 'Ranchi Emp_Email Ids.txt', '69e726bc6d674.txt', '', 1, 1, '2026-04-21 07:26:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_ratings`
--

CREATE TABLE `file_ratings` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_ratings`
--

INSERT INTO `file_ratings` (`id`, `file_id`, `rating`, `ip_address`, `created_at`) VALUES
(1, 2, 1, '10.2.254.153', '2026-02-24 11:52:26'),
(2, 2, 4, '10.2.254.99', '2026-02-25 10:56:15'),
(3, 1, 5, '10.2.254.99', '2026-02-25 10:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `folder_name` varchar(150) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hits` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `project_name`, `folder_name`, `created_by`, `created_at`, `hits`) VALUES
(1, '', 'Technical Services', NULL, '2026-02-24 11:39:20', 1),
(2, '', 'Human Resource', NULL, '2026-02-24 11:40:05', 3),
(3, '', 'SSC-Finance', NULL, '2026-02-24 11:40:37', 3),
(4, '', 'Project Management', NULL, '2026-02-24 11:41:12', 0),
(5, '', 'Mining', NULL, '2026-02-24 11:41:51', 2),
(6, '', 'Environment Management', NULL, '2026-02-24 11:42:23', 4),
(7, '', 'Legal', NULL, '2026-02-24 11:43:24', 2),
(8, '', 'Business Development', NULL, '2026-02-24 11:44:48', 9),
(9, '', 'Commercial', NULL, '2026-02-24 11:45:03', 4),
(10, '', 'Information Technology', NULL, '2026-02-24 11:45:43', 7),
(11, '', 'Safety', NULL, '2026-02-24 11:46:05', 1),
(12, '', 'LA R&R CSR', NULL, '2026-02-24 11:46:25', 1),
(13, '', 'Fuel Management', NULL, '2026-02-24 11:47:02', 1),
(14, '', 'Engineering', NULL, '2026-02-24 11:47:12', 4),
(15, '', 'SSC-CnM', NULL, '2026-02-24 11:47:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` enum('super_admin','admin') NOT NULL,
  `project` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expire` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `name`, `role`, `project`, `email`, `password`, `created_at`, `reset_token`, `token_expire`, `status`) VALUES
(1, '100001', 'Super Admin', 'super_admin', 'PB CMP', 'admin@gmail.com', '$2y$10$EKeEJl3GPggaWEtvzI0aSOEa7rXNVCfBKw9.QeV77ZPevWylSi.nW', '2026-02-20 05:38:55', NULL, NULL, 1),
(17, '100002', 'Test1', 'admin', 'CMHQ', 'cmhqranchi@gmail.com', '$2y$10$bnShkiLBP5vOmZPnmhiN/OnusPKEpN4WJsH0QL3/p9ML9zQC.nZ0.', '2026-03-11 04:41:40', '65b01057730d4bcaca346b0ade701aba7532e6149f7dbd003de1a9f16f28d2a5d1fe2ed503b410ca79c902511ec953185c21', '2026-03-11 06:44:19', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_ratings`
--
ALTER TABLE `file_ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_rating` (`file_id`,`ip_address`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_ratings`
--
ALTER TABLE `file_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
