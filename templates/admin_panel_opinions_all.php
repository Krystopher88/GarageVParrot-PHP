<?php
require_once('lib/pdo.php');
if (isset($_GET['error']) && $_GET['error'] === '1') {
  // Afficher un message d'erreur
  echo '<div class="alert alert-danger" role="alert">Une erreur s\'est produite lors de la mise à jour de l\'utilisateur.</div>';
}
$comments = getImportComments($pdo);
?>

<form id="managementComments" action="" method="post">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Avis</th>
        <th scope="col">Note</th>
        <th scope="col" class="text-center">Publier</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($comments as $comment) : ?>
        <tr>
          <td><?= $comment['id'] ?></td>
          <td><?= $comment['name'] ?></td>
          <td><?= $comment['opinion'] ?></td>
          <td><?= $comment['note'] ?>/5</td>
          <td>
          <div class="form-check form-switch">
          <input class="form-check-input switchButton " type="checkbox" id="switchButton_<?= $comment['id'] ?>" <?= $comment['publish'] == 1 ? 'checked' : '' ?> data-opinion-id="<?= $comment['id'] ?>">
            </div>
          </td>
          <td class="text-center">
            <a href="lib/delete_opinion.php?id=<?= $comment['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AdminOpinionModal">Créer un avis</button>

</form>

<?php include('templates/modal_opinion_admin.php'); ?>
