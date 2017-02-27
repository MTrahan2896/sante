<script>

var app = angular.module("app_angular", []); 
app.controller("ctrl", function($scope) {

    
    $scope.eleves = <?php echo phpSelectQuery('select id_utilisateur, nom, prenom, id_groupe,code_acces, actif, courriel, telephone, sexe, username, password, administrateur from utilisateurs order by nom ASC')?>;
    
    $scope.groupes = <?php echo phpSelectQuery('select id_groupe, nom_groupe, id_prof, ensemble, nom_session, groupes.id_session from groupes, sessions where groupes.id_session = sessions.id_session order by nom_groupe ASC')?>;

    $scope.activites = <?php echo phpSelectQuery('select * from activites where hidden=false or hidden is null')?>;

    $scope.activites_prevues = <?php echo phpSelectQuery('select * from activites_prevues where hidden=false or hidden is null order by presences_prises, date_activite ')?>;

    $scope.eleves_activites = <?php echo phpSelectQuery('select * from utilisateur_activites')?>;

    $scope.sessions = <?php echo phpSelectQuery('select * from sessions order by debut_session ASC')?>;

    $scope.codesAdmin = <?php echo phpSelectQuery('select * from utilisateurs where administrateur = 1 and not CODE_ACCES=""')?>;

    $scope.ensembles = [1, 2, 3];

    $scope.utilisateursSansGroupes =   <?php echo phpSelectQuery('select * from utilisateurs where id_groupe is null and CODE_ACCES="" order by nom ASC')?>;

    $scope.comptesAdministrateur = <?php echo phpSelectQuery('select * from utilisateurs where administrateur >= 1 and CODE_ACCES="" order by nom ASC')?>;

    $scope.points_debut = <?php echo phpSelectQuery('select sum(ponderation) as points_debut, utilisateurs.id_utilisateur
    from utilisateurs, activites, activites_prevues, utilisateur_activites, sessions, groupes 
            where activites_prevues.id_activite = activites.id_activite 
            and utilisateur_activites.id_activite_prevue = activites_prevues.ID_activite_prevue 
            and utilisateur_activites.id_utilisateur = utilisateurs.id_utilisateur
            and utilisateurs.ID_Groupe = groupes.ID_Groupe
            and groupes.ID_Session = sessions.ID_Session
            and activites_prevues.date_activite > sessions.Debut_Session
            and activites_prevues.date_activite < sessions.mi_session
            and utilisateur_activites.present = 1
            group by utilisateurs.id_utilisateur')?>;

    $scope.points_fin = <?php echo phpSelectQuery('select sum(ponderation) as points_fin, utilisateurs.id_utilisateur
    from utilisateurs, activites, activites_prevues, utilisateur_activites, sessions, groupes 
            where activites_prevues.id_activite = activites.id_activite 
            and utilisateur_activites.id_activite_prevue = activites_prevues.ID_activite_prevue 
            and utilisateur_activites.id_utilisateur = utilisateurs.id_utilisateur
            and utilisateurs.ID_Groupe = groupes.ID_Groupe
            and groupes.ID_Session = sessions.ID_Session
            and activites_prevues.date_activite > sessions.mi_Session
            and activites_prevues.date_activite < sessions.fin_session
            and utilisateur_activites.present = 1
            group by utilisateurs.id_utilisateur')?>

    $scope.responsableSelectionne;

            $scope.masquerPresence = true;
        $scope.masquerPasse = true;
        $scope.masquerGroupes = true;

    $scope.show_params = function(activite){
        $('#modal_mod_planif').modal('open');
        console.log(activite);
        $('#ID_ACT_PLAN').val(activite.ID_activite_prevue);

        $('#mod_nom_act').val(activite.ID_Activite);
        $('#mod_nom_act').material_select();
        $('#mod_date_act').val(activite.Date_Activite);
        $('#mod_heure_deb').val(activite.Heure_debut);
        $('#mod_participants_max').val(activite.Participants_Max);
        $('#mod_frais').val(activite.Frais);
        $('#mod_endroit').val(activite.Endroit);
        $('#mod_responsable').val(activite.responsable);
        $('#mod_responsable').material_select();
        $('.ACTIVER').addClass( "active" );
    

    }
    

        $scope.pointsDebutForEleve = function(id){
       let pts = $scope.points_debut.filter(function(el){
            
            return el.id_utilisateur == id;
        })[0].points_debut;

        if(pts > 5){
            return 5;
        }
        else return pts;

        }

        $scope.pointsFinForEleve = function(id){
        let pts =  $scope.points_fin.filter(function(el){
            
            return el.id_utilisateur == id;
        })[0].points_fin;

        if(pts > 5){
            return 5;
        }
        else return pts;
        }


        $scope.pointsBonusForEleve = function(id){
        let pts_fin = $scope.points_fin.filter(function(el){
            return el.id_utilisateur == id;
        })[0].points_fin;

        let pts_debut = $scope.points_debut.filter(function(el){
            
            return el.id_utilisateur == id;
        })[0].points_debut;

        let pts_bonus = 0;

        if(pts_fin > 5){
            pts_bonus += pts_fin -5;
        }

        if(pts_debut > 5){
            pts_bonus += pts_debut -5;
        }
        return pts_bonus;
        }


    $scope.modifierActivitePrevue = function(){

        $.ajax({
            type: "POST",
            url: "php_scripts/modifierActivitePrevue.php",
            data: {
                'ID_ACTIVITE_PREVUE': $('#ID_ACT_PLAN').val(),
                'ID_ACTIVITE': $('#mod_nom_act').val(),
                'DATE_ACT':  $('#mod_date_act').val(),
                'HEURE_ACT':  $('#mod_heure_deb').val(),
                'PARTICIPANTS_MAX' : $('#mod_participants_max').val(),
                'FRAIS':  $('#mod_frais').val(),
                'ENDROIT':  $('#mod_endroit').val(),
                'RESPONSABLE': $('#mod_responsable').val()
            }, //TODO: CHANGE PROF ID
            success: function(data) {
                console.log(data);
                   
                    
            },
            error: function(req) {
                alert("erreur");
            }
        });


    }
    
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

    $scope.modifierActivite = function(activite){
        console.log(activite);
        $('#id_mod_act').val(activite.ID_Activite); 
        $('#nom_activite_mod').val(activite.Nom_Activite);     
        $('#duree_mod').val(activite.Duree); 
        $('#point_mod').val(activite.Ponderation);
         $('#description_mod').val(activite.Commentaire);
        $('#modal_mod_new_activite').modal("open");
        $('#modal_mod_new_activite label').addClass( "active");
    }

    $scope.modifierSession = function(session){
        console.log(session);
        $('#id_session_mod').val(session.ID_Session);   
        $('#nom_session_mod').val(session.Nom_Session);     
        $('#deb_session_mod').val(session.Debut_Session); 
        $('#mi_session_mod').val(session.Mi_Session);
        $('#fin_session_mod').val(session.Fin_Session);
        $('#modal_session_mod').modal('open');
        $('#modal_session_mod label').addClass( "active");

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

        $scope.now = new Date();

        $scope.toDate = function(dateMod){
            return new Date(dateMod);
        }
        $scope.scopePrint = function(val){
            console.log(val);
        }
        

        $scope.activiteFromId = function(id){

            let act = $scope.activites.filter(function(ac){
                return ac.ID_Activite == id;
            })[0];

            return act;

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
