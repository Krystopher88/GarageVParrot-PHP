<?php
require_once('lib/pdo.php');
// Récupérer les 3 derniers employés connectés
$employees = getAllUsers($pdo, 3);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Role</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Dernière Connexion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($employees as $employee): ?>
      <tr>
        <td><?= $employee['role'] ?></td>
        <td><?= $employee['last_name'] ?></td>
        <td><?= $employee['first_name'] ?></td>
        <td><?= $employee['last_connexion'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<button class="btn btn-primary"><a href="admin_account_management.php">Gérer les employés</a></button>


