<?php
// Récupérer les valeurs du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

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

        if (password_verify($password, $hashedPassword)) {
            echo "true"; // Le mot de passe actuel est correct
        } else {
            echo "false"; // Le mot de passe actuel est incorrect
        }
    } else {
        echo "false"; // Utilisateur non trouvé
    }
} catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
    exit;
}
?>
