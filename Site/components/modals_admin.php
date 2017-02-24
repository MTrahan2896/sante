<!-- Modal Création d'activité -->
<div id="modal_new_activite" class="modal">
  <div class="modal-content">
    <div class="row" style="text-align: center;">
      <h4 class="">Créer une activité</h4>
    </div>
    <div class="row">
      <div class="input-field col s12 l8">
        <input id="nom_activite" type="text" class="validate" maxlength="75">
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
           <input class="jscolor" value="3152C3" id="couleur_activite" maxlength="6">
      </div>
      <button class="btn col s12 l6" onclick="appliquer_couleur()" style="margin-top: 15px; height: 45px">Générer couleur</button>
    </div>
    <div class="row">
      <div class="input-field col s12 l12">
        <textarea id="description" class="materialize-textarea" maxlength="255"></textarea>
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

<!-- Génère un code hexadecimal et l'assigne au textbox -->
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

  
//Fonction ajax pour créer une activité
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

<!-- Modal pour créer un groupe -->
<div id="modalNouveauGroupe" class="modal" style="height: 510px !important">
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
              <input name="nomgroupe" id="nomgroupe" type="text" class="validate" maxlength="65">
              <label for="nom_groupe">Nom du groupe</label>
            </div>
            
            <div class="input-field col s12" style="margin-top:15px">
            <i class="material-icons prefix">date_range</i>
            <select id="session" name="session" ng-options="session.Nom_Session as session.Nom_Session for session in sessions track by session.ID_Session" ng-model="session">

               <option value="" disabled selected>Session</option>
            </select>
            </div>

            <div class="input-field col s12" style="margin-top:15px">
            
            <select id="ensemble" name="ensemble" ng-model="selected">
            <option value="" disabled selected>Ensemble</option>
            <option value="1">Ensemble 1</option>
            <option value="2">Ensemble 2</option>
            <option value="3">Ensemble 3</option>
            </select>
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
          <div ng-repeat="compte in comptesAvecCodeDansGroupe(0)" >
            <div ng-show="compte.administrateur <1">{{compte.code_acces}}</div>
          </div>
          <div style="text-align:center;">
            <a class="waves-effect waves-light btn" ng-click="print(groupe.id_groupe)" style="bottom: 15px; margin-top: 30px"><i class="material-icons left">print</i>Imprimer</a>
          </div>
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
    <div class="modal-content container" style="text-align: center; height: 100%" >
      <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
        <h5>Générer des codes administrateurs</h1>
      </div>
      <div class="contenu-modal">


        <div class="row">
          <label for="qt_code">Nombre de codes</label>
          <input type="number" name="qt_code" id="codeAdmin" min="1" max="10" ng-min="1" ng-max="10" validate>
   </div>
  <div style="text-align: left;">
    <p>
      <input name="niveauAdmin" type="radio" id="adminNiveauAdmin" value="2"/>
      <label for="adminNiveauAdmin">Administrateur</label>
    </p>
    <p>
      <input name="niveauAdmin" type="radio" id="adminNiveauPlanif" value="1"/>
      <label for="adminNiveauPlanif">Planificateur</label>
    </p>

 </div>

     
          <button ng-click="genererCodeAdmin()" type="button" class="btn" style="position: relative; margin-bottom: 45px; margin-top: 15px">Générer</button>
    
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
           <span ng-show="admin.administrateur >= 1">{{admin.CODE_ACCES}}</span>
        </div>

       
          <button ng-click="genererCodeAdmin()" type="button" class="btn" style="position: relative; margin-bottom: 45px; margin-top: 15px">Générer</button>
        </div>
      </div>
    </div>
  </div>



<!-- Modal pour créer des sessions -->
<div id="modal_session" class="modal">
  <div class="modal-content">
    <div class="row" style="text-align: center;">
      <h4 class="">Créer une session</h4>
    </div>
    <div class="row">
      <div class="input-field col s12 l8">
        <input id="nom_session" type="text" class="validate" maxlength="60">
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

