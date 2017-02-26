      <?php
      include_once 'connexion_bd.php';
	include_once 'formater_champ.php';
      $query = "update utilisateurs set administrateur=".$_POST['admin']." where id_utilisateur = ".$_POST['user'];
      ECHO $query;
      $mysqli = connexion();
      $mysqli->query($query);
      ?>