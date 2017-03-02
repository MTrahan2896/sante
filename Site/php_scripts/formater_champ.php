<?php
function formater($champ)
{
	$champ = str_replace("'","''",$champ);
	$champ = trim($champ);
	$champ = mb_strtolower($champ,'UTF-8');
	$champ = ucfirst($champ);	
	return $champ;
}
?>