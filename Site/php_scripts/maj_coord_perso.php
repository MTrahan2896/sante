<?php
	session_start();
	

	function phpQuery($query_sql){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$mysqli->query($query_sql);
	
	$mysqli->close();
	}

	function mettre_a_jour($id){
		$query = "select * from utilisateurs where id_utilisateur =".$id;
	    $mysqli = new mysqli('localhost','root','','bd_application');
	  	$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {

		  if ($row['ID_Groupe'] === null)
		  {
		  	$req = "update utilisateurs
			set
			Prenom = '".formater($_POST['prenom'])."',
			Nom = '".formater($_POST['nom'])."',
			Courriel = '".formater($_POST['courriel'])."',
			Telephone = ".$_POST['telephone'].",
			Sexe = '".$_POST['sexe']."',
			Type_Utilisateur ='".$_POST['type_user']."'
			where id_utilisateur = ".$_SESSION['uid'].";";
			echo phpQuery($req);
		  }
		  else
		  {
		  	$req = "update utilisateurs
			set
			Prenom = '".formater($_POST['prenom'])."',
			Nom = '".formater($_POST['nom'])."',
			Courriel = '".formater($_POST['courriel'])."',
			Telephone = ".$_POST['telephone'].",
			Sexe = '".$_POST['sexe']."'
			where id_utilisateur = ".$_SESSION['uid'].";";
			echo phpQuery($req);
		  }
		  
		}	  
	}
}
?>