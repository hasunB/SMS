<?php

session_start(); //start the session
require "connection.php"; //take the database connection

if(isset($_SESSION["u"])){
    
    $email = $_SESSION["u"]["email"]; //take email from the session
    
    $array;
    $order_id = uniqid(); //take an unique id

    // search the student data from the database
    $student_rs = Database::search("SELECT * FROM `student_registration`
    INNER JOIN `student_expiration` ON
    student_registration.email=student_expiration.student_registration_email
    INNER JOIN `student_amount` ON
    student_expiration.student_amount_id=student_amount.id WHERE `email`='".$email."'");
    $student_num = $student_rs->num_rows;

    if($student_num == 1){
        $student_data = $student_rs->fetch_assoc();
        
        $fname = $student_data["first_name"]; //take first name of the student
        $lname = $student_data["last_name"]; //take last name of the student
        $amount = $student_data["amount"]; //take amount of the student
    
    
        $array["id"] = $order_id;
        $array["fname"] = $fname;
        $array["lname"] = $lname;   //put the data into an array
        $array["amount"] = $amount;
        $array["mail"] = $email;
    
    
        echo json_encode($array);

    } else {
        echo("2");
    }


}else{
    echo ("1");
}

?>