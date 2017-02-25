<?php
session_start();
$_SESSION['code_insc'] = $_POST['code'];
$query = "select id_utilisateur, id_groupe from utilisateurs where BINARY CODE_ACCES = '".$_POST['code']."'";
  
  $mysqli = new mysqli('localhost','root','','bd_application');
  $myArray = array();
  if ($result = $mysqli->query($query)) {

    if ( mysqli_num_rows($result) == 1) 
    {

    $row = $result->fetch_array();
    
    if ($row[1] != '0'){
      echo '1';
    }
    else echo '2';
    }
    else
    {
    echo $query;
    echo 'fail';
    }
    
  
  }

  $mysqli->close();  
 
  ?>