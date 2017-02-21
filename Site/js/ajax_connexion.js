  function post_connexion(){
    $.ajax({
            type: "POST",
            url: "php_scripts/connecter.php",
            data: {'nom_user': $("#username").val(),
                   'password': $('#pwd').val() }, 
            success: function (data) {
                console.log(data);
                if(data.toString() == 1){
                  location.reload();
                }else{
                  alert('Nom d\'utilisateur ou mot de passe invalide');
                }
                
        },
            error: function (req) {
                alert("erreur");
            }
        });
}        
