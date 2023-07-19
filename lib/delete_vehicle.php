<?php
require_once('pdo.php'); // Inclure le fichier pdo.php contenant la connexion à la base de données

if (isset($_GET['id'])) {
  $used_vehicle_id = $_GET['id'];

    try {
        // Supprimer l'utilisateur de la base de données
        $success = deleteUsedVehicle($pdo, $used_vehicle_id);

        // Rediriger vers la page d'administration avec un paramètre de succès ou d'erreur
        if ($success) {
            $currentPath = dirname($_SERVER['PHP_SELF']);
            $parentPath = dirname($currentPath);
            $redirectURL = $parentPath . '/admin_used_vehicled.php?success=1';
            header('Location: ' . $redirectURL);
            exit();
        } else {
            echo "Une erreur s'est produite lors de la suppression du véhicule.";
        }
    } catch (PDOException $e) {
        echo "Erreur dans la requête deleteUsedVehicle : " . $e->getMessage();
    }
} else {
    echo "L'ID du véhicule n'est pas spécifié.";
}
?>