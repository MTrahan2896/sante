--Nombre de groupes par ensemble 
SELECT s.nom_session as "Nom de la session",g.ensemble as "Ensemble", count(*) as "Nombre de groupe"
FROM sessions s, groupes g
WHERE g.id_session = s.id_session 
and s.id_session = 1
Group by g.ensemble;

--Obtien le nombre d'utilisateur selon leur type
select s.nom_session,u.type_utilisateur as "Type",count(*)
from utilisateurs u,sessions s
where u.code_acces = '' AND
	  s.id_session = 1 AND
      u.date_inscription BETWEEN s.debut_session and s.fin_session
group by u.type_utilisateur

--Obtien le prorata des sexes par session
SELECT s.Nom_Session,u.sexe,count(*) as nbr
FROM utilisateurs u, sessions s
where u.code_acces = '' AND
	  u.Date_Inscription BETWEEN s.Debut_Session and s.Fin_Session AND
      s.ID_Session = 1
group by u.sexe;


--Obtien le nombre d'utilisateur autre et avec groupe
select aucun_groupe.nbr as "Nombre de comptes autre", avec_groupe.nbr as "Nombre de comptes avec groupe"
from (select count(*) as "nbr" 
      from utilisateurs, sessions 
      where id_groupe = 0 and 
     		code_acces = '' and
            date_inscription BETWEEN Debut_Session and Fin_Session AND
     		id_session = 1) aucun_groupe,
(select count(*) as "nbr" 
 from utilisateurs, sessions
 where id_groupe IS NOT NULL and 
     		code_acces = '' and
            date_inscription BETWEEN Debut_Session and Fin_Session AND
     		id_session = 1) avec_groupe;

--Obtien le nombre d'utilisateur par ensemble
select count(*) as "Nombre d'utilisateurs",
	   g.ensemble as "Ensemble"
from utilisateurs u, groupes g 
where u.id_groupe = g.id_groupe and
	  g.id_session = 1 
	  and u.code_acces = ''
group by g.ensemble

--Obtien le nombre de participations par activite par session
select a.nom_activite,count(*) as "Nombre participations",s.nom_session
from utilisateurs u, utilisateur_activites ua, activites_prevues ap, activites a, sessions s
where u.id_utilisateur = ua.id_utilisateur and
	  ua.id_activite_prevue = ap.id_activite_prevue and
	  ap.id_activite = a.id_activite and
	  s.id_session = 1 and
	  ap.date_activite BETWEEN s.debut_session and s.fin_session
group by a.nom_activite,s.nom_session

--Obtiens le nombre de particpation en moyenne par etudiant
select participations.nom_session,avg(participations.nbr) as "Moyenne"
from (select s.nom_session as "nom_session",count(*) as "nbr"
		from utilisateur_activites ua,activites_prevues ap,sessions s
		where ua.id_activite_prevue = ap.id_activite_prevue and
			  ap.date_activite between s.debut_session and s.fin_session and
			  s.id_session = 1
	  group by ua.id_utilisateur) participations
group by participations.nom_session



--Obtiens le nombre de particpation en moyenne par etudiant
select participations.nom_session as "Session", 
		round((participations.nbr_participations/eleves.nbr_eleves),2) as "Moyenne de participations",
		participations.nbr_participations as "Nombre de paticipations", 
		eleves.nbr_eleves as "Nombre d'élèves"
from (select s.nom_session as "nom_session",count(*) as "nbr_participations" 
	from utilisateur_activites ua,activites_prevues ap,sessions s 
	where ua.id_activite_prevue = ap.id_activite_prevue and
	ap.date_activite between s.debut_session and s.fin_session and 
	s.id_session = 1 
	group by s.id_session) participations,
	(select s.nom_session,count(*) as "nbr_eleves"
	from utilisateurs u, sessions s
	where u.date_inscription BETWEEN s.debut_session and s.Fin_Session AND
		  s.id_session = 1 AND
	      u.code_acces ='' AND
          u.Type_Utilisateur = 'eleve') eleves
