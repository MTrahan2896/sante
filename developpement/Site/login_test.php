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

<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalHorizontal">
    Connexion/Inscription
</button>

<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <br>
                
                  <div style="text-align: center;">
                  <img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png"  style="text-align:center"/>
                  </div>               
                
                
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                 <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                   

                    <div class="input-group" style="margin-top: 15px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="user" value="" placeholder="User">                                        
                    </div>

                    <div class="input-group" style="margin-top: 15px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>                                                                  

                    <div class="form-group" style="margin-top: 15px">
                        <!-- Button -->
                        <div  style="margin-left: 15px;margin-right: 15px; ">

                        <button type="submit" href="#" class="btn btn-primary" style="width: 100%">
                        <i class="glyphicon glyphicon-log-in"></i> Connexion</button>                          
                        </div>
                    </div>

                     <div >
                            <a href="#" style="vertical-align: bottom;text-align: center;margin: none">Nouveau Compte</a>                          
                        </div>

                </form> 
            </div>
        </div>
    </div>
</div>
</body>
</html>