<?php
  require_once('templates/head.php')
?>


<body class="container">
<!-- HEADER START -->
<?php
  require_once('templates/header.php')
?>
<!-- HEADER END -->

  <!-- MAIN START -->
  <div class="row flex-lg-row-reverse align-items-center justify-content-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-3">
      <article>
        <h2>Qui sommes nous?</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur laboriosam eum unde voluptates
          explicabo maxime, qui provident velit maiores praesentium voluptas aliquid vero impedit temporibus facere</p>
      </article>
    </div>
    <div class=" row col-lg-8">
    <!-- SLIDER VISITOR COMMENTS START -->
    <?php
      require_once('templates/slider_visitor_comments.php')
    ?>
    <!-- SLIDER VISITOR COMMENTS END -->
    </div>
    <!-- CARD SERVICE START -->
    <?php
      require_once('templates/cards-services.php')
    ?>
    <!-- CARD SERVICE END -->
    <!-- SLIDER USED VEHICLE START -->
    <?php
      require_once('templates/slider_used_vehicles.php')
    ?>
    <!-- SLIDER USED VEHICLE END -->
  </div>
  <!-- MAIN END -->
<!-- FOOTER START -->
<?php
  require_once('templates/footer.php')
?>
<!-- FOOTER END -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>

<?php

?>