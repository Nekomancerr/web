<?php
    //this thing should be handle by admin only
    session_start();
    ($_SESSION["isAdmin"] != "admin") ? die("Forbidden.") :'';

    require_once(__DIR__ . '/define_sql.php');
    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error? die("Can't connect to database, try again.") : '';
    $username = $_SESSION["username"];

    $sql = "select username, isAdmin from user.user_info where username='".$username."' ";
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
    <title>Admin dashboard</title>
    <style>
        a+a {
        margin-left: 10px;
        }
        .centered {
        align-items: center;
        padding: 30px;
        font-size: 20px;
        }
    </style>
</head>
<body>
    <center>
        <br>
        <h1>Welcome to admin page, <?php echo $_SESSION["username"]?></h1>
        <div class="centered justify-content-center"><br>
            <a href="logout.php">Logout</a>
            <a href="add_user.php">Add user</a>
            <a href="admin_delete.php">Delete</a><br>

            <a href=""></a>
            <br>
            <p>Go to your <a href="user_dashboard.php">Homepage</a></p>

        </div>
    </center>
</body>
</html>