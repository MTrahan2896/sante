<?php

	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}
	function phpSelectQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	if ($result = $mysqli->query($query)) {

    while($row = $result->fetch_array()) {
            return $row[0];
    }
    
	}

	$result->close();
	$mysqli->close();
	}
phpQuery("insert into groupes values(null, \"".$_POST['nomgroupe']."\", 1)");

	$value = phpSelectQuery("select max(id_groupe) from groupes");

	$nb_codes = 0;

	if ($_POST["nb_codes"] > 60){
		$nb_codes = 60;
	}
	else{
		$nb_codes = $_POST['nb_codes'];
	}
	for ($x = 0; $x < $nb_codes; $x++) {

	$query = 'insert into utilisateurs values(null, null, null,'.$value.', 0, 0, 0, "'.substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5).'", null)';
	echo $query;
 	echo phpQuery($query);
}



?>





