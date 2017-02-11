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