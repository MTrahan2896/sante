<?php
include 'php_scripts\connexion_fnc.php';
?>
<div id="modal_login" class="modal">
  <div class="modal-content">
    <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
      <img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png" id="imgDef" style="height:150px;width:150px;">
    </div>
    <div class="contenu-modal">
      <div class="row">
        <form class="col s12" action="" method="POST">
          <div class="row">
            <div class="input-field col s12" style="margin-top:15px">
              <i class="material-icons prefix">account_circle</i>
              <input id="username" type="text" class="validate">
              <label for="username">Nom d'utilisateur</label>
            </div>
            <div class="input-field col s12" style="margin-top:15px">
              <i class="material-icons prefix">lock</i>
              <input id="pwd" type="password" class="validate">
              <label for="pwd">Mot de passe</label>
            </div>
            <div class="col s12" style="margin-top:15px">
              <button class="btn waves-effect waves-light" type="button" onclick="tenterConnexion()" name="connexion">Connexion</button>
            </div>
            <div class="col s12" style="margin-top:15px">
              <a href="#">Inscription</a>
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<?php

  if (isset($_POST['connexion']))
  {
  verifier_user_existant($_POST['username'],$_POST['pwd']);
  echo "ahaha";
  }


?>