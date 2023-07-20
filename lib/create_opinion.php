<?php
require_once('pdo.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $opinion = $_POST["opinion"];
    $note = $_POST["note"];

    try {
        // Appeler la fonction pour insérer l'opinion dans la base de données
        $success = insertComment($pdo, $name, $opinion, $note);

        $currentPath = dirname($_SERVER['PHP_SELF']);
        $parentPath = dirname($currentPath);
        $redirectURL = $parentPath . '/index.php';
        header('Location: ' . $redirectURL);
        exit();

    } catch (InvalidArgumentException $e) {
        // Gérer l'erreur si la note est invalide
        echo $e->getMessage();
    }
}
?>
