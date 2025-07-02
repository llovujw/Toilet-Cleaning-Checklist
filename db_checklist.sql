-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2025 at 07:51 PM
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
-- Database: `db_checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

CREATE TABLE `checklists` (
  `id` int(11) NOT NULL,
  `toilet_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('Sudah Dibersihkan','Belum Dibersihkan') DEFAULT 'Belum Dibersihkan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklists`
--

INSERT INTO `checklists` (`id`, `toilet_id`, `user_id`, `tanggal`, `status`) VALUES
(3, 1, 1, '2025-07-02', 'Sudah Dibersihkan');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_detail`
--

CREATE TABLE `checklist_detail` (
  `id` int(11) NOT NULL,
  `checklist_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `checked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist_detail`
--

INSERT INTO `checklist_detail` (`id`, `checklist_id`, `item_id`, `checked`) VALUES
(3, 3, 1, 0),
(4, 3, 2, 0),
(5, 3, 3, 0),
(6, 3, 4, 0),
(7, 3, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_items`
--

CREATE TABLE `checklist_items` (
  `id` int(11) NOT NULL,
  `item` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist_items`
--

INSERT INTO `checklist_items` (`id`, `item`) VALUES
(1, 'Bersihkan wastafel'),
(2, 'Bersihkan cermin'),
(3, 'Bersihkan toilet'),
(4, 'Bersihkan lantai'),
(5, 'Bersihkan tempat sampah');

-- --------------------------------------------------------

--
-- Table structure for table `toilets`
--

CREATE TABLE `toilets` (
  `id` int(11) NOT NULL,
  `lantai` int(11) DEFAULT NULL,
  `nama_toilet` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toilets`
--

INSERT INTO `toilets` (`id`, `lantai`, `nama_toilet`) VALUES
(1, 1, 'Toilet Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Admin Toilet', 'admin@toilet.com', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toilet_id` (`toilet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `checklist_detail`
--
ALTER TABLE `checklist_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checklist_id` (`checklist_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `checklist_items`
--
ALTER TABLE `checklist_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toilets`
--
ALTER TABLE `toilets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checklist_detail`
--
ALTER TABLE `checklist_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checklist_items`
--
ALTER TABLE `checklist_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toilets`
--
ALTER TABLE `toilets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checklists`
--
ALTER TABLE `checklists`
  ADD CONSTRAINT `checklists_ibfk_1` FOREIGN KEY (`toilet_id`) REFERENCES `toilets` (`id`),
  ADD CONSTRAINT `checklists_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `checklist_detail`
--
ALTER TABLE `checklist_detail`
  ADD CONSTRAINT `checklist_detail_ibfk_1` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`),
  ADD CONSTRAINT `checklist_detail_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `checklist_items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
