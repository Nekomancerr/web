<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <?php
            session_start();
            isset($_SESSION["username"]) ==  false ? 
            die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "):'';
    
            require_once(__DIR__ . '/define_sql.php');
            $db = new mysqli($server, $username_sql, $password_sql, $db_name);
            $db->connect_error ? die("Something's wrong, can't connect to database.") : '';
            //echo $_GET['title'];
            $title = $_GET["title"];
            $username = $_SESSION["username"];
            $sql = " delete from user.user_post where title='".$title."' and username='".$username."'";
            $db -> query($sql)? printf("<h2>Delete successfully.</h2>"): printf("<h2>Failed: %s<br></h2>", $db -> error_log)
        ?>    
    </center>
</body>
</html>


