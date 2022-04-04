<?php
    session_start();
    isset($_SESSION["username"]) ==  false ? 
    die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "):'';
    
    require_once(__DIR__ . '/define_sql.php');
    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Something's wrong, can't connect to database.") : '';
    $username = $_SESSION["username"];

    if($_SERVER["REQUEST_METHOD"]=="POST"){ 
        $title = $_POST['title'];
        $post = $_POST['post'];
        $sql = "INSERT INTO user.user_post (username, title, post)
                VALUES ('".$username."', '".$title."', '".$post."'); ";

        $db -> query($sql)? $_POST["message"] = "<p>Posted successfully!</p>": 
                            $_POST["message"] = "<p>Posted failed, something's wrong. Please try again later.</p>";
    }    
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
    <h2>Please post something, <?php echo $_SESSION["username"]; ?></h2>
    <div>    
        <form action="#" method="POST">
            <div>
                <textarea name="title" id="title" cols="100" rows="1" placeholder="Title of your post."></textarea><br><br>
                <textarea name="post" id="post" cols="100" rows="30" placeholder="Write your thoughts here."></textarea><br>
                <input type="submit" name="submit">
            </div>
            <div>
                <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        printf($_POST["message"]);
                    }
                ?>
            </div>
        </form>
    </div>
    
    <p>return to your <a href="user_dashboard.php">homepage</a></p>
    </center>
</body>
</html>