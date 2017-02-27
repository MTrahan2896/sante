<?php
include_once 'queryFunctions.php';

$temps_courrant = date("H:i",time()-"5:00:00");
echo $temps_courrant;
echo $_POST['heure'];
echo ($temps_courrant - $_POST['heure']);
if($_POST['date_activite'] == date('Y-m-d'))
{
	if($temps_courrant - $_POST['heure'] < "1:00:00")
	{
		echo "H";
	}
}
//$query = "delete from utilisateur_activites where ID_Eleve_Activite = {$_POST['id_act_utilisateur']}";
//phpQuery($query);
//echo "Annulation de participation réussie"
?>