<?php 



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

        <title>LetterCubed - profile</title>
    </head>
    <body>

        <a href="inc/logout_script.php">Sign out</a>

        <!-- navbar -->
        <nav>
            <div class="container">
                <div class="logo">
                    <h1>LetterCubed</h1>

                    <div class="clapboard">
                        <button aria-expanded="false" aria-controls="links"  onclick="toggleNavBar()">
                            <i class="fa-solid fa-clapperboard icon"></i>
                        </button>
                    </div>
                </div>

                <div class="links" id="links" data-visible="false">
                    <ul class="links-list">
                        <li class="link-item" id="search-link">
                            <a href="search.html">Search</a>
                        </li>
                        <li class="link-item" id="watchlist-link">
                            <a href="watchlist.html">Watchlist</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <!-- main container -->
        <div class="container">

            <div class="profile-container">
                <section class="profile-main-info">
                    <div class="profile-username">
                        <div class="profile-img">
                            <img src="img/photo_2022-04-25_20-25-21.jpg">
                        </div>
                        <div class="profile-name">
                            <p class="profile-full-name">Hossam Ali</p>
                            <p class="profile-username">@hossamali</p>
                        </div>
                    </div>

                    <div class="profile-stats">
                        <div class="profile-movies-watched-stats">
                            <p class="profile-number-of-movies-watched">5</p>
                            <p class="stats-title">Movies watched</p>
                        </div>
        
                        <div class="profile-movies-watchlist-stats">
                            <p class="profile-number-of-watchlist-movies">14</p>
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

        <footer class="footer">
            <h1 class="logo one">LetterCubed</h1>
            <h1 class="logo two">LetterCubed</h1>
            <h1 class="logo three">LetterCubed</h1>
            <h1 class="logo four">LetterCubed</h1>
            <h1 class="logo five">LetterCubed</h1>
            <h1 class="logo six">LetterCubed</h1>
        </footer>



        <script src="script/navbarScript.js"></script>

    </body>
</html>