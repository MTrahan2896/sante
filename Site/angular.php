<html ng-app='app_angular' ng-controller="ctrl">
  <head>
    <?php include 'components/headContent.php';?>
  </head>
  <body>
    
    <header>
      <?php include 'components/nav.php';?>
      
    </header>
    <main>
    <div class="container">
    





  <input type="text" ng-model="nom">
  <button type="button" ng-click="afficherNom()" value="Afficher le nom">Afficher le nom</button>
  <button type="button" ng-click="changer()" value="Afficher le nom">Afficher le nom</button>














  </div>
  </main>
  <footer class="page-footer" style="width: 100%!important">
    
  </footer>
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/moment.js">moment.locale="fr"</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/fr-ca.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar-fr.js"></script>
  <script type="text/javascript" src="js/gcal.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
  <script type="text/javascript" src="js/sc-date-time.js"></script>
  <script src="js/scripts.js"></script>
  <?php include 'js/ScriptsAdmin.php';?>
  
  

<script>
   $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
          
</script>

  <div class="hiddendiv common"></div>







  </body></html>