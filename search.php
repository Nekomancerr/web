<?php
    $db = mysqli_connect("localhost", "nekomancer", "password", "user") or die("can't connect to database");
    $username=$_POST["search"];
    $sql="select * from user.user_info where username='$username'";
    $rs=mysqli_query($db, $sql);
    
    $row=mysqli_fetch_array($rs);
    
    if($row)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <form method="POST">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit">
    </form>
</body>
</html> 