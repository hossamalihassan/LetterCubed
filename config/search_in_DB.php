<?php 

    function get_from_db($col_selected, $table, $col, $to_look_for ,$conn) {
        $search = 'SELECT '. $col_selected .' FROM `'. $table .'` WHERE `'. $col .'` LIKE "' . $to_look_for . '";';

        $search_result = mysqli_query($conn, $search);
    
        $search_returned = mysqli_fetch_all($search_result, MYSQLI_ASSOC);

        return empty($search_returned) ? null : $search_returned;
    }

?>