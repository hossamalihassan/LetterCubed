<?php

    function get_logged_movies($table, $col, $val, $order_by , $limit, $offset, $conn) {
        $logged_movies = "SELECT * FROM $table WHERE $col = $val ORDER BY $order_by DESC LIMIT $limit OFFSET $offset;";

        $logged_movies_result = mysqli_query($conn, $logged_movies);
    
        $logged_movies_returned = mysqli_fetch_all($logged_movies_result, MYSQLI_ASSOC);
    
        return empty($logged_movies_returned) ? null : $logged_movies_returned;
    }
    

?>