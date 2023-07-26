<?php
// Récupérer les valeurs du formulaire
$email = $_POST['email'];
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];

// Connexion à la base de données (remplacez les valeurs par celles de votre configuration)
$dbname = "healtharound";
$user = "root";
$pass = "";

try {
    $dbco = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer le mot de passe haché pour l'utilisateur donné
    $sth = $dbco->prepare("SELECT password FROM Personne WHERE email=:email");
    $sth->bindParam(':email', $email);
    $sth->execute();

    if ($sth->rowCount() == 1) {
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $row['password'];

        if (password_verify($currentPassword, $hashedPassword)) {
            // Le mot de passe actuel est correct
            // Générer le nouveau mot de passe haché
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Mettre à jour le mot de passe dans la base de données
            $updateStm = $dbco->prepare("UPDATE Personne SET password=:newPassword WHERE email=:email");
            $updateStm->bindParam(':newPassword', $hashedNewPassword);
            $updateStm->bindParam(':email', $email);
            $updateStm->execute();

            echo "Mot de passe mis à jour avec succès.";
            sleep(3);
            header("Location: ../php/success_message.php");
            exit;
           
        } else {
            echo "Mot de passe actuel incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
} catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
    exit;
}
?>
