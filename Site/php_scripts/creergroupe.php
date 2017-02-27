<?php
	include_once 'connexion_bd.php';
	$mysqli = connexion();


	function phpQuery($query){
    
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}
	function phpSelectQuery($query){
    
	$myArray = array();
	if ($result = $mysqli->query($query)) {

    while($row = $result->fetch_array()) {
            return $row[0];
    }
    
	}

	$result->close();
	$mysqli->close();
	}
	session_start();
	phpQuery("insert into groupes(nom_groupe, id_prof, id_session, ensemble) values(\"".$_POST['nomgroupe']."\", ".$_SESSION['uid'].",".$_POST['session'].",".$_POST['ensemble'].")");
	echo  "insert into groupes(nom_groupe, id_prof, session, ensemble) values(\"".$_POST['nomgroupe']."\", ".$_SESSION['uid'].",".$_POST['session'].",".$_POST['ensemble'].")";
	$value = phpSelectQuery("select max(id_groupe) from groupes");

	$session = 1; //SELECT SESSION WHERE SYSDATE

	$nb_codes = 0;

	if ($_POST["nb_codes"] > 60){
		$nb_codes = 60;
	}
	else{
		$nb_codes = $_POST['nb_codes'];
	}
	for ($x = 0; $x < $nb_codes; $x++) {
		$query ='insert into utilisateurs(ID_Groupe, CODE_ACCES, administrateur) values('.$value.', "'.substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5).'",0)';
		echo $query;
	 echo phpQuery($query);
	}


?>





