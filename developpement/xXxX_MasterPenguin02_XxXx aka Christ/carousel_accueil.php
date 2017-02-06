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



        
        }
        

        @media screen and (max-width: 480px) {
            .slider .slides li img {
                background-color: #fff;
                height:200px;

            background-size:100% auto;
            background-repeat: no-repeat;

        }
        .slider .slides {
             background-color: transparent;
             margin: 0;
             height:300px;

            }
        .slider{
            height:360px;
        }
        

        }



      </style>
    </head>

    <body>
<div class="container">
   
<div class="slider">
    <ul class="slides">
      <li>
          <div class="center" >
             <h3>Bienvenue</h3>
             <h5 class="light black-text text-lighten-3">Les Inscriptions pour le grand défi pierre lavoie se termine bientot </h5>
             <img src="defi_pierre.png" > 
        </div>
      </li>
      <li>
          <div class="center">
              <h3>Badminton</h3>
          <h5 class="light black-text text-lighten-3">Inscrivez-vous à nos activités de badminton les mardi et jeudi midis</h5>
        <img src="badminton.jpg" > 

        </div>
      </li>
      <li>
          <div class ="center">
              <h3>volleyball</h3>
          <h5 class="light black-text text-lighten-3">Inscrivez-vous en grand nombre</h5>
        <img src="volleyball.jpg" > 

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