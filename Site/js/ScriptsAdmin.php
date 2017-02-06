<script>

var app = angular.module("app_angular", []); 
app.controller("ctrl", function($scope) {

    
    $scope.eleves = <?php echo phpSelectQuery('select eleves.id_groupe, eleves.nom, eleves.prenom, eleves.code_acces, eleves.points_bonus, eleves.points_debut_session, eleves.points_fin_session from eleves, groupes, professeurs where professeurs.ID_Prof = 1 and eleves.id_groupe = groupes.id_groupe and groupes.id_prof = professeurs.id_prof')?>;
    
    $scope.groupes = <?php echo phpSelectQuery('select id_groupe, nom_groupe from groupes where ID_Prof = 1')?>;

    $scope.elevesDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		
    		return el.id_groupe == groupe;
    	});
    	}

        $scope.elevesDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		
    		return el.id_groupe == groupe && el.code_acces == "";
    	});
    	}


        $scope.comptesAvecCodeDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		
    		return el.id_groupe == groupe && el.code_acces != "";
    	});
    	}


    	 $scope.genererCodePourGroupe = function(groupe, nb_codes){

    	 	 $.ajax({
            type: "POST",
            url: "php_scripts/generercode.php",
            data: {'id_groupe': groupe, 'nb_codes': $("#codeGroupe"+groupe).val() }, 
            success: function (data) {
                location.reload();
            },
            error: function (req) {
                alert("erreur");
            }
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
            		location.reload();
            },
            error: function(req) {
                alert("erreur");
            }
        });
    }

    $scope.su

	setTimeout(function () {
        $scope.$apply(function () {
           console.log("scope applied");
        });
    }, 2000);



	$scope.print = function(groupe){
		var prtContent = document.getElementById('codesGroupe'+groupe);
		var WinPrint = window.open('', '', 'left=0,top=0,width=1920,height=2000,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write("LISTE DES CODES D'ACCÈS <br>" + prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
	}



});



</script>
