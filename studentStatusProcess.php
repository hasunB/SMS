<?php

require "connection.php"; //require the connection

$email =  $_GET["e"]; //take the email through the ajax

//search the student data from the database
$student_rs = Database::search("SELECT * FROM `student_registration` WHERE `email`='".$email."'");
$student_num = $student_rs->num_rows; //take the number of results

if($student_num == 1) {

    $student_data = $student_rs->fetch_assoc(); //extract from student data

    if($student_data["status_id"] == 1){

        //update the table
        Database::iud("UPDATE `student_registration` SET `status_id`='2'  WHERE `email`='".$email."'");
        echo("Blocked");

    } else if ($student_data["status_id"] == 2) {
        //update the table
        Database::iud("UPDATE `student_registration` SET `status_id`='1'  WHERE `email`='".$email."'");
        echo("Unblocked");
    }

} else {
    echo ("Something Went Wrong. Please Try Again Later");
}

?>