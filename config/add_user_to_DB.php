<?php

    function add_user_to_db($signed_up_user, $signup_hashed_password, $conn) {
        $addUser = "INSERT INTO users
                    (user_name, user_username, user_email, user_password)
                    VALUES
                    ('". $signed_up_user->user_name. "', '". $signed_up_user->user_username ."', '". $signed_up_user->user_email ."', '$signup_hashed_password')";

        if(mysqli_query($conn, $addUser)){
            header("location: ./search.php");
        } else {
            echo mysqli_error($conn);
        }
    }

?>