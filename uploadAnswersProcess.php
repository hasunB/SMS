<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])) {

    $file_document_name = $_POST["file_name"];
    if (empty($file_document_name)){
        echo("Please Enter a Name for the Note");
    } else if(empty($_FILES["answerSheet"])) {
        echo ("Please Choose a file");
    } else if(isset($_FILES["answerSheet"])) {
        
        $uploadfile = $_FILES["answerSheet"];
        $lesson_id = $_POST["lesson_id"];

        $allowed_image_extentions = array("application/pdf","application/vnd.openxmlformats-officedocument.presentationml.presentation",
        "application/xlsx","application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        $file_type = $_FILES['answerSheet']['type'];

        if(!in_array($file_type,$allowed_image_extentions)){
            echo ("Please select a valid file.");
        } else {
            $new_file_extention;

            if($file_type== "application/pdf"){
                $new_file_extention = ".pdf";
            } else if($file_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation"){
                $new_file_extention = ".pptx";
            } else if($file_type == "application/xlsx"){
                $new_file_extention = ".xlsx";
            } else if($file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                $new_file_extention = ".docx";
            }

            $file_name = "assets/answerSheet/".$_SESSION["u"]["email"]."_".uniqid().$new_file_extention;

            move_uploaded_file($uploadfile["tmp_name"],$file_name);

            $notes_rs = Database::search("SELECT * FROM `student_answers` WHERE `student_registration_email`='".$_SESSION["u"]["email"]."'
            AND `assingments_name`='".$file_document_name."'");
            $notes_num = $notes_rs->num_rows;

            if($notes_num == 1){

                Database::iud("UPDATE `student_answers` SET `path`='".$file_name."' WHERE
                `student_registration_email`='".$_SESSION["u"]["email"]."'");
                echo ("success2");

            } else if($notes_num == 0) {

                Database::iud("INSERT INTO `student_answers` (`path`,`assingments_name`,`lessons_lesson_id`,`student_registration_email`) VALUES
                ('".$file_name."','".$file_document_name."','".$lesson_id."','".$_SESSION["u"]["email"]."')");
                echo ("success");
            }

            
            
        }
        
    } 
    
    
} else {
    echo ("Please login first");
}

?>