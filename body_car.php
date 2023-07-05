<?php
require_once('templates/head.php');
?>
<?php
$categoryId = null;

// Récupérer le chemin de la page actuelle
$currentUrl = $_SERVER['PHP_SELF'];

// Vérifier si le chemin de la page correspond à la page de la catégorie Mécanique
if (strpos($currentUrl, 'mechanical.php') !== false) {
  $categoryId = 1; // Catégorie Mécanique
} 
// Vérifier si le chemin de la page correspond à la page de la catégorie Carrosserie
elseif (strpos($currentUrl, 'body_car.php') !== false) {
  $categoryId = 2; // Catégorie Carrosserie
}

// Utilisez $categoryId pour récupérer les services correspondants
$ServiceCards = getImportServicesCard($pdo, $categoryId);
?>

<body class="container">
  <!-- HEADER START -->
  <?php
  require_once('templates/header.php');
  ?>
  <!-- HEADER END -->

  <!-- MAIN START -->
  <div class="row">
  <?php foreach ($ServiceCards as $key => $ServiceCard) { ?>
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
        <div class="row g-0">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="./assets/images/carrosserie1JPG_615f1bef213ea.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $ServiceCard['title'] ?></h5>
              <p class="card-text"><?= $ServiceCard['description'] ?></p>
            </div>
          </div>
        </div>
    </div>
  </div>
<?php } ?>
    </div>
  <!-- MAIN END -->
  <!-- FOOTER START -->
  <?php
  require_once('templates/footer.php')
  ?>
  <!-- FOOTER END -->

</body>
<?php
require_once('lib/importLibs.php');
?>

</html>