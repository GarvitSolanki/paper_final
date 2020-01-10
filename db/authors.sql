-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2020 at 11:18 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paper`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` varchar(10) NOT NULL,
  `author_name` text NOT NULL,
  `author_designation` text NOT NULL,
  `author_organisation` text NOT NULL,
  `author_email` varchar(30) NOT NULL,
  `author_mobile` bigint(10) NOT NULL,
  `submission_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_designation`, `author_organisation`, `author_email`, `author_mobile`, `submission_id`) VALUES
('5e0fbbeb77', 'df', '', 'cdasv', 'dsdg@dfs.com', 8956231478, '5e0fbbeb77'),
('5e0fbbeb8e', '', '', '', 'dsdg@dfs.com', 8956231478, '5e0fbbeb77'),
('5e0fbc71c4', 'df', '', 'cdasv', 'dsdg@dfs.com', 8956231478, '5e0fbc71c4'),
('5e0fbc71da', '', '', '', 'dsdg@dfs.com', 8956231478, '5e0fbc71c4'),
('5e0fbc9ad5', 'df', '', 'cdasv', 'dsdg@dfs.com', 8956231478, '5e0fbc9ad5'),
('5e0fbc9ae3', '', '', '', 'dsdg@dfs.com', 8956231478, '5e0fbc9ad5'),
('5e0fbce856', 'df', '', 'cdasv', 'dsdg@dfs.com', 8956231478, '5e0fbce856'),
('5e0fbce863', '', '', '', 'dsdg@dfs.com', 8956231478, '5e0fbce856'),
('5e0fbd2724', 'Garvit Solanki', '', 'cdasv', 'dsdg@dfs.com', 8956231478, '5e0fbd2724'),
('5e0fbd273e', '', '', 'cdasv', 'dsdg@dfs.com', 8956231478, '5e0fbd2724');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `author_id` (`author_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
