<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  $to = 'serviceclient.healtharound@gmail.com'; // Adresse e-mail de destination
  $sujet = 'Nouveau message de contact'; // Sujet du courrier électronique
  $contenu = "Nom : $nom\n\nEmail : $email\n\nMessage : $message";
  $entetes = "From: $email";

  if (mail($to, $sujet, $contenu, $entetes)) {
    echo '<div class="u-form-send-message u-form-send-success">Votre message a été envoyé avec succès.</div>';
  } else {
    echo '<div class="u-form-send-error u-form-send-message">Une erreur s\'est produite lors de l\'envoi du message.</div>';
  }
}
?>



<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <title>Contact</title>
    <link rel="stylesheet" href="../css/styleG10A.css" media="screen">
<link rel="stylesheet" href="../css/Contact.css" media="screen">
    <script class="u-script" type="text/javascript" src="../js/jG10A.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../js/j2G10A.js" defer=""></script>
</script>
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header u-sticky u-sticky-c8e6 u-white u-header" id="sec-54cb"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="../php/Accueil.php" class="u-image u-logo u-image-1" data-image-width="858" data-image-height="302">
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
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-custom-color-1" href="../php/Accueil.php" style="padding: 10px 20px;">Accueil</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-custom-color-1" href="../php/Services.php" style="padding: 10px 20px;">Nos services</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/plateforme.php">Notre plateforme</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/capteurs.php">Les capteurs</a></li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/quiz.php">Quiz</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/FAQ.php">FAQ</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-custom-color-1" href="../php/Contact.php" style="padding: 10px 20px;">Contact</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-custom-color-1" style="padding: 10px 20px;">Connexion</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/connexion.php">Se connecter</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/inscription.php">Créer un compte</a>
</li></ul>
</div>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-4"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../php/Accueil.php">Accueil</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../php/Services.php">Nos services</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../php/plateforme.php">Notre plateforme</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../php/capteurs.php">Les capteurs</a></li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="../php/quiz.php">Quiz</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../php/FAQ.php">FAQ</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../php/Contact.php">Contact</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link">Connexion</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="../php/connexion.php">Se connecter</a>
</li></ul>
</div>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-section-1" id="carousel_067f">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-grey-5 u-layout-cell u-size-20 u-layout-cell-1 u-expand-left">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                  <h2 class="u-custom-font u-font-montserrat u-text u-text-1"> Nous rencontrer</h2>
                  <div class="u-expanded-width u-list u-list-1">
                    <div class="u-repeater u-repeater-1">
                      <div class="u-container-style u-list-item u-repeater-item u-shape-rectangle">
                        <div class="u-container-layout u-similar-container u-container-layout-2"><span class="u-file-icon u-icon u-text-custom-color-1 u-icon-1"><img src="../images/29.png" alt=""></span>
                          <h4 class="u-custom-font u-font-montserrat u-text u-text-2">Téléphone</h4>
                          <p class="u-text u-text-3">
                            <a class="u-active-none u-border-active-palette-2-base u-border-hover-palette-2-base u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-btn-1"><span class="u-icon"></span>&nbsp;​+33 06 82 14 69 41
                            </a>
                          </p>
                        </div>
                      </div>
                      <div class="u-container-style u-list-item u-repeater-item u-shape-rectangle">
                        <div class="u-container-layout u-similar-container u-container-layout-3"><span class="u-file-icon u-icon u-text-custom-color-1 u-icon-3"><img src="../images/30.png" alt=""></span>
                          <h4 class="u-custom-font u-font-montserrat u-text u-text-4">Localisation</h4>
                          <p class="u-text u-text-5"> 10 Rue de Vanves, 92130 Issy-les-Moulineaux</p>
                        </div>
                      </div>
                      <div class="u-container-style u-list-item u-repeater-item u-shape-rectangle">
                        <div class="u-container-layout u-similar-container u-container-layout-4"><span class="u-file-icon u-icon u-text-custom-color-1 u-icon-4"><img src="../images/31.png" alt=""></span> 
                          <h4 class="u-custom-font u-font-montserrat u-text u-text-6">Mail</h4>
                          <p class="u-text u-text-7">
                            <a class="u-active-none u-border-active-palette-2-base u-border-hover-palette-2-base u-btn u-button-link u-button-style u-hover-none u-none u-text-active-palette-2-base u-text-body-color u-text-hover-palette-2-base u-btn-2"> serviceclient.healtharound@gmail.com</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-container-align-center u-container-style u-image u-layout-cell u-size-20 u-image-1" data-image-width="732" data-image-height="460">
                <div class="u-container-layout u-container-layout-5"></div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-20 u-white u-layout-cell-3">
                <div class="u-container-layout u-container-layout-6">
                  <h2 class="u-align-left u-custom-font u-font-montserrat u-text u-text-8"> Nous contacter</h2>
                  <div class="u-align-left u-form u-form-1">
                    <form action="#" class="u-clearfix u-form-spacing-28 u-form-vertical u-inner-form" style="padding: 0px;" source="email" name="form" data-services="f8d7951bb6944bbee8bcda655c260ea5">
                      <div class="u-form-group u-form-name u-label-top">
                        <label for="name-5a14" class="u-label" wfd-invisible="true">Votre nom</label>
                        <input type="text" placeholder="Entrez votre nom" id="name-5a14" name="name" class="u-grey-5 u-input u-input-rectangle u-radius-7 u-input-1" required="">
                      </div>
                      <div class="u-form-email u-form-group u-label-top">
                        <label for="email" class="u-label" wfd-invisible="true">Email</label>
                        <input type="email" placeholder="Entrez un email valide" id="email" name="email" class="u-grey-5 u-input u-input-rectangle u-radius-7 u-input-2" required="">
                      </div>
                      <div class="u-form-group u-form-message u-label-top u-form-group-3">
                        <label for="message" class="u-label">Message</label>
                        <textarea placeholder="Entrez votre message" rows="4" cols="50" id="message" name="message" class="u-grey-5 u-input u-input-rectangle u-radius-7 u-input-3" required=""></textarea>
                      </div>
                      <div class="u-align-center u-form-group u-form-submit u-label-top">
                        <a href="#" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-gradient u-hover-palette-1-dark-1 u-none u-radius-50 u-text-active-white u-btn-3">Envoyer<br>
                        </a>
                        <input type="submit" value="Envoyer" class="u-form-control-hidden" wfd-invisible="true">
                      </div>
                      <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Votre message a bien été envoyé</div>
                      <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Echec de l'envoie de votre message, vérifiez vos informations et réessayez </div>
                      <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-grey-light-2 u-typography-custom-page-typography-12--Map u-section-2" id="sec-08e8">
      <div class="u-expanded u-grey-light-2 u-map">
        <div class="embed-responsive">
          <iframe class="embed-responsive-item" src="//maps.google.com/maps?output=embed&amp;key=10 rue de vanves issy les moulineaux&amp;q=10%20Rue%20de%20Vanves%2C%2092130%20Issy-les-Moulineaux&amp;t=m" data-map="JTdCJTIycG9zaXRpb25UeXBlJTIyJTNBJTIybWFwLXBvaW50JTIyJTJDJTIyYWRkcmVzcyUyMiUzQSUyMjEwJTIwUnVlJTIwZGUlMjBWYW52ZXMlMkMlMjA5MjEzMCUyMElzc3ktbGVzLU1vdWxpbmVhdXglMjIlMkMlMjJ6b29tJTIyJTNBbnVsbCUyQyUyMnR5cGVJZCUyMiUzQSUyMnJvYWQlMjIlMkMlMjJsYW5nJTIyJTNBbnVsbCUyQyUyMmFwaUtleSUyMiUzQSUyMjEwJTIwcnVlJTIwZGUlMjB2YW52ZXMlMjBpc3N5JTIwbGVzJTIwbW91bGluZWF1eCUyMiUyQyUyMm1hcmtlcnMlMjIlM0ElNUIlNUQlN0Q="></iframe>
        </div>
      </div>
    </section>
    
    
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
  </body>
</html>