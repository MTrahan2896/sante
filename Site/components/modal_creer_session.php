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


