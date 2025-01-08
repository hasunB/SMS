<?php
session_start();
require "connection.php";

$email = $_POST["temail"]; //take the email from the ajax
$password = $_POST["tpw"]; //take the password from the ajax
$rememberme = $_POST["trm"]; //take the value from the ajax

if (empty($email)) { //check the email
    echo ("Please enter your Email");
} else if (strlen($email) > 100) { //check the number of character in the email
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate the email
    echo ("Invalid Email");
} else if (empty($password)) { //check the password
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) { //check the password
    echo ("Password must have between 5-20 charaters");
} else {

    //search teacher data in the database
    $search_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `email`='" . $email . "' 
    AND `password`='" . $password . "'");
    $search_num = $search_rs->num_rows; //take the number of results

    if ($search_num == 1) {
        $search_data = $search_rs->fetch_assoc(); //extrat the teacher data

        if($search_data["Verification_status_id"] == 2){
            $_SESSION["t"] = $search_data; //add to the teacher data
            
            if ($rememberme == "true") {
                
                setcookie("temail", $email, time() + (60 * 60 * 24 * 365)); //create acookie for email and create atime
                setcookie("tpassword", $password, time() + (60 * 60 * 24 * 365)); //create acookie for password and create atime
            } else {
                
                setcookie("temail", "", -1);
                setcookie("tpassword", "", -1);
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