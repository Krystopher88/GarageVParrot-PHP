<!-- Connection to the DB -->

<?php
require_once(__DIR__ . '/../config.php');
// Connexion à la base de données avec les options pour activer les exceptions
try {
  $pdo = new PDO('mysql:dbname=vparrot_bdd;host=localhost;charset=utf8mb4', 'krystdev', 'phw5una7', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
  // En cas d'erreur de connexion, affiche l'erreur complète
  die('Erreur de connexion à la base de données : ' . $e->getMessage());
}


// Import Comments Start
//Rajouter une limites de commentaire à afficher

function getImportComments(PDO $pdo, int $limit = null)
{
  $sql = 'SELECT * FROM OpinionsTable ORDER BY id DESC';

  if ($limit) {
    $sql .= ' LIMIT :limit';
  }

  $query = $pdo->prepare($sql);

  if ($limit) {
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
  }

  $query->execute();
  return $query->fetchAll();
}

function getPublishedImportOpinions(PDO $pdo, int $limit = null)
{
  $sql = 'SELECT * FROM OpinionsTable WHERE publish = 1 ORDER BY id DESC';

  if ($limit) {
    $sql .= ' LIMIT :limit';
  }

  $query = $pdo->prepare($sql);

  if ($limit) {
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
  }

  $query->execute();
  return $query->fetchAll();
}

function deleteOpinions(PDO $pdo, int $Id)
{
  $sql = 'DELETE FROM OpinionsTable WHERE id = :Id';

  $query = $pdo->prepare($sql);
  $query->bindParam(':Id', $Id, PDO::PARAM_INT);

  if ($query->execute()) {
    // Suppression réussie
    return true;
  } else {
    // Erreur lors de la suppression
    return false;
  }
}

function updateOpinionPublish(PDO $pdo, int $opinionId, int $publish)
{
  $sql = 'UPDATE OpinionsTable SET publish = :publish WHERE id = :opinionId';

  $query = $pdo->prepare($sql);
  $query->bindParam(':publish', $publish, PDO::PARAM_INT);
  $query->bindParam(':opinionId', $opinionId, PDO::PARAM_INT);

  return $query->execute();
}

if (isset($_GET['error']) && $_GET['error'] === '1') {
  // Afficher un message d'erreur
  echo '<div class="alert alert-danger" role="alert">Une erreur s\'est produite lors de la mise à jour de l\'utilisateur.</div>';
}



// Import Comments End

// Import Used_Vehicle

function getImportUsedVehicle(PDO $pdo, int $id = null, int $limit = null)
{
    $sql = 'SELECT *, COALESCE(pictures, :defaultImage) AS image FROM Used_Vehicles';

    if ($id) {
        $sql .= ' WHERE id = :id';
    } else {
        $sql .= ' ORDER BY id DESC';
    }

    if ($limit) {
        $sql .= ' LIMIT :limit';
    }

    $query = $pdo->prepare($sql);

    // Définir l'image par défaut
    $defaultImage = './assets/images/default_vehicle_image.jpg';
    $query->bindParam(':defaultImage', $defaultImage, PDO::PARAM_STR);

    if ($id) {
        $query->bindParam(':id', $id, PDO::PARAM_INT);
    }

    if ($limit) {
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();

    if ($id) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}


function getFilterUsedVehicle(PDO $pdo, $brand, $fuel_type, $minPrice, $maxPrice, $minMileAge, $maxMileAge)
{
  $sql = 'SELECT * FROM Used_Vehicles WHERE 1=1';

  if ($brand) {
    $sql .= ' AND brand = :brand';
  }

  if ($fuel_type) {
    $sql .= ' AND fuel_type = :fuel_type';
  }

  if ($minPrice !== '' && $maxPrice !== '') {
    $sql .= ' AND price BETWEEN :minPrice AND :maxPrice';
  }

  if ($minMileAge !== '' && $maxMileAge !== '') {
    $sql .= ' AND mileage BETWEEN :minMileAge AND :maxMileAge';
  }

  $query = $pdo->prepare($sql);

  if ($brand) {
    $query->bindParam(':brand', $brand, PDO::PARAM_STR);
  }

  if ($fuel_type) {
    $query->bindParam(':fuel_type', $fuel_type, PDO::PARAM_STR);
  }

  if ($minPrice !== '' && $maxPrice !== '') {
    $query->bindParam(':minPrice', $minPrice, PDO::PARAM_INT);
    $query->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);
  }

  if ($minMileAge !== '' && $maxMileAge !== '') {
    $query->bindParam(':minMileAge', $minMileAge, PDO::PARAM_INT);
    $query->bindParam(':maxMileAge', $maxMileAge, PDO::PARAM_INT);
  }

  $query->execute();

  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getImportServices(PDO $pdo)
{
  $query = $pdo->prepare('SELECT * FROM category_id');
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getImportServicesCard(PDO $pdo, $categoryId)
{
  $query = $pdo->prepare('SELECT * FROM service WHERE category_id = :categoryId');
  $query->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getOpeningHours($pdo)
{
  $query = $pdo->prepare('SELECT day_of_week, opening_time, closing_time FROM opening_hours');
  $query->execute();
  $openingHours = array();

  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $dayOfWeek = $row['day_of_week'];
    unset($row['day_of_week']);

    if (!isset($openingHours[$dayOfWeek])) {
      $openingHours[$dayOfWeek] = array();
    }

    $openingHours[$dayOfWeek][] = $row;
  }

  return $openingHours;
}

function login($identifiant, $password, $pdo)
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requete = $pdo->prepare("SELECT * FROM users WHERE identifier = :identifiant");
    $requete->bindParam(':identifiant', $identifiant);
    $requete->execute();

    $user = $requete->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      if ($password === $user['password_hash']) { // Comparaison du mot de passe non haché
        $_SESSION['user'] = $user;

        // Mettre à jour la date et l'heure de connexion dans la base de données
        $updateQuery = $pdo->prepare("UPDATE users SET last_connexion = :last_connexion WHERE id = :user_id");
        $updateQuery->bindParam(':last_connexion', date('Y-m-d H:i:s'));
        $updateQuery->bindParam(':user_id', $user['id'], PDO::PARAM_INT);
        $updateQuery->execute();

        return true;
      }
    }

    return false;
  }
}



