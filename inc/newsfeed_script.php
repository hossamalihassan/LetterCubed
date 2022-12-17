<?php

    if($_SESSION["user_id"]){
        include("config/database_connection.php");
        include("config/get_user_newsfeed.php");
    
        $user_newsfeed = get_newsfeed($_SESSION["user_id"], 6, $conn);
    }

    else {
        header("location: page_not_found.php");
    }
    


?>