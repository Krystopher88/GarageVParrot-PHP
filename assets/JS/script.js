$(document).ready(function() {
  // Sélectionner l'élément du slider par son ID
  var slider = $("#price-slider");

  // Initialiser le slider avec les options appropriées
  slider.slider({
    range: true, // Activer la sélection d'une plage de valeurs
    min: 0, // Valeur minimale du range
    max: 500000, // Valeur maximale du range
    values: [0 , 500000], // Plage de valeurs initiale
    step: 1000, // Pas d'incrémentation du slider
    create: function() {
      // Ajouter des ronds personnalisés
      var handles = slider.find(".ui-slider-handle");
      handles.eq(0).addClass("first-handle");
      handles.eq(1).addClass("second-handle");
      
      // Afficher les valeurs initiales du range dans la div
      var minPrice = slider.slider("values", 0);
      var maxPrice = slider.slider("values", 1);
      $("#price-values").text(minPrice + " - " + maxPrice);
    },
    slide: function(event, ui) {
      // Mettre à jour les valeurs des inputs cachés
      $("#minPrice").val(ui.values[0]);
      $("#maxPrice").val(ui.values[1]);
      
      // Mettre à jour les valeurs du range dans la div en temps réel
      $("#price-values").text(ui.values[0] + " - " + ui.values[1]);
    }
  });
});
