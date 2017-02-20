  function planifier_act(){
    $.ajax({
      type: "POST",
      url: "php_scripts/planifier_activite.php",
      data: {
             'nom_act': $("#nom_act").val(),
             'date_act': $("#date_act").val(),
             'heure_deb': $("#heure_deb").val(),
             'participants_max': $('#participants_max').val(),
             'frais': $('#frais').val(),
             'endroit':$('#endroit').val()
            },
      success: function (data) {
        alert("L'activité a été planifiée avec succès")
        console.log(data);
        $('#modal_planif').modal('close');
      },
      error: function (req) {
        alert("erreur");
      }
    });
  }