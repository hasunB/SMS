<?php

session_start(); //strat the session
require "connection.php"; //require the connection

if(isset($_SESSION["u"])){

    $o_id = $_POST["order_id"]; //take the order id
    $a_id = $_POST["amount_id"]; //take the amount id
    $amount = $_POST["amount"]; //take the amount
    $email = $_POST["email"]; //take the email


    $d = new DateTime(); //create a date
    $tz = new DateTimeZone("Asia/Colombo"); //create time zone
    $d->setTimezone($tz); 
    $date = $d->format("Y-m-d H:i:s");
    
    //update the student pay status
    Database::iud("UPDATE `student_expiration` SET `pay_status_id`='2' WHERE `student_registration_email`='".$a_id."'");

    //update the invoice data
    Database::search("INSERT INTO `invoice`(`order_id`,`date`,`student_amount_id`,`student_registration_email`)VALUES
    ('".$o_id."','".$date."','".$email."','".$a_id."')");

    echo("success");

}

?>