<?php
echo $_POST['code'];


function guillemeter($champ){ //Aurtografe korect

	return "'".$champ."'";

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
	$mysqli->query("SET NAMES utf8");
	echo "LE KEK IS PASSED";
	$pass=$_POST['password'];
	$pass=password_hash($pass, PASSWORD_DEFAULT);
	$query = "update utilisateurs set nom=".guillemeter($_POST['nom']).", prenom=".guillemeter($_POST['username']).", username=".guillemeter($_POST['username']).", actif=1, courriel=".guillemeter($_POST['courriel']).", telephone=".guillemeter($_POST['telephone']).", sexe=".guillemeter($_POST['sexe']).", password=".guillemeter($pass).", code_acces='' where code_acces=".guillemeter($_POST['code']);
		ECHO $query;

		$mysqli = new mysqli('localhost','root','','bd_application');
		$mysqli->query($query);


}
else{
	ECHO "NO IS LE KEK, NO NO NO!";
}


?>
