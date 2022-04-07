<?php
    session_start();
    require_once(__DIR__ . '/define_sql.php');
    isset($_SESSION["username"]) ==  false ? 
    die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "):'';

    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Can't connect to database, try again.") : '';

    if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["Save"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["phone"];
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>Edit</title>
</head>
<body>
<center>
    <div><h2>Edit your info.</h2></div>
    <br>
    <form method="POST">
        <!-- first name -->  
        <input type="text" name="fname" placeholder="first name"><br>
        <!-- last name -->  
        <input type="text" name="lname" placeholder="last name"><br>
        <!-- phone -->
        <input type="text" name="phone" placeholder="phone number" ><br>
        <p>Leave empty to clear your info.</p>
        <br>
        <input type="submit" name="Save">
    </form>

    <!-- <p>Update successfullly</p> -->
    <?php 
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $update_query = ("update user.user_info set fname = '".$fname."', lname = '".$lname."', phone = '".$phone."' where username='".$_SESSION["username"]."'");
            ($db -> query($update_query)) ? printf("<p>Update successfullly</p>"):
                printf("Fail to update: %s<br />", $db -> error);
        }
    ?>

</center>
</body>
</html>