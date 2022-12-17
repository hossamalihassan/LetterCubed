<?php

    include("config/database_connection.php");
    include("config/get_movie_rating_by_friends.php");

    session_start();
    $user_id = $_SESSION["user_id"];
    $movie_id = $_GET["id"];

    include("inc/movie_check_watched_watchlist.php");

    $movie_ratings = get_movie_rating_by_friends($user_id, $movie_id, 10, $conn);


?>