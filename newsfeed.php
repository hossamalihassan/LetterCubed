<?php

    session_start();
    include("inc/newsfeed_script.php");


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        
        <link rel="stylesheet" href="styling/main-styling.css">
        <link rel="stylesheet" href="styling/newsfeed-styling.css">
        <link rel="stylesheet" href="styling/movies-logged-styling.css">
        <link rel="stylesheet" href="styling/view-all-styling.css">

        <title>
            Home - LetterCubed
        </title>
    </head>
    <body>

        <?php include("inc/header.php"); ?>

        <div class="container">
            <div class="newsfeed-friends-recently-logs">
                <div class="title">
                    Recently logged by people you're following
                </div>
                <div class="user-data newsfeed-recently-logged">
                    <?php if(!empty($user_newsfeed)): ?>
                        <?php foreach($user_newsfeed as $user_newsfeed_movie): ?>
                            <div class="user-data-box">

                                <a href="" class="recently-logged-by-friend-username"><?php echo $user_newsfeed_movie["log_user_username"]?></a>

                                <a href="movie.php?id=<?php echo $user_newsfeed_movie["log_movie_id"] ?>">
                                    <img src="https://image.tmdb.org/t/p/w500<?php echo $user_newsfeed_movie["log_movie_poster"] ?>" class="box-poster profile-movie-poster animate__animated animate__fadeIn">
                                </a>

                                <p class="logged-movie-rating">
                                    <?php for($i=0; $i < $user_newsfeed_movie["log_movie_rating"]; $i++): ?>
                                        <i class="fas fa-star rating-star animate__animated animate__zoomIn"></i>
                                    <?php endfor; ?>
                                </p>

                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <p class="no-movies">there's no results</p>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>

        <?php include("inc/footer.php") ?>


        <script src="script/profileScript.js"></script>
        <script src="script/navbarScript.js"></script>

    </body>
</html>