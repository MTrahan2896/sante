<?php
function phpSelectQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
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
    $mysqli = new mysqli('localhost','root','','bd_application');
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
		$query ='insert into utilisateurs values(null, null, null, '.$_POST['id_groupe'].', "'.substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5).'", null, null, null, null, null, null)';
		echo $query;
	 echo phpQuery($query);
	}

 ?>