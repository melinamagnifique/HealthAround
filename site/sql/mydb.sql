-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 mai 2023 à 09:31
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
-- Base de données : `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur_co2`
--

CREATE TABLE `capteur_co2` (
  `idcapteur_co2` int(11) NOT NULL,
  `seuil` decimal(11,0) DEFAULT 1250,
  `valeur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '65,59,80,56,55,40',
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteur_co2`
--

INSERT INTO `capteur_co2` (`idcapteur_co2`, `seuil`, `valeur`, `idutilisateur`) VALUES
(1, '1250', '65,59,80,56,55,40', 1);

-- --------------------------------------------------------

--
-- Structure de la table `capteur_ecg`
--

CREATE TABLE `capteur_ecg` (
  `idcapteur_ecg` int(11) NOT NULL,
  `seuil` decimal(11,0) DEFAULT 130,
  `valeur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '1,3,4,8,6,2,3',
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteur_ecg`
--

INSERT INTO `capteur_ecg` (`idcapteur_ecg`, `seuil`, `valeur`, `idutilisateur`) VALUES
(1, '130', '1,3,4,8,6,2,3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `capteur_son`
--

CREATE TABLE `capteur_son` (
  `idcapteur_son` int(11) NOT NULL,
  `seuil` decimal(11,0) DEFAULT 80,
  `valeur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '30,100,50,22,66',
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteur_son`
--

INSERT INTO `capteur_son` (`idcapteur_son`, `seuil`, `valeur`, `idutilisateur`) VALUES
(1, '80', '30,100,50,22,66', 1);

-- --------------------------------------------------------

--
-- Structure de la table `capteur_temp`
--

CREATE TABLE `capteur_temp` (
  `idcapteur_temp` int(11) NOT NULL,
  `seuil` decimal(11,0) DEFAULT 38,
  `valeur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '25,26,25,24',
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteur_temp`
--

INSERT INTO `capteur_temp` (`idcapteur_temp`, `seuil`, `valeur`, `idutilisateur`) VALUES
(1, '38', '25,26,25,24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) NOT NULL,
  `Sexe` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `mdp` varchar(300) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `Sexe`, `mail`, `Age`, `mdp`, `telephone`, `date`) VALUES
(1, 'Hulot', 'Robin', NULL, 'hlt.robin@gmail.com', NULL, '$2y$10$lJJGbLDYG1.Cc6arN4HUWOuJS0FcSuMJ5PuT9vLPJZZ3ENnCFqcAy', NULL, '2023-05-13 18:09:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteur_co2`
--
ALTER TABLE `capteur_co2`
  ADD PRIMARY KEY (`idcapteur_co2`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `capteur_ecg`
--
ALTER TABLE `capteur_ecg`
  ADD PRIMARY KEY (`idcapteur_ecg`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `capteur_son`
--
ALTER TABLE `capteur_son`
  ADD PRIMARY KEY (`idcapteur_son`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `capteur_temp`
--
ALTER TABLE `capteur_temp`
  ADD PRIMARY KEY (`idcapteur_temp`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteur_co2`
--
ALTER TABLE `capteur_co2`
  MODIFY `idcapteur_co2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `capteur_ecg`
--
ALTER TABLE `capteur_ecg`
  MODIFY `idcapteur_ecg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `capteur_son`
--
ALTER TABLE `capteur_son`
  MODIFY `idcapteur_son` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `capteur_temp`
--
ALTER TABLE `capteur_temp`
  MODIFY `idcapteur_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `capteur_co2`
--
ALTER TABLE `capteur_co2`
  ADD CONSTRAINT `capteur_co2_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `capteur_ecg`
--
ALTER TABLE `capteur_ecg`
  ADD CONSTRAINT `capteur_ecg_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `capteur_son`
--
ALTER TABLE `capteur_son`
  ADD CONSTRAINT `capteur_son_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `capteur_temp`
--
ALTER TABLE `capteur_temp`
  ADD CONSTRAINT `capteur_temp_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
