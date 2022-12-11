<?php 

    if(isset($_SESSION['user_id']) || isset($_GET["user_name"])){
        include('config/database_connection.php');
        include('config/search_in_DB.php');
        include('config/get_user_logged_movies.php');
        include('inc/User.php');

        $user_data_from_db = get_from_db("users", "user_username", $_GET["user_name"], $conn)[0];

        if(!empty($user_data_from_db)) {
            $user = new User($user_data_from_db["user_id"], $user_data_from_db["user_name"], $user_data_from_db["user_username"], $user_data_from_db["user_email"], $user_data_from_db["number_of_movies_watched"], $user_data_from_db["number_of_watchlist_movies"]);
        } else {
            header("location: ../lettercubed/page_not_found.php");
        }

        $user_logged_movies = get_logged_movies("movies_logs", "log_user_id", $user->user_id, "log_id", 5, 0, $conn);
    }
    
    else {
        header("location: ../lettercubed/page_not_found.php");
    }

?>