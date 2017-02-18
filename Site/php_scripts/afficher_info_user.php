<?php

function obtenir_info($id)
{
  $query = "select * from utilisateurs where id_utilisateur =".$id;
  $mysqli = new mysqli('localhost','root','','bd_application');
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      //Set Prenom
      echo "<script>$('#prenom_user').val('".$row['Prenom']."');</script>";

      //Set Nom
      echo "<script>$('#nom').val('".$row['Nom']."');</script>";

      //Set Courriel
      echo "<script>$('#email').val('".$row['Courriel']."');</script>";
      
      //Set Téléphone
      echo "<script>$('#tel').val('".$row['Telephone']."');</script>";
      
      //Set Sexe
      echo "<script>$('input[name=sexe][value=\"".$row['Sexe']."\"]').prop(\"checked\",true);</script>";
      
      //Set Prénom personne ressource
      echo "<script>$('#prenom_ressource').val('".$row['Prenom_Ressource']."');</script>";
      
      //Set Nom personne ressource
      echo "<script>$('#nom_ressource').val('".$row['Nom_Ressource']."');</script>";
      
      //Set Téléphone personne ressource
      echo "<script>$('#tel_ressource').val('".$row['Telephone_Ressource']."');</script>";
      
      //Set Lien Personne ressource
      echo "<script>$('#lien_ressource').val('".$row['Lien']."');</script>";

      //

      }
    $result->close();
    }

  $mysqli->close();
}
?>