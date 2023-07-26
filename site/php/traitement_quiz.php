<?php
// Récupérer les données envoyées par la requête AJAX
$question = $_POST['question'];
$answer = $_POST['answer'];

// Tableau des réponses correctes
$correctAnswers = [
  'température' => 'B) 18 à 22°C',
  'niveau_CO2' => 'B) 600-800 ppm',
  'niveau_bruit' => 'B) 80-90 dB'
];

// Vérifier si la réponse est correcte
$isCorrect = ($answer === $correctAnswers[$question]);

// Préparer la réponse au format JSON
$response = [
  'isCorrect' => $isCorrect,
  'correctAnswer' => $correctAnswers[$question]
];

// Si la réponse est incorrecte, ajouter la bonne réponse à la réponse JSON
if (!$isCorrect) {
  $response['funFact'] = "La bonne réponse est : " . $correctAnswers[$question];
}

// Renvoyer la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
