<?php

require "connection.php";

$grade_id = $_POST["grade"]; //take the grade through the ajax
$email = $_POST["email"]; //take the email through the ajax


if(empty($grade_id)){
    echo("Please select the grade");
} else {

    //search the student data from the database
    $grade_search_rs = Database::search("SELECT * FROM `student_registration` WHERE `email`='".$email."'");
    $grade_search_num = $grade_search_rs->num_rows; //take the number of results

    if($grade_search_num == 1){
        $grade_search_data = $grade_search_rs->fetch_assoc();

        //update the grade
        Database::iud("UPDATE `student_registration` SET `grade_id`='".$grade_id."'
        WHERE `email`='".$email."'");

    } 

    echo("success");


}


?>