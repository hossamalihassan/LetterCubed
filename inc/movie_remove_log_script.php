<?php

    include("../config/remove_movie_log.php");

    $cond = $_GET["cond"];
    remove_movie_log($cond);
    

?>