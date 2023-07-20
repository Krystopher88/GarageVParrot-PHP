<?php
require_once('lib/pdo.php');
// Récupérer les 3 derniers employés connectés
$comments = getImportComments($pdo, 3);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Avis</th>
      <th scope="col">Note</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comments as $comment): ?>
      <tr>
        <td><?= $comment['id'] ?></td>
        <td><?= $comment['name'] ?></td>
        <td><?= $comment['opinion'] ?></td>
        <td class="text-end"><?= $comment['note'] ?>/5</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<button class="btn btn-primary"><a href="admin_account_management.php">Gérer les avis</a></button>