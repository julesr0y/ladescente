-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2023 at 02:02 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ladescentedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `genre` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `naissance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `genre`, `nom`, `prenom`, `email`, `naissance`) VALUES
(2, 'Monsieur', 'ROY', 'Jules', 'jules.roy01@orange.fr', '2004-01-04'),
(3, 'Monsieur', 'ROY', 'Jules', 'jules.roy100@gmail.com', '2004-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text,
  `ingredient1` text,
  `ingredient2` text,
  `ingredient3` text,
  `ingredient4` text,
  `ingredient5` text,
  `ingredient6` text,
  `ingredient7` text,
  `ingredient8` text,
  `ingredient9` text,
  `ingredient10` text,
  `preparation1` text,
  `preparation2` text,
  `preparation3` text,
  `preparation4` text,
  `preparation5` text,
  `preparation6` text,
  `preparation7` text,
  `preparation8` text,
  `preparation9` text,
  `preparation10` text,
  `conseil` text,
  `approved` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `genre` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `datebirth` text NOT NULL,
  `roles` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `genre`, `nom`, `prenom`, `username`, `email`, `password`, `datebirth`, `roles`) VALUES
(1, 'Mr', 'ROY', 'Jules', 'Pang0lla1n', 'jules.roy01@orange.fr', '$2y$10$N3oVib/5KzJqmLZbXzyuBeVsAr7IF16BYMs9h/sI7Z19xasdEPzLG', '2004-01-04', '[\\\"ROLE_ADMIN\\\"]'),
(4, 'Mr', 'ROY', 'Jules', 'Jul', 'julesr0y@outlook.com', '$2y$10$ckm9iLKoY.bIWStUxF3NtuVaCzAnH/IoTYUw2HrBxCfxHpqRG4pp6', '2004-01-04', '[\\\"ROLE_USER\\\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
