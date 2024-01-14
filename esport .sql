-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 jan. 2024 à 21:22
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
-- Base de données : `esport`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `Code_Raccourci` varchar(30) NOT NULL,
  `Nom_Cat` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`Code_Raccourci`, `Nom_Cat`, `id`) VALUES
('M30', 'FOOTBALL', 1),
('M50', 'Foot', 2),
('M40', 'GEANTTT', 3),
('M170', 'cadre', 4),
('M2', 'cadrage', 5),
('M41', 'generale', 6),
('M6', 'CategorieB2', 8),
('M67', 'senior ', 9),
('M78', 'developpeur', 10),
('M9', 'TATA', 11),
('M90', 'general', 12),
('M94', 'CatB3', 13),
('essaii', '15', 15),
('M45', 'developpeurback', 16),
('M73', 'danse classique', 18),
('M109', 'le hookey', 19),
('M13', 'le volley', 20);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` varchar(50) NOT NULL,
  `Nom_Contact` varchar(30) NOT NULL,
  `Prenom_Contact` varchar(30) NOT NULL,
  `Email_Contact` varchar(30) NOT NULL,
  `Numero_Contact` int(30) NOT NULL,
  `id_licencie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `Nom_Contact`, `Prenom_Contact`, `Email_Contact`, `Numero_Contact`, `id_licencie`) VALUES
('6', 'ATTI', 'Cynthia Désirée', 'synticheattoh08@gmail.com', 798632618, 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `educateurs`
--

CREATE TABLE `educateurs` (
  `Email_Educateur` varchar(30) NOT NULL,
  `Mdp_Educateur` varchar(50) NOT NULL,
  `Administrateur` tinyint(1) NOT NULL,
  `id_licencie` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `educateurs`
--

INSERT INTO `educateurs` (`Email_Educateur`, `Mdp_Educateur`, `Administrateur`, `id_licencie`, `id`) VALUES
('stellanyarko01@gmail.com', '5679', 1, 1, 1),
('synticheattoh03@gmail.com', '4560', 1, 2, 2),
('synticheattoh0451040@gmail.com', '1234', 1, 3, 3),
('synticheattoh404@gmail.com', '1237', 1, 3, 4),
('synticheattoh07@gmail.com', '4565', 1, 1, 5),
('stella35.arputharaj@gmail.com', '4568', 1, 1, 14),
('synticheattoh01@gmail.com', '1234', 1, 2, 15),
('joanaattoh02@gmail.com', '6d0d044490b52817cf2ff197205bf0c549d6279c', 1, 1, 17),
('tychou@gmail.com', 'lkzxnizo', 1, 1, 45);

-- --------------------------------------------------------

--
-- Structure de la table `licencies`
--

CREATE TABLE `licencies` (
  `Nom_Licencie` varchar(30) NOT NULL,
  `Prenom_Licencie` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `licencies`
--

INSERT INTO `licencies` (`Nom_Licencie`, `Prenom_Licencie`, `id`, `id_cat`) VALUES
('DIARRA', 'YASMINE', 1, 1),
('ATTITO', 'YANNE ACHOPIE JOANA', 2, 2),
('NYARKO', 'MARIE-STELLA', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `mail_contact`
--

CREATE TABLE `mail_contact` (
  `id` int(11) NOT NULL,
  `date_envoi` datetime NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `expediteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mail_contact`
--

INSERT INTO `mail_contact` (`id`, `date_envoi`, `objet`, `message`, `expediteur_id`) VALUES
(1, '2024-01-14 21:18:31', 'Salutation', 'bonjour je m\'appelle Noah', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mail_educateur`
--

CREATE TABLE `mail_educateur` (
  `id` int(11) NOT NULL,
  `date_envoi` datetime NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `expediteur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_educateur`
--

INSERT INTO `mail_educateur` (`id`, `date_envoi`, `objet`, `message`, `expediteur_id`) VALUES
(1, '2024-01-14 21:19:51', 'Invitation', 'Bonjour monsieur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mail_educateur_contact`
--

CREATE TABLE `mail_educateur_contact` (
  `mail_contact_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mail_educateur_contact`
--

INSERT INTO `mail_educateur_contact` (`mail_contact_id`, `contact_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mail_educateur_educateur`
--

CREATE TABLE `mail_educateur_educateur` (
  `mail_educateur_id` int(11) NOT NULL,
  `educateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_educateur_educateur`
--

INSERT INTO `mail_educateur_educateur` (`mail_educateur_id`, `educateur_id`) VALUES
(1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Code_Raccourci` (`Code_Raccourci`),
  ADD UNIQUE KEY `Code_Raccourci_2` (`Code_Raccourci`),
  ADD UNIQUE KEY `Code_Raccourci_3` (`Code_Raccourci`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Contact_Licencie` (`id_licencie`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `educateurs`
--
ALTER TABLE `educateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_Educateur` (`Email_Educateur`),
  ADD KEY `fk_Educateur_Licencie` (`id_licencie`);

--
-- Index pour la table `licencies`
--
ALTER TABLE `licencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Licencie_Categories` (`id_cat`);

--
-- Index pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mail_educateur`
--
ALTER TABLE `mail_educateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mail_educateur_contact`
--
ALTER TABLE `mail_educateur_contact`
  ADD PRIMARY KEY (`mail_contact_id`,`contact_id`),
  ADD KEY `IDX_88C261A3EAFF4E56` (`mail_contact_id`),
  ADD KEY `IDX_88C261A3E5771AD6` (`contact_id`);

--
-- Index pour la table `mail_educateur_educateur`
--
ALTER TABLE `mail_educateur_educateur`
  ADD PRIMARY KEY (`mail_educateur_id`,`educateur_id`),
  ADD KEY `IDX_88C261A3EAFF4E56` (`mail_educateur_id`),
  ADD KEY `IDX_88C261A3E5771AD6` (`educateur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `educateurs`
--
ALTER TABLE `educateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `licencies`
--
ALTER TABLE `licencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mail_educateur`
--
ALTER TABLE `mail_educateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_Contact_Licencie` FOREIGN KEY (`id_licencie`) REFERENCES `licencies` (`id`);

--
-- Contraintes pour la table `educateurs`
--
ALTER TABLE `educateurs`
  ADD CONSTRAINT `fk_Educateur_Licencie` FOREIGN KEY (`id_licencie`) REFERENCES `licencies` (`id`);

--
-- Contraintes pour la table `licencies`
--
ALTER TABLE `licencies`
  ADD CONSTRAINT `fk_Licencie_Categories` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
