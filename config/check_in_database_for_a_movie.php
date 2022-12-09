<?php

    function get_movie_from_db($table, $movie_id, $user_id, $cond , $conn) {

        $search = "";
        if($cond == "check_for_watched"){
            $search = "SELECT * FROM $table WHERE log_movie_id = $movie_id AND log_user_id = $user_id;";
        } else if($cond == "check_for_watchlist"){
            $search = "SELECT * FROM $table WHERE watchlist_log_movie_id LIKE $movie_id AND watchlist_log_user_id LIKE $user_id";
        }

        $search_result = mysqli_query($conn, $search);
    
        $search_returned = mysqli_fetch_all($search_result, MYSQLI_ASSOC);

        return empty($search_returned) ? null : $search_returned[0];
    }

?>