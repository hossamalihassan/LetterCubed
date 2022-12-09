<?php

    class User {
        public $user_id;
        public $user_name;
        public $user_username;
        public $user_email;
        public $number_of_movies_watched;
        public $number_of_watchlist_movies;

        function __construct($user_id, $user_name, $user_username, $user_email, $number_of_movies_watched, $number_of_watchlist_movies){
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_username = $user_username;
            $this->user_email = $user_email;
            $this->number_of_movies_watched = $number_of_movies_watched;
            $this->number_of_watchlist_movies = $number_of_watchlist_movies;
        }
    }

?>