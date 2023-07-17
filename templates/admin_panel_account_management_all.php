<?php
require_once('lib/pdo.php');
if (isset($_GET['error']) && $_GET['error'] === '1') {
  // Afficher un message d'erreur
  echo '<div class="alert alert-danger" role="alert">Une erreur s\'est produite lors de la mise à jour de l\'utilisateur.</div>';
}
$employees = getAllUsers($pdo);
?>

<form id="managementUser" action="" method="post">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Role</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Dernière Connexion</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employees as $employee) : ?>
        <tr>
          <td><?= $employee['id'] ?></td>
          <td><?= $employee['role'] ?></td>
          <td><?= $employee['last_name'] ?></td>
          <td><?= $employee['first_name'] ?></td>
          <td><?= $employee['last_connexion'] ?></td>
          <td>
            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editAccountModal" data-user-info='<?= json_encode($employee) ?>'>
              Modifier
            </button>
            <a href="lib/delete_user.php?id=<?= $employee['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAccountModal">Créer un compte</button>

</form>

<?php include('templates/admin_modal_form_create_user.php'); ?>
<?php include('templates/admin_modal_form_update_user.php'); ?>