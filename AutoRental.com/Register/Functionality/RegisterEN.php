<?php

include '../../Config/config.php';

if (isset($_POST['submit'])) {

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $pass = $_POST['pass'];
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $utype = 'user';

    $stmt = mysqli_prepare($conn, "SELECT * FROM `users` WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $message = 'User already exists!';
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO `users`(firstName, lastName, pass, email, phoneNumber, utype) VALUES(?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $hashedPass, $email, $phoneNumber, $utype);
        mysqli_stmt_execute($stmt);
        header('location: ../../Home/EN/Home.html');
        exit;
    }
}
?>