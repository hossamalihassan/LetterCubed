<?php 

    session_start();
    include('inc/people_script.php');

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
        <link rel="stylesheet" href="styling/people-styling.css">

        <title>
            <?php echo $_GET["user_name"] . "'s" ?> - <?php echo $_GET["type"]?> - <?php echo $_GET["page"] ?> - LetterCubed
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
                    <b><?php echo $total_friends . ' ' . $_GET["type"] ?></b>
                </p>
            </div>

            <div class="user-data">
                <?php if(!empty($user_friends)): ?>
                    <?php foreach($user_friends as $user_friend): ?>
                        <div class="friend-box user-data-box">
                            <div class="box-poster">
                                <a href="profile.php?user_name=<?php echo $user_friend["user_username"] ?>">
                                    <img src="img/profile_pics/<?php echo ($user_friend["user_profile_img"] == null) ? "profile-img-default.png"  : $user_friend["user_profile_img"] ?>">
                                </a>
                            </div>

                            <a href="profile.php?user_name=<?php echo $user_friend["user_username"] ?>" class="friend-username">
                                <?php echo $user_friend["user_username"] ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>no <?php echo $_GET["type"] ?></p>
                <?php endif; ?> 
            </div>

            <?php if($total_pages > 1): ?>

                <div class="pageination">
                    <ul>
                        <?php for($i=1; $i <= $total_pages; $i++): ?>
                                <a href="people.php?user_name=<?php echo $_GET["user_name"] ?>&type=<?php echo $_GET["type"] ?>&page=<?php echo $i ?>">
                                <li class="<?php echo ($i == $_GET["page"]) ? "active" : null  ?>">
                                    <?php echo $i; ?>
                                </li>
                            </a>
                        <?php endfor; ?>
                    </ul>
                </div>

            <?php endif; ?>

        </div>

        <?php include("inc/footer.php") ?>


    <script src="script/profileScript.js"></script>
    <script src="script/navbarScript.js"></script>

</body>
</html>