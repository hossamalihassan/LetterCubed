<?php 

    include('../config/database_connection.php');
    include("../config/add_movie_log_to_DB.php");
    include("../config/add_movie_to_watchlist.php");
    include("../config/get_number_of_user_movies.php");

    $cond = $_GET["cond"];
    session_start();

    $number_of_movies_logged = get_number_of_movie_logged($conn, $cond)+1;
    if($cond == "watched"){
        add_movie_log($conn, $number_of_movies_logged);
    } 
    
    else if($cond == "watchlist") {
        add_movie_to_watchlist($conn, $number_of_movies_logged);
    }
    
?>