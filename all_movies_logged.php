<?php 

    session_start();
    if($_GET["type"] == "watched"){
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="styling/main-styling.css">
    <link rel="stylesheet" href="styling/view-all-styling.css">
    <link rel="stylesheet" href="styling/movies-logged-styling.css">
    

    <title>
        <?php echo $_GET["user_name"] ?>'s movies - page 1 - LetterCubed
    </title>
</head>
<body>

    <?php include("inc/header.php"); ?>

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
                <?php echo $total_movies ?> movie/s
            </p>
        </div>

        <?php if(!empty($user_logged_movies)): ?>
            <div class="user-data">
                <?php foreach($user_logged_movies as $logged_movie): ?>
                    <div class="user-data-box">
                        <a href="movie.php?id=<?php echo $logged_movie["log_movie_id"] ?>">
                            <img src="https://image.tmdb.org/t/p/w500<?php echo $logged_movie["log_movie_poster"] ?>" class="box-poster animate__animated animate__fadeIn">
                        </a>

                        <p class="logged-movie-rating">
                            <?php for($i=0; $i < $logged_movie["log_movie_rating"]; $i++): ?>
                                <i class="fas fa-star rating-star animate__animated animate__zoomIn"></i>
                            <?php endfor; ?>
                        </p>

                    </div>
                <?php endforeach; ?>
            </div>
            
        <?php else: ?>
            <p class="no-movies">there's no movies logged</p>
        <?php endif; ?>

        <?php if($total_pages > 1): ?>

            <div class="pageination">
                <ul>
                    <?php for($i=1; $i <= $total_pages; $i++): ?>
                        <a href="all_movies_logged.php?user_name=<?php echo $_GET["user_name"] ?>&type=watched&page=<?php echo $i ?>">
                            <li class="<?php echo ($i == $_GET["page"]) ? "active" : null  ?>">
                                <?php echo $i; ?>
                            </li>
                        </a>
                    <?php endfor; ?>
                </ul>
            </div>

        <?php endif; ?>

    </div>

    <?php include("inc/footer.php"); ?>

    <script src="script/navbarScript.js"></script>

</body>
</html>