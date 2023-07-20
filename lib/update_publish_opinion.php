<?php
require_once('pdo.php');

if (isset($_GET['opinionId']) && isset($_GET['isPublished'])) {
  $opinionId = $_GET['opinionId'];
  $isPublished = $_GET['isPublished'];

  // Vérifiez que l'opinionId est un nombre entier valide
  if (filter_var($opinionId, FILTER_VALIDATE_INT)) {
    // Assurez-vous que $isPublished est soit 0 ou 1
    $isPublished = ($isPublished == 1) ? 1 : 0;

    // Mettez à jour la colonne "publish" dans la base de données en utilisant la fonction updateOpinionPublish
    updateOpinionPublish($pdo, $opinionId, $isPublished);

    // Répondez avec un message JSON pour indiquer le succès de la mise à jour
    echo json_encode(['success' => true]);
    exit;
  }
}

// Répondez avec un message JSON pour indiquer une erreur
echo json_encode(['success' => false]);
