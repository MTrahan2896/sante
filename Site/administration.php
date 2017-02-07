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
                  <thead><tr><td>Nom</td><td>Points accumulés</td></tr></thead><tr>
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
            <button data-target="modalNouveauGroupe" style="margin-bottom: 15px !important" class="btn right">Nouveau Groupe</button>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités</div>
          <div class="collapsible-body">


            




 <ul class="collapsible" data-collapsible="expandable" >
              
              <li ng-repeat="activite in activites"> <!-- ANGULAR REPEAT -->
              <div class="collapsible-header"><i class="material-icons">supervisor_account</i>{{activite.nom_activite}}
               
              </div>
                <div class="collapsible-body collapsibleWithButton">
                
                 
                </div>
                


              </li>
</ul>














          </div>

        <li>
          <div class="collapsible-header"><i class="material-icons">settings</i>Paramètres</div>
          <div class="collapsible-body">
          </div>
        </li>
      </ul>
      
    </div>
    <div id="modalNouveauGroupe" class="modal">
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
    <div id="modalGroupe{{groupe.id_groupe}}" class="modal">
      <div class="modal-content">
        <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
        Code d'accès du groupe "{{groupe.nom_groupe}}"
        </div>
        <div class="contenu-modal">
          <div class="row" >

            <div ng-repeat="compte in comptesAvecCodeDansGroupe(groupe.id_groupe)">
              {{compte.code_acces}}
            </div>
          
          <a class="waves-effect waves-light btn" ng-click="print(groupe.id_groupe)"><i class="material-icons left">print</i>Imprimer</a>
          
        </div>
      </div>
    </div>
    </div>
  
    

  </div>

  
  <div ng-repeat="groupe in groupes">
    <div id="modalGenGroupe{{groupe.id_groupe}}" class="modal">
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
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
  <script type="text/javascript" src="js/sc-date-time.js"></script>
  <script src="js/scripts.js"></script>
  <?php include 'js/ScriptsAdmin.php';?>
  
  

<script>
   $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
          
</script>

  <div class="hiddendiv common"></div></body></html>