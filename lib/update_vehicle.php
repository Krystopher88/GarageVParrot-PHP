<?php
require_once('pdo.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $vehicle_id = $_POST['id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $mileage = $_POST['mileage'];
    $fuel_type = $_POST['fuel_type'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    // Vérifier si une nouvelle image a été téléchargée
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $picture_tmp_name = $_FILES['picture']['tmp_name'];
        $picture_name = $_FILES['picture']['name'];
    } else {
        $picture_tmp_name = null;
        $picture_name = null;
    }

    try {
        // Appeler la fonction pour mettre à jour le véhicule dans la base de données
        $success = updateUsedVehicle($pdo, $vehicle_id, $brand, $model, $mileage, $fuel_type, $year, $price, $picture_tmp_name, $picture_name);

        // Rediriger vers la page d'administration avec un paramètre de succès ou d'erreur
        if ($success) {
            $currentPath = dirname($_SERVER['PHP_SELF']);
            $parentPath = dirname($currentPath);
            $redirectURL = $parentPath . '/admin_used_vehicled.php?success=1';
            header('Location: ' . $redirectURL);
            exit();
        } else {
            echo "Une erreur s'est produite lors de la mise à jour du véhicule.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour du véhicule : " . $e->getMessage();
    }
} else {
    echo "Le formulaire de mise à jour n'a pas été soumis.";
}
?>
