<?php

    function remove_movie_log($conn, $cond, $number_of_logs) {    
        $user_id = $_SESSION["user_id"];

        if(isset($_GET["id"] )){
            $movie_id = $_GET["id"];
        }

        $remove_movie_log_stat = "";
        if($cond == "watched"){
            $remove_movie_log_stat = "DELETE FROM movies_logs WHERE log_user_id = $user_id  AND log_movie_id = $movie_id;";
            // update user stats
            $remove_movie_log_stat .= "UPDATE users SET number_of_movies_watched = $number_of_logs WHERE user_id = $user_id";
        } else if($cond == "watchlist") {
            $remove_movie_log_stat = "DELETE FROM watchlist_logs WHERE watchlist_log_user_id = $user_id AND watchlist_log_movie_id = $movie_id;";
            // update user stats
            $remove_movie_log_stat .= "UPDATE users SET number_of_watchlist_movies = $number_of_logs WHERE user_id = $user_id";
        }

        if(mysqli_multi_query($conn, $remove_movie_log_stat)){
            echo "removed log";
        } else {
            echo mysqli_error($conn);
        }

    }

?>