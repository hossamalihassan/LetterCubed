<?php

    function get_number_of_movie_logged ($conn, $cond){
        include('search_in_DB.php');

        $user_id = $_SESSION["user_id"];

        if($cond == "watched"){
            $logs = get_from_db("movies_logs", "log_user_id", $user_id, $conn);
        } else if ($cond == "watchlist"){
            $logs = get_from_db("watchlist_logs", "watchlist_log_user_id", $user_id, $conn);
        }

        $logs_number = empty($logs) ? 0 : count($logs);

        return $logs_number;
    }

?>