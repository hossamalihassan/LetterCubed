<?php

    function get_number_of_movie_logged ($conn, $cond){
        include('count_rows_from_DB.php');

        $user_id = $_SESSION["user_id"];

        $logs_count = 0;
        if($cond == "watched"){
            $logs_count = get_count_of_rows("movies_logs", "log_user_id", $user_id, $conn);
        } else if ($cond == "watchlist"){
            $logs_count = get_count_of_rows("watchlist_logs", "watchlist_log_user_id", $user_id, $conn);
        }

        return $logs_count;
    }

?>