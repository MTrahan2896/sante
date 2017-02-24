<?php
$_SESSION['code_insc'] = $_POST['code'];
$_SESSION['code_insc'] = 2;
$query = "select id_utilisateur from utilisateurs where BINARY CODE_ACCES = '".$_POST['code']."'";
  
  $mysqli = new mysqli('localhost','root','','bd_application');
  $myArray = array();
  if ($result = $mysqli->query($query)) {

    if ( mysqli_num_rows($result) == 1) 
    {

    $row = $result->fetch_array();
    echo "succes";
    }
    else
    {
    echo 'fail';
    }
    
  
  }

  $mysqli->close();  
 
  ?>