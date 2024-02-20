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
-- Table structure for table `avaluacio`
--

CREATE TABLE `avaluacio` (
  `tipus` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nivell` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `valoracio` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `planificacio` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `accions` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estrategia` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaluacio`
--
ALTER TABLE `avaluacio`
  ADD PRIMARY KEY (`tipus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
