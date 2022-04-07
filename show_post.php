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
</head>
<body>
<center>
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
                $row = mysqli_fetch_array($display);
                if($row){
                    while($row = mysqli_fetch_array($display)){
                        $_POST["title"] = $row["title"]?>
                    <tr>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["post"]; ?></td>
                        <td><?php echo "<a href='edit_post.php?title=".$row["title"]."'>EDIT</a>";?></td>
                        <td><?php echo "<a href='del_post.php?title=".$row["title"]."'>DEL</a>";?></td>

                        <!-- <td><a href="del_post.php?title=">DEL</a></td> -->
                    </tr>
            <?php }} ?>
            </form>
        </thead>
    </table>
<center>
</body>
</html>