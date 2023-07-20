<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $identifier = $_POST['identifier'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $lastName = $_POST['lastName'];
  $firstName = $_POST['firstName'];
  $role = $_POST['role'];

  // Appeler la fonction createUser pour créer un nouvel utilisateur
  $success = createUser($identifier, $password, $email, $lastName, $firstName, $role, $pdo);

  if ($success) {
    // Message de confirmation
    $confirmationMessage = 'Le compte a été créé avec succès.';
  } else {
    // Message d'erreur
    $confirmationMessage = 'Une erreur est survenue lors de la création du compte.';
  }

  // Redirection vers la page précédente avec le message de confirmation
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '?confirmation=' . urlencode($confirmationMessage));
  exit();
} else {
  // Redirection vers la page précédente si la requête n'est pas de type POST
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit();
}
?>
