<html>
    <head>
        <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
  	<link type="text/css" rel="stylesheet" href="css/sc-date-time.css">
  	<link type="text/css" rel="stylesheet" href="css/style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
        .fc-event{
             cursor: pointer;
        }           
        .fc-day-grid-event > .fc-content {
             white-space: normal;
        }
      </style>
    </head>
    <body>
        <header>
            
        
        <?php 
              include('components/nav.php') ;
              
        ?>
        </header>
        <main>
          <?php   
          include('components/carousel_accueil.php'); 
          ?>
          <div class="container">
	<div class="row">


	<div class="input-field col s12">
	<!--<input type="date" class="datepicker">
	<label>Date de l'évènement</label>-->

<div class="row">
	<div class="input-field col s12">
    <select onchange="TrieCalendrier(this.value)">
      <option value="" disabled selected>Choisissez une activité</option>
      <option value="n">Tout les sports</option>
      <?php
            $mysqli = new mysqli("localhost", "root", "", "defi_sante");
                    if ($mysqli->connect_errno) {
                        echo "Erreur de connection vers MYSQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $query = "SELECT distinct nom FROM activite";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['nom']."'>".$row['nom']."</option>";
                        }
                    }

      ?>
      
    </select>
    <label>Activité</label>
 	</div>
	<div id="calendar">
		
	</div>

	</form>
</div>
</main>

        




	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

      <script src="js/moment.js">moment.locale="fr"</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/fr-ca.js"></script>
     
      <script type="text/javascript" src="js/materialize.min.js"></script>
		
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
         <script type="text/javascript" src="js/fullcalendar-fr.js"></script>
		<script type="text/javascript" src="js/gcal.js"></script>
		<script type="text/javascript" src="js/sc-date-time.js"></script>
        <script>

        //initialisation du tableau de base des evenements du calendrier
        var view;
        eventbase = [
                    <?php
                    $mysqli = new mysqli("localhost", "root", "", "defi_sante");
                    if ($mysqli->connect_errno) {
                        echo "Erreur de connection vers MYSQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $query = "SELECT ap.id_activite_planif, a.couleur, a.nom, ap.date_activite, ap.debut, ap.fin FROM activite a, activite_planifie ap
                              where a.id_activite = ap.id_activite";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        $i = 1;
    
                        while($row = $result->fetch_assoc()) {
                            echo "{ title:'".$row['nom']."', start:'".$row['date_activite']."T".$row['debut']."', end:'".$row['date_activite']."T".$row['fin']."', allday: false,  id:".$row['id_activite_planif'].", backgroundColor:'#".$row['couleur']."', borderColor:'black'}";
                            if ($result->num_rows > $i) {
                                echo ",";
                            }
                        }
                    }
                    ?>];
                    evenements = eventbase;
        function TrieCalendrier(s){
            view = $('#calendar').fullCalendar('getView');
            event_trie = [];
            if(s != "n"){
                for(i = 0;i<eventbase.length;i++){
                    if(eventbase[i]['title'] == s){
                        event_trie.push(eventbase[i]);
                    }
                }
                evenements = event_trie;
            }else if(s == "n"){
                evenements=eventbase;
            }
            
            
           

            //appel de l'initialisation du calendrier
            $('#calendar').fullCalendar('destroy');
            inicalendrier();
        }

        //initialisation du calendrier
        function inicalendrier() {
            
            $('#calendar').fullCalendar({
                header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
            slotEventOverlap: false,
            allDaySlot: false,
                events: evenements,
                eventClick: function(event) {
                        alert(event.id);
                    }
            })
            
            $('#calendar').fullCalendar( 'changeView', view.name )
            };

            inicalendrier();
        </script>

      <script src="js/scripts.js"></script>
        </main>
    </body>
</html>