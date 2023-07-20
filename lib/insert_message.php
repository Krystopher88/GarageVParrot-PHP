<?php
require_once('pdo.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $phoneNumber = $_POST["phoneNumber"];
  $email = $_POST["email"];
  $lastName = $_POST["last_name"];
  $firstName = $_POST["first_name"];
  $message = $_POST["message"];

    try {
        // Appeler la fonction pour insérer le message dans la base de données
        $success = insertMessage($pdo, $phoneNumber, $email, $lastName, $firstName, $message);

        if ($success) {
            echo "Le message a été inséré avec succès.";
        } else {
            echo "Erreur lors de l'insertion du message.";
        }

        $currentPath = dirname($_SERVER['PHP_SELF']);
        $parentPath = dirname($currentPath);
        $redirectURL = $parentPath . '/index.php';
        header('Location: ' . $redirectURL);
        exit();

    } catch (PDOException $e) {
        // Gérer l'erreur si l'insertion échoue
        echo "Erreur lors de l'insertion du message : " . $e->getMessage();
    }
}
?>
