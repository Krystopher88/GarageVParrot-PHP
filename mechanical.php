<?php
require_once('templates/head.php');
?>


<body class="container">
  <!-- HEADER START -->
  <?php
  require_once('templates/header.php');
  ?>
  <!-- HEADER END -->

  <!-- MAIN START -->
  <div class="row">
        <?php
        include('templates/card-service.php');
        ?>
    </div>
  <!-- MAIN END -->
  <!-- FOOTER START -->
  <?php
  require_once('templates/footer.php')
  ?>
  <!-- FOOTER END -->

</body>
<?php
require_once('lib/importLibs.php');
?>

</html>