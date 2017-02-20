<html ng-app='app_angular' ng-controller="ctrl">
  <head>
    <?php include 'components/headContent.php';?>
  </head>
  <body>
    
    <header>
      <?php include 'components/nav.php';?>
      
    </header>
    <main>
    <div class="container">
      <h4>Administration</h4>
      <ul class="collapsible" data-collapsible="expandable">
        <li>
          <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Groupes <span class="new badge blue right" data-badge-caption="">{{groupes.length}}</span></div>
          <div class="collapsible-body" class="collapsibleWithButton" style="padding-bottom: 45px !important">
            
            <ul class="collapsible" data-collapsible="expandable" >
              
              <li ng-repeat="groupe in groupes"> <!-- ANGULAR REPEAT -->
              <div class="collapsible-header"><i class="material-icons">supervisor_account</i>{{groupe.nom_groupe}}
                <span class="new badge blue right" data-badge-caption="">{{elevesDansGroupe(groupe.id_groupe).length}} élève<span ng-show="elevesDansGroupe(groupe.id_groupe).length>1">s</span></span>
              </div>
              <div class="collapsible-body collapsibleWithButton">
                <table class="striped" align="center">
                  <thead><tr><td>Nom</td><td>Points accumulés</td></tr></thead>
                  <tr  ng-repeat="eleve in elevesDansGroupe(groupe.id_groupe)">
                    
                    <td class="">{{eleve.nom}}, {{eleve.prenom}}</td>
                    <td class="">{{}}/15</td>
                    
                  </div>
                </tr>
              </table>
              <div class="row" style="text-align: center">
              <button data-target="modalGenGroupe{{groupe.id_groupe}}" style="margin-bottom: 15px !important; margin-top: 30px !important" class="btn" >Générer des codes d'accès</button></div>
              <div class="row"  style="text-align: center">
                <button data-target="modalGroupe{{groupe.id_groupe}}" style="margin-bottom: 15px !important" class="btn  modal-trigger">Afficher les codes d'accès</button>
              </div>
              <div class="row"  style="text-align: center">
                <button ng-click="supprimerGroupe(groupe.id_groupe, groupe.nom_groupe)" style="margin-bottom: 15px !important" class="btn red modal-trigger">Supprimer le groupe</button>
              </div>
            </div>
            
          </li>
        </ul>
        <button data-target="modalNouveauGroupe" style="margin-bottom: 0px !important" class="btn right">Nouveau Groupe</button>
      </div>
      
      <li>
        <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités <span class="new badge green right" data-badge-caption="">{{activites_prevues.length}}</span></div>
        
        <div class="collapsible-body">
          
          <ul class="collapsible" data-collapsible="expandable">
            
            
            <li ng-repeat="activite in activites_prevues"> <!-- ANGULAR REPEAT -->
            <div class="collapsible-header">
              <i class="material-icons">directions_bike</i>{{nomActiviteFromId(activite.ID_Activite)}} le {{activite.Date_Activite}}
              <span class="new badge green right" data-badge-caption="">{{getElevesForActivitePrevue(activite.ID_activite_prevue).length}}/{{activite.Participants_Max}}</span>
            </div>
            <div class="collapsible-body collapsibleWithButton container">
              
              <table>
                <div class="row" ng-repeat="eleve in getElevesForActivitePrevue(activite.ID_activite_prevue)">
                  <div class="col s8">{{eleve.nom}}, {{eleve.prenom}}</div><div class="col s2">
                  
                  <input class="field filled-in" ng-checked="{{getPresenceForEleve(activite.ID_activite_prevue, eleve.id_utilisateur)}}" type="checkbox" name="viewid{{activite.ID_activite_prevue}}" value="{{eleve.id_utilisateur}}" disabled readonly
                  id="viewid{{activite.ID_activite_prevue}}-{{eleve.id_utilisateur}}" style="margin-right: 15px; margin-top: 15px">
                  <label for="viewid{{activite.ID_activite_prevue}}-{{eleve.id_utilisateur}}" style="margin-top: 10px" ></label>
                  
                  
                </div>
              </div>
              
            </table>
            <div style="text-align: center">
              <div class="row" style="margin-bottom: 0px">
                <button type="button" data-target="modalPresence{{activite.ID_activite_prevue}}" class="btn l6 s12 waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Prendre les présences</button>
                <button ng-click="annulerActivite(activite.ID_activite_prevue)" type="button" class="btn l6 s12 red waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Annuler l'activité</button>
              </div>
            </div>
          </div>
          
        </li>
      </ul>
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
              
              <ul>
              <li ng-repeat="admin in comptesAdmin()">{{admin.nom}}, {{admin.prenom}}</li>
              </ul>
              <row>
              <button type="button"  class="btn l6 s12 waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Générer des codes d'accès</button>
              <button type="button"  class="btn l6 s12 waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Afficher les codes d'accès</button>
              </row>
             </div>
            </li>

            <li> <!-- ANGULAR REPEAT -->
            <div class="collapsible-header">
              <i class="material-icons">explore</i>
              Activités
                <span class="new badge green right" data-badge-caption="">{{comptesAdmin().length}}</span>
            </div>
            <div class="collapsible-body collapsibleWithButton container">
              
              <ul>
              <li ng-repeat="admin in comptesAdmin()">{{admin.nom}}, {{admin.prenom}}</li>
              </ul>
              <row>
              <button type="button"  class="btn l6 s12 waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Générer des codes d'accès</button>
              <button type="button"  class="btn l6 s12 waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Afficher les codes d'accès</button>
              </row>
             </div>
            </li>


            <li> <!-- SESSIONS REPEAT -->
            <div class="collapsible-header">
              <i class="material-icons">date_range</i>
              Sessions
                
            </div>
            <div class="collapsible-body collapsibleWithButton container">
              
              <ul>
              <li ng-repeat="session in sessions">{{session.Nom_Session}}</li>
              </ul>
              <row>
              <button type="button"  class="btn l6 s12 waves-effect waves-light " style="height: 30px; margin-top: 7px; margin-right: 7px">Ajouter une session</button>
              
              </row>
             </div>
            </li>



      </ul>
      </div>
      </li>





























    
  </ul>
  
