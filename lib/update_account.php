<?php
require_once('pdo.php'); // Inclure le fichier pdo.php contenant la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $userId = $_POST['userId'];
  $identifier = $_POST['identifier'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $lastName = $_POST['lastName'];
  $firstName = $_POST['firstName'];

  try {
    // Mettre à jour les informations de l'utilisateur dans la base de données
    $success = updateUser($userId, $identifier, $password, $email, $lastName, $firstName, $pdo);

    // Rediriger vers la page d'administration avec un paramètre de succès
    if ($success) {
      $currentPath = dirname($_SERVER['PHP_SELF']);
      $parentPath = dirname($currentPath);
      $redirectURL = $parentPath . '/admin_account_management.php?success=1';
      header('Location: ' . $redirectURL);
      exit(); // Assurez-vous de quitter le script après la redirection
    } else {
      $currentPath = dirname($_SERVER['PHP_SELF']);
      $parentPath = dirname($currentPath);
      $redirectURL = $parentPath . '/admin_account_management.php?error=1';
      header('Location: ' . $redirectURL);
      exit(); // Assurez-vous de quitter le script après la redirection
    }
  } catch (PDOException $e) {
    // Gestion des erreurs de la base de données
    $currentPath = dirname($_SERVER['PHP_SELF']);
    $parentPath = dirname($currentPath);
    $redirectURL = $parentPath . '/admin_account_management.php?error=1';
    header('Location: ' . $redirectURL);
    exit(); // Assurez-vous de quitter le script après la redirection
  }
} else {
  // Si le formulaire n'a pas été soumis, redirigez vers la page appropriée ou affichez un message d'erreur
  $currentPath = dirname($_SERVER['PHP_SELF']);
  $parentPath = dirname($currentPath);
  $redirectURL = $parentPath . '/admin_account_management.php?error=1';
  header('Location: ' . $redirectURL);
  exit(); // Assurez-vous de quitter le script après la redirection
}
?>
