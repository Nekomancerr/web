<?php
    //this thing should be handle by admin only
    session_start();
    require_once(__DIR__ . '/define_sql.php');

    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    if($db->connect_error){
      die("Can't connect to database, try again.");
    }

    $username = $_SESSION["username"];

    $sql="select username, isAdmin from user.user_info where username='".$username."'  ";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    //check user priviledge
    if ($row["isAdmin"] == "user") {
        die("Forbidden.");
    }

    //should delete user's infos from 3 tables at once, purge everything from user, otherwise there would be an error 
    //remind self to create table first before write any query or manipulation method to the db
    //lazy :-)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h2>Delete user page for Admin.</h2>
    <p>Admin's name: <?php echo $_SESSION["username"]?></p>
</body>
</html>