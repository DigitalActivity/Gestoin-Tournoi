-- phpMyAdmin SQL
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 02:04 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21
-- AUTHOR: Younes Rabdi 0821450

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tournoiphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `nom_receveurs` varchar(80) NOT NULL,
  `nom_visiteurs` varchar(80) NOT NULL,
  `score_receveurs` int(4) DEFAULT NULL,
  `score_visiteurs` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `nom_receveurs`, `nom_visiteurs`, `score_receveurs`, `score_visiteurs`) VALUES
(77, 'Real Madrid', 'FC Barcelone', 5, 3),
(78, 'Malaga', 'Getafe', 2, 3),
(79, 'Betis', 'Atletico Madrid', 1, 1),
(80, 'Celta Vigo', 'Villa Real', 6, 1),
(81, 'Espanyol', 'FC Valencia', 7, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
