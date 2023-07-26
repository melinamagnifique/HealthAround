<?php
session_start();

// 1. Établir une connexion à la base de données (exemple avec MySQLi)
$mysqli = new mysqli("localhost", "root", "", "healtharound");

if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

// 2. Vérifier si l'utilisateur est connecté
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    // 3. Vérifier si l'identifiant de l'utilisateur est passé en paramètre
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];

        // 4. Exécuter la requête pour supprimer l'utilisateur de la base de données
        $stmt = $mysqli->prepare("DELETE FROM personne WHERE idPersonne = ?");
        $stmt->bind_param("i", $nom);
        if ($stmt->execute()) {
            echo "Utilisateur supprimé avec succès.";
            header("Location: ../php/adminPage.php");
            exit;

        } else {
            echo "Une erreur s'est produite lors de la suppression de l'utilisateur.";
        }
        $stmt->close();
    } else {
        echo "Identifiant de l'utilisateur manquant.";
    }
} else {
    echo "Veuillez vous connecter à votre compte.";
}

$mysqli->close(); // Fermer la connexion à la base de données
?>