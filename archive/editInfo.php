<?php
    session_start();
    require_once(__DIR__ . '/define_sql.php');

    $db = new mysqli($server, $username_sql_info, $password_sql_info, $db_name);
     
    if($db->connect_error){
      die("can't connect to database");
    }
    //nothing here yet :-)


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- should user post method of HTML again here -->
    <!-- WIP, not finished. -->
  <div class="col-md-6">
    <div class="panel panel-info" >
      
      <div class="panel-heading">
        <div class="panel-title">Edit your info.</div>
      </div>
      
      <div style="padding-top:30px" class="panel-body" >      
        
        <?php if ($_POST["errorMessage"] != '') { ?>
		    <!-- check for previous error -->
            <div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
		<?php } ?>
        
        <form id="loginform" class="form-horizontal" role="form" action="#" method="POST">                      
          <!-- email -->
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="editEmail" name="uname" placeholder="" require>
          </div>
          <!-- phone -->
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" class="form-control" id="edit____" name="" placeholder="text" >
          </div>
          <!-- address -->
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" class="form-control" id="edit____" name="" placeholder="text" >
          </div>
          <!-- gender -->
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" class="form-control" id="edit____" name="" placeholder="text" require>
          </div>
          <!-- Full Name -->
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" class="form-control" id="edit____" name="" placeholder="text" require>
          </div>
          
          <div style="margin-top:10px" class="form-group">                               
            <div class="col-sm-12 controls">
              <input type="submit" name="login" value="Login" class="btn btn-info">						  
            </div>						
          </div>
          
        
        </form>
      </div>
    </div>
  </div>

</body>
</html>