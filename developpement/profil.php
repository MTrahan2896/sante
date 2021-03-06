<html ng-app= 'app_angular' ng-controller="ctrl">
<head>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
    .collapsible-body
    {
    padding-left: 10px;
    padding-right: 10px;
    }
    .prob_medic
    {
    text-align: right;
    }

    .act label
    {
      font-size: 12px;
      color:black;
    }
    </style>
</head>
<body>
  <header>
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Défi Santé</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="accueil.html">Accueil</a></li>
          <li><a href="sass.html">Administration</a></li>
          <li><a href="collapsible.html"></a></li>
        </ul>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a data-target="modal_login"><i class="material-icons prefix">account_circle</i></a></li>
          
          
        </ul>
      </div>
    </nav>
    <div id="modal_login" class="modal">
      <div class="modal-content">
        <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
          <img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png" id="imgDef" style="height:150px;width:150px;">
        </div>
        <div class="contenu-modal">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12" style="margin-top:15px">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="username" type="text" class="validate">
                  <label for="username">Nom d'utilisateur</label>
                </div>
                <div class="input-field col s12" style="margin-top:15px">
                  <i class="material-icons prefix">lock</i>
                  <input id="pwd" type="password" class="validate">
                  <label for="pwd">Mot de passe</label>
                </div>
                <div class="col s12" style="margin-top:15px">
                  <button id="connexion" class="btn col s12">Connexion</button>
                </div>
                <div class="col s12" style="margin-top:15px">
                  <a href="#">Inscription</a>
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    
  </header>
  <main>
  
  <div class="container">
    <?php echo('FU')?>
    <ul class="collapsible" data-collapsible="expandable">
      <!-- PROFIL -->
      <li class="">
        <div class="collapsible-header"><i class="material-icons">person</i>Coordonnees personnelles</div>
        <div class="collapsible-body" style="display: none;">
          
          
        </div>
      </li>
      <!-- ACTIVITE -->
      <li class="act">
        <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités</div>
        <div class="collapsible-body" style="display: none;">
          
      <div class="row">
      <label for="nom_activite" class="col s4">Actitvé</label><label name="nom_activite" class="col s6"> Badminton</label>
      </div>

      <div class="row">
      <label for="date_activite" class="col s4">Date de l'activité</label><label name="date_activite" class="col s4"> 2017-02-05</label>
      </div>

      <div class="row">
      <label for="heure_deb" class="col s4">Heure de début</label><label name="heure_deb" class="col s2"> 8:10</label>

      <label for="heure_fin" class="col s4">Heure de fin</label><label name="heure_deb" class="col s2"> 8:10</label>

      </div>

      <div class="row">
      </div>
          
        </div>
      </li>
      <!-- PROFIL MEDICAL -->
      <li class="">
        <div class="collapsible-header"><i class="material-icons">info</i>Profil médical</div>
        <div class="collapsible-body" style="display: none;">
          <div class="row">
            <form class="col s12">
              <legend style="font-size:20px;">Personne ressource en cas d'urgence</legend>
              <div class="row">
                <div class="input-field col s6 l2">
                  <input id="nom_ressource" type="text" class="validate">
                  <label for="nom_ressource">Nom</label>
                </div>
                <div class="input-field col s6 l2">
                  <input id="prenom_ressource" type="text" class="validate">
                  <label for="prenom_ressource">Prénom</label>
                </div>
              </div>

              <div class="row">
                  <div class="input-field col s6 l2">
                    <input id="lien_ressource" type="text" class="validate">
                    <label for="lien_ressource">Lien de parenté</label>
                  </div>

                  <div class="input-field col s6 l2">
                    <input id="tel_ressource" type="tel" class="validate">
                    <label for="tel_ressource">Téléphone</label>
                  </div>
              </div>
            </form>
          </div>
          
          <ul class="collapsible" data-collapsible="expandable">
            

            <!-- BLESSURE -->
            <li class="">
              <div class="collapsible-header"><i class="material-icons">healing</i>Blessures</div>
              <div class="collapsible-body" style="display: none;">
                
                <div class="row" ng-repeat="u in utilisateur">
                  


                  <label class="col s6">Description blessure {{u.nom_blessure}}
                  </label>
                  
                  <div class="col s2" style="margin-left: -15px; vertical-align: middle;">
                    <p style="vertical-align: bottom;"><a class="btn-floating  waves-effect waves-light red"><i class="material-icons">clear</i></a></p>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="input-field col s5">
                    <input id="desc_blessure" name="desc_blessure" type="text">
                    <label for="desc_blessure">Description de la blessure</label>
                  </div>
                  
                  <div class="input-field col s5">
                    <input type="date" id="date_blessure" name="date_blessure" class="datepicker">
                    <label for="date_blessure">Date de la blessure</label>
                  </div>
                  
                  <div class="col s2" style="margin-left: -15px; vertical-align: bottom;">
                    <p style="vertical-align: bottom;"><a class="btn-floating  waves-effect waves-light green"><i class="material-icons">save</i></a></p>
                  </div>
                  
                  
                </div>
              </div>
            </li>




            <!-- PROBLEME DE SANTE -->
    <li class="">
              <div class="collapsible-header">
              <i class="material-icons">local_hospital</i>Problèmes de santé</div>
        <div class="collapsible-body" style="display: none;">
                
                <div class="row">
                  <p><span class="col s5 l2 prob_medic">Anémie</span>
                  <div class ="col s3 l1">
                    <input class="with-gap" name="Anemie" type="radio" id="Anemie_O" />
                    <label for="Anemie_O">Oui</label>
                  </div>
                  <div class ="col s3 l1">
                    <input class="with-gap" name="Anemie" type="radio" id="Anemie_N" />
                    <label for="Anemie_N">Non</label>
                  </div>
                </p>
                </div>

                <div class="row">
                  <p><span class="col s5 l2 prob_medic">Asthme </span>
                  
                        <div class ="col s3 l1">
                          <input class="with-gap" name="Asthme" type="radio" id="Asthme_O"  />
                          <label for="Asthme_O">Oui</label>
                        </div>
                  
                        <div class ="col s3 l1">
                          <input class="with-gap" name="Asthme" type="radio" id="Asthme_N"  />
                          <label for="Asthme_N">Non</label>
                        </div>
                      </p>
                </div>

                    <div class="row">
                      <p><span class="col s5 l2 prob_medic">Cardiaque</span>
                      <div class ="col s3 l1 ">
                        <input class="with-gap" name="Cardiaque" type="radio" id="Cardiaque_O"  />
                        <label for="Cardiaque_O">Oui</label>
                      </div>
                      <div class ="col s3 l1 ">
                        <input class="with-gap" name="Cardiaque" type="radio" id="Cardiaque_N" />
                        <label for="Cardiaque_N">Non</label>
                      </div>
                    </p>
                  </div>
          
                    <div class="row">
                      <p><span class="col s5 l2 prob_medic">Diabète</span>
                      
                        <div class ="col s3 l1 ">
                          <input class="with-gap" name="Diabete" type="radio" id="Diabete_O"  />
                          <label for="Diabete_O">Oui</label>
                        </div>

                        <div class ="col s3  l1">
                          <input class="with-gap" name="Diabete" type="radio" id="Diabete_N" />
                          <label for="Diabete_N">Non</label>
                        </div>
                      </p>
                    </div>

                    <div class="row">
                      <p><span class="col s5 l2 prob_medic">Épilespie</span>
                      <div class ="col s3 l1 ">
                        <input class="with-gap" name="Epilespie" type="radio" id="Epilespie_O"  />
                        <label for="Epilespie_O">Oui</label>
                      </div>
                      
                      <div class ="col s3 l1 ">
                        <input class="with-gap" name="Epilespie" type="radio" id="Epilespie_N" />
                        <label for="Epilespie_N">Non</label>
                      </div>
                    </p>
                  </div>

                  <div class="row">
                    <p><span class="col s5 l2 prob_medic">Hyper ou hypotension</span>
                    
                    <div class ="col s3 l1 ">
                      <input class="with-gap" name="Hyper_hypotension" type="radio" id="Hyper_hypotension_O"  />
                      <label for="Hyper_hypotension_O">Oui</label>
                    </div>
                    <div class ="col s3 l1 ">
                      <input class="with-gap" name="Hyper_hypotension" type="radio" id="Hyper_hypotension_N" />
                      <label for="Hyper_hypotension_N">Non</label>
                    </div>
                  </p>
                </div>

                <div class="row">
                  <p><span class="col s5 l2 prob_medic">Hyperventilation</span>
                  
                  <div class ="col s3 l1 ">
                    <input class="with-gap" name="Hyperventilation" type="radio" id="Hyperventilation_O"  />
                    <label for="Hyperventilation_O">Oui</label>
                  </div>
                  <div class ="col s3 l1 ">
                    <input class="with-gap" name="Hyperventilation" type="radio" id="Hyperventilation_N" />
                    <label for="Hyperventilation_N">Non</label>
                  </div>
                  </p>
                </div>
  
                <div class="row">
                  <p><span class="col s5 l2 prob_medic">Hypoglycémie</span>
                  <div class ="col s3 l1 ">
                    <input class="with-gap" name="Hypoglycemie" type="radio" id="Hypoglycemie_O"  />
                    <label for="Hypoglycemie_O">Oui</label>
                  </div>
                  <div class ="col s3 l1 ">
                    <input class="with-gap" name="Hypoglycemie" type="radio" id="Hypoglycemie_N" />
                    <label for="Hypoglycemie_N">Non</label>
                  </div>
                </p>
              </div>

              <div class="row">
                <div class="col l1 s3"><p style="text-align: right; margin-top: 50%">Autre</p></div>
                <div class="input-field col s9 l3" ">
                  <input id="autre_blessure" name="autre_blessure" type="text">
                  <label for="autre_blessure" >Description du problème de santé</label>
                </div>
              </div>

              <div class="row">
                <div class="col s11 l4">
                  <p style="vertical-align: bottom; text-align: right;"><a class="btn-floating  waves-effect waves-light green"><i class="material-icons">save</i></a></p>
                </div>
              </div>
        </div>
    </li>

      <!-- Medicaments -->
      <li class="">
        <div class="collapsible-header"><i class="material-icons">person</i>Médicaments</div>
        <div class="collapsible-body" style="display: none;">
         
         <div class="row">
                  
                  <div class="input-field col s5">
                    <input id="nom_medicament1" name="nom_medicament" type="text" value="Valtrex">
                    <label for="nom_medicament1">Nom Médicament</label>
                  </div>
                  <div class="input-field col s5">
                    <input type="date" id="medicament_probleme1" name="medicament_probleme" value="Imflammation de la cornée">
                    <label for="medicament_probleme1">Problème de santé relié</label>
                  </div>
                  
                  <div class="col s2" style="margin-left: -15px; vertical-align: middle;">
                    <p style="vertical-align: bottom;"><a class="btn-floating  waves-effect waves-light red"><i class="material-icons">clear</i></a></p>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="input-field col s5">
                    <input name="nom_medicament" type="text">
                    <label for="nom_medicament">Nom Médicament</label>
                  </div>
                  
                  <div class="input-field col s5">
                    <input name="medicament_probleme" type="text">
                    <label for="medicament_probleme">Problème de santé relié</label>
                  </div>
                  
                  <div class="col s2" style="margin-left: -15px; vertical-align: bottom;">
                    <p style="vertical-align: bottom;"><a class="btn-floating  waves-effect waves-light green"><i class="material-icons">save</i></a></p>
                  </div>
                  
                  
                </div>
 
          
        </div>
      </li>
</ul>
</div>
</li>
</ul>
</div>
</main>
<footer class="page-footer" style="width: 100%!important">
<div class="container">
<div class="row">
<div class="col l12 s12">
<h5 class="white-text">Footer Content</h5>
<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
</div>
<div class="col l12 offset-l2 s12">
<h5 class="white-text">Links</h5>
<ul>
<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
</ul>
</div>
</div>
</div>
<div class="footer-copyright">
<div class="container">
© 2014 Copyright Text
<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
</div>
</div>
</div>
</footer>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/moment.js">moment.locale="fr"</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/fr-ca.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-fr.js"></script>
<script type="text/javascript" src="js/gcal.js"></script>
<script type="text/javascript" src="js/sc-date-time.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 15 // Creates a dropdown of 15 years to control year
});
</script>
<div class="hiddendiv common"></div></body></html>