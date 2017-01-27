<html>
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Style/navbar_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  window.onload = function () {
  	x = document.createElement("footer");
  	x.className="footer";
  	y = document.getElementsByTagName("body")[0];
  	y.appendChild(x);
  	
  }
  </script>
</head>

</style>
<body>

<nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container-fluid" style="padding-left: 0px">

  <!--Menu déroulant lorsque la résolution est petite -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>       
      </button>
    </div>


    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <a class="navbar-brand" style="padding-top: 5px;" href="#">
      <img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png" style="width: 40px;height:40px;"/>
      </a>  

        <li class="active"><a href="#">Accueil</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
<div class="page-wrap">






