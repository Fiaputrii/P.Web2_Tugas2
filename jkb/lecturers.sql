-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2024 at 11:48 AM
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
-- Database: `jkb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `number_phone` int(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `signature` varchar(20) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nip` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`, `number_phone`, `address`, `signature`, `nidn`, `nip`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2109762, 'Devia Herena', 81200976, 'Jalan Tentara Pelajar', '0S90', 230678, 672, 610, '2024-09-13 09:15:11', '2024-09-13 09:15:11', '2024-09-13 09:15:11'),
(2300042, 'Katrina Deviant', 81234567, 'Jalan Nangka', '2D56', 241008, 890, 909, '2024-09-13 09:11:38', '2024-09-13 09:11:38', '2024-09-13 09:11:38'),
(2310079, 'Alifia Putri', 81223452, 'Jalan Gayam', '3K56', 232006, 56, 861, '2024-09-13 05:49:06', '2024-09-13 05:49:06', '2024-09-13 05:49:06'),
(2312002, 'Tiara Dinda', 89123023, 'Jalan Manggis', '0A54', 231004, 456, 221, '2024-09-13 08:25:04', '2024-09-13 08:25:04', '2024-09-13 08:25:04'),
(2778008, 'Ferina Sheren', 82099765, 'Jalan Kauman', '1F09', 250987, 763, 653, '2024-09-13 09:17:25', '2024-09-13 09:17:25', '2024-09-13 09:17:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
