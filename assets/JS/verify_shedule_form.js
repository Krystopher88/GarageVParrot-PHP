// Fonction de validation
function validateOpeningHours() {
  // Récupérer tous les champs d'heure et les messages d'erreur correspondants
  const openingTimeInputs = document.querySelectorAll('input[name^="opening_time"]');
  const closingTimeInputs = document.querySelectorAll('input[name^="closing_time"]');
  const openingTimeErrorMessages = document.querySelectorAll('.opening-time-error-message');
  const closingTimeErrorMessages = document.querySelectorAll('.closing-time-error-message');

  // Supprimer tous les messages d'erreur existants
  openingTimeErrorMessages.forEach(message => message.textContent = '');
  closingTimeErrorMessages.forEach(message => message.textContent = '');

  // Vérifier chaque champ d'heure
  let isValid = true;
  for (let i = 0; i < openingTimeInputs.length; i++) {
    const openingTime = openingTimeInputs[i].value;
    const closingTime = closingTimeInputs[i].value;
    const dayOfWeek = openingTimeInputs[i].parentNode.parentNode.querySelector('td[data-day]').getAttribute('data-day');

    // Vérifier si les valeurs sont des chiffres entiers et respectent le format '00:00:00'
    const timeRegex = /^\d{2}:\d{2}:\d{2}$/;

    // Vérifier le cas du dimanche avec champs vides
    if (dayOfWeek.toLowerCase() === 'dimanche' && openingTime === '' && closingTime === '') {
      continue; // Passer à l'itération suivante sans vérifier la validité
    }

    if (!timeRegex.test(openingTime) || !timeRegex.test(closingTime)) {
      if (openingTime !== '') {
        openingTimeErrorMessages[i].textContent = "Veuillez saisir une heure valide au format '00:00:00'.";
      }
      if (closingTime !== '') {
        closingTimeErrorMessages[i].textContent = "Veuillez saisir une heure valide au format '00:00:00'.";
      }
      isValid = false;
    }
  }

  return isValid;
}

// Ajouter un gestionnaire d'événement à la soumission du formulaire
const form = document.getElementById('openingHoursForm');
form.addEventListener('submit', function(event) {
  if (!validateOpeningHours()) {
    event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
  }
});
