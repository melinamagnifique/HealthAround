$(document).ready(function() {
    updateNotificationBadge(); // Mettre à jour le badge de notification au chargement de la page

    // Fonction pour mettre à jour le badge de notification
    function updateNotificationBadge() {
        $.ajax({
            url: '../php/nombre_messages.php',
            type: 'GET',
            success: function(data) {
                // Mettre à jour le contenu du badge avec le nombre de nouveaux messages
                $('.badge').text(data);
            },
            error: function() {
                console.log('Une erreur s\'est produite lors de la récupération du nombre de messages.');
            }
        });
    }

    // Rafraîchir le badge de notification périodiquement (par exemple, toutes les 10 secondes)
    setInterval(updateNotificationBadge, 10000);
});