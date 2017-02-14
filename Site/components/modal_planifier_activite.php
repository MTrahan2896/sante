  <div id="modal_planif" class="modal">
    <div class="modal-content">
      <div class="row" style="text-align:center">
          <h4>Planifier une activité</h4>
      </div>

        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Nom de l'activité</option>
            <option value="1">Badminton</option>
            <option value="2">Randonnée pédestre</option>
            <option value="3">Rugby</option>
          </select>
          <label>Nom de l'activité</label>
        </div>

        <div class="input-field col s12">
          <input id="date_act" type="date" class="datepicker">
          <label for="date_act">Date de l'activité</label>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <label for="timepicker_ampm_dark">Time am/pm ( dark theme )</label>
            <input id="timepicker_ampm_dark" class="timepicker" type="time">
          </div>
        </div>


      <div class="row">
        <div class="input-field col s6 l6">
          <label  for="participants_max">Nom de participants maximum</label>
          <input type="number" step="1" maximum="180" minimum="0" id="participants_max" name="participants_max"/>
        </div>

        <div class="input-field col s6 l6">
          <label  for="frais">Frais de l'activité</label>
          <input type="number" step="5" minimum="0" id="frais" name="frais"/>
        </div>
      </div>

       <div class="row">
        <div class="col s6 l6">
          <a class="btn green" href=""> Accepter</a>
        </div>
        <div class="col s6 l6">
          <a class="btn red" href=""> Annuler</a>
        </div>
    </div>  

  </div>
 
</div>