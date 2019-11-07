-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2016 at 04:45 
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arisan`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `meta` varchar(100) NOT NULL,
  `ikut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `meta`, `ikut`) VALUES
(16, 'Maulana Rizal Hilman', 'XI RPL', 1),
(18, 'Yasmin', 'XI RPL', 1),
(20, 'Nabila', 'XI RPL', 1),
(21, 'Fajar Nugraha', 'XI RPL', 1),
(22, 'Indrayansyah', 'XI RPL', 1),
(23, 'Ayu Sri Maskanah', 'XI RPL', 1),
(24, 'Arin Aulia', 'XI RPL', 1),
(25, 'Alwan Pramana', 'XI RPL', 1),
(26, 'Hariri', 'XI RPL', 1),
(27, 'Diva Faradiba', 'XI RPL', 1),
(28, 'Siti Nur Mala', 'XI RPL', 1),
(29, 'Venia Meliani', 'XI RPL', 1),
(30, 'Muhammad Firdaus', 'XI RP', 1),
(31, 'Muslimin', 'XI RPL', 1),
(32, 'Ardi', 'XI RPL', 1),
(33, 'Rahayu Indra Leksana', 'XI RPL', 1),
(34, 'Prika Odiyasa', 'XI RPL', 1),
(35, 'Rizal Rohmatun', 'XI RPL', 1),
(36, 'Siti Rahma', 'XI RPL', 1),
(37, 'Rimawati', 'XI RPL', 1),
(38, 'Hana Faradiba', 'XI RPL', 1),
(39, 'Violetra', 'XI RPL', 1),
(40, 'Rizky Mujiburrahman', 'XI RPL', 1),
(41, 'Anisa Rizky A', 'XI RPL', 1),
(42, 'Salsa', 'XI RPL', 1),
(43, 'Farrel Franqois', 'XI RPL', 1),
(44, 'Apip', 'XI RPL', 1),
(45, 'Ganesha Mochammad Dava', 'XI RPL', 1),
(46, 'Asep Abdul Azis', 'XI RPL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `winers`
--

CREATE TABLE `winers` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `winers`
--
ALTER TABLE `winers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `winers`
--
ALTER TABLE `winers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
