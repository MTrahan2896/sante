<?php
if(isset($_POST['nom_user']) and isset($_POST['password'])){
$x = $_POST['nom_user'];
$y = $_POST['password'];
}
session_start();


function verifier_user_existant($username,$pwd_input)
{
  $query = "select * from utilisateurs where username = '".$username."'";
  
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
    
    }
    
  
  }

  $mysqli->close();  
}

function verifier_password($id,$username,$pwd_input,$pwd)
{ 
  if (password_verify($pwd_input,$pwd))
  {
    $mysqli = new mysqli('localhost','root','','bd_application');
    $getAdmin =  $mysqli->query("SELECT administrateur FROM utilisateurs WHERE id_utilisateur =".$id)->fetch_object()->administrateur; 
    
    
    $_SESSION['admin'] = $getAdmin;
    $_SESSION['uid'] = $id;
    $_SESSION['username'] = $username;

    echo true;
  }
  else
  {
    
  }


}

verifier_user_existant($_POST['nom_user'], $_POST['password']);

?>