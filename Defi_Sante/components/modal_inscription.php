<script src="js/ajax_inscription.js"></script>
<?php 
include_once 'php_scripts/afficher_info_user.php'; 
?>
<div class="modal" id="modal_ins">
  <div class="modal-content ">
    <div class="row" style="text-align: center;">
      <h4 class="">Inscription</h4>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">perm_identity</i>
        <input name="username" id="user" type="text" class="validate" maxlength="30">
        <label for="username">Nom d'utilisateur*</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12 l6">
        <!--    <i class="material-icons prefix">person_pin</i> -->
        <input name="prenom" id="prenom" type="text" class="validate" maxlength="50">
        <label for="prenom">Prénom*</label>
      </div>
      
      <div class="input-field col s12 l6">
        <input name="nom" id="nom_t" type="text" class="validate" maxlength="50">
        <label for="nom">Nom*</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">email</i>
        <input name="courriel" id="courriel" type="text" class="validate" maxlength="75">
        <label for="courriel">Courriel*</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s10">
        <i class="material-icons prefix">phone</i>
        <input name="telephone" id="telephone" type="text" class="validate" maxlength="10">
        <label for="telephone">Téléphone</label>
      </div>
    </div>

    <div class="row">
      <div class="col s12">
        <i class="material-icons prefix">people</i>
        <input name="sexe" type="radio" id="s1" value="H" checked />
        <label for="s1" style="margin:auto;">Homme</label>
        <input name="sexe" type="radio" id="s2" value="F" />
        <label for="s2" style="margin:auto;">Femme</label>
      </div>
    </div>

    <div class="row">
      <div class="col s12 l12" id="section_type_utilisateur">                 
        <?php
        $query = "select * from utilisateurs where code_acces = '".$_SESSION['code_insc']."'";
        $mysqli = new mysqli('localhost','root','','bd_application');
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if(is_null($row['ID_Groupe']))
              {
                 echo "<label for='type_utilisateur'>Type d''utilisateur</label>
              <select id='type_utilisateur'>
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
              </select>";
              }
          }
        $result->close();
        }
        $mysqli->close();
        ?>   
      </div>

    </div>

    <div class="row">  
      <div class="input-field col s12">
        <i class="material-icons prefix">lock</i>
        <input name="password" id="pass" type="password" class="validate">
        <label for="password">Mot de passe*</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">lock</i>
        <input name="confpass" id="confpass" type="password" class="validate">
        <label for="confpass">Confirmer le mot de passe*</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l12">
      <button type="button" class="btn green" href="" onclick="valider()" style="width:100%">Enregistrer</a>
    </div>
    <div class="col s12 l12" style="height:15px"></div>
    <div class="col s12 l12">
      <button type="button" class="btn red" href="" onclick="" style="width:100%">Annuler</button>
    </div>
  </div>
</div>

</div>