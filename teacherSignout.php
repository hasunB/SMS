<?php

session_start(); //start the session

if(isset($_SESSION["t"])) { //take the session

    $_SESSION["t"] = null;
    session_destroy(); //destroy the session

    echo ("success");
}

?>