<?php

    class User {
        public $user_id;
        public $user_name;
        public $user_username;
        public $user_email;
        public $user_profile_pic;
        public $number_of_movies_watched;
        public $number_of_watchlist_movies;
        public $user_followers;
        public $user_following;

        function __construct($user_id, $user_name, $user_username, $user_email, $user_profile_pic, $number_of_movies_watched, $number_of_watchlist_movies, $user_followers, $user_following){
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_username = $user_username;
            $this->user_email = $user_email;
            $this->user_profile_pic = $user_profile_pic;
            $this->number_of_movies_watched = $number_of_movies_watched;
            $this->number_of_watchlist_movies = $number_of_watchlist_movies;
            $this->user_followers = $user_followers;
            $this->user_following = $user_following;
        }
    }

?>