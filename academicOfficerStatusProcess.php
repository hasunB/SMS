<?php

require "connection.php";

$email =  $_GET["e"]; // get email as id

$aoStatus_rs = Database::search("SELECT * FROM `academic_officer_registration` WHERE `email`='".$email."'"); //search academic officer's data from the database
$aoStatus_num = $aoStatus_rs->num_rows; // take the number of rows

if($aoStatus_num == 1) {

    $aoStatus_data = $aoStatus_rs->fetch_assoc(); // extract the data

    if($aoStatus_data["status_id"] == 1){
        // update the status of the academic officer
        Database::iud("UPDATE `academic_officer_registration` SET `status_id`='2'  WHERE `email`='".$email."'");
        echo("Blocked"); //print the statement

    } else if ($aoStatus_data["status_id"] == 2) {
        // update the status of the academic officer
        Database::iud("UPDATE `academic_officer_registration` SET `status_id`='1'  WHERE `email`='".$email."'");
        echo("Unblocked"); //print the statement
    }

} else {
    echo ("Something Went Wrong. Please Try Again Later"); //print the statement
}

?>