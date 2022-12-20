<?php 

    if(isset($_GET["user_name"])){
        include('config/database_connection.php');
        include('config/search_in_DB.php');
        include('config/get_user_logged_movies.php');
        include('config/check_if_user_is_following.php');
        include('config/count_rows_from_DB.php');
        include('config/get_user_friends.php');
        include('inc/User.php');

        // get user's data from db
        $user_data_from_db = get_from_db("*", "users", "user_username", $_GET["user_name"], $conn)[0];
        $user_watched_movies = get_count_of_rows("movies_logs", "log_user_id", $user_data_from_db["user_id"], $conn);
        $user_movies_in_watchlist = get_count_of_rows("watchlist_logs", "watchlist_log_user_id", $user_data_from_db["user_id"], $conn);
        $user_followers = get_count_of_rows("users_followers", "user_id", $user_data_from_db["user_id"], $conn);
        $user_following = get_count_of_rows("users_followers", "follower_id", $user_data_from_db["user_id"], $conn);

        if(!empty($user_data_from_db)) {
            $user = new User($user_data_from_db["user_id"], $user_data_from_db["user_name"], $user_data_from_db["user_username"], $user_data_from_db["user_email"], $user_data_from_db["user_profile_img"], $user_watched_movies, $user_movies_in_watchlist, $user_followers, $user_following);
        } else {
            header("location: ../lettercubed/page_not_found.php");
        }

        // get 5 movies user recently logged/added to watchlist
        $user_logged_movies = get_logged_movies("movies_logs", "log_user_id", $user->user_id, "log_id", 5, 1, $conn);
        $user_watchlist_movies = get_logged_movies("watchlist_logs", "watchlist_log_user_id", $user->user_id, "watchlist_log_id", 5, 1, $conn);

        // get user friends
        $user_following_list = get_friends("user_id", "follower_id", $user->user_id, 1, 10, $conn);
        $user_followers_list = get_friends("follower_id", "user_id", $user->user_id, 1, 10, $conn);

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