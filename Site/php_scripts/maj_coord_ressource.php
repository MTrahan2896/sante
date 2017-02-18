<?php
	session_start();
	include 'formater_champ.php';
	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

	$req = "update utilisateurs
			set
			Prenom_Ressource = '".formater($_POST['prenom_ressource'])."',
			Nom_Ressource = '".formater($_POST['nom_ressource'])."',
			Telephone_Ressource = ".$_POST['telephone_ressource'].",
			Lien = '".formater($_POST['lien_ressource'])."'
			where id_utilisateur = ".$_SESSION['uid'].";";
	echo phpQuery($req);

?>