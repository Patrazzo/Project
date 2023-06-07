<?php
session_start();
include '../../Config/config.php';

if (isset($_POST['submit'])) {

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $stmt = mysqli_prepare($conn, "INSERT INTO `messages`(firstName, lastName, subject, email, body) VALUES(?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, $firstName, $lastName, $sudject, $email, $body);
    mysqli_stmt_execute($stmt);
    header('location: ../../Login/EN/Login.html');
    exit;
}
$conn->close();
?>