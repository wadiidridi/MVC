-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 oct. 2023 à 17:00
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `image_voiture`
--

CREATE TABLE `image_voiture` (
  `image` varchar(255) DEFAULT NULL,
  `voiture_id` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image_voiture`
--

INSERT INTO `image_voiture` (`image`, `voiture_id`, `id_photo`) VALUES
('653925819ee58_OIP (5).jfif', 31, 32),
('653925819fa2a_OIP (6).jfif', 31, 33),
('65392581a051a_OIP (7).jfif', 31, 34),
('65392581a11ba_OIP.jfif', 31, 35),
('65392581a1c10_R (1).jfif', 31, 36),
('65392581a27f4_R.jfif', 31, 37),
('65392581a348d_télécharger.jfif', 31, 38),
('65392617c60f8_OIP (8).jfif', 32, 39),
('65392617c6c71_OIP (9).jfif', 32, 40),
('65392617c77bb_OIP (10).jfif', 32, 41),
('6539268e6398d_th (1).jfif', 33, 42),
('6539268e64914_th (2).jfif', 33, 43),
('6539268e65bd3_th (3).jfif', 33, 44),
('6539268e66b5d_th (4).jfif', 33, 45),
('653927291b70c_OIP (11).jfif', 34, 46),
('653927291c369_OIP (12).jfif', 34, 47),
('653927291d038_OIP (13).jfif', 34, 48),
('653927291db7b_R (2).jfif', 34, 49);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `voiture_id` int(11) DEFAULT NULL,
  `personne_id` int(11) DEFAULT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `duree` varchar(255) NOT NULL,
  `prix` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `Role` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `mail`, `password`, `date`, `image`, `name`, `Role`) VALUES
(130, 'Conorr@gmail.com', '$2y$10$jND3hkl.Gr1xYLA4dnrHUeVGiP0inyNfj2qkbNETz/YpJjyWvdwm.', '2023-10-19 11:16:00', 'R (1).jfif', 'Conorr', 'user'),
(131, 'khabib@gmail.com', '$2y$10$Bt1SamF9NjyB0pSqDhMxL.47gAoQfpsw4G7pvC9cWwZ1wGjVpdaKa', '2023-10-19 11:16:58', 'Martial-Artist-Khabib-Nurmagomedov-PNG-Image.png', 'khabib', 'user'),
(133, 'admin@gmail.com', '$2y$10$rFmMNrtljcwljC0Axmn2muBmy4rFwrfKvgig7K2/njNYop3Y9DZ/e', '2023-10-23 08:25:58', '78-786293_1240-x-1240-0-avatar-profile-icon-png.png', 'admin', 'admin'),
(136, 'khamzatchimaev@gmail.com', '$2y$10$pBrRvyLiXPB3JSkL1IVD3u31MuBw9Di8eMglPv/dp6eNJnFOGVVUu', '2023-10-24 15:58:30', 'OIP (4).jfif', 'khamzat', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `voiture_id` int(11) NOT NULL,
  `marque` varchar(80) NOT NULL,
  `model` varchar(80) NOT NULL,
  `description` varchar(80) NOT NULL,
  `prix` int(80) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`voiture_id`, `marque`, `model`, `description`, `prix`, `statut`, `date`) VALUES
(31, 'Ciat', 'Ebiza', 'Etat Neuf', 100, 0, '2023-10-25'),
(32, 'Volswagen', 'polo Classic', 'une bonne état', 200, 0, '2023-10-25'),
(33, 'Chevrelet', 'Camaro', '180 HorsPower', 120, 0, '2023-10-25'),
(34, 'Peugeot', '301', 'Haja behya w ndhifa', 60, 0, '2023-10-25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `image_voiture`
--
ALTER TABLE `image_voiture`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `fk_voiture_id` (`voiture_id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personne_id` (`personne_id`),
  ADD KEY `location_ibfk_1` (`voiture_id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`voiture_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `image_voiture`
--
ALTER TABLE `image_voiture`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `voiture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `image_voiture`
--
ALTER TABLE `image_voiture`
  ADD CONSTRAINT `fk_voiture_id` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`voiture_id`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`voiture_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
