<?php 

    session_start();
    if($_GET["type"] == "watchlist"){
        include("inc/all_movies_script.php");
    } else {
        header("location: page_not_found.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <limk rel="icon" href="img/favicon.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <link rel="stylesheet" href="styling/main-styling.css">
        <link rel="stylesheet" href="styling/view-all-styling.css">
        <link rel="stylesheet" href="styling/movies-logged-styling.css">

        <title>
            <?php echo $_GET["user_name"] ?>'s watchlist - page <?php echo $_GET["page"]; ?> - LetterCubed
        </title>
    </head>
    <body>

        <?php include("inc/header.php") ?>

        <!-- main container -->
        <div class="container">

            <div class="user-box">
                <div class="user-box-photo">
                    <a href="profile.php?user_name=<?php echo $_GET["user_name"] ?>">
                        <img src="img/profile_pics/<?php echo ($user_profile_pic["user_profile_img"] == null) ? "profile-img-default.png"  : $user_profile_pic["user_profile_img"] ?>">
                    </a>
                </div>
                <p class="user-box-username">
                    <a href="profile.php?user_name=<?php echo $_GET["user_name"] ?>">
                        <?php echo $_GET["user_name"] ?>
                    </a>
                </p>
                <p class="number-of-user-stat">
                    <?php if($_GET["user_name"] == $_SESSION["user_username"]): ?>
                        you want to watch <b><?php echo $total_movies_in_watchlist ?></b> movie/s
                    <?php else: ?>
                        <?php echo $_GET["user_name"] ?> wants to watch <b><?php echo $total_movies_in_watchlist ?></b> movie/s 
                    <?php endif; ?>
                </p>
            </div>

            <?php if(!empty($user_movies_in_watchlist)): ?>

                <div class="user-data">
                    <?php foreach($user_movies_in_watchlist as $movie_in_watchlist): ?>
                        <div class="user-data-box">
                            <a href="movie.php?id=<?php echo $movie_in_watchlist["watchlist_log_movie_id"] ?>">
                                <img src="https://image.tmdb.org/t/p/w500<?php echo $movie_in_watchlist["watchlist_log_movie_poster"] ?>" class="box-poster profile-movie-poster animate__animated animate__fadeIn">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if($total_pages > 1): ?>

                    <div class="pageination">
                        <ul>
                            <?php for($i=1; $i <= $total_pages; $i++): ?>
                                <a href="watchlist.php?user_name=<?php echo $_GET["user_name"] ?>&type=watchlist&page=<?php echo $i ?>">
                                    <li class="<?php echo ($i == $_GET["page"]) ? "active" : null  ?>">
                                        <?php echo $i; ?>
                                    </li>
                                </a>
                            <?php endfor; ?>
                        </ul>
                    </div>

                <?php endif; ?>

            <?php else: ?>
                <p class="no-movies">there's no movies in watchlist</p>

            <?php endif; ?>

        </div>

        <?php include("inc/footer.php") ?>


        <script src="script/navbarScript.js"></script>

    </body>
</html>