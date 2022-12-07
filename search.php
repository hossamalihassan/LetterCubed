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
        
        <?php include("inc/header.php") ?>

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


        <?php include("inc/footer.php") ?>



        <script src="script/mainScript.js"></script>
        <script src="script/navbarScript.js"></script>
        <script src="script/searchScript.js"></script>

    </body>
</html>