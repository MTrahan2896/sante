    <div class="modal" id="modal_ins">
        <div class="modal-content ">
          <div class="row" style="text-align: center;">
             <h4 class="">Inscription</h4>

          </div>

          <div class="row">
          
              <div class="input-field col s12">
                 <i class="material-icons prefix">perm_identity</i>
                 <input name="username" id="user" type="text" class="validate">
                 <label for="username">nom d'utilisateur</label>
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
               <input name="courriel" id="courriel" type="text" class="validate">
               <label for="courriel">courriel</label>
             </div>
            </div>
            <div class="row">
              
              <div class="input-field col s10">
                <i class="material-icons prefix">phone</i>
                <input name="telephone" id="telephone" type="text" class="validate">
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
               <input name="password" id="pass" type="password" class="validate">
               <label for="password">Mot de passe</label>
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
              <a class="btn green" href=""> Accepter</a>
              <button type="button" class="btn green" href="" onclick="valider()">Enregistrer</a>

              </div>
              <div class="col s6">
              <a class="btn red" href="">Annuler</a>
              </div>
            </div>
            </form>
        </div>
        
      </div>

      <script>
        function valider(){
        
         $.ajax({
            type: "POST",
            url: "php_scripts/inscrire.php",
            data: {
            'username': $("#user").val(), 
            'prenom': $("#prenom").val(), 
            'nom': $("#nom").val(), 
            'courriel': $("#courriel").val(), 
            'telephone': $("#telephone").val(), 
            'sexe': $("input[type='radio'][name='sexe']:checked").val(),
            'password': $("#pass").val(),
            'code' : $("#code_acces").val()}, 
            success: function (data) {
                
                console.log(data);
            },
            error: function (req) {
                
            }
        }

       ); }



      </script>