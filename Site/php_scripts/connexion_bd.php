<?php
function connexion_locale($conn)
{
	$conn = new mysqli('localhost','root','','bd_application');
	return $conn;
}

function connexion_pulic()
{

}
?>