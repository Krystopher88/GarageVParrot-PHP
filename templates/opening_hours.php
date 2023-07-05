<?php
$openingHours = getOpeningHours($pdo);
?>
<ul class="nav flex-column">
  <?php foreach ($openingHours as $dayOfWeek => $openingTimes) { ?>
    <li class="nav-item mb-2"><?= $dayOfWeek ?> :
      <?php foreach ($openingTimes as $key => $openingTime) { ?>
        <?= $openingTime['opening_time'] ?> - <?= $openingTime['closing_time'] ?>
      <?php } ?>
    </li>
  <?php } ?>
</ul>
