<?php
	
	$act=$_POST['ID_ACTIVITE'];

	$query = "update activites set hidden=true where ID_Activite = ".$act;

		ECHO $query;
		$mysqli = new mysqli('localhost','root','','bd_application');
		$mysqli->query($query);


	
?>