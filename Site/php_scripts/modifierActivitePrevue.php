
<?php
                
function formater($champ)
{
        $champ = str_replace("'","''",$champ);
        $champ = trim($champ);
        $champ = strtolower($champ);
        $champ = ucfirst($champ);       
        return $champ;
}
        

        function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
        $myArray = array();
        $mysqli->query($query);
        $mysqli->close();
        }


        $date = date("Y-m-d", strtotime($_POST['DATE_ACT']));

        echo $_POST['ID_ACTIVITE'];

        echo $req = "update activites_prevues
     set Date_activite='$date' ,
      Endroit='{$_POST['ENDROIT']}',
       Frais={$_POST['FRAIS']},
        ID_ACTIVITE={$_POST['ID_ACTIVITE']},
         PARTICIPANTS_MAX={$_POST['PARTICIPANTS_MAX']},
          HEURE_DEBUT='{$_POST['HEURE_ACT']}', 
          RESPONSABLE={$_POST['RESPONSABLE']} 
          where ID_activite_prevue = {$_POST['ID_ACTIVITE_PREVUE']}";                                                                      
        echo $req;                                                                      
        echo phpQuery($req);


?>
                
                