document.getElementById("ajouterUtilisateurForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page
  
    // Récupérer les valeurs des champs du formulaire
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;
    var entreprise = document.getElementById("entreprise").value;
    var password = document.getElementById("password").value;
  
    // Effectuer des opérations supplémentaires si nécessaire (ex : validation des données, appel à une API, etc.)
  
    // Réinitialiser le formulaire après avoir traité les données
    document.getElementById("ajouterUtilisateurForm").reset();
  });
  