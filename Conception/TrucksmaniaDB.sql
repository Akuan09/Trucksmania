-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 07 fév. 2023 à 20:38
-- Version du serveur : 8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `TrucksmaniaDB`
--

-- --------------------------------------------------------

--
-- Structure de la table `Commandes`
--

CREATE TABLE `Commandes` (
  `id_commande` int NOT NULL,
  `Contenu` text NOT NULL,
  `Date_commande` int UNSIGNED NOT NULL,
  `Type_paiement` varchar(16) NOT NULL,
  `Type_commande` varchar(16) NOT NULL,
  `Adresse` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Rapide` tinyint(1) NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_food_truck` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Evenements`
--

CREATE TABLE `Evenements` (
  `id_evenement` int NOT NULL,
  `Lieu` varchar(64) NOT NULL,
  `Date` date NOT NULL,
  `Duree` int NOT NULL,
  `Estimation_client` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Evenements`
--

INSERT INTO `Evenements` (`id_evenement`, `Lieu`, `Date`, `Duree`, `Estimation_client`, `id_user`) VALUES
(1, 'Place de la Comédie, Montpellier', '2023-02-20', 3, 600, 3),
(2, 'Laugh Tale (Nouveau Monde)', '2023-03-06', 7, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Food_trucks`
--

CREATE TABLE `Food_trucks` (
  `id_food_truck` int NOT NULL,
  `Nom` varchar(32) NOT NULL,
  `Carte` text NOT NULL,
  `Adresse` varchar(128) NOT NULL,
  `Horaires` varchar(255) NOT NULL,
  `id_gerant` int NOT NULL,
  `id_specialite` int NOT NULL,
  `id_ville` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Food_trucks`
--

INSERT INTO `Food_trucks` (`id_food_truck`, `Nom`, `Carte`, `Adresse`, `Horaires`, `id_gerant`, `id_specialite`, `id_ville`) VALUES
(12, 'Baratie', 'a:2:{s:4:\"Menu\";a:2:{s:5:\"Menu1\";s:5:\"20€\";s:5:\"Menu2\";s:5:\"33€\";}s:5:\"Plats\";a:2:{s:5:\"Plat1\";s:4:\"5€\";s:5:\"plat2\";s:4:\"9€\";}}', 'North Blue', 'a:7:{s:5:\"lundi\";s:7:\"08H-13H\";s:5:\"mardi\";s:6:\"fermé\";s:8:\"mercredi\";s:7:\"11H-22H\";s:5:\"jeudi\";s:9:\"08:00-13H\";s:8:\"vendredi\";s:7:\"11H-22H\";s:6:\"samedi\";s:6:\"fermé\";s:8:\"dimanche\";s:7:\"11H-22H\";}', 2, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Food_truck_evenements`
--

CREATE TABLE `Food_truck_evenements` (
  `id_food_truck_evenement` int NOT NULL,
  `id_food_truck` int NOT NULL,
  `id_evenement` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Food_truck_evenements`
--

INSERT INTO `Food_truck_evenements` (`id_food_truck_evenement`, `id_food_truck`, `id_evenement`) VALUES
(3, 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Gerants`
--

CREATE TABLE `Gerants` (
  `id_gerant` int NOT NULL,
  `Nom` varchar(32) NOT NULL,
  `Prenom` varchar(32) NOT NULL,
  `Tel` varchar(16) NOT NULL,
  `Mail` varchar(64) NOT NULL,
  `Adresse` varchar(128) NOT NULL,
  `Mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Gerants`
--

INSERT INTO `Gerants` (`id_gerant`, `Nom`, `Prenom`, `Tel`, `Mail`, `Adresse`, `Mdp`) VALUES
(2, 'Vinsmoke', 'Sanji', 'bilibili', 'pasdemail@yenapasdsop.com', 'Sunny', '$2y$10$JQiqG9No8jdveovmsAi33.QSJnx0a6CvUJY.7B0PvQ2wjbPqmSlVC');

-- --------------------------------------------------------

--
-- Structure de la table `Roles`
--

CREATE TABLE `Roles` (
  `id_role` int NOT NULL,
  `Nom` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Roles`
--

INSERT INTO `Roles` (`id_role`, `Nom`) VALUES
(1, 'Administrateur'),
(24, 'Clients'),
(25, 'Clients_Pro');

-- --------------------------------------------------------

--
-- Structure de la table `Specialites`
--

CREATE TABLE `Specialites` (
  `id_specialite` int NOT NULL,
  `Nom` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Specialites`
--

INSERT INTO `Specialites` (`id_specialite`, `Nom`) VALUES
(1, 'Américain'),
(2, 'Asiatique'),
(3, 'Burger'),
(4, 'Pizza'),
(5, 'Mexicain'),
(6, 'Hot-Dog'),
(7, 'Poke-Bowl'),
(8, 'Vegan'),
(9, 'Tacos');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id_user` int NOT NULL,
  `Nom` varchar(32) NOT NULL,
  `Prenom` varchar(32) NOT NULL,
  `Tel` varchar(16) NOT NULL,
  `Mail` varchar(64) NOT NULL,
  `Adresse` varchar(128) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id_user`, `Nom`, `Prenom`, `Tel`, `Mail`, `Adresse`, `Mdp`, `id_role`) VALUES
(3, 'Chavatte', 'Ryan', '0909090909', 'ryan.chavatte@gmail.com', 'lalalalala', '$2y$10$WhGr5wm1AcSZm/bVDIw2b.5aRsZ1TEX5/kGs5Dv.eCyrxMxkznFO2', 25),
(4, 'Lala', 'Lolo', '0909090909', 'll@g.com', 'lili lulu', '$2y$10$5iGpYRV.eJF43gK7kOiHRuGChx7yhafKPpb4S3pyMHd4rtP3SreNq', 1),
(5, 'Just', 'Visiteurs', '', '', '', '', 24);

-- --------------------------------------------------------

--
-- Structure de la table `Villes`
--

CREATE TABLE `Villes` (
  `id_ville` int NOT NULL,
  `Nom` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Villes`
--

INSERT INTO `Villes` (`id_ville`, `Nom`) VALUES
(1, 'Montpellier'),
(2, 'Nantes'),
(3, 'Paris'),
(4, 'Lille'),
(5, 'Toulouse'),
(6, 'Marseille');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `user_fk` (`id_user`),
  ADD KEY `food_truck_fk` (`id_food_truck`);

--
-- Index pour la table `Evenements`
--
ALTER TABLE `Evenements`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `id_user_fk` (`id_user`);

--
-- Index pour la table `Food_trucks`
--
ALTER TABLE `Food_trucks`
  ADD PRIMARY KEY (`id_food_truck`),
  ADD KEY `id_gerant_fk` (`id_gerant`),
  ADD KEY `id_specialite_fk` (`id_specialite`),
  ADD KEY `id_ville_fk` (`id_ville`);

--
-- Index pour la table `Food_truck_evenements`
--
ALTER TABLE `Food_truck_evenements`
  ADD PRIMARY KEY (`id_food_truck_evenement`),
  ADD KEY `id_food_truck_fk` (`id_food_truck`),
  ADD KEY `id_evenement_fk` (`id_evenement`);

--
-- Index pour la table `Gerants`
--
ALTER TABLE `Gerants`
  ADD PRIMARY KEY (`id_gerant`);

--
-- Index pour la table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `Specialites`
--
ALTER TABLE `Specialites`
  ADD PRIMARY KEY (`id_specialite`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_role_fk` (`id_role`);

--
-- Index pour la table `Villes`
--
ALTER TABLE `Villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Commandes`
--
ALTER TABLE `Commandes`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Evenements`
--
ALTER TABLE `Evenements`
  MODIFY `id_evenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Food_trucks`
--
ALTER TABLE `Food_trucks`
  MODIFY `id_food_truck` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `Food_truck_evenements`
--
ALTER TABLE `Food_truck_evenements`
  MODIFY `id_food_truck_evenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Gerants`
--
ALTER TABLE `Gerants`
  MODIFY `id_gerant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `Specialites`
--
ALTER TABLE `Specialites`
  MODIFY `id_specialite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Villes`
--
ALTER TABLE `Villes`
  MODIFY `id_ville` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `food_truck_fk` FOREIGN KEY (`id_food_truck`) REFERENCES `Food_trucks` (`id_food_truck`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`);

--
-- Contraintes pour la table `Evenements`
--
ALTER TABLE `Evenements`
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Food_trucks`
--
ALTER TABLE `Food_trucks`
  ADD CONSTRAINT `id_gerant_fk` FOREIGN KEY (`id_gerant`) REFERENCES `Gerants` (`id_gerant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_specialite_fk` FOREIGN KEY (`id_specialite`) REFERENCES `Specialites` (`id_specialite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_ville_fk` FOREIGN KEY (`id_ville`) REFERENCES `Villes` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Food_truck_evenements`
--
ALTER TABLE `Food_truck_evenements`
  ADD CONSTRAINT `id_evenement_fk` FOREIGN KEY (`id_evenement`) REFERENCES `Evenements` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_food_truck_fk` FOREIGN KEY (`id_food_truck`) REFERENCES `Food_trucks` (`id_food_truck`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`id_role`) REFERENCES `Roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
