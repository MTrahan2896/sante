<script>

var app = angular.module("app_angular", []); 
app.controller("ctrl", function($scope) {

    
    $scope.eleves = <?php echo phpSelectQuery('select id_utilisateur, nom, prenom, id_groupe,code_acces, actif, courriel, telephone, sexe, username, password, administrateur from utilisateurs')?>;
    
    $scope.groupes = <?php echo phpSelectQuery('select id_groupe, nom_groupe from groupes')?>;

    $scope.activites = <?php echo phpSelectQuery('select * from activites where hidden=false or hidden is null')?>;

    $scope.activites_prevues = <?php echo phpSelectQuery('select * from activites_prevues where hidden=false or hidden is null order by presences_prises')?>;

    $scope.eleves_activites = <?php echo phpSelectQuery('select * from utilisateur_activites')?>;

    $scope.sessions = <?php echo phpSelectQuery('select * from sessions')?>;

    $scope.codesAdmin = <?php echo phpSelectQuery('select * from utilisateurs where administrateur = 1 and not CODE_ACCES=""')?>;

    $scope.ensembles = [1, 2, 3];

    $scope.utilisateursSansGroupes =   <?php echo phpSelectQuery('select * from utilisateurs where id_groupe is null and CODE_ACCES=""')?>;

    $scope.comptesAdministrateur = (<?php echo phpSelectQuery('select * from utilisateurs where administrateur >= 1 and CODE_ACCES=""')?>);


    $scope.responsableSelectionne;
    
    $scope.supprimerActivite = function(id){



             if (confirm("Vous êtes sur le point de supprimer cette activité, êtes vous sûr?") == true) {
                             $.ajax({
            type: "POST",
            url: "php_scripts/supprimerActivite.php",
            data: {
                'ID_ACTIVITE': id,
            }, //TODO: CHANGE PROF ID
            success: function(data) {
                console.log(data);
                    location.reload();
                    
            },
            error: function(req) {
                alert("erreur");
            }
        });

             } 



    }
    
    $scope.niveauxAdmin=['Administrateur', 'Planificateur'];

        $scope.saveAdmin = function(){
            $.ajax({
            type: "POST",
            url: "php_scripts/updateAdmin.php",
            data: {
                'user': $('#utilisateurNivAdmin').val(),
                'admin': $('#niveauUser').val()
            }, //TODO: CHANGE PROF ID
            success: function(data) {
                    location.reload();
                    
            },
            error: function(req) {
                alert("erreur");
            }
            });

        }


        $scope.show_params = function(){
            alert('test');
        }

        $scope.nomActiviteFromId = function(id){

            let act = $scope.activites.filter(function(ac){
                return ac.ID_Activite == id;
            })[0];

            return act.Nom_Activite;

        }

        $scope.test222 = function(){
            alert($('#selectResponsable').val());
        }

        $scope.adminLevelFromID = function(admin){

            let adminLevel;

            switch(admin) {
            case '2':
                adminLevel = 'Administrateur';
                break;
            case '1':
                adminLevel = 'Responsable';
            break;
            default:
            adminLevel = 'Utilisateur Régulier';
            
            }
            return adminLevel;

        }


        $scope.elevesDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		
    		return el.id_groupe == groupe && el.code_acces == "";
    	});
    	}

        $scope.eleveFromId = function(id){
        return $scope.eleves.filter(function(el){
            
            return el.id_utilisateur == id;
        })[0];
        }

        $scope.getElevesForActivitePrevue = function(activite){

           let liste_el_ac = ( $scope.eleves_activites.filter(function(ac){
                return ac.ID_Activite_Prevue == activite;
            }));

     
           var listeId = liste_el_ac.map(function(a) {return a.ID_Utilisateur;});

            let arr =[];

            for (var i = 0; i < listeId.length; i++) {   
                arr.push($scope.eleveFromId(listeId[i]));
            }
               return arr;

        }

        $scope.getPresenceForEleve = function(activite_prevue, eleve){

           let present = ( $scope.eleves_activites.filter(function(ac){
                return ac.ID_Activite_Prevue == activite_prevue && ac.ID_Utilisateur == eleve;
            }))[0].Present;

        
           

           if(present == 1){
            return true;
           }
           else return false;
           

        }

        $scope.annulerActivite = function(activite){

             if (confirm("Vous êtes sur le point de supprimer cette activité, êtes vous sûr?") == true) {
                             $.ajax({
            type: "POST",
            url: "php_scripts/annulerActivite.php",
            data: {
                'ID_ACTIVITE': activite,
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



        $scope.eleveFromId = function(id){

            
            let elev = $scope.eleves.filter(function(el){
                return el.id_utilisateur == id;
            })[0];
            
            return elev;

        }


        $scope.enregistrerPresence = function(activite_prevue){
        var values = new Array();
        $.each($("input[name='presenceActivite"+activite_prevue+"']:checked"), function() {
        values.push($(this).val());
        });
        

        $.ajax({
            type: "POST",
            url: "php_scripts/prendrePresence.php",
            data: {
                'PRESENTS': values,
                'ACTIVITE': activite_prevue
            }, //TODO: CHANGE PROF ID
            success: function(data) {
                    location.reload();
            },
            error: function(req) {
                alert("erreur");
            }
        });



        }


        $scope.comptesAvecCodeDansGroupe = function(groupe){
    	return $scope.eleves.filter(function(el){
    		return el.id_groupe == groupe && el.code_acces != "";
    	});
    	}



        $scope.comptesAdmin = function(groupe){
        return $scope.eleves.filter(function(el){
            return el.administrateur >= 1 && el.code_acces == "";
        });
        }



    	 $scope.genererCodePourGroupe = function(groupe, nb_codes){
    	 	console.log($("#codeGroupe"+groupe).val());
    	 	 $.ajax({
            type: "POST",
            url: "php_scripts/generercode.php",
            data: {'admin' : 0, 'id_groupe': groupe, 'nb_codes': $("#codeGroupe"+groupe).val() }, 
            success: function (data) {
                location.reload();
                console.log(data);
            },
            error: function (req) {
                alert("erreur");
            }
        });

    	 }

        $scope.genererCodeAdmin = function(nb_codes){
            
             $.ajax({
            type: "POST",
            url: "php_scripts/generercode.php",
            data: {'admin' : $('input[name=niveauAdmin]:checked').val(), 'id_groupe': 'null', 'nb_codes': $("#codeAdmin").val() }, 
            success: function (data) {
                
                console.log(data);
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
                'id_prof': 1,
                'nb_codes': $("#rangeEleves").val(),
                'ensemble': $("#ensemble").val(),
                'session':  $("#session").val()

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
        $scope.$apply();
    }, 2000);

    $scope.ouvrirModalModifierPermission= function(id_admin, niveau){
        console.log(id_admin+" .... "+niveau);
    $("#utilisateurNivAdmin").val(id_admin);
    $('#modal_niveauAdmin').modal('open');
    $('#niveauUser').val(niveau).change();
    $('#niveauUser').material_select();

}

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

$("#selectResponsable").val($("#selectResponsable option:first").val());
    $('#selectResponsable').material_select()
</script>
