<?php

    function add_movie_to_watchlist($conn, $number_of_movies_added_to_watchlist) {
        $user_id = $_SESSION["user_id"];

        if(isset($_GET["id"] )){
            $watchlist_movie_id = $_GET["id"];
        }
    
        if(isset($_GET["title"])){
            $watchlist_movie_name = $_GET["title"];  
        }
    
        if(isset($_GET["poster_path"])){
            $watchlist_movie_poster = $_GET["poster_path"];  
        }
    
        $addMovieToWatchlist = "INSERT INTO watchlist_logs (watchlist_log_user_id, watchlist_log_movie_id, watchlist_log_movie_name, watchlist_log_movie_poster) VALUES ('$user_id', '$watchlist_movie_id', '$watchlist_movie_name', '$watchlist_movie_poster');";
        // update user stats
        $addMovieToWatchlist .= "UPDATE users SET number_of_watchlist_movies = $number_of_movies_added_to_watchlist WHERE user_id = $user_id";

        if(mysqli_multi_query($conn, $addMovieToWatchlist)){
            echo 'Added movie to watchlist';
        } else {
            echo mysqli_error($conn);
        }
    }
    

?>