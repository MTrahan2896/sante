 function transfert_coord_perso(){
    $.ajax({
      type: "POST",
      url: "php_scripts/maj_coord_perso.php",
      data: {
             'prenom': $("#prenom_user").val(),
             'nom': $('#nom').val(),
             'courriel': $('#email').val(),
             'telephone':$('#tel').val(),
             'sexe': $("input[name='sexe']:checked"). val(),
             'type_user': $('#type_utilisateur_profil').val()
            },
      success: function (data) {
        alert(data);
        if(data == "Mise à jour du profil réussie")
        {
          location.reload();
        }
      },
      error: function (req) {
        alert("Erreur lors de la mise à jour du profil");
      }
    });
  }