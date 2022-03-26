<?php
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
    if ($row["isAdmin"] == "admin") {
        die("Forbidden.");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    
    <div>USER DASHBOARD</div>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>