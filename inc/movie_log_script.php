<?php 

    include('../config/database_connection.php');
    include("../config/add_movie_log_to_DB.php");
    include("../config/add_movie_to_watchlist.php");

    $cond = $_GET["cond"];
    session_start();
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_username"];

    if($cond == "watched"){
        add_movie_log($conn, $user_id, $user_name);
    } 
    
    else if($cond == "watchlist") {
        add_movie_to_watchlist($conn, $user_id, $user_name);
    }
    
?>