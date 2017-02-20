  function creer_session(){
    $.ajax({
            type: "POST",
            url: "php_scripts/creer_session.php",
            data: {'nom': $("#nom_session").val(),
                   'deb': $('#deb_session').val(),
                   'mi': $("#mi_session").val(),
                   'fin': $('#fin_session').val() }, 
            success: function (data) {
                console.log(data);               
        },
            error: function (req) {
                alert("erreur");
            }
        });
}        
