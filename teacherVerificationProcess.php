<?php

require "connection.php"; //require the connection

$temail = $_POST["temail"]; //take the teacher's email from inputs
$tpassword = $_POST["tpw"]; //take the teacher's password from inputs
$Vcode = $_POST["Vcode"]; //take the teacher's vcode from inputs

if(empty($temail)) { //check the email
    echo("Please Enter your Email");
} else if (strlen($temail) > 100) { //check the number of character in the email
    echo ("Email must have less than 100 characters");
} else if (!filter_var($temail, FILTER_VALIDATE_EMAIL)) { //validate the email
    echo ("Invalid Email");
} else if (empty($tpassword)) { //check the password
    echo ("Please enter your Password");
} else if (strlen($tpassword) < 5 || strlen($tpassword) > 20) { //check the number of character in the password
    echo ("Password must have between 5-20 charaters");
} else if (empty($Vcode)) {
    echo ("Please Enter Your Verification Code");
} else {
    
    //search the teacher data from the database
    $tv_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `email`='".$temail."' AND `password`='".$tpassword."'");
    $tv_num = $tv_rs->num_rows; //take the number of results
    
    if($tv_num == 1){

        //update the table
        Database::iud("UPDATE `teacher_registration` SET `verification_code`='".$Vcode."'
        WHERE `email`='".$temail."'");

        Database::iud("UPDATE `teacher_registration` SET `Verification_status_id`='2'
        WHERE `email`='".$temail."'");

        echo("success");
    } else {
        echo("Invalid Username or Password");
    }

}


?>