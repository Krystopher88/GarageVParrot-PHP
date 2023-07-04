<?php
require_once('templates/head.php');
require_once('lib/pdo.php');

$id = (int)$_GET['id'];
$UsedVehiculeSliders = getImportUsedVehicle($pdo, $id);
?>


<body class="container">
  <!-- HEADER START -->
  <?php
  require_once('templates/header.php');
  ?>
  <!-- HEADER END -->

  <!-- MAIN START -->
  <div class="row justify-content-center">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="card-header bg-transparent">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link card-nav-link active" aria-current="true" href="#card_body_info">Informations Véhicule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link card-nav-link" href="#card_body_form">Demander plus d'informations</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <img src="./uploads/img_used_vehicle/E111803730_STANDARD_0.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body" id="card_body_info">
            <div class="card-header bg-transparent d-flex justify-content-between">
              <h6 class="card-title"><?= $UsedVehiculeSliders['brand']; ?></h6>
              <h6><?= $UsedVehiculeSliders['model']; ?></h6>
            </div>
            <div class="d-flex justify-content-around">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Constructeur</li>
                <li class="list-group-item">Modele</li>
                <li class="list-group-item">Kilométrage</li>
                <li class="list-group-item">Année de mise en circulation</li>
                <li class="list-group-item">Carburant</li>
              </ul>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $UsedVehiculeSliders['brand']; ?></li>
                <li class="list-group-item"><?= $UsedVehiculeSliders['model']; ?></li>
                <li class="list-group-item"><?= $UsedVehiculeSliders['mileage']; ?> km</li>
                <li class="list-group-item"><?= $UsedVehiculeSliders['year']; ?></li>
                <li class="list-group-item"><?= $UsedVehiculeSliders['fuel_type']; ?></li>
              </ul>
            </div>
          </div>
          <div class="card-body" id="card_body_form">
            <form action="" class="d-flex justify-content-around">
              <div>
                <div class="mb-3">
                  <label for="email" class="form-label">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre email">
                  </label>
                </div>
                <div class="mb-3">
                  <label for="lastName" class="form-label">
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Entrez votre nom">
                  </label>
                </div>
                <div class="mb-3">
                  <label for="firstName" class="form-label">
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Entrez votre prénom">
                  </label>
                </div>
                <div class="mb-3">
                  <label for="phoneNumber" class="form-label">
                    <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Votre numéro téléphone">
                  </label>
                </div>
              </div>
              <div>
                <div class="mb-3">
                  <label for="brand" class="form-label">
                    <input type="text" name="brand" id="brand" class="form-control" placeholder="<?= $UsedVehiculeSliders['brand']; ?>" readonly>
                  </label>
                </div>
                <div class="mb-3">
                  <label for="model" class="form-label">
                    <input type="text" name="model" id="model" class="form-control" placeholder="<?= $UsedVehiculeSliders['model']; ?>" readonly>
                  </label>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">
                    <input type="text" name="price" id="price" class="form-control" placeholder="<?= $UsedVehiculeSliders['price']; ?> €" readonly>
                  </label>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


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