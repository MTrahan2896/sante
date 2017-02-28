<?php
include_once 'connexion_bd.php';
include_once 'formater_champ.php';


	$query = "select * from session where id_session = 1";
	
/*
    $req = "insert into activites_prevues values (null
										  ,'".$_POST['date_act'].
										 "','".$_POST['heure_deb'].
										 "',".$_POST['participants_max'].
										 ",".$_POST['frais'].
										 ",'".formater($_POST['endroit']).
										 "',".$_POST['nom_act'].", null, 0, ".$_POST['responsable'].");";
	echo $req;									
	echo phpQuery($req);*/
	echo "Activité planifiée avec succès";

?>