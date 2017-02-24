<?php
function connexion_locale($conn)
{
	$conn = new mysqli('localhost','root','','bd_application');
	return $conn;
}

function connexion_pulic($conn)
{
	$conn = new mysqli('conceptrionweb-14.scah.ca','concep14tionweb','ePcZnemO}SQ0','concep14_bd_application');
	return $conn;
}
?>