<?php
include_once 'connexion_bd.php';
include_once 'formater_champ.php';
include_once 'queryFunctions.php';

date_default_timezone_set('America/Montreal');

function is_in_session($query){

   $mysqli = connexion();

	if ($result = $mysqli->query($query)) {

	    $row = $result->fetch_array();
	    
	    if ($row['session_en_cours'] != 0)
	    {
	    	return true;
	    }
	    else
	    {
	    	return false;
	    }

	}

		
		$mysqli->close();
}


function verifier_date_activite()
{

	$dateHeureAct = $_POST['date_act'].' '.$_POST['heure_deb'];

	//Compare si la date et l'heure de l'activité est avant maintenant
	if(($dateHeureAct > date('Y-m-d H:i:s',time()))) 
	{
		$query = "select count(*) as session_en_cours from sessions where '{$_POST['date_act']}' BETWEEN debut_session and fin_session";
		//Vérifie si la date choisie fait partie d'une session collégiale
		if(is_in_session($query))
		{
			$req = "insert into activites_prevues values (null
											  ,'".$_POST['date_act'].
											 "','".$_POST['heure_deb'].
											 "',".$_POST['participants_max'].
											 ",".$_POST['frais'].
											 ",'".formater($_POST['endroit']).
											 "',".$_POST['nom_act'].", null, 0, ".$_POST['responsable'].");";
			echo phpQuery($req);
			echo "L'activité a été planifiée avec succès";
		}
		else
		{
			echo "L'activité doit être planifiée durant une session.";
		}
	}
	else
	{
		echo "La date de l'activité doit se situer dans le futur";
	}
}


function verif_champs_obligatoires()
{
	if(($_POST['nom_act'] == "" ) || ($_POST['date_act'] == "") || ($_POST['heure_deb']==""))
	{
		echo "Veuillez renseigner les champs obligatoires";
	}
	else
	{
		verifier_date_activite();
	}
}

echo verif_champs_obligatoires();
?>