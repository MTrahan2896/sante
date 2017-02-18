 function transfert_coord_ressource(){
    $.ajax({
      type: "POST",
      url: "php_scripts/maj_coord_ressource.php",
      data: {
             'prenom_ressource': $("#prenom_ressource").val(),
             'nom_ressource': $('#nom_ressource').val(),
             'lien_ressource': $('#lien_ressource').val(),
             'telephone_ressource':$('#tel_ressource').val()
            },
      success: function (data) {
        console.log(data);
      },
      error: function (req) {
        alert("erreur");
      }
    });
  }