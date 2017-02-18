<?php
function formater($champ)
{
	$champ = str_replace("'","''",$champ);
	$champ = trim($champ);
	$champ = ucfirst($champ);	
	return $champ;
}
?>