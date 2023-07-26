<?php
// Effectuer une requête pour récupérer le nombre de nouveaux messages dans la messagerie
// Supposons que vous ayez une fonction pour récupérer ce nombre, par exemple getNumberOfNewMessages()
$nombreMessages = getNumberOfNewMessages();

// Renvoyer le nombre de messages au format JSON
echo json_encode($nombreMessages);
?>