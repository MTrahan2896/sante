<?php
	
	$act=$_POST['ID_ACTIVITE'];
	
	$query = "update activites_prevues set hidden=true where ID_Activite_Prevue = ".$act;

	include_once 'connexion_bd.php';
	$mysqli = connexion();

		ECHO $query;
	
		$mysqli->query($query);


	
?>