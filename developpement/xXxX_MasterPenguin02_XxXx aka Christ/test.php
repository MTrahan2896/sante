<html>
    <head>
        
    </head>
<body>

        <?php
            $mysqli = new mysqli("localhost", "root", "", "bd_application");
            if ($mysqli->connect_errno) {
                echo "Erreur de connection vers MYSQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $query = "SELECT ap.ID_Activite_prevue, a.Couleur, a.Nom_Activite, ap.Date_Activite, ap.Heure, a.Duree FROM activites a, activites_prevues ap
                      where a.ID_Activite = ap.ID_Activite";
            $result = $mysqli->query($query);

                while($row = $result->fetch_assoc()) {
                    $debut = $row['Heure'] ;
                    $a = '00:'.$row['Duree'].':00' ;
                    $fin =$debut + $a ;
                    str_replace($debut,""," ") ;
                    echo"<script>
                        alert('$debut   ".$row['Duree']."   ".$fin."');
                    </script>";
                }
            
            ?>
                        
</body>
                        
</html>