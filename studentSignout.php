<?php

session_start(); //start the session

if(isset($_SESSION["u"])) { //take the session

    $_SESSION["u"] = null;
    session_destroy(); //destroy the session

    echo ("success");
}

?>