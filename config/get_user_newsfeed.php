<?php


    function get_newsfeed($user_id,  $last_n_logs, $conn) {
        $user_newsfeed = "  SELECT *
                            FROM movies_logs
                            WHERE log_id IN (
                                SELECT max(log_id)
                                FROM movies_logs
                                INNER JOIN users_followers ON users_followers.user_id = movies_logs.log_user_id
                                WHERE users_followers.follower_id = $user_id
                                GROUP BY log_user_id
                            )
                            ORDER BY log_id DESC
                            LIMIT $last_n_logs;";

        $newsfeed_result = mysqli_query($conn, $user_newsfeed);
    
        $newsfeed_result_returned = mysqli_fetch_all($newsfeed_result, MYSQLI_ASSOC);
    
        return empty($newsfeed_result_returned) ? null : $newsfeed_result_returned;
    }


?>