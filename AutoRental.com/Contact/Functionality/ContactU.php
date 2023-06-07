<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
include '../../Config/config.php';

if (isset($_POST['submit'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $topic = mysqli_real_escape_string($conn, $_POST['topic']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $stmt = mysqli_prepare($conn, "INSERT INTO `messages` (firstName, lastName, topic, email, body) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssss', $firstName, $lastName, $topic, $email, $body);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header('location: ../../Home/EN/HomeU.php');
        exit;
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    $conn->close();
}
?>