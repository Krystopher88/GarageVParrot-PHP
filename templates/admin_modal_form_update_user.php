<?php
require_once('lib/pdo.php');

// Assurez-vous que l'ID de l'utilisateur est disponible en POST
if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $employee = getUserById($pdo, $id);

  // Renvoyer les informations de l'utilisateur sous forme de JSON
  header('Content-Type: application/json');
  echo json_encode($employee);
}
?>

<!-- Modal -->

<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAccountModalLabel">Modifier le compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="lib/update_account.php" method="POST">
          <input type="text" id="editUserId" name="userId" value="<?= $employee['id'] ?>">
          <div class="mb-3">
            <label for="editIdentifier" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="editIdentifier" name="identifier" placeholder="<?= $employee['identifier'] ?>">
            <span class="error-message" id="editIdentifierError"></span>
          </div>
          <div class="mb-3">
            <label for="editPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="editPassword" name="password">
            <span class="error-message" id="editPasswordError"></span>
          </div>
          <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="editEmail" name="email" placeholder="<?= $employee['email'] ?>">
            <span class="error-message" id="editEmailError"></span>
          </div>
          <div class="mb-3">
            <label for="editLastName" class="form-label">Nom de famille</label>
            <input type="text" class="form-control" id="editLastName" name="lastName" placeholder="<?= $employee['last_name'] ?>">
            <span class="error-message" id="editLastNameError"></span>
          </div>
          <div class="mb-3">
            <label for="editFirstName" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="editFirstName" name="firstName" placeholder="<?= $employee['first_name'] ?>">
            <span class="error-message" id="editFirstNameError"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>