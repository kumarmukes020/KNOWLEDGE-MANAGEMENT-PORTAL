-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2026 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(33, 2, 'Login', 'User logged in', '2026-02-23 05:50:29');

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
(1, '', 1, 'Circular dtd 01.01.26 reg Knowledge Sharing Management System.pdf112026.pdf', '6998463c5d881.pdf', '', 1, 1, '2026-02-20 11:32:12', NULL),
(2, '', 1, 'nmllogo.jpg', '699847999a63e.jpg', '', 1, 0, '2026-02-20 11:38:01', NULL),
(3, '', 1, 'northdhadu pdf directory.xlsx', '69984a5b8de59.xlsx', '', 1, 0, '2026-02-20 11:49:47', NULL),
(4, '', 1, 'DOP Section I - Office order- 476-2022.pdf', '6999445a23edc.pdf', '', 1, 0, '2026-02-21 05:36:26', NULL),
(5, '', 2, 'RC_UPLOAD_USER_MANUAL.pdf', '699944824518f.pdf', '', 1, 0, '2026-02-21 05:37:06', NULL),
(6, '', 3, 'SAP_LA_S4C01_EN_2508_EX.pdf', '699949842bcb7.pdf', '', 3, 0, '2026-02-21 05:58:28', NULL),
(7, '', 3, 'SAP_LA_S4C01_EN_2508_EX.pdf', '69994b0290539.pdf', '', 3, 0, '2026-02-21 06:04:50', NULL),
(8, '', 3, '1793_260123154846_001.pdf', '69994ec9345c3.pdf', '', 4, 0, '2026-02-21 06:20:57', NULL),
(9, '', 4, 'Before & After.pdf', '699be96a9bd09.pdf', '', 4, 0, '2026-02-23 05:45:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `folder_name` varchar(150) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `project_name`, `folder_name`, `created_by`, `created_at`) VALUES
(1, '', 'abc', NULL, '2026-02-20 11:29:16'),
(2, '', 'TEST', NULL, '2026-02-21 05:36:49'),
(3, '', '456', 3, '2026-02-21 05:57:04'),
(4, '', '123', NULL, '2026-02-23 05:44:53');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `name`, `role`, `project`, `email`, `password`, `created_at`) VALUES
(1, '100001', 'Super Admin', 'super_admin', 'PB CMP', 'admin@gmail.com', '$2y$10$EKeEJl3GPggaWEtvzI0aSOEa7rXNVCfBKw9.QeV77ZPevWylSi.nW', '2026-02-20 11:08:55'),
(2, '100002', 'Ishan', 'admin', 'TL CMP', 'cmhqranchi@gmail.com', '$2y$10$UL35txL.CAdp7yPbaYVzpehamMVC2dqUksr4l6LuydIlgdTy60aLe', '2026-02-20 11:43:11'),
(3, '100003', 'karan', 'admin', 'CM CMP', 'karan@gmail.com', '$2y$10$TaINCSNvjFIgS5T0puCa4OsxbtbEGzjIQbMh4aDogWeK7oYmClHTO', '2026-02-20 11:47:34'),
(4, '100233', 'Laxmi Narayan Pradhan', 'super_admin', 'CMHQ', 'lnpradhan@ntpc.co.in', '$2y$10$BZFXvtg.lIlwkxhAQQjqauGJWYp6eciclFqG8UKgd8uX8KeOqhbc2', '2026-02-21 06:18:10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
