function valider(){
    if( validateNomPrenom( $("#nom_t").val(), $("#prenom").val() )) {
      if(validateUsername($("#username").val())){
         if(validateEmail($("#courriel").val())){
            if(validateTelephone($("#telephone").val())){
                if(validatePassword($("#pass").val()) && validatePassword($("#confpass").val())){
                    $.ajax({
                       type: "POST",
                       url: "php_scripts/inscrire.php",
                       data: {
                       'username': $("#user").val(), 
                       'prenom': $("#prenom").val(), 
                       'nom': $("#nom_t").val(), 
                       'courriel': $("#courriel").val(), 
                       'telephone': $("#telephone").val(), 
                       'sexe': $("input[type='radio'][name='sexe']:checked").val(),
                       'password': $("#pass").val(),
                       'confirm_password': $("#confpass").val(),
                       'type_utilisateur':$("#type_utilisateur").val(),
                       'code' : $("#code_acces").val()}, 
                       success: function (data) {
                           alert(data);
                           if(data == "Inscription réussie")
                           {
                               location.reload();
                           }
                       },
                       error: function (req) { 
                       }
                    })
                }else alert("le mot de passe ne peut contenir un espace");
             }else alert("telephone non conforme ex: (819) 597-5423");
            }else alert("Couriel non conforme ex: exemple@hotmail.com"); 
        }else alert("votre nom d'utilisateur ne peut contenir des caractères spéciaux");
    }else alert("votre nom et prénom ne peut contenir des caractères spéciaux");
}


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateTelephone(tel){
    var re = /^\(\d{3}\)\s{0,1}\d{3}-\d{4}$/
    return re.test(tel);
}

function validateNomPrenom(nom,prenom){
 return (hasWhiteSpace(nom) ||hasWhiteSpace(prenom)||verif_caracter_tiret(nom)||verif_caracter_tiret(prenom));
}

function validateUsername(username){
 return (hasWhiteSpace(username) || verif_caracter_underscore(username));
}

function validatePassword(pass){
    return (hasWhiteSpace(pass));
}


