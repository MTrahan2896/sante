<?php
	
	$act=$_POST['ID_ACTIVITE'];
	
	$query = "delete from activites_prevues where ID_Activite_Prevue = ".$act;

		ECHO $query;
		$mysqli = new mysqli('localhost','root','','bd_application');
		$mysqli->query($query);


		$query = "delete from utilisateur_activites where ID_Activite_Prevue = ".$act;
				$mysqli = new mysqli('localhost','root','','bd_application');
		$mysqli->query($query);
?>