function createUser($identifier, $password, $email, $lastName, $firstName, $role, $pdo) {
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

  $query = $pdo->prepare('INSERT INTO users (identifier, password_hash, email, last_name, first_name, role) 
  VALUES (:identifier, :password_hash, :email, :last_name, :first_name, :role)');
  $query->bindParam(':identifier', $identifier);
  $query->bindParam(':password_hash', $passwordHash);
  $query->bindParam(':email', $email);
  $query->bindParam(':last_name', $lastName);
  $query->bindParam(':first_name', $firstName);
  $query->bindParam(':role', $role);

  return $query->execute();
}

function getAllUsers(PDO $pdo, $limit = null) {
  $sql = "SELECT id, role, last_name, first_name, last_connexion, identifier, email FROM users";

  if ($limit !== null) {
    $sql .= " LIMIT :limit";
  }

  $query = $pdo->prepare($sql);

  if ($limit !== null) {
    $query->bindValue(':limit', $limit, PDO::PARAM_INT);
  }

  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}


function getUserById(PDO $pdo, $id) {
  $sql = "SELECT id, role, last_name, first_name, last_connexion, identifier, email FROM users WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query->bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}


function deleteUser(PDO $pdo, $user_id)
{
  $query = $pdo->prepare("DELETE FROM users WHERE id = :user_id");
  $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  return $query->execute();
}

function updateUser($user_id, $identifier, $password, $email, $lastName, $firstName, $pdo)
{
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $query = $pdo->prepare('UPDATE users SET identifier = :identifier, password_hash = :password_hash, email = :email, last_name = :last_name, first_name = :first_name  WHERE id = :user_id');
        $query->bindParam(':identifier', $identifier);
        $query->bindParam(':password_hash', $passwordHash);
        $query->bindParam(':email', $email);
        $query->bindParam(':last_name', $lastName);
        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $success = $query->execute();

        return $success;
    } catch (PDOException $e) {
        // Affiche l'erreur complète en cas d'échec de la requête
        echo 'Erreur dans la requête updateUser : ' . $e->getMessage();
        return false;
    }
}

function insertUsedVehicle(PDO $pdo, $brand, $model, $mileage, $fuel_type, $year, $price, $picture_tmp_name, $picture_name)
{
  // Vérification des données et préparation de la requête SQL
  $sql = 'INSERT INTO Used_Vehicles (pictures, brand, model, mileage, fuel_type, year, price) VALUES (:pictures, :brand, :model, :mileage, :fuel_type, :year, :price)';
  $query = $pdo->prepare($sql);

  // Gérer le téléchargement de l'image et stocker le lien
  $filename = uniqid() . '_' . basename($picture_name);
  $destination = UPLOADS_DIR . $filename;

  if (move_uploaded_file($picture_tmp_name, $destination)) {
    $pictureLink = './uploads/img_used_vehicle/' . $filename;
  } else {
    // Afficher un message d'erreur si le téléchargement de l'image a échoué
    die("Une erreur s'est produite lors du téléchargement de l'image.");
  }

  // Liage des paramètres
  $query->bindParam(':pictures', $pictureLink, PDO::PARAM_STR);
  $query->bindParam(':brand', $brand, PDO::PARAM_STR);
  $query->bindParam(':model', $model, PDO::PARAM_STR);
  $query->bindParam(':mileage', $mileage, PDO::PARAM_INT);
  $query->bindParam(':fuel_type', $fuel_type, PDO::PARAM_STR);
  $query->bindParam(':year', $year, PDO::PARAM_INT);
  $query->bindParam(':price', $price, PDO::PARAM_INT);

  // Exécution de la requête
  $query->execute();

  // Retourner l'ID du nouvel enregistrement
  return $pdo->lastInsertId();
}

function deleteUsedVehicle(PDO $pdo, $used_vehicle_id)
{
  $query = $pdo->prepare("DELETE FROM Used_Vehicles WHERE id = :used_vehicle_id");
  $query->bindParam(':used_vehicle_id', $used_vehicle_id, PDO::PARAM_INT);
  return $query->execute();
}


function updateUsedVehicle(PDO $pdo, $vehicle_id, $brand, $model, $mileage, $fuel_type, $year, $price, $picture_tmp_name = null, $picture_name = null)
{
    // Récupérer l'ancienne image de la base de données (s'il y en a une)
    $oldPictureLink = '';
    $queryOldImage = $pdo->prepare('SELECT pictures FROM Used_Vehicles WHERE id = :vehicle_id');
    $queryOldImage->bindParam(':vehicle_id', $vehicle_id, PDO::PARAM_INT);
    $queryOldImage->execute();

    if ($row = $queryOldImage->fetch(PDO::FETCH_ASSOC)) {
        $oldPictureLink = $row['pictures'];
    }

    // Vérification des données et préparation de la requête SQL
    $sql = 'UPDATE Used_Vehicles SET brand = :brand, model = :model, mileage = :mileage, fuel_type = :fuel_type, year = :year, price = :price';

    // Supprimer l'ancienne image de la base de données si elle existe
    if ($oldPictureLink) {
        // Supprimer le fichier de l'ancienne image sur le serveur
        $oldImageFilename = basename($oldPictureLink);
        $oldImagePath = UPLOADS_DIR . $oldImageFilename;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Gérer le téléchargement de la nouvelle image et mettre à jour le lien si une nouvelle image est fournie
    if ($picture_tmp_name && $picture_name) {
        $filename = uniqid() . '_' . basename($picture_name);
        $destination = UPLOADS_DIR . $filename;

        if (move_uploaded_file($picture_tmp_name, $destination)) {
            $pictureLink = './uploads/img_used_vehicle/' . $filename;
            $sql .= ', pictures = :pictures';
        } else {
            // Afficher un message d'erreur si le téléchargement de la nouvelle image a échoué
            die("Une erreur s'est produite lors du téléchargement de la nouvelle image.");
        }
    }

    $sql .= ' WHERE id = :vehicle_id';

    $query = $pdo->prepare($sql);

    // Liage des paramètres de la requête
    $query->bindParam(':brand', $brand, PDO::PARAM_STR);
    $query->bindParam(':model', $model, PDO::PARAM_STR);
    $query->bindParam(':mileage', $mileage, PDO::PARAM_INT);
    $query->bindParam(':fuel_type', $fuel_type, PDO::PARAM_STR);
    $query->bindParam(':year', $year, PDO::PARAM_INT);
    $query->bindParam(':price', $price, PDO::PARAM_INT);
    $query->bindParam(':vehicle_id', $vehicle_id, PDO::PARAM_INT);

    // Liage du paramètre de la nouvelle image si une nouvelle image a été fournie
    if ($picture_tmp_name && $picture_name) {
        $query->bindParam(':pictures', $pictureLink, PDO::PARAM_STR);
    }

    // Exécution de la requête
    try {
        $query->execute();
        return true; // Retourne true si la mise à jour a réussi
    } catch (PDOException $e) {
        // Gérer l'erreur si la mise à jour échoue
        echo "Erreur lors de la mise à jour du véhicule : " . $e->getMessage();
        return false; // Retourne false en cas d'erreur
    }
}

function getVehicleById(PDO $pdo, $id) {
  $sql = 'SELECT id, pictures, brand, model, mileage, fuel_type, year, price FROM Used_Vehicles WHERE id = :id';
  $query = $pdo->prepare($sql);
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}

function insertComment(PDO $pdo, $name, $opinion, $note)
{
    // Vérifier si la note est comprise entre 1 et 5
    if ($note < 1 || $note > 5) {
        throw new InvalidArgumentException("La note doit être comprise entre 1 et 5.");
    }

    // Préparer la requête SQL
    $sql = 'INSERT INTO OpinionsTable (name, opinion, note) VALUES (:name, :opinion, :note)';
    $query = $pdo->prepare($sql);

    // Lier les paramètres de la requête
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':opinion', $opinion, PDO::PARAM_STR);
    $query->bindParam(':note', $note, PDO::PARAM_INT);

    // Exécuter la requête
    try {
        $query->execute();
        return true; // Retourner true si l'insertion a réussi
    } catch (PDOException $e) {
        // Gérer l'erreur si l'insertion échoue
        echo "Erreur lors de l'insertion de l'opinion : " . $e->getMessage();
        return false; // Retourner false en cas d'erreur
    }
}

function insertMessage(PDO $pdo, $phoneNumber, $email, $lastName, $firstName, $message)
{
    // Préparer la requête SQL
    $sql = 'INSERT INTO messaging (phoneNumber, email, last_name, first_name, message) VALUES (:phoneNumber, :email, :lastName, :firstName, :message)';
    $query = $pdo->prepare($sql);

    // Lier les paramètres de la requête
    $query->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);

    // Exécuter la requête
    try {
        $query->execute();
        return true; // Retourner true si l'insertion a réussi
    } catch (PDOException $e) {
        // Gérer l'erreur si l'insertion échoue
        echo "Erreur lors de l'insertion du message : " . $e->getMessage();
        return false; // Retourner false en cas d'erreur
    }
}

function getAllMessage(PDO $pdo, $limit = null) {
  $sql = "SELECT * FROM messaging";

  if ($limit !== null) {
    $sql .= " LIMIT :limit";
  }

  $query = $pdo->prepare($sql);

  if ($limit !== null) {
    $query->bindValue(':limit', $limit, PDO::PARAM_INT);
  }

  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}
