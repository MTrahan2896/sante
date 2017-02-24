<?php
function formater($champ)
{
  $champ = str_replace("'","''",$champ);
  $champ = trim($champ);
  $champ = strtolower($champ);
  $champ = ucfirst($champ); 
  return $champ;
}

function guillemeter($champ){ //Aurtografe korect

	return "'".$champ."'";
}

//Vérifie si le username est déjà utilisé
function verifier_user_existant($username,$pwd_input)
{
  $req = "select * from utilisateurs where username = '".$username."'";
  
  $mysqli = new mysqli('localhost','root','','bd_application');
  $myArray = array();
  if ($result = $mysqli->query($req)) {

    if ( mysqli_num_rows($result) == 0) 
    {
      return true;
    }
    else
    {
      return false;
    }  
  }

  $mysqli->close();  
}


$valide = false;
//VALIDER QUE LE FORMULAIRE SOIT POSTÉ AVEC UN CODE D'ACCÈS VALIDE
$query = "select id_utilisateur from utilisateurs where BINARY CODE_ACCES = '".$_POST['code']."'";
  
  $mysqli = new mysqli('localhost','root','','bd_application');
  $myArray = array();
  if ($result = $mysqli->query($query)) {

    if ( mysqli_num_rows($result) == 1) 
    {
    $row = $result->fetch_array();
   	$valide = true;
   	
    }
    else
    {
    echo 'fail';
    } 
  }

  $mysqli->close();  



if($valide){

  if(($_POST['username'] !='') && ($_POST['nom'] !='') && ($_POST['prenom'] !='') && ($_POST['courriel'] !='') && ($_POST['password'] !='') && ($_POST['confirm_password'] !=''))
  {
      //Si le nom d'utilisateur est disponible
      if(verifier_user_existant($_POST['username'],$_POST['password']))
      {
        //Vérification si les deux mots de passe sont identiques
        if ($_POST['password'] == $_POST['confirm_password'])
        {
          $pass=$_POST['password'];
          $pass=password_hash($pass, PASSWORD_DEFAULT);

          $query = "update utilisateurs set nom=".guillemeter(formater($_POST['nom'])).
                   ", prenom=".guillemeter(formater($_POST['prenom'])).", username=".guillemeter(formater($_POST['username'])).
                   ", actif=1, courriel=".guillemeter(formater($_POST['courriel'])).",   telephone=".guillemeter($_POST['telephone']).
                   ", sexe=".guillemeter(formater($_POST['sexe'])).", password=".guillemeter($pass).",";

          if (isset($_POST['type_utilisateur']))
          {
          $query = $query. "Type_Utilisateur='".$_POST['type_utilisateur']."',code_acces='' where code_acces=".guillemeter($_POST['code']).";";
          }
          else
          {
          $query = $query. "Type_Utilisateur='Eleve',code_acces='' where code_acces=".guillemeter($_POST['code']).";";
          }
          $mysqli = new mysqli('localhost','root','','bd_application');
          $mysqli->query($query);
          echo "Inscription réussie";
        }
        else
        {
         echo "Les deux mots de passe ne sont pas identiques";
        }
      }
      else
      {
        echo "Veuillez choisir un autre nom d'utilisateur";
      }
  }
  else{
    echo "Veuillez remplir les champs obligatoires";
  }

}
?>
