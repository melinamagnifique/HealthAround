<!DOCTYPE html>
<html lang="fr">
<html style="font-size: 16px;">
<head>
    <title>Infos des capteurs en temps réel</title>
    <link rel="stylesheet" href="../css/styleG10A.css" media="screen">
    <link rel="stylesheet" href="../css/Accueil.css" media="screen">
    <script class="u-script" type="text/javascript" src="../js/jG10A.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/j2G10A.js" defer=""></script>
    <script src="../js/supprimer.js"></script>
</head>

<style>
.admin-section {
    background-color: #00A6FF;
    color: white;
}
.title-capteurs{
    color : #00A6FF;
}
.notification {
  background-color: red;
  color: white;
  border-radius: 50%;
  padding: 2px 6px;
  font-size: 12px;
  position: absolute;
  top: -5px;
  right: -5px;
}
</style>

<body class="u-body u-xl-mode">
    <header class="u-clearfix u-header u-header" id="sec-54cb">
        <div class="u-clearfix u-sheet u-sheet-1">
            <a class="u-image u-logo u-image-1" data-image-width="858" data-image-height="302">
                <img src="../images/LogoHAv1.png" class="u-logo-image u-logo-image-1">
            </a>
            <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-position="Nos services">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#g10a"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="g10a" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="../php/accueil_utilisateur.php" style="padding: 10px 20px;">Accuei Client</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="../php/profil.php" style="padding: 10px 20px;">Profil</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="../php/seuil_utilisateur.php" style="padding: 10px 20px;">Seuils</a>
            </li>
            <li class="u-nav-item">
              <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><a class="u-button-style u-nav-link u-white" href="../php/messagerie_utilisateur.php">Messagerie<span class="notification">1</span></a></li>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link" href="../php/deconnexion.php">Deconnexion</a>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </nav>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/Notification.js"></script>
    
    <center>  
    <div><br></div>
    <?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G10A");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data, 33);
?>

<?php
echo "<table>";
echo "<tr><th>Type trame</th><th>Groupe</th><th>Requete</th><th>Capteur</th><th>Numero Capteur</th><th>Mot de passe</th><th>Valeur</th><th>XX</th><th>Date</th><th>Time</th></tr>";
for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
    $trame = $data_tab[$i];
    if (strlen($trame) >= 33) {
        $T = $trame[0];
        $OOOO = substr($trame, 1, 4);
        $R = $trame[5];
        $C = $trame[6];
        $NN = substr($trame, 7, 2);
        $VVVV = substr($trame, 9, 4);
        $AAAA = substr($trame, 13, 4);
        $XX = substr($trame, 17, 2);
        $date = substr($trame, 19, 8);
        $time = substr($trame, 27, 6);

        // Formater la date et l'heure pour une meilleure lisibilité
        $formattedDate = substr($date, 6, 2) . "/" . substr($date, 4, 2) . "/" . substr($date, 0, 4);
        $formattedTime = substr($time, 0, 2) . ":" . substr($time, 2, 2) . ":" . substr($time, 4, 2);

        echo "<tr>";
        echo "<td>$T</td><td>$OOOO</td><td>$R</td><td>$C</td><td>$NN</td><td>$VVVV</td><td>$AAAA</td><td>$XX</td><td>$formattedDate</td><td>$formattedTime</td>";
        echo "</tr>";
    }
}
echo "</table>";
?>

<style>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}

th {
  background-color: #f2f2f2;
  color: #333;
}
</style>
<div><br></div>
<?php
// Step 1: Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healtharound";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve the latest measurements
$sql = "SELECT * FROM Mesure ORDER BY idMesure DESC LIMIT 10"; // Adjust the query as per your requirements

$result = $conn->query($sql);

// Step 3: Display the measurements on a web page
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Measurement ID</th><th>Value</th><th>Sensor ID</th><th>Date</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['idMesure'] . "</td>";
        echo "<td>" . $row['valeur'] . "</td>";
        echo "<td>" . $row['idCapteur'] . "</td>";
        echo "<td>" . $row['idDate'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No measurements found.";
}

// Step 4: Close the database connection
$conn->close();
?>

<div><br></div>
<button onclick="allumerLED()">Allumer la LED</button>
<script>
  function allumerLED() {
    // Code pour allumer la LED
    // Insérez votre logique ici pour allumer la LED
    // Vous pouvez utiliser des appels AJAX ou d'autres méthodes pour communiquer avec la LED
    alert("LED allumée !");
}
</scipt>

    </center>

    <?php
    // Code PHP pour récupérer les données des capteurs et les afficher ici
    ?>
</body>

<footer class="u-clearfix u-footer u-white" id="sec-7ece"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-30 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-align-center-sm u-align-center-xs u-align-left-md u-align-left-xl u-container-style u-layout-cell u-left-cell u-size-20 u-size-20-md u-layout-cell-1">
                <div class="u-container-layout u-valign-middle u-container-layout-1">
                  <div data-position="" class="u-position">
                    <div class="u-block">
                      <div class="u-block-container u-clearfix">
                        <h5 class="u-block-header u-text"><b>©&nbsp;</b>Health - Around
                        </h5>
                        <div class="u-block-content u-text">Pour plus d'informations sur le site et vos données, consultez les CGU ; CG &amp; mentions légales.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-align-center-sm u-align-right-md u-container-style u-layout-cell u-size-20 u-size-20-md u-white u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <img class="u-image u-image-default u-preserve-proportions u-image-1" src="../images/Captimfonddure.PNG" alt="" data-image-width="225" data-image-height="65">
                </div>
              </div>
              <div class="u-align-center-sm u-align-center-xs u-align-left-md u-align-right-lg u-align-right-xl u-container-style u-layout-cell u-right-cell u-size-20 u-size-20-md u-layout-cell-3">
                <div class="u-container-layout u-valign-middle u-container-layout-3">
                  <div class="u-social-icons u-spacing-10 u-social-icons-1">
                    <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-434a"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-434a"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
                    </a>
                    <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-icon u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-93a4"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-93a4"><circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
            c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
            c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
            c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
            c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>
                    </a>
                    <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0dd1"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-0dd1"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
                    </a>
                    <a class="u-social-url" target="_blank" data-type="Email" title="Email" href=""><span class="u-icon u-social-email u-social-icon u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-eafe"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-eafe"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path id="path3864" fill="#FFFFFF" d="M27.2,28h57.6c4,0,7.2,3.2,7.2,7.2l0,0v42.7c0,3.9-3.2,7.2-7.2,7.2l0,0H27.2
	c-4,0-7.2-3.2-7.2-7.2V35.2C20,31.1,23.2,28,27.2,28 M56,52.9l28.8-17.8H27.2L56,52.9 M27.2,77.7h57.6V43.5L56,61.3L27.2,43.5V77.7z
	"></path></svg></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div></footer>
</html>
