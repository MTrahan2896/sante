<?php
	include_once 'formater_champ.php';
	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	$mysqli->query($query);
	
	$mysqli->close();
	}

	if(($_POST['nom'] !='') && ($_POST['deb'] !='') && ($_POST['mi'] !='') && ($_POST['fin'] !=''))
	{
		if (($_POST['deb'] < $_POST['mi']) && ($_POST['mi'] < $_POST['fin']) )
		{
			$requete = "SELECT ID_Session from sessions where '{$_POST['deb']}' <= Fin_Session and '{$_POST['fin']}' >= Debut_Session";
			$mysqli = new mysqli('localhost','root','','bd_application');
			$result = $mysqli->query($requete);
			if ($result->num_rows == 0)
			{
			    $req = "insert into sessions values (null,'{$_POST['deb']}','{$_POST['fin']}','{$_POST['mi']}','".formater($_POST['nom'])."');";

				echo phpQuery($req);
				echo "Création de la session réussie";
			}
			else
			{
			echo "Une autre session se déroule durant cette période";
			}
			 
		}
		else
		{
			echo "Les dates saisies ne sont pas significatives";
		}
	}
	else
	{
		echo "Veuillez remplir les champs obligatoires";
	}
?>