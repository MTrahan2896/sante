<?php
	
	$activite_prevue=$_POST['ACTIVITE'];
	$eleves_presents = $_POST['PRESENTS'];
	
	$query = "update utilisateur_activites set present=0 where ID_Activite_Prevue = ".$activite_prevue;

		
		$mysqli = new mysqli('localhost','root','','bd_application');
		$mysqli->query($query);


		$query = "update activites_prevues  set presences_prises=1 where ID_Activite_Prevue = ".$activite_prevue;

		echo $query;

		$mysqli = new mysqli('localhost','root','','bd_application');
		$mysqli->query($query);




		//$query = "delete from utilisateur_activites where ID_Activite_Prevue = ".$act;

		

		
		foreach ((array)$eleves_presents as $value) {
    	$query = "update utilisateur_activites set present=1 where ID_utilisateur = ".$value;
    	echo $query;
		
		$mysqli->query($query);

		}	
		//		$mysqli = new mysqli('localhost','root','','bd_application');
		//$mysqli->query($query);
?>