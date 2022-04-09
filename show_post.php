<?php
    session_start();
    isset($_SESSION["username"]) ==  false ? 
    die("<h1>Please login first.</h1><br><a href=\"login.php\">Login</a> "):'';

    require_once(__DIR__ . '/define_sql.php');
    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Something's wrong, can't connect to database.") : '';
    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>Edit post</title>
    <style>
        table, th, td { border: 1px solid black; }
        td, th{
            padding:10px
        }
        
    </style>
</head>
<body>
<center>
    <h2>This is your post</h2><br>
    <table border=1>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
            </tr>
        </thead>
        <thead>
            <form method="post">
            <?php
                $display = mysqli_query($db, "select * from user.user_post where username='".$_SESSION["username"]."';");
                //code hom truoc co dong nay --V
                //$row = mysqli_fetch_array($display);
                    while($row = mysqli_fetch_array($display)){ ?>
                    <tr>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["post"]; ?></td>
                        <td><?php echo "<a href='edit_post.php?title=".$row["title"]."'>Edit</a>";?></td>
                        <td><?php echo "<a href='del_post.php?title=".$row["title"]."'>Delete</a>";?></td>
                    </tr>
                    <p>Return to your <a href="user_dashboard.php">Homepage</a></p>
            <?php }?>
            </form>
        </thead>
    </table>
<center>
</body>
</html>