<script>

var app = angular.module("app_angular", []); 
app.controller("ctrl", function($scope) {

    
   

    $scope.utilisateurs = <?php echo phpSelectQuery('Select problemes_sante.description
                                              from utilisateurs,problemes_sante,utilisateurs_problemes
                                              where utilisateurs.id_eleve = utilisateurs_problemes.id_utilisateur and
                                                    utilisateurs_problemes.id_probleme = problemes_sante.id_probleme')?>;




});



</script>
