<?php
function formater($champ)
{
	$champ = str_replace("'","''",$champ);
	$champ = trim($champ);
	$champ = strtolower($champ);
	$champ = ucfirst($champ);	
	return $champ;
}
	$date_activite = date("Y-m-d", strtotime($_POST['date_act']));

	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	$mysqli->close();
	}


	echo $_POST['nom_act'];

    $req = "insert into activites_prevues values (null
										  ,'".$date_activite.
										 "','".$_POST['heure_deb'].
										 "',".$_POST['participants_max'].
										 ",".$_POST['frais'].
										 ",'".formater($_POST['endroit']).
										 "',".$_POST['nom_act'].", null);";
	echo $req;									
	echo phpQuery($req);

?>