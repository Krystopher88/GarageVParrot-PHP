$(document).ready(function() {
  $('.btn-edit').on('click', function(event) {
    event.preventDefault();
    let userInfo = $(this).data('user-info');

    // Remplir les champs de la modal avec les informations de l'utilisateur
    $('#editUserId').val(userInfo.id);
    $('#editIdentifier').val(userInfo.identifier);
    $('#editPassword').val(''); // Remettre le champ du mot de passe à vide (sécurité)
    $('#editEmail').val(userInfo.email);
    $('#editLastName').val(userInfo.last_name);
    $('#editFirstName').val(userInfo.first_name);

    // Afficher la modal
    $('#editAccountModal').modal('show');
  });
});
