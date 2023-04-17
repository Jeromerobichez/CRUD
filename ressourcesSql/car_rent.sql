-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 avr. 2023 à 16:32
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `car_rent`
--

-- --------------------------------------------------------

--
-- Structure de la table `car_model`
--

CREATE TABLE `car_model` (
  `id` int(11) NOT NULL,
  `model` enum('California','Marco-Polo','Handroad') DEFAULT NULL,
  `pax` int(11) DEFAULT NULL,
  `tank` int(11) DEFAULT 60,
  `tires` varchar(60) DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `image` varchar(16000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `car_model`
--

INSERT INTO `car_model` (`id`, `model`, `pax`, `tank`, `tires`, `slug`, `image`) VALUES
(1, 'California', 4, 70, '235/65R16', 'california', 'https://www.fourgonlesite.com/wp-content/uploads/2017/11/California_07.jpg'),
(2, 'Marco-Polo', 4, 80, '255/75R17', 'marco-polo', 'https://cdn.drivek.com/configurator-imgs/trucks/fr/768/MERCEDES/MARCO-POLO/7968_FOURGONETTE-DE-CAMPING-4-PORTES/mercedes-benz-marco-polo-2019-front-side.jpg'),
(3, 'Handroad', 5, 60, '225/55R16', 'handroad', 'https://www.largus.fr/images/images/van-hanroad-trek-5plus-xl.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `email`, `phone`, `company_id`) VALUES
(1, 'johnny', 'bibop', 'b@b.com', '1234', NULL),
(2, 'helene', 'lefranc', 'c@b.com', '1235', NULL),
(3, 'francis', 'leblanc', 'd@b.com', '1236', NULL),
(4, 'luc', 'anderson', 'e@b.com', '1237', NULL),
(5, 'paul', 'johnson', 'f@b.com', '1238', NULL),
(6, 'pauline', 'millgram', 'g@b.com', '1239', NULL),
(7, 'adriana', 'kokova', 'h@b.com', '12310', NULL),
(8, 'quentin', 'demontargis', 'i@b.com', '12311', NULL),
(9, 'mireille', 'mathieu', 'j@b.com', '12312', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `vat_num` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `id` int(11) NOT NULL,
  `date_presta` date DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id`, `date_presta`, `client_id`, `total_price`) VALUES
(1, '2022-12-13', 1, 200),
(3, '2022-12-15', 2, 400),
(4, '2022-12-16', 3, 500),
(5, '2022-12-17', 4, 600),
(6, '2022-12-13', 6, 200),
(8, '2022-12-15', 7, 400);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `km` int(11) DEFAULT NULL,
  `presta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `start_date`, `end_date`, `vehicle_id`, `price`, `km`, `presta_id`) VALUES
(46, '2023-03-15', '2023-03-25', 1, 300, 150, 1),
(47, '2023-03-18', '2023-04-02', 1, 350, 250, 1),
(48, '2023-03-02', '2023-03-09', 1, 400, 450, 3),
(49, '2023-02-15', '2023-02-25', 2, 200, 350, 3),
(50, '2023-02-25', '2023-03-02', 3, 400, 150, 4),
(51, '2023-03-15', '2023-03-25', 4, 300, 150, 5),
(52, '2023-03-10', '2023-03-20', 5, 300, 150, 6),
(53, '2023-04-15', '2023-04-20', 1, 280, 550, 6),
(54, '2023-02-15', '2023-02-20', 9, 300, 650, 8);

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `color` enum('bleu','rouge','jaune','vert','gris','noir') DEFAULT NULL,
  `km` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `model`, `color`, `km`) VALUES
(1, 1, 'bleu', 30853),
(2, 1, 'rouge', 30332),
(3, 1, 'vert', 3050),
(4, 1, 'jaune', 30),
(5, 1, 'vert', 3034),
(6, 2, 'gris', 3012),
(7, 2, 'gris', 30),
(8, 2, 'gris', 30),
(9, 3, 'rouge', 30),
(11, 3, 'bleu', 12533),
(12, 2, 'rouge', 350),
(13, 2, 'jaune', 234),
(14, 1, 'gris', 500),
(17, 2, 'jaune', 3400),
(18, 1, 'rouge', 546),
(19, 2, 'jaune', 456),
(21, 3, 'noir', 45),
(22, 3, 'gris', 13000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_presta_client` (`client_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presta_id` (`presta_id`);

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `model` (`model`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `fk_presta_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`presta_id`) REFERENCES `prestation` (`id`);

--
-- Contraintes pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`model`) REFERENCES `car_model` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
