-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2024 at 05:59 PM
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
-- Table structure for table `proces`
--

CREATE TABLE `proces` (
  `nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `objectiu` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuari_email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `proces`
--

INSERT INTO `proces` (`nom`, `tipus`, `objectiu`, `usuari_email`) VALUES
('M10', 'DAW', 'FOL', 'joseph@gmail.com'),
('M11', 'DAW', 'EIE', 'yuanduo@gmail.com'),
('M12', 'DAW', 'Project', 'joseph@gmail.com'),
('M3', 'DAW', 'Java', 'yuanduo@gmail.com'),
('M4', 'DAW', 'XML (Markdown, XPath, XQuery)', 'joseph@gmail.com'),
('M6', 'DAW', 'Javascript', 'yuanduo@gmail.com'),
('M7', 'DAW', 'PHP', 'yuanduo@gmail.com'),
('M8', 'DAW', 'GitHub, Servlet', 'joseph@gmail.com'),
('M9', 'DAW', 'HTML, CSS, SASS', 'joseph@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proces`
--
ALTER TABLE `proces`
  ADD PRIMARY KEY (`nom`),
  ADD KEY `usuari_email` (`usuari_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proces`
--
ALTER TABLE `proces`
  ADD CONSTRAINT `proces_ibfk_1` FOREIGN KEY (`usuari_email`) REFERENCES `usuari` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
