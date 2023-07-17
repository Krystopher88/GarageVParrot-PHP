<!-- Connection to the DB -->

<?php
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


// Import Comments End

// Import Used_Vehicle

function getImportUsedVehicle(PDO $pdo, int $id = null, int $limit = null)
{
  $sql = 'SELECT * FROM Used_Vehicles';

  if ($id) {
    $sql .= ' WHERE id = :id';
  } else {
    $sql .= ' ORDER BY id DESC';
  }

  if ($limit) {
    $sql .= ' LIMIT :limit';
  }

  $query = $pdo->prepare($sql);

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
  return $query->execute();
  // return $query->fetch(PDO::FETCH_ASSOC);
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

