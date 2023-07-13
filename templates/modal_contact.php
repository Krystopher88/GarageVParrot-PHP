<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel">Formulaire de contact</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="contactFormContainer">
        <form id="contactForm" action="">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
            <small class="text-danger" id="emailError"></small>
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastName" placeholder="Entrez votre nom">
            <small class="text-danger" id="lastNameError"></small>
          </div>
          <div class="mb-3">
            <label for="firstName" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstName" placeholder="Entrez votre prénom">
            <small class="text-danger" id="firstNameError"></small>
          </div>
          <div class="mb-3">
            <label for="phoneNumber" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="phoneNumber" placeholder="Entrez votre numéro de téléphone">
            <small class="text-danger" id="phoneNumberError"></small>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="4" placeholder="Entrez votre message"></textarea>
            <small class="text-danger" id="messageError"></small>
          </div>
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>
      <div class="confirmation-message-container" id="confirmationMessageContainer">
        <h5 class="modal-title">Confirmation</h5>
        <p id="confirmationMessage">fdhbdfgbhdgfbb</p>
      </div>
    </div>
  </div>
</div>