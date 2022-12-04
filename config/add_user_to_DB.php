<?php

    include('config/database_connection.php');

    $addUser = "INSERT INTO users (user_name, user_username, user_email, user_password) VALUES ('$signup_name', '$signup_username', '$signup_email', '$signup_hashed_password')";

    echo 'true';

    if(mysqli_query($conn, $addUser)){
        header("location: ./search.php");
    } else {
        echo mysqli_error($conn);
    }

?>