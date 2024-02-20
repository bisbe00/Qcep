-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2024 at 05:58 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcep`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaluacions`
--

CREATE TABLE `avaluacions` (
  `avaluacio_tipus` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuari_email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `proces_nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaluacions`
--
ALTER TABLE `avaluacions`
  ADD PRIMARY KEY (`avaluacio_tipus`),
  ADD KEY `usuari_email` (`usuari_email`),
  ADD KEY `proces_nom` (`proces_nom`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaluacions`
--
ALTER TABLE `avaluacions`
  ADD CONSTRAINT `avaluacions_ibfk_1` FOREIGN KEY (`avaluacio_tipus`) REFERENCES `avaluacio` (`tipus`),
  ADD CONSTRAINT `avaluacions_ibfk_2` FOREIGN KEY (`usuari_email`) REFERENCES `usuari` (`email`),
  ADD CONSTRAINT `avaluacions_ibfk_3` FOREIGN KEY (`proces_nom`) REFERENCES `proces` (`nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
