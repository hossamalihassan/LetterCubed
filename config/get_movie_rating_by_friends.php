<?php

    function get_movie_rating_by_friends($follower_id, $movie_id, $recent_n_ratings, $conn){
        $movie_ratings = "SELECT log_id, log_user_username, log_movie_rating FROM movies_logs AS L
                            INNER JOIN users_followers AS U
                            ON L.log_user_id = U.user_id AND U.follower_id = $follower_id AND L.log_movie_id = $movie_id 
                            ORDER BY log_id DESC LIMIT $recent_n_ratings;";
                        
        $movie_ratings_result = mysqli_query($conn, $movie_ratings);
    
        $movie_ratings_returned = mysqli_fetch_all($movie_ratings_result, MYSQLI_ASSOC);
    
        return empty($movie_ratings_returned) ? null : $movie_ratings_returned;
    }

?>