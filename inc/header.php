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
                <li class="link-item" id="watchlist-link">
                    <a href="watchlist.php">Watchlist</a>
                </li>
                <li class="link-item" id="search-link">
                    <a href="profile.php">Profile</a>
                </li>
                <li class="link-item" id="watchlist-link">
                    <a href="inc/logout_script.php">Sign out</a>
                </li>
            </ul>
        </div>

    </div>
</nav>