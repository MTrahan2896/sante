<script>

var app = angular.module("app_angular", []); 
app.controller("ctrl", function($scope) {

    
    $scope.eleves = <?php echo phpSelectQuery('select utilisateurs.id_groupe, utilisateurs.nom, utilisateurs.prenom, utilisateurs.code_acces from utilisateurs')?>;
    
    $scope.groupes = <?php echo phpSelectQuery('select id_groupe, nom_groupe from groupes where ID_Prof = 1')?>;

    $scope.activites = <?php echo phpSelectQuery('select * from activites')?>;

    $scope.eleves_activites = <?php echo phpSelectQuery('select * from utilisateur_activites')?>;

    


        $scope.elevesDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		
    		return el.id_groupe == groupe && el.code_acces == "";
    	});
    	}

        $scope.elevesDansActivite = function(activite){

/*
        let x = $scope.eleves_activites.filter(function(el_ac){ //returns id only
                return el_ac.id_activite == activite;
        });  

        return $scope.eleves.filter(function(el){

            return x.includes(el.id_utilisateur)

        })
*/
        }


        $scope.comptesAvecCodeDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		
    		return el.id_groupe == groupe && el.code_acces != "";
    	});
    	}


    	 $scope.genererCodePourGroupe = function(groupe, nb_codes){
    	 	console.log($("#codeGroupe"+groupe).val());
    	 	 $.ajax({
            type: "POST",
            url: "php_scripts/generercode.php",
            data: {'id_groupe': groupe, 'nb_codes': $("#codeGroupe"+groupe).val() }, 
            success: function (data) {
                
                console.log(data);
            },
            error: function (req) {
                alert("erreur");
            }
        });

    	 }



    $scope.creergroupe = function() {
        
        console.log($("#rangeEleves").val());

        $.ajax({
            type: "POST",
            url: "php_scripts/creerGroupe.php",
            data: {
                'nomgroupe': $("#nomgroupe").val(),
                'id_prof': 1,
                'nb_codes': $("#rangeEleves").val()

            }, //TODO: CHANGE PROF ID
            success: function(data) {
            		
                    location.reload();
            		
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



	$scope.print = function(groupe){
		var prtContent = document.getElementById('codesGroupe'+groupe);
		var WinPrint = window.open('', '', 'left=0,top=0,width=1920,height=2000,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write("LISTE DES CODES D'ACCÈS <br>" + prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
	}

		$scope.supprimerGroupe = function(groupe, nomGroupe){

		var nom_Groupe = prompt("Pour confirmer la suppression, veuillez entrer le nom du groupe", "");

		if(nom_Groupe == nomGroupe){
		$.ajax({
            type: "POST",
            url: "php_scripts/supprimerGroupe.php",
            data: {
                'id_groupe': groupe,
            }, //TODO: CHANGE PROF ID
            success: function(data) {
            		
            		location.reload();
            },
            error: function(req) {
                alert("erreur");
            }
        });
		}
		}



});



</script>
