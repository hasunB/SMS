<?php


require "connection.php"; //require the connection

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["emailStudent"])) {
    
    $emailStudent = $_POST["emailStudent"];  //take the email through ajax
    //search the academic officer'd data from the database
    $student_rs = Database::search("SELECT * FROM `student_registration` WHERE `email`='".$emailStudent."'");
    $student_num = $student_rs->num_rows;

    if ($student_num > 0) {

        $code = uniqid(); //create a unique id

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hasunbandara17@gmail.com';
        $mail->Password = 'gcvghmxfjlaamfvn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('hasunbandara17@gmail.com', 'Student Invitation');
        $mail->addReplyTo('hasunbandara17@gmail.com', 'Student Invitation');
        $mail->addAddress($emailStudent);
        $mail->isHTML(true);
        $mail->Subject = 'Student Invitation from MYSCHOOL';
        $bodyContent = '<h1 style="color:#f5a425;">Your Verification Code is ' . $code . '</h1><br><a href="http://localhost/SMS/StudentVerification.php">Verify</a>';
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
