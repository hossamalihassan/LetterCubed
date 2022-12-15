<?php

    include('../config/database_connection.php');
    include('../config/count_rows_from_DB.php');
    include('../config/add_follower.php');
    include('../config/remove_follower.php');

    $user_id = $_GET["user_id"];

    session_start();
    $follower_id = $_SESSION["user_id"];

    $user_followers = get_count_of_rows("users_followers", "user_id", $user_id, $conn);
    $follower_following = get_count_of_rows("users_followers", "follower_id", $follower_id, $conn);

    $cond = $_GET["cond"];
    if($cond == "addFollower"){
        $user_followers++;
        $follower_following++;
        add_follower($conn, $user_id, $follower_id, $user_followers, $follower_following);
    }

    else if ($cond == "removeFollower"){
        $user_followers--;
        $follower_following--;
        remove_follower($conn, $user_id, $follower_id, $user_followers, $follower_following);
    }

?>