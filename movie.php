<?php

    $movie_id = $_GET["id"];
    include("inc/movie_check_watched_watchlist.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

        <!-- styling -->
        <link rel="stylesheet" href="styling/main-styling.css">
        <link rel="stylesheet" href="styling/movie-page-styling.css">

        <title>LetterCubed</title>

    </head>
    <body>

        <?php include("inc/header.php") ?>

        <!-- main container -->
        <div class="container">

            <!-- movie details -->
            <div class="movie-deatils">

                <div class="poster-options">
                    <div class="poster-director animate__animated animate__fadeIn">
                        <div class="poster-tag"></div>

                        <div class="director">
                            <div class="director-title"></div>
                            <h2 class="director-name"></h4>
                        </div>
                    </div>

                    <?php if(isset($_SESSION["user_id"])) : ?>

                    <div class="movie-options">
                        <div class="log-option">
                            <div class="rating">
                                <div class="rating-title">Rating</div>
                                <div class="rating-stars">
                                    <?php
                                        if($movie_rating > 0) {
                                            for($i=0; $i < $movie_rating; $i++){
                                                echo '<i class="fas fa-star rating-star non-clickable"></i>';
                                            }
                                            for($i=$movie_rating; $i < 5; $i++){
                                                echo '<i class="far fa-star rating-star non-clickable"></i>';
                                            }
                                        } 
                                        
                                        else {
                                            for($i=0; $i < 5; $i++){
                                                echo '<i class="far fa-star rating-star"></i>';
                                            }
                                        }
                                    ?>
                                </div>

                                <p class="rating-result">
                                    <?php echo $movie_rating ?> out of 5
                                </p>
                            </div>

                        </div>
                        <div class="options-btns">
                            <div class="watched-option">
                                <button class="watched-btn" onclick="<?php echo $watched_check == false ? "addMovie('watched')" : "removeMovie('watched')" ?>">
                                    <?php
                                        echo $watched_check == true ? "Watched" : "Log";
                                    ?>
                                </button>
                            </div>

                            <div class="watchlist-option">
                                <button class="watchlist-btn" onclick="<?php echo $watchlist_check == false ? "addMovie('watchlist')" : "removeMovie('watchlist')" ?>">
                                    <?php
                                        echo $watchlist_check == true ? "Added to watchlist" : "Add to watchlist";
                                    ?>
                                </button>
                            </div>
                        </div>

                    </div>

                    <?php else: ?>

                        <div class="signup-option">
                            <button class="signup-btn" onclick="goToSignupPage()">
                                Sign up to log this movie
                            </button>
                        </div>

                    <?php endif; ?>
                    
                </div>

                <div class="movie-info">
                    <div class="movie-main-info">
                        <div class="release-year">
                            <p></p>
                        </div>

                        <div class="movie-name">
                            <p></p>
                        </div> 

                        <div class="genre">
                            <p></p>
                        </div>
                    </div>

                    <div class="plot">
                        <div class="tagline">
                            <p></p>
                        </div>
                        <div class="overview">
                            <p></p>
                        </div>
                    </div>

                    <div class="movie-cast">
                        <div class="cast-title">
                            
                        </div>

                        <div class="cast-content">
                            
                        </div>

                    </div>
                </div>

            </div>

        </div>    
        

        <?php include("inc/footer.php") ?>

        <?php
            if(isset($_SESSION["user_id"]) && $watched_check == false) {
            // to make it clickable only if the move isnt logged
            echo '<script src="script/ratingScript.js"></script>';
            }
        ?>

        <script src="script/mainScript.js"></script>
        <script src="script/movieScript.js"></script>
        <script src="script/navbarScript.js"></script>
    </body>
</html>