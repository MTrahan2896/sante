function valider(){
    if(validateEmail($("#courriel").val())){
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
        }
    )
    }else alert("Couriel non conforme"); 
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


