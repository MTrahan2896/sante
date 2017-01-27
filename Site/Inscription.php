<html>
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
@media only screen 
  
  and (max-device-width: 770px)
 
  and (orientation: portrait) {
    .navbar-brand{
      display: none;
    }
}
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
  
<div class="col-lg-2 col-md-1"></div>
<form class="form-horizontal col-lg-8 col-md-10 col-sm-12">
<fieldset>

<!-- Form Name -->
<legend>Inscription</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Nom d'utilisateur*</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="placeholder" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pwd">Mot de passe*</label>
  <div class="col-md-4">
    <input id="pwd" name="pwd" type="password" placeholder="**********" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pwd_confirm">Confirmation mot de passe*</label>
  <div class="col-md-4">
    <input id="pwd_confirm" name="pwd_confirm" type="password" placeholder="**********" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nom">Nom*</label>  
  <div class="col-md-4">
  <input id="nom" name="nom" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prenom">Prénom*</label>  
  <div class="col-md-4">
  <input id="prenom" name="prenom" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telephone">Téléphone*</label>  
  <div class="col-md-4">
  <input id="telephone" name="telephone" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="courriel">Courriel*</label>  
  <div class="col-md-4">
  <input id="courriel" name="courriel" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sexe">Sexe*</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="sexe-0">
      <input type="radio" name="sexe" id="sexe-0" value="H" checked="checked">
      Homme
    </label> 
    <label class="radio-inline" for="sexe-1">
      <input type="radio" name="sexe" id="sexe-1" value="F">
      Femme
    </label>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="inscription"></label>
  <div class="col-md-4">
    <button id="inscription" name="inscription" class="btn btn-success">S'inscrire</button>
  </div>
</div>


</fieldset>
</form>
<div class="col-lg-2 col-md-1"></div>



</body>
</html>