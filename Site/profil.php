<?php
session_start();
?>
<html>
<head>

      <style type="text/css"></style>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
  <link type="text/css" rel="stylesheet" href="css/sc-date-time.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/ajax_coord_perso.js"></script>

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

    
  </header>
      <?php 
    include 'components/nav.php';
    ?>
  <main>

  <div class="container">
    
    <ul class="collapsible" data-collapsible="expandable">
      <!-- PROFIL -->
      <li class="">
        <div class="collapsible-header"><i class="material-icons">person</i>Coordonnees personnelles</div>
        <div class="collapsible-body" style="display: none;">
        
          <div class="row">
            <div class="input-field col s6">
              <input id="prenom_user" name="prenom_user" type="text" class="validate">
              <label for="prenom_user">Prénom</label>
            </div>
            <div class="input-field col s6">
              <input id="nom" name="nom" type="text" class="validate">
              <label for="nom">Nom</label>
            </div>
          </div>
       
          <div class="row">
            <div class="input-field col s12">
              <input id="email" name="email" type="email" class="validate">
              <label for="email">Courriel</label>
            </div>
          </div>
      
          <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="tel" name="tel" type="tel" class="validate">
          <label for="tel">Téléphone</label>
        </div>

          <div class="row">
                <div class="col s12">
                  <i class="material-icons prefix">people</i>
                  <input name="sexe" type="radio" id="sH" value="H" class="with-gap" />
                  <label for="sH" style="margin:auto;">Homme</label>
                  <input name="sexe" type="radio" id="sF" value="F" class="with-gap" />
                  <label for="sF" style="margin:auto;">Femme</label>
               </div>
          </div>
          <div class="row">
            <div class="col s12 l12">
            <button class="btn green" type="button" style="width:100%" onclick="transfert_coord_perso()">Enregistrer</button>
            </div>
            <div class="col l12 s12" style="height:15px"></div>
            <div class="col s12 l12">
            <button class="btn red" type="button" style="width:100%">Annuler</button>
            </div>
          </div>
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

</ul>
</div>
</li>
</ul>
</div>
<?php
include 'php_scripts/afficher_info_user.php'; 
if(($_SESSION['uid'] != 0) and (isset($_SESSION['uid'])))
{
obtenir_info($_SESSION['uid']);
}
?>

</main>
<footer class="page-footer" style="width: 100%!important">

</footer>
 
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<!--Import jQuery before materialize.js-->
<script src="js/moment.js">moment.locale="fr"</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/fr-ca.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-fr.js"></script>
<script type="text/javascript" src="js/gcal.js"></script>
<script type="text/javascript" src="js/sc-date-time.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
 <?php 

       include 'js/ScriptsProfil.php';
?>

<script>
$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 15 // Creates a dropdown of 15 years to control year
});
</script>


<div class="hiddendiv common"></div></body></html>