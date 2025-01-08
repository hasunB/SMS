<?php

require "connection.php";

$fname = $_POST["fname"]; //take the first Name of the student through the ajax
$lname = $_POST["lname"]; //take the last Name of the student through the ajax
$email = $_POST["email"]; //take the email of the student through the ajax
$password = $_POST["password"]; //take the password of the student through the ajax
$nic = $_POST["nic"]; //take the nic of the student through the ajax
$mobile = $_POST["mobile"]; //take the mobile of the student through the ajax
$gender = $_POST["gender"]; //take the gender of the student through the ajax

if(empty($fname)){ //check the first_name
    echo ("Please enter your first name");
} else if(strlen($fname) > 50){ //check the characters of the first_name
    echo ("First Name must have less than 50 characters");
} elseif (empty($lname)){ //check the last_name
    echo ("Please enter your last name");
} else if(strlen($lname) > 50){ //check the characters of the last_name
    echo ("Last Name must have less than 50 characters");
} elseif (empty($email)){ //check the email
    echo ("Please enter your Email !!!");
} else if(strlen($email) > 100){ //check the characters of the email
    echo ("Email must have less than 100 characters");
} else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //valid the email
    echo ("Invalid Email!!!");
} else if(empty($password)){ //check the email
    echo ("Please enter your password");
} else if(strlen($password) < 5 || strlen($password) > 20){ //check the characters of the email
    echo ("Password must be between 5 - 20 characters");
} else if(empty($nic)){ //check the nic
    echo ("Please enter your school name");
} else if(strlen($nic) > 50){ //check the characters of the email
    echo ("NIC Number must have less than 100 characters");
} else if(empty($mobile)){ //check the mobile
    echo ("Please enter your mobile");
} else if(strlen($mobile) != 10){ //check the characters of the email
    echo ("Mobile must have 10 characters");
} else if(!preg_match("/07[0,1,2,3,4,5,6,7,8][0-9]/",$mobile)){ //valid the email
    echo ("Invalid mobile !!!");
} else if($gender == 0) {
    echo ("Please select your gender");
} else {

//search the academic officer's data from the database

$streg_rs = Database::search("SELECT * FROM `academic_officer_registration` WHERE `email`='".$email."'");
$streg_num = $streg_rs->num_rows; //take the number of results

if($streg_num > 0){
    echo ("This email already exists");
} else{

    $d = new DateTime(); //take the date
    $tz = new DateTimeZone("Asia/Colombo"); //take the timezone
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    //insert data in to the database
    Database::iud("INSERT INTO `academic_officer_registration` 
    (`email`,`first_name`,`last_name`,`contact_no`,`nic`,`password`,`registered_date_time`,`gender_id`,`status_id`,`Verification_status_id`) VALUES 
    ('".$email."','".$fname."','".$lname."','".$mobile."','".$nic."','".$password."','".$date."','".$gender."','1','1')");

    echo "success";

}

}

?>