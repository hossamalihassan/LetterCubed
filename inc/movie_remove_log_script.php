<?php

    include('../config/database_connection.php');
    include("../config/remove_movie_log.php");

    $cond = $_GET["cond"];
    session_start();
    $user_id = $_SESSION["user_id"];

    remove_movie_log($conn, $cond, $user_id);
    
    

?>