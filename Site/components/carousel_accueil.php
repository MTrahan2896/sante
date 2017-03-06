<html>
    <head>
        <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
      
      <style>
      
  
        
        @media screen and (min-width: 700px) {
         
        .slider .slides li img {
                background-color: #fff;

            background-size:100% auto;
            background-repeat: no-repeat;

        }
        .slider  .slides  {
             background-color: transparent;
             margin: 0;


            }
            .slider .slides li,{

                height:520px !important;
            }
            .slider .slides,.slider{
                height:540px  !important;
            }
            .indicators{
                z-index:3 !important;
            }



        
        }
        

        @media screen and (max-width: 480px) {
            .slider .slides li img {
                width:294px !important;
                background-color: #fff;
                height:200px !important;

            background-size:100% auto;
            background-repeat: no-repeat;

        }
        .slider .slides {
             background-color: transparent;
             margin: 0;
             height:300px !important;

            }
        .slider{
            height:360px !important;
        }
        

        }



      </style>
    </head>

    <body>
<div class="container">
   
<div class="slider">
    <ul class="slides">
        <?php 
         

    
        ?>
      <li>
          <div class="center" >
             <h4>Bienvenue</h4>
             <h5 class="light black-text text-lighten-3">Les Inscriptions pour le Grand défi Pierre Lavoie sont bientôt finies </h5>
             <img src="image/defi_pierre.png" style="height:192px;width:627px;" > 
        </div>
      </li>
      <li>
          <div class="center">
              <h4>Badminton</h4>
          <h5 class="light black-text text-lighten-3">Inscrivez-vous à nos activités de badminton les mardis et jeudis</h5>
        <img src="image/badminton.jpg" style="height:400px;width:720px;" > 

        </div>
      </li>
      <li>
          <div class ="center">
              <h4>Volleyball</h4>
          <h5 class="light black-text text-lighten-3">Inscrivez-vous en grand nombre</h5>
        <img src="image/volleyball.jpg" style="height:400px;width:720px;"> 

        </div>
      </li>
      
    </ul>

              
 </div>
     
</div>


            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="js/materialize.min.js"></script>
            <script>
                $(document).ready(function(){
                $('.slider').slider();
                });
            </script>

    </body>
</html>