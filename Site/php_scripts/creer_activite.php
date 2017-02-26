<?php
include_once 'connexion_bd.php';
	function phpQuery($query){
    $mysqli = connexion();
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