<?php
    session_start();
    isset($_SESSION["username"]) ==  false ? 
    die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "):'';
    
    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Can't connect to database, try again.") : '';
    $username = $_SESSION["username"];

    $sql = "INSERT INTO user.user_post (username, title, post)
            VALUES ('".$username."', '".$title."', '".$post."'); ";
    
    
    // if($_SERVER["REQUEST_METHOD"]=="POST"){
        
    // }    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogposting</title>
</head>
<body>
    <center>
        <form action="#" method="POST">
            <h2>Please post something, <?php echo $_SESSION["username"]; ?></h2>
            <div>
                <textarea name="title" id="title" cols="100" rows="1" placeholder="Title of your post."></textarea>
                <textarea name="post" id="post" cols="100" rows="30" placeholder="Write your thoughts here."></textarea><br>
                <input type="submit" name="submit">
            </div>
        </form>

        <p>return to your <a href="user_dashboard.php">homepage</a></p>
    </center>
</body>
</html>