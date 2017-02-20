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