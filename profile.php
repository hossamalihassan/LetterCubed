<?php 

    session_start();
    include('inc/profile_script.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        
        <link rel="stylesheet" href="styling/main-styling.css">
        <link rel="stylesheet" href="styling/profile-styling.css">

        <title>@<?php echo $user["user_username"] ?> - LetterCubed</title>
    </head>
    <body>

        <?php include("inc/header.php") ?>

        <!-- main container -->
        <div class="container">

            <div class="profile-container">
                <section class="profile-main-info">
                    <div class="profile-username">
                        <div class="profile-img">
                            <img src="img/profile-img.png">
                        </div>
                        <div class="profile-name">
                            <p class="profile-full-name">
                                <?php echo $user["user_name"] ?>
                            </p>
                            <p class="profile-username">
                                @<?php echo $user["user_username"] ?>
                            </p>
                        </div>
                    </div>

                    <div class="profile-stats">
                        <div class="profile-movies-watched-stats">
                            <p class="profile-number-of-movies-watched">
                                <?php echo $user["number_of_movies_watched"] ?>
                            </p>
                            <p class="stats-title">Movies watched</p>
                        </div>
        
                        <div class="profile-movies-watchlist-stats">
                            <p class="profile-number-of-watchlist-movies">
                                <?php echo $user["number_of_watchlist_movies"] ?>
                            </p>
                            <p class="stats-title">Movies in watchlist</p>
                        </div>
        
                    </div>
                </section>
                                    
                <section class="profile-movies-logged">

                        <div class="profile-movies-logged-label">
                            <p>Movies you've logged</p>
                        </div>

                        <div class="movies-logged">

                            <div class="movie-watched-box">
                                <img src="img/posters/Superbad.jfif">
                            </div>

                            <div class="movie-watched-box">
                                <img src="img/posters/Punch-drunk-love.jfif">
                            </div>

                            <div class="movie-watched-box">
                                <img src="img/posters/The-salesman.jfif">
                            </div>

                            <div class="movie-watched-box">
                                <img src="img/posters/Superbad.jfif">
                            </div>

                            <div class="movie-watched-box">
                                <img src="img/posters/Punch-drunk-love.jfif">
                            </div>

                        </div>
                        
                </section>
            </div>

        </div>

        <?php include("inc/footer.php") ?>



        <script src="script/navbarScript.js"></script>

    </body>
</html>