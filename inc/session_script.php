<?php

    function set_session($user_id){
        session_start();
        $_SESSION["user_id"] = $user_id;
    }

?>