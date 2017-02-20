<?php
	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

	$req = "insert into activites values (null,'".$_POST['nom_act'].
										 "',".$_POST['duree'].
										 ",'".$_POST['desc'].
										 "',".$_POST['nbr_pts'].",'".
										 $_POST['couleur']."');";
	echo $req;

	echo phpQuery($req);

?>