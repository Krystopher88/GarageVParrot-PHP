$(document).ready(function() {
  $('.btn-edity').on('click', function(event) {
    event.preventDefault();
    let vehicleInfo = $(this).data('vehicle-info');

    // Remplir les champs de la modal avec les informations du véhicule
    $('#editVehicleId').val(vehicleInfo.id);
    $('#editVehicleBrand').val(vehicleInfo.brand);
    $('#editvehicleModel').val(vehicleInfo.model); 
    $('#editVehicleMileage').val(vehicleInfo.mileage);
    $('#editVehicleFueltype').val(vehicleInfo.fuel_type);
    $('#editVehicleYear').val(vehicleInfo.year);
    $('#editVehiclePrice').val(vehicleInfo.price);

    // Afficher l'image existante ou l'image par défaut si le chemin d'accès à l'image est NULL
    if (vehicleInfo.pictures) {
      $('#imagePreview').attr('src', vehicleInfo.pictures);
    } else {
      // Chemin d'accès à l'image par défaut
      let defaultImage = './assets/images/default_vehicle_image.jpg';
      $('#imagePreview').attr('src', defaultImage);
    }

    // Afficher la modal
    $('#updateModal').modal('show');
  });
});
