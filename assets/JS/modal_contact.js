const contactForm = document.querySelector('#contactForm');
const contactFormContainer = document.querySelector('#contactFormContainer')
const confirmationMessageContainer = document.querySelector('#confirmationMessageContainer');
const confirmationMessage = document.querySelector('#confirmationMessage');

contactForm.addEventListener('submit', function(e) {
  e.preventDefault();

  const emailInput = document.querySelector('#email');
  const lastNameInput = document.querySelector('#lastName');
  const firstNameInput = document.querySelector('#firstName');
  const phoneNumberInput = document.querySelector('#phoneNumber');
  const messageInput = document.querySelector('#message');

  const emailError = document.querySelector('#emailError');
  const lastNameError = document.querySelector('#lastNameError');
  const firstNameError = document.querySelector('#firstNameError');
  const phoneNumberError = document.querySelector('#phoneNumberError');
  const messageError = document.querySelector('#messageError');

  const email = emailInput.value;
  const lastName = lastNameInput.value;
  const firstName = firstNameInput.value;
  const phoneNumber = phoneNumberInput.value;
  const message = messageInput.value;

  // Réinitialiser les messages d'erreur
  emailError.innerText = '';
  lastNameError.innerText = '';
  firstNameError.innerText = '';
  phoneNumberError.innerText = '';
  messageError.innerText = '';

  // Valider les champs du formulaire
  if (email.trim() === '') {
    emailError.innerText = 'Veuillez entrer une adresse e-mail.';
    return;
  }

  if (lastName.trim() === '') {
    lastNameError.innerText = 'Veuillez entrer votre nom.';
    return;
  }

  if (firstName.trim() === '') {
    firstNameError.innerText = 'Veuillez entrer votre prénom.';
    return;
  }

  if (phoneNumber.trim() === '') {
    phoneNumberError.innerText = 'Veuillez entrer votre numéro de téléphone.';
    return;
  }

  if (message.trim() === '') {
    messageError.innerText = 'Veuillez entrer votre message.';
    return;
  }

  // Valider le format de l'email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    emailError.innerText = 'Veuillez entrer une adresse e-mail valide.';
    return;
  }

  // Valider le format du numéro de téléphone
  const phoneNumberRegex = /^\d{10}$/;
  if (!phoneNumberRegex.test(phoneNumber)) {
    phoneNumberError.innerText = 'Veuillez entrer un numéro de téléphone valide.';
    return;
  }

  // Masquer le formulaire et afficher le message de confirmation
  contactFormContainer.style.display = 'none';
  confirmationMessageContainer.style.display = 'block';
  confirmationMessage.innerText = 'Le formulaire a été envoyé avec succès';
});
