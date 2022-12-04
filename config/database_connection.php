<?php 

    define('DB_HOST', 'localhost:3307');
    define('DB_USER', 'hossam');
    define('DB_PASS', 'asdqwe246');
    define('DB_NAME', 'lettercubed');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($conn->connect_error){
        die("connection failed");
    }

?>