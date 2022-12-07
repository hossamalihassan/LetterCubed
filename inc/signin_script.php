<?php
    if(isset($_POST['signin_submit'])){
        include("config/database_connection.php");

        $signin_err = '';
        
        $signin_email = filter_input(INPUT_POST, "signin_email", FILTER_SANITIZE_EMAIL);
        $signin_password = filter_input(INPUT_POST, "signin_password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        // signin validation
        include('config/search_in_DB.php');
        $sign_in_check = get_user_from_db("users", "user_email", $signin_email, $conn);

        // signin is done
        if(!empty($sign_in_check)){
            if($signin_email == $sign_in_check["user_email"] && password_verify($signin_password, $sign_in_check["user_password"])){
                include("inc/session_script.php");
                set_session($sign_in_check);
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