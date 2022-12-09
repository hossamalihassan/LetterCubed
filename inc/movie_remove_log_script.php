<?php

    include('../config/database_connection.php');
    include("../config/remove_movie_log.php");
    include("../config/get_number_of_user_movies.php");

    $cond = $_GET["cond"];
    session_start();

    $number_of_logs = get_number_of_movie_logged($conn, $cond)-1;
    remove_movie_log($conn, $cond, $number_of_logs);
    
    

?>