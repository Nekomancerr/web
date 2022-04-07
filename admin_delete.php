<?php
    //this thing should be handle by admin only
    session_start();
    $_SESSION["isAdmin"] != "admin" ? die("Forbidden."): '';
    require_once(__DIR__ . '/define_sql.php');
    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Something's wrong, can't connect to database.") : '';
    
    if (isset($_POST['search'])) {
        $delete_user= $_POST['search'];
        $sql1 = "delete from user.user_info where username='".$delete_user."'"; 
        $sql2 = "delete from user.user_post where username='".$delete_user."'";
        ($db -> query($sql1 )) && ($db -> query($sql2)) ? printf("Task done successfully.<br />") : printf("Could not delete user: %s<br />", $db -> error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title></title>
</head>
<body>
    <center>
        <h2>Delete user page for Admin.</h2>
        <p>Admin's name: <?php echo $_SESSION["username"]?></p><br>
        <div>
            <form action="#" method="POST">
                <label>Delete</label>
                <input type="text" name="search" placeholder="Enter username">
                <input type="submit" name="Delete">
            </form>
        </div>
    </center>
</body>
</html>