<!-- Fonction AJAX pour créer des sessions -->
<script>
  function creer_session(){
    $.ajax({
            type: "POST",
            url: "php_scripts/creer_session.php",
            data: {'nom': $("#nom_session").val(),
                   'deb': $('#deb_session').val(),
                   'mi': $("#mi_session").val(),
                   'fin': $('#fin_session').val() }, 
            success: function (data) {
                console.log(data);     
                location.reload();          
        },
            error: function (req) {
                alert("erreur");
            }
        });
}        
</script>




<!-- Modal pour planifier des activités -->
<div id="modal_planif" class="modal">
     <div class="modal-content">
       <div class="row" style="text-align:center">
           <h4>Planifier une activité</h4>
       </div>
 
         <div class="input-field col s12">
           <select required id="nom_act" name="nom_act">
           <option value="">Choisir une activité</option>
           <option ng-repeat="activite in activites" value={{activite.ID_Activite}}>{{activite.Nom_Activite}}, {{activite.Duree}} minutes</option>
           </select>
           <label>Nom de l'activité</label>
         </div>
 
         <div class="input-field col s12">
           <input id="date_act" type="date" class="datepicker">
           <label for="date_act">Date de l'activité</label>
         </div>
 
         <div class="row">
           <div class="input-field col s12">
             <label for="heure_deb">Heure de début</label>
             <input id="heure_deb" class="timepicker" type="time" ng-model="$ctrl.NA">
           </div>
         </div>
 
 
       <div class="row">
         <div class="input-field col s6 l6">
           <label  for="participants_max">Nombre de participants maximum</label>
           <input type="number" step="1" maximum="180" minimum="0" id="participants_max" name="participants_max"/>
         </div>
 
         <div class="input-field col s6 l6">
           <label  for="frais">Frais de l'activité</label>
           <input type="number" step="5" minimum="0" id="frais" name="frais"/>
         </div>
       </div>
 
       <div class="row">
         <div class="input-field col s12 l12">
           <textarea id="endroit" class="materialize-textarea"></textarea>
           <label for="endroit">Endroit</label>
         </div>
       </div>





       <div class="row">
         <div class="input-field col s12 l12">
              <select id="selectResponsable"
            ng-options=" p.Prenom+', '+p.Nom for p in comptesAdministrateur track by p.id_utilisateur"
            ng-model="responsableSelectionne"
            
            >
              
            </select>
            
           
         </div>
       </div>
      
        <div class="row">
         <div class="col s12 l12">
           <button type="button" class="btn green" href="" style="width:100%" ng-click="test()" onclick="planifier_act();"> Planifier</button>
         </div>
         <div class="col s12 l12" style="height: 15px;"></div>
         <div class="col s12 l12">
           <button class="btn red" href="" style="width: 100%"> Annuler</button>
         </div>
     </div>  
 
   </div>
  
 </div>
<!-- Fonction AJAX pour  Modal Planifier-->
<script>
  function planifier_act(){
    $.ajax({
      type: "POST",
      url: "php_scripts/planifier_activite.php",
      data: {
             'nom_act': $("#nom_act").val(),
             'date_act': $("#date_act").val(),
             'heure_deb': $("#heure_deb").val(),
             'participants_max': $('#participants_max').val(),
             'frais': $('#frais').val(),
             'endroit':$('#endroit').val()

            },
      success: function (data) {
        alert("L'activité a été planifiée avec succès")
        location.reload();
      },
      error: function (req) {
        alert("erreur");
      }
    });
  }
</script>


 <div id="modal_niveauAdmin" class="modal" style="height: 300px!important">
     <div class="modal-content">
       <div class="row" style="text-align:center">
           <h4>Modifier les permissions</h4>
       </div>
          <input type="hidden" id="utilisateurNivAdmin">
          <select id="niveauUser">
            <option value="1">Responsable</option>
            <option value="2">Administrateur</option>
            <option value="0">Utilisateur Régulier</option>
          </select>
          <br>
          <div class="center">
          <button type="button" class="blue btn" ng-click="saveAdmin()">Enregistrer</button>
        </div>
 
   </div>
  
 </div>





