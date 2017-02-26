<?php  
       if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
if(isset($_SESSION['admin'])){
    if ($_SESSION['admin'] == '0'){
     header('Location: accueil.php');
    }

}else{ header('Location: accueil.php');};

?>

<html ng-app='app_angular' ng-controller="ctrl">
  <head>
    <?php include 'components/headContent.php';?>
  </head>
  <body>
    
    <header>
      <?php include 'components/nav.php';?>
      
    </header>
    <main>
  <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large blue darken-2">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating blue"><i class="material-icons">home</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">supervisor_account</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">directions_bike</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">assessment</i></a></li>
    </ul>
  </div>
    <script>
      
      
    </script>
    <div class="container">
      <h4>Administration</h4>
      <ul class="collapsible" data-collapsible="expandable">
        <li>
          <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Groupes <span class="new badge blue right" data-badge-caption="">{{groupes.length}}</span></div>
          <div class="collapsible-body" class="collapsibleWithButton" style="padding-bottom: 45px !important">
          <div class="center"><h4>Groupes</h4></div>
          <div class="container">
            <div input-field class="center">
              <input type="checkbox" checked name="masquerGroupes" ng-model="masquerGroupes" id="masquerGroupes" value="1" class="field filled-in">  
              <label for="masquerGroupes" style="margin-top: 10px" >Masquer les groupes dont je ne suis pas responsable</label>
              <br>
              <div class="row">
              <br>
              </div>
         
              
              
              
              </div>
              
          </div>

           

            <ul class="collapsible" data-collapsible="expandable" >
              
              <li ng-repeat="groupe in groupes" ng-show="(groupe.id_prof == <?=$_SESSION['uid']?>) || !masquerGroupes"> <!-- ANGULAR REPEAT -->
              <div class="collapsible-header"><i class="material-icons">supervisor_account</i>{{groupe.nom_groupe}}

                <span class="hide-on-small-only new badge blue right" data-badge-caption="">{{elevesDansGroupe(groupe.id_groupe).length}} élève<span ng-show="elevesDansGroupe(groupe.id_groupe).length>1">s</span></span>
                <i class="material-icons right" ng-show="!(groupe.id_prof == <?=$_SESSION['uid']?>)" title="Vous n'êtes pas responsable de ce groupe">lock</i>
              </div>

              <div class="collapsible-body collapsibleWithButton"><div class="container">
              <b>Session: </b>{{groupe.nom_session}} <br>
              <b>Ensemble: </b>{{groupe.ensemble}} <br>
              <b>Professeur responsable: </b>{{eleveFromId(groupe.id_prof).nom}}, {{eleveFromId(groupe.id_prof).prenom}}


              </div>

                <table class="striped" align="center">
                  <thead><tr><td>Nom</td><td class="center">Points accumulés</td></tr></thead>
                  <tr  ng-repeat="eleve in elevesDansGroupe(groupe.id_groupe)">
                    
                    <td class="">{{eleve.nom}}, {{eleve.prenom}}</td>
                    <td style="text-align: center" class="center">{{}}/15</td>
                    
                  </div>
                </tr>
              </table>
              <div class="row" style="text-align: center">
              <button data-target="modalGenGroupe{{groupe.id_groupe}}" ng-show="(groupe.id_prof == <?=$_SESSION['uid']?>)" style="margin-bottom: 15px !important; margin-top: 30px !important" class="btn" >Générer des codes d'accès</button></div>
              <div class="row"  style="text-align: center">
                <button data-target="modalGroupe{{groupe.id_groupe}}" ng-show="(groupe.id_prof == <?=$_SESSION['uid']?>)" style="margin-bottom: 15px !important" class="btn  modal-trigger">Afficher les codes d'accès</button>
              </div>
              <div class="row"  style="text-align: center">
                <button ng-click="supprimerGroupe(groupe.id_groupe, groupe.nom_groupe)" ng-show="(groupe.id_prof == <?=$_SESSION['uid']?>)" style="margin-bottom: 15px !important" class="btn red modal-trigger">Supprimer le groupe</button>
              </div>

            </div>
            
          </li>
        </ul>


          <ul class="collapsible" data-collapsible="expandable" >
              
              <li> <!-- SANS GROUPE -->
              <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Utilisateurs sans groupes
                
                <span class="new badge blue right hide-on-small-only" data-badge-caption="">{{utilisateursSansGroupes.length}} Utilisateur<span ng-show="utilisateursSansGroupes.length>1">s</span></span>
              </div>
              <div class="collapsible-body collapsibleWithButton">
              <table class="striped" align="center">
              <thead> <th>Utilisateur</th></thead>
                    <tr ng-repeat="eleve in utilisateursSansGroupes"><td> {{eleve.Nom}}, {{eleve.Prenom}}</td></tr>
