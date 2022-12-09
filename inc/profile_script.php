<?php 

    if(isset($_SESSION['user_id'])){
        include('config/database_connection.php');
        include('config/search_in_DB.php');
        $user = get_from_db("users", "user_id", $_SESSION["user_id"], $conn)[0];
        
    }

?>