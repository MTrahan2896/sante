<?php
include 'queryFunctions.php';
 echo phpSelectQuery('select id_groupe, nom_groupe from groupes where ID_Prof = 1');
 ?>