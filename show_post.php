<?php
    session_start();
    isset($_SESSION["username"]) ==  false ? 
    die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "): null;

    require_once(__DIR__ . '/define_sql.php');
    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Can't connect to database, try again.") : '';
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your post</title>
</head>
<body>
    <div>
        
    </div>
</body>
</html>