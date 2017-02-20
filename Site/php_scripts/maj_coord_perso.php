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
			Prenom = '".formater($_POST['prenom'])."',
			Nom = '".formater($_POST['nom'])."',
			Courriel = '".formater($_POST['courriel'])."',
			Telephone = ".$_POST['telephone'].",
			Sexe = '".$_POST['sexe']."'
			where id_utilisateur = ".$_SESSION['uid'].";";
		echo phpQuery($req);

?>