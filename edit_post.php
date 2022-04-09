<?php
    session_start();
    isset($_SESSION["username"]) ==  false ? 
    die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "):'';
    
    require_once(__DIR__ . '/define_sql.php');
    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Something's wrong, can't connect to database.") : '';
    $username = $_SESSION["username"];
    //echo $_GET['title'];
    
    if (isset($_GET['title'])){
        $title = $_GET['title'];
        //printf($_GET['title']);

        $result = mysqli_query($db,"select * from user.user_post where username='".$username."' and title='".$title."'");
        $row = mysqli_fetch_array($result);
        //printf($row[2]);
    }

    if( isset($_POST['edit_post'])) {
        $post = $_POST['edit_post'];
        $title = $_POST['title'];
        $sql = "update user.user_post set post='".$post."' where title='".$title."'";
        $db -> query($sql) ? printf("Update successfully."): printf("Can't update.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>Edit post</title>
</head>
<body>
    <center>
    <h2>Edit, <?php echo $_SESSION["username"]; ?></h2>
    <div>
        <form action="edit_post.php" method="POST">
            <div>
                <div><?php echo "$row[1]"; ?></div><br><br> 
                <input type="hidden" name="title" id="title" value="<?php print($row[1]); ?>"></input>
                <textarea name="edit_post" id="post" cols="100" rows="30"><?php print($row[2]);?></textarea><br>
                <input type="submit" name="Save">
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
