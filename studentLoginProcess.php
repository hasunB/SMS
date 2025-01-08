<?php

session_start(); //start the session
require "connection.php";

$email = $_POST["studentemail"]; //take the student's email through ajax
$password = $_POST["studentpw"]; //take the student's email through ajax
$rememberme = $_POST["rm"]; //take the student's remember me through ajax

if (empty($email)) { //take the email
    echo ("Please enter your Email");
} else if (strlen($email) > 100) { // check number of character of character of email 
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate the email
    echo ("Invalid Email");
} else if (empty($password)) { //take the email
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) { // check number of character of password
    echo ("Password must have between 5-20 charaters");
} else {

    // search student's data from the database

    $search_rs = Database::search("SELECT * FROM `student_registration` WHERE `email`='" . $email . "' 
    AND `password`='" . $password . "'");
    $search_num = $search_rs->num_rows; //take the number of results

    if ($search_num == 1) {
        $search_data = $search_rs->fetch_assoc(); //extract the data from the database

        if($search_data["Verification_status_id"] == 2){
            $_SESSION["u"] = $search_data; //add to the session
            
            if ($rememberme == "true") {
                
                setcookie("email", $email, time() + (60 * 60 * 24 * 365)); //set a cookie for email
                setcookie("password", $password, time() + (60 * 60 * 24 * 365)); //set a cookie for password
            } else {
                
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
            echo ("success");
        } else {
            echo("Your Account is not Verified");
        }
        
    } else {
        echo ("Invalid Username or Password");
    }
}

?>