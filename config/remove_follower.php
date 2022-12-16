<?php

    function remove_follower($conn, $user_id, $follower_id) {    
        $remove_follower = "DELETE FROM users_followers WHERE user_id = $user_id  AND follower_id = $follower_id;";

        if(mysqli_query($conn, $remove_follower)){
            echo "removed follower";
        } else {
            echo mysqli_error($conn);
        }

    }

?>