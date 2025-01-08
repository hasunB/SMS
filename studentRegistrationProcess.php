<?php

require "connection.php";

$fname = $_POST["fname"]; //take the student's first name through ajax
$lname = $_POST["lname"]; //take the student's last name through ajax
$email = $_POST["email"]; //take the student's email through ajax
$password = $_POST["password"]; //take the student's password through ajax
$school = $_POST["school"]; //take the student's school through ajax
$grade = $_POST["grade"]; //take the student's grade through ajax
$gender = $_POST["gender"]; //take the student's gender through ajax

if(empty($fname)){ //check the first name
    echo ("Please enter your first name");
} else if(strlen($fname) > 50){ //check the number of character in the first name
    echo ("First Name must have less than 50 characters");
} elseif (empty($lname)){ //check the last name
    echo ("Please enter your last name");
} else if(strlen($lname) > 50){ //check the number of character in the last name
    echo ("Last Name must have less than 50 characters");
} elseif (empty($email)){ //check the email
    echo ("Please enter your Email !!!");
} else if(strlen($email) > 100){ //check the number of character in the email
    echo ("Email must have less than 100 characters");
} else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //validate the email
    echo ("Invalid Email!!!");
} else if(empty($password)){ //check the password
    echo ("Please enter your password");
} else if(strlen($password) < 5 || strlen($password) > 20){ //check the number of character in the password
    echo ("Password must be between 5 - 20 characters");
} else if(empty($school)){ //check the school
    echo ("Please enter your school name");
} else if(strlen($school) > 100){ //check the number of character in the school
    echo ("School must have less than 100 characters");
} else if($gender == 0) {
    echo ("Please select your gender");
} else {
    
//search student data from the database
$streg_rs = Database::search("SELECT * FROM `student_registration` WHERE `email`='".$email."'");
$streg_num = $streg_rs->num_rows; //take the number of results

if($streg_num > 0){
    echo ("This email already exists");
} else{

    $d = new DateTime(); //create date
    $tz = new DateTimeZone("Asia/Colombo"); //create a time zone
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $endTime = date('Y-m-d H:i:s',strtotime('+4 weeks',strtotime($date))); //create a end time zone

    //insert data into the table
    Database::iud("INSERT INTO `student_registration` 
    (`email`,`first_name`,`last_name`,`password`,`school`,`registered_date_time`,`grade_id`,`gender_id`,`status_id`,`Verification_status_id`) VALUES 
    ('".$email."','".$fname."','".$lname."','".$password."','".$school."','".$date."','".$grade."','".$gender."','1','1')");

    Database::iud("INSERT INTO `student_expiration` 
    (`expiration_datetime`,`student_registration_email`,`pay_status_id`) VALUES 
    ('".$endTime."','".$email."','1')");

    echo "success";

}

}

?>