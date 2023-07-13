$(document).ready(function() {
  // Affichage de la modal de confirmation ou d'erreur si nécessaire
  if (getUrlParameter('success')) {
    $('#confirmationModal').modal('show');
  } else if (getUrlParameter('error')) {
    $('#erreurModal').modal('show');
  }
});

// Fonction pour obtenir les paramètres d'URL
function getUrlParameter(name) {
  name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
  let regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
  let results = regex.exec(location.search);
  return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
