 <nav>
<?php        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            } ?>

      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Défi Santé</a>



        <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>













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
       if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }

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

    <?php
    include 'modal_connexion.php';
    ?>


