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

