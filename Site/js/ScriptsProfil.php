<script>
var app = angular.module("app_profil", []); 
app.controller("ctrl", function($scope) {

    
       $scope.activites = <?php 
       						echo phpSelectQuery("select a.nom_activite, ap.date_activite, ap.Heure_Debut, a.Duree, a.Ponderation, ap.Frais, ap.Endroit, a.Commentaire, 							ua.ID_Eleve_Activite
       											from utilisateur_activites ua, activites_prevues ap, activites a 
       											where ua.ID_Utilisateur = {$_SESSION['uid']} and 
       											ua.ID_Activite_prevue = ap.ID_activite_prevue and
       											ap.ID_Activite = a.ID_Activite")
       						?>;
       console.log($scope.activites);

       $scope.dateToString = function(_date){

       		return (_date.toString());
       		
       }
       
$scope.annuler_participation = function(activite){
           
           if(confirm("Voulez-vous réellement annuler votre participation à l'activité: ".concat(activite.nom_activite.concat(" à la date: ".concat(activite.date_activite)))))
           {
           	
           	$.ajax({
            type: "POST",
            url: "php_scripts/annuler_participation.php",
            data: {
                'id_act_utilisateur': $('#id_act_utilisateur').val(),
                'date_activite': $('#date_act').val(),
                'heure':$('#heure_deb').val()
            }, 
            success: function(data) {
                console.log(data);
                if (data == "Vous avez quitté l'activité avec succès")
                {
                	location.reload();
                }                    
            },
            error: function(req) {
                alert("erreur");
            }
        });
           	
           }
           else
           {
           	console.log(activite.ID_Eleve_Activite);
    	   }
    }
});





</script>
