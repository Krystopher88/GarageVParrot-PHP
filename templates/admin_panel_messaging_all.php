<?php
require_once('lib/pdo.php');
// Récupérer les 3 derniers employés connectés
$messages = getAllMessage($pdo);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenoms</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Message</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($messages as $message): ?>
      <tr>
        <td><?= $message['id'] ?></td>
        <td><?= $message['last_name'] ?></td>
        <td><?= $message['first_name'] ?></td>
        <td><?= $message['phoneNumber'] ?></td>
        <td><?= $message['message'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