</table>
                                 <div class="row" style="text-align: center">
              <button data-target="modalGenGroupe0" style="margin-bottom: 15px !important; margin-top: 30px !important" class="btn" >Générer des codes d'accès</button></div>
              <div class="row"  style="text-align: center">
                <button data-target="modalGroupe0" style="margin-bottom: 15px !important" class="btn  modal-trigger">Afficher les codes d'accès</button>
              </div>

              </div>

            
               </li>
          </ul>

        <button data-target="modalNouveauGroupe" style="margin-bottom: 0px !important" class="btn right">Nouveau Groupe</button>
      </div>
      
      <li>
        <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités Prévues<span class="new badge green right" data-badge-caption="">{{activites_prevues.length}}</span></div>
        
        <div class="collapsible-body">
          <div class="center">
          <h4>Activités Planifiées</h4>
          </div>
          <div class="container">
          <input type="checkbox" checked name="masquerPasse" ng-model="masquerPasse" id="masquerPasse" value="1" class="filtresActivites field filled-in">  
            <label for="masquerPasse" style="margin-top: 10px" >Masquer les activités passées</label>
          <br>

          <input type="checkbox" checked name="masquerPresence" id="masquerPresence" ng-model="masquerPresence" value="1" class="filtresActivites field filled-in">  
            <label for="masquerPresence" style="margin-top: 10px" >Masquer les activités où les présences ont été prises</label>


            <br><br>  
          </div>
          <ul class="collapsible" data-collapsible="expandable">
            
            
            <li ng-repeat="activite in activites_prevues" ng-show="!(activite.presences_prises > 0 && masquerPresence) && !(toDate(activite.Date_Activite) < now && masquerPasse) ">
            <!-- ANGULAR REPEAT -->
            <div class="collapsible-header">
              <i class="material-icons">directions_bike</i>{{activiteFromId(activite.ID_Activite).Nom_Activite}} le {{activite.Date_Activite}} à {{activite.Heure_debut}}
                
              <span class=" hide-on-small-only new badge green right" data-badge-caption="">{{getElevesForActivitePrevue(activite.ID_activite_prevue).length}}/{{activite.Participants_Max}}</span>
              <i class=" hide-on-small-only material-icons right" ng-show="activite.presences_prises > 0">playlist_add_check</i>
              <i class=" hide-on-small-only material-icons right" style="pointer-events: visiblePainted !important;" ng-click="show_params(activite)">settings</i>

              
            </div>
            <div class="collapsible-body collapsibleWithButton container">
              
              <table>
                <b>Responsable: </b>{{eleveFromId(activite.responsable).nom}}, {{eleveFromId(activite.responsable).prenom}}
                <br>  
                <b>Frais: </b> {{activite.Frais}}$ <br>  
                <b>Endroit: </b> {{activite.Endroit}} <br>  
                <b>Commentaire: </b>{{activiteFromId(activite.ID_Activite).Commentaire}}

                  <br>
                  
                  <br>  
                    <h5>Liste de présences <span style="color: green; font-size: 0.75em" ng-show="activite.presences_prises > 0"> - Présences prises</span></h5> 
                 <table> 
                 <thead><th>Nom</th><th class="center">Présent</th>  </thead>
                <tr  ng-repeat="eleve in getElevesForActivitePrevue(activite.ID_activite_prevue)">
                  <td class="col s8">{{eleve.nom}}, {{eleve.prenom}}</td><td class="col s2 center">
                  
                  <input class="field filled-in" ng-checked="{{getPresenceForEleve(activite.ID_activite_prevue, eleve.id_utilisateur)}}" type="checkbox" name="viewid{{activite.ID_activite_prevue}}" value="{{eleve.id_utilisateur}}" disabled readonly
                  id="viewid{{activite.ID_activite_prevue}}-{{eleve.id_utilisateur}}" style="margin-right: 15px; margin-top: 15px">
                  <label for="viewid{{activite.ID_activite_prevue}}-{{eleve.id_utilisateur}}" style="margin-top: 10px" ></label>
                  
                  
                </td>
              </tr>
               </table>   
              
            </table>
            <div style="text-align: center">
              <div class="row" style="margin-bottom: 0px">
                <button type="button" data-target="modalPresence{{activite.ID_activite_prevue}}" class="btn l6 s12 waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px"><span ng-show="activite.presences_prises > 0">Re</span>Prendre les présences</button>
                <button ng-click="annulerActivite(activite.ID_activite_prevue)" type="button" class="btn l6 s12 red waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Annuler l'activité</button>
              </div>
            </div>
          </div>
          
        </li>
      </ul>
  
      <a class="waves-effect waves-light btn right" data-target="modal_planif" style="margin-top: 0px;">Planifier une activité</a>
      <div style="margin-bottom: 40px"></div>
      </div></li>
    

  <!-- ADMINISTRATION -->


 
      <li>
        <div class="collapsible-header"><i class="material-icons">settings</i>Paramètres administratifs</div>
        
        <div class="collapsible-body">
          
          <ul class="collapsible" data-collapsible="expandable">
            
            
            <li> <!-- ANGULAR REPEAT -->
            <div class="collapsible-header">
              <i class="material-icons">supervisor_account</i>
              Comptes Administrateurs
                <span class="new badge green right" data-badge-caption="">{{comptesAdmin().length}}</span>
            </div>
            <div class="collapsible-body collapsibleWithButton container">
              
              <table>
            
              <tr ng-repeat="admin in comptesAdmin()"><td>{{admin.nom}}, {{admin.prenom}}</td><td>{{adminLevelFromID(admin.administrateur)}}</td><td><button type="button" class="btn blue small" ng-click="ouvrirModalModifierPermission(admin.id_utilisateur, admin.administrateur)">Permissions</button></td></tr>
                </table>
              <div class="row">
              <a class="waves-effect waves-light btn col l5" style="margin-left: 15px; margin-top: 15px;" data-target="modalCodeAdmin"><i class="material-icons left">cloud</i>Générer des codes d'accès</a>
            <a class="waves-effect waves-light btn col l5" style="margin-left: 15px; margin-top: 15px;" type="button" data-target="modalAfficherCodeAdmin" onclick="$('#modalAfficherCodeAdmin').modal('open')"><i class="material-icons right">cloud</i>Afficher les codes d'accès</a>


              
              
              </div>
             </div>
            </li>

            <li> <!-- ANGULAR REPEAT -->
            <div class="collapsible-header">
              <i class="material-icons">explore</i>
              Activités
                <span class="new badge green right" data-badge-caption="">{{activites.length}}</span>
            </div>
            <div class="collapsible-body collapsibleWithButton container">
              
              
                <table>
                <thead>
                  <th class="center">Activités Disponibles</th><th class="center">Durée (Minutes)</th><th class="center">Pondération</th><th></th>
                </thead>                
                <tr ng-repeat="activite in activites">
                  <td class="center">{{activite.Nom_Activite}}</td>
                  <td class="center">{{activite.Duree}}</td>
                  <td class="center">{{activite.Ponderation}} point<span ng-show="activite.Ponderation>1">s</span></td> 
                  <td class="center"><a class="btn-floating  waves-effect waves-light green" ng-click="modifierActivite(activite)"><i class="material-icons">edit</i></a></td>
                  <td class="center"><a class="btn-floating  waves-effect waves-light red" ng-click="supprimerActivite(activite.ID_Activite)"><i class="material-icons">delete</i></a></td>
                </tr>
  

                </table>




              
              
              <row>
              <br><br>
              <div style="text-align: center">
              <button type="button"  class="btn l6 s12 waves-effect waves-light"  data-target="modal_new_activite" style="height: 30px; margin-top: 7px; margin-right: 7px">Ajouter une activité</button>
              </div>
              </row>
              
             </div>
            </li>


            <li> <!-- SESSIONS REPEAT -->
            <div class="collapsible-header">
              <i class="material-icons">date_range</i>
              Sessions
                
            </div>
            <div class="collapsible-body collapsibleWithButton container">
              
              <table><thead><th>Nom de la session</th><th>Début</th>
              <th>Mi-Session</th>
              <th>Fin</th></thead><th></th>
              <tr ng-repeat="session in sessions"><td>{{session.Nom_Session}}</td><td>{{session.Debut_Session}}</td><td>{{session.Mi_Session}}</td><td>{{session.Fin_Session}}</td><td><a class="btn-floating waves-effect waves-light blue " ng-click="afficherStats()"><i class="material-icons">assessment</i></a></td>
              </tr>
              </table>
              
              
              
              <button type="button"  class="btn l6 s12 waves-effect waves-light " data-target="modal_session" style="height: 30px; margin-top: 7px; margin-right: 7px">Ajouter une session</button>
              


