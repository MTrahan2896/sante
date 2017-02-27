<?php
session_start();
?>
<html ng-app="app_profil" ng-controller="ctrl">
<head>

  <?php include 'components/headContent.php' ?>
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
          <div class="row center">
            <div class="">
            <button class="btn green" type="button"  onclick="transfert_coord_perso()">Enregistrer</button>
            </div>
            <div  style="height:15px"></div>
            <div >
            <button class="btn red" type="button"  onclick="location.reload()">Annuler</button>
            </div>
          </div>
        </div>
      </li>
      <!-- ACTIVITE -->
      <li class="act">
        <div class="collapsible-header"><i class="material-icons">directions_bike</i>Activités</div>
        <div class="collapsible-body" style="display: none;">
           <p id="aucune_activite"> </p>
           <ul class="collapsible" data-collapsible="expandable" id="liste_activite">
         
           <!-- Chaque LI représente 1 activité -->
           <li ng-repeat="activite in activites" id="li_activite">
           <div class="collapsible-header"><i class="material-icons">directions_bike</i>{{activite.nom_activite}} {{activite.date_activite}}<i class=" material-icons right " ng-click="annuler_participation(activite)" >cancel</i></div>
           <div class="collapsible-body">
           <input type="hidden" id="id_act_utilisateur" value="{{activite.ID_Eleve_Activite}}"/>
            <div class="row">
                <div class="input-field col s6 l4">
                  <input id="nom_activite" type="text" class="validate" disabled value="{{activite.nom_activite}}" format='yyyy-mm-dd' />
                  <label for="nom_activite">Nom de l'activité</label>
                </div>
              </div>
              <div class="row">

                <div class="input-field col s12 l4">
                    <input id="date_act" type="text" value="{{activite.date_activite}}" disabled />
                    <label for="date_act">Date de l'activité</label>
                </div>

                <div class="input-field col s6 l4">
                    <label for="heure_deb">Heure de début</label>
                    <input id="heure_deb"  type="text" value="{{activite.Heure_Debut}}" disabled />
                </div>
                <div class="input-field col s6 l4">
                     <label for="duree">Durée (Minutes)</label>
                  <input type="text" id="duree" name="duree" value="{{activite.Duree}}" disabled />
                 </div>
                </div>
                <div class="row">
                <div class="input-field col s6 l4">
                  <label  for="frais">Frais de l'activité</label>
                  <input type="text" id="frais" name="frais" value="{{activite.Frais}}" disabled />
                </div>
              
                <div class="input-field col s6 l4">
                  <label  for="point">Nombre de points</label>
                  <input type="text" step="0.5" maximum="3" minimum="0" id="point" name="point" value="{{activite.Ponderation}}" disabled />
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12 l12">
                  <input id="endroit" type="text" value="{{activite.Endroit}}" disabled />
                  <label for="endroit">Endroit</label>
                </div>
              </div>
                  
              <div class="row">
                <div class="input-field col s12 l12">
                  <input id="commentaire" type="text" value="{{activite.Commentaire}}" disabled />
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
<script>

if (($("#liste_activite").children.length) == 2)
{
    $("#liste_activite").hide();
    $("#aucune_activite").html("Aucune activé, veuillez vous inscrire depuis la <a href=\"accueil.php\">Page d'accueil</a>");
}
else
{
   $("#liste_activite").show();
    $("#aucune_activite").html(" ");
}
</script>
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
 <?php include 'js/ScriptsProfil.php'; ?>


 <script>

  $( document ).ready(function() {
    
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd'
  });
});
   
 </script>
<div class="hiddendiv common"></div></body></html>