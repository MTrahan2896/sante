--Nombre de groupes par ensemble -- Changer 1 pour X Ligne 5-- Peut avoir la liste de toutes les sessions si on enlève toute la ligne 16
SELECT s.nom_session as "Nom de la session",g.ensemble as "Ensemble", count(*) as "Nombre de groupe"
FROM sessions s, groupes g
WHERE g.id_session = s.id_session 
and s.id_session = 1
Group by g.ensemble;

--Impossible d'avoir la quantité homme/femme par session 
SELECT sexe,count(*) 
FROM `utilisateurs`
where actif = 1
group by sexe;

--Obtien le nombre d'utilisateur autre et avec groupe
--IMPOSSIBILITÉ D'AVOIR PAR SESSION PARCE QU'ON A JUSTE ACTIF 0/1 Alors on peut seulement différencier sesion courrante ou non
select aucun_groupe.nbr as "Nombre de comptes autre", avec_groupe.nbr as "Nombre de comptes avec groupe"
from (select count(*) as "nbr" from utilisateurs where id_groupe IS NULL and actif = 1) as aucun_groupe,
(select count(*) as "nbr" from utilisateurs where id_groupe IS NOT NULL and actif = 1) as avec_groupe;

--Obtien le nombre d'utilisateur par ensemble -- Changer le id_session pour X ligne 36
select count(*) as "Nombre d'utilisateurs",
	   g.ensemble as "Ensemble"
from utilisateurs u, groupes g 
where u.id_groupe = g.id_groupe and
	  g.id_session = 1 
	  and u.code_acces = ''
group by g.ensemble

--Obtien le nombre d'utilisateur selon leur type
--IMPOSSIBILITÉ D'AVOIR PAR SESSION PARCE QU'ON A JUSTE ACTIF 0/1 Alors on peut seulement différencier sesion courrante ou non
select u.type_utilisateur as "Type",count(*)
from utilisateurs u
where actif = 1
group by u.type_utilisateur


--Nombre de participations par actitité -- Un commencement mais pas au point je crois
SELECT a.nom_activite as "Nom de l'activité",count(*) as "Nombre de participations"
FROM activites_prevues ap, activites a, utilisateur_activites ua
WHERE ua.id_activite_prevue = ap.id_activite_prevue and
	  ap.id_activite = a.id_activite and
	  ap.date_activite BETWEEN 
	  (select debut_session from sessions where id_session = 1) and
	  (select fin_session from sessions where id_session = 1) and
	  ua.present = 1	
GROUP BY a.nom_activite;

--Nombre de participation moyenne -- Prendre le même principe si on veut la particpation moyenne par session
select avg(liste_participations.participation) as "Nombre de participations en moyenne"
from (select count(*) as "participation"
	  from utilisateurs u, utilisateur_activites ua, activites_prevues ap
	  where u.id_utilisateur = ua.id_utilisateur and
	  ua.id_activite_prevue = ap.id_activite_prevue and 
	  group by u.id_utilisateur) as liste_participations