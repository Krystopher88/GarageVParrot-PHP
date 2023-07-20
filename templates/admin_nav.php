  <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
        <a class="navbar-brand col-lg-3 me-0" href="#">Garage V. Parrot</a>
        <ul class="navbar-nav col-lg-6 justify-content-lg-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./admin.php">Accueil</a>
          </li>
          <?php if (!isset($_SESSION['user'])) {
            $role = $_SESSION['user']['role'];
          }
          if ($role === 'administrateur' or $role === 'employe') {
          ?>
              <li class="nav-item">
                <a class="nav-link" href="admin_management_opinion.php">Avis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_used_vehicled.php">Véhicules</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_messaging.php">Messagerie</a>
              </li>
            <?php
            if ($role === 'administrateur') {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="admin_openinghours.php">Gestions des Jours et horaires d'ouvertures</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_account_management.php">Employés</a>
              </li>
          <?php
            }
          }
          ?>

        </ul>
        <div class="d-lg-flex col-lg-3 justify-content-lg-end">
          <button class="btn btn-primary"><a class="dropdown-item" href="logout.php">Se deconnecter</a></button>
        </div>
      </div>
    </div>
  </nav>