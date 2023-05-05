<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "autorentals2@gmail.com";
    $mail->Password = 'wfceelwaepuuevwm';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $fname . ' ' . $lname);
    $mail->addAddress("autorentals2@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        echo '<script>alert("Successfully sent."); window.location="../Home/home.html";</script>';
    }
    else
    {
        echo '<script>alert("Failed to sent."); window.location="../EN/Contact.html";</script>';
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
      