<?php 

    if(isset($_SESSION['user_id'])){
        include('config/database_connection.php');
        include('config/search_in_DB.php');
        include('inc/User.php');
        $user_data_from_db = get_from_db("users", "user_id", $_SESSION["user_id"], $conn)[0];
        $user = new User($user_data_from_db["user_id"], $user_data_from_db["user_name"], $user_data_from_db["user_username"], $user_data_from_db["user_email"], $user_data_from_db["number_of_movies_watched"], $user_data_from_db["number_of_watchlist_movies"]);
    }

?>