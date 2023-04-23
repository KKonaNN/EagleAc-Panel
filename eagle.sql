-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 04:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eagle`
--

-- --------------------------------------------------------

--
-- Table structure for table `globalbans`
--

CREATE TABLE `globalbans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `steam_id` varchar(255) DEFAULT NULL,
  `rockstar_license` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) DEFAULT NULL,
  `discord_name` varchar(30) NOT NULL DEFAULT 'N/A',
  `discord_id` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `globalbans`
--

INSERT INTO `globalbans` (`id`, `name`, `steam_id`, `rockstar_license`, `token`, `date`, `ip`, `discord_name`, `discord_id`, `reason`) VALUES
(1, 'KonaN', 'KonaN', 'KonaN', 'KonaN', '2023-03-12 19:34:08', 'NIGGER', 'KonaN', '592439347400409088', 'Eulen Executor'),
(4, 'cheater 2', 'cheater 2', 'cheater 2', 'cheater 2', '2023-03-13 13:26:29', 'cheater 2', 'N/A', 'cheater 2', 'N/A'),
(5, 'cheater 3', 'cheater 3', 'cheater 3', 'cheater 3', '2023-03-13 13:26:29', 'cheater 3', 'N/A', 'cheater 3', 'N/A'),
(6, 'cheater 4', 'cheater 4', 'cheater 4', 'cheater 4', '2023-03-13 13:26:50', 'cheater 4', 'N/A', 'cheater 4', 'N/A'),
(7, 'cheater 5', 'cheater 5', 'cheater 5', 'cheater 5', '2023-03-13 13:26:50', 'cheater 5', 'N/A', 'cheater 5', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` int(11) NOT NULL,
  `server_name` varchar(255) DEFAULT NULL,
  `framework` varchar(18) NOT NULL DEFAULT 'Qbcore',
  `discord_id` varchar(25) NOT NULL,
  `servername` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `globalbans`
--
ALTER TABLE `globalbans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `globalbans`
--
ALTER TABLE `globalbans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
