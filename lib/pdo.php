<!-- Connection to the DB -->

<?php
$pdo = new PDO('mysql:dbname=vparrot_bdd;host=localhost;charset=utf8mb4', 'krystdev', 'phw5una7');

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

function getImportUsedVehicle(PDO $pdo, int $limit = null)
{
  $sql = 'SELECT * FROM Used_Vehicles ORDER BY id DESC';

  if ($limit) {
    $sql .= ' LIMIT :limit';
  }

  $query = $pdo->prepare($sql);

  if ($limit) {
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
  }

  $query->execute();

  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getFilterUsedVehicle(PDO $pdo, $brand, $fuel_type, $minPrice, $maxPrice)
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

  $query->execute();

  return $query->fetchAll(PDO::FETCH_ASSOC);
}