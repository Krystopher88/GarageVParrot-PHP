<?php
require_once('pdo.php');

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Récupération des horaires modifiés depuis le formulaire
    $newOpeningHours = $_POST['opening_time'];
    $newClosingHours = $_POST['closing_time'];

    // Validation et traitement des données
    // ...

    // Mise à jour des horaires dans la base de données
    foreach ($newOpeningHours as $dayOfWeek => $openingTimes) {
      foreach ($openingTimes as $key => $openingTime) {
        $closingTime = $newClosingHours[$dayOfWeek][$key];

        // Préparation de la requête
        $query = $pdo->prepare('UPDATE opening_hours SET opening_time = :opening_time, closing_time = :closing_time WHERE day_of_week = :day_of_week');

        // Liaison des valeurs aux paramètres de la requête
        $query->bindValue(':opening_time', $openingTime);
        $query->bindValue(':closing_time', $closingTime);
        $query->bindValue(':day_of_week', $dayOfWeek);

        // Exécution de la requête
        $query->execute();
      }
    }

    // Redirection vers la page admin_openinghours.php avec un paramètre de confirmation
    $currentPath = dirname($_SERVER['PHP_SELF']);
    $parentPath = dirname($currentPath);
    $redirectURL = $parentPath . '/admin_openinghours.php?success=1';
    header('Location: ' . $redirectURL);
    exit();
  } catch (PDOException $e) {
    // Gestion des erreurs de la base de données
    // Redirection vers la page admin_openinghours.php avec un paramètre d'erreur
    $currentPath = dirname($_SERVER['PHP_SELF']);
    $parentPath = dirname($currentPath);
    $redirectURL = $parentPath . '/admin_openinghours.php?error=1';
    header('Location: ' . $redirectURL);
    exit();
  }
} else {
  // Si le formulaire n'a pas été soumis, redirigez vers la page appropriée ou affichez un message d'erreur
  // Redirection vers la page admin_openinghours.php avec un paramètre d'erreur
  $currentPath = dirname($_SERVER['PHP_SELF']);
  $parentPath = dirname($currentPath);
  $redirectURL = $parentPath . '/admin_openinghours.php?error=1';
  header('Location: ' . $redirectURL);
  exit();
}
