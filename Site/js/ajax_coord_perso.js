 function transfert_coord_perso(){
     if(validateNomPrenom($('#nom').val(),$("#prenom_user").val())){
       if(validateEmail($("#email").val())){
        if(validateTelephone($('#tel').val())){
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
       }else alert("Téléphone non conforme ex: (819) 597-5423");
     }else alert("Couriel non conforme ex: exemple@hotmail.com"); 
   }else alert("Votre prénom ne peut contenir des caractères spéciaux");
 }
 

 function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateTelephone(tel){
    
    if(tel == "")
    {
      return true;
    }  
    else
    {
    var re = /^\(\d{3}\)\s{0,1}\d{3}-\d{4}$/
    return re.test(tel);
    }
}
function validateNomPrenom(nom,prenom){
 
 if(hasWhiteSpace(nom) ||hasWhiteSpace(prenom)||verif_caracter_tiret(nom)||verif_caracter_tiret(prenom))
    {
      return false;
    }
    else
    {
      return true;
    }
}