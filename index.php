<?php

    session_start();
    // to check if user is already signed-in
    if (isset($_SESSION['user_id'])) {
        header("location: search.php");
    }

    // handle sign-in
    include('inc/signin_script.php');

    // handle sign-up
    include('inc/signup_script.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LetterCubed</title>

    <link rel="stylesheet" href="styling/main-styling.css">
    <link rel="stylesheet" href="styling/index-styling.css">

</head>
<body>
    <div class="nav">
        <p>LetterCubed</p>
    </div>

    <div class="container">

        <section class="home">

            <div class="options">

                    <div class="signin-option option-box">
                        <p class="option-title signin">Sign in</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="option-form">
                            <div class="signin-email option-section">
                                <label for="signin_email" class="option-label">Email</label>
                                <input type="email" name="signin_email" class="option-input" required
                                    value="<?php echo isset($_POST["signin_email"]) ? filter_input(INPUT_POST, "signin_email", FILTER_SANITIZE_EMAIL) : null ?>">
                            </div>

                            <div class="signin-password option-section">
                                <label for="signin_password" class="option-label">Password</label>
                                <input type="password" name="signin_password" class="option-input" required>
                            </div>

                            <p style="color: #dc2626; display : <?php echo $signin_err ?? "none" ?>">
                                <?php echo $signin_err ?? null; ?>
                            </p>

                            <div class="option-submit">
                                <input type="submit" name="signin_submit" class="submit" value="Enter" required>
                            </div> 
                        </form>
                    </div>

                    <div class="signup-option option-box">
                        <p class="option-title signup">Sign up</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="option-form">
                            <div class="signup-usename option-section">
                                <label for="signup_name" class="option-label">Name</label>
                                <input type="text" name="signup_name" class="option-input" required
                                    value="<?php echo isset($_POST["signup_name"]) ? filter_input(INPUT_POST, "signup_name", FILTER_SANITIZE_SPECIAL_CHARS) : null ?>">
                            </div>

                            <div class="signup-usename option-section">
                                <label for="signup_username" class="option-label">Username</label>
                                <input type="text" name="signup_username" class="option-input" required
                                    value="<?php echo isset($_POST["signup_username"]) ? filter_input(INPUT_POST, "signup_username", FILTER_SANITIZE_SPECIAL_CHARS) : null ?>">
                                
                                <p style="color: #dc2626; display : <?php echo $signup_username_err ?? "none" ?>">
                                    <?php echo $signup_username_err ?? null; ?>
                                </p>
                            </div>

                            <div class="signup-email option-section">
                                <label for="signup_email" class="option-label">Email</label>
                                <input type="email" name="signup_email" class="option-input" required
                                    value="<?php echo isset($_POST["signup_email"]) ? filter_input(INPUT_POST, "signup_email", FILTER_SANITIZE_EMAIL) : null ?>">
                                
                                <p style="color: #dc2626; display : <?php echo $signup_email_err ?? "none" ?>">
                                    <?php echo $signup_email_err ?? null; ?>
                                </p>
                            </div>

                            <div class="signup-password option-section">
                                <label for="signup_password" class="option-label">Password</label>
                                <input type="password" name="signup_password" class="option-input" required>
                            </div>

                            <div class="option-submit">
                            <input type="submit" name="signup_submit" class="submit" value="Create an account">
                            </div> 
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </div>

</body>
</html>