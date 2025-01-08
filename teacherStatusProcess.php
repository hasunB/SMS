<?php

require "connection.php"; //require the connection

$email =  $_GET["e"]; //take the email from the inputs

// search the data from the database
$teacherStatus_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `email`='".$email."'");
$teacherStatus_num = $teacherStatus_rs->num_rows; //take the results

if($teacherStatus_num == 1) {

    $teacherStatus_data = $teacherStatus_rs->fetch_assoc();

    if($teacherStatus_data["status_id"] == 1){

        //update the table
        Database::iud("UPDATE `teacher_registration` SET `status_id`='2'  WHERE `email`='".$email."'");
        echo("Blocked");

    } else if ($teacherStatus_data["status_id"] == 2) {

        //update the table
        Database::iud("UPDATE `teacher_registration` SET `status_id`='1'  WHERE `email`='".$email."'");
        echo("Unblocked");
    }

} else {
    echo ("Something Went Wrong. Please Try Again Later");
}

?>