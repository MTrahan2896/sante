  <?php include 'php_scripts/charger_liste_activite.php'; ?>
  <div id="modal_planif" class="modal">
    <div class="modal-content">
      <div class="row" style="text-align:center">
          <h4>Planifier une activité</h4>
      </div>

        <div class="input-field col s12">
          <select required id="nom_act">
          <option value="">Choisir une activité</option>
          <?php charger_liste(); ?>
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


<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/chingyawhao/materialize-clockpicker/master/dist/css/materialize.clockpicker.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script src="https://cdn.rawgit.com/chingyawhao/materialize-clockpicker/master/dist/js/materialize.clockpicker.js"></script>
    
<script>
  //Time Picker:
$('.timepicker').pickatime({
    default: 'now',
    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
    donetext: 'OK',
  autoclose: false,
  vibrate: true // vibrate the device when dragging clock hand
});
  
  function planifier_act(){
    $.ajax({
      type: "POST",
      url: "php_scripts/planifier_activite.php",
      data: {
             'nom_act': $("#nom_activite").val(),
             'date_act': $("#date_act").val(),
             'heure_deb': $("#heure_deb").val(),
             'participants_max': $('#participants_max').val(),
             'frais': $('#frais').val(),
             'endroit':$('#endroit').val()
            },
      success: function (data) {
        alert("L'activité a été planifiée avec succès")
        console.log(data);
      },
      error: function (req) {
        alert("erreur");
      }
    });
  }
</script>

