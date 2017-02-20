<?php
function formater($champ)
{
	$champ = str_replace("'","''",$champ);
	$champ = trim($champ);
	$champ = strtolower($champ);
	$champ = ucfirst($champ);	
	return $champ;
}
?>