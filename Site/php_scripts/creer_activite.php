<?php
function formater($champ)
{
	$champ = str_replace("'","''",$champ);
	$champ = trim($champ);
	$champ = strtolower($champ);
	$champ = ucfirst($champ);	
	return $champ;
}
	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

	$req = "insert into activites values (null,'".formater($_POST['nom_act']).
										 "',".formater($_POST['duree']).
										 ",'".formater($_POST['desc'])."','".
										 $_POST['couleur'].
										 "',0,".$_POST['nbr_pts'].");";
	echo $req;

	echo phpQuery($req);

?>