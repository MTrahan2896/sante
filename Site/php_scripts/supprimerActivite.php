<?php
	include_once 'connexion_bd.php';
	include_once 'formater_champ.php';
	$act=$_POST['ID_ACTIVITE'];

	$query = "update activites set hidden=true where ID_Activite = ".$act;

		ECHO $query;
		$mysqli = connexion();
		$mysqli->query($query);


	
?>