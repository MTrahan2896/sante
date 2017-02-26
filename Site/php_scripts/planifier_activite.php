<?php
include_once 'connexion_bd.php';
	include_once 'formater_champ.php';
	$date_activite = date("Y-m-d", strtotime($_POST['date_act']));

	function phpQuery($query){
    $mysqli = connexion();
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
										 "',".$_POST['nom_act'].", null, 0, ".$_POST['responsable'].");";
	echo $req;									
	echo phpQuery($req);

?>