<?php

    if(!isset($_SESSION)){
        session_start();
    }

?>

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
                    <a href="search.php">Search</a>
                </li>

                <?php if(isset($_SESSION["user_id"])) : ?>

                    <li class="link-item" id="watchlist-link">
                        <a href="watchlist.php?user_name=<?php echo $_SESSION["user_username"] ?>&type=watchlist&page=1">Watchlist</a>
                    </li>
                    <li class="link-item" id="search-link">
                        <a href="profile.php?user_name=<?php echo $_SESSION["user_username"] ?>">Profile</a>
                    </li>
                    <li class="link-item" id="watchlist-link">
                        <a href="inc/logout_script.php">Sign out</a>
                    </li>

                <?php else: ?>

                    <li class="link-item" id="watchlist-link">
                        <a href="index.php">Sign in / Sign up </a>
                    </li>

                <?php endif; ?>
                    



            </ul>
        </div>

    </div>
</nav>