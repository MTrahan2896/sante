<?php
	include_once 'connexion_bd.php';
	include_once 'formater_champ.php';
	function phpQuery($query){
    $mysqli = connexion();
	$myArray = array();
	$mysqli->query($query);
	


	$mysqli->close();
	}
	$req = "UPDATE activites
			set Nom_Activite = '".formater($_POST['nom_act'])."',
				Duree = {$_POST['duree']},
				Ponderation = {$_POST['nbr_pts']},
				Commentaire = '".formater($_POST['desc'])."'
				where ID_Activite = {$_POST['id_act']}";
	echo phpQuery($req);
	echo "Mise à jour de l'activité réussie";

?>