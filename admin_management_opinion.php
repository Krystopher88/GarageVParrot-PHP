<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

?>

<?php
require_once('templates/head.php');
?>


<body class="container">
  <!-- HEADER START -->
  <?php
  // require_once('templates/header.php');
  ?>
  <!-- HEADER END -->

  <!-- MAIN START -->
  <main class="">

    <?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    if (!isset($_SESSION['user'])) {
      require_once('templates/admin_login.php');
    } else {
      $role = $_SESSION['user']['role'];
    ?>
      <div>
        <?php
        require_once('templates/admin_nav.php');
        ?>
      </div>
      <div class="row">
        <div class="mt-5">
          <?php
          include('templates/admin_panel_opinions_all.php');
          ?>
        </div>
      </div>
    <?php
    }
    ?>
  </main>
  <!-- MAIN END -->
  <!-- FOOTER START -->
  <?php
  // require_once('templates/footer.php')
  ?>
  <!-- FOOTER END -->

</body>
<?php
require_once('lib/importLibs.php');
?>

</html>