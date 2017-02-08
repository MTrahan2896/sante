<?php
include 'queryFunctions.php';
 echo phpSelectQuery('select utilisateurs.id_groupe, utilisateurs.nom, utilisateurs.prenom, utilisateurs.points_bonus, utilisateurs.points_debut_session, utilisateurs.points_fin_session from utilisateurs, groupes, professeurs where professeurs.ID_Prof = 1 and utilisateurs.id_groupe = groupes.id_groupe and groupes.id_prof = professeurs.id_prof') ?>