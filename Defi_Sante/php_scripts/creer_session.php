<?php
	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}


	$date_deb = date("Y-m-d", strtotime($_POST['deb']));
	$date_mi = date("Y-m-d", strtotime($_POST['mi']));
	$date_fin = date("Y-m-d", strtotime($_POST['fin']));


	$req = "insert into sessions values (null,'".$date_deb.
										 "','".$date_mi.
										 "','".$date_fin.
										 "','".$_POST['nom'].
										 "');";
	
	echo phpQuery($req);

?>