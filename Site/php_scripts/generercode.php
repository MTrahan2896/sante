<?php
include 'queryFunctions.php';
	$nb_codes = 0;

	if ($_POST["nb_codes"] > 60){
		$nb_codes = 60;
	}
	else{
		$nb_codes = $_POST['nb_codes'];
	}
	for ($x = 0; $x <= $nb_codes; $x++) {

 echo phpQuery('insert into eleves values(null, null, null, '.$_POST['id_groupe'].', 0, 0, 0, "'.substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5).'", null)');
}

 ?>