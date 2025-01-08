<?php

require "connection.php";

$fname = $_POST["fname"]; //take first name from inputs through ajax
$lname = $_POST["lname"]; //take last name from inputs through ajax
$email = $_POST["email"]; //take email from inputs through ajax
$password = $_POST["password"]; //take password from inputs through ajax
$nic = $_POST["nic"]; //take nic from inputs through ajax
$mobile = $_POST["mobile"]; //take mobile from inputs through ajax
$gender = $_POST["gender"]; //take gender from inputs through ajax

if(empty($fname)){ //check the first name
    echo ("Please enter your first name");
} else if(strlen($fname) > 50){ //check the number of characters in first name
    echo ("First Name must have less than 50 characters");
} elseif (empty($lname)){ //check the last name
    echo ("Please enter your last name");
} else if(strlen($lname) > 50){ //check the number of characters in last name
    echo ("Last Name must have less than 50 characters");
} elseif (empty($email)){ //check the email
    echo ("Please enter your Email !!!");
} else if(strlen($email) > 100){ //check the number of characters in email
    echo ("Email must have less than 100 characters");
} else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //validate the email
    echo ("Invalid Email!!!");
} else if(empty($password)){ //check the password
    echo ("Please enter your password");
} else if(strlen($password) < 5 || strlen($password) > 20){ //check the number of characters in password
    echo ("Password must be between 5 - 20 characters");
} else if(empty($nic)){ //check the nic
    echo ("Please enter your school name");
} else if(strlen($nic) > 50){ //check the number of characters in nic
    echo ("NIC Number must have less than 100 characters");
} else if(empty($mobile)){ //check the mobile
    echo ("Please enter your mobile");
} else if(strlen($mobile) != 10){ //check the number of characters in mobile
    echo ("Mobile must have 10 characters");
} else if(!preg_match("/07[0,1,2,3,4,5,6,7,8][0-9]/",$mobile)){ //validate the mobile
    echo ("Invalid mobile !!!");
} else if($gender == 0) {
    echo ("Please select your gender");
} else {
    
//search the teacher data from the database    
$streg_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `email`='".$email."'");
$streg_num = $streg_rs->num_rows; //take the number of results

if($streg_num > 0){
    echo ("This email already exists");
} else{

    $d = new DateTime(); //create a date time
    $tz = new DateTimeZone("Asia/Colombo"); //cerate a timezone
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    //insert data into the table
    Database::iud("INSERT INTO `teacher_registration` 
    (`email`,`first_name`,`last_name`,`contact_no`,`nic`,`password`,`registered_date_time`,`gender_id`,`status_id`,`Verification_status_id`) VALUES 
    ('".$email."','".$fname."','".$lname."','".$mobile."','".$nic."','".$password."','".$date."','".$gender."','1','1')");

    echo "success";

}

}

?>