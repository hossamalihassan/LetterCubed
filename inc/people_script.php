<?php

    if(isset($_GET["user_name"])){
        include("config/database_connection.php");
        include('config/count_rows_from_DB.php');
        include('config/get_user_friends.php');
        include('config/search_in_DB.php');

        $user_profile_pic = get_from_db("user_profile_img", "users", "user_username", $_GET["user_name"], $conn)[0];

        $page = $_GET["page"];
        $user_name = $_GET["user_name"];
        $user_id = get_from_db("user_id", "users", "user_username", $user_name, $conn)[0];

        $people_per_page = 10;

        if($_GET["type"] == "followers"){
            $total_friends = get_count_of_rows("users_followers", "user_id", $user_id["user_id"], $conn);
            $total_pages = ceil($total_friends / $people_per_page);
            $user_friends = get_friends("follower_id", "user_id", $user_id["user_id"], $page, $people_per_page, $conn);
        }

        else if($_GET["type"] == "following"){
            $total_friends = get_count_of_rows("users_followers", "follower_id", $user_id["user_id"], $conn);
            $total_pages = ceil($total_friends / $people_per_page);
            $user_friends = get_friends("user_id", "follower_id", $user_id["user_id"], $page, $people_per_page, $conn);
        }

        else {
            header("location: ../lettercubed/page_not_found.php");
        }

    } 

    else {
        header("location: ../lettercubed/page_not_found.php");
    }

?>