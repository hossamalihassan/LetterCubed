<?php 

    if(isset($_GET["user_name"])){
        include('config/database_connection.php');
        include('config/search_in_DB.php');
        include('config/get_user_logged_movies.php');
        include('config/check_if_user_is_following.php');
        include('inc/User.php');

        // get user's data from db
        $user_data_from_db = get_from_db("*", "users", "user_username", $_GET["user_name"], $conn)[0];

        if(!empty($user_data_from_db)) {
            $user = new User($user_data_from_db["user_id"], $user_data_from_db["user_name"], $user_data_from_db["user_username"], $user_data_from_db["user_email"], $user_data_from_db["user_profile_img"], $user_data_from_db["number_of_movies_watched"], $user_data_from_db["number_of_watchlist_movies"], $user_data_from_db["user_followers"], $user_data_from_db["user_following"]);
        } else {
            header("location: ../lettercubed/page_not_found.php");
        }

        // get 5 movies user recently logged
        $user_logged_movies = get_logged_movies("movies_logs", "log_user_id", $user->user_id, "log_id", 5, 1, $conn);

        // change user's profile picture
        if(isset($_POST["profile_pic_submit"])){
            include('inc/change_user_profile_pic.php');
            change_user_profile_pic($user->user_id, $user->user_username, $conn);
        }

        // check if user is following this user
        if($user->user_username != $_SESSION["user_username"]){
            $follow_cond = check_if_user_is_following($user->user_id, $_SESSION["user_id"], $conn);
        }
    }
    
    else {
        header("location: ../lettercubed/page_not_found.php");
    }
?>