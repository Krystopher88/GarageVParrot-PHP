<?php
$openingHours = getOpeningHours($pdo);
require('modal_confirm_modify.php');
?>

<form id="openingHoursForm" action="lib/modify_shedule_days.php" method="post">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Jour</th>
        <th>Heure d'ouverture</th>
        <th>Heure de fermeture</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($openingHours as $dayOfWeek => $openingTimes) { ?>
        <tr>
          <td data-day="<?= $dayOfWeek ?>"><?= $dayOfWeek ?></td>
          <?php foreach ($openingTimes as $key => $openingTime) { ?>
            <td>
              <input type="text" name="opening_time[<?= $dayOfWeek ?>][<?= $key ?>]" value="<?= $openingTime['opening_time'] ?>">
              <span class="error-message opening-time-error-message"></span>
            </td>
            <td>
              <input type="text" name="closing_time[<?= $dayOfWeek ?>][<?= $key ?>]" value="<?= $openingTime['closing_time'] ?>">
              <span class="error-message closing-time-error-message"></span>
            </td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>


<?php 
require_once('lib/importLibs.php');
?> 
