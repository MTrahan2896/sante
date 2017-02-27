
<?php

include_once 'connexion_bd.php';

//Fonction énumérant les activités sous le format nom_activite / durée
function charger_liste ()
{
 $query = "select ID_Activite,nom_activite,duree from activites";
  $mysqli = connexion();
  $result = $mysqli->query($query);
  
  
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	echo "<option value = \"".$row['ID_Activite']."\" >".$row['ID_Activite'].'  '.$row['nom_activite']." , ".$row['duree']." minutes </option>";
    	}
    $result->close();
    }

  $mysqli->close();
}
?>