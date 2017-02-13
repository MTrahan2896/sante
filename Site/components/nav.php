 <nav>


      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Défi Santé</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="accueil.php">Accueil</a></li>
          <li><a class="adminTabs" href="administration.php">Administration</a></li>
          <li><a href="collapsible.html"></a></li>
          
        </ul>
        
        <?php
        if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

        if(!isset($_SESSION['uid'])){
         $_SESSION['uid'] = 0;
          echo "<script> document.getElementById('Greet_User').innerHTML ='".$_SESSION['username']."'; $('.adminTabs').remove();</script>";
       
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
            <li style="margin-right: 20px"><span id="Greet_User"></span></li>
            <li>  <button class="btn blue waves-effect waves-light right" style="margin-top:14px;margin-right:10px;" type="submit" name="deconnexion">Déconnexion
              </button></li>
            </form>';

           echo "<script> document.getElementById('Greet_User').innerHTML ='Bonjour ".$_SESSION['username']."'</script>";

          if (isset($_POST['deconnexion']))
          {
            $_SESSION['uid'] = 0;
            header('Location: accueil.php');
          }
        }
        



        ?>

      </div>
    </nav>

    <?php
    include 'connexion.php';
    ?>


