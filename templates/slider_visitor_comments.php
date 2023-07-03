<?php 
$comments = getImportComments($pdo);
?>

<div class="row col-lg-8">
  <!-- SLIDER VISITOR COMMENTS START -->
  <div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- SLIDER START CONTENT -->
      <?php 
      $chunkedComments = array_chunk($comments, 3); // Divise les commentaires en groupes de 3 éléments
      
      foreach ($chunkedComments as $key => $chunk) {
        $active = ($key == 0) ? 'active' : '';
      ?>
      <div class="carousel-item <?=$active ?>">
        <div class="row justify-content-around">
          <!-- CARD START -->
          <?php foreach ($chunk as $comment) { ?>
            <div class="card" style="width: 12rem;">
              <div class="card-body">
                <h5 class="card-title"><?= $comment['name']; ?></h5>
                <p class="card-text"><?= $comment['opinion']; ?></p>
              </div>
            </div>
          <?php } ?>
          <!-- CARD END -->
        </div>
      </div>
      <?php } ?>
      <!-- SLIDER END CONTENT -->
    </div>
  </div>
  <!-- SLIDER VISITOR COMMENTS END -->
</div>










<!-- include('templates/slider_visitor_comments.php'); -->