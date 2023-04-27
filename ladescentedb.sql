-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 27 avr. 2023 à 13:13
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ladescentedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
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
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `genre`, `nom`, `prenom`, `email`, `naissance`) VALUES
(6, 'Monsieur', 'ROY', 'Jules', 'jules.roy@student.junia.com', '2004-01-04');

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `descr` text,
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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `genre` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `mdp` text NOT NULL,
  `datebirth` text NOT NULL,
  `roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `genre`, `nom`, `prenom`, `username`, `email`, `mdp`, `datebirth`, `roles`) VALUES
(1, 'Mr', 'Test', 'Admin', 'La Descente Test 1', 'ladescente_admin@student.junia.com', '12345678', '2004-01-01', 0),
(2, 'Mr', 'Test', 'User', 'La Descente Test 2', 'ladescente_user@student.junia.com', '12345678', '2004-01-01', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
