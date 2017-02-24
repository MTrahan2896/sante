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
      
       //Set Lien Personne ressource
      echo "<script>$('#type_utilisateur').val('".$row['Type_Utilisateur']."');</script>";
    }
  $result->close();
  }

  $mysqli->close();
}
  //Si l'utilisateur ne fait pas parti d'un groupe, alors on lui demande le type d'utilisateur qu'il est
  function afficher_select_type($id){

    $query = "select * from utilisateurs where id_utilisateur =".$id;
    $mysqli = new mysqli('localhost','root','','bd_application');
    $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      
      if ($row['ID_Groupe'] === null)
      {
        // Le select contenant les differents types d'utilisateur
          echo "<label for='type_utilisateur'>Type d''utilisateur</label>
        <select id='type_utilisateur'>
          <option value='eleve'>Élève</option>
          <optgroup label='Membre du personnel'>
            <option value='administration'>Administration</option>
            <option value='enseignant'>Enseignant</option>
            <option value='professionnel'>Professionnel</option>
            <option value='soutien'>Soutien</option>
          </optgroup>
          <optgroup label='Autre'>
            <option value='ami'>Ami</option>
            <option value='parent'>Parent</option>
          </optgroup>
        </select>";
      }
    }
  $result->close();
  }
  $mysqli->close();
}

?>