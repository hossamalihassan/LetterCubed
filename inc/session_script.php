<?php

    function set_session($user){
        session_start();
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["user_username"] = $user["user_username"];
    }

?>