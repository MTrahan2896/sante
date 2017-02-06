<?php
include 'queryFunctions.php';
 echo phpSelectQuery('select eleves.id_groupe, eleves.nom, eleves.prenom, eleves.points_bonus, eleves.points_debut_session, eleves.points_fin_session from eleves, groupes, professeurs where professeurs.ID_Prof = 1 and eleves.id_groupe = groupes.id_groupe and groupes.id_prof = professeurs.id_prof') ?>