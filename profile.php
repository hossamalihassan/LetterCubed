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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        
        <link rel="stylesheet" href="styling/main-styling.css">
        <link rel="stylesheet" href="styling/profile-styling.css">
        <link rel="stylesheet" href="styling/movies-logged-styling.css">

        <title>
            <?php echo $user->user_name . "'s" ?> - LetterCubed
        </title>
    </head>
    <body>

        <?php include("inc/header.php"); ?>
        <!-- main container -->
        <div class="container">
            <div class="profile-container">
                <section class="profile-main-info">
                    <div class="profile-username">
                        <div class="profile-img">
                            <div class="profile-img-container">
                                <img src="img/profile_pics/<?php echo ($user->user_profile_pic == null) ? "profile-img-default.png"  : $user->user_profile_pic ?>">
                            </div>

                            <?php if($_GET["user_name"] == $_SESSION["user_username"]): ?>
                                <div class="profile-change-photo">
                                    <form action="" method="post" enctype="multipart/form-data" class="change-pic-form">
                                        <label for="profile_pic" class="change-pic-label">
                                            <i class="fa-solid fa-user"></i>
                                        </label>
                                        <input type="file" id="profile_pic" name="profile_pic" accept="image/png, image/jpeg">
                                        <button type="submit" name="profile_pic_submit" class="change-pic-submit">Change</button>
                                    </form>
                                </div>

                            <?php else: ?>
                                <div class="follow-section">
                                    <button class="<?php echo ($follow_cond == 'Follow') ? 'follow-btn' : 'unfolllow-btn' ?>"
                                            onclick="sendRequest('<?php echo $user->user_id ?>', '<?php echo ($follow_cond == 'Follow') ? 'addFollower' : 'removeFollower' ?>')">
                                        <?php echo $follow_cond ?>
                                    </button>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="profile-name">
                            <p class="profile-full-name">
                                <?php echo $user->user_name ?>
                            </p>
                            <p class="profile-username">
                                @<?php echo $user->user_username ?>
                            </p>
                        </div>
                    </div>

                    <div class="profile-stats">

                        <div class="following-stats">
                                <div class="profile-stats-box">
                                    <p>
                                        <?php echo $user->user_followers ?>
                                    </p>
                                    <p class="stats-title">Followers</p>
                                </div>
                
                                <div class="profile-stats-box">
                                    <p>
                                        <?php echo $user->user_following ?>
                                    </p>
                                    <p class="stats-title">Following</p>
                                </div>
                            </div>

                        <div class="watching-stats">
                            <div class="profile-stats-box">
                                <p>
                                    <?php echo $user->number_of_movies_watched ?>
                                </p>
                                <p class="stats-title">Movies watched</p>
                            </div>
            
                            <div class="profile-stats-box">
                                <p>
                                    <?php echo $user->number_of_watchlist_movies ?>
                                </p>
                                <p class="stats-title">Movies in watchlist</p>
                            </div>
                        </div>
        
                    </div>
                </section>
                                    
                <section class="profile-movies-logged">

                        <div class="profile-movies-logged-label">
                            <p class="logged-label">Movies logged recently</p>
                            <?php if($user->number_of_movies_watched > 5): ?>
                                <a href="all_movies_logged.php?user_name=<?php echo $_GET["user_name"] ?>&type=watched&page=1" class="movies-logged-see-more">See all movies</a>
                            <?php endif; ?>
                        </div>

                        <div class="movies-logged profile-movies-logged">

                        <?php if(!empty($user_logged_movies)): ?>
                            <?php foreach($user_logged_movies as $logged_movie): ?>
                                <div class="movie-watched-box">
                                    <a href="movie.php?id=<?php echo $logged_movie["log_movie_id"] ?>">
                                        <img src="https://image.tmdb.org/t/p/w500<?php echo $logged_movie["log_movie_poster"] ?>" class="movie-poster profile-movie-poster animate__animated animate__fadeIn">
                                    </a>

                                    <p class="logged-movie-rating">
                                        <?php for($i=0; $i < $logged_movie["log_movie_rating"]; $i++): ?>
                                            <i class="fas fa-star rating-star animate__animated animate__zoomIn"></i>
                                        <?php endfor; ?>
                                    </p>

                                </div>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <p>no movies logged yet</p>
                        <?php endif; ?>

                        </div>
                        
                </section>
            </div>

        </div>

        <?php include("inc/footer.php") ?>


        <script src="script/profileScript.js"></script>
        <script src="script/navbarScript.js"></script>

    </body>
</html>