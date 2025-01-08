<?php

session_start();

require "connection.php";

if(isset($_SESSION["t"])) {
    $email = $_SESSION["t"]["email"];

    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];

    if(isset($_FILES["pimg"])) {
        $pimg = $_FILES["pimg"];

        $allowed_image_ex = array("image/jpg","image/jpeg","image/png","image/svg+xml");
        $file_ex = $pimg["type"];

        if(!in_array($file_ex, $allowed_image_ex)){
            echo ("Please select a valid image.");
        } else {
            
            $new_file_ex;

            if($file_ex == "image/jpg"){
                $new_file_ex = ".jpg";
            } else if($file_ex == "image/jpeg"){
                $new_file_ex = ".jpeg";
            } else if($file_ex == "image/png"){
                $new_file_ex = ".png";
            } else if($file_ex == "image/svg+xml"){
                $new_file_ex = ".svg";
            }

            $file_name = "assets/images/".$email."_".uniqid().$new_file_ex;

            move_uploaded_file($pimg["tmp_name"],$file_name);

            //search the data from the table
            $pimg_rs = Database::search("SELECT * FROM `teacher_profile_image` WHERE `teacher_registration_email`='".$email."'");
            $pimg_num = $pimg_rs->num_rows;

            if($pimg_num == 1){

                //update table
                Database::iud("UPDATE `teacher_profile_image` SET `path`= '".$file_name."' WHERE
                `teacher_registration_email`='".$email."'");

            } else {

                //update table
                Database::iud("INSERT INTO `teacher_profile_image` (`path`,`teacher_registration_email`) VALUES
                ('".$file_name."','".$email."')");

            }


            
        }
    }
    
    //update table
    Database::iud("UPDATE `teacher_registration` SET `first_name`='".$fname."',`middle_name`='".$mname."',`last_name`='".$lname."', `contact_no`= '".$mobile."' WHERE `email`='".$email."'");
    
    echo ("success");
    
} else {
    echo ("Please LogIn First");
}

?>