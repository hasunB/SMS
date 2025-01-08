<?php

require "connection.php"; //require the connection

$stuemail = $_POST["stuemail"]; //take the email from the ajax
$stupassword = $_POST["stupw"]; //take the password from the ajax
$stuvcode = $_POST["stuvcode"]; //take the verification code from the ajax

if(empty($stuemail)) { //check the email
    echo("Please Enter your Email");
} else if (strlen($stuemail) > 100) { //check the number of character in email
    echo ("Email must have less than 100 characters");
} else if (!filter_var($stuemail, FILTER_VALIDATE_EMAIL)) { //validate the email
    echo ("Invalid Email");
} else if (empty($stupassword)) { //check the email
    echo ("Please enter your Password");
} else if (strlen($stupassword) < 5 || strlen($stupassword) > 20) { //check the number of character in password
    echo ("Password must have between 5-20 charaters");
} else if (empty($stuvcode)) { //check the email
    echo ("Please Enter Your Verification Code");
} else {
    
    //search the data from the database
    $stu_rs = Database::search("SELECT * FROM `student_registration` WHERE `email`='".$stuemail."' AND `password`='".$stupassword."'");
    $stu_num = $stu_rs->num_rows; //take the number of results
    
    if($stu_num == 1){

        //update the table
        Database::iud("UPDATE `student_registration` SET `veification_code`='".$stuvcode."'
        WHERE `email`='".$stuemail."'");

        Database::iud("UPDATE `student_registration` SET `Verification_status_id`='2'
        WHERE `email`='".$stuemail."'");

        echo("success");
    } else {
        echo("Invalid Username or Password");
    }

}


?>