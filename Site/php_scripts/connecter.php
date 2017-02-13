<?php
$x = $_POST['nom_user'];
$y = $_POST['password'];




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
    
    $_SESSION['uid'] = $id;
      
    echo $_SESSION['uid'];
  }
  else
  {
    
  }

}

verifier_user_existant($_POST['nom_user'], $_POST['password']);

?>