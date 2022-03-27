<?php
  session_start();
  require_once(__DIR__ . '/define_sql.php');

  $db = new mysqli($server, $username_sql, $password_sql, $db_name);
  
  if($db->connect_error){
    die("Can't connect to database");
  }

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["uname"];
    $password = $_POST["pwd"];
 
    $sql="select * from user_info where username='".$username."' and password='".$password."'";
    $result = mysqli_query($db, $sql);
    $row=mysqli_fetch_array($result);

    //check priviledge 
    if($row["isAdmin"] == "user"){
      $_SESSION["username"] = $username;
      header("location:user_dashboard.php");
    }
    elseif($row["isAdmin"] =="admin"){
      $_SESSION['username'] = $username;
      header("location:admin_dashboard.php");
    }
    else{
      $_POST["errorMessage"] = "Something wrong happened, please contact admin for more information."; 
      header("location:#");
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <script src="./bootstrap/css/bootstrap.min.js"></script>
</head>
<body>

  <div class="col-md-6">
    <div class="panel panel-info" >
      
      <div class="panel-heading">
        <div class="panel-title">Log In</div>
      </div>
      
      <div style="padding-top:30px" class="panel-body" >      
        
        <?php if ($_POST["errorMessage"] != '') { ?>
			  	<!-- check for previous login error, just user privilege stuff -->
          <div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
			  <?php } ?>
        
        <form id="loginform" class="form-horizontal" role="form" action="#" method="POST">                      
          
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="loginId" name="uname" placeholder="username" require>
          </div>                                
          
          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="loginPass" name="pwd" placeholder="password" require>
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