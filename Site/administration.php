<html><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}</style>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
  <link type="text/css" rel="stylesheet" href="css/sc-date-time.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body ng-app="myApp" ng-controller="myCtrl">
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
    
    <ul class="collapsible" data-collapsible="expandable" id="containerGroupe">
      <li class="">
        <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Groupes<a href="#!" class="collection-item">  <span class="blue new badge " data-badge-caption="" >
          <span >{{numItems('groupe')}}</span>
        </span></a></div>
        <div class="collapsible-body" style="display: none;">
          <ul class="collapsible" data-collapsible="expandable" id="listeGroupe">
          </ul>
        </div>
      </li>



















      <li class="">
        <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités<a href="#!" class="collection-item">  <span class="green new badge " data-badge-caption="">19</span></a></div>
        <div class="collapsible-body" style="display: none;">
          
          <ul class="collapsible" data-collapsible="expandable">
            <li class="">
              <div class="collapsible-header"><i class="material-icons">directions_bike</i>Randonnée Parc-National
                <span class="right"><i class="material-icons">person</i>17.49</span>
              </div>
              <div class="collapsible-body" style="display: none; padding-top: 30px; margin-top: 0px; padding-bottom: 30px; margin-bottom: 0px;"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
            </li>
            
            <li class="">
              <div class="collapsible-header"><i class="material-icons">directions_bike</i>BasketBall
                <span class="right"><i class="material-icons">person</i>-15</span>
              </div>
              <div class="collapsible-body" style="display: none;"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
            </li>
            <li class="">
              <div class="collapsible-header"><i class="material-icons">directions_bike</i>Badminton
                <span class="right"><i class="material-icons">person</i>7</span>
              </div>
              <div class="collapsible-body" style="display: none;"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
            </li>
            <li class="">
              <div class="collapsible-header"><i class="material-icons">directions_bike</i>Soccer
                <span class="right"><i class="material-icons">person</i>22</span>
              </div>
              <div class="collapsible-body" style="display: none;"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
            </li>
          </ul>
        </div>
      </li>
      <li class="">
        <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Paramètres<a href="#!" class="collection-item">  <span class="blue new badge " data-badge-caption="">4</span></a></div>
        <div class="collapsible-body" style="display: none;">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">First Name</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">phone</i>
                  <input id="icon_telephone" type="tel" class="validate">
                  <label for="icon_telephone">Telephone</label>
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </li>
    </ul>
  </div>
  <!-- code promo: cegeptr -->
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
  </footer>
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
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
  <script src="js/Administration.js"></script>

  
  
  <div class="hiddendiv common"></div></body></html>



<?php
$connexion=mysqli_connect("localhost", "root", "", "bd_application");


if(!$connexion){
  die("Erreur de connexion à la base de données");
}


$resultat = mysqli_query($connexion, "select id_groupe, nom_groupe from groupes where ID_Prof = 1");
while($enregistrement=mysqli_fetch_array($resultat)){
  echo "<script>ajouterGroupe(\"".$enregistrement["nom_groupe"]."\", ".$enregistrement["id_groupe"].")</script>";
}



$resultat = mysqli_query($connexion, "select eleves.id_groupe, eleves.nom, eleves.prenom, eleves.points_bonus, eleves.points_debut_session, eleves.points_fin_session from eleves, groupes, professeurs where professeurs.ID_Prof = 1 and eleves.id_groupe = groupes.id_groupe and groupes.id_prof = professeurs.id_prof");
while($enregistrement=mysqli_fetch_array($resultat)){

  $note = $enregistrement["points_debut_session"] + $enregistrement["points_bonus"] + $enregistrement["points_fin_session"];
  echo "<script>ajouterEleve(".$enregistrement["id_groupe"].", \"".$enregistrement["nom"]."\", \"".$enregistrement["prenom"]."\", \"".$note."/15\")</script> ";
}


mysqli_close($connexion);

 ?>



 ajouterEleve(6, "Réjean", "Martel", "5/15");