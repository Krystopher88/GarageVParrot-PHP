document.querySelector("#createAccountModal form").addEventListener("submit", function(event) {
  let formValid = true;

  // Vider les messages d'erreur précédents
  document.querySelectorAll(".error-message").forEach(function(error) {
    error.textContent = "";
  });

  const identifier = document.querySelector("#createAccountModal #createIdentifier").value.trim();
  const password = document.querySelector("#createAccountModal #createPassword").value.trim();
  const email = document.querySelector("#createAccountModal #createEmail").value.trim();
  const lastName = document.querySelector("#createAccountModal #createLastName").value.trim();
  const firstName = document.querySelector("#createAccountModal #createFirstName").value.trim();
  const role = document.querySelector("#createAccountModal #createRole").value.trim();

  if (identifier === "") {
    formValid = false;
    document.querySelector("#createAccountModal #identifierError").textContent = "Veuillez entrer l'identifiant.";
  }

  if (password === "") {
    formValid = false;
    document.querySelector("#createAccountModal #passwordError").textContent = "Veuillez entrer le mot de passe.";
  }

  if (email === "") {
    formValid = false;
    document.querySelector("#createAccountModal #emailError").textContent = "Veuillez entrer l'email.";
  }

  if (lastName === "") {
    formValid = false;
    document.querySelector("#createAccountModal #lastNameError").textContent = "Veuillez entrer le nom de famille.";
  }

  if (firstName === "") {
    formValid = false;
    document.querySelector("#createAccountModal #firstNameError").textContent = "Veuillez entrer le prénom.";
  }

  if (role === "") {
    formValid = false;
    document.querySelector("#createAccountModal #roleError").textContent = "Veuillez sélectionner le rôle.";
  }

  if (!formValid) {
    event.preventDefault(); // Empêche la soumission du formulaire
  }
});
