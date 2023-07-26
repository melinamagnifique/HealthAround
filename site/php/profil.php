<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<html style="font-size: 16px;">
<head>
    <title>Page de profil utilisateur</title>
    <link rel="stylesheet" href="../css/styleG10A.css" media="screen">
    <link rel="stylesheet" href="../css/Accueil.css" media="screen">
    <script class="u-script" type="text/javascript" src="../js/jG10A.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/j2G10A.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/pop-ups.js" defer=""></script>
</head>
<style>
.email-info {
  position: relative;
  display: inline-block;
  ursor: pointer;
}
.email-info .tooltip {
  visibility: hidden;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 0;
  width: 200px;
  background-color: #555;
  color: #fff;
  text-align: center;
  padding: 5px;
  border-radius: 5px;
  opacity: 0;
  transition: opacity 0.3s;
}
.email-info:hover .tooltip {
  visibility: visible;
  opacity: 1;
}
#password-strength {
  display: none;
}
.weak {
  color: red;
}
.medium {
  color: orange;
}
.strong {
  color: green;
}
.password-info {
  position: relative;
  display: inline-block;
  ursor: pointer;
}
.password-info .tooltip {
  visibility: hidden;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 0;
  width: 200px;
  background-color: #555;
  color: #fff;
  text-align: center;
  padding: 5px;
  border-radius: 5px;
  opacity: 0;
  transition: opacity 0.3s;
}

.password-info:hover .tooltip {
  visibility: visible;
  opacity: 1;
}

.entreprise-info:hover .tooltip {
  visibility: visible;
  opacity: 1;
}

.entreprise-info {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.entreprise-info .tooltip {
  visibility: hidden;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 0;
  width: 200px;
  background-color: #555;
  color: #fff;
  text-align: center;
  padding: 5px;
  border-radius: 5px;
  opacity: 0;
  transition: opacity 0.3s;
}
.admin-section {
    background-color: #00A6FF;
    color: white;
}

.highlight {
    color: #4087FC;
}

.profile-container {
    border: 5px  solid #00A6FF;
    padding: 40px; /* Augmenter la valeur du padding pour agrandir le cadre */
    width: 600px; /* Augmenter la valeur de la largeur pour agrandir le cadre */
    margin: 0 auto;
}

.inputbox {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.inputbox ion-icon {
    margin-right: 10px;
}

.inputbox label {
    flex: 0 0 150px;
}
.inputbox input[type="text"],
.inputbox input[type="prenom"],
.inputbox input[type="nom"],
.inputbox input[type="password"],
.inputbox input[type="email"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #00A6FF;
    border-radius: 4px;
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
.profile-container {
    border: 5px solid #00A6FF;
    padding: 40px; /* Augmenter la valeur du padding pour agrandir le cadre */
    width: 600px; /* Augmenter la valeur de la largeur pour agrandir le cadre */
    margin: 0 auto;
    text-align: center;
}
</style>
    <script> 
        function checkPassword() {
            // Vérifier si le mot de passe actuel est correct
            var currentPassword = document.getElementById("currentPassword").value;

            // Effectuer une requête AJAX vers le fichier check_password.php
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === "true") {
                            // Le mot de passe actuel est correct
                            // Activer les champs de modification du mot de passe
                            document.getElementById("newPassword").disabled = false;
                            document.getElementById("confirmPassword").disabled = false;
                            document.getElementById("submitBtn").disabled = false;
                            document.getElementById("passwordError").style.display = "none";
                        } else {
                            // Le mot de passe actuel est incorrect
                            // Afficher un message d'erreur
                            document.getElementById("passwordError").style.display = "block";
                            // Réinitialiser les champs de modification du mot de passe
                            document.getElementById("newPassword").value = "";
                            document.getElementById("confirmPassword").value = "";
                            document.getElementById("newPassword").disabled = true;
                            document.getElementById("confirmPassword").disabled = true;
                            document.getElementById("submitBtn").disabled = true;
                        }
                    } else {
                        // Erreur lors de la requête AJAX
                        console.error("Erreur lors de la requête AJAX.");
                    }
                }
            };
            xhr.open("POST", "../php/check_password.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("email=<?php echo $_SESSION['email']; ?>&password=" + encodeURIComponent(currentPassword));
        }
    </script>
</head>
<body class="u-body u-xl-mode">
<header class="u-clearfix u-header u-header" id="sec-54cb"><div class="u-clearfix u-sheet u-sheet-1">
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
                <a class="u-button-style u-nav-link" href="../php/accueil_utilisateur.php" style="padding: 10px 20px;">Accuei Client</a>
            </li>
            <li class="u-nav-item">
                <a class="u-button-style u-nav-link" href="../php/profil.php" style="padding: 10px 20px;">Profil</a>
            </li>
          <li class="u-nav-item">
                <a class="u-button-style u-nav-link" href="../php/seuil_utilisateur.php" style="padding: 10px 20px;">Seuils</a>
            </li>
            </li><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/messagerie_utilisateur.php">Messagerie<span class="notification">1</span></a></li>
            <li class="u-nav-item">
            <li class="u-nav-item">
                <a class="u-button-style u-nav-link" href="../php/deconnexion.php">Deconnexion</a>

            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
      <center>
        <div class="admin-section">
            <h1>Bienvenue sur votre profil !</h1>
            <h3>Modifiez vos informations si besoin</h3>
    </center>
    <div class="profile-container">
    <form method="post" action="../php/save_profile.php">
        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" readonly><br><br>

        <label for="currentPassword">Mot de passe actuel:</label>
        <input type="password" id="currentPassword" name="currentPassword" required><br><br>

        <div id="passwordError" style="display:none; color:red;">Mot de passe incorrect.</div><br>

        <div class="inputbox">
        <label for="newPassword">Nouveau mot de passe:</label>
        <input type="password" id="newPassword" name="newPassword" disabled><br><br>
        <input type="hidden" name="token" id="token">
        <div class="password-info">
            <ion-icon name="information-circle-outline"></ion-icon>
            <span class="tooltip">Le mot de passe doit comporter au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial.</span>
        </div>
        <div id="password-strength">
            <p id="password-strength-text"></p>
        </div>
        </div>

        <div class="inputbox">
        <ion-icon name="lock-closed-outline"></ion-icon>
        <label for="confirmPassword">Confirmer le nouveau mot de passe:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" disabled><br><br>
        <input type="hidden" name="token" id="token">
        <div class="password-info">
            <ion-icon name="information-circle-outline"></ion-icon>
            <span class="tooltip">Le mot de passe doit comporter au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial.</span>
        </div>
        <div id="password-strength">
            <p id="password-strength-text"></p>
        </div>
        </div>
<div class="register-account">
        <input type="button" value="Vérifier le mot de passe" onclick="checkPassword()" class = "u-active-black u-border-none u-btn u-btn-round u-btn-submit u-button-style u-gradient u-hover-black u-none u-radius-50 u-btn-1">
        <input type="submit" value="Enregistrer les modifications" id="submitBtn" disabled class = "u-active-black u-border-none u-btn u-btn-round u-btn-submit u-button-style u-gradient u-hover-black u-none u-radius-50 u-btn-1">
    </form>
    </div>
    </div>
<script src ="../js/infos.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php
    // Pré-remplir l'adresse e-mail dans la boîte de messagerie du profil
    echo "<script>document.getElementById('email').value = '{$_SESSION['email']}';</script>";
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