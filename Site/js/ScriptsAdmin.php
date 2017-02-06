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



 
 console.log ($scope.eleves);
 console.log ($scope.groupes);

});
</script>
