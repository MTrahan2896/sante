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
</head>

<?php include 'php_scripts/afficher_info_user.php'; ?>
<body>
  <header>
        <?php include 'components/nav.php';?>
  </header>
  <main>
  <div class="container">
    <ul class="collapsible" data-collapsible="expandable">
      <!-- Coordonées personnelle -->
      <li class="">
        <div class="collapsible-header"><i class="material-icons">person</i>Coordonnees personnelles</div>
        <div class="collapsible-body container" style="display: none;">
        
        <!-- Nom prénom -->
          <div class="row">
            <div class="input-field col s6 l4">
              <input id="prenom_user" name="prenom_user" type="text" class="validate" maxlength="50">
              <label for="prenom_user">Prénom</label>
            </div>

            <div class="input-field col s6 l4">
              <input id="nom" name="nom" type="text" class="validate" maxlength="50">
              <label for="nom">Nom</label>
            </div>
          </div>

       <!-- Courriel Téléphone -->
          <div class="row">
            <div class="input-field col s12 l5">
              <input id="email" name="email" type="email" class="validate" maxlength="75">
              <label for="email">Courriel</label>
            </div>
         
            <div class="input-field col s6 l3">
              <input id="tel" name="tel" type="tel" class="validate" maxlength="10">
              <label for="tel">Téléphone</label>
            </div>
          </div>

          <!-- Sexe -->
          <div class="row">
                <div class="col s6 l6">
                  <input name="sexe" type="radio" id="sH" value="H" class="with-gap" />
                  <label for="sH" style="margin:auto;">Homme</label>
                  <input name="sexe" type="radio" id="sF" value="F" class="with-gap" />
                  <label for="sF" style="margin:auto;">Femme</label>
               </div>
          </div>
          <div class="row">
               <div class="col s6 l6">
                <div id="section_type_utilisateur">                 
                 <label for='type_utilisateur_profil'>Type d'utilisateur</label>
                  <select id='type_utilisateur_profil'>
                    <option value='eleve'>Élève</option>
                    <optgroup label='Membre du personnel'>
                      <option value='administration'>Administration</option>
                      <option value='enseignant'>Enseignant</option>
                      <option value='professionnel'>Professionnel</option>
                      <option value='soutien'>Soutien</option>
                    </optgroup>
                    <optgroup label='Autre'>
                      <option value='ami'>Ami</option>
                      <option value='parent'>Parent</option>
                    </optgroup>
                  </select>
                  </div>
               </div>
               <?php 
               afficher_select_type($_SESSION['uid']);
               ?>

          </div>

          <!-- Boutons annuler/enregistrer -->
          <div class="row">
            <div class="col s12 l12">
            <button class="btn green" type="button" style="width:100%" onclick="transfert_coord_perso()">Enregistrer</button>
            </div>
            <div class="col l12 s12" style="height:15px"></div>
            <div class="col s12 l12">
            <button class="btn red" type="button" style="width:100%" onclick="location.reload()">Annuler</button>
            </div>
          </div>
        </div>
      </li>
      <!-- ACTIVITE -->
      <li class="act">
        <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités</div>
        <div class="collapsible-body" style="display: none;">
         
           <ul class="collapsible" data-collapsible="expandable">
         
           <!-- Chaque LI représente 1 activité -->
           <li>
           <div class="collapsible-header"><i class="material-icons">directions_bike</i>Nom_act+Date</div>
           <div class="collapsible-body">

            <div class="row">
                <div class="input-field col s6 l4">
                  <input id="nom_activite" type="text" class="validate" disabled />
                  <label for="nom_activite">Nom de l'activité</label>
                </div>
              </div>
              <div class="row">

                <div class="input-field col s12 l4">
                    <input id="date_act" type="date" class="datepicker" disabled />
                    <label for="date_act">Date de l'activité</label>
                </div>

                <div class="input-field col s6 l4">
                    <label for="heure_deb">Heure de début</label>
                    <input id="heure_deb" class="timepicker" type="time" disabled />
                </div>
                <div class="input-field col s6 l4">
                     <label for="duree">Durée</label>
                  <input type="number" step="5" minimum="0" id="frais" name="duree" disabled />
                 </div>
                </div>
                <div class="row">
                <div class="input-field col s6 l4">
                  <label  for="frais">Frais de l'activité</label>
                  <input type="number" step="5" minimum="0" id="frais" name="frais" disabled />
                </div>
              
                <div class="input-field col s6 l4">
                  <label  for="point">Nombre de points</label>
                  <input type="number" step="0.25" maximum="3" minimum="0" id="point" name="point" disabled />
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12 l12">
                  <textarea id="endroit" class="materialize-textarea" maxlength="200" disabled></textarea>
                  <label for="endroit">Endroit</label>
                </div>
              </div>
                  
              <div class="row">
                <div class="input-field col s12 l12">
                  <textarea id="commentaire" class="materialize-textarea" maxlength="200" disabled></textarea>
                  <label for="commentaire">Commentaire</label>
                </div>
              </div>


           </div>
           </li>
              
           
        </div>
      </li>

</ul>
</div>
</li>
</ul>
</div>
<?php
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