<?php

    function add_follower($conn, $user_id, $follower_id) {
        $addFollower = "INSERT INTO users_followers (user_id, follower_id) VALUES ($user_id, $follower_id);";

        if(mysqli_query($conn, $addFollower)){
            echo "added follower";
        } else {
            echo mysqli_error($conn);
        }
    }
    

?>