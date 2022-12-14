<?php

    function get_count_of_rows($table, $col, $to_look_for, $conn) {
        $count_stat = 'SELECT count(*) FROM `'. $table .'` WHERE `'. $col .'` LIKE "' . $to_look_for . '";';

        $count_result = mysqli_query($conn, $count_stat);

        $count = mysqli_fetch_array($count_result);

        return $count["count(*)"];
    }

?>