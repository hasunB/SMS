<?php

require "connection.php";

$subject_id = $_POST["subject"]; //take the subject through the ajax
$grade_id = $_POST["grade"]; //take the grade through the ajax
$email = $_POST["email"]; //take the email through the ajax


if(empty($subject_id)){ //check the subject
    echo("Please select the subject");
} else if(empty($grade_id)){ //check the grade
    echo("Please select the grade");
} else {

    if(!empty($subject_id)){

        //search subject data from the database
        $subject_search_rs = Database::search("SELECT * FROM `teacher_has_subject` WHERE `teacher_registration_email`='".$email."'");
        $subject_search_num = $subject_search_rs->num_rows; //take the number of results

        if($subject_search_num == 1){
            $subject_search_data = $subject_search_rs->fetch_assoc();

            //update the table
            Database::iud("UPDATE `teacher_has_subject` SET `subject_id`='".$subject_id."'
            WHERE `teacher_registration_email`='".$email."'");

        } else {
            //insert the data into the table
            Database::iud("INSERT INTO `teacher_has_subject`(`teacher_registration_email`,`subject_id`)
            VALUES('".$email."','".$subject_id."')");
        }
        



    } else if(!empty($grade_id)){

        //search grade data from the database
        $grade_search_rs = Database::search("SELECT * FROM `grade_has_teacher` WHERE `teacher_registration_email`='".$email."'");
        $grade_search_num = $grade_search_rs->num_rows;

        if($grade_search_num == 1){
            $grade_search_data = $grade_search_rs->fetch_assoc();

            //update the table
            Database::iud("UPDATE `grade_has_teacher` SET `grade_id`='".$grade_id."'
            WHERE `teacher_registration_email`='".$email."'");

        } else {

            //insert the data into the table
            Database::iud("INSERT INTO `grade_has_teacher`(`grade_id`,`teacher_registration_email`)
            VALUES('".$grade_id."','".$email."')");

        }

    }

    echo("success");


}


?>