<?php
function connexion()
{
	$conn = new mysqli('localhost','root','','bd_application');
	//$conn = new mysqli('conceptrionweb-14.scah.ca','concep14tionweb','ePcZnemO}SQ0','concep14_bd_application');
	return $conn;
}
?>