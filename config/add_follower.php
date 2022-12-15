<?php

    function add_follower($conn, $user_id, $follower_id, $user_followers, $follwers_following) {
        $addFollower = "INSERT INTO users_followers (user_id, follower_id) VALUES ($user_id, $follower_id);";
        $addFollower .= " UPDATE users SET user_followers = $user_followers WHERE user_id = $user_id;";
        $addFollower .= " UPDATE users SET user_following = $follwers_following WHERE user_id = $follower_id;";

        if(mysqli_multi_query($conn, $addFollower)){
            echo "added follower";
        } else {
            echo mysqli_error($conn);
        }
    }
    

?>