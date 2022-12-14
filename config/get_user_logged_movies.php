<?php

    function get_logged_movies($table, $col, $val, $order_by, $movies_per_page, $page, $conn) {
        $offset = ($page - 1) * $movies_per_page;
        $logged_movies = "SELECT * FROM $table WHERE $col = '$val' ORDER BY $order_by DESC LIMIT $movies_per_page OFFSET $offset;";
        $logged_movies_result = mysqli_query($conn, $logged_movies);
    
        $logged_movies_returned = mysqli_fetch_all($logged_movies_result, MYSQLI_ASSOC);
    
        return empty($logged_movies_returned) ? null : $logged_movies_returned;
    }
    

?>