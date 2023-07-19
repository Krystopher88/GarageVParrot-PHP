<?php
require_once('pdo.php');

// Assurez-vous d'avoir inclus le fichier pdo.php et défini la fonction insertUsedVehicle.

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];
    $kilometrage = $_POST["kilometrage"];
    $carburant = $_POST["carburant"];
    $annee = $_POST["annee"];
    $prix = $_POST["prix"];
    $picture_tmp_name = $_FILES["image"]["tmp_name"];
    $picture_name = $_FILES["image"]["name"];

    // Appeler la fonction pour insérer les données dans la base de données
    try {
        $newVehicleId = insertUsedVehicle($pdo, $marque, $modele, $kilometrage, $carburant, $annee, $prix, $picture_tmp_name, $picture_name);

        // Utilisez $newVehicleId pour effectuer toute autre opération que vous pourriez souhaiter.

        // Redirigez l'utilisateur vers la page admin_used_vehicled.php une fois l'insertion réussie.
        $currentPath = dirname($_SERVER['PHP_SELF']);
        $parentPath = dirname($currentPath);
        $redirectURL = $parentPath . '/admin_used_vehicled.php';
        header('Location: ' . $redirectURL);
        exit();
    } catch (Exception $e) {
        // Gérer les erreurs éventuelles
        echo "Une erreur s'est produite lors de la création du véhicule : " . $e->getMessage();
    }
}
