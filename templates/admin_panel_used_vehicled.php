<?php
require_once('lib/pdo.php');
$vehicleUsed = getImportUsedVehicle($pdo);
?>

<form>
  <table class="table">
    <thead>
      <tr>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Année</th>
        <th>Kilométrage</th>
        <th>Carburant</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($vehicleUsed as $vehicle) { ?>
        <tr>
          <td><?= htmlspecialchars($vehicle['brand']); ?></td>
          <td><?= htmlspecialchars($vehicle['model']); ?></td>
          <td><?= htmlspecialchars($vehicle['year']); ?></td>
          <td><?= htmlspecialchars($vehicle['mileage']); ?> km</td>
          <td><?= htmlspecialchars($vehicle['fuel_type']); ?></td>
          <td>
            <button class="btn btn-warning btn-edity" data-bs-toggle="modal" data-bs-target="#updateModal" data-vehicle-info='<?= json_encode($vehicle) ?>'>
              Modifier
            </button>


            <a href="lib/delete_vehicle.php?id=<?= $vehicle['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">Supprimer</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createVehicleModal">Créer un nouveau véhicule</button>
</form>

<?php include 'admin_modal_create_vehicle.php'; ?>
<?php include 'admin_modal_form_update_vehicle.php'; ?>