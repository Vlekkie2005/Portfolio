-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Dec 02, 2024 at 04:34 PM
-- Server version: 9.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `projectName` varchar(9999) NOT NULL,
  `shortDesc` varchar(9999) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `projectImage` varchar(999) NOT NULL,
  `usedPrograms` varchar(9999) NOT NULL,
  `datePosted` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `shortDesc`, `description`, `projectImage`, `usedPrograms`, `datePosted`) VALUES
(13, 'Hendheld', 'In this project i&#039;m trying to create a hendheld like a switch or steam deck with the possibility to switch the computer like a cardridge.', 'Work in progress.....test', 'images/projects/8705_controllerRender.png', '', '2024-11-24 19:32:18'),
(14, 'Telgebieden', 'I made telgebieden.nl (may be offline) for FBE noord-holland to make it easier for people to sign up for the annual telling of the gooses in noord-holland.', 'work in progress.....', 'images/projects/2914_swappy-20241124_212121.png', 'php, html, scss, javascript', '2024-11-24 21:32:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
