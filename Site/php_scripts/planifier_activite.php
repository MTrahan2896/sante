<?php
	echo date("Y-m-d H:M:S", strtotime($_POST['date_act'],$_POST['heure_deb']));
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

    $req = "insert into activites_prevues values (null,".
										 "'2017:02:17 11:19:00',".$_POST['participants_max'].
										 ",".$_POST['frais'].
										 ",'".$_POST['endroit']."',1);";
	echo $req;									
	echo phpQuery($req);

?>