</div>
<div id="modalNouveauGroupe" class="modal" style="height: 300px !important">
  <div class="modal-content">
    <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
      Ajouter un groupe
    </div>
    <div class="contenu-modal">
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12" style="margin-top:15px">
              <i class="material-icons prefix">account_circle</i>
              <input name="nomgroupe" id="nomgroupe" type="text" class="validate">
              <label for="nom_groupe">Nom du groupe</label>
            </div>
            <div class="input-field col s12" style="margin-top:15px">
              <i class="material-icons prefix">supervisor_account</i>
              <input type="number" id="rangeEleves" name="rangeEleves">
              <label for="rangeEleves">Nombre d'élèves</label>
              
            </div>
            <div class="col s12" style="margin-top:15px">
              <button id="CreerGroupe" class="btn col s12" type="button" ng-click="creergroupe()">Créer le groupe</button>
            </div>
            
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<div ng-repeat="groupe in groupes">
  <div id="modalGroupe{{groupe.id_groupe}}" class="modal" style="height: 300px !important">
    <div class="modal-content" style="height: 100%; ">
      <div class="entete-modal" style="margin-bottom: 15px; text-align:center;">
        Code d'accès du groupe "{{groupe.nom_groupe}}"
      </div>
      <div class="contenu-modal">
        <div class="row" >
          <div ng-repeat="compte in comptesAvecCodeDansGroupe(groupe.id_groupe)">
            {{compte.code_acces}}
          </div>
          <div style="text-align:center;">
            <a class="waves-effect waves-light btn" ng-click="print(groupe.id_groupe)" style="bottom: 15px; margin-top: 30px"><i class="material-icons left">print</i>Imprimer</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
</div>

<div ng-repeat="groupe in groupes">
  <div id="modalGenGroupe{{groupe.id_groupe}}" class="modal" style="height: 300px">
    <div class="modal-content" style="text-align: center">
      <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
        Générer des codes d'accès pour le groupe "{{groupe.nom_groupe}}"
      </div>
      <div class="contenu-modal">
        <div class="row">
          <label for="qt_code">Nombre de codes</label>
          <input type="number" name="qt_code" id="codeGroupe{{groupe.id_groupe}}" min="1" max="60" ng-min="1" ng-max="60" validate>
        </div>
        <button type="button" class="btn" ng-click="genererCodePourGroupe(groupe.id_groupe)">Générer</button>
      </div>
    </div>
  </div>
</div>
<div ng-repeat="activite in activites_prevues">
  <div id="modalPresence{{activite.ID_activite_prevue}}" class="modal" style="height: 400px; width: 400px" >
    <div class="modal-content" style="text-align: center; height: 100%" >
      <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
        <h5>Liste de présence </h1>
      </div>
      <div class="contenu-modal">
        <div class="row ">
          <div ng-repeat="eleve in getElevesForActivitePrevue(activite.ID_activite_prevue)" class="row presence">
            <div class="col s8 field">{{eleve.nom}}, {{eleve.prenom}}</div><div class="field col s2"></div> <input class="field filled-in" checked="checked" type="checkbox" name="presenceActivite{{activite.ID_activite_prevue}}" value="{{eleve.id_utilisateur}}"
            id="checkboxid{{activite.ID_activite_prevue}}-{{eleve.id_utilisateur}}" style="margin-right: 15px; margin-top: 15px"><label for="checkboxid{{activite.ID_activite_prevue}}-{{eleve.id_utilisateur}}" style="margin-top: 10px" ></label>
          </div>
          <button ng-click="enregistrerPresence(activite.ID_activite_prevue)" type="button" class="btn" style="position: relative; margin-bottom: 45px; margin-top: 15px">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/moment.js">moment.locale="fr"</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/fr-ca.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-fr.js"></script>
<script type="text/javascript" src="js/gcal.js"></script>
<script type="text/javascript" src="js/sc-date-time.js"></script>
<script src="js/scripts.js"></script>
<?php include 'js/ScriptsAdmin.php';?>


<script>
$(document).ready(function(){
// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal').modal();
});

</script>
<div class="hiddendiv common"></div>
<button type="button" ng-click="eleveFromId(1)">TEST</button>
</body></html>