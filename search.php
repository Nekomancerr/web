<?php
    session_start();
    require_once(__DIR__ . '/define_sql.php');
    //check login state
    $_SESSION["username"] == '' ? die("<center><h2>Please login first.</h2></center>") : '';

    $db = new mysqli($server, $username_sql, $password_sql, $db_name);
    $db->connect_error ? die("Something's wrong, can't connect to database.") : '';

    $username = $_POST["search"];
    $sql = "select * from user.user_info where username LIKE '%$username%'";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $results = mysqli_query($db, $sql);
        $results == '' ? printf("Something's wrong, couldn't do search."): '';
        $row = mysqli_num_rows($results);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <style>
        .parent { text-align: center; }
        .parent > ul { display: inline-block; }
    </style>
</head>
<body>
    <center>
        <h2>Search page</h2><br>
        <form method="POST">
            <label>Enter username: </label>
            <input type="text" name="search" placeholder="Enter username">
            <input type="submit" name="submit">
        </form>
    </center>
        <br>
        <ul class="parent">
            <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($row){
                    echo "<p>User found:</p>";
                    while ($row = mysqli_fetch_array($results)){
                        echo "<li>" . $row['username'] . "</li>";
                    }
                } else { echo "No match result"; }
            } ?>
        </ul>
</body>
</html>