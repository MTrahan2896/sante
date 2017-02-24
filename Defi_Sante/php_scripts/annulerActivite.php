<?php
	
	$act=$_POST['ID_ACTIVITE'];
	
	$query = "update activites_prevues set hidden=true where ID_Activite_Prevue = ".$act;

		ECHO $query;
		$mysqli = new mysqli('localhost','root','','bd_application');
		$mysqli->query($query);


	
?>