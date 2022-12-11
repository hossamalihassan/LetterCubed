<?php

    function set_session($user_id, $user_username){
        session_start();
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_username"] = $user_username;
    }

?>