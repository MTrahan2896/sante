<?php
include_once 'queryFunctions.php';

date_default_timezone_set('America/Montreal');
$temps_courrant = date("H:i",time()); 

if($_POST['date_activite'] == date('Y-m-d'))
{
	if($_POST['heure'] - $temps_courrant < "1:00:00")
	{
		echo "Impossible de quitter l'activité";
	}
	else
	{
		$query = "delete from utilisateur_activites where ID_Eleve_Activite = {$_POST['id_act_utilisateur']}";
		phpQuery($query);
		echo "Annulation de participation réussie"
	}
}

?>