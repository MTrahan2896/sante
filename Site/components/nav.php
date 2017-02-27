 <nav>


      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Défi Santé</a>



      













        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="accueil.php">Accueil</a></li>

          <?php
          if(isset($_SESSION['admin'] )){
           if($_SESSION['admin'] != 0){?>
          
          <li><a class="adminTabs" href="administration.php">Administration</a></li>
          <?php }}?>


          <li><a class="adminTabs" href="activites.php">Mes Activités</a></li>
          <li><a href="stats.php">Statistiques</a></li>
          
        </ul>
        
        <?php


        if(!isset($_SESSION['uid'])){
         $_SESSION['uid'] = 0;
          }
         if (isset($_SESSION['username'])){
                    }
        if ($_SESSION['uid'] == 0)
        {
        echo '
        <ul id="nav-mobile" class="right">
        
        <li><a data-target="modal_login"><i class="material-icons prefix">account_circle</i></a></li>
        </ul>';

        }
        else
        {     
          echo '
            <form action="Accueil.php" method="POST">
            <ul id="nav-mobile" class="right">
            <li style="margin-right: 20px"><a href="profil.php"><span id="Greet_User" class="hide-on-small-only"></span></a></li>
            <li>  <button class="btn blue waves-effect waves-light right hide-on-small-only" style="margin-top:14px;margin-right:10px;" type="submit" name="deconnexion">Déconnexion
              </button></li>
            </form>';

           echo "<script> document.getElementById('Greet_User').innerHTML ='Bonjour ".$_SESSION['username']."'</script>";

          if (isset($_POST['deconnexion']))
          {
            $_SESSION['uid'] = 0;
            $_SESSION['admin'] = 0;
            $_SESSION['username'] = "nobody";
            header('Location: accueil.php');
          }
        }
        
       
        
        

        ?>

      </div>
    </nav>
    <div class="fixed-action-btn horizontal click-to-toggle hide-on-large-only " style="margin-right: -20px" >
    <a class="btn-floating btn-large blue darken-2">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a ng-show="<?=$_SESSION['admin']?> > 1" class="btn-floating  waves-effect waves-light blue" href="administration.php"><i class="material-icons">supervisor_account</i></a></li>
      <li><a ng-show="<?=$_SESSION['admin']?> > 1" class="btn-floating blue waves-effect waves-light" href="statistiques.php"><i class="material-icons">assessment</i></a></li>
      <li><a ng-show="<?=$_SESSION['uid']?> != 0" class="btn-floating  waves-effect waves-light blue" href="activites.php"><i class="material-icons">directions_bike</i></a></li>
      <li><a class="btn-floating  waves-effect waves-light blue" href="accueil.php"><i class="material-icons">home</i></a></li>
      <li><a ng-show="<?=$_SESSION['uid']?> != 0" class="btn-floating blue waves-effect waves-light" onclick="deconnexion()" ><i class="material-icons">exit_to_app</i></a></li>
      <li><a ng-show="<?=$_SESSION['uid']?> == 0" class="btn-floating blue waves-effect waves-light" data-target="modal_login" ><i class="material-icons">account_circle</i></a></li>
      
    </ul>
  </div>

  <script>
    

    function deconnexion(){

         $.ajax({
            type: "POST",
            url: "accueil.php",
            data: {
                'deconnexion': true,
            }, //TODO: CHANGE PROF ID
            success: function(data) {
                
                   location.reload();
                    
            },
            error: function(req) {
                alert("erreur");
            }
        });


    }

  </script>

    <?php
    include 'modal_connexion.php';
    ?>