<a class="waves-effect waves-light btn" href="#modal_ins">ins</a>



<a class="waves-effect waves-light btn" href="#modal_login">Login</a>

<a class="waves-effect waves-light btn" href="#modal_code">code</a>




              </row>
             </div>
            </li>



      </ul>
      </div>

      </li>    
  </ul>
  
</div>














<?php



if (isset($_SESSION['admin']))
echo ' <script>window.onload = function(){ if('.$_SESSION['admin'].'){$(".adminTabs").remove()}}</script>';
//INVERSE
?>
</div>



</main>
<footer class="page-footer" style="width: 100%!important">

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/moment.js">moment.locale="fr"</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/fr-ca.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-fr.js"></script>
<script type="text/javascript" src="js/gcal.js"></script>
<script type="text/javascript" src="js/sc-date-time.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.rawgit.com/chingyawhao/materialize-clockpicker/master/dist/js/materialize.clockpicker.js"></script>

<?php include 'js/ScriptsAdmin.php';

include 'components/modals_admin.php';
?>








<script>

$(document).ready(function(){
// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal').modal();
$('.timepicker').pickatime({
    default: 'now',
    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
    donetext: 'OK',
  autoclose: false,
  vibrate: true // vibrate the device when dragging clock hand
});
 
$('#date_act').pickadate();
$('#mod_date_act').pickadate();
$('input[type="date"]').pickadate();

$("select").material_select();

$(".session:last").attr("checked", true);

});



</script>
<div class="hiddendiv common"></div>

</body></html>

select sum(ponderation) 
from utilisateurs, activites, activites_prevues, utilisateur_activites, sessions, groupes 
where activites_prevues.id_activite = activites.id_activite 
and utilisateur_activites.id_activite_prevue = activites_prevues.ID_activite_prevue 
and utilisateur_activites.id_utilisateur = utilisateurs.id_utilisateur
and utilisateurs.ID_Groupe = groupes.ID_Groupe
and groupes.ID_Session = Sessions.ID_Session
and activites_prevues.date_activite > sessions.Debut_Session
and activites_prevues.date_activite < sessions.mi_session
and utilisateurs.id_utilisateur = 289
and utilisateur_activites.present = 1