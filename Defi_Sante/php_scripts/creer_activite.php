<?php
	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

	$req = "insert into activites values (null,'".formater($_POST['nom_act']).
										 "',".formater($_POST['duree']).
										 ",'".formater($_POST['desc']).
										 "',".$_POST['nbr_pts'].",'".
										 $_POST['couleur']."', null);";
	echo $req;

	echo phpQuery($req);

?>