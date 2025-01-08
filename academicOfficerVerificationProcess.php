<?php

require "connection.php";

$aoemail = $_POST["aoemail"]; //take the email from input through ajax
$aopassword = $_POST["aopw"]; //take the password from input through ajax
$aovcode = $_POST["aovcode"]; //take the vrification code from input through ajax

if(empty($aoemail)) { // check the email
    echo("Please Enter your Email"); // print the statement
} else if (strlen($aoemail) > 100) { // check the number of characters of the email
    echo ("Email must have less than 100 characters"); // print the statement
} else if (!filter_var($aoemail, FILTER_VALIDATE_EMAIL)) { //validate the email
    echo ("Invalid Email"); // print the statement
} else if (empty($aopassword)) { // check the password
    echo ("Please enter your Password"); // print the statement
} else if (strlen($aopassword) < 5 || strlen($aopassword) > 20) { // check the number of characters of the password
    echo ("Password must have between 5-20 charaters");
} else if (empty($aovcode)) { // check the verification code
    echo ("Please Enter Your Verification Code");
} else {
    
    //search academic officer's data from the database
    $tv_rs = Database::search("SELECT * FROM `academic_officer_registration` WHERE `email`='".$aoemail."' AND `password`='".$aopassword."'");
    $tv_num = $tv_rs->num_rows; //take the number of results
    
    if($tv_num == 1){

        //update the verification code
        Database::iud("UPDATE `academic_officer_registration` SET `verification_code`='".$aovcode."'
        WHERE `email`='".$aoemail."'");

        //update the status
        Database::iud("UPDATE `academic_officer_registration` SET `Verification_status_id`='2'
        WHERE `email`='".$aoemail."'");

        echo("success");  // print the statement
    } else {
        echo("Invalid Username or Password");
    }

}


?>