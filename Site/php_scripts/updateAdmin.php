      <?php
      
      $query = "update utilisateurs set administrateur=".$_POST['admin']." where id_utilisateur = ".$_POST['user'];
      ECHO $query;
      $mysqli = new mysqli('localhost','root','','bd_application');
      $mysqli->query($query);
      ?>