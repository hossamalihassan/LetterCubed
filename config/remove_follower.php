<?php

    function remove_follower($conn, $user_id, $follower_id, $user_followers, $follower_following) {    
        $remove_follower = "DELETE FROM users_followers WHERE user_id = $user_id  AND follower_id = $follower_id;";
        $remove_follower .= "UPDATE users SET user_followers = $user_followers WHERE user_id = $user_id;";
        $remove_follower .= "UPDATE users SET user_following = $follower_following WHERE user_id = $follower_id;";

        if(mysqli_multi_query($conn, $remove_follower)){
            echo "removed follower";
        } else {
            echo mysqli_error($conn);
        }

    }

?>