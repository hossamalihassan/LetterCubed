<?php

    function add_movie_log() {
        include('database_connection.php');

        $user_id = $_SESSION["user_id"];
    
        if(isset($_GET["id"] )){
            $movie_id = $_GET["id"];
        }
    
        if(isset($_GET["title"])){
            $movie_name = $_GET["title"];  
        }
    
        if(isset($_GET["poster_path"])){
            $movie_poster = $_GET["poster_path"];  
        }

        if(isset($_GET["rating"])){
            $movie_rating = $_GET["rating"];  
        }
            
        $addMovie = "INSERT INTO movies_logs (log_user_id, log_movie_id, log_movie_name, log_movie_poster, log_movie_rating) VALUES ('$user_id', '$movie_id', '$movie_name', '$movie_poster', '$movie_rating')";
    
        if(mysqli_query($conn, $addMovie)){
            echo "added movie log";
        } else {
            echo mysqli_error($conn);
        }
    }
    

?>