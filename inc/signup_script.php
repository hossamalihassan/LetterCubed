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
        $sign_up_email_check = get_from_db("users", "user_email", $signup_email, $conn)[0];
        $sign_up_username_check = get_from_db("users", "user_username", $signup_username, $conn)[0];
        
        if(!empty($sign_up_email_check)){
            $signup_email_err = "Email is already used";
        }

        if(!empty($sign_up_username_check)){
            $signup_username_err = "Username is already used";
        }

        // signup is done
        if(empty($signup_email_err) && empty($sign_up_username_check)){
            include('config/add_user_to_DB.php');

            include("inc/session_script.php");
            $user = get_from_db("users", "user_email", $signup_email, $conn)[0];
            set_session($user);

            header("location: ./search.php");
        }
    }

?>