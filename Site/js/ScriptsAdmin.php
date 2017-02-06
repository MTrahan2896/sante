<script>

var app = angular.module("app_angular", []); 
app.controller("ctrl", function($scope) {

    
    $scope.eleves = <?php echo phpSelectQuery('select eleves.id_groupe, eleves.nom, eleves.prenom, eleves.points_bonus, eleves.points_debut_session, eleves.points_fin_session from eleves, groupes, professeurs where professeurs.ID_Prof = 1 and eleves.id_groupe = groupes.id_groupe and groupes.id_prof = professeurs.id_prof')?>;
    
    $scope.groupes = <?php echo phpSelectQuery('select id_groupe, nom_groupe from groupes where ID_Prof = 1')?>;

    $scope.elevesDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		
    		return el.id_groupe == groupe;
    	});
    }

    $scope.creergroupe = function() {
        $.ajax({
            type: "POST",
            url: "php_scripts/creerGroupe.php",
            data: {
                'nomgroupe': $("#nomgroupe").val(),
                'id_prof': 1
            }, //TODO: CHANGE PROF ID
            success: function(data) {
                $.ajax({
                    type: "POST",
                    url: "php_scripts/obtenirGroupes.php",
                    success: function(dt) {
                        alert("test");

                        $scope.groupes = JSON.parse(dt);                        
                        $scope.$apply()
                    },
                    error: function(req) {
                        alert("erreur");
                    }
                });
            },
            error: function(req) {
                alert("erreur");
            }
        });
    }

	setTimeout(function () {
        $scope.$apply(function () {
           console.log("scope applied");
        });
    }, 2000);





});



</script>
