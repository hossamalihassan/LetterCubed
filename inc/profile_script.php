<?php 

    if(isset($_SESSION['user_id'])){
        include('config/database_connection.php');
        include('config/search_for_user_DB.php');
        $user = get_user_from_db("user_id", $_SESSION["user_id"], $conn);
    }

?>