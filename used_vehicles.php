<?php
require_once('templates/head.php');
require_once('lib/pdo.php');

$UsedVehiculeSliders = getImportUsedVehicle($pdo);


// Récupérer les marques distinctes depuis la base de données
$brandQuery = $pdo->query('SELECT DISTINCT brand FROM Used_Vehicles');
$brands = $brandQuery->fetchAll(PDO::FETCH_COLUMN);

// Récupérer les types de carburant distincts depuis la base de données
$fuelTypeQuery = $pdo->query('SELECT DISTINCT fuel_type FROM Used_Vehicles');
$fuelTypes = $fuelTypeQuery->fetchAll(PDO::FETCH_COLUMN);

$brand = $_GET['brand'] ?? null;
$fuel_type = $_GET['fuel_type'] ?? null;
$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : '';
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '';
$minMileAge = isset($_GET['minMileage']) ? $_GET['minMileage'] : '';
$maxMileAge = isset($_GET['maxMileage']) ? $_GET['maxMileage'] : '';
$reset = isset($_GET['reset']);

// Réinitialiser les filtres si le bouton "Réinitialiser" est cliqué
if ($reset) {
  $brand = null;
  $fuel_type = null;
  $minPrice = '';
  $maxPrice = '';
}

// Modifier cette ligne pour utiliser la fonction de filtrage appropriée
if ($brand || $fuel_type || ($minPrice !== '' && $maxPrice !== '') || ($minMileAge !== '' && $maxMileAge !== '')) {
  $UsedVehiculeSliders = getFilterUsedVehicle($pdo, $brand, $fuel_type, $minPrice, $maxPrice, $minMileAge, $maxMileAge);
}
?>


<body class="container">
  <!-- HEADER START -->
  <?php
  require_once('templates/header.php');
  ?>
  <!-- HEADER END -->

  <!-- MAIN START -->
  <div class="row justify-content-center">
    <div class="col-3 p-4">
      <form action="" method="GET" class="form-control p-4">
        <select name="brand" id="" class="form-select mb-3">
          <option value="" selected>Marques</option>
          <?php foreach ($brands as $brandOption) { ?>
            <option value="<?= $brandOption ?>" <?= $brand === $brandOption ? 'selected' : '' ?>><?= $brandOption ?></option>
          <?php } ?>
        </select>
        <select name="fuel_type" id="fuel-type" class="form-select mb-3">
          <option value="" selected>Carburant</option>
          <?php foreach ($fuelTypes as $fuelTypeOption) { ?>
            <option value="<?= $fuelTypeOption ?>" <?= $fuel_type === $fuelTypeOption ? 'selected' : '' ?>><?= $fuelTypeOption ?></option>
          <?php } ?>
        </select>
        <label for="price">Prix :</label>
        <div id="price-slider" class="mb-3"></div>
        <input type="hidden" id="minPrice" name="minPrice" value="<?= $minPrice ?>">
        <input type="hidden" id="maxPrice" name="maxPrice" value="<?= $maxPrice ?>">
        <div id="price-values"></div>
        
        <label for="price">Kilométrage :</label>
        <div id="mileage-slider" class="mb-3"></div>
        <input type="hidden" id="minMileage" name="minMileage" value="<?= $minMileage ?>">
        <input type="hidden" id="maxMileage" name="maxMileage" value="<?= $maxMileage ?>">
        <div id="mileage-values"></div>
        
        <button type="submit" class="btn btn-warning m-2" name="reset" value="true">Réinitialiser</button>
        <button type="submit" class="btn btn-primary m-2">Valider</button>
      </form>
    </div>
    <!-- USED_VEHICLE START -->
      <?php
        include('templates/card_used_vehicles.php');
      ?>
    <!-- USED_VEHICLE END -->
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