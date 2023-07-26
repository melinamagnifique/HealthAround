<!DOCTYPE html>
<html>

<?php
$dbname = "healtharound";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

$capteur = $_POST["capteur"];
$valeur = $_POST["valeur"];

if (isset($_POST["formsend"])) {
    try {
        $stmt = $pdo->prepare("INSERT INTO seuil (capteur, valeur) VALUES (:capteur, :valeur)");
        $stmt->bindParam(':capteur', $capteur);
        $stmt->bindParam(':valeur', $valeur);
        $stmt->execute();
        echo "Données enregistrées avec succès.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seuils</title>
    <link rel="stylesheet" href="../css/styleG10A.css" media="screen">
    <link rel="stylesheet" href="../css/Accueil.css" media="screen">
    <script class="u-script" type="text/javascript" src="../js/jG10A.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/j2G10A.js" defer=""></script>
    <script src="../js/supprimer.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .admin-section {
            background-color: #00A6FF;
            color: white;
        }
    </style>
</head>

<body class="u-body u-xl-mode">
<header class="u-clearfix u-header u-header" id="sec-54cb">
    <div class="u-clearfix u-sheet u-sheet-1">
      <a class="u-image u-logo u-image-1" data-image-width="858" data-image-height="302">
        <img src="../images/LogoHAv1.png" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-position="Nos services">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#g10a"></use></svg>
            <svg class="u-svg-content" version="1.1" id="g10a" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
          </g></svg> 
          </a>
        </div>
        <li class="u-nav-item">
          <a class="u-button-style u-nav-link" href="../php/adminPage.php" style="padding: 10px 20px;">Page admin</a>
        </li>
        <li class="u-nav-item">
          <a class="u-button-style u-nav-link" href="../php/deconnexion.php">Deconnexion</a>
        </li>
        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
      </div>
    </nav>
  </header>

    <section class="u-clearfix u-section-2" id="sec-2e5f">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-border-1 u-border-grey-dark-1 u-container-style u-group u-radius-30 u-shape-round u-white u-group-1">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                    <h2 class="u-text u-text-default u-text-1">Seuils</h2>
                    <form class="u-align-left u-form u-form-1" method="POST" action="">
                        <div class="u-form-group u-form-name">
                            <label for="capteur" class="u-label">Capteur :</label>
                            <input type="text" placeholder="Entrer le capteur" id="capteur" name="capteur" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                        </div>
                        <div class="u-form-group u-form-name">
                            <label for="valeur" class="u-label">Valeur :</label>
                            <input type="text" placeholder="Entrer la valeur" id="valeur" name="valeur" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                        </div>
                        <button type="submit" name="formsend" class="u-border-2 u-border-white u-btn u-btn-rectangle u-btn-submit u-button-style u-custom-color-1 u-custom-color-2-hover u-custom-radius-22 u-custom-text-color u-custom-text-hover-color u-hover-white u-none u-text-active-white u-text-hover-black">Valider</button>
                    </form>

                    <?php if (isset($_POST["formsend"])) : ?>
                        <div class="admin-section">
                            <table>
                                <tr>
                                    <th>Capteur</th>
                                    <th>Valeur</th>
                                </tr>
                                <tr>
                                    <td><?php echo $capteur; ?></td>
                                    <td><?php echo $valeur; ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
