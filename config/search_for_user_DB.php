<?php 

    function get_user_from_db($col, $to_look_for, $conn) {
        $check_for_user = 'SELECT * FROM `users` WHERE `'. $col .'` LIKE "' . $to_look_for . '";';
    

        $check_result = mysqli_query($conn, $check_for_user);
    
        $check_returned = mysqli_fetch_all($check_result, MYSQLI_ASSOC);

        return empty($check_returned) ? null : $check_returned[0];
    }

?>