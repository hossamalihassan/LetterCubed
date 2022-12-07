<?php

    function remove_movie_log($cond) {

        include("database_connection.php");

        session_start();
        $user_id = $_SESSION["user_id"];
    
        if(isset($_GET["id"] )){
            $movie_id = $_GET["id"];
        }

        $remove_movie_log_stat = "";
        if($cond == "watched"){
            $remove_movie_log_stat = "DELETE FROM movies_logs WHERE log_user_id = ". $user_id ." AND log_movie_id = " . $movie_id;
        } else if($cond == "watchlist") {
            $remove_movie_log_stat = "DELETE FROM watchlist_logs WHERE watchlist_log_user_id = ". $user_id ." AND watchlist_log_movie_id = " . $movie_id;
        }

        if(mysqli_query($conn, $remove_movie_log_stat)){
            header("Refresh:0");
        } else {
            echo mysqli_error($conn);
        }

    }

?>