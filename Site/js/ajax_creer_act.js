  function creer_act(){
    $.ajax({
      type: "POST",
      url: "php_scripts/creer_activite.php",
      data: {
             'nom_act': $("#nom_activite").val(),
             'duree': $('#duree').val(),
             'nbr_pts': $('#point').val(),
             'couleur':$('#couleur_activite').val(),
             'desc':$('#description').val()
            },
      success: function (data) {
        console.log(data);
        alert("Création de l'activité réussie");
        $('#modal_new_activite').modal('close');
      },
      error: function (req) {
        alert("erreur");
      }
    });
  }
