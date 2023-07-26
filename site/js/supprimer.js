function deleteUser(userId) {
    if (confirm("Voulez-vous vraiment supprimer cet utilisateur ?")) {
        // Effectuer une requête AJAX pour supprimer l'utilisateur côté serveur
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../php/supprimer.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert("L'utilisateur a été supprimé avec succès.");
                // Rediriger vers la page admin.php
                window.location.href = '../php/adminPage.php';
            } else {
                alert("Une erreur s'est produite lors de la suppression de l'utilisateur.");
            }
        };
        xhr.send('userId=' + userId);
    }
}