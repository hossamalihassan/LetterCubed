<?php

    if(isset($_SESSION['user_id']) || isset($_GET["user_name"])){
        include("config/database_connection.php");
        include('config/get_user_logged_movies.php');
        include('config/count_rows_from_DB.php');

        $page = $_GET["page"];
        $user_name = $_GET["user_name"];
        $movies_per_page = 20;
        if($_GET["type"] == "watched"){
            $total_movies = get_count_of_rows("movies_logs", "log_user_username", $user_name, $conn);
            $total_pages = ceil($total_movies / $movies_per_page);
            $user_logged_movies = get_logged_movies("movies_logs", "log_user_username", $user_name, "log_id", $movies_per_page, $page, $conn);

            if(empty($user_logged_movies)){
                header("location: ../lettercubed/page_not_found.php");
            }
        }

        else if($_GET["type"] == "watchlist"){
            $total_movies_in_watchlist = get_count_of_rows("watchlist_logs", "watchlist_log_user_username", $user_name, $conn);
            $total_pages = ceil($total_movies_in_watchlist / $movies_per_page);
            $user_movies_in_watchlist = get_logged_movies("watchlist_logs", "watchlist_log_user_username", $user_name, "watchlist_log_id", $movies_per_page, $page, $conn);

            if(empty($user_movies_in_watchlist) && $total_movies_in_watchlist > 0){
                header("location: ../lettercubed/page_not_found.php");
            }
        }
    } 
    
    else {
        header("location: ../lettercubed/page_not_found.php");
    }

?>