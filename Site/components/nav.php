 <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Défi Santé</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="accueil.php">Accueil</a></li>
          <li><a href="sass.html">Administration</a></li>
          <li><a href="collapsible.html"></a></li>
        </ul>
        
        <?php
        


        if(!isset($_SESSION['uid'])){
         $_SESSION['uid'] = 0;
        }
        if ($_SESSION['uid'] == 0)
        {
        echo '
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a data-target="modal_login"><i class="material-icons prefix">account_circle</i></a></li>
        </ul>';
        }
        else
        {     
          echo '
            <form action="Accueil.php" method="POST">
              <button class="btn waves-effect waves-light right" style="margin-top:14px;margin-right:10px;" type="submit" name="deconnexion">Déconnexion
              </button>
            </form>';

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