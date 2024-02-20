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
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipus` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `proces_nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`nom`, `tipus`, `link`, `proces_nom`) VALUES
('arrays', 'docs', 'documents/javascriptArrays.docs', 'M6'),
('bootstrap', 'docs', 'documents/htmlBootstrap.docs', 'M9'),
('database table', 'sql', 'documents/database_tables.sql', 'M12'),
('eslint Installation', 'txt', 'documents/javascriptESlint.txt', 'M6'),
('functions', 'pdf', 'documents/javascriptFunctions.pdf', 'M6'),
('introduction to javascript', 'pdf', 'documents/javascriptIntroduction.pdf', 'M6'),
('introduction to PHP', 'pdf', 'documents/phpIntroductions.pdf', 'M7'),
('java introduction', 'mp4', 'documents/javaTutorial.mp4', 'M3'),
('media query', 'pdf', 'documents/htmlMediaQuery.pdf', 'M9'),
('objects', 'txt', 'documents/javascriptObjects.txt', 'M6'),
('oop objects and hierchary', 'pdf', 'documents/javascriptOOP.pdf', 'M6'),
('php Linux installation', 'pdf', 'documents/phpLinuxInstallation.pdf', 'M7'),
('poo introduction', 'pdf', 'documents/javaPOO.pdf', 'M3'),
('sass introduction', 'docs', 'documents/htmlSASS.docs', 'M9'),
('structure', 'text', 'documents/javascriptStructures.pdf', 'M6'),
('xpath manual', 'docs', 'documents/xmlXPath.docs', 'M4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`nom`),
  ADD KEY `proces_nom` (`proces_nom`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`proces_nom`) REFERENCES `proces` (`nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
