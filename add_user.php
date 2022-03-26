<?php
    //this thing should be handle by admin only
    session_start();
    require_once(__DIR__ . '/define_sql.php');

    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    if($db->connect_error){
      die("Can't connect to database, try again.");
    }

    $username = $_SESSION["username"];

    $sql="select username, isAdmin from user.user_info where username='".$username."'  ";
    $result = mysqli_query($db, $sql);
    $row=mysqli_fetch_array($result);

    //check user priviledge
    if ($row["isAdmin"] == "user") {
        die("Forbidden.");
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <center>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br><br>
        <input type="text" class="login-input" name="email" placeholder="Email Adress"><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password"><br><br>
        <input type="submit" name="submit" value="Register" class="login-button"><br><br>
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    </center>

</body>
</html>