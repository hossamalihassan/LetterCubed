<?php

    function check_if_user_is_following ($user_id, $follower_id, $conn) {
        $user_follow_search = "SELECT * FROM users_followers WHERE user_id = $user_id AND follower_id = $follower_id;";

        $follow_query = mysqli_query($conn, $user_follow_search);
    
        $follow_result_returned = mysqli_fetch_all($follow_query, MYSQLI_ASSOC);

        return empty($follow_result_returned) ? "Follow" : "Following";
    }

?>