<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $identifiant = $_POST['identifiant'];
  $password = $_POST['password'];

  if (login($identifiant, $password, $pdo)) {
    header('location: admin.php');
    exit();
  } else {
    echo "Identifiant ou mot de passe incorrect";
  }
}
?>



<main class="form-signin m-auto text-center d-flex justify-content-center">
  <form class="col-md-4" action="<?= $_SERVER['PHP_SELF']?>" method="POST">
    <img class="mb-4" src="./assets/images/logo_header.png" alt="">
    <h1 class="h3 mb-3 fw-normal">Connexion</h1>

    <div class="form-floating my-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Identifiant" name="identifiant">
      <label for="floatingInput">Identifiant</label>
    </div>
    <div class="form-floating my-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" name="password">
      <label for="floatingPassword">Mot de passe</label>
    </div>

    <button class="btn btn-primary w-100 py-2 my-3" type="submit">Se connecter</button>
  </form>
</main>
