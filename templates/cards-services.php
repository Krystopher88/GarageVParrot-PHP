<?php
$ServicesCards = getImportServices($pdo);
?>

<?php foreach ($ServicesCards as $key => $ServicesCard) { ?>
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card ">
      <!-- <a href="<?= ($ServicesCard['id'] == 1) ? 'mechanical.php' : 'body_car.php'; ?>?id=<?= $ServicesCard['id']; ?>"> -->
        <div class="row g-0">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="./assets/images/carrosserie1JPG_615f1bef213ea.jpg" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $ServicesCard['title'] ?></h5>
              <p class="card-text"><?= $ServicesCard['description'] ?></p>
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">Demande de devis</a>
            </div>
          </div>
        </div>
      <!-- </a> -->
    </div>
  </div>
<?php } ?>



