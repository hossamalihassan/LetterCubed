<?php 

    if(isset($_POST["signup_submit"])) {
        include("config/database_connection.php");

        $signup_username_err = $signup_email_err = $signup_password_err = '';
        
        $signup_name = filter_input(INPUT_POST, "signup_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $signup_username = filter_input(INPUT_POST, "signup_username", FILTER_SANITIZE_SPECIAL_CHARS);
        $signup_email = filter_input(INPUT_POST, "signup_email", FILTER_SANITIZE_EMAIL);
        $signup_password = filter_input(INPUT_POST, "signup_password", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $signup_hashed_password = password_hash($signup_password, PASSWORD_DEFAULT);

        // signup validation
        include('config/search_in_DB.php');
        $search_if_email_exists = get_from_db("users", "user_email", $signup_email, $conn);
        $search_if_username_exists = get_from_db("users", "user_username", $signup_username, $conn);
        
        $sign_up_email_check = empty($search_if_email_exists) ? null : $search_if_email_exists[0];
        $sign_up_username_check = empty($search_if_username_exists) ? null : $search_if_username_exists[0];
        
        if(!empty($sign_up_email_check)){
            $signup_email_err = "Email is already used";
        }

        if(!empty($sign_up_username_check)){
            $signup_username_err = "Username is already used";
        }

        // signup is done
        if(empty($signup_email_err) && empty($sign_up_username_check)){
            include('User.php');
            include('config/add_user_to_DB.php');
            $signed_up_user = new User(0, $signup_name, $signup_username, $signup_email, 0, 0);
            add_user_to_db($signed_up_user, $signup_hashed_password, $conn);

            $search_for_signed_up_user = get_from_db("users", "user_email", $signed_up_user->user_email, $conn)[0];
            include("inc/session_script.php");
            set_session($search_for_signed_up_user["user_id"]);

            header("location: ./search.php");
        }
    }

?>