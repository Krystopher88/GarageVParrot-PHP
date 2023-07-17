<?php
require_once('pdo.php'); // Inclure le fichier pdo.php contenant la connexion à la base de données

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    try {
        // Supprimer l'utilisateur de la base de données
        $success = deleteUser($pdo, $user_id);

        // Rediriger vers la page d'administration avec un paramètre de succès ou d'erreur
        if ($success) {
            $currentPath = dirname($_SERVER['PHP_SELF']);
            $parentPath = dirname($currentPath);
            $redirectURL = $parentPath . '/admin_account_management.php?success=1';
            header('Location: ' . $redirectURL);
            exit();
        } else {
            echo "Une erreur s'est produite lors de la suppression de l'utilisateur.";
        }
    } catch (PDOException $e) {
        echo "Erreur dans la requête deleteUser : " . $e->getMessage();
    }
} else {
    echo "L'ID de l'utilisateur n'est pas spécifié.";
}
?>
