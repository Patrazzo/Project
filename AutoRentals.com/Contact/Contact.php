<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'autorentals2@gmail.com';
    $mail->Password = 'tdgnttpbcnkhbzhd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('autorentals2@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    $mail->Body = 'First Name: ' . $_POST["fname"] . '<br>Last Name: ' . $_POST["lname"] . '<br>Message: ' . $_POST["message"];

    if($mail->send()){
        echo '<script>alert("Message sent successfully!");</script>';
    }
    else{
        echo '<script>alert("Message could not be sent. Please try again later.");</script>';
    }
}
?>