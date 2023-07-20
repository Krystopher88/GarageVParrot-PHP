<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('lib/pdo.php');
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

      if ($role === 'administrateur' or $role === 'employe') {
    ?>
        <div>
          <?php
          require_once('templates/admin_nav.php');

          ?>
          <div class="row d-flex justify-content-around">
            <div class="col-md-5 mt-5">
              <?php
              include('templates/admin_panel_opinions.php');
              ?>
            </div>
            <div class="col-md-5 mt-5">
              <?php
              include('templates/admin_panel_messaging.php');
              ?>
            </div>
          </div>

        </div>
        <?php
        if ($role === 'administrateur') {
        ?>
          <div class="row d-flex justify-content-around>
            <div class="col-md-5 mt-5">
              <?php
              include('templates/admin_panel_account_management.php');
              ?>
            </div>
          </div>
    <?php
        }
      }
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