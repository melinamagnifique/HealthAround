-- phpMyAdmin SQL Dump
-- version 5.2.0

-- https://www.phpmyadmin.net/
-- Host: localhost
-- Generation Time: May 23, 2023 at 09:03 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--

-- Database: mydb
--

-- Table structure for table capteur_co2
CREATE TABLE capteur_co2 (
idcapteur_co2 int(11) NOT NULL,
seuil decimal(11,0) DEFAULT 1250,
valeur text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '65,59,80,56,55,40',
idutilisateur int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

-- Table structure for table capteur_ecg
CREATE TABLE capteur_ecg (
idcapteur_ecg int(11) NOT NULL,
seuil decimal(11,0) DEFAULT 130,
valeur text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '1,3,4,8,6,2,3',
idutilisateur int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

-- Table structure for table capteur_son
CREATE TABLE capteur_son (
idcapteur_son int(11) NOT NULL,
seuil decimal(11,0) DEFAULT 80,
valeur text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '30,100,50,22,66',
idutilisateur int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

-- Table structure for table capteur_temp
CREATE TABLE capteur_temp (
idcapteur_temp int(11) NOT NULL,
seuil decimal(11,0) DEFAULT 38,
valeur text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '25,26,25,24',
idutilisateur int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

-- Table structure for table Capteur
CREATE TABLE Capteur (
idCapteur int(11) NOT NULL,
type varchar(50) NOT NULL,
idPersonne int(11) NOT NULL,
idSeuil int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Communiquer
CREATE TABLE Communiquer (
idCommuniquer int(11) NOT NULL,
idAdministrateur int(11) NOT NULL,
idUtilisateur int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Date
CREATE TABLE Date (
idDate int(11) NOT NULL,
date date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Envoyer
CREATE TABLE Envoyer (
idEnvoyer int(11) NOT NULL,
idUtilisateur int(11) NOT NULL,
idAdministrateur int(11) NOT NULL,
idDate int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Mesure
CREATE TABLE Mesure (
idMesure int(11) NOT NULL,
valeur decimal(11,2) NOT NULL,
idCapteur int(11) NOT NULL,
idDate int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Personne
CREATE TABLE Personne (
idPersonne int(11) NOT NULL,
nom varchar(50) NOT NULL,
prenom varchar(50) NOT NULL,
entreprise text(50) NOT NULL,
adresse varchar(100) NOT NULL,
telephone varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Quest_rep
CREATE TABLE Quest_rep (
idQuest_rep int(11) NOT NULL,
question varchar(100) NOT NULL,
reponse varchar(100) NOT NULL,
idPersonne int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Recevoir
CREATE TABLE Recevoir (
idRecevoir int(11) NOT NULL,
idAdministrateur int(11) NOT NULL,
idUtilisateur int(11) NOT NULL,
idDate int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Table structure for table Seuil
CREATE TABLE Seuil (
idSeuil int(11) NOT NULL,
valeurMin decimal(11,2) NOT NULL,
valeurMax decimal(11,2) NOT NULL,
idCapteur int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- Indexes for dumped tables
--

-- Indexes for table capteur_co2
ALTER TABLE capteur_co2
ADD PRIMARY KEY (idcapteur_co2),
ADD KEY idutilisateur (idutilisateur);

--

-- Indexes for table capteur_ecg
ALTER TABLE capteur_ecg
ADD PRIMARY KEY (idcapteur_ecg),
ADD KEY idutilisateur (idutilisateur);

--

-- Indexes for table capteur_son
ALTER TABLE capteur_son
ADD PRIMARY KEY (idcapteur_son),
ADD KEY idutilisateur (idutilisateur);

--

-- Indexes for table capteur_temp
ALTER TABLE capteur_temp
ADD PRIMARY KEY (idcapteur_temp),
ADD KEY idutilisateur (idutilisateur);

--

-- Indexes for table Capteur
ALTER TABLE Capteur
ADD PRIMARY KEY (idCapteur),
ADD KEY idPersonne (idPersonne),
ADD KEY idSeuil (idSeuil);

--

-- Indexes for table Communiquer
ALTER TABLE Communiquer
ADD PRIMARY KEY (idCommuniquer),
ADD KEY idAdministrateur (idAdministrateur),
ADD KEY idUtilisateur (idUtilisateur);

--

-- Indexes for table Date
ALTER TABLE Date
ADD PRIMARY KEY (idDate);

--

-- Indexes for table Envoyer
ALTER TABLE Envoyer
ADD PRIMARY KEY (idEnvoyer),
ADD KEY idUtilisateur (idUtilisateur),
ADD KEY idAdministrateur (idAdministrateur),
ADD KEY idDate (idDate);

--

-- Indexes for table Mesure
ALTER TABLE Mesure
ADD PRIMARY KEY (idMesure),
ADD KEY idCapteur (idCapteur),
ADD KEY idDate (idDate);

--

-- Indexes for table Personne
ALTER TABLE Personne
ADD PRIMARY KEY (idPersonne);

--

-- Indexes for table Quest_rep
ALTER TABLE Quest_rep
ADD PRIMARY KEY (idQuest_rep),
ADD KEY idPersonne (idPersonne);

--

-- Indexes for table Recevoir
ALTER TABLE Recevoir
ADD PRIMARY KEY (idRecevoir),
ADD KEY idAdministrateur (idAdministrateur),
ADD KEY idUtilisateur (idUtilisateur),
ADD KEY idDate (idDate);

--

-- Indexes for table Seuil
ALTER TABLE Seuil
ADD PRIMARY KEY (idSeuil),
ADD KEY idCapteur (idCapteur);

--

-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table capteur_co2
ALTER TABLE capteur_co2
MODIFY idcapteur_co2 int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table capteur_ecg
ALTER TABLE capteur_ecg
MODIFY idcapteur_ecg int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table capteur_son
ALTER TABLE capteur_son
MODIFY idcapteur_son int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table capteur_temp
ALTER TABLE capteur_temp
MODIFY idcapteur_temp int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Capteur
ALTER TABLE Capteur
MODIFY idCapteur int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Communiquer
ALTER TABLE Communiquer
MODIFY idCommuniquer int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Date
ALTER TABLE Date
MODIFY idDate int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Envoyer
ALTER TABLE Envoyer
MODIFY idEnvoyer int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Mesure
ALTER TABLE Mesure
MODIFY idMesure int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Personne
ALTER TABLE Personne
MODIFY idPersonne int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Quest_rep
ALTER TABLE Quest_rep
MODIFY idQuest_rep int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Recevoir
ALTER TABLE Recevoir
MODIFY idRecevoir int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table Seuil
ALTER TABLE Seuil
MODIFY idSeuil int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;