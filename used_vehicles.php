<?php
require_once('templates/head.php');

$UsedVehiculeSliders = getImportUsedVehicle($pdo);
?>


<body class="container">
  <!-- HEADER START -->
  <?php
  require_once('templates/header.php');
  ?>
  <!-- HEADER END -->

  <!-- MAIN START -->

  <!-- FOOTER START -->
  <?php
  require_once('templates/footer.php')
  ?>
  <!-- FOOTER END -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>