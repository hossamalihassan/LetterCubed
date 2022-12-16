<?php

    include('../config/database_connection.php');
    include('../config/add_follower.php');
    include('../config/remove_follower.php');

    $user_id = $_GET["user_id"];

    session_start();
    $follower_id = $_SESSION["user_id"];

    $cond = $_GET["cond"];
    if($cond == "addFollower"){
        add_follower($conn, $user_id, $follower_id);
    }

    else if ($cond == "removeFollower"){
        remove_follower($conn, $user_id, $follower_id);
    }

?>