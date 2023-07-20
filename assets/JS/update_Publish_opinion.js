document.addEventListener("DOMContentLoaded", function () {
  // Sélectionnez tous les boutons switch par leur classe
  const switchButtons = document.querySelectorAll(".switchButton");

  // Ajoutez un écouteur d'événement à chaque bouton switch
  switchButtons.forEach(function (button) {
    button.addEventListener("change", function () {
      const opinionId = button.getAttribute("data-opinion-id");
      const isPublished = button.checked ? 1 : 0;

      const url = `./lib/update_publish_opinion.php?opinionId=${opinionId}&isPublished=${isPublished}`;

      fetch(url)
        .then(response => response.json())
        .then(data => {
          // Traiter la réponse si nécessaire
          console.log(data);
        })
        .catch(error => {
          console.error('Erreur lors de la mise à jour :', error);
        });
    });
  });
});