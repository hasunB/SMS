<?php


require "connection.php"; //require the connection

require "SMTP.php"; 
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["emailAO"])) {
    
    $emailAO = $_POST["emailAO"]; //take the email through ajax

    //search the academic officer'd data from the database
    $ao_rs = Database::search("SELECT * FROM `academic_officer_registration` WHERE `email`='".$emailAO."'");
    $ao_num = $ao_rs->num_rows;

    if ($ao_num > 0) {

        $code = uniqid(); //create a unique id

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hasunbandara17@gmail.com';
        $mail->Password = 'gcvghmxfjlaamfvn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('hasunbandara17@gmail.com', 'Academic Officer Invitation');
        $mail->addReplyTo('hasunbandara17@gmail.com', 'Academic Officer Invitation');
        $mail->addAddress($emailAO);
        $mail->isHTML(true);
        $mail->Subject = 'Academic Officer Invitation from MYSCHOOL';
        $bodyContent = '<h1 style="color:#f5a425;">Your Verification Code is ' . $code . '</h1><br><a href="http://localhost/SMS/academicOfficerVerification.php">Verify</a>';
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'Success';
        }
        
    } else {
        echo ("You are not a valid User");
    }


} else {
    echo ("Something Went Wrong. Please Try Again Later");
}

?>
