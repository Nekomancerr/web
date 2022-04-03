<?php
    session_start();
    require_once(__DIR__ . '/define_sql.php');
    
    //check if user has logged in, add a button to turn back to previous page.
    isset($_SESSION["username"]) ==  false ? 
        die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "): '';

    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Can't connect to database, try again.") : '';

    $sql = "select username, isAdmin from user.user_info where username='".$_SESSION["username"]."'  ";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>User Dashboard</title>
    <style>
        .centered {
        align-items: center;
        padding: 30px;
        font-size: 20px;
        }
    </style>
</head>
<body>
    <center>
        <div class="centered">
            <h1><?php echo $_SESSION["username"]?>'s Dashboard. Welcome.</h1><br>
            <ul class="centered justify-content-center">    
                <a class="btn-1" href="post.php">Post </a>
                <a class="btn-1" href="search.php">Search </a>
                <a class="btn-1" href="">Show posts </a>
                <a class="btn-1" href="logout.php">Logout </a> 
            </ul>
        </div>
    </center>
</body>
</html>