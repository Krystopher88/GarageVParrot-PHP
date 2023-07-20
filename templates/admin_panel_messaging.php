<?php
require_once('lib/pdo.php');
// Récupérer les 3 derniers employés connectés
$messages = getAllMessage($pdo, 3);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenoms</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($messages as $message): ?>
      <tr>
        <td><?= $message['id'] ?></td>
        <td><?= $message['last_name'] ?></td>
        <td><?= $message['first_name'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<button class="btn btn-primary"><a href="admin_messaging.php">Gérer les messages</a></button>