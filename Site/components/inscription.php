    <style>
      #modal_ins .modal-content
      {
        width:300px;
      }

    </style>


     <div class="modal" id="modal_ins">
        <div class="modal-content ">
          <div class="row">
             <h4 class="col s4 offset-s2">Inscription</h4>
          </div>

          <div class="row">
          
              <div class="input-field col s12">
                 <i class="material-icons prefix">perm_identity</i>
                 <input name="user" id="user" type="text" class="validate">
                 <label for="user">nom d'utilisateur</label>
              </div>
          </div>

            <div class="row">
              
              <div class="input-field col s7">
                <i class="material-icons prefix">person_pin</i>
                <input name="prenom" id="prenom" type="text" class="validate">
                <label for="prenom">Prenom</label>
              </div>
          
              <div class="input-field col s5">
                <input name="nom" id="nom" type="text" class="validate">
                <label for="nom">Nom</label>
              </div>
            </div>
            <div class="row">
              
             <div class="input-field col s12">
               <i class="material-icons prefix">email</i>
               <input name="couriel" id="couriel" type="text" class="validate">
               <label for="couriel">couriel</label>
             </div>
            </div>
            <div class="row">
              
              <div class="input-field col s10">
                <i class="material-icons prefix">phone</i>
                <input name="tel" id="telephone" type="text" class="validate">
                <label for="telephone">Telephone</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <i class="material-icons prefix">people</i>
                <input name="sexe" type="radio" id="s1" value="H" />
                <label for="s1" style="margin:auto;">Homme</label>
                <input name="sexe" type="radio" id="s2" value="F" />
                <label for="s2" style="margin:auto;">Femme</label>
             </div>
            </div>
            <div class="row">
            
             <div class="input-field col s12">
               <i class="material-icons prefix">lock</i>
               <input name="pass" id="pass" type="password" class="validate">
               <label for="pass">Mot de passe</label>
             </div>
            </div>
            <div class="row">
            
              <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input name="confpass" id="confpass" type="password" class="validate">
                <label for="confpass">Confirmer le mot de passe</label>
              </div>
            </div>
            <div class="row">
              <div class="col s6">
              <a class="btn green" href=""> accepter</a>
              </div>
              <div class="col s6">
              <a class="btn red" href=""> Annuler</a>
              </div>
            </div>
        </div>
        
      </div>