<?php
	$date_activite = date("Y-m-d", strtotime($_POST['date_act']));
	echo $_POST['nom_act']."    marche tu? ";
	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

/*
	$req = "insert into activites_prevues values (null,".
										 "null,".$_POST['participants_max'].
										 ",".$_POST['frais'].
										 ",'".$_POST['endroit']."',".$_POST['nom_act'].");";
										 */

    $req = "insert into activites_prevues values (null
										  ,'".$date_activite.
										 "','".$_POST['heure_deb'].
										 "',".$_POST['participants_max'].
										 ",".$_POST['frais'].
										 ",'".$_POST['endroit'].
										 "',".$_POST['nom_act'].");";
	echo $req;									
	echo phpQuery($req);

?>