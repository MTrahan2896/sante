<?php
session_start();

if (!ISSET($_SESSION['uid']))
{
  $_SESSION['uid'] = 0;
}

  


?>

  <!DOCTYPE html>
  <html>
    <head>

    <?php
    include 'components/headContent.php';
    ?>

      <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
  	<link type="text/css" rel="stylesheet" href="css/sc-date-time.css">
  	<link type="text/css" rel="stylesheet" href="css/style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
    </head>
    <body>

      <header>
      <?php 
          include 'components/nav.php';
      ?>  

      </header>      

<main>	
<script src="js/jscolor.js"></script>
<script src="js/jscolor.min.js"></script>


  	<div class="container">
	<div class="row">

  


	<div class="input-field col s12">
	<input type="date" class="datepicker">
	<label>Date de l'évènement</label>

<div class="row">
	<div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
 	</div>
	<div id="calendar">
		
	</div>

	</form>
</div>


<a class="waves-effect waves-light btn" href="#modal_new_activite">Créer une activité</a>

<a class="waves-effect waves-light btn" href="#modal_ins">ins</a>

<a class="waves-effect waves-light btn" href="#modal_planif">Planifier une activité</a>


  <!-- Modal Structure -->
<div id="modal_new_activite" class="modal">
  <div class="modal-content">
    <div class="row" style="text-align: center;">
        <h4 class="">Créer une activité</h4>
    </div>

    <div class="row">
      <div class="input-field col s12 l8">
        <input id="nom_activite" type="text" class="validate">
        <label for="nom_activite">Nom de l'activité</label>
      </div>
   
      <div class="input-field col s12 l4">
        <label  for="point">Nombre de points</label>
        <input type="number" step="0.25" maximum="3" minimum="0" id="point" name="point"/>
      </div>
    </div>

    <div class="row">
    Color: <input class="jscolor" value="ab2567">
    </div>

    <div class="row">
      <div class="input-field col s12 l12">
          <textarea id="description" class="materialize-textarea"></textarea>
          <label for="description">Description</label>
      </div>
    </div>

    <div class="row">
        <div class="col s6">
          <a class="btn green" href=""> Accepter</a>
        </div>
        <div class="col s6">
          <a class="btn red" href=""> Annuler</a>
        </div>
    </div>

  </div>
</div>




  <!-- Modal Structure -->
  <div id="modal_planif" class="modal">
    <div class="modal-content">
      <div class="row" style="text-align:center">
          <h4>Planifier une activité</h4>
      </div>

        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Nom de l'activité</option>
            <option value="1">Badminton</option>
            <option value="2">Randonnée pédestre</option>
            <option value="3">Rugby</option>
          </select>
          <label>Nom de l'activité</label>
        </div>

        <div class="input-field col s12">
          <input id="date_act" type="date" class="datepicker">
          <label for="date_act">Date de l'activité</label>
        </div>


  </div>
  <div class="modal-footer">
 <div class="row">
        <div class="col s6 l6">
          <a class="btn green" href=""> Accepter</a>
        </div>
        <div class="col s6 l6">
          <a class="btn red" href=""> Annuler</a>
        </div>
    </div>    </div>
  </div>

    Color: <input class="jscolor" value="ab2567">

</main>



        <footer class="page-footer" class="col l12" style="width: 100%!important">
          <div class="container">
            <div class="row">
              <div class="col l12 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l12 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>





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


      <script src="js/scripts.js"></script>



    </body>
  </html>
</html>

