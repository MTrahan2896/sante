<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    
    @media screen and (min-width: 700px) {
    .modal { width: 20% !important ;
            height: 45% !important ; 
            top: auto !important;
            bottom: 40%;}}

    #imgDef {width: 200px; height: 200px;}

    .input-field label {
    font-size: 12px !important;
    }
    </style>
  </head>
  <body>
    
    
    <!-- Modal Structure -->
    
    <div id="modal_login" class="modal">
      <div class="modal-content">
        <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
          <img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png" id="imgDef" style="height:150px;width:150px;" />
        </div>
        <div class="contenu-modal">

          <div class="row">
            <form class="col s12">
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
                  <button id="connexion" class="btn col s12">Connexion</button>
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
    <button data-target="modal_login" class="btn">Connexion / Inscription</button>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
    
    $('.modal').modal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    opacity: .3, // Opacity of modal background
    inDuration: 300, // Transition in duration
    outDuration: 200, // Transition out duration
    startingTop: '4%', // Starting top style attribute
    endingTop: '10%', // Ending top style attribute
    
    }
    );
    </script>
  </body>
</html>
</html>