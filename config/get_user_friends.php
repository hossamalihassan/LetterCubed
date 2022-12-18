<?php

    function get_friends($on_col, $where_col, $user_id, $page, $friends_per_page, $conn){
        $offset = ($page - 1) * $friends_per_page;
        $user_friends = "SELECT u.user_username, u.user_profile_img
                        FROM users_followers AS f
                        INNER JOIN users AS u ON u.user_id = f.$on_col
                        WHERE f.$where_col = $user_id
                        LIMIT $friends_per_page OFFSET $offset;";
                        
        $user_friends_result = mysqli_query($conn, $user_friends);
    
        $user_friends_returned = mysqli_fetch_all($user_friends_result, MYSQLI_ASSOC);
    
        return empty($user_friends_returned) ? null : $user_friends_returned;
    }

?>