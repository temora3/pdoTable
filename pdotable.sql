-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 09:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdotable`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` bigint(11) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role`) VALUES
(3, 'Admin'),
(1, 'Author'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userName` varchar(60) DEFAULT NULL,
  `userEmail` varchar(60) DEFAULT NULL,
  `userPassword` varchar(50) NOT NULL DEFAULT '',
  `roleId` varchar(60) DEFAULT NULL,
  `regDate` date DEFAULT NULL,
  `userID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userName`, `userEmail`, `userPassword`, `roleId`, `regDate`, `userID`) VALUES
('Eren Jaeger', 'eren.jaeger@gmail.com', 'asd', '3', '2023-09-16', 7),
('Ayanakoji', 'ayanakoji@gmail.com', '$2y$10$4kPhCnQV.sPXF04mCM5NjuXLC89e6VcTVpuI0IYSEv4', '1', '2023-09-29', 13),
('Seanr', 'sean.ratemo@gmail.com', '$2y$10$bchH1s8zjUuLNwNvz1lghORlrFdRrQx/dMoSYQw.Lby', '2', '2023-09-29', 14),
('Satoru Gojo', 'satoru.gojo@gmail.com', '$2y$10$PGmgFQDVV96mhJRZIq9O6.WdJu5FlKrH6KTH/9mXL9r', '3', '2023-09-29', 15),
('Renee Blasie', 'wraith@gmail.com', '$2y$10$4SdvAmlujSuuGlEu6k9Qv.VwfmuLkglUil4IOcpbri/', '3', '2023-09-29', 16),
('Alex ', 'alex@gmail.com', '$2y$10$3eadmXSAEskYGvhQaEaT/OZn3PLG4QDuZGMnMIrhBKJ', '1', '2023-09-29', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
