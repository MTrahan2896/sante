<?php
session_start();

if (!ISSET($_SESSION['uid']))
{
  $_SESSION['uid'] = 0;
}
?>

  <!DOCTYPE html>
  <html ng-app='app_angular' ng-controller="ctrl">
    <head>

    <?php
    include 'components/headContent.php';
    ?>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

<?php include 'php_scripts/formater_champ.php';?>

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



<a class="waves-effect waves-light btn" href="#modal_ins">ins</a>

<a class="waves-effect waves-light btn" href="#modal_planif">Planifier une activité</a>

<a class="waves-effect waves-light btn" href="#modal_login">Login</a>

<a class="waves-effect waves-light btn" href="#modal_code">code</a>

<a class="waves-effect waves-light btn" href="#modal_session">Session</a>

<?php 
include 'components/modal_inscription.php';
include 'components/modal_planifier_activite.php';
include 'components/modal_creer_session.php';
?>

</main>



        <footer class="page-footer" class="col l12" style="width: 100%!important">
         
        </footer>
      


	  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/moment.js">moment.locale="fr"</script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/fr-ca.js"></script>  
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar-fr.js"></script>

		<script type="text/javascript" src="js/gcal.js"></script>
		<script type="text/javascript" src="js/sc-date-time.js"></script>

      <?php include 'js/ScriptsAdmin.php'; ?>
      
      <script src="js/scripts.js"></script>


    </body>
  </html>

