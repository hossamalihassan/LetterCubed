<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <!-- styling -->
        <link rel="stylesheet" href="styling/main-styling.css">
        <link rel="stylesheet" href="styling/search-styling.css">

        <title>Search - LetterCubed</title>
    </head>
    <body>
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
                        <li class="link-item" id="watchlist-link">
                            <a href="watchlist.html">Watchlist</a>
                        </li>
                        <li class="link-item" id="profile-link">
                            <a href="profile.php">Profile</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <!-- main container -->
        <div class="container">
            <!-- input search -->
            <section class="search-section">
                <form method="get" id="search-form">
                    <label for="search-tag" class="search-label">Search for a movie...</label>
                    <div class="search-input">
                        <input type="text" name="search" id="search-tag">
                        <button type="submit" class="search-btn">Search</button>
                    </div>
                </form>
            </section>

            <!-- search result -->
            <section class="search-results">
                <p class="search-results-title popular-title">Popular Movies</p>
                <p class="search-results-title search-title">Search results for : <b></b></p>
                
                <div class="results">
                    
                </div>

            </section>

        </div>


        <footer class="footer">
            <h1 class="logo one">LetterCubed</h1>
            <h1 class="logo two">LetterCubed</h1>
            <h1 class="logo three">LetterCubed</h1>
            <h1 class="logo four">LetterCubed</h1>
            <h1 class="logo five">LetterCubed</h1>
            <h1 class="logo six">LetterCubed</h1>
        </footer>


        <script src="script/mainScript.js"></script>
        <script src="script/navbarScript.js"></script>
        <script src="script/searchScript.js"></script>

    </body>
</html>