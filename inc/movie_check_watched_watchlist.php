<?php

    session_start();
    if(isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        include('config/database_connection.php');
        include('config/check_in_database_for_a_movie.php');
        $watched_check = get_movie_from_db("movies_logs", $movie_id, $user_id, "check_for_watched", $conn);
        $watchlist_check = get_movie_from_db("watchlist_logs", $movie_id, $user_id, "check_for_watchlist", $conn);
    
        $movie_rating = ($watched_check == null) ? 0 : $watched_check["log_movie_rating"];
        $watched_check = ($watched_check == null) ? false : true;
        $watchlist_check = ($watchlist_check == null) ? false : true;
    }

?>