<?php
    //this thing should be handle by admin only
    session_start();
    require_once(__DIR__ . '/define_sql.php');

    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    if($db->connect_error){
      die("Can't connect to database, try again.");
    }

    $username = $_SESSION["username"];

    $sql_check = "select username, isAdmin from user.user_info where username='".$username."'  ";
    $result = mysqli_query($db, $sql);
    $row=mysqli_fetch_array($result);

    //check user priviledge
    if ($row["isAdmin"] == "user") {
        die("Forbidden.");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username_add_sql = $_POST['username'];
        if($_POST['password'] == $_POST['re_password']){
            $password_add_sql = $_POST['password'];
        }
        $isadmin_sql = $_POST["account_type"];
        $sql_modify = "insert into user.user_info(username, password, isAdmin) values ('".$username_add_sql."','".$password_add_sql."','".$isadmin_sql."')";
        if ($db -> query($sql_modify)) {
            printf("Record inserted successfully.<br />");
         }
         if ($db -> errno) {
            printf("Could not insert record into table: %s<br />", $db -> error);
         }
        
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <center>
    <form class="form" action="" method="POST">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" require/><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password" require><br><br>
        <input type="password" class="login-input" name="re_password" placeholder="Confirm Password" require><br><br>
         <select name="account_type" id="account_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
            <input type="submit" name="submit" value="Register" class="login-button"><br><br>
        <p class="link"><a href="login.php">Click here to Login page</a></p>
    </form>
    </center>

</body>
</html>