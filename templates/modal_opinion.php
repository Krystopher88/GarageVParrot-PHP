<div class="modal fade" id="opinionModal" tabindex="-1" aria-labelledby="opinionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="opinionModalLabel">Ajouter une opinion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulaire d'ajout d'opinion -->
        <form id="opinionForm" method="post" action="lib/create_opinion.php">
          <div class="mb-3">
            <label for="name" class="form-label">Votre Prénom</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="mb-3">
            <label for="opinion" class="form-label">Votre avis sur notre garage</label>
            <textarea class="form-control" name="opinion" id="opinion" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="number" class="form-control" name="note" id="note" min="1" max="5" required>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
</div>