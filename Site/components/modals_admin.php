<!-- Modal Structure -->
<div id="modal_new_activite" class="modal">
  <div class="modal-content">
    <div class="row" style="text-align: center;">
      <h4 class="">Créer une activité</h4>
    </div>
    <div class="row">
      <div class="input-field col s12 l8">
        <input id="nom_activite" type="text" class="validate">
        <label for="nom_activite">Nom de l'activité</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6 l4">
        <label  for="duree">Durée (Minutes)</label>
        <input type="number" step="1" maximum="180" minimum="0" id="duree" name="duree"/>
      </div>
      <div class="input-field col s6 l4">
        <label  for="point">Nombre de points</label>
        <input type="number" step="0.25" maximum="3" minimum="0" id="point" name="point"/>
      </div>
    </div>
    Couleur de l'activité
    <div class="row">
      <div class="input-field col s12 l6">
           <input class="jscolor" value="3152C3" id="couleur_activite">
      </div>
      <button class="btn col s12 l6" onclick="appliquer_couleur()" style="margin-top: 15px; height: 45px">Générer couleur</button>
    </div>
    <div class="row">
      <div class="input-field col s12 l12">
        <textarea id="description" class="materialize-textarea"></textarea>
        <label for="description">Description</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l12">
        <button class="btn green" onclick="creer_act()" style="width:100%"> Créer</button>
      </div>
      <div class="col s12 l12" style="height:15px"></div>
      <div class="col s12 l12">
        <a class="btn red" href="" style="width:100%"> Annuler</a>
      </div>
    </div>
  </div>
</div>




  <script>
   function generer_couleur()
    {
      let codeHex ="#";

      for(i = 0; i < 6; i++)
      {
        codeHex +=  ("0123456789ABCDEF".substr(Math.floor(Math.random()*16), 1));
      }
      return codeHex;
    }

  function appliquer_couleur(){
    
  let code_couleur = generer_couleur();
  $("#couleur_activite").css("background-color",code_couleur);
  $("#couleur_activite").val(code_couleur.substr(1,6));
}

  

  function creer_act(){
    $.ajax({
      type: "POST",
      url: "php_scripts/creer_activite.php",
      data: {
             'nom_act': $("#nom_activite").val(),
             'duree': $('#duree').val(),
             'nbr_pts': $('#point').val(),
             'couleur':$('#couleur_activite').val(),
             'desc':$('#description').val()
            },
      success: function (data) {
        console.log(data);
      },
      error: function (req) {
        alert("erreur");
      }
    });
  }
</script>

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



  <div id="modalGenGroupe0" class="modal" style="height: 300px">
    <div class="modal-content" style="text-align: center">
      <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
        Générer des codes d'accès pour le groupe "{{groupe.nom_groupe}}"
      </div>
      <div class="contenu-modal">
        <div class="row">
          <label for="qt_code">Nombre de codes</label>
          <input type="number" name="qt_code" id="codeGroupe0" min="1" max="60" ng-min="1" ng-max="60" validate>
        </div>
        <button type="button" class="btn" ng-click="genererCodePourGroupe(0)">Générer</button>
      </div>
    </div>
  </div>

    <div id="modalGroupe0" class="modal" style="height: 300px !important">
    <div class="modal-content" style="height: 100%; ">
      <div class="entete-modal" style="margin-bottom: 15px; text-align:center;">
        Code d'accès sans groupe
      </div>
      <div class="contenu-modal">
        <div class="row" >
          <div ng-repeat="compte in comptesAvecCodeDansGroupe(0)">
            {{compte.code_acces}}
          </div>
          <div style="text-align:center;">
            <a class="waves-effect waves-light btn" ng-click="print(groupe.id_groupe)" style="bottom: 15px; margin-top: 30px"><i class="material-icons left">print</i>Imprimer</a>
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









  <div id="modalCodeAdmin" class="modal" style="height: 400px; width: 400px" >
    <div class="modal-content" style="text-align: center; height: 100%" >
      <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
        <h5>Générer des codes administrateurs</h1>
      </div>
      <div class="contenu-modal">
        <div class="row ">

        <div class="row">
          <label for="qt_code">Nombre de codes</label>
          <input type="number" name="qt_code" id="codeAdmin" min="1" max="10" ng-min="1" ng-max="10" validate>
        </div>

       
          <button ng-click="genererCodeAdmin()" type="button" class="btn" style="position: relative; margin-bottom: 45px; margin-top: 15px">Générer</button>
        </div>
      </div>
    </div>
  </div>





  <div id="modalAfficherCodeAdmin" class="modal" style="height: 400px; width: 400px" >
    <div class="modal-content" style="text-align: center; height: 100%" >
      <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
        <h5>Codes administrateurs</h1>
      </div>
      <div class="contenu-modal">
        <div class="row ">

        <div class="row" ng-repeat="admin in codesAdmin">
           {{admin.CODE_ACCES}}
        </div>

       
          <button ng-click="genererCodeAdmin()" type="button" class="btn" style="position: relative; margin-bottom: 45px; margin-top: 15px">Générer</button>
        </div>
      </div>
    </div>
  </div>



<script src="js/ajax_creer_session.js"></script>
<!-- Modal Structure -->
<div id="modal_session" class="modal">
  <div class="modal-content">
    <div class="row" style="text-align: center;">
      <h4 class="">Créer une session</h4>
    </div>
    <div class="row">
      <div class="input-field col s12 l8">
        <input id="nom_session" type="text" class="validate">
        <label for="nom_session">Nom de la session</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12 l8">
        <input type="date" class="datepicker" id="deb_session">
        <label for="deb_session">Date du début de la session</label>  
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12 l8">
        <input type="date" class="datepicker" id="mi_session">
        <label for="mi_session">Date de la mi-session</label>
      </div>  
    </div>

    <div class="row">
      <div class="input-field col s12 l8">
        <input type="date" class="datepicker" id="fin_session">
        <label for="fin_session">Date de la fin de la session</label> 
      </div>
    </div>

    <div class="row">
      <div class="col s12 l12">
        <button class="btn green" onclick="creer_session()" style="width:100%"> Créer</button>
      </div>
      <div class="col s12 l12" style="height:15px"></div>
      <div class="col s12 l12">
        <a class="btn red" href="" style="width:100%"> Annuler</a>
      </div>
    </div>
  </div>
</div>








<?php 


?>