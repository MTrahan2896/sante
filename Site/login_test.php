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


<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center"><img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png" /></div>
            </div>     

            <div class="panel-body" >

                <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="user" value="" placeholder="User">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
                        </div>
                    </div>

                </form>     

            </div>                     
        </div>  
    </div>
</div>



</body>
</html>