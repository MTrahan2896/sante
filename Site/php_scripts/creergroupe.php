<?php

	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

	phpQuery("insert into groupes values(null, \"".$_POST['nomgroupe']."\", 1)");
?>