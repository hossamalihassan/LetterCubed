<?php
    if(isset($_POST['signin_submit'])){
        include("config/database_connection.php");

        $signin_err = '';
        
        $signin_email = filter_input(INPUT_POST, "signin_email", FILTER_SANITIZE_EMAIL);
        $signin_password = filter_input(INPUT_POST, "signin_password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        // signin validation
        include('config/search_in_DB.php');
        $search_for_user = get_from_db("*", "users", "user_email", $signin_email, $conn);
        $sign_in_check = empty($search_for_user) ? null : $search_for_user[0];

        // signin is done
        if(!empty($sign_in_check)){
            if($signin_email == $sign_in_check["user_email"] && password_verify($signin_password, $sign_in_check["user_password"])){
                include("inc/User.php");
                $signed_in_user = new User($sign_in_check["user_id"], $sign_in_check["user_name"], $sign_in_check["user_username"], $sign_in_check["user_email"],  $sign_in_check["user_profile_img"], $sign_in_check["number_of_movies_watched"], $sign_in_check["number_of_watchlist_movies"]);

                include("inc/session_script.php");
                set_session($signed_in_user->user_id, $signed_in_user->user_username);

                header("location: ./search.php");
            } 
            
            else {
                $signin_err = "Incorrect email or password";
            }
        } else { 
            $signin_err = "We don't have you as a member. Sign up.";
        }
    }
?>