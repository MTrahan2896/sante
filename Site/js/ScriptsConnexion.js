function post_connexion(){
    $.ajax({
            type: "POST",
            url: "php_scripts/connecter.php",
            data: {'nom_user': $("#username").val(),
                   'password': $('#pwd').val() }, 
            success: function (data) {
                alert("succes");
                console.log(data);
                console.log('f');
        },
            error: function (req) {
                alert("erreur");
            }
        });
}    


    