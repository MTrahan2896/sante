<?php
	include 'php_scripts/formater_champ.php';

	$date_activite = date("Y-m-d", strtotime($_POST['date_act']));

	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	$mysqli->close();
	}

    $req = "insert into activites_prevues values (null
										  ,'".$date_activite.
										 "','".$_POST['heure_deb'].
										 "',".$_POST['participants_max'].
										 ",".$_POST['frais'].
										 ",'".formater($_POST['endroit']).
										 "',".$_POST['nom_act'].");";
	echo $req;									
	echo phpQuery($req);

?>