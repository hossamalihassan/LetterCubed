<?php 

    include("../config/add_movie_log_to_DB.php");
    include("../config/add_movie_to_watchlist.php");

    session_start();
    $cond = $_GET["cond"];
    if($cond == "watched"){
        add_movie_log();
    } else if($cond == "watchlist") {
        add_movie_to_watchlist();
    }
    
?>