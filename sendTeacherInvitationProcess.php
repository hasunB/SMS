<?php


require "connection.php"; //require the connection

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["email"])) {
    
    $email = $_POST["email"];  //take the email through ajax

    //search the academic officer'd data from the database
    $teacher_rs = Database::search("SELECT * FROM `teacher_registration` WHERE `email`='".$email."'");
    $teacher_num = $teacher_rs->num_rows;

    if ($teacher_num > 0) {

        $code = uniqid(); //create unique id

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hasunbandara17@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('hasunbandara17@gmail.com', 'Teacher Invitation');
        $mail->addReplyTo('hasunbandara17@gmail.com', 'Teacher Invitation');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Teacher Invitation from MYSCHOOL';
        $bodyContent = '<h1 style="color:#f5a425;">Your Verification Code is ' . $code . '</h1><br><a href="http://localhost/SMS/teacherVerification.php">Verify</a>';
        $mail->Body    = $bodyContent;

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
