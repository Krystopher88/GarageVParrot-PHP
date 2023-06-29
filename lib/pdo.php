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
  return $query->fetchAll();
}
?>