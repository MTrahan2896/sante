<?php

	include_once 'connexion_bd.php';
	   $mysqli = connexion();
function phpSelectQuery($query){

	$myArray = array();
	if ($result = $mysqli->query($query)) {

    while($row = $result->fetch_array()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
	}

	$result->close();
	$mysqli->close();
	}


	function phpQuery($query){
    
	$myArray = array();
	if ($result = $mysqli->query($query)) {
	
	$mysqli->close();
	}}








	//MAIN

	$nb_codes = 0;
	echo 'NB_POSTES: '.$_POST['nb_codes'];
	if ($_POST["nb_codes"] > 60){
		$nb_codes = 60;
	}
	else{
		$nb_codes = $_POST['nb_codes'];
	}
	for ($x = 0; $x < $nb_codes; $x++) {
		$query ='insert into utilisateurs(ID_Groupe, Code_Acces, Administrateur) values('.$_POST['id_groupe'].', "'.substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5).'",'.$_POST['admin'].')';
		echo $query;
	 echo phpQuery($query);
	}

 ?>