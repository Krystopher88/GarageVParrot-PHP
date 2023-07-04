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
  <div class="row flex-lg-row-reverse align-items-center justify-content-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-3">
      <article>
        <h2>Qui sommes nous?</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur laboriosam eum unde voluptates
          explicabo maxime, qui provident velit maiores praesentium voluptas aliquid vero impedit temporibus facere</p>
      </article>
    </div>
    <?php 
      include('templates/slider_visitor_comments.php');
    ?>
    <!-- CARD SERVICE START -->
    <?php
    require_once('templates/cards-services.php')
    ?>
    <!-- CARD SERVICE END -->
    <!-- SLIDER USED VEHICLE START -->
    <?php
    include('templates/slider_used_vehicles.php');
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
<?php
  require_once('lib/importLibs.php');
?>
</html>
