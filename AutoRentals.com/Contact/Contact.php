<?php

// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("yolalo8303@gam1fy.com","My subject",$msg);

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $fname = $_POST["fname"];
//     $lname = $_POST["lname"];
//     $email = $_POST["email"];
//     $message = $_POST["message"];

//     $to = "dereg70898@ippals.com"; // Replace with your email address
//     $subject = "Contact Form Submission";
//     $body = "First Name: " . $fname . "\n" .
//         "Last Name: " . $lname . "\n" .
//         "Email: " . $email . "\n" .
//         "Message: " . $message;

//     if (mail($to, $subject, $body)) {
//         echo "<script>alert('Thank you for your message! We will get back to you shortly.');</script>";
//     } else {
//         echo "<script>alert('Sorry, there was an error sending your message. Please try again later.');</script>";
//     }
// }
?>