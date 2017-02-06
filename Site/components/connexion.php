<div id="modal_login" class="modal">
  <div class="modal-content">
    <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
      <img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png" id="imgDef" style="height:150px;width:150px;">
    </div>
    <div class="contenu-modal">
      <div class="row">
        <form class="col s12" action="accueil.php" method="POST">
          <div class="row">
            <div class="input-field col s12" style="margin-top:15px">
              <i class="material-icons prefix">account_circle</i>
              <input id="username" name="username" type="text" class="validate">
              <label for="username">Nom d'utilisateur</label>
            </div>
            <div class="input-field col s12" style="margin-top:15px">
              <i class="material-icons prefix">lock</i>
              <input id="pwd" name="pwd" type="password" class="validate">
              <label for="pwd">Mot de passe</label>
            </div>
            <div class="col s12" style="margin-top:15px">
              <button class="btn waves-effect waves-light" type="" onclick="" name="connexion">Connexion</button>
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
function verifier_user_existant($username,$pwd_input)
{
  $query = "Select * from utilisateur where username = '".$username."'";
  $mysqli = new mysqli('localhost','root','','bd_application');
  $myArray = array();
  if ($result = $mysqli->query($query)) {

    if ( mysqli_num_rows($result) == 1) 
    {
    $row = $result->fetch_array();
    verifier_password($row['id_utilisateur'],$username, $pwd_input, $row['password']);

    }
    else
    {
    echo "<script>alert('User invalid');</script>";
    }
        
  }

  $result->close();
  $mysqli->close();  
}

function verifier_password($id,$username,$pwd_input,$pwd)
{ 
  if (password_verify($pwd_input,$pwd))
  {
    echo "<script>alert('Login completed');</script>";
    $_SESSION['uid'] = $id;
    header('Location: accueil.php');
  }
  else
  {
    echo "<script>alert('Login failed');</script>";
  }

}
?>


<?php

  if (isset($_POST['connexion']))
  {
  verifier_user_existant($_POST['username'], $_POST['pwd']);
  }


?>