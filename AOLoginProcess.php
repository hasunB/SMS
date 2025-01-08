<?php
session_start();
require "connection.php";

$email = $_POST["aoemail"]; //take the academic officer's email through ajax
$password = $_POST["aopw"]; //take the academic officer's password through ajax
$rememberme = $_POST["aorm"]; //take the academic officer's remember-me through ajax

if (empty($email)) { //take the email
    echo ("Please enter your Email");
} else if (strlen($email) > 100) { // check number of character of character of email 
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate the email
    echo ("Invalid Email");
} else if (empty($password)) { //take the password
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) { // check number of character of character of password
    echo ("Password must have between 5-20 charaters");
} else {

    // search academic officer's data from the database

    $search_rs = Database::search("SELECT * FROM `academic_officer_registration` WHERE `email`='" . $email . "' 
    AND `password`='" . $password . "'");
    $search_num = $search_rs->num_rows; //take the number of results

    if ($search_num == 1) {
        $search_data = $search_rs->fetch_assoc(); //extract the data from the database

        if($search_data["Verification_status_id"] == 2){
            $_SESSION["ao"] = $search_data; //add to the session
            
            if ($rememberme == "true") {
                
                setcookie("aoemail", $email, time() + (60 * 60 * 24 * 365)); //set a cookie for email
                setcookie("aopassword", $password, time() + (60 * 60 * 24 * 365)); //set a cookie for password
            } else {
                
                setcookie("aoemail", "", -1);
                setcookie("aopassword", "", -1);
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