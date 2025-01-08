<?php

session_start(); //start the session
require "connection.php";  //require the connection

$email = $_POST["admine"]; //take the admin's email
$password = $_POST["adminpw"]; //take the admin's password

if(empty($email)) { // check the email
    echo("Please Enter your Email");
} else if (strlen($email) > 100) { // take the number of character of the email
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate the email
    echo ("Invalid Email");
} else if (empty($password)) { // check the password
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) { //valid the number of character in the password
    echo ("Password must have between 5-20 charaters");
} else {

    //search the data of admin from the database
    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$password."'");
    $admin_num = $admin_rs->num_rows; //take the number of results

    if($admin_num == 1){
        echo("success");
        $admin_data = $admin_rs->fetch_assoc();
        $_SESSION["ad"] = $admin_data; //add the admin's data to the session
        
    } else {
        echo("Invalid Username or Password");
    }

}


?>