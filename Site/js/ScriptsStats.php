<script>

/*
POST: stat
groupesParEnsemble
utilisateursParType
ratioSexe
nbAvecSansGroupe
utilisateursParEnsemble
participationParActiviteParSession
participationMoyenneParEtudiant
 */

    
    var app = angular.module("app_profil", []);
    app.controller("ctrl", function($scope) {

    $scope.sessions = <?php echo phpSelectQuery('select * from sessions order by debut_session ASC')?>;

    let statsGroupesEnsemble = [];

    $scope.sessions.forEach(function(session) {
    
	});



	 $.ajax({
                type: "POST",
                url: "php_scripts/ScriptsStats.php",
                data: {
                    'session': 1,
                    'stat': "groupesParEnsemble",
                       }, //TODO: CHANGE PROF ID
                success: function(data) {

              console.log(data)


                },
                error: function(req) {
                    alert("erreur");
                }
            });


    }


</script>
