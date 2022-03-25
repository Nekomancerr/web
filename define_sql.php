<?php
    //should have 2 types of account, one is Admin, which we already have
    //the other one is guest, should have privilege to insert data and query data, not drop, delete or anything else.
    //that said, user should have permission of certain table, for example. user cannot delete nor modify login table,
    //but can modify info of themselves, but also not other users's infos.
    //same deal with user_post table, one can't and shouldn't have privilege to drop other users's post, but can modify their own's posts 

    $server = "localhost";
    $username_sql = "nekomancer";
    $username_sql_info = "user_priv";
    $password_sql = "password";
    $password_sql_info = "user_priv";
    $db_name = "user";
?>