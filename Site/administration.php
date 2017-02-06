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
                <span class="new badge blue right" data-badge-caption="">{{elevesDansGroupe(groupe.id_groupe).length}} élèves</span></div>
                <div class="collapsible-body">
                <table>
                <div class="row"   ng-repeat="eleve in elevesDansGroupe(groupe.id_groupe)">
                   
                      <div class="col s5">{{eleve.nom}}, {{eleve.prenom}}</div>
                      <div class="col s4">{{eleve.points_bonus}}/15</div>
                      <div class="col s3"> <a class="btn-floating red"><i class="material-icons">delete</i></a></div>
                    </div>
                </table>
                </div>
              </li>


            </ul>

         <button data-target="modalNouveauGroupe" style="margin-bottom: 15px !important" class="btn right">Nouveau Groupe</button>

          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités</div>
          <div class="collapsible-body">
            
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">settings</i>Paramètres</div>
          <div class="collapsible-body">
          </div>
        </li>
      </ul>
      <button data-target="modal">test</button>
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
                  <button id="CreerGroupe" class="btn col s12" type="button" onclick="creergroupe()">Créer le groupe</button>
                </div>
                
              </div>
            </form>
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
    
    
    <div class="hiddendiv common"></div></body></html>