<div class="col-8 p-3">
      <div class="row justify-content-around">
        <?php foreach ($UsedVehiculeSliders as $key => $UsedVehiculeSlider) { ?>
          <div class="card mb-2 usedVechicled" style="width: 16rem">
            <div class="card-header bg-transparent d-flex justify-content-between">
              <h6 class="card-title"><?= $UsedVehiculeSlider['brand']; ?></h6>
              <h6><?= $UsedVehiculeSlider['model']; ?></h6>
            </div>
            <img src="<?= $UsedVehiculeSlider['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
              <ul class="list-group">
                <li class="list-group-item"><?= $UsedVehiculeSlider['mileage']; ?> km</li>
                <li class="list-group-item"><?= $UsedVehiculeSlider['fuel_type']; ?></li>
                <li class="list-group-item"><?= $UsedVehiculeSlider['year']; ?></li>
              </ul>
              </p>
              <a href="./used_vehicle.php?id=<?=$UsedVehiculeSlider["id"]?>" class="btn btn-primary">Plus d'informations</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>