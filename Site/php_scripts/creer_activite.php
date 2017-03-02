<?php

include_once 'formater_champ.php';
include_once 'connexion_bd.php';

	function phpQuery($query){
    $mysqli = connexion();
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

	$req = "insert into activites values (null,'".formater($_POST['nom_act']).
										 "',".formater($_POST['duree']).
										 ",'".formater($_POST['desc'])."','".
										 $_POST['couleur'].
										 "',0,".$_POST['nbr_pts'].");";
	
	phpQuery($req);
	echo "L'activité à été créée avec succès";

?>